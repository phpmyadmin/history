<?php
/*
    file:         includes/list_release.inc.php
    version:      1.0
    created:      2004-12-30 by mkkeck
    updated:      2004-01-04 by mkkeck
                  replaced <font color="red"> with <div class="version">
    information:  moved from relnotes.inc.php to ./includes/list_release.inc.php
*/

/**
 * Releases setup:
 *
 * type: type of release
 *  alpha   - alpha version
 *  beta    - beta version
 *  rc      - release candidate
 *  stable2  - stable 2.x version
 *  stable3  - stable 3.x version
 *
 * date: when it was released
 *
 * version: version of release
 * 
 * text: text describing release
 *
 * php3: whether php3 download links should be displayed
 *
 * active: should the release be displayed on downloads page (yes/no)
 *
 * NOTES: 
 * - always should be at least one stable release in this array 
 * - array has to be sorted by date
 */

$release = array();
$i = 0;

/* Template:

$release[$i]['type']    = '';
$release[$i]['date']    = mktime(0,0,0,,,);
$release[$i]['version'] = '';
$release[$i]['text']    = '';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['quick_kit']    = 'all-languages-utf-8-only'; 
$release[$i]['notes']   = <<<EOT
EOT;
$i++;

*/

$release[$i]['type']    = 'rc';
$release[$i]['date']    = mktime(0,0,0,11,17,2008);
$release[$i]['version'] = '3.1.0-rc1';
$release[$i]['text']    = 'Version 3.1.0 release candidate 1';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'yes';
$release[$i]['kits']    = array('all-languages','english'); 
$release[$i]['quick_kit']    = 'all-languages'; 
$release[$i]['notes']   = <<<EOT
        <div class="version">Requirements for 3.1.x:</div>
<p>PHP 5.2+, MySQL 5.0+; refer to Documentation.html for required PHP extensions</p>
	<div class="version">Improvements for 3.1.0:</div>
<pre>
+ [auth] Support for Swekey hardware authentication
+ BLOBstreaming support
+ new setup script
+ patch #2067462 [lang] link FAQ references in messages
+ [auth] cookie auth now autogenerates blowfish_secret, but it has
  some limitations and you still should set it in config file
+ [auth] cookie authentication is now the default
+ [auth] do not allow root user without password unless explicitly 
  enabled by AllowNoPasswordRoot
+ rfe #1892243 [export] more links to documentation
+ rfe #1778908 [auth] arbitrary server auth can now also accept port
+ rfe #1612724 [export] add option to export without comments
+ rfe #1276463 [search] Search empty/not empty values 
+ rfe #823652 [structure] ENUM values: field size too small 
</pre>
        <div class="version">Fixes for 3.1.0:</div>
<pre>
- bug #2046883 [core] Notices about deprecated dl() (so stop using it)
- patch #2089240 [export] handle correctly switching SQL modes
- bug #2090002 [display] Cannot edit row in VIEW 
- patch #2099962 [js] fix js error without frameset
- patch #2099972 [structure] Display None when there is no 
  default value
- patch #2122883 [PDF schema] Option to display just the keys
- [lang] Persian update
- [lang] Czech update
- patch #2255890 [lang] English-language cleanup
+ [lang] Norwegian update
+ [lang] Hungarian update
+ [lang] French update
- bug #2222344 [display] Query involving a function shown as binary 
</pre>
EOT;
$i++;

$release[$i]['type']    = 'stable3';
$release[$i]['date']    = mktime(0,0,0,10,30,2008);
$release[$i]['version'] = '3.0.1.1';
$release[$i]['text']    = 'Version 3.0.1 security fix 1';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'yes';
$release[$i]['kits']    = array('all-languages','english'); 
$release[$i]['quick_kit']    = 'all-languages'; 
$release[$i]['notes']   = <<<EOT
        <div class="version">Requirements for 3.0.x:</div>
<p>PHP 5.2+, MySQL 5.0+; refer to Documentation.html for required PHP extensions</p>
        <div class="version">Fixes for 3.0.1:</div>
<pre>
- bug #2134126 [GUI] SQL error after sorting a subset
+ [lang] Catalan update
+ [lang] Russian update
- patch #2143882 [import] Temporary uploaded file not deleted
- bug #2136986 [auth] Cannot create database after session timeout
- bug #1914066 [core] ForceSSL generates incorrectly escaped 
  redirections (this time with the correct fix)
+ [lang] Hungarian update
- bug #2153970 [core] Properly truncate SQL to avoid half 
  of html tags
+ [lang] Romanian update
- bug #2161443 [structure] Incorrect index choice shown when 
  modifying an index 
- bug #2127094 [interface] Misleading message after cancelling 
  an action 
+ [lang] Croatian update
+ [lang] Finnish update
+ [lang] Polish update
+ [lang] Japanese update
- patch #2176438 [privileges] Wrong message when changing password
- bug #2163437 [core] Cannot disable PMA tables 
- bug #2184240 [lang] Problems with Italian language file
- bug #2187193 [interface] ShowChgPassword setting not respected
- (3.0.1.1) [security] XSS in a Designer component
</pre>
EOT;
$i++;

$release[$i]['type']    = 'stable3';
$release[$i]['date']    = mktime(0,0,0,9,27,2008);
$release[$i]['version'] = '3.0.0';
$release[$i]['text']    = 'Version 3.0.0';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','english'); 
$release[$i]['quick_kit']    = 'all-languages'; 
$release[$i]['notes']   = <<<EOT
        <div class="version">Requirements for 3.0.0:</div>
<p>PHP 5.2+, MySQL 5.0+; refer to Documentation.html for required PHP extensions</p>
        <div class="version">Improvements for 3.0.0:</div>
<pre>
+ [table] support MySQL 5.1 PARTITION: CREATE TABLE / Table structure,
  partition maintenance
+ [privileges] support for EVENT and TRIGGER
+ [gui] Events
   * minimal support on db structure page
   * export
+ [engines] Maria support 
+ [engines] MyISAM and InnoDB: support ROW_FORMAT table option 
+ [engines] PBXT: table options, foreign key (relation view, designer)
+ [error handler] NEW handle errors to prevent path disclosure
   and display/collect errors
+ [mysqlnd] do not display strMysqlLibDiffersServerVersion 
  if the client is mysqlnd
+ [webapp] experimental Mozilla Prism support
+ [export] new plugin "codegen" for NHibernate
+ [export] new export to Texy! markup
+ [config] new parameter CheckConfigurationPermissions
+ [config] new parameter ShowDatabasesCommand
+ [config] new parameter CountTables
+ rfe #1775288 [transformation] proper display if IP-address 
  stored as INT
+ rfe #1758177 [core] Add the Geometry DataTypes
+ rfe #1741101, patch #1798184 UUID default for CHAR(36) PRIMARY KEY
+ rfe #1840165 [interface] Enlarge column name field in vertical mode
+ patch #1847534 [interface] New "Inside field" in db search
+ [GUI] Mootools js library (http://mootools.net) and new parameter
  InitialSlidersState
* [core] cache some MySQL stats (do not query them with every 
  page request)
+ [view] clearer dialog WITH (CASCADED | LOCAL) CHECK OPTION 
+ [pdf] Merged tcpdf 2.2.002 (PHP5 version)
+ prevent search indexes from indexing phpMyAdmin installations
+ [lang] New Bangla
+ [interface] Display options
+ rfe #1962383 [designer] Option to create a PDF page 
+ [GUI] Color picker
+ [navi] new parameter LeftDefaultTabTable
+ [display] headwords for sorted column 
+ rfe #1692928 [transformation] Option to disable browser 
  transformations 
+ [import] Speed optimization to be able to import the sakila database
+ [doc] Documentation for distributing phpMyAdmin in README.VENDOR.
</pre>
        <div class="version">Fixes for 3.0.0.x:</div>
<pre>
- bug #1910621 [display] part 2: do not display a BINARY content 
  as text
- [export] properly handle line breaks for YAML
- bug #1664240 [GUI] css height makes cfg TextareaRows useless
- bug #1724217 [Create PHP Code] doesn't include newlines for 
  text fields
- bug #1845605 [i18n] translators.html still uses iso-8859-1
- bug #1823018 [charset] Edit(Delete) img-links pointing to wrong row
- bug #1826205 [export] Problems with yaml text export
- bug #1344768 [database] create/alter table new field can not have 
  empty string as default
- patch #2007196, Typos in comments
- bug #1982315 [GUI] Comma and quote in ENUM
- bug #1970836 [parser] SQL parser is slow
- bug #2033962 [import] Cannot import zip file
- [core] Safer handling of temporary files with open_basedir 
- bug #2066923 [display] Navi browse icon does not go to page 1
- patch #2075263 [auth] Single sign-on and cookie clearing
- bug #2080963 [charset] Clarify doc and improved code
- bug [charset] Cannot sort twice on a column when the table name
  contains accents
- bug #2113848 [navi] Page number after database switching 
- patch #2115966 [GUI] Checkboxes and IE 7
- bug #114066 [core] ForceSSL generates incorrectly escaped 
  redirections
</pre>

EOT;
$i++;



$release[$i]['type']    = 'stable2';
$release[$i]['date']    = mktime(0,0,0,10,30,2008);
$release[$i]['version'] = '2.11.9.3';
$release[$i]['text']    = 'Version 2.11.9 security fix 3';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'yes';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['quick_kit']    = 'all-languages-utf-8-only'; 
$release[$i]['notes']   = <<<EOT
        <div class="version">Requirements for 2.11.x:</div>
<p>PHP 4.2+, MySQL 3.23.32+</p>
        <div class="version">Fixes for 2.11.9.x:</div>
<pre>
- bug #2031221 [auth] Links to version number on login screen 
- bug #2032707 [core] PMA does not start if ini_set() is disabled 
- bug #2004915 [bookmarks] Saved queries greater than 1000 chars 
  not displayed
- bug #2037381 [export] Export type "replace" does not work 
- bug #2037375 [export] DROP PROCEDURE needs IF EXISTS 
- bug #2045512 [export] Numbers in Excel export
+ [lang] Norwegian UTF-8 original file remerged
- bug #2074250 [parser] Undefined variable seen_from
- (2.11.9.1) [security] Code execution vulnerability
- (2.11.9.2) [security] XSS in MSIE using NUL byte
- (2.11.9.3) [security] XSS in a Designer component 
</pre>
EOT;
$i++;




$release[$i]['type']    = 'stable';
$release[$i]['date']    = mktime(0,0,0,7,28,2008);
$release[$i]['version'] = '2.11.8.1';
$release[$i]['text']    = 'Version 2.11.8.1';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['quick_kit']    = 'all-languages-utf-8-only'; 
$release[$i]['notes']   = <<<EOT
        <div class="version">Requirements for 2.11.x:</div>
<p>PHP 4.2+, MySQL 3.23.32+</p>
        <div class="version">Fixes for 2.11.8.x:</div>
<pre>
- patch #1987593 [interface] Table list pagination in navi 
- bug #1989081 [profiling] Profiling causes query to be executed again
  (really causes a problem in case of INSERT/UPDATE)
- bug #1990342 [import] SQL file import very slow on Windows
- bug [XHTML] problem with tabindex and radio fields
- bug #1971221 [interface] tabindex not set correctly 
- bug [views] VIEW name created via the GUI was not protected 
  with backquotes 
- bug #1989813 [interface] Deleting multiple views (space in name) 
- bug #1992628 [parser] SQL parser removes essential space 
- bug #1989281 [export] CSV for MS Excel incorrect escaping of 
  double quotes 
- bug #1959855 [interface] Font size option problem when no 
  config file 
- bug #1982489 [relation] Relationship view should check for changes 
- bug [history] Do not save too big queries in history 
- [security] Do not show version info on login screen 
- bug #2018595 [import] Potential data loss on import resubmit 
- patch #2020630 [export] Safari and timedate
- bug #2022182 [import, export] Import/Export fails because of 
  Mac files 
- [security] protection against cross-frame scripting and
  new directive AllowThirdPartyFraming
- [security] possible XSS during setup
- [interface] revert language changing problem introduced 
   with 2.11.7.1
- (2.11.8.1) small fix for notice about "lang"
</pre>
EOT;
$i++;


$release[$i]['type']    = 'stable';
$release[$i]['date']    = mktime(0,0,0,7,15,2008);
$release[$i]['version'] = '2.11.7.1';
$release[$i]['text']    = 'Version 2.11.7 security fix 1';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['notes']   = <<<EOT
        <div class="version">Fixes for 2.11.7.x:</div>
<pre>
- bug #1908719 [interface] New field cannot be auto-increment and 
  primary key 
- [dbi] Incorrect interpretation for some mysqli field flags 
- bug #1910621 [display] part 1: do not display a TEXT utf8_bin 
  as BLOB (fixed for mysqli extension only)
- [interface] sanitize the after_field parameter,
  thanks to Norman Hippert
- [structure] do not remove the BINARY attribute in drop-down 
- bug #1955386 [session] Overriding session.hash_bits_per_character 
- [interface] sanitize the table comments in table print view, 
  thanks to Norman Hippert
- bug #1939031 Auto_Increment selected for TimeStamp by Default
- patch #1957998 [display] No tilde for InnoDB row counter when 
  we know it for sure, thanks to Vladyslav Bakayev - dandy76 
- bug #1955572 [display] alt text causes duplicated strings
- bug #1762029 [interface] Cannot upload BLOB into existing row 
- bug #1981043 [export] HTML in exports getting corrupted,
  thanks to Jason Judge - jasonjudge
- bug #1936761 [interface] BINARY not treated as BLOB: 
  update/delete issues 
- protection against XSS when register_globals is on and .htaccess
  has no effect, thanks to Tim Starling
- bug #1996943 [export] Firefox 3 and .sql.gz (corrupted); 
  detect Gecko 1.9, thanks to Juergen Wind
- (2.11.7.1) [security] XSRF/CSRF by manipulating the db,
  convcharset and collation_connection parameters,
  thanks to YGN Ethical Hacker Group
</pre>
EOT;
$i++;



$release[$i]['type']    = 'stable';
$release[$i]['date']    = mktime(0,0,0,4,29,2008);
$release[$i]['version'] = '2.11.6';
$release[$i]['text']    = 'Version 2.11.6';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['notes']   = <<<EOT
        <div class="version">Fixes for 2.11.6.x:</div>
<pre>
- bug #1903724 [interface] Displaying of very large queries 
  in error message
- bug #1905711 [compatibility] Functions deprecated in PHP 5.3: 
  is_a() and get_magic_quotes_gpc()
- bug [lang] catalan wrong accented characters
- bug #1893034 [Export] SET NAMES for importing with command-line 
  client
+ [lang] Russian update
- bug #1910485 [core] Unsetting the whitelist during the loop
- bug #1906980 [Export] Import of VIEWs fails if temp table exists
- bug #1812763 [Copy] Table copy when server is in ANSI_QUOTES 
  sql_mode
- bug #1918531 [compatibility] Navigation isn't w3.org valid
- bug #1926357 [data] BIT defaults displayed incorrectly
- patch #1930057 [auth] colon in password prevents HTTP login 
  on CGI/IIS
- patch #1929553 [lang] Don't output BOM character in Swedish 
  language file
- patch #1895796 [lang] Typo in Japanese lang files
- bug #1935652 [auth] Access denied (show warning about mcrypt 
  on login page)
- bug #1906983 [export] Reimport of FUNCTION fails
- bug #1919808 [operations] Renaming a database fails to handle 
  functions
- bug #1934401 [core] Cannot force a language
- bug #1944077 [core] Config file containing a BOM
- bug #1947189 [scripts] Missing head tag in scripts/signon.php
+ [lang] Romanian update
</pre>
EOT;
$i++;


$release[$i]['type']    = 'stable';
$release[$i]['date']    = mktime(0,0,0,4,22,2008);
$release[$i]['version'] = '2.11.5.2';
$release[$i]['text']    = 'Version 2.11.5.2';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['notes']   = <<<EOT
        <div class="version">Fixes for 2.11.5.x:</div>
<pre>
- bug #1862661 [GUI] Warn about rename deleting database 
- bug #1866041 [interface] Incorrect sorting with AS 
- bug #1871038 [import] Notice: undefined variable first_sql_delimiter 
- bug #1873110 [export] Problem exporting with a LIMIT clause 
- bug #1871164 [GUI] Empty and navigation frame synch. 
- patch #1873188 [GUI] Making db pager work when js is disabled,
  thanks to Jürgen Wind - windkiel
- bug #1875010 [auth] MySQL server and client version mismatch 
  (mysql ext.) 
- patch #1879031 [transform] dateformat transformation 
  and UNIX timestamps, thanks to Tim Steiner - spam38
- bug [import] Do not verify a missing enclosing character for CSV,
  because files generated by Excel don't have any enclosing character
- bug #1799691 [export] "Propose table structure" and Export 
- bug #1884911 [GUI] Space usage
- bug #1863326 [GUI] Wrong error message / no edit (Suhosin) 
- bug #1887204 [GUI] Order columns in result list messing up query 
- patch #1893538 [GUI] Display issues on Opera 9.50,
  thanks to Jürgen Wind - windkiel
- bug [GUI] Do not display the database name used by the 
  previous user, thanks to Ronny Görner
- bug [security] Remove cookies from $_REQUEST for better coexistence with
  other applications, thanks to Richard Cunningham. See PMASA-2008-1.
- (2.11.5.1) bug #1909711 [security] Sensitive data in session files,
  thanks to Jim Hermann
- (2.11.5.2) PMASA-2008-3 [security] File disclosure, 
  thanks to Cezary Tomczak 
</pre>
EOT;
$i++;




$release[$i]['type']    = 'stable';
$release[$i]['date']    = mktime(0,0,0,1,12,2008);
$release[$i]['version'] = '2.11.4';
$release[$i]['text']    = 'Version 2.11.4';
$release[$i]['php3']    = 'no';
$release[$i]['active']  = 'no';
$release[$i]['kits']    = array('all-languages','all-languages-utf-8-only','english'); 
$release[$i]['notes']   = <<<EOT
        <div class="version">Fixes for 2.11.4.x:</div>
<pre>
- bug #1843428 [GUI] Space issue with DROP/DELETE/ALTER TABLE 
- bug #1807816 [search] regular expression search doesn't work with
  backslashes
- bug #1843463 [GUI] DROP PROCEDURE does not show alert 
- bug #1835904 [GUI] Back link after a SQL error forgets the query 
- bug #1835654 [core] wrong escaping when using double quotes 
- bug #1817612 [cookies] Wrong cookie path on IIS with PHP-CGI, 
  thanks to Carsten Wiedmann
- bug #1848889 [export] export trigger should use 
  DROP TRIGGER IF EXISTS
- bug #1851833 [display] Sorting forgets an explicit LIMIT
 (fix for sorting on column headers)
- bug #1764182 [cookies] Suhosin cookie encryption breaks phpMyAdmin
- bug #1798786 [import] Wrong error when a string contains semicolon
- bug #1813508 [login] Missing parameter: field after re-login 
- bug #1710144 [parser] Space after COUNT breaks Export but not Query 
- bug #1783620 [parser] Subquery results without "as" are ignored 
- bug #1821264 [display] MaxTableList and INFORMATION_SCHEMA 
- bug #1859460 [display] Operations and many databases 
- bug #1814679 [display] Database selection pagination when 
  switching servers 
- patch #1861717 [export] CSV Escape character not exported right,
  thanks to nicolasdigraf
- bug #1864468 [display] Theme does not switch to darkblue_orange 
- bug #1847409 [security] Path disclosure on 
  darkblue_orange/layout.inc.php,
  thanks to Jürgen Wind - windkiel
</pre>
EOT;
$i++;

$releases = $i;

unset($i);

?>
