<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Ransomware Readiness Quiz — Is Your Business Protected? | Leonidas';
$page_description = 'Take our free 2-minute ransomware readiness quiz. See how your backup, access control, patching, and training stack up — and get a free action plan from Leonidas, serving the Florida Panhandle.';
$page_url         = SITE_URL . '/resources/ransomware-quiz';
$canonical_url    = $page_url;
$meta_description = $page_description;
$og_image         = SITE_URL . '/assets/og-cybersecurity.png';
$og_image_width   = 1200;
$og_image_height  = 630;

$faq_items = [
    ['q' => 'How does the Ransomware Readiness Quiz work?',
     'a' => 'Ten multiple-choice questions across four categories: backup strategy, access control, patching, and security training. Each answer is scored — your results and gap recommendations appear instantly with no signup required.'],
    ['q' => 'What score is considered safe?',
     'a' => '80 or above indicates strong controls. 60-79 means meaningful gaps exist. Below 60 is high risk — ransomware operators actively target businesses with these profiles.'],
    ['q' => "What if I don't know the answer to a question?",
     'a' => 'Pick the option that most honestly reflects your current state. Partial answers are counted — they reveal real gaps that attackers exploit.'],
    ['q' => 'How long does the quiz take?',
     'a' => 'About 2 minutes. Ten questions, three choices each, instant results.'],
    ['q' => 'What happens after I see my score?',
     'a' => "Review your category scores and specific gaps. Then book a free 30-minute assessment with Leonidas — we'll walk through your results and give you a prioritized action plan."],
];

$faq_schema = array_map(fn($f) => [
    '@type' => 'Question', 'name' => $f['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
], $faq_items);

$page_json_ld =
    '<script type="application/ld+json">' . json_encode([
        '@context' => 'https://schema.org', '@type' => 'WebApplication',
        'name' => 'Ransomware Readiness Quiz',
        'description' => 'Free ransomware readiness assessment — backup, access control, patching, and training.',
        'url' => $page_url, 'applicationCategory' => 'SecurityApplication', 'operatingSystem' => 'Any',
        'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
        'author' => ['@type' => 'Organization', 'name' => 'Leonidas', 'url' => SITE_URL],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' .
    '<script type="application/ld+json">' . json_encode([
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => $faq_schema,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' .
    '<script type="application/ld+json">' . json_encode([
        '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',       'item' => SITE_URL],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Resources',  'item' => SITE_URL . '/resources'],
            ['@type' => 'ListItem', 'position' => 3, 'name' => 'Ransomware Readiness Quiz', 'item' => $page_url],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';

$page_css = '
  .quiz-card { display:none; }
  .quiz-card.active { display:block; animation:qFadeIn 0.28s ease; }
  @keyframes qFadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }

  .q-category { font-size:0.68rem; font-weight:700; letter-spacing:0.18em; color:#D4A843; text-transform:uppercase; margin-bottom:1.25rem; }
  .q-text { font-size:clamp(1.1rem,2.5vw,1.45rem); font-weight:700; color:#FFFFFF; line-height:1.4; margin-bottom:2rem; }

  .q-answers { display:flex; flex-direction:column; gap:0.75rem; }
  .q-btn { display:flex; align-items:center; gap:1rem; width:100%; padding:1rem 1.25rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.09); border-radius:0.75rem; color:#D1D5DB; font-size:0.92rem; text-align:left; cursor:pointer; transition:background 0.15s, border-color 0.15s; }
  .q-btn:hover { background:rgba(212,168,67,0.08); border-color:rgba(212,168,67,0.3); color:#FFFFFF; }
  .q-btn:focus-visible { outline:2px solid #D4A843; outline-offset:2px; }
  .q-letter { flex-shrink:0; width:28px; height:28px; border-radius:50%; background:rgba(212,168,67,0.12); border:1px solid rgba(212,168,67,0.28); color:#D4A843; font-size:0.78rem; font-weight:700; display:flex; align-items:center; justify-content:center; }

  .q-progress-bar { height:3px; background:rgba(255,255,255,0.07); border-radius:2px; margin-bottom:0.6rem; }
  .q-progress-fill { height:100%; background:#D4A843; border-radius:2px; transition:width 0.4s ease; }

  .q-back { background:none; border:none; color:#4B5563; font-size:0.82rem; cursor:pointer; padding:0.25rem 0; display:block; }
  .q-back:hover:not(:disabled) { color:#9CA3AF; }
  .q-back:disabled { opacity:0.3; cursor:default; }

  #score-ring { transition:stroke-dasharray 1.2s cubic-bezier(0.16,1,0.3,1); }

  .cat-bar-row { margin-bottom:1.1rem; }
  .cat-bar-label { display:flex; justify-content:space-between; font-size:0.82rem; color:#9CA3AF; margin-bottom:0.4rem; }
  .cat-bar-track { height:8px; background:rgba(255,255,255,0.07); border-radius:4px; overflow:hidden; }
  .cat-bar-fill { height:100%; border-radius:4px; width:0%; transition:width 0.9s cubic-bezier(0.16,1,0.3,1); }

  .breakdown-row { display:flex; gap:0.875rem; padding:0.875rem 0; border-bottom:1px solid rgba(255,255,255,0.05); }
  .breakdown-row:last-child { border-bottom:none; }
  .breakdown-icon { flex-shrink:0; width:20px; font-size:0.95rem; padding-top:0.1rem; }
  .breakdown-content { flex:1; min-width:0; }
  .breakdown-q { font-size:0.85rem; font-weight:600; color:#E5E7EB; margin-bottom:0.2rem; }
  .breakdown-answer { font-size:0.78rem; color:#6B7280; }
  .breakdown-gap { font-size:0.78rem; color:#9CA3AF; margin-top:0.35rem; padding:0.4rem 0.65rem; background:rgba(239,68,68,0.06); border-left:2px solid rgba(239,68,68,0.28); border-radius:0 0.25rem 0.25rem 0; }

  @media (max-width:640px) {
    .q-btn { padding:0.875rem 1rem; font-size:0.88rem; min-height:48px; }
    .q-text { font-size:1.05rem; margin-bottom:1.5rem; }
    #results-ring-wrap svg { width:170px; height:170px; }
  }
';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- HERO -->
<section id="quiz-hero" style="padding-top:8rem;padding-bottom:5rem;position:relative;overflow:hidden;">
  <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle,rgba(212,168,67,0.05) 0%,transparent 70%);top:-200px;right:-200px;"></div>
  <div class="orb" style="width:400px;height:400px;background:radial-gradient(circle,rgba(239,68,68,0.03) 0%,transparent 70%);bottom:-100px;left:-100px;animation-delay:2s;"></div>
  <div class="max-w-2xl mx-auto px-6 text-center">
    <div class="section-label fade-in" style="display:inline-flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;">
      <span style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;">Free Risk Assessment</span>
    </div>
    <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.2rem,5vw,3.8rem);font-weight:900;letter-spacing:-0.03em;line-height:1.08;color:#FFFFFF;margin-bottom:1.25rem;">
      How Ready Is Your Business<br><span style="color:#D4A843;">for a Ransomware Attack?</span>
    </h1>
    <p class="fade-in fade-in-delay-2" style="font-size:1.05rem;color:#9CA3AF;max-width:500px;margin:0 auto 2.5rem;line-height:1.7;">
      10 questions. 2 minutes. <strong style="color:#D4A843;font-weight:600;">Instant score</strong> across backup, access control, patching, and training — with a clear gap report.
    </p>
    <button type="button" onclick="startQuiz()" class="fade-in fade-in-delay-2" style="display:inline-flex;align-items:center;gap:0.6rem;background:#D4A843;color:#0A0A1A;font-weight:700;font-size:1rem;padding:0.9rem 2rem;border-radius:0.6rem;border:none;cursor:pointer;transition:opacity 0.2s;" onmouseover="this.style.opacity='0.88'" onmouseout="this.style.opacity='1'">
      Start the Quiz &#x2192;
    </button>
    <p class="fade-in fade-in-delay-2" style="font-size:0.78rem;color:#374151;margin-top:1rem;">No signup &middot; Results in under 2 minutes &middot; Free</p>
  </div>
</section>

<!-- QUIZ SECTION -->
<section id="quiz-section" style="display:none;padding-top:5rem;padding-bottom:5rem;">
  <div class="max-w-2xl mx-auto px-6">
    <div style="margin-bottom:2rem;">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.6rem;">
        <span id="q-count-label" style="font-size:0.75rem;color:#6B7280;">Question 1 of 10</span>
        <button type="button" id="back-btn" class="q-back" style="margin-top:0;" disabled>&#x2190; Back</button>
      </div>
      <div class="q-progress-bar"><div id="progress-fill" class="q-progress-fill" style="width:0%;"></div></div>
    </div>
    <!-- Q1 -->
    <div id="q1" class="quiz-card">
      <div class="q-category">Backup &amp; Recovery</div>
      <div class="q-text">How often are backups tested?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="0" data-val="10" data-text="We test restores at least quarterly"><span class="q-letter">A</span><span>We test restores at least quarterly</span></button>
        <button type="button" class="q-btn" data-q="0" data-val="5"  data-text="We have backups but rarely test restores"><span class="q-letter">B</span><span>We have backups but rarely test restores</span></button>
        <button type="button" class="q-btn" data-q="0" data-val="0"  data-text="No regular backup or test process"><span class="q-letter">C</span><span>No regular backup or test process</span></button>
      </div>
    </div>

    <!-- Q2 -->
    <div id="q2" class="quiz-card">
      <div class="q-category">Backup &amp; Recovery</div>
      <div class="q-text">Where are backups stored?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="1" data-val="10" data-text="Offsite or cloud, isolated from the main network"><span class="q-letter">A</span><span>Offsite or cloud, isolated from the main network</span></button>
        <button type="button" class="q-btn" data-q="1" data-val="5"  data-text="On a local server or NAS on the same network"><span class="q-letter">B</span><span>On a local server or NAS on the same network</span></button>
        <button type="button" class="q-btn" data-q="1" data-val="0"  data-text="Device-level backups only"><span class="q-letter">C</span><span>Device-level backups only</span></button>
      </div>
    </div>

    <!-- Q3 -->
    <div id="q3" class="quiz-card">
      <div class="q-category">Backup &amp; Recovery</div>
      <div class="q-text">How long would it take to recover from a full ransomware infection?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="2" data-val="10" data-text="Under 4 hours — we have a tested recovery plan"><span class="q-letter">A</span><span>Under 4 hours — we have a tested recovery plan</span></button>
        <button type="button" class="q-btn" data-q="2" data-val="5"  data-text="1-3 days — we would figure it out"><span class="q-letter">B</span><span>1–3 days — we'd figure it out</span></button>
        <button type="button" class="q-btn" data-q="2" data-val="0"  data-text="Honestly not sure"><span class="q-letter">C</span><span>We're honestly not sure</span></button>
      </div>
    </div>

    <!-- Q4 -->
    <div id="q4" class="quiz-card">
      <div class="q-category">Access Control</div>
      <div class="q-text">Is multi-factor authentication (MFA) enabled for email and remote access?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="3" data-val="10" data-text="Yes, required for all users"><span class="q-letter">A</span><span>Yes, required for all users</span></button>
        <button type="button" class="q-btn" data-q="3" data-val="5"  data-text="Enabled for some accounts but not enforced"><span class="q-letter">B</span><span>Enabled for some accounts but not enforced</span></button>
        <button type="button" class="q-btn" data-q="3" data-val="0"  data-text="Not in place"><span class="q-letter">C</span><span>Not in place</span></button>
      </div>
    </div>

    <!-- Q5 -->
    <div id="q5" class="quiz-card">
      <div class="q-category">Access Control</div>
      <div class="q-text">How are admin and privileged accounts managed?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="4" data-val="10" data-text="Separate admin accounts, least-privilege enforced"><span class="q-letter">A</span><span>Separate admin accounts, least-privilege enforced</span></button>
        <button type="button" class="q-btn" data-q="4" data-val="5"  data-text="IT staff use admin rights for day-to-day work"><span class="q-letter">B</span><span>IT staff use admin rights for day-to-day work</span></button>
        <button type="button" class="q-btn" data-q="4" data-val="0"  data-text="Most users have local admin on their machines"><span class="q-letter">C</span><span>Most users have local admin on their machines</span></button>
      </div>
    </div>

    <!-- Q6 -->
    <div id="q6" class="quiz-card">
      <div class="q-category">Access Control</div>
      <div class="q-text">What happens when an employee leaves?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="5" data-val="10" data-text="Accounts disabled same day, access audited"><span class="q-letter">A</span><span>Accounts disabled same day, access audited</span></button>
        <button type="button" class="q-btn" data-q="5" data-val="5"  data-text="Usually within a few days"><span class="q-letter">B</span><span>Usually within a few days</span></button>
        <button type="button" class="q-btn" data-q="5" data-val="0"  data-text="No formal offboarding process"><span class="q-letter">C</span><span>No formal offboarding process</span></button>
      </div>
    </div>

    <!-- Q7 -->
    <div id="q7" class="quiz-card">
      <div class="q-category">Patching &amp; Endpoint Protection</div>
      <div class="q-text">How quickly are critical security patches applied?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="6" data-val="10" data-text="Within 72 hours across all devices"><span class="q-letter">A</span><span>Within 72 hours across all devices</span></button>
        <button type="button" class="q-btn" data-q="6" data-val="5"  data-text="Within a few weeks, when we get around to it"><span class="q-letter">B</span><span>Within a few weeks, when we get around to it</span></button>
        <button type="button" class="q-btn" data-q="6" data-val="0"  data-text="No regular patching process"><span class="q-letter">C</span><span>No regular patching process</span></button>
      </div>
    </div>

    <!-- Q8 -->
    <div id="q8" class="quiz-card">
      <div class="q-category">Patching &amp; Endpoint Protection</div>
      <div class="q-text">What endpoint protection is in place?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="7" data-val="10" data-text="EDR/XDR (CrowdStrike, SentinelOne, Defender for Business, etc.)"><span class="q-letter">A</span><span>EDR/XDR (CrowdStrike, SentinelOne, Defender for Business, etc.)</span></button>
        <button type="button" class="q-btn" data-q="7" data-val="5"  data-text="Standard antivirus only"><span class="q-letter">B</span><span>Standard antivirus only</span></button>
        <button type="button" class="q-btn" data-q="7" data-val="0"  data-text="No dedicated endpoint protection"><span class="q-letter">C</span><span>No dedicated endpoint protection</span></button>
      </div>
    </div>

    <!-- Q9 -->
    <div id="q9" class="quiz-card">
      <div class="q-category">Training &amp; Response</div>
      <div class="q-text">How often do employees receive security awareness training?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="8" data-val="10" data-text="Formal training at least annually plus phishing simulations"><span class="q-letter">A</span><span>Formal training at least annually + phishing simulations</span></button>
        <button type="button" class="q-btn" data-q="8" data-val="5"  data-text="Occasional reminders or one-time onboarding training"><span class="q-letter">B</span><span>Occasional reminders or one-time onboarding training</span></button>
        <button type="button" class="q-btn" data-q="8" data-val="0"  data-text="No formal security training"><span class="q-letter">C</span><span>No formal security training</span></button>
      </div>
    </div>

    <!-- Q10 -->
    <div id="q10" class="quiz-card">
      <div class="q-category">Training &amp; Response</div>
      <div class="q-text">Do you have a written incident response plan?</div>
      <div class="q-answers">
        <button type="button" class="q-btn" data-q="9" data-val="10" data-text="Documented, tested, and staff know their roles"><span class="q-letter">A</span><span>Documented, tested, and staff know their roles</span></button>
        <button type="button" class="q-btn" data-q="9" data-val="5"  data-text="Informal plan — people know roughly what to do"><span class="q-letter">B</span><span>Informal plan — people know roughly what to do</span></button>
        <button type="button" class="q-btn" data-q="9" data-val="0"  data-text="No plan in place"><span class="q-letter">C</span><span>No plan in place</span></button>
      </div>
    </div>
  </div>
</section>

<!-- RESULTS SECTION -->
<section id="results-section" style="display:none;padding-top:6rem;padding-bottom:5rem;">
  <!-- RESULTS CONTENT — added in Task 4 -->
</section>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
