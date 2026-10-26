import React, { useState, useEffect } from 'react';
import { brandConfig } from '../content';
import { X, Mail, Send, Copy, Check } from './Icons';
import './ContactModal.css';

export default function ContactModal({ isOpen, onClose }) {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    company: '',
    message: ''
  });
  const [copied, setCopied] = useState(false);

  useEffect(() => {
    const handleKeyDown = (e) => {
      if (e.key === 'Escape' && isOpen) {
        onClose();
      }
    };
    if (isOpen) {
      document.body.style.overflow = 'hidden';
      document.body.style.touchAction = 'none';
      window.addEventListener('keydown', handleKeyDown);
    } else {
      document.body.style.overflow = '';
      document.body.style.touchAction = '';
    }
    return () => {
      document.body.style.overflow = '';
      document.body.style.touchAction = '';
      window.removeEventListener('keydown', handleKeyDown);
    };
  }, [isOpen, onClose]);

  if (!isOpen) return null;

  const handleChange = (e) => {
    setFormData((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const subject = encodeURIComponent(`DAOZ360 Inquiry from ${formData.name || 'Website Visitor'}`);
    const bodyText = `Name: ${formData.name}\nWork Email: ${formData.email}\nCompany/Brand: ${formData.company}\n\nMessage:\n${formData.message}`;
    const mailtoUrl = `mailto:${brandConfig.contactEmail}?subject=${subject}&body=${encodeURIComponent(bodyText)}`;
    window.location.href = mailtoUrl;
  };

  const handleCopyDetails = () => {
    const text = `To: ${brandConfig.contactEmail}\nName: ${formData.name}\nWork Email: ${formData.email}\nCompany: ${formData.company}\nMessage: ${formData.message}`;
    navigator.clipboard.writeText(text);
    setCopied(true);
    setTimeout(() => setCopied(false), 2400);
  };

  return (
    <div className="modal-backdrop" onClick={onClose} role="presentation">
      <div
        className="contact-modal card-base"
        role="dialog"
        aria-modal="true"
        aria-labelledby="contact-modal-title"
        onClick={(e) => e.stopPropagation()}
      >
        <button
          type="button"
          className="modal-close-btn"
          onClick={onClose}
          aria-label="Close dialog"
        >
          <X size={20} />
        </button>

        <div className="modal-header">
          <div className="modal-eyebrow">
            <Mail size={14} className="text-orange" />
            <span>Connect with DAOZ360</span>
          </div>
          <h2 id="contact-modal-title" className="modal-title">
            Let’s talk about your social media workflow.
          </h2>
          <p className="modal-subtitle">
            Tell us about your team, the channels you manage, and what you would like to simplify. We will help you explore how DAOZ360 fits your workflow.
          </p>
        </div>

        <form className="contact-form" onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="contact-name" className="form-label">
              Your Name
            </label>
            <input
              type="text"
              id="contact-name"
              name="name"
              className="form-input"
              placeholder="e.g. Alex Morgan"
              value={formData.name}
              onChange={handleChange}
              required
            />
          </div>

          <div className="form-group">
            <label htmlFor="contact-email" className="form-label">
              Work Email
            </label>
            <input
              type="email"
              id="contact-email"
              name="email"
              className="form-input"
              placeholder="alex@company.com"
              value={formData.email}
              onChange={handleChange}
              required
            />
          </div>

          <div className="form-group">
            <label htmlFor="contact-company" className="form-label">
              Company or Brand
            </label>
            <input
              type="text"
              id="contact-company"
              name="company"
              className="form-input"
              placeholder="Company or Brand Name"
              value={formData.company}
              onChange={handleChange}
            />
          </div>

          <div className="form-group">
            <label htmlFor="contact-message" className="form-label">
              Message
            </label>
            <textarea
              id="contact-message"
              name="message"
              rows={4}
              className="form-textarea"
              placeholder="Tell us about the platforms you use and what you're looking to achieve..."
              value={formData.message}
              onChange={handleChange}
              required
            ></textarea>
          </div>

          <div className="modal-actions-row">
            <button type="submit" className="btn-primary modal-submit-btn">
              <span>Open in Email App</span>
              <Send size={16} aria-hidden="true" />
            </button>

            <button
              type="button"
              className="btn-secondary modal-copy-btn"
              onClick={handleCopyDetails}
              title="Copy message text to clipboard"
            >
              {copied ? <Check size={16} className="text-green" /> : <Copy size={16} />}
              <span>{copied ? 'Copied' : 'Copy Text'}</span>
            </button>
          </div>

          <div className="modal-direct-note">
            Direct routing to <strong>{brandConfig.contactEmail}</strong>. No credentials or unverified server storage.
          </div>
        </form>
      </div>
    </div>
  );
}
