<?php
    $modif_by = 'swix';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
?>
    <div class="container">
<?php
        echo renderBoxHeader(760, 'FEEDBACK', '', '');
?>
<!-- left boxes -->
        <div style="padding-left: 15px; width: 320px; float: left;">
            <h1>Forum / IRC</h1>
            <ul class="list">
               <li><b><a href="http://sourceforge.net/forum/forum.php?forum_id=72909">Help Forum</a></b></li>
               <!--   <li><a href="http://sourceforge.net/forum/forum.php?forum_id=72908">Open Discussion Forum</a></li> -->
               <li><a href="http://sourceforge.net/forum/forum.php?forum_id=296543">Forum d'aide (en français)</a></li>
               <li><a href="http://sourceforge.net/forum/forum.php?forum_id=297172">Anwenderforum (auf Deutsch)</a></li>
               <li><a href="http://sourceforge.net/mail/?group_id=<?php echo $sf_group_id; ?>">Mailing Lists (news/users/devel/translators)</a></li>
               <li>IRC: #phpmyadmin on <a href="http://freenode.net/"><b>irc.freenode.net</b></a></li>
            </ul>
        </div>
<!--/ left boxes -->
<!-- right boxes -->
        <div style="padding-right: 15px; width: 320px; float: right;">
            <h1>Trackers:</h1>
            <ul class="list">
                <li><a href="http://sourceforge.net/tracker/?atid=377408&amp;group_id=<?php echo $sf_group_id; ?>">Bugs</a></li>
                <li><a href="http://sourceforge.net/tracker/?atid=377411&amp;group_id=<?php echo $sf_group_id; ?>">Feature requests</a></li>
                <li><a href="http://sourceforge.net/tracker/?atid=377410&amp;group_id=<?php echo $sf_group_id; ?>">Patches</a></li>
                <li><a href="http://sourceforge.net/tracker/?atid=689412&amp;group_id=<?php echo $sf_group_id; ?>">Themes</a></li>
                <li><a href="http://sourceforge.net/tracker/?atid=387645&amp;group_id=<?php echo $sf_group_id; ?>">Translations</a></li>
                <li><a href="http://sourceforge.net/tracker/?atid=377409&amp;group_id=<?php echo $sf_group_id; ?>">Support requests</a></li>
            </ul>
        </div>
        <div style="clear: both;">&nbsp;</div>
<?php
    echo renderBoxFooter(760, '', '', '', '', FALSE);
?>
    </div>
<?php
    require_once($import['footer']);
?>
