<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Telecom &amp; WAN Solutions — Florida Panhandle | Leonidas';
$page_description = 'Telecom and WAN solutions for Florida Panhandle businesses. Fiber procurement, SD-WAN, POTS replacement, and telecom expense management.';
$page_url         = SITE_URL . '/services/telecom-wan';

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
        ['@type'=>'Question','name'=>'What is telecom expense management (TEM)?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Telecom expense management involves auditing, optimizing, and managing your telecom invoices and contracts to eliminate billing errors and overcharges. Most businesses overpay for telecom — TEM identifies and recovers those costs.']],
        ['@type'=>'Question','name'=>'What is POTS line replacement?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Plain Old Telephone Service (POTS) copper lines are being sunset by carriers nationwide. We replace analog lines used for elevator phones, fire alarm dialers, fax machines, gate access, and security systems with modern VoIP or cellular alternatives.']],
        ['@type'=>'Question','name'=>'How does Leonidas help with fiber internet procurement?','acceptedAnswer'=>['@type'=>'Answer','text'=>'We access 300+ carrier and connectivity vendors to find the best fiber and broadband options for your location, negotiate contract terms, and manage the full provisioning process — so you are not dealing with carrier hold times and sales reps.']],
        ['@type'=>'Question','name'=>'What is multi-carrier WAN redundancy?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Multi-carrier redundancy uses two or more internet providers from physically separate paths. If your primary circuit fails, traffic automatically fails over to the secondary connection — keeping your business online without manual intervention.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

$og_image = 'https://leonidastek.com/assets/og-telecom.png';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Services</span>
        <span>/</span><span style="color:#D4A843;">Telecom &amp; WAN</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Telecom &amp; WAN Solutions</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Connectivity Your<br>Business <span style="color:#D4A843;">Depends On.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">We help businesses evaluate, procure, and manage their connectivity. From fiber circuit sourcing to SD-WAN migrations to POTS line replacement — we handle the complexity so you get reliable, cost-effective connectivity without the vendor negotiation headaches.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a Connectivity Review <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in"><div class="section-label">What's Included</div><h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Full-stack connectivity management.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Circuit Procurement</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Fiber and broadband circuit procurement across 300+ carriers. We negotiate on your behalf, compare options, and manage the provisioning process.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">SD-WAN Migration</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">MPLS to SD-WAN migration planning and execution. Reduce costs, improve performance, and gain application-aware routing for cloud workloads.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">POTS Line Replacement</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">The POTS sunset is real. We replace analog lines for elevator phones, fire alarms, fax machines, gate access, and security systems with modern alternatives.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Telecom Expense Management</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Bill auditing, contract review, and ongoing expense management. Most businesses overpay for telecom services. We find and fix the overcharges.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">5G &amp; Fixed Wireless</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">5G and Fixed Wireless Access evaluation for primary or backup connectivity. We assess availability, performance, and fit for your location.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Redundancy &amp; Failover</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Multi-carrier redundancy design. When your primary circuit goes down, your business keeps running. We architect for resilience, not just speed.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">The 300+ Carrier Advantage</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">You should not be calling<br><span style="color:#D4A843;">AT&amp;T yourself.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">Telecom procurement is frustrating. Long hold times, confusing contracts, sales reps who do not understand your requirements, and bills that never match what you were quoted. We do this every day for dozens of clients — we know how to get the right circuit at the right price without the pain.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">Our access to 300+ carriers means we find options you would never see on your own. We negotiate pricing, manage provisioning, coordinate with the carrier when things go wrong, and audit your bills every month.</p>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="rounded-2xl p-8" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div class="text-center mb-6">
              <div style="font-size:4rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em; line-height:1;">300+</div>
              <div style="color:#9CA3AF; font-size:0.9rem; margin-top:0.3rem;">Carrier and connectivity vendors in our network</div>
            </div>
            <div class="flex flex-col gap-3">
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">National and regional fiber providers</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">Cable broadband and DSL providers</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">5G and fixed wireless access providers</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">MPLS and private circuit options</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">SD-WAN overlay providers</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in"><div class="section-label">From the Blog</div><h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Telecom &amp; connectivity insights.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/pots-line-replacement" class="blog-card fade-in"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">TELECOM</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">POTS Line Replacement: Modern Alternatives for Elevator Phones, Alarms, and Fax Lines</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/telecom-expense-management" class="blog-card fade-in fade-in-delay-1"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">TELECOM</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Telecom Expense Management: Stop Overpaying for Connectivity</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/5g-fixed-wireless-business" class="blog-card fade-in fade-in-delay-2"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">5G and Fixed Wireless Access: A Real Alternative for Business Internet?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/fiber-internet-business" class="blog-card fade-in fade-in-delay-3"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">How Fiber Internet Is Changing Business Connectivity</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
      </div>
    </div>
  </section>


  <!-- INDUSTRIES WE SERVE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Industries We Serve</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Connectivity solutions for every sector.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/industries/construction" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏗️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Construction</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Multi-site WAN, temporary field connectivity, and cost-managed telecom for contractors and builders.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/government-contractors" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏛️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Government Contractors</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Secure WAN architecture and compliant connectivity for DoD-aligned facilities and remote sites.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/hospitality" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏨</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Hospitality</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Redundant internet for guest operations, high-density bandwidth, and reliable WAN for hotel properties.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/healthcare" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏥</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Healthcare</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Reliable, redundant WAN and failover connectivity for clinical operations where downtime is not an option.</p>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Often paired with Telecom &amp; WAN.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="<?= $b ?>/services/unified-communications" class="service-card fade-in">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Unified Communications</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Once your circuits are in place, we deploy and manage your UCaaS platform — phone, video, and collaboration in one solution.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/network-engineering" class="service-card fade-in fade-in-delay-1">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Network Engineering</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">SD-WAN design and management that routes your WAN traffic intelligently across the circuits we procure for you.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Stop overpaying for<br><span style="color:#D4A843;">connectivity you hate.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A connectivity review takes 30 minutes and often uncovers significant savings. We audit your current services and show you what better looks like.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
