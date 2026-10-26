import React from 'react';
import { capabilitiesContent } from '../content';
import { FolderKanban, Eye, Sparkles, Hash, Layers, CalendarClock } from './Icons';
import './Capabilities.css';

export default function Capabilities() {
  const iconMap = {
    folder: FolderKanban,
    eye: Eye,
    sparkles: Sparkles,
    tag: Hash,
    layers: Layers,
    calendar: CalendarClock
  };

  const visibleCards = capabilitiesContent.cards.filter((card) => card.enabled !== false);

  return (
    <section id="product" className="section section-soft capabilities-section" aria-labelledby="capabilities-heading">
      <div className="container">
        <div className="section-header">
          <div className="section-eyebrow">Supporting Capabilities</div>
          <h2 id="capabilities-heading" className="section-title">
            {capabilitiesContent.heading}
          </h2>
          <p className="section-subtitle">{capabilitiesContent.subtitle}</p>
        </div>

        <div className="capabilities-grid">
          {visibleCards.map((card) => {
            const Icon = iconMap[card.icon] || Sparkles;

            return (
              <div key={card.id} className="capability-card card-base">
                <div className="cap-icon-box">
                  <Icon size={22} className="cap-icon" />
                </div>
                <h3 className="cap-card-title">{card.title}</h3>
                <p className="cap-card-desc">{card.description}</p>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
