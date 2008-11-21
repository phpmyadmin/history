<?php
/* 
    file:     includes/header.inc.php
    version:  1.0
    created:  2004-12-31 by mkkeck
    updated:  2004-01-07 by mkkeck
    updated:  2004-01-12 by lem9 (use of hyphens in the titles) 
*/

    // get the currentpage
    $current_page = $_SERVER['SCRIPT_FILENAME'];
    if (!isset($current_page) || empty($current_page)) { // if $current_page should be empty
        $current_page = './index.php';                   // then set it to default
    }

    // get last modify-date
    $modif_date  = date('Y-m-d', @filemtime($current_page));

    // building the navigation bar and window-title
    $navi_info = '';
    $navi_menu = '';
    $win_title = 'phpMyAdmin | MySQL Database Administration Tool | www.phpmyadmin.net';

    for ($i=0; $i < count($menu_items); $i++) {
        $navi_menu .= '                '
            . '<td class="' . ( (stristr($current_page, $menu_items[$i]['uri'])) ? 'navactive' : 'navnormal' ) . '">'
            . '<a href="' . $menu_items[$i]['uri'] .'"'
                . ( (isset($menu_items[$i]['tooltip']) && !empty($menu_items[$i]['tooltip'])) ? ' title="' . htmlentities($menu_items[$i]['tooltip']) . '"' : '' )
            . '>' . htmlentities($menu_items[$i]['menu']) . '</a>'
            . '</td>' . "\n"
            . ( ($i < count($menu_items) - 1) ? '                <td class="navspacer">&nbsp;</td>' . "\n" : '');

        if (stristr($current_page, $menu_items[$i]['uri'])) {
            // building browsers window title
            $win_title = 'phpMyAdmin'
                . ( (isset($menu_items[$i]['wintitle']) && !empty($menu_items[$i]['wintitle'])) ? ' &gt; ' . htmlentities($menu_items[$i]['wintitle']) : '' )
                . ' | MySQL Database Administration Tool | www.phpmyadmin.net';
            // building 'you are here:'
            $navi_info .= 'You\'re here: <a href="http://' . $_SERVER['HTTP_HOST'] . '/index.php">phpmyadmin.net</a>'
                . ( stristr($current_page, 'index') 
                    ? ' / home' 
                    : ( (isset($menu_items[$i]['wintitle']) && !empty($menu_items[$i]['wintitle'])) ? ' / <a href="' . $menu_items[$i]['uri'] . '">' . htmlentities(strtolower($menu_items[$i]['wintitle'])) . '</a>' : '' ) );
            if (isset($menu_items[$i]['subfile']) && !empty($menu_items[$i]['subfile'])) {
                if (is_array($menu_items[$i]['subfile'])) {
                    for ($j = 0; $j < count($menu_items[$i]['subfile']); $j++) {
                        if (isset($_GET[$menu_items[$i]['subfile'][$j]])) {
                            $navi_info .= ' / <a href="' . $menu_items[$i]['uri'] . '?' . $menu_items[$i]['subfile'][$j] . '">' . htmlentities(strtolower($menu_items[$i]['subpage'][$j])) . '</a>';
                            break;
                        }
                    }
                } else {
                    if (isset($_GET[$menu_items[$i]['subfile']])) {
                        $navi_info .= ' / <a href="' . $menu_items[$i]['uri'] . '?' . $menu_items[$i]['subfile'] . '">' . htmlentities(strtolower($menu_items[$i]['subpage'])) . '</a>';
                    }
                }
            }
        }

    } // end list menu_items
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $win_title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="verify-v1" content="3AM2eNj0zQ1Ao/N2eGE02S45V3p5KQxAyMIxdUJhtEQ=" />
    <meta name="description" content="Official website of the phpMyAdmin Project. phpMyAdmin is a tool written in PHP intended to handle the administration of MySQL over the web." />
    <meta name="keywords" content="phpMyAdmin, php, mysql, administration, database, tables, admin, opensource, software, demo, free, download" />
    <meta name="author" content="the phpMyAdmin Developers Team" />
    <meta name="reply-to" content="phpmyadmin-devel@lists.sourceforge.net" />
    <meta name="copyright" content="the phpMyAdmin Developers Team" />
    <meta name="revisit-after" content="15 days" />
<?php /* For Google webmaster tools, nijel */ ?>
    <meta name="verify-v1" content="3AM2eNj0zQ1Ao/N2eGE02S45V3p5KQxAyMIxdUJhtEQ=" />
    <meta name="identifier-url" content="http://www.phpmyadmin.net/" />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="alternate" type="application/rss+xml" title="RSS News" href="http://sourceforge.net/export/rss2_projnews.php?group_id=23067" />
    <script language="javascript" type="text/javascript">
    <!--
        if (self!=top) {
            parent.location.replace('<?php echo "http://" . $_SERVER["HTTP_HOST"] . basename($_SERVER["PHP_SELF"]); ?>');
        }
    //-->
    </script>
    <script language="javascript" type="text/javascript" src="./jscript/functions.js"></script>
</head>
<body bgcolor="#ffffff" text="#000000">
    <div class="container">
        <!-- pma logo and pma title -->
        <div style="width: 430px; float: left; padding-left: 5px;">
            <div style="text-align: left; font-family: Verdana, Arial, Helvetica, sans-serif;">
                <h1 style="text-align: left; padding: 0px; margin: 0px; font-size: 30px; font-weight: bold;">
                    <font style="color: #000000;">The </font>
                    <font style="color: #7584b3;">php</font><font style="color: #ffad17;">MyAdmin </font>
                    <font style="color: #000000;">Project</font>
                </h1>
                <h2 style="text-align: right; padding: 0px; margin: 0px; font-size: 20px; font-weight: normal; color: #000000;"><i>Effective MySQL Management</i></h2>
                <div style="text-align: center; padding: 2px; font-size: 10px; font-weight: normal;">BROWSER-BASED &#8226; PHP5 SUPPORT &#8226; MYSQL 4.1 AND MYSQL 5.0 SUPPORT &#8226; OPEN SOURCE</div>
            </div>
        </div>
        <div style="width: 140px; float: right;">
            <a href="index.php" name="top"><img src="images/pma_logo.gif" width="140" height="75" border="0" alt="phpMyAdmin Logo" title="The phpMyAdmin Project" /></a>
        </div>
        <div style="clear: both; text-align: center;"><img src="images/1x1blind.gif" width="1" height="5" border="0" alt="" /></div>
        <!--/ pma logo and pma title -->
        <!-- navigation bar -->
        <div class="navbar">
            <table border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
<?php echo $navi_menu; ?>
                </tr>
            </table>		
        </div>
        <div class="navinfo">
            <?php echo $navi_info; ?>
        </div>
        <!--/ navigation bar -->
<?php
    // printing banners if availabel
    require_once($import['banners']);
?>
    </div>
