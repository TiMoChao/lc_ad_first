<?php
/**
 * 行业资讯功能类文件
 * @author		Arthur(ArthurXF@gmail.com)
 * @copyright	(c) 2006 by bizeway.com
 * @version		$Id$
 * @package		ArthurXF
 * @subpackage	news
 */
 class ask extends ArthurXF{
	public $thisModel = 'ask';
	//print_r($arrGWeb['WEB_ROOT_pre']);exit;
	/**
	 * 保存信息内容
	 * @author	肖飞
	 * @param	int $arrData    信息信息数组
	 * @return  void
	 */
	function saveInfo($arrData,$intModify=0,$blAlert=true){
		include_once(__WEB_ROOT."/ask/config/var.inc.php");
		global $arrGWeb;
		//非法信息过滤
		@include_once(__WEB_ROOT.'/data/illegal.inc.php');
		if(!empty($arrGIllegal) && !empty($arrData['intro'])){
			foreach($arrGIllegal as $k => $v){
				if($v['pass'] == 1){
					$arrData['intro'] = str_replace($k,$v['replace'],$arrData['intro']);
					if(!empty($arrData['title'])) $arrData['title'] = str_replace($k,$v['replace'],$arrData['title']);
					if(!empty($arrData['summary'])) $arrData['summary'] = str_replace($k,$v['replace'],$arrData['summary']);
				}
			}
		}
		//关键词广告
		@include_once(__WEB_ROOT.'/data/keywords.inc.php');
		if(!empty($arrGKeywords) && !empty($arrData['intro'])){
			foreach($arrGKeywords as $k => $v){
				if($v['pass'] == 1){
					$arrData['intro'] = str_replace('<A class=keyad target=_blank href=\"'.$v['url'].'\">'.$k.'</A>',$k,$arrData['intro']);
					$arrData['intro'] = str_replace('<A class=keyad href=\"'.$v['url'].'\" target=_blank>'.$k.'</A>',$k,$arrData['intro']);
					$arrData['intro'] = str_replace('<a class=keyad href=\"'.$v['url'].'\" target=_blank>'.$k.'</a>',$k,$arrData['intro']);
					$arrData['intro'] = str_replace($k,"<a class=keyad target=_blank href=$v[url]>$k</a>",$arrData['intro']);
				}
			}
		}
		$arr = check::SqlInjection($this->saveTableFieldG($arrData));

		if($intModify == 0){
			if(array_key_exists('user_id',$arr)) $arr['user_id'] = intval($_SESSION['user_id']);
			if($this->insertInfo($arr)){
				if($blAlert) check::Alert('发布成功!');
			}else{
				if($blAlert) check::Alert('发布失败!');
			}
		}

		if($intModify == 1){
			if($this->updateInfo($arr)){				
				if($blAlert) check::Alert("修改成功!",$arrGWeb['WEB_ROOT_pre']."/ask/index.php");				
			}else{
				if($blAlert) check::Alert('修改失败!');
			}
		}
		if($intModify == 2){
			if($this->replaceInfo($arr)){
				if($blAlert) check::Alert('发布成功!');
			}else{
				if($blAlert) check::Alert('发布失败!');
			}
		}

	}
}
?>