import React from 'react';
import { valueStatement } from '../content';
import { Calendar, Users, Sparkles, CheckCircle2 } from './Icons';
import './ValueStatement.css';

export default function ValueStatement() {
  const benefitIcons = [Calendar, Users, Sparkles];

  return (
    <section className="section section-soft value-section" aria-labelledby="value-heading">
      <div className="container">
        <div className="value-header">
          <div className="section-eyebrow">Core Purpose</div>
          <h2 id="value-heading" className="section-title value-title">
            {valueStatement.heading}
          </h2>
          <p className="value-body">{valueStatement.body}</p>
        </div>

        <div className="benefits-grid">
          {valueStatement.benefits.map((benefit, index) => {
            const Icon = benefitIcons[index % benefitIcons.length];
            return (
              <div key={benefit.title} className="benefit-card card-base">
                <div className="benefit-icon-wrapper">
                  <Icon size={24} className="benefit-icon" />
                </div>
                <h3 className="benefit-card-title">{benefit.title}</h3>
                <p className="benefit-card-desc">{benefit.description}</p>
                <div className="benefit-check-row">
                  <CheckCircle2 size={16} className="benefit-check-icon" />
                  <span>Structured workflow</span>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
