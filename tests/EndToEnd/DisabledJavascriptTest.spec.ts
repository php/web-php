import { test, expect } from '@playwright/test';

const httpHost = process.env.HTTP_HOST

if (typeof httpHost !== 'string') {
    throw new Error('Environment variable "HTTP_HOST" is not set.')
}

test.beforeEach(async ({ page }) => {
    await page.goto(`${httpHost}`);
});

test.use({ javaScriptEnabled: false });

test('search should fallback when javascript is disabled', async ({ page }) => {
    let searchInput = await page.getByRole('searchbox', { name: 'Search docs' });
    await searchInput.fill('strpos');
    await searchInput.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual/en/function.strpos.php`);

    searchInput = await page.getByRole('searchbox', { name: 'Search docs' });
    await searchInput.fill('php basics');
    await searchInput.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual-lookup.php?pattern=php+basics&scope=quickref`);
});
