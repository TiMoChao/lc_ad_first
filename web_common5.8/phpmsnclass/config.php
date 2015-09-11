<?php

// your MSN login account
$msn_acct = 'YOUR_MSN_ACCOUNT';
// your MSN password
$msn_password = 'YOUR_MSN_PASSWORD';
// your alias name for MSN
$msn_alias = 'YOUR_MSN_ALIAS';
// your personal message
$msn_psm = 'YOUR_MSN_PSM';
// notify list when someone add us to their list or remove us from their list
// after domain, you can assign @n to specify the network of this email,
// where @1 is for MSN (yes, if no @1, also for MSN)
//       @32 is for Yahoo
$aNotifyUser = array('MSN_ACCOUNT1@1',
                     'MSN_ACCOUNT2',
                     'YAHOO_ACCOUNT@32');
// ignore account for message process function
$aIgnoreAccts = array('bot1',
                      'bot2');
?>
