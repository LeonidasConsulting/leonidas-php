#!/usr/bin/env python3
"""
Leonidas Blog Image Generator — Imagen 4 via Google AI
Usage: python3 tools/generate_images.py [--key YOUR_API_KEY] [--batch BATCH_FILE]

Reads a JSON batch definition and generates images to assets/images/blog/.
If no batch file is given, uses the built-in IMAGES list below.
"""

import argparse
import base64
import json
import os
import sys
import time
import urllib.error
import urllib.request

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
OUT_DIR = os.path.join(ROOT, 'assets', 'images', 'blog')
API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/imagen-4.0-generate-001:predict?key={key}'

STYLE = (
    'photorealistic, dark background, deep charcoal and navy tones, '
    'gold accent lighting, professional business aesthetic, no text overlaid, '
    '16:9 widescreen, sharp focus, cinematic lighting'
)


def generate_image(api_key: str, prompt: str, filename: str) -> bool:
    full_prompt = f'{prompt}, {STYLE}'
    url = API_URL.format(key=api_key)
    payload = json.dumps({
        'instances': [{'prompt': full_prompt}],
        'parameters': {'sampleCount': 1, 'aspectRatio': '16:9'}
    }).encode()

    req = urllib.request.Request(
        url, data=payload,
        headers={'Content-Type': 'application/json'}
    )

    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            data = json.loads(r.read())
    except urllib.error.HTTPError as e:
        print(f'  ERROR {e.code}: {e.read().decode()[:200]}')
        return False
    except Exception as e:
        print(f'  ERROR: {e}')
        return False

    predictions = data.get('predictions', [])
    if not predictions or not predictions[0].get('bytesBase64Encoded'):
        print(f'  ERROR: No image in response — {json.dumps(data)[:200]}')
        return False

    img_bytes = base64.b64decode(predictions[0]['bytesBase64Encoded'])
    out_path = os.path.join(OUT_DIR, filename)
    with open(out_path, 'wb') as f:
        f.write(img_bytes)

    kb = len(img_bytes) // 1024
    print(f'  OK  {filename} ({kb} KB)')
    return True


def main():
    parser = argparse.ArgumentParser()
    parser.add_argument('--key', help='Google AI API key (or set GOOGLE_AI_KEY env var)')
    parser.add_argument('--batch', help='JSON file with [{filename, prompt}] entries')
    args = parser.parse_args()

    api_key = args.key or os.environ.get('GOOGLE_AI_KEY', '')
    if not api_key:
        # Try reading from local config file
        config_path = os.path.join(ROOT, '.google_ai_key')
        if os.path.exists(config_path):
            with open(config_path) as f:
                api_key = f.read().strip()

    if not api_key:
        print('ERROR: No API key. Pass --key KEY, set GOOGLE_AI_KEY env var, or create .google_ai_key file.')
        sys.exit(1)

    if args.batch:
        with open(args.batch) as f:
            images = json.load(f)
    else:
        images = IMAGES  # built-in batch

    os.makedirs(OUT_DIR, exist_ok=True)

    print(f'Generating {len(images)} images to {OUT_DIR}')
    print()

    success = 0
    for i, item in enumerate(images, 1):
        filename = item['filename']
        prompt = item['prompt']
        out_path = os.path.join(OUT_DIR, filename)

        if os.path.exists(out_path):
            print(f'  SKIP {filename} (already exists)')
            success += 1
            continue

        print(f'[{i}/{len(images)}] {filename}')
        ok = generate_image(api_key, prompt, filename)
        if ok:
            success += 1
        # Respect rate limits — Imagen 4 allows ~2 requests/sec on paid tier
        if i < len(images):
            time.sleep(1.5)

    print()
    print(f'Done: {success}/{len(images)} images generated.')
    if success < len(images):
        print('Re-run the script to retry failed images (existing files are skipped).')


# ── Batch 1: 2026-04-02 ───────────────────────────────────────────────────────
IMAGES = [
    {
        'filename': 'how-to-read-telecom-invoice.jpg',
        'prompt': (
            'Business owner at a dark executive desk reviewing a printed invoice with '
            'specific line items highlighted, close-up hands and document, dramatic '
            'side lighting, deep charcoal environment'
        ),
    },
    {
        'filename': 'ethernet-copper-vs-fiber-business.jpg',
        'prompt': (
            'Split-scene inside a modern data center showing copper network cabling '
            'on one side and glowing fiber optic strands on the other, server racks '
            'in background, deep navy and charcoal tones, gold accent light'
        ),
    },
    {
        'filename': 'microsoft-copilot-business-it-teams.jpg',
        'prompt': (
            'IT professional at a dual-monitor workstation with an AI assistant '
            'interface glowing on screen, productivity dashboard and code visible, '
            'dark modern office, subtle blue and gold ambient lighting'
        ),
    },
    {
        'filename': 'ai-powered-phishing-language-models.jpg',
        'prompt': (
            'Dark digital landscape with a stylized email interface showing an '
            'AI-generated phishing message, red warning indicators overlaid, '
            'neural network pattern in background, dark charcoal with red and gold accents'
        ),
    },
    {
        'filename': 'hurricane-season-it-preparedness-florida.jpg',
        'prompt': (
            'Florida Gulf Coast coastline with dramatic storm clouds on the horizon, '
            'modern office building in foreground with glowing server room visible '
            'through window, dark teal sky, gold and white interior lighting'
        ),
    },
    {
        'filename': 'call-recording-laws-business.jpg',
        'prompt': (
            'Modern cloud phone system with recording indicator light active, legal '
            'document partially visible in background, professional dark office setting, '
            'gold UI accent on phone interface, no readable text'
        ),
    },
    {
        'filename': 'it-documentation-small-business.jpg',
        'prompt': (
            'Organized IT documentation binders on a dark executive desk beside a '
            'laptop displaying clean network diagrams, warm gold desk lamp, '
            'professional dark office environment, no readable text'
        ),
    },
    {
        'filename': 'co-managed-it-services.jpg',
        'prompt': (
            'Two IT professionals — one in business attire, one in a company polo — '
            'collaborating at a shared workstation reviewing network architecture '
            'diagrams, modern dark office, gold accent lighting, teamwork atmosphere'
        ),
    },
    {
        'filename': 'power-over-ethernet-poe-guide.jpg',
        'prompt': (
            'Clean enterprise network switch in a server rack with green PoE indicator '
            'lights active, single Ethernet cable running to a ceiling-mounted wireless '
            'access point, dark server room, gold and green accent lighting'
        ),
    },
    {
        'filename': 'what-is-soc2-report-business.jpg',
        'prompt': (
            'Professional at a modern dark office desk reviewing compliance audit '
            'documentation, security dashboard visible on monitor in background, '
            'framed certificates on wall, gold and white lighting, no readable text'
        ),
    },
]


if __name__ == '__main__':
    main()
