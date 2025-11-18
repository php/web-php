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

    Prism.highlightAll()

    applyTheme(savedTheme)
});
