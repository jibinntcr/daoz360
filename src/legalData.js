/**
 * DAOZ360 Legal & Additional Pages Data
 * Strictly sourced from official specifications in:
 * "Website Plan/Additional Info Terms conditions etc.md" (Sections 10 & 11)
 *
 * Official Domain: https://daoz360.ai/
 * Primary Contact: mail@daoz360.ai
 * Official Registered Address: 60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051
 * Source Revision Date: 26 October 2026
 */

export const legalMetadata = {
  brandName: 'DAOZ360',
  legalEntity: 'Digital PRIZM PTE LTD / DAOZ360',
  officialDomain: 'https://daoz360.ai/',
  contactEmail: 'mail@daoz360.ai',
  registeredAddress: '60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051',
  sourceDate: '26 October 2026',
  appLoginUrl: 'https://daoz360.ai/social/login',
  appRegisterUrl: 'https://daoz360.ai/social/register'
};

export const privacyPolicyContent = {
  title: 'Privacy Policy',
  route: '/privacy-policy',
  effectiveDate: '26 October 2026',
  summary:
    'This Privacy Policy outlines how DAOZ360 handles, processes, and protects details collected across our social media management platform.',
  sections: [
    {
      id: 'data-handled',
      number: '1',
      title: 'Data handled',
      content:
        'We collect details supplied through registration, platform use and support: contact identity, login/profile details, linked social accounts and posts, usage measurements, and messaging preferences.',
      details: [
        {
          label: 'Contact & Account Identity',
          desc: 'Name, email address, and profile details provided during account creation and setup.'
        },
        {
          label: 'Connected Social Accounts & Posts',
          desc: 'Connected channel credentials, scheduled drafts, media uploads, and published post data.'
        },
        {
          label: 'Usage Measurements & Metrics',
          desc: 'Platform engagement analytics, feature interaction logs, and service telemetry.'
        },
        {
          label: 'Support & Messaging Preferences',
          desc: 'Direct correspondence, support inquiries, and communication preferences.'
        }
      ]
    },
    {
      id: 'processing-purposes',
      number: '2',
      title: 'Processing purposes',
      content:
        'We use this data to operate and improve DAOZ360, administer transactions, deliver service notices, answer support enquiries, understand usage, and address misuse or fraud.',
      highlights: [
        'Operating core scheduling, publishing, and collaboration tools',
        'Administering account transactions and platform notifications',
        'Responding to customer inquiries and technical support requests',
        'Analyzing aggregated workflow patterns to improve platform reliability',
        'Preventing security threats, unauthorized access, and policy misuse'
      ]
    },
    {
      id: 'disclosure',
      number: '3',
      title: 'Disclosure',
      content:
        'We do not sell or trade personal details. Transfers require your permission except for legal duties, protection of rights or safety, and business transactions described by this policy.'
    },
    {
      id: 'protection',
      number: '4',
      title: 'Protection',
      content:
        'We apply safeguards against unauthorised handling, loss or alteration. Internet transmission cannot be guaranteed completely secure.'
    },
    {
      id: 'platform-administration',
      number: '5',
      title: 'Platform administration',
      content:
        'Platform administration and infrastructure operations are maintained under Digital PRIZM PTE LTD / DAOZ360.'
    },
    {
      id: 'enquiries',
      number: '6',
      title: 'Enquiries & Correspondence',
      content:
        'For privacy questions, access requests, or regulatory inquiries, contact us directly at our designated privacy address.',
      email: 'mail@daoz360.ai',
      address: '60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051'
    }
  ]
};

export const termsConditionsContent = {
  title: 'Terms & Conditions',
  route: '/terms-conditions',
  effectiveDate: '26 October 2026',
  summary:
    'These Terms & Conditions establish the agreement between you and DAOZ360 governing use of the platform, accounts, content, and services.',
  sections: [
    {
      id: 'agreement',
      number: '1',
      title: 'Agreement',
      content:
        'Using DAOZ360 means accepting these conditions. If you disagree, discontinue use.'
    },
    {
      id: 'website-material-permission',
      number: '2',
      title: 'Website-material permission',
      content:
        'Only temporary personal, non-commercial viewing is permitted. Copying, alteration, commercial/public presentation, reverse engineering, removal of ownership notices, redistribution and mirroring are restricted. Ownership does not transfer.'
    },
    {
      id: 'account-duties',
      number: '3',
      title: 'Account duties',
      content:
        'Protect login details and devices, keep registration details accurate, and remain responsible for account activity.'
    },
    {
      id: 'conduct',
      number: '4',
      title: 'Conduct',
      content:
        'Do not break laws, infringe rights, distribute harmful material, enter systems without permission, disrupt operations or send spam.'
    },
    {
      id: 'charges',
      number: '5',
      title: 'Charges',
      content:
        'Paid features require upfront fees and accurate billing details. Applicable recurring charges require authorisation. Cancellation follows the relevant policy.'
    },
    {
      id: 'ownership',
      number: '6',
      title: 'Ownership',
      content:
        'DAOZ360 and its licensors retain rights in original service materials and functionality.'
    },
    {
      id: 'access-removal',
      number: '7',
      title: 'Access removal',
      content:
        'Access may be suspended or ended immediately at the service\'s discretion, including for violations.'
    },
    {
      id: 'liability',
      number: '8',
      title: 'Liability',
      content:
        'DAOZ360 and associated parties exclude indirect, incidental, consequential, special and punitive losses, including lost profit, information, goodwill or use.'
    },
    {
      id: 'revisions',
      number: '9',
      title: 'Revisions',
      content:
        'Material changes receive at least thirty days\' advance notice.'
    },
    {
      id: 'questions',
      number: '10',
      title: 'Questions',
      content:
        'If you have questions regarding these terms, contact us through our verified correspondence channels.',
      email: 'mail@daoz360.ai',
      address: '60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051'
    }
  ]
};

export const contactPageContent = {
  title: "Let's talk about your social media workflow.",
  route: '/contact',
  description:
    'Tell us about your team, the channels you manage and what you would like to simplify. For product enquiries, account support, privacy questions or billing queries, email mail@daoz360.ai.',
  email: 'mail@daoz360.ai',
  domain: 'https://daoz360.ai/',
  address: '60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051',
  inquiryTypes: [
    { id: 'product', label: 'Product Enquiry', desc: 'Questions on scheduling, publishing, and workflows' },
    { id: 'support', label: 'Account Support', desc: 'Assistance with account setup or platform features' },
    { id: 'privacy', label: 'Privacy & Data', desc: 'Questions regarding data handling or compliance' },
    { id: 'billing', label: 'Billing Queries', desc: 'Inquiries about plans, invoicing, or subscriptions' }
  ]
};
