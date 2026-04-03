# Homepage Updates

Apply two targeted fixes to `index.php`:

1. **Remove duplicate hero stats** — Delete the inline stat block inside the hero left column (20+ / 300+ / 6). The stats strip below the hero (the one with "Panhandle / Florida Focused") stays untouched.

2. **Add dynamic "From the Blog" section** — Read `content/blog-posts.json`, sort by date descending, display the 3 most recent posts as a card grid above the final CTA section. This section auto-updates whenever new posts are added to the JSON.

---

## Step 1 — Verify file paths

Run this Python to confirm the files exist before making changes:

```python
import os

index_php = os.path.join(os.path.dirname(os.path.abspath(__file__)), '..', '..', 'index.php')
blog_json = os.path.join(os.path.dirname(os.path.abspath(__file__)), '..', '..', '..', 'content', 'blog-posts.json')

index_php = os.path.normpath(index_php)
blog_json  = os.path.normpath(blog_json)

print("index.php exists:", os.path.exists(index_php), "→", index_php)
print("blog-posts.json exists:", os.path.exists(blog_json), "→", blog_json)
```

If either file is missing, stop and report the correct paths.

---

## Step 2 — Remove duplicate hero stats block

The block to remove is the `<div>` that starts with `fade-in fade-in-delay-4 flex gap-8 mt-12 pt-10` and contains the three mini-stats (20+, 300+, 6) inside the hero left column. It ends just before `</div>` that closes the hero left column.

Remove **exactly** this block (and nothing else):

```
          <div class="fade-in fade-in-delay-4 flex gap-8 mt-12 pt-10" style="border-top:1px solid rgba(255,255,255,0.06);">
            <div>
              <div class="stat-number"><span data-count="20" data-suffix="+">20+</span></div>
              <div class="stat-label">Years Experience</div>
            </div>
            <div style="width:1px; background:rgba(255,255,255,0.07);"></div>
            <div>
              <div class="stat-number"><span data-count="300" data-suffix="+">300+</span></div>
              <div class="stat-label">Vendor Partners</div>
            </div>
            <div style="width:1px; background:rgba(255,255,255,0.07);"></div>
            <div>
              <div class="stat-number"><span data-count="6" data-suffix="">6</span></div>
              <div class="stat-label">Service Lines</div>
            </div>
          </div>
```

Use Python for the replacement — do a literal string match and remove, then write the file back. **Do not touch any other part of the file.**

```python
import re

with open(index_php, 'r', encoding='utf-8') as f:
    content = f.read()

# The exact block to remove
HERO_STATS_BLOCK = '''          <div class="fade-in fade-in-delay-4 flex gap-8 mt-12 pt-10" style="border-top:1px solid rgba(255,255,255,0.06);">
            <div>
              <div class="stat-number"><span data-count="20" data-suffix="+">20+</span></div>
              <div class="stat-label">Years Experience</div>
            </div>
            <div style="width:1px; background:rgba(255,255,255,0.07);"></div>
            <div>
              <div class="stat-number"><span data-count="300" data-suffix="+">300+</span></div>
              <div class="stat-label">Vendor Partners</div>
            </div>
            <div style="width:1px; background:rgba(255,255,255,0.07);"></div>
            <div>
              <div class="stat-number"><span data-count="6" data-suffix="">6</span></div>
              <div class="stat-label">Service Lines</div>
            </div>
          </div>'''

if HERO_STATS_BLOCK in content:
    content = content.replace(HERO_STATS_BLOCK, '')
    print("✅ Hero stats block removed.")
else:
    print("⚠️  Hero stats block NOT found — check index.php for exact whitespace/content.")
    # Do NOT write if block wasn't found
    exit(1)

with open(index_php, 'w', encoding='utf-8') as f:
    f.write(content)
```

---

## Step 3 — Add dynamic "From the Blog" section

Insert the following PHP block into `index.php` immediately **before** the line `include 'includes/footer.php';` (or `include 'includes/footer.php';` with any spacing).

Use Python to find that line and inject the blog section just above it:

```python
with open(index_php, 'r', encoding='utf-8') as f:
    content = f.read()

BLOG_SECTION = r"""
  <!-- FROM THE BLOG -->
<?php
  $blog_json_path = __DIR__ . '/../content/blog-posts.json';
  $blog_posts     = [];
  if (file_exists($blog_json_path)) {
      $raw = json_decode(file_get_contents($blog_json_path), true);
      if (is_array($raw)) {
          // Sort descending by date
          usort($raw, fn($a, $b) => strcmp($b['date'] ?? '', $a['date'] ?? ''));
          $blog_posts = array_slice($raw, 0, 3);
      }
  }
  $month_names = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April',
                  '05'=>'May','06'=>'June','07'=>'July','08'=>'August',
                  '09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
  function fmt_blog_date($date_str, $months) {
      $parts = explode('-', $date_str);
      if (count($parts) >= 2) {
          return ($months[$parts[1]] ?? '') . ' ' . $parts[0];
      }
      return $date_str;
  }
?>
<?php if (!empty($blog_posts)): ?>
  <section class="section-padding" style="border-top:1px solid rgba(255,255,255,0.06);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16">
        <div class="section-label">Latest Thinking</div>
        <h2 class="section-h2 heading-underline">From the Blog</h2>
      </div>
      <div class="grid gap-8 md:grid-cols-3">
        <?php foreach ($blog_posts as $post):
          $slug     = htmlspecialchars($post['slug'] ?? '');
          $title    = htmlspecialchars($post['title'] ?? 'Untitled');
          $category = htmlspecialchars($post['category'] ?? '');
          $date_fmt = fmt_blog_date($post['date'] ?? '', $month_names);
          $post_url = $b . '/blog/post.php?slug=' . urlencode($post['slug'] ?? '');
        ?>
        <a href="<?= $post_url ?>" class="card" style="display:block; padding:2rem; text-decoration:none; transition:transform 0.2s ease, border-color 0.2s ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.borderColor='rgba(212,168,67,0.4)'" onmouseout="this.style.transform='';this.style.borderColor=''">
          <?php if ($category): ?>
          <div style="display:inline-block; font-size:0.7rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#D4A843; background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.25); border-radius:20px; padding:3px 10px; margin-bottom:1rem;"><?= $category ?></div>
          <?php endif; ?>
          <h3 style="font-size:1.1rem; font-weight:600; color:#FFFFFF; line-height:1.4; margin-bottom:0.75rem;"><?= $title ?></h3>
          <div style="font-size:0.8rem; color:#6B7280; margin-bottom:1.25rem;"><?= $date_fmt ?></div>
          <div style="font-size:0.875rem; color:#D4A843; font-weight:500;">Read more →</div>
        </a>
        <?php endforeach; ?>
      </div>
      <div class="text-center mt-12">
        <a href="<?= $b ?>/blog/" class="btn-ghost">View all posts →</a>
      </div>
    </div>
  </section>
<?php endif; ?>

"""

# Insert just before the footer include line
FOOTER_INCLUDE = "include 'includes/footer.php';"
if FOOTER_INCLUDE in content:
    content = content.replace(FOOTER_INCLUDE, BLOG_SECTION + FOOTER_INCLUDE, 1)
    print("✅ 'From the Blog' section inserted before footer include.")
else:
    # Try alternate spacing
    FOOTER_INCLUDE_ALT = 'include("includes/footer.php");'
    if FOOTER_INCLUDE_ALT in content:
        content = content.replace(FOOTER_INCLUDE_ALT, BLOG_SECTION + FOOTER_INCLUDE_ALT, 1)
        print("✅ 'From the Blog' section inserted before footer include (alternate form).")
    else:
        print("⚠️  Could not find footer include line. Search for it manually.")
        exit(1)

with open(index_php, 'w', encoding='utf-8') as f:
    f.write(content)
```

---

## Step 4 — Verify

1. Open `index.php` in the editor and confirm:
   - The hero left column no longer has the `fade-in-delay-4 flex gap-8 mt-12` stats block
   - A new `<!-- FROM THE BLOG -->` section exists above the footer include
   - The stats strip (`<!-- STATS STRIP -->` or similar) below the hero is **unchanged**

2. Test in a browser — the homepage should show exactly **one** set of stats (the 4-column strip with Panhandle / Florida Focused), and a "From the Blog" card grid with 3 posts above the footer.

3. To add new blog posts in the future: simply add entries to `content/blog-posts.json`. The PHP will automatically pick up the 3 most recent on the next page load — no need to re-run this command.

---

## Notes on skills / efficiency

No plugin in the marketplace matched PHP development directly. If you find yourself rebuilding PHP pages frequently, consider running `/skill-creator` to build a **Leonidas PHP skill** — it can encode the SITE_BASE pattern, card/section markup, and color palette so future page builds are one command instead of copy-paste.
