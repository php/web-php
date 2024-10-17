import { test, expect, devices } from '@playwright/test';

const httpHost = process.env.HTTP_HOST

if (typeof httpHost !== 'string') {
    throw new Error('Environment variable "HTTP_HOST" is not set.')
}

test.use({ javaScriptEnabled: false });

test('search should fallback when javascript is disabled', async ({ page }) => {
    await page.goto(httpHost);
    let searchInput = await page.getByRole('searchbox', { name: 'Search docs' });
    await searchInput.fill('strpos');
    await searchInput.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual/en/function.strpos.php`);

    searchInput = await page.getByRole('searchbox', { name: 'Search docs' });
    await searchInput.fill('php basics');
    await searchInput.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual-lookup.php?pattern=php+basics&scope=quickref`);
});

test('search should fallback when javascript is disabled on mobile', async ({ browser }) => {
    const context = await browser.newContext({
        ...devices['iPhone SE']
    });
    const page = await context.newPage();
    await page.goto(httpHost);
    await page
        .getByRole('link', { name: 'Search docs' })
        .click();
    await expect(page).toHaveURL(`http://${httpHost}/lookup-form.php`);

    const searchInput = await page.getByRole('searchbox', { name: 'Lookup docs' });
    await searchInput.fill('strpos');
    await searchInput.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual/en/function.strpos.php`);
});

test('menu should fallback when javascript is disabled on mobile', async ({ browser }) => {
    const context = await browser.newContext({
        ...devices['iPhone SE']
    });
    const page = await context.newPage();
    await page.goto(httpHost);
    await page
        .getByRole('link', { name: 'Menu' })
        .click();
    await expect(page).toHaveURL(`http://${httpHost}/menu.php`);
});
