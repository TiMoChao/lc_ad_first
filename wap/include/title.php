<?php
$objHaw = new HAW_deck($arrGWeb['name'].$arrMHaw['title']);
//$objHaw->pureHTML = false;
//$objHaw->upbrowser = true;
$objHaw_sig_text = $arrMHaw['haw_sig_text'];
$objHaw_license_holder = $arrMHaw['haw_license_holder'];
$objHaw_signature = $arrMHaw['haw_signature'];
$objHaw->charset = $arrMHaw['charset'];
$objHaw->width  = "100%";
$objHaw->height = "96%";
?>