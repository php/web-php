<div class=home-sidebar>

    <h2>Recent News</h2>
    <ul>
        <?php
        $i = 0;
        foreach (print_news($news, "frontpage", 5, null, true) as $entry):
            $escaped_title = htmlentities($entry['title'], ENT_QUOTES, 'UTF-8');
        ?>
        <li><a target="_blank" title="<?php echo $escaped_title; ?>" href="<?php echo $entry['permlink']; ?>"><?php echo $escaped_title; ?></a></li>
        <?php
        endforeach;
        ?>
    </ul>
    <p class="center"><a href="/archive/index.php" title="News Archive">News Archive</a></p>

    <h2>Conferences</h2>
    <ul>
        <li>Conference 1</li>
        <li>Conference 2</li>
        <li>Conference 3</li>
	</ul>

    <h2>User Group Events</h2>
    <ul>
        <li>Event 1</li>
        <li>Event 2</li>
        <li>Event 3</li>
    </ul>

    <h2>Thanks To</h2>
    <ul>
        <li><a target="_blank" href="http://www.easydns.com/?V=698570efeb62a6e2" title="DNS Hosting provided by easyDNS">easyDNS</a></li>
        <li><a target="_blank" href="http://www.directi.com/">Directi</a></li>
        <li><a target="_blank" href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
        <li><a target="_blank" href="http://www.servercentral.net/">Server Central</a></li>
        <li><a target="_blank" href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
        <li><a target="_blank" href="http://www.spry.com/">Spry VPS Hosting</a></li>
        <li><a target="_blank" href="http://ez.no/">eZ Systems</a> / <a href="http://www.hit.no/">HiT</a></li>
        <li><a target="_blank" href="http://www.osuosl.org">OSU Open Source Lab</a></li>
        <li><a target="_blank" href="http://www.yahoo.com/">Yahoo! Inc.</a></li>
        <li><a target="_blank" href="http://www.binarysec.com/">BinarySEC</a></li>
        <li><a target="_blank" href="http://www.nexcess.net/">NEXCESS.NET</a></li>
        <li><a target="_blank" href="http://www.rackspace.com/">Rackspace</a></li>
        <li><a target="_blank" href="http://www.eukhost.com/">EUKhost</a></li>
        <li><a target="_blank" href="http://www.micfo.com/">micfo</a></li>
        <li><a target="_blank" href="http://www.sohosted.nl/webhosting/">Sohosted</a></li>
        <li><a target="_blank" href="http://www.redpill-linpro.com">Redpill Linpro</a></li>
        <li><a target="_blank" href="http://www.facebook.com">Facebook</a></li>
    </ul>

</div>
