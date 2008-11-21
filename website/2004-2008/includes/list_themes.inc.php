<?php
/*
    file:         includes/list_themes.inc.php
    version:      1.0
    created:      2004-01-28 by mkkeck
    updated:      2005-05-30 by mkkeck
    information:  
            - all screens should be stored in ./images/themes/
*/

$path_screens = './images/themes/';

$pma_themes = array();
$i = 0;

/** template:
  *   - $pma_themes[$i]['name']    = 'My Theme'                 // name to display theme in dl-list
  *   - $pma_themes[$i]['version'] = '1.0';                     // base version of the themes
  *   - $pma_themes[$i]['support'] = '2.6.0 - 2.6.3';           // theme can be used with pma versions
  *   - $pma_themes[$i]['infos']   = '';                        // some infos (who made, what's new)
  *   - $pma_themes[$i]['screen']  = 'my_theme.png';            // screenshot-img in ./images/themes
  *   - $pma_themes[$i]['file']    = 'uri_for_downloading';     // download path
  *   - $pma_themes[$i]['size']    = 96;                        // file size in KB
  *   - $pma_themes[$i]['date']    = mktime(0,0,0,1,25,2005);   // date, when released
  *   - $pma_themes[$i]['md5sum']  = '';                        // md5 checksum (for security)
  *   - $pma_themes[$i]['active']  = true;                      // show theme true | false
  */  

/*
$pma_themes[$i]['name']    = 'Cactica-Blues';
$pma_themes[$i]['version'] = '2.1';
$pma_themes[$i]['support'] = '2.6.4';
$pma_themes[$i]['infos']   = 'Based on the darkblue/orange, made by Tony Casparro.';
$pma_themes[$i]['screen']  = 'cactica_blues.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/cactica_blues-2.1.zip?download';
$pma_themes[$i]['size']    = 104;
$pma_themes[$i]['date']    = mktime(0,0,0,9,10,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Darkblue/Gray';
$pma_themes[$i]['version'] = '2.1';
$pma_themes[$i]['support'] = '2.6.4';
$pma_themes[$i]['infos']   = 'Based on the darkblue/orange.';
$pma_themes[$i]['screen']  = 'darkblue_gray.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/darkblue_gray-2.1.zip?download';
$pma_themes[$i]['size']    = 99;
$pma_themes[$i]['date']    = mktime(0,0,0,9,10,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'garv Blue';
$pma_themes[$i]['version'] = '1.2a';
$pma_themes[$i]['support'] = '2.6.1 - 2.6.3';
$pma_themes[$i]['infos']   = 'A theme from team member Garvin Hicking.';
$pma_themes[$i]['screen']  = 'garv_blue.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/garv_blue.zip?download';
$pma_themes[$i]['size']    = 96;
$pma_themes[$i]['date']    = mktime(0,0,0,5,30,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Win XP (basic)';
$pma_themes[$i]['version'] = '2.1';
$pma_themes[$i]['support'] = '2.6.4';
$pma_themes[$i]['infos']   = 'Based on the original-theme, made by Vladan Zirojevic.';
$pma_themes[$i]['screen']  = 'xp_basic.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xp_basic-2.1.zip?download';
$pma_themes[$i]['size']    = 99;
$pma_themes[$i]['date']    = mktime(0,0,0,9,11,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Win XP (blue)';
$pma_themes[$i]['version'] = '1.2a';
$pma_themes[$i]['support'] = '2.6.0 - 2.6.3';
$pma_themes[$i]['infos']   = 'Windows&reg; XP Luna Style, made by Michael Keck.';
$pma_themes[$i]['screen']  = 'xp_blue.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xp_blue.zip?download';
$pma_themes[$i]['size']    = 91;
$pma_themes[$i]['date']    = mktime(0,0,0,5,30,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Win XP (green)';
$pma_themes[$i]['version'] = '1.2a';
$pma_themes[$i]['support'] = '2.6.0 - 2.6.3';
$pma_themes[$i]['infos']   = 'Windows&reg; XP Green Style, made by Michael Keck.';
$pma_themes[$i]['screen']  = 'xp_green.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xp_green.zip?download';
$pma_themes[$i]['size']    = 91;
$pma_themes[$i]['date']    = mktime(0,0,0,5,30,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Win XP (silver)';
$pma_themes[$i]['version'] = '1.2a';
$pma_themes[$i]['support'] = '2.6.0 - 2.6.3';
$pma_themes[$i]['infos']   = 'Windows&reg; XP Silver Style, made by Michael Keck.';
$pma_themes[$i]['screen']  = 'xp_silver.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xp_silver.zip?download';
$pma_themes[$i]['size']    = 91;
$pma_themes[$i]['date']    = mktime(0,0,0,5,30,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Green / Orange';
$pma_themes[$i]['version'] = '2.1';
$pma_themes[$i]['support'] = '2.6.4';
$pma_themes[$i]['infos']   = 'Based on darkblue/orange made by \'ydtconcept\'.';
$pma_themes[$i]['screen']  = 'green_orange.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/green_orange-2.1.zip?download';
$pma_themes[$i]['size']    = 94;
$pma_themes[$i]['date']    = mktime(0,0,0,9,10,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;
*/

$pma_themes[$i]['name']    = 'Aqua';
$pma_themes[$i]['version'] = '2.2a';
$pma_themes[$i]['support'] = '2.7.0 - 2.8.0';
$pma_themes[$i]['infos']   = 'With crystal icons.';
$pma_themes[$i]['screen']  = 'aqua.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/aqua-2.2a.zip?download';
$pma_themes[$i]['size']    = 146;
$pma_themes[$i]['date']    = mktime(0,0,0,4,6,2006);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

/*
$pma_themes[$i]['name']    = 'Aqua Brushed';
$pma_themes[$i]['version'] = '2.1';
$pma_themes[$i]['support'] = '2.6.4';
$pma_themes[$i]['infos']   = 'With crystal icons and brushed backgrounds.';
$pma_themes[$i]['screen']  = 'aqua_brushed.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/aqua_brushed-2.1.zip?download';
$pma_themes[$i]['size']    = 165;
$pma_themes[$i]['date']    = mktime(0,0,0,9,5,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'OpenPHPNuke';
$pma_themes[$i]['version'] = '1.2a';
$pma_themes[$i]['support'] = '2.6.0 - 2.6.3';
$pma_themes[$i]['infos']   = 'Based on the Open PHP Nuke System (see: http://www.openphpnuke.info), but modified for posting here. Made by \'DigitalPixel\'.';
$pma_themes[$i]['screen']  = 'openphpnuke.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/openphpnuke.zip?download';
$pma_themes[$i]['size']    = 95;
$pma_themes[$i]['date']    = mktime(0,0,0,5,30,2005);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;
*/

$pma_themes[$i]['name']    = 'WinXP - Dirty';
$pma_themes[$i]['version'] = '2.9a';
$pma_themes[$i]['support'] = '2.6.0 - 2.9.0';
$pma_themes[$i]['infos']   = 'Original a clan-theme, but modified for posting here. Original made by \'Spockman\'.';
$pma_themes[$i]['screen']  = 'xp_dirty.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xp_dirty-2.9a.zip?download';
$pma_themes[$i]['size']    = 95;
$pma_themes[$i]['date']    = mktime(0,0,0,9,24,2006);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

/*
$pma_themes[$i]['name']    = 'Graphivore';
$pma_themes[$i]['version'] = '2.9a';
$pma_themes[$i]['support'] = '2.7.0 - 2.9.0';
$pma_themes[$i]['infos']   = 'By ydtconcept.';
$pma_themes[$i]['screen']  = 'graphivore.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/graphivore-2.9a.zip?download';
$pma_themes[$i]['size']    = 92;
$pma_themes[$i]['date']    = mktime(0,0,0,9,24,2006);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;
*/

$pma_themes[$i]['name']    = 'Grid';
$pma_themes[$i]['version'] = '2.11d';
$pma_themes[$i]['support'] = '2.8.0 - 3.0';
$pma_themes[$i]['infos']   = 'Small table margins; Fontsize & colors are set in layout.inc.php to be optimal readable and show maximum amount of data on screen. Original images are reused -> size is only 25KB.  (comments & bug reports are welcome) by Jürgen Wind';
$pma_themes[$i]['screen']  = 'grid.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/grid-2.11d.zip?download';
$pma_themes[$i]['size']    = 25;
$pma_themes[$i]['date']    = mktime(0,0,0,8,14,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Original small';
$pma_themes[$i]['version'] = '2.9';
$pma_themes[$i]['support'] = '2.9.0';
$pma_themes[$i]['infos']   = 'Original theme altered to show a maximum amount of data, by Ruben Barkow.';
$pma_themes[$i]['screen']  = 'original_small.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/original_small-2.9.zip?download';
$pma_themes[$i]['size']    = 92;
$pma_themes[$i]['date']    = mktime(0,0,0,10,14,2006);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Paradice';
$pma_themes[$i]['version'] = '3.0';
$pma_themes[$i]['support'] = '3.0.x';
$pma_themes[$i]['infos']   = 'Based on the original theme. Modification and integration of the original theme and the nuvola iconset made by David Vignoni is made by Andy Scherzinger.';
$pma_themes[$i]['screen']  = 'paradice.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/paradice-3.0.zip?download';
$pma_themes[$i]['size']    = 163;
$pma_themes[$i]['date']    = mktime(0,0,0,10,24,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Very small';
$pma_themes[$i]['version'] = '2.10a';
$pma_themes[$i]['support'] = '2.7.0 - 2.10.0';
$pma_themes[$i]['infos']   = 'Based on arctic ocean; by Ruben Barkow; modified by Akos Szots';
$pma_themes[$i]['screen']  = 'very_small.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/very_small-2.10a.zip?download';
$pma_themes[$i]['size']    = 171;
$pma_themes[$i]['date']    = mktime(0,0,0,5,4,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Silk';
$pma_themes[$i]['version'] = '2.10';
$pma_themes[$i]['support'] = '2.10.0';
$pma_themes[$i]['infos']   = '"Silk" is a smooth theme designed to be clear and easy for the eyes, based
on http://famfamfam.com/lab/icons/silk/ by Mark James which is licensed
under the http://creativecommons.org/licenses/by/2.5/
Submitted by Matthias Mailander';
$pma_themes[$i]['screen']  = 'silk.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/silk-2.10.zip?download';
$pma_themes[$i]['size']    = 147;
$pma_themes[$i]['date']    = mktime(0,0,0,5,9,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Arctic Ocean';
$pma_themes[$i]['version'] = '2.11a';
$pma_themes[$i]['support'] = '2.9 - 2.11';
$pma_themes[$i]['infos']   = 'New theme with new database icons made by Michael
Keck.';
$pma_themes[$i]['screen']  = 'arctic_ocean.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/arctic_ocean-2.11a.zip?download';
$pma_themes[$i]['size']    = 180;
$pma_themes[$i]['date']    = mktime(0,0,0,3,3,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Dark Lime';
$pma_themes[$i]['version'] = '2.10';
$pma_themes[$i]['support'] = '2.9 - 2.10';
$pma_themes[$i]['infos']   = 'A theme with black and lime colors, by GamBit.';
$pma_themes[$i]['screen']  = 'dark_lime.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/dark_lime-2.10.zip?download';
$pma_themes[$i]['size']    = 120;
$pma_themes[$i]['date']    = mktime(0,0,0,5,12,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Crimson Gray';
$pma_themes[$i]['version'] = '2.10';
$pma_themes[$i]['support'] = '2.9 - 2.10';
$pma_themes[$i]['infos']   = 'Theme based on Original by Audrius Kovalenko.';
$pma_themes[$i]['screen']  = 'crimson_gray.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/crimson_gray-2.10.zip?download';
$pma_themes[$i]['size']    = 92;
$pma_themes[$i]['date']    = mktime(0,0,0,5,16,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Pixeline';
$pma_themes[$i]['version'] = '2.10';
$pma_themes[$i]['support'] = '2.9 - 2.10';
$pma_themes[$i]['infos']   = 'By Pixeline (http://www.pixeline.be).';
$pma_themes[$i]['screen']  = 'pixeline.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/pixeline-2.10.zip?download';
$pma_themes[$i]['size']    = 114;
$pma_themes[$i]['date']    = mktime(0,0,0,5,19,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Paradice';
$pma_themes[$i]['version'] = '2.11e';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'Based on the original theme. Modification and integration of the original theme and the nuvola iconset made by David Vignoni is made by Andy Scherzinger.';
$pma_themes[$i]['screen']  = 'paradice.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/paradice-2.11e.zip?download';
$pma_themes[$i]['size']    = 166;
$pma_themes[$i]['date']    = mktime(0,0,0,5,12,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Pixeline';
$pma_themes[$i]['version'] = '2.11a';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'By Pixeline (http://www.pixeline.be).';
$pma_themes[$i]['screen']  = 'pixeline.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/pixeline-2.11a.zip?download';
$pma_themes[$i]['size']    = 114;
$pma_themes[$i]['date']    = mktime(0,0,0,10,17,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Crimson Gray';
$pma_themes[$i]['version'] = '2.11b';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'Theme based on Original by Audrius Kovalenko.';
$pma_themes[$i]['screen']  = 'crimson_gray.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/crimson_gray-2.11b.zip?download';
$pma_themes[$i]['size']    = 97;
$pma_themes[$i]['date']    = mktime(0,0,0,8,14,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Hillside';
$pma_themes[$i]['version'] = '3.0';
$pma_themes[$i]['support'] = '3.0.x';
$pma_themes[$i]['infos']   = 'Theme based on Silkline, adapted by Tim Golen.';
$pma_themes[$i]['screen']  = 'hillside.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/hillside-3.0.zip?download';
$pma_themes[$i]['size']    = 219;
$pma_themes[$i]['date']    = mktime(0,0,0,10,25,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Hillside';
$pma_themes[$i]['version'] = '2.11';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'Theme based on Silkline, adapted by Tim Golen.';
$pma_themes[$i]['screen']  = 'hillside.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/hillside-2.11.zip?download';
$pma_themes[$i]['size']    = 167;
$pma_themes[$i]['date']    = mktime(0,0,0,8,16,2008);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'Silkline';
$pma_themes[$i]['version'] = '2.11';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'Theme based on themes Silk and Pixeline';
$pma_themes[$i]['screen']  = 'silkline.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/silkline-2.11.zip?download';
$pma_themes[$i]['size']    = 170;
$pma_themes[$i]['date']    = mktime(0,0,0,10,9,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$pma_themes[$i]['name']    = 'XAMPP (Apachefriends.org)';
$pma_themes[$i]['version'] = '2.11';
$pma_themes[$i]['support'] = '2.11';
$pma_themes[$i]['infos']   = 'This theme was built for the XAMPP-Project by Michael Keck.';
$pma_themes[$i]['screen']  = 'xampp.png';
$pma_themes[$i]['file']    = 'http://prdownloads.sourceforge.net/phpmyadmin/xampp-2.11.zip?download';
$pma_themes[$i]['size']    = 153;
$pma_themes[$i]['date']    = mktime(0,0,0,11,28,2007);
$pma_themes[$i]['md5sum']  = '';
$pma_themes[$i]['active']  = true;
$i++;

$num_themes = $i;

unset($i);

?>
