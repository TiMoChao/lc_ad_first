<?php
//过滤GET或POST的值，去除两端空格和转义符号
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	check::filtrateData($_POST,$arrGPdoDB['htmlspecialchars']);
}elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
	check::filtrateData($_GET,$arrGPdoDB['htmlspecialchars']);
}
?>