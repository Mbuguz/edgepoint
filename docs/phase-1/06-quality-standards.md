# Security, Performance, Accessibility, and Operations

## Security baseline

### Application engineering

- Treat request, database, API, file, and third-party data as untrusted.
- Validate against allowlists where possible, sanitize on input, and escape as late
  as possible for the exact output context (`esc_html`, `esc_attr`, `esc_url`,
  `wp_kses_post`, JSON APIs).
- Every state-changing request requires a verified nonce/CSRF control and an explicit
  capability check. Nonces are not authorization.
- Use prepared database queries and core APIs; prohibit dynamic includes, executable
  uploads, unsafe deserialization, `eval`, and unreviewed remote requests.
- REST/AJAX routes define methods, schema, permission callbacks, rate controls, and
  non-disclosing errors.
- Uploads use strict extension/MIME/size allowlists, randomized names, protected
  storage, malware controls when available, and no public execution. Attachments
  are deferred unless business need outweighs risk.
- Prevent formula injection in CSV exports; escape cells beginning with dangerous
  spreadsheet operators.
- Secrets belong in environment/server configuration, never Git, ZIPs, browser
  code, logs, database exports, or support screenshots.
- Outbound requests use HTTPS, short timeouts, response-size limits, allowlisted
  hosts where practical, and no user-controlled URLs.

### WordPress and hosting

- Latest patched core/theme/plugin versions; automatic minor/security updates with
  monitored backups and rollback.
- Unique administrator accounts, least privilege, MFA where available, strong
  passwords, session review, and no shared “admin” login.
- Disable dashboard file editing, protect configuration/backups/logs, rotate salts
  after compromise, and enforce HTTPS/admin cookies.
- Use reputable minimal extensions only after maintenance/security/license review;
  remove inactive software.
- cPanel account isolation, SFTP/SSH instead of plain FTP, MFA, WAF/rate limits,
  malware monitoring, authenticated SMTP, SPF/DKIM/DMARC, and off-host backups.
- Security headers are staged and tested: HSTS only after HTTPS readiness; a
  nonce/hash-based Content Security Policy begins in report-only mode; also
  `X-Content-Type-Options: nosniff`, suitable `Referrer-Policy`,
  `Permissions-Policy`, and clickjacking protection via CSP `frame-ancestors`.
- XML-RPC, REST exposure, user enumeration, comments, and application passwords are
  restricted based on actual integration needs, not blanket assumptions.

### Privacy and forms

- Data minimization, purpose limitation, documented retention, deletion/export
  workflows, and processor agreements are release requirements.
- Separate required privacy acknowledgement from optional, unchecked marketing
  consent. Record wording/version and timestamp.
- Layer anti-spam: honeypot, minimum-fill-time, rate limiting, duplicate detection,
  and server validation. Add an accessible challenge only when needed and document
  its privacy impact.
- Generic public responses prevent account/enquiry enumeration. Detailed errors stay
  in access-controlled, redacted logs.
- Never place personal/form data in URLs, analytics, cache keys, or client logs.

## Performance budgets

Targets apply to representative mobile pages under measured lab conditions and are
confirmed with real-user field data after launch.

| Measure | Release target |
|---|---:|
| LCP (75th percentile field goal) | ≤ 2.5s |
| INP (75th percentile field goal) | ≤ 200ms |
| CLS (75th percentile field goal) | ≤ 0.1 |
| Initial compressed HTML | ≤ 60KB |
| Critical-page compressed CSS | ≤ 80KB |
| Initial-page compressed JS | ≤ 100KB |
| Initial page transfer (typical landing page) | ≤ 1.2MB |
| Third-party origins before consent | 0 unless strictly necessary |

Budgets are guardrails, not permission to waste bytes. Test Home, service, product,
project, article, Contact, and Quote templates.

### Performance implementation

- Server/page caching for anonymous HTML with explicit form/admin exclusions;
  browser caching and immutable hashed static assets.
- CDN optional after ownership/privacy review; compression and HTTP/2+ verified.
- Query budgets and Query Monitor profiling in staging; avoid unbounded queries,
  autoloaded option bloat, and per-card database requests.
- Critical CSS kept small; noncritical assets loaded only where used. JavaScript is
  deferred/module-based and progressively enhances HTML.
- One local font family when possible, minimal weights/subsets, `font-display: swap`,
  and careful preloads.
- Correctly sized responsive images, AVIF/WebP where host tooling supports it,
  intrinsic dimensions, below-fold lazy loading, and eager high-priority LCP media.
- Reserve dimensions for media/embeds/notices; avoid late banners and layout shifts.
- Embed maps/video/social content on interaction or consent rather than at initial
  load.

## Accessibility standard

Target **WCAG 2.2 Level AA** for public and administrative custom interfaces.

- Semantic landmarks, one main region, logical heading hierarchy, meaningful page
  titles, skip link, and predictable navigation.
- Entire experience works at keyboard-only, 200% zoom, 400% reflow, touch, and with
  common screen-reader/browser combinations.
- Visible focus, no keyboard traps, logical focus management, minimum target size,
  sufficient color/non-text contrast, and no color-only meaning.
- Form labels, instructions, autocomplete tokens, required states, grouped fields,
  error summary linked to fields, status announcements, and persistent entered data.
- Alternative text, captions/transcripts, pause/stop controls, reduced motion, and
  no flashing content.
- Menus/accordions/dialogs use native elements first and WAI-ARIA only to supplement
  semantics.
- Automated checks (axe/pa11y/Lighthouse) are mandatory but do not replace manual
  keyboard, screen-reader, zoom, contrast, and cognitive/usability review.

## Compatibility and code quality

- WordPress Coding Standards via PHPCS; PHP compatibility scan for the declared
  PHP range; PHPStan at an agreed level; ESLint/Stylelint/Prettier for source assets.
- Unit/integration tests cover content registration, permissions, sanitizers,
  migrations, metadata/schema, and form state transitions.
- End-to-end tests cover menus, search, quote/support success and failure, editor
  workflows, responsive behavior, and no-JS fallback.
- Test latest stable Chrome, Firefox, Safari, and Edge plus current iOS Safari and
  Android Chrome; support policy is current and previous major where practical.
- Test PHP 8.3 through the newest supported production version and latest stable
  WordPress. Recheck compatibility before each release.
- No PHP notices/warnings, browser errors, broken links, mixed content, invalid
  HTML that harms accessibility, or untranslated custom strings.

## SEO and content QA

- Crawl staged/release output and verify status codes, redirects, canonicals, robots,
  sitemap membership, titles/descriptions, headings, links, image alt behavior,
  pagination, 404/410, and parameter handling.
- Validate JSON-LD against visible facts and relevant validators; test exactly one
  owner for each metadata family.
- Confirm production does not inherit staging `noindex`; confirm staging is not
  discoverable.
- Editorial review checks factual approval, rights, claims, grammar, local wording,
  CTA destination, owner, review date, and absence of placeholders.

## Observability and maintenance

- Uptime and TLS/domain-expiry monitoring; daily backup alerts; form-delivery
  synthetic check that avoids creating customer data; security/malware alerts.
- Redacted structured logs with severity, correlation/reference ID, UTC timestamp,
  and bounded retention; no credentials or enquiry body.
- Monthly: updates in staging, backup restore spot check, forms, key journeys,
  Search Console, broken links, performance, users/roles, and expiring content.
- Quarterly: full restore drill, dependency/license review, accessibility sampling,
  content inventory, schema review, incident contacts, and cPanel resource trend.
- Annual or major change: threat model, privacy review, penetration test appropriate
  to risk, disaster-recovery exercise, and design/content governance review.

## Release checklist

1. Peer-reviewed code and approved content; automated suite green.
2. Dependency/security scan and no committed secrets.
3. Production-like staging passes functional, accessibility, SEO, performance, and
   browser checks.
4. Database/files backup complete and restore procedure verified.
5. Versioned ZIP checksums and rollback artifacts available.
6. Maintenance/change window, approver, monitoring, and rollback owner recorded.
7. Deployment smoke suite passes; caches purged; Search Console/sitemap checked.
8. Monitor forms, errors, performance, and indexing after release; document outcome.
