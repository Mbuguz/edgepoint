# Phase 2 Preview Implementation

## Confirmed inputs

- Display name: **Edgepoint Internet Solutions Ltd**
- Office: **Counter Business Center, Shop B08, Kasarani, Nairobi**
- Service planning area: Kasarani, Nairobi, Ruiru, Gwakairu, and surrounding
  Nairobi metropolitan areas
- Stated availability: 24/7, pending a verified monitored contact channel and
  service-level wording
- Logo direction: clean and professional
- Approved visual direction: sky blue and white, with deep navy reserved for
  readable text and contrast
- Demonstrative service imagery: allowed where appropriate; stock/generated images
  must not be represented as Edgepoint staff, offices, customers, or projects
- Contact number and social profiles: preview placeholders until supplied

The repository/domain retain their existing `edgepoint` spelling. The public display
name follows the later client confirmation above. Legal registration wording and
domain/brand alignment remain release decisions.

## Deliverables

- `app/themes/edgepoint`: custom accessible WordPress theme
- `app/plugins/edgepoint-core`: portable content, settings, SEO, and quote workflow
- `config/playground-blueprint.json`: disposable real-WordPress preview setup
- `tests/fixtures/seed-preview.php`: editable preview pages and service records
- `scripts/validate.sh`: PHP/JSON and unsafe-pattern checks
- `scripts/package.sh`: versioned installable ZIPs and checksums

## Preview safeguards

Preview mode is enabled by default:

- adds a site-wide `noindex` directive;
- omits placeholder phone/email/social data from structured data;
- validates quote forms but stores and sends no personal information;
- displays an administrator warning;
- remains identified as preview-only in the release manifest.

Do not disable preview mode until the phone, email, social profiles, quote recipient,
legal documents, service claims, address record, hours, SMTP delivery, data retention,
and launch checklist are verified.

## Local WordPress Playground

From the repository root:

```bash
npx @wp-playground/cli@latest server \
  --blueprint=./config/playground-blueprint.json \
  --mount=./app/themes/edgepoint:/wordpress/wp-content/themes/edgepoint \
  --mount=./app/plugins/edgepoint-core:/wordpress/wp-content/plugins/edgepoint-core \
  --mount=./tests/fixtures:/wordpress/wp-content/preview-fixtures
```

The preview uses a disposable WordPress database. The seed fixture creates editable
pages and service records for demonstration; it is excluded from production ZIPs.

## Validation and packaging

```bash
chmod +x scripts/*.sh
./scripts/validate.sh
./scripts/package.sh
```

Generated artifacts:

- `dist/edgepoint-theme-0.1.0.zip`
- `dist/edgepoint-core-0.1.0.zip`
- `dist/SHA256SUMS`
- `dist/RELEASE.txt`

The ZIP files require no Node.js process on shared hosting.
