import React, { useState, useEffect, useRef } from 'react';
import {
  chatConfig,
  preChatFormCopy,
  welcomeMessages,
  mainTopics,
  topicDetails,
  feedbackOptions,
  fallbackResponses
} from '../chat/chatData';
import {
  createLeadSession,
  submitChatRequest,
  matchFreeTextIntent,
  validateLeadData
} from '../chat/chatService';
import {
  MessageSquare,
  X,
  Send,
  ArrowLeft,
  Check,
  RotateCcw,
  Copy,
  ExternalLink,
  Shield,
  HelpCircle,
  Clock
} from './Icons';
import './ChatWidget.css';

export default function ChatWidget({ onNavigate }) {
  const [isOpen, setIsOpen] = useState(false);
  const [hasStarted, setHasStarted] = useState(false);

  // Pre-chat form states
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [company, setCompany] = useState('');
  const [formErrors, setFormErrors] = useState({});
  const [isSubmittingForm, setIsSubmittingForm] = useState(false);

  // Conversation states
  const [leadData, setLeadData] = useState(null);
  const [sessionId, setSessionId] = useState(null);
  const [messages, setMessages] = useState([]);
  const [activeSubflow, setActiveSubflow] = useState(null);
  const [pendingDraft, setPendingDraft] = useState({});
  const [fallbackCount, setFallbackCount] = useState(0);
  const [inputValue, setInputValue] = useState('');
  const [isSendingRequest, setIsSendingRequest] = useState(false);
  const [copiedRef, setCopiedRef] = useState(null);
  const [confirmEndChat, setConfirmEndChat] = useState(false);

  const messagesEndRef = useRef(null);
  const inputRef = useRef(null);

  // Auto-scroll to bottom of messages
  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: 'smooth' });
  };

  useEffect(() => {
    if (isOpen && hasStarted) {
      scrollToBottom();
    }
  }, [messages, activeSubflow, isOpen, hasStarted]);

  // Handle escape key
  useEffect(() => {
    const handleKeyDown = (e) => {
      if (e.key === 'Escape' && isOpen) {
        setIsOpen(false);
      }
    };
    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, [isOpen]);

  // Handle pre-chat submission
  const handleStartChat = async (e) => {
    e.preventDefault();
    setFormErrors({});

    const validation = validateLeadData(name, email, company);
    if (!validation.isValid) {
      setFormErrors(validation.errors);
      return;
    }

    setIsSubmittingForm(true);
    const result = await createLeadSession({ name, email, company });
    setIsSubmittingForm(false);

    if (result.success) {
      setLeadData(result.leadData);
      setSessionId(result.sessionId);
      setHasStarted(true);

      // Initialize welcome thread
      const initialMsgs = [
        {
          id: 'welcome-1',
          sender: 'assistant',
          text: welcomeMessages[0],
          timestamp: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
        },
        {
          id: 'welcome-2',
          sender: 'assistant',
          text: `Thanks, ${result.leadData.firstName}. What would you like help with?`,
          timestamp: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
          showMainMenu: true
        }
      ];
      setMessages(initialMsgs);
    } else {
      setFormErrors(result.errors || { form: preChatFormCopy.backendErrorMsg });
    }
  };

  // Helper to add message
  const addMessage = (sender, text, extra = {}) => {
    const newMsg = {
      id: `msg_${Date.now()}_${Math.random().toString(36).substr(2, 4)}`,
      sender,
      text,
      timestamp: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
      ...extra
    };
    setMessages((prev) => [...prev, newMsg]);
    return newMsg;
  };

  // Return to Main Menu
  const handleShowMainMenu = () => {
    setActiveSubflow(null);
    setPendingDraft({});
    addMessage('assistant', 'How else can I assist you?', { showMainMenu: true });
  };

  // Topic Handler
  const handleSelectTopic = (topicId) => {
    setFallbackCount(0);

    if (topicId === 'about') {
      const topic = topicDetails.about;
      addMessage('user', topic.title);
      setTimeout(() => {
        addMessage('assistant', topic.reply, {
          quickReplies: topic.quickReplies,
          onQuickReply: handleAboutSubreply
        });
      }, 300);
    } else if (topicId === 'getting-started') {
      const topic = topicDetails['getting-started'];
      addMessage('user', topic.title);
      setTimeout(() => {
        addMessage('assistant', topic.reply, {
          actions: topic.actions,
          askHelpful: true
        });
      }, 300);
    } else if (topicId === 'pricing') {
      const topic = topicDetails.pricing;
      addMessage('user', topic.title);
      setTimeout(() => {
        addMessage('assistant', topic.reply);
        setTimeout(() => {
          addMessage('assistant', topic.questionAccounts, {
            quickReplies: topic.optionsAccounts.map((opt) => ({ id: opt, label: opt })),
            onQuickReply: (opt) => handlePricingAccounts(opt.label)
          });
        }, 300);
      }, 300);
    } else if (topicId === 'demo') {
      const topic = topicDetails.demo;
      addMessage('user', topic.title);
      setTimeout(() => {
        addMessage('assistant', topic.reply);
        setTimeout(() => {
          addMessage('assistant', topic.questionTopic, {
            quickReplies: topic.optionsTopic.map((opt) => ({ id: opt, label: opt })),
            onQuickReply: (opt) => handleDemoTopic(opt.label)
          });
        }, 300);
      }, 300);
    } else if (topicId === 'support') {
      const topic = topicDetails.support;
      addMessage('user', topic.title);
      setTimeout(() => {
        addMessage('assistant', topic.askHelp, {
          quickReplies: topic.options.map((opt) => ({ id: opt.id, label: opt.label })),
          onQuickReply: (opt) => handleSupportOption(opt)
        });
      }, 300);
    }
  };

  // Sub-replies for About
  const handleAboutSubreply = (reply) => {
    if (reply.id === 'main-menu') {
      handleShowMainMenu();
      return;
    }
    addMessage('user', reply.label);
    const subText = topicDetails.about.subReplies[reply.id];
    setTimeout(() => {
      addMessage('assistant', subText, {
        askHelpful: true,
        allowCustomResponse: true
      });
    }, 300);
  };

  // Pricing Subflow
  const handlePricingAccounts = (accounts) => {
    addMessage('user', accounts);
    setPendingDraft((prev) => ({ ...prev, topic: 'pricing', accounts }));
    setTimeout(() => {
      addMessage('assistant', topicDetails.pricing.questionTeam, {
        quickReplies: topicDetails.pricing.optionsTeam.map((opt) => ({ id: opt, label: opt })),
        onQuickReply: (opt) => handlePricingTeam(opt.label, accounts)
      });
    }, 300);
  };

  const handlePricingTeam = (team, accounts) => {
    addMessage('user', team);
    const draft = {
      topic: 'pricing',
      accounts: accounts || pendingDraft.accounts || 'Not sure',
      team: team
    };
    setPendingDraft(draft);

    setTimeout(() => {
      addMessage(
        'assistant',
        "Here is a summary of your pricing enquiry. Our team can review your workflow and follow up with tailored options:",
        {
          showPreviewCard: true,
          previewType: 'pricing',
          draftData: draft
        }
      );
    }, 300);
  };

  // Demo Subflow
  const handleDemoTopic = (chosenTopic) => {
    addMessage('user', chosenTopic);
    setPendingDraft((prev) => ({ ...prev, topic: 'demo', demoFocus: chosenTopic }));
    setTimeout(() => {
      addMessage('assistant', topicDetails.demo.questionTime, {
        quickReplies: [
          { id: 'morning', label: 'Morning (My time zone)' },
          { id: 'afternoon', label: 'Afternoon (My time zone)' },
          { id: 'skip-time', label: 'Skip' }
        ],
        onQuickReply: (opt) => handleDemoTime(opt.label, chosenTopic)
      });
    }, 300);
  };

  const handleDemoTime = (timePref, chosenTopic) => {
    addMessage('user', timePref);
    const draft = {
      topic: 'demo',
      demoFocus: chosenTopic || pendingDraft.demoFocus || 'Platform Overview',
      preferredTime: timePref === 'Skip' ? 'Flexible' : timePref
    };
    setPendingDraft(draft);

    setTimeout(() => {
      addMessage(
        'assistant',
        "I've prepared your demo walkthrough request. Please review the details below:",
        {
          showPreviewCard: true,
          previewType: 'demo',
          draftData: draft
        }
      );
    }, 300);
  };

  // Support Subflow
  const handleSupportOption = (opt) => {
    addMessage('user', opt.label);

    if (opt.id === 'support-login') {
      setTimeout(() => {
        addMessage(
          'assistant',
          "You can access your account directly via the login portal. If you need a password reset, you can initiate it from the sign-in screen.",
          {
            actions: [
              { id: 'go-login', label: 'Go to Sign In', href: chatConfig.loginUrl, isExternal: true },
              { id: 'other-help', label: 'Ask Something Else', routeTo: 'support' }
            ],
            askHelpful: true
          }
        );
      }, 300);
      return;
    }

    const draft = { topic: 'support', issueType: opt.label };
    setPendingDraft(draft);

    setTimeout(() => {
      addMessage(
        'assistant',
        `Please provide a brief description of what you're experiencing. (${topicDetails.support.securityReminder})`,
        {
          isWaitingFreeText: true,
          freeTextCategory: 'support_description'
        }
      );
    }, 300);
  };

  // Submit Formal Request to Backend
  const handleConfirmSubmitRequest = async (draft) => {
    setIsSendingRequest(true);
    const result = await submitChatRequest({
      sessionId,
      leadData,
      topic: draft.topic || 'general',
      details: draft,
      customNotes: draft.customNotes || ''
    });
    setIsSendingRequest(false);

    if (result.success) {
      addMessage('assistant', `Your request has been received.`, {
        showConfirmationCard: true,
        reference: result.reference,
        leadEmail: leadData.email,
        topic: draft.topic
      });
      setPendingDraft({});
    } else {
      addMessage(
        'assistant',
        `We couldn't submit your request. Please try again or email ${chatConfig.officialEmail}.`,
        {
          actions: [
            {
              id: 'mailto-backup',
              label: 'Email Support Directly',
              href: `mailto:${chatConfig.officialEmail}`
            }
          ]
        }
      );
    }
  };

  // Free-text Input Handler
  const handleSendMessage = (e) => {
    e?.preventDefault();
    const text = inputValue.trim();
    if (!text) return;

    setInputValue('');
    addMessage('user', text);

    // If currently waiting for support issue description:
    if (pendingDraft.topic === 'support' && !pendingDraft.description) {
      const updatedDraft = { ...pendingDraft, description: text };
      setPendingDraft(updatedDraft);
      setTimeout(() => {
        addMessage(
          'assistant',
          "Thank you. I've prepared your support request for our technical team:",
          {
            showPreviewCard: true,
            previewType: 'support',
            draftData: updatedDraft
          }
        );
      }, 400);
      return;
    }

    // Match free-text intent
    const matched = matchFreeTextIntent(text);

    setTimeout(() => {
      if (matched.type === 'human') {
        const humanDraft = { topic: 'enquiry', inquiryText: text };
        setPendingDraft(humanDraft);
        addMessage(
          'assistant',
          "I can help you send this inquiry directly to our team. What would you like them to know?",
          {
            showPreviewCard: true,
            previewType: 'human',
            draftData: humanDraft
          }
        );
        return;
      }

      if (matched.type === 'topic') {
        if (matched.subTopicId) {
          const subText = topicDetails.about.subReplies[matched.subTopicId];
          addMessage('assistant', subText, { askHelpful: true });
        } else if (matched.subAction === 'networks') {
          addMessage('assistant', topicDetails['getting-started'].networksReply, {
            askHelpful: true
          });
        } else {
          handleSelectTopic(matched.topicId);
        }
        return;
      }

      // Unmatched fallback flow
      const nextFallback = fallbackCount + 1;
      setFallbackCount(nextFallback);

      if (nextFallback === 1) {
        addMessage('assistant', fallbackResponses.firstAttempt, {
          showMainMenu: true
        });
      } else {
        // Two failed attempts -> offer follow-up request directly
        const followUpDraft = { topic: 'general_question', inquiryText: text };
        setPendingDraft(followUpDraft);
        addMessage(
          'assistant',
          `${fallbackResponses.secondAttempt} (${fallbackResponses.directContact})`,
          {
            showPreviewCard: true,
            previewType: 'human',
            draftData: followUpDraft
          }
        );
      }
    }, 400);
  };

  // Feedback ("Did that help?")
  const handleFeedback = (isHelpful) => {
    if (isHelpful) {
      addMessage('user', 'Yes, thank you');
      setTimeout(() => {
        addMessage(
          'assistant',
          "Glad I could help! You can ask another question whenever you're ready.",
          { showMainMenu: true }
        );
      }, 300);
    } else {
      addMessage('user', 'I need more help');
      const draft = { topic: 'follow_up', enquiry: 'Visitor requested additional assistance' };
      setPendingDraft(draft);
      setTimeout(() => {
        addMessage(
          'assistant',
          "I can help you send a follow-up request to our team so they can review your question:",
          {
            showPreviewCard: true,
            previewType: 'human',
            draftData: draft
          }
        );
      }, 300);
    }
  };

  // Copy reference ID helper
  const handleCopyRef = (refId) => {
    navigator.clipboard.writeText(refId);
    setCopiedRef(refId);
    setTimeout(() => setCopiedRef(null), 2500);
  };

  // End Chat Session
  const handleEndChatSession = () => {
    setConfirmEndChat(false);
    setHasStarted(false);
    setLeadData(null);
    setSessionId(null);
    setMessages([]);
    setPendingDraft({});
    setActiveSubflow(null);
    setFallbackCount(0);
    setName('');
    setEmail('');
    setCompany('');
  };

  return (
    <>
      {/* Floating Launcher Button */}
      <button
        type="button"
        className={`daoz-chat-launcher ${isOpen ? 'is-active' : ''}`}
        onClick={() => setIsOpen(!isOpen)}
        aria-label={isOpen ? 'Close DAOZ360 Assistant' : chatConfig.launcherLabel}
        aria-expanded={isOpen}
      >
        <span className="daoz-launcher-icon-wrap">
          {isOpen ? (
            <X size={22} aria-hidden="true" />
          ) : (
            <img
              src="/assets/logo-daoz360-transparent.png"
              alt=""
              className="daoz-launcher-emblem"
              width="26"
              height="26"
            />
          )}
        </span>
        <span className="daoz-launcher-text">{chatConfig.launcherLabel}</span>
      </button>

      {/* Chat Window Panel */}
      {isOpen && (
        <div
          className="daoz-chat-window"
          role="dialog"
          aria-modal="true"
          aria-labelledby="daoz-chat-title"
        >
          {/* Header */}
          <header className="daoz-chat-header">
            <div className="daoz-chat-header-info">
              <div className="daoz-chat-avatar">
                <img
                  src="/assets/logo-daoz360-transparent.png"
                  alt="DAOZ360"
                  className="daoz-chat-avatar-img"
                  width="20"
                  height="20"
                />
              </div>
              <div>
                <h2 id="daoz-chat-title" className="daoz-chat-name">
                  {chatConfig.assistantName}
                </h2>
                <div className="daoz-chat-status">
                  <span className="daoz-chat-status-dot"></span>
                  <span>{chatConfig.statusLabel}</span>
                </div>
              </div>
            </div>

            <div className="daoz-chat-header-actions">
              {hasStarted && (
                <button
                  type="button"
                  className="daoz-chat-icon-btn"
                  title="End conversation"
                  aria-label="End conversation"
                  onClick={() => setConfirmEndChat(true)}
                >
                  <RotateCcw size={16} />
                </button>
              )}
              <button
                type="button"
                className="daoz-chat-icon-btn"
                title="Close chat"
                aria-label="Close chat"
                onClick={() => setIsOpen(false)}
              >
                <X size={18} />
              </button>
            </div>
          </header>

          {/* End Chat Confirmation Overlay */}
          {confirmEndChat && (
            <div className="daoz-chat-overlay" role="alertdialog">
              <div className="daoz-chat-confirm-box">
                <h3 className="daoz-confirm-title">End this conversation?</h3>
                <p className="daoz-confirm-desc">
                  This will clear the active message history on your screen. Any follow-up requests
                  already submitted with a reference identifier will remain safely queued for our
                  team.
                </p>
                <div className="daoz-confirm-actions">
                  <button
                    type="button"
                    className="daoz-confirm-btn-danger"
                    onClick={handleEndChatSession}
                  >
                    Yes, End Chat
                  </button>
                  <button
                    type="button"
                    className="daoz-confirm-btn-cancel"
                    onClick={() => setConfirmEndChat(false)}
                  >
                    Keep Chatting
                  </button>
                </div>
              </div>
            </div>
          )}

          {/* Body: Pre-chat Form OR Conversation View */}
          {!hasStarted ? (
            <div className="daoz-prechat-container">
              <div className="daoz-prechat-intro">
                <h3 className="daoz-prechat-heading">{preChatFormCopy.heading}</h3>
                <p className="daoz-prechat-subtext">{preChatFormCopy.supportingCopy}</p>
              </div>

              <form onSubmit={handleStartChat} className="daoz-prechat-form" noValidate>
                <div className="daoz-field-group">
                  <label htmlFor="prechat-name" className="daoz-field-label">
                    {preChatFormCopy.fields.name.label} <span className="daoz-req">*</span>
                  </label>
                  <input
                    id="prechat-name"
                    type="text"
                    className={`daoz-input ${formErrors.name ? 'is-invalid' : ''}`}
                    placeholder={preChatFormCopy.fields.name.placeholder}
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    maxLength={80}
                    autoComplete="name"
                  />
                  {formErrors.name && (
                    <span className="daoz-field-error" role="alert">
                      {formErrors.name}
                    </span>
                  )}
                </div>

                <div className="daoz-field-group">
                  <label htmlFor="prechat-email" className="daoz-field-label">
                    {preChatFormCopy.fields.email.label} <span className="daoz-req">*</span>
                  </label>
                  <input
                    id="prechat-email"
                    type="email"
                    className={`daoz-input ${formErrors.email ? 'is-invalid' : ''}`}
                    placeholder={preChatFormCopy.fields.email.placeholder}
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    autoComplete="email"
                  />
                  {formErrors.email && (
                    <span className="daoz-field-error" role="alert">
                      {formErrors.email}
                    </span>
                  )}
                </div>

                <div className="daoz-field-group">
                  <label htmlFor="prechat-company" className="daoz-field-label">
                    {preChatFormCopy.fields.company.label}
                  </label>
                  <input
                    id="prechat-company"
                    type="text"
                    className="daoz-input"
                    placeholder={preChatFormCopy.fields.company.placeholder}
                    value={company}
                    onChange={(e) => setCompany(e.target.value)}
                    maxLength={120}
                    autoComplete="organization"
                  />
                </div>

                <div className="daoz-privacy-notice">
                  <span>{preChatFormCopy.privacyNotice} </span>
                  <a
                    href={chatConfig.privacyUrl}
                    onClick={(e) => {
                      e.preventDefault();
                      setIsOpen(false);
                      if (onNavigate) onNavigate('privacy-policy');
                    }}
                    className="daoz-privacy-link"
                  >
                    {preChatFormCopy.privacyLinkText}
                  </a>
                  .
                </div>

                {formErrors.form && (
                  <div className="daoz-form-alert" role="alert">
                    {formErrors.form}
                  </div>
                )}

                <button
                  type="submit"
                  className="btn-primary daoz-start-btn"
                  disabled={isSubmittingForm}
                >
                  <span>{isSubmittingForm ? 'Starting...' : preChatFormCopy.buttonText}</span>
                  <Send size={15} aria-hidden="true" />
                </button>
              </form>
            </div>
          ) : (
            <div className="daoz-conversation-wrapper">
              {/* Message Feed */}
              <div className="daoz-messages-feed" role="log" aria-live="polite">
                {messages.map((msg) => (
                  <div key={msg.id} className={`daoz-msg-row ${msg.sender === 'user' ? 'is-user' : 'is-assistant'}`}>
                    {msg.sender === 'assistant' && (
                      <div className="daoz-msg-avatar" aria-hidden="true">
                        <img
                          src="/assets/logo-daoz360-transparent.png"
                          alt=""
                          width="16"
                          height="16"
                        />
                      </div>
                    )}

                    <div className="daoz-msg-content-block">
                      <div className="daoz-msg-bubble">
                        <p className="daoz-msg-text">{msg.text}</p>

                        {/* Interactive Main Menu Topics */}
                        {msg.showMainMenu && (
                          <div className="daoz-topic-chips-grid">
                            {mainTopics.map((topic) => (
                              <button
                                key={topic.id}
                                type="button"
                                className="daoz-chip-btn"
                                onClick={() => handleSelectTopic(topic.id)}
                              >
                                <span>{topic.label}</span>
                              </button>
                            ))}
                            <a
                              href={`mailto:${chatConfig.officialEmail}`}
                              className="daoz-chip-btn daoz-chip-contact"
                            >
                              <span>Contact Our Team</span>
                              <ExternalLink size={12} />
                            </a>
                          </div>
                        )}

                        {/* Quick Replies Sub-options */}
                        {msg.quickReplies && (
                          <div className="daoz-topic-chips-grid">
                            {msg.quickReplies.map((reply) => (
                              <button
                                key={reply.id}
                                type="button"
                                className="daoz-chip-btn"
                                onClick={() => msg.onQuickReply && msg.onQuickReply(reply)}
                              >
                                <span>{reply.label}</span>
                              </button>
                            ))}
                          </div>
                        )}

                        {/* Action buttons (e.g. Register / Login links) */}
                        {msg.actions && (
                          <div className="daoz-action-links-grid">
                            {msg.actions.map((act) =>
                              act.href ? (
                                <a
                                  key={act.id}
                                  href={act.href}
                                  target="_blank"
                                  rel="noopener noreferrer"
                                  className="daoz-action-link-btn"
                                >
                                  <span>{act.label}</span>
                                  <ExternalLink size={13} />
                                </a>
                              ) : (
                                <button
                                  key={act.id}
                                  type="button"
                                  className="daoz-action-link-btn"
                                  onClick={() => handleSelectTopic(act.routeTo)}
                                >
                                  <span>{act.label}</span>
                                </button>
                              )
                            )}
                          </div>
                        )}

                        {/* Request Preview Card */}
                        {msg.showPreviewCard && (
                          <div className="daoz-preview-card">
                            <div className="daoz-preview-header">
                              <span className="daoz-preview-badge">Follow-up Summary</span>
                            </div>
                            <div className="daoz-preview-body">
                              <div className="daoz-preview-row">
                                <span className="daoz-preview-lbl">Name:</span>
                                <span className="daoz-preview-val">{leadData?.name}</span>
                              </div>
                              <div className="daoz-preview-row">
                                <span className="daoz-preview-lbl">Email:</span>
                                <span className="daoz-preview-val">{leadData?.email}</span>
                              </div>
                              {leadData?.company && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Company:</span>
                                  <span className="daoz-preview-val">{leadData.company}</span>
                                </div>
                              )}
                              {msg.draftData?.accounts && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Accounts:</span>
                                  <span className="daoz-preview-val">{msg.draftData.accounts}</span>
                                </div>
                              )}
                              {msg.draftData?.team && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Team Size:</span>
                                  <span className="daoz-preview-val">{msg.draftData.team}</span>
                                </div>
                              )}
                              {msg.draftData?.demoFocus && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Focus:</span>
                                  <span className="daoz-preview-val">{msg.draftData.demoFocus}</span>
                                </div>
                              )}
                              {msg.draftData?.preferredTime && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Time Preference:</span>
                                  <span className="daoz-preview-val">{msg.draftData.preferredTime}</span>
                                </div>
                              )}
                              {msg.draftData?.issueType && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Issue:</span>
                                  <span className="daoz-preview-val">{msg.draftData.issueType}</span>
                                </div>
                              )}
                              {msg.draftData?.description && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Details:</span>
                                  <span className="daoz-preview-val">{msg.draftData.description}</span>
                                </div>
                              )}
                              {msg.draftData?.inquiryText && (
                                <div className="daoz-preview-row">
                                  <span className="daoz-preview-lbl">Inquiry:</span>
                                  <span className="daoz-preview-val">{msg.draftData.inquiryText}</span>
                                </div>
                              )}
                            </div>
                            <div className="daoz-preview-footer">
                              <button
                                type="button"
                                className="btn-primary daoz-submit-request-btn"
                                disabled={isSendingRequest}
                                onClick={() => handleConfirmSubmitRequest(msg.draftData)}
                              >
                                <span>{isSendingRequest ? 'Submitting...' : 'Send Request to Team'}</span>
                                <Send size={14} />
                              </button>
                            </div>
                          </div>
                        )}

                        {/* Confirmation Card after durable save */}
                        {msg.showConfirmationCard && (
                          <div className="daoz-confirm-card">
                            <div className="daoz-confirm-badge">
                              <Check size={14} />
                              <span>Request Logged</span>
                            </div>
                            <div className="daoz-confirm-ref-row">
                              <span className="daoz-confirm-ref-label">Reference ID:</span>
                              <code className="daoz-confirm-ref-code">{msg.reference}</code>
                              <button
                                type="button"
                                className="daoz-copy-ref-btn"
                                onClick={() => handleCopyRef(msg.reference)}
                                title="Copy Reference ID"
                              >
                                {copiedRef === msg.reference ? (
                                  <span style={{ color: '#22c55e', fontSize: '0.75rem' }}>Copied!</span>
                                ) : (
                                  <Copy size={13} />
                                )}
                              </button>
                            </div>
                            <p className="daoz-confirm-text">
                              Our team can review your request and follow up at{' '}
                              <strong>{msg.leadEmail}</strong>.
                            </p>
                            <button
                              type="button"
                              className="daoz-chip-btn"
                              style={{ marginTop: '8px', alignSelf: 'flex-start' }}
                              onClick={handleShowMainMenu}
                            >
                              <span>Ask Another Question</span>
                            </button>
                          </div>
                        )}

                        {/* Helpful Check ("Did that help?") */}
                        {msg.askHelpful && (
                          <div className="daoz-feedback-prompt">
                            <span className="daoz-feedback-text">Did that help?</span>
                            <div className="daoz-feedback-btns">
                              <button
                                type="button"
                                className="daoz-feedback-btn"
                                onClick={() => handleFeedback(true)}
                              >
                                Yes, thank you
                              </button>
                              <button
                                type="button"
                                className="daoz-feedback-btn"
                                onClick={() => handleFeedback(false)}
                              >
                                I need more help
                              </button>
                            </div>
                          </div>
                        )}
                      </div>

                      <span className="daoz-msg-time">{msg.timestamp}</span>
                    </div>
                  </div>
                ))}
                <div ref={messagesEndRef} />
              </div>

              {/* Free-text Input Bar */}
              <form onSubmit={handleSendMessage} className="daoz-chat-input-bar">
                <input
                  ref={inputRef}
                  type="text"
                  className="daoz-chat-input"
                  placeholder="Ask a question or type your topic..."
                  value={inputValue}
                  onChange={(e) => setInputValue(e.target.value)}
                />
                <button
                  type="submit"
                  className="daoz-chat-send-btn"
                  disabled={!inputValue.trim()}
                  aria-label="Send message"
                >
                  <Send size={16} />
                </button>
              </form>
            </div>
          )}
        </div>
      )}
    </>
  );
}
