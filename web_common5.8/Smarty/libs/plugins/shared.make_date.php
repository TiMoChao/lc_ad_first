<?php
/**
 * Smarty shared plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Function: smarty_make_timestamp<br>
 * Purpose:  used by other smarty functions to make a timestamp
 *           from a string.
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return string
 */
function smarty_make_date($sourcedate,$dateformat='Y-m-d H:i:s', $timestamp='')
{
    if(!is_numeric($sourcedate)) $sourcstamp = strtotime($sourcedate);
		else $sourcedate = date($dateformat,$sourcedate);

		if(empty($timestamp)) {
			$timestamp = time();
		}else if(!is_numeric($timestamp)) $timestamp = strtotime($timestamp);
		$result = '';
		if($format) {
			$time = $timestamp - $sourcstamp;
			if($time > 24*3600) {
				$date = ($time % (24*3600));
				if($date > 30) $result = 	$sourcedate;
				else $result = $date.'天以前';
			} elseif ($time > 3600) {
				$result = intval($time/3600).'小时以前';
			} elseif ($time > 60) {
				$result = intval($time/60).'分钟以前';
			} elseif ($time > 0) {
				$result = $time.'秒以前';
			} else {
				$result = '现在';
			}
		} else {
			$result = $sourcedate;
		}
		//echo "$sourcedate,$sourcstamp,$timestamp,$time,$result<br>";
		return $result;

}

/* vim: set expandtab: */

?>
