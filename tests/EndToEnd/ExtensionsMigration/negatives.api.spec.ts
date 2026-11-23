import {expect, test} from '@playwright/test';
import {
    extensionPages,
    inParallel,
    language,
    languagePages,
    notRedirected,
    redirectEntries,
    sample,
} from './manuals';

/**
 * What must NOT happen: pages that stayed in the language manual are not
 * redirected, pages that never existed are not invented, and the targets exist.
 */

test('every redirect points at a page that exists in the extensions manual', () => {
    const existing = new Set(extensionPages);
    const missing = redirectEntries.filter(([, to]) => !existing.has(to)).map(([from, to]) => `${from} -> ${to}`);

    expect(missing.slice(0, 20), `${missing.length} targets are missing`).toEqual([]);
});

test('a sample of the redirect targets answer 200', async ({request}) => {
    const failures: string[] = [];

    await inParallel(sample(redirectEntries, 20), 20, async ([, to]) => {
        const response = await request.get(`/manual/extensions/${to}.php`, {maxRedirects: 0});
        if (response.status() !== 200) {
            failures.push(`${to}: ${response.status()}`);
        }
    });

    expect(failures.slice(0, 20)).toEqual([]);
});

test(`the pages that stayed in the ${language} manual answer 200, not a redirect`, async ({request}) => {
    const failures: string[] = [];

    await inParallel(sample(languagePages, 15), 20, async (page) => {
        const response = await request.get(`/manual/${language}/${page}.php`, {maxRedirects: 0});
        if (response.status() !== 200) {
            failures.push(`${page}: ${response.status()}`);
        }
    });

    expect(failures.slice(0, 20), `${failures.length} pages`).toEqual([]);
});

test('the language summaries of the extensions manual are not redirected', async ({request}) => {
    expect(notRedirected.length, 'there are summaries to test').toBeGreaterThan(50);

    // Other languages are not built here: such a page must stay a 404.
    const failures: string[] = [];
    await inParallel(notRedirected, 20, async (page) => {
        const response = await request.get(`/manual/ja/${page}.php`, {maxRedirects: 0});
        if (response.status() === 301) {
            failures.push(`/manual/ja/${page}.php`);
        }
    });

    expect(failures.slice(0, 20), `${failures.length} summaries are redirected`).toEqual([]);
});

test('pages that never existed answer 404, in every manual', async ({request}) => {
    for (const url of [
        `/manual/${language}/function.does-not-exist.php`,
        `/manual/${language}/book.does-not-exist.php`,
        '/manual/extensions/function.does-not-exist.php',
        '/manual/extensions/book.does-not-exist.php',
        '/manual/ja/function.does-not-exist.php',
    ]) {
        const response = await request.get(url, {maxRedirects: 0});
        expect(response.status(), url).toBe(404);
    }
});

test('a request in the extensions manual is never redirected to itself', async ({request}) => {
    for (const [from] of sample(redirectEntries, 200)) {
        const response = await request.get(`/manual/extensions/${from}.php`, {maxRedirects: 0});
        expect(response.status(), from).not.toBe(301);
    }
});
