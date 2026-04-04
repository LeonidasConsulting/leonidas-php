<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Construction IT — Field Connectivity & MDM | Florida Panhandle';
$meta_description = 'IT built for construction — field connectivity, mobile device management, and cybersecurity for contractors and builders in the Florida Panhandle.';
$canonical_url    = 'https://leonidastek.com/industries/construction';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<main style="position:relative; z-index:1;">

  <!-- Hero -->
  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Industries</span>
        <span>/</span><span style="color:#D4A843;">Construction</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Construction IT</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Your crews can't stop.<br><span style="color:#D4A843;">Your IT shouldn't either.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">Construction companies operate across multiple locations simultaneously — job sites, trailers, branch offices, and headquarters. Your teams need reliable connectivity, secure access to plans and project data, and devices that work as hard as they do. When IT fails on a job site, projects stall and costs climb.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact.php" class="btn-primary">Get a Free Construction IT Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Challenges -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">The Challenges</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Construction IT lives in the field.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Job Site Connectivity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Construction sites rarely have reliable internet. Crews depend on LTE, fixed wireless, and temporary networks to access plans, submit timesheets, and communicate with the office — and those connections need to be fast, reliable, and secure enough for sensitive project data.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Mobile Device Management</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Tablets and smartphones on job sites get lost, stolen, dropped, and handed off between crews. Every device that touches company data — Procore, Bluebeam, project files — needs to be enrolled, secured, and remotely wipeable without requiring a trip to the office.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Multi-Site Coordination</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">General contractors and large builders manage multiple projects simultaneously. Superintendents, project managers, estimators, and executives all need real-time access to the same data — from different locations, on different devices, with different levels of access.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Subcontractor Access</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Subcontractors and vendors need access to plans, schedules, and shared portals — but you can't extend your full network to every sub on the site. Guest access, segmented Wi-Fi, and contractor-specific permissions protect your data while keeping projects moving.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Ransomware &amp; BEC</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Construction firms are increasingly targeted by ransomware and business email compromise. With large wire transfers, subcontractor payments, and title company communications, a single spoofed email or infected attachment can cost hundreds of thousands of dollars.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Communications Across Sites</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Personal cell phones work for quick calls, but they create gaps in documentation, make call recording impossible, and leave the company without a professional number when supervisors turn over. Cloud VoIP keeps your team reachable under one system regardless of location.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How We Help -->
  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Our Approach</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">IT that moves<br><span style="color:#D4A843;">with your projects.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">Construction IT requires flexibility that most managed services aren't built for. Projects spin up, run for months or years, and wind down — taking their network requirements with them. We design infrastructure that scales with your project pipeline, not against it.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">That means mobile-first device management for field crews. Ruggedized connectivity solutions for job trailers. Cloud VoIP that works on a tablet in a hard hat. And cybersecurity that catches the BEC and ransomware threats that the construction industry has become known for absorbing. We make it work in the field — not just in the boardroom.</p>
          <div class="mt-8 flex flex-col gap-3">
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">LTE, fixed wireless, and temporary site network deployment</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Mobile device management (MDM) for tablets and smartphones in the field</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Procore, Bluebeam, and construction software integration and support</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Segmented guest Wi-Fi for subcontractor and vendor access</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Cloud VoIP with mobile apps for office, trailer, and field staff</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Email security and BEC prevention to protect wire transfers and payments</span>
            </div>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">6th</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">most targeted industry for ransomware — construction is increasingly in attackers' sights</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">68%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of construction companies use mobile devices on job sites daily, per AGC</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$1.3M</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">average ransomware payment in the construction industry in 2024</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">3x</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">more likely to be targeted when operating across multiple active job sites</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services callout -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Relevant Services</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for how construction works.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/services/network-engineering.php" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🌐</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Network Engineering</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Temporary site networks, LTE failover, and multi-location WAN that keeps every site connected to the office.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/managed-it.php" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚙️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Managed IT</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">MDM for field devices, helpdesk support for crews on the go, and proactive monitoring across every site and office.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/unified-communications.php" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">📞</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Unified Communications</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Cloud VoIP with mobile apps so superintendents and PMs stay reachable under one business number from any site.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/cybersecurity.php" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🔒</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Email security, endpoint protection, and BEC prevention to guard against wire fraud and ransomware targeting construction payments.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <!-- Blog posts -->
  <section class="py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in">
        <div class="section-label">From the Blog</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Construction IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/post.php?slug=5g-fixed-wireless-business" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">5G and Fixed Wireless Access: A Real Alternative for Business Internet?</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=unified-endpoint-management" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Unified Endpoint Management (UEM): One Platform to Rule Them All</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=business-email-compromise-bec" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Business Email Compromise: The $50 Billion Scam Targeting Your Finance Team</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=multi-carrier-wan-strategy" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">TELECOM</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Multi-Carrier WAN Strategy: Why One ISP Is Never Enough</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Every day of downtime<br><span style="color:#D4A843;">costs real money.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free construction IT assessment identifies your field connectivity gaps, device risks, and cybersecurity exposure — before they slow down a project or cost you a wire transfer. No commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact.php" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
