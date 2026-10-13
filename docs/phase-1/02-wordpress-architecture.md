# WordPress Theme and Companion-Plugin Architecture

## Technical baseline

At implementation start, reconfirm the host against the official
[WordPress requirements](https://wordpress.org/about/requirements/). As of this
document, prefer:

- latest stable patched WordPress (7.1.3 on 2026-10-13);
- PHP 8.3+ (test through the newest host-supported PHP release);
- MariaDB 10.11+ or MySQL 8.0+;
- HTTPS, Apache or Nginx URL rewriting, and valid TLS;
- no Node.js or Composer process at runtime.

The distributed ZIPs contain compiled assets and production PHP dependencies.
Source tooling runs only in development/CI.

## Repository layout

```text
endpoint/
├── app/
│   ├── themes/endpoint/
│   │   ├── assets/{src,dist}/
│   │   ├── inc/
│   │   ├── parts/
│   │   ├── patterns/
│   │   ├── templates/
│   │   ├── functions.php
│   │   ├── style.css
│   │   ├── theme.json
│   │   └── readme.txt
│   └── plugins/endpoint-core/
│       ├── assets/
│       ├── includes/{Admin,Content,Forms,Integrations,Seo,Support}/
│       ├── templates/
│       ├── endpoint-core.php
│       ├── uninstall.php
│       └── readme.txt
├── config/                 # PHPCS/PHPStan/test configuration
├── docs/
├── languages/
├── scripts/                # deterministic build/package/check scripts
├── tests/{phpunit,e2e}/
├── composer.json
├── package.json
└── .github/workflows/
```

Final naming is subject to a collision check in the WordPress ecosystem. Use the
`endpoint_` function/option/meta prefix and `Endpoint\` PHP namespace.

## Theme responsibilities

Use a custom hybrid/block theme with curated editor controls. It owns:

- `theme.json` design tokens and constrained editor settings;
- global header, footer, navigation, breadcrumbs presentation, templates, template
  parts, patterns, pagination, and empty/error states;
- semantic page layouts and view components;
- responsive, print, reduced-motion, and high-contrast-aware styles;
- local font files when licensing allows, compiled CSS/JS, icons, and image display;
- editor styles matching the front end;
- presentational hooks for plugin-owned content.

It must not own forms, submissions, service/product/project registrations, schema
facts, redirects, or other data that must survive a theme change. Templates use
core APIs, escape at output, and remain useful with JavaScript disabled.

## Companion plugin responsibilities

`endpoint-core` owns:

- content type and taxonomy registration;
- custom metadata definitions, REST exposure only where required, and editor panels;
- quotation/support form processing, validation, anti-spam, consent evidence,
  reference generation, notifications, and retention;
- breadcrumbs data, canonical/meta/schema integration points, and sitemap controls
  not delegated to an approved SEO plugin;
- reusable blocks/pattern data bindings for services, products, projects, FAQs,
  calls to action, and contact details;
- admin settings, diagnostics, privacy exporter/eraser hooks, cleanup policy, and
  role/capability registration;
- migration/version routines and safe activation/deactivation behavior.

Do not duplicate full SEO functionality if an approved, maintained SEO plugin is
selected in Phase 2. Define one owner for titles, canonicals, XML sitemaps, robots,
Open Graph, and schema to prevent conflicts.

## Integration contracts

- Theme checks plugin availability and degrades to standard posts/pages without
  fatal errors.
- Plugin templates are overrideable only through documented, versioned interfaces.
- Hooks use namespaced identifiers; public hooks and schema are documented.
- Contact identity is stored once in a validated option and reused across templates
  and schema.
- No template performs direct SQL. Use `WP_Query`, metadata APIs, taxonomies, and
  `$wpdb->prepare()` only when a core API cannot satisfy the query.
- All strings are translation-ready with the `endpoint` or `endpoint-core` text
  domain.

## Editing strategy

- Core block editor with a controlled block allowlist and reusable patterns.
- Lock structural blocks in critical landing-page patterns while keeping copy,
  links, media, FAQs, and calls to action editable.
- Disable arbitrary colors, font sizes, and spacing where they would break the
  design system.
- Prefer registered post meta with explicit type, defaults, sanitization, auth
  callbacks, and revision support where supported.
- Use WordPress media with required alt-text guidance, focal-point controls, and
  generated responsive sizes.
- Avoid proprietary page builders and paid runtime dependencies.

## Content types and ownership

| Type | Storage | Public archive | Notes |
|---|---|---:|---|
| Pages | Core pages | No | Home, About, Contact, Quote, legal, landing pages |
| Services | Hierarchical `ep_service` | Yes (`/services/`) | Family hubs plus qualifying capability pages; status/delivery model required |
| Products | `ep_product` | Conditional | Enquiry catalogue, not ecommerce unless approved |
| Projects | `ep_project` | Conditional | Publish only with evidence/client permission |
| Industries | `ep_industry` or pages | Conditional | Use only where substantial unique content exists |
| Insights | Core posts | Yes (`/insights/`) | Categories/tags kept intentionally small |
| FAQs | Reusable block data or attached entries | No | Visible on owning page; not a thin global archive |
| Enquiries | Private custom table | No | Sensitive operational records; minimal data |
| Careers | Pages initially | Conditional | CPT only if recurring vacancy volume justifies it |

Portfolio is the presentation/archive label for verified project records; do not
create duplicate Portfolio and Projects datasets.

Service capabilities that do not qualify for standalone pages remain structured
sections/child records attached to a family and can still drive cards, quote choices,
and internal reporting. Draft, unavailable, or unverified capabilities must never
appear in public navigation, sitemaps, schema, or quote promises.

## Quotation workflow

1. User opens `/get-a-quote/`, optionally prefilled from a service/product CTA.
2. Form asks only for name, organization (optional), email and/or phone, service,
   location at coarse level, preferred contact method, project summary, timeframe,
   budget band (optional), attachment (optional after risk review), privacy
   acknowledgement, and marketing consent as a separate unchecked choice.
3. Server validates CSRF nonce, honeypot/timing/rate limits, origin expectations,
   strict field allowlists, length, format, upload MIME/size, and consent.
4. Store a minimal private record with generated reference, UTC timestamps, status,
   source page, consent version, and delivery state. Avoid raw IP retention; if
   required for abuse controls, hash/truncate and expire it quickly.
5. Send via authenticated transactional mail/SMTP API through a pluggable adapter.
   Never rely on exposed browser mail or silently lose submissions if mail fails.
6. Show a generic success message and reference; send receipt without echoing
   sensitive free text. Notify only approved recipients.
7. Authorized staff progress `new → acknowledged → qualified → quoted → won/lost/spam`.
   Status changes are audited. Exports require capability and fresh nonce.
8. Scheduled retention anonymizes/deletes records according to the approved policy.

Fallback: if persistent enquiry storage is rejected by the client, use a reliable
transactional provider plus redacted delivery logs. The privacy decision must be
recorded before implementation.

## Roles and capabilities

- Administrators: configuration, integrations, retention, exports, deletion.
- Editors: public content, approved projects, FAQs, media.
- `Enquiry Manager`: view/update assigned enquiry fields; no site settings, plugin
  installation, bulk user management, or raw integration credentials.
- Authors: draft insights only, if required.

Create granular capabilities (`endpoint_read_enquiries`,
`endpoint_manage_enquiries`, `endpoint_export_enquiries`,
`endpoint_manage_settings`) rather than checking role names.

## Packaging and lifecycle

- Build reproducibly into `dist/endpoint-theme-x.y.z.zip` and
  `dist/endpoint-core-x.y.z.zip`; exclude source maps, tests, node modules, secrets,
  local configs, and VCS files.
- Generate checksums and a release manifest with WordPress/PHP compatibility,
  commit SHA, build date, migrations, and rollback notes.
- Plugin activation verifies requirements, creates/upgrades tables with `dbDelta`,
  adds roles/capabilities, and flushes rewrites once.
- Deactivation stops scheduled jobs but preserves content. Uninstall deletes data
  only after an explicit administrator opt-in.
- Database migrations are versioned, idempotent, and backward-aware.

## Deployment and rollback

1. Back up database and `wp-content`; verify the backup can be restored.
2. Test ZIPs on a production-like staging copy using sanitized data.
3. Record active versions, PHP version, permalinks, integrations, and baseline
   smoke/performance results.
4. Upload plugin first, run migrations, then theme; activate during an approved
   window and purge caches.
5. Run smoke checks: home, service, insight, search/404, quote submission,
   email delivery, admin edit, sitemap, robots, schema, canonical, and mobile nav.
6. On failure, enter maintenance mode only if necessary, restore previous ZIPs and
   database when migrations are not backward-compatible, clear caches, rerun smoke
   tests, and document the incident.

Never edit production files through the WordPress editor or cPanel as the source
of truth. Emergency fixes must be backported to Git and released normally.
