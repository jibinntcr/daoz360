<div id="contact-modal-backdrop" class="modal-backdrop" hidden role="presentation">
  <div
    id="contact-modal-dialog"
    class="contact-modal card-base"
    role="dialog"
    aria-modal="true"
    aria-labelledby="contact-modal-title"
  >
    <button
      type="button"
      id="contact-modal-close"
      class="modal-close-btn"
      aria-label="Close dialog"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>

    <div class="modal-header">
      <div class="modal-eyebrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
        <span id="contact-modal-eyebrow-text">Connect with DAOZ360</span>
      </div>
      <h2 id="contact-modal-title" class="modal-title">
        Let’s talk about your social media workflow.
      </h2>
      <p id="contact-modal-subtitle" class="modal-subtitle">
        Tell us about your team, the channels you manage, and what you would like to simplify. We will help you explore how DAOZ360 could fit your workflow.
      </p>

      <!-- Selected Plan Context Pill (Shown when triggered from /pricing) -->
      <div id="modal-plan-prefill-pill" class="modal-plan-prefill-pill" hidden>
        <span class="modal-plan-pill-dot" aria-hidden="true"></span>
        <span id="modal-plan-prefill-text">Selected Package: Growth • Monthly (INR)</span>
        <button type="button" id="modal-plan-prefill-clear" class="modal-plan-pill-clear" aria-label="Clear selected plan">&times;</button>
      </div>
    </div>

    <div id="contact-modal-status" class="form-status-banner" hidden role="status"></div>

    <form id="contact-modal-form" class="contact-form" method="POST" action="{{ url('/contact/submit') }}">
      @csrf
      <input type="hidden" id="modal-contact-category" name="category" value="Product Enquiry" />
      <input type="hidden" id="modal-contact-plan" name="plan" value="" />
      <input type="hidden" id="modal-contact-billing" name="billing" value="" />
      <input type="hidden" id="modal-contact-currency" name="currency" value="" />

      <div class="form-group">
        <label for="modal-contact-name" class="form-label">Name</label>
        <input
          type="text"
          id="modal-contact-name"
          name="name"
          class="form-input"
          placeholder="e.g. Alex Morgan"
          required
        />
      </div>

      <div class="form-group">
        <label for="modal-contact-email" class="form-label">Work Email</label>
        <input
          type="email"
          id="modal-contact-email"
          name="email"
          class="form-input"
          placeholder="alex@company.com"
          required
        />
      </div>

      <div class="form-group">
        <label for="modal-contact-company" class="form-label">Company or Brand</label>
        <input
          type="text"
          id="modal-contact-company"
          name="company"
          class="form-input"
          placeholder="Company or Brand Name"
        />
      </div>

      <div class="form-group">
        <label for="modal-contact-message" class="form-label">Message</label>
        <textarea
          id="modal-contact-message"
          name="message"
          rows="4"
          class="form-textarea"
          placeholder="Tell us about the platforms you use and what you're looking to achieve..."
          required
        ></textarea>
      </div>

      <div class="modal-actions-row">
        <button type="submit" id="modal-submit-btn" class="btn-primary modal-submit-btn">
          <span id="modal-submit-btn-text">Send Enquiry</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        </button>

        <button
          type="button"
          id="modal-copy-btn"
          class="btn-secondary modal-copy-btn"
          title="Copy message text to clipboard"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
          <span id="modal-copy-text">Copy Text</span>
        </button>
      </div>

      <div class="modal-direct-note">
        Direct email: <a href="mailto:mail@daoz360.ai" style="color: #B93D00; font-weight: 600;">mail@daoz360.ai</a>. No passwords or social login credentials are collected.
      </div>
    </form>
  </div>
</div>
