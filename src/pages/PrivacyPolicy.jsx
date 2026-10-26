import React, { useState, useEffect } from 'react';
import { privacyPolicyContent, legalMetadata } from '../legalData';
import { ArrowLeft, Check, Shield, Mail, Globe, MapPin, ExternalLink } from '../components/Icons';
import './Legal.css';

export default function PrivacyPolicy({ onNavigate }) {
  const [activeSection, setActiveSection] = useState(privacyPolicyContent.sections[0].id);
  const [copiedText, setCopiedText] = useState(null);

  useEffect(() => {
    window.scrollTo(0, 0);
    document.title = 'Privacy Policy | DAOZ360';
  }, []);

  useEffect(() => {
    const handleScroll = () => {
      const scrollPos = window.scrollY + 140;
      for (const sec of privacyPolicyContent.sections) {
        const el = document.getElementById(sec.id);
        if (el) {
          const top = el.offsetTop;
          const height = el.offsetHeight;
          if (scrollPos >= top && scrollPos < top + height) {
            setActiveSection(sec.id);
            break;
          }
        }
      }
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const handleCopy = (text, label) => {
    navigator.clipboard.writeText(text);
    setCopiedText(label);
    setTimeout(() => setCopiedText(null), 2000);
  };

  const scrollToSection = (e, id) => {
    e.preventDefault();
    setActiveSection(id);
    const target = document.getElementById(id);
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <div className="legal-page-wrapper">
      <div className="container">
        {/* Header Hero */}
        <header className="legal-header">
          <nav className="legal-breadcrumb" aria-label="Breadcrumb">
            <button
              type="button"
              className="legal-breadcrumb-link"
              onClick={() => onNavigate('home')}
            >
              DAOZ360
            </button>
            <span className="legal-breadcrumb-sep">/</span>
            <span>Legal</span>
            <span className="legal-breadcrumb-sep">/</span>
            <span className="legal-breadcrumb-current">Privacy Policy</span>
          </nav>

          <div className="legal-meta-pills">
            <span className="legal-badge-pill">
              <Shield size={13} aria-hidden="true" />
              <span>Official Privacy Notice</span>
            </span>
            <span className="legal-date-pill">
              Effective: {privacyPolicyContent.effectiveDate}
            </span>
          </div>

          <h1 className="legal-page-title">{privacyPolicyContent.title}</h1>
          <p className="legal-page-summary">{privacyPolicyContent.summary}</p>

          <div className="legal-page-actions">
            <button
              type="button"
              className="legal-back-btn"
              onClick={() => onNavigate('home')}
              aria-label="Back to Homepage"
            >
              <ArrowLeft size={16} aria-hidden="true" />
              <span>Back to Home</span>
            </button>

            <button
              type="button"
              className="legal-alt-link"
              onClick={() => onNavigate('terms-conditions')}
            >
              <span>View Terms & Conditions</span>
              <ExternalLink size={14} aria-hidden="true" />
            </button>

            <button
              type="button"
              className="legal-alt-link"
              onClick={() => onNavigate('contact')}
            >
              <span>Contact Privacy Team</span>
            </button>
          </div>
        </header>

        {/* Mobile Horizontal Quick Navigation */}
        <div className="legal-mobile-toc-bar" aria-label="Quick jump to section">
          <div className="legal-mobile-toc-scroll">
            {privacyPolicyContent.sections.map((sec) => (
              <a
                key={sec.id}
                href={`#${sec.id}`}
                className={`legal-mobile-pill ${activeSection === sec.id ? 'is-active' : ''}`}
                onClick={(e) => scrollToSection(e, sec.id)}
              >
                <span>{sec.number}. {sec.title}</span>
              </a>
            ))}
          </div>
        </div>

        {/* Two-Column Grid: Sticky Sidebar + Content Area */}
        <div className="legal-layout-grid">
          {/* Desktop Table of Contents Sidebar */}
          <aside className="legal-toc-sidebar" aria-label="Table of Contents">
            <div className="legal-toc-title">
              <span>Policy Sections</span>
            </div>
            <ul className="legal-toc-list">
              {privacyPolicyContent.sections.map((sec) => (
                <li key={sec.id}>
                  <a
                    href={`#${sec.id}`}
                    className={`legal-toc-link ${activeSection === sec.id ? 'is-active' : ''}`}
                    onClick={(e) => scrollToSection(e, sec.id)}
                  >
                    <span className="legal-toc-num">{sec.number}.</span>
                    <span>{sec.title}</span>
                  </a>
                </li>
              ))}
            </ul>
          </aside>

          {/* Main Policy Content Body */}
          <main className="legal-content-body">
            {privacyPolicyContent.sections.map((sec) => (
              <section key={sec.id} id={sec.id} className="legal-section-card">
                <div className="legal-section-header">
                  <span className="legal-section-num">{sec.number}.</span>
                  <h2 className="legal-section-title">{sec.title}</h2>
                </div>

                <p className="legal-section-paragraph">{sec.content}</p>

                {/* Sub-grid for Section 1: Data Handled */}
                {sec.details && (
                  <div className="legal-sub-grid">
                    {sec.details.map((item) => (
                      <div key={item.label} className="legal-sub-card">
                        <div className="legal-sub-label">
                          <span className="legal-sub-dot"></span>
                          <span>{item.label}</span>
                        </div>
                        <p className="legal-sub-desc">{item.desc}</p>
                      </div>
                    ))}
                  </div>
                )}

                {/* Checklist for Section 2: Processing Purposes */}
                {sec.highlights && (
                  <ul className="legal-checklist">
                    {sec.highlights.map((highlight, idx) => (
                      <li key={idx} className="legal-checklist-item">
                        <Check size={16} className="legal-check-icon" aria-hidden="true" />
                        <span>{highlight}</span>
                      </li>
                    ))}
                  </ul>
                )}

                {/* Highlight Notice for Section 3: Disclosure */}
                {sec.id === 'disclosure' && (
                  <div className="legal-notice-box">
                    <div className="legal-notice-title">
                      <Shield size={16} aria-hidden="true" />
                      <span>Zero Personal Data Trading</span>
                    </div>
                    <span>
                      DAOZ360 maintains a strict policy: we do not sell or trade personal details.
                      Any data transfer requires explicit authorization or arises solely under statutory legal obligation.
                    </span>
                  </div>
                )}

                {/* Details Panel for Section 6: Inquiries & Correspondence */}
                {sec.email && (
                  <div className="legal-contact-panel">
                    <div className="legal-contact-channel">
                      <span className="legal-channel-label">Official Privacy Contact</span>
                      <span className="legal-channel-value">
                        <a href={`mailto:${sec.email}`} className="legal-channel-link">
                          {sec.email}
                        </a>
                      </span>
                      <button
                        type="button"
                        className="legal-mobile-pill"
                        style={{ marginTop: '8px', width: 'fit-content' }}
                        onClick={() => handleCopy(sec.email, 'email')}
                      >
                        {copiedText === 'email' ? 'Copied Email!' : 'Copy Email Address'}
                      </button>
                    </div>

                    <div className="legal-contact-channel">
                      <span className="legal-channel-label">Registered Office Address</span>
                      <span className="legal-channel-value">{sec.address}</span>
                      <button
                        type="button"
                        className="legal-mobile-pill"
                        style={{ marginTop: '8px', width: 'fit-content' }}
                        onClick={() => handleCopy(sec.address, 'address')}
                      >
                        {copiedText === 'address' ? 'Copied Address!' : 'Copy Address'}
                      </button>
                    </div>
                  </div>
                )}
              </section>
            ))}
          </main>
        </div>
      </div>
    </div>
  );
}
