/*
 * Copy-code buttons
 *
 * Markup: a <button data-copy-code aria-label="…"> inside an element marked
 * `data-copy-scope` copies the first <code> in that scope. While "copied", the
 * button has a `data-copied`` attribute; base.css uses it to swap the
 * .copy-button__icon--copy icon for the .copy-button__icon--done one.
 */
(() => {
    const RESET_AFTER = 2500;
    let status;

    // For announcing to screen readers
    document.addEventListener('DOMContentLoaded', statusRegion);

    function statusRegion() {
        if (!status) {
            status = document.createElement('p');
            status.setAttribute('role', 'status');
            status.className = 'sr-only';
            document.body.append(status);
        }

        return status;
    }

    document.addEventListener('click', async (event) => {
        const button = event.target.closest('[data-copy-code]');
        const code = button?.closest('[data-copy-scope]')?.querySelector('code');

        if (!code) {
            return;
        }

        button.dataset.originalLabel ??= button.getAttribute('aria-label') ?? '';
        button.dataset.originalTitle ??= button.title;
        clearTimeout(Number(button.dataset.resetTimer));
        statusRegion().textContent = '';

        try {
            await navigator.clipboard.writeText(code.textContent);
            button.dataset.copied = '';
            setLabel(button, 'Copied!');
            status.textContent = 'Code copied to clipboard.';
        } catch {
            const range = document.createRange();

            range.selectNodeContents(code);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            setLabel(button, 'Code selected; use your keyboard to copy');
            status.textContent = 'Clipboard unavailable. Code selected; use your keyboard to copy.';
        }

        button.dataset.resetTimer = String(setTimeout(() => {
            delete button.dataset.copied;
            button.setAttribute('aria-label', button.dataset.originalLabel);
            button.title = button.dataset.originalTitle;
        }, RESET_AFTER));
    });

    function setLabel(button, label) {
        button.setAttribute('aria-label', label);
        button.title = label;
    }
})();
