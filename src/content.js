/**
 * DAOZ360 Centralized Content & Configuration
 * Sourced directly from the official content specification brief (Section 5 & 8).
 */

export const brandConfig = {
  name: 'DAOZ360',
  domain: 'https://daoz360.ai/',
  contactEmail: 'mail@daoz360.ai',
  tagline: 'Plan. Publish. Grow.',
  secondaryTagline: 'MANAGE. CONNECT. GROW',
  year: new Date().getFullYear(),
  
  // Feature module visibility flags
  features: {
    showAiAssistance: true,
    showTemplatesHashtags: true,
    showBrandWorkspaces: true,
    showBulkScheduling: true,
    showAgencyAudience: true,
    showIntegrationsSection: false // Kept hidden until formal support matrix is confirmed
  }
};

export const navigation = {
  links: [
    { label: 'Product', href: '#product' },
    { label: 'How It Works', href: '#how-it-works' },
    { label: 'Solutions', href: '#solutions' },
    { label: 'FAQs', href: '#faqs' },
    { label: 'Contact', href: '#contact' }
  ],
  primaryCta: 'Talk to Us'
};

export const heroContent = {
  eyebrow: 'SOCIAL MEDIA MANAGEMENT',
  headline: {
    line1: 'Your social media.',
    line2: 'All together.'
  },
  description:
    'Bring your content, publishing and team into one workspace. Plan ahead, stay organised and make more room for the ideas that matter.',
  primaryCta: 'Talk to Us',
  secondaryCta: 'Explore the Platform',
  supportLine: 'Plan. Publish. Grow.',
  image: '/assets/hero-3d.jpg'
};

export const valueStatement = {
  heading: 'More creating. Less coordinating.',
  body:
    'Social media works better when your ideas, content and people move together. DAOZ360 brings structure to the work behind every post, so you can focus on what you want to say.',
  benefits: [
    {
      title: 'A clearer publishing plan',
      description: 'Structured visual timeline across every channel and date.'
    },
    {
      title: 'A more connected team',
      description: 'Review drafts, share feedback, and approve with clarity.'
    },
    {
      title: 'A consistent brand presence',
      description: 'Maintain voice, styling, and cadence with less friction.'
    }
  ]
};

export const workflowContent = {
  heading: 'From the first idea to the next post.',
  introduction: 'Bring each stage of your social media workflow into view.',
  ctaText: 'Explore Product Features',
  tabs: [
    {
      id: 'plan',
      label: 'Plan',
      title: 'Give your content a clear direction.',
      body:
        'Organise upcoming posts in a visual calendar and see how your content fits together across the week.',
      metrics: '3 Campaigns active • 14 Posts mapped'
    },
    {
      id: 'create',
      label: 'Create',
      title: 'Make every message feel like your brand.',
      body:
        'Draft your content, bring in your media and prepare the right version for each connected channel.',
      metrics: 'Visual preview • Channel-tailored copy'
    },
    {
      id: 'publish',
      label: 'Publish',
      title: 'Keep your content moving.',
      body:
        'Prepare posts ahead of time and schedule them across your connected accounts from one workspace.',
      metrics: 'Multi-account sync • Automated queues'
    },
    {
      id: 'learn',
      label: 'Learn',
      title: 'Let your next idea start with insight.',
      body:
        'Review content performance and use what you learn to shape your next publishing plan.',
      metrics: 'Content patterns • Audience resonance'
    }
  ]
};

export const productStories = [
  {
    id: 'planning',
    category: 'Calendar & Scheduling',
    heading: 'A clearer calendar. A more consistent presence.',
    body:
      'See what is planned, prepare what is next and keep your publishing schedule organised. DAOZ360 helps you bring everyday posts and campaign content into the same view.',
    points: [
      'Visual content planning.',
      'Scheduled publishing.',
      'Platform-specific content preparation.'
    ],
    linkText: 'Explore Planning and Publishing',
    image: '/assets/story-planning-3d.jpg',
    visualBadge: 'Illustrative preview'
  },
  {
    id: 'collaboration',
    category: 'Team Review',
    heading: 'Keep the conversation close to the content.',
    body:
      'Bring drafts, feedback and approvals into a shared workflow. Give your team a clearer view of what needs attention and what is ready for the next step.',
    points: [
      'Shared content review.',
      'Clear approval steps.',
      'Better visibility across the team.'
    ],
    linkText: 'Explore Team Collaboration',
    image: '/assets/story-collaboration-3d.jpg',
    visualBadge: 'Illustrative preview'
  },
  {
    id: 'insights',
    category: 'Performance Insights',
    heading: 'Know what to build on.',
    body:
      'Look back at your content performance and identify the ideas worth developing. Bring those insights into your next round of planning.',
    points: [
      'Review content performance.',
      'Understand engagement patterns.',
      'Make more informed content decisions.'
    ],
    linkText: 'Explore Insights',
    image: '/assets/story-insights-3d.jpg',
    visualBadge: 'Example data'
  }
];

export const capabilitiesContent = {
  heading: 'The details that keep work flowing.',
  subtitle:
    'Thoughtful capabilities designed to support everyday marketing operations without unnecessary clutter.',
  cards: [
    {
      id: 'media-library',
      title: 'Media Library',
      description:
        'Keep your images and videos organised and ready for your next post.',
      icon: 'folder',
      enabled: true
    },
    {
      id: 'content-previews',
      title: 'Content Previews',
      description:
        'Review how your message is presented before you publish.',
      icon: 'eye',
      enabled: true
    },
    {
      id: 'ai-writing',
      title: 'AI Writing Assistance',
      description:
        'Explore caption ideas, refine your wording and adapt drafts while keeping the final decision with your team.',
      icon: 'sparkles',
      enabled: brandConfig.features.showAiAssistance
    },
    {
      id: 'templates-hashtags',
      title: 'Templates and Hashtag Sets',
      description:
        'Keep useful content formats and hashtag groups ready to reuse.',
      icon: 'tag',
      enabled: brandConfig.features.showTemplatesHashtags
    },
    {
      id: 'brand-workspaces',
      title: 'Brand Workspaces',
      description:
        'Keep content, accounts and team activity organised for each brand you manage.',
      icon: 'layers',
      enabled: brandConfig.features.showBrandWorkspaces
    },
    {
      id: 'bulk-scheduling',
      title: 'Bulk and Recurring Scheduling',
      description:
        'Prepare repeatable publishing workflows for content that follows a regular schedule.',
      icon: 'calendar',
      enabled: brandConfig.features.showBulkScheduling
    }
  ]
};

export const audienceContent = {
  heading: 'Built around the people behind the posts.',
  subtitle:
    'Tailored for the teams and specialists driving modern social content forward.',
  segments: [
    {
      id: 'marketing-teams',
      title: 'Marketing teams',
      description:
        'Bring campaign planning, content preparation and publishing into a shared workflow.',
      focus: 'Campaign Alignment'
    },
    {
      id: 'social-managers',
      title: 'Social media managers',
      description:
        'Keep everyday publishing organised while making room for your next creative idea.',
      focus: 'Cadence & Organisation'
    },
    {
      id: 'growing-businesses',
      title: 'Growing businesses',
      description:
        'Build a more consistent social presence with a clearer way to manage your content.',
      focus: 'Consistent Presence'
    },
    {
      id: 'agency-teams',
      title: 'Agency teams',
      description:
        'Keep each brand’s content and publishing activity organised as your client work grows.',
      focus: 'Multi-Brand Coordination',
      enabled: brandConfig.features.showAgencyAudience
    }
  ]
};

export const faqContent = {
  heading: 'Frequently Asked Questions',
  subtitle: 'Clear answers about DAOZ360 and getting started.',
  questions: [
    {
      id: 'what-is-daoz360',
      question: 'What is DAOZ360?',
      answer:
        'DAOZ360 is a social media management tool designed to bring the work behind your social presence into one place.'
    },
    {
      id: 'who-is-daoz360-for',
      question: 'Who is DAOZ360 for?',
      answer:
        'DAOZ360 is designed for marketing teams, social media managers and businesses looking for a more organised social media workflow.'
    },
    {
      id: 'platforms',
      question: 'Which social platforms can I connect?',
      answer:
        'Contact us with the platforms and account types you use. We can help you check the available integrations and supported publishing formats.'
    },
    {
      id: 'collaboration',
      question: 'Can my team work together in DAOZ360?',
      answer:
        'DAOZ360 brings content review and collaboration into a shared workflow, helping your team coordinate the steps before publishing.'
    },
    {
      id: 'learn-more',
      question: 'How can I learn more about DAOZ360?',
      answer:
        'Tell us about your social media workflow at mail@daoz360.ai. We will help you explore whether DAOZ360 fits your needs.'
    }
  ]
};

export const ctaContent = {
  heading: 'Bring your next campaign together.',
  body:
    'Tell us how you manage social media today. Let’s explore a clearer way to plan, publish and work together.',
  button: 'Talk to Us',
  email: 'mail@daoz360.ai'
};

export const footerContent = {
  brand: 'DAOZ360',
  tagline: 'Plan. Publish. Grow.',
  description: 'Your social media, managed in one place.',
  email: 'mail@daoz360.ai',
  domain: 'https://daoz360.ai/',
  links: navigation.links
};
