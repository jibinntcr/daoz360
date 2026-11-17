<!-- Floating Launcher Button -->
<button
  type="button"
  id="daoz-chat-launcher"
  class="daoz-chat-launcher"
  aria-label="Chat with DAOZ360"
  aria-expanded="false"
>
  <span class="daoz-launcher-icon-wrap">
    <img
      src="{{ asset('assets/logo-daoz360-transparent.png') }}"
      alt=""
      class="daoz-launcher-emblem"
      width="26"
      height="26"
    />
  </span>
  <span class="daoz-launcher-text">Chat with DAOZ360</span>
</button>

<!-- Chat Window Panel -->
<div
  id="daoz-chat-window"
  class="daoz-chat-window"
  hidden
  role="dialog"
  aria-modal="true"
  aria-labelledby="daoz-chat-title"
>
  <!-- Header -->
  <header class="daoz-chat-header">
    <div class="daoz-chat-header-info">
      <div class="daoz-chat-avatar">
        <img
          src="{{ asset('assets/logo-daoz360-transparent.png') }}"
          alt="DAOZ360"
          class="daoz-chat-avatar-img"
          width="20"
          height="20"
        />
      </div>
      <div>
        <h2 id="daoz-chat-title" class="daoz-chat-name">DAOZ360 Assistant</h2>
        <div class="daoz-chat-status">
          <span class="daoz-chat-status-dot"></span>
          <span>Automated replies</span>
        </div>
      </div>
    </div>

    <div class="daoz-chat-header-actions">
      <button
        type="button"
        id="daoz-chat-reset-btn"
        class="daoz-chat-icon-btn"
        hidden
        title="End conversation"
        aria-label="End conversation"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
      </button>
      <button
        type="button"
        id="daoz-chat-close-btn"
        class="daoz-chat-icon-btn"
        title="Close chat"
        aria-label="Close chat"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
  </header>

  <!-- End Chat Confirmation Overlay -->
  <div id="daoz-chat-confirm-overlay" class="daoz-chat-overlay" hidden role="alertdialog">
    <div class="daoz-chat-confirm-box">
      <h3 class="daoz-confirm-title">End this conversation?</h3>
      <p class="daoz-confirm-desc">
        This will clear the active message history on your screen. Any follow-up requests
        already submitted with a reference identifier will remain safely queued for our team.
      </p>
      <div class="daoz-confirm-actions">
        <button type="button" id="daoz-confirm-end-yes" class="daoz-confirm-btn-danger">
          Yes, End Chat
        </button>
        <button type="button" id="daoz-confirm-end-cancel" class="daoz-confirm-btn-cancel">
          Keep Chatting
        </button>
      </div>
    </div>
  </div>

  <!-- Pre-chat Form View -->
  <div id="daoz-prechat-container" class="daoz-prechat-container">
    <div class="daoz-prechat-intro">
      <h3 class="daoz-prechat-heading">Let's get started.</h3>
      <p class="daoz-prechat-subtext">
        Enter your details so we can address your enquiry and follow up if needed.
      </p>
    </div>

    <form id="daoz-prechat-form" class="daoz-prechat-form" novalidate>
      @csrf
      <div class="daoz-field-group">
        <label for="prechat-name" class="daoz-field-label">
          Your Name <span class="daoz-req">*</span>
        </label>
        <input
          id="prechat-name"
          type="text"
          class="daoz-input"
          placeholder="e.g. Alex Morgan"
          maxlength="80"
          autocomplete="name"
        />
        <span id="prechat-error-name" class="daoz-field-error" hidden role="alert"></span>
      </div>

      <div class="daoz-field-group">
        <label for="prechat-email" class="daoz-field-label">
          Email Address <span class="daoz-req">*</span>
        </label>
        <input
          id="prechat-email"
          type="email"
          class="daoz-input"
          placeholder="alex@company.com"
          autocomplete="email"
        />
        <span id="prechat-error-email" class="daoz-field-error" hidden role="alert"></span>
      </div>

      <div class="daoz-field-group">
        <label for="prechat-company" class="daoz-field-label">
          Company or Brand (Optional)
        </label>
        <input
          id="prechat-company"
          type="text"
          class="daoz-input"
          placeholder="e.g. Acme Studio"
          maxlength="120"
          autocomplete="organization"
        />
      </div>

      <div class="daoz-privacy-notice">
        <span>We use these details to handle your enquiry and follow up when needed. Read our </span>
        <a href="{{ url('/privacy-policy') }}" class="daoz-privacy-link">Privacy Policy</a>.
      </div>

      <div id="prechat-error-form" class="daoz-form-alert" hidden role="alert"></div>

      <button type="submit" class="btn-primary daoz-start-btn">
        <span id="daoz-start-btn-label">Start Chat</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
      </button>
    </form>
  </div>

  <!-- Conversation View -->
  <div id="daoz-conversation-wrapper" class="daoz-conversation-wrapper" hidden>
    <div id="daoz-messages-feed" class="daoz-messages-feed" role="log" aria-live="polite"></div>

    <form id="daoz-chat-input-form" class="daoz-chat-input-bar">
      <input
        id="daoz-chat-input"
        type="text"
        class="daoz-chat-input"
        placeholder="Ask a question or type your topic..."
      />
      <button
        type="submit"
        id="daoz-chat-send-btn"
        class="daoz-chat-send-btn"
        disabled
        aria-label="Send message"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
      </button>
    </form>
  </div>
</div>
