<?php
    $modif_by = 'lem9';
    require_once("./includes/config.inc.php");
    require_once($import['header']);
    if (!isset($_GET['books'])) {
?>
    <div class="container">
<!-- left small boxes -->
        <div style="width: 250px; float: left;">
<?php
    // books
    echo renderBoxHeader(250, 'BOOKS', 'docs.php?books', '_self');
    echo $pmaBooks;
    echo renderBoxFooter(250, 'docs.php?books', '_self', '... more', '... about the PMA-Books', TRUE);
    // translations 
    echo renderBoxHeader(250, 'TRANSLATIONS', '', '');
    echo 'All the interface\'s translations are included when you download phpMyAdmin.';
    echo renderBoxFooter(250, '', '', '', '', TRUE);
    // mysql_docu
    echo renderBoxHeader(250, 'MySQL-MANUAL', 'http://www.mysql.com/', '_blank');
?>
    Visit the official MySQL website for downloading MySQL and reading the MySQL-Manual.
<?php
    echo renderBoxFooter(250, 'http://www.mysql.com/', '_blank', '... more', '... visit www.mysql.com', TRUE);
?>
        </div>
<!--/ left small boxes -->
<!-- right big boxes -->
        <div style="width: 500px; float: right;">
<?php
    echo renderBoxHeader(500, 'DOCUMENTATION', '', '');
?>
            <ul class="list">
                <li><b><a href="http://www.phpmyadmin.net/documentation/">Main documentation</a></b> (from the development version)</li>
                <li><b><a href="http://wiki.cihar.com/">Official phpMyAdmin wiki</a></b></li>
                <li><a href="http://www.phpmyadmin.net/documentation/#faq">Frequently Asked Questions</a></li>
                <li><a href="http://www.phpmyadmin.net/documentation/changelog.php">ChangeLog</a></li>
                <li><b>Localized documentation</b>
                    <ul>
                        <li><a href="http://www.phpmyadmin.net/pma_localized_docs/Documentation-pl-2.5.2-pl1-1.html">Polish</a></li>
                        <li><a href="http://www.phpmyadmin.net/pma_localized_docs/Documentation-it.html">Italian (partial)</a></li>
                        <li><a href="http://www.phpmyadmin.net/pma_localized_docs/fr">French</a></li>
                        <li><a href="http://www.phpmyadmin.net/pma_localized_docs/Documentation_ja.html">Japanese</a></li>
                   </ul>
                </li>
            </ul>
<?php
    echo renderBoxFooter(500, '', '', '', '', TRUE);

    echo renderBoxHeader(500, 'TUTORIALS &amp; ARTICLES', '', '');
?>
            <ul class="list">
                <li><a href="http://www.ohloh.net/projects/3344">phpMyAdmin at ohloh (Open Source Directory)</a></li>
                <li><a href="http://www.phparch.com/webcasts/recordings/recording.php?ID=2">Webcast recording (2006-02-03)</a></li>
                <li><a href="http://php-myadmin.ru">php-myadmin.ru: Russian site dedicated to phpMyAdmin</a></li>
                <li><a href="http://phpmyadmin.cz">phpmyadmin.cz: Czech site dedicated to phpMyAdmin</a></li>
                <li><a href="http://dev.mysql.com/tech-resources/articles/mysql_intro.html">Getting Started with MySQL</a></li>
                <li><a href="http://www.garvinhicking.de/tops/texte/mimetutorial">Having fun with phpMyAdmin's MIME-transformations &amp; PDF-features</a></li>
                <li><a href="http://www.linuxsoft.cz/article_list.php?id_kategory=215">Seriál o phpMyAdminovi (Česky)</a></li>
                <li><a href="http://www.devshed.com/c/a/PHP/Doing-More-With-phpMyAdmin-Part-1/">Doing More With phpMyAdmin: part 1</a>,
                    <a href="http://www.devshed.com/c/a/PHP/Doing-More-With-phpMyAdmin-Part-2/">part 2</a></li>
                <li><a href="http://www.php-editors.com/articles/sql_phpmyadmin.php">Learning SQL Using phpMyAdmin</a></li>
            </ul>
<?php
    echo renderBoxFooter(500, '', '', '', '', TRUE);

    echo renderBoxHeader(500, 'OLDER STUFF', '', '');
?>
            <ul class="list">
                <li><a href="http://www.phpmyadmin.net/old-stuff/">Old ChangeLogs and release announcements</a></li>
            </ul>
<?php
    echo renderBoxFooter(500, '', '', '', '', FALSE);
?>
        </div>
<!--/ right big boxes -->
    </div>
<?php
    } else if (isset($_GET['books'])) {
        require_once("./books.php");
    }
    require_once($import['footer']);
?>
