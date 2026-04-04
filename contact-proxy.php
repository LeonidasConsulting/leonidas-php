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

// Forward to Power Automate (include reply_to so the flow can send a confirmation email)
$payload = compact('name','email','phone','company','service','message');
$payload['reply_to'] = $email;
$ch = curl_init(POWER_AUTOMATE_URL);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($payload),
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
    echo json_encode(['ok'=>true]);
} else {
    http_response_code(502);
    echo json_encode(['ok'=>false,'error'=>'Submission failed. Please call ' . COMPANY_PHONE . '.']);
}
