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
    echo '<section style="max-width:800px;margin:6rem auto;padding:0 1.5rem;text-align:center;"><h1 style="color:#FFFFFF;">Post Not Found</h1><a href="' . htmlspecialchars($b) . '/blog/" style="color:#D4A843;">← Back to Blog</a></section>';
    require_once dirname(__DIR__) . '/includes/footer.php';
    exit;
}

$prev = $blog->prev($slug);
$next = $blog->next($slug);

$page_title       = htmlspecialchars($post['title']) . ' | Leonidas Blog';
$meta_description = htmlspecialchars($post['excerpt'] ?? substr(strip_tags($post['body'] ?? ''), 0, 160));
$canonical_url    = SITE_URL . '/blog/' . $slug;
$is_article       = true;

$json_ld_image = !empty($post['image']) ? SITE_URL . '/' . ltrim($post['image'], '/') : null;
if ($json_ld_image) {
    $og_image = $json_ld_image;
}
$og_title       = htmlspecialchars($post['title']) . ' | Leonidas Blog';
$og_description = $meta_description;
$json_ld = [
    '@context'      => 'https://schema.org',
    '@type'         => 'BlogPosting',
    'headline'      => $post['title'],
    'datePublished' => $post['date'] ?? '',
    'dateModified'  => $post['date'] ?? '',
    'author'        => ['@type' => 'Organization', 'name' => 'Leonidas', 'url' => SITE_URL],
    'publisher'     => ['@type' => 'Organization', 'name' => 'Leonidas', 'url' => SITE_URL],
    'url'           => $canonical_url,
    'description'   => $post['excerpt'] ?? '',
];
if ($json_ld_image) {
    $json_ld['image'] = $json_ld_image;
}
$page_json_ld = '<script type="application/ld+json">' . json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

$page_css = '
  .article-body { font-size: 1.05rem; line-height: 1.85; color: #D0D0D0; }
  .article-body h2 {
    font-size: 1.6rem; font-weight: 800; color: #FFFFFF;
    margin: 2.5rem 0 1rem; letter-spacing: -0.02em; line-height: 1.25;
  }
  .article-body h3 {
    font-size: 1.2rem; font-weight: 700; color: #FFFFFF;
    margin: 2rem 0 0.75rem; letter-spacing: -0.01em;
  }
  .article-body p { margin-bottom: 1.4rem; }
  .article-body ul, .article-body ol {
    margin: 1rem 0 1.4rem 1.5rem; display: flex; flex-direction: column; gap: 0.5rem;
  }
  .article-body li { color: #C8C8C8; }
  .article-body ul li::marker { color: #D4A843; }
  .article-body ol li::marker { color: #D4A843; font-weight: 700; }
  .article-body strong { color: #FFFFFF; font-weight: 700; }
  .article-body em { color: #D4A843; font-style: italic; }
  .article-body blockquote {
    border-left: 3px solid #D4A843; padding: 1rem 1.5rem;
    background: rgba(212,168,67,0.05); border-radius: 0 8px 8px 0;
    margin: 1.5rem 0; color: #E0E0E0; font-size: 1.1rem; font-style: italic;
  }
  .article-body .callout {
    background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px; padding: 1.5rem; margin: 2rem 0;
  }
  .article-body .callout-title {
    font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;
    color: #D4A843; margin-bottom: 0.75rem;
  }
';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<article style="max-width:800px;margin:0 auto;padding:4rem 1.5rem;" itemscope itemtype="https://schema.org/Article">
  <a href="<?= $b ?>/blog/" class="fade-in" style="font-size:0.82rem;color:#D4A843;text-decoration:none;display:inline-block;margin-bottom:2rem;">← Back to Blog</a>

  <?php if (!empty($post['category'])): ?>
  <span class="fade-in" style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;display:block;margin-bottom:0.75rem;"><?= htmlspecialchars($post['category']) ?></span>
  <?php endif; ?>

  <h1 class="fade-in" itemprop="headline" style="font-size:clamp(1.75rem,4vw,2.75rem);font-weight:800;color:#FFFFFF;line-height:1.2;margin-bottom:1.5rem;"><?= htmlspecialchars($post['title']) ?></h1>

  <div class="fade-in" style="display:flex;gap:1.5rem;align-items:center;margin-bottom:3rem;padding-bottom:2rem;border-bottom:1px solid rgba(255,255,255,0.07);">
    <?php if (!empty($post['date'])): ?>
    <span style="font-size:0.8rem;color:#6B7280;" itemprop="datePublished" content="<?= $post['date'] ?>"><?= htmlspecialchars($post['date']) ?></span>
    <?php endif; ?>
    <span style="font-size:0.8rem;color:#6B7280;" itemprop="author">Leonidas</span>
  </div>

  <div class="fade-in article-body" itemprop="articleBody">
    <?php if (!empty($post['body'])): ?>
      <?= $post['body'] ?>
    <?php else: ?>
      <?= BlogManager::generateBody($post) ?>
    <?php endif; ?>
  </div>

  <?php if (!empty($post['sources'])): ?>
  <div class="fade-in" style="margin-top:2.5rem;padding:1.25rem 1.5rem;background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.07);border-radius:0.75rem;">
    <div style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:#6B7280;margin-bottom:0.75rem;">Sources</div>
    <ul style="list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:0.4rem;">
      <?php foreach ($post['sources'] as $src): ?>
      <li style="font-size:0.82rem;"><a href="<?= htmlspecialchars($src['url']) ?>" target="_blank" rel="noopener noreferrer" style="color:#D4A843;text-decoration:none;opacity:0.8;"><?= htmlspecialchars($src['label']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>

  <nav class="fade-in" style="margin-top:4rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;" aria-label="Post navigation">
    <?php if ($prev): ?>
    <a href="<?= $b ?>/blog/<?= htmlspecialchars($prev['slug']) ?>" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:0.75rem;padding:1rem;text-decoration:none;">
      <span style="font-size:0.7rem;color:#6B7280;display:block;margin-bottom:0.25rem;">← Previous</span>
      <span style="font-size:0.85rem;color:#FFFFFF;font-weight:600;"><?= htmlspecialchars($prev['title']) ?></span>
    </a>
    <?php else: ?><div></div><?php endif; ?>
    <?php if ($next): ?>
    <a href="<?= $b ?>/blog/<?= htmlspecialchars($next['slug']) ?>" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.07);border-radius:0.75rem;padding:1rem;text-decoration:none;text-align:right;">
      <span style="font-size:0.7rem;color:#6B7280;display:block;margin-bottom:0.25rem;">Next →</span>
      <span style="font-size:0.85rem;color:#FFFFFF;font-weight:600;"><?= htmlspecialchars($next['title']) ?></span>
    </a>
    <?php endif; ?>
  </nav>

  <div class="fade-in" style="margin-top:3rem;padding-top:2rem;border-top:1px solid rgba(255,255,255,0.07);text-align:center;">
    <p style="color:#9CA3AF;margin-bottom:1.5rem;">Ready to put these insights to work for your business?</p>
    <a href="<?= $b ?>/contact" class="btn-primary">Get a Free Assessment</a>
  </div>
</article>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
