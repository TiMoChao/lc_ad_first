<?php
//静态优化URL处理
if(v === 'v' or v === '') exit;
if($arrGWeb['URL_static']){
	if ( !empty($_SERVER['PATH_INFO']) ) {
		$temp = substr($_SERVER['PATH_INFO'] ,1, (strlen($_SERVER['PATH_INFO'])-strlen($arrGWeb['file_suffix'])-1));
		$a = explode('-', $temp);
		$total = count($a);
		for($i=0;$i<$total;$i++){
			$_GET[$a[$i]]=$a[$i+1];
			$_REQUEST[$a[$i]]=$a[$i+1];
			$i++;
		}
	}
}
?>