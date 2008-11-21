<?php

    $modif_by = 'mkkeck';

    require_once("./includes/config.inc.php");
    require_once($import['header']);
    require_once($import['files']);
    require_once($import['release']);
    require_once($import['themes']);

?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php


    // themes
    echo renderBoxHeader(250, 'INFORMATIONS', '', '');
?>
    <b>phpMyAdmin</b> supports themes since version 2.6.0. On this page you can download themes. <br />
    <hr noshade="noshade" size="1" class="yellow" />
    <span class="version">Note:</span> <br />Only themes on this page or on the 
    <b><a href="http://sourceforge.net/projects/phpmyadmin/">sf.net download page</a></b> 
    are secure to use with phpMyAdmin. <span style="color: #cc0000">You should not use themes from any other page.</span>
    <hr noshade="noshade" size="1" class="yellow" />
    <span class="version">Installation:</span> <br />Unzip your downloaded theme into the directory <b>/themes/</b> of your PMA. 
    When you open phpMyAdmin, you should be able to select the theme. 
    Please read the <b><a href="http://www.phpmyadmin.net/documentation/#faqthemes">documentation</a></b>.
    <hr noshade="noshade" size="1" class="yellow" />
    <span class="version">Demos of themes:</span> <br />You can try the themes on <a href="http://pma.cihar.com">Michal's demo server</a>. 
<?php
    echo renderBoxFooter(250, '', '', '', '', TRUE);

    // themes
    echo renderBoxHeader(250, 'SUBMIT A THEME', '', '');
?>
    You've made a new theme and you want to share it?<br />
    Please use our theme tracker on sourceforge.net to post your theme. The team will check and prepare your theme for downloading here. 
<?php
    echo renderBoxFooter(250, 'http://sourceforge.net/tracker/?atid=689412&group_id=' . $sf_group_id . '&ampfunc=browse', '_blank', 'post your theme', '', TRUE);

    // quick downloads
    echo renderBoxHeader(250, 'PMA - QUICK DOWNLOADS', 'downloads.php', '_self');
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
    echo renderBoxFooter(250, 'downloads.php', '_self', '...more', '... downloads', FALSE);

?>

        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php
    function sort_themes($datas,$order='asc') {
        if ($order=='desc') {
            @arsort($datas);
            @reset($datas);
        } else {
            @asort($datas);
            @reset($datas);
        }
        while (list ($key, $val) = each ($datas)) {
            $index[] = $key;
        }
        return $index;
    }
        
    $order = 'desc';
    $sort  = 'date';
    if (isset($_POST['sort']))
        $sort = $_POST['sort'];
    if (isset($_POST['order']))
        $order = $_POST['order'];

    switch ($sort) {
        case 'name':
            for ($i=0; $i<$num_themes; $i++) {
                if ($pma_themes[$i]['active'] == 'yes') {
                    $datas[] = strtoupper($pma_themes[$i]['name']) . '-' . date('Ymd', $pma_themes[$i]['date']);
                }
            }
            $datas = sort_themes($datas, $order);
        break;
        case 'date':
            for ($i=0; $i<$num_themes; $i++) {
                if ($pma_themes[$i]['active'] == 'yes') {
                    $datas[] = date('Ymd', $pma_themes[$i]['date']) . '-' . strtoupper($pma_themes[$i]['name']);
                }
            }
            $datas = sort_themes($datas, $order);
        break;
        case 'size':
            for ($i=0; $i<$num_themes; $i++) {
                if ($pma_themes[$i]['active'] == 'yes') {
                    $datas[] = sprintf("%05s", $pma_themes[$i]['size']) . '-' . strtoupper($pma_themes[$i]['name']);
                }
            }
            $datas = sort_themes($datas, $order);
        break;
    }


    $pos   = 0;
    $ppos  = 0;
    $pmax  = 5;
    $pages = 1;

    if (isset($_GET['pos']) || isset($_POST['pos']))
        $pos = (isset($_POST['pos']) ? $_POST['pos'] : $_GET['pos']);

    if (isset($_GET['ppos']) || isset($_POST['ppos']))
        $ppos = (isset($_POST['ppos']) ? $_POST['ppos'] : $_GET['ppos']);

    if (isset($_GET['pmax']) || isset($_POST['pmax']))
        $pmax = (isset($_POST['pmax']) ? $_POST['pmax'] : $_GET['pmax']);

    if (count($datas)>$pmax) {
        $pages=@intval(count($datas)/$pmax);
        if(count($datas)%$pmax)
            $pages++;
    }

    if (isset($ppos) && ($ppos > $pages)) { $ppos = $pages;         }
    if (isset($ppos) && ($ppos < 0))      { $ppos = 0;              }
    if (isset($ppos) && $ppos!=0)         { $pos = ($ppos-1)*$pmax; }
    if ($pos > 0) {
        $bwd = $pos-$pmax;
        if ($bwd < 0) { $bwd = 0; }
    } else {
        $bwd = $pos+(($pages-1)*$pmax);
    }
    $cpos=@($pos/$pmax)+1;
    $page_counter = (($pages > 1) ? TRUE : FALSE);
    if ($pos < count($datas)-$pmax) { $fwd=$pos+$pmax;	} else { $fwd=0; }
    echo renderBoxHeader(500, 'THEMES - DOWNLOAD', '', '');
?>
            <div align="center">
            <table border="0" cellpadding="1" cellspacing="0" align="center">
                <tr>
                    <form name="sort" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">Sort by</td>
                        <td>
                            <select name="sort" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" onchange="if(this.value=='date'){ document.forms['sort'].elements['order'].value='desc'; }else{ document.forms['sort'].elements['order'].value='asc'; }">
                                <option value="date"<?php echo (($sort=='date') ? ' selected="selected"' : ''); ?>>date</option>
                                <option value="name"<?php echo (($sort=='name') ? ' selected="selected"' : ''); ?>>name</option>
                                <option value="size"<?php echo (($sort=='size') ? ' selected="selected"' : ''); ?>>size</option>
                            </select>
                        </td>
                        <td>
                            <select name="order" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">
                                <option value="asc"<?php echo (($order=='asc') ? ' selected="selected"' : ''); ?>>asc.</option>
                                <option value="desc"<?php echo (($order=='desc') ? ' selected="selected"' : ''); ?>>desc.</option>
                            </select>
                        </td>
<?php
    if (count($datas) > 5) {
?>
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">&nbsp;&nbsp;show</td>
                        <td>
                            <select name="pmax" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">
                                <option value="5"<?php echo (($pmax=='5') ? ' selected="selected"' : ''); ?>>5</option>
<?php
        if (count($datas) > 5) {
?>
                                <option value="10"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>10</option>
<?php
        }
        if (count($datas) > 10) {
?>
                                <option value="25"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>25</option>
<?php
        }
        if (count($datas) > 25) {
?>
                                <option value="50"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>50</option>
<?php
        }
?>
                            </select>
                        </td>
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">themes&nbsp;</td>
<?php
    }
?>
                        <td>
                            <input type="submit" name="submit" value="ok" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" />
                        </td>
                    </form>
<?php
    if ($page_counter == TRUE) {
?>
                    <form name="goback" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" name="pos" value="<?php echo $bwd; ?>" />
                            <input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />
                            <input type="hidden" name="order" value="<?php echo $order; ?>" />
                            <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
                            <input type="submit" name="submit" value="&lt;" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" title="previous" />
                        </td>
                    </form>
<script language="javascript" type="text/javascript">
<!--
    var str = ''
        + '<form name="gopage" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">page</td>'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">'
        + '<input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />'
        + '<input type="hidden" name="order" value="<?php echo $order; ?>" />'
        + '<input type="hidden" name="sort" value="<?php echo $sort; ?>" />'
        + '<select name="ppos" onchange="this.form.submit();" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">'
<?php
        for ($j=1; $j < ($pages+1); $j++) {
            echo '        + \'<option value="' . $j . '"' . (($j == $cpos) ? ' selected="selected"' : '') . '>' . $j . '</option>\'' . "\n";
        }
?>
        + '</select>'
        + '</td>'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap"> of <?php echo $pages; ?></td>'
        + '</form>'
    document.write(str);
//-->
</script>
<noscript>
                       <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">
                       <?php echo $cpos . ' of ' . $pages; ?>
                        </td>
</noscript>
                    <form name="gonext" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td>
                            <input type="hidden" name="pos" value="<?php echo $fwd; ?>" />
                            <input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />
                            <input type="hidden" name="order" value="<?php echo $order; ?>" />
                            <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
                            <input type="submit" name="submit" value="&gt;" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" title="next" />
                        </td>
                    </form>
<?php
    }
?>
                </tr>
            </table>
            <hr noshade="noshade" size="1" class="yellow" />
            <table border="0" cellpadding="0" cellspacing="0" width="486">
<?php
    $num_max = ($pos+$pmax);
    if ($num_max > count($datas))
        $num_max = count($datas);
    for ($i = $pos; $i < $num_max; $i++) {
        $screen_shot = ($pma_themes[$datas[$i]]['screen']!='') ? $path_screens . $pma_themes[$datas[$i]]['screen'] : '';
        echo '                <tr><td colspan="2">&nbsp;</td></tr>' . "\n";
        echo '                <tr>' . "\n"
           . '                    <td class="content" valign="top" align="left">' . "\n"
           . '                        <h2><a href="' . $pma_themes[$datas[$i]]['file'] . '" title="download ' . $pma_themes[$datas[$i]]['name'] . '">'
           . $pma_themes[$datas[$i]]['name'] . '</a></h2>' . "\n"
           . '                        <div style="border-bottom: 1px solid #7584b3;"><img src="./images/1x1blind.gif" border="0" width="1" height="3" alt="" /></div>' . "\n"
           . '                        <div><img src="./images/1x1blind.gif" border="0" width="1" height="2" alt="" /></div>' . "\n"
           . '                        <div>Date: <b>' . date('Y-m-d', $pma_themes[$datas[$i]]['date']) . '</b>, Filesize: <b>' . number_format($pma_themes[$datas[$i]]['size'],0,',','.') . ' kb</b></div>' . "\n"
           . '                        <div>PMA-Version: <b>' . $pma_themes[$datas[$i]]['support'] . '</b></div>' . "\n"
           . '                        <div><img src="./images/1x1blind.gif" border="0" width="1" height="5" alt="" /></div>' . "\n"
           . ( (isset($pma_themes[$datas[$i]]['infos']) && $pma_themes[$datas[$i]]['infos']!='') 
                   ? '                        <div style="padding-right: 5px;">' . $pma_themes[$datas[$i]]['infos'] . '</div>' . "\n"
                   . '                        <div><img src="./images/1x1blind.gif" border="0" width="1" height="5" alt="" /></div>' . "\n"
                   : ''
             )
           . '                        <div class="gotopage"><b><a href="' . $pma_themes[$datas[$i]]['file'] . '" title="download ' . $pma_themes[$datas[$i]]['name'] . '">download</a></b></div>' . "\n"
           . ( (isset($pma_themes[$datas[$i]]['md5sum']) && $pma_themes[$datas[$i]]['md5sum']!='')
                   ? '                        <div><img src="./images/1x1blind.gif" border="0" width="1" height="3" alt="" /></div>' . "\n"
                   . '                        <div title="MD5 checksum" style="color: #666666; font-size: 10px;">MD5: <code style="color: #666666; font-size: 11px;">' . $pma_themes[$datas[$i]]['md5sum'] . '</code></div>' . "\n"
                   : ''
             )
           . '                    </td>' . "\n"
           . '                    <td class="content" width="227" valign="top" align="left"><div style="border: 1px solid #7584b3; width: 227px; height: 132px;"><div style="border: 1px solid #ffffff; width: 225px; height: 130px; overflow: hidden;" onfocus="this.blur();">'
           . ( (@file_exists($screen_shot) && $screen_shot!='')
                ? '<a href="' . $screen_shot . '" target="pmadocs" onclick="pmaScreen(this.href,\'' . preg_replace("/'/", "\'", strtoupper($pma_themes[$datas[$i]]['name'])) . '\',\'' . $pma_themes[$datas[$i]]['file'] . '\');return false;" onfocus="this.blur();">'
                . '<img src="' . $screen_shot . '" width="450" height="260" border="0" alt="screen" title="click to enlarge" /></a>'
                : '<img src="./images/noscreen.png" width="225" height="130" border="0" alt="no image" title="no image" />'
             ) 
           . '</div></div></td>' . "\n"
           . '                </tr>' . "\n";
    }
    echo '                <tr><td colspan="2">&nbsp;</td></tr>' . "\n";
?>
            </table>
            <hr noshade="noshade" size="1" class="yellow" />
            <table border="0" cellpadding="1" cellspacing="0" align="center">
                <tr>
                    <form name="sort2" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">Sort by</td>
                        <td>
                            <select name="sort" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" onchange="if(this.value=='date'){ document.forms['sort2'].elements['order'].value='desc'; }else{ document.forms['sort2'].elements['order'].value='asc'; }">
                                <option value="date"<?php echo (($sort=='date') ? ' selected="selected"' : ''); ?>>date</option>
                                <option value="name"<?php echo (($sort=='name') ? ' selected="selected"' : ''); ?>>name</option>
                                <option value="size"<?php echo (($sort=='size') ? ' selected="selected"' : ''); ?>>size</option>
                            </select>
                        </td>
                        <td>
                            <select name="order" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">
                                <option value="asc"<?php echo (($order=='asc') ? ' selected="selected"' : ''); ?>>asc.</option>
                                <option value="desc"<?php echo (($order=='desc') ? ' selected="selected"' : ''); ?>>desc.</option>
                            </select>
                        </td>
<?php
    if (count($datas) > 5) {
?>
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">&nbsp;&nbsp;show</td>
                        <td>
                            <select name="pmax" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">
                                <option value="5"<?php echo (($pmax=='5') ? ' selected="selected"' : ''); ?>>5</option>
<?php
        if (count($datas) > 5) {
?>
                                <option value="10"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>10</option>
<?php
        }
        if (count($datas) > 10) {
?>
                                <option value="25"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>25</option>
<?php
        }
        if (count($datas) > 25) {
?>
                                <option value="50"<?php echo (($pmax=='10') ? ' selected="selected"' : ''); ?>>50</option>
<?php
        }
?>
                            </select>
                        </td>
                        <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">themes&nbsp;</td>
<?php
    }
?>
                        <td>
                            <input type="submit" name="submit" value="ok" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" />
                        </td>
                    </form>
<?php
    if ($page_counter == TRUE) {
?>
                    <form name="goback2" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td>&nbsp;</td>
                        <td>
                            <input type="hidden" name="pos" value="<?php echo $bwd; ?>" />
                            <input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />
                            <input type="hidden" name="order" value="<?php echo $order; ?>" />
                            <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
                            <input type="submit" name="submit" value="&lt;" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" title="previous" />
                        </td>
                    </form>
<script language="javascript" type="text/javascript">
<!--
    var str = ''
        + '<form name="gopage2" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">page</td>'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">'
        + '<input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />'
        + '<input type="hidden" name="order" value="<?php echo $order; ?>" />'
        + '<input type="hidden" name="sort" value="<?php echo $sort; ?>" />'
        + '<select name="ppos" onchange="this.form.submit();" style="font-family: Arial, Verdana, sans-serif; font-size: 10px;">'
<?php
        for ($j=1; $j < ($pages+1); $j++) {
            echo '        + \'<option value="' . $j . '"' . (($j == $cpos) ? ' selected="selected"' : '') . '>' . $j . '</option>\'' . "\n";
        }
?>
        + '</select>'
        + '</td>'
        + '<td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap"> of <?php echo $pages; ?></td>'
        + '</form>'
    document.write(str);
//-->
</script>
<noscript>
                       <td style="font-family: Arial, Verdana, sans-serif; font-size: 10px;" nowrap="nowrap">
                       <?php echo $cpos . ' of ' . $pages; ?>
                        </td>
</noscript>
                    <form name="gonext2" method="post" action="<?php echo basename($_SERVER['PHP_SELF']) . (($_SERVER['QUERY_STRING']!='') ? '?' . $_SERVER['QUERY_STRING'] : ''); ?>" style="padding: 0px; margin: 0px;">
                        <td>
                            <input type="hidden" name="pos" value="<?php echo $fwd; ?>" />
                            <input type="hidden" name="pmax" value="<?php echo $pmax; ?>" />
                            <input type="hidden" name="order" value="<?php echo $order; ?>" />
                            <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
                            <input type="submit" name="submit" value="&gt;" style="font-family: Arial, Verdana, sans-serif; font-size: 10px; width: 20px;" title="next" />
                        </td>
                    </form>
<?php
    }
?>
                </tr>
            </table>
            </div>
<?php
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
<!--/ right big boxes -->
    </div>
<?php
    if ($we_must_import == TRUE) {
        require_once($import['footer']);
    }
?>
