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
    <section class="features" id="features">
        <svg aria-hidden="true" width="100%" height="100%" class="features-pattern">
            <defs>
                <pattern id="features-pattern" width="13" height="13" patternUnits="userSpaceOnUse">
                    <rect x="5.5" y="5.5" width="1" height="1" fill="currentColor"></rect>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#features-pattern)"></rect>
        </svg>

        <div class="features-title">
            <h2><?= message('key_features', $lang) ?></h2>
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
    <section id="new-uri-extension" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('uri_extension_title', $lang) ?></h2>
            <?= message('uri_extension_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
$components = parse_url('https://php.net/releases/8.4/en.php');

var_dump($components['host']);
// string(7) "php.net"
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/url_parsing_api">RFC <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
use Uri\Rfc3986\Uri;

$uri = new Uri('https://php.net/releases/8.5/en.php');

var_dump($uri->getHost());
// string(7) "php.net"
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- pipe-operator -->
    <section id="pipe-operator" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('pipe_operator_title', $lang) ?></h2>
            <?= message('pipe_operator_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
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
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/pipe-operator-v3">RFC <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
$title = ' PHP 8.5 Released ';

$slug = $title
    |> trim(...)
    |> (fn($str) => str_replace(' ', '-', $str))
    |> (fn($str) => str_replace('.', '', $str))
    |> strtolower(...);

var_dump($slug);
// string(15) "php-85-released"
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- clone-with -->
    <section id="clone-with" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('clone_with_title', $lang) ?></h2>
            <?= message('clone_with_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
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
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/clone_with_v2">RFC <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
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
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- no-discard-attribute -->
    <section id="no-discard-attribute" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('no_discard_title', $lang) ?></h2>
            <?= message('no_discard_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
function getPhpVersion(): string
{
    return 'PHP 8.4';
}

getPhpVersion(); // No warning
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/marking_return_value_as_important">RFC
                                <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
#[\NoDiscard]
function getPhpVersion(): string
{
    return 'PHP 8.5';
}

getPhpVersion();
// Warning: The return value of function getPhpVersion() should
// either be used or intentionally ignored by casting it as (void)
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- fcc-in-const-expr -->
    <section id="closures-in-const-expr" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('fcc_in_const_expr_title', $lang) ?></h2>
            <?= message('fcc_in_const_expr_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
final class PostsController
{
    #[AccessControl(
        new Expression('request.user === post.getAuthor()'),
    )]
    public function update(
        Request $request,
        Post $post
    ): Response {
        // ...
    }
}
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/closures_in_const_expr">RFC <span>↗</span></a>
                            <a target="_blank" href="https://wiki.php.net/rfc/fcc_in_const_expr">RFC <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
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
        Post $post
    ): Response {
        // ...
    }
}
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- persistent-curl-share-handles -->
    <section id="persistent-curl-share-handles" class="before-and-after-container">
        <div class="before-and-after-title-and-description">
            <h2><?= message('persistent_curl_share_handles_title', $lang) ?></h2>
            <?= message('persistent_curl_share_handles_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

curl_exec($ch);
</code>
                    </pre>
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
                    </div>
                    <pre class="language-php">
<code class="language-php">
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT,
]);

$ch = curl_init('https://php.net/');
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// This may now reuse the connection from an earlier SAPI request
curl_exec($ch);
</code>
                    </pre>
                </div>
            </div>
        </div>
    </section>

    <!-- array-first-and-last-functions -->
    <section id="array-first-and-last-functions" class="before-and-after-container last">
        <div class="before-and-after-title-and-description">
            <h2><?= message('array_first_last_title', $lang) ?></h2>
            <?= message('array_first_last_description', $lang) ?>
        </div>

        <div class="before-and-after-code-container">
            <div class="before-and-after-code">
                <div class="code-container">
                    <div class="header">
                        <div>
                            <span><?= message('old_version', $lang) ?></span>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
$lastEvent = $events === []
    ? null
    : $events[array_key_last($events)];
</code>
                    </pre>
                </div>

                <div class="code-container">
                    <div class="header">
                        <div>
                            <span>PHP 8.5</span>
                            <span class="badge-green"><?= message('badge_new', $lang) ?></span>
                            <a target="_blank" href="https://wiki.php.net/rfc/array_first_last">RFC <span>↗</span></a>
                        </div>
                    </div>
                    <pre class="language-php">
<code class="language-php">
$lastEvent = array_last($events);
</code>
                    </pre>
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

    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div>
                    <a href="/" class="footer-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -1 100 50" fill="currentColor">
                            <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                            <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"></path>
                            <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                        </svg>
                    </a>

                    <p>The PHP Foundation is a collective of people and organizations, united in the mission to ensure
                        the
                        long-term prosperity of the PHP language.</p>

                    <div class="social-icons">
                        <a href="https://www.linkedin.com/company/phpnet/" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">Linkedin</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.9428 1.75H12.0572C14.2479 1.74999 15.9686 1.74998 17.312 1.93059C18.6886 2.11568 19.7809 2.50271 20.6391 3.36091C21.4973 4.21911 21.8843 5.31137 22.0694 6.68802C22.25 8.03144 22.25 9.75214 22.25 11.9428V12.0572C22.25 14.2479 22.25 15.9686 22.0694 17.312C21.8843 18.6886 21.4973 19.7809 20.6391 20.6391C19.7809 21.4973 18.6886 21.8843 17.312 22.0694C15.9686 22.25 14.2479 22.25 12.0572 22.25H11.9428C9.7521 22.25 8.03144 22.25 6.68802 22.0694C5.31137 21.8843 4.21911 21.4973 3.36091 20.6391C2.50272 19.7809 2.11568 18.6886 1.93059 17.312C1.74998 15.9686 1.74999 14.2479 1.75 12.0572V12.0572V11.9428V11.9428C1.74999 9.75211 1.74998 8.03144 1.93059 6.68802C2.11568 5.31137 2.50272 4.21911 3.36091 3.36091C4.21911 2.50271 5.31137 2.11568 6.68802 1.93059C8.03143 1.74998 9.75214 1.74999 11.9428 1.75ZM8.00195 10.5C8.00195 9.94771 7.55424 9.5 7.00195 9.5C6.44967 9.5 6.00195 9.94771 6.00195 10.5L6.00195 17C6.00195 17.5523 6.44967 18 7.00195 18C7.55424 18 8.00195 17.5523 8.00195 17L8.00195 10.5ZM11.002 9C11.4073 9 11.7564 9.2412 11.9134 9.58791C12.5213 9.215 13.2365 9 14.002 9C16.2111 9 18.002 10.7909 18.002 13V17C18.002 17.5523 17.5542 18 17.002 18C16.4497 18 16.002 17.5523 16.002 17V13C16.002 11.8954 15.1065 11 14.002 11C12.8974 11 12.002 11.8954 12.002 13L12.002 17C12.002 17.5523 11.5542 18 11.002 18C10.4497 18 10.002 17.5523 10.002 17L10.002 10C10.002 9.44771 10.4497 9 11.002 9ZM8.25977 7C8.25977 7.69036 7.70012 8.25 7.00977 8.25H7.00078C6.31043 8.25 5.75078 7.69036 5.75078 7C5.75078 6.30964 6.31043 5.75 7.00078 5.75H7.00977C7.70012 5.75 8.25977 6.30964 8.25977 7Z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                        <a href="https://fosstodon.org/@php" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">@php@fosstodon.org</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M21.5 6.5c-.3-2.2-2.3-3.9-4.6-4.2-.4 0-1.9-.3-5.3-.3s-4.2.2-4.6.3c-2.2.3-4.3 1.9-4.8 4C2 7.6 2 8.8 2 9.9a38.5 38.5 0 0 0 .8 7.9c.4 2 2.4 3.5 4.2 4.2a11.6 11.6 0 0 0 7 .1l1.5-.6v-1.6a19 19 0 0 1-4.1.4c-2.3 0-3-1-3.2-1.5a4.7 4.7 0 0 1-.2-1.3c1.3.3 2.7.5 4 .5h1c1.3 0 2.7-.1 4-.4h.2a5 5 0 0 0 4.3-4.8V6.5Zm-3.3 7.9H16V9c0-1.1-.4-1.7-1.4-1.7-1 0-1.6.7-1.6 2v3h-2.2v-3c0-1.3-.5-2-1.6-2-1 0-1.4.6-1.4 1.7v5.3H5.6V8.9c0-1.1.3-2 .9-2.6a3 3 0 0 1 2.3-1c1.2 0 2 .4 2.6 1.2l.5 1 .6-1c.5-.8 1.4-1.2 2.5-1.2 1 0 1.8.3 2.4 1 .6.6.8 1.5.8 2.6v5.5Z"></path>
                            </svg>
                        </a>
                        <a href="https://github.com/php/" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">GitHub</span>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                      clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>

                    <a href="https://thephp.foundation/sponsor/" target="_blank" class="button-primary">Donate</a>
                </div>
                <div class="footer-links-container">
                    <div class="footer-links-grid">
                        <div>
                            <h3>PHP</h3>
                            <ul role="list">
                                <li><a href="/my.php">My PHP.net</a></li>
                                <li><a href="/downloads.php">Downloads</a></li>
                                <li><a href="/contact.php">Contact</a></li>
                                <li><a href="/sites.php">Other PHP.net sites</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3>Learn</h3>
                            <ul role="list">
                                <li><a href="/docs.php">Documentation</a></li>
                                <li><a href="/get-involved.php">Get Involved</a></li>
                                <li><a href="/support.php">Help</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-links-grid">
                        <div>
                            <h3>The PHP Foundation</h3>
                            <ul role="list">
                                <li><a href="https://thephp.foundation/" target="_blank" rel="noopener noreferrer">About
                                        the
                                        Foundation</a></li>
                                <li><a href="https://thephp.foundation/sponsor/" target="_blank"
                                       rel="noopener noreferrer">Sponsor</a>
                                </li>
                                <li><a href="https://thephp.foundation/contact/" target="_blank"
                                       rel="noopener noreferrer">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>Legal</h3>
                            <ul role="list">
                                <li><a href="/privacy.php">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-credits">
                <p>Copyright © 2001-<?= date('Y') ?> The PHP Group.</p>
                <p>Created as part of
                    <a href="https://thephp.foundation/blog/2025/11/05/design-contest-results/" target="_blank">The PHP
                        Foundation Design Contest</a>.
                </p>
            </div>
        </div>
    </footer>

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
        Prism.highlightAll()
    </script>
<?php

site_footer(['footer' => false]);
