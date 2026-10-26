/**
 * DAOZ360 Chat Knowledge Base & Predefined Workflows
 * Sourced strictly from:
 * "online chat/DAOZ360_Website_Content_and_Antigravity_Brief (1).md" (Section 12)
 */

export const chatConfig = {
  assistantName: 'DAOZ360 Assistant',
  statusLabel: 'Automated replies',
  launcherLabel: 'Chat with DAOZ360',
  officialEmail: 'mail@daoz360.ai',
  registerUrl: 'https://daoz360.ai/social/register',
  loginUrl: 'https://daoz360.ai/social/login',
  privacyUrl: '/privacy-policy'
};

export const preChatFormCopy = {
  heading: "Let's get started.",
  supportingCopy: 'Enter your details so we can address your enquiry and follow up if needed.',
  fields: {
    name: {
      label: 'Your Name',
      placeholder: 'e.g. Alex Morgan',
      required: true,
      errorMsg: 'Please enter your name.'
    },
    email: {
      label: 'Email Address',
      placeholder: 'alex@company.com',
      required: true,
      errorMsg: 'Please enter a valid email address.'
    },
    company: {
      label: 'Company or Brand (Optional)',
      placeholder: 'e.g. Acme Studio',
      required: false
    }
  },
  privacyNotice: 'We use these details to handle your enquiry and follow up when needed. Read our',
  privacyLinkText: 'Privacy Policy',
  buttonText: 'Start Chat',
  backendErrorMsg: "We couldn't start the chat. Please try again or email mail@daoz360.ai."
};

export const welcomeMessages = [
  "Hi! Welcome to DAOZ360. I'm the automated website assistant. I can help with product questions or help you contact our team."
];

export const mainTopics = [
  { id: 'about', label: 'About DAOZ360', icon: 'info' },
  { id: 'getting-started', label: 'Getting Started', icon: 'rocket' },
  { id: 'pricing', label: 'Pricing & Plans', icon: 'tag' },
  { id: 'demo', label: 'Request a Demo', icon: 'calendar' },
  { id: 'support', label: 'Technical Support', icon: 'help' }
];

export const topicDetails = {
  about: {
    title: 'About DAOZ360',
    reply:
      'DAOZ360 is a social media management tool. Our website describes multi-platform management, post scheduling, analytics and team collaboration with approval workflows. What would you like to explore?',
    quickReplies: [
      { id: 'about-scheduling', label: 'Scheduling' },
      { id: 'about-analytics', label: 'Analytics' },
      { id: 'about-collaboration', label: 'Team Collaboration' },
      { id: 'main-menu', label: 'Main Menu' }
    ],
    subReplies: {
      'about-scheduling':
        "DAOZ360's website lists post scheduling across connected platforms. Tell us which network and content format you use so our team can confirm the available options.",
      'about-analytics':
        "DAOZ360's website lists campaign analytics and performance insights. If you need a particular metric or report, tell us what you want to measure.",
      'about-collaboration':
        "DAOZ360's website lists team content creation and approval workflows. Tell us about your team if you would like help checking the fit."
    }
  },

  'getting-started': {
    title: 'Getting Started',
    reply:
      'You can create an account through our registration page. Already have an account? Use Sign In.',
    actions: [
      {
        id: 'action-register',
        label: 'Create Account',
        href: chatConfig.registerUrl,
        isExternal: true
      },
      {
        id: 'action-login',
        label: 'Sign In',
        href: chatConfig.loginUrl,
        isExternal: true
      },
      {
        id: 'action-support-route',
        label: 'I Need Help',
        routeTo: 'support'
      }
    ],
    networksReply:
      'The website names Facebook, Instagram, LinkedIn and X/Twitter. Support can vary by account type and content format. Which platform and format do you need?'
  },

  pricing: {
    title: 'Pricing & Plans',
    reply:
      "I don't have a verified price list to share yet. I can help you send a pricing enquiry to our team.",
    questionAccounts: 'How many social accounts would you like to manage?',
    optionsAccounts: ['1–5 accounts', '6–15 accounts', '16+ accounts', 'Not sure'],
    questionTeam: 'How many people will use the platform?',
    optionsTeam: ['Solo (1 person)', 'Small team (2–5)', 'Larger team (6+)', 'Not sure'],
    submitLabel: 'Send Pricing Enquiry'
  },

  demo: {
    title: 'Request a Demo',
    reply: 'I can help you request a DAOZ360 walkthrough.',
    questionTopic: 'What would you like to see in the demo?',
    optionsTopic: [
      'Scheduling & Calendar',
      'Team Approval Workflow',
      'Analytics & Insights',
      'Complete Platform Overview'
    ],
    questionTime: 'Do you have a preferred day or time? Please include your time zone (or tap Skip).',
    allowSkipTime: true,
    submitLabel: 'Send Demo Request',
    disclaimer:
      'This is an enquiry request, not a confirmed meeting. Our team will contact you to arrange the next step.'
  },

  support: {
    title: 'Technical Support',
    askHelp: 'What do you need help with?',
    options: [
      { id: 'support-login', label: 'Login / Access', directUrl: chatConfig.loginUrl },
      { id: 'support-connect', label: 'Connecting an Account' },
      { id: 'support-schedule', label: 'Scheduling a Post' },
      { id: 'support-other', label: 'Something Else' }
    ],
    securityReminder: "Please don't share passwords, verification codes or payment details.",
    submitLabel: 'Send Support Request'
  }
};

export const feedbackOptions = [
  { id: 'helpful-yes', label: 'Yes, thank you' },
  { id: 'helpful-more', label: 'I need more help' }
];

export const fallbackResponses = {
  firstAttempt:
    "I couldn't match that to the information I have. Is your question about features, pricing, getting started or technical support?",
  secondAttempt:
    'I can help you send this to our team. What would you like them to know?',
  directContact:
    'You can also contact our team directly at mail@daoz360.ai.'
};
