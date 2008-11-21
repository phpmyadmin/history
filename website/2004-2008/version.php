<?php
header('Content-Type: text/plain');

require_once("./includes/config.inc.php");
require_once($import['release']);

for ($stable=0; $stable<$releases; $stable++) {
    if ($release[$stable]['type'] == 'stable3') break;
}

echo $release[$stable]['version'] . "\n";
echo strftime('%Y-%m-%d', $release[$stable]['date']) . "\n";

// List of sf.net mirrors:
$servers = array('easynews', 'internap', 'switch', 'ovh', 'nchc', 'mesh', 'kent', 'optusnet', 'puzzle', 'surfnet', 'heanet', 'keihanna', 'jaist', 'citkit');
foreach($servers as $server){
    echo 'http://' . $server . '.dl.sourceforge.net/sourceforge/phpmyadmin/phpMyAdmin-' . $release[$stable]['version'] . '-all-languages.tar.gz' . "\n";
}
?>
