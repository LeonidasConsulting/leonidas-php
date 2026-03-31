<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$page_title = '404 — Page Not Found | Leonidas';
$page_description = 'The page you were looking for could not be found.';
$page_url = SITE_URL . '/404';
require_once __DIR__ . '/includes/header.php';
?>
<section style="max-width:800px;margin:8rem auto;padding:0 1.5rem;text-align:center;">
  <p style="font-size:0.85rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;margin-bottom:1rem;">404</p>
  <h1 style="font-size:clamp(2rem,5vw,3.5rem);font-weight:800;color:#FFFFFF;line-height:1.15;margin-bottom:1.5rem;">Page Not Found</h1>
  <p style="font-size:1.1rem;color:#9CA3AF;margin-bottom:2.5rem;">The page you were looking for doesn't exist or has been moved.</p>
  <a href="/" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.875rem 2rem;background:#D4A843;color:#0A0A1A;font-weight:700;font-size:0.9rem;border-radius:0.5rem;text-decoration:none;">← Back to Home</a>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
