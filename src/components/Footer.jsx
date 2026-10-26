import React from 'react';
import { brandConfig } from '../content';
import { legalMetadata } from '../legalData';
import { Mail, Globe, MapPin, ArrowUp, ExternalLink } from './Icons';
import './Footer.css';

export default function Footer({ onOpenContact, onNavigate }) {
  const handleScrollTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleNavClick = (e, path) => {
    e.preventDefault();
    if (path.startsWith('#')) {
      if (onNavigate) {
        onNavigate('home');
      }
      setTimeout(() => {
        const el = document.querySelector(path);
        if (el) {
          el.scrollIntoView({ behavior: 'smooth' });
        }
      }, 50);
    } else {
      const route = path.replace(/^\//, '') || 'home';
      if (onNavigate) {
        onNavigate(route);
      }
    }
  };

  return (
    <footer className="site-footer">
      <div className="container">
        {/* Top Footer Row */}
        <div className="footer-top-row">
          {/* Brand Info */}
          <div className="footer-brand-col">
            <a
              href="/"
              className="footer-logo-link"
              onClick={(e) => handleNavClick(e, '/')}
              aria-label="DAOZ360 Home"
            >
              <img
                src="/assets/logo-daoz360-transparent.png"
                alt="DAOZ360"
                className="footer-logo-img"
                width="160"
                height="32"
              />
            </a>
            <p className="footer-tagline-text">{brandConfig.tagline}</p>
            <p className="footer-desc-text">
              Bring your content, publishing, and team together into one workspace.
            </p>
            <div className="footer-address-note">
              <MapPin size={14} className="footer-contact-icon" aria-hidden="true" />
              <span>Singapore: 60 Paya Lebar Road, #04-23, Singapore 409051</span>
            </div>
          </div>

          {/* Navigation Column */}
          <div className="footer-nav-col">
            <span className="footer-col-title">Platform</span>
            <ul className="footer-links-list">
              <li>
                <a href="/" className="footer-link" onClick={(e) => handleNavClick(e, '/')}>
                  Home
                </a>
              </li>
              <li>
                <a href="#product" className="footer-link" onClick={(e) => handleNavClick(e, '#product')}>
                  Product
                </a>
              </li>
              <li>
                <a href="#how-it-works" className="footer-link" onClick={(e) => handleNavClick(e, '#how-it-works')}>
                  How It Works
                </a>
              </li>
              <li>
                <a href="#solutions" className="footer-link" onClick={(e) => handleNavClick(e, '#solutions')}>
                  Solutions
                </a>
              </li>
              <li>
                <a href="#faqs" className="footer-link" onClick={(e) => handleNavClick(e, '#faqs')}>
                  FAQs
                </a>
              </li>
            </ul>
          </div>

          {/* Legal & Account Column */}
          <div className="footer-nav-col">
            <span className="footer-col-title">Legal & Access</span>
            <ul className="footer-links-list">
              <li>
                <a
                  href="/privacy-policy"
                  className="footer-link"
                  onClick={(e) => handleNavClick(e, '/privacy-policy')}
                >
                  Privacy Policy
                </a>
              </li>
              <li>
                <a
                  href="/terms-conditions"
                  className="footer-link"
                  onClick={(e) => handleNavClick(e, '/terms-conditions')}
                >
                  Terms & Conditions
                </a>
              </li>
              <li>
                <a
                  href="/contact"
                  className="footer-link"
                  onClick={(e) => handleNavClick(e, '/contact')}
                >
                  Contact Us
                </a>
              </li>
              <li>
                <a
                  href={legalMetadata.appLoginUrl}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="footer-link"
                >
                  <span>Sign In</span>
                  <ExternalLink size={12} style={{ marginLeft: '4px', opacity: 0.7 }} />
                </a>
              </li>
              <li>
                <a
                  href={legalMetadata.appRegisterUrl}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="footer-link"
                >
                  <span>Get Started</span>
                  <ExternalLink size={12} style={{ marginLeft: '4px', opacity: 0.7 }} />
                </a>
              </li>
            </ul>
          </div>

          {/* Direct Inquiries */}
          <div className="footer-contact-col">
            <span className="footer-col-title">Direct Inquiries</span>
            <div className="footer-contact-item">
              <Mail size={16} className="footer-contact-icon" aria-hidden="true" />
              <a href={`mailto:${brandConfig.contactEmail}`} className="footer-link">
                {brandConfig.contactEmail}
              </a>
            </div>
            <div className="footer-contact-item">
              <Globe size={16} className="footer-contact-icon" aria-hidden="true" />
              <a
                href={brandConfig.domain}
                target="_blank"
                rel="noopener noreferrer"
                className="footer-link"
              >
                daoz360.ai
              </a>
            </div>
            <button
              type="button"
              className="footer-contact-btn"
              onClick={onOpenContact}
            >
              Send an Inquiry
            </button>
          </div>
        </div>

        {/* Bottom Footer Row */}
        <div className="footer-bottom-row">
          <div className="footer-copy">
            © {brandConfig.year} {brandConfig.name}. All rights reserved.
          </div>

          <div className="footer-meta-status">
            <span className="footer-status-dot"></span>
            <span>Social Media Management • Digital PRIZM PTE LTD / DAOZ360</span>
          </div>

          <button
            type="button"
            className="footer-back-top-btn"
            onClick={handleScrollTop}
            aria-label="Back to top"
          >
            <span>Back to top</span>
            <ArrowUp size={14} aria-hidden="true" />
          </button>
        </div>
      </div>
    </footer>
  );
}
