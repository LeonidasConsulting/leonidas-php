<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/lib/BlogManager.php';

header('Content-Type: application/rss+xml; charset=utf-8');

$blog  = new BlogManager(BLOG_JSON);
$posts = array_slice($blog->all(), 0, 20);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
  <title>Leonidas Blog — IT &amp; Cybersecurity Insights</title>
  <link><?= SITE_URL ?>/blog/</link>
  <description>Expert IT, cybersecurity, and unified communications insights for Florida Panhandle businesses.</description>
  <language>en-us</language>
  <atom:link href="<?= SITE_URL ?>/feed.xml" rel="self" type="application/rss+xml"/>
  <?php foreach ($posts as $post): ?>
  <item>
    <title><?= htmlspecialchars($post['title']) ?></title>
    <link><?= SITE_URL ?>/blog/<?= htmlspecialchars($post['slug']) ?></link>
    <guid isPermaLink="true"><?= SITE_URL ?>/blog/<?= htmlspecialchars($post['slug']) ?></guid>
    <pubDate><?= date('r', strtotime($post['date'] ?? 'now')) ?></pubDate>
    <description><?= htmlspecialchars($post['excerpt'] ?? substr(strip_tags($post['body'] ?? ''), 0, 300)) ?></description>
  </item>
  <?php endforeach; ?>
</channel>
</rss>
