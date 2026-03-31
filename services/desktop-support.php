<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Desktop Support | Leonidas';
$page_description = 'Fast desktop support for Florida Panhandle businesses. Workstation, laptop, printer, and end-user support — remote and on-site from Leonidas.';
$page_url         = SITE_URL . '/services/desktop-support';

require_once dirname(__DIR__) . '/includes/header.php';
?>

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Services</span>
        <span>/</span><span style="color:#D4A843;">Desktop Support</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Desktop &amp; End-User Support</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Fast Support.<br><span style="color:#D4A843;">First-Time Resolution.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">When your team can not work, every minute costs you money. Our desktop support team responds fast, resolves issues the first time, and keeps your workforce productive. Remote when it makes sense. On-site when it needs hands.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="/contact.php" class="btn-primary">Get Support <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
        <a href="../blog/post.html?slug=unified-endpoint-management" class="blog-card fade-in"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Unified Endpoint Management: One Platform to Rule Them All</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="../blog/post.html?slug=it-asset-management" class="blog-card fade-in fade-in-delay-1"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">IT Asset Management: Tracking What You Own and What It Costs</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="../blog/post.html?slug=hybrid-work-it" class="blog-card fade-in fade-in-delay-2"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">INDUSTRY TRENDS</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Hybrid Work IT: Building Infrastructure for the Modern Workforce</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="../blog/post.html?slug=proactive-it-vs-break-fix" class="blog-card fade-in fade-in-delay-3"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Proactive IT vs. Break-Fix: Why Waiting for Problems Costs More</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your team deserves<br><span style="color:#D4A843;">support that works.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">Stop accepting slow response times and unresolved tickets as normal. Let us show you what responsive, accountable desktop support looks like.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="/contact.php" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
