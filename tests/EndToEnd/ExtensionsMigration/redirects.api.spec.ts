import {expect, test} from '@playwright/test';
import {inParallel, language, redirectEntries, sample} from './manuals';

/**
 * Every page that moved to the extensions manual must be redirected from the
 * old URL of every language, with a 301 to the same page of /manual/extensions/.
 */

const CHUNK = 250;
const SAMPLED_EVERY = 11;
const OTHER_LANGUAGES = ['en', 'de', 'ja', 'pt_BR', 'zh', 'ru'];

async function expectRedirects(request, lang: string, entries: [string, string][]) {
    const failures: string[] = [];

    await inParallel(entries, 20, async ([from, to]) => {
        const response = await request.get(`/manual/${lang}/${from}.php`, {maxRedirects: 0});
        const location = response.headers()['location'];
        const target = location ? new URL(location).pathname : '(none)';

        if (response.status() !== 301 || target !== `/manual/extensions/${to}.php`) {
            failures.push(`/manual/${lang}/${from}.php: ${response.status()} ${target}`);
        }
    });

    expect(failures.slice(0, 20), `${failures.length} of ${entries.length} old URLs are wrong`).toEqual([]);
}

test.describe(`all moved pages, ${language}`, () => {
    for (let start = 0; start < redirectEntries.length; start += CHUNK) {
        const entries = redirectEntries.slice(start, start + CHUNK);

        test(`${entries[0][0]} .. ${entries[entries.length - 1][0]}`, async ({request}) => {
            await expectRedirects(request, language, entries);
        });
    }
});

test.describe('a sample of the moved pages, in the other languages', () => {
    for (const lang of OTHER_LANGUAGES) {
        test(`redirects from /manual/${lang}/`, async ({request}) => {
            await expectRedirects(request, lang, sample(redirectEntries, SAMPLED_EVERY));
        });
    }
});

test('HEAD requests are redirected like GET requests', async ({request}) => {
    for (const [from, to] of sample(redirectEntries, 400)) {
        const response = await request.fetch(`/manual/${language}/${from}.php`, {method: 'HEAD', maxRedirects: 0});

        expect(response.status(), from).toBe(301);
        expect(new URL(response.headers()['location']).pathname).toBe(`/manual/extensions/${to}.php`);
    }
});
