# DAOZ360 — Pending Claims & Product-Data Dependencies (Private Review Document)

Prepared per Section 8 (Items 4 & 12), Section 11E, and Section 13D of the DAOZ360 Build Brief.
**Important:** None of these internal notes or unverified claims are displayed as awkward badges in the visitor-facing UI. Optional modules are controlled centrally via `config/daoz360.php` and `BRAND_CONFIG` in `public/js/app.js`.

---

## 1. Hidden Optional Capabilities (Awaiting Product Verification)

| Feature / Module | Config Key | Current Default | Requirement Before Enabling |
| --- | --- | --- | --- |
| **AI Writing Assistance** | `ai_writing_assistance` | `false` (Hidden) | Confirm live AI caption generation, metering/cost model, and provider data-handling terms. |
| **Templates and Hashtag Sets** | `templates_and_hashtags` | `false` (Hidden) | Verify saved template library and reusable hashtag group functionality in the composer. |
| **Brand Workspaces** | `brand_workspaces` | `false` (Hidden) | Verify strict multi-client data isolation, separate permissions, and workspace switching. |
| **Bulk and Recurring Scheduling** | `bulk_recurring_scheduling` | `false` (Hidden) | Verify CSV/bulk import and recurring queue metering rules. |
| **Agency Audience Card (Homepage)** | `agency_audience_card` | `false` (Hidden) | Enable once multi-brand client workflows are verified (Agency pricing tier uses shared portfolio wording in the meantime). |
| **Integrations Matrix Section** | `integrations_section` | `false` (Hidden) | Supply verified support matrix: network, account type, content formats, direct vs. assisted publishing, analytics coverage, and rate limits. |
| **14-Day Evaluation Trial Strip** | `trial_strip` | `false` (Hidden) | Verify 14-day expiry enforcement, 5-account / 3-user / 100-delivery metering, and non-auto-billing pause behaviour. |
| **Cancellation FAQ Item** | `cancellation_faq` | `false` (Hidden) | Confirm live self-serve renewal toggle and approved cancellation/refund policy wording. |

---

## 2. Commercial & Pricing Dependencies (Section 13)

- **Pricing Mode (`pricing.mode`)**: Currently set to `'quote'` (Review / Quote mode). Plan CTAs read `Enquire About Starter`, `Enquire About Growth`, and `Enquire About Agency`, opening the enquiry workflow with Plan, Billing Interval, and Currency prefilled.
- **Before Switching to `'ready'` Mode**:
  1. Validate unit economics and gross margin target (80% gross margin target; direct service costs <= 20%).
  2. Enforce plan entitlements in backend (`5 / 15 / 40` connected accounts, `1 / 3 / 10` seats, `300 / 1,500 / 5,000` monthly deliveries).
  3. Implement subscription-month window reservations so scheduled deliveries cannot overbook monthly allowances.
  4. Configure tax calculation at checkout (displayed list prices are tax-exclusive).
  5. Record approved launch price book version and effective date in `config/daoz360.php`.

---

## 3. Legal & Operational Dependencies (Sections 10 & 11)

- **Contracting / Operator Entity**: Confirm whether `Digital PRIZM PTE LTD` (60 Paya Lebar Road, #04-23, Paya Lebar Square, Singapore 409051) remains the contracting operator for DAOZ360 or if updated corporate details apply.
- **Commercial SaaS Terms**: Review Section 2 of Terms & Conditions ("temporary personal, non-commercial viewing") with legal counsel to align website-material permissions with paid B2B SaaS subscription terms.
- **Conditional Policies**:
  - Cancellation and refund policy details (billing cycle, renewal timing, refund eligibility).
  - Cookie inventory and preference controls (if non-essential cookies/analytics are added).
  - Connected-platform data deletion instructions and token revocation documentation.
