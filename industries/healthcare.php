<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Healthcare IT | HIPAA-Compliant MSP | Florida Panhandle';
$meta_description = 'HIPAA-aligned IT and cybersecurity for healthcare organizations in the Florida Panhandle. Protect patient data and keep clinical operations running.';
$canonical_url    = 'https://leonidastek.com/industries/healthcare';

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
        <span>/</span><span style="color:#D4A843;">Healthcare</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Healthcare IT</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">Patient data is sacred.<br><span style="color:#D4A843;">Protect it like it is.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">Healthcare organizations face a unique intersection of regulatory pressure, legacy systems, and aggressive threat actors. HIPAA violations, ransomware on clinical networks, and downtime during patient care — the stakes are higher here than in any other industry. Leonidas builds IT programs that match those stakes.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact" class="btn-primary">Get a Free Healthcare IT Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Healthcare IT is different.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">HIPAA Compliance</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Every device that touches protected health information (PHI) must be secured, audited, and documented. A single misconfigured workstation or unencrypted email can trigger an HHS investigation and six-figure penalties.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">EHR Network Performance</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Electronic health record systems are bandwidth-intensive and latency-sensitive. A sluggish network doesn't just slow down billing — it interrupts patient care, delays prescriptions, and frustrates clinical staff.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Ransomware Targeting</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Healthcare is the most targeted sector for ransomware attacks. Threat actors know that patient safety pressure forces organizations to pay. A mature endpoint and backup strategy is not optional — it is the difference between closure and continuity.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Medical Device Security</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Connected medical devices — infusion pumps, imaging equipment, patient monitors — run legacy firmware and rarely receive security patches. They need to be isolated, monitored, and managed without disrupting clinical workflows.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Secure Communications</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Clinical staff need to communicate quickly. But texting patient information over personal devices violates HIPAA. Secure messaging, HIPAA-compliant VoIP, and encrypted file sharing must be built into daily workflow — not bolted on.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Vendor &amp; BAA Management</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Every vendor that accesses PHI must sign a Business Associate Agreement. Managing BAAs, auditing vendor access, and ensuring third-party software meets HIPAA standards is an ongoing operational burden most practices can't track alone.</p>
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
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">HIPAA is a floor,<br><span style="color:#D4A843;">not a ceiling.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">We build healthcare IT programs that meet HIPAA's Security Rule requirements as a baseline — then go further. Proper network segmentation isolates clinical systems from administrative traffic. Encrypted endpoints ensure that a stolen laptop doesn't become a breach notification. Audit logging gives you the documentation HHS demands if they ever come knocking.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">We work with your EHR vendor, your billing platform, and your clinical software — not against them. Our job is to make sure your network is fast enough for clinical operations, secure enough for regulators, and reliable enough that downtime never becomes a patient safety event.</p>
          <div class="mt-8 flex flex-col gap-3">
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">HIPAA Security Rule gap assessments and remediation</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Medical device network isolation and IoT security</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">EHR-optimized network design and QoS configuration</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Encrypted backup and ransomware-resilient recovery</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">HIPAA-compliant VoIP and secure clinical communications</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">BAA management and vendor security reviews</span>
            </div>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">75%</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">of healthcare data breaches involve hacking or IT incidents, per HHS OCR</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$10.9M</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">average cost of a healthcare data breach — the highest of any industry</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">#1</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">most targeted sector for ransomware attacks for five consecutive years</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$1.9M</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">maximum HIPAA fine per violation category per calendar year</div>
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
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for healthcare environments.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/cybersecurity" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🔒</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">EDR, dark web monitoring, email security, and HIPAA-aligned compliance frameworks to protect patient data across every attack surface.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/network-engineering" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🌐</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Network Engineering</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">EHR-optimized network design, medical device VLANs, and clinical-grade wireless deployments that keep operations fast and compliant.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/unified-communications" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">📞</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Unified Communications</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">HIPAA-compliant VoIP, secure messaging, and cloud phone systems that keep clinical teams connected without creating PHI exposure.</p>
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
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Healthcare IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/hipaa-compliance-it-guide" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">INDUSTRY TRENDS</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">HIPAA Compliance for IT: What Healthcare Businesses Need to Know</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/ransomware-recovery-guide" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Ransomware Recovery: What to Do When Your Business Gets Hit</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/network-segmentation" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">NETWORKING</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">What Is Network Segmentation and Why Does Every Business Need It?</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/dark-web-monitoring" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Dark Web Monitoring: Why Your Business Can't Afford to Ignore It</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-24 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Your patients trust you.<br><span style="color:#D4A843;">Trust your IT.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free healthcare IT assessment identifies your HIPAA exposure, network vulnerabilities, and backup gaps — before regulators or attackers do. No commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
