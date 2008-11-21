<?php

/**
 * Defines versions that can be downloaded from the welcome page (put a
 * comment on the line to disable), the nick of the last dev. who modified this
 * script and the name of the current script
 */
define('REL_NEW_NUM', '2.5.4-rc1');
define('REL_NEW_DATE', '2003-09-30');

define('REL_PREVIOUS_NUM', '2.5.3');
define('REL_PREVIOUS_DATE', '2003-09-07');

//define('CVS_VERSION', '2.5.5-dev');

define('MODIF_BY', 'lem9');

define('THIS_SCRIPT', basename($_SERVER['PHP_SELF']));



$daynr = floor(time()/86400);

/**
 * A download link ref. has been passed by url...
 */
if (!empty($_GET['dl'])) {

    // 1. The user comes from the "phpmyadmin.net" domain -> do the work
    if (empty($_SERVER['HTTP_REFERER'])
        || strpos(' ' . $_SERVER['HTTP_REFERER'], 'phpmyadmin.net') > 0
        || strpos(' ' . $_SERVER['HTTP_REFERER'], 'phpmyadmin.sourceforge.net') > 0) {
        if (REL_NEW_NUM == '' && $_GET['dl'] < 7) {
            $download_lnk         = 'http://www.phpmyadmin.net/cvs/';
        }
        else {
            $download_lnk         = 'http://prdownloads.sourceforge.net/phpmyadmin/phpMyAdmin-';
            switch ($_GET['dl']) {
                case 1:
                    $download_lnk .= REL_NEW_NUM . '-php.tar.bz2';
                    break;

                case 2:
                    $download_lnk .= REL_NEW_NUM . '-php.tar.gz';
                    break;

                case 3:
                    $download_lnk .= REL_NEW_NUM . '-php.zip';
                    break;

                case 4:
                    $download_lnk .= REL_NEW_NUM . '-php3.tar.bz2';
                    break;

                case 5:
                    $download_lnk .= REL_NEW_NUM . '-php3.tar.gz';
                    break;

                case 6:
                    $download_lnk .= REL_NEW_NUM . '-php3.zip';
                    break;

                case 7:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php.tar.bz2';
                    break;

                case 8:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php.tar.gz';
                    break;

                case 9:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php.zip';
                    break;

                case 10:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php3.tar.bz2';
                    break;

                case 11:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php3.tar.gz';
                    break;

                case 12:
                    $download_lnk .= REL_PREVIOUS_NUM . '-php3.zip';
                    break;

                case 13:
                    $download_lnk = 'http://www.phpmyadmin.net/cvs/';
                    break;

                case 14:
                    $download_lnk = 'http://sourceforge.net/project/showfiles.php?group_id=23067';
                    break;
            } // end switch
        }

        header('Location: ' . $download_lnk);

    // update counter  (swix, 26jun02)

    $count = $_GET['dl'];
    $count++; $count--; // make sure it is an int.

    $counterfile = "counters/counter_$count.dat";

    if(file_exists($counterfile))
    {
      $exist_file = fopen($counterfile, "r");
      $new_count = fgets($exist_file, 255);
          // adjust a counter that got corrupted
          // or reset them for a new version
      //if ($count == 7) { $new_count = 34294; }
      //if ($count == 8) { $new_count = 5909; }
      //if ($count == 9) { $new_count = 10905; }
      //if ($count == 10) { $new_count = 114; }
      //if ($count == 11) { $new_count = 385; }
      //if ($count == 12) { $new_count = 1407; }
      $new_count++;
      fclose($exist_file);
      $exist_count = fopen($counterfile, "w");
      flock($exist_count, 2);
      fputs($exist_count, $new_count);
      flock($exist_count, 3);
      fclose($exist_count);
    }
    else
    {
    $new_file = fopen($counterfile, "w");
    flock($new_file, 2);
    fputs($new_file, "1");
    flock($new_file, 3);
    fclose($new_file);
    }


    // update bigcounter
    $counterfile = "counters/bigcounter";

    if(file_exists($counterfile))
    {
      $exist_file = fopen($counterfile, "r");
      $new_count = fgets($exist_file, 255);
          // adjust the bigcounter, based on the sf page "Statistics"
      //$new_count = 3091401;
      $new_count++;
      fclose($exist_file);
      $exist_count = fopen($counterfile, "w");
      flock($exist_count, 2);
      fputs($exist_count, $new_count);
      flock($exist_count, 3);
      fclose($exist_count);
    }
    else
    {
    $new_file = fopen($counterfile, "w");
    flock($new_file, 2);
    fputs($new_file, "1");
    flock($new_file, 3);
    fclose($new_file);
    }



    // update daycounter
    $counterfile = "counters/daycounter_$daynr";

    if(file_exists($counterfile))
    {
      $exist_file = fopen($counterfile, "r");
      $new_count = fgets($exist_file, 255);
      //$new_count = 900;
      $new_count++;
      fclose($exist_file);
      $exist_count = fopen($counterfile, "w");
      flock($exist_count, 2);
      fputs($exist_count, $new_count);
      flock($exist_count, 3);
      fclose($exist_count);
    }
    else
    {
    $new_file = fopen($counterfile, "w");
    flock($new_file, 2);
    fputs($new_file, "1");
    flock($new_file, 3);
    fclose($new_file);
    }



    } // end 1

    // 2. The user does not come from the "phpmyadmin.net" domain -> display
    //    a nice warning ;) then move to the welcome page
    else {
        include('./invalid_domain.html');
        exit();
    } // end 2

} // end download link work

/**
 * Sends the content type header
 */
header('Content-Type: text/html; charset=iso-8859-1');


/**
 * Displays welcome page
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>phpMyAdmin - Mysql DB administration tool - www.phpmyadmin.net</title>
    <meta name="description" content="Official welcome or start page of the phpMyAdmin project" />
    <meta name="keywords" content="phpMyAdmin" />
    <meta name="author" content="the phpMyAdmin developers team" />
    <meta name="reply-to" content="phpmyadmin-devel@lists.sourceforge.net" />
    <meta name="copyright" content="the phpMyAdmin developers team" />
    <meta name="revisit-after" content="15 days" />
    <meta name="identifier-url" content="http://www.phpmyadmin.net/" />
    <meta name="robots" content="index, nofollow" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style type="text/css">
    <!--
    body, td, li, ul {
        font-family: Arial, Helvetica, sans-serif;
    }
    //-->
    </style>
    <script language="JavaScript" type="text/javascript">
    <!--
    if (typeof(parent.frames) != 'undefined'
        && typeof(parent.frames.length) != 'undefined'
        && parent.frames.length > 1) {
        parent.location = 'http://www.phpmyadmin.net/invalid_domain.html';
    }
    //-->
    </script>
</head>


<body bgcolor="#ffffff" text="#000000">
<a href="http://www.phpmyadmin.net" target="_blank"><img src="./images/pma176.png" width="176" height="62" border="0" alt="phpMyAdmin" /></a>
<font size="+2">
    The <a href="http://www.phpmyadmin.net"><font color="black">phpMyAdmin</font></a> project - <i>www.phpmyadmin.net</i>
</font>

<hr noshade="noshade" />

<?php
if (!empty($_GET['about_previous'])) {
?>
        <b><i>About version 2.5.3</i></b>
        <br /><br />

        <font color="red">&nbsp;&nbsp;MySQL 4.1 Note:</font>
        <br /><br />
        phpMyAdmin's MySQL 4.1 support is still <u>experimental</u>
        <br /><br />

        <font color="red">&nbsp;&nbsp;Improvements:</font>
        <ul>
        <li>MySQL 4.1: new page about Character sets and collations</li>
        <li>better support for MySQL charsets</li>
        <li>LIKE in Select sub-page for non-text fields</li>
        <li>optional <b>icons</b> for actions</li>
        <li>better PHP code generation</li>
        <li>possibility to let phpMyAdmin continue execution of a multi-query statement even though single queries may fail</li>
        <li>possibility to display the result of each query of a multi-query statement</li>
        <li>display MySQL error code and link to relevant documentation</li>
        <li>Select page: use SELECT * when possible</li>
        <li>Can now bookmark a series of SQL queries</li>
        <li>Relational dropdown field now obey $cfg['LimitChars']</li>
        <li>Relational dropdown now displayed also by value to ease selection by typing</li>
        <li>FAQ 1.30 about Turck MMCache</li>
        <li>Do not show the &quot;Cookies required&quot; as an error</li>
        <li>New window to browse/choose foreign values when there are more than 200</li>
        <li>new languages: Azerbaijani and Bosnian</li>
        </ul>

        <font color="red">&nbsp;&nbsp;Fixes:</font>
        <ul>
        <li>Removed lowercase transformation of SQL</li>
        <li>&quot;Missing...&quot; messages were wrongly displayed</li>
        <li>armascii8 appears twice in the charset list</li>
        <li>InnoDB and multi-columns foreign key</li>
        <li>Confirmation for TRUNCATE statements</li>
        <li>InnoDB and cross-db foreign keys</li>
<!-- to confirm        <li>A user could not edit his own global privileges</li> -->
        <li>Obey fmtType when set to 'none'</li>
        <li>SELECT DISTINCT was broken (MySQL 3)</li>
        <li>User management: MySQL 3 problem with Resource limits</li>
        <li>Could not use a plus sign in ENUM or SET</li>
        <li>Wrong check for DROP DATABASE</li>
        <li>Wrong confirm dialog for &quot;Create PHP Code&quot;</li>
        <li>Avoid a MySQL replication problem</li>
        <li>ENUM field with one value could not be set to NULL</li>
        <li>Export: column header were missing (Excel format)</li>
        <li>Export: problem with LaTeX and relations</li>
        <li>ENUM fields with brackets were truncated</li>
        <li>Wrong &quot;Showing rows...&quot; message when user has put a LIMIT</li>
        <li>IIS and HTTP auth did not work when register_globals=Off</li>
        <li>Export: better handling of special characters</li>
        <li>Export: CSV: some lines could be trimmed</li>
        <li>Bad display of PHP code</li>
        <li>Export: allow XML to be also default export</li>
         
        </ul>
<?php
} elseif (!empty($_GET['about_new'])) {
?>
        <b><i>About version 2.5.4</i></b>
        <br /><br />

        <font color="red">&nbsp;&nbsp;MySQL 4.1 Note:</font>
        <br /><br />
        phpMyAdmin's MySQL 4.1 support is still <u>experimental</u>
        <br /><br />

        <font color="red">&nbsp;&nbsp;Improvements:</font>
        <ul>
        <li>InnoDB support in Relation view</li>
        <li>Login to arbitrary server</li>
        <li>Sort results by index</li>
        <li>Bookmarks for all users (public bookmarks)</li>
        <li>&quot;Select&quot; page becomes &quot;Search&quot;</li>
        <li>Compression of large Exports</li>
        <li>Execute uploaded gzip/bzip'd SQL-files</li>
        <li>Query window: new Edit button</li>
        <li>Add Bookmark option to query window/tab</li>
        <li>multi-row delete in browse mode</li>
        <li>Icons links for index management</li>
        <li>docSQL support must be explicitely enabled</li>
        <li>new languages: Persian, Bosnian</li>
        </ul>

        <font color="red">&nbsp;&nbsp;Fixes:</font>
        <ul>
        <li>no LOCK TABLES in db-specific privileges</li>
        <li>BINARY as an operator</li>
        <li>negative LIMIT</li>
        <li>out of memory on extended inserts</li>
        <li>separately export constraints, to avoid trouble on import</li>
        <li>left frame was not refreshed when selecting a db from the super-user interface of databases</li>
        <li>extra AND was generated on older PHP versions</li>
        <li>could not delete a user that did not have WITH GRANT OPTION</li>
        <li>PDF schema: when not selected, &quot;Show color&quot; now avoids all color on output</li>
        <li>font size and Safari</li>
        <li>export of partial results and aliases: table name was wrong</li>
        <li>password was not kept when modifying user</li>
        <li>row markers and Opera 7.20</li>
         
        </ul>
<?php
} else {

?>

<table cellpadding="5">
<tr>
    <!-- Left cell with downloads -->
    <td valign="top">
        Welcome to the official phpMyAdmin project webpage.<br />
        phpMyAdmin is a <b>web-based utility to manage MySQL databases</b>,<br />
        and is available in <a href="http://www.phpmyadmin.net/documentation/translators.html" target="_blank">46 languages.</a> 
        <br /><br />
<!--        <font size="-1">Security alert dated 2003-06-18: The latest update
        of our reply to this alert is <a href="http://www.phpmyadmin.net/documentation/#faqsecurity" target="_blank">available.</a></font>
        <br /><br /> -->
        <font size="-1">Many thanks to <a href="http://www.sf.net">SourceForge</a> for
        the <a href="http://sourceforge.net/potm/potm-2002-12.php">"Project of the Month"</a>
        award in December 2002: look at the article
        to learn more about phpMyAdmin's history.</font>
        <br /> <br />
        <font size="-1"><a href="http://sourceforge.net/project/stats/index.php?report=months&amp;group_id=23067" target="_blank">Project statistics</a>
        &nbsp;<a href="ChangeLog.txt">Current ChangeLog</a> </font>
        <br /><br />
<!--         <font size="-1"><b>About future versions: </b>The versions after 2.5.x
         will have those requirements: <br /> PHP &gt;=4.1.0 and MySQL &gt;=3.23.32.
         </font><br /><br /> -->
<!--        <font size="-1">The advertisements you might see on top of this page
        are <b>not authorized</b> by the phpMyAdmin development team, and
        you will not see them if you enter here using our official domain name,
        www.phpmyadmin.net.</font>
        <br /><br />
-->

        <b>Downloads section</b> <font size="-1"><i>(<?php @include("counters/daycounter_$daynr"); ?> downloads today <!-- , <?php @include("counters/bigcounter"); ?> since August 2001 -->)</i> <br />
(Choose one file from the .php group, or from the .php3 group if you are
using PHP3)</font><br />
        <table>
<?php
if (defined("REL_NEW_NUM")) {
    ?>
        <tr>
            <td colspan="2">
                <b><font color="red">phpMyAdmin <?php echo REL_NEW_NUM . "\n"; ?></font>
                    (<?php echo REL_NEW_DATE; ?>)</b> <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?about_new=true">Release notes</a><br />
                   This is the first release candidate. <b>Warning: there is an Export problem in 2.5.4-rc1, it will be fixed in -rc2.</b>
<!--    <a href="ANNOUNCE.txt">Release Announcement</a><br /> -->
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                <table>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=1">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.tar.bz2</a>
                  </td>
                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_1.dat"); ?>)</font> 
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=2">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.tar.gz</a>
                  </td>
                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_2.dat"); ?>)</font>
                  </td>
                 </tr>
                 <tr>
                  <td>
                    - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=3">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.zip</a>
                  </td>
                  <td align="right">
                    <font size="-1">(<?php @include("counters/counter_3.dat"); ?>)</font>
                  </td>
                 </tr>
                </table>
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php files)</i>
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                <table>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=4">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.tar.bz2</a>
                  </td>
                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_4.dat"); ?>)</font>
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=5">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.tar.gz</a>
                  </td>
                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_5.dat"); ?>)</font>
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=6">phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.zip</a>
                  </td>
                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_6.dat"); ?>)</font>
                  </td>
                 </tr>
                 </table>
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php3 files)</i>
            </td>
        </tr>

        <tr><td>&nbsp;<br /></td></tr>

    <?php
}

else {
    echo "\n";
}
if (defined("REL_PREVIOUS_NUM")) {
    ?>
        <tr>
            <td colspan="2">
                <b><font color="red">Previous version: <?php echo REL_PREVIOUS_NUM; ?></font>
                    (<?php echo REL_PREVIOUS_DATE; ?>)</b> <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?about_previous=true">Release notes</a><br />
                The latest stable version.
            </td>
        </tr>
    <?php

echo "\n";
?>
        <tr>
            <td nowrap="nowrap">
                <table>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=7">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.tar.bz2</a> &nbsp;&nbsp;
                  </td>
                  <td align="right">
<!--                   <font size="-1">(<?php @include("counters/counter_7.dat"); ?>)</font> -->
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=8">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.tar.gz</a> &nbsp;&nbsp;
                  </td>
<!--                  <td align="right">
                   <font size="-1">(<?php @include("counters/counter_8.dat"); ?>)</font> -->
                  </td>
                 </tr>
                 <tr>
                  <td>
                    - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=9">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.zip</a> &nbsp;&nbsp;
                  </td>
                  <td align="right">
<!--                    <font size="-1">(<?php @include("counters/counter_9.dat"); ?>)</font> -->
                  </td>
                 </tr>
                </table>
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php files)</i>
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                <table>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=10">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.tar.bz2</a> &nbsp;&nbsp;
                  </td>
                  <td align="right">
<!--                   <font size="-1">(<?php @include("counters/counter_10.dat"); ?>)</font> -->
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=11">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.tar.gz</a> &nbsp;&nbsp;
                  </td>
                  <td align="right">
<!--                   <font size="-1">(<?php @include("counters/counter_11.dat"); ?>)</font> -->
                  </td>
                 </tr>
                 <tr>
                  <td>
                   - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=12">phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.zip</a> &nbsp;&nbsp;
                  </td>
                  <td align="right">
<!--                   <font size="-1">(<?php @include("counters/counter_12.dat"); ?>)</font> -->
                  </td>
                 </tr>
                 </table>
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php3 files)</i>
            </td>
        </tr>

        <tr><td>&nbsp;<br /></td></tr>

    <?php
}

if (defined("CVS_VERSION")) {
    ?>
    <tr>
      <td>
        <b><font color="red">CVS snapshot <?php echo CVS_VERSION; ?></font> (for
        testers: may be broken; updated every few days):</b><br />
        - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=13">
          <?php echo gmdate('F j Y, h:i:s A', filemtime('./cvs')); ?> (GMT)</a> snapshot
      <font size="-1">(<?php @include("counters/counter_13.dat"); ?>)</font>
        <br /><br />
      </td>
     </tr>
    <?php
    echo "\n";
}
?>

    <tr>
       <td>
        <b>Older phpMyAdmin versions:</b><br />
        - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=14">
        File Download page on Sourceforge</a>
        <br />
       </td>
     </tr>
    </table>
    </td>

    <!-- End left cell with downloads -->

    <td valign="top">
        &nbsp;&nbsp;&nbsp;&nbsp;
    </td>

    <!-- Right cell with links -->
    <td valign="top" bgcolor="lightyellow" width="40%">

<a name="links"></a>
        <ul>
<!--            <li><a href="http://www.phpmyadmin.net">phpMyAdmin homepage  (phpmyadmin.net)</a> <br /> <br /></li> -->
            <li><b><a href="http://www.phpmyadmin.net/documentation/">Main documentation</a></b></li>
            <li><a href="http://www.phpmyadmin.net/phpMyAdmin/">Live Demo (may sometimes be broken)</a><br /><br /></li>

            <li><a href="http://sourceforge.net/projects/phpmyadmin/">phpMyAdmin project (SourceForge.net)</a>
            <ul>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=72909">Help Forum</a></li>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=72908">Open Discussion Forum</a></li>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=296543">Forum d'aide (en français)</a></li>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=297172">Anwenderforum (auf Deutsch)</a></li>
                <li><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/phpmyadmin/phpMyAdmin/">Web CVS Tree</a></li>
                <li><a href="http://sourceforge.net/mail/?group_id=23067">Mailing Lists (news/users/devel/translators)</a></li>
                <li><a href="http://sourceforge.net/tracker/?group_id=23067">All trackers</a></li>
            </ul><br /></li>
        </ul>
        <ul>
            <li>Tutorials <i>(Hint: we need more)</i>
                <ul>
                    <li><a href="http://www.homepage-tutorials.com/modules.php?name=Content&amp;pa=showpage&amp;pid=1">(auf Deutsch)</a> <br /> </li>
                    <li>(en français)<a href="http://linuxeduquebec.org/rubrique.php3?id_rubrique=29">Tutoriels de LinuxÉdu-Québec</a></li>
                    <li><a href="http://www.mysql.com/articles/mysql_intro.html">Getting Started with MySQL</a></li>
                    <li><a href="http://www.garvinhicking.de/tops/texte/mimetutorial">Having fun with phpMyAdmin's MIME-transformations &amp; PDF-features</a></li>
                    <li><a href="http://hotwired.lycos.com/webmonkey/programming/php/tutorials/tutorial4.html">PHP/MySQL Tutorial</a></li>
                </ul>
                <br />
            </li>
            <li>Localized documentation
                <ul>
                    <li><a href="http://phpmyadmin.net/pma_localized_docs/Documentation-pl-2.5.2-pl1-1.html">Polish</a> <br /> </li>
                </ul>
                <br />
            </li>
            <li><a href="http://www.phpmyadmin.net/old-stuff/">old ChangeLogs and release announcements</a></li>
<!--            <li><a href="http://www.phpwizard.net/projects/phpMyAdmin/">old phpMyAdmin homepage (phpwizard.net)</a><br /><br /></li> -->
        </ul>
    </td>
    <!-- Right cell with links -->
</tr>
</table>

<?php

}

?>
<hr noshade="noshade" />


<div align="right">
    <font size="-1">
    &copy; phpMyAdmin devel team -
    Last Change: <?php echo date('Y-m-d', filemtime(__FILE__)); ?> by <?php echo MODIF_BY; ?> -
    <img src="http://www.8304.ch/cgi-bin/Count.cgi?df=mysql&amp;dd=E&amp;ft=0" alt="" /> visitors since April 2001 -
    Now: <i><?php echo gmdate('Y-m-d H:i', time()); ?></i>
    <br /><br />
    <!-- 180 285 on 2.2.0 release -->
    <!-- 566 612 on 2.2.4 release / 2002-01-07-->
    </font>
</div>

<table width="100%">
<tr>
    <td>
        <a href="http://sourceforge.net">
            <img src="http://sourceforge.net/sflogo.php?group_id=23067" width="88" height="31" border="1" alt="SourceForge Logo" /></a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="http://www.mysql.com">
            <img src="./images/mysql.png" border="1" width="88" height="31" alt="Mysql Logo" /></a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="http://www.php.net">
            <img src="images/php.gif" border="1" width="88" height="31" alt="PHP Logo" /></a>
    </td>
    <td>
        <form action="http://osdir.com/modules.php?op=modload&amp;name=Downloads&amp;file=index&amp;ttitle=phpMyAdmin" method="post">
            <input type="hidden" name="lid" value="30" />
            <input type="hidden" name="req" value="ratedownload" />
            <input type="submit" value="Rate this App @ OSDir.com!" />
        </form>
    </td>
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td align="right">
        <a href="http://validator.w3.org/check/referer" target="w3c">
            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0!" border="1" height="31" width="88" /></a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="http://jigsaw.w3.org/css-validator/" target="w3c">
             <img src="http://www.w3.org/Icons/valid-css" alt="Valid CSS!" border="1" width="88" height="31" /></a>
    </td>
</tr>
</table>
</body>

</html>
