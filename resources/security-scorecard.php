<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'Free Business Security Scorecard — Scan Your Domain | Leonidas';
$page_description = 'Free domain security scan in 15 seconds. Check SPF, DMARC, DKIM, SSL, HTTPS redirect, and security headers. See your score and exactly what to fix.';
$page_url         = SITE_URL . '/resources/security-scorecard';
$canonical_url    = $page_url;
$meta_description = $page_description;
$og_image         = SITE_URL . '/assets/og-managed-it.png';
$og_image_width   = 1200;
$og_image_height  = 630;

$faq_items = [
    ['q'=>'What does the Business Security Scorecard check?',
     'a'=>'Seven areas: MX email records, SPF anti-spoofing policy, DMARC enforcement, DKIM email signing, SSL certificate validity, HTTPS redirect enforcement, and security response headers (HSTS, X-Frame-Options, X-Content-Type-Options). All checks use real DNS lookups and live HTTP requests against your domain — nothing simulated.'],
    ['q'=>'Is the domain security scan really free?',
     'a'=>'Yes, completely free with no signup required. Enter your domain and get results in about 15 seconds. The scan is rate-limited to 5 scans per hour per IP to prevent abuse.'],
    ['q'=>'What does it mean if my SPF or DMARC is missing?',
     'a'=>'Without SPF and DMARC, anyone can send email that appears to come from your domain — a technique called email spoofing. It is used in business email compromise (BEC) attacks, the number one cybercrime by dollar loss per the FBI IC3. It also degrades your email deliverability over time.'],
    ['q'=>'My score is low — what should I fix first?',
     'a'=>'Fix email security first: SPF, DMARC, and DKIM together prevent spoofing and improve deliverability. SSL and HTTPS redirect come next since they affect every site visitor. Security headers round out the hardening. Leonidas configures all of these as part of every managed IT and cybersecurity engagement.'],
    ['q'=>'Why does my domain security score matter for my business?',
     'a'=>'Each failed check is a real attack surface that adversaries actively exploit against small businesses. Missing DMARC means spoofed emails reach your employees. An expiring SSL cert locks visitors out of your site. Missing HSTS exposes sessions to downgrade attacks. These are the actual entry points used in real SMB compromises.'],
];

$faq_schema = array_map(fn($f) => [
    '@type'=>'Question','name'=>$f['q'],
    'acceptedAnswer'=>['@type'=>'Answer','text'=>$f['a']],
], $faq_items);

$page_json_ld =
    '<script type="application/ld+json">'.json_encode([
        '@context'=>'https://schema.org','@type'=>'WebApplication',
        'name'=>'Business Security Scorecard',
        'description'=>'Free domain security scanner — SPF, DMARC, DKIM, SSL, HTTPS, and security headers.',
        'url'=>$page_url,'applicationCategory'=>'SecurityApplication','operatingSystem'=>'Any',
        'offers'=>['@type'=>'Offer','price'=>'0','priceCurrency'=>'USD'],
        'author'=>['@type'=>'Organization','name'=>'Leonidas','url'=>SITE_URL],
    ],JSON_UNESCAPED_SLASHES).'</script>'.
    '<script type="application/ld+json">'.json_encode([
        '@context'=>'https://schema.org','@type'=>'FAQPage',
        'mainEntity'=>$faq_schema,
    ],JSON_UNESCAPED_SLASHES).'</script>'.
    '<script type="application/ld+json">'.json_encode([
        '@context'=>'https://schema.org','@type'=>'BreadcrumbList',
        'itemListElement'=>[
            ['@type'=>'ListItem','position'=>1,'name'=>'Home','item'=>SITE_URL],
            ['@type'=>'ListItem','position'=>2,'name'=>'Resources','item'=>SITE_URL.'/resources'],
            ['@type'=>'ListItem','position'=>3,'name'=>'Business Security Scorecard','item'=>$page_url],
        ],
    ],JSON_UNESCAPED_SLASHES).'</script>';

$page_css = '
  .scan-input-wrap {
    display:flex; max-width:580px; margin:0 auto;
    background:rgba(255,255,255,0.04); border:1px solid rgba(212,168,67,0.3);
    border-radius:0.75rem; overflow:hidden; transition:border-color 0.2s,box-shadow 0.2s;
  }
  .scan-input-wrap:focus-within { border-color:rgba(212,168,67,0.7); box-shadow:0 0 0 3px rgba(212,168,67,0.1); }
  .scan-input {
    flex:1; background:none; border:none; outline:none; padding:1rem 1.25rem;
    font-size:1rem; color:#FFFFFF; font-family:"Courier New",monospace; letter-spacing:0.02em;
  }
  .scan-input::placeholder { color:#4B5563; }
  .scan-btn {
    background:#D4A843; color:#000; border:none; padding:0 1.75rem;
    font-size:0.88rem; font-weight:700; letter-spacing:0.08em; text-transform:uppercase;
    cursor:pointer; transition:background 0.2s; white-space:nowrap; flex-shrink:0;
  }
  .scan-btn:hover { background:#E8BC55; }
  .scan-btn:disabled { background:#4B5563; cursor:not-allowed; }
  #score-ring { transition:stroke-dasharray 1.2s cubic-bezier(0.16,1,0.3,1); }
  .status-pass { color:#4ADE80; } .status-warn { color:#FBBF24; } .status-fail { color:#EF4444; }
  .border-pass { border-left-color:#4ADE80 !important; }
  .border-warn { border-left-color:#FBBF24 !important; }
  .border-fail { border-left-color:#EF4444 !important; }
  .check-card {
    background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06);
    border-left:3px solid rgba(255,255,255,0.1); border-radius:0.75rem;
    padding:1rem 1.25rem; display:flex; gap:0.875rem; align-items:flex-start;
  }
  .check-icon { font-size:1.1rem; flex-shrink:0; margin-top:0.05rem; line-height:1; }
  .check-label { font-size:0.88rem; font-weight:600; color:#F9FAFB; margin-bottom:0.25rem; }
  .check-detail { font-size:0.78rem; color:#6B7280; line-height:1.55; }
  .check-pts { font-size:0.72rem; margin-top:0.35rem; color:#4B5563; }
  .scan-step { display:flex; align-items:center; gap:0.75rem; padding:0.5rem 0; color:#6B7280; font-size:0.85rem; opacity:0; transition:opacity 0.3s; }
  .scan-step.visible { opacity:1; }
  .spinner { width:14px; height:14px; border:2px solid rgba(212,168,67,0.2); border-top-color:#D4A843; border-radius:50%; animation:spin 0.7s linear infinite; flex-shrink:0; }
  @keyframes spin { to { transform:rotate(360deg); } }
  .faq-trigger[aria-expanded="true"] .faq-icon { transform:rotate(45deg); }
  @media (max-width:640px) {
    .scan-input-wrap { flex-direction:column; }
    .scan-btn { padding:0.875rem; border-radius:0; }
    .checks-grid { grid-template-columns:1fr !important; }
  }
';
require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- HERO -->
<section style="padding-top:8rem;padding-bottom:5rem;position:relative;overflow:hidden;">
  <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle,rgba(212,168,67,0.05) 0%,transparent 70%);top:-200px;right:-150px;"></div>
  <div class="orb" style="width:400px;height:400px;background:radial-gradient(circle,rgba(239,68,68,0.03) 0%,transparent 70%);bottom:-100px;left:-100px;animation-delay:2s;"></div>
  <div class="max-w-3xl mx-auto px-6 text-center">
    <div class="section-label fade-in" style="display:inline-flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;">
      <span style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;">Free Security Tool</span>
    </div>
    <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.2rem,5vw,3.8rem);font-weight:900;letter-spacing:-0.03em;line-height:1.08;color:#FFFFFF;margin-bottom:1.25rem;">
      How Secure Is Your<br><span style="color:#D4A843;">Business Domain?</span>
    </h1>
    <p class="fade-in fade-in-delay-2" style="font-size:1.05rem;color:#9CA3AF;max-width:520px;margin:0 auto 2.5rem;line-height:1.7;">
      Enter your domain. We run a <strong style="color:#D4A843;font-weight:600;">free security scan</strong> — checking email authentication, SSL certificate, HTTPS enforcement, and security headers in about 15 seconds.
    </p>
    <form id="scan-form" class="fade-in fade-in-delay-2" onsubmit="return false;">
      <div class="scan-input-wrap">
        <input type="text" id="domain-input" class="scan-input"
               placeholder="yourbusiness.com" autocomplete="off" spellcheck="false"
               aria-label="Your business domain">
        <button type="submit" class="scan-btn" id="scan-btn">Scan Now →</button>
      </div>
      <p id="scan-error" style="color:#EF4444;font-size:0.82rem;margin-top:0.75rem;min-height:1.2em;"></p>
    </form>
    <p class="fade-in fade-in-delay-2" style="font-size:0.78rem;color:#374151;margin-top:0.5rem;">
      No signup · Results in ~15 seconds · 5 free scans per hour
    </p>
  </div>
</section>

<!-- LOADING STATE -->
<section id="loading-state" style="display:none;padding-bottom:4rem;">
  <div class="max-w-sm mx-auto px-6 text-center">
    <div style="font-size:0.75rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;margin-bottom:1.75rem;">
      Scanning <span id="scanning-domain" style="color:#FFFFFF;"></span>
    </div>
    <div id="scan-steps" style="text-align:left;display:inline-block;">
      <div class="scan-step" id="step-dns"><div class="spinner"></div>Checking DNS records…</div>
      <div class="scan-step" id="step-email"><div class="spinner"></div>Analyzing email security — SPF / DMARC / DKIM…</div>
      <div class="scan-step" id="step-ssl"><div class="spinner"></div>Inspecting SSL certificate…</div>
      <div class="scan-step" id="step-https"><div class="spinner"></div>Testing HTTPS enforcement…</div>
      <div class="scan-step" id="step-headers"><div class="spinner"></div>Checking security headers…</div>
    </div>
  </div>
</section>

<!-- RESULTS STATE -->
<section id="results-state" style="display:none;padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-4xl mx-auto px-6">
    <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:3rem;">
      <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#6B7280;text-transform:uppercase;margin-bottom:1.5rem;">
        Security Report for <span id="result-domain" style="color:#D4A843;"></span>
      </div>
      <div style="margin-bottom:1.25rem;">
        <svg viewBox="0 0 200 200" style="width:190px;height:190px;" aria-label="Security score gauge">
          <circle cx="100" cy="100" r="80" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="14"/>
          <circle id="score-ring" cx="100" cy="100" r="80" fill="none" stroke="#4ADE80"
                  stroke-width="14" stroke-linecap="round"
                  stroke-dasharray="0 503" transform="rotate(-90 100 100)"/>
          <text id="score-number" x="100" y="93" text-anchor="middle"
                font-size="44" font-weight="900" fill="#FFFFFF" font-family="Inter,sans-serif">0</text>
          <text x="100" y="116" text-anchor="middle" font-size="13" fill="#6B7280" font-family="Inter,sans-serif">out of 100</text>
        </svg>
      </div>
      <div id="score-label" style="font-size:1.1rem;font-weight:700;margin-bottom:0.5rem;"></div>
      <div id="score-summary" style="font-size:0.88rem;color:#6B7280;max-width:420px;text-align:center;line-height:1.6;"></div>
    </div>
    <div id="checks-grid" class="checks-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:0.875rem;margin-bottom:2.5rem;"></div>
    <div style="text-align:center;margin-bottom:3rem;">
      <button onclick="resetScanner()" style="background:none;border:1px solid rgba(212,168,67,0.3);color:#D4A843;padding:0.625rem 1.5rem;border-radius:0.5rem;cursor:pointer;font-size:0.85rem;font-weight:600;">← Scan Another Domain</button>
    </div>
    <div style="background:linear-gradient(135deg,rgba(212,168,67,0.08),rgba(212,168,67,0.03));border:1px solid rgba(212,168,67,0.2);border-radius:1.25rem;padding:2.5rem;text-align:center;position:relative;overflow:hidden;">
      <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center top,rgba(212,168,67,0.06) 0%,transparent 60%);pointer-events:none;"></div>
      <div style="position:relative;">
        <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;margin-bottom:0.75rem;">Fix These Issues</div>
        <h2 style="font-size:clamp(1.4rem,3vw,2rem);font-weight:900;color:#FFFFFF;margin-bottom:0.875rem;">We'll close every gap — free 30-minute assessment</h2>
        <p style="font-size:0.92rem;color:#9CA3AF;max-width:460px;margin:0 auto 1.75rem;line-height:1.7;">Leonidas configures SPF, DMARC, DKIM, and security headers as part of every managed IT and cybersecurity engagement. Florida Panhandle businesses only.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
          <a href="<?= $b ?>/contact" class="btn-primary" style="padding:0.85rem 2rem;font-size:0.95rem;">Get a Free Assessment</a>
          <a href="tel:8506149343" class="btn-ghost" style="padding:0.85rem 2rem;font-size:0.95rem;">850-614-9343</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section style="padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-3xl mx-auto px-6">
    <div class="fade-in" style="margin-bottom:2rem;text-align:center;">
      <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#6B7280;text-transform:uppercase;margin-bottom:0.75rem;">Common Questions</div>
      <h2 style="font-size:clamp(1.4rem,3vw,1.9rem);font-weight:900;letter-spacing:-0.02em;color:#F9FAFB;">Business Domain Security — FAQ</h2>
    </div>
    <?php foreach ($faq_items as $i => $f): ?>
    <div class="fade-in" style="border-bottom:1px solid rgba(255,255,255,0.06);<?= $i===0?'border-top:1px solid rgba(255,255,255,0.06);':'' ?>">
      <button class="faq-trigger" aria-expanded="false"
              onclick="var e=this.getAttribute('aria-expanded')==='true';this.setAttribute('aria-expanded',e?'false':'true');this.nextElementSibling.style.display=e?'none':'block';"
              style="width:100%;display:flex;justify-content:space-between;align-items:center;gap:1rem;padding:1.1rem 0;background:none;border:none;cursor:pointer;text-align:left;">
        <span style="font-size:0.92rem;font-weight:600;color:#F9FAFB;line-height:1.4;"><?= htmlspecialchars($f['q']) ?></span>
        <span class="faq-icon" style="flex-shrink:0;font-size:1.2rem;color:#D4A843;transition:transform 0.25s;">+</span>
      </button>
      <div style="display:none;padding-bottom:1.1rem;">
        <p style="font-size:0.875rem;color:#9CA3AF;line-height:1.75;margin:0;"><?= htmlspecialchars($f['a']) ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<script>
(function() {
  var SCAN_URL = <?= json_encode(SITE_URL . '/resources/scorecard-check.php') ?>;
  var CIRC     = 2 * Math.PI * 80; // 502.65 — circumference of r=80 ring
  var form     = document.getElementById('scan-form');
  var input    = document.getElementById('domain-input');
  var btn      = document.getElementById('scan-btn');
  var errEl    = document.getElementById('scan-error');
  var heroSec  = form.closest('section');
  var loadSec  = document.getElementById('loading-state');
  var resSec   = document.getElementById('results-state');

  function scoreColor(s) {
    return s >= 85 ? '#4ADE80' : s >= 70 ? '#A3E635' : s >= 50 ? '#FBBF24' : '#EF4444';
  }
  function scoreLabel(s) {
    if (s >= 85) return {text:'Excellent Security Posture', summary:'Your domain is well-protected. A few fine-tuning opportunities may remain.'};
    if (s >= 70) return {text:'Good — A Few Gaps',          summary:'Solid foundation with some issues worth closing before they become problems.'};
    if (s >= 50) return {text:'Fair — Action Recommended',  summary:'Multiple gaps that attackers actively exploit. Address these soon.'};
    return           {text:'At Risk — Immediate Attention', summary:'Critical security controls are missing. Your domain and email are exposed.'};
  }
  function checkIcon(s) { return s === 'pass' ? '✓' : s === 'warn' ? '⚠' : '✗'; }

  function makeEl(tag, cls, text) {
    var el = document.createElement(tag);
    if (cls)  el.className   = cls;
    if (text) el.textContent = text;
    return el;
  }

  function showLoading(domain) {
    heroSec.style.display = 'none';
    resSec.style.display  = 'none';
    loadSec.style.display = 'block';
    document.getElementById('scanning-domain').textContent = domain;
    ['step-dns','step-email','step-ssl','step-https','step-headers'].forEach(function(id, i) {
      setTimeout(function() { document.getElementById(id).classList.add('visible'); }, i * 1600);
    });
  }

  function showResults(data) {
    loadSec.style.display = 'none';
    resSec.style.display  = 'block';
    document.getElementById('result-domain').textContent = data.domain;

    var ring  = document.getElementById('score-ring');
    var numEl = document.getElementById('score-number');
    var color = scoreColor(data.score);
    ring.setAttribute('stroke', color);
    ring.setAttribute('stroke-dasharray', '0 ' + CIRC);
    requestAnimationFrame(function() {
      requestAnimationFrame(function() {
        ring.setAttribute('stroke-dasharray', (data.score / 100 * CIRC) + ' ' + CIRC);
      });
    });

    var cur = 0;
    (function tick() {
      var diff = data.score - cur;
      if (Math.abs(diff) < 1) { numEl.textContent = data.score; return; }
      cur += diff * 0.12;
      numEl.textContent = Math.round(cur);
      requestAnimationFrame(tick);
    })();

    var labelEl = document.getElementById('score-label');
    var lbl = scoreLabel(data.score);
    labelEl.textContent = data.score + ' / 100 — ' + lbl.text;
    labelEl.style.color = color;
    document.getElementById('score-summary').textContent = lbl.summary;

    var grid = document.getElementById('checks-grid');
    grid.textContent = '';
    data.checks.forEach(function(c) {
      var card    = makeEl('div', 'check-card border-' + c.status);
      var icon    = makeEl('div', 'check-icon status-' + c.status, checkIcon(c.status));
      var info    = makeEl('div');
      var label   = makeEl('div', 'check-label',  c.label);
      var detail  = makeEl('div', 'check-detail', c.detail);
      var pts     = makeEl('div', 'check-pts',    c.points + ' / ' + c.max + ' pts');
      info.appendChild(label);
      info.appendChild(detail);
      info.appendChild(pts);
      card.appendChild(icon);
      card.appendChild(info);
      grid.appendChild(card);
    });
  }

  window.resetScanner = function() {
    resSec.style.display  = 'none';
    heroSec.style.display = 'block';
    input.value = ''; errEl.textContent = ''; btn.disabled = false;
    document.querySelectorAll('.scan-step').forEach(function(el) { el.classList.remove('visible'); });
  };

  form.addEventListener('submit', async function() {
    var raw    = input.value.trim();
    var domain = raw.replace(/^https?:\/\//i,'').split(/[/?#]/)[0].replace(/^www\./i,'').toLowerCase();
    if (!domain || !/^[a-z0-9]([a-z0-9\-]{0,61}[a-z0-9])?(\.[a-z0-9]([a-z0-9\-]{0,61}[a-z0-9])?)*\.[a-z]{2,}$/.test(domain)) {
      errEl.textContent = 'Please enter a valid domain (e.g. yourbusiness.com).';
      return;
    }
    errEl.textContent = ''; btn.disabled = true;
    showLoading(domain);
    try {
      var res  = await fetch(SCAN_URL, {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'domain=' + encodeURIComponent(domain)
      });
      var data = await res.json();
      if (data.error) {
        loadSec.style.display = 'none'; heroSec.style.display = 'block';
        errEl.textContent = data.error; btn.disabled = false;
        return;
      }
      showResults(data);
    } catch(e) {
      loadSec.style.display = 'none'; heroSec.style.display = 'block';
      errEl.textContent = 'Scan failed. Please try again.'; btn.disabled = false;
    }
  });
})();
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
