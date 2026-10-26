import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const distDir = path.resolve(__dirname, '../dist');
const indexPath = path.join(distDir, 'index.html');

if (!fs.existsSync(indexPath)) {
  console.error('dist/index.html not found');
  process.exit(1);
}

const baseHtml = fs.readFileSync(indexPath, 'utf-8');

const routeMeta = {
  'privacy-policy': {
    title: 'Privacy Policy | DAOZ360',
    description: 'Read the official DAOZ360 Privacy Policy. Understand our data practices, safeguards, and compliance with applicable data protection laws.',
    url: 'https://daoz360.ai/privacy-policy/'
  },
  'terms-conditions': {
    title: 'Terms & Conditions | DAOZ360',
    description: 'Review the official terms and conditions for using the DAOZ360 social media management platform.',
    url: 'https://daoz360.ai/terms-conditions/'
  },
  'contact': {
    title: 'Contact Us | DAOZ360',
    description: 'Contact DAOZ360 for product enquiries, technical support, privacy questions, and billing assistance.',
    url: 'https://daoz360.ai/contact/'
  }
};

Object.entries(routeMeta).forEach(([route, meta]) => {
  const dir = path.join(distDir, route);
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }

  let routeHtml = baseHtml;

  // Replace Title
  routeHtml = routeHtml.replace(
    /<title>.*?<\/title>/i,
    `<title>${meta.title}</title>`
  );

  // Replace Name Meta Title
  routeHtml = routeHtml.replace(
    /<meta\s+name="title"\s+content=".*?"\s*\/?>/i,
    `<meta name="title" content="${meta.title}" />`
  );

  // Replace Canonical Link
  routeHtml = routeHtml.replace(
    /<link\s+rel="canonical"\s+href=".*?"\s*\/?>/i,
    `<link rel="canonical" href="${meta.url}" />`
  );

  // Replace Description
  routeHtml = routeHtml.replace(
    /<meta\s+name="description"\s+content=".*?"\s*\/?>/i,
    `<meta name="description" content="${meta.description}" />`
  );

  // Replace Open Graph Tags
  routeHtml = routeHtml.replace(
    /<meta\s+property="og:title"\s+content=".*?"\s*\/?>/i,
    `<meta property="og:title" content="${meta.title}" />`
  );
  routeHtml = routeHtml.replace(
    /<meta\s+property="og:url"\s+content=".*?"\s*\/?>/i,
    `<meta property="og:url" content="${meta.url}" />`
  );
  routeHtml = routeHtml.replace(
    /<meta\s+property="og:description"\s+content=".*?"\s*\/?>/i,
    `<meta property="og:description" content="${meta.description}" />`
  );

  // Replace Twitter Tags
  routeHtml = routeHtml.replace(
    /<meta\s+name="twitter:title"\s+content=".*?"\s*\/?>/i,
    `<meta name="twitter:title" content="${meta.title}" />`
  );
  routeHtml = routeHtml.replace(
    /<meta\s+name="twitter:url"\s+content=".*?"\s*\/?>/i,
    `<meta name="twitter:url" content="${meta.url}" />`
  );
  routeHtml = routeHtml.replace(
    /<meta\s+name="twitter:description"\s+content=".*?"\s*\/?>/i,
    `<meta name="twitter:description" content="${meta.description}" />`
  );

  fs.writeFileSync(path.join(dir, 'index.html'), routeHtml);
  console.log(`Generated static fallback with route metadata: dist/${route}/index.html`);
});

// Also copy meta files if not in dist
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
  'og-image.png'
];

metaFiles.forEach((file) => {
  const src = path.join(__dirname, '../public', file);
  const dest = path.join(distDir, file);
  if (fs.existsSync(src)) {
    fs.copyFileSync(src, dest);
  }
});

// Copy .well-known
const wellKnownSrc = path.join(__dirname, '../public/.well-known');
const wellKnownDest = path.join(distDir, '.well-known');
if (fs.existsSync(wellKnownSrc)) {
  fs.mkdirSync(wellKnownDest, { recursive: true });
  fs.copyFileSync(
    path.join(wellKnownSrc, 'security.txt'),
    path.join(wellKnownDest, 'security.txt')
  );
}

console.log('Postbuild meta verification completed successfully.');
