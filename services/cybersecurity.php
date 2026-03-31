<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Cybersecurity &amp; MSSP | Leonidas';
$page_description = 'Layered cybersecurity for businesses in the Florida Panhandle. EDR, MDR, dark web monitoring, compliance, vCISO, and security awareness training.';
$page_url         = SITE_URL . '/services/cybersecurity';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Services</span>
        <span>/</span><span style="color:#D4A843;">Cybersecurity</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Cybersecurity</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Layered Security.<br><span style="color:#D4A843;">No Shortcuts.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">We build security programs that go beyond checkbox compliance. Every layer is intentional — from DNS filtering to privileged access management to virtual CISO leadership. Security is not an add-on. It is foundational.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact.php" class="btn-primary">Get a Free Security Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Security Stack</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Every layer covered.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Endpoint Security</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Endpoint Detection &amp; Response (EDR)</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Managed Detection &amp; Response (MDR)</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Unified Endpoint Management</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Identity &amp; Access</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Privileged Access Management (PAM)</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Multi-Factor Authentication (MFA) enforcement</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Least-privilege principle enforcement</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Network &amp; DNS Security</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>DNS-layer security (Cisco Umbrella, Cloudflare Gateway)</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Next-generation firewall management</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Zero Trust network architecture</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Email &amp; Dark Web</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Email security with SPF, DKIM, and DMARC</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Dark web monitoring and credential alerting</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Security awareness training and phishing simulations</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Compliance</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>NIST CSF, CIS Controls, CMMC alignment</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Vulnerability assessments and pen testing coordination</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Cyber insurance readiness assessments</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">vCISO &amp; Leadership</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Virtual CISO for executive-level security guidance</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Incident response planning and tabletop exercises</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Security program development and roadmapping</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Our Approach</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Security is not a product.<br><span style="color:#D4A843;">It is a program.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">Most breaches are not caused by exotic zero-day exploits. They are caused by unpatched systems, weak passwords, misconfigured email, or employees clicking phishing links. Our security programs address the boring, unglamorous fundamentals that actually prevent attacks.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">We layer defense: DNS filtering stops malware before it reaches endpoints. EDR catches what slips through. Dark web monitoring alerts you when credentials are compromised. MFA limits what attackers can do with stolen passwords. Each layer assumes the others will fail sometimes — and compensates.</p>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">82%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of breaches involve a human element — phishing, stolen credentials, or error</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">207</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">days average time to identify a breach without proper monitoring</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$4.45M</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">average cost of a data breach in 2024 (IBM Security Report)</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">99.9%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of attacks blocked by MFA alone, per Microsoft</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in">
        <div class="section-label">From the Blog</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Cybersecurity insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/5-cybersecurity-threats-2026" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">5 Cybersecurity Threats Every Business Must Prepare for in 2026</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/zero-trust-security-smbs" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Zero Trust Security: A Practical Guide for Small Businesses</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/dark-web-monitoring" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Dark Web Monitoring: Why Your Business Can't Afford to Ignore It</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/multi-factor-authentication-2026" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Why Multi-Factor Authentication Is Non-Negotiable in 2026</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Know your security posture.<br><span style="color:#D4A843;">Before attackers do.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free security assessment identifies your exposure across endpoints, identity, email, and network. No commitment required — just clarity.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact.php" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
