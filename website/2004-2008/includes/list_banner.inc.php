<?php
/* 
    file:     includes/list_banners.inc.php
    version:  1.0
    created:  2004-12-30 by mkkeck
    updated:  2004-01-02 by mkkeck

    template:
    array field                   value                            field type
    -------------------------------------------------------------------------
    $pmaBanners[$i]['goto_uri'] = 'http://server.com';             [string]
    $pmaBanners[$i]['img_uri']  = 'http://server.com/image.ext';   [string]
    $pmaBanners[$i]['tooltip']  = 'This is a banner';              [string]
    $pmaBanners[$i]['width']    = 468;                             [integer]
    $pmaBanners[$i]['height']   = 48;                              [integer]
*/

// banners
    $pmaBanners = array();
    $i = 0; // start counter

/*    $pmaBanners[$i]['goto_uri'] = 'http://www.mysqluc.com';
    $pmaBanners[$i]['img_uri']  = './images/banners/mysqluc2008_489x81.jpg';
    $pmaBanners[$i]['tooltip']  = 'Come visit us at the DotOrg Pavilion!';
    $pmaBanners[$i]['width']    = 489;
    $pmaBanners[$i]['height']   = 81;
    $i++;
*/
/*
    $pmaBanners[$i]['goto_uri'] = 'http://www.hackontest.org';
    $pmaBanners[$i]['img_uri']  = './images/banners/HackontestBanner_468x60-02.jpg';
    $pmaBanners[$i]['tooltip']  = 'Vote for new phpMyAdmin features!';
    $pmaBanners[$i]['width']    = 468;
    $pmaBanners[$i]['height']   = 60;
    $i++;
*/
/*
    $pmaBanners[$i]['goto_uri'] = 'http://sourceforge.net/community/cca08-vote?group_id=23067';
    $pmaBanners[$i]['img_uri']  = './images/banners/cca08_finalist_234x60.png';
    $pmaBanners[$i]['tooltip']  = 'phpMyAdmin is finalist in 3 categories!';
    $pmaBanners[$i]['width']    = 230;
    $pmaBanners[$i]['height']   = 60;
    $i++;
*/
/*    $pmaBanners[$i]['goto_uri'] = 'http://www.phpmyadmin.net/gophp5';
    $pmaBanners[$i]['img_uri']  = './images/banners/goPHP5-283x100.png';
    $pmaBanners[$i]['tooltip']  = 'The GoPHP5 initiative';
    $pmaBanners[$i]['width']    = 283;
    $pmaBanners[$i]['height']   = 100;
    $i++;
*/
// we should unset the counter
    unset($i);

// output
    if (count($pmaBanners) > 0) { // if we have a banners then print them
        $banner_id = rand(0, count($pmaBanners) - 1);
        echo '<!-- banners -->' . "\n";
        echo '    <div align="center">' . "\n"
            . '        <a href="' . $pmaBanners[$banner_id]['goto_uri'] . '">'
            . '<img src="' . $pmaBanners[$banner_id]['img_uri'] . '"'
            . ' width="' . $pmaBanners[$banner_id]['width'] . '" height="' . $pmaBanners[$banner_id]['height'] . '" border="1" class="imgborder" vspace="10"'
            . ' alt="' . htmlentities($pmaBanners[$banner_id]['tooltip']) . '" title="' . htmlentities($pmaBanners[$banner_id]['tooltip']) . '" />'
            . '</a>' . "\n"
            . '    </div>' . "\n";
        echo '<!--/ banners -->' . "\n";
    } else { // else print the spacer (it's needed to move the content down form the navibar)
        echo '<div><img src="images/1x1blind.gif" width="1" height="5" border="0" alt="" /></div>' . "\n";
    }

?>
