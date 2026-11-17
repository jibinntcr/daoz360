@extends('layouts.app')

@section('title', 'Pricing & Plans | DAOZ360')
@section('description', 'Explore DAOZ360 pricing plans for creators, growing marketing teams, and agencies. Start with the accounts you manage today and scale your social media workflow.')
@section('canonical', 'https://daoz360.ai/pricing/')

@section('content')
  <!-- 1. PRICING HERO & CONTROLS -->
  <section class="pricing-hero-section" aria-labelledby="pricing-heading">
    <div class="container">
      <div class="pricing-hero-grid">
        <div class="pricing-hero-copy">
          <div class="hero-eyebrow">
            <span class="eyebrow-dot" aria-hidden="true"></span>
            <span>DAOZ360 PRICING</span>
          </div>

          <h1 id="pricing-heading" class="pricing-headline">
            A plan for every stage of your social presence.
          </h1>

          <p class="pricing-intro">
            Start with the accounts you manage today. Choose the space, publishing capacity and collaboration your team needs as it grows.
          </p>

          <!-- Private Review / Quote Mode Banner (Controlled via central pricing mode) -->
          <div id="pricing-mode-banner" class="pricing-mode-banner" role="status">
            <span class="pricing-mode-dot" aria-hidden="true"></span>
            <span>
              <strong>Preview &amp; Quote Mode:</strong> Select any package below to prefill your enquiry with your preferred plan, billing interval, and currency.
            </span>
          </div>
        </div>

        <!-- Restrained 3D Ceramic Scale Tile (Section 13G) -->
        <div class="pricing-scale-visual" aria-hidden="true">
          <div class="scale-3d-card card-base">
            <div class="scale-3d-stage">
              <div class="scale-step scale-step-starter">
                <div class="scale-pillar">
                  <span class="scale-dot"></span>
                </div>
                <span class="scale-caption">5 Accounts</span>
              </div>
              <div class="scale-step scale-step-growth">
                <div class="scale-pillar is-accent">
                  <span class="scale-dot"></span>
                  <span class="scale-dot"></span>
                </div>
                <span class="scale-caption">15 Accounts</span>
              </div>
              <div class="scale-step scale-step-agency">
                <div class="scale-pillar is-tall">
                  <span class="scale-dot"></span>
                  <span class="scale-dot"></span>
                  <span class="scale-dot"></span>
                </div>
                <span class="scale-caption">40 Accounts</span>
              </div>
            </div>
            <div class="scale-3d-footer">
              <span class="badge-illustrative">Illustrative preview</span>
              <span class="scale-3d-note">Bundled seats &amp; monthly delivery capacity</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Billing Interval & Regional Currency Controls -->
      <div class="pricing-controls-bar" aria-label="Billing interval and currency controls">
        <!-- Billing Switch: Monthly / Yearly — save 2 months -->
        <div class="pricing-control-group">
          <span class="pricing-control-label" id="billing-toggle-label">Billing Interval</span>
          <div class="pricing-segmented-control" role="group" aria-labelledby="billing-toggle-label">
            <button
              type="button"
              id="billing-btn-monthly"
              data-billing-select="monthly"
              class="pricing-seg-btn is-active"
              aria-pressed="true"
            >
              <span>Monthly</span>
            </button>
            <button
              type="button"
              id="billing-btn-yearly"
              data-billing-select="yearly"
              class="pricing-seg-btn"
              aria-pressed="false"
            >
              <span>Yearly — save 2 months</span>
            </button>
          </div>
        </div>

        <!-- Currency Switch: INR / USD Regional Price Book -->
        <div class="pricing-control-group">
          <span class="pricing-control-label" id="currency-toggle-label">Regional Price Book</span>
          <div class="pricing-segmented-control" role="group" aria-labelledby="currency-toggle-label">
            <button
              type="button"
              id="currency-btn-inr"
              data-currency-select="INR"
              class="pricing-seg-btn is-active"
              aria-pressed="true"
            >
              <span>INR (₹)</span>
            </button>
            <button
              type="button"
              id="currency-btn-usd"
              data-currency-select="USD"
              class="pricing-seg-btn"
              aria-pressed="false"
            >
              <span>USD ($)</span>
            </button>
          </div>
        </div>
      </div>

      <!-- 2. THREE EQUAL-HEIGHT PLAN CARDS -->
      <div class="pricing-cards-grid" role="list">
        <!-- Card 1: Starter -->
        <article class="pricing-plan-card card-base" data-plan-card="starter" role="listitem">
          <div class="plan-card-top">
            <div class="plan-header-row">
              <h2 class="plan-name">Starter</h2>
            </div>
            <p class="plan-audience">For creators and independent professionals.</p>

            <div class="plan-price-block">
              <div class="plan-price-main-row">
                <span class="plan-price-amount" data-plan-price="starter">₹999</span>
                <span class="plan-price-unit" data-plan-unit="starter">/month</span>
              </div>
              <p class="plan-billing-subtext" data-plan-subtext="starter">
                Billed monthly.
              </p>
            </div>
          </div>

          <div class="plan-card-divider" aria-hidden="true"></div>

          <ul class="plan-features-list" aria-label="Starter plan features">
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>5</strong> connected social accounts.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>1</strong> user.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>300</strong> successful platform deliveries per month.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Post scheduling and publishing.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Supported-network analytics.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Email support.</span>
            </li>
          </ul>

          <div class="plan-card-footer">
            <button
              type="button"
              class="btn-secondary w-full plan-cta-btn"
              data-plan-enquire="starter"
              data-plan-cta="starter"
            >
              <span>Enquire About Starter</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
        </article>

        <!-- Card 2: Growth (Highlighted in middle with orange border & Recommended for Teams badge) -->
        <article class="pricing-plan-card card-base is-recommended" data-plan-card="growth" role="listitem">
          <div class="plan-recommended-badge">
            <span>Recommended for Teams</span>
          </div>

          <div class="plan-card-top">
            <div class="plan-header-row">
              <h2 class="plan-name">Growth</h2>
            </div>
            <p class="plan-audience">For growing businesses and small marketing teams.</p>

            <div class="plan-price-block">
              <div class="plan-price-main-row">
                <span class="plan-price-amount" data-plan-price="growth">₹2,499</span>
                <span class="plan-price-unit" data-plan-unit="growth">/month</span>
              </div>
              <p class="plan-billing-subtext" data-plan-subtext="growth">
                Billed monthly.
              </p>
            </div>
          </div>

          <div class="plan-card-divider" aria-hidden="true"></div>

          <ul class="plan-features-list" aria-label="Growth plan features">
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>15</strong> connected social accounts.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>3</strong> users.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>1,500</strong> successful platform deliveries per month.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Post scheduling and publishing.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Supported-network analytics.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Team collaboration and content approvals.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Email support.</span>
            </li>
          </ul>

          <div class="plan-card-footer">
            <button
              type="button"
              class="btn-primary w-full plan-cta-btn"
              data-plan-enquire="growth"
              data-plan-cta="growth"
            >
              <span>Enquire About Growth</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
        </article>

        <!-- Card 3: Agency -->
        <article class="pricing-plan-card card-base" data-plan-card="agency" role="listitem">
          <div class="plan-card-top">
            <div class="plan-header-row">
              <h2 class="plan-name">Agency</h2>
            </div>
            <p class="plan-audience">For teams managing a larger portfolio of social accounts.</p>

            <div class="plan-price-block">
              <div class="plan-price-main-row">
                <span class="plan-price-amount" data-plan-price="agency">₹5,999</span>
                <span class="plan-price-unit" data-plan-unit="agency">/month</span>
              </div>
              <p class="plan-billing-subtext" data-plan-subtext="agency">
                Billed monthly.
              </p>
            </div>
          </div>

          <div class="plan-card-divider" aria-hidden="true"></div>

          <ul class="plan-features-list" aria-label="Agency plan features">
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>40</strong> connected social accounts.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>10</strong> users.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span><strong>5,000</strong> successful platform deliveries per month.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Post scheduling and publishing.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Supported-network analytics.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Team collaboration and content approvals.</span>
            </li>
            <li class="plan-feature-item">
              <span class="plan-check-icon" aria-hidden="true">&#10003;</span>
              <span>Email support.</span>
            </li>
          </ul>

          <div class="plan-card-footer">
            <button
              type="button"
              class="btn-secondary w-full plan-cta-btn"
              data-plan-enquire="agency"
              data-plan-cta="agency"
            >
              <span>Enquire About Agency</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
        </article>
      </div>

      <!-- 3. CUSTOM REQUIREMENTS STRIP (Horizontal strip below cards, per Section 13F & 13G) -->
      <div class="pricing-custom-strip card-base">
        <div class="custom-strip-copy">
          <span class="custom-strip-badge">Custom Package</span>
          <h3 class="custom-strip-title">Need more accounts or a different setup?</h3>
          <p class="custom-strip-body">
            Tell us about your account volume, team and workflow. We will help you explore a suitable package.
          </p>
        </div>
        <div class="custom-strip-actions">
          <button
            type="button"
            class="btn-primary"
            data-plan-enquire="custom"
          >
            <span>Talk to Our Team</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </button>
        </div>
      </div>

      <!-- Shared Pricing Note (Section 13F) -->
      <p class="pricing-shared-note">
        Prices exclude applicable taxes. Annual plans are charged upfront. Each social profile, page or channel counts as one connected account. Publishing allowances are shared across the subscription. Supported features and formats vary by network.
      </p>
    </div>
  </section>

  <!-- 4. ALLOWANCE DEFINITIONS & FEATURE COMPARISON MATRIX (Section 13C & 13G) -->
  <section class="section section-soft pricing-comparison-section" aria-labelledby="comparison-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">Plan Entitlements &amp; Definitions</div>
        <h2 id="comparison-heading" class="section-title">
          Clear allowances. Transparent comparison.
        </h2>
        <p class="section-subtitle">
          Understand how accounts, user seats, and monthly publishing allowances work across every tier.
        </p>
      </div>

      <!-- Allowance Definitions Grid -->
      <div class="allowance-defs-grid" aria-label="Plan allowance definitions">
        <div class="allowance-def-card card-base">
          <h3 class="allowance-def-title">Social account</h3>
          <p class="allowance-def-desc">
            One connected profile, page or channel. One Instagram account plus one Facebook Page counts as two accounts.
          </p>
        </div>

        <div class="allowance-def-card card-base">
          <h3 class="allowance-def-title">User</h3>
          <p class="allowance-def-desc">
            One individual login, including the subscription owner. Shared credentials are not the intended collaboration model.
          </p>
        </div>

        <div class="allowance-def-card card-base">
          <h3 class="allowance-def-title">Publishing allowance</h3>
          <p class="allowance-def-desc">
            One successful delivery to one destination account. Sending one content item to five accounts counts as five deliveries.
          </p>
        </div>

        <div class="allowance-def-card card-base">
          <h3 class="allowance-def-title">Annual access</h3>
          <p class="allowance-def-desc">
            One upfront annual payment, not twelve monthly charges. Publishing capacity renews each subscription month.
          </p>
        </div>

        <div class="allowance-def-card card-base">
          <h3 class="allowance-def-title">Network and format availability</h3>
          <p class="allowance-def-desc">
            Depends on the live support matrix, platform permissions and technical restrictions; a larger plan does not create support for an unintegrated network.
          </p>
        </div>
      </div>

      <!-- Comparison Table -->
      <div class="comparison-table-wrapper card-base">
        <table class="comparison-table">
          <caption>Comparison of included entitlements across Starter, Growth, and Agency plans</caption>
          <thead>
            <tr>
              <th scope="col" class="comp-col-feature">Included item</th>
              <th scope="col" class="comp-col-plan">
                <span class="comp-plan-title">Starter</span>
                <span class="comp-plan-price" data-table-price="starter">₹999/mo</span>
              </th>
              <th scope="col" class="comp-col-plan is-highlighted">
                <span class="comp-plan-pill">Recommended for Teams</span>
                <span class="comp-plan-title">Growth</span>
                <span class="comp-plan-price" data-table-price="growth">₹2,499/mo</span>
              </th>
              <th scope="col" class="comp-col-plan">
                <span class="comp-plan-title">Agency</span>
                <span class="comp-plan-price" data-table-price="agency">₹5,999/mo</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Connected social accounts</th>
              <td><strong>5</strong></td>
              <td class="is-highlighted"><strong>15</strong></td>
              <td><strong>40</strong></td>
            </tr>
            <tr>
              <th scope="row">Total user seats, including owner</th>
              <td><strong>1</strong></td>
              <td class="is-highlighted"><strong>3</strong></td>
              <td><strong>10</strong></td>
            </tr>
            <tr>
              <th scope="row">Successful platform deliveries per month</th>
              <td><strong>300</strong></td>
              <td class="is-highlighted"><strong>1,500</strong></td>
              <td><strong>5,000</strong></td>
            </tr>
            <tr>
              <th scope="row">Scheduling and publishing</th>
              <td><span class="comp-included">&#10003; Included</span></td>
              <td class="is-highlighted"><span class="comp-included">&#10003; Included</span></td>
              <td><span class="comp-included">&#10003; Included</span></td>
            </tr>
            <tr>
              <th scope="row">Supported-network analytics</th>
              <td><span class="comp-included">&#10003; Included</span></td>
              <td class="is-highlighted"><span class="comp-included">&#10003; Included</span></td>
              <td><span class="comp-included">&#10003; Included</span></td>
            </tr>
            <tr>
              <th scope="row">Team collaboration</th>
              <td><span class="comp-excluded">Not included</span></td>
              <td class="is-highlighted"><span class="comp-included">&#10003; Included</span></td>
              <td><span class="comp-included">&#10003; Included</span></td>
            </tr>
            <tr>
              <th scope="row">Content approval workflow</th>
              <td><span class="comp-excluded">Not included</span></td>
              <td class="is-highlighted"><span class="comp-included">&#10003; Included</span></td>
              <td><span class="comp-included">&#10003; Included</span></td>
            </tr>
            <tr>
              <th scope="row">Email support</th>
              <td><span class="comp-included">&#10003; Included</span></td>
              <td class="is-highlighted"><span class="comp-included">&#10003; Included</span></td>
              <td><span class="comp-included">&#10003; Included</span></td>
            </tr>
            <tr>
              <th scope="row">Account setup assistance</th>
              <td><span>Email guidance</span></td>
              <td class="is-highlighted"><span>Email guidance</span></td>
              <td><span>Email guidance</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- 5. OPTIONAL TRIAL STRIP (Hidden until 14-day evaluation flow is enabled, per Section 13F) -->
  <section
    class="section pricing-trial-section"
    data-optional-feature="trial_strip"
    hidden
    aria-labelledby="trial-strip-heading"
  >
    <div class="container">
      <div class="pricing-custom-strip card-base is-trial-strip">
        <div class="custom-strip-copy">
          <span class="custom-strip-badge">14-Day Evaluation</span>
          <h2 id="trial-strip-heading" class="custom-strip-title">Try DAOZ360 with your own workflow.</h2>
          <p class="custom-strip-body">
            Explore the platform for 14 days with five connected accounts, three users and 100 successful platform deliveries. No payment card required.
          </p>
        </div>
        <div class="custom-strip-actions">
          <a href="https://daoz360.ai/social/register" class="btn-primary" style="text-decoration: none;">
            <span>Start 14-Day Trial</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. PRICING FAQS (Section 13F) -->
  <section id="pricing-faqs" class="section faq-section" aria-labelledby="pricing-faq-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          <span>Pricing Questions</span>
        </div>
        <h2 id="pricing-faq-heading" class="section-title">Pricing Frequently Asked Questions</h2>
        <p class="section-subtitle">Clear answers on connected accounts, publishing allowances, and billing.</p>
      </div>

      <div class="faq-accordion-group">
        <details class="faq-disclosure card-base" name="pricing-faq-accordion" open>
          <summary class="faq-summary">
            <span class="faq-question-text">What counts as a connected account?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>One profile, page or channel counts as one account. Connecting an Instagram profile and a Facebook Page uses two account slots.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">What counts toward my publishing allowance?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Each successful delivery to one account counts once. Publishing the same post to three accounts uses three deliveries. Drafts and failed attempts do not consume the allowance.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Are these prices per user?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Each plan includes the stated number of user seats. Your subscription price covers that bundle; it is not multiplied by every included user.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">How does yearly billing work?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Pay once for twelve months of access at the price of ten monthly payments. The page shows both the monthly equivalent and the amount charged yearly.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Does the annual plan include a full year's publishing allowance immediately?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>No. Publishing capacity renews each subscription month, including on yearly plans.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Are taxes included?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Displayed prices exclude applicable taxes. Review the final total before completing payment.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">What happens if I need a larger allowance?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Choose a larger plan or contact us about your requirements. We will show any price change before you agree to it.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Does this include social media management services?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>These are software subscriptions. Content production, campaign execution, ad spend and done-for-you social media services require a separate agreement.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Can I change my plan?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Contact us or use the available billing controls. Any effective date, price difference or proration must be shown before you confirm a change.</p>
          </div>
        </details>

        <!-- Conditional FAQ item: enabled only once cancellation flow & approved policy are live -->
        <details class="faq-disclosure card-base" name="pricing-faq-accordion" data-optional-feature="cancellation_faq" hidden>
          <summary class="faq-summary">
            <span class="faq-question-text">Can I cancel?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Under the proposed billing model, you can turn off renewal and retain access until your paid period ends.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="pricing-faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Which networks can I use?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Use the supported-platform list for the current product. Account limits describe how many profiles you can connect, not a promise that every network or format is supported.</p>
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- 7. CLOSING CTA (Section 13F) -->
  <section class="final-cta-section" aria-labelledby="pricing-closing-heading">
    <div class="container">
      <div class="final-cta-card">
        <div class="cta-ambient-glow" aria-hidden="true"></div>

        <div class="cta-content-inner">
          <div class="cta-eyebrow">
            <span class="cta-eyebrow-dot" aria-hidden="true"></span>
            <span>Package Guidance</span>
          </div>

          <h2 id="pricing-closing-heading" class="cta-title">
            Not sure which plan fits?
          </h2>

          <p class="cta-body">
            Tell us how many accounts and people you manage. We will help you choose a suitable starting point.
          </p>

          <div class="cta-actions-group">
            <button
              type="button"
              id="pricing-help-choose-btn"
              class="btn-primary cta-main-btn"
              data-plan-enquire="help-choose"
            >
              <span>Help Me Choose</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>

            <div class="cta-email-box">
              <a href="mailto:mail@daoz360.ai" class="cta-email-link" title="Send direct email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <span>mail@daoz360.ai</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
