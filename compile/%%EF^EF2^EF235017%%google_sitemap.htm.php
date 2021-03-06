<?php /* Smarty version 2.6.20, created on 2015-06-14 07:37:53
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/seo/google_sitemap.htm */ ?>

<div class="ccc2">
	<ul>
		<li>Google Sitemaps 服务旨在使用Feed文件sitemap.xml通知Google的spider(bot)蜘蛛(机器人)此网站上哪些文件需要索引、这些文件的最后修订时间、更改频度、文件位置、相对优先索引权，这些信息将帮助Google spider(bot)建立索引范围和索引的行为习惯。使用此功能生成sitemap.xml后，请到<a href="https://www.google.com/webmasters/sitemaps/" target="_blank"><font color="#ff0000">Google Sitemaps</font></a>提交<br>
	<font color="#ff6600">更新频率建议不要过高，更新频率过高，但无实质更新内容，将会受到Google排名惩罚，<br>发布新网站内容后，建议重新生成Google Sitemaps，有助于搜索引擎收录！</font>
		</li>
	</ul>
</div>
<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
<div id="biweb">
<table border="0" cellspacing="0" cellpadding="0" class="biweb">
    <tr class="firstr">
    <td colspan="2">Google sitemap</td>
    </tr>
  <tr>
  	<td width='15%'>首页更新优先级：</td>
    <td><select name="homepage_priority">
			<option label="1" value="1">1</option>
			<option label="0.9" value="0.9">0.9</option>
			<option label="0.8" value="0.8">0.8</option>
			<option label="0.7" value="0.7">0.7</option>
			<option label="0.6" value="0.6">0.6</option>
			<option label="0.5" value="0.5">0.5</option>
			<option label="0.4" value="0.4">0.4</option>
			<option label="0.3" value="0.3">0.3</option>
			<option label="0.2" value="0.2">0.2</option>
			<option label="0.1" value="0.1">0.1</option>
		</select>
		<select name="homepage_changefreq">
			<option label="一直更新" value="always" selected="selected">一直更新</option>
			<option label="小时" value="hourly">小时</option>
			<option label="天" value="daily">天</option>
			<option label="周" value="weekly">周</option>
			<option label="月" value="monthly">月</option>
			<option label="年" value="yearly">年</option>
			<option label="从不更新" value="never">从不更新</option>
		</select>设定首页更新优先级
	</td>
	</tr>  
	<tr>
    <td>列表页更新优先级：</td>
    <td><select name="category_priority">
			<option label="1" value="1">1</option>
			<option label="0.9" value="0.9">0.9</option>
			<option label="0.8" value="0.8" selected="selected">0.8</option>
			<option label="0.7" value="0.7">0.7</option>
			<option label="0.6" value="0.6">0.6</option>
			<option label="0.5" value="0.5">0.5</option>
			<option label="0.4" value="0.4">0.4</option>
			<option label="0.3" value="0.3">0.3</option>
			<option label="0.2" value="0.2">0.2</option>
			<option label="0.1" value="0.1">0.1</option>
		</select>
		<select name="category_changefreq">
			<option label="一直更新" value="always">一直更新</option>
			<option label="小时" value="hourly">小时</option>
			<option label="天" value="daily" selected="selected">天</option>
			<option label="周" value="weekly">周</option>
			<option label="月" value="monthly">月</option>
			<option label="年" value="yearly">年</option>
			<option label="从不更新" value="never">从不更新</option>
		</select>设定列表页更新优先级
	</td>
   </tr>
   <tr>
    <td>内容页更新优先级：</td>
    <td><select name="content_priority">
			<option label="1" value="1">1</option>
			<option label="0.9" value="0.9" selected="selected">0.9</option>
			<option label="0.8" value="0.8">0.8</option>
			<option label="0.7" value="0.7">0.7</option>
			<option label="0.6" value="0.6">0.6</option>
			<option label="0.5" value="0.5">0.5</option>
			<option label="0.4" value="0.4">0.4</option>
			<option label="0.3" value="0.3">0.3</option>
			<option label="0.2" value="0.2">0.2</option>
			<option label="0.1" value="0.1">0.1</option>
		</select>
		<select name="content_changefreq">
			<option label="一直更新" value="always">一直更新</option>
			<option label="小时" value="hourly">小时</option>
			<option label="天" value="daily" selected="selected">天</option>
			<option label="周" value="weekly">周</option>
			<option label="月" value="monthly">月</option>
			<option label="年" value="yearly">年</option>
			<option label="从不更新" value="never">从不更新</option>
		</select>设定内容页更新优先级
	</td>
    </tr>
	<tr>
    <td>设定更新日期：</td>
    <td><select name="today">
			<option label="否" value="0">否</option>
			<option label="是" value="1">是</option>
		</select>选否，搜索引擎每次都更新，选是，搜索引擎比较更新时间后，有变化的才更新
	</td>
    </tr>
	<tr>
		<td align="middle" colSpan="2"><input type="submit" id="okgo" name="okgo" value="确　定"> <input type="reset" value="重 置"></td>
	</tr>
</table>
</div>
</form>