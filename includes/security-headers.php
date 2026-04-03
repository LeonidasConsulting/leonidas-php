<?php
/**
 * HTTP Security Headers — included at top of every page.
 */
if (!defined('SITE_URL')) {
    require_once __DIR__ . '/config.php';
}

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=()');

header(implode('', [
    "Content-Security-Policy: ",
    "default-src 'self'; ",
    "script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://www.googletagmanager.com https://www.google-analytics.com https://connect.facebook.net https://challenges.cloudflare.com; ",
    "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; ",
    "font-src 'self' https://fonts.gstatic.com; ",
    "img-src 'self' data: https: https://www.facebook.com; ",
    "connect-src 'self' https://api.anthropic.com https://*.powerplatform.com https://www.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net https://challenges.cloudflare.com; ",
    "frame-src https://www.google.com https://challenges.cloudflare.com; ",
    "form-action 'self'; ",
    "base-uri 'self'; ",
    "object-src 'none'",
]));

header_remove('X-Powered-By');
header_remove('Server');
