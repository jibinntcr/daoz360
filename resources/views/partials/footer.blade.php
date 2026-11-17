<footer class="site-footer">
  <div class="container">
    <!-- Top Footer Row -->
    <div class="footer-top-row">
      <!-- Brand Info -->
      <div class="footer-brand-col">
        <a href="{{ url('/') }}" class="footer-logo-link" aria-label="DAOZ360 Home">
          <img
            src="{{ asset('assets/logo-daoz360-transparent.png') }}"
            alt="DAOZ360"
            class="footer-logo-img"
            width="160"
            height="32"
          />
        </a>
        <p class="footer-tagline-text">Plan. Publish. Grow.</p>
        <p class="footer-desc-text">
          Your social media, managed in one place.
        </p>
        <div class="footer-address-note">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-contact-icon" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>Singapore: 60 Paya Lebar Road, #04-23, Singapore 409051</span>
        </div>
      </div>

      <!-- Navigation Column: Product · How It Works · Solutions · Pricing · FAQs · Contact -->
      <div class="footer-nav-col">
        <span class="footer-col-title">Platform</span>
        <ul class="footer-links-list">
          <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
          <li><a href="{{ url('/#product') }}" class="footer-link">Product</a></li>
          <li><a href="{{ url('/#how-it-works') }}" class="footer-link">How It Works</a></li>
          <li><a href="{{ url('/#solutions') }}" class="footer-link">Solutions</a></li>
          <li><a href="{{ url('/pricing') }}" class="footer-link">Pricing</a></li>
          <li><a href="{{ url('/#faqs') }}" class="footer-link">FAQs</a></li>
          <li><a href="{{ url('/contact') }}" class="footer-link">Contact</a></li>
        </ul>
      </div>

      <!-- Legal & Account Column (Section 11D exact paths) -->
      <div class="footer-nav-col">
        <span class="footer-col-title">Legal &amp; Access</span>
        <ul class="footer-links-list">
          <li><a href="{{ url('/privacy-policy') }}" class="footer-link">Privacy Policy</a></li>
          <li><a href="{{ url('/terms-conditions') }}" class="footer-link">Terms &amp; Conditions</a></li>
          <li><a href="{{ url('/contact') }}" class="footer-link">Contact</a></li>
          <li>
            <a href="https://daoz360.ai/social/login" target="_blank" rel="noopener noreferrer" class="footer-link">
              <span>Sign In</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px; opacity: 0.7;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
            </a>
          </li>
          <li>
            <a href="https://daoz360.ai/social/register" target="_blank" rel="noopener noreferrer" class="footer-link">
              <span>Get Started</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px; opacity: 0.7;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
            </a>
          </li>
        </ul>
      </div>

      <!-- Direct Inquiries -->
      <div class="footer-contact-col">
        <span class="footer-col-title">Direct Inquiries</span>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-contact-icon" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          <a href="mailto:mail@daoz360.ai" class="footer-link">mail@daoz360.ai</a>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="footer-contact-icon" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <a href="https://daoz360.ai/" target="_blank" rel="noopener noreferrer" class="footer-link">https://daoz360.ai/</a>
        </div>
        <a href="mailto:mail@daoz360.ai" class="footer-contact-btn" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
          Email DAOZ360
        </a>
      </div>
    </div>

    <!-- Bottom Footer Row -->
    <div class="footer-bottom-row">
      <div class="footer-copy">
        &copy; {{ date('Y') }} DAOZ360. All rights reserved.
      </div>

      <div class="footer-meta-status">
        <span class="footer-status-dot"></span>
        <span>Social Media Management &bull; DAOZ360</span>
      </div>

      <button type="button" id="footer-back-top-btn" class="footer-back-top-btn" aria-label="Back to top">
        <span>Back to top</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m18 15-6-6-6 6"/></svg>
      </button>
    </div>
  </div>
</footer>
