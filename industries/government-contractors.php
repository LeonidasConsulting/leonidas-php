<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Government Contractor IT | CMMC & CUI Compliance | Leonidas';
$meta_description = 'CMMC compliance, NIST alignment, and CUI handling for defense contractors in the Florida Panhandle. IT built to meet federal cybersecurity requirements.';
$canonical_url    = 'https://leonidastek.com/industries/government-contractors';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<main style="position:relative; z-index:1;">

  <section style="padding-top:8rem; padding-bottom:6rem; position:relative; overflow:hidden;">
    <div class="orb" style="width:600px; height:600px; background:radial-gradient(circle, rgba(212,168,67,0.07) 0%, transparent 70%); top:-150px; right:-100px;"></div>
    <div class="max-w-7xl mx-auto px-6">
      <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
        <a href="<?= $b ?>/" style="color:#6B7280; text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
        <span>/</span><span style="color:#6B7280;">Industries</span>
        <span>/</span><span style="color:#D4A843;">Government Contractors</span>
      </nav>
      <div class="max-w-3xl">
        <div class="section-label fade-in">Government Contractors</div>
        <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.8rem,6vw,5rem); font-weight:900; letter-spacing:-0.03em; line-height:1.05; color:#FFFFFF;">CMMC isn't optional.<br><span style="color:#D4A843;">Neither is your contract.</span></h1>
        <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">Defense contractors and federal subcontractors face cybersecurity requirements unlike any other industry. CMMC 2.0, NIST SP 800-171, and CUI handling obligations are contractual — failure to comply doesn't just create legal risk, it costs you the contract. The Florida Panhandle's defense corridor demands IT infrastructure built to federal standards.</p>
        <div class="flex flex-wrap gap-4 mt-10 fade-in fade-in-delay-3">
          <a href="<?= $b ?>/contact.php" class="btn-primary">Get a Free CMMC Readiness Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.8);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">The Challenges</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Federal requirements are getting stricter.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">CMMC 2.0 Compliance</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Cybersecurity Maturity Model Certification 2.0 is now required for DoD prime contractors and subcontractors. CMMC Level 2 requires compliance with all 110 practices of NIST SP 800-171 — and third-party assessment for many contracts. Non-compliant contractors cannot bid on covered acquisitions.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">CUI Handling</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Controlled Unclassified Information must be stored, processed, and transmitted in environments that meet specific security controls. CUI cannot live on personal devices, unsecured cloud drives, or systems that lack proper access logging and encryption — requirements that most SMB IT environments don't meet by default.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">NIST SP 800-171</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">The 110 security requirements across 14 control families — access control, audit and accountability, incident response, media protection, risk assessment, and more — require systematic implementation and documentation. Gap assessments, system security plans (SSPs), and plans of action and milestones (POA&Ms) are mandatory artifacts.</p>
        </div>
        <div class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Supply Chain Risk</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Your cybersecurity obligations don't end at your organization. Subcontractors who receive CUI must also meet CMMC requirements. Managing your supply chain's compliance posture — and ensuring your vendors don't become your weakest link — is now a contractual obligation.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Nation-State Threat Actors</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Defense contractors are priority targets for advanced persistent threat (APT) groups sponsored by China, Russia, Iran, and North Korea. These actors perform long-term infiltration campaigns designed to steal technical data — and they specifically target small and mid-size contractors with weaker defenses than the primes.</p>
        </div>
        <div class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
          <h3 style="font-weight:700; color:#D4A843; margin-bottom:1rem; font-size:0.9rem; letter-spacing:0.05em; text-transform:uppercase;">Audit Readiness</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">CMMC Level 2 and Level 3 assessments are conducted by certified third-party assessment organizations (C3PAOs). Being audit-ready requires not just implementing controls, but documenting them consistently, maintaining evidence of continuous monitoring, and being able to demonstrate compliance on demand.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="fade-in">
          <div class="section-label">Our Approach</div>
          <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB; line-height:1.1;">Compliance is a program,<br><span style="color:#D4A843;">not a checkbox.</span></h2>
          <p class="mt-6 text-base leading-relaxed" style="color:#9CA3AF;">We've helped Florida Panhandle defense contractors build IT programs that satisfy federal auditors and protect the sensitive data they're trusted with. The starting point is always a gap assessment — mapping your current controls against NIST SP 800-171 to identify exactly where you stand and what needs to change.</p>
          <p class="mt-4 text-base leading-relaxed" style="color:#9CA3AF;">From there, we build the technical controls: encrypted endpoints, MFA on all CUI-accessible systems, access logging, network segmentation, secure backup, and incident response procedures. We also produce the documentation artifacts — SSPs, POA&Ms, and policies — that assessors require. The goal is not just to pass an assessment, but to build a program that keeps you compliant between assessments.</p>
          <div class="mt-8 flex flex-col gap-3">
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">NIST SP 800-171 gap assessments and remediation roadmaps</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">CUI-compliant enclave design and access control implementation</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">System Security Plan (SSP) and POA&M documentation support</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">MFA enforcement, encrypted endpoints, and audit logging</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Incident response planning and tabletop exercises</span>
            </div>
            <div class="flex items-start gap-3">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M3 9l4 4 8-8" stroke="#D4A843" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="text-sm" style="color:#9CA3AF;">Continuous monitoring and CMMC assessment preparation</span>
            </div>
          </div>
        </div>
        <div class="fade-in fade-in-delay-1 grid grid-cols-2 gap-4">
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">300K+</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">defense contractors in the DIB must achieve CMMC certification to continue bidding</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">110</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">security requirements across 14 control families in NIST SP 800-171 for CMMC Level 2</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">$1.3B+</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">in DoD contracts lost by companies found non-compliant with cybersecurity clauses</div>
          </div>
          <div class="p-5 rounded-xl text-center" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1);">
            <div style="font-size:2.5rem; font-weight:900; color:#D4A843; letter-spacing:-0.04em;">FCA</div>
            <div style="color:#9CA3AF; font-size:0.8rem; margin-top:0.3rem;">False Claims Act liability for contractors who knowingly misrepresent their compliance posture</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-7xl mx-auto">
      <div class="mb-12 fade-in">
        <div class="section-label">Relevant Services</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Built for federal compliance requirements.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="<?= $b ?>/services/cybersecurity.php" class="p-6 rounded-xl fade-in" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🔒</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Cybersecurity</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">NIST-aligned security controls, EDR, MFA, access logging, and vCISO-level guidance to satisfy CMMC requirements and protect CUI.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/managed-it.php" class="p-6 rounded-xl fade-in fade-in-delay-1" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">⚙️</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Managed IT</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">Continuous monitoring, patch management, and endpoint management to maintain the compliance posture required between CMMC assessments.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
        <a href="<?= $b ?>/services/network-engineering.php" class="p-6 rounded-xl fade-in fade-in-delay-2" style="background:rgba(255,255,255,0.02); border:1px solid rgba(212,168,67,0.1); text-decoration:none; transition:all 0.3s;" onmouseover="this.style.borderColor='rgba(212,168,67,0.3)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='rgba(212,168,67,0.1)';this.style.transform='translateY(0)'">
          <div style="font-size:1.5rem; margin-bottom:1rem;">🌐</div>
          <h3 style="font-weight:700; color:#FFFFFF; margin-bottom:0.5rem;">Network Engineering</h3>
          <p class="text-sm leading-relaxed" style="color:#9CA3AF;">CUI enclave design, network segmentation, zero trust architecture, and secure remote access for geographically distributed contractor teams.</p>
          <div class="mt-4 text-sm font-semibold" style="color:#D4A843;">Learn more →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-20 px-6">
    <div class="max-w-7xl mx-auto">
      <div class="mb-10 fade-in">
        <div class="section-label">From the Blog</div>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem); font-weight:900; letter-spacing:-0.02em; color:#F9FAFB;">Government contractor IT insights.</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="<?= $b ?>/blog/post.php?slug=compliance-frameworks-nist-cis-cmmc" class="blog-card fade-in">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Compliance Frameworks Explained: NIST, CIS, CMMC, and What They Mean for Your Business</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=2026-compliance-landscape" class="blog-card fade-in fade-in-delay-1">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">INDUSTRY TRENDS</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">2026 Compliance Landscape: What's Changed and What You Need to Know</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=supply-chain-cyberattacks" class="blog-card fade-in fade-in-delay-2">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Supply Chain Cyberattacks: How Hackers Use Your Vendors to Get to You</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
        <a href="<?= $b ?>/blog/post.php?slug=privileged-access-management" class="blog-card fade-in fade-in-delay-3">
          <div class="text-xs font-bold tracking-wider mb-3" style="color:#D4A843;">CYBERSECURITY</div>
          <h3 style="font-weight:700; color:#FFFFFF; font-size:0.95rem; line-height:1.4; margin-bottom:0.75rem;">Privileged Access Management: Why Admin Credentials Are Your Biggest Risk</h3>
          <div class="text-sm font-semibold" style="color:#D4A843;">Read article →</div>
        </a>
      </div>
    </div>
  </section>

  <section class="py-24 px-6" style="background:rgba(5,5,16,0.6);">
    <div class="max-w-3xl mx-auto text-center fade-in">
      <div class="section-label justify-center">Get Started</div>
      <h2 style="font-size:clamp(2rem,4vw,3.2rem); font-weight:900; letter-spacing:-0.03em; color:#F9FAFB;">Know where you stand<br><span style="color:#D4A843;">before the assessor does.</span></h2>
      <p class="mt-6 text-lg leading-relaxed" style="color:#9CA3AF;">A free CMMC readiness assessment maps your current controls against NIST SP 800-171, identifies gaps, and gives you a clear path to compliance — before your next contract opportunity requires it. No commitment required.</p>
      <div class="flex flex-wrap gap-4 justify-center mt-10">
        <a href="<?= $b ?>/contact.php" class="btn-primary">Get Your Free Assessment <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <a href="tel:8506149343" class="btn-ghost">850-614-9343</a>
      </div>
    </div>
  </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
