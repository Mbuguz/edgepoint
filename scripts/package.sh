#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DIST="$ROOT/dist"
VERSION="0.1.0"

"$ROOT/scripts/validate.sh"

rm -rf "$DIST"
mkdir -p "$DIST"

(
	cd "$ROOT/app/themes"
	zip -q -r "$DIST/endpoint-theme-$VERSION.zip" endpoint \
		-x '*.DS_Store' '*.map' '*/node_modules/*'
)

(
	cd "$ROOT/app/plugins"
	zip -q -r "$DIST/endpoint-core-$VERSION.zip" endpoint-core \
		-x '*.DS_Store' '*.map' '*/node_modules/*'
)

(
	cd "$DIST"
	sha256sum ./*.zip > SHA256SUMS
)

cat > "$DIST/RELEASE.txt" <<EOF
Endpoint Internet Solution preview release
Version: $VERSION
Commit: $(git -C "$ROOT" rev-parse --short HEAD 2>/dev/null || echo uncommitted)
Mode: PREVIEW ONLY

The phone number, email, social profiles, legal copy, form recipient and final
service claims must be verified before production. Preview mode intentionally
adds noindex directives and disables enquiry storage and delivery.
EOF

echo "Packages created in $DIST"
