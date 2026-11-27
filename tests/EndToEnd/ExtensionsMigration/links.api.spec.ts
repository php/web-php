import {expect, test} from '@playwright/test';
import {
    extensionPages,
    inParallel,
    knownMissingExtensionPages,
    knownStaleLanguagePages,
    language,
    languagePages,
    pageContent,
    sample,
} from './manuals';

/**
 * The links between the two manuals, in both directions, and the navigation
 * links of the pages of the extensions manual.
 */

function distinct(pattern: RegExp, pages: string[], directory: 'extensions' | 'language'): string[] {
    const links = new Set<string>();
    for (const page of pages) {
        for (const match of pageContent(directory, page).matchAll(pattern)) {
            links.add(match[1]);
        }
    }

    return [...links].sort();
}

test(`from the ${language} manual to the extensions manual`, async ({request}) => {
    const links = distinct(/href="\.\.\/extensions\/([^"#]+)\.php/g, languagePages, 'language');
    expect(links.length, 'the language manual links to the extensions manual').toBeGreaterThan(10);

    const failures: string[] = [];
    await inParallel(links, 20, async (page) => {
        const response = await request.get(`/manual/extensions/${page}.php`, {maxRedirects: 0});
        if (response.status() !== 200 && !knownMissingExtensionPages.includes(page)) {
            failures.push(`${page}: ${response.status()}`);
        }
    });

    expect(failures, `${links.length} distinct links`).toEqual([]);
});

test(`from the extensions manual back to the ${language} manual`, async ({request}) => {
    const links = distinct(new RegExp(`href="[^"]*/manual/${language}/([^"#]+)\\.php`, 'g'), extensionPages, 'extensions');
    expect(links.length, 'the extensions manual links back').toBeGreaterThan(50);

    const failures: string[] = [];
    await inParallel(links, 20, async (page) => {
        const response = await request.get(`/manual/${language}/${page}.php`, {maxRedirects: 0});
        if (response.status() !== 200 && !knownStaleLanguagePages.includes(page)) {
            failures.push(`${page}: ${response.status()}`);
        }
    });

    expect(failures, `${links.length} distinct links`).toEqual([]);
});

test('the navigation links of the pages of the extensions manual answer 200', async ({request}) => {
    const failures: string[] = [];

    await inParallel(sample(extensionPages, 25), 10, async (page) => {
        const response = await request.get(`/manual/extensions/${page}.php`);
        const html = await response.text();

        for (const match of html.matchAll(/<link rel="(contents|index|prev|next)" href="([^"]+)"/g)) {
            const target = await request.get(match[2], {maxRedirects: 0});
            if (target.status() !== 200) {
                failures.push(`${page} ${match[1]} ${match[2]}: ${target.status()}`);
            }
        }
    });

    expect(failures.slice(0, 20), `${failures.length} broken navigation links`).toEqual([]);
});

test('the breadcrumbs of the pages of the extensions manual lead somewhere that exists', async ({request}) => {
    const failures: string[] = [];
    const withoutBreadcrumbs: string[] = [];

    await inParallel(sample(extensionPages, 60), 10, async (page) => {
        const url = `/manual/extensions/${page}.php`;
        const html = await (await request.get(url)).text();
        const crumbs = html.match(/<div id="breadcrumbs-inner">[\s\S]*?<\/ul>/)?.[0] ?? '';
        const hrefs = [...crumbs.matchAll(/<li><a href='([^']+)'/g)].map((match) => match[1]);

        if (hrefs.length === 0) {
            withoutBreadcrumbs.push(page);
        }

        for (const href of hrefs) {
            const target = await request.get(new URL(href, `http://x/manual/extensions/`).pathname, {maxRedirects: 0});
            if (target.status() !== 200) {
                failures.push(`${page} -> ${href}: ${target.status()}`);
            }
        }
    });

    expect(withoutBreadcrumbs, 'pages without breadcrumbs').toEqual([]);
    expect(failures.slice(0, 20), `${failures.length} broken breadcrumbs`).toEqual([]);
});
