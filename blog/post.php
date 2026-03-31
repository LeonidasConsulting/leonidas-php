<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/lib/BlogManager.php';

$blog = new BlogManager(BLOG_JSON);
$slug = preg_replace('/[^a-z0-9\-]/', '', $_GET['slug'] ?? '');
$post = $blog->findBySlug($slug);

if (!$post) {
    http_response_code(404);
    $page_title = '404 Not Found | Leonidas';
    $page_description = 'Page not found.';
    $page_url = SITE_URL . '/blog/';
    require_once dirname(__DIR__) . '/includes/header.php';
    echo '<section style="max-width:800px;margin:6rem auto;padding:0 1.5rem;text-align:center;"><h1 style="color:#FFFFFF;">Post Not Found</h1><a href="/blog/" style="color:#D4A843;">← Back to Blog</a></section>';
    require_once dirname(__DIR__) . '/includes/footer.php';
    exit;
}

$prev = $blog->prev($slug);
$next = $blog->next($slug);

$page_title       = htmlspecialchars($post['title']) . ' | Leonidas Blog';
$page_description = htmlspecialchars($post['excerpt'] ?? substr(strip_tags($post['body'] ?? ''), 0, 160));
$page_url         = SITE_URL . '/blog/' . $slug;
$json_ld = [
    '@context'       => 'https://schema.org',
    '@type'          => 'Article',
    'headline'       => $post['title'],
    'datePublished'  => $post['date'] ?? '',
    'author'         => ['@type' => 'Organization', 'name' => 'Leonidas'],
    'publisher'      => ['@type' => 'Organization', 'name' => 'Leonidas', 'url' => SITE_URL],
    'url'            => $page_url,
    'description'    => $post['excerpt'] ?? '',
];

require_once dirname(__DIR__) . '/includes/header.php';
?>

<article style="max-width:800px;margin:0 auto;padding:4rem 1.5rem;" itemscope itemtype="https://schema.org/Article">
  <a href="/blog/" style="font-size:0.82rem;color:#D4A843;text-decoration:none;display:inline-block;margin-bottom:2rem;">← Back to Blog</a>

  <?php if (!empty($post['category'])): ?>
  <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;display:block;margin-bottom:0.75rem;"><?= htmlspecialchars($post['category']) ?></span>
  <?php endif; ?>

  <h1 itemprop="headline" style="font-size:clamp(1.75rem,4vw,2.75rem);font-weight:800;color:#FFFFFF;line-height:1.2;margin-bottom:1.5rem;"><?= htmlspecialchars($post['title']) ?></h1>

  <div style="display:flex;gap:1.5rem;align-items:center;margin-bottom:3rem;padding-bottom:2rem;border-bottom:1px solid rgba(255,255,255,0.07);">
    <?php if (!empty($post['date'])): ?>
    <span style="font-size:0.8rem;color:#6B7280;" itemprop="datePublished" content="<?= $post['date'] ?>"><?= htmlspecialchars($post['date']) ?></span>
    <?php endif; ?>
    <span style="font-size:0.8rem;color:#6B7280;" itemprop="author">Leonidas</span>
  </div>

  <div itemprop="articleBody" style="color:#D1D5DB;line-height:1.85;font-size:1rem;">
    <?= nl2br(htmlspecialchars($post['body'] ?? '')) ?>
  </div>

  <nav style="margin-top:4rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;" aria-label="Post navigation">
    <?php if ($prev): ?>
    <a href="/blog/<?= htmlspecialchars($prev['slug']) ?>" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:0.75rem;padding:1rem;text-decoration:none;">
      <span style="font-size:0.7rem;color:#6B7280;display:block;margin-bottom:0.25rem;">← Previous</span>
      <span style="font-size:0.85rem;color:#FFFFFF;font-weight:600;"><?= htmlspecialchars($prev['title']) ?></span>
    </a>
    <?php else: ?><div></div><?php endif; ?>
    <?php if ($next): ?>
    <a href="/blog/<?= htmlspecialchars($next['slug']) ?>" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:0.75rem;padding:1rem;text-decoration:none;text-align:right;">
      <span style="font-size:0.7rem;color:#6B7280;display:block;margin-bottom:0.25rem;">Next →</span>
      <span style="font-size:0.85rem;color:#FFFFFF;font-weight:600;"><?= htmlspecialchars($next['title']) ?></span>
    </a>
    <?php endif; ?>
  </nav>

  <div style="margin-top:3rem;padding-top:2rem;border-top:1px solid rgba(255,255,255,0.07);text-align:center;">
    <p style="color:#9CA3AF;margin-bottom:1.5rem;">Ready to put these insights to work for your business?</p>
    <a href="/contact.php" class="btn-primary">Get a Free Assessment</a>
  </div>
</article>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
