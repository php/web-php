/*
 * JavaScript for the site header (include/site-header.inc): 
 * theme switcher, search, mobile menu and language switcher. 
 * Load it in <head> so the theme is applied before the page renders.
 */
(() => {
    const root = document.documentElement;
    // Shares its storage key and toggle behavior with the theme switcher in common.js.
    const darkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    let theme = 'system';

    try { theme = localStorage.getItem('theme') || 'system'; } catch {}

    function applyTheme() {
        root.classList.toggle('dark', theme === 'dark' || (theme === 'system' && darkScheme.matches));
    }

    // Applied right away, before the page renders, so there's no flash of the wrong theme.
    applyTheme();
    darkScheme.addEventListener('change', applyTheme);

    window.addEventListener('load', () => {
        // wait one tick so the browser finishes restoring scroll position first
        setTimeout(() => root.classList.add('smooth-scroll'), 0);
    });

    document.addEventListener('DOMContentLoaded', () => {
        initThemeButton();
        initSearch();
        initMobileMenu();
        initLanguageSwitcher();
    });

    function initThemeButton() {
        const themeButton = document.querySelector('[data-theme-toggle]');

        if (!themeButton) {
            return;
        }

        const systemTheme = () => darkScheme.matches ? 'dark' : 'light';
        const displayedTheme = () => theme === 'system' ? systemTheme() : theme;
        const oppositeTheme = () => displayedTheme() === 'dark' ? 'light' : 'dark';

        function updateThemeControl() {
            themeButton.dataset.theme = theme;
            themeButton.setAttribute('aria-label', `Theme: ${theme}. Switch to ${oppositeTheme()}`);
        }

        themeButton.addEventListener('click', () => {
            // Switch to the opposite of the displayed theme, using "system"
            // when the new theme matches the system theme
            const newTheme = oppositeTheme();
            theme = newTheme === systemTheme() ? 'system' : newTheme;
            try { localStorage.setItem('theme', theme); } catch {}
            applyTheme();
            updateThemeControl();
        });
        darkScheme.addEventListener('change', updateThemeControl);
        updateThemeControl();
    }

    function initSearch() {
        if (typeof initSearchModal !== 'function') {
            return;
        }

        const language = document.documentElement.lang;

        document.querySelector('[data-search-fallback]')?.setAttribute('hidden', '');
        initSearchModal();
        initPHPSearch(language).then((searchCallback) => {
            initSearchUI({ language, searchCallback, limit: 30 });
        });
    }

    function initMobileMenu() {
        const menuButton = document.querySelector('[data-menu-toggle]');
        const mobileMenu = document.getElementById('mobile-menu');

        if (!menuButton || !mobileMenu) {
            return;
        }

        document.querySelector('[data-menu-fallback]')?.setAttribute('hidden', '');
        menuButton.hidden = false;

        function setMenu(open) {
            menuButton.setAttribute('aria-expanded', String(open));
            menuButton.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
            mobileMenu.hidden = !open;
        }

        menuButton.addEventListener('click', () => {
            setMenu(menuButton.getAttribute('aria-expanded') !== 'true');
        });

        mobileMenu.addEventListener('click', (event) => {
            if (event.target.closest('a')) {
                setMenu(false);
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') {
                setMenu(false);
                menuButton.focus();
            }
        });
    }

    // The language switcher navigates as soon as a language is picked.
    function initLanguageSwitcher() {
        document.querySelector('[data-language-switcher]')?.addEventListener('change', (event) => {
            window.location = event.target.value;
        });
    }
})();
