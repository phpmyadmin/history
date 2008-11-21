<?php
/* 
    file:     include/footer.inc.php
    version:  1.0
    created:  2004-12-31 by mkkeck
    updated:  2005-01-07 by mkkeck
*/
?>
    <div style="clear: both; text-align: center;"><img src="images/1x1blind.gif" width="1" height="10" border="0" alt="" /></div>
    <!-- footer line --> 
    <div class="container"> 
        <div class="navbar">           
        <table width="750" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td nowrap="nowrap" class="footer" height="24">
                    &copy; phpMyAdmin Devel Team
                    <?php echo '&#8226; Last Change: ' . $modif_date . ((isset($modif_by) && !empty($modif_by)) ? ' by <a href="https://sourceforge.net/sendmessage.php?touser=' . $sf_user_id[$modif_by] . '" title="contact ' . $modif_by . '">' . $modif_by . '</a>' : ''); ?> 
                    &#8226; <a href="http://www.phpmyadmin.net/documentation/LICENSE">GPL License Information</a> 
                    &#8226; <a href="http://sourceforge.net/projects/phpmyadmin/">Project on Sourceforge.net</a>
                    &#8226; <a href="#top">Top</a>
                </td>
            </tr>
        </table>
        </div>
	<div class="footer" style="text-align: center; height:18px">
MySQL and the MySQL Logo are registered trademarks of MySQL AB in the United States, the European Union and other countries.
	</div>
        <!--/ footer line -->
        <!-- buttons -->
        <table width="760" border="0" align="center" cellpadding="0" cellspacing="5">
            <tr>
                <td nowrap="nowrap" valign="top">
                    <a href="http://sourceforge.net/"><img src="http://sourceforge.net/sflogo.php?group_id=23067&amp;type=4" width="125" height="37" hspace="3" border="0" alt="SF-Logo" title="www.sourceforge.net" /></a>
                    <a href="http://www.php.net/"><img src="images/btn_php.gif" width="88" height="31" hspace="3" border="0" alt="PHP-Logo" title="www.php.net" /></a>
                    <a href="http://www.mysql.com/"><img src="images/powered-by-mysql-88x31.png" width="88" height="31" hspace="3" border="0" alt="MySQL-Logo" title="www.mysql.com" /></a>
                    <a href="http://www.phpmyadmin.net/gophp5"><img src="images/goPHP5_080x26.png" width="80" height="26" hspace="3" border="0" alt="GoPHP5 logo" title="GoPHP5" /></a>
                </td>
                <td align="right" valign="top" nowrap="nowrap">
                    <a href="http://validator.w3.org/check?uri=http://<?php echo $_SERVER['HTTP_HOST'] . '/' . basename($_SERVER['PHP_SELF']); ?>"><img src="images/btn_w3c_xhtml.gif" width="88" height="31" hspace="3" border="0" alt="XHTML 1.0" title="This page is valid XHTML 1.0" /></a>
                    <a href="http://jigsaw.w3.org/css-validator/validator?uri=http://<?php echo $_SERVER['HTTP_HOST'] . '/' . basename($_SERVER['PHP_SELF']); ?>"><img src="images/btn_w3c_css.gif" width="88" height="31" hspace="3" border="0" alt="CSS" title="This page uses valid CSS" /></a>
                </td>
            </tr>
        </table>
        <!--/ buttons -->
    </div>
</body>
</html>
