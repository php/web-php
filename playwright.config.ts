import {defineConfig, devices} from '@playwright/test';

/**
 * The tests of the move of the extensions to the extensions manual need the
 * manuals built by tests/extensions-migration.sh, so they only exist when
 * EXTENSIONS_MIGRATION=1 (that script sets it).
 */
const extensionsMigration = process.env.EXTENSIONS_MIGRATION === '1';

/**
 * See https://playwright.dev/docs/test-configuration.
 */
export default defineConfig({
    /* Run tests in files in parallel */
    fullyParallel: true,
    /* Fail the build on CI if you accidentally left test.only in the source code. */
    forbidOnly: !!process.env.CI,
    /* Retry on CI only */
    retries: process.env.CI ? 2 : 0,
    /* Opt out of parallel tests on CI. */
    workers: process.env.CI ? 1 : undefined,
    /* Reporter to use. See https://playwright.dev/docs/test-reporters */
    reporter: 'html',
    expect: {
        toHaveScreenshot: {
            animations: 'disabled',
        },
    },
    /* Shared settings for all the projects below. See https://playwright.dev/docs/api/class-testoptions. */
    use: {
        /* Base URL to use in actions like `await page.goto('/')`. */
        // baseURL: 'http://127.0.0.1:3000',

        /* Collect trace when retrying the failed test. See https://playwright.dev/docs/trace-viewer */
        trace: 'on-first-retry',
    },
    timeout: 120_000,

    projects: [
        {
            name: 'End-to-End Chromium',
            use: {...devices['Desktop Chrome']},
            testDir: './tests/EndToEnd',
            testIgnore: '**/ExtensionsMigration/**',
        },
        ...(extensionsMigration
            ? [
                {
                    name: 'Extensions migration (API)',
                    testDir: './tests/EndToEnd/ExtensionsMigration',
                    testMatch: '*.api.spec.ts',
                    timeout: 120_000,
                    use: {baseURL: process.env.HTTP_HOST ?? 'http://localhost:8080'},
                },
                {
                    name: 'Extensions migration (Chromium)',
                    testDir: './tests/EndToEnd/ExtensionsMigration',
                    testMatch: '*.browser.spec.ts',
                    timeout: 30_000,
                    expect: {timeout: 10_000},
                    use: {
                        ...devices['Desktop Chrome'],
                        baseURL: process.env.HTTP_HOST ?? 'http://localhost:8080',
                        actionTimeout: 10_000,
                    },
                },
            ]
            : []),
    ],
});
