<?php
require_once __DIR__ . '/includes/config.php';
$b = SITE_BASE;

$page_title       = 'About Leonidas | Managed IT &amp; Cybersecurity Experts — Florida Panhandle';
$page_description = 'Learn how Leonidas has delivered managed IT, cybersecurity, and unified communications for businesses across the Florida Panhandle for over 20 years.';
$page_url         = SITE_URL . '/about';

require_once __DIR__ . '/includes/header.php';
?>

  <!-- HERO -->
  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:700px; height:700px; background:radial-gradient(circle, rgba(212,168,67,0.06) 0%, transparent 70%); top:-200px; right:-200px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <div class="max-w-4xl">
        <div class="section-label fade-in">About Leonidas</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(3rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Technology That<br>Works for <span style="color:#D4A843;">You.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-8 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">Leonidas is a managed IT services provider, cybersecurity firm, and unified communications consultancy serving businesses across the Florida Panhandle. For over two decades, we have built our reputation on a single principle: your technology should work for you, not against you.</p>
        <p class="fade-in fade-in-delay-3 mt-5 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">We do not chase buzzwords. We deploy what works, we stand behind it, and we stay accountable when it does not.</p>
      </div>
    </div>
  </section>

  <!-- PULL QUOTE -->
  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-5xl mx-auto fade-in">
      <div class="rounded-2xl p-10 md:p-16 text-center" style="background:rgba(212,168,67,0.03); border:1px solid rgba(212,168,67,0.12);">
        <p style="font-size:clamp(1.4rem,3vw,2.2rem); font-weight:800; color:#F9FAFB; letter-spacing:-0.02em; line-height:1.4;">"We serve organizations ranging from small businesses with five employees to regional enterprises with complex multi-site infrastructure. What they share is the need for IT that is <span style="color:#D4A843;">reliable, secure, and aligned with how their business actually operates.</span>"</p>
      </div>
    </div>
  </section>

  <!-- SERVICE DETAILS -->
  <section class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-16 fade-in">
        <div class="section-label">What We Do</div>
        <h2 style="font-size:clamp(2rem,4vw,3rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Six core service lines.<br>Deep expertise in each.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Managed IT -->
        <div class="service-card fade-in">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" stroke="#D4A843" stroke-width="1.5"/><path d="M8 13h8M8 17h5" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round"/><path d="M8 4h8v3H8z" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/managed-it.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Managed IT Services</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Proactive monitoring, patch management, helpdesk &amp; strategic planning</p>
            </div>
          </div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">IT asset lifecycle management and hardware procurement</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Disaster recovery planning, backup architecture, and DR testing</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Cloud migration strategy and hybrid IT architecture design</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Microsoft 365 administration and optimization</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Technology roadmap development aligned to business goals</span></div>
          <a href="<?= $b ?>/services/managed-it.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

        <!-- Cybersecurity -->
        <div class="service-card fade-in fade-in-delay-1">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M12 2L4 6v6c0 6 4 9.5 8 10.5C16 21.5 20 18 20 12V6L12 2z" stroke="#D4A843" stroke-width="1.5"/><path d="M8.5 12l3 3L16 9" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/cybersecurity.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Cybersecurity</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Layered security programs beyond checkbox compliance</p>
            </div>
          </div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Endpoint Detection and Response (EDR) and Managed Detection and Response (MDR)</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Dark web monitoring and credential exposure alerting</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Privileged Access Management (PAM) and MFA enforcement</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">NIST CSF, CIS Controls, CMMC compliance framework alignment</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Virtual CISO (vCISO) services for executive-level security leadership</span></div>
          <a href="<?= $b ?>/services/cybersecurity.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

        <!-- Network Engineering -->
        <div class="service-card fade-in">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3.5" stroke="#D4A843" stroke-width="1.5"/><circle cx="4" cy="6" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="20" cy="6" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="4" cy="18" r="2" stroke="#D4A843" stroke-width="1.5"/><circle cx="20" cy="18" r="2" stroke="#D4A843" stroke-width="1.5"/><path d="M6 7L9 10M15 10l3-3M6 17l3-4M15 14l3 3" stroke="#D4A843" stroke-width="1.2"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/network-engineering.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Network Engineering</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Design, implementation, and ongoing optimization</p>
            </div>
          </div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">SD-WAN and SASE deployment and management</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Network segmentation, VLAN design, and microsegmentation</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Wireless network design with professional site surveys</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Firewall deployment, configuration, and ongoing management</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Wi-Fi 7 and next-generation wireless planning</span></div>
          <a href="<?= $b ?>/services/network-engineering.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

        <!-- UCaaS -->
        <div class="service-card fade-in fade-in-delay-1">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M4 4h16a1 1 0 011 1v9a1 1 0 01-1 1h-7l-4 3V15H4a1 1 0 01-1-1V5a1 1 0 011-1z" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/unified-communications.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Unified Communications &amp; VoIP</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Design, deploy, and support cloud phone systems</p>
            </div>
          </div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Platform evaluation, selection, and number porting</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Auto-attendant, IVR, and call queue configuration</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Contact center deployment (RingCX, Five9)</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">IP phone and softphone provisioning and training</span></div>
          <p class="text-xs mt-3" style="color:#6B7280;"><span style="color:#D4A843; font-weight:600;">Platforms:</span> RingCentral, Teams Phone, Five9, Zoom Phone, 8x8, Vonage, Dialpad, Nextiva, GoTo Connect, Mitel</p>
          <a href="<?= $b ?>/services/unified-communications.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

        <!-- Telecom & WAN -->
        <div class="service-card fade-in">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M12 2C8 2 5 5.3 5 9.5c0 2.5 1.2 4.7 3 6" stroke="#D4A843" stroke-width="1.5"/><path d="M12 2c4 0 7 3.3 7 7.5c0 2.5-1.2 4.7-3 6" stroke="#D4A843" stroke-width="1.5"/><path d="M12 6c-2 0-3.5 1.7-3.5 4s1.5 4 3.5 4 3.5-1.7 3.5-4-1.5-4-3.5-4z" stroke="#D4A843" stroke-width="1.5"/><line x1="12" y1="14" x2="12" y2="21" stroke="#D4A843" stroke-width="1.5"/><line x1="8" y1="21" x2="16" y2="21" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/telecom-wan.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Telecom &amp; WAN Solutions</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Connectivity procurement, management, and optimization</p>
            </div>
          </div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Fiber and broadband circuit procurement and negotiation</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">MPLS to SD-WAN migration planning and execution</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">POTS line replacement for elevator phones, alarms, fax, and gate access</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Telecom expense management and bill auditing</span></div>
          <div class="check-item"><svg class="check-icon" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="rgba(212,168,67,0.3)"/><path d="M5.5 9l2.5 2.5L12.5 6" stroke="#D4A843" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg><span style="color:#9CA3AF; font-size:0.88rem;">Access to 300+ carriers and connectivity vendors</span></div>
          <a href="<?= $b ?>/services/telecom-wan.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

        <!-- Desktop Support -->
        <div class="service-card fade-in fade-in-delay-1">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(212,168,67,0.1); border:1px solid rgba(212,168,67,0.2);">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" stroke="#D4A843" stroke-width="1.5"/><line x1="12" y1="17" x2="12" y2="21" stroke="#D4A843" stroke-width="1.5"/><line x1="8" y1="21" x2="16" y2="21" stroke="#D4A843" stroke-width="1.5"/></svg>
            </div>
            <div>
              <a href="<?= $b ?>/services/desktop-support.php" style="text-decoration:none; cursor:pointer;"><h3 style="font-size:1.2rem; font-weight:800; color:#FFFFFF; transition:color 0.2s;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#FFFFFF'">Desktop Support</h3></a>
              <p style="font-size:0.8rem; color:#6B7280; margin-top:0.2rem;">Fast, reliable end-user support — remote or on-site</p>
            </div>
          </div>
          <p style="color:#9CA3AF; font-size:0.9rem; line-height:1.7;">Fast, reliable support for workstations, laptops, printers, and end-user applications. We resolve hardware and software issues, manage device deployments, handle OS upgrades and driver conflicts, and keep your workforce productive. Whether remote or on-site, our support team responds quickly and resolves issues the first time.</p>
          <a href="<?= $b ?>/services/desktop-support.php" class="learn-more mt-4 inline-flex items-center gap-2 text-sm font-semibold" style="color:#D4A843;">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        </div>

      </div>
    </div>
  </section>

  <!-- OUR APPROACH -->
  <section class="py-28 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
        <div class="fade-in">
          <div class="section-label">Our Philosophy</div>
          <h2 style="font-size:clamp(2rem,4vw,3rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">We are not a vendor.<br><span style="color:#D4A843;">We are your partner.</span></h2>
          <p class="mt-6 text-2xl font-light leading-relaxed" style="color:#6B7280; max-width:400px;">"We take the time to understand how your business works, where your technology gaps are, and what outcomes matter most to you."</p>
        </div>
        <div class="fade-in fade-in-delay-1">
          <p class="text-base leading-relaxed mb-6" style="color:#9CA3AF;">We are not a vendor that sells you a box and disappears. Leonidas operates as a long-term technology partner. We take the time to understand how your business works, where your technology gaps are, and what outcomes matter most to you. Then we build a plan, execute it, and stay accountable for the results.</p>
          <p class="text-base leading-relaxed" style="color:#9CA3AF;">We are vendor-agnostic by design. We recommend the solution that fits your business, not the one that pays us the highest commission. Our partner network spans hundreds of technology vendors, but every recommendation starts with your requirements — not a vendor's sales quota.</p>
          <div class="mt-10 grid grid-cols-2 gap-4">
            <div class="p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">20+</div>
              <div style="color:#9CA3AF; font-size:0.85rem; margin-top:0.3rem;">Years of experience in the United States market</div>
            </div>
            <div class="p-5 rounded-xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">300+</div>
              <div style="color:#9CA3AF; font-size:0.85rem; margin-top:0.3rem;">Vendor and carrier partners in our network</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WHY LEONIDAS FEATURES -->
  <section class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-16 fade-in">
        <div class="section-label">Why Leonidas</div>
        <h2 style="font-size:clamp(2rem,4vw,3rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">What sets us apart.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M10 1.5l8 4v5c0 5-3.5 8.5-8 9.5-4.5-1-8-4.5-8-9.5v-5l8-4z" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Single Point of Contact</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">You call us, you get someone who knows your environment. Not a call center. Not a rotating cast of technicians.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" stroke="#D4A843" stroke-width="1.4"/><path d="M7 10h6M10 7v6" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">20+ Years of Experience</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We have seen every failure mode, every vendor promise, and every shortcut that does not work. That experience informs everything we recommend.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M4 10h12M10 4v12" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round"/><circle cx="10" cy="10" r="8" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Vendor-Agnostic</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We work across 300+ vendors and carriers. We recommend what fits, not what pays us more. Your requirements drive every decision.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M10 2C6 2 3 5 3 9c0 2.5 1.2 4.8 3 6.2V17h2v2h4v-2h2v-1.8A7.5 7.5 0 0017 9c0-4-3-7-7-7z" stroke="#D4A843" stroke-width="1.4"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Florida Panhandle Focused</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Headquartered in Panama City Beach, FL — we serve the Florida Panhandle. We are local. On-site when you need us.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><path d="M10 2L3 6v5c0 4.5 3 8 7 9 4-1 7-4.5 7-9V6l-7-4z" stroke="#D4A843" stroke-width="1.4"/><path d="M7 10l2 2 4-4" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Security-First Mindset</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">Every solution we deploy is evaluated through a security lens. Cybersecurity is not an add-on — it is foundational to everything we build.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4" style="background:rgba(212,168,67,0.1);"><svg width="20" height="20" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" stroke="#D4A843" stroke-width="1.4"/><path d="M10 6v4l3 3" stroke="#D4A843" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Proactive, Not Reactive</h3>
          <p style="color:#9CA3AF; font-size:0.88rem; line-height:1.6;">We fix problems before they impact your business. Monitoring, alerting, and patching happen continuously — not after you call us.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PARTNERS MARQUEE -->
  <section class="py-16" style="border-top:1px solid rgba(212,168,67,0.06); border-bottom:1px solid rgba(212,168,67,0.06);">
    <div class="max-w-7xl mx-auto px-6 mb-8 fade-in">
      <div class="section-label">Technology Partners</div>
    </div>
    <div style="overflow:hidden; mask-image:linear-gradient(90deg, transparent 0%, #0A0A1A 8%, #0A0A1A 92%, transparent 100%); -webkit-mask-image:linear-gradient(90deg, transparent 0%, #0A0A1A 8%, #0A0A1A 92%, transparent 100%);">
      <div class="marquee-track">
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">RINGCENTRAL</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">FIVE9</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">MICROSOFT</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">CISCO</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">ZOOM</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">8X8</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">VONAGE</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">DIALPAD</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">NEXTIVA</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">GOTO CONNECT</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">MITEL</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">RINGCENTRAL</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">FIVE9</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">MICROSOFT</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">CISCO</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">ZOOM</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">DIALPAD</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">NEXTIVA</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">GOTO CONNECT</span><span style="color:#374151; margin:0 0.5rem;">·</span>
        <span class="text-sm font-bold tracking-widest" style="color:#4B5563;">MITEL</span>
      </div>
    </div>
  </section>

  <!-- GEOGRAPHIC COVERAGE -->
  <section class="py-28 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Service Area</div>
          <h2 style="font-size:clamp(2rem,4vw,3rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Serving the<br><span style="color:#D4A843;">Florida Panhandle.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF; max-width:450px;">Leonidas is headquartered in Panama City Beach, Florida and serves businesses throughout the Florida Panhandle — from Pensacola to Tallahassee. We deliver both remote and on-site support, and our managed services clients receive proactive monitoring and response around the clock.</p>
        </div>
        <div class="fade-in fade-in-delay-1">
          <div class="grid grid-cols-2 gap-3">
            <div class="p-4 rounded-lg" style="background:rgba(212,168,67,0.06); border:1px solid rgba(212,168,67,0.2);">
              <div class="text-sm font-semibold" style="color:#D4A843;">Panama City Beach, FL</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Headquarters</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Fort Walton Beach</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Destin</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Panama City</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Pensacola</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Marianna</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">Tallahassee</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
            <div class="p-4 rounded-lg" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.08);">
              <div class="text-sm font-semibold" style="color:#FFFFFF;">And Surrounding Areas</div>
              <div class="text-xs" style="color:#6B7280; margin-top:0.2rem;">Florida Panhandle</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-28 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Ready to Talk?</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">The conversation<br>is always free.</h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">Whether you need a full managed IT partner, a cybersecurity assessment, a VoIP deployment, or a second opinion on your current setup — start here.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact.php" class="btn-primary">Contact Leonidas <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:<?= COMPANY_PHONE_TEL ?>" class="btn-ghost"><?= COMPANY_PHONE ?></a>
      </div>
      <p class="mt-8 text-sm" style="color:#6B7280;"><a href="mailto:<?= COMPANY_EMAIL ?>" style="color:#D4A843; text-decoration:none;"><?= COMPANY_EMAIL ?></a> · <?= COMPANY_ADDRESS ?></p>
    </div>
  </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
