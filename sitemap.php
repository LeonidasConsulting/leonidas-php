<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/lib/BlogManager.php';

header('Content-Type: application/xml; charset=utf-8');

$blog  = new BlogManager(BLOG_JSON);
$posts = $blog->all();

$static_pages = [
    ['loc'=>'/', 'lastmod'=>'2026-04-05', 'changefreq'=>'weekly', 'priority'=>'1.0'],
    ['loc'=>'/about', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/blog/', 'lastmod'=>'2026-04-05', 'changefreq'=>'daily', 'priority'=>'0.9'],
    ['loc'=>'/contact', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/services/managed-it', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/cybersecurity', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/network-engineering', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/unified-communications', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/telecom-wan', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/services/desktop-support', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.8'],
    ['loc'=>'/industries/healthcare', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/industries/legal', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/industries/construction', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/industries/hospitality', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/industries/government-contractors', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/industries/professional-services', 'lastmod'=>'2026-04-03', 'changefreq'=>'monthly', 'priority'=>'0.7'],
    ['loc'=>'/privacy-policy', 'lastmod'=>'2026-04-03', 'changefreq'=>'yearly', 'priority'=>'0.2'],
    ['loc'=>'/terms-and-conditions', 'lastmod'=>'2026-04-03', 'changefreq'=>'yearly', 'priority'=>'0.2'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($static_pages as $p) {
    echo '<url><loc>'.SITE_URL.$p['loc'].'</loc><lastmod>'.$p['lastmod'].'</lastmod><changefreq>'.$p['changefreq'].'</changefreq><priority>'.$p['priority'].'</priority></url>';
}
foreach ($posts as $post) {
    echo '<url><loc>'.SITE_URL.'/blog/'.htmlspecialchars($post['slug']).'</loc><lastmod>'.htmlspecialchars($post['date'] ?? date('Y-m-d')).'</lastmod><changefreq>yearly</changefreq><priority>0.6</priority></url>';
}
echo '</urlset>';
