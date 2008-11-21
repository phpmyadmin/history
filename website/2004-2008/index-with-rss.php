<?php
    $modif_by = 'lem9';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php
    require_once($import['release']);
    // quick downloads
    echo renderBoxHeader(250, 'QUICK DOWNLOADS', 'downloads.php', '_self');
    // Show latest stable release
    for ($stable=0; $stable<$releases; $stable++) {
        if ($release[$stable]['type'] == 'stable') break;
    }
    echo renderQuickDownloads($stable, 'Latest stable version');
    // If there is newer RC than stable, show it here also
    for ($rc=0; $rc<$stable; $rc++) {
        if ($release[$rc]['type'] == 'rc') break;
    }
    if ($release[$rc]['type'] == 'rc') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($rc, 'Latest release candidate');
    }
    // If there is newer alpha than stable, show it here also
    for ($alpha=0; $alpha<$stable; $alpha++) {
        if ($release[$alpha]['type'] == 'alpha') break;
    }
    if ($release[$alpha]['type'] == 'alpha') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($alpha, 'Latest alpha release');
    }
    // If there is newer beta than stable, show it here also
    for ($beta=0; $beta<$stable; $beta++) {
        if ($release[$beta]['type'] == 'beta') break;
    }
    if ($release[$beta]['type'] == 'beta') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($beta, 'Latest beta release');
    }
    // Show old version
    for ($old=0; $old<$releases; $old++) {
        if ($release[$old]['type'] == 'old') break;
    }
    if ($release[$old]['type'] == 'old') {
        echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
        echo renderQuickDownloads($old, 'Latest version tested with <a href="http://www.php.net">PHP &lt; 4.1.0</a> and <a href="http://www.mysql.com">MySQL &lt; 3.23.32</a>');
    }
    echo renderBoxFooter(250, 'downloads.php', '_self', '...more download options', '... downloads', TRUE);

    // project info
    echo renderBoxHeader(250, 'LINUXTAG 2005', '', '');
?>
    <b>First Team Meeting!</b>. Big party in Karlsruhe, Germany for the 10th anniversary of PHP and MySQL at the 
    <a href="http://www.linuxtag.org">LinuxTag</a> 
    <a href="http://www.lamparea.org/">LAMP Area</a>, with some special 
    guests: <div align="center">
    <table border="0" cellspacing="0"><tr><td align="center">
    <a href="images/linuxtag/IMG_4187.JPG"><img src="images/linuxtag/IMG_4187_tn.JPG" border="0" alt="phpMyAdmin team with Rasmus (PHP)" /></a><br />Rasmus (PHP)&nbsp;</td><td>&nbsp;</td><td align="center">
    <a href="images/linuxtag/IMG_4189.JPG"><img src="images/linuxtag/IMG_4189_tn.JPG" border="0" alt="phpMyAdmin team with Monty (MySQL)" /></a><br />"Monty" (MySQL)
    </td></tr></table></div>

<?php
    echo renderBoxFooter(250, '', '', '', '', TRUE);



    // project info
    echo renderBoxHeader(250, 'PROJECT INFO', '', '');
?>
    <b>phpMyAdmin</b> is a tool written in <b><a href="http://www.php.net/" title="www.php.net">PHP</a></b> intended to handle the administration
    of <b><a href="http://www.mysql.com/" title="www.mysql.com">MySQL</a></b> over the Web. Currently it can create and drop databases,
    create/drop/alter tables, delete/edit/add fields, execute any SQL
    statement, manage keys on fields, manage privileges,export data into
    various formats and is available in <b><a href="http://www.phpmyadmin.net/documentation/translators.html" title="List of supported languages">55 languages</a></b>.
    <b><a href="http://www.phpmyadmin.net/documentation/LICENSE" title="Read the GPL License informations">GPL License information</a></b>.
<?php
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // books
    echo renderBoxHeader(250, 'BOOKS', 'docs.php?books', '_self');
    echo $pmaBooks;
    echo renderBoxFooter(250, 'docs.php?books', '_self', '... more', '... about the PMA-Books', TRUE);

    // donations
    echo renderBoxHeader(250, 'DONATIONS', 'http://sourceforge.net/donate/index.php?group_id=23067', '_blank');
?>
    We invite you to contribute money to our project. Donations will be used for the promotion of <b>phpMyAdmin</b>. - <b><i>Thanks!</i></b>
<?php
    echo renderBoxFooter(250, 'http://sourceforge.net/donate/index.php?group_id=23067', '_blank', 'make a donation', 'Thanks!', FALSE);
?>
        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php

    // news (rss - feed)
    echo renderBoxHeader(500, 'NEWS', '', '');
    include($import['rssfeed']);
    $pma_rss_newsfull = new pmaRSSFeed('newsfull');
?>
            <table align="center" width="489" border="0" cellpadding="0" cellspacing="0">
<?php
    $max = ((count($pmaRSSDatas) > 7) ? 7 : count($pmaRSSDatas));
    for ($i = 0; $i < $max; $i++) {
        // title
        $title = $pmaRSSDatas[$i]['title'];
        $title = (stristr($title, 'release') ? '<span style="color: #cc0000;">' . $title . '</span>' : $title);
        // pupdate
        $pubdate  = strtotime($pmaRSSDatas[$i]['date']);
        $pubdate  = date('Y-m-d H:i',$pubdate);
        // author
        $author   = substr($pmaRSSDatas[$i]['author'], 0, strpos($pmaRSSDatas[$i]['author'], '@'));     // get only the sf-username
        // content
	$tmp_content = $pmaRSSDatas[$i]['content'];
        $tmp_content  = html_entity_decode($tmp_content); // we must decode
        $content  = substr($tmp_content, 0, strrpos($tmp_content, '('));                                // remove '(x coments)'
//        $content  = rss2html($content);
        // comments
        $comments = substr($tmp_content, strrpos($tmp_content, '('), strrpos($tmp_content, ')'));       // save the string '8x comments'
        $comments = preg_replace("/<[^>]*?>/","",$comments);
        $comments = preg_replace("/\(/", "", $comments);
        $comments = preg_replace("/\)/", "", $comments);
        if (strtolower($comments) == '0 comments') {
            $comments = '';
        }
        if (strtolower($comments) == '1 comments') {
            $comments = '1 comment';
        }
        // lem9: avoid using Forum here: users are tempted to use the 
        // link as a general help forum
        //$goforum  = '<a href="' . $pmaRSSDatas[$i]['link'] . '">Forum</a>';
        // well, they are still using this as a forum, removed for now
        //$goforum  = '<a href="' . $pmaRSSDatas[$i]['link'] . '">Comments</a>';

        if (stristr($title, 'release')) {
            $gopage = '<a href="downloads.php">Download</a>';
        } else {
            $tmp_array = explode('<a href="', $content);
            $tmp_link  = trim($tmp_array[1]);
            $gopage    = substr($tmp_link,0, strpos($tmp_link, '">'));
            //$gopage    = preg_replace("/\"/", "", $gopage);
            $gopage    = ( ($gopage!='') ? '<a href="' . $gopage . '">Read more</a>' : '' );
            unset($tmp_link);
            unset($tmp_array);
        }								
?>
                <tr>
                    <td width="375" rowspan="2" align="left" valign="top" class="content">
                            <h1><?php echo $title; ?></h1>
                            <p><?php echo $content; ?></p>
                    </td>
                    <td width="19" rowspan="2" class="content">&nbsp;</td>
                    <td width="85" valign="top" class="smallblue">
                        <span class="smallblack">published: </span><br />
                        <?php echo $pubdate; ?><br />
                        <span class="smallblack">by </span><a href="https://sourceforge.net/sendmessage.php?touser=<?php echo $sf_user_id[$author]; ?>" title="contact <?php echo $author; ?>"><?php echo $author; ?></a>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom">
                        <?php
                            echo ( !empty($gopage) ?  '<span class="gotopage"><b>' . $gopage . '</b></span><br />' . "\n" : '' );
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" height="30"><hr noshade="noshade" size="1" class="yellow" /></td>
                </tr>
<?php
    }
?>
                <tr>
                    <td colspan="3" height="25" class="content" align="center"><b>Older news are saved and available in our <span class="gotopage"><a href="http://sourceforge.net/news/?group_id=<?php echo $sf_group_id; ?>">News-Archive</a></span>.</b></td>
                </tr>
            </table>
<?php
    unset($max);
    unset($i);
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
<!--/ right big boxes -->
    </div>
<?php
    require_once($import['footer']);
?>
