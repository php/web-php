<html><head><title>PHP3 Patches</title>
<? $title="Patches";
   include "include/header.inc"; ?>

<p>In between official releases, we may release several small patches for problems
that may be annoying, but don't warrant a whole new release.  If you're familiar
with CVS, you can update to the latest code base using CVS (the CVS tree includes
all of the patches, and usually other patches or additional functionality;  it may
not be stable, though).
<p>Each new release includes <strong>all</strong> of the patches for the previous release
and more, so in case you have an older release than the latest official one, we strongly
suggest to upgrade to the latest release and not settle for applying these patches.

<p><strong>In order to apply any of these patches, you must:</strong>

<ol>
<li>Have the 'patch' utility
<li>cd to the PHP base directory
<li>Run:  '<b><code>patch -p0 < patchname.fix</code></b>'
</ol>

<h2>Patches for ALPHA 2</h2>
<table border=1>
	<tr>
		<td><a href="patches/alpha2/mysql-fields.fix">field functions fix for mSQL/MySQL</td>
		<td>This patch fixes a problem with all of the mysql_field* and msql_field* functions.</td>
	</tr>
</table>

<h2>Patches for ALPHA 1</h2>

<table border=1>
	<tr>
		<td><a href="patches/alpha1/eval.fix">eval() fix</a></td>
		<td>This patch fixes a problem when calling eval() on an empty string or uninitialized variables.</td>
	</tr>
	<tr>
		<td><a href="patches/alpha1/msql1.fix">mSQL 1.0 fix</a></td>
		<td>This patch fixes a compilation problem when compiling with mSQL 1.0 support.</td>
	</tr>
	<tr>
		<td><a href="patches/alpha1/global_array.fix">array&global fix</a></td>
		<td>This patch enables initializing a new array in the global scope using the 'GLOBAL' statement.</td>
	</tr>
	<tr>
		<td><a href="patches/alpha1/oracle.fix">Oracle fix</a></td>
		<td>This patch should fix compilation problems when compiling with Oracle support.</td>
	</tr>
</table>

<p>NOTE: See the downloads page for the latest patched win32 binary!</p>
<?include "include/footer.inc"; ?>
