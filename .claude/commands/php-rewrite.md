# Leonidas PHP Site — Standalone Repo Build & GoDaddy Deploy

> **Claude Code command.** When the user tells you to perform a task from this file, execute it directly using bash/PowerShell commands — do not ask the user to run commands themselves. Approve any PowerShell prompts as they come. This file is the single source of truth for building the new `leonidas-php` repository and deploying it to GoDaddy via SFTP.

---

## How to Use This With Claude Code

The user will tell Claude Code what to do in plain English. Here is how Claude Code should interpret common requests:

| What the user says | What Claude Code does |
|---|---|
| "Fix the subdirectory display" | Run the Subdirectory Fix section below |
| "Compile Tailwind" | Run Step 11 |
| "Fix the styling" | Run Step 11 (compile Tailwind) then verify asset paths |
| "Initialize the new repo" | Run Step 0 — create `leonidas-php/` sibling dir, `git init`, `.gitignore` |
| "Build the project structure" | Run Steps 1–4 — create all directories and config/security/helper files |
| "Build the header and footer" | Run Step 5 — write `includes/header.php` and `includes/footer.php` |
| "Build the homepage" | Run Step 6 — read `../leonidas-site/index.html`, convert to `index.php` |
| "Build the about page" | Run Step 7 — read `../leonidas-site/about.html`, convert to `about.php` |
| "Build all service pages" | Run Step 8 — convert all 6 service HTML files to PHP |
| "Build the blog" | Run Step 9 — write BlogManager, `blog/index.php`, `blog/post.php` |
| "Build the contact page" | Run Step 10 — convert contact.html, write contact-proxy.php |
| "Set up Tailwind" | Run Step 11 — write `package.json`, `tailwind.config.js`, compile CSS |
| "Build the sitemap and feed" | Run Step 12 — write `sitemap.php` and `feed.php` |
| "Set up the htaccess" | Run Step 13 — write `.htaccess` with security headers + URL rewrites |
| "What do I need to upload?" | Print the SFTP Upload Checklist from Step 14 |
| "What files do I NOT upload?" | Print the Excluded Files section from Step 14 |
| "Build everything" | Run Steps 0–13 in order |

---

---

## 🔧 Subdirectory Testing Fix

> Run this if the site is deployed at a path like `https://leonidastek.com/leonidas-php/` and styles/images are broken.
> The root cause: all asset paths start with `/` which resolves to the domain root, not the subdirectory.
> The fix: add a `SITE_BASE` constant so every asset path is prefixed correctly.

### Fix 1: Add `SITE_BASE` to `includes/config.php`

Add these two lines near the top of `includes/config.php`:

```php
// Set to '/leonidas-php' for subdirectory testing, '' for production at root
define('SITE_BASE', '/leonidas-php');
```

When you go live at the root, change it to:
```php
define('SITE_BASE', '');
```

### Fix 2: Update all asset paths in `includes/header.php`

Claude Code: find every hardcoded absolute path in `includes/header.php` and prefix it with `<?= SITE_BASE ?>`. Specifically replace:

```html
<link rel="stylesheet" href="/assets/css/tailwind.min.css"/>
<link rel="stylesheet" href="/assets/mobile.css"/>
<link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png"/>
<link rel="manifest" href="/assets/site.webmanifest"/>
```

With:

```html
<link rel="stylesheet" href="<?= SITE_BASE ?>/assets/css/tailwind.min.css"/>
<link rel="stylesheet" href="<?= SITE_BASE ?>/assets/mobile.css"/>
<link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_BASE ?>/assets/apple-touch-icon.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_BASE ?>/assets/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_BASE ?>/assets/favicon-16x16.png"/>
<link rel="manifest" href="<?= SITE_BASE ?>/assets/site.webmanifest"/>
```

Also update the logo image in the nav:
```html
<!-- BEFORE -->
<img src="/content/images/LeoHelmet132.png" .../>
<!-- AFTER -->
<img src="<?= SITE_BASE ?>/content/images/LeoHelmet132.png" .../>
```

And all nav href values — replace every `/services/`, `/about`, `/blog/`, `/contact` link in the nav with `<?= SITE_BASE ?>/services/` etc.

### Fix 3: Compile Tailwind CSS

The most likely reason styles are completely missing is that `assets/css/tailwind.min.css` was never generated. Claude Code: run this from inside `leonidas-php/`:

```powershell
# Install dependencies if not already done
npm install

# Compile Tailwind
npx tailwindcss -i ./assets/input.css -o ./assets/css/tailwind.min.css --minify
```

If `assets/input.css` doesn't exist yet, create it first:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

And if `tailwind.config.js` doesn't exist:
```js
module.exports = {
  content: ['./**/*.php', './**/*.html'],
  theme: { extend: {} },
  plugins: [],
}
```

### Fix 4: Upload the corrected files to GoDaddy

After making the above fixes, upload only the changed files — not the entire folder again:

```
Re-upload these files only:
  includes/config.php         ← updated SITE_BASE value
  includes/header.php         ← updated asset paths
  assets/css/tailwind.min.css ← newly compiled CSS (this is the big one)
```

Use GoDaddy File Manager → navigate to `public_html/leonidas-php/` → upload each file, overwriting the existing one.

### Cutover to Production (when testing looks good)

1. In `includes/config.php`, change `define('SITE_BASE', '/leonidas-php');` → `define('SITE_BASE', '');`
2. Upload all `leonidas-php/` files into `public_html/` root (not into the subfolder)
3. Upload `.htaccess` last — this flips the live site to PHP
4. Delete or rename the old HTML files (or leave them — the 301 redirects in `.htaccess` will handle them)

---

## ⚠️ Feature Preservation — Read Before Starting

The original site has **4 features that were easy to miss** in a rewrite. These are documented below with the exact fix already written in. Do not skip any of them.

### Gap 0: Google Analytics 4 + GTM + Facebook Pixel — CRITICAL

**GA4 is live on all 20 pages with tracking ID `G-0QWBBHBJLR`.** Dropping this from the PHP header would silently break all analytics. GTM (`GTM-XXXXXXX`) and Facebook Pixel (`YOUR_PIXEL_ID`) are placeholder-configured on every page and must be preserved in the header template so they can be activated without a redeploy.

**Add to `includes/config.php`:**
```php
// Analytics — GA4 is live; GTM and FB Pixel are configured, awaiting real IDs
define('GA4_MEASUREMENT_ID', 'G-0QWBBHBJLR');
define('GTM_CONTAINER_ID',   'GTM-XXXXXXX');    // Replace with real GTM ID when available
define('FB_PIXEL_ID',        'YOUR_PIXEL_ID');  // Replace with real Pixel ID when available
```

**Add to `includes/header.php`, inside `<head>` after the canonical tag:**
```php
<?php if (GA4_MEASUREMENT_ID): ?>
<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA4_MEASUREMENT_ID ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?= GA4_MEASUREMENT_ID ?>');
</script>
<?php endif; ?>

<?php if (GTM_CONTAINER_ID && GTM_CONTAINER_ID !== 'GTM-XXXXXXX'): ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?= GTM_CONTAINER_ID ?>');</script>
<?php endif; ?>

<?php if (FB_PIXEL_ID && FB_PIXEL_ID !== 'YOUR_PIXEL_ID'): ?>
<!-- Facebook Pixel -->
<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','<?= FB_PIXEL_ID ?>');fbq('track','PageView');</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?= FB_PIXEL_ID ?>&ev=PageView&noscript=1"/></noscript>
<?php endif; ?>
```

**Also add GTM noscript tag to `includes/header.php` immediately after `<body>`:**
```php
<?php if (GTM_CONTAINER_ID && GTM_CONTAINER_ID !== 'GTM-XXXXXXX'): ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= GTM_CONTAINER_ID ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>
```

**CSP in `includes/security-headers.php` must include analytics domains:**
```php
"script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://connect.facebook.net https://challenges.cloudflare.com; ",
"connect-src 'self' https://api.anthropic.com https://*.powerplatform.com https://www.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net https://challenges.cloudflare.com; ",
"img-src 'self' data: https: https://www.facebook.com; ",
"frame-src https://www.google.com https://challenges.cloudflare.com; ",
```

---

### Gap 1: `assets/mobile.css` Must Be Linked in Header

Every existing page links `<link rel="stylesheet" href="/assets/mobile.css">`. This 294-line file handles mobile typography scaling, iPhone safe-area insets, hero stacking, and reduced-motion overrides. **Omitting it breaks phones.**

**Fix:** In `includes/header.php`, after the Tailwind stylesheet link:
```html
<link rel="stylesheet" href="/assets/mobile.css"/>
```

---

### Gap 2: Mobile Hamburger Menu in Nav

The nav must include a hamburger toggle for mobile — without it, phone visitors have no navigation at all.

**Complete mobile-aware nav block for `includes/header.php`:**
```php
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;border-bottom:1px solid rgba(255,255,255,0.05);backdrop-filter:blur(12px);background:rgba(10,10,26,0.9);" aria-label="Main navigation">
  <div style="max-width:1280px;margin:0 auto;padding:0 1.5rem;display:flex;align-items:center;justify-content:space-between;height:4rem;">
    <a href="/" style="display:flex;align-items:center;gap:0.75rem;text-decoration:none;" aria-label="Leonidas — Home">
      <img src="/content/images/LeoHelmet132.png" alt="Leonidas Spartan helmet logo" width="36" height="36" style="height:2.25rem;width:auto;"/>
      <span style="font-weight:800;font-size:1.1rem;letter-spacing:0.02em;color:#FFFFFF;">LEONIDAS</span>
    </a>

    <!-- Desktop nav -->
    <div class="hidden md:flex" style="align-items:center;gap:2rem;">
      <!-- Services dropdown -->
      <div style="position:relative;">
        <button style="font-size:0.85rem;font-weight:500;color:#9CA3AF;background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:0.3rem;padding:0;"
                aria-haspopup="true" aria-expanded="false" id="servicesBtn">
          Services
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div id="servicesDropdown" style="display:none;position:absolute;top:calc(100% + 0.5rem);left:0;min-width:200px;background:#12122A;border:1px solid rgba(212,168,67,0.15);border-radius:0.75rem;padding:0.5rem;z-index:100;box-shadow:0 16px 40px rgba(0,0,0,0.5);">
          <?php
          $dropdown_services = [
            'Managed IT'             => '/services/managed-it.php',
            'Cybersecurity'          => '/services/cybersecurity.php',
            'Network Engineering'    => '/services/network-engineering.php',
            'Unified Communications' => '/services/unified-communications.php',
            'Telecom & WAN'          => '/services/telecom-wan.php',
            'Desktop Support'        => '/services/desktop-support.php',
          ];
          foreach ($dropdown_services as $label => $href): ?>
          <a href="<?= $href ?>" style="display:block;padding:0.5rem 0.75rem;font-size:0.82rem;color:#9CA3AF;text-decoration:none;border-radius:0.375rem;"
             onmouseover="this.style.background='rgba(212,168,67,0.08)';this.style.color='#D4A843'"
             onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><?= $label ?></a>
          <?php endforeach; ?>
        </div>
        <script>
        (function(){
          var btn=document.getElementById('servicesBtn'),dd=document.getElementById('servicesDropdown');
          if(!btn||!dd)return;
          btn.addEventListener('click',function(e){e.stopPropagation();var o=dd.style.display==='block';dd.style.display=o?'none':'block';btn.setAttribute('aria-expanded',!o);});
          document.addEventListener('click',function(){dd.style.display='none';});
        })();
        </script>
      </div>
      <?php
      $top_links = ['About'=>'/about.php','Blog'=>'/blog/','Contact'=>'/contact.php'];
      foreach ($top_links as $label => $href):
        $is_active = (strpos($current_path, parse_url($href, PHP_URL_PATH)) === 0);
      ?>
      <a href="<?= $href ?>" style="font-size:0.85rem;font-weight:500;color:<?= $is_active ? '#D4A843' : '#9CA3AF' ?>;text-decoration:none;transition:color 0.2s;"
         <?= $is_active ? 'aria-current="page"' : '' ?>><?= $label ?></a>
      <?php endforeach; ?>
    </div>

    <a href="/contact.php" class="btn-primary hidden md:inline-flex" style="padding:0.6rem 1.25rem;font-size:0.8rem;">Free Assessment</a>

    <!-- Mobile hamburger -->
    <button id="mobile-menu-btn" class="md:hidden p-2" aria-label="Toggle menu" aria-expanded="false"
            style="color:#D4A843;background:none;border:none;cursor:pointer;">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <line x1="2" y1="6" x2="20" y2="6"/>
        <line x1="2" y1="11" x2="20" y2="11"/>
        <line x1="2" y1="16" x2="20" y2="16"/>
      </svg>
    </button>
  </div>

  <!-- Mobile drawer -->
  <div id="mobile-menu" class="hidden md:hidden" style="border-top:1px solid rgba(212,168,67,0.08);background:rgba(10,10,26,0.98);">
    <div style="padding:1.25rem 1.5rem;display:flex;flex-direction:column;gap:0.25rem;">
      <a href="/about.php"                           style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.9rem;color:#9CA3AF;text-decoration:none;">About</a>
      <a href="/services/managed-it.php"             style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Managed IT</a>
      <a href="/services/cybersecurity.php"          style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Cybersecurity</a>
      <a href="/services/network-engineering.php"    style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Network Engineering</a>
      <a href="/services/unified-communications.php" style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Unified Communications</a>
      <a href="/services/telecom-wan.php"            style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Telecom & WAN</a>
      <a href="/services/desktop-support.php"        style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Desktop Support</a>
      <a href="/blog/"                               style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.9rem;color:#9CA3AF;text-decoration:none;">Blog</a>
      <a href="/contact.php"                         style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.9rem;color:#9CA3AF;text-decoration:none;">Contact</a>
      <a href="/contact.php" class="btn-primary mt-3" style="justify-content:center;text-align:center;">Free Assessment</a>
    </div>
  </div>
  <script>
  (function(){
    var btn=document.getElementById('mobile-menu-btn'),menu=document.getElementById('mobile-menu');
    if(!btn||!menu)return;
    btn.addEventListener('click',function(){var open=menu.classList.toggle('hidden');btn.setAttribute('aria-expanded',!open);});
  })();
  </script>
</nav>
<main style="padding-top:4rem;">
```

---

### Gap 3: Blog AI Assistant Widget in `blog/index.php`

The blog index has a dedicated AI panel that calls `/chat/blog-api.php`. Build a `BLOG_MANIFEST` string (category|title|slug per post) and inject it into the page for the widget.

**In `blog/index.php`, after the stats row and before the post grid:**
```php
<?php
$manifest = implode("\n", array_map(
    fn($p) => ($p['category'] ?? 'General') . '|' . $p['title'] . '|' . $p['slug'],
    $blog->all()
));
?>
<section style="max-width:1280px;margin:0 auto;padding:0 1.5rem 3rem;">
  <div id="blogAssistant" style="background:rgba(255,255,255,0.02);border:1px solid rgba(212,168,67,0.15);border-radius:1rem;overflow:hidden;">
    <div style="padding:1.1rem 1.5rem;border-bottom:1px solid rgba(212,168,67,0.1);display:flex;align-items:center;gap:0.85rem;">
      <div style="width:32px;height:32px;border-radius:50%;background:rgba(212,168,67,0.12);border:1px solid rgba(212,168,67,0.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg width="14" height="14" viewBox="0 0 32 32" fill="none"><path d="M16 3C13 3 10 5 10 8v2H8v3h1l1 3-2 8h16l-2-8 1-3h1v-3h-2V8c0-3-3-5-6-5z" stroke="#D4A843" stroke-width="1.5" fill="none"/></svg>
      </div>
      <div>
        <div style="font-weight:700;font-size:0.85rem;color:#FFFFFF;">Leonidas Blog Assistant</div>
        <div style="font-size:0.72rem;color:#6B7280;">Ask me to find articles on any topic</div>
      </div>
    </div>
    <div id="baMessages" style="display:none;flex-direction:column;gap:0.75rem;padding:1rem 1.25rem;max-height:260px;overflow-y:auto;"></div>
    <div style="padding:0.75rem 1rem;border-top:1px solid rgba(255,255,255,0.05);display:flex;gap:0.5rem;">
      <input id="baInput" type="text" placeholder="e.g. &quot;What do you have on CMMC compliance?&quot;"
             style="flex:1;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:0.5rem;padding:0.6rem 0.9rem;color:#E5E7EB;font-size:0.82rem;outline:none;"
             aria-label="Ask the blog assistant"/>
      <button id="baBtn" style="padding:0.6rem 1rem;background:#D4A843;border:none;border-radius:0.5rem;color:#0A0A1A;font-weight:700;font-size:0.8rem;cursor:pointer;">Ask</button>
    </div>
  </div>
</section>
<script>
window.BLOG_MANIFEST = <?= json_encode($manifest) ?>;
(function(){
  var history=[],sending=false;
  var msgBox=document.getElementById('baMessages');
  var input=document.getElementById('baInput');
  var btn=document.getElementById('baBtn');
  function escHtml(s){return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
  function baFormat(text){
    var s=escHtml(text);
    s=s.replace(/\[([^\]]+)\]\(([^)]+)\)/g,'<a href="$2" style="color:#D4A843;">$1</a>');
    s=s.replace(/\*\*([^*\n]+)\*\*/g,'<strong>$1</strong>');
    s=s.replace(/\n\n+/g,'</p><p>').replace(/\n/g,'<br>');
    return '<p>'+s+'</p>';
  }
  function addMsg(role,html){
    var el=document.createElement('div');
    el.style.cssText=role==='user'
      ?'align-self:flex-end;background:linear-gradient(135deg,#D4A843,#B8860B);color:#0A0A1A;padding:0.5rem 0.85rem;border-radius:12px 12px 2px 12px;font-size:0.82rem;max-width:80%;'
      :'align-self:flex-start;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.07);color:#E5E7EB;padding:0.5rem 0.85rem;border-radius:12px 12px 12px 2px;font-size:0.82rem;max-width:85%;line-height:1.55;';
    el.innerHTML=html;
    msgBox.style.display='flex';
    msgBox.appendChild(el);
    msgBox.scrollTop=msgBox.scrollHeight;
    return el;
  }
  function send(){
    var text=(input.value||'').trim();
    if(!text||sending)return;
    sending=true;input.value='';btn.disabled=true;
    addMsg('user',escHtml(text));
    history.push({role:'user',content:text});
    var dots=addMsg('bot','<span style="opacity:0.5">…</span>');
    fetch('/chat/blog-api.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({messages:history,manifest:window.BLOG_MANIFEST||''})})
    .then(function(r){return r.json();})
    .then(function(data){dots.remove();var reply=data.reply||data.error||'Sorry, something went wrong.';history.push({role:'assistant',content:reply});addMsg('bot',baFormat(reply));})
    .catch(function(){dots.remove();addMsg('bot','Connection error. Try browsing the articles below.');})
    .finally(function(){sending=false;btn.disabled=false;input.focus();});
  }
  btn.addEventListener('click',send);
  input.addEventListener('keydown',function(e){if(e.key==='Enter')send();});
})();
</script>
```

---

### Gap 4: Contact Form — Three-Layer Bot Protection

The existing contact form has **three layers** of protection that must all be preserved:
1. **Honeypot field** — hidden `<input id="website_url" name="website_url">`. If filled, submission is silently dropped.
2. **Time gate** — form tracks load time; submissions faster than 3.5 seconds are rejected.
3. **Cloudflare Turnstile CAPTCHA** — replaces the old math challenge. Renders a "I am human" checkbox. Verified server-side in `contact-proxy.php` before anything reaches Power Automate.

The contact form `fetch()` sends JSON to `/contact-proxy.php` (NOT directly to Power Automate). The Power Automate URL lives only in `includes/config.php` (server-side, never in page source).

---

## Why PHP

The current site has 20+ HTML files each duplicating the full nav, footer, and `<head>`. PHP means one nav file to update, one footer, one config. Additionally: API keys stored outside web root, server-side blog rendering (better SEO), centralized security headers, automatic GZip, dynamic sitemap.

---

## Pre-Flight Checklist

Before running any build steps:

- [ ] **Anthropic API key** — Claude Code will read it automatically from `../leonidas-site/chat/api.php`. No action needed unless you want to rotate it first (recommended — the key has been in the repo). If rotating: get the new key from console.anthropic.com and have it ready to paste when Claude Code asks.
- [ ] **Power Automate URL** — Claude Code will read it automatically from `../leonidas-site/contact.html`. No action needed.
- [x] **Cloudflare Turnstile keys** — Already set in the plan. No action needed.
- [ ] **Get your GoDaddy SFTP credentials** — Host, username, password (from GoDaddy cPanel → FTP Accounts). Only needed at upload time.
- [ ] **Node.js installed** — only needed for Tailwind compilation. Run `node --version` to check. Install from nodejs.org if missing.
- [ ] **PHP is NOT needed locally** — GoDaddy's server runs PHP. You never need it on your machine.

---

## Step 0: Initialize the Standalone Git Repo

Claude Code: Run these commands. The new repo is a **sibling directory** next to `leonidas-site/` — completely separate from it.

**Detect current location and create sibling repo:**
```powershell
# From inside the leonidas-site directory:
cd ..
mkdir leonidas-php
cd leonidas-php
git init
git branch -m main
```

**Create `.gitignore` immediately:**
```gitignore
# Secrets — upload to GoDaddy directly via SFTP, never commit
includes/config.php
chat/api.php
chat/blog-api.php

# Build artifacts
node_modules/
assets/css/tailwind.min.css

# OS / editor
.DS_Store
Thumbs.db
.vscode/
*.log
*.lock
```

**Initial commit:**
```powershell
git add .gitignore
git commit -m "Initial commit: add .gitignore"
```

> To push to GitHub: create a new repo at github.com (name it `leonidas-php`), then:
> ```powershell
> git remote add origin https://github.com/YOUR_USERNAME/leonidas-php.git
> git push -u origin main
> ```

---

## Step 1: Directory Structure

Claude Code: Create all directories. Run from inside `leonidas-php/`:

```powershell
# Windows PowerShell
New-Item -ItemType Directory -Force -Path includes, lib, config, assets/css, assets/images, chat, services, blog, content/images

# Mac/Linux bash equivalent:
# mkdir -p includes lib config assets/css assets/images chat services blog content/images
```

**Copy static assets from the existing site:**
```powershell
# Copy the entire assets folder from the source site
Copy-Item -Recurse -Force ../leonidas-site/assets/* ./assets/
# Copy content folder (blog JSON, about markdown, images)
Copy-Item -Recurse -Force ../leonidas-site/content/* ./content/
# Copy chat PHP files (these will be gitignored — you'll update the API key inside them)
Copy-Item -Force ../leonidas-site/chat/api.php ./chat/api.php
Copy-Item -Force ../leonidas-site/chat/blog-api.php ./chat/blog-api.php
# Copy robots.txt and any other root-level static files
Copy-Item -Force ../leonidas-site/robots.txt ./robots.txt
```

**After copying `chat/api.php` and `chat/blog-api.php`**, update both files to load the API key from config instead of the hardcoded string. Claude Code: use grep or Read to find the exact `define('ANTHROPIC_API_KEY', ...)` line, then replace it with:
```php
require_once dirname(__DIR__) . '/includes/config.php';
```
This removes the hardcoded key from both files so the single value in `config.php` is the only place it lives.

---

## Step 2: Core Configuration File

Create `includes/config.php`. **This file is gitignored — you will upload it to GoDaddy via SFTP, not via git.**

**Claude Code: Before writing this file, extract the real values from the existing source files:**

1. **Anthropic API key** — Read `../leonidas-site/chat/api.php`, find the line `define('ANTHROPIC_API_KEY', '...')`, and copy the key value into `ANTHROPIC_API_KEY` below.
2. **Power Automate URL** — Read `../leonidas-site/contact.html`, search for `prod-` or `logic.azure.com` or `powerautomate` in the JS to find the webhook URL, and copy it into `POWER_AUTOMATE_URL` below.
3. **Turnstile keys** — Already set in this config template. No substitution needed.

After writing the file, print a summary showing what was auto-filled and what still needs the user's input.

```php
<?php
/**
 * Leonidas Site Configuration
 * ⚠️  CONTAINS SECRETS. Never commit. Upload directly to GoDaddy via SFTP.
 * Path on server: /public_html/includes/config.php
 */

// ── Environment ──────────────────────────────────────────────────────────────
define('ENVIRONMENT', 'production'); // 'development' | 'production'
define('SITE_URL',   'https://leonidastek.com');
define('SITE_NAME',  'Leonidas');

// ── API Keys ─────────────────────────────────────────────────────────────────
// Extracted from ../leonidas-site/chat/api.php
// ⚠️  This key has been in the git repo — consider rotating it at console.anthropic.com
define('ANTHROPIC_API_KEY', '[CLAUDE CODE: INSERT VALUE FROM chat/api.php]');

// ── Contact Form — Power Automate ─────────────────────────────────────────────
// Extracted from ../leonidas-site/contact.html — never exposed in page source
define('POWER_AUTOMATE_URL', '[CLAUDE CODE: INSERT VALUE FROM contact.html]');

// ── Cloudflare Turnstile CAPTCHA ──────────────────────────────────────────────
define('TURNSTILE_SITE_KEY',   '0x4AAAAAACyNx1-BXm2NLmSf');           // Public — safe in HTML
define('TURNSTILE_SECRET_KEY', '0x4AAAAAACyNx4nEPO-vRGDrSSADyg5HgbY'); // Private — server-side only

// ── Analytics ─────────────────────────────────────────────────────────────────
define('GA4_MEASUREMENT_ID', 'G-0QWBBHBJLR');   // Live — do not change
define('GTM_CONTAINER_ID',   'GTM-XXXXXXX');     // Replace with real ID when ready
define('FB_PIXEL_ID',        'YOUR_PIXEL_ID');   // Replace with real ID when ready

// ── Company Info ──────────────────────────────────────────────────────────────
define('COMPANY_PHONE',     '850-614-9343');
define('COMPANY_PHONE_TEL', '8506149343');
define('COMPANY_EMAIL',     'sales@leonidastek.com');
define('COMPANY_ADDRESS',   '8219 Front Beach Rd, Ste B #2080, Panama City Beach, FL 32407');

// ── Default SEO ───────────────────────────────────────────────────────────────
define('DEFAULT_OG_IMAGE',    SITE_URL . '/assets/og-home.png');
define('DEFAULT_DESCRIPTION', 'Leonidas delivers managed IT, cybersecurity, and unified communications to businesses across the Florida Panhandle. 20+ years of experience. The New Standard.');

// ── Content Paths ─────────────────────────────────────────────────────────────
define('CONTENT_DIR', dirname(__DIR__) . '/content');
define('BLOG_JSON',   CONTENT_DIR . '/blog-posts.json');
```

---

## Step 3: Security Headers

Create `includes/security-headers.php`. Include this at the **very top** of every PHP page before any HTML output.

```php
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
    "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://connect.facebook.net https://challenges.cloudflare.com; ",
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
```

---

## Step 4: HTML Minification Helper

Create `includes/minify.php`:

```php
<?php
function minify_html(string $html): string {
    if (!defined('ENVIRONMENT') || ENVIRONMENT !== 'production') {
        return $html;
    }
    $html = preg_replace('/<!--(?!\[if).*?-->/s', '', $html);
    $html = preg_replace('/>\s+</', '><', $html);
    $html = preg_replace('/\s{2,}/', ' ', $html);
    return trim($html);
}
```

---

## Step 5: Shared Header and Footer Templates

### `includes/header.php`

Claude Code: Read `../leonidas-site/index.html` first to extract the exact `<head>` meta values, favicon links, and inline CSS as used in production. Then write `includes/header.php` using the structure below, filling in the exact CSS from the source file.

**Variables required from calling page:**
- `$page_title` — Full `<title>` value
- `$page_description` — Meta description
- `$page_url` — Canonical URL
- `$og_image` (optional) — Defaults to `DEFAULT_OG_IMAGE`
- `$json_ld` (optional) — Array for JSON-LD `<script>` block
- `$body_class` (optional)

```php
<?php
// includes/header.php
require_once __DIR__ . '/security-headers.php';
require_once __DIR__ . '/minify.php';

$og_image     = $og_image ?? DEFAULT_OG_IMAGE;
$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

ob_start(); // begin output buffering for minification
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title><?= htmlspecialchars($page_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>"/>
  <link rel="canonical" href="<?= htmlspecialchars($page_url) ?>"/>

  <meta property="og:type"        content="website"/>
  <meta property="og:title"       content="<?= htmlspecialchars($page_title) ?>"/>
  <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>"/>
  <meta property="og:url"         content="<?= htmlspecialchars($page_url) ?>"/>
  <meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>"/>
  <meta property="og:site_name"   content="Leonidas"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@LeonidasTEK"/>
  <meta name="twitter:title"       content="<?= htmlspecialchars($page_title) ?>"/>
  <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>"/>
  <meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>"/>

  <link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png"/>
  <link rel="manifest" href="/assets/site.webmanifest"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>

  <!-- Compiled Tailwind (self-hosted, NOT CDN) -->
  <link rel="stylesheet" href="/assets/css/tailwind.min.css"/>
  <!-- Mobile responsive overrides -->
  <link rel="stylesheet" href="/assets/mobile.css"/>

  <!-- ⚡ COPY ALL INLINE <style> CONTENT FROM ../leonidas-site/index.html HERE -->
  <!-- Claude Code: read index.html and paste the full <style>...</style> block -->
  <style>
    /* [Claude Code: extract exact styles from leonidas-site/index.html] */
  </style>

  <!-- Analytics (see Gap 0) -->
  <?php if (GA4_MEASUREMENT_ID): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA4_MEASUREMENT_ID ?>"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?= GA4_MEASUREMENT_ID ?>');</script>
  <?php endif; ?>
  <?php if (GTM_CONTAINER_ID && GTM_CONTAINER_ID !== 'GTM-XXXXXXX'): ?>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?= GTM_CONTAINER_ID ?>');</script>
  <?php endif; ?>
  <?php if (FB_PIXEL_ID && FB_PIXEL_ID !== 'YOUR_PIXEL_ID'): ?>
  <script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','<?= FB_PIXEL_ID ?>');fbq('track','PageView');</script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?= FB_PIXEL_ID ?>&ev=PageView&noscript=1"/></noscript>
  <?php endif; ?>

  <?php if (!empty($json_ld)): ?>
  <script type="application/ld+json"><?= json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?></script>
  <?php endif; ?>
</head>
<body class="<?= htmlspecialchars($body_class ?? '') ?>">

<?php if (GTM_CONTAINER_ID && GTM_CONTAINER_ID !== 'GTM-XXXXXXX'): ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= GTM_CONTAINER_ID ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>

<div class="grid-bg" aria-hidden="true"></div>

<!-- [INSERT FULL NAV FROM Gap 2 ABOVE] -->
```

### `includes/footer.php`

Claude Code: Read `../leonidas-site/index.html` and extract the full footer HTML content (columns, links, social, copyright). Replicate it exactly in the PHP template below.

```php
<?php
// includes/footer.php
?>
</main>

<footer style="border-top:1px solid rgba(255,255,255,0.06);background:#07071A;padding:4rem 1.5rem 2rem;">
  <!-- Claude Code: extract full footer HTML from ../leonidas-site/index.html and paste here -->
  <!-- Preserve all columns: brand, services, resources, contact, social links -->
</footer>

<!-- Global JS: scroll animations + animated counters -->
<script>
(function(){
  // Fade-in on scroll
  var els=document.querySelectorAll('.fade-in');
  if(els.length){
    var obs=new IntersectionObserver(function(entries){
      entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('visible');obs.unobserve(e.target);}});
    },{threshold:0.1});
    els.forEach(function(el){obs.observe(el);});
  }
  // Animated number counters
  var counters=document.querySelectorAll('[data-count]');
  if(counters.length){
    var cObs=new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(!e.isIntersecting)return;
        var el=e.target,target=parseInt(el.getAttribute('data-count'),10);
        var suffix=el.getAttribute('data-suffix')||'',dur=1800,start=performance.now();
        function tick(now){
          var p=Math.min((now-start)/dur,1);
          el.textContent=Math.floor(p*target)+(p>=1?suffix:'');
          if(p<1)requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
        cObs.unobserve(el);
      });
    },{threshold:0.5});
    counters.forEach(function(el){cObs.observe(el);});
  }
})();
</script>
<?php echo minify_html(ob_get_clean()); ?>
```

---

## Step 6: Homepage (`index.php`)

Claude Code: **Read `../leonidas-site/index.html` in full.** Then convert it to PHP:

1. Strip the static `<html>`, `<head>`, `<nav>`, and `<footer>` blocks entirely.
2. Add the PHP header block at the top with page-specific variables.
3. Replace the static `<body>` open and nav with `require_once 'includes/header.php'`.
4. Replace the static footer with `require_once 'includes/footer.php'`.
5. Keep ALL body content (hero, service pillars, how-we-work, why-leonidas, industries, partner logos, testimonial, CTA, threat map canvas) unchanged except:
   - Replace any hardcoded phone/email/address with `COMPANY_PHONE`, `COMPANY_EMAIL`, `COMPANY_ADDRESS` constants.
6. Add JSON-LD LocalBusiness schema in `$json_ld`.

```php
<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Managed IT & Cybersecurity | Leonidas — The New Standard';
$page_description = DEFAULT_DESCRIPTION;
$page_url         = SITE_URL . '/';
$json_ld = [
    '@context' => 'https://schema.org',
    '@type'    => 'LocalBusiness',
    'name'     => 'Leonidas',
    'url'      => SITE_URL,
    'telephone'=> COMPANY_PHONE,
    'email'    => COMPANY_EMAIL,
    'address'  => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => '8219 Front Beach Rd, Ste B #2080',
        'addressLocality' => 'Panama City Beach',
        'addressRegion'   => 'FL',
        'postalCode'      => '32407',
        'addressCountry'  => 'US',
    ],
    'description' => DEFAULT_DESCRIPTION,
    'areaServed' => 'Florida Panhandle',
];

require_once __DIR__ . '/includes/header.php';
?>

<!-- [ALL BODY CONTENT FROM index.html goes here — Claude Code extracts and pastes it] -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
```

---

## Step 7: About Page (`about.php`)

Claude Code: **Read `../leonidas-site/about.html` in full AND `../leonidas-site/content/about.md`.** Convert to PHP the same way as Step 6. The about.md file has the authoritative content — use it if the HTML is out of sync with it.

```php
<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'About Leonidas | Managed IT & Cybersecurity — Florida Panhandle';
$page_description = 'Learn about Leonidas — a Florida Panhandle managed IT, cybersecurity, and unified communications firm with 20+ years of experience serving businesses.';
$page_url         = SITE_URL . '/about';

require_once __DIR__ . '/includes/header.php';
?>

<!-- [BODY CONTENT from about.html — Claude Code extracts and pastes] -->

<?php require_once __DIR__ . '/includes/footer.php'; ?>
```

---

## Step 8: Service Pages (`services/`)

Claude Code: For each service page, **read the corresponding source file** from `../leonidas-site/services/` and convert it. There are 6:

| Source file | Output file | `$page_title` |
|---|---|---|
| `services/managed-it.html` | `services/managed-it.php` | `Managed IT Services \| Leonidas` |
| `services/cybersecurity.html` | `services/cybersecurity.php` | `Cybersecurity & MSSP \| Leonidas` |
| `services/network-engineering.html` | `services/network-engineering.php` | `Network Engineering \| Leonidas` |
| `services/unified-communications.html` | `services/unified-communications.php` | `Unified Communications & UCaaS \| Leonidas` |
| `services/telecom-wan.html` | `services/telecom-wan.php` | `Telecom & WAN Solutions \| Leonidas` |
| `services/desktop-support.html` | `services/desktop-support.php` | `Desktop Support \| Leonidas` |

Each file follows this pattern:
```php
<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = '<!-- service-specific title -->';
$page_description = '<!-- service-specific description extracted from source HTML <meta> tag -->';
$page_url         = SITE_URL . '/services/<!-- slug -->';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- [BODY CONTENT from the source service HTML — Claude Code extracts and pastes] -->

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
```

---

## Step 9: Blog System

### `lib/BlogManager.php`

```php
<?php
class BlogManager {
    private array $posts;
    private string $jsonPath;

    public function __construct(string $jsonPath) {
        $this->jsonPath = $jsonPath;
        $raw = file_get_contents($jsonPath);
        if (!$raw) throw new RuntimeException("Cannot read blog JSON: $jsonPath");
        $data = json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) throw new RuntimeException("Invalid blog JSON");
        // Normalize and sort newest-first
        $this->posts = array_map(function($p) {
            $p['slug'] = $p['slug'] ?? $this->slugify($p['title']);
            $p['date'] = $p['date'] ?? date('Y-m-d');
            return $p;
        }, $data);
        usort($this->posts, fn($a,$b) => strcmp($b['date'], $a['date']));
    }

    public function all(): array { return $this->posts; }

    public function paginate(int $page, int $perPage = 12): array {
        $offset = ($page - 1) * $perPage;
        return array_slice($this->posts, $offset, $perPage);
    }

    public function totalPages(int $perPage = 12): int {
        return (int) ceil(count($this->posts) / $perPage);
    }

    public function findBySlug(string $slug): ?array {
        foreach ($this->posts as $p) {
            if ($p['slug'] === $slug) return $p;
        }
        return null;
    }

    public function findIndex(string $slug): int {
        foreach ($this->posts as $i => $p) {
            if ($p['slug'] === $slug) return $i;
        }
        return -1;
    }

    public function prev(string $slug): ?array {
        $i = $this->findIndex($slug);
        return ($i > 0) ? $this->posts[$i - 1] : null;
    }

    public function next(string $slug): ?array {
        $i = $this->findIndex($slug);
        return ($i >= 0 && $i < count($this->posts) - 1) ? $this->posts[$i + 1] : null;
    }

    public function byCategory(string $cat): array {
        return array_filter($this->posts, fn($p) => ($p['category'] ?? '') === $cat);
    }

    public function categories(): array {
        return array_unique(array_map(fn($p) => $p['category'] ?? 'General', $this->posts));
    }

    private function slugify(string $text): string {
        return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $text), '-'));
    }
}
```

### `blog/index.php`

Claude Code: Read `../leonidas-site/blog/index.html` to extract the post grid card layout, filter UI, and pagination styling. Then wrap it in the PHP template with `BlogManager` and the blog AI widget (Gap 3).

```php
<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/lib/BlogManager.php';

$blog    = new BlogManager(BLOG_JSON);
$page    = max(1, (int)($_GET['page'] ?? 1));
$posts   = $blog->paginate($page);
$total   = $blog->totalPages();

$page_title       = 'IT & Cybersecurity Blog | Leonidas — The New Standard';
$page_description = 'Expert insights on managed IT, cybersecurity, network engineering, and unified communications for Florida Panhandle businesses.';
$page_url         = SITE_URL . '/blog/';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- [HERO / FILTER UI from ../leonidas-site/blog/index.html] -->

<!-- [BLOG AI WIDGET — see Gap 3] -->

<!-- Post Grid -->
<section style="max-width:1280px;margin:0 auto;padding:0 1.5rem 4rem;">
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1.5rem;">
    <?php foreach ($posts as $post): ?>
    <article style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.06);border-radius:1rem;padding:1.5rem;transition:border-color 0.2s;"
             onmouseover="this.style.borderColor='rgba(212,168,67,0.2)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'">
      <?php if (!empty($post['category'])): ?>
      <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;"><?= htmlspecialchars($post['category']) ?></span>
      <?php endif; ?>
      <h2 style="font-size:1rem;font-weight:700;color:#FFFFFF;margin:0.5rem 0 0.75rem;line-height:1.4;">
        <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" style="text-decoration:none;color:inherit;"><?= htmlspecialchars($post['title']) ?></a>
      </h2>
      <?php if (!empty($post['excerpt'])): ?>
      <p style="font-size:0.82rem;color:#9CA3AF;line-height:1.6;margin-bottom:1rem;"><?= htmlspecialchars($post['excerpt']) ?></p>
      <?php endif; ?>
      <div style="display:flex;align-items:center;justify-content:space-between;">
        <span style="font-size:0.72rem;color:#6B7280;"><?= htmlspecialchars($post['date'] ?? '') ?></span>
        <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" style="font-size:0.78rem;font-weight:600;color:#D4A843;text-decoration:none;">Read →</a>
      </div>
    </article>
    <?php endforeach; ?>
  </div>

  <!-- Pagination -->
  <?php if ($total > 1): ?>
  <nav style="margin-top:3rem;display:flex;gap:0.5rem;justify-content:center;" aria-label="Blog pagination">
    <?php for ($i = 1; $i <= $total; $i++): ?>
    <a href="/blog/?page=<?= $i ?>"
       style="width:2rem;height:2rem;display:flex;align-items:center;justify-content:center;border-radius:0.375rem;font-size:0.82rem;text-decoration:none;
              <?= $i === $page ? 'background:#D4A843;color:#0A0A1A;font-weight:700;' : 'border:1px solid rgba(255,255,255,0.1);color:#9CA3AF;' ?>"
       <?= $i === $page ? 'aria-current="page"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
  </nav>
  <?php endif; ?>
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
```

### `blog/post.php`

```php
<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/lib/BlogManager.php';

$blog = new BlogManager(BLOG_JSON);
$slug = preg_replace('/[^a-z0-9\-]/', '', $_GET['slug'] ?? '');
$post = $blog->findBySlug($slug);

if (!$post) {
    http_response_code(404);
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

  <!-- Prev / Next -->
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
</article>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
```

### `blog/.htaccess` — Pretty Blog URLs

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([a-z0-9\-]+)/?$ post.php?slug=$1 [QSA,L]
```

---

## Step 10: Contact Page & Proxy

### `contact.php`

Claude Code: Read `../leonidas-site/contact.html` in full. Convert it to PHP following the same pattern. Key changes to make:
1. Replace the Power Automate URL in the form JS with `/contact-proxy.php`.
2. Add the Cloudflare Turnstile widget HTML where the math challenge currently is.
3. Remove all math challenge JS (the `mathA`, `mathB`, `mathAnswer` variables and validation).
4. Keep the honeypot field (`<input id="website_url">`) exactly as-is.
5. Keep the 3.5-second time gate exactly as-is.
6. Update the fetch payload to include `'cf-turnstile-response': document.querySelector('[name="cf-turnstile-response"]')?.value || ''`.

**Turnstile widget HTML (add where math challenge was):**
```html
<div class="cf-turnstile" data-sitekey="<?= TURNSTILE_SITE_KEY ?>"></div>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
```

**Updated fetch payload in contact.php JS:**
```js
const payload = {
    name:                    document.getElementById('name').value,
    email:                   document.getElementById('email').value,
    phone:                   document.getElementById('phone').value,
    company:                 document.getElementById('company').value,
    service:                 document.getElementById('service').value,
    message:                 document.getElementById('message').value,
    website_url:             document.getElementById('website_url').value,
    'cf-turnstile-response': document.querySelector('[name="cf-turnstile-response"]')?.value || '',
};
// POST to our PHP proxy, not directly to Power Automate
fetch('/contact-proxy.php', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify(payload) })
```

### `contact-proxy.php`

This file CAN be committed to git (no secrets inside — they're in config.php).

```php
<?php
require_once __DIR__ . '/includes/security-headers.php';
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['ok'=>false,'error'=>'Method not allowed']); exit; }

$body = json_decode(file_get_contents('php://input'), true);
if (!$body) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'Invalid request']); exit; }

// Honeypot check
if (!empty($body['website_url'])) { http_response_code(200); echo json_encode(['ok'=>true]); exit; }

// Cloudflare Turnstile verification
$token = $body['cf-turnstile-response'] ?? '';
if (!$token) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'CAPTCHA token missing.']); exit; }

$verify = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
curl_setopt_array($verify, [CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>http_build_query(['secret'=>TURNSTILE_SECRET_KEY,'response'=>$token]),CURLOPT_RETURNTRANSFER=>true,CURLOPT_TIMEOUT=>10]);
$result = curl_exec($verify); curl_close($verify);
$tsData = json_decode($result, true);
if (!($tsData['success'] ?? false)) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'CAPTCHA verification failed.']); exit; }

// Sanitize inputs
$name    = substr(strip_tags($body['name']    ?? ''), 0, 200);
$email   = substr(strip_tags($body['email']   ?? ''), 0, 200);
$phone   = substr(strip_tags($body['phone']   ?? ''), 0, 50);
$company = substr(strip_tags($body['company'] ?? ''), 0, 200);
$service = substr(strip_tags($body['service'] ?? ''), 0, 100);
$message = substr(strip_tags($body['message'] ?? ''), 0, 5000);

if (!$name || !$email || !$message) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'Required fields missing.']); exit; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'Invalid email address.']); exit; }

// Forward to Power Automate
$ch = curl_init(POWER_AUTOMATE_URL);
curl_setopt_array($ch,[CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>json_encode(compact('name','email','phone','company','service','message')),CURLOPT_RETURNTRANSFER=>true,CURLOPT_TIMEOUT=>15,CURLOPT_HTTPHEADER=>['Content-Type: application/json']]);
$response = curl_exec($ch); $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); $curlErr = curl_error($ch); curl_close($ch);

if ($curlErr) { http_response_code(502); echo json_encode(['ok'=>false,'error'=>'Could not reach delivery service. Please email us directly.']); exit; }
($httpCode===200||$httpCode===202) ? (print json_encode(['ok'=>true])) : (http_response_code(502) && print json_encode(['ok'=>false,'error'=>'Submission failed. Please call 850-614-9343.']));
```

---

## Step 11: Tailwind CSS Compilation

**This step only requires Node.js — no PHP needed.**

Claude Code: Run these commands from inside the `leonidas-php/` directory.

```powershell
npm init -y
npm install tailwindcss --save-dev
```

Create `tailwind.config.js`:
```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './**/*.html',
  ],
  theme: { extend: {} },
  plugins: [],
}
```

Create `assets/input.css`:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

**Compile Tailwind:**
```powershell
npx tailwindcss -i ./assets/input.css -o ./assets/css/tailwind.min.css --minify
```

Add an npm script to `package.json` for easy rebuilds:
```json
{
  "scripts": {
    "build": "tailwindcss -i ./assets/input.css -o ./assets/css/tailwind.min.css --minify",
    "watch": "tailwindcss -i ./assets/input.css -o ./assets/css/tailwind.min.css --watch"
  }
}
```

---

## Step 12: Dynamic Sitemap and RSS Feed

### `sitemap.php`

```php
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
```

### `feed.php` (RSS)

```php
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
  <atom:link href="<?= SITE_URL ?>/feed.php" rel="self" type="application/rss+xml"/>
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
```

---

## Step 13: `.htaccess` — Security + URL Rewrites

This is the Apache config GoDaddy uses. It handles security headers (for non-PHP static files), URL rewrites from `.html` to `.php` for SEO continuity, and blog pretty URLs.

```apache
# ── HTTPS redirect ────────────────────────────────────────────────────────────
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ── www → non-www (adjust if you prefer www) ─────────────────────────────────
RewriteCond %{HTTP_HOST} ^www\.leonidastek\.com [NC]
RewriteRule ^ https://leonidastek.com%{REQUEST_URI} [L,R=301]

# ── HTML → PHP URL rewrites (preserves existing SEO URLs) ────────────────────
# These redirect old .html URLs to the clean PHP versions
RewriteRule ^about\.html$ /about.php [R=301,L]
RewriteRule ^contact\.html$ /contact.php [R=301,L]
RewriteRule ^services/managed-it\.html$ /services/managed-it.php [R=301,L]
RewriteRule ^services/cybersecurity\.html$ /services/cybersecurity.php [R=301,L]
RewriteRule ^services/network-engineering\.html$ /services/network-engineering.php [R=301,L]
RewriteRule ^services/unified-communications\.html$ /services/unified-communications.php [R=301,L]
RewriteRule ^services/telecom-wan\.html$ /services/telecom-wan.php [R=301,L]
RewriteRule ^services/desktop-support\.html$ /services/desktop-support.php [R=301,L]

# ── Blog pretty URLs ─────────────────────────────────────────────────────────
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^blog/([a-z0-9\-]+)/?$ /blog/post.php?slug=$1 [QSA,L]

# ── Sitemap → dynamic PHP ────────────────────────────────────────────────────
RewriteRule ^sitemap\.xml$ /sitemap.php [L]
RewriteRule ^feed\.xml$ /feed.php [L]

# ── Block sensitive paths ────────────────────────────────────────────────────
RedirectMatch 404 /\.git
RedirectMatch 404 /includes/
RedirectMatch 404 /lib/
RedirectMatch 404 /chat/
RedirectMatch 404 /config/

# ── Security headers for static files ────────────────────────────────────────
<IfModule mod_headers.c>
  Header always set X-Content-Type-Options "nosniff"
  Header always set X-Frame-Options "SAMEORIGIN"
  Header always set Referrer-Policy "strict-origin-when-cross-origin"
  Header always set Permissions-Policy "camera=(), microphone=(), geolocation=(), payment=()"
</IfModule>

# ── GZip compression ─────────────────────────────────────────────────────────
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/css application/javascript application/json
</IfModule>

# ── Browser caching ──────────────────────────────────────────────────────────
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
  ExpiresByType image/png "access plus 6 months"
  ExpiresByType image/jpeg "access plus 6 months"
  ExpiresByType image/svg+xml "access plus 6 months"
  ExpiresByType image/webp "access plus 6 months"
  ExpiresByType font/woff2 "access plus 1 year"
</IfModule>

# ── Directory listing off ────────────────────────────────────────────────────
Options -Indexes

# ── Custom error pages ───────────────────────────────────────────────────────
ErrorDocument 404 /404.php
```

---

## Step 14: Deployment — Manual GoDaddy Upload via SFTP

### What to Upload

Upload ALL of the following from `leonidas-php/` to your GoDaddy `public_html/` via File Manager or FileZilla. The root of `leonidas-php/` maps to `public_html/`.

```
✅ UPLOAD VIA SFTP / FILE MANAGER:

Root files:
  index.php
  about.php
  contact.php
  contact-proxy.php
  sitemap.php
  feed.php
  robots.txt
  .htaccess
  404.php (create a simple PHP 404 page)

Directories:
  includes/       (security-headers.php, header.php, footer.php, minify.php)
  lib/            (BlogManager.php)
  services/       (all 6 PHP service pages)
  blog/           (index.php, post.php, .htaccess)
  assets/         (css/, images/, mobile.css, favicon files, og-home.png, site.webmanifest)
  content/        (blog-posts.json, about.md, images/)
```

### Upload Separately — NOT from Git

These files are gitignored. Create them locally, fill in real values, then upload via SFTP:

```
⚠️  SFTP-ONLY (gitignored secrets):

  includes/config.php     ← fill in all API keys, Power Automate URL, Turnstile keys
  chat/api.php            ← copy from leonidas-site/chat/api.php, update API key line
  chat/blog-api.php       ← copy from leonidas-site/chat/blog-api.php, update API key line
```

### Do NOT Upload

```
❌ DO NOT UPLOAD:

  node_modules/           ← server doesn't need it
  assets/input.css        ← source file for Tailwind, not needed on server
  package.json            ← build tool config only
  tailwind.config.js      ← build tool config only
  .git/                   ← never upload the git folder
  .gitignore              ← not needed on server
  .claude/                ← not needed on server
```

### GoDaddy File Manager Steps

1. Log in to GoDaddy → My Products → cPanel → File Manager
2. Navigate to `public_html/`
3. Upload the compiled `assets/css/tailwind.min.css` (File Manager → Upload)
4. Upload directory structures using the "Upload" or "Extract" method (zip your folders locally, upload the zip, extract in File Manager)
5. Create `includes/config.php` directly in File Manager using the editor — paste your values in

**Faster alternative with FileZilla:**
1. Host: your domain or cPanel server address
2. Username/Password: from GoDaddy → cPanel → FTP Accounts
3. Port: 21
4. Drag `leonidas-php/` folder contents into `/public_html/` on the right panel
5. Create/edit `includes/config.php` in FileZilla's text editor

### Post-Upload Verification Checklist

After uploading, verify in your browser:

- [ ] `https://leonidastek.com` — homepage loads, no broken styles
- [ ] `https://leonidastek.com/about` — works (no `.php` extension needed — htaccess)
- [ ] `https://leonidastek.com/blog/` — blog index loads with post grid
- [ ] `https://leonidastek.com/blog/[any-slug]` — individual posts load
- [ ] `https://leonidastek.com/contact` — form loads with Turnstile checkbox (not math)
- [ ] Submit the contact form — verify you receive the Power Automate email
- [ ] `https://leonidastek.com/sitemap.xml` — renders XML with all pages and blog posts
- [ ] Chat widget — open the chat on any page, ask a question
- [ ] Blog AI widget — ask the blog assistant a question
- [ ] Mobile nav — test on phone: hamburger opens drawer, all links work
- [ ] Old URLs redirect: `https://leonidastek.com/about.html` → 301 to `/about`
- [ ] Check browser console for CSP errors (none expected if CSP is configured correctly)

---

## Step 15: Git Workflow Going Forward

```powershell
# From inside leonidas-php/ — after making any change:
git add .
git commit -m "describe what you changed"
git push origin main
```

Claude Code will run these for you when you say "commit my changes" or "push to git."

Deployment after a commit is still manual SFTP for the changed files. If you want to automate this later, GoDaddy supports deployment via git on some plans, or you can add a GitHub Action that FTPs the built files on push.

---

## Appendix: Local File Reference

These existing files in `../leonidas-site/` are the authoritative source for all content. Claude Code should read them whenever building or updating a PHP page:

| Source file | Used for |
|---|---|
| `../leonidas-site/index.html` | Homepage body content, inline styles, footer HTML |
| `../leonidas-site/about.html` | About page body content |
| `../leonidas-site/content/about.md` | About page authoritative text content |
| `../leonidas-site/contact.html` | Contact form, map embed, form JS logic |
| `../leonidas-site/services/managed-it.html` | Managed IT service page |
| `../leonidas-site/services/cybersecurity.html` | Cybersecurity page |
| `../leonidas-site/services/network-engineering.html` | Network engineering page |
| `../leonidas-site/services/unified-communications.html` | UCaaS page |
| `../leonidas-site/services/telecom-wan.html` | Telecom & WAN page |
| `../leonidas-site/services/desktop-support.html` | Desktop support page |
| `../leonidas-site/blog/index.html` | Blog index layout, card styles |
| `../leonidas-site/blog/post.html` | Blog post layout |
| `../leonidas-site/content/blog-posts.json` | All blog post data (60+ posts) |
| `../leonidas-site/assets/mobile.css` | Mobile responsive overrides (copy as-is) |
| `../leonidas-site/chat/api.php` | Claude chatbot API handler (update API key) |
| `../leonidas-site/chat/blog-api.php` | Blog AI API handler (update API key) |
