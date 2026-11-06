import {expect, test} from '@playwright/test';
import {language, redirectEntries, sample} from './manuals';

/**
 * error.php reads and decodes redirects.json to answer a redirect, and does it
 * on every request for a page that does not exist. These tests do not set a
 * budget for production: they keep an eye on the cost, and fail only when it
 * gets out of hand.
 */

async function timed(request, url: string): Promise<number> {
    const start = performance.now();
    await request.get(url, {maxRedirects: 0});

    return performance.now() - start;
}

function percentile(values: number[], p: number): number {
    const sorted = [...values].sort((a, b) => a - b);

    return sorted[Math.min(sorted.length - 1, Math.floor(sorted.length * p))];
}

for (const [name, urls] of [
    ['redirected old URLs', sample(redirectEntries, 30).slice(0, 200).map(([from]) => `/manual/${language}/${from}.php`)],
    ['pages that do not exist', Array.from({length: 200}, (_, i) => `/manual/${language}/function.does-not-exist-${i}.php`)],
] as Array<[string, string[]]>) {
    test(`200 requests in parallel: ${name}`, async ({request}) => {
        const start = performance.now();
        const durations = await Promise.all(urls.map((url) => timed(request, url)));
        const total = performance.now() - start;

        test.info().annotations.push({
            type: 'timing',
            description: `total ${total.toFixed(0)} ms, median ${percentile(durations, 0.5).toFixed(0)} ms, p95 ${percentile(durations, 0.95).toFixed(0)} ms`,
        });

        expect(percentile(durations, 0.95), 'p95 in milliseconds').toBeLessThan(5000);
    });
}
