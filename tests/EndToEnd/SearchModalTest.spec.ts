import { test, expect } from '@playwright/test';

const httpHost = process.env.HTTP_HOST

if (typeof httpHost !== 'string') {
    throw new Error('Environment variable "HTTP_HOST" is not set.')
}

test.beforeEach(async ({ page }) => {
    await page.goto(httpHost);
});

const openSearchModal = async (page) => {
    await page.getByRole('button', {name: 'Search'}).click();
    const modal = await page.getByRole('dialog', { name: 'Search modal' });

    // Wait for the modal animation to finish
    await expect(page.locator('#search-modal__backdrop.show')).not.toHaveClass('showing');

    expect(modal).toBeVisible();
    return modal;
}

const expectModalToBeHidden = async (page, modal) => {
    await expect(page.locator('#search-modal__backdrop')).not.toHaveClass(['show', 'hiding']);
    await expect(modal).toBeHidden();
}

const expectOption = async (modal, name) => {
    await expect(modal.getByRole('option', { name })).toBeVisible();
}

const expectSelectedOption = async (modal, name) => {
    await expect(modal.getByRole('option', { name, selected: true })).toBeVisible();
}

test('should open search modal when search button is clicked', async ({ page }) => {
    const searchModal = await openSearchModal(page);
    await expect(searchModal).toBeVisible();
});

test('should disable window scroll when search modal is open', async ({ page }) => {
    await openSearchModal(page);
    await page.mouse.wheel(0, 100);
    await page.waitForTimeout(100);
    const currentScrollY = await page.evaluate(() => window.scrollY);
    expect(currentScrollY).toBe(0);
});

test('should focus on search input when modal is opened', async ({ page }) => {
    const modal = await openSearchModal(page);
    const searchInput = modal.getByRole('searchbox', { name: 'Search docs' });
    await expect(searchInput).toBeFocused();
    await expect(searchInput).toHaveValue('');
});

test('should close search modal when close button is clicked', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('button', { name: 'Close' }).click();
    await expectModalToBeHidden(page, modal);
});

test('should re-enable window scroll when search modal is closed', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('button', { name: 'Close' }).click();
    await expectModalToBeHidden(page, modal);
    await page.mouse.wheel(0, 100);
    await page.waitForTimeout(100); // wait for scroll event to be processed
    const currentScrollY = await page.evaluate(() => window.scrollY);
    expect(currentScrollY).toBe(100);
});

test('should close search modal when Escape key is pressed', async ({ page }) => {
    const modal = await openSearchModal(page);
    await page.keyboard.press('Escape');
    await expectModalToBeHidden(page, modal);
});

test('should close search modal when clicking outside of it', async ({ page }) => {
    const modal = await openSearchModal(page);
    await page.click('#search-modal__backdrop', { position: { x: 10, y: 10 } });
    await expectModalToBeHidden(page, modal);
});

test('should perform search and display results', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('searchbox').fill('array');
    await expect(
        await modal.getByRole('listbox', { name: 'Search results' }).getByRole('option')
    ).toHaveCount(30);
});

test('should navigate through search results with arrow keys', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('searchbox').fill('strlen');
    await expectOption(modal, /^strlen$/);

    await page.keyboard.press('ArrowDown');
    await expectSelectedOption(modal, /^strlen$/);

    await page.keyboard.press('ArrowDown');
    await page.keyboard.press('ArrowDown');
    await page.keyboard.press('ArrowDown');
    await expectSelectedOption(modal, /^mb_strlen$/);

    await page.keyboard.press('ArrowUp');
    await expectSelectedOption(modal, /^iconv_strlen$/);
});

test('should navigate to selected result page when Enter is pressed', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('searchbox').fill('strpos');
    await expectOption(modal, /^strpos$/);

    await page.keyboard.press('ArrowDown');
    await page.keyboard.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/manual/en/function.strpos.php`);
});

test('should navigate to search page when Enter is pressed with no selection', async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole('searchbox').fill('php basics');
    await page.keyboard.press('Enter');
    await expect(page).toHaveURL(`http://${httpHost}/search.php?lang=en&q=php%20basics`);
});
