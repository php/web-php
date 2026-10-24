import {readdirSync, readFileSync} from 'node:fs';
import {resolve} from 'node:path';

/**
 * The tests of the move of the extensions to the extensions manual are driven
 * by the built manuals: nothing is written by hand. They need the output of
 * tests/extensions-migration.sh, so run it first (with KEEP=1 to keep the web
 * server up), then:
 *
 *   EXTENSIONS_MIGRATION=1 HTTP_HOST=http://localhost:8080 npx playwright test --project="Extensions migration (API)"
 *
 * MANUALS_ROOT is the directory that holds extensions/ and the language
 * directory (default: the parent of this repository), LANGUAGE the language
 * manual that was built (default: fr).
 */
export const root = process.env.MANUALS_ROOT ?? resolve(__dirname, '../../../..');
export const language = process.env.LANGUAGE ?? 'fr';

const extensionsOutput = `${root}/extensions/output/php-web`;
const languageOutput = `${root}/${language}/output/php-web`;

function pagesOf(directory: string): string[] {
    return readdirSync(directory)
        .filter((file) => file.endsWith('.php'))
        .map((file) => file.slice(0, -'.php'.length))
        .sort();
}

/** Old page name (lowercase) to the name of the page in the extensions manual. */
export const redirects: Record<string, string> = JSON.parse(
    readFileSync(`${extensionsOutput}/redirects.json`, 'utf8'),
).in_manual;

export const redirectEntries = Object.entries(redirects);

/** Every page of the extensions manual, and of the language manual. */
export const extensionPages = pagesOf(extensionsOutput);
export const languagePages = pagesOf(languageOutput);

/** Pages of the extensions manual that are not redirected: the language summaries. */
export const notRedirected = extensionPages.filter((page) => !(page.toLowerCase() in redirects));

/** Every n-th element, to take a stable sample of a long list. */
export function sample<T>(list: T[], every: number): T[] {
    return list.filter((_, index) => index % every === 0);
}

/**
 * Pages that the links of the language manual already point at but that the
 * extensions manual does not have yet: the PDO drivers wait for a wrapper book.
 */
export const knownMissingExtensionPages = ['ref.pdo-cubrid', 'ref.pdo-ibm', 'ref.pdo-informix', 'ref.pdo-sqlsrv'];

/** Pages that were renamed in the main manual; the summaries still link to the old names. */
export const knownStaleLanguagePages = ['language.exceptions', 'reserved.constants.core'];

export function pageContent(directory: 'extensions' | 'language', page: string): string {
    return readFileSync(`${directory === 'extensions' ? extensionsOutput : languageOutput}/${page}.php`, 'utf8');
}

/**
 * Run the work on a list with a bounded number of requests in flight.
 */
export async function inParallel<T, R>(items: T[], size: number, work: (item: T) => Promise<R>): Promise<R[]> {
    const results: R[] = [];
    for (let start = 0; start < items.length; start += size) {
        results.push(...(await Promise.all(items.slice(start, start + size).map(work))));
    }

    return results;
}
