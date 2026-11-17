/*
 * Typed keyboard codes (Konami, "I love PHP" and friends), in plain JavaScript.
 * Each code is a sequence of KeyboardEvent.key values, typed less than a second
 * apart. This is the dependency-free counterpart to the Mousetrap bindings in
 * common.js, and is self-contained so other pages can load it too.
 *
 * The plan is to replace the jQuery code with this in the near future.
 */
(() => {
    const root = document.documentElement;
    const modifierKeys = ['Shift', 'Control', 'Alt', 'Meta', 'CapsLock'];
    let rotation = 0;
    let mirror = 1;

    function swapLogo(src) {
        const logo = document.createElement('img');

        logo.src = src;
        logo.alt = '';
        logo.className = 'site-header__logo';
        document.querySelector('.site-header__logo')?.replaceWith(logo);
    }

    function showToast(text) {
        const toast = document.createElement('div');

        toast.className = 'toast';
        toast.setAttribute('role', 'status');
        toast.textContent = text;
        toast.addEventListener('click', () => toast.remove());
        document.body.append(toast);
        setTimeout(() => toast.remove(), 6000);
    }

    function bork() {
        const subs = [
            [/a([nu])/g, 'u$1'],
            [/A([nu])/g, 'U$1'],
            [/a\B/g, 'e'],
            [/A\B/g, 'E'],
            [/en\b/g, 'ee'],
            [/\Bew/g, 'oo'],
            [/\Be\b/g, 'e-a'],
            [/\be/g, 'i'],
            [/\bE/g, 'I'],
            [/\Bf/g, 'ff'],
            [/\Bir/g, 'ur'],
            [/(\w*?)i(\w*?)$/g, '$1ee$2'],
            [/\bow/g, 'oo'],
            [/\bo/g, 'oo'],
            [/\bO/g, 'Oo'],
            [/the/g, 'zee'],
            [/The/g, 'Zee'],
            [/th\b/g, 't'],
            [/\Btion/g, 'shun'],
            [/\Bu/g, 'oo'],
            [/\BU/g, 'Oo'],
            [/v/g, 'f'],
            [/V/g, 'F'],
            [/([a-z])[.]/g, '$1. Bork Bork Bork!'],
        ];
        const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
            acceptNode: (node) => /[^\t\n\r ]/.test(node.textContent) && !node.parentElement.closest('script, style')
                ? NodeFilter.FILTER_ACCEPT
                : NodeFilter.FILTER_REJECT,
        });

        for (let node = walker.nextNode(); node; node = walker.nextNode()) {
            node.textContent = subs.reduce((text, [pattern, replacement]) => text.replace(pattern, replacement), node.textContent);
        }
    }

    const codes = [
        {
            keys: ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a', 'Enter'],
            run: () => {
                swapLogo('/images/php_konami.gif');
                window.scrollTo(0, 0);
            },
        },
        { keys: [...'bork'], once: true, run: bork },
        {
            keys: [...'rotate', 'Enter'],
            run: () => {
                rotation += 90;
                if (rotation > 360) {
                    rotation = 0;
                }
                root.style.transform = `rotate(${rotation}deg)`;
            },
        },
        {
            keys: [...'mirror', 'Enter'],
            run: () => {
                mirror *= -1;
                root.style.transform = `scaleX(${mirror})`;
            },
        },
        { keys: [...'I hate PHP', 'Enter'], run: () => { window.location = 'https://www.python.org/'; } },
        { keys: [...'I love PHP', 'Enter'], run: () => showToast('Live long and prosper!') },
        { keys: [...'logo', 'Enter'], run: () => swapLogo(`/images/logo.php?refresh&time=${Date.now()}`) },
    ];
    const longest = Math.max(...codes.map((code) => code.keys.length));
    let typed = [];
    let lastKeyTime = 0;

    document.addEventListener('keydown', (event) => {
        const target = event.target;

        if (
            modifierKeys.includes(event.key)
            || event.ctrlKey || event.metaKey || event.altKey
            || target.isContentEditable
            || target.closest?.('input, textarea, select')
        ) {
            return;
        }

        if (event.timeStamp - lastKeyTime > 1000) {
            typed = [];
        }
        lastKeyTime = event.timeStamp;
        typed = [...typed, event.key].slice(-longest);

        const code = codes.find(({ keys }) => keys.every((key, i) => key === typed[typed.length - keys.length + i]));

        if (code) {
            typed = [];
            code.run();
            if (code.once) {
                codes.splice(codes.indexOf(code), 1);
            }
        }
    });
})();
