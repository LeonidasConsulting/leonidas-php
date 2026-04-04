<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Network Engineering — Florida Panhandle | Leonidas';
$page_description = 'Enterprise network engineering for Florida Panhandle businesses. SD-WAN, SASE, Wi-Fi 7, firewall management, and NOC services from Leonidas.';
$page_url         = SITE_URL . '/services/network-engineering';

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => [
        ['@type'=>'Question','name'=>'What is SD-WAN and should my business use it?','acceptedAnswer'=>['@type'=>'Answer','text'=>'SD-WAN uses software to intelligently route traffic across multiple internet connections. It improves performance, resilience, and visibility — and is typically less expensive than traditional MPLS for businesses with multiple locations.']],
        ['@type'=>'Question','name'=>'How do I know if my network needs to be redesigned?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Common signs include slow application performance, choppy VoIP calls, poor wireless coverage, inability to support remote work reliably, or a flat network with no segmentation between departments or devices.']],
        ['@type'=>'Question','name'=>'What is network segmentation and why does it matter?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Network segmentation divides your infrastructure into isolated zones using VLANs and firewall rules. If one device is compromised, segmentation limits what an attacker can reach — containing breaches before they spread.']],
        ['@type'=>'Question','name'=>'What does a network assessment from Leonidas include?','acceptedAnswer'=>['@type'=>'Answer','text'=>'Our network assessment covers infrastructure inventory, firewall and segmentation review, wireless coverage analysis, WAN performance evaluation, and a prioritized action plan — all delivered after an initial conversation.']],
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
        <span>/</span><span style="color:#D4A843;">Network Engineering</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Network Engineering</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Networks Built for<br>Performance and <span style="color:#D4A843;">Security.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">From initial design to implementation and ongoing optimization, we architect networks that can handle your growth, protect your data, and deliver reliable performance across every site and every user.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a Network Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Capabilities</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">What we design and manage.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" stroke="#D4A843" stroke-width="1.4"/><path d="M10 3C7 3 5 6.5 5 10s2 7 5 7 5-3.5 5-7-2-7-5-7z" stroke="#D4A843" stroke-width="1.4"/><path d="M3 10h14" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">SD-WAN &amp; SASE</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Software-defined WAN deployment and managed SASE for distributed workforces and branch offices.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M10 2C7 2 4.5 4.5 4.5 7.5c0 1.8.9 3.5 2.3 4.5" stroke="#D4A843" stroke-width="1.4"/><path d="M10 2c3 0 5.5 2.5 5.5 5.5 0 1.8-.9 3.5-2.3 4.5" stroke="#D4A843" stroke-width="1.4"/><path d="M10 5C8.3 5 7 6.6 7 7.5s1.3 2.5 3 2.5 3-1.5 3-2.5S11.7 5 10 5z" stroke="#D4A843" stroke-width="1.4"/><line x1="10" y1="10" x2="10" y2="17" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Wireless &amp; Wi-Fi 7</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Professional site surveys, Wi-Fi 7 planning, and enterprise wireless deployments for offices and multi-site environments.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M3 3h14v14H3z" stroke="#D4A843" stroke-width="1.4"/><path d="M3 8h14M8 8v9" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Network Segmentation</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">VLAN design, microsegmentation, and Network Access Control to contain threats and enforce least-privilege access.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M10 2L3 6v5c0 4.5 3 8 7 9 4-1 7-4.5 7-9V6L10 2z" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Firewall Management</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Firewall deployment, configuration, rule review, and ongoing management. We optimize and maintain — not just install.</p>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem; font-size:0.9rem;">QoS for VoIP</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Quality of Service configuration for real-time applications. Eliminate choppy calls and dropped audio before they happen.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem; font-size:0.9rem;">Network Monitoring &amp; NOC</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">24/7 monitoring, alerting, and NOC services. Know about issues before your users do.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem; font-size:0.9rem;">Network Access Control</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">NAC deployment to control who and what connects to your network — managed devices, BYOD, IoT, and guests.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem; font-size:0.9rem;">Multi-Site Architecture</h3>
          <p style="color:#9CA3AF; font-size:0.85rem; line-height:1.6;">Unified architecture across multiple locations. Consistent policy, consistent visibility, consistent performance.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Design Philosophy</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Networks built for<br><span style="color:#D4A843;">how you actually work.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">We do not template-stamp network designs. We start with your business requirements — number of users, application traffic patterns, remote workforce size, compliance requirements, growth trajectory — and architect a network around them.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">Security is baked into every design. Segmentation prevents lateral movement if an endpoint is compromised. Firewall rules are tight, not permissive. Wireless is isolated from production environments where appropriate. The result is a network that works reliably and does not become a liability.</p>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="rounded-2xl p-8" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:1.5rem;">What a network assessment covers</h3>
            <div class="flex flex-col gap-3">
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">Infrastructure inventory and topology documentation</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">Firewall rule and segmentation review</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">Wireless coverage and interference analysis</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">WAN performance and redundancy review</span></div>
              <div class="flex items-start gap-3"><div class="w-5 h-5 rounded flex items-center justify-center flex-shrink-0 mt-0.5" style="background:rgba(212,168,67,0.15);"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M1 5l3 3 5-5" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div><span style="color:#9CA3AF; font-size:0.9rem;">Recommendations with prioritized action plan</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in"><div class="section-label">From the Blog</div><h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Network engineering insights.</h2></div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/sd-wan-vs-mpls" class="blog-card fade-in"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">SD-WAN vs. MPLS: Which WAN Technology Is Right for Your Business?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/what-is-sase" class="blog-card fade-in fade-in-delay-1"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">What Is SASE and Why Is It the Future of Network Security?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/wifi-7-business-upgrade" class="blog-card fade-in fade-in-delay-2"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Wi-Fi 7 Is Here: Should Your Business Upgrade?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
        <a href="<?= $b ?>/blog/network-segmentation" class="blog-card fade-in fade-in-delay-3"><div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div><h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">What Is Network Segmentation and Why Does Every Business Need It?</h3><div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div></a>
      </div>
    </div>
  </section>


  <!-- INDUSTRIES WE SERVE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Industries We Serve</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Network expertise for every environment.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="<?= $b ?>/industries/healthcare" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏥</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Healthcare</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">EHR-optimized networks, medical device VLANs, and clinical-grade wireless for patient care environments.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/hospitality" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏨</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Hospitality</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">High-density guest Wi-Fi, POS network isolation, and property-wide connectivity for hotels and restaurants.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/construction" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏗️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Construction</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Job site connectivity, remote office links, and ruggedized networking for active construction environments.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">See how we help &rarr;</div>
        </a>
        <a href="<?= $b ?>/industries/government-contractors" class="p-6 rounded-xl fade-in fade-in-delay-3" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🏛️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Government Contractors</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">CMMC-compliant network architecture and secure enclaves for defense contractor facilities.</p>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Often paired with Network Engineering.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/cybersecurity" class="service-card fade-in">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Network segmentation and firewall design are only as effective as the security program behind them. We align both.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/managed-it" class="service-card fade-in fade-in-delay-1">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Managed IT Services</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Ongoing network monitoring and management as part of a full managed IT engagement — one team, one bill.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/telecom-wan" class="service-card fade-in fade-in-delay-2">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:0.5rem;">Telecom &amp; WAN</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We source and manage the WAN circuits that feed your network — fiber, broadband, and multi-carrier redundancy.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your network is the foundation.<br><span style="color:#D4A843;">Let's build it right.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A network assessment documents your current environment, identifies gaps, and gives you a clear path forward. It starts with a conversation.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
