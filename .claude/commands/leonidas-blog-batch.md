# Leonidas Blog Batch

Generate 10 new SEO-optimized blog posts for the Leonidas website, append them to `data/blog.json`, generate images, and output the upload checklist.

## Trigger

User says "run a blog batch", "run another batch", "generate new posts", or invokes `/leonidas-blog-batch`.

---

## Step 1 — Read Existing State

Read `data/blog.json` and extract:
- All existing `slug` values → to prevent slug collisions
- All existing `title` values (lowercase) → to prevent topic repeats
- All existing `focus_keyword` values → to prevent keyword repeats

Read `tools/generate_images.py` to see the current batch count (for labeling the new batch).

---

## Step 2 — Select 10 Topics

Pick 10 topics that:
- Do NOT repeat any existing title, slug, or focus_keyword
- Target a specific **search query** someone would type into Google
- Are balanced across Leonidas's service lines — prioritize categories with fewer posts
- Mix ~7 research/practical posts and ~3 opinion/thought leadership posts

**Category coverage targets** (check current counts, fill gaps first):

| Category | Topics to prioritize |
|---|---|
| Cybersecurity | Compliance specifics, threat types, tool comparisons, incident response |
| Networking | Switch selection, VLAN, Wi-Fi design, WAN redundancy, cabling |
| VoIP | Platform comparisons, migration guides, contact center, POTS sunset |
| Telecom | Carrier selection, expense management, bandwidth planning |
| Managed IT | MSP evaluation, SLA standards, IT budgeting, onboarding/offboarding |
| Industry Trends | AI in IT, compliance changes, hybrid work, emerging tech |
| Leonidas | Local Panhandle angles, company perspective, case study style |

---

## Step 3 — Assign Dates

All 10 posts in a batch get **today's actual date** (the date the batch is run). Use `datetime.date.today().isoformat()` in the append script — do NOT use the latest existing date or any artificial future/past dates.

---

## Step 4 — Write Each Post

For each post, produce a complete JSON object:

```json
{
  "title": "...",
  "category": "...",
  "slug": "...",
  "date": "YYYY-MM-DD",
  "focus_keyword": "...",
  "tags": ["...", "...", "...", "...", "..."],
  "excerpt": "150-160 char meta description including focus_keyword",
  "image": "assets/images/blog/{slug}.jpg",
  "sources": [],
  "body": "...full HTML..."
}
```

### Body Content Standards

**Structure:**
- Opening `<p>`: bold post title + em dash + intro sentence. Must include `focus_keyword` in first 100 words.
- 4–5 `<h2>` sections — written as questions or direct answers people search for
- Minimum one `<ul>` or `<ol>` list — the kind a reader would bookmark or print
- One `<img>` tag placed inline where it fits the narrative best (not always at top)
- Leonidas CTA callout `<div>` at the very end (copy style from existing posts)
- 800–1,200 words of genuinely useful content

**Image tag format:**
```html
<img src="/assets/images/blog/{slug}.jpg" alt="Descriptive alt text" style="width:100%;border-radius:0.75rem;margin:2rem 0;display:block;">
```

**Internal links:** Include 1–2 natural links to Leonidas pages:
- `/contact.php` — for assessment CTAs
- `/services/managed-it.php`, `/services/cybersecurity.php`, `/services/network-engineering.php`, `/services/unified-communications.php`, `/services/telecom-wan.php`
- `/industries/healthcare.php`, `/industries/legal.php`, `/industries/construction.php`, `/industries/government-contractors.php`, `/industries/hospitality.php`, `/industries/professional-services.php`

**Link style:** `style="color:#D4A843;font-weight:600;text-decoration:none;"`

**Leonidas CTA callout (always at end):**
```html
<div style="background:rgba(212,168,67,0.06);border:1px solid rgba(212,168,67,0.2);border-radius:0.75rem;padding:1.25rem 1.5rem;margin-top:2rem;">
  <div style="font-size:0.75rem;font-weight:700;letter-spacing:0.15em;color:#D4A843;text-transform:uppercase;margin-bottom:0.5rem;">About Leonidas</div>
  <p style="margin:0;font-size:0.9rem;color:#9CA3AF;">Leonidas is a managed IT services provider, MSSP, and unified communications consultancy based in Panama City Beach, FL, serving the Florida Panhandle. We offer free 30-minute assessments. <a href="/contact.php" style="color:#D4A843;font-weight:600;text-decoration:none;">Contact us</a> or call <a href="tel:8506149343" style="color:#D4A843;font-weight:600;text-decoration:none;">850-614-9343</a>.</p>
</div>
```

### SEO Rules

- Title contains or directly answers `focus_keyword`
- `focus_keyword` appears naturally in first paragraph, at least one `<h2>`, and 2–3× in body
- Excerpt is exactly 150–160 characters, includes `focus_keyword`, written to earn the click
- Tags: 3–5 secondary keyword phrases (no duplication of focus_keyword)
- No keyword stuffing — reads like a subject-matter expert wrote it
- At least one section that answers a "People Also Ask" style question

### Sources Rules

- **Opinion/thought leadership posts:** omit `sources` field entirely (no empty array)
- **Research/practical posts:** include `sources` only when the post makes specific claims needing backing
- 2–3 max, industry-trusted only: CISA, NIST, FBI IC3, IBM DBIR, Verizon DBIR, FCC, AICPA, DoD/CMMC, HIPAA.gov
- Purpose: reinforce the narrative, not pad a bibliography

---

## Step 5 — Append to blog.json

Write a Python script and run it to:
1. Load existing `data/blog.json`
2. Validate no slug collisions
3. Append the 10 new post objects
4. Write back to `data/blog.json`
5. Print confirmation with post count and titles

---

## Step 6 — Generate Images

Update the `IMAGES` list in `tools/generate_images.py`:
- Add a new batch comment block (e.g., `# ── Batch 2 ──`)
- Add 10 new `{filename, prompt}` entries
- Prompts: subject and composition only — the script appends the dark/gold style automatically
- Do NOT repeat prompt style words (photorealistic, dark, gold, etc.) — the script handles this

Then run:
```bash
python3 tools/generate_images.py
```

Confirm all 10 images generated successfully.

---

## Step 7 — Commit

Stage and commit:
```
git add data/blog.json tools/generate_images.py assets/images/blog/
git commit -m "feat: blog batch N — 10 new posts ([date range])"
git push origin main
```

---

## Step 8 — Output Upload Checklist

Always end with this exact format:

```
═══════════════════════════════════════════
UPLOAD CHECKLIST — Batch [N] ([date])
═══════════════════════════════════════════
Upload these files to GoDaddy public_html/:

  data/blog.json
  assets/images/blog/[slug-1].jpg
  assets/images/blog/[slug-2].jpg
  ... (all 10 images)

NOTE: blog/post.php only needs uploading
if it changed (first batch only).
═══════════════════════════════════════════

NEW POSTS SUMMARY:
  1. [Category] Title
  2. [Category] Title
  ... (all 10)
```

---

## Important Rules

- **Never skip Step 8** — the upload checklist is why the user runs this skill
- **Never repeat a topic** — always read existing posts first
- **Never generate fewer than 10 posts** — the batch size is always 10
- **Always run the image generator** — every batch includes images
- **Always commit and push** — so the user can download from GitHub if needed
