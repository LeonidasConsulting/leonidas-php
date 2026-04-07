# Ransomware Readiness Quiz — Design Spec

## Goal

Build a free, interactive 10-question Ransomware Readiness Quiz at `/resources/ransomware-quiz` that scores SMB visitors on their ransomware preparedness and shows them exactly where they're exposed — driving qualified leads to Leonidas's free assessment CTA.

## Architecture

**Single file: `leonidas-php/resources/ransomware-quiz.php`**

All quiz logic is client-side JavaScript. No AJAX backend is needed — scoring is computed in the browser after the 10th answer. This means no rate limiting, no server-side injection surface, and instant results.

Supporting changes:
- `leonidas-php/sitemap.php` — add `/resources/ransomware-quiz` entry
- `leonidas-php/services/cybersecurity.php` — add ransomware quiz teaser (gold, below scorecard teaser)
- `leonidas-php/services/managed-it.php` — add ransomware quiz teaser (gold, below scorecard teaser)

## Quiz UX Flow

1. **Hero section** — headline, sub-copy, "Start the Quiz →" button
2. **Quiz section** — one question visible at a time, all 10 cards pre-rendered in DOM (hidden via CSS), shown/hidden by JS
3. **Results section** — hidden until 10th answer submitted, then shown; page scrolls to top

### Question Card Structure

Each card contains:
- Category label (small uppercase, gold)
- Question number + progress indicator: "Question 3 of 10"
- Progress bar (filled to current %)
- Question text
- Three answer buttons (A / B / C) — full-width, large tap targets (min 48px height)
- "← Back" button (disabled on question 1)

Clicking an answer button:
1. Stores `{ value: 10|5|0, text: '...' }` in `answers[current]`
2. Hides current card, shows next card (CSS opacity + translate transition)
3. On question 10: calls `showResults()`

Back button: decrements `current`, re-shows previous card, clears stored answer for that index.

### State Object

```js
var state = {
  current: 0,          // 0-indexed question index
  answers: new Array(10).fill(null)  // { value, text } per question
};
```

## The 10 Questions

All scoring: A = 10pts, B = 5pts, C = 0pts. Max total = 100.

### Category: Backup & Recovery (Q1–Q3, max 30pts)

**Q1 — Backup testing**
- A) We test restores at least quarterly
- B) We have backups but rarely test restores
- C) We don't have a regular backup or test process

**Q2 — Backup storage location**
- A) Offsite or cloud, isolated from the main network
- B) On a local server or NAS on the same network
- C) We rely on device-level backups only

**Q3 — Recovery time estimate**
- A) Under 4 hours — we have a tested recovery plan
- B) 1–3 days — we'd figure it out
- C) We're honestly not sure

### Category: Access Control (Q4–Q6, max 30pts)

**Q4 — MFA coverage**
- A) Yes, required for all users on email and remote access
- B) Enabled for some accounts but not enforced
- C) Not in place

**Q5 — Privileged account management**
- A) Separate admin accounts, least-privilege enforced
- B) IT staff use admin rights for day-to-day work
- C) Most users have local admin on their machines

**Q6 — Employee offboarding**
- A) Accounts disabled same day, access audited
- B) Usually within a few days
- C) No formal offboarding process

### Category: Patching & Endpoint Protection (Q7–Q8, max 20pts)

**Q7 — Patch cadence**
- A) Critical patches applied within 72 hours across all devices
- B) Within a few weeks, when we get around to it
- C) No regular patching process

**Q8 — Endpoint protection**
- A) EDR/XDR (CrowdStrike, SentinelOne, Defender for Business, etc.)
- B) Standard antivirus only
- C) No dedicated endpoint protection

### Category: Training & Response (Q9–Q10, max 20pts)

**Q9 — Security awareness training**
- A) Formal training at least annually + phishing simulations
- B) Occasional reminders or one-time onboarding training
- C) No formal security training

**Q10 — Incident response plan**
- A) Documented, tested, staff know their roles
- B) Informal plan — people know roughly what to do
- C) No plan in place

## Per-Question Gap Recommendations

Shown on results page for any answer that is B or C:

| Q | Gap text (shown if B or C) |
|---|---|
| 1 | Untested backups are not reliable backups. Schedule a quarterly restore drill. |
| 2 | On-network backups get encrypted too. Isolate backups to immutable cloud or offsite media. |
| 3 | Without a tested recovery plan, ransomware response becomes improvised — and expensive. |
| 4 | MFA blocks over 99% of credential-based attacks. Enable and enforce it on all accounts. |
| 5 | Admin rights on daily-use accounts dramatically expand your attack surface. Separate them. |
| 6 | Departed employees with active accounts are an open door. Automate deprovisioning. |
| 7 | Ransomware operators exploit known vulnerabilities within hours of disclosure. Patch fast. |
| 8 | Traditional antivirus misses modern ransomware strains. Upgrade to an EDR solution. |
| 9 | Employees are the most targeted entry point. Regular training reduces click rates by 70%. |
| 10 | Without a response plan, the first 24 hours after an attack cost the most. Plan now. |

## Results Display (Option C — Full)

Shown after Q10, scroll to top.

### 1. Score Ring
- Same animated SVG ring as Security Scorecard (r=80, circumference ≈ 502.65)
- `stroke-dasharray` CSS transition: 0 → (score/100 * CIRC)
- Animated number counter (requestAnimationFrame, same as scorecard)
- Color by tier (see below)
- "out of 100" sub-label, risk tier label below ring

### 2. Category Score Bars
Four horizontal bars, built via DOM methods (`createElement`, `textContent`):
- Label: category name
- Fraction: e.g. "15 / 30"
- Bar fill width: `(categoryScore / categoryMax * 100)%`
- Bar color: matches tier color for that category's score percentage

### 3. Per-Question Breakdown
All 10 questions listed. Each row:
- Status icon: ✓ (A answer, green) / ~ (B answer, amber) / ✗ (C answer, red)
- Question text (short label)
- Answer the user gave
- Gap recommendation text (only shown for B or C answers)

Built entirely with DOM methods — no `innerHTML` with dynamic data.

### 4. CTA Card
Same gold gradient card as Security Scorecard:
> "We'll close every gap — free 30-minute assessment"
> Button: "Book My Free Assessment" → `/contact`

### 5. Restart
"← Retake Quiz" button: resets `state`, hides results section, shows hero section.

## Score Tiers

| Score | Tier | Color |
|-------|------|-------|
| 80–100 | Strong Posture | `#4ADE80` (green) |
| 60–79 | Moderate Risk | `#A3E635` (yellow-green) |
| 40–59 | High Risk | `#FBBF24` (amber) |
| 0–39 | Critical — Act Now | `#EF4444` (red) |

## SEO & Schema

### Page Variables
```php
$page_title       = 'Ransomware Readiness Quiz — Is Your Business Protected? | Leonidas';
$page_description = 'Take our free 2-minute ransomware readiness quiz. See how your backup, access control, patching, and training stack up — and get a free action plan from Leonidas, serving the Florida Panhandle.';
$page_url         = SITE_URL . '/resources/ransomware-quiz';
$canonical_url    = $page_url;
$og_image         = SITE_URL . '/assets/og-cybersecurity.png';
$og_image_width   = 1200;
$og_image_height  = 630;
```

### JSON-LD Schemas
Three blocks in `$page_json_ld`:

1. **WebApplication** — name: "Ransomware Readiness Quiz", category: SecurityApplication, free offer, Leonidas author
2. **FAQPage** — 5 Q&As matching the visible FAQ section (see below)
3. **BreadcrumbList** — Home → Resources → Ransomware Readiness Quiz

### FAQ Items (visible on page + schema)
1. Q: How does the Ransomware Readiness Quiz work? A: 10 multiple-choice questions across backup, access control, patching, and security training. Each answer is scored — results and gap recommendations appear instantly, no signup required.
2. Q: What score is considered safe? A: 80 or above indicates strong controls. 60–79 means meaningful gaps exist. Below 60 is high risk — ransomware operators actively target businesses with these profiles.
3. Q: What if I don't know the answer to a question? A: Pick the option that most honestly reflects your current state. "We'd figure it out" or partial answers are counted — they reveal real gaps that attackers exploit.
4. Q: How long does the quiz take? A: About 2 minutes. Ten questions, three choices each, instant results.
5. Q: What happens after I see my score? A: Review your category scores and specific gaps. Then book a free 30-minute assessment with Leonidas — we'll walk through your results and give you a prioritized action plan.

## Mobile Responsiveness

| Element | Mobile behavior |
|---------|----------------|
| Question cards | Full-width, stacked |
| A/B/C answer buttons | Full-width, min 48px height, stacked vertically |
| Progress bar | Full-width, always visible |
| Score ring | max-width: 220px, centered |
| Category bars | Full-width, label wraps |
| Per-question rows | Single column, gap text below answer |
| CTA card | flex-wrap, stacks vertically below 640px |

Breakpoint: `@media (max-width: 640px)` — matches rest of site.

## Security

- No user data sent to server — pure client-side scoring
- No `innerHTML` with dynamic content — all results built via DOM methods
- No external script dependencies beyond what is already on the page
- Follows existing CSP (`script-src 'self' 'unsafe-inline'` — inline JS is permitted)
- Answer buttons are `<button type="button">` — no form submission

## Service Page Teasers

Gold variant (to differentiate from green scorecard teasers). Label: "Free Risk Assessment". Copy: "How prepared is your business for a ransomware attack?" CTA button text: "Take the Quiz".

Added to:
- `services/cybersecurity.php` — below existing scorecard teaser
- `services/managed-it.php` — below existing scorecard teaser

## Sitemap Entry

```php
['loc'=>'/resources/ransomware-quiz', 'lastmod'=>'2026-04-06', 'changefreq'=>'monthly', 'priority'=>'0.7'],
```
