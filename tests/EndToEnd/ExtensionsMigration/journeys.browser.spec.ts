import {devices, expect, test} from '@playwright/test';
import {language} from './manuals';

/**
 * What a visitor does in a browser: follow an old link, go from one manual to
 * the other and come back, type a shortcut.
 */

test('an old URL lands on the page of the extensions manual after a 301', async ({page}) => {
    const response = await page.goto(`/manual/${language}/function.apcu-add.php`);

    await expect(page).toHaveURL(/\/manual\/extensions\/function\.apcu-add\.php$/);
    await expect(page.locator('h1.refname')).toHaveText('apcu_add');
    expect(response?.status()).toBe(200);

    const previous = response?.request().redirectedFrom();
    expect(previous, 'the browser was redirected').not.toBeNull();
    expect((await previous?.response())?.status()).toBe(301);
});

test('from the language manual to the extensions manual, and back', async ({page}) => {
    await page.goto(`/manual/${language}/aliases.php`);
    await expect(page.locator('#changelang'), 'the language manual has a chooser').toHaveCount(1);

    await page.locator('a[href*="../extensions/"]').first().click();
    await expect(page).toHaveURL(/\/manual\/extensions\//);
    await expect(page.locator('#changelang'), 'the extensions manual has none').toHaveCount(0);
    await expect(page.locator('#breadcrumbs-inner')).toContainText('Third-Party Extension');

    // The way back: a page of the extensions manual that links to the main manual.
    await page.goto('/manual/extensions/apcu.installation.php');
    await page.locator(`a[href$="/manual/${language}/install.pecl.php"]`).first().click();
    await expect(page).toHaveURL(new RegExp(`/manual/${language}/install\\.pecl\\.php$`));
    await expect(page.locator('#changelang')).toHaveCount(1);
    await expect(page.locator('html')).toHaveAttribute('lang', language);
});

test('the breadcrumbs of the extensions manual stay inside it', async ({page}) => {
    await page.goto('/manual/extensions/function.apcu-add.php');

    await page.locator('#breadcrumbs-inner a', {hasText: 'Third-Party Extensions'}).click();
    await expect(page).toHaveURL(/\/manual\/extensions\/extensions\.php$/);

    await page.locator('#breadcrumbs-inner a', {hasText: 'Third-Party Extension Manual'}).click();
    await expect(page).toHaveURL(/\/manual\/extensions\/index\.php$/);
});

test('a shortcut finds the page of a function that moved', async ({page}) => {
    await page.goto('/apcu_add');

    await expect(page).toHaveTitle(/apcu_add/);
    await expect(page.locator('h1.refname')).toHaveText('apcu_add');
});

test('the extensions manual reads without JavaScript', async ({browser}) => {
    const context = await browser.newContext({javaScriptEnabled: false});
    const page = await context.newPage();

    await page.goto('/manual/extensions/function.apcu-add.php');
    await expect(page.locator('h1.refname')).toBeVisible();
    await page.locator('#breadcrumbs-inner a', {hasText: 'Third-Party Extensions'}).click();
    await expect(page).toHaveURL(/\/manual\/extensions\/extensions\.php$/);

    await context.close();
});

test('a page of the extensions manual does not overflow on a phone', async ({browser}) => {
    const context = await browser.newContext({...devices['Pixel 5']});
    const page = await context.newPage();

    await page.goto('/manual/extensions/function.apcu-add.php');
    await expect(page.locator('h1.refname')).toBeVisible();

    const overflow = await page.evaluate(() => document.documentElement.scrollWidth - window.innerWidth);
    expect(overflow, 'horizontal overflow in pixels').toBeLessThanOrEqual(1);

    await test.info().attach('phone', {body: await page.screenshot(), contentType: 'image/png'});
    await context.close();
});

test('the pages of the two manuals carry the right language and canonical URL', async ({page}) => {
    await page.goto('/manual/extensions/book.apcu.php');
    await expect(page.locator('html')).toHaveAttribute('lang', 'en');
    await expect(page.locator('link[rel="canonical"]')).toHaveAttribute('href', 'https://www.php.net/manual/extensions/book.apcu.php');
    await expect(page.locator('link[hreflang]'), 'no alternate language').toHaveCount(1); // only x-default

    await page.goto(`/manual/${language}/function.strlen.php`);
    await expect(page.locator('html')).toHaveAttribute('lang', language);
    await expect(page.locator('link[rel="canonical"]')).toHaveAttribute('href', `https://www.php.net/manual/${language}/function.strlen.php`);
});
