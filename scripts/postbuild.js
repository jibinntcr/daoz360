import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const rootDir = path.resolve(__dirname, '..');
const distDir = path.resolve(__dirname, '../dist');

if (!fs.existsSync(distDir)) {
  fs.mkdirSync(distDir, { recursive: true });
}

// Copy static HTML pages, CSS, JS, and meta assets into dist/
const pagesToCopy = [
  ['index.html', 'index.html'],
  ['pricing/index.html', 'pricing/index.html'],
  ['pricing.html', 'pricing.html'],
  ['privacy-policy/index.html', 'privacy-policy/index.html'],
  ['privacy-policy.html', 'privacy-policy.html'],
  ['terms-conditions/index.html', 'terms-conditions/index.html'],
  ['terms-conditions.html', 'terms-conditions.html'],
  ['contact/index.html', 'contact/index.html'],
  ['contact.html', 'contact.html'],
  ['404.html', '404.html'],
  ['public/css/style.css', 'css/style.css'],
  ['public/js/app.js', 'js/app.js']
];

pagesToCopy.forEach(([srcRel, destRel]) => {
  const src = path.join(rootDir, srcRel);
  const dest = path.join(distDir, destRel);
  if (fs.existsSync(src)) {
    fs.mkdirSync(path.dirname(dest), { recursive: true });
    fs.copyFileSync(src, dest);
  }
});

// Copy public/assets directory into dist/assets and public/index.html
const assetsSrc = path.join(rootDir, 'public/assets');
const assetsDest = path.join(distDir, 'assets');
if (fs.existsSync(assetsSrc)) {
  fs.mkdirSync(assetsDest, { recursive: true });
  fs.readdirSync(assetsSrc).forEach((file) => {
    const s = path.join(assetsSrc, file);
    const d = path.join(assetsDest, file);
    if (fs.statSync(s).isFile()) {
      fs.copyFileSync(s, d);
    }
  });
}

// Copy meta files into dist
const metaFiles = [
  '_redirects',
  'robots.txt',
  'sitemap.xml',
  'site.webmanifest',
  'manifest.json',
  'browserconfig.xml',
  'apple-touch-icon.png',
  'icon-192.png',
  'icon-512.png',
  'og-image.png',
  'favicon.png'
];

metaFiles.forEach((file) => {
  const src = path.join(rootDir, 'public', file);
  const dest = path.join(distDir, file);
  if (fs.existsSync(src)) {
    fs.copyFileSync(src, dest);
  }
});

// Copy .well-known
const wellKnownSrc = path.join(rootDir, 'public/.well-known');
const wellKnownDest = path.join(distDir, '.well-known');
if (fs.existsSync(wellKnownSrc)) {
  fs.mkdirSync(wellKnownDest, { recursive: true });
  fs.copyFileSync(
    path.join(wellKnownSrc, 'security.txt'),
    path.join(wellKnownDest, 'security.txt')
  );
}

console.log('Postbuild static HTML/CSS/JS bundle completed in dist/.');
