# Sitemap, Navigation, and Content Models

## Sitemap

```text
/
├── about/
├── services/
│   ├── internet-connectivity-installation/
│   ├── enterprise-residential-networking/
│   ├── wifi-installation-optimization/
│   ├── starlink-installation-support/
│   ├── cctv-security-solutions/
│   ├── software-website-development/
│   ├── cloud-solutions-services/
│   ├── cybersecurity/
│   ├── ict-equipment-supplies/
│   ├── telecommunications/
│   ├── ict-consulting-technical-support/
│   └── digital-marketing-ict-services/
├── products/
│   └── {verified-product}/
├── industries/
│   └── {verified-industry}/
├── projects/                    # navigation label: Portfolio
│   └── {verified-project}/
├── support/
├── insights/                    # navigation label: Insights
│   ├── category/{curated-topic}/
│   └── {article}/
├── careers/
│   └── {vacancy}/               # only when vacancies exist
├── contact/
├── get-a-quote/
├── privacy-policy/
├── terms/
├── cookie-policy/               # only if required
├── accessibility/
├── search/
├── 404
├── robots.txt
└── wp-sitemap.xml
```

One canonical URL exists for each concept. “Portfolio” and “Projects” are not
separate indexable archives. “Blog” redirects to or consistently resolves as
“Insights.” Unpopulated sections should remain draft/noindex rather than launch as
empty archives.

## Primary navigation

1. Services (mega menu or compact grouped disclosure after usability testing)
2. Products
3. Industries
4. Portfolio
5. Insights
6. About
7. Contact
8. **Get a Quote** (visually distinct action)

Support appears in the utility bar and footer, and may enter primary navigation if
support traffic/business priority warrants it. On mobile, all navigation is reachable
through one labelled button; no hover-only interactions. The logo links home, the
current page is identified, Escape closes disclosures, and focus returns logically.

## Footer navigation

- Company: About, Careers, Contact
- Solutions: top service links plus Services index
- Resources: Support, Insights, Portfolio
- Legal: Privacy, Terms, Cookies when required, Accessibility
- Verified contact and social links

Do not repeat every product/service as an unstructured link wall.

## URL and taxonomy rules

- Lowercase ASCII slugs, words separated by hyphens, short but descriptive.
- No dates, IDs, `.html`, tracking parameters, or location stuffing in canonical
  service URLs.
- Preserve approved URLs after launch. Every change requires a direct 301 mapping,
  link update, sitemap update, and redirect-chain check.
- Categories represent a small set of durable insight topics. Tags are disabled
  unless a governed use case exists; thin author/date/search archives are noindex.
- Filter/sort combinations do not create indexable URL explosions.

## Content models

### Service

| Field | Requirement |
|---|---|
| Title, slug, short summary | Required; unique and outcome-led |
| Hero/primary CTA | Required |
| Audience and customer problem | Required, verified |
| Deliverables/inclusions/exclusions | Required before publishing |
| Process and prerequisites | Required |
| Service areas | Verified statements only |
| Benefits/evidence | Claims linked to approved evidence |
| Related services/products/projects | Curated internal relationships |
| FAQs | Visible, page-specific, reviewed |
| SEO title/meta/canonical/robots | Required release fields |
| Schema service type/provider/area | Derived from verified data |
| Owner/reviewer/review date | Required governance |

### Product

Name, model/SKU, category, manufacturer, summary, images/alt text, specifications,
compatibility, included items, availability wording, price policy, warranty/returns,
related services, CTA, SEO fields, and review status. Manufacturer trademarks do
not imply partnership. Structured `Product` data is emitted only when page content
and required properties support it; ratings/offers are never invented.

### Industry

Industry name, verified customer challenges, relevant services, compliance/context,
process, evidence/projects, FAQs, CTA, and SEO fields. Publish only when the page
offers substantial industry-specific value beyond a swapped heading.

### Project

Approved title/client disclosure level, challenge, location granularity, date,
services, constraints, implementation, approved metrics/outcome, media permissions,
testimonial permission, related content, and review/expiry. Draft is the default;
an approval record is mandatory.

### Insight

Title, excerpt, body, author/reviewer, expertise context, publish/modified dates,
featured image, citations, categories, related services, CTA, SEO fields, and next
review date. Materially changed articles update the modified date; cosmetic edits
do not.

### Global business identity

Legal/public name, logo, canonical URL, phone, email, verified address (optional),
service area, opening hours (optional), social profiles, and map/GBP URL (optional).
This single validated source drives footer/contact output and structured data.

### Quote enquiry

Reference, submitted/updated timestamps, contact details, organization, selected
service/product, coarse location, message, timeframe, optional budget band,
attachment metadata, source URL/campaign with allowlisted fields, contact preference,
privacy text version/time, separate marketing consent, status/assignee, notification
state, and audit events. Sensitive records are private and excluded from search,
REST output, exports, caches, and analytics.

## Publishing workflow

`Draft → business review → factual/legal review as applicable → SEO/accessibility
review → approved → published → scheduled review → update/archive`.

- Editors cannot self-approve sensitive claims unless explicitly authorized.
- Preview verifies mobile layout, links, headings, metadata, image rights/alt text,
  schema, and CTA routing.
- Expired vacancies, products, or services use a planned archive/redirect response;
  they are not silently deleted.
- Every indexable page has a named owner and review date.

## Internal-linking rules

- Home links to priority service pathways, not every deep URL.
- Service index links to every published service; each service links to 2–4 genuinely
  related services, relevant products/projects/insights, Contact, and Quote.
- Industry pages link to applicable canonical services rather than duplicate them.
- Insights link contextually to authoritative service pages and other helpful
  articles; reciprocal links are added only when useful.
- Breadcrumbs reflect hierarchy: `Home › Services › Wi-Fi Installation and
  Optimization`.
- Use descriptive anchor text; avoid repetitive exact-match keyword anchors.
