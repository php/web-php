<?php

use function releases\php85\common_header;
use function releases\php85\message;

if (!isset($lang)) {
    $lang = 'en';
}
if (!isset($documentation)) {
    $documentation = $lang;
}

$_SERVER['BASE_PAGE'] = 'releases/8.5/' . $lang . '.php';

include_once __DIR__ . '/common.php';

common_header(message('common_header', $lang));
?>
    <!-- hero -->
    <section class="js-hero hero">
        <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice" class="hero-bg">
            <defs>
                <radialGradient id="Gradient1" cx="50%" cy="50%" fx="0.441602%" fy="50%" r=".5"><animate attributeName="fx" dur="34s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(210, 203, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
                <radialGradient id="Gradient2" cx="50%" cy="50%" fx="2.68147%" fy="50%" r=".5"><animate attributeName="fx" dur="23.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(133, 109, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
                <radialGradient id="Gradient3" cx="50%" cy="50%" fx="0.836536%" fy="50%" r=".5"><animate attributeName="fx" dur="21.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(210, 203, 255, 1)"></stop><stop offset="100%" stop-color="rgba(51, 63, 124, 0)"></stop></radialGradient>
            </defs>
            <rect x="13.744%" y="1.18473%" width="100%" height="100%" fill="url(#Gradient1)" transform="rotate(334.41 50 50)"><animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="7s" repeatCount="indefinite"></animateTransform></rect>
            <rect x="-2.17916%" y="35.4267%" width="100%" height="100%" fill="url(#Gradient2)" transform="rotate(255.072 50 50)"><animate attributeName="x" dur="23s" values="-25%;0%;-25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="24s" values="0%;50%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="12s" repeatCount="indefinite"></animateTransform></rect>
            <rect x="9.00483%" y="14.5733%" width="100%" height="100%" fill="url(#Gradient3)" transform="rotate(139.903 50 50)"><animate attributeName="x" dur="25s" values="0%;25%;0%" repeatCount="indefinite"></animate><animate attributeName="y" dur="12s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="9s" repeatCount="indefinite"></animateTransform></rect>
        </svg>

        <!-- hero background pattern -->
        <svg aria-hidden="true" class="hero-pattern">
            <defs>
                <pattern id="hero-pattern" width="32" height="64" patternUnits="userSpaceOnUse" x="-1" y="-1">
                    <path d="M0,28 L20,28 L20,16 L16,16 L16,24 L4,24 L4,4 L32,4 L32,32 L28,32 L28,8 L8,8 L8,20 L12,20 L12,12 L24,12 L24,32 L0,32 L0,28 Z M12,36 L32,36 L32,40 L16,40 L16,64 L0,64 L0,60 L12,60 L12,36 Z M28,48 L24,48 L24,60 L32,60 L32,64 L20,64 L20,44 L32,44 L32,56 L28,56 L28,48 Z M0,36 L8,36 L8,56 L0,56 L0,52 L4,52 L4,40 L0,40 L0,36 Z"
                          fill="none" stroke-dasharray="0"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#hero-pattern)"></rect>
        </svg>

        <div class="hero-content">
            <div class="hero-badge">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                </svg>
                <?= message('released', $lang) ?>
            </div>
            <svg class="hero-php-logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 467 133">
                <path fill="currentColor" fill-rule="evenodd"
                      d="M21.8 125.8H.8l18.7-96.1h40.3c12.1 0 21 3.2 26.5 9.5 5.6 6.4 7.2 15.2 5 26.7-.9 4.7-2.5 9-4.6 12.9-2.2 3.9-5 7.5-8.5 10.7-4.2 3.9-8.8 6.7-13.9 8.4-5.1 1.7-11.6 2.5-19.6 2.5h-18l-4.9 25.4Zm45.9-76.6c-2.7-2.9-8-4.4-15.9-4.4H37.5l-7.8 40.3h12.7c8.4 0 14.7-1.6 18.9-4.8 4.1-3.2 6.9-8.5 8.4-15.9 1.3-7.2.6-12.2-2-15.2Z"
                      clip-rule="evenodd"/>
                <path fill="currentColor"
                      d="M106.6 4.1h20.8l-5 25.6h18.5c11.7 0 19.7 2 24.1 6.1 4.4 4.1 5.8 10.7 4 19.8l-8.7 44.8h-21.1l8.3-42.6c.9-4.8.6-8.1-1-9.9-1.6-1.8-5.1-2.6-10.4-2.6h-16.6l-10.7 55.1H87.9l18.7-96.3Z"/>
                <path fill="currentColor" fill-rule="evenodd"
                      d="M185.2 125.8h-21l18.7-96.1h40.4c12.1 0 21 3.2 26.5 9.5 5.6 6.4 7.2 15.2 5 26.7-.9 4.7-2.5 9-4.6 12.9-2.2 3.9-5 7.5-8.5 10.7-4.2 3.9-8.8 6.7-13.9 8.4-5.1 1.7-11.6 2.5-19.6 2.5h-18l-5 25.4Zm46-76.6c-2.7-2.9-8-4.4-15.9-4.4h-14.4l-7.8 40.3h12.7c8.4 0 14.7-1.6 18.9-4.8 4.1-3.2 6.9-8.5 8.4-15.9 1.3-7.2.7-12.2-1.9-15.2Z"
                      clip-rule="evenodd"/>
                <path fill="currentColor"
                      d="M317.5 48.5c-5.7-13.6-10.5-25.4-5.8-33.6 1.8-2.5 3.8-3.8 6-3.8 4.5 0 8.6 4.9 8.6 4.9l5.7 6.9-3.6-8.2c-.2-.3-6.3-14.2-17.2-14.2-3.8 0-7.8 1.7-11.7 5.1l-.1.1c-9.5 11-.2 31.8 8.1 50.1l6.1 14.2c2.8 7.3 5.6 16 3.9 22.4-2.6 10-11.5 16.8-11.6 16.9l-5.7 4.4 6.9-2.2c.7-.2 16-5.2 19.7-18.5 2.3-10.9-.6-21.8-3.5-30.2.4-.3-.4.3 0 0L318 49.1"/>
                <path fill="#6b58ff"
                      d="m334.4 9.9-7.1-7.8 5.1 9.3c.1.1 6.3 11.7-1.6 25.2-2.9 4.2-7.4 8.4-13.1 12.6l-10.3 6.7c-.1-.1-.1-.2 0 0l-.4.3c-11.5 6.6-22.2 10.6-22.4 10.7-15.9 7.1-25.9 18.1-27.3 30.3-1.1 9.2 3.2 18.2 11.6 24.5l.1.1c5.3 3.2 11 4.8 17 4.8 15.7 0 28-10.9 28.5-11.4l7.7-6.9-9.1 4.8c-.1 0-7.7 4-15.6 4-7.1 0-12.1-3.1-15.1-9.4-3.8-13.4 9.5-22.6 24.8-33.2 2-1.4 4.1-2.9 6.2-4.3l.1-.1 9.1-6.8c.1-.2.4-.4.4-.4 7.5-6.2 17.4-15.9 19.7-29.5 1.8-12.3-7.9-23-8.3-23.5Z"/>
                <path fill="currentColor" d="M345.4 83h19.5l-3.5 17.7h-19.5l3.5-17.7Z"/>
                <path fill="currentColor"
                      d="M375.68 86.24h41.76c1.84.08 3.6-.04 5.28-.36 1.68-.4 3.24-.96 4.68-1.68 1.36-.72 2.56-1.8 3.6-3.24a16 16 0 0 0 2.4-5.4c.64-2.16.8-3.96.48-5.4a4.85 4.85 0 0 0-1.8-3.24 10.46 10.46 0 0 0-3.84-1.56c-1.44-.4-3.12-.6-5.04-.6l-41.64-.12 13.32-49.8h71.64l-3.96 14.76H410l-5.4 20.28h30.84c4 .08 7.44.68 10.32 1.8a16.46 16.46 0 0 1 6.96 4.92 14.73 14.73 0 0 1 3.12 8.04c.32 3.12-.08 6.76-1.2 10.92a37.48 37.48 0 0 1-5.52 12.24 25.56 25.56 0 0 1-8.4 7.68 45.2 45.2 0 0 1-10.8 4.2 54.68 54.68 0 0 1-12.24 1.32h-45.84l3.84-14.76Z"/>
            </svg>

            <h1><?= message('main_title', $lang) ?></h1>
            <?= message('main_subtitle', $lang) ?>

            <div class="hero-actions">
                <a href="#features" class="button-primary"><?= message('whats_new', $lang) ?></a>
                <a href="/downloads" class="button-secondary"><?= message('upgrade_now', $lang) ?></a>
            </div>
        </div>
    </section>

    <!-- new features -->
    <section class="features">
        <svg aria-hidden="true" width="100%" height="100%" class="features-pattern">
            <defs>
                <pattern id="features-pattern" width="13" height="13" patternUnits="userSpaceOnUse">
                    <rect x="5.5" y="5.5" width="1" height="1" fill="currentColor"></rect>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#features-pattern)"></rect>
        </svg>

        <div class="features-title">
            <h2 id="features"><?= message('key_features', $lang) ?></h2>
            <?= message('key_features_description', $lang) ?>
        </div>

        <div class="features-grid-container">
            <div class="features-grid">
                <div class="features-col features-first-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                            </svg>

                            <a href="#new-uri-extension"><span></span><?= message('features_uri_extension_title', $lang) ?>
                            </a>
                            <?= message('features_uri_extension_description', $lang) ?>
                        </div>
                    </div>
                </div>

                <div class="features-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"/>
                            </svg>

                            <a href="#pipe-operator"><span></span><?= message('features_pipe_operator_title', $lang) ?>
                            </a>
                            <?= message('features_pipe_operator_description', $lang) ?>
                        </div>
                    </div>
                </div>

                <div class="features-col features-third-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"/>
                            </svg>

                            <a href="#clone-with"><span></span><?= message('features_clone_with_title', $lang) ?></a>
                            <?= message('features_clone_with_description', $lang) ?>
                        </div>
                    </div>
                </div>

                <div class="features-col features-fourth-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                            </svg>

                            <a href="#no-discard-attribute"><span></span><?= message('features_no_discard_title', $lang) ?>
                            </a>
                            <?= message('features_no_discard_description', $lang) ?>
                        </div>
                    </div>
                </div>

                <div class="features-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5"/>
                            </svg>

                            <a href="#closures-in-const-expr"><span></span><?= message('features_fcc_in_const_expr_title', $lang) ?>
                            </a>
                            <?= message('features_fcc_in_const_expr_description', $lang) ?>
                        </div>
                    </div>
                </div>

                <div class="features-col features-sixth-col">
                    <div class="features-col-container">
                        <div class="features-col-spacing">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                            </svg>

                            <a href="#persistent-curl-share-handles"><span></span><?= message('features_persistent_curl_share_handles_title', $lang) ?>
                            </a>
                            <?= message('features_persistent_curl_share_handles_description', $lang) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- new-uri-extension -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="new-uri-extension"><?= message('uri_extension_title', $lang) ?></h2>
            <?= message('uri_extension_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$components = parse_url('https://php.net/releases/8.4/en.php');

var_dump($components['host']);
// string(7) "php.net"
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/url_parsing_api">RFC <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
use Uri\Rfc3986\Uri;

$uri = new Uri('https://php.net/releases/8.5/en.php');

var_dump($uri->getHost());
// string(7) "php.net"
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- pipe-operator -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="pipe-operator"><?= message('pipe_operator_title', $lang) ?></h2>
            <?= message('pipe_operator_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$title = ' PHP 8.5 Released ';

$slug = strtolower(
    str_replace('.', '',
        str_replace(' ', '-',
            trim($title)
        )
    )
);

var_dump($slug);
// string(15) "php-85-released"
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/pipe-operator-v3">RFC <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$title = ' PHP 8.5 Released ';

$slug = $title
    |> trim(...)
    |> (fn($str) => str_replace(' ', '-', $str))
    |> (fn($str) => str_replace('.', '', $str))
    |> strtolower(...);

var_dump($slug);
// string(15) "php-85-released"
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- clone-with -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="clone-with"><?= message('clone_with_title', $lang) ?></h2>
            <?= message('clone_with_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        $values = get_object_vars($this);
        $values['alpha'] = $alpha;

        return new self(...$values);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/clone_with_v2">RFC <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        return clone($this, [
            'alpha' => $alpha,
        ]);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- no-discard-attribute -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="no-discard-attribute"><?= message('no_discard_title', $lang) ?></h2>
            <?= message('no_discard_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
function getPhpVersion(): string
{
    return 'PHP 8.4';
}

getPhpVersion(); // No warning
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/marking_return_value_as_important">RFC
                                <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
#[\NoDiscard]
function getPhpVersion(): string
{
    return 'PHP 8.5';
}

getPhpVersion();
// Warning: The return value of function getPhpVersion() should
// either be used or intentionally ignored by casting it as (void)
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- fcc-in-const-expr -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="closures-in-const-expr"><?= message('fcc_in_const_expr_title', $lang) ?></h2>
            <?= message('fcc_in_const_expr_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
final class PostsController
{
    #[AccessControl(
        new Expression('request.user === post.getAuthor()'),
    )]
    public function update(
        Request $request,
        Post $post,
    ): Response {
        // ...
    }
}
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/closures_in_const_expr">RFC <span>↗</span></a>
                            <a target="_blank" href="https://wiki.php.net/rfc/fcc_in_const_expr">RFC <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
final class PostsController
{
    #[AccessControl(static function (
        Request $request,
        Post $post,
    ): bool {
        return $request->user === $post->getAuthor();
    })]
    public function update(
        Request $request,
        Post $post,
    ): Response {
        // ...
    }
}
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- persistent-curl-share-handles -->
    <section class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2 id="persistent-curl-share-handles"><?= message('persistent_curl_share_handles_title', $lang) ?></h2>
            <?= message('persistent_curl_share_handles_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

curl_exec($ch);
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/curl_share_persistence">RFC <span>↗</span></a>
                            <a target="_blank" href="https://wiki.php.net/rfc/curl_share_persistence_improvement">RFC
                                <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT,
]);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

// This may now reuse the connection from an earlier SAPI request
curl_exec($ch);
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- array-first-and-last-functions -->
    <section class="before-and-after-container last">
        <div class="before-and-after-title-and-description">
            <h2 id="array-first-and-last-functions"><?= message('array_first_last_title', $lang) ?></h2>
            <?= message('array_first_last_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$lastEvent = $events === []
    ? null
    : $events[array_key_last($events)];
PHP
                    ); ?>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/array_first_last">RFC <span>↗</span></a>
                        </div>
                        <button class="js-copy-code" aria-label="Copy Code">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path d="M9 15C9 12.1716 9 10.7574 9.87868 9.87868C10.7574 9 12.1716 9 15 9L16 9C18.8284 9 20.2426 9 21.1213 9.87868C22 10.7574 22 12.1716 22 15V16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H15C12.1716 22 10.7574 22 9.87868 21.1213C9 20.2426 9 18.8284 9 16L9 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9999 9C16.9975 6.04291 16.9528 4.51121 16.092 3.46243C15.9258 3.25989 15.7401 3.07418 15.5376 2.90796C14.4312 2 12.7875 2 9.5 2C6.21252 2 4.56878 2 3.46243 2.90796C3.25989 3.07417 3.07418 3.25989 2.90796 3.46243C2 4.56878 2 6.21252 2 9.5C2 12.7875 2 14.4312 2.90796 15.5376C3.07417 15.7401 3.25989 15.9258 3.46243 16.092C4.51121 16.9528 6.04291 16.9975 9 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <?php highlight_php_trimmed(
                            <<<'PHP'
$lastEvent = array_last($events);
PHP
                    ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- release-notes -->
    <section class="release-notes">
        <div class="release-notes-grid-container">
            <div class="release-notes-grid">
                <div>
                    <h2><?= message('new_classes_title', $lang) ?></h2>
                    <ul class="new">
                        <li><?= message('fatal_error_backtrace', $lang) ?></li>
                        <li><?= message('const_attribute_target', $lang) ?></li>
                        <li><?= message('override_attr_properties', $lang, ['<a href="/manual/' . $documentation . '/class.override.php"><code>#[\Override]</code></a>']) ?></li>
                        <li><?= message('deprecated_traits_constants', $lang, ['<a href="/manual/' . $documentation . '/class.deprecated.php"><code>#[\Deprecated]</code></a>']) ?></li>
                        <li><?= message('asymmetric_static_properties', $lang) ?></li>
                        <li><?= message('final_promoted_properties', $lang) ?></li>
                        <li><?= message('closure_getCurrent', $lang) ?></li>
                        <li><?= message('partitioned_cookies', $lang, [
                                '<a href="/manual/' . $documentation . '/function.setcookie.php"><code>setcookie()</code></a>',
                                '<a href="/manual/' . $documentation . '/function.setrawcookie.php"><code>setrawcookie()</code></a>',
                            ]) ?></li>
                        <li><?= message('get_set_error_handler', $lang, [
                                    '<a href="/manual/' . $documentation . '/function.get-error-handler.php"><code>get_error_handler()</code></a>',
                                    '<a href="/manual/' . $documentation . '/function.get-exception-handler.php"><code>get_exception_handler()</code></a>',
                            ]) ?></li>
                        <li><?= message('new_dom_element_methods', $lang, [
                                    '<code>Dom\Element::getElementsByClassName()</code>',
                                    '<code>Dom\Element::insertAdjacentHTML()</code>',
                            ]) ?></li>
                        <li><?= message('grapheme_levenshtein', $lang, ['<code>grapheme_levenshtein()</code>']) ?></li>
                        <li><?= message('delayed_target_validation', $lang, ['<code>#[\DelayedTargetValidation]</code>']) ?></li>
                    </ul>
                </div>
                <div>
                    <h2><?= message('bc_title', $lang) ?></h2>
                    <ul class="old">
                        <li><?= message('bc_backtick_operator', $lang, [
                                '<a href="/manual/' . $documentation . '/function.shell-exec.php"><code>shell_exec()</code></a>'
                            ]) ?></li>
                        <li><?= message('bc_non_canonical_cast_names', $lang) ?></li>
                        <li><?= message('bc_disable_classes', $lang, ['<code>disable_classes</code>']) ?></li>
                        <li><?= message('bc_semicolon_after_case', $lang) ?></li>
                        <li><?= message('bc_null_array_offset', $lang, [
                                '<a href="/manual/' . $documentation . '/function.array-key-exists.php"><code>array_key_exists()</code></a>'
                            ]) ?></li>
                        <li><?= message('bc_class_alias_names', $lang, [
                                '<a href="/manual/' . $documentation . '/function.class-alias.php"><code>class_alias()</code></a>'
                            ]) ?></li>
                        <li><?= message('bc_sleep_wakeup', $lang, [
                                '<a href="/manual/' . $documentation . '/language.oop5.magic.php#object.sleep"><code>__sleep()</code></a>',
                                '<a href="/manual/' . $documentation . '/language.oop5.magic.php#object.wakeup"><code>__wakeup()</code></a>',
                                '<a href="/manual/' . $documentation . '/language.oop5.magic.php#object.serialize"><code>__serialize()</code></a>',
                                '<a href="/manual/' . $documentation . '/language.oop5.magic.php#object.unserialize"><code>__unserialize()</code></a>',
                            ]) ?></li>
                        <li><?= message('bc_casting_nan', $lang, ['<code>NAN</code>']) ?></li>
                        <li><?= message('bc_non_array_destructuring', $lang, ['<code>[]</code>', '<code>list()</code>']) ?></li>
                        <li><?= message('bc_casting_non_int_floats', $lang) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- pre footer -->
    <section class="cta-footer">
        <svg aria-hidden="true">
            <defs>
                <pattern id="cta-pattern" width="12" height="12" patternUnits="userSpaceOnUse" x="-1" y="-1">
                    <path d="M.5 12V.5H12" fill="none" stroke-dasharray="0"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#cta-pattern)"></rect>
        </svg>

        <div class="cta-footer-content">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                <path fill="currentColor"
                      d="M0 12.2v-.7a.5.5 0 0 1 1 0v.8c0 .2.1.3.3.5l.7.2.8-.2.2-.6V5c0-2 1.7-4 4.1-4 2.4 0 4 1.4 4.4 3 1 .1 2 .4 3 1.1l1 1.4c.3.5.5 1 .5 1.5v5.5c0 .3-.2.5-.5.5h-8a.5.5 0 0 1-.5-.5v-4c0-.2.1-.4.3-.5a6 6 0 0 0 2.4-1.5c.5-.7.9-1.6.8-3 0-1-1.2-2.5-3.3-2.5A3.1 3.1 0 0 0 4 5v7.2c0 .6-.2 1-.6 1.3-.3.4-.8.5-1.4.5-.5 0-1-.2-1.3-.4-.4-.3-.6-.7-.7-1.2v-.2ZM11.5 5a5 5 0 0 1-1 3.1C9.8 9 8.9 9.4 8 9.8V13h3v-2.5a.5.5 0 0 1 1 0V13h3V8c0-.2 0-.6-.3-1-.2-.4-.5-.8-.9-1.1a5 5 0 0 0-2.3-.9ZM7 5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
            </svg>

            <h2><?= message('footer_title', $lang) ?></h2>

            <div class="cta-footer-button-container">
                <a href="/downloads" class="button-primary"><?= message('upgrade_now', $lang) ?></a>
            </div>

            <?= message('footer_description', $lang) ?>
        </div>
    </section>

    <!-- noise -->
    <svg class="noise" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" preserveAspectRatio="none">
        <defs>
            <filter id="noise-filter">
                <feTurbulence type="turbulence" baseFrequency="1" numOctaves="1" stitchTiles="stitch" result="noise"></feTurbulence>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0" result="coloredNoise"></feColorMatrix>
            </filter>
        </defs>
        <rect width="100%" height="100%" filter="url(#noise-filter)"></rect>
    </svg>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
        })
    </script>
<?php

site_footer([
    'footer_note' => '<p>Created as part of <a href="https://thephp.foundation/blog/2025/11/05/design-contest-results/" target="_blank">The PHP Foundation Design Contest</a>.</p>'
]);
