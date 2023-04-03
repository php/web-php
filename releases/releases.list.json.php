<?php
include_once __DIR__ . '/../include/branches.inc';
include_once __DIR__ . '/../include/releases.inc';
include_once __DIR__ . '/../include/version.inc';

function get_releases_data(): array {
    global $RELEASES, $OLDRELEASES;

    $allReleases = array_merge(
        ...$OLDRELEASES,
        ...$RELEASES
    );

    $activeBranches = array_keys(array_merge(...get_active_branches(true)));

    $data = [];
    foreach ($allReleases as $version => $release) {
        $data[$version] = [
            'version'       => $version,
            'date'          => date('Y-m-d', strtotime($release['date'])),
            'active_branch' => in_array(version_number_to_branch($version), $activeBranches),
            'security'      => in_array('security', $release['tags'] ?? []),
        ];
    }

    uksort(
        $data,
        function (string $a, string $b): int {
            return - version_compare($a, $b);
        }
    );

    return array_values($data);
}

header('Content-Type: application/json');
echo json_encode(get_releases_data(), JSON_PRETTY_PRINT);
