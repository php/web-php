<?php

/*

 This file is included directly on all manual pages,
 and therefore is the entering point for all manual pages
 to the website function collection. These functions display
 the manual pages with headers and navigation.

 The $PGI global variable is used to store all page related
 information, including HTTP header related data.

*/

// Ensure that our environment is set up
include_once __DIR__ . '/prepend.inc';

// Set variable defaults
$PGI = []; $SIDEBAR_DATA = '';

// =============================================================================
// User note display functions
// =============================================================================

use phpweb\I18n\Languages;
use phpweb\UserNotes\UserNoteService;

function manual_navigation_breadcrumbs(array $setup) {
    $menu = [];
    foreach (array_reverse($setup["parents"]) as $parent) {
        $menu[] = [
            "title" => $parent[1],
            "link" => $parent[0],
        ];
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = [
            "title" => $setup["up"][1],
            "link" => $setup["up"][0],
        ];
        $menu[] = $last_item;
    }
    return $menu;
}

function manual_navigation_related(array $setup) {
    $siblings = [];
    foreach ($setup['toc'] as $entry) {
        $siblings[] = [
            "title" => manual_navigation_methodname($entry[1]),
            "link" => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        ];
    }

    // The index manual page has no parent..
    if ($setup["up"][0]) {
        $last_item = [
            "title" => $setup["up"][1],
            "link" => $setup["up"][0],
        ];
        $siblings = [array_merge($last_item, ["children" => $siblings])];
    }
    return $siblings;
}

function manual_navigation_deprecated(array $setup) {
    $methods = [];
    foreach ((array)$setup['toc_deprecated'] as $entry) {
        $methods[] = [
            "title" => manual_navigation_methodname($entry[1]),
            "link" => $entry[0],
            "current" => $setup["this"][0] == $entry[0],
        ];
    }

    return $methods;
}

function manual_navigation_methodname($methodname) {
    // We strip out any class prefix here, we only want method names
    if (strpos($methodname, '::') !== false && strpos($methodname, ' ') === false) {
        $tmp = explode('::', $methodname);
        $methodname = $tmp[1];
    }

    // Add zero-width spaces to allow line-breaks at various characters
    return str_replace(['-', '_'], ['-&#8203;', '_&#8203;'], $methodname);
}

// Set up variables important for this page
// including HTTP header information
function manual_setup($setup): void {
    global $PGI, $MYSITE, $USERNOTES;

    //TODO: get rid of this hack to get the related items into manual_footer
    global $__RELATED;

    if (!isset($setup["toc_deprecated"])) {
        $setup["toc_deprecated"] = [];
    }
    $PGI = $setup;
    // Set base href for this manual page
    $base = 'manual/' . (new Languages())->convert($setup['head'][1]) . "/";
    $_SERVER['BASE_PAGE'] = $base . $setup['this'][0];
    $_SERVER['BASE_HREF'] = $MYSITE . $_SERVER['BASE_PAGE'];

    $timestamps = [
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/" . $_SERVER["BASE_PAGE"]),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/include/prepend.inc"),
        filemtime($_SERVER["DOCUMENT_ROOT"] . "/styles/theme-base.css"),
    ];

    // Load user note for this page
    $filename = $PGI['this'][0];

    // Drop file extension from the name
    if (substr($filename, -4) == '.php') {
        $filename = substr($filename, 0, -4);
    }

    $userNoteService = new UserNoteService();
    $USERNOTES = $userNoteService->load($filename);
    if ($USERNOTES) {
        $note = current($USERNOTES);
        $timestamps[] = $note->ts;
    }

    $lastmod = max($timestamps);

    $breadcrumbs = manual_navigation_breadcrumbs($setup);
    $__RELATED['toc'] = manual_navigation_related($setup);
    $__RELATED['toc_deprecated'] = manual_navigation_deprecated($setup);

    $config = [
        "current" => "docs",
        "breadcrumbs" => $breadcrumbs,
        "languages" => array_keys(Languages::ACTIVE_ONLINE_LANGUAGES),
        "meta-navigation" => [
            "contents" => $base . $setup["home"][0],
            "index" => $base . $setup["up"][0],
            "prev" => $base . $setup["prev"][0],
            "next" => $base . $setup["next"][0],
        ],
        "lang" => $setup["head"][1],
        "thispage" => $setup["this"][0],
        "prev" => $setup["prev"],
        "next" => $setup["next"],
        "cache" => $lastmod,
        "description" => $setup["this"][2] ?? null,
    ];
    site_header($setup["this"][1] . " - Manual", $config);

    $languageChooser = manual_language_chooser($config['lang'], $config['thispage']);

    echo <<<PAGE_TOOLS
  <div class="page-tools">
    <div class="change-language">
      {$languageChooser}
    </div>
  </div>
PAGE_TOOLS;
}

function manual_language_chooser($currentlang, $currentpage) {
    global $LANG;

    // Prepare the form with all the options
    $othersel = ' selected="selected"';
    $out = [];
    foreach (Languages::ACTIVE_ONLINE_LANGUAGES as $lang => $text) {
        $selected = '';
        if ($lang == $currentlang) {
            $selected = ' selected="selected"';
            $othersel = '';
        }
        $out[] = "<option value='$lang/$currentpage'$selected>$text</option>";
    }
    $out[] = "<option value='help-translate.php'{$othersel}>Other</option>";
    $format_options = implode("\n" . str_repeat('  ', 6), $out);

    $changeLanguage = autogen('change_language', $LANG);
    $r = <<<CHANGE_LANG
      <form action="/manual/change.php" method="get" id="changelang" name="changelang">
        <fieldset>
          <label for="changelang-langs">$changeLanguage:</label>
          <select onchange="document.changelang.submit()" name="page" id="changelang-langs">
            {$format_options}
          </select>
        </fieldset>
      </form>
CHANGE_LANG;
    return trim($r);
}

function manual_footer($setup): void {
    global $USERNOTES, $__RELATED, $LANG;

    $id = substr($setup['this'][0], 0, -4);
    $repo = strtolower($setup["head"][1]); // pt_BR etc.

    $edit_url = "https://github.com/php/doc-{$repo}";
    // If the documentation source information is available (generated using
    // doc-base/configure.php and PhD) then try and make a source-specific URL.
    if (isset($setup['source'])) {
        $source_lang = $setup['source']['lang'];
        if ($source_lang === $repo || $source_lang === 'base') {
            $edit_url = "https://github.com/php/doc-{$source_lang}/blob/master/{$setup['source']['path']}";
        }
    }

    $lastUpdate = '';
    if (isset($setup["history"]['modified']) && $setup["history"]['modified'] !== "") {
        $modifiedDateTime = date_create($setup["history"]['modified']);
        if ($modifiedDateTime !== false) {
            $lastUpdate .= "Last updated on " . date_format($modifiedDateTime,"M d, Y (H:i T)");
            $lastUpdate .= (isset($setup["history"]['contributors'][0]) ? " by " . $setup["history"]['contributors'][0] : "") . ".";
        }
    }

    $contributors = '';
    if (isset($setup["history"]['contributors']) && count($setup["history"]['contributors']) > 0) {
        $contributors = '<a href="?contributors">All contributors.</a>';
    }

    $improveThisPage = autogen('improve_this_page', $LANG);
    $howToImproveThisPage = autogen('how_to_improve_this_page', $LANG);
    $contributionGuidlinesOnGithub = autogen('contribution_guidlines_on_github', $LANG);
    $submitPullRequest = autogen('submit_a_pull_request', $LANG);
    $reportBug = autogen('report_a_bug', $LANG);
    echo <<<CONTRIBUTE
    <div class="contribute">
      <h3 class="title">$improveThisPage</h3>
      <div>
        $lastUpdate $contributors
      </div>
      <div class="edit-bug">
        <a href="https://github.com/php/doc-base/blob/master/README.md" title="$contributionGuidlinesOnGithub" target="_blank" rel="noopener noreferrer">$howToImproveThisPage</a>
        •
        <a href="{$edit_url}">$submitPullRequest</a>
        •
        <a href="https://github.com/php/doc-{$repo}/issues/new?body=From%20manual%20page:%20https:%2F%2Fphp.net%2F$id%0A%0A---">$reportBug</a>
      </div>
    </div>
CONTRIBUTE;

    $userNoteService = new UserNoteService();
    $userNoteService->display($USERNOTES);
    site_footer([
        'related_menu' => $__RELATED['toc'],
        'related_menu_deprecated' => $__RELATED['toc_deprecated'],
    ]);
}

function contributors($setup) {
    if (!isset($_GET["contributors"])
        || !isset($setup["history"]["contributors"])
        || count($setup["history"]["contributors"]) < 1) {
        return;
    }

    $contributorList = "<li>" . implode("</li><li>", $setup["history"]["contributors"]) . "</li>";

    echo <<<CONTRIBUTORS
<div class="book">
  <h1 class="title">Output Buffering Control</h1>
  The following have authored commits that contributed to this page:
  <ul>
   $contributorList
  </ul>
</div>
CONTRIBUTORS;
    manual_footer($setup);
    exit;
}

function autogen(string $text, string $lang) {
    static $translations = [];

    $lang = ($lang === "") ? "en" : $lang;
    if (isset($translations[$lang])) {
        if (isset($translations[$lang][$text]) && $translations[$lang][$text] !== "") {
            return $translations[$lang][$text];
        }
        if ($lang !== "en") {
            // fall back to English if text is not defined for the given language
            return autogen($text, "en");
        }
        // we didn't find the English text either
        throw new \InvalidArgumentException("Cannot autogenerate text for '$text'");
    }

    $translationFile = __DIR__ . \DIRECTORY_SEPARATOR . "ui_translation" . \DIRECTORY_SEPARATOR . $lang . ".ini";

    if (!\file_exists($translationFile)) {
        if ($lang !== "en") {
            // fall back to English if translation file is not found
            return autogen($text, "en");
        }
        // we didn't find the English file either
        throw new \Exception("Cannot find translation files");
    }

    $translations[$lang] = \parse_ini_file($translationFile);

    return autogen($text, $lang);
}
