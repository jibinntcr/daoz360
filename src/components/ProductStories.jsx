import React from 'react';
import { productStories } from '../content';
import { Check, ArrowRight } from './Icons';
import './ProductStories.css';

export default function ProductStories({ onOpenContact }) {
  return (
    <section id="product-stories" className="section stories-section" aria-label="Product Features in Detail">
      <div className="container">
        <div className="stories-list">
          {productStories.map((story, index) => {
            const isReversed = index % 2 === 1;

            return (
              <div
                key={story.id}
                id={story.id}
                className={`story-row ${isReversed ? 'is-reversed' : ''}`}
              >
                {/* Content Column */}
                <div className="story-content-col">
                  <div className="story-category-tag">{story.category}</div>
                  <h3 className="story-heading">{story.heading}</h3>
                  <p className="story-body">{story.body}</p>

                  <ul className="story-points-list">
                    {story.points.map((point) => (
                      <li key={point} className="story-point-item">
                        <span className="point-icon-box" aria-hidden="true">
                          <Check size={14} className="point-check" />
                        </span>
                        <span className="point-text">{point}</span>
                      </li>
                    ))}
                  </ul>

                  <button
                    type="button"
                    className="story-link-btn"
                    onClick={onOpenContact}
                  >
                    <span>{story.linkText}</span>
                    <ArrowRight size={16} aria-hidden="true" />
                  </button>
                </div>

                {/* Visual Column with Custom 3D Art & UI Overlay */}
                <div className="story-visual-col">
                  <div className="story-image-card card-base">
                    <img
                      src={story.image}
                      alt={`${story.heading} visual`}
                      className="story-3d-image"
                      loading="lazy"
                      width="600"
                      height="450"
                    />
                    <div className="story-badge-wrapper">
                      <span className="badge-illustrative">{story.visualBadge}</span>
                    </div>
                  </div>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
