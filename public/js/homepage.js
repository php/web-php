/*
 * Homepage (public/index.php)
 */
(() => {
    document.addEventListener('DOMContentLoaded', () => {
        initReleaseHistory();
        initExampleTabs();
        initImportFolds();
    });

    function initReleaseHistory() {
        const history = document.querySelector('[data-release-history]');

        if (!history) {
            return;
        }

        const scroll = history.querySelector('[data-history-scroll]');
        const releases = [...history.querySelectorAll('[data-history-release]')];
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let drag = null;
        let didDrag = false;

        function focusRelease(index) {
            const release = releases[Math.max(0, Math.min(index, releases.length - 1))];

            release.focus({ preventScroll: true });
            scroll.scrollTo({
                left: release.parentElement.offsetLeft - scroll.clientWidth / 2,
                behavior: reducedMotion.matches ? 'instant' : 'smooth',
            });
        }

        releases.forEach((release, index) => {
            // The timeline is a single tab stop; the arrow keys move between releases.
            release.addEventListener('focus', () => {
                releases.forEach((other) => { other.tabIndex = other === release ? 0 : -1; });
            });

            release.addEventListener('keydown', (event) => {
                let target;

                switch (event.key) {
                    case 'ArrowLeft':
                        target = index - 1;
                        break;
                    case 'ArrowRight':
                        target = index + 1;
                        break;
                    case 'Home':
                        target = 0;
                        break;
                    case 'End':
                        target = releases.length - 1;
                        break;
                    default:
                        return;
                }

                event.preventDefault();
                focusRelease(target);
            });
        });

        scroll.addEventListener('dragstart', (event) => event.preventDefault());

        scroll.addEventListener('pointerdown', (event) => {
            if (event.pointerType !== 'mouse' || event.button !== 0) {
                return;
            }

            didDrag = false;
            drag = { x: event.clientX, left: scroll.scrollLeft, pointerId: event.pointerId };
        });

        scroll.addEventListener('pointermove', (event) => {
            if (!drag) {
                return;
            }

            const distance = event.clientX - drag.x;

            if (!didDrag && Math.abs(distance) > 5) {
                didDrag = true;
                scroll.setPointerCapture(drag.pointerId);
            }

            if (didDrag) {
                event.preventDefault();
                scroll.scrollLeft = drag.left - distance;
            }
        });

        function endDrag() {
            if (drag && scroll.hasPointerCapture(drag.pointerId)) {
                scroll.releasePointerCapture(drag.pointerId);
            }

            drag = null;
        }

        scroll.addEventListener('pointerup', endDrag);
        scroll.addEventListener('pointercancel', endDrag);
        scroll.addEventListener('lostpointercapture', endDrag);
        scroll.addEventListener('pointerleave', () => {
            if (!didDrag) {
                drag = null;
            }
        });
        scroll.addEventListener('click', (event) => {
            if (didDrag) {
                event.preventDefault();
                event.stopPropagation();
                didDrag = false;
            }
        }, true);

        requestAnimationFrame(() => {
            scroll.scrollLeft = scroll.scrollWidth;
        });
    }

    function initExampleTabs() {
        const showcase = document.querySelector('[data-code-showcase]');

        if (!showcase) {
            return;
        }

        const exampleTabs = [...showcase.querySelectorAll('[role="tab"]')];

        function selectExample(selectedTab) {
            exampleTabs.forEach((tab) => {
                const isSelected = tab === selectedTab;
                const panel = document.getElementById(tab.getAttribute('aria-controls'));

                tab.setAttribute('aria-selected', String(isSelected));
                tab.tabIndex = isSelected ? 0 : -1;
                panel.hidden = !isSelected;
            });
        }

        exampleTabs.forEach((tab, index) => {
            tab.addEventListener('click', () => selectExample(tab));

            tab.addEventListener('keydown', (event) => {
                let nextIndex;

                switch (event.key) {
                    case 'ArrowDown':
                        nextIndex = (index + 1) % exampleTabs.length;
                        break;
                    case 'ArrowUp':
                        nextIndex = (index - 1 + exampleTabs.length) % exampleTabs.length;
                        break;
                    case 'Home':
                        nextIndex = 0;
                        break;
                    case 'End':
                        nextIndex = exampleTabs.length - 1;
                        break;
                    default:
                        return;
                }

                event.preventDefault();
                selectExample(exampleTabs[nextIndex]);
                exampleTabs[nextIndex].focus();
            });
        });
    }

    function initImportFolds() {
        document.querySelectorAll('[data-imports-toggle]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
                const summary = toggle.closest('.code-fold__summary');
                const region = toggle.closest('.code-showcase__code');

                summary.nextElementSibling.hidden = false;
                summary.hidden = true;
                region.dataset.importsExpanded = '';
                // The button is gone now, so keep focus in the code region.
                region.focus();
            });
        });
    }
})();
