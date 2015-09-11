#!/usr/bin/php -Cq
<?php

error_reporting(E_ALL);
include_once('msn.class.php');

// force to use MSNP9, without debug information
// $msn = new MSN('MSNP9');

// force to use MSNP9, with debug information
// $msn = new MSN('MSNP9', true);

// force to use MSNP15, without debug information
// $msn = new MSN('MSNP15');

// force to use MSNP15, with debug information
// $msn = new MSN('MSNP15', true);

// auto detect MSN protocol, without debug information
// $msn = new MSN;

// auto detect MSN protocol, with debug information
$msn = new MSN('', true);

if (!$msn->connect('YOUR_ID', 'YOUR_PASSWORD')) {
    echo "Error for connect to MSN network\n";
    echo "$msn->error\n";
    exit;
}

$msn->sendMessage('Now: '.strftime('%D %T')."\nTesting\nSecond Line\n\n\n\nand Empty Line",
                  array(
                    'somebody1@hotmail.com',
                    'somebody2@hotmail.com'
                       )
                 );
echo "Done!\n";
exit;

?>

