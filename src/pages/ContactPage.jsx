import React, { useState, useEffect } from 'react';
import { contactPageContent, legalMetadata } from '../legalData';
import { Mail, Globe, MapPin, ArrowLeft, ArrowUpRight, Copy, Check, MessageSquare, Shield, ExternalLink } from '../components/Icons';
import './Legal.css';

export default function ContactPage({ onNavigate }) {
  const [selectedType, setSelectedType] = useState('product');
  const [senderName, setSenderName] = useState('');
  const [senderEmail, setSenderEmail] = useState('');
  const [senderChannels, setSenderChannels] = useState('');
  const [senderMessage, setSenderMessage] = useState('');
  const [copiedDraft, setCopiedDraft] = useState(false);

  useEffect(() => {
    window.scrollTo(0, 0);
    document.title = 'Contact Us | DAOZ360';
  }, []);

  const currentTypeObj = contactPageContent.inquiryTypes.find((t) => t.id === selectedType) || contactPageContent.inquiryTypes[0];

  const generateMailtoUrl = () => {
    const subject = encodeURIComponent(`[${currentTypeObj.label}] DAOZ360 Inquiry from ${senderName || 'Prospective User'}`);
    const bodyText = encodeURIComponent(
      `Hello DAOZ360 Team,\n\n` +
      `Inquiry Category: ${currentTypeObj.label}\n` +
      `Name: ${senderName || 'Not specified'}\n` +
      `Contact Email: ${senderEmail || 'Not specified'}\n` +
      `Channels Managed: ${senderChannels || 'Not specified'}\n\n` +
      `Message:\n${senderMessage || 'I would like to explore how DAOZ360 can help manage our social media workflow.'}\n\n` +
      `Sent via daoz360.ai contact portal`
    );
    return `mailto:${contactPageContent.email}?subject=${subject}&body=${bodyText}`;
  };

  const handleCopyDraft = () => {
    const draft = 
      `To: ${contactPageContent.email}\n` +
      `Subject: [${currentTypeObj.label}] DAOZ360 Inquiry\n\n` +
      `Name: ${senderName || 'Not specified'}\n` +
      `Email: ${senderEmail || 'Not specified'}\n` +
      `Channels Managed: ${senderChannels || 'Not specified'}\n\n` +
      `Message:\n${senderMessage || 'I would like to explore how DAOZ360 can help manage our social media workflow.'}`;
    navigator.clipboard.writeText(draft);
    setCopiedDraft(true);
    setTimeout(() => setCopiedDraft(false), 2500);
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
            <span className="legal-breadcrumb-current">Contact</span>
          </nav>

          <div className="legal-meta-pills">
            <span className="legal-badge-pill">
              <Mail size={13} aria-hidden="true" />
              <span>Direct Inquiries</span>
            </span>
            <span className="legal-date-pill">Official Channel: mail@daoz360.ai</span>
          </div>

          <h1 className="legal-page-title">{contactPageContent.title}</h1>
          <p className="legal-page-summary">{contactPageContent.description}</p>

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
              <span>Privacy Policy</span>
              <ExternalLink size={14} aria-hidden="true" />
            </button>

            <button
              type="button"
              className="legal-alt-link"
              onClick={() => onNavigate('terms-conditions')}
            >
              <span>Terms & Conditions</span>
              <ExternalLink size={14} aria-hidden="true" />
            </button>
          </div>
        </header>

        {/* Content Layout */}
        <div className="contact-page-grid">
          {/* Column 1: Verified Channels */}
          <div className="contact-info-col">
            <div className="contact-channel-card">
              <div className="contact-channel-icon-wrap">
                <Mail size={22} aria-hidden="true" />
              </div>
              <h2 className="contact-channel-title">Direct Email</h2>
              <p className="contact-channel-desc">
                For product enquiries, account support, privacy questions or billing queries, send your requirements directly.
              </p>
              <a
                href={`mailto:${contactPageContent.email}`}
                className="contact-channel-action"
                aria-label="Send email to DAOZ360"
              >
                <span>{contactPageContent.email}</span>
                <ArrowUpRight size={16} aria-hidden="true" />
              </a>
            </div>

            <div className="contact-channel-card">
              <div className="contact-channel-icon-wrap">
                <Globe size={22} aria-hidden="true" />
              </div>
              <h2 className="contact-channel-title">Official Domain</h2>
              <p className="contact-channel-desc">
                Verified platform web address and authorized portal endpoints.
              </p>
              <a
                href={contactPageContent.domain}
                target="_blank"
                rel="noopener noreferrer"
                className="contact-channel-action"
              >
                <span>daoz360.ai</span>
                <ExternalLink size={14} aria-hidden="true" />
              </a>
            </div>

            <div className="contact-channel-card">
              <div className="contact-channel-icon-wrap">
                <MapPin size={22} aria-hidden="true" />
              </div>
              <h2 className="contact-channel-title">Registered Office</h2>
              <p className="contact-channel-desc">
                {contactPageContent.address}
              </p>
              <span className="contact-channel-desc" style={{ color: '#71717A', display: 'block', margin: 0 }}>
                Digital PRIZM PTE LTD / DAOZ360
              </span>
            </div>
          </div>

          {/* Column 2: Inquiry Preparation Form */}
          <div className="contact-form-card">
            <h2 className="contact-form-title">Draft Your Inquiry</h2>
            <p className="contact-form-desc">
              Select your topic and prepare a structured inquiry to send directly to mail@daoz360.ai.
            </p>

            <div className="contact-form-group">
              <label className="contact-form-label">Inquiry Category</label>
              <div className="contact-type-selector">
                {contactPageContent.inquiryTypes.map((type) => (
                  <button
                    key={type.id}
                    type="button"
                    className={`contact-type-btn ${selectedType === type.id ? 'is-selected' : ''}`}
                    onClick={() => setSelectedType(type.id)}
                  >
                    <span className="contact-type-label">{type.label}</span>
                    <span className="contact-type-desc">{type.desc}</span>
                  </button>
                ))}
              </div>
            </div>

            <div className="contact-form-group">
              <label htmlFor="contact-name" className="contact-form-label">Your Name</label>
              <input
                id="contact-name"
                type="text"
                className="contact-input"
                placeholder="e.g. Alex Morgan"
                value={senderName}
                onChange={(e) => setSenderName(e.target.value)}
              />
            </div>

            <div className="contact-form-group">
              <label htmlFor="contact-email" className="contact-form-label">Work Email</label>
              <input
                id="contact-email"
                type="email"
                className="contact-input"
                placeholder="alex@company.com"
                value={senderEmail}
                onChange={(e) => setSenderEmail(e.target.value)}
              />
            </div>

            <div className="contact-form-group">
              <label htmlFor="contact-channels" className="contact-form-label">Social Channels Managed (Optional)</label>
              <input
                id="contact-channels"
                type="text"
                className="contact-input"
                placeholder="e.g. Instagram, LinkedIn, X"
                value={senderChannels}
                onChange={(e) => setSenderChannels(e.target.value)}
              />
            </div>

            <div className="contact-form-group">
              <label htmlFor="contact-message" className="contact-form-label">Message Details</label>
              <textarea
                id="contact-message"
                className="contact-textarea"
                placeholder="Tell us about your team and what you would like to simplify..."
                value={senderMessage}
                onChange={(e) => setSenderMessage(e.target.value)}
              />
            </div>

            <div className="contact-form-actions">
              <a
                href={generateMailtoUrl()}
                className="btn-primary"
                style={{ textDecoration: 'none' }}
              >
                <span>Email DAOZ360</span>
                <ArrowUpRight size={16} aria-hidden="true" />
              </a>

              <button
                type="button"
                className="contact-copy-draft-btn"
                onClick={handleCopyDraft}
              >
                {copiedDraft ? (
                  <>
                    <Check size={16} style={{ color: '#22c55e' }} />
                    <span>Draft Copied to Clipboard!</span>
                  </>
                ) : (
                  <>
                    <Copy size={16} />
                    <span>Copy Draft to Clipboard</span>
                  </>
                )}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
