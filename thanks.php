<?php
$_SERVER['BASE_PAGE'] = 'thanks.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/historical_mirrors.inc';
site_header("Thanks", ["current" => "community"]);
?>

<h1>Thanks</h1>

<ul class="thanks-list">
    <li class="thanks">
        <a href="http://www.easydns.com/?V=698570efeb62a6e2" class="thanks__logo">
            <img src="images/sponsors/easydns.png" alt="easyDNS">
        </a>
        <section>
            <strong class="thanks__heading"><a href="http://www.easydns.com/?V=698570efeb62a6e2">easyDNS</a></strong>
            <p class="thanks__description">Provides DNS services for the PHP domains.</p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.myrasecurity.com/ddos-protection/" class="thanks__logo thanks__logo--dark">
            <img src="images/sponsors/myra.png" alt="Myra Security">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.myrasecurity.com/ddos-protection/">Myra Security</a></strong>
            <p class="thanks__description">DDoS protection, along with hosting www.php.net and git.php.net for us.</p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://sinnerg.nl" class="thanks__logo thanks__logo--white">
            <img src="images/sponsors/sinnerg.jpg" alt="SinnerG">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://sinnerg.nl">SinnerG</a></strong>
            <p class="thanks__description">
                Provides servers and bandwidth for svn.php.net, gtk.php.net, people.php.net and europe.rsync.php.net.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://directi.com" class="thanks__logo thanks__logo--dark">
            <img src="images/sponsors/directi.svg" alt="Directi">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://directi.com">Directi</a></strong>
            <p class="thanks__description">
                Provides IP address to country lookup information.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://digitalocean.com" class="thanks__logo">
            <img src="images/sponsors/digitalocean.png" alt="DigitalOcean">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://digitalocean.com">DigitalOcean</a></strong>
            <p class="thanks__description">
                Provides VMs for a number of PHP services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="http://promote.pair.com/direct.pl?php.net" class="thanks__logo">
            <img src="images/sponsors/pair.png" alt="pair Networks">
        </a>
        <section>
            <strong class="thanks__heading"><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></strong>
            <p class="thanks__description">
                Provides the servers and bandwidth for PEAR, PECL and mailing list services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://rackspace.com" class="thanks__logo">
            <img src="images/sponsors/rackspace.svg" alt="Rackspace">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://rackspace.com">Rackspace</a></strong>
            <p class="thanks__description">
                Provides the server and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.servercentral.net" class="thanks__logo">
            <img src="images/sponsors/servercentral.svg" alt="Spry">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.servercentral.net">Server Central</a></strong>
            <p class="thanks__description">
                Provides a box and connection which runs various services and sites for php.net
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.spry.com" class="thanks__logo thanks__logo--white">
            <img src="images/sponsors/spry.png" alt="Spry">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.spry.com">Spry VPS Hosting</a></strong>
            <p class="thanks__description">
                Provides a server and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.osuosl.org" class="thanks__logo thanks__logo--osu">
            <img src="images/sponsors/osu.png" alt="OSU Open Source Lab">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.osuosl.org">OSU Open Source Lab</a></strong>
            <p class="thanks__description">
                Provides a server and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.nexcess.net/" class="thanks__logo">
            <img src="images/sponsors/nexcess.webp" alt="NEXCESS.NET">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.nexcess.net/">NEXCESS.NET</a></strong>
            <p class="thanks__description">
                Provides a server and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://eukhost.com/" class="thanks__logo">
            <img src="images/sponsors/eukhost.svg" alt="EUKhost">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://eukhost.com/">EUKhost</a></strong>
            <p class="thanks__description">
                Provides a server and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://duocast.nl/" class="thanks__logo thanks__logo--dark">
            <img src="images/sponsors/duocast.svg" alt="Duocast">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://duocast.nl/">Duocast</a></strong>
            <p class="thanks__description">
                Provides the servers and bandwidth used for buildbot testing and various windows based servers.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://redpill-linpro.com/" class="thanks__logo thanks__logo--redpill">
            <img src="images/sponsors/redpill.svg" alt="Redpill Linpro">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://redpill-linpro.com/">Redpill Linpro</a></strong>
            <p class="thanks__description">
                Provides managed servers and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://krystal.uk/" class="thanks__logo thanks__logo--dark">
            <img src="images/sponsors/krystal.svg" alt="Krystal.uk">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://krystal.uk/">Krystal.uk</a></strong>
            <p class="thanks__description">
                Provides a server and bandwidth for the ci.qa.php.net build and quality assurance infrastructure.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://servergrove.com/" class="thanks__logo thanks__logo--dark">
            <img src="images/sponsors/servergrove.png" alt="ServerGrove">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://servergrove.com/">ServerGrove</a></strong>
            <p class="thanks__description">
                Provides managed servers and bandwidth for various php.net services.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.bauer-kirch.de" class="thanks__logo">
            <img src="images/sponsors/bauer+kirch.png" alt="Bauer + Kirch GmbH">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.bauer-kirch.de">Bauer + Kirch GmbH</a></strong>
            <p class="thanks__description">
                Provides us with SSL certificates and a server and bandwidth for the php.net monitoring infrastructure.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.appveyor.com" class="thanks__logo">
            <img src="images/sponsors/appveyor.png" alt="AppVeyor">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.appveyor.com">AppVeyor</a></strong>
            <p class="thanks__description">
                Provides continuous integration for Windows builds of PHP.
            </p>
        </section>
    </li>

    <li class="thanks">
        <a href="https://www.travis-ci.org" class="thanks__logo">
            <img src="images/sponsors/travis.png" alt="Travis CI">
        </a>
        <section>
            <strong class="thanks__heading"><a href="https://www.travis-ci.org">Travis CI</a></strong>
            <p class="thanks__description">
                Provides continuous integration for builds of PHP.
            </p>
        </section>
    </li>
</ul>

<h1>Thanks Emeritus</h1>

<p>
    Special 'legacy' thanks go to the people and companies who have helped
    us in our past.
</p>
<ul>
    <li>
        <a href="https://yahoo.com/">Yahoo! Inc.</a> provided us with many many
        terabytes of bandwidth and hosting for www.php.net, and svn.php.net and git.php.net
        for many years.
    </li>

    <li>
        <a href="https://synacor.com">Synacor</a> provided us with many
        terabytes of bandwidth and hosting for www.php.net and others for
        many years.
    </li>

    <li>
        <a href="https://vasoftware.com">VA Software Corp.</a> helped us
        by donating a server and resources to enable us to build manuals
        and distribute our content via rsync.
    </li>
</ul>

<p>
    And special thanks to all the companies who donated server space and
    bandwidth to host our historical international array of mirror sites.
</p>

<ul>
    <?php
    $last_country = '';
    foreach ($historical_mirrors as $m) {
        ?>
        <li><?php echo $COUNTRIES[$m[0]]; ?>: <a href='<?php echo $m[3]; ?>'><?php echo $m[2]; ?></a></li>
        <?php
    }
    ?>
</ul>

<p>PHP.net is very grateful for all their support.</p>

<?php site_footer(); ?>
