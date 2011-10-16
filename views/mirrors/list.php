<?php

global $MIRRORS, $COUNTRIES;

// Lets group the mirrors by country code, for easy output on the page.
$grouped_mirrors = array();
foreach($MIRRORS as $key => $mirror) {

    if(!isset($grouped_mirrors[$mirror[0]])) {
        $grouped_mirrors[$mirror[0]] = array();
    }

    $grouped_mirrors[$mirror[0]][] = array(
        'url'            => $key,
        'country_code'   => $mirror[0],
        'title'          => $COUNTRIES[$mirror[0]],
        'provider_title' => $mirror[1],
        'provider_url'   => $mirror[3]
    );
}


foreach($grouped_mirrors as $country) {

    $first = true;

    foreach($country as $mirror) {

        $murl = $mirror['url'];
        $country = $mirror['country_code'];

        // If the mirror is not all right or it is virtual (not an official mirror), skip it
        if (mirror_status($mirror['url']) != MIRROR_OK || mirror_type($mirror['url']) == MIRROR_VIRTUAL) { continue; }

        // Get the country code and check if it is matching the country provided (or does not
        // match the country, which it should not be)
        $country = mirror_country($mirror['url']);

        if($first):
        ?>

        <div class="mirror">
            <div class="title"><?php echo $mirror['title']; ?></div>
            <div class="flag">
                <?php
                print_image('flags/new/' . strtolower($mirror['country_code']) . '.png', $mirror['title']);
                ?>
            </div>
            <?php
            $first = false;

        endif;

        $mirror_url = htmlspecialchars($mirror['url']);
        $mirror_provider_name = htmlspecialchars($mirror['provider_title']);
        ?>

            <div class="entry clearfix">
                <div class="url"><a href="<?php echo $mirror['url']; ?>" title="<?php echo $mirror_url; ?>"><?php echo $mirror_url; ?></a></div>
                <div class="provider"><a href="<?php echo $mirror['provider_url']; ?>" title="<?php echo $mirror_provider_name; ?>"><?php echo $mirror_provider_name; ?></a></div>
            </div>
    <?php
    }

    if(!$first):
    ?>

        </div>
        <!-- /.mirror -->

    <?php
    endif;

}
