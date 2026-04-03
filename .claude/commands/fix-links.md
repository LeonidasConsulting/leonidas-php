# Fix All Internal Links — SITE_BASE Patch

> **Claude Code command.** Run this after uploading the new `includes/config.php`, `includes/header.php`, `includes/footer.php`, and `index.php`. This command patches every remaining PHP page to use `SITE_BASE` for all internal links, so the site works correctly at `/leonidas-php/` for testing and at `/` for production.

---

## What this command does

1. Adds `require_once` for config.php + `$b = SITE_BASE;` near the top of every page PHP file
2. Replaces every root-relative internal link (`href="/..."`) with `href="<?= $b ?>/..."`
3. Fixes any remaining `.html` extension links that should be `.php`
4. Skips files that are already patched (idempotent — safe to run multiple times)

---

## Files this command patches

Every `.php` file in:
- `about.php`
- `contact.php`
- `privacy-policy.php`
- `terms-and-conditions.php`
- `404.php`
- `services/managed-it.php`
- `services/cybersecurity.php`
- `services/network-engineering.php`
- `services/unified-communications.php`
- `services/telecom-wan.php`
- `services/desktop-support.php`
- `industries/healthcare.php`
- `industries/legal.php`
- `industries/construction.php`
- `industries/hospitality.php`
- `industries/government-contractors.php`
- `industries/professional-services.php`
- `blog/index.php`
- `blog/post.php`
- `sitemap.php`
- `feed.php`

---

## Claude Code: Run this Python script now

```python
import re, os, glob

ROOT = os.getcwd()  # should be leonidas-php/

# Files to patch — all PHP page files except includes/ and chat/
SKIP_DIRS = {'includes', 'chat', '.claude', 'vendor', 'node_modules'}
SKIP_FILES = {'sitemap.php', 'feed.php', 'contact-proxy.php'}

def should_skip(path):
    parts = path.replace(ROOT, '').lstrip('/\\').split(os.sep)
    if parts[0] in SKIP_DIRS:
        return True
    if os.path.basename(path) in SKIP_FILES:
        return True
    return False

php_files = []
for f in glob.glob(ROOT + '/**/*.php', recursive=True):
    if not should_skip(f):
        php_files.append(f)

# Sort for deterministic order
php_files.sort()
print(f"Found {len(php_files)} page PHP files to patch")

patched = []
already_done = []
errors = []

for filepath in php_files:
    relpath = os.path.relpath(filepath, ROOT)
    depth = relpath.count(os.sep)  # 0 for root, 1 for services/, etc.

    # Build the correct relative path to includes/config.php
    if depth == 0:
        config_path = "'includes/config.php'"
        footer_path = "'includes/footer.php'"
        header_path = "'includes/header.php'"
    else:
        prefix = '../' * depth
        config_path = f"'{prefix}includes/config.php'"
        footer_path = f"'{prefix}includes/footer.php'"
        header_path = f"'{prefix}includes/header.php'"

    try:
        with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
            original = f.read()
    except Exception as e:
        errors.append((relpath, str(e)))
        continue

    content = original

    # ── Skip if already fully patched ──────────────────────────────────────
    if 'SITE_BASE' in content and "<?= $b ?>" in content:
        already_done.append(relpath)
        continue

    # ── 1. Inject config require near top of file ───────────────────────────
    # Insert after the opening <?php line (skip if already there)
    if 'require_once' not in content or 'config.php' not in content:
        # Insert right after opening <?php tag
        content = re.sub(
            r'^<\?php\s*\n',
            f'<?php\nrequire_once __DIR__ . \'/.build_path_placeholder\';\n$b = SITE_BASE;\n',
            content,
            count=1,
            flags=re.MULTILINE
        )
        # Fix the placeholder with the actual computed depth-relative path
        import_line = f"require_once __DIR__ . '/{('../' * depth)}includes/config.php'"
        content = content.replace(
            "require_once __DIR__ . '/.build_path_placeholder'",
            import_line,
            1
        )
    elif '$b' not in content:
        # config already included but $b shorthand missing — add it
        content = content.replace(
            "require_once __DIR__",
            "$b = SITE_BASE;\nrequire_once __DIR__",
            1
        )

    # ── 2. Replace root-relative internal hrefs ──────────────────────────────
    # href="/ → href="<?= $b ?>/   (skip http, https, tel, mailto, #)
    content = re.sub(r'href="(/(?![/]))', r'href="<?= $b ?>\1', content)

    # ── 3. Fix any remaining .html internal links → .php ────────────────────
    # Only for known page names — don't touch external URLs
    html_to_php = [
        'about', 'contact', 'privacy-policy', 'terms-and-conditions', '404',
        'managed-it', 'cybersecurity', 'network-engineering',
        'unified-communications', 'telecom-wan', 'desktop-support',
        'healthcare', 'legal', 'construction', 'hospitality',
        'government-contractors', 'professional-services',
    ]
    for page in html_to_php:
        content = content.replace(f'{page}.html"', f'{page}.php"')
        content = content.replace(f'{page}.html\'', f'{page}.php\'')

    # ── 4. Fix blog/index.html → blog/ ──────────────────────────────────────
    content = content.replace('blog/index.html"', 'blog/"')
    content = content.replace("blog/index.html'", "blog/'")

    # ── 5. Fix assets src paths ──────────────────────────────────────────────
    content = re.sub(r'src="(/assets/)', r'src="<?= $b ?>\1', content)
    content = re.sub(r'src="(/content/)', r'src="<?= $b ?>\1', content)

    if content == original:
        already_done.append(relpath + ' [no changes needed]')
        continue

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

    patched.append(relpath)

print("\n✅ PATCHED:")
for p in patched: print(f"  {p}")
print(f"\n⏭  Already done / no changes:")
for p in already_done: print(f"  {p}")
if errors:
    print(f"\n❌ ERRORS:")
    for p, e in errors: print(f"  {p}: {e}")
print(f"\nDone. {len(patched)} files patched, {len(already_done)} skipped, {len(errors)} errors.")
```

## After running

Upload **all changed PHP files** from `leonidas-php/` to GoDaddy — everything except:
- `includes/config.php` ← do NOT overwrite this, it has your API keys
  - Instead, just open your live config.php in GoDaddy File Manager and **add one line** at the top:
    ```php
    define('SITE_BASE', '/leonidas-php');
    ```
- `node_modules/`, `.git/` — never upload these

## Go live (when testing is done)

Change `includes/config.php` on GoDaddy:
```php
define('SITE_BASE', '/leonidas-php');   // ← testing
// to:
define('SITE_BASE', '');               // ← production (root)
```
Then copy all `leonidas-php/` files to `public_html/` root. Done.
