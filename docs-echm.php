<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'docs-echm.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA='
<h3>Download</h3>
<p>
 The <a href="/get/php_manual_chm_12.zip/from/a/mirror">latest (12th) build of
 the Extended CHM Format</a> of the PHP Manual fixes the known bugs from the
 previous build, introduces the brilliant new phpZ skin (see screenshots)
 and contains up to date content (released on the 6th September 2003).
</p>

<h3>Screenshots</h3>
<div class="center">
 <a href="/images/echm/shot1.png"><img src="/images/echm/shot1_mini.png" alt="PHP documentation displayed with \'low\' skin" title="PHP documentation displayed with \'low\' skin" /></a>
 <a href="/images/echm/shot3.png"><img src="/images/echm/shot3_mini.png" alt="PHP documentation displayed with \'headernostalgia\' skin" title="PHP documentation displayed with \'headernostalgia\' skin" /></a>
 <a href="/images/echm/shot2.png"><img src="/images/echm/shot2_mini.png" alt="PHP documentation displayed with \'phpz\' skin" title="PHP documentation displayed with \'phpz\' skin" /></a>
 <a href="/images/echm/prefs.png"><img src="/images/echm/prefs_mini.png" alt="Setting preferences" title="Setting preferences" /></a>
</div>
';

site_header("Documentation - Extended CHM Format");
?>

<h1>Documentation - Extended CHM Format</h1>

<a name="intro"></a>
<h2>Introduction</h2>

<p>
 PHP usage increases from one month to the other, and this includes the
 expansion of PHP on Windows. Since many users would like to have an easily
 accessible and fast help resource to assist their daily work, we decided to
 create an extended CHM version of the manual, which includes many additional
 features, compared to the <a href="/download-docs.php">regular CHMs</a>.
</p>

<p>
 The development of this edition is still in progress, thus currently only
 an English version is available. Sometime we hope we can make all the
 languages available with the feature set provided in this extended CHM.
 The <a href="mailto:php-doc-chm@lists.php.net">php-doc-chm</a> dedicated
 mailing list exists for discussion related to this edition of the manual.
 You can find subscription options as well as the archives on our
 <a href="/mailing-lists.php">mailing lists page</a>.
</p>

<a name="features"></a>
<h2>Features</h2>

 <h3>Features provided by HTML Help</h3>
 <ul>
  <li>Full tree like TOC menu of pages, with even the smallest parts included</li>
  <li>Alpabetical index of all pages [with quick access to functions]</li>
  <li>Full text search (see the chapter about FTS in the CHM)</li>
  <li>Personal favourites listing</li>
  <li>Window position and size remembered</li>
 </ul>

 <h3>Features in PHP Manual CHM Edition (current build)</h3>
 <ul>
  <li>Two clean and clear designs</li>
  <li>Extension mechanism to apply your own CSS or your own graphical design</li>
  <li>Manual notes included as separate file (see the chapter about full text search in the CHM)</li>
  <li>External windows application to manage preferences</li>
  <li>Online functions, bug reporting on manual pages</li>
  <li>Support for right click menu overrides, custom right click menus</li>
  <li>Color coded examples, with all function names as links, example copy to clipboard</li>
  <li>'Path to this page' displayed for all the pages</li>
  <li>External links open in new window, and marked with '&raquo;'</li>
  <li>General gray table look and feel for misc. tables</li>
  <li><a href="#ides">Integration with popular IDEs</a></li>
 </ul>

 <h3>Planned features for the next builds</h3>
 <ul>
  <li>Online skin repository with ready made skins for the CHM Edition</li>
  <li>Special marking of see also links</li>
  <li>Support for all manual langauges (currently only English is available)</li>
 </ul>

<a name="knownbugs"></a>
<h2>Known bugs and limitations</h2>

<p>
 Though there are CHM viewers for non-Windows platforms, we use
 JScript objects in the CHM, so this edition will probably not work
 for those trying to view the contents in alternate viewers.
</p>

<p>
 The frontpage still has that &amp;nbsp; in the footer.
</p>

<p>
  If you have problems running the preferences application, getting
  an "A required .DLL file, MSVCP60.DLL, was not found." error
  <a href="http://www.google.com/search?q=cache:IjPT5nzzj68C:216.136.1.66/2002Graphics/Graphics/MSVCP60%2520error.doc">this
  page will help you</a>. This is not something to fix in our package.
</p>

<a name="ides"></a>
<h2>IDE integration</h2>

<p>
 As the CHM versions of the PHP manual are used on more and more
 development machines, IDE authors also began to add support
 for the CHMs in their IDEs. Here are some IDEs that support the
 integration of this CHM at different levels. If you know of any
 more IDEs that should be listed here, please write to the
 <a href="#intro">mailing list mentioned above</a>. If you
 are an IDE author, and would like to get more technical info on
 HTML Help, read the integration section in the CHM.
</p>

<ul>
 <li>
  <strong><a href="http://www.code-genie.com">Code-Genie</a>:</strong> Copy the
  help file to the helps subdirectory of Code-Genie. Alternatively,
  you can create a shortcut to the help file (a file with .lnk extension) and
  place this link file to the helps subdir of Code-Genie. The shortcut will
  be resolved at run time.
 </li>

 <li>
  <p>
   <strong><a href="http://www.context.cx/">ConTEXT</a>:</strong> Open the
   "Options" menu and select "Environment Options". Open the "Miscellaneous"
   tab, select the desired language in the list and click the "Edit" button.
   Browse to the help file you want to associate with that language.
   When you're done, click "OK".
  </p>
  <p>
   To use context sensitive help within ConTEXT, go to Options -&gt; Environment
   Options, and select the Execute Keys tab. Click Add, and type "php, php3,
   phtml" in the box that pops up. Now, select F9 in the list and put "HH"
   under Execute, the directory of the help file in Start In, and
   "mk:@MSITStore:php_manual_en.chm::/_function.html#%w" for Parameters.
   Window should be Normal, Hint "PHP Function Reference", and Save
   "Nothing". Keep both Use short DOS names and Capture console output
   unchecked. To use it, simply hit F9 with the cursor over the function you
   want help on.
  </p>
 </li>

 <li>
  <strong><a href="http://www.crimsoneditor.com">CrimsonEditor</a>:</strong> The
  <a href="http://www.crimsoneditor.com/english/howto.html#howto01">author
  of the editor describes</a> how to ingerate HLP and CHM files with
  keyword indexes into the IDE. This method works quite well, with
  our CHMs.
 </li>

 <li>
  <strong><a href="http://www.macromedia.com/software/dreamweaver/">Dreamweaver MX</a>:</strong>
  Users of this product can download an extension on
  <a href="http://www.tecnorama.org/document.php?id_doc=49">this Spanish page</a>.
  If one would like to know what the text reads in English, 
  <a href="http://world.altavista.com/tr?lp=es_en&url=http://www.tecnorama.org/document.php?id_doc=49">Babel
  Fish is there to help</a>.
 </li>

 <li>
  <strong><a href="http://www.editplus.com">EditPlus</a></strong>: You can add the
  CHM as a custom tool in the "Tools" &raquo; "Configure User Tools..." &raquo;
  "Add Tool" menu. There you can assign a shortcut key combination to
  this tool, and so you can access the help anytime with that.
 </li>

 <li>
  <strong><a href="http://www.macromedia.com/software/homesite/">HomeSite</a></strong>:
  Since .chm help files are basically executables in HomeSite, you 
  integrate Compiled HTML Help sets by adding them as a custom toolbar 
  button. Install the help set wherever you like, then created a 
  toolbar button set to "Launch an external application" with the 
  filename pointing to the main .chm file.
 </li>
 
 <li>
  <strong><a href="http://jedit.org/">jEdit</a></strong>:
  Users of this editor can grab and adjust this BeanShell macro. Save it
  as <code>[jEdit Settings Folder]/macros/PHP/Open_in_PHP_Manual.bsh</code>. You can also
  assign a hotkey and/or a context menu option to it.
  <pre>CHM_location = "C:\\PHP\\php_manual_en.chm";

if (textArea.getSelection().length > 0) {
  CHM_location += "::/_function.html#" + textArea.getSelectedText();
}
exec("HH " + CHM_location);
</pre>
 </list>

 <li>
  <strong><a href="http://www.pfersdorff.de/">Mr. Ed</a></strong>:
  Choose the menuitem "Dateiklassenabh�gige Einstellungen" (Filetype
  Specific Options) in the menu "Optionen" (Options) and choose the
  PHP language. This is chosen by default, if you edit a PHP file.
  Next click "Bearbeiten" (Edit) and in the upcoming dialog box choose
  the tabulator "Externe Hilfe" (External Help). There you can define
  external help files (.HLP, .CHM)
 </li>

 <li>
  <strong><a href="http://www.multiedit.com/">Multi-Edit</a></strong>:
  Provide the path and file name of the CHM in the "Help file location"
  setting in the Extension setup for any desired PHP extension.
 </li>

 <li>
  <strong><a href="http://www.phpedit.net">PHPEdit</a>:</strong> The Help
  Integration module of PHPEdit enables users to integrate many
  formats of help into the IDE, and browse them in a common tree.
  You can find more information about this in the
  <a href="http://help.phpedit.net/">current documentation</a>.
 </li>

 <li>
  <strong><a href="http://www.lancs.ac.uk/people/cpaap/pfe/">Programmers'
  File Editor (PFE)</a>:</strong> Open the "Options" menu and select "Preferences".
  Select "User Help Files" in the "Category" box. Click the "New" button,
  type in a label for the new help file into the "Help menu text:" box and
  the path to the file in the second box, "Associated help file:". There is
  a small browse button on the right, you can use it to find the file you
  want to use. When you're done, click "OK".
 </li>

 <li>
  <strong><a href="http://www.scintilla.org/SciTE.html">SciTE</a>:</strong>
  Place this in Scite config file:
   <pre>command.help.$(file.patterns.php)=$(CurrentWord)!$(SciteDefaultHome)\help\php\php_manual_en.chm
command.help.subsystem.$(file.patterns.php)=4</pre>
  In this case the CHM Edition of the PHP Manual is placed in
  <tt>C:\Program Files\SciTE\help\php</tt>.
 </li>

 <li>
  <strong><a href="http://www.textpad.com/">TextPad</a>:</strong>
  You can install the CHM via Configure &raquo; Preferences &raquo; Tool
  &raquo; Add &raquo; Online Help File.
 </li>

 <li>
  <p>
   <strong><a href="http://www.ultraedit.com">UltraEdit</a>:</strong> You can
   add any custom help file (like the PHP CHM) with the "Help" &raquo; 
   "Add Help Files" menu item. You can also add the Help Preferences
   application via the "Tools" &raquo; "Advanced" &raquo; "Tools Configuration"
   menu item.
  </p>
  <p>
   To add the CHM as a context sensitive help provider, go to
   "Tools" &raquo; "Advanced" &raquo; "Tools Configuration". In the Command
   Line box, add "HH mk:@MSITStore:php_manual_en.chm::/_function.html#%sel%",
   set the Working Directory to the CHM's directory and provide any name
   for it. Check the Windows Program checkbox, uncheck Save Active File,
   and click Insert. To use it, mark any function in UltraEdit and press
   CTRL+SHIFT+O.
  </p>
 </li>

 <li>
  <strong><a href="http://www.winsyntax.com">Arisesoft Winsyntax</a>:</strong>
  Simple step-by-step instructions are included in the editor.
  Choose Help &raquo; Install PHP Help in the menu.
 </li>

 <li>
  <p>
   <strong><a href="http://www.zeusedit.com/">Zeus for Windows Programmers Editor</a>:</strong>
   In the "Options" &raquo; "Document Types" menu select "PHP Document Type" and hit the
   "Edit" button. Choose the "Quick Help" section, locate the <tt>php_manual_en.chm</tt>
   file and add it to the document type. Finally apply the changes.
  </p>
  <p>
   To test the integration open a PHP file, place the cursor on a PHP
   keyword (ie php_stream_eof etc) and use the Help &raquo; Quick Help menu
   to display the quick help.
  </p>
 </li>
</ul>

<?php site_footer(); ?>
