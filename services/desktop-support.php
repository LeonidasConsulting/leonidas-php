<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Desktop Support — Florida Panhandle | Leonidas';
$page_description = 'Fast desktop support for Florida Panhandle businesses. Workstation, laptop, printer, and end-user support — remote and on-site from Leonidas.';
$page_url         = SITE_URL . '/services/desktop-support';

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
        ['@type'=>'Question','name'=>'What does desktop support include?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Desktop support covers workstation and laptop troubleshooting, OS and software support, printer and peripheral setup, new device deployment, user onboarding, and Microsoft 365 end-user assistance — both remote and on-site.']],
        ['@type'=>'Question','name'=>'How quickly can desktop support issues be resolved?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Most issues are resolved remotely within hours. On-site visits across the Florida Panhandle are scheduled based on urgency. We prioritize first-call resolution so your team gets back to work fast.']],
        ['@type'=>'Question','name'=>'Is desktop support included in managed IT?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Yes — desktop and end-user support is included in our managed IT plans. It can also be contracted as a standalone service for businesses with an existing IT team that needs overflow or specialized support.']],
        ['@type'=>'Question','name'=>'Do you support both Windows and Mac computers?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Yes. We support Windows, macOS, and mixed environments — including mobile devices and the full Microsoft 365 suite across all platforms.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Services</span>
        <span>/</span><span style="color:#D4A843;">Desktop Support</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Desktop &amp; End-User Support</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Fast Support.<br><span style="color:#D4A843;">First-Time Resolution.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">When your team can not work, every minute costs you money. Our desktop support team responds fast, resolves issues the first time, and keeps your workforce productive. Remote when it makes sense. On-site when it needs hands.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get Support <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in"><div class="section-label">Support Coverage</div><h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">What we support.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Hardware Support</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Workstation and laptop repair and troubleshooting</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Printer and peripheral setup and maintenance</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Hardware procurement and replacement</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Software &amp; OS</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>OS upgrades, patches, and driver conflict resolution</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Application installation, configuration, and troubleshooting</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Microsoft 365 end-user support</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Device Management</h3>
          <ul class="flex flex-col gap-2">
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>New device setup, imaging, and deployment</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Mobile Device Management (MDM) enrollment</li>
            <li class="flex items-start gap-2 text-sm" style="color:#9CA3AF;"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M2 7l3 3 7-7" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Secure device offboarding and data wiping</li>
          </ul>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">Remote Support</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Most issues can be resolved remotely. We use secure remote access tools to connect to your endpoint and fix issues without requiring a site visit — getting your team back to work faster.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">On-Site Support</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">When hands are required, we come to you. Florida Panhandle on-site support for hardware failures, device deployments, office moves, and anything that requires physical presence.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.75rem; font-size:0.9rem; text-transform:uppercase; letter-spacing:0.05em;">User Onboarding</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">New employee IT setup — account provisioning, device configuration, application access, and orientation. New hires should be productive on day one, not day three.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Our Commitment</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Your team calls us.<br><span style="color:#D4A843;">We answer.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">Desktop support sounds simple. In practice, it is the service that most MSPs get wrong. Long hold times, tickets that bounce between technicians, solutions that fix the symptom but not the cause, and technicians who do not actually know your environment.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">We assign technicians who know your devices, your applications, your users, and your preferences. When someone calls us, we know who they are, what they are running, and what history exists on their machine. That context is what drives first-call resolution.</p>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">Fast</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">Response time that respects your team's productivity</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">1st</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">Call resolution is the goal on every single ticket</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">Local</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">On-site support across the Florida Panhandle</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">Known</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">Technicians who know your environment, not strangers</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in"><div class="section-label">From the Blog</div><h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">IT management insights.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/unified-endpoint-management" class="blog-card fade-in"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Unified Endpoint Management: One Platform to Rule Them All</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/it-asset-management" class="blog-card fade-in fade-in-delay-1"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">IT Asset Management: Tracking What You Own and What It Costs</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/hybrid-work-it" class="blog-card fade-in fade-in-delay-2"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">INDUSTRY TRENDS</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Hybrid Work IT: Building Infrastructure for the Modern Workforce</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/proactive-it-vs-break-fix" class="blog-card fade-in fade-in-delay-3"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Proactive IT vs. Break-Fix: Why Waiting for Problems Costs More</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
      </div>
    </div>
  </section>


  <!-- INDUSTRIES WE SERVE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Industries We Serve</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Support for every type of workplace.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/industries/legal" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚖️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Legal</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Attorney workstations, document management software support, and reliable IT for legal professionals.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/professional-services" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">💼</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Professional Services</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Knowledge worker support, M365 administration, and productivity-focused IT for service firms.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/healthcare" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏥</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Healthcare</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Clinical workstation support, EHR helpdesk, and HIPAA-aware desktop management for medical offices.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/hospitality" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏨</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Hospitality</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">POS system support, front desk IT, and property management software assistance for hospitality teams.</p>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Often paired with Desktop Support.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="<?= $b ?>/services/managed-it" class="service-card fade-in">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Managed IT Services</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Desktop support bundled with proactive monitoring, patch management, and strategic IT planning — one team covering everything.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/cybersecurity" class="service-card fade-in fade-in-delay-1">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Every endpoint we support can also be protected with EDR, MFA enforcement, and security awareness training.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your team deserves<br><span style="color:#D4A843;">support that works.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">Stop accepting slow response times and unresolved tickets as normal. Let us show you what responsive, accountable desktop support looks like.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
