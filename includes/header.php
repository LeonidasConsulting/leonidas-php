<?php
/**
 * Leonidas — shared page header
 * Includes config.php (which defines SITE_BASE) then outputs <html>…</nav>
 *
 * Variables set by each page before include:
 *   $page_title        string
 *   $meta_description  string
 *   $canonical_url     string  (always the final https://leonidastek.com/... URL)
 *   $og_title          string  (optional)
 *   $og_description    string  (optional)
 *   $og_image          string  (optional)
 *   $page_css          string  (optional) extra CSS injected into <head>
 *   $is_article        bool    (optional) true for blog posts
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/security-headers.php';

$page_title       ??= 'Managed IT &amp; Cybersecurity | Leonidas — Florida Panhandle';
$meta_description ??= $page_description ?? 'Leonidas delivers managed IT, cybersecurity, and unified communications to businesses across the Florida Panhandle.';
$canonical_url    ??= $page_url ?? 'https://leonidastek.com/';
$og_title         ??= $page_title;
$og_description   ??= $meta_description;
$og_image         ??= 'https://leonidastek.com/assets/og-home.png';
$page_css         ??= '';

$b = SITE_BASE; // shorthand

$current_path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$is_about    = strpos($current_path, $b . '/about')   === 0;
$is_blog     = strpos($current_path, $b . '/blog')    === 0;
$is_contact  = strpos($current_path, $b . '/contact') === 0;
$is_services = strpos($current_path, $b . '/services') === 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= htmlspecialchars(html_entity_decode($page_title), ENT_QUOTES) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES) ?>"/>
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url, ENT_QUOTES) ?>"/>
  <meta property="og:type" content="<?= !empty($is_article) ? 'article' : 'website' ?>"/>
  <meta property="og:title" content="<?= htmlspecialchars(html_entity_decode($og_title), ENT_QUOTES) ?>"/>
  <meta property="og:description" content="<?= htmlspecialchars($og_description, ENT_QUOTES) ?>"/>
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url, ENT_QUOTES) ?>"/>
  <meta property="og:image" content="<?= htmlspecialchars($og_image, ENT_QUOTES) ?>"/>
  <meta property="og:image:width" content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:site_name" content="Leonidas"/>
  <meta property="og:locale" content="en_US"/>
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:site" content="@LeonidasTEK"/>
  <meta name="twitter:title" content="<?= htmlspecialchars(html_entity_decode($og_title), ENT_QUOTES) ?>"/>
  <meta name="twitter:description" content="<?= htmlspecialchars($og_description, ENT_QUOTES) ?>"/>
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image, ENT_QUOTES) ?>"/>
  <link rel="alternate" type="application/rss+xml" title="Leonidas Blog — IT &amp; Cybersecurity Insights" href="https://leonidastek.com/feed.xml"/>
  <meta name="google-site-verification" content="EsTne1HFWwiKcw0-2vjIH5XcuBIsACmFM4cE2rucdYc"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>

  <!-- Tailwind CSS — compiled static build -->
  <link rel="stylesheet" href="<?= $b ?>/assets/css/tailwind.min.css"/>

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="<?= $b ?>/assets/favicon.ico"/>
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $b ?>/assets/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $b ?>/assets/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $b ?>/assets/apple-touch-icon.png"/>
  <link rel="manifest" href="<?= $b ?>/assets/site.webmanifest"/>
  <meta name="theme-color" content="#0A0A1A"/>
  <link rel="stylesheet" href="<?= $b ?>/assets/mobile.css"/>

  <!-- Google Analytics 4 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA4_MEASUREMENT_ID ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= GA4_MEASUREMENT_ID ?>');
  </script>

  <!-- Shared base styles -->
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    * { font-family: 'Inter', sans-serif; }
    html { scroll-behavior: smooth; overflow-x: hidden; }
    body { background: #0A0A1A; color: #FFFFFF; overflow-x: hidden; }
    .grid-bg {
      position: fixed; inset: 0; z-index: 0; pointer-events: none;
      background-image: linear-gradient(rgba(212,168,67,0.03) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(212,168,67,0.03) 1px, transparent 1px);
      background-size: 60px 60px;
      animation: gridDrift 20s linear infinite;
    }
    @keyframes gridDrift { from { background-position: 0 0; } to { background-position: 60px 60px; } }
    .orb { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; animation: orbFloat 8s ease-in-out infinite alternate; }
    @keyframes orbFloat { from { transform: translateY(0) scale(1); } to { transform: translateY(-30px) scale(1.05); } }
    .fade-in { opacity: 0; transform: translateY(28px); transition: opacity 0.65s cubic-bezier(0.16,1,0.3,1), transform 0.65s cubic-bezier(0.16,1,0.3,1); }
    .fade-in.visible { opacity: 1 !important; transform: translateY(0) !important; }
    .fade-in-delay-1 { transition-delay: 0.1s; }
    .fade-in-delay-2 { transition-delay: 0.2s; }
    .fade-in-delay-3 { transition-delay: 0.3s; }
    .check-item, .feature-item { display: flex; align-items: flex-start; gap: 0.75rem; margin-bottom: 0.75rem; }
    .check-icon { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }
    .btn-primary {
      display: inline-flex; align-items: center; gap: 0.5rem;
      padding: 0.875rem 2rem; border-radius: 0.5rem;
      background: #D4A843; color: #0A0A1A;
      font-weight: 700; font-size: 0.9rem; letter-spacing: 0.02em;
      transition: all 0.2s; text-decoration: none;
    }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(212,168,67,0.3); }
    .btn-ghost {
      display: inline-flex; align-items: center; gap: 0.5rem;
      padding: 0.875rem 2rem; border-radius: 0.5rem;
      border: 1px solid rgba(212,168,67,0.35); color: #D4A843;
      font-weight: 600; font-size: 0.9rem; letter-spacing: 0.02em;
      transition: all 0.2s; text-decoration: none; background: transparent;
    }
    .btn-ghost:hover { background: rgba(212,168,67,0.08); border-color: rgba(212,168,67,0.6); transform: translateY(-1px); }
    .service-card {
      position: relative; overflow: hidden;
      background: rgba(255,255,255,0.02);
      border: 1px solid rgba(212,168,67,0.1);
      border-radius: 1rem; padding: 2rem;
      transition: all 0.35s cubic-bezier(0.16,1,0.3,1);
      text-decoration: none; display: block;
    }
    .service-card::before {
      content: ''; position: absolute; inset: 0; border-radius: 1rem;
      background: radial-gradient(circle at var(--mx,50%) var(--my,50%), rgba(212,168,67,0.06) 0%, transparent 60%);
      opacity: 0; transition: opacity 0.3s;
      pointer-events: none;
    }
    .service-card:hover { border-color: rgba(212,168,67,0.3); transform: translateY(-4px); box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 0 1px rgba(212,168,67,0.15); }
    .service-card:hover::before { opacity: 1; }
    .section-label {
      font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em;
      color: #D4A843; text-transform: uppercase; margin-bottom: 1rem;
      display: flex; align-items: center; gap: 0.75rem;
    }
    .section-label::before { content: ''; width: 2rem; height: 1px; background: #D4A843; flex-shrink: 0; }
    .heading-underline { position: relative; display: inline-block; }
    .heading-underline::after {
      content: ''; position: absolute; left: 0; bottom: -0.25rem;
      width: 3rem; height: 2px; background: #D4A843; border-radius: 2px;
    }
    .stat-number { font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; letter-spacing: -0.04em; color: #FFFFFF; line-height: 1; }
    .stat-label { font-size: 0.8rem; color: #6B7280; letter-spacing: 0.05em; margin-top: 0.25rem; }
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    .marquee-track { display: flex; gap: 3rem; animation: marquee 30s linear infinite; white-space: nowrap; }
    .marquee-track:hover { animation-play-state: paused; }
    .process-number { font-size: 8rem; font-weight: 900; line-height: 0.9; letter-spacing: -0.05em; color: transparent; -webkit-text-stroke: 1px rgba(212,168,67,0.15); }
    .industry-tile {
      background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06);
      border-radius: 0.75rem; padding: 1.5rem; transition: all 0.3s;
    }
    .industry-tile:hover { border-color: rgba(212,168,67,0.25); background: rgba(212,168,67,0.03); transform: translateY(-2px); }
    .hero-h1 { font-size: clamp(3.5rem, 7vw, 6rem); font-weight: 900; letter-spacing: -0.03em; line-height: 1.0; }
    .stats-strip { background: rgba(255,255,255,0.015); border-top: 1px solid rgba(212,168,67,0.08); border-bottom: 1px solid rgba(212,168,67,0.08); }
    /* Services dropdown */
    .svc-parent { position: relative; }
    .svc-parent::after { content: ''; position: absolute; bottom: -10px; left: 0; right: 0; height: 10px; }
    .svc-menu {
      position: absolute; top: calc(100% + 6px); left: 0;
      width: 15rem; border-radius: 0.75rem; overflow: hidden;
      background: #0D0D20; border: 1px solid rgba(212,168,67,0.15);
      box-shadow: 0 20px 60px rgba(0,0,0,0.6);
      opacity: 0; pointer-events: none;
      transform: translateY(4px);
      transition: opacity 0.15s ease, transform 0.15s ease;
      z-index: 100;
    }
    .svc-parent:hover .svc-menu, .svc-parent.open .svc-menu { opacity: 1; pointer-events: auto; transform: translateY(0); }
    @keyframes liveBlink {
      0%, 100% { opacity: 1; box-shadow: 0 0 4px #EF4444; }
      50% { opacity: 0.2; box-shadow: none; }
    }
    <?= $page_css ?>
  </style>
<?php if (!empty($page_json_ld)): ?>
  <?= $page_json_ld ?>
<?php endif; ?>
<?php if (empty($is_article)): ?>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"LocalBusiness","@id":"https://leonidastek.com/#business","name":"Leonidas","description":"Managed IT services, cybersecurity, network engineering, and unified communications for businesses across the Florida Panhandle.","url":"https://leonidastek.com","telephone":"850-614-9343","email":"sales@leonidastek.com","image":"https://leonidastek.com/assets/og-home.png","priceRange":"$$","address":{"@type":"PostalAddress","streetAddress":"8219 Front Beach Rd, Ste B #2080","addressLocality":"Panama City Beach","addressRegion":"FL","postalCode":"32407","addressCountry":"US"},"geo":{"@type":"GeoCoordinates","latitude":30.1766,"longitude":-85.8055},"areaServed":[{"@type":"City","name":"Panama City Beach"},{"@type":"City","name":"Panama City"},{"@type":"City","name":"Destin"},{"@type":"City","name":"Fort Walton Beach"},{"@type":"City","name":"Pensacola"},{"@type":"City","name":"Niceville"},{"@type":"City","name":"Crestview"},{"@type":"City","name":"Tallahassee"}],"sameAs":["https://x.com/LeonidasTEK","https://facebook.com/leonidastek"],"hasOfferCatalog":{"@type":"OfferCatalog","name":"IT Services","itemListElement":[{"@type":"Offer","itemOffered":{"@type":"Service","name":"Managed IT Services"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Cybersecurity"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Network Engineering"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Unified Communications"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Telecom & WAN"}},{"@type":"Offer","itemOffered":{"@type":"Service","name":"Desktop Support"}}]}}
  </script>
<?php endif; ?>
<?php
$_bc_labels = [
  'about'=>'About','contact'=>'Contact','blog'=>'Blog',
  'services'=>'Services','industries'=>'Industries',
  'managed-it'=>'Managed IT','cybersecurity'=>'Cybersecurity',
  'network-engineering'=>'Network Engineering',
  'unified-communications'=>'Unified Communications',
  'telecom-wan'=>'Telecom & WAN','desktop-support'=>'Desktop Support',
  'healthcare'=>'Healthcare','legal'=>'Legal','construction'=>'Construction',
  'hospitality'=>'Hospitality','government-contractors'=>'Government Contractors',
  'professional-services'=>'Professional Services',
  'privacy-policy'=>'Privacy Policy','terms-and-conditions'=>'Terms & Conditions',
];
$_bc_path    = trim(parse_url($canonical_url, PHP_URL_PATH) ?? '/', '/');
$_bc_segs    = $_bc_path ? array_filter(explode('/', $_bc_path)) : [];
if (count($_bc_segs) > 0):
  $_bc_items   = [['@type'=>'ListItem','position'=>1,'name'=>'Leonidas','item'=>'https://leonidastek.com']];
  $_bc_url     = 'https://leonidastek.com';
  $_bc_pos     = 2;
  foreach ($_bc_segs as $_bc_seg) {
    $_bc_seg  = preg_replace('/\.php$/', '', $_bc_seg);
    $_bc_url .= '/' . $_bc_seg;
    $_bc_lbl  = $_bc_labels[$_bc_seg] ?? ucwords(str_replace('-', ' ', $_bc_seg));
    if (!empty($is_article) && $_bc_pos === count($_bc_segs) + 1) {
      $_bc_lbl = trim(preg_replace('/\s*\|.*$/', '', html_entity_decode($page_title ?? $_bc_lbl)));
    }
    $_bc_items[] = ['@type'=>'ListItem','position'=>$_bc_pos,'name'=>$_bc_lbl,'item'=>$_bc_url];
    $_bc_pos++;
  }
?>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":<?= json_encode($_bc_items) ?>}
  </script>
<?php endif; ?>
</head>
<body>
<div class="grid-bg"></div>

<!-- NAV -->
<nav class="fixed top-0 left-0 right-0 z-50" style="background: rgba(10,10,26,0.8); border-bottom: 1px solid rgba(212,168,67,0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
  <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
    <a href="<?= $b ?>/" class="flex items-center gap-3">
      <img src="<?= $b ?>/content/images/Leonidas Consulting - LOGO.png"
           alt="Leonidas — Managed IT, Cybersecurity &amp; Unified Communications | Florida Panhandle"
           width="40" height="40"
           style="height:40px;width:auto;display:block;object-fit:contain;"
           loading="eager">
      <span style="font-weight:800; font-size:1.1rem; letter-spacing:0.18em; color:#FFFFFF;">LEONIDAS</span>
    </a>
    <div class="hidden md:flex items-center gap-1">
      <a href="<?= $b ?>/about" class="px-4 py-2 rounded-md text-sm" style="color:<?= $is_about ? '#D4A843' : '#9CA3AF' ?>;"
         onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.05)'"
         onmouseout="this.style.color='<?= $is_about ? '#D4A843' : '#9CA3AF' ?>';this.style.background='transparent'">About</a>
      <div class="relative svc-parent">
        <button class="px-4 py-2 rounded-md text-sm flex items-center gap-1.5" style="color:<?= $is_services ? '#D4A843' : '#9CA3AF' ?>;" onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.05)'" onmouseout="this.style.color='<?= $is_services ? '#D4A843' : '#9CA3AF' ?>';this.style.background='transparent'">
          Services
          <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><path d="M1 3l4 4 4-4"/></svg>
        </button>
        <div class="absolute top-full left-0 mt-1 w-60 rounded-xl overflow-hidden svc-menu" style="background:#0D0D20; border:1px solid rgba(212,168,67,0.15); box-shadow:0 20px 60px rgba(0,0,0,0.6);">
          <div class="p-1.5">
            <a href="<?= $b ?>/services/managed-it" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><rect x="1" y="5" width="14" height="9" rx="1.5" stroke="#D4A843" stroke-width="1.2"/><path d="M5 8.5h6M5 11h4" stroke="#D4A843" stroke-width="1.2" stroke-linecap="round"/></svg>Managed IT</a>
            <a href="<?= $b ?>/services/cybersecurity" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><path d="M8 2L2 4.5v5.5C2 13.5 5 15.5 8 16c3-0.5 6-2.5 6-6V4.5L8 2z" stroke="#D4A843" stroke-width="1.2"/><path d="M5.5 8.5l2 2L11 6.5" stroke="#D4A843" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>Cybersecurity</a>
            <a href="<?= $b ?>/services/network-engineering" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><circle cx="8" cy="8" r="2.5" stroke="#D4A843" stroke-width="1.2"/><circle cx="2.5" cy="4" r="1.5" stroke="#D4A843" stroke-width="1.2"/><circle cx="13.5" cy="4" r="1.5" stroke="#D4A843" stroke-width="1.2"/><path d="M4 4.5L6 7M10 7l2-2.5" stroke="#D4A843" stroke-width="1.2"/></svg>Network Engineering</a>
            <a href="<?= $b ?>/services/unified-communications" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><path d="M3 3h10c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H9l-3 2V11H3c-.6 0-1-.4-1-1V4c0-.6.4-1 1-1z" stroke="#D4A843" stroke-width="1.2"/></svg>Unified Communications</a>
            <a href="<?= $b ?>/services/telecom-wan" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><path d="M8 1.5C5 1.5 2.5 4 2.5 7c0 1.5.6 2.8 1.5 3.8" stroke="#D4A843" stroke-width="1.2"/><path d="M8 1.5C11 1.5 13.5 4 13.5 7c0 1.5-.6 2.8-1.5 3.8" stroke="#D4A843" stroke-width="1.2"/><path d="M8 4C6.5 4 5.5 5.3 5.5 7s1 3 2.5 3 2.5-1.3 2.5-3S9.5 4 8 4z" stroke="#D4A843" stroke-width="1.2"/><line x1="8" y1="10" x2="8" y2="14" stroke="#D4A843" stroke-width="1.2"/><line x1="5" y1="14" x2="11" y2="14" stroke="#D4A843" stroke-width="1.2"/></svg>Telecom &amp; WAN</a>
            <a href="<?= $b ?>/services/desktop-support" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;" onmouseover="this.style.background='rgba(212,168,67,0.07)';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#9CA3AF'"><svg width="16" height="16" fill="none" viewBox="0 0 16 16"><rect x="1" y="2" width="14" height="10" rx="1.5" stroke="#D4A843" stroke-width="1.2"/><line x1="8" y1="12" x2="8" y2="15" stroke="#D4A843" stroke-width="1.2"/><line x1="5" y1="15" x2="11" y2="15" stroke="#D4A843" stroke-width="1.2"/></svg>Desktop Support</a>
          </div>
        </div>
      </div>
      <a href="<?= $b ?>/blog/" class="px-4 py-2 rounded-md text-sm" style="color:<?= $is_blog ? '#D4A843' : '#9CA3AF' ?>;"
         onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.05)'"
         onmouseout="this.style.color='<?= $is_blog ? '#D4A843' : '#9CA3AF' ?>';this.style.background='transparent'">Blog</a>
      <a href="<?= $b ?>/contact" class="px-4 py-2 rounded-md text-sm" style="color:<?= $is_contact ? '#D4A843' : '#9CA3AF' ?>;"
         onmouseover="this.style.color='#fff';this.style.background='rgba(255,255,255,0.05)'"
         onmouseout="this.style.color='<?= $is_contact ? '#D4A843' : '#9CA3AF' ?>';this.style.background='transparent'">Contact</a>
    </div>
    <div class="hidden md:flex items-center gap-3">
      <a href="tel:8506149343" class="text-sm font-medium" style="color:#D4A843; letter-spacing:0.02em;">850-614-9343</a>
      <a href="<?= $b ?>/contact" class="btn-primary" style="padding:0.5rem 1.25rem; font-size:0.85rem;">Free Assessment</a>
    </div>
    <button id="mobile-menu-btn" class="md:hidden p-2" aria-label="Toggle menu" aria-expanded="false" style="color:#D4A843; background:none; border:none; cursor:pointer;">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="2" y1="6" x2="20" y2="6"/><line x1="2" y1="11" x2="20" y2="11"/><line x1="2" y1="16" x2="20" y2="16"/></svg>
    </button>
  </div>
  <div id="mobile-menu" class="hidden md:hidden" style="border-top:1px solid rgba(212,168,67,0.08); background:rgba(10,10,26,0.98);">
    <div class="px-6 py-5 flex flex-col gap-1">
      <a href="<?= $b ?>/about"                               class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">About</a>
      <a href="<?= $b ?>/services/managed-it"             class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Managed IT</a>
      <a href="<?= $b ?>/services/cybersecurity"          class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Cybersecurity</a>
      <a href="<?= $b ?>/services/network-engineering"    class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Network Engineering</a>
      <a href="<?= $b ?>/services/unified-communications" class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Unified Communications</a>
      <a href="<?= $b ?>/services/telecom-wan"            class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Telecom &amp; WAN</a>
      <a href="<?= $b ?>/services/desktop-support"        class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Desktop Support</a>
      <a href="<?= $b ?>/blog/"                               class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Blog</a>
      <a href="<?= $b ?>/contact"                         class="px-3 py-2.5 rounded-lg text-sm" style="color:#9CA3AF;">Contact</a>
      <a href="<?= $b ?>/contact" class="btn-primary mt-3 justify-center">Free Assessment</a>
    </div>
  </div>
</nav>
<script>
(function(){
  var btn = document.getElementById('mobile-menu-btn');
  var menu = document.getElementById('mobile-menu');
  if (btn && menu) btn.addEventListener('click', function() {
    menu.classList.toggle('hidden');
    btn.setAttribute('aria-expanded', String(!menu.classList.contains('hidden')));
  });
})();
</script>
