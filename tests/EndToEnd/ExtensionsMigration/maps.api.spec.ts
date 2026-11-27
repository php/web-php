import {expect, test} from '@playwright/test';
import {existsSync} from 'node:fs';
import {resolve} from 'node:path';
import {
    englishMaps,
    englishPages,
    entriesInManual,
    entriesToExtensions,
    expectedLocation,
    extensionMaps,
    extensionPages,
    inParallel,
    language,
    pageContent,
    splitTarget,
} from './manuals';

/**
 * redirects.json has four maps: 'in_manual' (/manual/<lang>/<page>.php),
 * 'shortcut' (php.net/<page>), 'both' and 'in_place'. The tests of the moved
 * pages cover 'in_manual' of the extensions manual; these cover the rest,
 * and every target of every map: the page exists and so does its anchor.
 */

type Map = Record<string, string>;

const entriesOf = (map: Map): [string, string][] => Object.entries(map);

/** Keys that are plain page names: the others (operators, $variables) are not URLs of a page. */
const isPageKey = (key: string): boolean => /^[a-z0-9][a-z0-9._-]*$/.test(key);

/** A key that is a file or a directory of public/ (include/) is served as is, not looked up. */
const publicDirectory = resolve(__dirname, '../../../public');
const isShadowed = (key: string): boolean =>
    existsSync(`${publicDirectory}/${key}`) || existsSync(`${publicDirectory}/${key}.php`);

function missingTargets(maps: Record<string, Map>, pages: string[], directory: 'extensions' | 'english'): string[] {
    const existing = new Set(pages);
    const missing: string[] = [];

    for (const [name, map] of Object.entries(maps)) {
        // The targets of the English maps that lead to the extensions manual are checked against that manual.
        const entries = directory === 'english' ? entriesInManual(map) : entriesOf(map);
        for (const [from, to] of entries) {
            const [page, anchor] = splitTarget(to);
            if (!existing.has(page)) {
                missing.push(`${name}: ${from} -> ${to} (no such page)`);
            } else if (directory === 'extensions' && anchor !== '' && !pageContent(directory, page).includes(`id="${anchor}"`)) {
                missing.push(`${name}: ${from} -> ${to} (no such anchor)`);
            }
        }
    }

    return missing;
}

test('every target of the extensions manual maps exists, with its anchor', () => {
    const missing = missingTargets(extensionMaps, extensionPages, 'extensions');

    expect(missing.slice(0, 20), `${missing.length} targets are wrong`).toEqual([]);
});

test('every target of the English maps that leads to the extensions manual exists there, with its anchor', () => {
    const maps = Object.fromEntries(
        Object.entries(englishMaps).map(([name, map]) => [name, Object.fromEntries(entriesToExtensions(map))]),
    );
    const missing = missingTargets(maps, extensionPages, 'extensions');

    expect(Object.values(maps).flatMap((map) => Object.keys(map)).length, 'there are such redirects').toBeGreaterThan(0);
    expect(missing.slice(0, 20), `${missing.length} targets are wrong`).toEqual([]);
});

// Only the page is checked: the directives that PHP removed (asp_tags, y2k_compliance...)
// have no anchor left in their page, and their shortcut still leads to the page.
test('every target of the English manual maps is a page', () => {
    const missing = missingTargets(englishMaps, englishPages, 'english');

    expect(missing.slice(0, 20), `${missing.length} targets are wrong`).toEqual([]);
});

test.describe('pages and shortcuts that moved to the extensions manual, renamed or not found by name', () => {
    // These are the redirects of doc-en marked manual="extensions": the renamed pages and the shortcuts.
    const renamedPages = [...entriesToExtensions(englishMaps.both), ...entriesToExtensions(englishMaps.in_manual)];
    const shortcuts = [...entriesToExtensions(englishMaps.both), ...entriesToExtensions(englishMaps.shortcut)].filter(
        ([from]) => isPageKey(from),
    );

    test('the maps are not empty', () => {
        expect(shortcuts.length).toBeGreaterThan(0);
    });

    test('an old URL of the main manual of any language is redirected, with its anchor', async ({request}) => {
        const failures: string[] = [];

        for (const lang of [language, 'en', 'de', 'ja']) {
            await inParallel(renamedPages, 10, async ([from, to]) => {
                const response = await request.get(`/manual/${lang}/${from}.php`, {maxRedirects: 0});
                const location = response.headers()['location'];
                const actual = location ? new URL(location).pathname + new URL(location).hash : '(none)';

                if (response.status() !== 301 || actual !== expectedLocation('extensions', to)) {
                    failures.push(`/manual/${lang}/${from}.php: ${response.status()} ${actual}`);
                }
            });
        }

        expect(failures.slice(0, 20), `${failures.length} old URLs are wrong`).toEqual([]);
    });

    test('a shortcut is redirected, whatever the language and the spelling', async ({request}) => {
        const failures: string[] = [];

        await inParallel(shortcuts, 10, async ([from, to]) => {
            for (const spelling of new Set([from, from.replaceAll('-', '_'), from.toUpperCase()])) {
                for (const acceptLanguage of ['en', 'de']) {
                    const response = await request.get(`/${spelling}`, {
                        maxRedirects: 0,
                        headers: {'Accept-Language': acceptLanguage},
                    });
                    const location = response.headers()['location'];
                    const actual = location ? new URL(location).pathname + new URL(location).hash : '(none)';

                    if (response.status() !== 301 || actual !== expectedLocation('extensions', to)) {
                        failures.push(`/${spelling} (${acceptLanguage}): ${response.status()} ${actual}`);
                    }
                }
            }
        });

        expect(failures.slice(0, 20), `${failures.length} shortcuts are wrong`).toEqual([]);
    });

    test('the query string of a shortcut is kept, before the anchor', async ({request}) => {
        const failures: string[] = [];

        await inParallel(shortcuts, 10, async ([from, to]) => {
            const response = await request.get(`/${from}?x=1`, {maxRedirects: 0});
            const location = response.headers()['location'];
            const [page, anchor] = splitTarget(to);
            const expected = `/manual/extensions/${page}.php?x=1${anchor === '' ? '' : `#${anchor}`}`;
            const actual = location ? new URL(location).pathname + new URL(location).search + new URL(location).hash : '(none)';

            if (response.status() !== 301 || actual !== expected) {
                failures.push(`/${from}?x=1: ${response.status()} ${actual}`);
            }
        });

        expect(failures.slice(0, 20), `${failures.length} shortcuts are wrong`).toEqual([]);
    });

    test('the page a shortcut leads to answers 200', async ({request}) => {
        const failures: string[] = [];

        await inParallel(shortcuts, 10, async ([from, to]) => {
            const response = await request.get(`/${from}`);
            if (response.status() !== 200 || !response.url().includes(`/manual/extensions/${splitTarget(to)[0]}.php`)) {
                failures.push(`/${from}: ${response.status()} ${response.url()}`);
            }
        });

        expect(failures.slice(0, 20)).toEqual([]);
    });
});

test.describe('the redirects of the English manual still lead to a page', () => {
    const alive = ([from]: [string, string]) => isPageKey(from) && !isShadowed(from);
    const inManual = [...entriesOf(englishMaps.both), ...entriesOf(englishMaps.in_manual)].filter(alive);
    const bare = [
        ...entriesOf(englishMaps.both),
        ...entriesOf(englishMaps.shortcut),
        ...entriesOf(englishMaps.in_place),
    ].filter(alive);

    test('an old URL of the main manual ends on a page, and keeps its anchor when it redirects', async ({request}) => {
        const failures: string[] = [];

        await inParallel(inManual, 10, async ([from, to]) => {
            const first = await request.get(`/manual/${language}/${from}.php`, {maxRedirects: 0});
            const location = first.headers()['location'];
            const [, anchor] = splitTarget(to);
            if (first.status() !== 301 || !location || (anchor !== '' && new URL(location).hash !== `#${anchor}`)) {
                failures.push(`/manual/${language}/${from}.php: ${first.status()} ${location ?? '(none)'}`);
                return;
            }
            const final = await request.get(`/manual/${language}/${from}.php`);
            if (final.status() !== 200) {
                failures.push(`/manual/${language}/${from}.php ends on ${final.status()} ${final.url()}`);
            }
        });

        expect(failures.slice(0, 20), `${failures.length} of ${inManual.length} old URLs are wrong`).toEqual([]);
    });

    test('a shortcut ends on a page', async ({request}) => {
        const failures: string[] = [];

        await inParallel(bare, 10, async ([from]) => {
            const response = await request.get(`/${from}`, {headers: {'Accept-Language': language}});
            if (response.status() !== 200) {
                failures.push(`/${from}: ${response.status()} ${response.url()}`);
            }
        });

        expect(failures.slice(0, 20), `${failures.length} of ${bare.length} shortcuts are wrong`).toEqual([]);
    });
});
