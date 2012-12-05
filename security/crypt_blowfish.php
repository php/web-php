<?php
// $Id: index.php 230994 2007-03-01 17:10:22Z bjori $
$_SERVER['BASE_PAGE'] = 'security/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("CRYPT_BLOWFISH security fix details");
?>

<h1>CRYPT_BLOWFISH security fix details</h1>
<p>
The change as implemented in PHP 5.3.7+ favors security and correctness over
backwards compatibility, but it also lets users (admins of PHP app installs)
use the new $2x$ prefix on existing hashes to preserve backwards compatibility
for those and incur the associated security risk until all such passwords are
changed (using $2a$ or $2y$ for newly changed passwords).
</p>

<p>
In versions of PHP older than 5.3.7, $2a$ inadvertently resulted in
system-specific behavior for passwords with non-ASCII characters in them.  On
some installs (mostly on PowerPC and ARM, as well as sometimes on *BSD's and
Solaris regardless of CPU architecture), they were processed correctly.  On
most installs (most Linux, many others), they were processed incorrectly most
of the time (but not always), and moreover in a way where security was
weakened.
</p>

<p>
In PHP 5.3.7, $2a$ results in almost the correct behavior, but with an
additional countermeasure against security-weakened old hashes mentioned above.
$2x$ results in the buggy behavior, so if old hashes are known to be of the
buggy type, this may be used on them to keep them working, accepting the
associated security risk.
</p>

<p>
$2y$ results in perfectly correct behavior (without the countermeasure), so it
may be used (if desired) when hashing newly set passwords.  For practical
purposes, it does not really matter if you use $2a$ or $2y$ for newly set
passwords, as the countermeasure is only triggered on some obscure passwords
(not even valid UTF-8) that are unlikely to be seen outside of a deliberate
attack (trying to match hashes produced by buggy pre-5.3.7 code).
</p>

<p>
Summary: for passwords without characters with the 8th bit set, there's no
issue, all three prefixes work exactly the same.  For occasional passwords with
characters with the 8th bit set, if the app prefers security and correctness
over backwards compatibility, no action is needed - just upgrade to new PHP and
use its new behavior (with $2a$).  However, if an app install admin truly
prefers backwards compatibility over security, and the problem is seen on the
specific install (which is not always the case because not all platforms/builds
were affected), then $2a$ in existing hashes in the database may be changed to
$2x$.  Alternatively, a similar thing may be achieved by changing $2a$ to $2x$
in PHP app code after database queries, and using $2y$ on newly set passwords
(such that the app's automatic change to $2x$ on queries is not triggered for
them).
</p>

<p>
See also the <a href="http://www.openwall.com/lists/announce/2011/06/21/1">openwall
announcement</a> for more information.
</p>


<?php
site_footer();

