<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Managed IT Services — Florida Panhandle | Leonidas';
$page_description = 'Proactive managed IT services for Florida Panhandle businesses. Monitoring, helpdesk, patch management, disaster recovery, and strategic IT planning.';
$page_url         = SITE_URL . '/services/managed-it';

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
        ['@type'=>'Question','name'=>'What does a managed IT service provider do?','acceptedAnswer'=>['@type'=>'Answer','text'=>'A managed IT provider monitors, patches, and supports your technology infrastructure proactively — handling helpdesk, backup, and strategic planning so your team can focus on the business instead of IT problems.']],
        ['@type'=>'Question','name'=>'What is the difference between managed IT and break-fix support?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Break-fix providers respond after problems occur and charge per incident. Managed IT is proactive — we monitor your environment around the clock and resolve issues before they impact your business, for a predictable flat monthly rate.']],
        ['@type'=>'Question','name'=>'Can Leonidas work alongside our existing IT staff?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Yes. We frequently co-manage environments alongside internal IT teams, filling gaps in after-hours coverage, specialized expertise, or project capacity without displacing existing roles.']],
        ['@type'=>'Question','name'=>'How much does managed IT service cost?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Pricing is based on user and device count. Most businesses pay a predictable flat monthly rate — typically less than a single full-time IT hire. We provide a specific quote after a free no-obligation assessment.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

$og_image = 'https://leonidastek.com/assets/og-managed-it.png';

require_once dirname(__DIR__) . '/includes/header.php';
?>


  <!-- HERO -->
  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span>
        <span>Services</span>
        <span>/</span>
        <span style="color:#D4A843;">Managed IT</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Managed IT Services</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Your IT Department,<br>Outsourced and <span style="color:#D4A843;">Optimized.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">We operate as your outsourced IT department or as an extension of your existing team. Proactive monitoring, patch management, endpoint management, helpdesk support, and strategic IT planning — all under one accountable partner.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <!-- WHAT'S INCLUDED -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">What's Included</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Everything your IT environment needs.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Proactive Monitoring</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">24/7 endpoint and infrastructure monitoring</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Automated patch management for OS and applications</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Performance alerting before issues impact users</span></div>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Helpdesk Support</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Remote and on-site helpdesk for end users</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Ticketing system with SLA commitments</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Dedicated technician who knows your environment</span></div>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Strategic Planning</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Technology roadmap aligned to business goals</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Quarterly business reviews with metrics</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Budget planning and IT spend optimization</span></div>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Cloud &amp; Microsoft 365</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Microsoft 365 administration and optimization</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Cloud migration strategy and execution</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Hybrid IT architecture design</span></div>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Backup &amp; Disaster Recovery</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Disaster recovery planning and architecture</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Regular DR testing — not just backup verification</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">RTO/RPO aligned to your business requirements</span></div>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.95rem; letter-spacing:0.05em; text-transform:uppercase;">Asset Management</h3>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">IT asset lifecycle management</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Hardware procurement and vendor management</span></div>
          <div class="feature-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">License management and compliance tracking</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- DEEP DIVE -->
  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
        <div class="fade-in">
          <div class="section-label">Proactive vs. Reactive</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">We fix problems before<br><span style="color:#D4A843;">they find you.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">Most IT providers wait for you to call. We run continuous monitoring across every endpoint, server, and network device in your environment. When something looks wrong — an impending disk failure, an anomalous process, a certificate about to expire — we act before it becomes your problem.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">This is the difference between a break-fix shop and a true managed services partner. You should not be calling us every Monday morning. If you are, something is wrong with the model.</p>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="rounded-2xl p-8" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:1.5rem; font-size:1.1rem;">The Managed IT difference</h3>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <div class="text-xs font-bold tracking-wider mb-3" style="color:#6B7280; text-transform:uppercase;">Break-Fix</div>
                <div class="flex flex-col gap-2">
                  <div class="flex items-center gap-2 text-sm" style="color:#6B7280;"><span style="color:#F87171;">✗</span> Reactive — you call first</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#6B7280;"><span style="color:#F87171;">✗</span> No monitoring</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#6B7280;"><span style="color:#F87171;">✗</span> No accountability</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#6B7280;"><span style="color:#F87171;">✗</span> Unpredictable costs</div>
                </div>
              </div>
              <div>
                <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843; text-transform:uppercase;">Leonidas MSP</div>
                <div class="flex flex-col gap-2">
                  <div class="flex items-center gap-2 text-sm" style="color:#9CA3AF;"><span style="color:#4ADE80;">✓</span> Proactive monitoring</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#9CA3AF;"><span style="color:#4ADE80;">✓</span> 24/7 alerting</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#9CA3AF;"><span style="color:#4ADE80;">✓</span> SLA commitments</div>
                  <div class="flex items-center gap-2 text-sm" style="color:#9CA3AF;"><span style="color:#4ADE80;">✓</span> Predictable monthly cost</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- DOWNTIME CALCULATOR CTA -->
  <section class="py-16 px-6" style="background:rgba(5,5,16,0.5);">
    <div class="max-w-7xl mx-auto">
      <div class="fade-in" style="background:linear-gradient(135deg,rgba(212,168,67,0.06) 0%,rgba(212,168,67,0.02) 100%);border:1px solid rgba(212,168,67,0.18);border-radius:1.25rem;padding:2.5rem;display:flex;align-items:center;justify-content:space-between;gap:2rem;flex-wrap:wrap;">
        <div style="flex:1;min-width:260px;">
          <div style="font-size:0.68rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;margin-bottom:0.75rem;">Free Tool</div>
          <h2 style="font-size:clamp(1.4rem,2.5vw,2rem);font-weight:900;letter-spacing:-0.02em;color:#FFFFFF;margin:0 0 0.75rem;">How much does downtime cost your business?</h2>
          <p style="font-size:0.9rem;color:#9CA3AF;margin:0;line-height:1.6;">Most businesses underestimate IT downtime costs by 60%. Our free calculator shows your true annual exposure — including hidden costs most tools ignore.</p>
        </div>
        <div style="flex-shrink:0;">
          <a href="<?= $b ?>/resources/downtime-calculator" style="display:inline-flex;align-items:center;gap:0.6rem;background:#D4A843;color:#0A0A1A;font-weight:700;font-size:0.9rem;padding:0.85rem 1.75rem;border-radius:0.6rem;text-decoration:none;transition:opacity 0.2s;" onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
            Calculate My Risk
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- SECURITY SCORECARD CTA -->
  <section class="py-16 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="fade-in" style="background:linear-gradient(135deg,rgba(74,222,128,0.05) 0%,rgba(74,222,128,0.01) 100%);border:1px solid rgba(74,222,128,0.15);border-radius:1.25rem;padding:2.5rem;display:flex;align-items:center;justify-content:space-between;gap:2rem;flex-wrap:wrap;">
        <div style="flex:1;min-width:260px;">
          <div style="font-size:0.68rem;font-weight:700;letter-spacing:0.18em;color:#4ADE80;text-transform:uppercase;margin-bottom:0.75rem;">Free Security Scan</div>
          <h2 style="font-size:clamp(1.4rem,2.5vw,2rem);font-weight:900;letter-spacing:-0.02em;color:#FFFFFF;margin:0 0 0.75rem;">Is your domain protected against email spoofing?</h2>
          <p style="font-size:0.9rem;color:#9CA3AF;margin:0;line-height:1.6;">Our free Business Security Scorecard checks SPF, DMARC, DKIM, SSL, HTTPS redirect, and security headers — and gives you an actionable score in seconds.</p>
        </div>
        <div style="flex-shrink:0;">
          <a href="<?= $b ?>/resources/security-scorecard" style="display:inline-flex;align-items:center;gap:0.6rem;background:#4ADE80;color:#0A0A1A;font-weight:700;font-size:0.9rem;padding:0.85rem 1.75rem;border-radius:0.6rem;text-decoration:none;transition:opacity 0.2s;" onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
            Scan My Domain
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- RELATED BLOG POSTS -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in">
        <div class="section-label">From the Blog</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Managed IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/proactive-it-vs-break-fix" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Proactive IT vs. Break-Fix: Why Waiting for Problems Costs More</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/disaster-recovery-testing" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Disaster Recovery Testing: When Was the Last Time You Actually Tested Your Backups?</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/technology-roadmap" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Building a Technology Roadmap for Your Business</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/how-to-evaluate-msp" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">How to Evaluate an MSP: 10 Questions to Ask Before You Sign</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>


  <!-- INDUSTRIES WE SERVE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Industries We Serve</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for your industry.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/industries/healthcare" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏥</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Healthcare</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">HIPAA-compliant managed IT for medical practices and health networks protecting patient data and clinical uptime.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/legal" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚖️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Legal</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Secure IT and document management for law firms where client confidentiality is non-negotiable.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/professional-services" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">💼</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Professional Services</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Managed IT for finance, consulting, and accounting firms that run on data and reliability.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/construction" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏗️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Construction</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Field connectivity, mobile device management, and job site IT that keeps projects on schedule.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
      </div>
    </div>
  </section>

  <!-- RELATED SERVICES -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.4);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Related Services</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Often paired with Managed IT.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/cybersecurity" class="service-card fade-in">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Layer security on top of your managed IT — EDR, dark web monitoring, compliance, and vCISO leadership.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/network-engineering" class="service-card fade-in fade-in-delay-1">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Network Engineering</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">A reliable, segmented network is the foundation that managed IT runs on. We design and manage both.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/desktop-support" class="service-card fade-in fade-in-delay-2">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Desktop Support</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">End-user workstation, laptop, and printer support — remote and on-site across the Florida Panhandle.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Stop firefighting.<br><span style="color:#D4A843;">Start planning.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free assessment takes 30 minutes and tells you exactly where your gaps are. No sales pressure, no commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
