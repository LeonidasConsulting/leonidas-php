<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/lib/BlogManager.php';

header('Content-Type: application/xml; charset=utf-8');

$blog  = new BlogManager(BLOG_JSON);
$posts = $blog->all();

$static_pages = [
    ['loc'=>'/', 'changefreq'=>'weekly', 'priority'=>'1.0'],
    ['loc'=>'/about', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/blog/', 'changefreq'=>'daily', 'priority'=>'0.9'],
    ['loc'=>'/contact', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/services/managed-it', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/cybersecurity', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/network-engineering', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/unified-communications', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/telecom-wan', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/desktop-support', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/privacy-policy', 'changefreq'=>'yearly', 'priority'=>'0.2'],
    ['loc'=>'/terms-and-conditions', 'changefreq'=>'yearly', 'priority'=>'0.2'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($static_pages as $p) {
    echo '<url><loc>'.SITE_URL.$p['loc'].'</loc><changefreq>'.$p['changefreq'].'</changefreq><priority>'.$p['priority'].'</priority></url>';
}
foreach ($posts as $post) {
    echo '<url><loc>'.SITE_URL.'/blog/'.htmlspecialchars($post['slug']).'</loc><lastmod>'.htmlspecialchars($post['date'] ?? date('Y-m-d')).'</lastmod><changefreq>yearly</changefreq><priority>0.6</priority></url>';
}
echo '</urlset>';
