import React from 'react';
import { audienceContent } from '../content';
import { Target, Sparkles, Building2, Briefcase } from './Icons';
import './Audience.css';

export default function Audience() {
  const icons = {
    'marketing-teams': Target,
    'social-managers': Sparkles,
    'growing-businesses': Building2,
    'agency-teams': Briefcase
  };

  const visibleSegments = audienceContent.segments.filter((s) => s.enabled !== false);

  return (
    <section id="solutions" className="section audience-section" aria-labelledby="audience-heading">
      <div className="container">
        <div className="section-header">
          <div className="section-eyebrow">Target Solutions</div>
          <h2 id="audience-heading" className="section-title">
            {audienceContent.heading}
          </h2>
          <p className="section-subtitle">{audienceContent.subtitle}</p>
        </div>

        <div className="audience-grid">
          {visibleSegments.map((segment) => {
            const Icon = icons[segment.id] || Target;

            return (
              <div key={segment.id} className="audience-card card-base">
                <div className="audience-header-row">
                  <div className="audience-icon-box">
                    <Icon size={20} className="audience-icon" />
                  </div>
                  <span className="audience-focus-pill">{segment.focus}</span>
                </div>
                <h3 className="audience-card-title">{segment.title}</h3>
                <p className="audience-card-desc">{segment.description}</p>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
