<html><head><title>PHP3 Configuration</title>
<? $title="PHP 3.0 Configuration Generator";
   include "include/header.inc";

mysql_pconnect($dbhost,$dbuser,$dbpwd);
mysql_select_db($dbname);

cfunction print_checkbox($name)
{
	global $bools;
	
	?><input type="checkbox" name="<? echo $name ?>" value="1" onClick="generate_config()"<?
	if (isset($bools[$name]) && $bools[$name]) {
		echo " checked>";
	} else {
		echo ">";
	}
}

cfunction print_textbox($name,$default_value)
{	
	global $strs;
	
	$value = (isset($strs[$name]) ? $strs[$name] : $default_value);
	?><input type="text" name="<? echo $name ?>" value="<? echo $value ?>" onChange="generate_config()" onKeyUp="generate_config()" size="30"><?
}

?>
	
<script language="javascript">
<!--
function generate_config()
{
	cfg_line = "./configure";
	
	/* General */
	if (parent.frames[0].document.config.disable_debug.checked) {
		cfg_line += " --disable-debug";
	}
	if (parent.frames[0].document.config.safe_mode_default.checked) {
		cfg_line += " --enable-safe-mode";
	}
	if (parent.frames[0].document.config.track_vars_default.checked) {
		cfg_line += " --enable-track-vars";
	}
	if (parent.frames[0].document.config.disable_short_tags.checked) {
		cfg_line += " --disable-short-tags";
	}
	if (parent.frames[0].document.config.with_apache.checked) {
		cfg_line += " --with-apache";
		if (parent.frames[0].document.config.apache_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.apache_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_config_file.checked) {
		cfg_line += " --with-config-file";
		if (parent.frames[0].document.config.config_file_location.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.config_file_location.value;
		}
	}
	if (parent.frames[0].document.config.enable_url_includes.checked) {
		cfg_line += " --enable-url-includes";
	}
	
	
	/* SQL */
	if (parent.frames[0].document.config.with_oracle.checked) {
		cfg_line += " --with-oracle";
		if (parent.frames[0].document.config.oracle_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.oracle_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_iodbc.checked) {
		cfg_line += " --with-iodbc";
		if (parent.frames[0].document.config.iodbc_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.iodbc_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_adabas.checked) {
		cfg_line += " --with-adabas";
		if (parent.frames[0].document.config.adabas_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.adabas_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_mysql.checked) {
		cfg_line += " --with-mysql";
		if (parent.frames[0].document.config.mysql_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.mysql_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_msql.checked) {
		cfg_line += " --with-msql";
		if (parent.frames[0].document.config.msql_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.msql_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_sybase.checked) {
		cfg_line += " --with-sybase";
		if (parent.frames[0].document.config.sybase_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.sybase_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_pgsql.checked) {
		cfg_line += " --with-pgsql";
		if (parent.frames[0].document.config.pgsql_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.pgsql_directory.value;
		}
	}
	if (parent.frames[0].document.config.with_solid.checked) {
		cfg_line += " --with-solid";
		if (parent.frames[0].document.config.solid_directory.value.length>0) {
			cfg_line += "=";
			cfg_line += parent.frames[0].document.config.solid_directory.value;
		}
	}
	
	
	/* bundled packages */
	if (parent.frames[0].document.config.with_system_regex.checked) {
		cfg_line += " --with-system-regex";
	}
	if (parent.frames[0].document.config.with_dbase.checked) {
		cfg_line += " --with-dbase";
	}
	if (parent.frames[0].document.config.with_filepro.checked) {
		cfg_line += " --with-filepro";
	}
	
	
	/* incomplete features */
	if (parent.frames[0].document.config.with_debugger.checked) {
		cfg_line += " --enable-debugger";
	}
	if (parent.frames[0].document.config.with_logging.checked) {
		cfg_line += " --enable-logging";
	}
	
	parent.frames[1].document.result.config_line.value = cfg_line;
}
// -->
</script>

<form action="save_config.php3" method="post" name="config">
<table width="100%" border bgcolor="#BBBBBB">
<!-- GENERAL -->
	<tr>
		<th colspan="3" bgcolor="#FF0000">General Options</th>
	</tr>

	<tr>
		<td valign="top"><? print_checkbox("disable_debug") ?></td>
		<td valign="top">Disable debug information</td>
		<td>Don't compile in debug information (faster performance, much more difficult to track down problems)</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("safe_mode_default") ?></td>
		<td valign="top">Safe mode</td>
		<td>Enable safe mode by default (it can still be turned off using a configuration file)</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("track_vars_default") ?></td>
		<td valign="top">Track Variables</td>
		<td>
			Enable the HTTP_GET_VARS, HTTP_POST_VARS and HTTP_COOKIE_VARS arrays by default
			(can be turned on or off in the configuration file).
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("disable_short_tags") ?></td>
		<td valign="top">Disable short tags</td>
		<td>Disable support for the short &lt? tag by default.  Without this option, both &lt? and &lt?php would work by default.</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_apache") ?></td>
		<td valign="top">Apache support</td>
		<td>
			Compile as an apache module.  Specify the base directory of your apache installation:
			<? print_textbox("apache_directory","/usr/local/etc/httpd") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_config_file") ?></td>
		<td valign="top">Use Configuration File</td>
		<td>
			Parsea a configuration file on startup.
			Specify the location of of the configuration file (can be overriden with the $PHPRC environment variable):
			<? print_textbox("config_file_location","php3.ini") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("enable_url_includes") ?></td>
		<td valign="top">Enable URL Includes</td>
		<td>
			This would allow the use of http:// and ftp:// URLs inside include() statements.
		</td>
	</tr>

<!-- SQL -->
	<tr>
		<th colspan="3" bgcolor="#FF0000">SQL Options</th>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_oracle") ?></td>
		<td valign="top">Oracle Support</td>
		<td>
			Compile in Oracle support.  If you know it, specify the Oracle base directory:
			<? print_textbox("oracle_directory","") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_iodbc") ?></td>
		<td valign="top">iODBC Support</td>
		<td>
			Compile in iODBC (UNIX ODBC driver).  Specify the iODBC base directory:
			<? print_textbox("iodbc_directory","/usr/local") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_adabas") ?></td>
		<td valign="top">Adabas D Support</td>
		<td>
			Compile in Adabas D support.  Specify the Adabas D base directory:
			<? print_textbox("adabas_directory","/usr/local") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_mysql") ?></td>
		<td valign="top">MySQL Support</td>
		<td>
			Compile in MySQL support.  Specify the MySQL base directory:
			<? print_textbox("mysql_directory","/usr/local") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_msql") ?></td>
		<td valign="top">mSQL Support</td>
		<td>
			Compile in mSQL support.  Specify the mSQL base directory:
			<? print_textbox("msql_directory","/usr/local/Hughes") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_pgsql") ?></td>
		<td valign="top">PostgresSQL Support</td>
		<td>
			Compile in PostgresSQL support.  Specify the PostgresSQL base directory:
			<? print_textbox("pgsql_directory","/usr/local/pgsql") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_solid") ?></td>
		<td valign="top">Solid Support</td>
		<td>
			Compile in Solid support.  Specify the Solid base directory:
			<? print_textbox("solid_directory","/usr/local/solid") ?>
		</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_sybase") ?></td>
		<td valign="top">Sybase Support</td>
		<td>
			Compile in Sybase support (DB-Lib only).  Specify the Sybase home directory:
			<? print_textbox("sybase_directory","/home/sybase") ?>
		</td>
	</tr>

<!-- BUNDLED LIBRARIES -->
	<tr>
		<th colspan="3" bgcolor="#FF0000">Bundled Libraries</th>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_system_regex") ?></td>
		<td valign="top">Use system regex</td>
		<td>Use your own system's regular-expression library, instead of the bundled regular-expression library</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_dbase") ?></td>
		<td valign="top">dbase Support</td>
		<td>Compile in the bundled dbase library</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_filepro") ?></td>
		<td valign="top">FilePro Support</td>
		<td>Compile in the bundled filepro library</td>
	</tr>

<!-- INCOMPLETE FEATURES -->
	<tr>
		<th colspan="3" bgcolor="$FF0000">Incomplete Features</th>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_debugger") ?></td>
		<td valign="top">PHP Debugger</td>
		<td>Compile the PHP debugger.  This is in an early alpha.</td>
	</tr>
	<tr>
		<td valign="top"><? print_checkbox("with_logging") ?></td>
		<td valign="top">PHP Logging</td>
		<td>Enable PHP logging.  This feature is likely to change or disappear in the final 3.0 release.</td>
	</tr>
	
</table>
<br>

<script language="javascript">
<!--
generate_config();
// -->
</script>
<hr width="80%">
<font size=-2>All Rights Reserved &copy PHP 3.0 Development Team</font>
</body>
</html>
