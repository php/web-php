import {expect, test} from '@playwright/test';

export type TestPageOptions = {
    path: string
    options?: object
    evaluate?: () => any
    mask?: string[]
}

const items: TestPageOptions[] = [
    {
        path: 'index.php',
        evaluate: () => {
            const selector = document.querySelector('.elephpants');
            selector.remove()
        },
        options: {
            fullPage: true,
            timeout: 10000,
        },
        mask: ['.hero__versions'],
    },
    {
        path: 'archive/1998.php',
        evaluate: () => {
            const selector = document.querySelector('.elephpants');
            selector.remove()
        }
    },
    {path: 'releases/8_3_6.php'},
    {path: 'releases/8.0/index.php'},
    {path: 'releases/8.1/index.php'},
    {path: 'releases/8.2/index.php'},
    {path: 'releases/8.3/index.php'},
    {path: 'manual/index.php'},
    {path: 'manual/php5.php'},
    {
        path: 'conferences/index.php',
        options: {
            fullPage: false,
        }
    },
]

for (const item of items) {
    test(`testing with ${item.path}`, async ({page}, testInfo) => {
        testInfo.snapshotSuffix = '';

        const httpHost = process.env.HTTP_HOST

        if (typeof httpHost !== 'string') {
            throw new Error('Environment variable "HTTP_HOST" is not set.')
        }

        await page.goto(`${httpHost}/${item.path}`)

        if (typeof item.evaluate === 'function') {
            await page.evaluate(item.evaluate)
        }

        if (typeof item.mask === 'object') {
            item.options = {
                ...item.options,
                mask: item.mask.map((selector) => page.locator(selector))
            }
        }

        await expect(page).toHaveScreenshot(
            `tests/screenshots/${item.path}.png`,
            item.options ?? {
                fullPage: true,
                timeout: 10000,
            }
        )
    })
}
