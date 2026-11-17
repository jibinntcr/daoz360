@extends('layouts.app')

@section('title', 'Terms & Conditions | DAOZ360')
@section('description', 'Review the official terms and conditions for using the DAOZ360 social media management platform.')
@section('canonical', 'https://daoz360.ai/terms-conditions/')

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
          <span class="legal-breadcrumb-current">Terms &amp; Conditions</span>
        </nav>

        <div class="legal-meta-pills">
          <span class="legal-badge-pill">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
            <span>Platform Terms of Use</span>
          </span>
          <span class="legal-date-pill">Effective: 26 October 2026</span>
        </div>

        <h1 class="legal-page-title">Terms &amp; Conditions</h1>
        <p class="legal-page-summary">
          These Terms &amp; Conditions establish the agreement between you and DAOZ360 governing use of the platform, accounts, content, and services.
        </p>

        <div class="legal-page-actions">
          <a href="{{ url('/') }}" class="legal-back-btn" aria-label="Back to Homepage">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <span>Back to Home</span>
          </a>

          <a href="{{ url('/privacy-policy') }}" class="legal-alt-link">
            <span>View Privacy Policy</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>

          <a href="{{ url('/contact') }}" class="legal-alt-link">
            <span>Contact Support</span>
          </a>
        </div>
      </header>

      <!-- Mobile Horizontal Quick Navigation -->
      <div class="legal-mobile-toc-bar" aria-label="Quick jump to section">
        <div class="legal-mobile-toc-scroll">
          <a href="#agreement" class="legal-mobile-pill is-active"><span>1. Agreement</span></a>
          <a href="#website-material-permission" class="legal-mobile-pill"><span>2. Website-material permission</span></a>
          <a href="#account-duties" class="legal-mobile-pill"><span>3. Account duties</span></a>
          <a href="#conduct" class="legal-mobile-pill"><span>4. Conduct</span></a>
          <a href="#charges" class="legal-mobile-pill"><span>5. Charges</span></a>
          <a href="#ownership" class="legal-mobile-pill"><span>6. Ownership</span></a>
          <a href="#access-removal" class="legal-mobile-pill"><span>7. Access removal</span></a>
          <a href="#liability" class="legal-mobile-pill"><span>8. Liability</span></a>
          <a href="#revisions" class="legal-mobile-pill"><span>9. Revisions</span></a>
          <a href="#questions" class="legal-mobile-pill"><span>10. Questions</span></a>
        </div>
      </div>

      <!-- Two-Column Grid -->
      <div class="legal-layout-grid">
        <aside class="legal-toc-sidebar" aria-label="Table of Contents">
          <div class="legal-toc-title"><span>Agreement Clauses</span></div>
          <ul class="legal-toc-list">
            <li><a href="#agreement" class="legal-toc-link is-active"><span class="legal-toc-num">1.</span><span>Agreement</span></a></li>
            <li><a href="#website-material-permission" class="legal-toc-link"><span class="legal-toc-num">2.</span><span>Website-material permission</span></a></li>
            <li><a href="#account-duties" class="legal-toc-link"><span class="legal-toc-num">3.</span><span>Account duties</span></a></li>
            <li><a href="#conduct" class="legal-toc-link"><span class="legal-toc-num">4.</span><span>Conduct</span></a></li>
            <li><a href="#charges" class="legal-toc-link"><span class="legal-toc-num">5.</span><span>Charges</span></a></li>
            <li><a href="#ownership" class="legal-toc-link"><span class="legal-toc-num">6.</span><span>Ownership</span></a></li>
            <li><a href="#access-removal" class="legal-toc-link"><span class="legal-toc-num">7.</span><span>Access removal</span></a></li>
            <li><a href="#liability" class="legal-toc-link"><span class="legal-toc-num">8.</span><span>Liability</span></a></li>
            <li><a href="#revisions" class="legal-toc-link"><span class="legal-toc-num">9.</span><span>Revisions</span></a></li>
            <li><a href="#questions" class="legal-toc-link"><span class="legal-toc-num">10.</span><span>Questions</span></a></li>
          </ul>
        </aside>

        <div class="legal-content-body">
          <section id="agreement" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">1.</span>
              <h2 class="legal-section-title">Agreement</h2>
            </div>
            <p class="legal-section-paragraph">
              Using DAOZ360 means accepting these conditions. If you disagree, discontinue use.
            </p>
          </section>

          <section id="website-material-permission" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">2.</span>
              <h2 class="legal-section-title">Website-material permission</h2>
            </div>
            <p class="legal-section-paragraph">
              Only temporary personal, non-commercial viewing is permitted. Copying, alteration, commercial/public presentation, reverse engineering, removal of ownership notices, redistribution and mirroring are restricted. Ownership does not transfer.
            </p>
            <div class="legal-notice-box">
              <div class="legal-notice-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <span>Permitted Scope of Use</span>
              </div>
              <span>
                Access to DAOZ360 is granted strictly under these conditions. Mirroring, redistribution, reverse engineering, or unauthorized extraction of service code, interfaces, or brand assets is prohibited.
              </span>
            </div>
          </section>

          <section id="account-duties" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">3.</span>
              <h2 class="legal-section-title">Account duties</h2>
            </div>
            <p class="legal-section-paragraph">
              Protect login details and devices, keep registration details accurate, and remain responsible for account activity.
            </p>
          </section>

          <section id="conduct" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">4.</span>
              <h2 class="legal-section-title">Conduct</h2>
            </div>
            <p class="legal-section-paragraph">
              Do not break laws, infringe rights, distribute harmful material, enter systems without permission, disrupt operations or send spam.
            </p>
          </section>

          <section id="charges" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">5.</span>
              <h2 class="legal-section-title">Charges</h2>
            </div>
            <p class="legal-section-paragraph">
              Paid features require upfront fees and accurate billing details. Applicable recurring charges require authorisation. Cancellation follows the relevant policy.
            </p>
          </section>

          <section id="ownership" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">6.</span>
              <h2 class="legal-section-title">Ownership</h2>
            </div>
            <p class="legal-section-paragraph">
              DAOZ360 and its licensors retain rights in original service materials and functionality.
            </p>
          </section>

          <section id="access-removal" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">7.</span>
              <h2 class="legal-section-title">Access removal</h2>
            </div>
            <p class="legal-section-paragraph">
              Access may be suspended or ended immediately at the service's discretion, including for violations.
            </p>
          </section>

          <section id="liability" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">8.</span>
              <h2 class="legal-section-title">Liability</h2>
            </div>
            <p class="legal-section-paragraph">
              DAOZ360 and associated parties exclude indirect, incidental, consequential, special and punitive losses, including lost profit, information, goodwill or use.
            </p>
          </section>

          <section id="revisions" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">9.</span>
              <h2 class="legal-section-title">Revisions</h2>
            </div>
            <p class="legal-section-paragraph">
              Material changes receive at least thirty days' advance notice.
            </p>
            <div class="legal-notice-box">
              <div class="legal-notice-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span>Advance Revision Period</span>
              </div>
              <span>
                We believe in transparent operational notice. Any material revisions to these terms will be preceded by at least thirty (30) days of advance notification to registered users.
              </span>
            </div>
          </section>

          <section id="questions" class="legal-section-card">
            <div class="legal-section-header">
              <span class="legal-section-num">10.</span>
              <h2 class="legal-section-title">Questions</h2>
            </div>
            <p class="legal-section-paragraph">
              If you have questions regarding these terms, contact us through our verified correspondence channels.
            </p>
            <div class="legal-contact-panel">
              <div class="legal-contact-channel">
                <span class="legal-channel-label">Official Legal Inquiry</span>
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
                <span class="legal-channel-label">Registered Correspondence Address</span>
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
