import React, { useState } from 'react';
import { heroContent } from '../content';
import { ArrowRight, RotateCcw } from './Icons';
import './Hero.css';

export default function Hero({ onOpenContact }) {
  const [animKey, setAnimKey] = useState(0);

  const handleReplay = () => {
    setAnimKey((prev) => prev + 1);
  };

  const handleExploreClick = () => {
    const el = document.getElementById('how-it-works');
    if (el) {
      el.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <section className="hero-section" aria-labelledby="hero-heading">
      <div className="container hero-container">
        {/* Left: Copy & CTAs */}
        <div className="hero-copy-column">
          <div className="hero-eyebrow">
            <span className="eyebrow-dot" aria-hidden="true"></span>
            <span>{heroContent.eyebrow}</span>
          </div>

          <h1 id="hero-heading" className="hero-headline">
            <span className="headline-line">{heroContent.headline.line1}</span>
            <span className="headline-line highlight-accent">{heroContent.headline.line2}</span>
          </h1>

          <p className="hero-description">{heroContent.description}</p>

          <div className="hero-actions-row">
            <button
              type="button"
              className="btn-primary hero-btn-main"
              onClick={onOpenContact}
            >
              <span>{heroContent.primaryCta}</span>
              <ArrowRight size={18} aria-hidden="true" />
            </button>

            <button
              type="button"
              className="btn-secondary hero-btn-sub"
              onClick={handleExploreClick}
            >
              <span>{heroContent.secondaryCta}</span>
            </button>
          </div>

          <div className="hero-support-line">
            <span className="support-dot" aria-hidden="true">•</span>
            <span className="support-text">{heroContent.supportLine}</span>
          </div>
        </div>

        {/* Right: 3D Composition Visual with Assembly Animation */}
        <div className="hero-visual-column">
          <div className="hero-visual-wrapper" key={animKey}>
            <div className="hero-image-card">
              <img
                src={heroContent.image}
                alt="DAOZ360 Workspace Visual — Central sculptural orange chat form with white ceramic calendar and content tiles"
                className="hero-3d-render"
                width="720"
                height="540"
                loading="eager"
              />

              {/* Floating badges overlaying cleanly */}
              <div className="hero-floating-card top-right-card">
                <span className="floating-indicator" aria-hidden="true"></span>
                <span>Scheduled for publish</span>
              </div>

              <div className="hero-floating-card bottom-left-card">
                <span className="status-check-icon">✓</span>
                <span>Draft approved</span>
              </div>
            </div>

            {/* Bottom controls & label */}
            <div className="hero-visual-meta">
              <span className="badge-illustrative">Illustrative preview</span>

              <button
                type="button"
                className="animation-replay-btn"
                onClick={handleReplay}
                title="Replay assembly entrance"
                aria-label="Replay visual animation"
              >
                <RotateCcw size={13} aria-hidden="true" />
                <span>Replay</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
