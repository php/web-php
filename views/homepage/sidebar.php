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
        <li><a target="_blank" href="http://www.directi.com/" title="Directi">Directi</a></li>
        <li><a target="_blank" href="http://promote.pair.com/direct.pl?php.net" title="pair Networks">pair Networks</a></li>
        <li><a target="_blank" href="http://www.servercentral.net/" title="Server Central">Server Central</a></li>
        <li><a target="_blank" href="http://www.hostedsolutions.com/" title="Hosted Solutions">Hosted Solutions</a></li>
        <li><a target="_blank" href="http://www.spry.com/" title="Spry VPS Hosting">Spry VPS Hosting</a></li>
        <li><a target="_blank" href="http://ez.no/" title="eZ Systems">eZ Systems</a> / <a href="http://www.hit.no/">HiT</a></li>
        <li><a target="_blank" href="http://www.osuosl.org" title="OSU Open Source Lab">OSU Open Source Lab</a></li>
        <li><a target="_blank" href="http://www.yahoo.com/" title="Yahoo! Inc.">Yahoo! Inc.</a></li>
        <li><a target="_blank" href="http://www.binarysec.com/" title="BinarySEC">BinarySEC</a></li>
        <li><a target="_blank" href="http://www.nexcess.net/" title="NEXCESS.NET">NEXCESS.NET</a></li>
        <li><a target="_blank" href="http://www.rackspace.com/" title="Rackspace">Rackspace</a></li>
        <li><a target="_blank" href="http://www.eukhost.com/" title="EUKhost">EUKhost</a></li>
        <li><a target="_blank" href="http://www.micfo.com/" title="micfo">micfo</a></li>
        <li><a target="_blank" href="http://www.sohosted.nl/webhosting/" title="Sohosted">Sohosted</a></li>
        <li><a target="_blank" href="http://www.redpill-linpro.com" title="Redpill Linpro">Redpill Linpro</a></li>
        <li><a target="_blank" href="http://www.facebook.com" title="Facebook">Facebook</a></li>
        <li><a target="_blank" href="http://krystal.co.uk" title="Krystal.co.uk">Krystal.co.uk</a></li>
        <li><a target="_blank" href="http://servergrove.com/" title="ServerGrove">ServerGrove</a></li>
    </ul>

</div>
