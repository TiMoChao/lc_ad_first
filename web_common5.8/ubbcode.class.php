<?PHP
/**
 * ubbcode		类文件
 * @author		肖飞
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ubbcode
 */
class ubbcode{
	private $call_time; // 递归深度，for debug
	//可处理标签及处理函数表
	private $tags = array(
		'url' => '$this->url',
		'email' => '$this->email',
		'mail' => '$this->email', // 为了容错，[mail]和[email]等效
		'img' => '$this->img',
		'b' => '$this->simple',
		'i' => '$this->simple',
		'u' => '$this->simple',
		'tt' => '$this->simple',
		's' => '$this->simple',
		'strike' => '$this->simple',
		'h1' => '$this->simple',
		'h2' => '$this->simple',
		'h3' => '$this->simple',
		'h4' => '$this->simple',
		'h5' => '$this->simple',
		'h6' => '$this->simple',
		'sup' => '$this->simple',
		'sub' => '$this->simple',
		'em' => '$this->simple',
		'strong' => '$this->simple',
		'code' => '$this->simple',
		'small' => '$this->simple',
		'big' => '$this->simple',
		'blink' => '$this->simple',
		'fly' => '$this->fly',
		'move' => '$this->move',
		'glow' => '$this->CSSStyle',
		'shadow' => '$this->CSSStyle',
		'blur' => '$this->CSSStyle',
		'wave' => '$this->CSSStyle',
		'sub' => '$this->simple',
		'sup' => '$this->simple',
		'size' => '$this->size',
		'face' => '$this->face',
		'font' => '$this->face', // 为了容错，[font]和[face]等效
		'color' => '$this->color',
		'html' => '$this->html',
		'quote' => '$this->quote',
		'swf' => '$this->swf',
		'upload' => '$this->upload',
		'wddx' =>'$this->wddx'
	);

	function ubbcode(){
		$this->call_time= 0;
		$this->sLastModified= sprintf("%s", date("Y-m-j H:i", getlastmod()));
	}

	/***********************************************************************
	* 对使用者输入的 E-Mail 作简单的检查，
	* 检查使用者的 E-Mail 字串是否有 @ 字元，
	* 在 @ 字元前有英文字母或数字，在之后有数节字串，
	* 最后的小数点后只能有二个或三个英文字母。
	* super@mail.wilson.gs 就可以通过检查，super@mail.wilson 就不能通过检查
	************************************************************************/
	function emailcheck($str){
		if (eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$", $str))
		return true;
		else
		return false;
	}

	/***********************************************************************
	* 对使用者输入的 URL 作简单的检查，
	* 目前只能简单判断，不能自动检查fpt，finger等
	************************************************************************/
	function checkURL($str){
		$bValidURL= true;
		if (eregi("([a-z0-9-]+([\.][a-z0-9\-]+)+)", $str, $er_arr)){
			/*
			printf ("0. %s <br/>", $er_arr[0]);
			printf ("1. %s <br/>", $er_arr[1]);
			printf ("2. %s <br/>", $er_arr[2]);
			printf ("3. %s <br/>", $er_arr[3]);
			printf ("4. %s <br/>", $er_arr[4]);
			*/
		}else $bValidURL= false;
		return $bValidURL;
	}

	/***********************************************************************
	* 对使用者输入的 图片URL 作简单的检查，
	* 目前只能简单判断结尾是否为图片文件
	* 不支持由CGI动态生成的图片，比如计数器这类的
	************************************************************************/
	function checkImgURL($str){
		if ($this->checkURL($str)) {
			if(eregi("\.(jpeg|jpg|gif|bmp|png|pcx|tiff|tga|lwf)$", $str)) return true;
			else return false;
		}else return false;
	}

	/***********************************************************************
	* 自动补全URL部分，主要是协议前缀，
	* 默认是http://，支持https://；ftp://；finger://；gopher://等
	* 函数并不对URL的合法性作检查
	************************************************************************/
	function formatURL($str){
		if (!eregi("^(ftp|http|https|mms|gopher|finger|bbs|telnet):(\/\/|\\\\)", $str))
		$str= 'http://'.$str;
		return $str;
	}

	/**
	 * 获取标签中参数的函数,如:[url=http://www.aaa.com]中的http://www.aaa.com
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$str			包含ubb标签的字符串
	 * @return  array
	 */
	function ubbParameter($str){
		$arrKey = array();
		$parse = ''.($str);
		while(true){
			//查找[xx] 或者[xx=xx] , 但不包括[xx=]
			$eregi_ret=eregi("\[([a-z][a-z0-9]{0,7})(=[a-zA-Z0-9#.:/&@|\?,%=_\+\"\"]+)?\]", $parse, $eregi_arr);
			if(!$eregi_ret){
				$ret .= $parse;
				break; //如果没有，返回
			}
			/*
			//for Debug
			else
			{
			printf ("$. %s<br/>", $eregi_ret);
			printf ("0. %s<br/>", $eregi_arr[0]);
			printf ("1. %s<br/>", $eregi_arr[1]);
			printf ("2. %s<br/>", $eregi_arr[2]);
			printf ("3. %s<br/>", $eregi_arr[3]);
			}
			*/

			$tag_param= $eregi_arr[2];
			$arrKey[] = substr($tag_param, 1);

			$pos= strpos($parse, $eregi_arr[0]);
			$parse= substr($parse, $pos + $eregi_ret);
		}
		return $arrKey;
	}

	/**
	 * 获取标签中值的函数，如:[b]aaa[b]中的bbb(未完成)
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$str			包含ubb标签的字符串
	 * @return  array
	 */
	function ubbValue($str){
		$arrKey = array();
		$parse = ''.($str);
		while(true){
			//查找[xx] 或者[xx=xx] , 但不包括[xx=]
			$eregi_ret=eregi("\[([a-z][a-z0-9]{0,7})(=[a-zA-Z0-9#.:/&@|\?,%=_\+\"\"]+)?\]?\[/", $parse, $eregi_arr);
			if(!$eregi_ret){
				$ret .= $parse;
				break; //如果没有，返回
			}
			/*
			//for Debug
			else
			{
			printf ("$. %s<br/>", $eregi_ret);
			printf ("0. %s<br/>", $eregi_arr[0]);
			printf ("1. %s<br/>", $eregi_arr[1]);
			printf ("2. %s<br/>", $eregi_arr[2]);
			printf ("3. %s<br/>", $eregi_arr[3]);
			printf ("4. %s<br/>", $eregi_arr[4]);
			}
			*/

			$tag_param= $eregi_arr[2];
			$arrKey[] = substr($tag_param, 1);

			$pos= strpos($parse, $eregi_arr[0]);
			$parse= substr($parse, $pos + $eregi_ret);
		}
		return $arrKey;
	}

	//对$str进行UBB编码解析
	function parse($str){
		$call_time ++;
		$parse = ''.($str);
		$ret = '';
		while(true){
			//查找[xx] 或者[xx=xx] , 但不包括[xx=]
			$eregi_ret=eregi("\[([a-z][a-z0-9]{0,7})(=[a-zA-Z0-9#.:/&@|\?,%=_\+\"\"]+)?\]", $parse, $eregi_arr);
			if(!$eregi_ret){
				$ret .= $parse;
				break; //如果没有，返回
			}
			/*
			 //for Debug
			else{
				echo "<br>";
				printf ("$. %s<br/>", $eregi_ret);
				printf ("0. %s<br/>", $eregi_arr[0]);
				printf ("1. %s<br/>", $eregi_arr[1]);
				printf ("2. %s<br/>", $eregi_arr[2]);
				printf ("3. %s<br/>", $eregi_arr[3]);
			}
			*/
			//echo $parse."<br>";

			$pos = @strpos($parse, $eregi_arr[0]); // 起始位置
			$tag_start= $eregi_arr[1];
			$tag= strtolower($eregi_arr[1]);
			$tag_param= $eregi_arr[2];
			$parse2 = substr($parse, 0, $pos);//标记之前
			//echo '<br>标记之qian:'.$parse2;
			$parse = substr($parse, $pos + $eregi_ret);//标记之后
			//echo '<br>标记之后:'.$parse;

			if(!isset($this->tags[$tag])){
				//echo "$tag.@133:不支持的标记<br/>"; // for debug
				$ret .= $parse2.'['.$tag_start.']';
				continue; //如果是不支持的标记
			}

			//查找对应的结束标记
			$eregi_ret=eregi("\[(/".$tag.")\]", $parse, $eregi_arr);
			if(!$eregi_ret){
				//echo ('没有对应该的结束标记'.$rrr); //for debug
				$ret .= $parse2.'['.$tag_start.$tag_param.']';
				continue;//没有对应该的结束标记
			}

			$pos= strpos($parse, $eregi_arr[0]);
			$value= substr($parse, 0, $pos); //起止标记之间的内容
			//echo '<br>标记之间:'.$value;
			$tag_end= $eregi_arr[1];
			$parse= substr($parse, $pos + $eregi_ret);//结束标记之后的内容

			// 允许嵌套标记，递归分析
			if (!(($tag == 'code') or ($tag=="url") or ($tag=="email") or ($tag=="img"))){
				$value= $this->parse($value);
			}
			$ret.= $parse2;
			$parseFun= sprintf('$ret .= %s($tag_start, $tag_param, $tag_end, $value);', $this->tags[$tag]);
			//echo "<pre>".$ret .= $this->size($tag_start, $tag_param, $tag_end, $value)."</pre>";
			eval($parseFun);
		}
		$call_time --;
		return $ret;
	}

	/*****************************************************
	* 简单替换，类似[b]变为<b>
	* 标签内容不便，只是替代括号为<>
	*****************************************************/
	function simple($start, $para, $end, $value){
		if (strlen($para) > 0) return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		else return sprintf("<%s>%s<%s>", $start, $value, $end);
	}

	/*****************************************************
	* 如下认为合法可以没有“http://”；ftp一定要自己加“ftp://”
	* [URL=http://www.fogsun.com]93611[/URL]
	* [URL=http://www.fogsun.com][/URL]
	* [URL]http://www.fogsun.com[/URL]
	*****************************************************/
	function url($start, $para, $end, $value){
		$sA= $value;
		$sURL= substr(trim($para), 1);
		if (strlen($sURL) > 0){
			if (strlen($value) == 0) $sA= $sURL;
		}else{
			$sURL= trim($value);
		}
		$sURL= $this->formatURL($sURL);
		if($this->checkURL($sURL))
			return "<a href=\"$sURL\" class=\"small\" target=\"_blank\">$sA</a>";
		else {
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		}
	}

	/*****************************************************
	* 如下认为合法可以没有“mailto:”头；
	* [email=pazee@21cn.com]pazee[/email]
	* [email=pazee@21cn.com][/email]
	* [email]pazee@21cn.com[/email]
	*****************************************************/
	function email($start, $para, $end, $value){
		$sA= $value;
		$sURL= substr(trim($para), 1);
		if (strlen($sURL) > 0){
			if (strlen($value) == 0) $sA= $sURL;
		}else{
			$sURL= trim($value);
		}
		//if (strtolower(substr($sURL, 0, 7)) != "mailto:")
		$sURL= "mail.php?email=". $sURL;
		if($this->emailcheck(substr($sURL, 15))) return "<a href=\"$sURL\" class=\"small\" target=\"_blank\">$sA</a>";
		else return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
	}

	/*****************************************************
	* 显示图片；如下用法认为合法
	* [img=www.bizeway.com/title.jpg][/img]
	* [img]www.bizeway.com/title.jpg[/img]
	*****************************************************/
	function img($start, $para, $end, $value){
		$sURL= substr(trim($para), 1);
		if (strlen($sURL) <= 0)
		$sURL= trim($value);
		//$sURL= $this->formatURL($sURL);
		if ($this->checkImgURL($sURL))
			return sprintf("<a href=\"%s\" target=\"_blank\"><img src=\"%s\" border=\"0\" alt=\"从新窗口中浏览\"></img></a>", $sURL,$sURL);
		else
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
	}

	/*****************************************************
	* 字符串从右向左循环移动
	* 无参数
	* 等效与html的<marquee>
	*****************************************************/
	function fly($start, $para, $end, $value){
		if (strlen($para)>0) // 有参数
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		else
			return '<marquee behavior=\"alternate\" scrolldelay=\"100\">'.$value.'</marquee>';
	}

	/*****************************************************
	* 字符串来回移动
	* 无参数
	* 等效与html的<marquee>
	*****************************************************/
	function move($start, $para, $end, $value) {
		if (strlen($para)>0) // 有参数
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		else
			return '<marquee scrolldelay=\"100\">'.$value.'</marquee>';
	}

	/*****************************************************
	* 字符晕光效果包括 glow、shadow和blur
	* 字符晕光效果[glow=a,b,c]或者[shadow=a,b,c]
	* 3个参数允许缺省
	* 实现文字阴影特效，
	* glow, shadow,blur 属性依次为颜色、宽度和边界大小
	* wave 属性依次为变形频率、宽度和边界大小
	*****************************************************/
	function CSSStyle(&$start, &$para, &$end, &$value){
		$rets= sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		if (strlen($para)==0){
			$para="=,,";
		}
		if (eregi("^=([#]?[[:xdigit:]]{6}|[a-z0-9]*),([0-9]*),([0-9]*)", $para, $er_arr)){
			$color= ($er_arr[1] != "") ? $er_arr[1] : red; // Default Color
			$width= ($er_arr[2] != "") ? $er_arr[2] : 400; // Default Width
			$border= ($er_arr[3] != "") ? $er_arr[3] : 5; // Default Border
			switch ($start){
				case "glow":
				case "shadow":
					$rets= sprintf("<font style=\"FILTER: %s(Color =%s,Strength=%s); width:%s\">%s</font>", $start, $color, $border, $width, $value);
					break;
				case "blur";
					$rets= sprintf("<font style=\"FILTER: %s(Strength=%s);color:%s; width:%s\">%s</font>", $start, $border, $color, $width, $value);
					break;
				case "wave":
					$color= ($er_arr[1] != "") ? $er_arr[1] : 4; // Default Color
					$border= ($er_arr[3] != "") ? $er_arr[3] : 2; // Default Border
					$rets= sprintf("<font style=\"FILTER: %s(Freq=%s, Strength=%s); width:%s\">%s</font>", $start, $color, $border, $width, $value);
					break;
			}
		}
		return $rets;
	}
	/*****************************************************
	* 字体颜色 [color=n]xxx[/color]
	* n 可以是 #xxxxxx 或者 xxxxxx (6位16进制数)
	* red,greed,blue,black等颜色保留字也有效
	* 等效与html的<font color=n>xxx</font>
	* [color]xxxx[/color]等效于 [color=red]
	*****************************************************/
	function color($start, $para, $end, $value){
		$cl= strtolower(substr($para, 1));
		if ($cl == "") $cl= "red";
		if (eregi("(^[#]?[[:xdigit:]]{6})|red|green|blue|yellow|blue|white|gray|brown|silver|purple|orange" ,$cl))
			return sprintf("<font color=\"%s\">%s</font>",$cl, $value);
		else
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
	}

	/*****************************************************
	* 字体大小 [size=n]xxx[/size] 1<= n <= 7；
	* 等效与html的<font size=n>xxx</font>
	*****************************************************/
	function size($start, $para, $end, $value){
		//echo "<pre>".$start.",".$para.",".$end.",".$value."</pre>";
		$size= substr($para, 1);
		if ($size >=1 && $size <=7 && (strlen($para) > 1)){
			return sprintf("<font size=\"%s\">%s</font>",$size, $value);
		}else{
			return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
		}
	}

	/*****************************************************
	* 字体名字 [face=n] n字体名称，不需要引号
	* 等效与html的<font face=n>xxx</font>
	*****************************************************/
	function face($start, $para, $end, $value){
		$fn= substr($para, 1);
		if (!eregi("[[:punct:]]", $fn) && strlen($para) > 1) {
			switch (strtoupper($fn)){
				case "ST":
					$fn= "宋体";
					break;
				case "HT":
					$fn= "黑体";
					break;
				case "KT":
					$fn= "楷体_GB2312";
					break;
				case "FT":
					$fn= "仿宋_GB2312";
					break;
				case "YY":
					$fn= "幼圆";
					break;
				case "LS":
					$fn= "隶书";
					break;
				case "XST":
					$fn= "新宋体";
				break;
				default:
				$fn= substr($para, 1);
			}
			return sprintf("<font face=\"%s\">%s</font>",$fn, $value);
		}else return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
	}

	/*****************************************************
	* 文件上传[upload]
	*****************************************************/
	function upload($start, $para, $end, $value){
		$fn= trim(substr($para, 1));
		if (!eregi("[[:punct:]]", $fn) && strlen($para) > 1) {
			if (eregi("jpg|jpeg|bmp|gif|png", $fn)) {
				if ($this->checkImgURL($value))
					return sprintf("<img src=\"images/%s.gif\" align=\"absmiddle\"> 此主题相关图片如下:<br><br><a href=\"%s\" target=\"_blank\"><img src=\"%s\" border=0 alt=\"从新窗口中浏览\"></img></a><br>",$fn,$value,$value);
				else
					return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
			} elseif ($fn == "swf") {
				return sprintf("<center><img src=\"images/%s.gif\" align=\"absmiddle\"> 此主题相关Flash:<br><br><PARAM NAME=PLAY VALUE=TRUE><PARAM NAME=LOOP VALUE=TRUE><PARAM NAME=QUALITY VALUE=HIGH><embed src=\"%s\" quality=high width=\"500\" height=\"300\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\"></embed><br><a href=\"%s\" class=\"small\" target=\"_blank\">全屏欣赏</a> (点右键->另存为可将动画下载)</center>",$fn,$value,$value);
			} elseif (eregi("rar|zip|doc", $fn)) {
				return sprintf("<img src=\"images/%s.gif\" align=\"absmiddle\"> <a href=\"%s\" class=\"small\" target=\"_blank\">点击下载此主题相关附件</a><br>",$fn,$value);
			}
		}else return sprintf("[%s%s]%s[%s]", $start, $para, $value, $end);
	}

	/*****************************************************
	* 调试代码标签[html]
	*****************************************************/
	function html($start, $para, $end, $value){
		if (strlen($value) > 0) {
			$value = eregi_replace('<br[[:space:]]*/?[[:space:]]*>', "", $value);
			return sprintf("<br><span><textarea cols=\"70\" rows=\"10\" class=\"code\">%s</textarea><br><input type=\"button\" value=\"&nbsp;运行代码&nbsp;\" onclick='runCode()' class=\"special\"> <b>[Ctrl+A 全部选择 提示：你可先修改部分代码，再按运行]</b></span><br>",$value);
		} else {
			return sprintf("[%s]%s[%s]", $start, $value, $end);
		}
	}

	/*****************************************************
	* 引用标签[quote]
	*****************************************************/
	function quote($start, $para, $end, $value){
		if (strlen($value) > 0) {
			return sprintf("<table width=\"100%%\" align=\"center\" border=\"1\" bordercolor=\"#AAAAAA\"><tr bgcolor=\"#EAEAEA\"><td class=\"view\"><font color=\"#000099\"><b>以下为引用内容:</b></font><br><font color=\"#000066\">%s</font></td></tr></table><br>",$value);
		} else {
			return sprintf("[%s]%s[%s]", $start, $value, $end);
		}
	}

	/*****************************************************
	* FLASH[swf]
	*****************************************************/
	function swf($start, $para, $end, $value){
		if (strlen($value) > 0) {
			return sprintf ("<br><center><PARAM NAME=PLAY VALUE=TRUE><PARAM NAME=LOOP VALUE=TRUE><PARAM NAME=QUALITY VALUE=HIGH><embed src=\"%s\" quality=\"high\" width=\"500\" height=\"300\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\"></embed><br><a href=\"%s\" class=\"small\" target=\"_blank\">全屏欣赏</a> (点右键->另存为可将动画下载)</center>",$value,$value);
		} else {
			return sprintf("[%s]%s[%s]", $start, $value, $end);
		}
	}

	/**
	 * wddx中文字段urlencode
	 * @author	肖飞 <ArthurXF@gmail.com>
	 * @param	string	$link			翻页链接
	 * @return  string
	 */
	 function wddx($start, $para, $end, $value){
		 //echo "<pre>".$start.",".$para.",".$end.",".$value."</pre>";
		 if (strlen($value) > 0) {
			return urldecode($value);
		} else {
			return sprintf("[%s]%s[%s]", $start, $value, $end);
		}
	 }

}

//调用方法
//$ubbcode = new ubbcode();
//$message = $ubbcode->parse(stripslashes(nl2br($message)));

?>