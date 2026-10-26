import React from 'react';
import { faqContent } from '../content';
import { ChevronDown, HelpCircle } from './Icons';
import './FAQ.css';

export default function FAQ() {
  return (
    <section id="faqs" className="section section-soft faq-section" aria-labelledby="faq-heading">
      <div className="container">
        <div className="section-header">
          <div className="section-eyebrow">
            <HelpCircle size={14} aria-hidden="true" />
            <span>Got Questions?</span>
          </div>
          <h2 id="faq-heading" className="section-title">
            {faqContent.heading}
          </h2>
          <p className="section-subtitle">{faqContent.subtitle}</p>
        </div>

        <div className="faq-accordion-group">
          {faqContent.questions.map((item, index) => (
            <details
              key={item.id}
              className="faq-disclosure card-base"
              name="faq-accordion"
              open={index === 0}
            >
              <summary className="faq-summary">
                <span className="faq-question-text">{item.question}</span>
                <span className="faq-icon-wrapper" aria-hidden="true">
                  <ChevronDown size={18} className="faq-chevron" />
                </span>
              </summary>
              <div className="faq-answer-content">
                <p>{item.answer}</p>
              </div>
            </details>
          ))}
        </div>
      </div>
    </section>
  );
}
