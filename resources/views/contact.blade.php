@extends('layouts.app')

@section('title', 'Contact Us | DAOZ360')
@section('description', 'Contact DAOZ360 for product enquiries, technical support, privacy questions, and billing assistance.')
@section('canonical', 'https://daoz360.ai/contact/')

@section('content')
  <div class="legal-page-wrapper">
    <div class="container">
      <!-- Header Hero -->
      <header class="legal-header">
        <nav class="legal-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ url('/') }}" class="legal-breadcrumb-link">DAOZ360</a>
          <span class="legal-breadcrumb-sep">/</span>
          <span class="legal-breadcrumb-current">Contact</span>
        </nav>

        <div class="legal-meta-pills">
          <span class="legal-badge-pill">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <span>Direct Inquiries</span>
          </span>
          <span class="legal-date-pill">Official Channel: mail@daoz360.ai</span>
        </div>

        <h1 class="legal-page-title">Let's talk about your social media workflow.</h1>
        <p class="legal-page-summary">
          Tell us about your team, the channels you manage and what you would like to simplify. For product enquiries, account support, privacy questions or billing queries, email mail@daoz360.ai.
        </p>

        <div class="legal-page-actions">
          <a href="{{ url('/') }}" class="legal-back-btn" aria-label="Back to Homepage">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <span>Back to Home</span>
          </a>

          <a href="{{ url('/privacy-policy') }}" class="legal-alt-link">
            <span>Privacy Policy</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>

          <a href="{{ url('/terms-conditions') }}" class="legal-alt-link">
            <span>Terms &amp; Conditions</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
          </a>
        </div>
      </header>

      <!-- Content Layout -->
      <div class="contact-page-grid">
        <!-- Column 1: Verified Channels -->
        <div class="contact-info-col">
          <div class="contact-channel-card">
            <div class="contact-channel-icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </div>
            <h2 class="contact-channel-title">Direct Email</h2>
            <p class="contact-channel-desc">
              For product enquiries, account support, privacy questions or billing queries, send your requirements directly.
            </p>
            <a href="mailto:mail@daoz360.ai" class="contact-channel-action" aria-label="Send email to DAOZ360">
              <span>mail@daoz360.ai</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
            </a>
          </div>

          <div class="contact-channel-card">
            <div class="contact-channel-icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <h2 class="contact-channel-title">Official Domain</h2>
            <p class="contact-channel-desc">
              Verified platform web address and authorized portal endpoints.
            </p>
            <a href="https://daoz360.ai/" target="_blank" rel="noopener noreferrer" class="contact-channel-action">
              <span>daoz360.ai</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
            </a>
          </div>

          <div class="contact-channel-card">
            <div class="contact-channel-icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <h2 class="contact-channel-title">Registered Office</h2>
            <p class="contact-channel-desc">
              60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051
            </p>
            <span class="contact-channel-desc" style="color: #71717A; display: block; margin: 0;">
              Digital PRIZM PTE LTD / DAOZ360
            </span>
          </div>
        </div>

        <!-- Column 2: Inquiry Preparation Form -->
        <form id="contact-page-form" class="contact-form-card" method="POST" action="{{ url('/contact/submit') }}">
          @csrf
          <input type="hidden" id="contact-page-category-input" name="category" value="Product Enquiry" />

          <h2 class="contact-form-title">Draft Your Inquiry</h2>
          <p class="contact-form-desc">
            Select your topic and prepare a structured inquiry to send directly to mail@daoz360.ai.
          </p>

          <div id="contact-page-status" class="form-status-banner" hidden role="status" style="margin-bottom: 18px;"></div>

          <div class="contact-form-group">
            <label class="contact-form-label">Inquiry Category</label>
            <div class="contact-type-selector">
              <button type="button" data-inquiry-type="product" class="contact-type-btn is-selected">
                <span class="contact-type-label">Product Enquiry</span>
                <span class="contact-type-desc">Questions on scheduling, publishing, and workflows</span>
              </button>
              <button type="button" data-inquiry-type="support" class="contact-type-btn">
                <span class="contact-type-label">Account Support</span>
                <span class="contact-type-desc">Assistance with account setup or platform features</span>
              </button>
              <button type="button" data-inquiry-type="privacy" class="contact-type-btn">
                <span class="contact-type-label">Privacy &amp; Data</span>
                <span class="contact-type-desc">Questions regarding data handling or compliance</span>
              </button>
              <button type="button" data-inquiry-type="billing" class="contact-type-btn">
                <span class="contact-type-label">Billing Queries</span>
                <span class="contact-type-desc">Inquiries about plans, invoicing, or subscriptions</span>
              </button>
            </div>
          </div>

          <div class="contact-form-group">
            <label for="contact-page-name" class="contact-form-label">Your Name</label>
            <input
              id="contact-page-name"
              name="name"
              type="text"
              class="contact-input"
              placeholder="e.g. Alex Morgan"
            />
          </div>

          <div class="contact-form-group">
            <label for="contact-page-email" class="contact-form-label">Work Email</label>
            <input
              id="contact-page-email"
              name="email"
              type="email"
              class="contact-input"
              placeholder="alex@company.com"
            />
          </div>

          <div class="contact-form-group">
            <label for="contact-page-channels" class="contact-form-label">Social Channels Managed (Optional)</label>
            <input
              id="contact-page-channels"
              name="channels"
              type="text"
              class="contact-input"
              placeholder="e.g. Instagram, LinkedIn, X"
            />
          </div>

          <div class="contact-form-group">
            <label for="contact-page-message" class="contact-form-label">Message Details</label>
            <textarea
              id="contact-page-message"
              name="message"
              class="contact-textarea"
              placeholder="Tell us about your team and what you would like to simplify..."
            ></textarea>
          </div>

          <div class="contact-form-actions">
            <a
              id="contact-page-mailto-btn"
              href="mailto:mail@daoz360.ai"
              class="btn-primary"
              style="text-decoration: none;"
            >
              <span>Email DAOZ360</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
            </a>

            <button
              type="button"
              id="contact-copy-draft-btn"
              class="contact-copy-draft-btn"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
              <span id="contact-copy-draft-label">Copy Draft to Clipboard</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
