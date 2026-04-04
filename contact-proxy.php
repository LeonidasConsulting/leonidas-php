<?php
require_once __DIR__ . '/includes/security-headers.php';
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

// Rate limiting — checked here, incremented only after Turnstile passes
$_rl_ip   = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$_rl_ip   = preg_replace('/[^0-9a-fA-F.:]/', '', $_rl_ip);
$_rl_dir  = __DIR__ . '/data';
$_rl_file = $_rl_dir . '/rl_' . md5($_rl_ip) . '.json';
$_rl_now  = time();
$_rl_data = (file_exists($_rl_file)) ? json_decode(file_get_contents($_rl_file), true) : ['count'=>0,'window_start'=>$_rl_now];
if (($_rl_now - $_rl_data['window_start']) > 3600) { $_rl_data = ['count'=>0,'window_start'=>$_rl_now]; }
if ($_rl_data['count'] >= 10) {
    http_response_code(429);
    echo json_encode(['ok'=>false,'error'=>'Too many submissions. Please try again later.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok'=>false,'error'=>'Method not allowed']);
    exit;
}

$body = json_decode(file_get_contents('php://input'), true);
if (!$body) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'Invalid request']);
    exit;
}

// Honeypot check
if (!empty($body['website_url'])) {
    http_response_code(200);
    echo json_encode(['ok'=>true]);
    exit;
}

// Cloudflare Turnstile verification
$token = $body['cf-turnstile-response'] ?? '';
if (!$token) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'CAPTCHA token missing.']);
    exit;
}

$verify = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
curl_setopt_array($verify, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query(['secret'=>TURNSTILE_SECRET_KEY,'response'=>$token]),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
]);
$result = curl_exec($verify);
curl_close($verify);
$tsData = json_decode($result, true);

if (!($tsData['success'] ?? false)) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'CAPTCHA verification failed.']);
    exit;
}

// Turnstile passed — now count this as a real submission
$_rl_data['count']++;
file_put_contents($_rl_file, json_encode($_rl_data), LOCK_EX);

// Sanitize inputs
$name    = substr(strip_tags($body['name']    ?? ''), 0, 200);
$email   = substr(strip_tags($body['email']   ?? ''), 0, 200);
$phone   = substr(strip_tags($body['phone']   ?? ''), 0, 50);
$company = substr(strip_tags($body['company'] ?? ''), 0, 200);
$service = substr(strip_tags($body['service'] ?? ''), 0, 100);
$message = substr(strip_tags($body['message'] ?? ''), 0, 5000);

if (!$name || !$email || !$message) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'Required fields missing.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['ok'=>false,'error'=>'Invalid email address.']);
    exit;
}

// Forward to Power Automate
$ch = curl_init(POWER_AUTOMATE_URL);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode(compact('name','email','phone','company','service','message')),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlErr  = curl_error($ch);
curl_close($ch);

if ($curlErr) {
    http_response_code(502);
    echo json_encode(['ok'=>false,'error'=>'Could not reach delivery service. Please email us directly.']);
    exit;
}

if ($httpCode === 200 || $httpCode === 202) {
    // Auto-responder confirmation email to submitter
    $from_name    = 'Leonidas Consulting';
    $from_addr    = 'noreply@leonidastek.com';
    $reply_to     = defined('COMPANY_EMAIL') ? COMPANY_EMAIL : 'sales@leonidastek.com';
    $subject      = 'We received your message — Leonidas';
    $service_line = $service ? "\n  Service of interest: {$service}" : '';
    $plain_body   = "Hi {$name},\n\nThank you for reaching out to Leonidas. We received your message and a member of our team will be in touch shortly.\n{$service_line}\n\nIn the meantime, you're welcome to call us directly:\n  Phone: " . COMPANY_PHONE . "\n  Email: {$reply_to}\n\n— The Leonidas Team\nleonidastek.com";
    $html_body    = '<!DOCTYPE html><html><body style="margin:0;padding:0;background:#f9fafb;font-family:Arial,sans-serif;">'
        . '<table width="100%" cellpadding="0" cellspacing="0"><tr><td align="center" style="padding:40px 20px;">'
        . '<table width="560" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;border:1px solid #e5e7eb;">'
        . '<tr><td style="background:#050510;padding:28px 32px;">'
        . '<span style="font-size:1.1rem;font-weight:800;letter-spacing:0.18em;color:#D4A843;">LEONIDAS</span>'
        . '</td></tr>'
        . '<tr><td style="padding:32px;">'
        . '<p style="margin:0 0 16px;font-size:1rem;color:#111827;">Hi ' . htmlspecialchars($name, ENT_QUOTES) . ',</p>'
        . '<p style="margin:0 0 16px;font-size:0.95rem;color:#374151;line-height:1.6;">Thank you for reaching out. We received your message and a member of our team will be in touch shortly.</p>'
        . ($service ? '<p style="margin:0 0 16px;font-size:0.9rem;color:#374151;"><strong>Service of interest:</strong> ' . htmlspecialchars($service, ENT_QUOTES) . '</p>' : '')
        . '<p style="margin:24px 0 8px;font-size:0.9rem;color:#374151;">In the meantime, you\'re welcome to reach us directly:</p>'
        . '<p style="margin:0 0 4px;font-size:0.9rem;color:#374151;"><strong>Phone:</strong> ' . COMPANY_PHONE . '</p>'
        . '<p style="margin:0 0 24px;font-size:0.9rem;color:#374151;"><strong>Email:</strong> ' . htmlspecialchars($reply_to, ENT_QUOTES) . '</p>'
        . '<p style="margin:0;font-size:0.875rem;color:#6b7280;">— The Leonidas Team</p>'
        . '</td></tr>'
        . '<tr><td style="background:#f9fafb;padding:16px 32px;border-top:1px solid #e5e7eb;">'
        . '<p style="margin:0;font-size:0.75rem;color:#9ca3af;">Leonidas Consulting &middot; 8219 Front Beach Rd Ste B #2080 &middot; Panama City Beach, FL 32407</p>'
        . '</td></tr></table></td></tr></table></body></html>';

    $mail_headers = implode("\r\n", [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $from_name . ' <' . $from_addr . '>',
        'Reply-To: ' . $reply_to,
        'X-Mailer: PHP/' . PHP_VERSION,
    ]);
    @mail($email, $subject, $html_body, $mail_headers);

    echo json_encode(['ok'=>true]);
} else {
    http_response_code(502);
    echo json_encode(['ok'=>false,'error'=>'Submission failed. Please call ' . COMPANY_PHONE . '.']);
}
