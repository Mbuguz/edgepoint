#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

if ! command -v php >/dev/null 2>&1; then
	echo "PHP CLI is required for validation." >&2
	exit 1
fi

while IFS= read -r -d '' file; do
	php -l "$file" >/dev/null
done < <(rg --files -0 -g '*.php' app tests/fixtures)

python3 - <<'PY'
from pathlib import Path
import json

for path in (Path("app/themes/endpoint/theme.json"), Path("config/playground-blueprint.json")):
    json.loads(path.read_text())
    print(f"JSON OK: {path}")
PY

if rg -n --glob '*.php' --glob '*.js' --glob '*.css' \
	'http://|eval\\s*\\(|base64_decode\\s*\\(' app; then
	echo "Unsafe or insecure source pattern found." >&2
	exit 1
fi

if [[ "${RELEASE:-0}" == "1" ]]; then
	if rg -n '700 000 000|hello@example\\.com|demo mode|Preview mode' app; then
		echo "Release blocked: preview placeholders or controls remain." >&2
		exit 1
	fi
fi

echo "Validation passed."
