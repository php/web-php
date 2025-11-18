document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.theme || 'system';
    const prefersDark = matchMedia('(prefers-color-scheme: dark)').matches;
    const isDark = savedTheme === 'dark' || (savedTheme === 'system' && prefersDark);

    if (isDark) document.querySelector('.php85').classList.add('dark');

    const themeOrder = ['light', 'dark', 'system'];

    const btn = document.querySelector('button.js-theme-switcher');

    btn?.addEventListener('click', () => {
        const current = localStorage.theme || 'system';
        const nextIndex = (themeOrder.indexOf(current) + 1) % themeOrder.length;
        const newTheme = themeOrder[nextIndex];
        localStorage.theme = newTheme;
        applyTheme(newTheme);
    });

    function applyTheme(theme) {
        const prefersDark = matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = theme === 'dark' || (theme === 'system' && prefersDark);

        document.querySelector('.php85').classList.toggle('dark', isDark);

        const icons = [btn?.querySelector('svg:nth-of-type(1)'), btn?.querySelector('svg:nth-of-type(2)'), btn?.querySelector('svg:nth-of-type(3)')];
        icons.forEach((icon, i) => icon?.classList.toggle('hidden', themeOrder[i] !== theme));
    }

    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.js-copy-code');
        if (!btn?.closest('.code-container')) return;

        const code = btn.closest('.code-container').querySelector('code').textContent;
        if (!navigator.clipboard) return console.error('Clipboard API not available');

        try {
            await navigator.clipboard.writeText(code);
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M5 14L8.5 17.5L19 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            btn.disabled = true;
            await new Promise(r => setTimeout(r, 2000));
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        } catch (err) {
            console.error('Copy failed:', err);
        }
    });

    Prism.highlightAll()

    applyTheme(savedTheme)
});
