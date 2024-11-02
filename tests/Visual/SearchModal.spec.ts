import { test, expect } from "@playwright/test";
import path from "path";

const httpHost = process.env.HTTP_HOST;

if (typeof httpHost !== "string") {
    throw new Error('Environment variable "HTTP_HOST" is not set.');
}

test.beforeEach(async ({ page }) => {
    await page.goto(httpHost);
});

const openSearchModal = async (page) => {
    await page.getByRole("button", { name: "Search" }).click();
    const modal = await page.getByRole("dialog", { name: "Search modal" });

    // Wait for the modal animation to finish
    await expect(page.locator("#search-modal__backdrop.show")).not.toHaveClass(
        "showing",
    );

    expect(modal).toBeVisible();
    return modal;
};

test("should match search modal visual snapshot", async ({ page }) => {
    const modal = await openSearchModal(page);
    await modal.getByRole("searchbox").fill("array");
    await expect(page).toHaveScreenshot(`tests/screenshots/search-modal.png`, {
        // Cannot use mask as it ignores z-index
        // See https://github.com/microsoft/playwright/issues/19002
        stylePath: path.join(__dirname, "SearchModal.css"),
    });
});
