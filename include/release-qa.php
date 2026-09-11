<?php

/*
What this file does:
    - Generates the download links found at qa.php.net
    - Determines which test results are emailed to news.php.net/php.qa.reports
    - Defines $QA_RELEASES for internal and external (api.php) use, contains all qa related information for future PHP releases

Documentation:
    $QA_RELEASES documentation:
        Configuration:
        - Key is future PHP version number
            - Example: If 5.3.6 is the latest stable release, then use 5.3.7 because 5.3.7-dev is our qa version
            - Typically, this is the only part needing changed
        - active (bool):
            - It's active and being tested here
            - Meaning, the version will be reported to the qa.reports list, and be linked at qa.php.net
            - File extensions .tar.gz and .tar.bz2 are assumed to be available
        - release (array):
            - type: RC, alpha, and beta are examples (case should match filename case)
            - version: 0 if no such release exists, otherwise an integer of the rc/alpha/beta number
            - sha256_bz2: sha256 checksum of this downloadable .tar.bz2 file
            - sha256_gz:  sha256 checksum of this downloadable .tar.gz file
            - sha256_xz: sha256 checksum of this downloadble .xz file
            - date: date of release e.g., 21 May 2011
            - baseurl: base url of where these downloads are located
            - Multiple checksums can be available, see the $QA_CHECKSUM_TYPES array below
        Other variables within $QA_RELEASES are later defined including:
            - reported: versions that make it to the qa.reports mailing list
            - release: all current qa releases, including paths to dl urls (w/ sha256 info)
            - dev_version: dev version
            - $QA_RELEASES is made available at qa.php.net/api.php

TODO:
    - Save all reports (on qa server) for all tests, categorize by PHP version (see buildtest-process.php)
    - Consider storing rc downloads at one location, independent of release master
    - Determine best way to handle rc baseurl, currently assumes .tar.gz/tar.bz2 will exist
    - Determine if $QA_RELEASES is compatible with all current, and most future configurations
    - Determine if $QA_RELEASES can be simplified
    - Determine if alpha/beta options are desired
    - Unify then create defaults for most settings
    - Add option to allow current releases (e.g., retrieve current release info via daily cron, cache, check, configure ~ALLOW_CURRENT_RELEASES)
*/


$QA_RELEASES = [

    '8.2.27' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 0,
            'sha256_bz2' => '',
            'sha256_gz'  => '',
            'sha256_xz'  => '',
            'date'       => '05 Dec 2024',
            'baseurl'    => 'https://downloads.php.net/',
        ],
    ],

    '8.3.31' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 0,
            'sha256_bz2' => '',
            'sha256_gz'  => '',
            'sha256_xz'  => '',
            'date'       => '07 May 2026',
            'baseurl'    => 'https://downloads.php.net/',
        ],
    ],

    '8.4.26' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 1,
            'sha256_bz2' => 'afaf140fa8f2593b3e08e3cff2ec81f62d1d8b21834439309e456c90a9ca1312',
            'sha256_gz'  => '48a559ba2cb17f21a4bbbf21624e616e5c7e3d4ce92eba7ffbc260c3b52bba5f',
            'sha256_xz'  => 'c6e6f52752510c3b3fbaf9e34a9ec37fb17f6741fb8b2637d6804a8a71c4fc37',
            'date'       => '10 September 2026',
            'baseurl'    => 'https://downloads.php.net/~saki/',
        ],
    ],

    '8.5.10' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 1,
            'sha256_bz2' => '24574eb0c8c1bceac833a5b984fcfb0cde50a019f6a757c35f28da3dc97300b9',
            'sha256_gz'  => 'dd0a2dc233ee6dd6d8ef389b671fefc5cd0f49b859d16e53d875582c5e248bbb',
            'sha256_xz'  => '84e5d0abc91f6b1f69de6c5ec5d3720124582417c7ce6c5df742dcbada179a82',
            'date'       => '10 September 2026',
            'baseurl'    => 'https://downloads.php.net/~edorian/',
        ],
    ],

    '8.6.0' => [
        'active'  => true,
        'release' => [
            'type'       => 'beta',
            'number'     => 3,
            'sha256_bz2' => 'e1517694d025b947430bc31afe41e6e134f68782d944542b962cf0b5132b1936',
            'sha256_gz'  => '2499bb217d77566319c0e971a36041484b8cb7181ef5adf282a751e132015e8c',
            'sha256_xz'  => 'e8daf9546c4d4244dad961b5412734db57823c2e967df3fcfbb819a62d520ea6',
            'date'       => '10 September 2026',
            'baseurl'    => 'https://downloads.php.net/~svpernova09/',
        ],
    ],
];

/*** End Configuration *******************************************************************/

// This is a list of the possible checksum values that can be supplied with a QA release. Any
// new algorithm is read from the $QA_RELEASES array under the 'release' index for each version
// in the form of "$algorithm_$filetype".
//
// For example, if SHA512 were to be supported, the following indices would have to be added:
//
// 'sha512_bz2' => 'xxx',
// 'sha512_gz'  => 'xxx',
// 'sha512_xz'  => 'xxx',
$QA_CHECKSUM_TYPES = ['sha256'];

// $QA_RELEASES eventually contains just about everything, also for external use
// release  : These are encouraged for use (e.g., linked at qa.php.net)
// reported : These are allowed to report @ the php.qa.reports mailing list

$process_qa_releases = /**
 * @param array<string, array{
 *     active?: bool,
 *     release: array{
 *         type: string,
 *         number: int,
 *         sha256_bz2?: string,
 *         sha256_gz?: string,
 *         sha256_xz?: string,
 *         date: string,
 *         baseurl?: string
 *     }
 * }> $qa_releases
 * @param list<string> $checksum_types
 * @return array<string, mixed>
 */
static function(array $qa_releases, array $checksum_types): array {
    foreach ($qa_releases as $pversion => $info) {

        if (isset($info['active']) && $info['active']) {

            // Allow -dev versions of all active types
            // Example: 5.3.6-dev
            $qa_releases['reported'][] = "{$pversion}-dev";
            $qa_releases[$pversion]['dev_version'] = "{$pversion}-dev";

            // Allow -dev version of upcoming qa releases (rc/alpha/beta)
            // @todo confirm this php version format for all dev versions
            if ((int)$info['release']['number'] > 0) {
                $qa_releases['reported'][] = "{$pversion}{$info['release']['type']}{$info['release']['number']}";
                if (!empty($info['release']['baseurl'])) {

                    // php.net filename format for qa releases
                    // example: php-5.3.0RC2
                    $fn_base = 'php-' . $pversion . $info['release']['type'] . $info['release']['number'];

                    $qa_releases[$pversion]['release']['version'] = $pversion . $info['release']['type'] . $info['release']['number'];
                    foreach ([ 'bz2', 'gz', 'xz' ] as $file_type) {
                        foreach ($checksum_types as $algo) {
                            if (isset($info['release'][$algo . '_' . $file_type])) {
                                $qa_releases[$pversion]['release']['files'][$file_type][$algo] = $info['release'][$algo . '_' . $file_type];
                            }
                        }
                        if (!empty($qa_releases[$pversion]['release']['files'][$file_type])) {
                            $qa_releases[$pversion]['release']['files'][$file_type]['path']= $info['release']['baseurl'] . $fn_base . '.tar.' . $file_type;
                        }
                    }

                    if (empty($qa_releases[$pversion]['release']['files'])) {
                        $qa_releases[$pversion]['release']['enabled'] = false;
                    }
                }
            } else {
                $qa_releases[$pversion]['release']['enabled'] = false;
            }

        }
    }

    // Sorted information for later use
    // @todo need these?
    // $qa_releases['releases']   : All current versions with active qa releases
    foreach ($qa_releases as $pversion => $info) {
        if (isset($info['active']) && $info['active'] && !empty($info['release']['number'])) {
            $qa_releases['releases'][$pversion] = $info['release'];
        }
    }

    return $qa_releases;
};

$QA_RELEASES = $process_qa_releases($QA_RELEASES, $QA_CHECKSUM_TYPES);
unset($process_qa_releases);
