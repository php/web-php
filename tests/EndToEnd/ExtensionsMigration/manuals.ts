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

type RedirectMaps = {
    shortcut: Record<string, string>;
    in_manual: Record<string, string>;
    both: Record<string, string>;
    in_place: Record<string, string>;
};

function mapsOf(directory: string): RedirectMaps {
    return {shortcut: {}, in_manual: {}, both: {}, in_place: {}, ...JSON.parse(readFileSync(`${directory}/redirects.json`, 'utf8'))};
}

const englishOutput = `${root}/en/output/php-web`;

/** The four maps of redirects.json of the extensions manual (empty but for the pages it renames), and of the English manual. */
export const extensionMaps = mapsOf(extensionsOutput);
export const englishMaps = mapsOf(englishOutput);

/** A target of a map is "page" or "page#anchor". */
export function splitTarget(target: string): [string, string] {
    const [page, anchor = ''] = target.split('#', 2);

    return [page, anchor];
}

/** The path (and fragment) a request is redirected to for a target of a map. */
export function expectedLocation(manual: string, target: string): string {
    const [page, anchor] = splitTarget(target);

    return `/manual/${manual}/${page}.php${anchor === '' ? '' : `#${anchor}`}`;
}

/** Every page of the extensions manual, and of the language manual. */
export const extensionPages = pagesOf(extensionsOutput);
export const languagePages = pagesOf(languageOutput);
export const englishPages = pagesOf(englishOutput);

/**
 * A page that moved to the extensions manual kept its name, so the old URL needs
 * no entry in any map: error.php redirects it because the page is missing from the
 * language manual and present in the extensions manual. The old URL is lowercased
 * before it is looked up, so a page whose name has uppercase letters is the
 * exception: it has an entry in the redirects of doc-en (see renamedEntries).
 */
const inLanguageManual = new Set(languagePages);
export const movedPages = extensionPages.filter((page) => !inLanguageManual.has(page));

/** Old page name (lowercase) to the name of the page in the extensions manual. */
export const redirects: Record<string, string> = Object.fromEntries(movedPages.map((page) => [page.toLowerCase(), page]));

export const redirectEntries = Object.entries(redirects);

/** Pages of the extensions manual that are not redirected: the summaries the language manual has too. */
export const notRedirected = extensionPages.filter((page) => inLanguageManual.has(page));

/** The prefix doc-en gives to the target of a redirect to a page of another manual. */
export const EXTENSIONS_PREFIX = 'extensions/';

/**
 * The entries of a map that lead to the extensions manual ("extensions/<page>[#anchor]"),
 * with the prefix removed from the target.
 */
export function entriesToExtensions(map: Record<string, string>): [string, string][] {
    return Object.entries(map)
        .filter(([, to]) => to.startsWith(EXTENSIONS_PREFIX))
        .map(([from, to]): [string, string] => [from, to.slice(EXTENSIONS_PREFIX.length)]);
}

/** The entries of a map that stay in the manual of the map. */
export function entriesInManual(map: Record<string, string>): [string, string][] {
    return Object.entries(map).filter(([, to]) => !to.startsWith(EXTENSIONS_PREFIX));
}

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

export function pageContent(directory: 'extensions' | 'language' | 'english', page: string): string {
    const directories = {extensions: extensionsOutput, language: languageOutput, english: englishOutput};

    return readFileSync(`${directories[directory]}/${page}.php`, 'utf8');
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
