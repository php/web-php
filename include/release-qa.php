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

    '8.4.28' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 1,
            'sha256_bz2' => '22add2dccb59c967e12b6be46377133d2fa43373ebf26957cf9ef1b4f29c6150',
            'sha256_gz'  => '88c9127c40a464f19249cf5f111f2b6b4d67cd2f4ecbe3b57786921103d61103',
            'sha256_xz'  => '1d37bf6de7dd78d1cdc233709ce86c4c38825b9ad61d5790862783718087c87d',
            'date'       => '05 November 2026',
            'baseurl'    => 'https://downloads.php.net/~saki/',
        ],
    ],

    '8.5.13' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 1,
            'sha256_bz2' => 'bafc2cd487e3f9366ac22d6da421b674539c6a0454573bc2380f5525efdb6199',
            'sha256_gz'  => '1e58c71d6dfdaf6748b5419ed12b485e01a1da755400b1213b241c2029752dd5',
            'sha256_xz'  => 'dd6fa1450ecb0ca96c081adbb1b0691facf6e6492d9a127960f295ec20bdca8f',
            'date'       => '05 November 2026',
            'baseurl'    => 'https://downloads.php.net/~edorian/',
        ],
    ],

    '8.6.0' => [
        'active'  => true,
        'release' => [
            'type'       => 'RC',
            'number'     => 5,
            'sha256_bz2' => '8d6080150fd290d6ea9725928040a2dafe564d43d08badbca130d716947264bc',
            'sha256_gz'  => '0056e79b4622ed182882fc4cdb22158655703e9c90dccf7509e4500c8e924122',
            'sha256_xz'  => 'abd7e3a652cfec56a2904abef7e8f37206fa07a8c1505a5a8a9bfdd25a1f1ba9',
            'date'       => '05 November 2026',
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
