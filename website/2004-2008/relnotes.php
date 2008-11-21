<?php
    $modif_by = 'rabus';

    $we_must_import = FALSE;
    if (!isset($modif_date)) {
        $we_must_import = TRUE;
    }
    if ($we_must_import == TRUE) {
        require_once("./includes/config.inc.php");
        require_once($import['header']);
    }
    if (basename($_SERVER['PHP_SELF']) == 'downloads.php') {
        if(!isset($_GET['relnotes']) || empty($_GET['relnotes']))
            $rel = 0;
        else
            $rel = $_GET['relnotes'];
    } else if (basename($_SERVER['PHP_SELF']) == 'relnotes.php') {
        if(!isset($_GET['rel']))
            $rel = 0;
        else
            $rel = $_GET['rel'];
    }
    
?>
    <div class="container">
        <div style="width: 250px; float: left;">
<?php
    echo renderBoxHeader(250, 'RELEASES', '', '');
    echo '    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">';
    for ($i=0; $i<$releases; $i++) {
        if ($release[$i]['active'] == 'yes') {
            $tr_count++;
            if ($tr_count>1) {
                echo '    <tr><td colspan="2"><hr noshade="noshade" size="1" class="yellow" /></td></tr>' . "\n";
            }
            echo '    <tr>'
               . '<td class="content" valign="top" align="left"><b>phpMyAdmin <span class="version">' . $release[$i]['version'] . '</span></b></td>'
               . '<td class="content">' . "\n"
               . '<span class="gotopage"><b><a href="downloads.php?relnotes=' . $i . '">release notes</a></b></span><br />' . "\n"
               . '<span class="gotopage"><b><a href="downloads.php#' . $release[$i]['version'] . '">downloads</a></b></span>' . "\n"
               . '</td></tr>' . "\n";
        } // end if
    }
    echo '</table>' . "\n";
    echo renderBoxFooter(250, '', '', '', '', FALSE);
?>
        </div>
        <div style="width: 500px; float: right;">
<?php
    echo renderBoxHeader(500, 'RELEASE NOTES', '', '');
    echo '<h1 style="text-align: center;">Information about version <font style="color: #cc0000">' . $release[$rel]['version'] . '</font></h1>' . "\n";
    echo '<hr noshade="noshade" size="1" class="yellow" />' . "\n";
    echo '<div style="padding: 5px;">';
    $content = $release[$rel]['notes'];
    $content = preg_replace("/<a href=\"http:\/\/(www\.)phpmyadmin.net\/home_page\/([\w\s\=\?\.\&\#\/\:\;\,\_\-\@\*\!\%\$\'\"]+)/", "<a href=\"\\2", $content);
    $content = preg_replace("/\-\s\(([^\)]*?)\)/", "- <b>(<span style=\"color: #cc0000;\">\\1</span>)&nbsp;</b>", $content);
    echo $content;
    echo '</div>';
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
        <div style="clear: both;"></div>
    </div>
<?php
    if ($we_must_import == TRUE) {
        require_once($import['footer']);
    }
?>
