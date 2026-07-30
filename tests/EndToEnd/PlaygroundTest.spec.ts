import { test, expect } from '@playwright/test';

const httpHost = process.env.HTTP_HOST

if (typeof httpHost !== 'string') {
    throw new Error('Environment variable "HTTP_HOST" is not set.')
}

test.beforeEach(async ({ page }) => {
    await page.goto(`http://${httpHost}/playground.php`);
});

const waitUntilReady = async (page) => {
    // The engine posts a warmup run on load; Run is enabled once it finishes.
    await expect(page.locator('#run')).toBeEnabled({ timeout: 30_000 });
}

test('shows the bundled PHP version after warmup', async ({ page }) => {
    await waitUntilReady(page);
    await expect(page.locator('#version')).toHaveText(/PHP \d+\.\d+/);
});

test('runs the hello world example', async ({ page }) => {
    await waitUntilReady(page);
    await page.locator('#run').click();
    await expect(page.locator('#output')).toContainText('Hello, world!', { timeout: 30_000 });
    await expect(page.locator('#output')).toContainText(/Running on PHP \d+\.\d+/);
});

test('runs a multi-file example through include', async ({ page }) => {
    await waitUntilReady(page);
    await page.getByLabel('Load an example').selectOption('include');
    await page.locator('#run').click();
    await expect(page.locator('#output')).toContainText('Hello, world!', { timeout: 30_000 });
    await expect(page.locator('#output')).toContainText('Counter is at 2');
});

test('styles diagnostics for an uncaught exception', async ({ page }) => {
    await waitUntilReady(page);
    await page.getByLabel('Load an example').selectOption('exception');
    await page.locator('#run').click();
    const diagnostic = page.locator('#output .diagnostic');
    await expect(diagnostic).toContainText('InvalidArgumentException', { timeout: 30_000 });
    await expect(diagnostic).toContainText('Stack trace:');
    // Paths are relabelled to plain filenames, without the worker's directory.
    await expect(diagnostic).not.toContainText('/playground/');
});

test('renders HTML output in a sandboxed preview frame', async ({ page }) => {
    await waitUntilReady(page);
    await page.getByLabel('Load an example').selectOption('web');
    await page.locator('#run').click();
    await expect(page.locator('#output')).toContainText('Hello from PHP', { timeout: 30_000 });
    await page.getByRole('button', { name: 'Preview' }).click();
    const frame = page.frameLocator('#output iframe');
    await expect(frame.getByRole('heading', { name: 'Hello from PHP' })).toBeVisible();
});
