<html><head><title>PHP3 Patches</title>
<? $title="Patches";
   include "include/header.inc"; ?>


<p><strong>In order to apply any of these patches, you must:</strong>

<ol>
<li>Have the 'patch' utility
<li>cd to the PHP base directory
<li>Run:  '<b><code>patch -p0 < patchname.fix</code></b>'
</ol>


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
