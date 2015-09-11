<?php
$myLink = new HAW_link('网站首页', "index.php");
$objHaw->add_link($myLink);
$myText = new HAW_text($arrGWeb['name']);
$objHaw->add_text($myText);
$myText = new HAW_text(date('m-d H:i'));
$objHaw->add_text($myText);
$objHaw->create_page();
?>