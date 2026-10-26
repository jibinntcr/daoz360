import React, { useState } from 'react';
import { ctaContent } from '../content';
import { Mail, ArrowRight, Copy, Check } from './Icons';
import './FinalCTA.css';

export default function FinalCTA({ onOpenContact }) {
  const [copied, setCopied] = useState(false);

  const handleCopyEmail = () => {
    navigator.clipboard.writeText(ctaContent.email);
    setCopied(true);
    setTimeout(() => setCopied(false), 2400);
  };

  return (
    <section id="contact" className="final-cta-section" aria-labelledby="cta-heading">
      <div className="container">
        <div className="final-cta-card">
          {/* Subtle Ambient Radial Glow */}
          <div className="cta-ambient-glow" aria-hidden="true"></div>

          <div className="cta-content-inner">
            <div className="cta-eyebrow">
              <span className="cta-eyebrow-dot" aria-hidden="true"></span>
              <span>Direct Conversation</span>
            </div>

            <h2 id="cta-heading" className="cta-title">
              {ctaContent.heading}
            </h2>

            <p className="cta-body">{ctaContent.body}</p>

            <div className="cta-actions-group">
              <button
                type="button"
                className="btn-primary cta-main-btn"
                onClick={onOpenContact}
              >
                <span>{ctaContent.button}</span>
                <ArrowRight size={18} aria-hidden="true" />
              </button>

              <div className="cta-email-box">
                <a
                  href={`mailto:${ctaContent.email}`}
                  className="cta-email-link"
                  title="Send direct email"
                >
                  <Mail size={16} aria-hidden="true" />
                  <span>{ctaContent.email}</span>
                </a>

                <button
                  type="button"
                  className="cta-copy-btn"
                  onClick={handleCopyEmail}
                  title="Copy email address"
                  aria-label="Copy email address"
                >
                  {copied ? <Check size={14} className="text-green" /> : <Copy size={14} />}
                  <span>{copied ? 'Copied' : 'Copy'}</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
