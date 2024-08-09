/**
 * A jQuery plugin to add typeahead search functionality to the navbar search
 * box.  This requires Hogan for templating and typeahead.js for the actual
 * typeahead functionality.
 */
(function ($) {
    /**
     * A backend, which encapsulates a set of completions, such as a list of
     * functions or classes.
     *
     * @constructor
     * @param {String} label The label to show the user.
     */
    var Backend = function (label) {
        this.label = label;
        this.elements = {};
    };

    /**
     * Adds an item to the backend.
     *
     * @param {String} id          The item ID. It would help if this was unique.
     * @param {String} name        The item name to use as a label.
     * @param {String} description Explanatory text for item.
     */
    Backend.prototype.addItem = function (id, name, description) {
        this.elements[id] = {
            id: id,
            name: name,
            description: description
        };
    };

    /**
     * Returns the backend contents formatted as an array that typeahead.js can
     * digest as a local data source.
     *
     * @return {Array}
     */
    Backend.prototype.toTypeaheadArray = function () {
        var array = [];

        $.each(this.elements, function (_, element) {
            element.methodName = element.name.split('::');
            if (element.methodName.length > 1) {
                element.methodName = element.methodName.slice(-1)[0];
            } else {
                delete element.methodName;
            }
            array.push(element);
        });

        /**
         * Old pre-sorting has no effect on results sorted by score.
         */
        return array;
    };

    /**
     * The actual search plugin. Should be applied to the input that needs
     * typeahead functionality.
     *
     * @param {Object} options The options object. This should include
     *                         "language": the language to try to load,
     *                         "limit": the maximum number of results
     */
    $.fn.search = function (options) {
        var element = this;

        options.language = options.language || "en";
        options.limit = options.limit || 30;

        /**
         * Utility function to check if the user's browser supports local
         * storage and native JSON, in which case we'll use it to cache the
         * search JSON.
         *
         * @return {Boolean}
         */
        var canCache = function () {
            try {
                return ('localStorage' in window && window['localStorage'] !== null && "JSON" in window && window["JSON"] !== null);
            } catch (e) {
                return false;
            }
        };

        /**
         * Processes a data structure in the format of our search-index.php
         * files and returns an object containing multiple Backend objects.
         *
         * @param {Object} index
         * @return {Object}
         */
        var processIndex = function (index) {
            // The search types we want to support.
            var backends = {
                "function": new Backend("Functions"),
                "variable": new Backend("Variables"),
                "class": new Backend("Classes"),
                "exception": new Backend("Exceptions"),
                "extension": new Backend("Extensions"),
                "general": new Backend("Other Matches")
            };

            $.each(index, function (id, item) {
                /* If the item has a name, then we should figure out what type
                 * of data this is, and hence which backend this should go
                 * into. */
                if (item[0]) {
                    var type = null;

                    switch(item[2]) {
                        case "phpdoc:varentry":
                            type = "variable";
                            break;

                        case "refentry":
                            type = "function";
                            break;

                        case "phpdoc:exceptionref":
                             type = "exception";
                             break;

                        case "phpdoc:classref":
                             type = "class";
                             break;

                        case "set":
                        case "book":
                        case "reference":
                             type = "extension";
                             break;

                        case "section":
                        case "chapter":
                        case "appendix":
                        case "article":
                        default:
                             type = "general";
                    }

                    if (type) {
                        backends[type].addItem(id, item[0], item[1]);
                    }
                }
            });

            return backends;
        };

        /**
         * Attempt to asynchronously load the search JSON for a given language.
         *
         * @param {String}   language The language to search for.
         * @param {Function} success  Success handler, which will be given an
         *                            object containing multiple Backend
         *                            objects on success.
         * @param {Function} failure  An optional failure handler.
         */
        var loadLanguage = function (language, success, failure) {
            var key = "search-" + language;

            // Check if the cache has a recent enough search index.
            if (canCache()) {
                var cache = window.localStorage.getItem(key);

                if (cache) {
                    var since = new Date();

                    // Parse the stored JSON.
                    cache = JSON.parse(cache);

                    // We'll use anything that's less than two weeks old.
                    since.setDate(since.getDate() - 14);
                    if (cache.time > since.getTime()) {
                        success($.map(cache.data, function (dataset, name) {
                            // Rehydrate the Backend objects.
                            var backend = new Backend(dataset.label);
                            backend.elements = dataset.elements;

                            return backend;
                        }));
                        return;
                    }
                }
            }

            // OK, nothing cached.
            $.ajax({
                dataType: "json",
                error: failure,
                success: function (data) {
                    // Transform the data into something useful.
                    var backends = processIndex(data);
                    // Cache the data if we can.
                    if (canCache()) {
                        /* This may fail in IE 8 due to exceeding the local
                         * storage limit. If so, squash the exception: this
                         * isn't a required part of the system. */
                        try {
                            window.localStorage.setItem(key,
                                JSON.stringify({
                                    data: backends,
                                    time: new Date().getTime()
                                })
                            );
                        } catch (e) {
                            // Derp.
                        }
                    }
                    success(backends);
                },
                url: "/js/search-index.php?lang=" + language
            });
        };

        /**
         * Actually enables the typeahead on the DOM element.
         *
         * @param {Object} backends An array-like object containing backends.
         */
        var enableSearchTypeahead = function (backends) {
            var header = Hogan.compile(
                '<h3 class="result-heading"><span class="collapsible"></span>{{ label }}' +
                '<span class="result-count">{{ count }}</span></h3>' +
                '<div class="tt-suggestions"></div>'
            );
            var template = Hogan.compile(
                '<div>' +
                    '<h4>{{ name }}</h4>' +
                    '<span title="{{ description }}" class="description">{{ description }}</span>' +
                '</div>'
            );

            // Build the typeahead options array.
            var typeaheadOptions = $.map(backends, function (backend, name) {
                var fuzzyhound = new FuzzySearch({
                    source: backend.toTypeaheadArray(),
                    token_sep: ' \t.,-_', // treat colon as part of token, ignore tabs (from pasted content)
                    score_test_fused: true,
                    keys: [
                        'name',
                        'methodName',
                        'description'
                    ],
                    thresh_include: 5.0,
                    thresh_relative_to_best: 0.7,
                    bonus_match_start: 0.7,
                    bonus_token_order: 1.0,
                    bonus_position_decay: 0.3,
                    token_query_min_length: 1,
                    token_field_min_length: 2
                });

                return {
                    source: fuzzyhound,
                    name: name,
                    limit: options.limit,
                    display: 'name',
                    templates: {
                        header: function () {
                            return header.render({
                                label: backend.label,
                                count: fuzzyhound.results.length
                            });
                        },
                        suggestion: function (result) {
                            return template.render({
                                name: result.name,
                                description: result.description
                            });
                        }
                    }
                };
            });

            // Set up the typeahead and the various listeners we need.
            var searchTypeahead = element.typeahead(
                {
                    minLength: 1,
                    classNames: {
                        menu: 'tt-dropdown-menu',
                        cursor: 'tt-is-under-cursor'
                    }
                },
                typeaheadOptions
            );

            // Delegate click events to result-heading collapsible icons, and trigger the accordion action
            $('.tt-dropdown-menu').delegate('.result-heading .collapsible', 'click', function () {
                var el = $(this), suggestions = el.parent().parent().find('.tt-suggestions');
                suggestions.stop();
                if(!el.hasClass('closed')) {
                    suggestions.slideUp();
                    el.addClass('closed');
                } else {
                    suggestions.slideDown();
                    el.removeClass('closed');
                }

            });

            // If the user has selected an autocomplete item and hits enter, we should take them straight to the page.
            searchTypeahead.on("typeahead:select", function (_, item) {
                window.location = "/manual/" + options.language + "/" + item.id + ".php";
            });

            // Get new parent after initialization
            var elementParent = element.parent();

            searchTypeahead.on('typeahead:render', function (evt, renderedSuggestions, fetchedAsync, datasetIndex) {
                // Fix the missing wrapper from typeahead v0.9.3 for UI parity
                var set = elementParent.find('.tt-dataset-' + datasetIndex);
                set.children('.tt-suggestions').first().append(set.children('.tt-suggestion'));
            });

            var lastPattern;
            searchTypeahead.on("keyup", (function () {
                /* typeahead.js doesn't give us a reliable event for the
                 * dropdown entries having been updated, so we'll hook into the
                 * input element's keyup instead. The aim here is to put in
                 * fake entries so that the user has a discoverable way to
                 * perform different searches based on what he or she has
                 * entered. */

                // Precompile the templates we need for the fake entries.
                var searchTemplate = Hogan.compile("<a class='search' href='{{ url }}'>&raquo; Search php.net for {{ pattern }}</a>");

                /* Now we'll return the actual function that should be invoked
                 * when the user has typed something into the search box after
                 * typeahead.js has done its thing. */
                return function () {
                    // Grab what the user entered.
                    var pattern = element.val();
                    if (pattern == lastPattern) {
                        return;
                    }
                    lastPattern = pattern;

                    /* Add a global search option. Note that, as above, the
                     * link is only displayed if more than 2 characters have
                     * been entered: this is due to our search functionality
                     * requiring at least 3 characters in the pattern. */
                    var dropdown = elementParent.children('.tt-dropdown-menu');
                    dropdown.children('.search').remove();
                    if (pattern.length > 2) {
                        dropdown.append(searchTemplate.render({
                            pattern: pattern,
                            url: "/search.php?pattern=" + encodeURIComponent(pattern)
                        }));

                        /* If the dropdown is hidden (because there are no
                         * results), show it anyway. */
                        dropdown.show();
                    }
                };
            })());

            /* typeahead.js adds another input element as part of its DOM
             * manipulation, which breaks the auto-submit functionality we
             * previously relied upon for enter keypresses in the input box to
             * work. Adding a hidden submit button re-enables it. */
            $("<input type='submit' style='visibility: hidden; position: fixed'>").insertAfter(element);

            // Fix for a styling issue on the created input element.
            elementParent.children(".tt-hint").addClass("search-query");
        };

        // Look for the user's language, then fall back to English.
        loadLanguage(options.language, enableSearchTypeahead, function () {
            loadLanguage("en", enableSearchTypeahead);
        });

        return this;
    };
})(jQuery);
