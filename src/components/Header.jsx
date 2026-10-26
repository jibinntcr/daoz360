import React, { useState, useEffect } from 'react';
import { navigation, brandConfig } from '../content';
import { legalMetadata } from '../legalData';
import { Menu, X, ArrowUpRight, ArrowLeft, ExternalLink } from './Icons';
import './Header.css';

export default function Header({ currentRoute = 'home', onNavigate, onOpenContact }) {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  useEffect(() => {
    const handleKeyDown = (e) => {
      if (e.key === 'Escape' && mobileMenuOpen) {
        setMobileMenuOpen(false);
      }
    };
    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, [mobileMenuOpen]);

  useEffect(() => {
    if (mobileMenuOpen) {
      document.body.style.overflow = 'hidden';
      document.body.style.touchAction = 'none';
    } else {
      document.body.style.overflow = '';
      document.body.style.touchAction = '';
    }
    return () => {
      document.body.style.overflow = '';
      document.body.style.touchAction = '';
    };
  }, [mobileMenuOpen]);

  const handleNavClick = (e, href) => {
    e.preventDefault();
    setMobileMenuOpen(false);

    if (href === '#contact') {
      onOpenContact();
      return;
    }

    if (currentRoute !== 'home') {
      if (onNavigate) {
        onNavigate('home');
      }
      setTimeout(() => {
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }
      }, 60);
      return;
    }

    const target = document.querySelector(href);
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
    }
  };

  const handleLogoClick = (e) => {
    e.preventDefault();
    if (currentRoute !== 'home') {
      if (onNavigate) onNavigate('home');
    } else {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  };

  const handlePageNavigate = (route) => {
    setMobileMenuOpen(false);
    if (onNavigate) onNavigate(route);
  };

  const isLegalPage = currentRoute !== 'home';

  return (
    <header className={`site-header ${isScrolled ? 'is-scrolled' : ''}`}>
      <div className="container header-container">
        {/* Brand Wordmark with Emblem & baseline 360 */}
        <a
          href="/"
          className="brand-logo-link"
          onClick={handleLogoClick}
          aria-label="DAOZ360 Home"
        >
          <img
            src="/assets/logo-daoz360-transparent.png"
            alt="DAOZ360"
            className="brand-logo-img"
            width="170"
            height="34"
          />
        </a>

        {/* Desktop Navigation */}
        <nav className="desktop-nav" aria-label="Main Navigation">
          <ul className="nav-list">
            {isLegalPage && (
              <li>
                <button
                  type="button"
                  className="nav-link"
                  style={{ background: 'none', border: 'none', cursor: 'pointer', display: 'inline-flex', alignItems: 'center', gap: '4px' }}
                  onClick={() => onNavigate('home')}
                >
                  <ArrowLeft size={14} />
                  <span>Home</span>
                </button>
              </li>
            )}
            {navigation.links.map((link) => (
              <li key={link.label}>
                <a
                  href={link.href}
                  className="nav-link"
                  onClick={(e) => handleNavClick(e, link.href)}
                >
                  {link.label}
                </a>
              </li>
            ))}
          </ul>
        </nav>

        {/* Primary CTA & Actions */}
        <div className="header-actions">
          <button
            type="button"
            className="btn-primary header-cta"
            onClick={onOpenContact}
            aria-label="Talk to Us"
          >
            <span>{navigation.primaryCta}</span>
            <ArrowUpRight size={16} aria-hidden="true" />
          </button>

          {/* Mobile Menu Button */}
          <button
            type="button"
            className="mobile-toggle-btn"
            aria-label={mobileMenuOpen ? 'Close Menu' : 'Open Menu'}
            aria-expanded={mobileMenuOpen}
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
          >
            {mobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Drawer and Backdrop */}
      {mobileMenuOpen && (
        <>
          <div
            className="mobile-drawer-backdrop"
            onClick={() => setMobileMenuOpen(false)}
            aria-hidden="true"
          />
          <div className="mobile-drawer" role="dialog" aria-modal="true" aria-label="Navigation Menu">
            <nav className="mobile-nav">
              <ul className="mobile-nav-list">
                <li>
                  <button
                    type="button"
                    className={`mobile-nav-link ${currentRoute === 'home' ? 'is-active' : ''}`}
                    style={{ background: 'none', border: 'none', width: '100%', textAlign: 'left', cursor: 'pointer' }}
                    onClick={() => handlePageNavigate('home')}
                  >
                    Home
                  </button>
                </li>
                {navigation.links.map((link) => (
                  <li key={link.label}>
                    <a
                      href={link.href}
                      className="mobile-nav-link"
                      onClick={(e) => handleNavClick(e, link.href)}
                    >
                      {link.label}
                    </a>
                  </li>
                ))}

                {/* Legal & Policy Links in Mobile Drawer */}
                <li style={{ borderTop: '1px solid rgba(255, 255, 255, 0.08)', margin: '8px 0', paddingTop: '8px' }}>
                  <span style={{ fontSize: '0.75rem', textTransform: 'uppercase', letterSpacing: '0.06em', color: '#71717A', padding: '6px 12px', display: 'block' }}>
                    Legal & Info
                  </span>
                </li>
                <li>
                  <button
                    type="button"
                    className={`mobile-nav-link ${currentRoute === 'privacy-policy' ? 'is-active' : ''}`}
                    style={{ background: 'none', border: 'none', width: '100%', textAlign: 'left', cursor: 'pointer' }}
                    onClick={() => handlePageNavigate('privacy-policy')}
                  >
                    Privacy Policy
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    className={`mobile-nav-link ${currentRoute === 'terms-conditions' ? 'is-active' : ''}`}
                    style={{ background: 'none', border: 'none', width: '100%', textAlign: 'left', cursor: 'pointer' }}
                    onClick={() => handlePageNavigate('terms-conditions')}
                  >
                    Terms & Conditions
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    className={`mobile-nav-link ${currentRoute === 'contact' ? 'is-active' : ''}`}
                    style={{ background: 'none', border: 'none', width: '100%', textAlign: 'left', cursor: 'pointer' }}
                    onClick={() => handlePageNavigate('contact')}
                  >
                    Contact Portal
                  </button>
                </li>
                <li>
                  <a
                    href={legalMetadata.appLoginUrl}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="mobile-nav-link"
                    style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}
                  >
                    <span>Sign In</span>
                    <ExternalLink size={14} style={{ opacity: 0.6 }} />
                  </a>
                </li>
              </ul>

              <div className="mobile-drawer-cta">
                <button
                  type="button"
                  className="btn-primary w-full"
                  onClick={() => {
                    setMobileMenuOpen(false);
                    onOpenContact();
                  }}
                >
                  <span>{navigation.primaryCta}</span>
                  <ArrowUpRight size={16} aria-hidden="true" />
                </button>
                <div className="mobile-email-support">
                  Direct inquiry: <a href={`mailto:${brandConfig.contactEmail}`}>{brandConfig.contactEmail}</a>
                </div>
              </div>
            </nav>
          </div>
        </>
      )}
    </header>
  );
}
