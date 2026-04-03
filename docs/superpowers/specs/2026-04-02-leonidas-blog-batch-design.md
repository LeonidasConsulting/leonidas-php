# Leonidas Blog Batch Skill — Design Spec
**Date:** 2026-04-02
**Status:** Approved

---

## Goal

Build a Claude Code skill (`leonidas-blog-batch`) that generates 10 new, unique, SEO-optimized blog posts per run, appends them to `data/blog.json`, and outputs an image generation checklist. Each batch produces genuinely useful, search-intent-driven content that drives organic traffic to the Leonidas website and positions the company as an expert resource — converting readers into service inquiries.

---

## Trigger

User invokes `/leonidas-blog-batch` or asks Claude to "run a blog batch."

---

## What the Skill Does (Step by Step)

1. **Read** `data/blog.json` — extract all existing `title`, `slug`, and `focus_keyword` values to prevent any topic or slug repeats
2. **Select 10 topics** — balanced across Leonidas's service lines, each targeting a specific search query a real customer or researcher would type into Google
3. **Write each post** — full article body (HTML), SEO fields, optional sources, image placement
4. **Append** the 10 new post objects to `data/blog.json`
5. **Apply one-line fix** to `blog/post.php` — render body as raw HTML (if not already done)
6. **Invoke `frontend-design` skill** — design the featured image inline component and the sources block component to match the site's dark gold-accent aesthetic
7. **Output image generation checklist** — 10 entries, each with filename and a detailed AI image generation prompt
8. **Output upload checklist** — list every file that changed and needs to be uploaded to GoDaddy

---

## Post Data Structure

Each new post entry in `data/blog.json`:

```json
{
  "title": "CMMC 2.0 Compliance: What Defense Contractors in the Florida Panhandle Need to Know",
  "category": "Cybersecurity",
  "slug": "cmmc-2-compliance-defense-contractors",
  "date": "2026-04-09",
  "focus_keyword": "CMMC 2.0 compliance requirements",
  "tags": ["CMMC", "defense contractor IT", "NIST 800-171", "cybersecurity compliance", "DoD supplier requirements"],
  "excerpt": "CMMC 2.0 is now a contract requirement for DoD suppliers. Here's what Florida Panhandle defense contractors need to do before their next renewal.",
  "image": "assets/images/blog/cmmc-compliance-defense-contractors.jpg",
  "sources": [
    { "label": "CMMC Program Overview — acq.osd.mil", "url": "https://www.acq.osd.mil/cmmc/" },
    { "label": "NIST SP 800-171 Rev 2 — csrc.nist.gov", "url": "https://csrc.nist.gov/publications/detail/sp/800-171/rev-2/final" }
  ],
  "body": "<p>...</p><h2>...</h2>..."
}
```

### Field Rules

| Field | Required | Notes |
|---|---|---|
| `title` | Yes | Search-intent optimized, includes primary keyword |
| `category` | Yes | Cybersecurity / Networking / VoIP / Telecom / Managed IT / Industry Trends / Leonidas |
| `slug` | Yes | Unique, kebab-case, derived from title |
| `date` | Yes | Sequential weekly dates starting from latest existing post + 7 days |
| `focus_keyword` | Yes | Primary search term this post targets |
| `tags` | Yes | 3–5 secondary keyword phrases |
| `excerpt` | Yes | 150–160 chars, includes `focus_keyword`, compelling click reason |
| `image` | Yes | `assets/images/blog/{slug}.jpg` — positioned inline in body where it fits best |
| `sources` | No | Only when post makes claims requiring backing evidence |
| `body` | Yes | HTML, 800–1,200 words |

---

## Body Content Standards

### Structure
- Opening paragraph: sets context, includes `focus_keyword` in first 100 words
- 4–5 `<h2>` sections — written as questions or direct answers people search for
- Minimum one `<ul>` or `<ol>` list per post — the kind a reader would bookmark
- 1 image (`<img>`) placed inline where it best supports the narrative — not always at top
- Leonidas CTA callout at the end (matches existing `generateBody()` style)
- Sources block at the very end, only when needed

### SEO Rules
- Title contains or directly answers the `focus_keyword`
- `focus_keyword` used naturally in first paragraph, in at least one `<h2>`, and 2–3 times in body
- No keyword stuffing — reads like a human expert wrote it
- Each post answers at least one "People Also Ask" style question
- 1–2 internal links per post to relevant Leonidas pages (service pages, industry pages, contact)

### Post Mix Per Batch
- ~7 research/practical posts — make specific claims, may include sources
- ~3 opinion/thought leadership posts — Leonidas perspective, no sources required

### Sources Rules (when used)
- 2–3 max per post
- Industry-trusted only: CISA, NIST, IBM DBIR, Verizon DBIR, FCC, DoD/CMMC, HIPAA.gov, vendor whitepapers from major manufacturers
- Purpose: reinforce specific claims in the narrative, not bibliography padding
- Rendered as a small tasteful block at the very bottom of the post
- Posts that don't need sources omit the `sources` field entirely — no empty arrays

---

## post.php Changes

Three additions, all conditional (posts without new fields display exactly as before):

### 1. Raw HTML body render (one-line fix)
```php
// Before:
<?= nl2br(htmlspecialchars($post['body'])) ?>
// After:
<?= $post['body'] ?>
```

### 2. Inline image support
Images are placed directly inside `$post['body']` HTML at the appropriate point. No separate image block needed in the template — the body handles placement.

The image tag style (used inline within body):
```html
<img src="/assets/images/blog/filename.jpg" alt="Descriptive alt text" 
     style="[designed by frontend-design skill to match site aesthetic]">
```

### 3. Sources block (conditional)
Rendered after article body, before prev/next navigation. Only appears when `$post['sources']` is present and non-empty. Designed by `frontend-design` skill to match dark gold-accent site theme — small, subtle, not distracting from the article.

---

## Image Generation Checklist Output

At the end of each batch run, the skill outputs:

```
IMAGE GENERATION CHECKLIST — Batch [date]
==========================================
Save all images to: assets/images/blog/

1. filename: cmmc-compliance-defense-contractors.jpg
   prompt: Dark professional tech environment, government building silhouette overlaid 
   with glowing cybersecurity compliance checklist interface, deep navy and charcoal 
   tones, gold accent highlights, clean modern aesthetic, no text, 16:9, photorealistic

2. ...
```

Images are:
- **Original AI-generated** — not stock photos, not copyrighted work
- Prompts written for a dark, professional aesthetic matching the site
- 16:9 ratio, photorealistic or clean digital art style
- No text overlaid (handled by the site's HTML)
- Compatible with Midjourney, DALL-E, Adobe Firefly, or similar tools

---

## Upload Checklist Output

```
UPLOAD CHECKLIST — Batch [date]
================================
Upload these files to GoDaddy:

1. data/blog.json          (updated — 10 new posts appended)
2. blog/post.php           (updated — raw HTML body render + sources block)
3. assets/images/blog/     (10 new images — generate first, then upload)
```

---

## Category Coverage — Topics to Prioritize

The skill should ensure no category is over-represented and cover gaps in these areas:

| Category | Target Topics |
|---|---|
| Cybersecurity | Compliance (CMMC, HIPAA, SOC2), threat types, tools comparison, incident response |
| Networking | SD-WAN, VLAN, switching, Wi-Fi design, WAN redundancy |
| VoIP | UCaaS comparisons, migration guides, contact center, POTS sunset |
| Telecom | Carrier selection, expense management, fiber vs fixed wireless |
| Managed IT | MSP selection, SLA standards, IT budgeting, help desk, onboarding/offboarding |
| Industry Trends | AI in IT, Microsoft Copilot, hybrid work, compliance changes |
| Leonidas | Case studies, service explanations, local Panhandle angles |

---

## Project TODO

> **Upload automation skill** — Build a skill that automates uploading changed files (blog.json + new images) directly to GoDaddy, eliminating the manual FTP/file manager step after each batch run.

---

## Files Changed Per Run

| File | Change |
|---|---|
| `data/blog.json` | 10 new posts appended |
| `blog/post.php` | Raw HTML render + sources block (first run only) |
| `assets/images/blog/*.jpg` | 10 new images (user-generated, then uploaded) |
