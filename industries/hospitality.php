<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Hospitality IT | Guest Wi-Fi & POS Security | Florida Panhandle';
$meta_description = 'IT and cybersecurity for hotels, resorts, and restaurants in the Florida Panhandle. Guest Wi-Fi, POS security, and property management system support.';
$canonical_url    = 'https://leonidastek.com/industries/hospitality';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<main style="position:relative; z-index:1;">

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Industries</span>
        <span>/</span><span style="color:#D4A843;">Hospitality</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Hospitality IT</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Connectivity is part<br><span style="color:#D4A843;">of the guest experience.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">In hospitality, technology touches every aspect of the guest journey — from check-in to checkout, from Wi-Fi in the room to the POS at the bar. When the network goes down, service stops. When a POS system is breached, guest credit card data is compromised. Your IT infrastructure has to be as seamless as the experience you're selling.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a Free Hospitality IT Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">The Challenges</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Hospitality IT never sleeps.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Guest Wi-Fi at Scale</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Guests expect fast, reliable Wi-Fi everywhere — in rooms, on the pool deck, in the lobby, and at the bar. Poorly designed wireless networks lead to dead zones, dropped connections, and bad reviews. High-density deployments require proper access point placement, channel planning, and capacity management.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">POS &amp; Payment Security</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Point-of-sale systems process thousands of payment card transactions. PCI DSS compliance requires that payment networks be isolated from guest Wi-Fi and management systems. A breach of cardholder data triggers mandatory notification, forensic investigation, and potential fines from card brands.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Property Management Systems</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Opera, Cloudbeds, Mews, and other PMS platforms are the operational backbone of every property. They need reliable, low-latency connectivity, proper backup procedures, and integrations with key systems — check-in kiosks, digital locks, F&B, and guest messaging — all of which must work together without interruption.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">24/7 Uptime Requirements</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Hotels and restaurants don't close. An internet outage at 2am on a Saturday isn't a Monday morning problem — it's right now. Redundant WAN connections, failover configurations, and on-call monitoring ensure that a single ISP failure doesn't take down the entire property.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Network Segmentation</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Guest Wi-Fi, POS networks, staff systems, back-office servers, and IoT devices (smart TVs, thermostats, door locks) must all be isolated from each other. A guest on your Wi-Fi should never have any path to your reservation system or payment infrastructure.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Seasonal Staffing &amp; Turnover</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Hospitality has some of the highest staff turnover of any industry. Onboarding and offboarding staff quickly — creating accounts, setting permissions, issuing and retrieving devices — requires disciplined IT processes that most properties manage with spreadsheets and memory.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Our Approach</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">When the network works,<br><span style="color:#D4A843;">guests don't notice. They just stay.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">We design hospitality networks from the ground up for the specific demands of your property — high guest density, multiple operational networks running simultaneously, and zero tolerance for downtime. Proper wireless design means consistent coverage in every corner. Proper segmentation means your POS and back-office systems are isolated from guests by design, not by hope.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">We also handle the operational side: staff onboarding and offboarding workflows, device management for front-desk and F&B tablets, and integrations with your PMS and POS vendors. We work around your schedule — maintenance windows, off-season upgrades, and proactive monitoring that catches problems before guests do.</p>
          <div class="mt-8 flex flex-col gap-3">
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">High-density wireless design for lobbies, rooms, pools, and event spaces</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">PCI DSS-compliant POS network isolation and segmentation</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Redundant WAN with automatic failover for 24/7 uptime</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">PMS and POS vendor coordination and system integration</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Cloud VoIP for front desk, housekeeping, and management communications</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Staff onboarding/offboarding workflows and device management</span>
            </div>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">36%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of hotel guests cite poor Wi-Fi as the top reason for a negative review, per J.D. Power</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">PCI DSS</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">required for any business accepting card payments — non-compliance fines reach $100K/month</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">73%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of travelers say reliable Wi-Fi influences their choice of property, per Statista</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">#3</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">most targeted industry for POS malware and payment card theft attacks</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Relevant Services</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for hospitality environments.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/network-engineering" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🌐</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Network Engineering</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">High-density Wi-Fi, network segmentation, redundant WAN, and PCI-compliant design for every corner of your property.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/unified-communications" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">📞</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Unified Communications</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Cloud VoIP for front desk, housekeeping radio integration, and mobile softphones so every staff member stays reachable.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/cybersecurity" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🔒</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">POS protection, endpoint security, and dark web monitoring to protect guest payment data and your brand reputation.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in">
        <div class="section-label">From the Blog</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Hospitality IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/wireless-network-design" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Wireless Network Design: Why Your Office Wi-Fi Might Be Failing You</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/network-segmentation" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">What Is Network Segmentation and Why Does Every Business Need It?</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/multi-carrier-wan-strategy" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">TELECOM</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Multi-Carrier WAN Strategy: Why One ISP Is Never Enough</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/it-onboarding-offboarding-security" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">MANAGED IT</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">IT Onboarding and Offboarding: Why It's a Security Risk You Can't Ignore</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your guests expect flawless.<br><span style="color:#D4A843;">Your IT should deliver it.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free hospitality IT assessment identifies your Wi-Fi gaps, PCI compliance risks, and uptime vulnerabilities — before a guest complains or a payment system goes down. No commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
