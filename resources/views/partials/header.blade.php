@php
  $isLegalPage = !request()->routeIs('home') && request()->path() !== '/';
@endphp
<header class="site-header">
  <div class="container header-container">
    <!-- Brand Wordmark with Emblem & baseline 360 -->
    <a href="{{ url('/') }}" class="brand-logo-link" aria-label="DAOZ360 Home">
      <img
        src="{{ asset('assets/logo-daoz360-transparent.png') }}"
        alt="DAOZ360"
        class="brand-logo-img"
        width="170"
        height="34"
      />
    </a>

    <!-- Desktop Navigation: Product · How It Works · Solutions · Pricing · FAQs · Contact -->
    <nav class="desktop-nav" aria-label="Main Navigation">
      <ul class="nav-list">
        @if($isLegalPage)
          <li>
            <a href="{{ url('/') }}" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
              <span>Home</span>
            </a>
          </li>
        @endif
        <li><a href="{{ url('/#product') }}" class="nav-link">Product</a></li>
        <li><a href="{{ url('/#how-it-works') }}" class="nav-link">How It Works</a></li>
        <li><a href="{{ url('/#solutions') }}" class="nav-link">Solutions</a></li>
        <li><a href="{{ url('/pricing') }}" class="nav-link {{ request()->is('pricing*') ? 'is-active' : '' }}">Pricing</a></li>
        <li><a href="{{ url('/#faqs') }}" class="nav-link">FAQs</a></li>
        <li><a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact*') ? 'is-active' : '' }}">Contact</a></li>
      </ul>
    </nav>

    <!-- Primary CTA & Sign In Actions (Keep Sign In separate from main CTA per Section 13F) -->
    <div class="header-actions">
      <a
        href="https://daoz360.ai/social/login"
        target="_blank"
        rel="noopener noreferrer"
        class="header-signin-link"
        aria-label="Sign In to DAOZ360"
      >
        <span>Sign In</span>
      </a>

      <button type="button" class="btn-primary header-cta" data-open-contact aria-label="Talk to Us">
        <span>Talk to Us</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
      </button>

      <!-- Mobile Menu Button -->
      <button
        type="button"
        id="mobile-menu-toggle"
        class="mobile-toggle-btn"
        aria-label="Open Menu"
        aria-expanded="false"
      >
        <svg id="mobile-toggle-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        <svg id="mobile-toggle-icon-close" hidden xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
  </div>

  <!-- Mobile Drawer and Backdrop -->
  <div id="mobile-drawer-backdrop" class="mobile-drawer-backdrop" hidden aria-hidden="true"></div>
  <div id="mobile-drawer" class="mobile-drawer" hidden role="dialog" aria-modal="true" aria-label="Navigation Menu">
    <nav class="mobile-nav">
      <ul class="mobile-nav-list">
        <li>
          <a href="{{ url('/') }}" class="mobile-nav-link {{ !$isLegalPage ? 'is-active' : '' }}">Home</a>
        </li>
        <li><a href="{{ url('/#product') }}" class="mobile-nav-link">Product</a></li>
        <li><a href="{{ url('/#how-it-works') }}" class="mobile-nav-link">How It Works</a></li>
        <li><a href="{{ url('/#solutions') }}" class="mobile-nav-link">Solutions</a></li>
        <li><a href="{{ url('/pricing') }}" class="mobile-nav-link {{ request()->is('pricing*') ? 'is-active' : '' }}">Pricing</a></li>
        <li><a href="{{ url('/#faqs') }}" class="mobile-nav-link">FAQs</a></li>
        <li><a href="{{ url('/contact') }}" class="mobile-nav-link {{ request()->is('contact*') ? 'is-active' : '' }}">Contact</a></li>

        <li class="mobile-drawer-divider">
          <span class="mobile-drawer-section-label">Legal &amp; Access</span>
        </li>
        <li>
          <a href="{{ url('/privacy-policy') }}" class="mobile-nav-link {{ request()->is('privacy-policy*') ? 'is-active' : '' }}">Privacy Policy</a>
        </li>
        <li>
          <a href="{{ url('/terms-conditions') }}" class="mobile-nav-link {{ request()->is('terms-conditions*') ? 'is-active' : '' }}">Terms &amp; Conditions</a>
        </li>
        <li>
          <a
            href="https://daoz360.ai/social/login"
            target="_blank"
            rel="noopener noreferrer"
            class="mobile-nav-link"
            style="display: flex; align-items: center; justify-content: space-between;"
          >
            <span>Sign In</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.6;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>
        </li>
        <li>
          <a
            href="https://daoz360.ai/social/register"
            target="_blank"
            rel="noopener noreferrer"
            class="mobile-nav-link"
            style="display: flex; align-items: center; justify-content: space-between;"
          >
            <span>Get Started</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.6;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>
        </li>
      </ul>

      <div class="mobile-drawer-cta">
        <button type="button" class="btn-primary w-full" data-open-contact>
          <span>Talk to Us</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
        </button>
        <div class="mobile-email-support">
          Direct inquiry: <a href="mailto:mail@daoz360.ai">mail@daoz360.ai</a>
        </div>
      </div>
    </nav>
  </div>
</header>
