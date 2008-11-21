<?php
    $modif_by = 'lem9';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 650px; float: left;">
<?php
    echo renderBoxHeader(650, 'GoPHP5', 'http://gophp5.org', '_blank');
    echo 'The phpMyAdmin project is a member of the GoPHP5 initiative. Starting February 5, 2008, we will accept PHP 5.2 features into our codebase and our new feature releases will no longer provide support for older PHP versions.'; 
    echo '<a href="http://gophp5.org"><img src="images/goPHP5_100x33.png" border="0" alt="goPHP5 logo" /></a>';
    echo renderBoxFooter(650, 'http://gophp5.org', '_blank', '... more', '... about GoPHP5', TRUE);
?>
        </div>
<?php
    require_once($import['footer']);
?>
