<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_ip_replace($ip, $start = 4, $ellipsis='*')
{
    if(check::FormatIP($ip)){
		$start = $start -1;
		$arrIP = explode('.',$ip);
		foreach($arrIP as $k => $v){
			if($k >= $start) $arrIP[$k] = $ellipsis;
		}
		$ip = implode('.',$arrIP);
		return $ip;

	}
}

/* vim: set expandtab: */

?>
