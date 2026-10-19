# Phase 1: Production Website Foundation

- **Status:** Complete for review
- **Prepared:** 2026-10-13
- **Scope:** Architecture and planning only; Phase 2 implementation is explicitly excluded.

## Purpose

This package defines a production-ready direction for the Edgepoint Internet
Solution WordPress website without making changes to the live site. It separates
verified inputs from assumptions and turns the brief into testable implementation
requirements.

## Document set

1. [Repository audit and verification register](01-repository-audit.md)
2. [WordPress architecture](02-wordpress-architecture.md)
3. [Design system](03-design-system.md)
4. [Sitemap, navigation, and content models](04-information-architecture.md)
5. [Kasarani and Nairobi SEO strategy](05-seo-strategy.md)
6. [Security, performance, accessibility, and operations](06-quality-standards.md)
7. [Development roadmap and acceptance criteria](07-roadmap.md)
8. [Expanded service and industry catalog](08-service-and-industry-catalog.md)

## Decision principles

- The supplied Phase 1 brief and any later client-approved specification are the
  business source of truth.
- Unknown facts remain unpublished until verified.
- A custom theme owns presentation; a companion plugin owns portable functionality
  and structured business content.
- Native WordPress editing is preferred to proprietary page builders.
- SEO pages must satisfy distinct user needs; geographic doorway pages and duplicated
  service copy are prohibited.
- Progressive enhancement, semantic HTML, accessibility, security, and performance
  are release criteria rather than optional polish.

## Baseline and review gates

- The repository currently has no application code or standalone company
  specification file. The initial brief and the client-supplied expanded catalog
  are the available business planning inputs.
- The live site is out of scope for inspection or modification in this phase.
- WordPress 7.1.3 is the current security release on the preparation date. The
  production target is the latest stable, fully patched WordPress at deployment,
  not a permanently pinned core version.
- The preferred hosting baseline is PHP 8.3+, MariaDB 10.11+ or MySQL 8.0+, and
  HTTPS, subject to cPanel verification before implementation.
- Content, contact details, service claims, schema facts, legal text, analytics
  consent behavior, and form recipients require client approval before launch.

## Source references

- [WordPress requirements](https://wordpress.org/about/requirements/)
- [WordPress 7.1.3 release](https://wordpress.org/news/2026/10/wordpress-7-1-3-maintenance-and-security-release/)
- [WordPress security guidance](https://developer.wordpress.org/apis/security/)
- [WCAG 2.2](https://www.w3.org/TR/WCAG22/)
- [Google Search Essentials](https://developers.google.com/search/docs/essentials)
- [Google structured data policies](https://developers.google.com/search/docs/appearance/structured-data/sd-policies)
- [Core Web Vitals](https://web.dev/articles/vitals)

Versions and external requirements must be rechecked at the start of implementation
and immediately before release.
