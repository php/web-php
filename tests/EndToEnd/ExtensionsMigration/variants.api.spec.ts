import {expect, test} from '@playwright/test';
import {language, redirectEntries, sample} from './manuals';

/**
 * The same old URL written in the ways visitors, bookmarks and search engines
 * write it must end up on the same page of the extensions manual.
 */

const pages = sample(redirectEntries, 50);

const variants: Array<[string, (from: string) => string]> = [
    ['without .php', (from) => `/manual/${language}/${from}`],
    ['upper case', (from) => `/manual/${language}/${from.toUpperCase()}.php`],
    ['trailing slash', (from) => `/manual/${language}/${from}.php/`],
    ['with a query string', (from) => `/manual/${language}/${from}.php?foo=bar&x=1`],
    ['with an anchor-like suffix in the query', (from) => `/manual/${language}/${from}.php?x=%23top`],
];

for (const [name, url] of variants) {
    test(`old URL ${name}`, async ({request}) => {
        const failures: string[] = [];

        for (const [from, to] of pages) {
            const response = await request.get(url(from), {maxRedirects: 0});
            const location = response.headers()['location'];
            const target = location ? new URL(location).pathname : '(none)';

            if (response.status() !== 301 || target !== `/manual/extensions/${to}.php`) {
                failures.push(`${url(from)}: ${response.status()} ${target}`);
            }
        }

        expect(failures.slice(0, 10), `${failures.length} of ${pages.length}`).toEqual([]);
    });
}

test('the redirect keeps the visitor on the same host and scheme', async ({request, baseURL}) => {
    const [from, to] = pages[0];
    const response = await request.get(`/manual/${language}/${from}.php`, {maxRedirects: 0});

    expect(response.headers()['location']).toBe(`${baseURL}/manual/extensions/${to}.php`);
});
