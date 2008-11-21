<?php
    $modif_by = 'mkkeck';
    /* modified by mkkeck 2005-01-25
     * - use ',' instead of '.' in number_format
     * - misunderstud donwload stats
     * - show only active releases
     * lem9, 2005-11-09
     * - sometimes, download stats are not available, so show "N/A"
     * lem9, 2006-05-11
     * - The date in the daily stats is not correct, so display Yesterday
    */
    require_once("./includes/config.inc.php");
    require_once($import['header']);
    require_once($import['rssfeed']);
    require_once($import['release']);

    // DETAILED DOWNLOADS STATS
    // get rss_files
    $pma_rss_newsfull = new pmaRSSFeed('files');

    $count = -1;
    $rss_downloads = array();
    $total_downloads = 0;
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'phpmyadmin')) {
            $count++;
            $tmp_title = explode(" ", $pmaRSSDatas[$i]['title']);
            $content = $pmaRSSDatas[$i]['content'];
            $content = html_entity_decode($pmaRSSDatas[$i]['content']);
            $content = preg_replace("/<[^>]*?>/i", "", $content);
            $content = preg_replace("/\[[^\]]*?\]/i", "", $content);
            $content = substr($content, strpos($content, 'files:')+6, strlen($content));
            $tmp_datas = explode('),', $content);
            $rss_downloads[$count]['release'] = trim($tmp_title[1]);
            $rss_downloads[$count]['total']   = 0;
            $arr_datas = array();
            for ($j = 0; $j < count($tmp_datas); $j++) {
                $tmp_values = explode('(', $tmp_datas[$j]);
                $pma_source = $tmp_values[0];
                $pma_loaded = substr($tmp_values[1], strrpos($tmp_values[1], ',')+1, strlen($tmp_values[1]));
                $pma_loaded = preg_replace("/[^0-9]/", "", $pma_loaded);
                if (isset($_GET['sort'])) {
                    $arr_datas[] = number_format(trim($pma_loaded), 0, '','') . '~' . trim($pma_source);
                } else {
                    $arr_datas[] = trim($pma_source) . '~' . number_format(trim($pma_loaded), 0, '','');
                }
                $rss_downloads[$count]['total'] += number_format(trim($pma_loaded), 0, '','');
            }
            $total_downloads += $rss_downloads[$count]['total'];
            if (isset($_GET['sort'])) {
                rsort($arr_datas, SORT_NUMERIC);
                reset($arr_datas);
            } else {
                sort($arr_datas, SORT_STRING);
                reset($arr_datas);
            }
            for ($j = 0; $j < count($arr_datas); $j++) {
                $tmp_values = explode('~', $arr_datas[$j]);
                if (isset($_GET['sort'])) {
                    $rss_downloads[$count]['loaded'][$j] = number_format(trim($tmp_values[0]), 0, '','');
                    $rss_downloads[$count]['source'][$j] = trim($tmp_values[1]);
                } else {
                    $rss_downloads[$count]['source'][$j] = trim($tmp_values[0]);
                    $rss_downloads[$count]['loaded'][$j] = number_format(trim($tmp_values[1]), 0, '','');
                }
            }

        }
    }
    // SUMMARY
    // get rss_summary
    $pma_rss_newsfull = new pmaRSSFeed('summary');

    // SUMMARY DEVELOPERS
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'developers')) break;
    }
    $tmp_string1 = 'Developers on Project: <b>' . preg_replace("/[^0-9]/", "", $pmaRSSDatas[$i]['title']) . '</b><br />';
    $tmp_string2 = html_entity_decode($pmaRSSDatas[$i]['content']);
    $tmp_string2 = rss2html($tmp_string2);
    $tmp_string2 = preg_replace("/<a href=/", "<b><a href=", $tmp_string2);
    $tmp_string2 = preg_replace("/<\/a>/", "</a></b>", $tmp_string2);
    $rss_summary['developer'] = $tmp_string1 . $tmp_string2;

    // SUMMARY CVS
/*
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'cvs')) break;
    }
    $tmp_stats = explode('/', $pmaRSSDatas[$i]['title']);
    $rss_summary['cvs'] = 'Developers already did <b>' . number_format(preg_replace("/[^0-9]/", "", $tmp_stats[0]),0,'',',') . '</b> CVS commits '
                        . 'and <b>' . number_format(preg_replace("/[^0-9]/", "", $tmp_stats[1]),0,'',',') . '</b> CVS adds.';
*/

    // SUMMARY FORUM & MAILING-LISTS
    // forum
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'forum')) break;
    }
    $tmp_stats = explode(',', $pmaRSSDatas[$i]['title']);
    $uri_forum = $pmaRSSDatas[$i]['link'];
    $str_forum = 'Project has opened <b>' . preg_replace("/[^0-9]/", "", $tmp_stats[0]) . '</b> forums '
                . 'and these contain <b>' . number_format(preg_replace("/[^0-9]/", "", $tmp_stats[1]),0,'',',') . '</b> messages.<br />';
    // lists
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'mailing lists')) break;
    }
    $uri_lists = $pmaRSSDatas[$i]['link'];
    $str_lists = 'There are <b>' . preg_replace("/[^0-9]/", "", $pmaRSSDatas[$i]['title']) . '</b> mailing lists available.';
    $rss_summary['forum'] = $str_forum . $str_lists
                          . '<hr noshade="noshade" size="1" class="yellow" />'
                          . '<div align="right"><span class="gotopage"><b><a href="' . $uri_forum . '">forum page</a></b></span>'
                          . '&nbsp;&nbsp;&nbsp;<span class="gotopage"><b><a href="' . $uri_lists . '">mailing lists</a></b></span></div>';


    // SUMMARY TRACKER
    $count = 0;
    $rss_summary['tracker'] = ''
       . '    <table width="100%" border="0" cellpadding="2" cellspacing="1">' . "\n"
       . '        <tr>' . "\n"
       . '            <th class="content" style="background-image: url(./images/th_beg.gif); background-position: left; background-repeat: no-repeat;">Item</th>' . "\n"
       . '            <th class="content">Total</th>' . "\n"
       . '            <th class="content">Open</th>' . "\n"
       . '            <th colspan="2" class="content" style="background-image: url(./images/th_end.gif); background-position: right; background-repeat: no-repeat;">Percent</th>' . "\n"
       . '        </tr>' . "\n";
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'tracker') && !stristr($pmaRSSDatas[$i]['title'], 'theme')) {
            $count++;
            // we must split this 'Tracker: Name ([INT] open/[INT] total)'
            $tmp_title = $pmaRSSDatas[$i]['title'];
            $tmp_link  = trim($pmaRSSDatas[$i]['link']);
            $tmp_link  = unhtmlentities($tmp_link);
            $tmp_link  = htmlentities($tmp_link);
            $tmp_title = preg_replace("/[^\:]*?:/i", "", $tmp_title);
            $tmp_title = preg_replace("/\([^\)]*?\)/i", "", $tmp_title);
            $tmp_stats = explode('/', trim($pmaRSSDatas[$i]['title']));
            $tmp_open  = preg_replace("/[^0-9]/", "", $tmp_stats[0]);
            $tmp_open  = number_format( trim($tmp_open), 0, '', '' );
            $tmp_total = preg_replace("/[^0-9]/", "", $tmp_stats[1]);
            $tmp_total = number_format( trim($tmp_total), 0, '', '' );
            $tdbgcolor = (($count%2) ? '#e9e9e9' : '#f5f5f5');
            $img_percent = number_format( floor(($tmp_open * 100 / $tmp_total)), 0, '', '' );
            $rss_summary['tracker'] .= ''
                . '        <tr>' . "\n"
                . '            <td class="content" style="background-color: ' . $tdbgcolor . ';"><b><a href="' . $tmp_link . '">' . trim($tmp_title) . '</a></b></td>' . "\n"
                . '            <td class="content" style="background-color: ' . $tdbgcolor . '; text-align: right;">' . number_format( trim($tmp_total), 0, '', ',' ) . '</td>' . "\n"
                . '            <td class="content" style="background-color: ' . $tdbgcolor . '; text-align: right;">' . number_format( trim($tmp_open), 0, '', ',' ) . '</td>' . "\n"
                . '            <td style="background-color: ' . $tdbgcolor . '; width: 200px;">';
            if ((100 - $img_percent) > 0) {
                $rss_summary['tracker'] .= '<img src="images/1x1yellow.gif" width="' . (200 - ($img_percent * 2)) . '" height="8" border="0" alt="" />'
                                         . (($img_percent > 0) ? '<img src="images/1x1blue.gif" width="' . ($img_percent * 2) . '" height="8" border="0" alt="" />' : '');
            } else {
                $rss_summary['tracker'] .= '<img src="images/1x1yellow.gif" width="200" height="8" border="0" alt="" />';
            }
            $rss_summary['tracker'] .= '</td>' . "\n"
                . '            <td class="content" style="background-color: ' . $tdbgcolor . '; text-align: right; width: 50px;">' . number_format( ($tmp_open * 100 / $tmp_total), 2, '.', ',' ) . ' %</td>' . "\n"
                . '        </tr>' . "\n";
        }
    }
    $rss_summary['tracker'] .= '    </table>' . "\n";

    // SUMMARY DAILY DOWNLOADS
    for ($i = 0; $i < count($pmaRSSDatas); $i++) {
        if (stristr($pmaRSSDatas[$i]['title'], 'download')) break;
    }
    $tmp_stats = explode(')', $pmaRSSDatas[$i]['content']);
    $rss_summary['dl_today'] = trim(substr( $tmp_stats[0], strpos($tmp_stats[0], '(')+1, strlen($tmp_stats[0]) ));
    $rss_summary['dl_count'] = number_format(preg_replace("/[^0-9]/", "", $tmp_stats[1]),0,'',',');
    $rss_summary['dl_total'] = number_format(preg_replace("/[^0-9]/", "", $pmaRSSDatas[$i]['title']),0,'',',');
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php

    // DOWNLOADS
    echo renderBoxHeader(250, 'DOWNLOAD - STATISTICS', '', '');
    echo '<table border="0" cellpadding="0" cellspacing="0">' . "\n"
       . '    <tr>' . "\n"
       . '        <td align="left" class="content" nowrap="nowrap">Since April 2001:</td>' . "\n"
       . '        <td>&nbsp;&nbsp;</td>' . "\n"
       //. '        <td align="right" class="content" nowrap="nowrap"><b>' . $rss_summary['dl_total'] . '</b></td>' . "\n"
       . '        <td align="right" class="content" nowrap="nowrap"><b>' . ($rss_summary['dl_total'] == 0 ? 'N/A' : $rss_summary['dl_total']). '</b></td>' . "\n"
       . '    </tr>' . "\n"
       . '    <tr>' . "\n";
    echo '        <td align="left" class="content" nowrap="nowarp">Yesterday:</td>' . "\n"
       . '        <td>&nbsp;&nbsp;</td>' . "\n"
       . '        <td align="right" class="content" nowrap="nowrap"><b>' . ($rss_summary['dl_count'] == 0 ? 'N/A' : $rss_summary['dl_count']) . '</b></td>' . "\n"
       . '    </tr>' . "\n"
       . '</table>' . "\n";
    echo renderBoxFooter(250, '#dlstats', '_self', 'more detailed', '... downloads statistics', TRUE);


    echo renderBoxHeader(250, 'DEVELOPERS', '', '');
    echo $rss_summary['developer'];
    echo renderBoxFooter(250, 'http://sourceforge.net/project/memberlist.php?group_id=' . $sf_group_id, '_blank', 'view members', '', TRUE);

    // CVS
    echo renderBoxHeader(250, 'SVN - STATISTICS', '', '');
    echo 'See <a href="http://cihar.com/phpMyAdmin/stats/">external server</a>.';
//    echo $rss_summary['cvs'];
//    echo renderBoxFooter(250, 'http://cihar.com/phpMyAdmin/stats/', '_blank', 'more detailed', '... CVS statistics', TRUE);
    echo renderBoxFooter(250, 'http://cia.navi.cx/stats/project/phpmyadmin/', '_blank', 'more detailed', '... CVS statistics', TRUE);

    // FORUM / MAILING-LISTS
    echo renderBoxHeader(250, 'FORUM STATISTICS', '', '');
    echo $rss_summary['forum'];    
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // TRANSLATIONS
    echo renderBoxHeader(250, 'TRANSLATIONS STATISTICS', '', '');
    echo 'We currently have 55 translations.'; 
    echo renderBoxFooter(250, 'http://cihar.com/phpMyAdmin/translations', '_blank', 'more detailed', '... translations statistics', TRUE);

?>
        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php

    echo renderBoxHeader(500, 'TRACKER STATISTICS', '', '');
    echo $rss_summary['tracker'];
    echo renderBoxFooter(500, '', '', '', '', TRUE);

    // DETAILED DOWNLOAD STATS
    echo '<a name="dlstats"></a>' . renderBoxHeader(500, 'DETAILED DOWNLOAD STATISTICS', '', '');
    echo '<div style="width: 240px; float: left;">Statistics about the latest versions.<br />For the full statistics visit <span class="gotopage"><b><a href="http://sourceforge.net/project/stats/?group_id=' . $sf_group_id . '&amp;ugn=phpmyadmin">sourceforge.net</a></b></span></div>';
    echo '<div style="width: 220px; float: right;"><table width="100%" align="center" border="0" cellpadding="2" cellspacing="1">' . "\n";

    // new stuff: header
    echo '        <tr>' . "\n"
       . '            <th class="content" style="background-image: url(./images/th_beg.gif); background-position: left; background-repeat: no-repeat;">Version</th>' . "\n"
       . '            <th class="content" style="background-image: url(./images/th_end.gif); background-position: right; background-repeat: no-repeat;">Downloads</th>' . "\n"
       . '        </tr>' . "\n";

    $tr = -1;
    for ($i = 0; $i < count($rss_downloads); $i++) {
        for ($j = 0; $j < count($release); $j++) { // check release
            if ($rss_downloads[$i]['release'] == $release[$j]['version']) { // check version
                if ($release[$j]['active'] == 'yes') { // check active
                    $tr++;
                    $tdbgcolor = (($tr%2) ? '#e9e9e9' : '#f5f5f5');
                    echo '        <tr>' . "\n"
                       . '            <td class="content" style="background-color: ' . $tdbgcolor . '; text-align: left;">'
                       . '<b><a href="downloads.php#' . $rss_downloads[$i]['release'] . '" name="' . $rss_downloads[$i]['release'] . '" title="' . htmlentities($release[$j]['text']) . '">phpMyAdmin ' . $rss_downloads[$i]['release'] . '</a></b></td>' . "\n"
                       . '            <td class="content" style="background-color: ' . $tdbgcolor . '; text-align: right;"><b>' . ( ($rss_downloads[$i]['total'] > 0) ? number_format($rss_downloads[$i]['total'], 0 ,'', ',') : 'NEW' ) . '</b></td>' . "\n"
                       . '        </tr>' . "\n";
                } // end check active
                break;
            } // end check version
        } // end check release


/*** OLD STUFF (shows packages on each release) *****
        if ($i>0) {
            echo '    <tr><td colspan="3"><hr noshade="noshade" size="1" class="yellow" /></td></tr>' . "\n";
        }
        echo '        <tr>' . "\n"
           . '            <td class="content"><h1><a href="downloads.php#' . $rss_downloads[$i]['release'] . '" name="' . $rss_downloads[$i]['release'] . '">'
           . '<img src="images/marker_ltr2.gif" width="10" height="10" hspace="2" border="0" alt="" style="vertical-align: middle;" />'
           . 'phpMyAdmin <font style="color: #cc0000">' . $rss_downloads[$i]['release'] . '</font>'
           . '</a></h1></td>' . "\n"
           . '            <td colspan="2" class="content" align="right"><b>' . number_format($rss_downloads[$i]['total'],0,'','.') . '</b> downloads</td>' . "\n"
           . '        </tr>' . "\n";
        echo '            <tr>' . "\n"
           . '                <th class="content" style="background-image: url(./images/th_beg.gif); background-position: left; background-repeat: no-repeat;"><a href="' . basename($_SERVER['PHP_SELF']) . '#' . $rss_downloads[$i]['release'] . '">Files</a></th>' . "\n"
           . '                <th colspan="2" class="content" style="background-image: url(./images/th_end.gif); background-position: right; background-repeat: no-repeat;"><a href="' . basename($_SERVER['PHP_SELF']) . '?sort=num#' . $rss_downloads[$i]['release'] . '">Downloads</a></th>' . "\n"
           . '            </tr>' . "\n";
        for ($j = 0; $j < count($rss_downloads[$i]['source']); $j++) {
            $image_bar   = '<img src="images/1x1blue.gif" width="200" height="8" border="0" alt="" />';
            $img_percent = number_format( round(($rss_downloads[$i]['loaded'][$j] * 100 / $rss_downloads[$i]['total'])), 0, '', '' );
            if ($img_percent > 0) {
               $image_bar = '<img src="images/1x1yellow.gif" width="' . ($img_percent * 2) . '" height="8" border="0" alt="" />'
                          . (($img_percent < 100) ? '<img src="images/1x1blue.gif" width="' . (200 - ($img_percent * 2)) . '" height="8" border="0" alt="" />' : '');
            }
            $tdbgcolor = (($j%2) ? '#e9e9e9' : '#f5f5f5');
            echo '        <tr>' . "\n"
               . '            <td class="files" style="background-color: ' . $tdbgcolor . ';">' . $rss_downloads[$i]['source'][$j] . '</td>' . "\n"
               . '            <td style="background-color: ' . $tdbgcolor . '; width: 200px;">' . $image_bar . '</td>' . "\n"
               . '            <td class="files" style="background-color: ' . $tdbgcolor . '; text-align: right;">' . number_format($rss_downloads[$i]['loaded'][$j], 0 ,'', '.') . '</td>' . "\n"
               . '        </tr>' . "\n";
        }
 *** OLD STUFF (shows packages on each release) *****/



    }

    echo '    </table></div>' . "\n";
    echo '    <div style="clear: both;"></div>' . "\n";
    echo renderBoxFooter(500, '', '', '', '', FALSE);

?>
        </div>
<!--/ right big boxes -->
    </div>
<?php
    require_once($import['footer']);
?>
