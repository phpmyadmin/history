<?php
    $modif_by = 'lem9';

    require_once("./includes/config.inc.php");
    require_once($import['header']);

    $pmaAwardsDetail = array();
    $i=0;
    $pmaAwardsDetail[$i]['title']   = '2003 PHP International Conference';
    $pmaAwardsDetail[$i]['image']   = './images/awards/2003-php-conf.jpg';
    $pmaAwardsDetail[$i]['content'] = 'Alexander Turek and Garvin Hicking receiving the award in the name of the phpMyAdmin development team.';
    $i++;
    $pmaAwardsDetail[$i]['title']   = '2006 Trophees du Libre';
    $pmaAwardsDetail[$i]['image']   = './images/awards/2006-trophees-marc.jpg';
    $pmaAwardsDetail[$i]['content'] = 'Marc Delisle (right) receiving the award in the name of the phpMyAdmin development team.';
    $i++;
    // more pmaAwardsDetails .....
    unset($i);

?>
    <div class="container">
<?php
    if (!isset($_GET['picture']) || !isset($pmaAwardsDetail[$_GET['picture']]['image'])) {
        echo renderBoxHeader(760, 'PROJECT AWARDS', '', '');
?>
        <div style="width: 290px; float: left;">
            <a href="http://www.infoworld.com/slideshow/2008/08/171-best_of_open_so-5.html"><img src="./images/awards/infoworld-bossie-2008.jpg" width="194" height="145" border="0" alt="InfoWorld 2008 Best of Open Source Awards" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>Our project has won this <a href="http://www.infoworld.com/slideshow/2008/08/171-best_of_open_so-5.html">Infoworld 2008 award:</a></p>
	<h1>Best of open source platforms and middleware (MySQL administration)</h1>
        </div>

        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>

        <div style="width: 290px; float: left;">
            <a href="http://sourceforge.net/community/index.php/landing-pages/cca08"><img src="./images/awards/sf_cca_2008_winner.png" width="234" height="60" border="0" alt="2008 SourceForge.net Community Choice Awards" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>For the <a href="http://sourceforge.net/community/index.php/landing-pages/cca08">2008 SourceForge.net Community Choice Awards</a>, phpMyAdmin was present in three categories:</p>
            <h1>Best Tool or Utility for Developers (finalist)</h1>
            <h1>Best Tool or Utility for SysAdmins (winner)</h1>
            <h1>Most Likely to Be the Next $1B Acquisition (winner)</h1>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>

        <div style="width: 290px; float: left;">
            <a href="http://sourceforge.net/community/index.php/landing-pages/cca07"><img src="./images/awards/sf_cca_2007_sysadmin.gif" width="200" height="45" border="0" alt="2007 SourceForge.net Community Choice Awards" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>For the <a href="http://sourceforge.net/community/index.php/landing-pages/cca07">2007 SourceForge.net Community Choice Awards</a>, phpMyAdmin was present in two categories:</p>
            <h1>Best Tool or Utility for Developers (nominated)</h1>
            <h1>Best Tool or Utility for SysAdmins (winner)</h1>
        </div>

        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <a href="http://www.tropheesdulibre.org"><img src="./images/awards/2006-trophees-logo.png" width="227" height="142" border="0" alt="2006 Trophees du Libre" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>phpMyAdmin has won a Silver Trophy at the Third <a href="http://www.tropheesdulibre.org">Trophees du Libre</a> (Free Software Awards) in the category</p>
            <h1>PHP</h1>
            <p>Here is a <span class="gotopage"><b><a href="awards.php?picture=1">photo</a></b></span> from the Awards ceremony.</p>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <a href="http://www.os2world.com/cgi-bin/news/viewnews.cgi?category=29&id=1145794857"><img src="./images/awards/2005-os2world.png" width="120" height="90" border="0" alt="2005 OS2World.com Awards" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>For the <a href="http://www.os2world.com/cgi-bin/news/viewnews.cgi?category=29&id=1145794857">5th Annual OS/2 World Awards</a>, phpMyAdmin won in the category</p>
            <h1>Best PHP Application</h1>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <a href="http://sourceforge.net/community/index.php/cca06"><img src="./images/awards/sf_cca_2006_winner.png" width="160" height="160" border="0" alt="2006 SourceForge.net Community Choice Awards" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>For the first annual SourceForge.net <a href="http://sourceforge.net/community/index.php/cca06">Community Choice Awards</a>, phpMyAdmin won the first place in two categories:</p>
            <h1>Databases</h1>
            <h1>Sysadmin</h1>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>

        <div style="width: 290px; float: left;">
            <a href="http://www.phpmagazin.de/itr/service/psecom,id,304,nodeid,64.html"><img src="./images/awards/2006-phpmag-ger.png" width="140" height="173" border="0" alt="PHP Magazin Reader's Choice Award 2006" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>phpMyAdmin was awarded the Reader's Choice Award 2006 in the category</p>
            <h1>Best PHP-Tool / Best PHP-Application</h1>
            <p>by the readers of the <a href="http://www.phpmagazin.de/itr/service/psecom,id,304,nodeid,64.html">German PHP Magazin</a>.</p>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <a href="http://www.phpmagazin.de/umfrage2005"><img src="./images/awards/2005-phpmag-ger.gif" width="165" height="164" border="0" alt="PHP Magazin Reader's Choice Award 2005" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>phpMyAdmin was awarded the Reader's Choice Award 2005 in the category</p>
            <h1>Best PHP-Tool / Best PHP-Application</h1>
            <p>by the readers of the <a href="http://www.phpmagazin.de/umfrage2005">German PHP Magazin</a>.</p>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <img src="./images/awards/2003-phpmag-int.gif" width="124" height="164" border="0" alt="International PHP Magazine Reader's Choice Award 2003" />
            <a href="http://www.php-mag.de/itr/service/show.php3?id=109&amp;nodeid=64"><img src="./images/awards/2003-phpmag-ger.gif" width="124" height="164" border="0" alt="PHP Magazin Reader's Choice Award 2003" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>phpMyAdmin was awarded the Reader's Choice Award 2003 in the category</p>
            <h1>Best PHP-Tool / Best PHP-Application</h1>
            <p>by the readers of the <a href="http://www.php-mag.de/itr/service/show.php3?id=109&amp;nodeid=64">German PHP Magazin</a>
            as well as those of the International PHP Magazine.<br />
            You can see a <span class="gotopage"><b><a href="awards.php?picture=0">photo</a></b></span> from the Awards ceremony at the 2003 PHP International Conference.</p>
        </div>
        <div style="clear: both;"><hr noshade="noshade" size="1" class="yellow" /></div>
        <div style="width: 290px; float: left;">
            <a href="http://sourceforge.net/potm/potm-2002-12.php"><img src="./images/awards/2002-12-sfnet-potm.png" width="288" height="109" border="0" alt="Project of the month logo" /></a>
        </div>
        <div style="width: 450px; float: right;">
            <p>phpMyAdmin was awarded <a href="http://sourceforge.net">Sourceforge.net</a>'s</p>
            <h1><a href="http://sourceforge.net/potm/potm-2002-12.php">Project of the month</a></h1>
            <p>in December 2002. Have a look at that <span class="gotopage"><b><a href="http://sourceforge.net/potm/potm-2002-12.php">article</a></b></span>, if you want to learn about the early years of phpMyAdmin.</p>
        </div>
        <div style="clear: both;"></div>
<?php
        echo renderBoxFooter(760, '', '', '', '', FALSE);
    } // end !_GET[picture]
    else {
        $img_size = getimagesize($pmaAwardsDetail[$_GET['picture']]['image']);
        echo renderBoxHeader(760, 'PROJECT AWARDS / ' . $pmaAwardsDetail[$_GET['picture']]['title'], '', '');
        echo '<div align="center">'
           . '<img src="' . $pmaAwardsDetail[$_GET['picture']]['image'] . '" width="' . $img_size[0] . '" height="' . $img_size[1] . '" border="0" vspace="5" alt="' . $pmaAwardsDetail[$_GET['picture']]['title'] . '" />'
           . '<br />' . $pmaAwardsDetail[$_GET['picture']]['content']
           . '</div>';
        echo renderBoxFooter(760, basename($_SERVER['PHP_SELF']), '_self', 'back', '... to the previous page', FALSE);
    }
?>
    </div>
<?php
    require_once($import['footer']);
?>
