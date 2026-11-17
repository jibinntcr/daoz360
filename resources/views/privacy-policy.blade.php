@extends('layouts.app')

@section('title', 'Privacy Policy | DAOZ360')
@section('description', 'Read the official DAOZ360 Privacy Policy. Understand our data practices, safeguards, and compliance with applicable data protection laws.')
@section('canonical', 'https://daoz360.ai/privacy-policy/')

@section('content')
  <div class="legal-page-wrapper">
    <div class="container">
      <!-- Header Hero -->
      <header class="legal-header">
        <nav class="legal-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ url('/') }}" class="legal-breadcrumb-link">DAOZ360</a>
          <span class="legal-breadcrumb-sep">/</span>
          <span>Legal</span>
          <span class="legal-breadcrumb-sep">/</span>
          <span class="legal-breadcrumb-current">Privacy Policy</span>
        </nav>

        <div class="legal-meta-pills">
          <span class="legal-badge-pill">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span>Official Privacy Notice</span>
          </span>
          <span class="legal-date-pill">Effective: 26 October 2026</span>
        </div>

        <h1 class="legal-page-title">Privacy Policy</h1>
        <p class="legal-page-summary">
          This Privacy Policy outlines how DAOZ360 handles, processes, and protects details collected across our social media management platform.
        </p>

        <div class="legal-page-actions">
          <a href="{{ url('/') }}" class="legal-back-btn" aria-label="Back to Homepage">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <span>Back to Home</span>
          </a>

          <a href="{{ url('/terms-conditions') }}" class="legal-alt-link">
            <span>View Terms &amp; Conditions</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>

          <a href="{{ url('/contact') }}" class="legal-alt-link">
            <span>Contact Privacy Team</span>
          </a>
        </div>
      </header>

      <!-- Mobile Horizontal Quick Navigation -->
      <div class="legal-mobile-toc-bar" aria-label="Quick jump to section">
        <div class="legal-mobile-toc-scroll">
          <a href="#data-handled" class="legal-mobile-pill is-active"><span>1. Data handled</span></a>
          <a href="#processing-purposes" class="legal-mobile-pill"><span>2. Processing purposes</span></a>
          <a href="#disclosure" class="legal-mobile-pill"><span>3. Disclosure</span></a>
          <a href="#protection" class="legal-mobile-pill"><span>4. Protection</span></a>
          <a href="#platform-administration" class="legal-mobile-pill"><span>5. Platform administration</span></a>
          <a href="#enquiries" class="legal-mobile-pill"><span>6. Enquiries &amp; Correspondence</span></a>
        </div>
      </div>

      <!-- Two-Column Grid: Sticky Sidebar + Content Area -->
      <div class="legal-layout-grid">
        <aside class="legal-toc-sidebar" aria-label="Table of Contents">
          <div class="legal-toc-title"><span>Policy Sections</span></div>
          <ul class="legal-toc-list">
            <li><a href="#data-handled" class="legal-toc-link is-active"><span class="legal-toc-num">1.</span><span>Data handled</span></a></li>
            <li><a href="#processing-purposes" class="legal-toc-link"><span class="legal-toc-num">2.</span><span>Processing purposes</span></a></li>
            <li><a href="#disclosure" class="legal-toc-link"><span class="legal-toc-num">3.</span><span>Disclosure</span></a></li>
            <li><a href="#protection" class="legal-toc-link"><span class="legal-toc-num">4.</span><span>Protection</span></a></li>
            <li><a href="#platform-administration" class="legal-toc-link"><span class="legal-toc-num">5.</span><span>Platform administration</span></a></li>
            <li><a href="#enquiries" class="legal-toc-link"><span class="legal-toc-num">6.</span><span>Enquiries &amp; Correspondence</span></a></li>
          </ul>
        </aside>

        <div class="legal-content-body">
          <!-- Section 1 -->
          <section id="data-handled" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">1.</span>
              <h2 class="legal-section-title">Data handled</h2>
            </div>
            <p class="legal-section-paragraph">
              We collect details supplied through registration, platform use and support: contact identity, login/profile details, linked social accounts and posts, usage measurements, and messaging preferences.
            </p>
            <div class="legal-sub-grid">
              <div class="legal-sub-card">
                <div class="legal-sub-label"><span class="legal-sub-dot"></span><span>Contact &amp; Account Identity</span></div>
                <p class="legal-sub-desc">Name, email address, and profile details provided during account creation and setup.</p>
              </div>
              <div class="legal-sub-card">
                <div class="legal-sub-label"><span class="legal-sub-dot"></span><span>Connected Social Accounts &amp; Posts</span></div>
                <p class="legal-sub-desc">Connected channel credentials, scheduled drafts, media uploads, and published post data.</p>
              </div>
              <div class="legal-sub-card">
                <div class="legal-sub-label"><span class="legal-sub-dot"></span><span>Usage Measurements &amp; Metrics</span></div>
                <p class="legal-sub-desc">Platform engagement analytics, feature interaction logs, and service telemetry.</p>
              </div>
              <div class="legal-sub-card">
                <div class="legal-sub-label"><span class="legal-sub-dot"></span><span>Support &amp; Messaging Preferences</span></div>
                <p class="legal-sub-desc">Direct correspondence, support inquiries, and communication preferences.</p>
              </div>
            </div>
          </section>

          <!-- Section 2 -->
          <section id="processing-purposes" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">2.</span>
              <h2 class="legal-section-title">Processing purposes</h2>
            </div>
            <p class="legal-section-paragraph">
              We use this data to operate and improve DAOZ360, administer transactions, deliver service notices, answer support enquiries, understand usage, and address misuse or fraud.
            </p>
            <ul class="legal-checklist">
              <li class="legal-checklist-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="legal-check-icon"><path d="M20 6 9 17l-5-5"/></svg>
                <span>Operating core scheduling, publishing, and collaboration tools</span>
              </li>
              <li class="legal-checklist-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="legal-check-icon"><path d="M20 6 9 17l-5-5"/></svg>
                <span>Administering account transactions and platform notifications</span>
              </li>
              <li class="legal-checklist-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="legal-check-icon"><path d="M20 6 9 17l-5-5"/></svg>
                <span>Responding to customer inquiries and technical support requests</span>
              </li>
              <li class="legal-checklist-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="legal-check-icon"><path d="M20 6 9 17l-5-5"/></svg>
                <span>Analyzing aggregated workflow patterns to improve platform reliability</span>
              </li>
              <li class="legal-checklist-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="legal-check-icon"><path d="M20 6 9 17l-5-5"/></svg>
                <span>Preventing security threats, unauthorized access, and policy misuse</span>
              </li>
            </ul>
          </section>

          <!-- Section 3 -->
          <section id="disclosure" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">3.</span>
              <h2 class="legal-section-title">Disclosure</h2>
            </div>
            <p class="legal-section-paragraph">
              We do not sell or trade personal details. Transfers require your permission except for legal duties, protection of rights or safety, and business transactions described by this policy.
            </p>
            <div class="legal-notice-box">
              <div class="legal-notice-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span>Zero Personal Data Trading</span>
              </div>
              <span>
                DAOZ360 maintains a strict policy: we do not sell or trade personal details. Any data transfer requires explicit authorization or arises solely under statutory legal obligation.
              </span>
            </div>
          </section>

          <!-- Section 4 -->
          <section id="protection" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">4.</span>
              <h2 class="legal-section-title">Protection</h2>
            </div>
            <p class="legal-section-paragraph">
              We apply safeguards against unauthorised handling, loss or alteration. Internet transmission cannot be guaranteed completely secure.
            </p>
          </section>

          <!-- Section 5 -->
          <section id="platform-administration" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">5.</span>
              <h2 class="legal-section-title">Platform administration</h2>
            </div>
            <p class="legal-section-paragraph">
              Platform administration and infrastructure operations are maintained under Digital PRIZM PTE LTD / DAOZ360.
            </p>
          </section>

          <!-- Section 6 -->
          <section id="enquiries" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">6.</span>
              <h2 class="legal-section-title">Enquiries &amp; Correspondence</h2>
            </div>
            <p class="legal-section-paragraph">
              For privacy questions, access requests, or regulatory inquiries, contact us directly at our designated privacy address.
            </p>
            <div class="legal-contact-panel">
              <div class="legal-contact-channel">
                <span class="legal-channel-label">Official Privacy Contact</span>
                <span class="legal-channel-value">
                  <a href="mailto:mail@daoz360.ai" class="legal-channel-link">mail@daoz360.ai</a>
                </span>
                <button
                  type="button"
                  class="legal-mobile-pill"
                  style="margin-top: 8px; width: fit-content;"
                  data-copy-text="mail@daoz360.ai"
                  data-copied-label="Copied Email!"
                >
                  Copy Email Address
                </button>
              </div>

              <div class="legal-contact-channel">
                <span class="legal-channel-label">Registered Office Address</span>
                <span class="legal-channel-value">60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051</span>
                <button
                  type="button"
                  class="legal-mobile-pill"
                  style="margin-top: 8px; width: fit-content;"
                  data-copy-text="60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051"
                  data-copied-label="Copied Address!"
                >
                  Copy Address
                </button>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection
