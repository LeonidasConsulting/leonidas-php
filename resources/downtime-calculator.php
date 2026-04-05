<?php
require_once dirname(__DIR__) . '/includes/config.php';

$page_title       = 'IT Downtime Cost Calculator | Leonidas — Florida Panhandle';
$page_description = 'Calculate the true cost of IT downtime for your business. Includes direct productivity loss, hidden costs, and annual risk exposure. Free tool from Leonidas.';
$page_url         = SITE_URL . '/resources/downtime-calculator';

$og_image        = 'https://leonidastek.com/assets/og-home.png';
$canonical_url   = $page_url;
$meta_description = $page_description;

$page_json_ld = '<script type="application/ld+json">' . json_encode([
    '@context'    => 'https://schema.org',
    '@type'       => 'WebApplication',
    'name'        => 'IT Downtime Cost Calculator',
    'description' => 'Calculate the true cost of IT downtime for your business including direct productivity loss and hidden costs.',
    'url'         => SITE_URL . '/resources/downtime-calculator',
    'applicationCategory' => 'BusinessApplication',
    'operatingSystem' => 'Any',
    'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
    'author' => ['@type' => 'Organization', 'name' => 'Leonidas', 'url' => SITE_URL],
], JSON_UNESCAPED_SLASHES) . '</script>';

$page_css = '
  .calc-panel {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(212,168,67,0.15);
    border-radius: 1.25rem;
    transition: border-color 0.5s ease;
  }
  .calc-panel.risk-high   { border-color: rgba(249,115,22,0.35); }
  .calc-panel.risk-critical { border-color: rgba(239,68,68,0.4); }

  .metric-card {
    background: rgba(255,255,255,0.025);
    border: 1px solid rgba(212,168,67,0.12);
    border-radius: 1rem;
    padding: 1.25rem 1.5rem;
    transition: border-color 0.4s, box-shadow 0.4s;
    position: relative;
    overflow: hidden;
  }
  .metric-card::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at top center, rgba(212,168,67,0.05) 0%, transparent 70%);
    pointer-events: none;
  }
  .metric-card.risk-high   { border-color: rgba(249,115,22,0.3); box-shadow: 0 0 24px rgba(249,115,22,0.07); }
  .metric-card.risk-critical { border-color: rgba(239,68,68,0.35); box-shadow: 0 0 32px rgba(239,68,68,0.1); }

  .metric-value {
    font-size: clamp(1.6rem, 3.5vw, 2.4rem);
    font-weight: 900;
    letter-spacing: -0.03em;
    color: #D4A843;
    font-variant-numeric: tabular-nums;
    transition: color 0.4s;
    line-height: 1;
  }
  .metric-card.risk-high   .metric-value { color: #F97316; }
  .metric-card.risk-critical .metric-value { color: #EF4444; }

  .risk-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.35rem 0.85rem;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    transition: all 0.4s ease;
  }
  .risk-badge.low      { background: rgba(74,222,128,0.12); color: #4ADE80; border: 1px solid rgba(74,222,128,0.3); }
  .risk-badge.moderate { background: rgba(251,191,36,0.12); color: #FBBF24; border: 1px solid rgba(251,191,36,0.3); }
  .risk-badge.high     { background: rgba(249,115,22,0.12); color: #F97316; border: 1px solid rgba(249,115,22,0.3); }
  .risk-badge.critical { background: rgba(239,68,68,0.12); color: #EF4444; border: 1px solid rgba(239,68,68,0.3); }
  .risk-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: currentColor;
    animation: pulseDot 1.8s ease-in-out infinite;
  }
  @keyframes pulseDot {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(0.7); }
  }

  /* Sliders */
  .calc-slider {
    -webkit-appearance: none;
    appearance: none;
    width: 100%;
    height: 4px;
    border-radius: 4px;
    outline: none;
    cursor: pointer;
    transition: opacity 0.2s;
  }
  .calc-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #D4A843;
    cursor: pointer;
    box-shadow: 0 0 0 3px rgba(212,168,67,0.2), 0 2px 8px rgba(0,0,0,0.4);
    transition: box-shadow 0.2s, transform 0.2s;
  }
  .calc-slider::-webkit-slider-thumb:hover {
    box-shadow: 0 0 0 5px rgba(212,168,67,0.25), 0 4px 12px rgba(0,0,0,0.5);
    transform: scale(1.1);
  }
  .calc-slider::-moz-range-thumb {
    width: 20px; height: 20px;
    border-radius: 50%;
    background: #D4A843;
    cursor: pointer;
    border: none;
    box-shadow: 0 0 0 3px rgba(212,168,67,0.2);
  }

  /* Breakdown bars */
  .breakdown-bar-fill {
    height: 100%;
    border-radius: 4px;
    transition: width 0.6s cubic-bezier(0.16,1,0.3,1);
  }

  /* Stat cards */
  .stat-chip {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 0.75rem;
    padding: 1.25rem 1.5rem;
  }
  .stat-chip:hover {
    border-color: rgba(212,168,67,0.2);
    background: rgba(212,168,67,0.02);
  }

  /* Select styling */
  .calc-select {
    appearance: none;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(212,168,67,0.2);
    border-radius: 0.5rem;
    color: #FFFFFF;
    padding: 0.6rem 2.5rem 0.6rem 0.875rem;
    font-size: 0.9rem;
    cursor: pointer;
    outline: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'12\' height=\'8\' viewBox=\'0 0 12 8\'%3E%3Cpath d=\'M1 1l5 5 5-5\' stroke=\'%23D4A843\' stroke-width=\'1.5\' fill=\'none\' stroke-linecap=\'round\'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    width: 100%;
    transition: border-color 0.2s;
  }
  .calc-select:focus { border-color: rgba(212,168,67,0.5); }
  .calc-select option { background: #0D0D20; color: #FFFFFF; }

  /* Comparison section */
  .compare-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(255,255,255,0.05);
  }
  .compare-row:last-child { border-bottom: none; }

  /* Needle animation */
  #gauge-needle { transition: transform 0.7s cubic-bezier(0.34,1.56,0.64,1); }

  /* Number animation */
  .counting { color: inherit; }
';

require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- HERO -->
<section style="padding-top:8rem; padding-bottom:5rem; position:relative; overflow:hidden;">
  <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle, rgba(212,168,67,0.06) 0%, transparent 70%);top:-200px;right:-150px;"></div>
  <div class="orb" style="width:400px;height:400px;background:radial-gradient(circle, rgba(239,68,68,0.04) 0%, transparent 70%);bottom:-100px;left:-100px;animation-delay:2s;"></div>

  <div class="max-w-7xl mx-auto px-6">
    <nav class="flex items-center gap-2 text-sm mb-8" style="color:#6B7280;" aria-label="Breadcrumb">
      <a href="<?= $b ?>/" style="color:#6B7280;text-decoration:none;" onmouseover="this.style.color='#D4A843'" onmouseout="this.style.color='#6B7280'">Home</a>
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M4 2l4 4-4 4" stroke="#4B5563" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      <span style="color:#6B7280;">Resources</span>
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M4 2l4 4-4 4" stroke="#4B5563" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      <span style="color:#D4A843;">Downtime Cost Calculator</span>
    </nav>

    <div class="max-w-3xl">
      <div class="section-label fade-in" style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;">
        <span style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;">Free Tool</span>
      </div>
      <h1 class="fade-in fade-in-delay-1" style="font-size:clamp(2.6rem,6vw,4.5rem);font-weight:900;letter-spacing:-0.03em;line-height:1.05;color:#FFFFFF;">
        How Much Does<br><span style="color:#D4A843;">Downtime</span> Really Cost?
      </h1>
      <p class="fade-in fade-in-delay-2 mt-6 text-lg leading-relaxed max-w-2xl" style="color:#9CA3AF;">
        Most businesses underestimate IT downtime costs by 60%. This calculator shows your true annual exposure — including the hidden costs most tools ignore.
      </p>
    </div>
  </div>
</section>

<!-- CALCULATOR -->
<section style="padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-7xl mx-auto px-6">

    <div class="calc-panel fade-in" id="calc-panel" style="padding:2rem 2.5rem;">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:start;" class="calc-grid">

        <!-- INPUTS -->
        <div>
          <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#6B7280;text-transform:uppercase;margin-bottom:1.75rem;">Your Business</div>

          <!-- Employees -->
          <div style="margin-bottom:2rem;">
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.75rem;">
              <label style="font-size:0.88rem;color:#9CA3AF;font-weight:500;">Employees Affected by an Outage</label>
              <span id="emp-display" style="font-size:1.5rem;font-weight:800;color:#D4A843;letter-spacing:-0.02em;">25</span>
            </div>
            <input type="range" id="emp-slider" class="calc-slider" min="1" max="500" value="25"
                   style="background:linear-gradient(to right,#D4A843 5%,rgba(255,255,255,0.08) 5%);">
            <div style="display:flex;justify-content:space-between;margin-top:0.4rem;font-size:0.72rem;color:#4B5563;">
              <span>1</span><span>125</span><span>250</span><span>375</span><span>500</span>
            </div>
          </div>

          <!-- Wage -->
          <div style="margin-bottom:2rem;">
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.75rem;">
              <label style="font-size:0.88rem;color:#9CA3AF;font-weight:500;">Average Hourly Wage</label>
              <span id="wage-display" style="font-size:1.5rem;font-weight:800;color:#D4A843;letter-spacing:-0.02em;">$28</span>
            </div>
            <input type="range" id="wage-slider" class="calc-slider" min="10" max="150" value="28"
                   style="background:linear-gradient(to right,#D4A843 13%,rgba(255,255,255,0.08) 13%);">
            <div style="display:flex;justify-content:space-between;margin-top:0.4rem;font-size:0.72rem;color:#4B5563;">
              <span>$10</span><span>$45</span><span>$80</span><span>$115</span><span>$150</span>
            </div>
          </div>

          <!-- Industry -->
          <div style="margin-bottom:2.25rem;">
            <label style="display:block;font-size:0.88rem;color:#9CA3AF;font-weight:500;margin-bottom:0.6rem;">Industry</label>
            <select id="industry-select" class="calc-select">
              <option value="1.0">General Business</option>
              <option value="1.25">Healthcare</option>
              <option value="1.2">Legal / Professional Services</option>
              <option value="1.2">Finance / Insurance</option>
              <option value="1.15">Government / Defense</option>
              <option value="1.05">Construction</option>
              <option value="0.95">Hospitality / Retail</option>
            </select>
            <p style="font-size:0.75rem;color:#4B5563;margin-top:0.5rem;">Regulated industries carry higher risk multipliers due to compliance penalties and breach liability.</p>
          </div>

          <!-- Note -->
          <div style="background:rgba(212,168,67,0.04);border:1px solid rgba(212,168,67,0.12);border-radius:0.75rem;padding:1rem 1.25rem;">
            <p style="font-size:0.8rem;color:#6B7280;line-height:1.6;margin:0;">
              <span style="color:#D4A843;font-weight:600;">Hidden cost multiplier applied:</span> IBM research shows direct productivity loss represents only ~40% of total downtime cost. Recovery, reputation, and revenue impact account for the rest.
            </p>
          </div>
        </div>

        <!-- RESULTS -->
        <div>
          <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#6B7280;text-transform:uppercase;margin-bottom:1.75rem;">Your Risk Profile</div>

          <!-- Gauge -->
          <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:1.75rem;">
            <svg viewBox="0 0 220 130" style="width:100%;max-width:280px;" aria-label="Risk gauge">
              <defs>
                <linearGradient id="gaugeGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%"   stop-color="#4ADE80"/>
                  <stop offset="33%"  stop-color="#FBBF24"/>
                  <stop offset="66%"  stop-color="#F97316"/>
                  <stop offset="100%" stop-color="#EF4444"/>
                </linearGradient>
                <filter id="needleGlow">
                  <feGaussianBlur stdDeviation="2" result="blur"/>
                  <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
              </defs>
              <!-- Track -->
              <path d="M 20 110 A 90 90 0 0 1 200 110"
                    fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="16" stroke-linecap="round"/>
              <!-- Color arc -->
              <path d="M 20 110 A 90 90 0 0 1 200 110"
                    fill="none" stroke="url(#gaugeGrad)" stroke-width="16" stroke-linecap="round" opacity="0.85"/>
              <!-- Zone labels -->
              <text x="10"  y="128" font-size="7" fill="#4ADE80"  font-family="Inter,sans-serif" font-weight="600">LOW</text>
              <text x="68"  y="68"  font-size="7" fill="#FBBF24"  font-family="Inter,sans-serif" font-weight="600">MOD</text>
              <text x="130" y="68"  font-size="7" fill="#F97316"  font-family="Inter,sans-serif" font-weight="600">HIGH</text>
              <text x="183" y="128" font-size="7" fill="#EF4444"  font-family="Inter,sans-serif" font-weight="600">CRIT</text>
              <!-- Needle -->
              <g id="gauge-needle" style="transform-origin:110px 110px;transform:rotate(-88deg);">
                <line x1="110" y1="110" x2="110" y2="32"
                      stroke="rgba(255,255,255,0.9)" stroke-width="2.5" stroke-linecap="round"
                      filter="url(#needleGlow)"/>
                <circle cx="110" cy="110" r="6" fill="#0A0A1A" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                <circle cx="110" cy="110" r="3" fill="#D4A843"/>
              </g>
            </svg>

            <!-- Risk badge -->
            <div id="risk-badge" class="risk-badge low" style="margin-top:0.5rem;">
              <span class="risk-dot"></span>
              <span id="risk-label">LOW RISK</span>
            </div>
          </div>

          <!-- Metric cards -->
          <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:0.75rem;margin-bottom:0.75rem;">
            <div class="metric-card" id="card-hour">
              <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.14em;color:#6B7280;text-transform:uppercase;margin-bottom:0.5rem;">Per Hour</div>
              <div class="metric-value" id="val-hour">$350</div>
            </div>
            <div class="metric-card" id="card-day">
              <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.14em;color:#6B7280;text-transform:uppercase;margin-bottom:0.5rem;">Per Day</div>
              <div class="metric-value" id="val-day">$2,800</div>
            </div>
            <div class="metric-card" id="card-year">
              <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.14em;color:#6B7280;text-transform:uppercase;margin-bottom:0.5rem;">Annual Risk</div>
              <div class="metric-value" id="val-year">$4,900</div>
            </div>
          </div>
          <p style="font-size:0.72rem;color:#4B5563;text-align:center;margin-top:0.5rem;">Based on 14 hrs avg unplanned downtime/year — Gartner SMB data</p>
        </div>

      </div><!-- /calc-grid -->
    </div><!-- /calc-panel -->

  </div>
</section>

<!-- COST BREAKDOWN -->
<section style="padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-7xl mx-auto px-6">
    <div class="fade-in" style="background:rgba(255,255,255,0.015);border:1px solid rgba(212,168,67,0.1);border-radius:1.25rem;padding:2rem 2.5rem;">
      <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;margin-bottom:1.5rem;">Where the Cost Goes</div>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;" class="breakdown-grid">
        <div>
          <!-- Bar 1: Direct -->
          <div style="margin-bottom:1.75rem;">
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
              <span style="font-size:0.85rem;color:#9CA3AF;">Direct productivity loss</span>
              <span id="bd-direct-pct" style="font-size:0.85rem;font-weight:700;color:#D4A843;">40%</span>
            </div>
            <div style="height:8px;background:rgba(255,255,255,0.06);border-radius:4px;overflow:hidden;">
              <div class="breakdown-bar-fill" id="bd-direct-bar" style="width:40%;background:linear-gradient(to right,#D4A843,#F59E0B);"></div>
            </div>
            <p style="font-size:0.75rem;color:#4B5563;margin-top:0.4rem;">Employees idle × hourly wage</p>
          </div>
          <!-- Bar 2: Hidden -->
          <div style="margin-bottom:1.75rem;">
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
              <span style="font-size:0.85rem;color:#9CA3AF;">Recovery &amp; remediation costs</span>
              <span style="font-size:0.85rem;font-weight:700;color:#9CA3AF;">25%</span>
            </div>
            <div style="height:8px;background:rgba(255,255,255,0.06);border-radius:4px;overflow:hidden;">
              <div class="breakdown-bar-fill" id="bd-recovery-bar" style="width:25%;background:rgba(156,163,175,0.6);"></div>
            </div>
            <p style="font-size:0.75rem;color:#4B5563;margin-top:0.4rem;">IT time, vendor calls, hardware replacement</p>
          </div>
          <!-- Bar 3: Revenue -->
          <div>
            <div style="display:flex;justify-content:space-between;align-items:baseline;margin-bottom:0.5rem;">
              <span style="font-size:0.85rem;color:#9CA3AF;">Reputation &amp; revenue impact</span>
              <span style="font-size:0.85rem;font-weight:700;color:#9CA3AF;">35%</span>
            </div>
            <div style="height:8px;background:rgba(255,255,255,0.06);border-radius:4px;overflow:hidden;">
              <div class="breakdown-bar-fill" id="bd-rep-bar" style="width:35%;background:rgba(107,114,128,0.5);"></div>
            </div>
            <p style="font-size:0.75rem;color:#4B5563;margin-top:0.4rem;">Customer churn, missed SLAs, brand damage</p>
          </div>
        </div>

        <!-- Dollar breakdown -->
        <div>
          <div style="font-size:0.75rem;font-weight:700;letter-spacing:0.12em;color:#6B7280;text-transform:uppercase;margin-bottom:1.25rem;">Your Annual Breakdown</div>
          <div class="compare-row">
            <span style="font-size:0.88rem;color:#9CA3AF;">Direct productivity loss</span>
            <span id="bd-direct-val" style="font-size:1rem;font-weight:700;color:#D4A843;font-variant-numeric:tabular-nums;">$1,960</span>
          </div>
          <div class="compare-row">
            <span style="font-size:0.88rem;color:#9CA3AF;">Recovery &amp; remediation</span>
            <span id="bd-recovery-val" style="font-size:1rem;font-weight:700;color:#9CA3AF;font-variant-numeric:tabular-nums;">$1,225</span>
          </div>
          <div class="compare-row">
            <span style="font-size:0.88rem;color:#9CA3AF;">Reputation &amp; revenue impact</span>
            <span id="bd-rep-val" style="font-size:1rem;font-weight:700;color:#9CA3AF;font-variant-numeric:tabular-nums;">$1,715</span>
          </div>
          <div style="padding-top:1rem;margin-top:0.25rem;border-top:1px solid rgba(212,168,67,0.2);display:flex;justify-content:space-between;align-items:baseline;">
            <span style="font-size:0.9rem;font-weight:700;color:#FFFFFF;">Total annual exposure</span>
            <span id="bd-total-val" style="font-size:1.4rem;font-weight:900;color:#D4A843;letter-spacing:-0.02em;font-variant-numeric:tabular-nums;">$4,900</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WITH LEONIDAS COMPARISON -->
<section style="padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-7xl mx-auto px-6">
    <div class="fade-in" style="background:rgba(212,168,67,0.03);border:1px solid rgba(212,168,67,0.15);border-radius:1.25rem;padding:2rem 2.5rem;">
      <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:2rem;">
        <div>
          <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;margin-bottom:0.5rem;">The Managed IT Difference</div>
          <h2 style="font-size:clamp(1.4rem,2.5vw,2rem);font-weight:900;letter-spacing:-0.02em;color:#FFFFFF;margin:0;">What proactive IT actually saves you</h2>
        </div>
        <div style="background:rgba(74,222,128,0.08);border:1px solid rgba(74,222,128,0.2);border-radius:0.75rem;padding:0.75rem 1.25rem;text-align:center;">
          <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.12em;color:#4ADE80;text-transform:uppercase;margin-bottom:0.25rem;">Potential Annual Savings</div>
          <div id="savings-val" style="font-size:1.8rem;font-weight:900;color:#4ADE80;letter-spacing:-0.03em;font-variant-numeric:tabular-nums;">$3,850</div>
        </div>
      </div>

      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;" class="compare-cols">
        <div style="background:rgba(239,68,68,0.04);border:1px solid rgba(239,68,68,0.12);border-radius:1rem;padding:1.5rem;">
          <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.15em;color:#EF4444;text-transform:uppercase;margin-bottom:1rem;">Unmanaged — Industry Average</div>
          <div style="margin-bottom:1rem;">
            <span style="font-size:2rem;font-weight:900;color:#EF4444;letter-spacing:-0.03em;font-variant-numeric:tabular-nums;" id="cmp-unmanaged">$4,900</span>
            <span style="font-size:0.8rem;color:#6B7280;margin-left:0.5rem;">/ year</span>
          </div>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.5rem;">
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#EF4444;">✗</span> ~14 hours downtime per year</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#EF4444;">✗</span> Reactive — you call when it breaks</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#EF4444;">✗</span> No monitoring or early warning</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#EF4444;">✗</span> Unpredictable emergency costs</li>
          </ul>
        </div>
        <div style="background:rgba(74,222,128,0.04);border:1px solid rgba(74,222,128,0.15);border-radius:1rem;padding:1.5rem;">
          <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.15em;color:#4ADE80;text-transform:uppercase;margin-bottom:1rem;">With Leonidas — Managed IT</div>
          <div style="margin-bottom:1rem;">
            <span style="font-size:2rem;font-weight:900;color:#4ADE80;letter-spacing:-0.03em;font-variant-numeric:tabular-nums;" id="cmp-managed">$700</span>
            <span style="font-size:0.8rem;color:#6B7280;margin-left:0.5rem;">/ year exposure</span>
          </div>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.5rem;">
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#4ADE80;">✓</span> ~2 hours downtime per year (avg)</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#4ADE80;">✓</span> 24/7 proactive monitoring</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#4ADE80;">✓</span> Issues resolved before you notice</li>
            <li style="font-size:0.82rem;color:#9CA3AF;display:flex;align-items:center;gap:0.5rem;"><span style="color:#4ADE80;">✓</span> Predictable flat monthly rate</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INDUSTRY STATS -->
<section style="padding-bottom:5rem;position:relative;z-index:1;">
  <div class="max-w-7xl mx-auto px-6">
    <div class="fade-in" style="text-align:center;margin-bottom:2.5rem;">
      <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#6B7280;text-transform:uppercase;margin-bottom:0.75rem;">The Numbers Behind This Tool</div>
      <h2 style="font-size:clamp(1.5rem,3vw,2rem);font-weight:900;letter-spacing:-0.02em;color:#F9FAFB;">Why this isn't a theoretical exercise</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="stats-grid">
      <div class="stat-chip fade-in">
        <div style="font-size:2.2rem;font-weight:900;color:#D4A843;letter-spacing:-0.03em;margin-bottom:0.5rem;">$4.88M</div>
        <div style="font-size:0.85rem;font-weight:600;color:#FFFFFF;margin-bottom:0.35rem;">Average data breach cost</div>
        <div style="font-size:0.78rem;color:#4B5563;">IBM Cost of a Data Breach Report, 2024. Downtime and data loss are often the same incident.</div>
      </div>
      <div class="stat-chip fade-in fade-in-delay-1">
        <div style="font-size:2.2rem;font-weight:900;color:#D4A843;letter-spacing:-0.03em;margin-bottom:0.5rem;">14 hrs</div>
        <div style="font-size:0.85rem;font-weight:600;color:#FFFFFF;margin-bottom:0.35rem;">Average annual downtime for unmanaged SMBs</div>
        <div style="font-size:0.78rem;color:#4B5563;">Gartner research on IT downtime frequency for businesses without managed monitoring.</div>
      </div>
      <div class="stat-chip fade-in fade-in-delay-2">
        <div style="font-size:2.2rem;font-weight:900;color:#D4A843;letter-spacing:-0.03em;margin-bottom:0.5rem;">60%</div>
        <div style="font-size:0.85rem;font-weight:600;color:#FFFFFF;margin-bottom:0.35rem;">Of small businesses close within 6 months of a major IT incident</div>
        <div style="font-size:0.78rem;color:#4B5563;">FEMA / SBA data on business survival following significant technology failures.</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section style="padding-bottom:6rem;position:relative;z-index:1;">
  <div class="max-w-7xl mx-auto px-6">
    <div class="fade-in" style="background:linear-gradient(135deg,rgba(212,168,67,0.08) 0%,rgba(212,168,67,0.03) 100%);border:1px solid rgba(212,168,67,0.2);border-radius:1.5rem;padding:3rem;text-align:center;position:relative;overflow:hidden;">
      <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center top,rgba(212,168,67,0.06) 0%,transparent 60%);pointer-events:none;"></div>
      <div style="position:relative;">
        <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.18em;color:#D4A843;text-transform:uppercase;margin-bottom:1rem;">No Cost, No Obligation</div>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:900;letter-spacing:-0.03em;color:#FFFFFF;margin-bottom:1rem;">Your exposure is <span id="cta-amount" style="color:#D4A843;">real</span>. Let's reduce it.</h2>
        <p style="font-size:1rem;color:#9CA3AF;max-width:520px;margin:0 auto 2rem;line-height:1.7;">
          Leonidas offers free 30-minute IT assessments for Florida Panhandle businesses. We'll show you exactly where your gaps are and what it would take to close them.
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
          <a href="<?= $b ?>/contact" class="btn-primary" style="padding:0.85rem 2rem;font-size:0.95rem;">Get a Free Assessment</a>
          <a href="tel:8506149343" class="btn-ghost" style="padding:0.85rem 2rem;font-size:0.95rem;">850-614-9343</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RESPONSIVE STYLES -->
<style>
  @media (max-width: 768px) {
    .calc-grid, .breakdown-grid, .compare-cols, .stats-grid { grid-template-columns: 1fr !important; }
    .calc-grid { gap: 2rem !important; }
  }
</style>

<script>
(function() {
  // ── State ──
  const state = { emp: 25, wage: 28, mult: 1.0 };

  // ── Elements ──
  const empSlider   = document.getElementById('emp-slider');
  const wageSlider  = document.getElementById('wage-slider');
  const indSelect   = document.getElementById('industry-select');
  const empDisplay  = document.getElementById('emp-display');
  const wageDisplay = document.getElementById('wage-display');

  const valHour  = document.getElementById('val-hour');
  const valDay   = document.getElementById('val-day');
  const valYear  = document.getElementById('val-year');
  const needle   = document.getElementById('gauge-needle');
  const badge    = document.getElementById('risk-badge');
  const riskLbl  = document.getElementById('risk-label');
  const calcPanel = document.getElementById('calc-panel');
  const cards    = [document.getElementById('card-hour'),document.getElementById('card-day'),document.getElementById('card-year')];

  const bdDirectBar   = document.getElementById('bd-direct-bar');
  const bdRecoveryBar = document.getElementById('bd-recovery-bar');
  const bdRepBar      = document.getElementById('bd-rep-bar');
  const bdDirectVal   = document.getElementById('bd-direct-val');
  const bdRecoveryVal = document.getElementById('bd-recovery-val');
  const bdRepVal      = document.getElementById('bd-rep-val');
  const bdTotalVal    = document.getElementById('bd-total-val');

  const cmpUnmanaged  = document.getElementById('cmp-unmanaged');
  const cmpManaged    = document.getElementById('cmp-managed');
  const savingsVal    = document.getElementById('savings-val');
  const ctaAmount     = document.getElementById('cta-amount');

  // ── Counters ──
  const animTargets = {};
  const animCurrent = {};

  function animateNumber(el, target) {
    const key = el.id;
    animTargets[key] = target;
    if (animCurrent[key] === undefined) animCurrent[key] = target;

    function tick() {
      const cur  = animCurrent[key] || 0;
      const tgt  = animTargets[key];
      const diff = tgt - cur;
      if (Math.abs(diff) < 1) { animCurrent[key] = tgt; el.textContent = formatDollar(tgt); return; }
      animCurrent[key] = cur + diff * 0.18;
      el.textContent = formatDollar(animCurrent[key]);
      requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  function formatDollar(n) {
    n = Math.round(n);
    if (n >= 1000000) return '$' + (n/1000000).toFixed(1) + 'M';
    if (n >= 1000)    return '$' + n.toLocaleString('en-US');
    return '$' + n;
  }

  // ── Slider fill ──
  function updateSliderFill(slider, min, max) {
    const pct = ((slider.value - min) / (max - min)) * 100;
    slider.style.background = `linear-gradient(to right, #D4A843 ${pct}%, rgba(255,255,255,0.08) ${pct}%)`;
  }

  // ── Calculate ──
  function calc() {
    const { emp, wage, mult } = state;
    // Direct hourly = emp × wage
    // Total = direct × 2.5 (hidden cost multiplier)
    const directHourly = emp * wage;
    const totalHourly  = directHourly * 2.5 * mult;
    const totalDaily   = totalHourly * 8;
    const annualHrs    = 14;  // Gartner SMB average unplanned downtime hrs/yr
    const managedHrs   = 2;
    const annualTotal  = totalHourly * annualHrs;
    const managedTotal = totalHourly * managedHrs;
    const savings      = annualTotal - managedTotal;

    // ── Breakdown components ──
    const directAnnual   = directHourly * annualHrs;           // 40% proxy
    const recoveryAnnual = annualTotal * 0.25;
    const repAnnual      = annualTotal * 0.35;

    // ── Risk level ──
    let risk, badgeClass, panelClass;
    if      (annualTotal <  10000)  { risk = 'LOW RISK';      badgeClass = 'low';      panelClass = ''; }
    else if (annualTotal <  50000)  { risk = 'MODERATE RISK'; badgeClass = 'moderate'; panelClass = ''; }
    else if (annualTotal < 150000)  { risk = 'HIGH RISK';     badgeClass = 'high';     panelClass = 'risk-high'; }
    else                            { risk = 'CRITICAL RISK'; badgeClass = 'critical'; panelClass = 'risk-critical'; }

    // ── Needle angle (-88° = far left, +88° = far right) ──
    const maxAnnual = 300000;
    const pct = Math.min(annualTotal / maxAnnual, 1);
    const angle = -88 + pct * 176;
    needle.style.transform = `rotate(${angle}deg)`;

    // ── Animate metric values ──
    animateNumber(valHour,  totalHourly);
    animateNumber(valDay,   totalDaily);
    animateNumber(valYear,  annualTotal);

    // ── Risk badge + cards ──
    badge.className = 'risk-badge ' + badgeClass;
    riskLbl.textContent = risk;
    calcPanel.className = 'calc-panel fade-in' + (panelClass ? ' ' + panelClass : '');
    cards.forEach(c => {
      c.className = 'metric-card' + (panelClass ? ' ' + panelClass : '');
    });

    // ── Breakdown bars ──
    const directPct   = directAnnual / annualTotal * 100;
    bdDirectBar.style.width   = Math.min(directPct, 100) + '%';
    bdRecoveryBar.style.width = '25%';
    bdRepBar.style.width      = '35%';
    animateNumber(bdDirectVal,   directAnnual);
    animateNumber(bdRecoveryVal, recoveryAnnual);
    animateNumber(bdRepVal,      repAnnual);
    animateNumber(bdTotalVal,    annualTotal);

    // ── Comparison ──
    animateNumber(cmpUnmanaged, annualTotal);
    animateNumber(cmpManaged,   managedTotal);
    animateNumber(savingsVal,   savings);

    // ── CTA headline amount ──
    ctaAmount.textContent = formatDollar(annualTotal) + '/yr';
  }

  // ── Event listeners ──
  empSlider.addEventListener('input', function() {
    state.emp = +this.value;
    empDisplay.textContent = this.value;
    updateSliderFill(this, 1, 500);
    calc();
  });

  wageSlider.addEventListener('input', function() {
    state.wage = +this.value;
    wageDisplay.textContent = '$' + this.value;
    updateSliderFill(this, 10, 150);
    calc();
  });

  indSelect.addEventListener('change', function() {
    state.mult = +this.value;
    calc();
  });

  // ── Init ──
  calc();
})();
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
