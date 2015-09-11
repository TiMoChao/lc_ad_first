<?php
/**
 * Alexa
 *
 * @methods: info($domain),imgPath($u,$r = 3,$y = 't',$w = 320,$h = 200)
 */

class Alexa {

	/**
	 * Alexa 信息
	 *
	 * @param string $url 域名
	 */
	public static function info($url) {
		$txtAlexa = @file_get_contents("http://data.alexa.com/data/+wQ411en8000lA?cli=10&dat=s&ver=7.0&url=$url");
		$arrAlexa = array();
		// 排名
		$pat3= "/URL=\"(.+)\" TEXT=\"(.+)\"/i";
		preg_match_all($pat3, $txtAlexa, $arr);
		$arrAlexa['top'] = empty($arr[2][0]) ? null : $arr[2][0];
		// 名次浮动
		$pat6= "/RANK DELTA=\"(.+)\"/i";
		preg_match($pat6, $txtAlexa, $arr);
		$arrAlexa['delta'] = empty($arr[1]) ? 0 : $arr[1];
		// 外部链接
		$pat5= "/LINKSIN NUM=\"(.+)\"/i";
		preg_match($pat5, $txtAlexa, $arr);
		$arrAlexa['linksin'] = empty($arr[1]) ? 0 : $arr[1];
		// 收录时间
		$pat7="/DATE=\"(.+)\" DAY=\"(.+)\" MONTH=\"(.+)\" YEAR=\"(.+)\"/i";
		preg_match_all($pat7, $txtAlexa, $arr);
		$arrAlexa['date'] = empty($arr[4]) ? null : array('year' => $arr[4][0],'month' => $arr[3][0],'day' => $arr[2][0]);
		// DMOZ收录目录
		$pat9="/CAT ID=\"(.+)\" TITLE=\"(.+)\" CID=\"(.+)\"/i";
		preg_match_all($pat9, $txtAlexa, $arr);
		$arrAlexa['dir'] = empty($arr[1][0]) ? null : $arr[1][0];
		return empty($arrAlexa['top']) ? '' : $arrAlexa;
	}

	/**
	 * 走势图参数
	 * src = http://traffic.alexa.com/graph?w=490&h=250&r=1m&y=t&u=domain
	 * @param w = <n:宽度>
	 * @param h = <n:高度>
	 * @param y = <s:'r'=日均访问人数 | 'p'=日页面浏览量 | 't'=网络排名>
	 * @param r = <n:几个月>m
	 * @param u = <s:URL>
	 */
	public static function imgPath($u,$r = 3,$y = 't',$w = 320,$h = 200) {
		return "http://traffic.alexa.com/graph?w=$w&h=$h&r={$r}m&y=$y&u=$u";
	}
}