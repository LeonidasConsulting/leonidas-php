<?php
// includes/header.php
require_once __DIR__ . '/security-headers.php';
require_once __DIR__ . '/minify.php';

$og_image     = $og_image ?? DEFAULT_OG_IMAGE;
$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

ob_start();
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
  <meta name="google-site-verification" content="EsTne1HFWwiKcw0-2vjIH5XcuBIsACmFM4cE2rucdYc"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="/assets/css/tailwind.min.css"/>
  <link rel="stylesheet" href="/assets/mobile.css"/>

  <style>
    *, *::before, *::after { box-sizing: border-box; }
    * { font-family: 'Inter', sans-serif; }
    html { scroll-behavior: smooth; }
    body { background: #0A0A1A; color: #FFFFFF; overflow-x: hidden; }
    .grid-bg {
      position: fixed; inset: 0; z-index: 0; pointer-events: none;
      background-image: linear-gradient(rgba(212,168,67,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(212,168,67,0.03) 1px, transparent 1px);
      background-size: 60px 60px;
      animation: gridDrift 20s linear infinite;
    }
    @keyframes gridDrift { from { background-position: 0 0; } to { background-position: 60px 60px; } }
    .orb { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; animation: orbFloat 8s ease-in-out infinite alternate; }
    @keyframes orbFloat { from { transform: translateY(0) scale(1); } to { transform: translateY(-30px) scale(1.05); } }
    .fade-in { opacity: 0; transform: translateY(32px); transition: opacity 0.7s cubic-bezier(0.16,1,0.3,1), transform 0.7s cubic-bezier(0.16,1,0.3,1); }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
    .fade-in-delay-1 { transition-delay: 0.1s; }
    .fade-in-delay-2 { transition-delay: 0.2s; }
    .fade-in-delay-3 { transition-delay: 0.3s; }
    .fade-in-delay-4 { transition-delay: 0.4s; }
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
      border-radius: 0.75rem; padding: 1.5rem;
      transition: all 0.3s;
    }
    .industry-tile:hover { border-color: rgba(212,168,67,0.25); background: rgba(212,168,67,0.03); transform: translateY(-2px); }
    .hero-h1 { font-size: clamp(3.5rem, 7vw, 6rem); font-weight: 900; letter-spacing: -0.03em; line-height: 1.0; }
    .stats-strip { background: rgba(255,255,255,0.015); border-top: 1px solid rgba(212,168,67,0.08); border-bottom: 1px solid rgba(212,168,67,0.08); }
    .svc-parent { position: relative; }
    .svc-parent::after {
      content: '';
      position: absolute;
      bottom: -10px; left: 0; right: 0;
      height: 10px;
    }
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
    .svc-parent:hover .svc-menu,
    .svc-parent.open .svc-menu {
      opacity: 1; pointer-events: auto; transform: translateY(0);
    }
    @keyframes liveBlink {
      0%, 100% { opacity: 1; box-shadow: 0 0 4px #EF4444; }
      50% { opacity: 0.2; box-shadow: none; }
    }
    .check-item { display: flex; align-items: flex-start; gap: 0.75rem; margin-bottom: 0.75rem; }
    .check-icon { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }
  </style>

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
            'Telecom &amp; WAN'      => '/services/telecom-wan.php',
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
      <a href="/services/telecom-wan.php"            style="padding:0.625rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:#9CA3AF;text-decoration:none;">Telecom &amp; WAN</a>
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
