/**
 * compress-images.mjs
 * Generates compressed WebP versions of all static images in public/images/
 * Run once with: node scripts/compress-images.mjs
 */

import sharp from 'sharp';
import { readdir, stat } from 'fs/promises';
import { extname, basename, join, dirname } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const INPUT_DIR  = join(__dirname, '..', 'public', 'images');
const OUTPUT_DIR = join(__dirname, '..', 'public', 'images'); // overwrite in-place as .webp

// Per-image config: maxWidth, quality
const CONFIG = {
  'HomePageBackground.jpg': { maxWidth: 1920, quality: 75 },
  'HomePage_LR.jpg':        { maxWidth: 1200, quality: 75 },
  // Facility card images (displayed at ~800×160 in cards, ~1400px in slider)
  'tennis.jpg':             { maxWidth: 1400, quality: 76 },
  'pool.jpg':               { maxWidth: 1400, quality: 76 },
  'fitness.jpg':            { maxWidth: 1400, quality: 75 },
  'ev.jpg':                 { maxWidth: 1400, quality: 76 },
  'playground.jpg':         { maxWidth: 1400, quality: 75 },
  'restraurant.jpg':        { maxWidth: 1400, quality: 76 },
  'track.jpg':              { maxWidth: 1400, quality: 75 },
  'function.jpg':           { maxWidth: 1400, quality: 76 },
  'receptionist.jpg':       { maxWidth: 1400, quality: 76 },
};

const SKIP = ['.webp', '.svg'];

async function formatBytes(bytes) {
  return (bytes / 1024).toFixed(1) + ' KB';
}

async function compress() {
  const files = await readdir(INPUT_DIR);

  for (const file of files) {
    const ext = extname(file).toLowerCase();
    if (SKIP.includes(ext)) continue;
    if (ext === '.png' && file === 'logo.png') {
      // Compress PNG logo separately as webp
      const src  = join(INPUT_DIR, file);
      const dest = join(OUTPUT_DIR, basename(file, ext) + '.webp');
      const before = (await stat(src)).size;
      await sharp(src).webp({ quality: 85 }).toFile(dest);
      const after = (await stat(dest)).size;
      console.log(`✓ ${file} → logo.webp  (${await formatBytes(before)} → ${await formatBytes(after)})`);
      continue;
    }
    if (!['.jpg', '.jpeg', '.png'].includes(ext)) continue;

    const cfg = CONFIG[file] ?? { maxWidth: 1400, quality: 76 };
    const src  = join(INPUT_DIR, file);
    const dest = join(OUTPUT_DIR, basename(file, ext) + '.webp');

    const before = (await stat(src)).size;
    try {
      await sharp(src)
        .resize({ width: cfg.maxWidth, withoutEnlargement: true })
        .webp({ quality: cfg.quality })
        .toFile(dest);
      const after = (await stat(dest)).size;
      const saved = (((before - after) / before) * 100).toFixed(0);
      console.log(`✓ ${file.padEnd(26)} → ${basename(dest).padEnd(26)} (${await formatBytes(before)} → ${await formatBytes(after)}, -${saved}%)`);
    } catch (err) {
      console.error(`✗ ${file}: ${err.message}`);
    }
  }
}

compress().then(() => console.log('\nDone!')).catch(console.error);
