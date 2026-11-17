<?php

return [
    /*
    |--------------------------------------------------------------------------
    | DAOZ360 Central Brand & Platform Configuration
    |--------------------------------------------------------------------------
    |
    | Single source of truth for brand metadata, routes, feature visibility
    | flags, and the regional price books (Section 8 & Section 13G).
    |
    */

    'brand' => [
        'name'          => 'DAOZ360',
        'tagline'       => 'Plan. Publish. Grow.',
        'domain'        => 'https://daoz360.ai/',
        'contact_email' => 'mail@daoz360.ai',
        'login_url'     => 'https://daoz360.ai/social/login',
        'register_url'  => 'https://daoz360.ai/social/register',
        'primary_cta'   => 'Talk to Us',
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Visibility Flags (Unverified modules remain false in production)
    |--------------------------------------------------------------------------
    */
    'features' => [
        'media_library'             => true,
        'content_previews'          => true,
        'ai_writing_assistance'     => false,
        'templates_and_hashtags'    => false,
        'brand_workspaces'          => false,
        'bulk_recurring_scheduling' => false,
        'agency_audience_card'      => false,
        'integrations_section'      => false,
        'trial_strip'               => false,
        'cancellation_faq'          => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Verified Social Platforms Matrix
    |--------------------------------------------------------------------------
    |
    | Keep empty in public display until the full account-type, format, and
    | publishing method matrix is verified (Section 1 & Section 5).
    |
    */
    'verified_platforms' => [],

    /*
    |--------------------------------------------------------------------------
    | Pricing Configuration & Regional Price Books (Section 13)
    |--------------------------------------------------------------------------
    |
    | mode: 'quote' (Review/quote mode default) | 'ready' (Live checkout mode)
    | Annual total equals 10x monthly list price (save 2 months / 16.6667%).
    |
    */
    'pricing' => [
        'mode'                 => env('DAOZ360_PRICING_MODE', 'quote'),
        'research_date'        => '2026-11-17',
        'approved_version'     => null,
        'effective_date'       => null,
        'default_billing'      => 'monthly',
        'default_currency'     => 'INR',
        'supported_currencies' => ['INR', 'USD'],

        'plans' => [
            'starter' => [
                'id'                  => 'starter',
                'name'                => 'Starter',
                'badge'               => null,
                'highlighted'         => false,
                'description'         => 'For creators and independent professionals.',
                'accounts'            => 5,
                'users'               => 1,
                'deliveries_per_month'=> 300,
                'prices'              => [
                    'INR' => [
                        'currency'                  => 'INR',
                        'symbol'                    => '₹',
                        'monthly_minor'             => 99900,
                        'annual_minor'              => 999000,
                        'monthly_formatted'         => '₹999',
                        'annual_total_formatted'    => '₹9,990',
                        'annual_monthly_equivalent' => '₹832.50',
                    ],
                    'USD' => [
                        'currency'                  => 'USD',
                        'symbol'                    => '$',
                        'monthly_minor'             => 1900,
                        'annual_minor'              => 19000,
                        'monthly_formatted'         => '$19',
                        'annual_total_formatted'    => '$190',
                        'annual_monthly_equivalent' => '$15.83',
                    ],
                ],
                'features' => [
                    '5 connected social accounts.',
                    '1 user.',
                    '300 successful platform deliveries per month.',
                    'Post scheduling and publishing.',
                    'Supported-network analytics.',
                    'Email support.',
                ],
                'cta_quote' => 'Enquire About Starter',
                'cta_ready' => 'Choose Starter',
            ],

            'growth' => [
                'id'                  => 'growth',
                'name'                => 'Growth',
                'badge'               => 'Recommended for Teams',
                'highlighted'         => true,
                'description'         => 'For growing businesses and small marketing teams.',
                'accounts'            => 15,
                'users'               => 3,
                'deliveries_per_month'=> 1500,
                'prices'              => [
                    'INR' => [
                        'currency'                  => 'INR',
                        'symbol'                    => '₹',
                        'monthly_minor'             => 249900,
                        'annual_minor'              => 2499000,
                        'monthly_formatted'         => '₹2,499',
                        'annual_total_formatted'    => '₹24,990',
                        'annual_monthly_equivalent' => '₹2,082.50',
                    ],
                    'USD' => [
                        'currency'                  => 'USD',
                        'symbol'                    => '$',
                        'monthly_minor'             => 4900,
                        'annual_minor'              => 49000,
                        'monthly_formatted'         => '$49',
                        'annual_total_formatted'    => '$490',
                        'annual_monthly_equivalent' => '$40.83',
                    ],
                ],
                'features' => [
                    '15 connected social accounts.',
                    '3 users.',
                    '1,500 successful platform deliveries per month.',
                    'Post scheduling and publishing.',
                    'Supported-network analytics.',
                    'Team collaboration and content approvals.',
                    'Email support.',
                ],
                'cta_quote' => 'Enquire About Growth',
                'cta_ready' => 'Choose Growth',
            ],

            'agency' => [
                'id'                  => 'agency',
                'name'                => 'Agency',
                'badge'               => null,
                'highlighted'         => false,
                'description'         => 'For teams managing a larger portfolio of social accounts.',
                'accounts'            => 40,
                'users'               => 10,
                'deliveries_per_month'=> 5000,
                'prices'              => [
                    'INR' => [
                        'currency'                  => 'INR',
                        'symbol'                    => '₹',
                        'monthly_minor'             => 599900,
                        'annual_minor'              => 5999000,
                        'monthly_formatted'         => '₹5,999',
                        'annual_total_formatted'    => '₹59,990',
                        'annual_monthly_equivalent' => '₹4,999.17',
                    ],
                    'USD' => [
                        'currency'                  => 'USD',
                        'symbol'                    => '$',
                        'monthly_minor'             => 9900,
                        'annual_minor'              => 99000,
                        'monthly_formatted'         => '$99',
                        'annual_total_formatted'    => '$990',
                        'annual_monthly_equivalent' => '$82.50',
                    ],
                ],
                'features' => [
                    '40 connected social accounts.',
                    '10 users.',
                    '5,000 successful platform deliveries per month.',
                    'Post scheduling and publishing.',
                    'Supported-network analytics.',
                    'Team collaboration and content approvals.',
                    'Email support.',
                ],
                'cta_quote' => 'Enquire About Agency',
                'cta_ready' => 'Choose Agency',
            ],
        ],
    ],
];
