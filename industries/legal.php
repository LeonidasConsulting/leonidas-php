<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Legal IT Solutions | Law Firm Cybersecurity & IT | Leonidas';
$meta_description = 'IT and cybersecurity for law firms in the Florida Panhandle. Client confidentiality, data loss prevention, encrypted storage, and secure remote access.';
$canonical_url    = 'https://leonidastek.com/industries/legal';

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
        <span>/</span><span style="color:#D4A843;">Legal</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Legal IT</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Client privilege is<br><span style="color:#D4A843;">non-negotiable.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">Law firms hold some of the most sensitive data in existence — attorney-client privileged communications, litigation strategy, financial records, and personally identifiable information. A breach doesn't just cost money. It can expose clients, destroy trust, trigger bar complaints, and end careers. Your IT infrastructure has to match what's at stake.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact.php" class="btn-primary">Get a Free Law Firm IT Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Law firms are high-value targets.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Client Confidentiality</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Every client file, email, and document must be protected with the same diligence as attorney-client privilege itself. Unencrypted laptops, poor access controls, or shared credentials can expose confidential matters and create professional liability.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Data Loss Prevention</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Lateral file sharing, personal email use, and USB drives all create data exfiltration risks. DLP policies need to be enforced at the endpoint level without making attorneys' daily workflows feel like an obstacle course.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Business Email Compromise</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Law firms are prime BEC targets. Attackers impersonate partners, clients, or title companies to intercept wire transfers and redirect closing funds. Email authentication and attorney training are the last line of defense.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Secure Remote Access</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Attorneys work from courthouses, client offices, and home — they need secure, reliable access to case files and communications from anywhere. VPN, MFA, and zero trust access must work seamlessly without becoming a productivity bottleneck.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Bar &amp; Ethics Obligations</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">State bar associations and the ABA require attorneys to take "reasonable" measures to protect client data. What constitutes "reasonable" is increasingly defined by industry security standards — the same standards your IT infrastructure must meet.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Practice Management Systems</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Clio, Smokeball, MyCase, and other practice management platforms must be properly integrated, backed up, and secured. Cloud-based or hybrid setups need audit logging, role-based access, and reliable failover — not just "it works most of the time."</p>
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
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Security that keeps up<br><span style="color:#D4A843;">with how attorneys work.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">The biggest mistake in law firm IT is building security that attorneys work around. Lawyers under deadline pressure will bypass any control that gets in the way of getting a filing out the door. We design security programs that are strong where it matters and invisible everywhere else.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">That means MFA that works on mobile. Encrypted storage that doesn't slow down document retrieval. Email security that catches impersonation attempts before they reach partners. And remote access that works from any device, any location, without a help desk ticket for every login.</p>
          <div class="mt-8 flex flex-col gap-3">
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Encrypted endpoint management for attorney workstations and laptops</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Data loss prevention (DLP) policies enforced at the endpoint and email layer</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Email security with SPF, DKIM, DMARC, and BEC detection</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Zero trust remote access with MFA for work-from-anywhere attorneys</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Practice management system integration, backup, and access control</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">ABA-aligned security assessments and documentation for cyber insurance</span>
            </div>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">25%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of law firms with 100+ attorneys experienced a data breach, per ABA Tech Report</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$50B</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">lost to business email compromise annually — law firms are a primary target</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">72hrs</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">average detection time for BEC — most wire fraud is irreversible after 24 hours</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">Rule 1.6</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">ABA Model Rule requiring attorneys to take reasonable steps to prevent unauthorized disclosure</div>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for legal environments.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/cybersecurity.php" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🔒</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">DLP, encrypted endpoints, email security, and BEC prevention to keep client data confidential and your firm off the front page.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/managed-it.php" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚙️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Managed IT</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Proactive monitoring and management for every device in your practice — workstations, laptops, servers — so attorneys can focus on clients, not IT problems.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/unified-communications.php" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">📞</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Unified Communications</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Cloud phone systems with call recording, voicemail-to-email, and mobile softphones so your team stays reachable from courthouse to home office.</p>
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
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Legal industry IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/post.php?slug=business-email-compromise-bec" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Business Email Compromise: The $50 Billion Scam Targeting Your Finance Team</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=zero-trust-security-smbs" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Zero Trust Security: A Practical Guide for Small Businesses</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=remote-work-security" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Remote Work Security: A Practical Guide for Distributed Teams</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=compliance-frameworks-nist-cis-cmmc" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Compliance Frameworks Explained: NIST, CIS, CMMC, and What They Mean for Your Business</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your clients trust you<br><span style="color:#D4A843;">with everything.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free law firm IT assessment identifies your data exposure, email security gaps, and remote access risks — before they become a client notification or a bar complaint. No commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact.php" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
