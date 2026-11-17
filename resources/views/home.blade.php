@extends('layouts.app')

@section('title', 'DAOZ360 | Social Media Management')
@section('description', 'Bring your social media workflow together with DAOZ360. Explore a clearer way to organise your content and manage your social presence.')
@section('canonical', 'https://daoz360.ai/')

@section('content')
  <!-- 1. HERO SECTION -->
  <section class="hero-section" aria-labelledby="hero-heading">
    <div class="container hero-container">
      <!-- Left: Copy & CTAs -->
      <div class="hero-copy-column">
        <div class="hero-eyebrow">
          <span class="eyebrow-dot" aria-hidden="true"></span>
          <span>SOCIAL MEDIA MANAGEMENT</span>
        </div>

        <h1 id="hero-heading" class="hero-headline">
          <span class="headline-line">Your social media.</span>
          <span class="headline-line highlight-accent">All together.</span>
        </h1>

        <p class="hero-description">
          Bring your content, publishing and team into one workspace. Plan ahead, stay organised and make more room for the ideas that matter.
        </p>

        <div class="hero-actions-row">
          <button type="button" class="btn-primary hero-btn-main" data-open-contact>
            <span>Talk to Us</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </button>

          <button type="button" id="hero-explore-btn" class="btn-secondary hero-btn-sub">
            <span>Explore the Platform</span>
          </button>
        </div>

        <div class="hero-support-line">
          <span class="support-dot" aria-hidden="true">&bull;</span>
          <span class="support-text">Plan. Publish. Grow.</span>
        </div>
      </div>

      <!-- Right: 3D Composition Visual with Assembly Animation -->
      <div class="hero-visual-column">
        <div id="hero-visual-wrapper" class="hero-visual-wrapper">
          <div class="hero-image-card">
            <img
              src="{{ asset('assets/hero-3d.jpg') }}"
              alt="DAOZ360 Workspace Visual — Central sculptural orange chat form with white ceramic calendar and content tiles"
              class="hero-3d-render"
              width="720"
              height="540"
              loading="eager"
            />

            <div class="hero-floating-card top-right-card">
              <span class="floating-indicator" aria-hidden="true"></span>
              <span>Scheduled for publish</span>
            </div>

            <div class="hero-floating-card bottom-left-card">
              <span class="status-check-icon">&#10003;</span>
              <span>Draft approved</span>
            </div>
          </div>

          <div class="hero-visual-meta">
            <span class="badge-illustrative">Illustrative preview</span>

            <button
              type="button"
              id="hero-replay-btn"
              class="animation-replay-btn"
              title="Replay assembly entrance"
              aria-label="Replay visual animation"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
              <span>Replay</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. VALUE STATEMENT SECTION -->
  <section class="section section-soft value-section" aria-labelledby="value-heading">
    <div class="container">
      <div class="value-header">
        <div class="section-eyebrow">Core Purpose</div>
        <h2 id="value-heading" class="section-title value-title">
          More creating. Less coordinating.
        </h2>
        <p class="value-body">
          Social media works better when your ideas, content and people move together. DAOZ360 brings structure to the work behind every post, so you can focus on what you want to say.
        </p>
      </div>

      <div class="benefits-grid">
        <div class="benefit-card card-base">
          <div class="benefit-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-icon"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
          </div>
          <h3 class="benefit-card-title">A clearer publishing plan</h3>
          <p class="benefit-card-desc">Structured visual timeline across every channel and date.</p>
          <div class="benefit-check-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-check-icon"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Structured workflow</span>
          </div>
        </div>

        <div class="benefit-card card-base">
          <div class="benefit-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-icon"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="benefit-card-title">A more connected team</h3>
          <p class="benefit-card-desc">Review drafts, share feedback, and approve with clarity.</p>
          <div class="benefit-check-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-check-icon"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Structured workflow</span>
          </div>
        </div>

        <div class="benefit-card card-base">
          <div class="benefit-icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-icon"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg>
          </div>
          <h3 class="benefit-card-title">A consistent brand presence</h3>
          <p class="benefit-card-desc">Maintain voice, styling, and cadence with less friction.</p>
          <div class="benefit-check-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="benefit-check-icon"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Structured workflow</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. INTERACTIVE WORKFLOW SHOWCASE -->
  <section id="how-it-works" class="section workflow-section" aria-labelledby="workflow-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">Interactive Workflow</div>
        <h2 id="workflow-heading" class="section-title">
          From the first idea to the next post.
        </h2>
        <p class="section-subtitle">Bring each stage of your social media workflow into view.</p>
      </div>

      <!-- Tab List -->
      <div class="workflow-tablist-wrapper">
        <div role="tablist" aria-label="Workflow Stages" class="workflow-tablist">
          <button
            id="tab-btn-plan"
            data-tab-id="plan"
            role="tab"
            type="button"
            aria-selected="true"
            aria-controls="workflow-tabpanel"
            tabindex="0"
            class="workflow-tab-btn is-active"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-btn-icon" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            <span class="tab-btn-label">Plan</span>
          </button>

          <button
            id="tab-btn-create"
            data-tab-id="create"
            role="tab"
            type="button"
            aria-selected="false"
            aria-controls="workflow-tabpanel"
            tabindex="-1"
            class="workflow-tab-btn"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-btn-icon" aria-hidden="true"><path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><circle cx="11" cy="11" r="2"/></svg>
            <span class="tab-btn-label">Create</span>
          </button>

          <button
            id="tab-btn-publish"
            data-tab-id="publish"
            role="tab"
            type="button"
            aria-selected="false"
            aria-controls="workflow-tabpanel"
            tabindex="-1"
            class="workflow-tab-btn"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-btn-icon" aria-hidden="true"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <span class="tab-btn-label">Publish</span>
          </button>

          <button
            id="tab-btn-learn"
            data-tab-id="learn"
            role="tab"
            type="button"
            aria-selected="false"
            aria-controls="workflow-tabpanel"
            tabindex="-1"
            class="workflow-tab-btn"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-btn-icon" aria-hidden="true"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
            <span class="tab-btn-label">Learn</span>
          </button>
        </div>
      </div>

      <!-- Tab Panel -->
      <div
        id="workflow-tabpanel"
        role="tabpanel"
        aria-labelledby="tab-btn-plan"
        class="workflow-panel card-base"
      >
        <div class="panel-info-row">
          <div class="panel-text-content">
            <h3 id="workflow-stage-title" class="panel-stage-title">
              Give your content a clear direction.
            </h3>
            <p id="workflow-stage-body" class="panel-stage-body">
              Organise upcoming posts in a visual calendar and see how your content fits together across the week.
            </p>
          </div>
          <div class="panel-meta-pill">
            <span class="meta-pill-indicator"></span>
            <span id="workflow-stage-metrics">3 Campaigns active &bull; 14 Posts mapped</span>
          </div>
        </div>

        <div class="panel-preview-container">
          <!-- Stage 1: Plan -->
          <div data-workflow-mock="plan" class="mock-plan-view">
            <div class="mock-toolbar">
              <div class="mock-toolbar-left">
                <span class="mock-view-label">Calendar View</span>
                <span class="mock-badge-active">October 2026</span>
              </div>
              <span class="badge-illustrative">Illustrative preview</span>
            </div>
            <div class="mock-calendar-grid">
              <div class="mock-day-col">
                <div class="mock-day-header">Mon 26</div>
                <div class="mock-post-card draft">
                  <span class="post-tag">Campaign</span>
                  <p class="post-snippet">Product launch teaser announcement</p>
                  <div class="post-time">10:00 AM</div>
                </div>
              </div>
              <div class="mock-day-col is-today">
                <div class="mock-day-header highlight">Tue 27 (Today)</div>
                <div class="mock-post-card scheduled">
                  <span class="post-tag orange">Social</span>
                  <p class="post-snippet">Feature highlight: Clearer team workflows</p>
                  <div class="post-time">&#10003; 02:30 PM</div>
                </div>
                <div class="mock-post-card scheduled">
                  <span class="post-tag">Thread</span>
                  <p class="post-snippet">Behind the scenes with our creative team</p>
                  <div class="post-time">&#10003; 05:00 PM</div>
                </div>
              </div>
              <div class="mock-day-col">
                <div class="mock-day-header">Wed 28</div>
                <div class="mock-post-card draft">
                  <span class="post-tag">Everyday</span>
                  <p class="post-snippet">Mid-week community question &amp; poll</p>
                  <div class="post-time">11:15 AM</div>
                </div>
              </div>
              <div class="mock-day-col">
                <div class="mock-day-header">Thu 29</div>
                <div class="mock-post-card ready">
                  <span class="post-tag orange">Insights</span>
                  <p class="post-snippet">Weekly publishing patterns summary</p>
                  <div class="post-time">&#10003; 09:00 AM</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Stage 2: Create -->
          <div data-workflow-mock="create" class="mock-create-view" hidden>
            <div class="mock-toolbar">
              <span class="mock-view-label">Multi-Channel Composer</span>
              <span class="badge-illustrative">Illustrative preview</span>
            </div>
            <div class="mock-create-split">
              <div class="mock-editor-pane">
                <div class="mock-channel-tags">
                  <span class="channel-chip active">Channel A</span>
                  <span class="channel-chip active">Channel B</span>
                  <span class="channel-chip">Channel C</span>
                </div>
                <div class="mock-textarea-box">
                  <p class="mock-input-text">
                    Bringing all your social content into one shared view. Plan campaigns ahead, preview how they look, and publish with confidence.
                  </p>
                  <div class="mock-editor-tools">
                    <span class="tool-pill">Channel preview</span>
                    <span class="tool-pill">Media attachment</span>
                    <span class="tool-pill">Format check</span>
                  </div>
                </div>
              </div>
              <div class="mock-preview-pane">
                <div class="mock-phone-card">
                  <div class="phone-header">
                    <div class="phone-avatar"></div>
                    <div class="phone-meta">
                      <span class="phone-brand">DAOZ360</span>
                      <span class="phone-time">Preview mode</span>
                    </div>
                  </div>
                  <div class="phone-content-body">
                    Bringing all your social content into one shared view. Plan campaigns ahead...
                  </div>
                  <div class="phone-media-box">
                    <div class="phone-media-placeholder">Visual preview</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Stage 3: Publish -->
          <div data-workflow-mock="publish" class="mock-publish-view" hidden>
            <div class="mock-toolbar">
              <span class="mock-view-label">Publishing &amp; Dispatch Queue</span>
              <span class="badge-illustrative">Illustrative preview</span>
            </div>
            <div class="mock-queue-list">
              <div class="queue-item">
                <div class="queue-status-col text-orange">&#10003;</div>
                <div class="queue-info">
                  <span class="queue-title">Autumn Feature Series &bull; Part 1</span>
                  <span class="queue-accounts">Connected accounts: Primary brand</span>
                </div>
                <div class="queue-meta">
                  <span class="queue-badge ready">Scheduled for 14:00</span>
                </div>
              </div>
              <div class="queue-item">
                <div class="queue-status-col">&#9201;</div>
                <div class="queue-info">
                  <span class="queue-title">Product Walkthrough Video Clip</span>
                  <span class="queue-accounts">Connected accounts: Video feeds</span>
                </div>
                <div class="queue-meta">
                  <span class="queue-badge queued">Tomorrow at 09:30</span>
                </div>
              </div>
              <div class="queue-item">
                <div class="queue-status-col">&#9998;</div>
                <div class="queue-info">
                  <span class="queue-title">Weekend Discussion Starter</span>
                  <span class="queue-accounts">Connected accounts: Discussion channels</span>
                </div>
                <div class="queue-meta">
                  <span class="queue-badge draft">Draft pending review</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Stage 4: Learn -->
          <div data-workflow-mock="learn" class="mock-learn-view" hidden>
            <div class="mock-toolbar">
              <span class="mock-view-label">Content Performance Summary</span>
              <span class="badge-illustrative">Example data</span>
            </div>
            <div class="mock-charts-grid">
              <div class="chart-stat-card">
                <span class="chart-label">Publishing Consistency</span>
                <span class="chart-number">98.4%</span>
                <span class="chart-desc">Posts delivered on schedule</span>
              </div>
              <div class="chart-stat-card">
                <span class="chart-label">Content Engagement Trend</span>
                <div class="mini-bars-row">
                  <span class="bar" style="height: 40%;"></span>
                  <span class="bar" style="height: 60%;"></span>
                  <span class="bar" style="height: 55%;"></span>
                  <span class="bar highlight" style="height: 85%;"></span>
                  <span class="bar" style="height: 70%;"></span>
                  <span class="bar highlight" style="height: 95%;"></span>
                </div>
                <span class="chart-desc">Engagement patterns across recent posts</span>
              </div>
              <div class="chart-stat-card">
                <span class="chart-label">Top Content Format</span>
                <span class="chart-number">Visual Stories</span>
                <span class="chart-desc">Highest resonance with core followers</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="workflow-bottom-cta">
        <button type="button" id="workflow-explore-features-btn" class="btn-secondary">
          <span>Explore Product Features</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14"/><path d="m19 12-7 7-7-7"/></svg>
        </button>
      </div>
    </div>
  </section>

  <!-- 4. PRODUCT STORIES SECTION -->
  <section id="product-stories" class="section stories-section" aria-label="Product Features in Detail">
    <div class="container">
      <div class="stories-list">
        <!-- Story 1: Planning -->
        <div id="planning" class="story-row">
          <div class="story-content-col">
            <div class="story-category-tag">Calendar &amp; Scheduling</div>
            <h3 class="story-heading">A clearer calendar. A more consistent presence.</h3>
            <p class="story-body">
              See what is planned, prepare what is next and keep your publishing schedule organised. DAOZ360 helps you bring everyday posts and campaign content into the same view.
            </p>
            <ul class="story-points-list">
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Visual content planning.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Scheduled publishing.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Platform-specific content preparation.</span>
              </li>
            </ul>
            <button type="button" class="story-link-btn" data-open-contact>
              <span>Explore Planning and Publishing</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
          <div class="story-visual-col">
            <div class="story-image-card card-base">
              <img
                src="{{ asset('assets/story-planning-3d.jpg') }}"
                alt="A clearer calendar. A more consistent presence. visual"
                class="story-3d-image"
                loading="lazy"
                width="600"
                height="450"
              />
              <div class="story-badge-wrapper">
                <span class="badge-illustrative">Illustrative preview</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Story 2: Collaboration -->
        <div id="collaboration" class="story-row is-reversed">
          <div class="story-content-col">
            <div class="story-category-tag">Team Review</div>
            <h3 class="story-heading">Keep the conversation close to the content.</h3>
            <p class="story-body">
              Bring drafts, feedback and approvals into a shared workflow. Give your team a clearer view of what needs attention and what is ready for the next step.
            </p>
            <ul class="story-points-list">
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Shared content review.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Clear approval steps.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Better visibility across the team.</span>
              </li>
            </ul>
            <button type="button" class="story-link-btn" data-open-contact>
              <span>Explore Team Collaboration</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
          <div class="story-visual-col">
            <div class="story-image-card card-base">
              <img
                src="{{ asset('assets/story-collaboration-3d.jpg') }}"
                alt="Keep the conversation close to the content. visual"
                class="story-3d-image"
                loading="lazy"
                width="600"
                height="450"
              />
              <div class="story-badge-wrapper">
                <span class="badge-illustrative">Illustrative preview</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Story 3: Insights -->
        <div id="insights" class="story-row">
          <div class="story-content-col">
            <div class="story-category-tag">Performance Insights</div>
            <h3 class="story-heading">Know what to build on.</h3>
            <p class="story-body">
              Look back at your content performance and identify the ideas worth developing. Bring those insights into your next round of planning.
            </p>
            <ul class="story-points-list">
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Review content performance.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Understand engagement patterns.</span>
              </li>
              <li class="story-point-item">
                <span class="point-icon-box" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="point-check"><path d="M20 6 9 17l-5-5"/></svg>
                </span>
                <span class="point-text">Make more informed content decisions.</span>
              </li>
            </ul>
            <button type="button" class="story-link-btn" data-open-contact>
              <span>Explore Insights</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
          <div class="story-visual-col">
            <div class="story-image-card card-base">
              <img
                src="{{ asset('assets/story-insights-3d.jpg') }}"
                alt="Know what to build on. visual"
                class="story-3d-image"
                loading="lazy"
                width="600"
                height="450"
              />
              <div class="story-badge-wrapper">
                <span class="badge-illustrative">Example data</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. SUPPORTING CAPABILITIES SECTION -->
  <section id="product" class="section section-soft capabilities-section" aria-labelledby="capabilities-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">Supporting Capabilities</div>
        <h2 id="capabilities-heading" class="section-title">
          The details that keep work flowing.
        </h2>
        <p class="section-subtitle">
          Thoughtful capabilities designed to support everyday marketing operations without unnecessary clutter.
        </p>
      </div>

      <div class="capabilities-grid">
        <div class="capability-card card-base">
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/><path d="M8 10v4"/><path d="M12 10v2"/><path d="M16 10v6"/></svg>
          </div>
          <h3 class="cap-card-title">Media Library</h3>
          <p class="cap-card-desc">Keep your images and videos organised and ready for your next post.</p>
        </div>

        <div class="capability-card card-base">
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
          <h3 class="cap-card-title">Content Previews</h3>
          <p class="cap-card-desc">Review how your message is presented before you publish.</p>
        </div>

        <div class="capability-card card-base" data-optional-feature="ai_writing_assistance" hidden>
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg>
          </div>
          <h3 class="cap-card-title">AI Writing Assistance</h3>
          <p class="cap-card-desc">Explore caption ideas, refine your wording and adapt drafts while keeping the final decision with your team.</p>
        </div>

        <div class="capability-card card-base" data-optional-feature="templates_and_hashtags" hidden>
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
          </div>
          <h3 class="cap-card-title">Templates and Hashtag Sets</h3>
          <p class="cap-card-desc">Keep useful content formats and hashtag groups ready to reuse.</p>
        </div>

        <div class="capability-card card-base" data-optional-feature="brand_workspaces" hidden>
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
          </div>
          <h3 class="cap-card-title">Brand Workspaces</h3>
          <p class="cap-card-desc">Keep content, accounts and team activity organised for each brand you manage.</p>
        </div>

        <div class="capability-card card-base" data-optional-feature="bulk_recurring_scheduling" hidden>
          <div class="cap-icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cap-icon"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.25V14"/><circle cx="16" cy="16" r="6"/></svg>
          </div>
          <h3 class="cap-card-title">Bulk and Recurring Scheduling</h3>
          <p class="cap-card-desc">Prepare repeatable publishing workflows for content that follows a regular schedule.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. AUDIENCE / SOLUTIONS SECTION -->
  <section id="solutions" class="section audience-section" aria-labelledby="audience-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">Target Solutions</div>
        <h2 id="audience-heading" class="section-title">
          Built around the people behind the posts.
        </h2>
        <p class="section-subtitle">
          Tailored for the teams and specialists driving modern social content forward.
        </p>
      </div>

      <div class="audience-grid">
        <div class="audience-card card-base">
          <div class="audience-header-row">
            <div class="audience-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="audience-icon"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
            </div>
            <span class="audience-focus-pill">Campaign Alignment</span>
          </div>
          <h3 class="audience-card-title">Marketing teams</h3>
          <p class="audience-card-desc">Bring campaign planning, content preparation and publishing into a shared workflow.</p>
        </div>

        <div class="audience-card card-base">
          <div class="audience-header-row">
            <div class="audience-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="audience-icon"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3Z"/></svg>
            </div>
            <span class="audience-focus-pill">Cadence &amp; Organisation</span>
          </div>
          <h3 class="audience-card-title">Social media managers</h3>
          <p class="audience-card-desc">Keep everyday publishing organised while making room for your next creative idea.</p>
        </div>

        <div class="audience-card card-base">
          <div class="audience-header-row">
            <div class="audience-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="audience-icon"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
            </div>
            <span class="audience-focus-pill">Consistent Presence</span>
          </div>
          <h3 class="audience-card-title">Growing businesses</h3>
          <p class="audience-card-desc">Build a more consistent social presence with a clearer way to manage your content.</p>
        </div>

        <div class="audience-card card-base" data-optional-feature="agency_audience_card" hidden>
          <div class="audience-header-row">
            <div class="audience-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="audience-icon"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <span class="audience-focus-pill">Multi-Brand Coordination</span>
          </div>
          <h3 class="audience-card-title">Agency teams</h3>
          <p class="audience-card-desc">Keep each brand’s content and publishing activity organised as your client work grows.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- OPTIONAL INTEGRATIONS SECTION (Hidden data-driven component until support matrix is verified) -->
  <section
    id="integrations"
    class="section integrations-section"
    data-optional-feature="integrations_section"
    hidden
    aria-labelledby="integrations-heading"
  >
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">Connected Channels</div>
        <h2 id="integrations-heading" class="section-title">
          Your channels, brought into view.
        </h2>
        <p class="section-subtitle">
          Manage your supported social accounts through a connected publishing workflow.
        </p>
        <div style="margin-top: 24px;">
          <button type="button" class="btn-secondary" data-open-contact>
            <span>Ask About Your Platforms</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. FAQ SECTION -->
  <section id="faqs" class="section section-soft faq-section" aria-labelledby="faq-heading">
    <div class="container">
      <div class="section-header">
        <div class="section-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          <span>Got Questions?</span>
        </div>
        <h2 id="faq-heading" class="section-title">Frequently Asked Questions</h2>
        <p class="section-subtitle">Clear answers about DAOZ360 and getting started.</p>
      </div>

      <div class="faq-accordion-group">
        <details class="faq-disclosure card-base" name="faq-accordion" open>
          <summary class="faq-summary">
            <span class="faq-question-text">What is DAOZ360?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>DAOZ360 is a social media management tool designed to bring the work behind your social presence into one place.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Who is DAOZ360 for?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>DAOZ360 is designed for marketing teams, social media managers and businesses looking for a more organised social media workflow.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Which social platforms can I connect?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Contact us with the platforms and account types you use. We can help you check the available integrations and supported publishing formats.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">Can my team work together in DAOZ360?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>DAOZ360 brings content review and collaboration into a shared workflow, helping your team coordinate the steps before publishing.</p>
          </div>
        </details>

        <details class="faq-disclosure card-base" name="faq-accordion">
          <summary class="faq-summary">
            <span class="faq-question-text">How can I learn more about DAOZ360?</span>
            <span class="faq-icon-wrapper" aria-hidden="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="faq-chevron"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </summary>
          <div class="faq-answer-content">
            <p>Tell us about your social media workflow at mail@daoz360.ai. We will help you explore whether DAOZ360 fits your needs.</p>
          </div>
        </details>
      </div>
    </div>
  </section>

  <!-- 8. FINAL CTA SECTION -->
  <section id="contact" class="final-cta-section" aria-labelledby="cta-heading">
    <div class="container">
      <div class="final-cta-card">
        <div class="cta-ambient-glow" aria-hidden="true"></div>

        <div class="cta-content-inner">
          <div class="cta-eyebrow">
            <span class="cta-eyebrow-dot" aria-hidden="true"></span>
            <span>Direct Conversation</span>
          </div>

          <h2 id="cta-heading" class="cta-title">
            Bring your next campaign together.
          </h2>

          <p class="cta-body">
            Tell us how you manage social media today. Let’s explore a clearer way to plan, publish and work together.
          </p>

          <div class="cta-actions-group">
            <button type="button" class="btn-primary cta-main-btn" data-open-contact>
              <span>Talk to Us</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>

            <div class="cta-email-box">
              <a href="mailto:mail@daoz360.ai" class="cta-email-link" title="Send direct email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <span>mail@daoz360.ai</span>
              </a>

              <button
                type="button"
                id="cta-copy-email-btn"
                class="cta-copy-btn"
                title="Copy email address"
                aria-label="Copy email address"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                <span id="cta-copy-email-label">Copy</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
