#!/bin/sh
#
# End-to-end test of the move of the third-party extensions to the extensions
# manual (php/doc-extensions).
#
# It builds the extensions manual and a language manual, serves both with the
# built-in web server and checks the way a visitor gets from one to the other:
#
#   - the old URL of a moved page answers a 301 to /manual/extensions/<page>.php
#   - the pages of the language manual link to the extensions manual, and back
#   - the shortcuts (php.net/apcu_add) find the pages of the extensions manual
#   - pages that stayed in the language manual are untouched
#
# The directories below must sit side by side, each on the branch to test:
#
#   doc-base/      doc-base
#   phd/           phd
#   en/            doc-en (fallback of the language manual)
#   fr/            doc-fr (the language manual that is built)
#   extensions/    doc-extensions
#   web-php/       web-php (this repository)
#
# Usage:   sh web-php/tests/extensions-migration.sh [ROOT]
#
#   ROOT   directory that holds the six directories (default: the parent of
#          this repository)
#
# Environment:
#   PHP    php command, needs the dom, intl, mbstring, sqlite3, xmlreader and
#          xmlwriter extensions (default: php)
#   PORT   port of the web server (default: 8080)
#   KEEP   set to 1 to leave the web server running at the end, to browse
#          http://localhost:$PORT/manual/fr/extensions.alphabetical.php
#
# The built pages are written to extensions/output and fr/output. The links of
# the extensions manual to the main manual are rewritten in extensions/output,
# so that "back" stays on this server instead of going to www.php.net.

set -eu

ROOT=${1:-$(cd "$(dirname "$0")/../.." && pwd)}
PHP=${PHP:-php}
PORT=${PORT:-8080}
KEEP=${KEEP:-0}
SITE="$ROOT/web-php"
LOG="$SITE/.build/extensions-migration-server.log"
BUILD_LOG="$SITE/.build/extensions-migration-build.log"
BASE="http://localhost:$PORT"
FAILURES=0

for directory in doc-base phd en fr extensions web-php; do
    if [ ! -d "$ROOT/$directory" ]; then
        echo "Missing directory: $ROOT/$directory" >&2
        exit 2
    fi
done

step() {
    printf '\n== %s\n' "$1"
}

pass() {
    printf '  ok    %s\n' "$1"
}

fail() {
    printf '  FAIL  %s\n' "$1"
    FAILURES=$((FAILURES + 1))
}

# check_status URL EXPECTED_CODE [ACCEPT_LANGUAGE]
check_status() {
    code=$(curl -s -o /dev/null -w '%{http_code}' -H "Accept-Language: ${3:-fr}" "$BASE$1")
    if [ "$code" = "$2" ]; then pass "$2 $1"; else fail "$1: expected $2, got $code"; fi
}

# check_redirect URL EXPECTED_LOCATION_PATH
check_redirect() {
    result=$(curl -s -o /dev/null -w '%{http_code} %{redirect_url}' "$BASE$1")
    if [ "$result" = "301 $BASE$2" ]; then pass "301 $1 -> $2"; else fail "$1: expected 301 $2, got $result"; fi
}

# check_page_contains URL TEXT DESCRIPTION
check_page_contains() {
    if curl -s -H 'Accept-Language: fr' "$BASE$1" | grep -q -F -- "$2"; then pass "$3"; else fail "$3 ($1)"; fi
}

# check_page_lacks URL TEXT DESCRIPTION
check_page_lacks() {
    if curl -s -H 'Accept-Language: fr' "$BASE$1" | grep -q -F -- "$2"; then fail "$3 ($1)"; else pass "$3"; fi
}

# run COMMAND...: the output goes to the build log, shown if the command fails
run() {
    if ! "$@" >>"$BUILD_LOG" 2>&1; then
        echo "Command failed: $*" >&2
        tail -n 30 "$BUILD_LOG" >&2
        exit 1
    fi
}

cleanup() {
    if [ "${SERVER_PID:-}" != "" ] && [ "$KEEP" != "1" ]; then
        kill "$SERVER_PID" 2>/dev/null || true
    fi
}
trap cleanup EXIT

mkdir -p "$SITE/.build"
: >"$BUILD_LOG"

step "Build the extensions manual (log: $BUILD_LOG)"
run $PHP -d memory_limit=-1 "$ROOT/doc-base/configure.php" --with-base-lang=extensions
run $PHP -d memory_limit=-1 "$ROOT/phd/render.php" --docbook "$ROOT/doc-base/.manual.xml" \
    --output="$ROOT/extensions/output" --package PHP --format php --lang extensions

step "Build the language manual (fr)"
run $PHP -d memory_limit=-1 "$ROOT/doc-base/configure.php" --with-lang=fr
run $PHP -d memory_limit=-1 "$ROOT/phd/render.php" --docbook "$ROOT/doc-base/.manual.xml" \
    --output="$ROOT/fr/output" --package PHP --format php --lang fr

step "Install both manuals in web-php"
ln -sfn "$ROOT/fr/output/php-web" "$SITE/public/manual/fr"
ln -sfn "$ROOT/extensions/output/php-web" "$SITE/public/manual/extensions"
find "$ROOT/extensions/output/php-web" -name '*.php' \
    -exec sed -i "s#https://www.php.net/manual/en/#$BASE/manual/fr/#g" {} +
echo "  fr         -> $ROOT/fr/output/php-web"
echo "  extensions -> $ROOT/extensions/output/php-web"

step "Start the web server on $BASE"
: >"$LOG"
(cd "$SITE/public" && exec $PHP -d display_errors=1 -d error_reporting=E_ALL \
    -S "localhost:$PORT" -t "$SITE/public" "$SITE/public/.router.php") >"$LOG" 2>&1 &
SERVER_PID=$!
for attempt in 1 2 3 4 5 6 7 8 9 10; do
    if curl -s -o /dev/null "$BASE/manual/fr/index.php"; then break; fi
    sleep 1
done

step "Old URLs of moved pages are redirected (any language)"
check_redirect /manual/fr/function.apcu-add.php /manual/extensions/function.apcu-add.php
check_redirect /manual/fr/book.apcu.php /manual/extensions/book.apcu.php
check_redirect /manual/en/book.imagick.php /manual/extensions/book.imagick.php
check_redirect /manual/ja/ref.apcu.php /manual/extensions/ref.apcu.php
# A few identifiers are mixed case, the requested name is lowercased first.
check_redirect /manual/de/pool.submitto.php /manual/extensions/pool.submitTo.php
check_redirect /manual/fr/pool.submitTo.php /manual/extensions/pool.submitTo.php

step "The extensions manual is served from /manual/extensions/"
check_status /manual/extensions/index.php 200
check_status /manual/extensions/book.apcu.php 200
check_status /manual/extensions/function.apcu-add.php 200
check_status /manual/extensions/function.does-not-exist.php 404
check_page_contains /manual/extensions/function.apcu-add.php 'lang="en"' "the page is English"
check_page_contains /manual/extensions/function.apcu-add.php 'rel="canonical" href="https://www.php.net/manual/extensions/function.apcu-add.php"' "canonical URL is under manual/extensions"
check_page_lacks /manual/extensions/function.apcu-add.php 'id="changelang"' "no language chooser"
check_page_lacks /manual/extensions/function.apcu-add.php 'hreflang="de"' "no alternate language"

step "Pages of the language manual are untouched"
check_status /manual/fr/function.strlen.php 200
check_status /manual/fr/class.exception.php 200
check_status /manual/fr/function.does-not-exist.php 404
check_page_contains /manual/fr/function.strlen.php 'lang="fr"' "the page is French"
check_page_contains /manual/fr/function.strlen.php 'id="changelang"' "language chooser is there"

step "Shortcuts find the pages of the extensions manual"
check_status /apcu_add 200
check_status /apcu-add 200 en
check_status /imagick 200
check_page_contains /apcu_add '<title>PHP: apcu_add - Manual</title>' "/apcu_add shows the page of apcu_add"
check_status /strlen 200

step "From the language manual to the extensions manual"
# The PDO drivers have no page yet: their references wait for a wrapper book
# in doc-extensions (see the comment at the end of its manual.xml). The links
# already point at the address the pages will have.
known_missing="extensions/ref.pdo-cubrid.php extensions/ref.pdo-ibm.php extensions/ref.pdo-informix.php extensions/ref.pdo-sqlsrv.php"
links=$(grep -h -o 'href="\.\./extensions/[^"#]*' "$ROOT"/fr/output/php-web/*.php | sed 's#href="\.\./##' | sort -u)
count=0
bad=0
for link in $links; do
    count=$((count + 1))
    code=$(curl -s -o /dev/null -w '%{http_code}' "$BASE/manual/$link")
    if [ "$code" != "200" ]; then
        missing=0
        for name in $known_missing; do
            if [ "$link" = "$name" ]; then missing=1; fi
        done
        if [ "$missing" -eq 1 ]; then
            printf '  known /manual/%s: %s\n' "$link" "$code"
        else
            bad=$((bad + 1))
            fail "/manual/$link: $code"
        fi
    fi
done
if [ "$count" -eq 0 ]; then fail "no page of the language manual links to the extensions manual"; fi
if [ "$bad" -eq 0 ] && [ "$count" -gt 0 ]; then pass "$count distinct links, all answer 200 but the known ones"; fi

step "Back, from the extensions manual to the language manual"
# These two pages were renamed in the main manual and the summaries of
# doc-extensions still point to the old names.
known_stale="language.exceptions.php reserved.constants.core.php"
links=$(grep -h -o "href=\"$BASE/manual/fr/[^\"#]*" "$ROOT"/extensions/output/php-web/*.php | sed "s#href=\"$BASE##" | sort -u)
count=0
bad=0
for link in $links; do
    count=$((count + 1))
    code=$(curl -s -o /dev/null -w '%{http_code}' "$BASE$link")
    if [ "$code" != "200" ]; then
        stale=0
        for name in $known_stale; do
            if [ "$link" = "/manual/fr/$name" ]; then stale=1; fi
        done
        if [ "$stale" -eq 1 ]; then
            printf '  known %s: %s\n' "$link" "$code"
        else
            bad=$((bad + 1))
            fail "$link: $code"
        fi
    fi
done
if [ "$count" -eq 0 ]; then fail "no page of the extensions manual links back"; fi
if [ "$bad" -eq 0 ] && [ "$count" -gt 0 ]; then pass "$count distinct links, all answer 200 but the known ones"; fi

step "The server raised no PHP warning"
if grep -q -E 'PHP (Warning|Fatal error|Deprecated|Notice)' "$LOG"; then
    fail "see $LOG"
    grep -E 'PHP (Warning|Fatal error|Deprecated|Notice)' "$LOG" | sort | uniq -c | head -5
else
    pass "no warning in $LOG"
fi

printf '\n'
if [ "$FAILURES" -eq 0 ]; then
    echo "All checks passed."
else
    echo "$FAILURES check(s) failed."
fi
if [ "$KEEP" = "1" ]; then
    echo "Server left running on $BASE (pid $SERVER_PID)."
fi

[ "$FAILURES" -eq 0 ]
