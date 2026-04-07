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
    ], JSON_UNESCAPED_SLASHES) . '</script>' .
    '<script type="application/ld+json">' . json_encode([
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => $faq_schema,
    ], JSON_UNESCAPED_SLASHES) . '</script>' .
    '<script type="application/ld+json">' . json_encode([
        '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',       'item' => SITE_URL],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Resources',  'item' => SITE_URL . '/resources'],
            ['@type' => 'ListItem', 'position' => 3, 'name' => 'Ransomware Readiness Quiz', 'item' => $page_url],
        ],
    ], JSON_UNESCAPED_SLASHES) . '</script>';

$page_css = '
  .quiz-card { display:none; }
  .quiz-card.active { display:block; animation:qFadeIn 0.28s ease; }
  @keyframes qFadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }

  .q-category { font-size:0.68rem; font-weight:700; letter-spacing:0.18em; color:#D4A843; text-transform:uppercase; margin-bottom:1.25rem; }
  .q-text { font-size:clamp(1.1rem,2.5vw,1.45rem); font-weight:700; color:#FFFFFF; line-height:1.4; margin-bottom:2rem; }

  .q-answers { display:flex; flex-direction:column; gap:0.75rem; }
  .q-btn { display:flex; align-items:center; gap:1rem; width:100%; padding:1rem 1.25rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.09); border-radius:0.75rem; color:#D1D5DB; font-size:0.92rem; text-align:left; cursor:pointer; transition:background 0.15s, border-color 0.15s; }
  .q-btn:hover { background:rgba(212,168,67,0.08); border-color:rgba(212,168,67,0.3); color:#FFFFFF; }
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
