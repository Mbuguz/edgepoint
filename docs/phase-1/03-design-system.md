# Professional Design-System Specification

## Brand direction

**Concept: dependable digital infrastructure.** The visual language should combine
precise network geometry, generous space, clear evidence, and human service imagery.
It must feel capable and local without resorting to generic glowing-circuit imagery,
fake dashboards, partner logos, or unsupported “trusted by” statistics.

The breadth of the expanded catalog should be expressed as connected solution
pathways, not an overwhelming wall of offerings. Use “integrated ICT solutions” as
the lead message and show how connectivity, infrastructure, systems, security,
cloud, support, and growth services work together. Avoid unlimited “everything
technology” claims.

The logo and final brand palette are unavailable. The tokens below are a proposed,
accessible starting point—not approved brand assets.

## Foundations

### Proposed color tokens

| Token | Value | Use |
|---|---|---|
| `ink-950` | `#071B2B` | Primary text, dark surfaces |
| `ink-700` | `#294357` | Secondary text |
| `signal-700` | `#075EA8` | Links and primary actions on light |
| `signal-500` | `#0787D1` | Decorative accents, not small light text |
| `cyan-300` | `#63D8E6` | Dark-surface accent |
| `success-700` | `#167044` | Confirmed success state |
| `warning-700` | `#8A4B00` | Warning state |
| `danger-700` | `#B42318` | Error state |
| `cloud-100` | `#EEF5F8` | Tinted background |
| `white` | `#FFFFFF` | Base surface |

No text/background pair ships until its contrast is measured: at least 4.5:1 for
normal text, 3:1 for large text and essential component boundaries, with focus
indicators at least 3:1 against adjacent colors.

### Typography

- Headings: a licensed/local variable grotesk with a confident but restrained
  character; fallback `Inter, "Segoe UI", Arial, sans-serif`.
- Body/UI: the same family initially to reduce requests and visual noise.
- Body baseline: 16–18px, line height 1.6, line length 45–75 characters.
- Fluid scale using bounded `clamp()` tokens: 14, 16, 18, 22, 28, 36, 48, 64px.
- Never communicate state with capitalization, weight, or color alone.

Use self-hosted WOFF2 subsets only with confirmed licensing; otherwise use the
system stack. Preload at most the critical regular font and avoid faux weights.

### Spacing, grid, and shape

- 4px base with tokens: 4, 8, 12, 16, 24, 32, 48, 64, 96, 128.
- Content maximum 1200px; readable copy 720px; full-bleed sections retain 20–32px
  side padding.
- 12-column desktop, 8-column tablet, 4-column mobile; layout responds to content,
  not device brands.
- Breakpoint guidance: 480, 768, 1024, 1280px, tested between each value.
- Radius: 6px controls, 12px cards, 20px feature surfaces; restrained shadows.
- Borders and whitespace establish hierarchy before shadows or color blocks.

## Component inventory

Each component requires default, hover, focus-visible, active, disabled, loading,
error, and high-contrast behavior where relevant.

- Utility/contact bar (only verified details)
- Header, desktop nav, disclosure-based mobile nav, current-page state
- Breadcrumbs
- Buttons: primary, secondary, text; minimum 44×44 CSS px target
- Hero: one H1, short value proposition, primary/secondary CTA, optional optimized
  contextual image
- Trust/evidence strip populated only with verified facts
- Service card/grid and featured-service panel
- Product card with specification/enquiry status, never false stock urgency
- Industry card
- Project/case-study card with permission and evidence fields
- Process steps
- Benefits/proof list
- FAQ accordion using native button semantics
- Testimonial only when attributable and approved
- Article card, author/date metadata, table of contents
- CTA band
- Contact cards and verified-hours display
- Quote/support forms, field help, inline error summary, success/failure states
- Search, filters, pagination, no-results, 404
- Footer with legal, contact, services, and social links
- Cookie/consent interface only if required by selected technologies

## Page composition

- **Home:** value proposition → service pathways → audiences/industries (verified)
  → why Endpoint (evidence) → process → selected projects/insights (when available)
  → local service context → quote CTA.
- **Services index:** “By need” pathways → grouped service families → selected
  cross-service solutions → process → quote CTA. Search/filter is added only if
  usability testing shows the catalog cannot be scanned efficiently.
- **Service detail:** breadcrumb → outcome-led H1 → scope → suitable customers →
  deliverables/process → service area and prerequisites → related solutions →
  evidence → visible FAQs → quote CTA.
- **Product detail:** clear model/specifications, compatibility, warranty/availability
  status, related service, and enquiry CTA; no checkout conventions unless ecommerce
  is approved.
- **Project:** client context (permission), challenge, verified work, solution,
  outcome, services, location at approved granularity, and CTA.
- **Insight:** descriptive title, byline/reviewer/date, summary, semantic article,
  references, related services/articles, and CTA.

## Imagery and iconography

- Commission authentic team, installation, equipment, and Nairobi-context imagery
  with releases and alt-text notes. Do not use customer faces, sites, screens, or
  number plates without permission.
- Stock images, when necessary, must be licensed and not misrepresented as Endpoint
  work.
- Produce AVIF/WebP with JPEG/PNG fallback as required; use responsive `srcset`,
  intrinsic dimensions, focal points, and quality budgets.
- Decorative images use empty alt text. Informative alt text describes purpose;
  linked images describe destination. Do not repeat adjacent captions.
- Use a consistent SVG icon set with current-color strokes and accessible labels
  only when icons convey meaning.

## Motion and interaction

- Motion duration 120–240ms for feedback; transforms/opacity only in routine use.
- Respect `prefers-reduced-motion`; no autoplay video, parallax, scroll-jacking,
  flashing, or essential information hidden behind animation.
- Menus, dialogs, accordions, forms, and carousels (preferably avoided) work by
  keyboard and touch, preserve focus, and announce changes.
- Underline text links by default in body copy. Focus indicators are never removed.

## Voice and content design

- Clear, capable, specific, and courteous; Kenyan English conventions selected by
  the client and applied consistently.
- Lead with customer need and concrete deliverable, not unexplained acronyms.
- Use short paragraphs, descriptive headings, and action labels such as “Request a
  site survey” instead of “Learn more.”
- Avoid superlatives, fear-based cybersecurity claims, artificial urgency, and
  promises unsupported by contracts or evidence.

## Governance

- Design tokens live in `theme.json` and generated CSS; no arbitrary production
  values without review.
- Every new component has a documented purpose, variants, content limits, responsive
  behavior, keyboard behavior, and accessibility checks.
- Maintain a pattern/component reference page in staging.
- Brand approval and accessibility testing are explicit gates before development
  tokens are marked stable.
