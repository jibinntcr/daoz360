import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');
const viewsDir = path.join(rootDir, 'resources/views');

function readBlade(relPath) {
  return fs.readFileSync(path.join(viewsDir, relPath), 'utf-8');
}

function renderStaticPage(pageName, routeMeta) {
  let layout = readBlade('layouts/app.blade.php');
  let header = readBlade('partials/header.blade.php');
  let footer = readBlade('partials/footer.blade.php');
  let contactModal = readBlade('partials/contact-modal.blade.php');
  let chatWidget = readBlade('partials/chat-widget.blade.php');
  let pageContent = readBlade(`${pageName}.blade.php`);

  // Extract @section('content') ... @endsection from pageContent
  const contentMatch = pageContent.match(/@section\('content'\)([\s\S]*?)@endsection/);
  const innerContent = contentMatch ? contentMatch[1].trim() : pageContent;

  const isLegalPage = pageName !== 'home';

  // Process header conditional for home vs subpages
  header = header.replace(/@php[\s\S]*?@endphp\s*/g, '');
  if (isLegalPage) {
    header = header.replace(/@if\(\$isLegalPage\)([\s\S]*?)@endif/g, '$1');
  } else {
    header = header.replace(/@if\(\$isLegalPage\)([\s\S]*?)@endif/g, '');
  }

  // Active classes in desktop nav & mobile drawer
  header = header.replace(/\{\{\s*!\$isLegalPage\s*\?\s*'is-active'\s*:\s*''\s*\}\}/g, !isLegalPage ? 'is-active' : '');
  header = header.replace(/\{\{\s*request\(\)->is\('pricing\*'\)\s*\?\s*'is-active'\s*:\s*''\s*\}\}/g, pageName === 'pricing' ? 'is-active' : '');
  header = header.replace(/\{\{\s*request\(\)->is\('privacy-policy\*'\)\s*\?\s*'is-active'\s*:\s*''\s*\}\}/g, pageName === 'privacy-policy' ? 'is-active' : '');
  header = header.replace(/\{\{\s*request\(\)->is\('terms-conditions\*'\)\s*\?\s*'is-active'\s*:\s*''\s*\}\}/g, pageName === 'terms-conditions' ? 'is-active' : '');
  header = header.replace(/\{\{\s*request\(\)->is\('contact\*'\)\s*\?\s*'is-active'\s*:\s*''\s*\}\}/g, pageName === 'contact' ? 'is-active' : '');

  // Assemble into layout
  let html = layout
    .replace("{{ str_replace('_', '-', app()->getLocale()) }}", 'en')
    .replace('{{ csrf_token() }}', '')
    .replace(/@yield\('title',\s*'[^']*'\)/g, routeMeta.title)
    .replace(/@yield\('description',\s*'[^']*'\)/g, routeMeta.description)
    .replace(/@yield\('canonical',\s*'[^']*'\)/g, routeMeta.url)
    .replace("      @include('partials.header')", header)
    .replace("        @yield('content')", innerContent)
    .replace("      @include('partials.footer')", footer)
    .replace("      @include('partials.chat-widget')", chatWidget)
    .replace("      @include('partials.contact-modal')", contactModal);

  // Replace Blade directives & helpers
  html = html
    .replace(/^\s*@csrf\s*$/gm, '')
    .replace(/@@/g, '@')
    .replace(/\{\{\s*date\('Y'\)\s*\}\}/g, String(new Date().getFullYear()))
    .replace(/\{\{\s*asset\('([^']+)'\)\s*\}\}/g, '/$1')
    .replace(/\{\{\s*url\('\/'\)\s*\}\}/g, '/')
    .replace(/\{\{\s*url\('([^']+)'\)\s*\}\}/g, '$1');

  return html;
}

const pages = [
  {
    name: 'home',
    outputs: ['index.html'],
    meta: {
      title: 'DAOZ360 | Social Media Management',
      description: 'Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.',
      url: 'https://daoz360.ai/'
    }
  },
  {
    name: 'pricing',
    outputs: ['pricing/index.html', 'pricing.html', 'public/pricing/index.html'],
    meta: {
      title: 'Pricing & Plans | DAOZ360',
      description: 'Explore DAOZ360 pricing plans for creators, growing marketing teams, and agencies. Start with the accounts you manage today and scale your social media workflow.',
      url: 'https://daoz360.ai/pricing/'
    }
  },
  {
    name: 'privacy-policy',
    outputs: ['privacy-policy/index.html', 'privacy-policy.html', 'public/privacy-policy/index.html'],
    meta: {
      title: 'Privacy Policy | DAOZ360',
      description: 'Read the official DAOZ360 Privacy Policy. Understand our data practices, safeguards, and compliance with applicable data protection laws.',
      url: 'https://daoz360.ai/privacy-policy/'
    }
  },
  {
    name: 'terms-conditions',
    outputs: ['terms-conditions/index.html', 'terms-conditions.html', 'public/terms-conditions/index.html'],
    meta: {
      title: 'Terms & Conditions | DAOZ360',
      description: 'Review the official terms and conditions for using the DAOZ360 social media management platform.',
      url: 'https://daoz360.ai/terms-conditions/'
    }
  },
  {
    name: 'contact',
    outputs: ['contact/index.html', 'contact.html', 'public/contact/index.html'],
    meta: {
      title: 'Contact Us | DAOZ360',
      description: 'Contact DAOZ360 for product enquiries, technical support, privacy questions, and billing assistance.',
      url: 'https://daoz360.ai/contact/'
    }
  },
  {
    name: 'errors/404',
    outputs: ['404.html', 'public/404.html'],
    meta: {
      title: 'Page Not Found | DAOZ360',
      description: 'The requested page could not be found on DAOZ360. Return to the homepage or contact our team.',
      url: 'https://daoz360.ai/'
    }
  }
];

pages.forEach((p) => {
  const html = renderStaticPage(p.name, p.meta);
  p.outputs.forEach((outRel) => {
    const outPath = path.join(rootDir, outRel);
    fs.mkdirSync(path.dirname(outPath), { recursive: true });
    fs.writeFileSync(outPath, html, 'utf-8');
    console.log(`Generated: ${outRel}`);
  });
});

// Sync public/css/style.css and public/js/app.js to root css/ and js/ as well
fs.mkdirSync(path.join(rootDir, 'css'), { recursive: true });
fs.copyFileSync(path.join(rootDir, 'public/css/style.css'), path.join(rootDir, 'css/style.css'));

fs.mkdirSync(path.join(rootDir, 'js'), { recursive: true });
fs.copyFileSync(path.join(rootDir, 'public/js/app.js'), path.join(rootDir, 'js/app.js'));

console.log('Static HTML/CSS/JS synchronization complete.');
