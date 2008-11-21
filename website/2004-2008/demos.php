<?php
    $modif_by = 'swix';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
?>
    <div class="container">
<?php
        echo renderBoxHeader(760, 'DEMOS', '', '');
?>
<!-- left boxes -->
        <div style="padding-left: 15px; width: 320px; float: left;">
            <h1>Demos run by Michal Čihař</h1>
            <ul class="list">
                <li><b><a href="http://pma.cihar.com/">Demos overview</a></b></li>
                <li><b><a href="http://pma.cihar.com/trunk">Latest development version</a></b></li>
                <li><b><a href="http://pma.cihar.com/TESTING">Latest released testing version</a></b></li>
                <li><b><a href="http://pma.cihar.com/STABLE">Latest released stable version</a></b></li>
            </ul>
            <p>Note: You have full control over MySQL server here. Log in as root without password.</p>
        </div>
<!--/ left boxes -->
        <div style="clear: both;">&nbsp;</div>
<?php
    echo renderBoxFooter(760, '', '', '', '', FALSE);
?>
    </div>
<?php
    require_once($import['footer']);
?>
