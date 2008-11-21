<?php

/**
 * Defines versions that can be downloaded from the welcome page (set to
 * empty value to disable), the nick of the last dev. who modified this
 * script and the name of the current script
 */
define('REL_NEW_NUM', '2.4.0');
define('REL_NEW_DATE', '2003-02-23');

define('REL_PREVIOUS_NUM', '2.3.3pl1');
define('REL_PREVIOUS_DATE', '2002-12-04');

define('CVS_VERSION', '2.5.0-dev');

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
        <font size="-1"><b>Duplicate fields problem</b>:
        see <a href="http://phpmyadmin.net/cvs/phpMyAdmin-2.5.0-dev/Documentation.html#faq-1-29">FAQ 1.29</a> for the solution.</font>
        <br /><br />
        <font size="-1">Many thanks to <a href="http://www.sf.net">SourceForge</a> which gave us
        the <a href="http://sourceforge.net/pom_1202.php">"Project of the Month"</a>
        award in December 2002: look at the <a href="http://sourceforge.net/pom_1202.php">article</a>
        to learn more about phpMyAdmin's history.</font>
        <br /><br />
        <font size="-1">The advertisements you might see on top of this page 
        are <b>not authorized</b> by the phpMyAdmin development team, and
        you will not see them if you enter here using our official domain name,
        www.phpmyadmin.net.</font>
        <br /><br />

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
    <a href="ANNOUNCE.txt">Release Announcement</a><br />
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
        beta testers: may be broken; updated every few day):</b><br />
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
        <b>Main changes for version 2.4.0:</b>&nbsp;&nbsp;
        (<a href="ChangeLog.txt">ChangeLog</a>)
        <br /><br />

        <font color="red">&nbsp;&nbsp;Improvements:</font>
        <ul>
        <li>PDF pages
            <ul>
               <li>new data dictionary</li>
               <li>support for deleting a PDF page definition</li>
               <li>better browser support</li>
            </ul>
        </li>
        <li>cookie login: login error message</li>
        <li><b>new server/user management interface with sub-pages</b>
            <ul>
                <li>more intuitive interface</li>
                <li>interface to most MySQL status variables</li>
                <li>server traffic &amp; query statistics</li>
                <li>support new MySQL 4 privileges</li>
                <li>support for user resource limits</li>
                <li>privileges may now be edited without reloading the user tables</li>
                <li>copy user profiles</li>
            </ul>
        </li>
        <li>Export
            <ul>
        <li>export to LaTeX format</li>
        <li>better handling of charset conversion</li>
        <li>better output order of inserts/creates</li>
        <li>export results of any single-table SELECT</li>
            </ul>
        </li>
        <li>option to only copy data (append) to a table</li>
        <li>better handling of confirmation requests (bookmarks) and LIMIT</li>
        <li>support EXTRACT ... FROM</li>
        <li>check/uncheck all for field selection</li>
        <li>moving cursor with ctrl/arrows in table creation and row editing</li>
        <li>images in PNG format where possible</li>
        <li>display UPDATE SQL statement after a row edit</li>
        <li>in Select sub-page, drop-down for ENUMs</li>
        <li>(experimental) support for compressed connections to the MySQL server</li>
        <li>upload of binary file into a field</li>
        <li>new documentation layout</li>
        <li>(for phpMyAdmin developers) interface to DBG extension for debugging/profiling</li>
        <li>show blob size</li>
        </ul>

        <font color="red">&nbsp;&nbsp;Fixes:</font>
        <ul>
        <li>output handler warning for PHP &gt;=4.3.0</li>
        <li>usernames with &quot;@&quot; character</li>
        <li>links or submit buttons for db search results</li>
        <li>warning for bzip problem of PHP 4.2.1</li>
        <li>wrong &quot;Back&quot; links</li>
        <li>UNION processing generated undefined variables</li>
        <li>handling of &quot;LOCAL&quot; in recent MySQL versions for LOAD DATA INFILE</li>
        <li>wrong drop-down for foreign keys in Select sub-page</li>
        <li>wrong charset information in XML exports</li>
        <li>parsing error for the single quote case</li>
        <li>problem with SQL validator interface</li>
        <li>wrong parsing of INTERVAL and AUTO_INCREMENT</li>
        <li>no longer allow invalid options like UNSIGNED in SET/ENUM</li>
        <li>problem entering comments in Relation view</li>
        <li>fix for kanji encoding problem</li>
        <li>empty field names on add fields page caused problems</li>
        <li>the quicklinks on top of each page are now pointing to the default tabs</li>
        <li>problem with receiving the database list with MySQL&nbsp;&gt;=&nbsp;4.0.2-alpha</li>
        <li>adjusted font sizes for Opera&nbsp;7 for Windows and Konqueror</li>
        <li>problems with editing the contents of the SQL query boxes with Opera&nbsp;7 for Windows</li>
        <li>query-by-example and only one table</li>
        <li>do not display edit link for database-independent queries</li>
        <li>fix some of the problems with record counting</li>
        </ul>

    </td>
    <!-- Right cell with changes -->
</tr>
</table>

<hr noshade="noshade" />

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
    <li><a href="ANNOUNCE-2.3.0.txt">Release Announcement for version 2.3.0</a> (2002-08-11)</li>
    <li><a href="ANNOUNCE-2.2.0.txt">Release Announcement for version 2.2.0</a> (2001-08-30)</li>
    <li><a href="http://www.phpmyadmin.net/ChangeLogs/">old ChangeLogs</a></li>
    <li><a href="http://www.phpwizard.net/projects/phpMyAdmin/">old phpMyAdmin homepage (phpwizard.net)</a><br /><br /></li>
</ul>

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
