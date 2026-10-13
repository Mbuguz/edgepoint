# Phased Development Roadmap and Acceptance Criteria

Phase 1 ends with this documentation. Later phases begin only after explicit client
approval. Gates are evidence-based; no stage advances while its blocking inputs are
unknown.

## Phase 1 — Foundation and strategy (this package)

### Deliverables

- Repository and source-of-truth audit
- Verification register
- Theme/plugin architecture and quote workflow
- Design-system specification
- Sitemap, navigation, URLs, content models, and governance
- Page/service SEO plan and local SEO approach
- Security, performance, accessibility, QA, deployment, and rollback standards
- Implementation roadmap

### Acceptance

- Every requested service maps to one provisional canonical page.
- Theme and portable plugin responsibilities are explicit.
- Unknown business claims are identified and prevented from publication.
- Quote data flow, roles, retention dependency, and failure handling are defined.
- Kasarani/Nairobi targeting avoids false-location and doorway-page tactics.
- Quality requirements are measurable.
- Documentation is versioned on a feature branch and Phase 2 has not started.

## Phase 2 — Discovery, content evidence, and technical scaffold

### Inputs required

Approved identity/contact/coverage, hosting report, brand assets/licences, service
details, content owners, privacy decisions, integrations, current-site inventory
if any, and release approvers.

### Work

- Interview stakeholders; approve factual matrix, service boundaries, user journeys,
  target audiences, keyword evidence, competitor/SERP findings, and success metrics.
- Inventory/migrate existing URLs and content; establish redirects and canonical
  hostname.
- Confirm PHP/database/cPanel capabilities and staging/recovery method.
- Scaffold theme/plugin, local test environment, code standards, automated checks,
  deterministic ZIP packaging, versioning, and CI.
- Produce low-fidelity page flows and content briefs.

### Acceptance

- No critical verification item remains unresolved for scaffold decisions.
- Clean install activates both packages without errors on the declared matrix.
- CI enforces lint, static analysis, unit smoke tests, packaging, and secret checks.
- ZIPs exclude development/secrets and include version/readme compatibility data.
- Redirect inventory and content/keyword maps have an approved owner.

## Phase 3 — Design system and component implementation

### Work

- Confirm visual identity; design responsive high-fidelity key templates and states.
- Implement `theme.json`, tokens, editor constraints, patterns, header/nav/footer,
  cards, breadcrumbs, CTAs, media, search/404, forms, and state variants.
- Build a staging component reference and run iterative accessibility/usability tests.

### Acceptance

- Brand owner approves desktop/mobile designs and actual assets/licences.
- Components cover all documented states and work keyboard/touch/no-JS where relevant.
- Measured contrast, focus, zoom/reflow, screen-reader basics, and reduced-motion
  behavior meet the accessibility standard.
- No arbitrary editor controls allow routine brand breakage.
- Representative pages remain within asset/layout performance budgets.

## Phase 4 — Functional build and content population

### Work

- Register content/taxonomies/meta/capabilities and implement migrations.
- Build templates and governed editor experiences.
- Implement quote/support processing, anti-spam, consent, transactional delivery,
  private records, retention, and admin workflow.
- Populate approved pages/services/products/industries/projects/insights and legal
  documents; optimize media.
- Configure the single SEO metadata owner, schema, sitemap, robots, redirects, and
  internal links.

### Acceptance

- All required templates handle populated, empty, error, long-copy, and missing-image
  states without breakage.
- Unauthorized users cannot access enquiry records/settings/exports; CSRF, input,
  output, upload, spam, and failure paths are tested.
- Every published claim, contact datum, project, image, and legal page has approval.
- Every indexable page has unique purpose, metadata, canonical, owner, review date,
  useful internal links, and eligible schema matching visible content.
- Quote submission is delivered and recoverable under simulated mail/API failure,
  provides a reference, and retains only approved data.

## Phase 5 — Hardening, content/SEO QA, and user acceptance

### Work

- Execute compatibility, responsive, accessibility, security, privacy, SEO, schema,
  performance, editor, form, and cross-browser suites.
- Complete content proofing, redirect rehearsal, backup/restore drill, operational
  runbooks, and administrator training.
- Run client UAT against realistic devices and workflows; triage findings by risk.

### Acceptance

- No open critical/high security, privacy, accessibility, data-loss, or functional
  defect; lower-risk exceptions have an owner and documented approval.
- WCAG 2.2 AA manual/automated evidence is recorded for representative templates.
- Core Web Vitals lab proxies and page budgets pass agreed test conditions, with
  no preventable regressions.
- Crawl/schema/indexing report is clean; staging protection and production indexing
  switch are rehearsed.
- Backup restore, rollback, quote delivery, and editor publishing are demonstrated.
- Named business and technical approvers sign the release candidate.

## Phase 6 — Controlled production release

### Work

- Reconfirm backups, DNS/TLS, environment, release manifest, checksums, monitoring,
  privacy/consent configuration, and rollback.
- Deploy versioned plugin then theme packages during an approved window.
- Run post-deploy smoke/crawl/form/accessibility checks; submit sitemap and request
  indexing for priority pages as appropriate.

### Acceptance

- Canonical host uses HTTPS with one-hop redirects; no staging `noindex`, mixed
  content, placeholder, secret, or debug output.
- Priority routes return correct statuses and metadata; forms deliver; editor/admin
  access works; monitoring is green.
- Search Console ownership/sitemap and verified Business Profile links are correct.
- Deployment record captures versions, commit, approver, test result, and rollback
  point.

## Phase 7 — Measurement and continuous improvement

### Work

- Monitor qualified enquiries, Search Console, indexing, field CWV, errors, form
  delivery, and content freshness.
- Publish approved expert content based on observed user needs.
- Improve weak journeys/content through measured experiments; maintain software,
  backups, security, accessibility, and recovery readiness.

### Acceptance

- Monthly operational and SEO report distinguishes traffic from qualified outcomes.
- Content reviews and technical maintenance meet schedule.
- Changes remain evidence-based; no guaranteed rankings, review manipulation,
  location fabrication, or mass doorway content.

## Recommended Phase 2 scope

Phase 2 should stop at an approved, tested scaffold and evidence-backed content/design
briefs. It should include:

1. client verification workshop and signed factual/content matrix;
2. host/staging/current-site technical audit;
3. analytics/Search Console/GBP and keyword/SERP baseline;
4. URL/content/redirect inventory;
5. information-architecture validation and wireframes for Home, Services index,
   one Service, Products, Project, Insight, Contact, Quote, and Support;
6. repository scaffold with theme/plugin shells, standards, tests, CI, and ZIP build;
7. privacy/data-flow decision for quote/support, integrations, and retention.

Full visual build, production content population, and deployment belong to subsequent
phases unless separately approved.
