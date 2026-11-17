<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Primary SEO Meta Tags -->
    <title>@yield('title', 'DAOZ360 | Social Media Management')</title>
    <meta name="title" content="@yield('title', 'DAOZ360 | Social Media Management')" />
    <meta
      name="description"
      content="@yield('description', 'Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.')"
    />
    <meta
      name="keywords"
      content="social media management, social media scheduler, content calendar, social analytics, multi-platform publishing, DAOZ360"
    />
    <meta name="author" content="DAOZ360 / Digital PRIZM PTE LTD" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="@yield('canonical', 'https://daoz360.ai/')" />

    <!-- Web App & Mobile Appearance -->
    <meta name="theme-color" content="#FF5A00" />
    <meta name="application-name" content="DAOZ360" />
    <meta name="apple-mobile-web-app-title" content="DAOZ360" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="msapplication-TileColor" content="#FF5A00" />
    <meta name="msapplication-config" content="{{ asset('browserconfig.xml') }}" />

    <!-- Icons & Manifest -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="DAOZ360" />
    <meta property="og:url" content="@yield('canonical', 'https://daoz360.ai/')" />
    <meta property="og:title" content="@yield('title', 'DAOZ360 | Social Media Management')" />
    <meta
      property="og:description"
      content="@yield('description', 'Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.')"
    />
    <meta property="og:image" content="https://daoz360.ai/assets/og-preview.png" />
    <meta property="og:image:secure_url" content="https://daoz360.ai/assets/og-preview.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="DAOZ360 - Social Media Management" />
    <meta property="og:locale" content="en_US" />

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="@yield('canonical', 'https://daoz360.ai/')" />
    <meta name="twitter:title" content="@yield('title', 'DAOZ360 | Social Media Management')" />
    <meta
      name="twitter:description"
      content="@yield('description', 'Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.')"
    />
    <meta name="twitter:image" content="https://daoz360.ai/assets/og-preview.png" />
    <meta name="twitter:image:alt" content="DAOZ360 - Social Media Management" />

    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- Unified DAOZ360 Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Structured Data (Schema.org JSON-LD — No invented ratings or pricing schema per Section 8.10) -->
    <script type="application/ld+json">
      {
        "@@context": "https://schema.org",
        "@@graph": [
          {
            "@@type": "Organization",
            "@@id": "https://daoz360.ai/#organization",
            "name": "DAOZ360",
            "url": "https://daoz360.ai/",
            "logo": {
              "@@type": "ImageObject",
              "url": "https://daoz360.ai/favicon.png"
            },
            "email": "mail@daoz360.ai",
            "address": {
              "@@type": "PostalAddress",
              "streetAddress": "60 Paya Lebar Road, #04-23, Paya Lebar Square",
              "postalCode": "409051",
              "addressCountry": "SG"
            }
          },
          {
            "@@type": "WebSite",
            "@@id": "https://daoz360.ai/#website",
            "url": "https://daoz360.ai/",
            "name": "DAOZ360",
            "description": "Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.",
            "publisher": {
              "@@id": "https://daoz360.ai/#organization"
            }
          },
          {
            "@@type": "WebApplication",
            "@@id": "https://daoz360.ai/#webapp",
            "name": "DAOZ360",
            "url": "https://daoz360.ai/",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "All",
            "description": "Social media management tool for planning, scheduling, team collaboration, and performance insights."
          }
        ]
      }
    </script>
  </head>
  <body>
    <canvas id="daoz-particles-canvas" class="daoz-particles-canvas" aria-hidden="true"></canvas>
    <div class="site-wrapper">
      @include('partials.header')

      <main id="main-content">
        @yield('content')
      </main>

      @include('partials.footer')
      @include('partials.chat-widget')
      @include('partials.contact-modal')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
