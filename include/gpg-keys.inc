<?php
require __DIR__ . '/branches.inc';

// GPG keys used for signing releases.

function gpg_key_get(string $rm): ?string {
    switch ($rm) {
        case 'ab':
            return
                "pub   2048R/9C0D5763 2015-06-09 [expires: 2024-06-06]\n" .
                "      Key fingerprint = 1A4E 8B72 77C4 2E53 DBA9  C7B9 BCAA 30EA 9C0D 5763\n" .
                "uid                  Anatol Belski <ab@php.net>";

        case 'carusogabriel':
            return
                "pub   rsa4096 2020-05-09 [SC] [expires: 2024-05-08]\n" .
                "      BFDD D286 4282 4F81 18EF  7790 9B67 A5C1 2229 118F\n" .
                "uid           [ultimate] Gabriel Caruso (Release Manager) <carusogabriel@php.net>\n" .
                "sub   rsa4096 2020-05-09 [E] [expires: 2024-05-08]";

        case 'cmb':
            return
                "pub   rsa4096/118BCCB6 2018-06-05 [SC] [expires: 2022-06-04]\n" .
                "      Key fingerprint = CBAF 69F1 73A0 FEA4 B537  F470 D66C 9593 118B CCB6\n" .
                "uid                  Christoph M. Becker <cmb@php.net>";

        case 'davey':
            return
                "pub   4096R/7BD5DCD0 2016-05-07\n" .
                "      Key fingerprint = A917 B1EC DA84 AEC2 B568 FED6 F50A BC80 7BD5 DCD0\n" .
                "uid                  Davey Shafik <davey@php.net>";

        case 'derick':
            return
                "sec   rsa4096 2019-06-11 [SC] [expires: 2029-06-08]\n" .
                "      5A52880781F755608BF815FC910DEB46F53EA312\n" .
                "uid           [ultimate] Derick Rethans <gpg@derickrethans.nl>\n" .
                "uid           [ultimate] Derick Rethans <derick@derickrethans.nl>\n" .
                "uid           [ultimate] Derick Rethans (GitHub) <github@derickrethans.nl>\n" .
                "uid           [ultimate] Derick Rethans (PHP) <derick@php.net>\n" .
                "ssb   rsa4096 2019-06-11 [E] [expires: 2029-06-08]";

        case 'dsp':
            return
                "pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]\n" .
                "      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D\n" .
                "uid                  David Soria Parra <dsp@php.net>";

        case 'johannes':
            return
                "pub   2048R/FC9C83D7 2012-03-18 [expires: 2017-03-17]\n" .
                "      Key fingerprint = 0A95 E9A0 2654 2D53 835E  3F3A 7DEC 4E69 FC9C 83D7\n" .
                "uid                  Johannes Schlüter <johannes@schlueters.de>\n" .
                "uid                  Johannes Schlüter <johannes@php.net>";

        case 'jpauli':
            return
                "pub   2048R/90D90EC1 2013-07-18 [expire : 2016-07-17]\n" .
                "      Key fingerprint = 0BD7 8B5F 9750 0D45 0838  F95D FE85 7D9A 90D9 0EC1\n" .
                "uid                  Julien Pauli <jpauli@php.net>";

        case 'krakjoe':
            return
                "pub   2048R/31CBD89E 2016-12-08\n" .
                "      Key fingerprint = 5289 95BF EDFB A719 1D46  839E F9BA 0ADA 31CB D89E\n" .
                "uid                  Joe Watkins <krakjoe@php.net>";

        case 'patrickallaert':
            return
                "pub   rsa4096 2021-04-01 [SC]\n" .
                "      F1F6 9223 8FBC 1666 E5A5  CCD4 199F 9DFE F6FF BAFD\n" .
                "uid           [ultimate] Patrick Allaert <patrickallaert@php.net>\n" .
                "sub   rsa4096 2021-04-01 [E]";

        case 'petk':
            return
                "pub   rsa4096 2019-05-29 [SC] [expires: 2021-05-28]\n" .
                "      4267 0A7F E4D0 441C 8E46  3234 9E4F DC07 4A4E F02D\n" .
                "uid           [ultimate] Peter Kokot <petk@php.net>\n" .
                "sub   rsa4096 2019-05-29 [E] [expires: 2021-05-28]";

        case 'pierrick':
            return
                "pub   rsa4096 2021-04-01 [SC]\n" .
                "      1198 C011 7593 497A 5EC5  C199 286A F1F9 8974 69DC\n" .
                "uid           [ultimate] Pierrick Charron <pierrick@php.net>\n" .
                "sub   rsa4096 2021-04-01 [E]";

        case 'pollita':
            return
                "pub   4096R/70D12172 2017-04-14 [expires: 2024-04-21]\n" .
                "      Key fingerprint = 1729 F839 38DA 44E2 7BA0  F4D3 DBDB 3974 70D1 2172\n" .
                "uid                  Sara Golemon <pollita@php.net>";

        case 'ramsey':
            return
                "pub   rsa4096 2021-04-26 [SC] [expires: 2025-11-24]\n" .
                "      39B6 4134 3D8C 104B 2B14  6DC3 F9C3 9DC0 B969 8544\n" .
                "uid           [ultimate] Ben Ramsey <ramsey@php.net>\n" .
                "sub   rsa4096 2021-04-26 [E] [expires: 2025-11-24]";

        case 'remi':
            return
                "pub   4096R/EE5AF27F 2017-05-24 [expires: 2024-05-22]\n" .
                "      Key fingerprint = B1B4 4D8F 021E 4E2D 6021  E995 DC9F F8D3 EE5A F27F\n" .
                "uid                  Remi Collet <remi@php.net>";

        case 'sergey':
            return
                "pub   rsa4096 2021-03-26 [SC] [expires: 2030-03-26]\n" .
                "      E609 13E4 DF20 9907 D8E3  0D96 659A 97C9 CF2A 795A\n" .
                "uid           [ultimate] Sergey Panteleev <sergey@php.net>\n" .
                "uid           [ultimate] Sergey Panteleev <sergey@s-panteleev.ru>\n" .
                "uid           [ultimate] Sergey Panteleev <sergey@sergeypanteleev.com>\n" .
                "sub   rsa4096 2021-03-26 [E] [expires: 2025-03-26]";

        case 'stas':
            return
                "pub   2048D/5DA04B5D 2012-03-19\n" .
                "      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D\n" .
                "uid                  Stanislav Malyshev (PHP key) <smalyshev@gmail.com>\n" .
                "uid                  Stanislav Malyshev (PHP key) <stas@php.net>\n" .
                "uid                  Stanislav Malyshev (PHP key) <smalyshev@sugarcrm.com>";

        case 'tyrael':
            return
                "pub   2048R/33CFC8B3 2014-01-14 [expires: 2020-01-13]\n" .
                "      Key fingerprint = 6E4F 6AB3 21FD C07F 2C33  2E3A C2BF 0BC4 33CF C8B3\n" .
                "uid                  Ferenc Kovacs <tyrael@php.net>";

        default:
            return null;
    }
}

function gpg_key_get_branches(bool $activeOnly): array {
    $branches = [
        '8.2' => ['pierrick', 'ramsey', 'sergey'],
        '8.1' => ['krakjoe', 'ramsey', 'patrickallaert'],
        '8.0' => ['pollita', 'carusogabriel'],
        '7.4' => ['derick', 'petk'],
        '7.3' => ['cmb', 'stas'],
        '7.2' => ['pollita', 'remi', 'cmb'],
        '7.1' => ['davey', 'krakjoe', 'pollita'],
        '7.0' => ['ab', 'tyrael'],
        '5.6' => ['tyrael', 'jpauli'],
        '5.5' => ['jpauli', 'dsp', 'stas'],
        '5.4' => ['stas'],
        '5.3' => ['dsp', 'johannes'],
    ];

    if (!$activeOnly) { return $branches; }

    $active = get_active_branches();
    return array_filter($branches, function ($branch) use ($active) {
        [$major] = explode('.', $branch, 2);
        return isset($active[$major][$branch]);
    }, ARRAY_FILTER_USE_KEY);
}

function gpg_key_show_keys(bool $activeOnly): void {
    foreach (gpg_key_get_branches($activeOnly) as $branch => $rms) {
        $keys = array_filter(
            array_map(function ($rm) { return gpg_key_get($rm); }, $rms),
            function ($key) { return $key !== null; });
        if (empty($keys)) { continue; }

        $branch = htmlentities($branch, ENT_QUOTES, 'UTF-8');
        $keys = htmlentities(implode("\n\n", $keys), ENT_QUOTES, 'UTF-8');

        echo "<h3 id='gpg-$branch' class='content-header'>PHP $branch</h3>\n";
        echo "<div class='content-box'>\n";
        echo "  <pre>\n";
        echo $keys, "\n";
        echo "  </pre>\n";
        echo "</div>\n\n\n";
    }
}
