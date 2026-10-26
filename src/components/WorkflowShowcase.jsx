import React, { useState } from 'react';
import { workflowContent } from '../content';
import { Calendar, PenTool, Send, BarChart3, Clock, Check, Sparkles, MessageSquare, ArrowDown } from './Icons';
import './WorkflowShowcase.css';

export default function WorkflowShowcase() {
  const [activeTabId, setActiveTabId] = useState('plan');

  const activeTab = workflowContent.tabs.find((t) => t.id === activeTabId) || workflowContent.tabs[0];

  const handleKeyDown = (e, index) => {
    const tabs = workflowContent.tabs;
    let nextIndex = index;
    if (e.key === 'ArrowRight') {
      nextIndex = (index + 1) % tabs.length;
    } else if (e.key === 'ArrowLeft') {
      nextIndex = (index - 1 + tabs.length) % tabs.length;
    }
    if (nextIndex !== index) {
      e.preventDefault();
      setActiveTabId(tabs[nextIndex].id);
      document.getElementById(`tab-btn-${tabs[nextIndex].id}`)?.focus();
    }
  };

  const handleScrollToFeatures = () => {
    const el = document.getElementById('product-stories');
    if (el) {
      el.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <section id="how-it-works" className="section workflow-section" aria-labelledby="workflow-heading">
      <div className="container">
        <div className="section-header">
          <div className="section-eyebrow">Interactive Workflow</div>
          <h2 id="workflow-heading" className="section-title">
            {workflowContent.heading}
          </h2>
          <p className="section-subtitle">{workflowContent.introduction}</p>
        </div>

        {/* Tab List */}
        <div className="workflow-tablist-wrapper">
          <div
            role="tablist"
            aria-label="Workflow Stages"
            className="workflow-tablist"
          >
            {workflowContent.tabs.map((tab, idx) => {
              const isSelected = tab.id === activeTabId;
              const icons = {
                plan: Calendar,
                create: PenTool,
                publish: Send,
                learn: BarChart3
              };
              const TabIcon = icons[tab.id];

              return (
                <button
                  key={tab.id}
                  id={`tab-btn-${tab.id}`}
                  role="tab"
                  type="button"
                  aria-selected={isSelected}
                  aria-controls={`tab-panel-${tab.id}`}
                  tabIndex={isSelected ? 0 : -1}
                  className={`workflow-tab-btn ${isSelected ? 'is-active' : ''}`}
                  onClick={() => setActiveTabId(tab.id)}
                  onKeyDown={(e) => handleKeyDown(e, idx)}
                >
                  <TabIcon size={18} className="tab-btn-icon" aria-hidden="true" />
                  <span className="tab-btn-label">{tab.label}</span>
                  {isSelected && <span className="tab-active-indicator" aria-hidden="true"></span>}
                </button>
              );
            })}
          </div>
        </div>

        {/* Tab Panel */}
        <div
          id={`tab-panel-${activeTab.id}`}
          role="tabpanel"
          aria-labelledby={`tab-btn-${activeTab.id}`}
          className="workflow-panel card-base"
        >
          {/* Top Info Bar */}
          <div className="panel-info-row">
            <div className="panel-text-content">
              <h3 className="panel-stage-title">{activeTab.title}</h3>
              <p className="panel-stage-body">{activeTab.body}</p>
            </div>
            <div className="panel-meta-pill">
              <span className="meta-pill-indicator"></span>
              <span>{activeTab.metrics}</span>
            </div>
          </div>

          {/* Interactive UI Mockup for Active Stage */}
          <div className="panel-preview-container">
            {activeTab.id === 'plan' && (
              <div className="mock-plan-view">
                <div className="mock-toolbar">
                  <div className="mock-toolbar-left">
                    <span className="mock-view-label">Calendar View</span>
                    <span className="mock-badge-active">October 2026</span>
                  </div>
                  <span className="badge-illustrative">Illustrative preview</span>
                </div>
                <div className="mock-calendar-grid">
                  <div className="mock-day-col">
                    <div className="mock-day-header">Mon 26</div>
                    <div className="mock-post-card draft">
                      <span className="post-tag">Campaign</span>
                      <p className="post-snippet">Product launch teaser announcement</p>
                      <div className="post-time"><Clock size={12} /> 10:00 AM</div>
                    </div>
                  </div>
                  <div className="mock-day-col is-today">
                    <div className="mock-day-header highlight">Tue 27 (Today)</div>
                    <div className="mock-post-card scheduled">
                      <span className="post-tag orange">Social</span>
                      <p className="post-snippet">Feature highlight: Clearer team workflows</p>
                      <div className="post-time"><Check size={12} /> 02:30 PM</div>
                    </div>
                    <div className="mock-post-card scheduled">
                      <span className="post-tag">Thread</span>
                      <p className="post-snippet">Behind the scenes with our creative team</p>
                      <div className="post-time"><Check size={12} /> 05:00 PM</div>
                    </div>
                  </div>
                  <div className="mock-day-col">
                    <div className="mock-day-header">Wed 28</div>
                    <div className="mock-post-card draft">
                      <span className="post-tag">Everyday</span>
                      <p className="post-snippet">Mid-week community question & poll</p>
                      <div className="post-time"><Clock size={12} /> 11:15 AM</div>
                    </div>
                  </div>
                  <div className="mock-day-col">
                    <div className="mock-day-header">Thu 29</div>
                    <div className="mock-post-card ready">
                      <span className="post-tag orange">Insights</span>
                      <p className="post-snippet">Weekly publishing patterns summary</p>
                      <div className="post-time"><Check size={12} /> 09:00 AM</div>
                    </div>
                  </div>
                </div>
              </div>
            )}

            {activeTab.id === 'create' && (
              <div className="mock-create-view">
                <div className="mock-toolbar">
                  <span className="mock-view-label">Multi-Channel Composer</span>
                  <span className="badge-illustrative">Illustrative preview</span>
                </div>
                <div className="mock-create-split">
                  <div className="mock-editor-pane">
                    <div className="mock-channel-tags">
                      <span className="channel-chip active">Channel A</span>
                      <span className="channel-chip active">Channel B</span>
                      <span className="channel-chip">Channel C</span>
                    </div>
                    <div className="mock-textarea-box">
                      <p className="mock-input-text">
                        Bringing all your social content into one shared view. Plan campaigns ahead, preview how they look, and publish with confidence.
                      </p>
                      <div className="mock-editor-tools">
                        <span className="tool-pill"><Sparkles size={13} /> AI refine tone</span>
                        <span className="tool-pill"># Hashtag sets</span>
                        <span className="tool-pill">Attach media</span>
                      </div>
                    </div>
                  </div>
                  <div className="mock-preview-pane">
                    <div className="mock-phone-card">
                      <div className="phone-header">
                        <div className="phone-avatar"></div>
                        <div className="phone-meta">
                          <span className="phone-brand">DAOZ360</span>
                          <span className="phone-time">Preview mode</span>
                        </div>
                      </div>
                      <div className="phone-content-body">
                        Bringing all your social content into one shared view. Plan campaigns ahead...
                      </div>
                      <div className="phone-media-box">
                        <div className="phone-media-placeholder">Visual preview</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            )}

            {activeTab.id === 'publish' && (
              <div className="mock-publish-view">
                <div className="mock-toolbar">
                  <span className="mock-view-label">Publishing & Dispatch Queue</span>
                  <span className="badge-illustrative">Illustrative preview</span>
                </div>
                <div className="mock-queue-list">
                  <div className="queue-item">
                    <div className="queue-status-col"><Check size={16} className="text-orange" /></div>
                    <div className="queue-info">
                      <span className="queue-title">Autumn Feature Series • Part 1</span>
                      <span className="queue-accounts">Connected accounts: Primary brand</span>
                    </div>
                    <div className="queue-meta">
                      <span className="queue-badge ready">Scheduled for 14:00</span>
                    </div>
                  </div>
                  <div className="queue-item">
                    <div className="queue-status-col"><Clock size={16} /></div>
                    <div className="queue-info">
                      <span className="queue-title">Product Walkthrough Video Clip</span>
                      <span className="queue-accounts">Connected accounts: Video feeds</span>
                    </div>
                    <div className="queue-meta">
                      <span className="queue-badge queued">Tomorrow at 09:30</span>
                    </div>
                  </div>
                  <div className="queue-item">
                    <div className="queue-status-col"><MessageSquare size={16} /></div>
                    <div className="queue-info">
                      <span className="queue-title">Weekend Discussion Starter</span>
                      <span className="queue-accounts">Connected accounts: Discussion channels</span>
                    </div>
                    <div className="queue-meta">
                      <span className="queue-badge draft">Draft pending review</span>
                    </div>
                  </div>
                </div>
              </div>
            )}

            {activeTab.id === 'learn' && (
              <div className="mock-learn-view">
                <div className="mock-toolbar">
                  <span className="mock-view-label">Content Performance Summary</span>
                  <span className="badge-illustrative">Example data</span>
                </div>
                <div className="mock-charts-grid">
                  <div className="chart-stat-card">
                    <span className="chart-label">Publishing Consistency</span>
                    <span className="chart-number">98.4%</span>
                    <span className="chart-desc">Posts delivered on schedule</span>
                  </div>
                  <div className="chart-stat-card">
                    <span className="chart-label">Content Engagement Trend</span>
                    <div className="mini-bars-row">
                      <span className="bar" style={{ height: '40%' }}></span>
                      <span className="bar" style={{ height: '60%' }}></span>
                      <span className="bar" style={{ height: '55%' }}></span>
                      <span className="bar highlight" style={{ height: '85%' }}></span>
                      <span className="bar" style={{ height: '70%' }}></span>
                      <span className="bar highlight" style={{ height: '95%' }}></span>
                    </div>
                    <span className="chart-desc">Engagement patterns across recent posts</span>
                  </div>
                  <div className="chart-stat-card">
                    <span className="chart-label">Top Content Format</span>
                    <span className="chart-number">Visual Stories</span>
                    <span className="chart-desc">Highest resonance with core followers</span>
                  </div>
                </div>
              </div>
            )}
          </div>
        </div>

        {/* Action Button Below */}
        <div className="workflow-bottom-cta">
          <button
            type="button"
            className="btn-secondary"
            onClick={handleScrollToFeatures}
          >
            <span>{workflowContent.ctaText}</span>
            <ArrowDown size={16} aria-hidden="true" />
          </button>
        </div>
      </div>
    </section>
  );
}
