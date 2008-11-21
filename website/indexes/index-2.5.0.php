<?php

/**
 * Defines versions that can be downloaded from the welcome page (put a 
 * comment on the line to disable), the nick of the last dev. who modified this
 * script and the name of the current script
 */
define('REL_NEW_NUM', '2.5.0');
define('REL_NEW_DATE', '2003-05-11');

define('REL_PREVIOUS_NUM', '2.4.0');
define('REL_PREVIOUS_DATE', '2003-02-23');

define('CVS_VERSION', '2.5.1-dev');

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
          //if ($count == 3) { $new_count = 36518; }
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
          // adjust the bigcounter, based on the sf page
      //$new_count = 1983081;
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

<table cellpadding="5">
<tr>
    <!-- Left cell with downloads -->
    <td valign="top">
        Welcome to the <i>only</i> official phpMyAdmin project webpage.
        Bugfixes, patches, translations, suggestions and comments are welcome!
        Please use the mailing lists and the forums!
        <br /><br />
        <font size="-1">Many thanks to <a href="http://www.sf.net">SourceForge</a> for
        the <a href="http://sourceforge.net/potm/potm-2002-12.php">"Project of the Month"</a>
        award in December 2002: look at the article
        to learn more about phpMyAdmin's history.</font>
        <br /><br />
         <font size="-1"><b>About future versions: </b>The versions after 2.5.x
         will have those requirements: <br /> PHP &gt;=4.1.0 and MySQL &gt;=3.23.32.
         </font><br /><br />
<!--        <font size="-1">The advertisements you might see on top of this page 
        are <b>not authorized</b> by the phpMyAdmin development team, and
        you will not see them if you enter here using our official domain name,
        www.phpmyadmin.net.</font>
        <br /><br />
-->

    <!-- More than <b><?php @include("counters/bigcounter"); ?></b> downloads since August 2001! :-) -->
        <font size="-1"><i>(<?php @include("counters/daycounter_$daynr"); ?> downloads today)</i></font>
        <table>
<?php
if (defined("REL_NEW_NUM")) {
    ?>
        <tr>
            <td colspan="2">
                <b>News:<font color="red">phpMyAdmin <?php echo REL_NEW_NUM . "\n"; ?></font>
                    has been released! (<?php echo REL_NEW_DATE; ?>)</b><br />
<!--    <a href="ANNOUNCE.txt">Release Announcement</a><br /> -->
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=1">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.tar.bz2</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_1.dat"); ?>)</font> --><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=2">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.tar.gz</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_2.dat"); ?>)</font> --><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=3">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php.zip</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_3.dat"); ?>)</font> --><br />
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php files)</i>
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=4">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.tar.bz2</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_4.dat"); ?>)</font> --><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=5">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.tar.gz</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_5.dat"); ?>)</font> --><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=6">Download phpMyAdmin-<?php echo REL_NEW_NUM; ?>-php3.zip</a><!-- &nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_6.dat"); ?>)</font> --><br />
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
                <b>The previous version: phpMyAdmin <?php echo REL_PREVIOUS_NUM; ?>
                released <?php echo REL_PREVIOUS_DATE; ?></b><br />
            </td>
        </tr>
    <?php

echo "\n";
?>
        <tr>
            <td nowrap="nowrap">
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=7">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.tar.bz2</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_7.dat"); ?>)</font><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=8">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.tar.gz</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_8.dat"); ?>)</font><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=9">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php.zip</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_9.dat"); ?>)</font><br />
            </td>
            <td nowrap="nowrap">
                &nbsp;&nbsp;<i>(.php files)</i>
            </td>
        </tr>
        <tr>
            <td nowrap="nowrap">
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=10">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.tar.bz2</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_10.dat"); ?>)</font><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=11">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.tar.gz</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_11.dat"); ?>)</font><br />
                - <a href="http://www.phpmyadmin.net/<?php echo THIS_SCRIPT; ?>?dl=12">Download phpMyAdmin-<?php echo REL_PREVIOUS_NUM; ?>-php3.zip</a>&nbsp;&nbsp;<font size="-1">(<?php @include("counters/counter_12.dat"); ?>)</font><br />
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
        <b><font color="red">CVS version <?php echo CVS_VERSION; ?></font> (for
        testers: may be broken; updated every few day):</b><br />
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
        <b>Older phpMyAdmin versions can also be downloaded at the</b><br />
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

    <!-- Right cell with changes -->
    <td valign="top" bgcolor="lightyellow" width="40%">
        <b><i>About version 2.5.0</i></b>&nbsp;&nbsp;
        (<a href="ChangeLog.txt">ChangeLog</a>)
        <br /><br />

        <font color="red">&nbsp;&nbsp;MySQL 4.1 note:</font>
        <br /><br />
        phpMyAdmin 2.5.0 is not ready for MySQL 4.1.
        <br /><br />
        <font color="red">&nbsp;&nbsp;Improvements:</font>
        <ul>
        <li>distinct Query window</li>
        <li>field contents transformations (inline resized images, links, external programs, etc)</li>
        <li>display column comments in exports</li>
        <li>automatic update of relations, display fields, comments,
        bookmarks, etc after table/column changes</li>
        <li>new display mode with 90 degree rotated headers</li>
        <li>display query time</li>
        <li>js row marker now works in vertical mode</li>
        <li>SQL history: db- or not-db-based</li>
        <li>optional vertical display of the columns in edit mode</li>
        <li>optional lightweight menu tabs</li>
        <li>InnoDB status monitor</li>
        <li>print button in db view</li>
        <li>new Export page with dynamic options</li>
        <li>better security for docSQL importer</li>
        <li>in edit mode, display first the functions that match field type</li>
        <li>parameters for bookmarks queries</li>
        <li>support for changing auto-increment value</li>
        <li>default initial query in browse mode, based on a bookmark with
        the same name as the table</li>
        <li>execute bookmarks when browsing bookmarks table</li>
        <li>if available, display Create/Update/Check_time</li>
        <li>in browse mode, highlight the fields used in the WHERE
        condition for the query</li>
        <li>automatic layout of the PDF schema</li>
        <li>choose results page in browse mode</li>
        <li>automatic detection of compression for uploaded data</li>
        <li>CHECK TABLE/ANALYZE TABLE for multisubmit actions</li>
        <li>support for SHOW FULL PROCESSLIST</li>
        <li>can now insert multiple fields at cursor position
        in the query textarea</li>
        <li>can now choose all segments of a key (relations)</li>
        </ul>

        <font color="red">&nbsp;&nbsp;Fixes:</font>
        <ul>
        <li>could not insert some words like &quot;$enum$&quot;</li>
        <li>bad URL (extra /) for generated PDFs </li>
        <li>double password query with http auth</li>
        <li>check privileges only shows root user</li>
        <li>display SQL query used for an index modification</li>
        <li>pdf schema headers footers for long pages</li>
        <li>export results and LIMIT</li>
        <li>inserting values with quotes</li>
        <li>$cfg['PmaAbsoluteUri'] autodetection and CGI mode</li>
        <li>escaping of \n, \r and \t characters</li>
        <li>handling of disabled ini_get()</li>
        <li>go back to fields definition form after an error</li>
        <li>support XOR in the parser</li>
        <li>check for field type when doing charset conversion</li>
        <li>support for HTML entities as db/table/column names</li>
        <li>avoid long delays when browsing big tables (MySQL 4)</li>
        <li>support for host-based privileges</li>
        <li>bad arrow aligning on PDF schema in &quot;same widths&quot; mode</li>
        <li>faster record count</li>
        <li>&quot;undefined index&quot; error in the data dictionary when using MySQL 3.22 or below</li>
        <li>the privileges administration script did not work well with host-based DB privileges</li>
        <li>having added a new user, the corresponding SQL query was not displayed</li>
        <li>better &quot;superuser&quot; checking mechanism</li>
        <li>&quot;wrong parameter count&quot; error when connecting with some strangely compiled php versions</li>
        <li>replaced the %e placeholder in the date format string of some translations because it did not have any effect on Windows machines.</li>
        <li>unaligned column headers</li>
        <li>MONTH() and YEAR() not displayed as functions</li>
        <li>error on &quot;Skip Explain SQL&quot;</li>
        <li>bad Edit link on tables without primary key but with BLOB</li>
        <li>now we export BLOBs hex quoted</li>
        <li>better check for superuser in MySQL 4</li>
        <li>2.5.0-rc1 syntax error SHOW TABLE STATUS LIKE...</li>
        <li>highlight fields crossing db borders</li>
        <li>FULLTEXT index type not shown in drop-down</li>
        <li>disable CSV export for multiple tables</li>
        </ul>

    </td>
    <!-- Right cell with changes -->
</tr>
</table>

<hr noshade="noshade" />

<table cellpadding="5">
<tr>
    <td valign="top">
        <ul>
            <li><a href="http://www.phpmyadmin.net">phpMyAdmin homepage  (phpmyadmin.net)</a> <br /> <br /></li>
            <li><a href="http://www.phpmyadmin.net/documentation/">Documentation</a></li>
            <li><a href="http://www.phpmyadmin.net/phpMyAdmin/">Live Demo (may sometimes be broken)</a><br /><br /></li>

            <li><a href="http://sourceforge.net/projects/phpmyadmin/">phpMyAdmin project (SourceForge.net)</a>
            <ul>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=72909">User Support Forum</a></li>
                <li><a href="http://sourceforge.net/forum/forum.php?forum_id=72908">Open Discussion Forum</a></li>
                <li><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/phpmyadmin/phpMyAdmin/">Web CVS Tree</a></li>
                <li><a href="http://sourceforge.net/mail/?group_id=23067">Mailing Lists (news/users/devel/translators)</a></li>
                <li><a href="http://sourceforge.net/tracker/?group_id=23067">Trackers</a></li>
            </ul><br /></li>
        </ul>
    </td>
    <td valign="top">    
        <ul>
            <li><a href="http://www.homepage-tutorials.de/anwendungen/phpmyadmin.htm">Tutorial (in German) <br /> <br /></li>
            <li><a href="ANNOUNCE-2.3.0.txt">Release Announcement for version 2.3.0</a> (2002-08-11)</li>
            <li><a href="ANNOUNCE-2.2.0.txt">Release Announcement for version 2.2.0</a> (2001-08-30)</li>
            <li><a href="http://www.phpmyadmin.net/ChangeLogs/">old ChangeLogs</a></li>
            <li><a href="http://www.phpwizard.net/projects/phpMyAdmin/">old phpMyAdmin homepage (phpwizard.net)</a><br /><br /></li>
        </ul>
    </td>
</tr>
</table>

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
