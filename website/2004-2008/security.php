<?php
    require_once("./includes/config.inc.php");
    require_once($import['header']);
    $modif_by = 'nijel';
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php
    echo renderBoxHeader(250, 'SECURITY ANNOUNCEMENTS', '', '');
    // Walk directories
    $list   = array();
    $handle = opendir($security_files);
    while (false !== ($dir = readdir($handle))) {
        if ($dir{0} != '.') {
            $list[] = $dir;
        }
    }
    rsort($list);
    foreach($list as $dir) {
        echo '            <div class="gotopage"><b><a href="' . basename($_SERVER['PHP_SELF']) . '?issue=' . $dir . '">' . $dir . '</a></b></div>' . "\n";
    }
    echo renderBoxFooter(250, '', '', '', '', FALSE);
?>
        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php
    if (isset($_GET['issue'])) {
        $filename = $security_files . str_replace(array('.','/','\\'), '_', $_GET['issue']);
        if (!is_readable($filename)) unset($filename);
    }
    if (isset($filename)) {
        echo renderBoxHeader(500, 'SECURITY ISSUE', '', '');
        echo '<h2 style="text-align: center;">phpMyAdmin security announcement <font style="color: #cc0000;">' . $_GET['issue'] . '</font></h2>';
        $handle  = fopen($filename, "rb");
        $content = fread($handle, filesize($filename));
        fclose($handle);
        $content = preg_replace("/phpMyAdmin security announcement/", "", $content);
        $content = preg_replace("'<br />(\n)<hr[^>]*?>'si", "", $content);
        $content = preg_replace("'<hr[^>]*?>(\n)<br />'si", "", $content);
        $content = preg_replace("'<hr[^>]*?>'si", "", $content);
        echo $content;
    } else {
        echo renderBoxHeader(500, 'SECURITY ISSUES', '', '');
        echo '<div style="padding: 10px;">'
           . 'We seriously take care about any security issues found in our code. <br />'
           . 'In left box you can check security issues we already dealt with. <br /><br />'
           . 'If you find any  security problem in our code, please contact the <a href="mailto:security@phpmyadmin.net">phpMyAdmin security team</a> (this is <strong>not a support list</strong>, use one of ways mentioned on <a href="feedback.php">feedback</a> page to get support).'
           . '</div>';
    }
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
<!--/ right big boxes -->
    </div>
<?php
    require_once($import['footer']);
?>
