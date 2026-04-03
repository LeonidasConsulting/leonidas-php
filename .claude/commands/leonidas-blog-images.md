# Leonidas Blog Image Generator

Generate original AI images for Leonidas blog post batches using Imagen 4 (Google AI).

## Trigger

User says "generate images", "run image batch", or you are running `leonidas-blog-batch` and need images.

## What This Skill Does

1. Reads the current batch's image list from `tools/generate_images.py` (the `IMAGES` list)
2. Runs the script to generate all images to `assets/images/blog/`
3. Reports which images were created and their file sizes
4. Already-existing images are skipped automatically (safe to re-run)

## API Key Setup

The script reads the key from (in order):
1. `--key` argument
2. `GOOGLE_AI_KEY` environment variable
3. `.google_ai_key` file in the project root (gitignored)

The `.google_ai_key` file is the standard for this project.

## Running a Batch

```bash
cd /path/to/leonidas-php
python3 tools/generate_images.py
```

To use a custom batch JSON file:
```bash
python3 tools/generate_images.py --batch path/to/images.json
```

Batch JSON format:
```json
[
  {
    "filename": "my-post-image.jpg",
    "prompt": "Subject description — do NOT include style, the script appends the site style automatically"
  }
]
```

## Style Applied to All Images

The script automatically appends this to every prompt:
> photorealistic, dark background, deep charcoal and navy tones, gold accent lighting, professional business aesthetic, no text overlaid, 16:9 widescreen, sharp focus, cinematic lighting

Do NOT repeat these style words in prompts — keep prompts focused on subject and composition only.

## Writing Good Prompts

- Lead with the subject and setting
- Describe lighting and atmosphere only if it differs from the standard style
- No text in images (handled by HTML)
- 16:9 ratio is set automatically via the API

**Good prompt:** `"Two IT professionals collaborating at a shared workstation reviewing network diagrams, modern dark office"`

**Bad prompt:** `"A photorealistic dark 16:9 image of two professional IT people working together on computers in a dark office with gold lighting and no text visible"`

## After Generation

Images land in `assets/images/blog/`. Add them to the GoDaddy upload checklist along with `data/blog.json` and any changed PHP files.

## Cost

Imagen 4 via Google AI: ~$0.03–0.04 per image. 10 images per batch ≈ $0.35.

## Updating the IMAGES List for a New Batch

When running `leonidas-blog-batch`, update the `IMAGES` list in `tools/generate_images.py` with the new batch before running. The list is at the bottom of the file under `# ── Batch N ──`.

Add the new entries and update the batch label comment. Previous batches' entries can be left in place — the script skips files that already exist.
