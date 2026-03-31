<?php
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Managed IT &amp; Cybersecurity | Leonidas — The New Standard';
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
    'sameAs' => ['https://x.com/LeonidasTEK','https://facebook.com/leonidastek'],
];

require_once __DIR__ . '/includes/header.php';
?>

  <!-- HERO -->
  <section style="min-height:100vh; padding-top:4rem; display:flex; align-items:center; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.08) 0%, transparent 70%); top:-100px; left:-200px;"></div>
    <div class="orb" style="width:400px; height:400px; background:radial-gradient(circle, rgba(212,168,67,0.05) 0%, transparent 70%); bottom:0; right:10%; animation-delay:3s;"></div>
    <div class="max-w-7xl mx-auto px-6 py-20 w-full">
      <div class="flex items-center gap-12 xl:gap-20">
        <div class="flex-1 min-w-0 relative" style="z-index:2;">
          <div class="section-label fade-in">The New Standard</div>
          <h1 class="hero-h1 fade-in fade-in-delay-1" style="color:#FFFFFF; margin-bottom:0.1em;">
            IT That Works.<br>
            Security That Holds.<br>
            Communications<br>
            <span style="color:#D4A843;">That Connect.</span>
          </h1>
          <p class="fade-in fade-in-delay-2 mt-7 text-lg leading-relaxed max-w-lg" style="color:#9CA3AF;">
            Leonidas delivers enterprise-grade managed IT, layered cybersecurity, and unified communications to businesses across the Florida Panhandle. We operate as your IT department — not a vendor.
          </p>
          <div class="fade-in fade-in-delay-3 flex flex-wrap gap-4 mt-9">
            <a href="/contact.php" class="btn-primary">
              Get a Free Assessment
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="/about.php" class="btn-ghost">How We Work</a>
          </div>
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
        </div>
        <!-- Hero tech viz — threat map -->
        <div class="relative hidden xl:block" style="width:min(560px,44vw); height:min(500px,39vw); flex-shrink:0; z-index:1; isolation:isolate; overflow:hidden;">
          <canvas id="threatMap" width="580" height="520" style="position:absolute;inset:0;width:100%;height:100%;border-radius:1.5rem;"></canvas>

          <!-- Network Status — top left -->
          <div style="position:absolute;top:12px;left:12px;z-index:5;background:rgba(11,17,21,0.48);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(25,152,168,0.22);border-radius:8px;padding:7px 11px;min-width:148px;">
            <div style="display:flex;align-items:center;gap:5px;margin-bottom:4px;">
              <span style="width:5px;height:5px;border-radius:50%;background:#4ADE80;flex-shrink:0;animation:liveBlink 2s ease-in-out infinite;"></span>
              <span style="font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.6);letter-spacing:0.15em;text-transform:uppercase;font-weight:700;">Network Status</span>
            </div>
            <div style="font-size:10.5px;font-family:Inter,monospace;color:#4ADE80;font-weight:600;">All systems operational</div>
            <div style="font-size:8px;font-family:Inter,monospace;color:rgba(130,200,215,0.4);margin-top:3px;">Latency: <span style="color:#21c6db;">12ms</span> · Uptime: <span id="heroUptime" style="color:#21c6db;">00:00:00</span></div>
          </div>

          <!-- Security Score — top right -->
          <div style="position:absolute;top:12px;right:12px;z-index:5;background:rgba(11,17,21,0.48);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(25,152,168,0.22);border-radius:8px;padding:7px 11px;text-align:right;min-width:120px;">
            <div style="display:flex;align-items:center;justify-content:flex-end;gap:5px;margin-bottom:4px;">
              <span style="font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.6);letter-spacing:0.15em;text-transform:uppercase;font-weight:700;">Security Score</span>
              <span style="display:inline-block;width:5px;height:5px;border-radius:50%;background:#21c6db;flex-shrink:0;"></span>
            </div>
            <div style="font-size:26px;font-family:Inter,monospace;font-weight:900;color:#21c6db;line-height:1;letter-spacing:-0.04em;"><span id="heroScore">98</span><span style="font-size:11px;color:rgba(130,200,215,0.45);font-weight:400;">/100</span></div>
            <div style="font-size:7.5px;font-family:Inter,monospace;color:rgba(130,200,215,0.4);margin-top:2px;letter-spacing:0.1em;text-transform:uppercase;">Excellent</div>
          </div>

          <!-- Live Events — right middle -->
          <div style="position:absolute;right:12px;top:115px;z-index:5;width:160px;">
            <div style="background:rgba(11,17,21,0.48);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(25,152,168,0.22);border-radius:8px;padding:7px 10px;">
              <div style="display:flex;align-items:center;gap:5px;margin-bottom:6px;">
                <span style="width:5px;height:5px;border-radius:50%;background:#EF4444;flex-shrink:0;animation:liveBlink 1.2s ease-in-out infinite;"></span>
                <span style="font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.6);letter-spacing:0.15em;text-transform:uppercase;font-weight:700;">Live Events</span>
              </div>
              <div id="heroFeed" style="display:flex;flex-direction:column;gap:4px;min-height:88px;"></div>
            </div>
          </div>

          <!-- Global Intel — bottom left -->
          <div style="position:absolute;bottom:50px;left:12px;z-index:5;background:rgba(11,17,21,0.48);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(25,152,168,0.22);border-radius:8px;padding:7px 12px;">
            <div style="font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.6);letter-spacing:0.15em;text-transform:uppercase;font-weight:700;margin-bottom:6px;">Global Intel</div>
            <div style="display:flex;gap:14px;align-items:flex-end;">
              <div>
                <div style="font-size:6.5px;font-family:Inter,monospace;color:rgba(130,200,215,0.4);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1px;">Countries</div>
                <div style="font-size:20px;font-family:Inter,monospace;font-weight:900;color:#EF4444;line-height:1;"><span id="heroCountries">47</span></div>
              </div>
              <div style="width:1px;background:rgba(25,152,168,0.18);align-self:stretch;"></div>
              <div>
                <div style="font-size:6.5px;font-family:Inter,monospace;color:rgba(130,200,215,0.4);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1px;">Atk/Min</div>
                <div style="font-size:20px;font-family:Inter,monospace;font-weight:900;color:#F59E0B;line-height:1;"><span id="heroAtkRate">0</span></div>
              </div>
              <div style="width:1px;background:rgba(25,152,168,0.18);align-self:stretch;"></div>
              <div>
                <div style="font-size:6.5px;font-family:Inter,monospace;color:rgba(130,200,215,0.4);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1px;">Active</div>
                <div style="font-size:20px;font-family:Inter,monospace;font-weight:900;color:#21c6db;line-height:1;"><span id="heroActive">0</span></div>
              </div>
            </div>
          </div>

          <!-- Threats Blocked — bottom right -->
          <div style="position:absolute;bottom:50px;right:12px;z-index:5;background:rgba(11,17,21,0.48);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(25,152,168,0.22);border-radius:8px;padding:7px 14px;text-align:center;white-space:nowrap;">
            <div style="display:flex;align-items:center;justify-content:center;gap:5px;margin-bottom:3px;">
              <span style="width:4px;height:4px;border-radius:50%;background:#EF4444;animation:liveBlink 1.2s ease-in-out infinite;"></span>
              <span style="font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.6);letter-spacing:0.15em;text-transform:uppercase;font-weight:700;">Blocked Today</span>
            </div>
            <div style="font-size:22px;font-family:Inter,monospace;font-weight:900;color:#21c6db;letter-spacing:-0.02em;line-height:1;"><span id="heroThreats">1,247</span></div>
            <div style="font-size:7px;color:rgba(130,200,215,0.35);margin-top:2px;">and counting...</div>
          </div>

          <!-- Attack log bar — bottom strip -->
          <div style="position:absolute;bottom:8px;left:12px;right:12px;z-index:5;overflow:hidden;height:16px;">
            <div id="attackLogInner" style="display:flex;gap:20px;white-space:nowrap;font-size:7px;font-family:Inter,monospace;color:rgba(130,200,215,0.35);"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS BAR -->
  <div class="stats-strip relative py-10" style="z-index:1;">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="fade-in">
          <div class="stat-number"><span data-count="20" data-suffix="+">20+</span></div>
          <div class="stat-label uppercase tracking-wider text-xs mt-1">Years in Business</div>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="stat-number"><span data-count="300" data-suffix="+">300+</span></div>
          <div class="stat-label uppercase tracking-wider text-xs mt-1">Carrier &amp; Vendor Partners</div>
        </div>
        <div class="fade-in fade-in-delay-2">
          <div class="stat-number"><span data-count="6" data-suffix="">6</span></div>
          <div class="stat-label uppercase tracking-wider text-xs mt-1">Core Service Lines</div>
        </div>
        <div class="fade-in fade-in-delay-3">
          <div class="text-2xl font-black" style="color:#D4A843; letter-spacing:-0.03em;">Panhandle</div>
          <div class="stat-label uppercase tracking-wider text-xs mt-1">Florida Focused</div>
        </div>
      </div>
    </div>
  </div>

  <!-- SERVICES SECTION -->
  <section class="py-28 px-6" id="services">
    <div class="max-w-7xl mx-auto">
      <div class="mb-16 fade-in">
        <div class="section-label">What We Do</div>
        <h2 class="heading-underline" style="font-size:clamp(2.2rem,4vw,3.5rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Six disciplines.<br>One partner.</h2>
        <p class="mt-6 text-base max-w-xl" style="color:#9CA3AF;">Every service line is deep, not shallow. We staff specialists — not generalists who dabble.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <a href="/services/managed-it.php" class="service-card fade-in">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><rect x="1" y="7" width="20" height="13" rx="2" stroke="#D4A843" stroke-width="1.5"/><path d="M7 12h8M7 16h5" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round"/><path d="M7 4h8v3H7z" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Managed IT Services</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Your outsourced IT department. Proactive monitoring, patch management, helpdesk support, and strategic IT planning.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
        <a href="/services/cybersecurity.php" class="service-card fade-in fade-in-delay-1">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><path d="M11 2L3 5.5v7C3 17.5 7 20.5 11 21c4-.5 8-3.5 8-8.5v-7L11 2z" stroke="#D4A843" stroke-width="1.5"/><path d="M7.5 11.5l2.5 2.5L15 9" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Cybersecurity</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Layered security that goes beyond checkbox compliance. EDR, MDR, dark web monitoring, and vCISO services.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
        <a href="/services/network-engineering.php" class="service-card fade-in fade-in-delay-2">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><circle cx="11" cy="11" r="3.5" stroke="#D4A843" stroke-width="1.5"/><circle cx="3.5" cy="5.5" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="18.5" cy="5.5" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="3.5" cy="16.5" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="18.5" cy="16.5" r="2" stroke="#D4A843" stroke-width="1.5"/><path d="M5.5 6.5L8 9M14 9l2.5-2.5M5.5 15.5L8 13M14 13l2.5 2.5" stroke="#D4A843" stroke-width="1.2"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Network Engineering</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">SD-WAN, SASE, network segmentation, Wi-Fi 7, and firewall management. Built for performance and security.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
        <a href="/services/unified-communications.php" class="service-card fade-in fade-in-delay-1">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><path d="M4 4h14a1 1 0 011 1v8a1 1 0 01-1 1h-6l-4 3V14H4a1 1 0 01-1-1V5a1 1 0 011-1z" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Unified Communications</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Cloud phone systems, contact center, SIP trunking. RingCentral, Teams Phone, Five9, Zoom Phone, and more.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
        <a href="/services/telecom-wan.php" class="service-card fade-in fade-in-delay-2">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><path d="M11 2C7 2 4 5.3 4 9.5c0 2.5 1.2 4.7 3 6" stroke="#D4A843" stroke-width="1.5"/><path d="M11 2c4 0 7 3.3 7 7.5c0 2.5-1.2 4.7-3 6" stroke="#D4A843" stroke-width="1.5"/><path d="M11 5.5C9 5.5 7.5 7.2 7.5 9.5s1.5 4 3.5 4 3.5-1.7 3.5-4-1.5-4-3.5-4z" stroke="#D4A843" stroke-width="1.5"/><line x1="11" y1="13.5" x2="11" y2="19" stroke="#D4A843" stroke-width="1.5"/><line x1="7" y1="19" x2="15" y2="19" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Telecom &amp; WAN</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Fiber procurement, POTS replacement, SD-WAN migration, telecom expense management, and 5G/FWA evaluation.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
        <a href="/services/desktop-support.php" class="service-card fade-in fade-in-delay-3">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="22" height="22" fill="none" viewBox="0 0 22 22"><rect x="2" y="3" width="18" height="13" rx="2" stroke="#D4A843" stroke-width="1.5"/><line x1="11" y1="16" x2="11" y2="20" stroke="#D4A843" stroke-width="1.5"/><line x1="7" y1="20" x2="15" y2="20" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <h3 style="font-size:1.1rem; font-weight:700; color:#FFFFFF;">Desktop Support</h3>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Fast, reliable end-user support for workstations, laptops, printers, and applications. Remote or on-site.</p>
          <div class="mt-5 flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        </a>
      </div>
    </div>
  </section>

  <!-- HOW WE WORK -->
  <section class="py-28 relative" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto px-6">
      <div class="mb-20 fade-in">
        <div class="section-label">Our Process</div>
        <h2 style="font-size:clamp(2.2rem,4vw,3.5rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">The Leonidas Process.</h2>
        <p class="mt-4 text-base max-w-lg" style="color:#9CA3AF;">Three steps. Clear accountability. No surprises.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="fade-in">
          <div class="process-number">01</div>
          <div class="mt-2">
            <div class="section-label mb-2">Step One</div>
            <h3 style="font-size:1.5rem; font-weight:800; color:#FFFFFF; letter-spacing:-0.02em; margin-bottom:0.75rem;">Assess</h3>
            <p style="color:#9CA3AF; line-height:1.7;">We audit your current environment — infrastructure, security posture, communication tools, and vendor contracts. We document what exists, identify gaps, and quantify risk before recommending anything.</p>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="process-number">02</div>
          <div class="mt-2">
            <div class="section-label mb-2">Step Two</div>
            <h3 style="font-size:1.5rem; font-weight:800; color:#FFFFFF; letter-spacing:-0.02em; margin-bottom:0.75rem;">Design</h3>
            <p style="color:#9CA3AF; line-height:1.7;">We build a technology plan tailored to your business goals and budget. No cookie-cutter packages. Every design is vendor-agnostic — we pick what fits, not what pays us more.</p>
          </div>
        </div>
        <div class="fade-in fade-in-delay-2">
          <div class="process-number">03</div>
          <div class="mt-2">
            <div class="section-label mb-2">Step Three</div>
            <h3 style="font-size:1.5rem; font-weight:800; color:#FFFFFF; letter-spacing:-0.02em; margin-bottom:0.75rem;">Manage</h3>
            <p style="color:#9CA3AF; line-height:1.7;">We deploy, monitor, and optimize continuously. Proactive alerts. Quarterly business reviews. A dedicated contact who knows your environment. We stay accountable for the results.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WHY LEONIDAS -->
  <section class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Why Leonidas</div>
          <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Twenty years of experience.<br><span style="color:#D4A843;">Zero shortcuts.</span></h2>
          <p class="mt-6 text-base leading-relaxed max-w-md" style="color:#9CA3AF;">We have seen every failure mode, every vendor promise, and every shortcut that does not work. That experience is what you are actually buying when you work with Leonidas.</p>
          <a href="/about.php" class="btn-ghost mt-8 inline-flex">Learn our story</a>
        </div>
        <div class="fade-in fade-in-delay-1 flex flex-col gap-4">
          <div class="flex items-start gap-4 p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
            <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background:#D4A843;"></div>
            <div><h4 style="font-weight:700; color:#FFFFFF; margin-bottom:0.3rem;">Single point of contact</h4><p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">You call us, you get someone who knows your environment. Not a call center. Not a rotating cast of technicians.</p></div>
          </div>
          <div class="flex items-start gap-4 p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
            <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background:#D4A843;"></div>
            <div><h4 style="font-weight:700; color:#FFFFFF; margin-bottom:0.3rem;">Vendor-agnostic by design</h4><p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">We work across 300+ vendors and carriers. Every recommendation starts with your requirements — not a vendor's sales quota.</p></div>
          </div>
          <div class="flex items-start gap-4 p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
            <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background:#D4A843;"></div>
            <div><h4 style="font-weight:700; color:#FFFFFF; margin-bottom:0.3rem;">Security-first mindset</h4><p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Every solution is evaluated through a security lens. Cybersecurity is not an add-on — it is foundational.</p></div>
          </div>
          <div class="flex items-start gap-4 p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
            <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background:#D4A843;"></div>
            <div><h4 style="font-weight:700; color:#FFFFFF; margin-bottom:0.3rem;">Florida Panhandle focused</h4><p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">Headquartered in Panama City Beach, FL — we serve the Florida Panhandle. We are local. On-site when you need us.</p></div>
          </div>
          <div class="flex items-start gap-4 p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
            <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background:#D4A843;"></div>
            <div><h4 style="font-weight:700; color:#FFFFFF; margin-bottom:0.3rem;">Proactive, not reactive</h4><p style="color:#9CA3AF; font-size:0.9rem; line-height:1.6;">We fix problems before they impact your business. Monitoring, alerting, and patching happen continuously.</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INDUSTRIES -->
  <section class="py-28 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-16 fade-in">
        <div class="section-label">Industries</div>
        <h2 class="heading-underline" style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for your industry.</h2>
        <p class="mt-6 text-base max-w-lg" style="color:#9CA3AF;">Deep familiarity with the compliance requirements, workflows, and risk profiles that matter in your sector.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="industry-tile fade-in">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><path d="M14 4C9 4 5 8 5 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#D4A843" stroke-width="1.4"/><path d="M10 13h8M14 9v8" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Healthcare</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">HIPAA-aligned infrastructure, secure communications, and EHR network support. We protect patient data and keep clinical operations running.</p>
        </div>
        <div class="industry-tile fade-in fade-in-delay-1">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><path d="M14 3L4 8v6c0 5.5 4 10 10 11 6-1 10-5.5 10-11V8L14 3z" stroke="#D4A843" stroke-width="1.4"/><path d="M10 14l2.5 3L18 11" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Legal</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Client confidentiality demands enterprise-grade security. Data loss prevention, encrypted storage, and secure remote access for law firms.</p>
        </div>
        <div class="industry-tile fade-in fade-in-delay-2">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><rect x="4" y="12" width="20" height="13" rx="1.5" stroke="#D4A843" stroke-width="1.4"/><path d="M10 12V9a4 4 0 018 0v3" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Construction</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Field connectivity, mobile device management, and project-site communications. Keep your crews connected and data protected across job sites.</p>
        </div>
        <div class="industry-tile fade-in">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><path d="M4 24V12l10-8 10 8v12H4z" stroke="#D4A843" stroke-width="1.4"/><rect x="10" y="16" width="8" height="8" rx="1" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Hospitality</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Guest Wi-Fi, POS network security, and property management system support. Reliable connectivity is the foundation of a great guest experience.</p>
        </div>
        <div class="industry-tile fade-in fade-in-delay-1">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><path d="M5 6h18v16a2 2 0 01-2 2H7a2 2 0 01-2-2V6z" stroke="#D4A843" stroke-width="1.4"/><path d="M3 6h22" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/><path d="M11 6V4h6v2" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Government Contractors</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">CMMC compliance, CUI handling, and NIST framework alignment. We help defense contractors meet federal cybersecurity requirements.</p>
        </div>
        <div class="industry-tile fade-in fade-in-delay-2">
          <div class="mb-3"><svg width="28" height="28" fill="none" viewBox="0 0 28 28"><circle cx="14" cy="14" r="9" stroke="#D4A843" stroke-width="1.4"/><path d="M9.5 14h9M14 9.5v9" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.4rem;">Professional Services</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Accounting, consulting, and financial services firms need airtight data governance. Security and productivity without bureaucratic overhead.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PARTNER MARQUEE -->
  <section class="py-16" style="border-top:1px solid rgba(212,168,67,0.06); border-bottom:1px solid rgba(212,168,67,0.06); overflow:hidden;">
    <div class="max-w-7xl mx-auto px-6 mb-10 fade-in">
      <div class="section-label">Technology Partners</div>
      <p style="color:#6B7280; font-size:0.85rem;">Vendor-agnostic. Best-of-breed partnerships across 300+ providers.</p>
    </div>
    <div style="overflow:hidden; width:100%; position:relative; transform:translateZ(0); mask-image:linear-gradient(90deg, transparent 0%, #0A0A1A 8%, #0A0A1A 92%, transparent 100%); -webkit-mask-image:linear-gradient(90deg, transparent 0%, #0A0A1A 8%, #0A0A1A 92%, transparent 100%);">
      <div class="marquee-track">
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">RINGCENTRAL</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">FIVE9</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">MICROSOFT</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">CISCO</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">ZOOM</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">8X8</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">VONAGE</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">DIALPAD</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">NEXTIVA</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">GOTO CONNECT</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">MITEL</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">RINGCENTRAL</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">FIVE9</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">MICROSOFT</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">CISCO</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">ZOOM</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">8X8</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">VONAGE</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">DIALPAD</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">NEXTIVA</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">GOTO CONNECT</span>
        <span style="color:#374151;">·</span>
        <span class="text-sm font-bold tracking-widest px-2" style="color:#4B5563;">MITEL</span>
      </div>
    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section class="py-28 px-6">
    <div class="max-w-4xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Social Proof</div>
      <div class="rounded-2xl p-10 md:p-14 mt-6" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.12); backdrop-filter:blur(12px);">
        <svg width="40" height="32" viewBox="0 0 40 32" fill="none" class="mx-auto mb-8" aria-hidden="true">
          <path d="M0 32V19.2C0 14.4 1.2 10.4 3.6 7.2 6 4 9.6 1.6 14.4 0L16 3.2C13.0667 4.26667 10.8 5.86667 9.2 8 7.73333 10.1333 7 12.5333 7 15.2H14.4V32H0ZM23.6 32V19.2C23.6 14.4 24.8 10.4 27.2 7.2 29.6 4 33.2 1.6 38 0L39.6 3.2C36.6667 4.26667 34.4 5.86667 32.8 8 31.3333 10.1333 30.6 12.5333 30.6 15.2H38V32H23.6Z" fill="rgba(212,168,67,0.12)"/>
        </svg>
        <blockquote style="font-size:clamp(1.1rem,2.5vw,1.4rem); font-weight:600; color:#F9FAFB; line-height:1.6; letter-spacing:-0.01em;">
          "Leonidas transformed our IT infrastructure from a constant source of frustration into something we can rely on. Their team knows our environment cold — and they never leave us hanging."
        </blockquote>
        <div class="mt-8 flex items-center justify-center gap-3">
          <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold" style="background:rgba(212,168,67,0.15); color:#D4A843;">CL</div>
          <div class="text-left">
            <div style="font-weight:600; color:#FFFFFF; font-size:0.9rem;">Client Name</div>
            <div style="color:#6B7280; font-size:0.8rem;">CEO, US-Based Business — References provided to qualified prospects</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="py-28 px-6 relative" style="background:rgba(5,5,16,0.8);">
    <div class="orb" style="width:500px; height:500px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:50%; left:50%; transform:translate(-50%,-50%);"></div>
    <div class="max-w-3xl mx-auto text-center relative fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2.2rem,5vw,4rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; margin-top:0.5rem;">
        Ready to build IT that<br><span style="color:#D4A843;">actually works?</span>
      </h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">The assessment is free. The conversation is honest. If we are not the right fit, we will tell you. Start with a call.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="/contact.php" class="btn-primary">
          Get Your Free Assessment
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="tel:<?= COMPANY_PHONE_TEL ?>" class="btn-ghost">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 2h3l1.5 3.5-2 1.5A9 9 0 009.5 11l1.5-2 3.5 1.5v3C14.5 14 14 14.5 13 14.5 6 14.5 1.5 9.5 1.5 3 1.5 2 2 1.5 3 2z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
          <?= COMPANY_PHONE ?>
        </a>
      </div>
      <div class="mt-10 flex flex-wrap gap-4 justify-center text-sm" style="color:#6B7280;">
        <a href="mailto:<?= COMPANY_EMAIL ?>" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'"><?= COMPANY_EMAIL ?></a>
        <span>·</span>
        <span><?= COMPANY_ADDRESS ?></span>
      </div>
    </div>
  </section>

<script>
document.querySelectorAll('.service-card').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    card.style.setProperty('--mx', ((e.clientX - r.left) / r.width * 100) + '%');
    card.style.setProperty('--my', ((e.clientY - r.top) / r.height * 100) + '%');
  });
});

// ── Threat Map Canvas + Live Dashboard ───────────────────────────────────────
(function () {
  function rnd(min, max) { return Math.floor(Math.random() * (max - min + 1)) + min; }

  const canvas = document.getElementById('threatMap');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  const CW = canvas.width, CH = canvas.height;

  function proj(lat, lon) {
    return { x: (lon + 180) / 360 * CW, y: (80 - lat) / 155 * CH };
  }

  const LAND_COORDS = [
    [62,-128],[58,-136],[55,-132],[52,-127],[49,-124],[46,-124],[43,-124],[38,-122],[36,-121],[34,-120],[30,-116],[25,-110],
    [60,-145],[57,-153],[55,-160],[63,-168],[66,-166],[68,-163],[64,-164],
    [60,-110],[57,-104],[54,-97],[50,-85],[47,-84],[45,-76],[44,-76],[43,-79],[42,-83],[60,-73],[57,-68],[53,-57],[47,-53],
    [65,-83],[62,-74],[60,-70],[55,-63],[51,-56],
    [44,-68],[43,-70],[42,-71],[41,-74],[40,-74],[38,-76],[36,-76],[34,-77],[30,-81],[27,-80],[25,-80],
    [47,-97],[44,-96],[41,-96],[38,-97],[35,-97],[32,-97],[30,-95],[28,-97],[26,-97],
    [32,-87],[34,-86],[36,-87],[38,-85],[40,-82],[29,-90],[30,-90],[31,-89],
    [30,-110],[27,-110],[25,-100],[22,-100],[20,-103],[19,-99],[17,-99],
    [14,-87],[12,-85],[10,-84],[9,-83],[8,-80],[9,-79],
    [12,-72],[10,-75],[8,-77],[5,-77],[2,-78],[0,-78],[-2,-78],[-4,-80],[-6,-80],
    [-9,-78],[-12,-77],[-16,-76],[-18,-70],[-20,-70],[-22,-69],[-25,-70],[-28,-71],[-32,-71],[-35,-72],[-38,-72],[-42,-73],[-45,-73],[-48,-74],[-52,-73],[-55,-70],
    [0,-50],[-5,-50],[-10,-48],[-15,-45],[-20,-43],[-23,-43],[-23,-46],[-25,-50],[-28,-49],[-32,-52],[-35,-58],
    [-8,-35],[-5,-35],[-3,-42],
    [76,-42],[72,-24],[68,-27],[65,-38],[62,-42],[72,-53],[76,-68],[78,-72],[80,-45],
    [36,-6],[38,-9],[40,-8],[43,-9],[44,-10],[43,-7],[42,-8],[41,-8],[40,-9],[37,-1],[39,0],
    [41,2],[43,3],[44,4],[46,5],[48,2],[50,2],[51,3],[52,4],[53,5],[54,9],
    [51,-1],[53,-3],[55,-4],[57,-4],[58,-4],[60,-2],
    [56,10],[58,12],[60,11],[62,7],[64,14],[66,16],[68,18],[70,21],[72,24],[70,28],[68,28],[66,26],[64,20],[60,20],[58,18],
    [46,8],[47,7],[47,10],[48,11],[50,9],[52,10],[54,10],[54,18],[53,20],[52,21],[51,23],[50,20],[49,18],[48,18],[48,24],[46,24],
    [36,14],[37,13],[38,13],[38,15],[40,17],[42,19],[44,21],[45,23],[44,26],[42,27],[41,29],
    [36,28],[38,27],[37,25],[38,22],[40,23],[41,25],[43,28],[44,30],[45,32],[47,32],[50,30],
    [60,24],[62,26],[64,26],[66,26],[60,30],[58,24],
    [56,38],[57,33],[58,37],[60,45],[60,53],[58,60],[55,60],[57,60],
    [36,10],[34,9],[33,11],[31,13],[30,20],[28,14],[25,12],[22,15],[18,12],[15,0],[18,2],[20,4],[22,8],
    [30,31],[27,33],[24,37],[20,40],[15,41],[12,43],[11,42],[8,44],[5,42],[2,41],
    [12,15],[10,14],[8,12],[6,10],[4,9],[2,10],[0,10],[5,3],[7,4],[9,6],[12,8],[15,11],
    [14,-2],[16,0],[18,2],[10,-2],[12,-2],
    [-2,11],[-4,12],[-6,14],[-8,15],[-10,18],[-12,22],[-15,27],[-17,31],[-20,34],
    [-22,35],[-25,32],[-28,30],[-30,30],[-32,28],[-34,27],[-36,24],
    [-5,38],[-8,38],[-10,40],[-12,40],[-15,37],[-20,44],
    [38,26],[36,28],[37,37],[37,43],[38,48],[37,55],[36,58],[30,47],[28,49],[24,55],[22,59],
    [24,57],[22,56],[18,56],[16,54],[14,50],[12,44],[30,31],[32,36],[35,36],[37,36],
    [37,65],[38,67],[40,72],[40,65],[42,72],[44,78],[45,84],[47,86],[48,90],[40,68],[38,58],
    [22,68],[20,72],[18,74],[16,75],[12,77],[10,78],[8,77],[8,80],[10,80],[12,80],[15,80],[18,84],
    [20,86],[22,88],[24,88],[25,90],[26,92],[27,94],[25,85],[22,80],[20,76],[18,74],
    [22,92],[20,93],[16,94],[22,98],[20,100],[18,101],[16,102],[14,100],[12,101],[10,100],
    [5,103],[1,104],[5,100],[7,100],[10,100],[12,100],[15,100],[17,102],[20,104],[22,106],
    [24,108],[22,113],[20,110],[15,108],[12,108],[10,108],
    [22,114],[23,113],[25,120],[27,120],[30,122],[32,121],[35,120],[37,122],[40,122],[42,128],
    [44,130],[46,134],[48,135],[50,140],
    [32,130],[33,131],[34,132],[35,133],[36,136],[37,137],[38,141],[40,140],[41,141],[42,143],[43,144],
    [33,130],[34,130],[35,133],[36,137],[35,137],[34,136],
    [35,127],[37,127],[38,128],[37,129],[36,129],
    [10,124],[12,122],[14,122],[16,120],[10,123],[8,124],[5,120],[4,118],[2,114],[0,110],[0,108],[-5,105],[-7,107],[-7,110],[-8,115],[-8,120],
    [50,85],[55,83],[55,73],[57,60],[60,60],[60,73],[62,70],[65,65],[68,65],[70,68],[72,72],[70,80],
    [68,85],[70,100],[72,102],[70,110],[68,115],[67,130],[65,140],[63,143],[61,150],[58,158],[56,162],[53,160],[55,165],[57,163],
    [-16,123],[-18,122],[-20,119],[-22,114],[-25,114],[-28,114],[-30,116],[-32,116],[-34,118],
    [-36,137],[-38,146],[-38,145],[-36,150],[-34,151],[-32,152],[-28,154],[-25,153],[-22,150],
    [-20,148],[-18,146],[-16,146],[-14,136],[-12,136],[-12,131],[-14,128],[-16,124],
    [-36,145],[-38,147],[-40,145],[-41,147],[-25,130],[-28,125],[-30,120],[-32,118],
    [-36,174],[-38,176],[-40,175],[-42,172],[-44,170],[-46,168],
    [-14,50],[-18,44],[-22,44],[-25,47],[-20,48],
  ];
  const LAND_DOTS = LAND_COORDS.map(([lat, lon]) => proj(lat, lon));

  const CITIES = [
    [30,-87,'Panama City'],[25,-80,'Miami'],[41,-74,'New York'],[34,-118,'Los Angeles'],
    [42,-88,'Chicago'],[47,-122,'Seattle'],[29,-95,'Houston'],[33,-84,'Atlanta'],
    [44,-79,'Toronto'],[45,-74,'Montreal'],[19,-99,'Mexico City'],[23,-82,'Havana'],
    [32,-117,'Tijuana'],[39,-104,'Denver'],[38,-77,'Washington'],
    [-23,-46,'São Paulo'],[-34,-58,'Buenos Aires'],[-33,-71,'Santiago'],[-12,-77,'Lima'],
    [4,-74,'Bogotá'],[10,-67,'Caracas'],[-15,-47,'Brasília'],[-3,-60,'Manaus'],
    [51,-0,'London'],[48,2,'Paris'],[52,13,'Berlin'],[40,-4,'Madrid'],[41,12,'Rome'],
    [55,37,'Moscow'],[41,29,'Istanbul'],[52,5,'Amsterdam'],[59,18,'Stockholm'],
    [60,25,'Helsinki'],[50,14,'Prague'],[47,8,'Zurich'],[44,26,'Bucharest'],
    [50,30,'Kyiv'],[53,27,'Minsk'],[48,24,'Lviv'],[45,9,'Milan'],
    [30,31,'Cairo'],[6,3,'Lagos'],[-26,28,'Johannesburg'],[-1,37,'Nairobi'],
    [36,3,'Algiers'],[25,55,'Dubai'],[33,44,'Baghdad'],[24,46,'Riyadh'],
    [31,35,'Amman'],[35,33,'Nicosia'],[-4,15,'Kinshasa'],[15,32,'Khartoum'],
    [19,72,'Mumbai'],[28,77,'Delhi'],[40,116,'Beijing'],[31,121,'Shanghai'],
    [22,114,'Hong Kong'],[36,139,'Tokyo'],[37,127,'Seoul'],[1,104,'Singapore'],
    [-33,151,'Sydney'],[13,100,'Bangkok'],[14,121,'Manila'],[3,102,'Kuala Lumpur'],
    [55,82,'Novosibirsk'],[43,76,'Almaty'],[21,106,'Hanoi'],[23,113,'Guangzhou'],
    [35,139,'Osaka'],[12,77,'Bangalore'],[24,54,'Abu Dhabi'],
  ];
  const CITY_XY = CITIES.map(([lat, lon]) => proj(lat, lon));

  const arcs = [], pulses = [];
  let arcSpawnTimer = 0;

  function getCP(x1, y1, x2, y2) {
    const mx = (x1 + x2) / 2, my = (y1 + y2) / 2;
    const dist = Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
    const lift = dist > 200 ? 0.45 : 0.3;
    return { cpx: mx + (Math.random() - 0.5) * 30, cpy: my - dist * lift };
  }

  function quadAt(t, x1, y1, cpx, cpy, x2, y2) {
    const u = 1 - t;
    return { x: u * u * x1 + 2 * u * t * cpx + t * t * x2, y: u * u * y1 + 2 * u * t * cpy + t * t * y2 };
  }

  function spawnArc() {
    const si = rnd(0, CITIES.length - 1);
    let di = rnd(0, CITIES.length - 1);
    while (di === si) di = rnd(0, CITIES.length - 1);
    const { x: x1, y: y1 } = CITY_XY[si], { x: x2, y: y2 } = CITY_XY[di];
    const { cpx, cpy } = getCP(x1, y1, x2, y2);
    const r = Math.random();
    const color = r < 0.68 ? '#EF4444' : r < 0.88 ? '#F59E0B' : '#4ADE80';
    const speed = color === '#EF4444' ? 0.00042 + Math.random() * 0.00028 : 0.00028 + Math.random() * 0.00020;
    const width = 0.8 + Math.random() * 0.8;
    arcs.push({ x1, y1, x2, y2, cpx, cpy, t: 0, color, speed, width, src: CITIES[si][2], dst: CITIES[di][2] });
    arcTimestamps.push(Date.now());
  }

  function drawArc(a) {
    const steps = 80, end = Math.max(1, Math.floor(a.t * steps));
    ctx.beginPath();
    const trailStart = Math.max(0, a.t - 0.35);
    const pStart = quadAt(trailStart, a.x1, a.y1, a.cpx, a.cpy, a.x2, a.y2);
    ctx.moveTo(pStart.x, pStart.y);
    for (let i = Math.floor(trailStart * steps) + 1; i <= end; i++) {
      const p = quadAt(i / steps, a.x1, a.y1, a.cpx, a.cpy, a.x2, a.y2);
      ctx.lineTo(p.x, p.y);
    }
    ctx.strokeStyle = a.color; ctx.lineWidth = a.width;
    ctx.globalAlpha = 0.45; ctx.shadowColor = a.color; ctx.shadowBlur = 5;
    ctx.stroke(); ctx.shadowBlur = 0; ctx.globalAlpha = 1;
    const head = quadAt(a.t, a.x1, a.y1, a.cpx, a.cpy, a.x2, a.y2);
    ctx.beginPath(); ctx.arc(head.x, head.y, 2.8, 0, Math.PI * 2);
    ctx.fillStyle = a.color; ctx.shadowColor = a.color; ctx.shadowBlur = 12;
    ctx.fill(); ctx.shadowBlur = 0;
  }

  const arcTimestamps = [];
  let statsTimer = 0;

  function updateStats() {
    const now = Date.now(), cutoff = now - 60000;
    while (arcTimestamps.length && arcTimestamps[0] < cutoff) arcTimestamps.shift();
    const rateEl = document.getElementById('heroAtkRate');
    if (rateEl) rateEl.textContent = arcTimestamps.length;
    const activeEl = document.getElementById('heroActive');
    if (activeEl) activeEl.textContent = arcs.length;
  }

  function scheduleBurst() {
    const count = rnd(6, 12);
    for (let i = 0; i < count; i++) setTimeout(() => { if (arcs.length < 35) spawnArc(); }, i * 60);
    setTimeout(scheduleBurst, rnd(5000, 12000));
  }

  let lastTs = 0;
  function frame(ts) {
    const dt = Math.min(ts - lastTs, 50); lastTs = ts;
    ctx.clearRect(0, 0, CW, CH);
    const bgGrad = ctx.createRadialGradient(CW*0.5, CH*0.48, 30, CW*0.5, CH*0.48, CW*0.78);
    bgGrad.addColorStop(0, 'rgba(10,10,26,0.97)');
    bgGrad.addColorStop(0.55, 'rgba(10,10,26,0.90)');
    bgGrad.addColorStop(0.82, 'rgba(10,10,26,0.60)');
    bgGrad.addColorStop(1, 'rgba(10,10,26,0.0)');
    ctx.fillStyle = bgGrad; ctx.fillRect(0, 0, CW, CH);
    ctx.strokeStyle = 'rgba(25,152,168,0.055)'; ctx.lineWidth = 0.5;
    for (let lon = -150; lon <= 180; lon += 30) {
      const x = (lon + 180) / 360 * CW;
      ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, CH); ctx.stroke();
    }
    for (let lat = 60; lat >= -60; lat -= 30) {
      const y = (80 - lat) / 155 * CH;
      ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(CW, y); ctx.stroke();
    }
    LAND_DOTS.forEach(({ x, y }) => {
      ctx.beginPath(); ctx.arc(x, y, 2.2, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(25,152,168,0.08)'; ctx.fill();
      ctx.beginPath(); ctx.arc(x, y, 1.2, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(25,152,168,0.28)'; ctx.fill();
    });
    CITY_XY.forEach(({ x, y }) => {
      ctx.beginPath(); ctx.arc(x, y, 5.5, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(33,198,219,0.06)'; ctx.fill();
      ctx.beginPath(); ctx.arc(x, y, 2.5, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(33,198,219,0.92)'; ctx.shadowColor = '#21c6db'; ctx.shadowBlur = 7;
      ctx.fill(); ctx.shadowBlur = 0;
    });
    arcSpawnTimer += dt;
    if (arcSpawnTimer > 180 && arcs.length < 30) { spawnArc(); arcSpawnTimer = 0; }
    if (Math.random() < 0.15 && arcs.length < 28) spawnArc();
    statsTimer += dt;
    if (statsTimer > 2000) { updateStats(); statsTimer = 0; }
    for (let i = arcs.length - 1; i >= 0; i--) {
      arcs[i].t = Math.min(1, arcs[i].t + arcs[i].speed * dt);
      drawArc(arcs[i]);
      if (arcs[i].t >= 1) {
        const a = arcs[i];
        const pr = a.color === '#EF4444' ? 5 : 4;
        pulses.push({ x: a.x2, y: a.y2, r: pr, alpha: 1, color: a.color });
        if (a.color === '#EF4444') pulses.push({ x: a.x2, y: a.y2, r: pr * 2, alpha: 0.6, color: a.color });
        addEvent(a.src, a.dst, a.color);
        arcs.splice(i, 1);
      }
    }
    for (let i = pulses.length - 1; i >= 0; i--) {
      const p = pulses[i]; p.r += 0.6; p.alpha -= 0.024;
      if (p.alpha <= 0) { pulses.splice(i, 1); continue; }
      ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.strokeStyle = p.color; ctx.lineWidth = 1.1;
      ctx.globalAlpha = p.alpha * 0.5; ctx.shadowColor = p.color; ctx.shadowBlur = 7;
      ctx.stroke(); ctx.shadowBlur = 0; ctx.globalAlpha = 1;
    }
    const vig = ctx.createRadialGradient(CW*0.5, CH*0.5, CW*0.28, CW*0.5, CH*0.5, CW*0.76);
    vig.addColorStop(0, 'rgba(10,10,26,0)');
    vig.addColorStop(0.72, 'rgba(10,10,26,0)');
    vig.addColorStop(1, 'rgba(10,10,26,0.88)');
    ctx.fillStyle = vig; ctx.fillRect(0, 0, CW, CH);
    requestAnimationFrame(frame);
  }

  for (let i = 0; i < 22; i++) setTimeout(() => spawnArc(), i * 100);
  requestAnimationFrame(frame);
  setTimeout(scheduleBurst, rnd(4000, 8000));

  let threats = 1247;
  function tickThreats() {
    threats += rnd(1, 5);
    const el = document.getElementById('heroThreats');
    if (el) el.textContent = threats.toLocaleString();
    setTimeout(tickThreats, rnd(1200, 4000));
  }

  const t0 = Date.now();
  function tickUptime() {
    const s = Math.floor((Date.now() - t0) / 1000);
    const h = String(Math.floor(s / 3600)).padStart(2, '0');
    const m = String(Math.floor((s % 3600) / 60)).padStart(2, '0');
    const sec = String(s % 60).padStart(2, '0');
    const el = document.getElementById('heroUptime');
    if (el) el.textContent = h + ':' + m + ':' + sec;
    setTimeout(tickUptime, 1000);
  }

  let countries = 47;
  function tickCountries() {
    if (Math.random() < 0.45) {
      countries = Math.min(194, countries + 1);
      const el = document.getElementById('heroCountries');
      if (el) el.textContent = countries;
    }
    setTimeout(tickCountries, rnd(18000, 55000));
  }

  const STATIC_EVENTS = [
    { msg: 'Phishing attempt blocked', color: '#EF4444' },
    { msg: 'Malware quarantined — EP-047', color: '#EF4444' },
    { msg: 'Brute-force stopped (IP banned)', color: '#EF4444' },
    { msg: 'DNS hijack intercepted', color: '#EF4444' },
    { msg: 'Ransomware payload dropped', color: '#EF4444' },
    { msg: 'C2 beacon blocked', color: '#EF4444' },
    { msg: 'Zero-day exploit attempt', color: '#EF4444' },
    { msg: 'Suspicious login flagged', color: '#F59E0B' },
    { msg: 'Lateral movement detected', color: '#F59E0B' },
    { msg: 'Anomalous traffic pattern', color: '#F59E0B' },
    { msg: 'Firewall rule triggered', color: '#F59E0B' },
    { msg: 'Patch deployed — 14 devices', color: '#4ADE80' },
    { msg: 'MFA challenge: verified', color: '#4ADE80' },
    { msg: 'EDR cleared: clean sweep', color: '#4ADE80' },
    { msg: 'Cert renewed — leonidastek.com', color: '#4ADE80' },
    { msg: 'Backup verified successfully', color: '#4ADE80' },
  ];
  let evtI = rnd(0, STATIC_EVENTS.length - 1);
  const logItems = [];

  function addEvent(src, dst, color) {
    const feed = document.getElementById('heroFeed');
    if (!feed) return;
    const type = color === '#4ADE80' ? 'Clean' : color === '#F59E0B' ? 'Flagged' : 'Attack';
    const fallback = STATIC_EVENTS[evtI++ % STATIC_EVENTS.length];
    const msg = (src && dst) ? type + ': ' + src.split(' ')[0] + ' → ' + dst.split(' ')[0] : fallback.msg;
    const c = (src && dst) ? color : fallback.color;
    const row = document.createElement('div');
    row.style.cssText = 'display:flex;align-items:center;gap:5px;opacity:0;transition:opacity 0.3s;';
    const dot = document.createElement('span');
    dot.style.cssText = 'width:4px;height:4px;border-radius:50%;flex-shrink:0;box-shadow:0 0 5px ' + c + ';background:' + c + ';';
    const txt = document.createElement('span');
    txt.style.cssText = 'font-size:8px;font-family:Inter,monospace;color:rgba(180,230,235,0.72);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;';
    txt.textContent = msg;
    row.appendChild(dot); row.appendChild(txt);
    feed.insertBefore(row, feed.firstChild);
    requestAnimationFrame(() => requestAnimationFrame(() => { row.style.opacity = '1'; }));
    while (feed.children.length > 5) feed.removeChild(feed.lastChild);
    logItems.push({ msg: type + ': ' + (src || '—') + ' → ' + (dst || '—'), color: c });
    if (logItems.length > 16) logItems.shift();
    const inner = document.getElementById('attackLogInner');
    if (inner) {
      inner.innerHTML = logItems.map(it => '<span style="color:' + it.color + ';opacity:0.6;">' + it.msg + '</span>').join('<span style="opacity:0.25"> · </span>');
      const parent = inner.parentElement;
      if (parent) parent.scrollLeft = parent.scrollWidth;
    }
  }

  tickThreats(); tickUptime(); tickCountries();
  setTimeout(() => addEvent(null, null, '#EF4444'), 400);
  setTimeout(() => addEvent(null, null, '#EF4444'), 1000);
  setTimeout(() => addEvent(null, null, '#F59E0B'), 1800);
  setTimeout(() => addEvent(null, null, '#4ADE80'), 2600);
})();
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
