<?php
/* 
    file:        includes/lib_rss.inc.php
    version:     1.0
    created:     2004-01-03 by mkkeck
    updated:     2004-01-03 by mkkeck
    information: based on the script rss2php (found on sourceforge.net)
*/

$pmaRSSDatas = array();

class RSSParser {

    var $insideitem = false;
    var $tag = "";
    var $num = -1;
    // add more here for any extra types of tags needed
    // remember to update endElement and characterData 
    // functions as well
    var $rss_title   = "";
    var $rss_content = "";
    var $rss_author  = "";
    var $rss_link    = "";
    var $rss_pubdate = "";
    var $rss_comment = "";

    function startElement($parser, $tagName, $attrs) {
        if ($this->insideitem) {
            $this->tag = strtolower($tagName);
        } else if (strtolower($tagName) == "item") {
            $this->startElement_extra();
        }
    }

    function endElement($parser, $tagName) {
        if (strtolower($tagName) == "item") {
            if ($this->rss_title) {
                $this->endElement_extra($this);
            }
            // add more here for any extra types of tags needed
            // remember to update characterData function and class
            // variables as well
            $this->rss_title       = "";
            $this->rss_description = "";
            $this->rss_author      = "";
            $this->rss_link        = "";
            $this->rss_pubdate     = "";
            $this->rss_comments    = "";
            $this->insideitem      = false;
        }
    }

    function characterData($parser, $data) {
        if ($this->insideitem) {
            switch ($this->tag) {
                // add more here for any extra types of tags needed
                // remember to update endElement function and class
                // variables as well
                case "title":
                    $this->rss_title .= $data;
                break;
                case "description":
                    $this->rss_description .= $data;
                break;
                case "link":
                    $this->rss_link .= $data;
                break;
                case "author":
                    $this->rss_author .= $data;
                break;
                case "pubdate":
                    $this->rss_pubdate .= $data;
                break;
                case "comments":
                    $this->rss_comments .= $data;
                break;
            }
        }
    }

} // end class

function feed($rss_parser, $xmlfile) {
    global $xml_feeds;
    global $xml_files;
    $readfilename  = $xml_feeds[$xmlfile];
    $cachefilename = $xml_files[$xmlfile];
    // caching
    $content = '';
    if (!@file_exists($cachefilename) || date('Ymd', filemtime($cachefilename)) < date('Ymd', time())) {
        $handle  = @fopen($readfilename,"r") or die();
        while (!feof($handle)) 
            $content .= fread($handle, 1024);
        fclose($handle);
    }
    if ($content!='') {
        if (@file_exists($cachefilename)) {
            @unlink($cachefilename);
        }
        $handle = fopen($cachefilename, "w");
        fputs($handle, $content);
        fclose($handle);
    }
    // read content
    $content = '';
    $rssread = fopen($cachefilename,"r") or die("Error reading RSS data.");
    $xml_parser = xml_parser_create();
    xml_set_object($xml_parser,&$rss_parser);
    xml_set_element_handler($xml_parser, "startElement", "endElement");
    xml_set_character_data_handler($xml_parser, "characterData");
    while ($content = fread($rssread, filesize($cachefilename)))
        xml_parse($xml_parser, $content, feof($rssread)) or die(sprintf("XML error: %s at line %d", 
                                                                   xml_error_string(xml_get_error_code($xml_parser)), 
                                                                   xml_get_current_line_number($xml_parser)));
    fclose($rssread);
    xml_parser_free($xml_parser);
}

// class for pma
class pmaRSSFeed extends RSSParser {

    function pmaRSSFeed($cachefilename) {
        feed($this, $cachefilename);
    }

    function startElement_extra() {
        $this->insideitem = true;
        $this->num += 1;
    }

    function endElement_extra($this) {
        global $pmaRSSDatas;
        $pmaRSSDatas[$this->num]['title']   = htmlspecialchars(trim($this->rss_title));
        $pmaRSSDatas[$this->num]['content'] = htmlspecialchars(trim($this->rss_description));
        $pmaRSSDatas[$this->num]['author']  = htmlspecialchars(trim($this->rss_author));
        $pmaRSSDatas[$this->num]['link']    = trim($this->rss_link);
        $pmaRSSDatas[$this->num]['date']    = trim($this->rss_pubdate);
        $pmaRSSDatas[$this->num]['comment'] = trim($this->rss_comments);
    }

} // end class pmaRSSFeed
?>
