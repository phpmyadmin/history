<?php
    $modif_by = 'lem9';

    $we_must_import = FALSE;
    if (!isset($modif_date)) {
        $we_must_import = TRUE;
    }
    if ($we_must_import == TRUE) {
        require_once("./includes/config.inc.php");
        require_once($import['header']);
    }
?>
    <div class="container">
<?php
        echo renderBoxHeader(760, 'BOOKS', '', '');
?>
<!-- left boxes -->
        <div style="width: 360px; float: left;">
            <h1>Mastering phpMyAdmin 2.11<br />for Effective MySQL Management<font style="color: #cc0000"> - updated</font></h1>
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.packtpub.com/phpmyadmin-3rd-edition/book"><img src="images/books/pma_en_100x123.png" alt="Book cover" width="100" height="123" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content">
                        I am pleased to announce an update of my book. It is now up to date with phpMyAdmin 2.11.
                <br /><br />
                A percentage of the book's sales is <b><a href="http://www.packtpub.com/article/open_source_receives_royalties_boost">donated</a></b> to help phpMyAdmin.
                    </td>
                </tr>
            </table>
                <br /><br />
                For more information, please visit
                <b><a href="http://www.packtpub.com/phpmyadmin-3rd-edition/book"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" />the book's site</a></b>.
                <br /><br />
                <i>Marc Delisle</i>
                <br /><br />

         <h1>&nbsp;<br />phpMyAdmin - efektivn&iacute; spr&aacute;va MySQL</h1>
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.zonerpress.cz/kniha-phpmyadmin-efektivni-sprava-mysql.html"><img src="images/books/pma_cz_90x122.jpg" alt="Book cover" width="90" height="122" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content" lang="cs">
			V edici encyklopedie webdesignera vychází tentokrát ryze praktická kniha – kompletní a podrobná příručka pro uživatele phpMyAdmin, grafického rozhraní pro efektivní správu serveru a databází MySQL. Kniha popisuje v době vydání aktuální českou verzi phpMyAdmin 2.6.0, která obsahuje celou řadu novinek, rozšíření a vylepšení oproti verzi předchozí.
                    </td>
                </tr>
            </table>
            <p lang="cs">
		phpMyAdmin nabízí uživatelům ucelený systém pro komplexní manipulaci s databázemi a tabulkami MySQL. Systémovým administrátorům poskytuje nástroje pro správu uživatelů a jejich oprávnění. Kniha pokrývá oba úhly pohledu, obsahuje navíc i poznámky o používání SQL v rámci MySQL, předvádí některé nedokumentované možnosti a vlastnosti.
               <br /><br />
                Pro více informací navštivte stránku věnovanou
                <b><a href="http://www.zonerpress.cz/kniha-phpmyadmin-efektivni-sprava-mysql.html"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" />českému vydání knihy</a></b>.
<!--
            <h1>phpMyAdmin<br />Gestion de bases de donn&eacute;es SQL</h1>
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.pearsoneducation.fr/espace/livre.asp?idEspace=73&idLivre=2270&dep=0"><img src="images/books/pma_fr_89x109.jpg" alt="Book cover" width="89" height="109" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content">
                        Voici la version fran&ccedil;aise de mon manuel phpMyAdmin, publi&eacute;e par Pearson Education France.<br /><br /> &quot;Ce livre est un didacticiel complet sur phpMyAdmin, d&eacute;montrant tout le potentiel de cet outil. Il explique comment configurer, activer et utiliser les innombrables fonctions de phpMyAdmin, tant de base qu'avanc&eacute;es.&quot;
                    </td>
                </tr>
            </table>
                Pour plus d'informations, veuillez consulter
                <b><a href="http://www.pearsoneducation.fr/espace/livre.asp?idEspace=73&idLivre=2270&dep=0"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" />le site du livre</a></b>.
                <br /><br />
                <i>Marc Delisle</i>
                <br /><br />

            <h1>phpMyAdmin e MySQL Guida pratica</h1>
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.education.mondadori.it/Libri/SchedaLibro.asp?IdLibro=88-04-54108-3"><img src="images/books/pma_it_90x117.jpg" alt="Book cover" width="89" height="109" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content">
Benvenuti nel Web evoluto! Negli ultimi anni, il Web &egrave; cambiato drasticamente. Nella sua "infanzia", Internet era un mezzo usato principalmente per inviare informazioni statiche. Attualmente invece, gran parte dei siti Internet sono costituiti da informazioni generate dinamicamente da programmi applicativi. Benefici di accessibilit&agrave; strutturazione delle informazioni sono portati dall'utilizzo di database, infatti le applicazioni Web sono per la maggior parte "database driven". Quello che noi vediamo e conosciamo &egrave; il ben noto browser Web, ma dietro a tutto questo c'&egrave; un database che contiene le informazioni. Questa guida pratica, con informazioni chiare e approfondite, ti aiuta a sfruttare tutte le potenzialit&agrave; offerte da phpMyAdmin. Che tu sia sviluppatore, amministratore di sistema, web designer o utente principiante di MySQL e phpMyAdmin, questo libro ti spiega come aumentare la tua produttivit&agrave; verificare il tuo lavoro con MySQL. Contenuti aggiuntivi al libro sono disponibili sul Web.
                    </td>
                </tr>
            </table>
                Per maggiori informazioni,
                <b><a href="http://www.education.mondadori.it/Libri/SchedaLibro.asp?IdLibro=88-04-54108-3"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" />visita il sito</a></b>
-->
        </div>
<!--/ left boxes -->
<!-- right boxes -->
        <div style="width: 360px; float: right;">

<h1>Dominar phpMyAdmin para una administraci&oacute;n efectiva de MySQL</h1>

            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.packtpub.com/dominary-phpMyAdmin-es"><img src="images/books/pma_es_100x123.png" alt="Book cover" width="100" height="123" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content" lang="es">
Este libro es una gu&iacute;a completa que le ayuda a sacar partido del potencial de phpMyAdmin. Ya sea un programador experimentado, un administrador de sistemas, un dise&ntilde;ador Web o nuevo a las tecnolog&iacute;as de MySQL y phpMyAdmin, este libro le mostrar&aacute; como aumentar su productividad y control cuando trabaje con MySQL. Por ello se ha traducido, de modo que esta gu&iacute;a completa sea m&aacute;s accesible al lector espa&ntilde;ol.
                    </td>
                </tr>
            </table>
<a href="http://www.packtpub.com/dominary-phpMyAdmin-es"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" /> Packt Publishing</a>
<br /><br />
          <h1>phpMyAdmin - MySQL-Datenbanken effizient über das Web verwalten</h1>

            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td valign="top">
                        <a href="http://www.addison-wesley.de/main/main.asp?page=home/bookdetails&ProductID=106639"><img src="images/books/pma_de_90x122.jpg" alt="Book cover" width="90" height="122" class="imgborder" /></a>
                    </td>
                    <td valign="top" class="content" lang="de_DE">
Dieses Buch gibt Ihnen einen profunden Einstieg in die effiziente Verwaltung von MySQL-Datenbanken mit phpMyAdmin (neue Version 2.6.0) bis hin zur professionellen Administration. Der Autor zeigt, wie Sie mit phpMyAdmin Datenbanken anlegen, editieren, abfragen und pflegen und wie Sie Benutzer anlegen und verwalten. </td>
                </tr>
            </table>
<p lang="de_DE">Sie lernen, wie Sie Abfragen optimieren und automatisieren und was Sie beim Arbeiten mit verschiedenen Zeichensätzen und MIME-Typen beachten müssen u.v.a.m. Ein Troubleshooting-Kapitel hilft bei Problemen.</p>
<a href="http://www.addison-wesley.de/main/main.asp?page=home/bookdetails&ProductID=106639"><img src="images/marker_ltr.gif" width="10" height="10" alt="" border="0" hspace="2" style="vertical-align: middle;" /> Besuchen Sie auch die Webseite der deutschen Ausgabe</a>

        </div>
        <div style="clear: both;">&nbsp;</div>
<?php
    echo renderBoxFooter(760, '', '', '', '', FALSE);
?>
    </div>
<?php
    if ($we_must_import == TRUE) {
        require_once($import['footer']);
    }
?>
