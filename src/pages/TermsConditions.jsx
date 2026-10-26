import React, { useState, useEffect } from 'react';
import { termsConditionsContent, legalMetadata } from '../legalData';
import { ArrowLeft, Shield, AlertCircle, FileText, ExternalLink } from '../components/Icons';
import './Legal.css';

export default function TermsConditions({ onNavigate }) {
  const [activeSection, setActiveSection] = useState(termsConditionsContent.sections[0].id);
  const [copiedText, setCopiedText] = useState(null);

  useEffect(() => {
    window.scrollTo(0, 0);
    document.title = 'Terms & Conditions | DAOZ360';
  }, []);

  useEffect(() => {
    const handleScroll = () => {
      const scrollPos = window.scrollY + 140;
      for (const sec of termsConditionsContent.sections) {
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
            <span className="legal-breadcrumb-current">Terms & Conditions</span>
          </nav>

          <div className="legal-meta-pills">
            <span className="legal-badge-pill">
              <FileText size={13} aria-hidden="true" />
              <span>Platform Terms of Use</span>
            </span>
            <span className="legal-date-pill">
              Effective: {termsConditionsContent.effectiveDate}
            </span>
          </div>

          <h1 className="legal-page-title">{termsConditionsContent.title}</h1>
          <p className="legal-page-summary">{termsConditionsContent.summary}</p>

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
              onClick={() => onNavigate('privacy-policy')}
            >
              <span>View Privacy Policy</span>
              <ExternalLink size={14} aria-hidden="true" />
            </button>

            <button
              type="button"
              className="legal-alt-link"
              onClick={() => onNavigate('contact')}
            >
              <span>Contact Support</span>
            </button>
          </div>
        </header>

        {/* Mobile Horizontal Quick Navigation */}
        <div className="legal-mobile-toc-bar" aria-label="Quick jump to section">
          <div className="legal-mobile-toc-scroll">
            {termsConditionsContent.sections.map((sec) => (
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
              <span>Agreement Clauses</span>
            </div>
            <ul className="legal-toc-list">
              {termsConditionsContent.sections.map((sec) => (
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

          {/* Main Terms Content Body */}
          <main className="legal-content-body">
            {termsConditionsContent.sections.map((sec) => (
              <section key={sec.id} id={sec.id} className="legal-section-card">
                <div className="legal-section-header">
                  <span className="legal-section-num">{sec.number}.</span>
                  <h2 className="legal-section-title">{sec.title}</h2>
                </div>

                <p className="legal-section-paragraph">{sec.content}</p>

                {/* Specific highlight for Material Permission */}
                {sec.id === 'website-material-permission' && (
                  <div className="legal-notice-box">
                    <div className="legal-notice-title">
                      <AlertCircle size={16} aria-hidden="true" />
                      <span>Permitted Scope of Use</span>
                    </div>
                    <span>
                      Access to DAOZ360 is granted strictly under these conditions. Mirroring, redistribution,
                      reverse engineering, or unauthorized extraction of service code, interfaces, or brand assets
                      is prohibited.
                    </span>
                  </div>
                )}

                {/* Specific highlight for Revision Notice */}
                {sec.id === 'revisions' && (
                  <div className="legal-notice-box">
                    <div className="legal-notice-title">
                      <Shield size={16} aria-hidden="true" />
                      <span>Advance Revision Period</span>
                    </div>
                    <span>
                      We believe in transparent operational notice. Any material revisions to these terms will be
                      preceded by at least thirty (30) days of advance notification to registered users.
                    </span>
                  </div>
                )}

                {/* Details Panel for Section 10: Questions & Correspondence */}
                {sec.email && (
                  <div className="legal-contact-panel">
                    <div className="legal-contact-channel">
                      <span className="legal-channel-label">Official Legal Inquiry</span>
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
                      <span className="legal-channel-label">Registered Correspondence Address</span>
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
