<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Unified Communications &amp; UCaaS — Florida Panhandle | Leonidas';
$page_description = 'Cloud phone systems and UCaaS for Florida Panhandle businesses. RingCentral, Teams Phone, Five9, Zoom Phone, contact center, and SIP trunking.';
$page_url         = SITE_URL . '/services/unified-communications';

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
        ['@type'=>'Question','name'=>'What is UCaaS?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Unified Communications as a Service (UCaaS) combines phone, video, messaging, and collaboration into a single cloud platform — replacing traditional on-premise PBX systems with a flexible, subscription-based service that works anywhere.']],
        ['@type'=>'Question','name'=>'How difficult is it to migrate from a traditional phone system to VoIP?','acceptedAnswer'=>['@type'=>'Answer','text'=>'With proper planning, migrations are smooth. We handle everything — platform selection, number porting, call flow design, user training, and the actual cutover — minimizing disruption to your business.']],
        ['@type'=>'Question','name'=>'Which UCaaS platform is right for my business?','acceptedAnswer'=>['@type'=>'Answer','text'=>'It depends on your size, integrations, call volume, and budget. We are vendor-agnostic and know every major platform — RingCentral, Microsoft Teams Phone, Zoom Phone, 8x8, Five9, and others. We recommend what fits, not what pays us more.']],
        ['@type'=>'Question','name'=>'Can I keep my existing business phone numbers?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Yes. Number porting transfers your existing numbers to the new cloud system, typically completing within 2–4 weeks depending on the carrier.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

$og_image = 'https://leonidastek.com/assets/og-unified-comms.png';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Services</span>
        <span>/</span><span style="color:#D4A843;">Unified Communications</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Unified Communications &amp; VoIP</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Crystal-Clear Communications,<br><span style="color:#D4A843;">Cloud-Powered.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">We design, deploy, and support cloud phone systems and unified communications platforms. Our team handles every aspect — from platform selection and number porting to call flow design, contact center deployment, and end-user training.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a UC Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">What's Included</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">End-to-end UC delivery.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Platform Selection</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We evaluate and select the right platform for your business — not the one that pays us the highest commission. We know every major platform deeply.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Network Readiness</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Before deploying VoIP, we assess and configure your network for QoS. Choppy calls are a network problem. We solve it before deployment.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Number Porting</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We manage the full porting process — existing numbers, new numbers, toll-free. No downtime during cutover when handled correctly.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Call Flow Design</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Auto-attendant, IVR trees, hunt groups, call queues, ring strategies, voicemail — we design the experience callers have with your business.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Contact Center</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">CCaaS deployment for RingCX and Five9. Skills-based routing, agent dashboards, supervisor tools, and CRM integrations.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Training &amp; Adoption</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">End-user training so your team actually uses the platform. IP phone provisioning, softphone setup, mobile app configuration.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in text-center">
        <div class="section-label justify-center">Platform Expertise</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">We know them all.</h2>
        <p class="mt-4 max-w-xl mx-auto text-base" style="color:#9CA3AF;">Vendor-agnostic expertise across every major UCaaS and CCaaS platform. We recommend what fits — not what we are certified to sell.</p>
      </div>
      <div class="flex flex-wrap justify-center fade-in" style="gap:0.5rem; max-width:800px; margin:0 auto;">
        <span class="platform-tag">RingCentral</span>
        <span class="platform-tag">RingCX</span>
        <span class="platform-tag">Microsoft Teams Phone</span>
        <span class="platform-tag">Five9</span>
        <span class="platform-tag">Zoom Phone</span>
        <span class="platform-tag">8x8</span>
        <span class="platform-tag">Vonage</span>
        <span class="platform-tag">Dialpad</span>
        <span class="platform-tag">Nextiva</span>
        <span class="platform-tag">GoTo Connect</span>
        <span class="platform-tag">Mitel</span>
        <span class="platform-tag">SIP Trunking</span>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in"><div class="section-label">From the Blog</div><h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">UCaaS &amp; VoIP insights.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/voip-101" class="blog-card fade-in"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">VOIP</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">VoIP 101: What Every Business Needs to Know Before Switching</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/ringcentral-vs-teams-phone" class="blog-card fade-in fade-in-delay-1"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">VOIP</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">RingCentral vs. Microsoft Teams Phone: Which Is Right for Your Business?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/ucaas-trends-2026" class="blog-card fade-in fade-in-delay-2"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">VOIP</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">UCaaS Trends in 2026: What's Changing in Unified Communications</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/cloud-phone-migration" class="blog-card fade-in fade-in-delay-3"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">VOIP</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Cloud Phone Migration: How to Move Your Business Phone System to the Cloud</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
      </div>
    </div>
  </section>


  <!-- INDUSTRIES WE SERVE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Industries We Serve</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Communications built for your workflows.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/industries/healthcare" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏥</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Healthcare</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">HIPAA-compliant VoIP, secure clinical messaging, and encrypted communications for healthcare teams.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/legal" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚖️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Legal</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Professional phone systems and secure client communications for law offices and legal departments.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/hospitality" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏨</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Hospitality</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Property-wide communications, guest services integration, and front desk systems for hotels and resorts.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/professional-services" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">💼</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Professional Services</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Polished client communications, CRM-integrated calling, and video conferencing for service firms.</p>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Often paired with Unified Communications.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="<?= $b ?>/services/telecom-wan" class="service-card fade-in">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Telecom &amp; WAN</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">SIP trunking, circuit procurement, and multi-carrier connectivity that your UCaaS platform depends on. We manage the whole stack.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/network-engineering" class="service-card fade-in fade-in-delay-1">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Network Engineering</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">VoIP quality lives or dies on the network. We configure QoS, segment traffic, and ensure your network is ready before cutover.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Ready to upgrade<br><span style="color:#D4A843;">your phone system?</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">We start with a UC assessment — reviewing your current setup, call volume, feature requirements, and network readiness. Then we recommend the right platform and handle the entire migration.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
