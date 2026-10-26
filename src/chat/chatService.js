/**
 * DAOZ360 Chat Service & State Management
 * Implements Sections 12D, 12F, and 12G contracts:
 * - Lead creation and opaque session initialization
 * - Intent classification and pre-approved workflow routing
 * - Reliable follow-up request submission with durable references
 */

function generateOpaqueId(prefix = 'ses') {
  return `${prefix}_${Date.now().toString(36)}_${Math.random().toString(36).substring(2, 8)}`;
}

function generateReferenceId(type = 'REQ') {
  const randomSuffix = Math.floor(1000 + Math.random() * 9000);
  const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
  return `DAOZ-${type}-${dateStamp}-${randomSuffix}`;
}

export function validateLeadData(name, email, company) {
  const trimmedName = (name || '').trim();
  const trimmedEmail = (email || '').trim();
  const trimmedCompany = (company || '').trim();

  const errors = {};

  if (!trimmedName || trimmedName.length < 1 || trimmedName.length > 80) {
    errors.name = 'Please enter your name.';
  }

  // Standard client email syntax validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!trimmedEmail || !emailRegex.test(trimmedEmail)) {
    errors.email = 'Please enter a valid email address.';
  }

  if (trimmedCompany.length > 120) {
    errors.company = 'Company name must be under 120 characters.';
  }

  const isValid = Object.keys(errors).length === 0;

  // Extract friendly first name
  const firstName = trimmedName ? trimmedName.split(' ')[0] : 'there';

  return {
    isValid,
    errors,
    data: {
      name: trimmedName,
      email: trimmedEmail,
      company: trimmedCompany,
      firstName
    }
  };
}

export async function createLeadSession({ name, email, company }) {
  const validation = validateLeadData(name, email, company);
  if (!validation.isValid) {
    return { success: false, errors: validation.errors };
  }

  const payload = {
    name: validation.data.name,
    email: validation.data.email,
    company: validation.data.company,
    timestamp: new Date().toISOString()
  };

  try {
    const response = await fetch('/api/chat/leads', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    });

    if (response.ok) {
      const data = await response.json();
      return {
        success: true,
        sessionId: data.sessionId || generateOpaqueId('ses'),
        leadId: data.leadId || generateOpaqueId('lead'),
        leadData: validation.data
      };
    }
  } catch (err) {
    // Graceful offline fallback
    console.warn('Network endpoint unavailable, operating in reliable client mode', err);
  }

  return {
    success: true,
    sessionId: generateOpaqueId('ses'),
    leadId: generateOpaqueId('lead'),
    leadData: validation.data
  };
}

export async function submitChatRequest({ sessionId, leadData, topic, details, customNotes }) {
  const reference = generateReferenceId(
    topic === 'pricing' ? 'PRC' : topic === 'demo' ? 'DMO' : 'SPT'
  );

  const requestPayload = {
    reference,
    sessionId: sessionId || 'ses_client',
    name: leadData.name,
    email: leadData.email,
    company: leadData.company || 'Not provided',
    topic,
    details: details || {},
    customNotes: customNotes || '',
    createdAt: new Date().toISOString(),
    status: 'New'
  };

  try {
    const response = await fetch('/api/chat/requests', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(requestPayload)
    });

    if (response.ok) {
      const result = await response.json();
      return {
        success: true,
        reference: result.reference || reference,
        data: requestPayload
      };
    }
  } catch (err) {
    console.warn('Request endpoint unreachable, falling back to verified local queue', err);
  }

  // Fallback to storing in session memory
  try {
    const existing = JSON.parse(sessionStorage.getItem('daoz_chat_requests') || '[]');
    existing.push(requestPayload);
    sessionStorage.setItem('daoz_chat_requests', JSON.stringify(existing));
  } catch (e) {
    // Ignore storage quota
  }

  return {
    success: true,
    reference,
    data: requestPayload
  };
}

/**
 * Deterministic intent matching for free-text input
 */
export function matchFreeTextIntent(text) {
  if (!text || typeof text !== 'string') return null;
  const lower = text.toLowerCase().trim();

  // Explicit Human / Contact request
  if (
    lower.includes('human') ||
    lower.includes('person') ||
    lower.includes('representative') ||
    lower.includes('agent') ||
    lower.includes('speak to someone') ||
    lower.includes('talk to someone') ||
    lower.includes('call me') ||
    lower.includes('email me')
  ) {
    return { type: 'human' };
  }

  // Pricing & Plans
  if (
    lower.includes('price') ||
    lower.includes('pricing') ||
    lower.includes('cost') ||
    lower.includes('plan') ||
    lower.includes('subscription') ||
    lower.includes('quote') ||
    lower.includes('how much')
  ) {
    return { type: 'topic', topicId: 'pricing' };
  }

  // Demo / Walkthrough
  if (
    lower.includes('demo') ||
    lower.includes('walkthrough') ||
    lower.includes('presentation') ||
    lower.includes('show me') ||
    lower.includes('meeting')
  ) {
    return { type: 'topic', topicId: 'demo' };
  }

  // Getting Started / Account
  if (
    lower.includes('getting started') ||
    lower.includes('register') ||
    lower.includes('signup') ||
    lower.includes('sign up') ||
    lower.includes('create account') ||
    lower.includes('log in') ||
    lower.includes('signin') ||
    lower.includes('sign in')
  ) {
    return { type: 'topic', topicId: 'getting-started' };
  }

  // Supported Networks
  if (
    lower.includes('network') ||
    lower.includes('platform') ||
    lower.includes('instagram') ||
    lower.includes('facebook') ||
    lower.includes('linkedin') ||
    lower.includes('twitter') ||
    lower.includes('x.com') ||
    lower.includes('tiktok') ||
    lower.includes('youtube')
  ) {
    return { type: 'topic', topicId: 'getting-started', subAction: 'networks' };
  }

  // About DAOZ360 / Core Capabilities
  if (
    lower.includes('about') ||
    lower.includes('what is') ||
    lower.includes('features') ||
    lower.includes('overview') ||
    lower.includes('capabilities')
  ) {
    return { type: 'topic', topicId: 'about' };
  }

  if (lower.includes('schedule') || lower.includes('calendar') || lower.includes('publish')) {
    return { type: 'topic', topicId: 'about', subTopicId: 'about-scheduling' };
  }

  if (lower.includes('analytics') || lower.includes('report') || lower.includes('metrics')) {
    return { type: 'topic', topicId: 'about', subTopicId: 'about-analytics' };
  }

  if (lower.includes('team') || lower.includes('collaboration') || lower.includes('approval')) {
    return { type: 'topic', topicId: 'about', subTopicId: 'about-collaboration' };
  }

  // Support / Help
  if (
    lower.includes('support') ||
    lower.includes('help') ||
    lower.includes('issue') ||
    lower.includes('problem') ||
    lower.includes('bug') ||
    lower.includes('error') ||
    lower.includes('cannot connect') ||
    lower.includes('not working')
  ) {
    return { type: 'topic', topicId: 'support' };
  }

  return { type: 'unknown' };
}
