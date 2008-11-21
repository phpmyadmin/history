<?php

    $modif_by = 'lem9';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
    require_once($import['files']);
    require_once($import['release']);

    if (!isset($_GET['relnotes']) && !isset($_GET['themes'])) { // render download page
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php
    // latest versions
    echo renderBoxHeader(250, 'LATEST VERSIONS', '', '');

    // Show latest stable3 release
    for ($stable3=0; $stable3<$releases; $stable3++) {
        if ($release[$stable3]['type'] == 'stable3') break;
    }
    echo renderQuickDownloads($stable3, 'Latest stable 3.x version is', FALSE);
    
    // Show latest stable2 release
    for ($stable2=0; $stable2<$releases; $stable2++) {
        if ($release[$stable2]['type'] == 'stable2') break;
    }
    if ($release[$stable2]['type'] == 'stable2') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
	echo renderQuickDownloads($stable2, 'Latest stable 2.x version is', FALSE);
    }

    // If there is newer RC than stable, show it here also
    for ($rc=0; $rc<$stable; $rc++) {
        if ($release[$rc]['type'] == 'rc') break;
    }
    if ($release[$rc]['type'] == 'rc') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($rc, 'Latest release candidate is', FALSE);
    }
    // If there is newer alpha than stable, show it here also
    for ($alpha=0; $alpha<$stable; $alpha++) {
        if ($release[$alpha]['type'] == 'alpha') break;
    }
    if ($release[$alpha]['type'] == 'alpha') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($alpha, 'Latest alpha release is', FALSE);
    }
    // If there is newer beta than stable, show it here also
    for ($beta=0; $beta<$stable; $beta++) {
        if ($release[$beta]['type'] == 'beta') break;
    }
    if ($release[$beta]['type'] == 'beta') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($beta, 'Latest beta release is', FALSE);
    }
    // Show old version
    for ($old=0; $old<$releases; $old++) {
        if ($release[$old]['type'] == 'old') break;
    }
    if ($release[$old]['type'] == 'old') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($old, 'Latest version tested with <a href="http://www.php.net">PHP &lt; 4.1.0</a> and <a href="http://www.mysql.com">MySQL &lt; 3.23.32</a> is', FALSE);
    }
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // older versions
    echo renderBoxHeader(250, 'OLDER VERSIONS', '', '');
    echo 'Older versions can be reached on '
       . '<a href="http://sourceforge.net/project/showfiles.php?group_id=' . $sf_group_id . '">SourceForge files page</a>. '
       . '<br /><font style="color: #cc0000"><b>Note:</b></font> security fixes are included only in the last stable and development versions.';
    echo renderBoxFooter(250, 'http://sourceforge.net/project/showfiles.php?group_id=' . $sf_group_id . '&amp;package_id=16462', '_blank', 'get older versions', '', TRUE);


    // other sources
    echo renderBoxHeader(250, 'OTHER SOURCES FOR PMA', '', '');
?>
    <p>Many operating systems include a phpMyAdmin package and some of them offer a way to upgrade to the latest version. Please contact your OS vendor for more information.</p>
<?php
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // themes
    echo renderBoxHeader(250, 'THEMES', '', '');
?>
    <b>phpMyAdmin</b> supports themes since version 2.6.0.<br />
    You can <b><a href="downloads.php?themes">download</a></b> themes on our download-arera or <b><a href="http://sourceforge.net/tracker/?atid=689412&amp;group_id=<?php echo $sf_group_id; ?>&ampfunc=browse">post</a></b> a theme for phpMyAdmin on our Theme-Tracker.
    <hr noshade="noshade" size="1" class="yellow" />
    <div align="right"><span class="gotopage"><b><a href="http://sourceforge.net/tracker/?atid=689412&amp;group_id=<?php echo $sf_group_id; ?>&ampfunc=browse">post a theme</a></b></span>
    &nbsp;&nbsp;&nbsp;<span class="gotopage"><b><a href="downloads.php?themes">download themes</a></b></span></div>
<?php
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // cvs
    echo renderBoxHeader(250, 'Subversion', '', '');
?>
    You have several ways of accessing the Subversion repository, which is the latest
    version on which developers are working.
<?php
    echo renderBoxFooter(250, 'downloads.php#fetchsvn', '_self', '... more', '... how to access Subversion', FALSE);
?>

        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php
    function DownloadLink($ver, $middle, $ext, $tdbgcolor='#e9e9e9') {
        global $md5sum, $size;
        if ($middle == '') {
            $fname = 'phpMyAdmin-' . $ver . '.' . $ext;
 	    $display_name = $ext;
        } else {
            $fname = 'phpMyAdmin-' . $ver . '-' . $middle . '.' . $ext;
 	    $display_name = $middle . '.' . $ext;
        }
        echo '    <tr>';
        echo '<td class="files" style="background-color: ' . $tdbgcolor . ';" nowrap="nowrap"><a href="http://prdownloads.sourceforge.net/phpmyadmin/' . $fname . '?download"><b>' . $display_name . '</b></a></td>'
           . '<td align="right" class="files" style="background-color: ' . $tdbgcolor . ';">' . ( isset($size[$fname]) ? number_format($size[$fname],0,'','') : '&nbsp;' ) . '</td>'
           . '<td class="code" style="background-color: ' . $tdbgcolor . ';">' . ( isset($md5sum[$fname]) ? $md5sum[$fname] : '&nbsp;' ) . '</td>';
        echo '</tr>' . "\n";
    }

    echo renderBoxHeader(500, 'DOWNLOADS', '', '');
    echo '<table border="0" cellpadding="2" cellspacing="1">' . "\n";
    $tr_count=0;

    for ($i=0; $i<$releases; $i++) {
        if ($release[$i]['active'] == 'yes') {
            $tr_count++;
            if ($tr_count>1) {
                echo '    <tr><td colspan="3"><hr noshade="noshade" size="1" class="yellow" /></td></tr>' . "\n";
            }
            echo '    <tr>' . "\n"
               . '        <td class="content" colspan="2">'
               . '<h1><a name="' . $release[$i]['version'] . '"></a>phpMyAdmin <font style="color: #cc0000">' . $release[$i]['version'] . '</font></h1>'
               . '</td>' . "\n"
               . '        <td class="content" align="right"><span class="gotopage"><b>'
               . '<a href="downloads.php?relnotes=' . $i . '">release notes</a>'
               . '</b></span></td>' . "\n"
               . '    </tr>' . "\n"
               . '    <tr><td class="content" colspan="3">' . preg_replace("/ < /", " &lt; ", $release[$i]['text']) . '&nbsp;&nbsp;(' .  date('Y-m-d',$release[$i]['date']) . ')</td></tr>' . "\n"
               . '    <tr><th class="content" style="background-image: url(./images/th_beg.gif); background-position: left; background-repeat: no-repeat;">File</th><th class="content">kB</th><th class="content" style="background-image: url(./images/th_end.gif); background-position: right; background-repeat: no-repeat;">MD5 checksum</th></tr>' . "\n";
            if ($release[$i]['php3'] == 'php') {
                DownloadLink($release[$i]['version'], 'php', 'tar.bz2', '#f5f5f5');
                DownloadLink($release[$i]['version'], 'php', 'tar.gz', '#e9e9e9');
                DownloadLink($release[$i]['version'], 'php', 'zip', '#f5f5f5');
            } else if ($release[$i]['php3'] == 'yes') {
                DownloadLink($release[$i]['version'], 'php', 'tar.bz2', '#f5f5f5');
                DownloadLink($release[$i]['version'], 'php', 'tar.gz', '#e9e9e9');
                DownloadLink($release[$i]['version'], 'php', 'zip', '#f5f5f5');
                DownloadLink($release[$i]['version'], 'php3', 'tar.bz2', '#e9e9e9');
                DownloadLink($release[$i]['version'], 'php3', 'tar.gz', '#f5f5f5');
                DownloadLink($release[$i]['version'], 'php3', 'zip', '#e9e9e9');
            } else {
		if (!isset($release[$i]['kits'])) {
		    $release[$i]['kits'] = array('');
		}
		foreach($release[$i]['kits'] as $kit) {
                    DownloadLink($release[$i]['version'], $kit, 'tar.bz2', '#f5f5f5');
                    DownloadLink($release[$i]['version'], $kit, 'tar.gz', '#e9e9e9');
                    DownloadLink($release[$i]['version'], $kit, 'zip', '#f5f5f5');
		    if (!empty($kit)) {
                        DownloadLink($release[$i]['version'], $kit, '7z', '#e9e9e9');
		    }
                }
            }
        } // end if
    }
    echo '</table>' . "\n";
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
<!--/ right big boxes -->
    </div>
    <div style="clear: both; text-align: center;"><img src="./images/1x1blind.gif" width="1" height="10" border="0" alt="" /></div>
    <div class="container">
<?php
    echo renderBoxHeader(760, 'Subversion', '', '');
?>
    <a name="fetchsvn"></a>You have several ways of accessing the Subversion repository, which is the latest version on which developers are working.
    <ul>
        <li><b><a href="http://phpmyadmin.svn.sourceforge.net/viewvc/phpmyadmin/">Web-based Subversion repository viewer</a></b></li>
        <li><b><a href="http://www.phpmyadmin.net/snapshot">Subversion snapshot</a></b> (currently moved to another server)</li>
        <li><b>Fetch your own copy:</b>
            <ul>
                <li>
                    Latest <strong><em>development</em></strong> version:<br />
                    <code>svn checkout https://phpmyadmin.svn.sourceforge.net/svnroot/phpmyadmin/trunk/phpMyAdmin phpMyAdmin-dev</code><br />
                </li>
                <li>
                    Latest <strong><em>stable</em></strong> version:<br />
                    <code>svn checkout https://phpmyadmin.svn.sourceforge.net/svnroot/phpmyadmin/tags/STABLE/phpMyAdmin phpMyAdmin-stable</code><br />
                </li>
            </ul>
        </li>
    </ul>
<?php
    echo renderBoxFooter(760, '', '', '', '', FALSE);
?>
    </div>
<?php
    } // end render download page
    else {
        if (isset($_GET['relnotes']))
            require_once("./relnotes.php");
        else if (isset($_GET['themes']))
            require_once("./themes.php");
    }
    require_once($import['footer']);
?>
