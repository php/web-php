/**
 * Initialize the PHP search functionality with a given language.
 * Loads the search index, sets up FuzzySearch, and returns a search function.
 *
 * @param {string} language The language for which the search index should be
 * loaded.
 * @returns {Promise<(query: string) => Array>} A function that takes a query
 * and performs a search using the loaded index.
 */
const initPHPSearch = async (language) => {
    const MILLISECONDS_PER_DAY = 24 * 60 * 60 * 1000;
    const CACHE_DAYS = 14;

    /**
     * Looks up the search index cached in localStorage.
     *
     * @returns {Array|null}
     */
    const lookupIndexCache = () => {
        const key = `search2-${language}`;
        const cache = window.localStorage.getItem(key);

        if ((!cache) || (language === 'local')) {
            return null;
        }

        const { data, time: cachedDate } = JSON.parse(cache);

        const expireDate = cachedDate + CACHE_DAYS * MILLISECONDS_PER_DAY;

        // Reject old format indexes
        if (
          (typeof data[0] !== 'object')
          || Array.isArray(data[0])
        ) {
          return null;
        }
        if (Date.now() > expireDate) {
            return null;
        }

        return data;
    };

    /**
     * Fetch the search index.
     *
     * @returns {Promise<Array>} The search index.
     */
    const fetchIndex = async () => {
        const key = `search2-${language}`;
        let items;
        if (language === 'local') {
            items = localSearchIndexes;
        } else {
            const response = await fetch(`/js/search-index.php?lang=${language}`);
            items = await response.json();

            try {
                // Note: These indexes are also used by globalsearch in common.js
                localStorage.setItem(
                    key,
                    JSON.stringify({
                        data: items,
                        time: Date.now(),
                    }),
                );
            } catch (e) {
                // Local storage might be full, or other error.
                // Just continue without caching.
                console.error("Failed to cache search index", e);
            }
        }

        return items;
    };

    /**
     * Loads the search index, using cache if available.
     *
     * @returns {Promise<Array>}
     */
    const loadIndex = async () => {
        const cached = lookupIndexCache();
        return cached || fetchIndex();
    };

    /**
     * Load the language index, falling back to English on error.
     *
     * @returns {Promise<Array>}
     */
    const loadIndexWithFallback = async () => {
        try {
            return await loadIndex();
        } catch (error) {
            if ((language !== "en") && (language !== "local")) {
                language = "en";
                return loadIndexWithFallback();
            }
            throw error;
        }
    };

    /**
     * Perform a search using the given query and a FuzzySearch instance.
     *
     * @param {string} query The search query.
     * @param {object} fuzzyhound The FuzzySearch instance to use for searching.
     * @returns {Array} An array of search results.
     */
    const search = (query, fuzzyhound) => {
        return fuzzyhound
            .search(query)
            .map((result) => {
                // Boost Language Reference matches.
                if (result.item.id.startsWith("language")) {
                    result.score += 10;
                }
                return result;
            })
            .sort((a, b) => b.score - a.score);
    };

    const searchIndex = await loadIndexWithFallback();
    if (!searchIndex) {
        throw new Error("Failed to load search index");
    }

    fuzzyhound = new FuzzySearch({
        source: searchIndex,
        token_sep: " \t.,-_",
        score_test_fused: true,
        keys: ["name", "methodName", "description"],
        thresh_include: 5.0,
        thresh_relative_to_best: 0.7,
        bonus_match_start: 0.7,
        bonus_token_order: 1.0,
        bonus_position_decay: 0.3,
        token_query_min_length: 1,
        token_field_min_length: 2,
        output_map: "root",
    });

    return (query) => search(query, fuzzyhound);
};

/**
 * Initialize the search modal, handling focus trap and modal transitions.
 */
const initSearchModal = () => {
    const backdropElement = document.getElementById("search-modal__backdrop");
    const modalElement = document.getElementById("search-modal");
    const resultsElement = document.getElementById("search-modal__results");
    const inputElement = document.getElementById("search-modal__input");

    const focusTrapHandler = (event) => {
        if (event.key !== "Tab") {
            return;
        }

        const selectable = modalElement.querySelectorAll("input, button, a");
        const lastElement = selectable[selectable.length - 1];

        if (event.shiftKey) {
            if (document.activeElement === inputElement) {
                event.preventDefault();
                lastElement.focus();
            }
        } else if (document.activeElement === lastElement) {
            event.preventDefault();
            inputElement.focus();
        }
    };

    const onModalTransitionEnd = (handler) => {
        backdropElement.addEventListener("transitionend", handler, {
            once: true,
        });
    };

    const documentWidth = document.documentElement.clientWidth;
    const scrollbarWidth = Math.abs(window.innerWidth - documentWidth);

    const show = function () {
        if (
            backdropElement.classList.contains("show") ||
            backdropElement.classList.contains("showing")
        ) {
            return;
        }

        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";
        resultsElement.innerHTML = "";
        document.body.style.paddingRight = `${scrollbarWidth}px`;

        backdropElement.setAttribute("aria-modal", "true");
        backdropElement.setAttribute("role", "dialog");
        backdropElement.classList.add("showing");
        inputElement.focus();
        inputElement.value = "";
        document.addEventListener("keydown", focusTrapHandler);

        onModalTransitionEnd(() => {
            backdropElement.classList.remove("showing");
            backdropElement.classList.add("show");
        });
    };

    const hide = function () {
        if (!backdropElement.classList.contains("show")) {
            return;
        }

        backdropElement.classList.add("hiding");
        backdropElement.classList.remove("show");
        backdropElement.removeAttribute("aria-modal");
        backdropElement.removeAttribute("role");
        onModalTransitionEnd(() => {
            document.body.style.overflow = "auto";
            document.documentElement.style.overflow = "auto";
            document.body.style.paddingRight = "0px";
            backdropElement.classList.remove("hiding");
            document.removeEventListener("keydown", focusTrapHandler);
        });
    };

    const searchLink = document.getElementById("navbar__search-link");
    const searchButtonMobile = document.getElementById(
        "navbar__search-button-mobile",
    );
    const searchButton = document.getElementById("navbar__search-button");
    let buttons = [searchButton];

    // Enhance mobile search
    if (searchLink !== null) {
        searchLink.setAttribute("hidden", "true");
        searchButtonMobile.removeAttribute("hidden");
        buttons.push(searchButtonMobile);
    }

    // Enhance desktop search
    const searchForm = document
        .querySelector(".navbar__search-form");
    if (searchForm !== null) {
        searchForm.setAttribute("hidden", "true");
    }
    searchButton.removeAttribute("hidden");

    // Open when the search button is clicked
    buttons.forEach((button) =>
        button.addEventListener("click", show),
    );

    // Open when / is pressed
    document.addEventListener("keydown", (event) => {
        const target = event.target;

        if (
            target.contentEditable === "true" ||
            target.tagName === "INPUT" ||
            target.tagName === "TEXTAREA"
        ) {
            return;
        }

        if (event.key === "/") {
            show();
            event.preventDefault();
        }
    });

    // Close when the close button is clicked
    document
        .querySelector(".search-modal__close")
        .addEventListener("click", hide);

    // Close when the escape key is pressed
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            hide();
        }
    });

    // Close when the user clicks outside of it
    backdropElement.addEventListener("click", (event) => {
        if (event.target === backdropElement) {
            hide();
        }
    });
};

/**
 * Initialize the search modal UI, setting up search result rendering and
 * input handling.
 *
 * @param {object} options An object containing the search callback, language,
 * and result limit.
 */
const initSearchUI = ({ searchCallback, language, limit = 30 }) => {
    const DEBOUNCE_DELAY = 200;
    // https://pictogrammers.com/library/mdi/icon/code-braces/
    const BRACES_ICON =
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8,3A2,2 0 0,0 6,5V9A2,2 0 0,1 4,11H3V13H4A2,2 0 0,1 6,15V19A2,2 0 0,0 8,21H10V19H8V14A2,2 0 0,0 6,12A2,2 0 0,0 8,10V5H10V3M16,3A2,2 0 0,1 18,5V9A2,2 0 0,0 20,11H21V13H20A2,2 0 0,0 18,15V19A2,2 0 0,1 16,21H14V19H16V14A2,2 0 0,1 18,12A2,2 0 0,1 16,10V5H14V3H16Z" /></svg>';
    // https://pictogrammers.com/library/mdi/icon/file-document-outline/
    const DOCUMENT_ICON =
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6,2A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6M6,4H13V9H18V20H6V4M8,12V14H16V12H8M8,16V18H13V16H8Z" /></svg>';

    const resultsElement = document.getElementById("search-modal__results");
    const inputElement = document.getElementById("search-modal__input");
    let selectedIndex = -1;

    /**
     * Update the selected result in the results container.
     */
    const updateSelectedResult = () => {
        const results = resultsElement.querySelectorAll(
            ".search-modal__result",
        );
        results.forEach((result, index) => {
            const isSelected = index === selectedIndex;
            result.setAttribute("aria-selected", isSelected ? "true" : "false");
            if (!isSelected) {
                result.classList.remove("selected");
                return;
            }
            result.classList.add("selected");
            result.scrollIntoView({
                behavior: "smooth",
                block: "nearest",
            });
        });
    };

    /**
     * Render the search results.
     *
     * @param {Array} results The search results.
     */
    const renderResults = (results) => {
        const escape = (html) => {
            const div = document.createElement("div");
            const node = document.createTextNode(html);
            div.appendChild(node);
            return div.innerHTML;
        };

        let resultsHtml = "";
        results.forEach(({ item }, i) => {
            const icon = ["General", "Extension"].includes(item.type)
                ? DOCUMENT_ICON
                : BRACES_ICON;
            let link = `/manual/${encodeURIComponent(language)}/${encodeURIComponent(item.id)}.php`;
            if (language === 'local') {
                link = encodeURIComponent(item.id) + '.html';
            }

            const description =
                item.type !== "General"
                    ? `${item.type} • ${item.description}`
                    : item.description;

            resultsHtml += `
                <a
                    href="${link}"
                    class="search-modal__result"
                    role="option"
                    aria-labelledby="search-modal__result-name-${i}"
                    aria-describedby="search-modal__result-description-${i}"
                    aria-selected="false"
                >
                    <div class="search-modal__result-icon">${icon}</div>
                    <div class="search-modal__result-content">
                        <div
                            id="search-modal__result-name-${i}"
                            class="search-modal__result-name"
                        >
                            ${escape(item.name)}
                        </div>
                        <div
                            id="search-modal__result-description-${i}"
                            class="search-modal__result-description"
                        >
                            ${escape(description)}
                        </div>
                    </div>
                </a>
            `;
        });

        resultsElement.innerHTML = resultsHtml;
    };

    const debounce = (func, delay) => {
        let timeoutId;
        return (...args) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func(...args), delay);
        };
    };

    const handleKeyDown = (event) => {
        const resultsElements = resultsElement.querySelectorAll(
            ".search-modal__result",
        );

        switch (event.key) {
            case "ArrowDown":
                event.preventDefault();
                selectedIndex = Math.min(
                    selectedIndex + 1,
                    resultsElements.length - 1,
                );
                updateSelectedResult();
                break;
            case "ArrowUp":
                event.preventDefault();
                selectedIndex = Math.max(selectedIndex - 1, -1);
                updateSelectedResult();
                break;
            case "Enter":
                if (selectedIndex !== -1) {
                    event.preventDefault();
                    resultsElements[selectedIndex].click();
                } else if (language !== 'local') {
                    window.location.href = `/search.php?lang=${language}&q=${encodeURIComponent(inputElement.value)}`;
                }
                break;
            case "Escape":
                selectedIndex = -1;
                break;
        }
    };

    const handleInput = (event) => {
        const results = searchCallback(event.target.value);
        renderResults(results.slice(0, limit), language, resultsElement);
        selectedIndex = -1;
    };
    const debouncedHandleInput = debounce(handleInput, DEBOUNCE_DELAY);

    inputElement.addEventListener("input", debouncedHandleInput);
    inputElement.addEventListener("keydown", handleKeyDown);
};
