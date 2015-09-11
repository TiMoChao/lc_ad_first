<?php /* Smarty version 2.6.20, created on 2015-06-04 15:38:35
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5CNewspapers_magazines%5Cconfig/../../Newspapers_magazines/admin/templats/submit.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlspecialchars', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\Newspapers_magazines\\config/../../Newspapers_magazines/admin/templats/submit.htm', 124, false),array('modifier', 'stripslashes', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\Newspapers_magazines\\config/../../Newspapers_magazines/admin/templats/submit.htm', 124, false),)), $this); ?>
<script language='javascript' src='../../plug-in/splidword/prototype.js'></script>
<script language="javascript" src="../../plug-in/splidword/splidword.js"></script>
<script language="javascript" src="../../plug-in/PopCalender/popcalendar.js"></script> 
<script language="javascript" src="../../plug-in/area/myjsframe.js"></script> 
<script language="javascript" src="../../plug-in/area/area.js"></script> 
<script Language="JavaScript">dateformat='yyyy-mm-dd'</script>

<div class="ccc2">
	<ul>
		<li>
			<span class="right"><input type="button" onClick="javascript:history.back();" value="返回新闻列表" class="gray mini"></span>
			当前位置：<?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
管理
	 </li>
	</ul>
</div>
<form name="form1" id="form1" onsubmit="return checkform()" action="?page=<?php echo $_GET['page']; ?>
" method="post" enctype="multipart/form-data">
<div id="biweb">
<table class="biweb" align="center" cellspacing="0">
	<tr class="firstr">
		<td colspan="3">编辑<?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
：</td> 
	</tr>	
	<tr>
    <td width="15%">所属分类：</td>
    <td><select size="1" name="type_id">
		<option value="0">请选择分类</option>
		<?php $_from = $this->_tpl_vars['arrMType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['type']):
?>
		<?php if (is_array ( $this->_tpl_vars['type'] ) && array_key_exists ( 'type_title' , $this->_tpl_vars['type'] )): ?>
		<option value="<?php echo $this->_tpl_vars['type']['type_id']; ?>
|<?php echo $this->_tpl_vars['type']['type_roue_id']; ?>
" <?php if (! empty ( $this->_tpl_vars['type']['type_link'] )): ?>disabled='disabled'<?php endif; ?> <?php if ($this->_tpl_vars['type']['type_id'] == $this->_tpl_vars['arrData']['type_id']): ?>selected=selected<?php endif; ?>><?php echo $this->_tpl_vars['type']['type_title']; ?>
</option>
		<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['arrData']['type_id']): ?>selected=selected<?php endif; ?>><?php echo $this->_tpl_vars['type']; ?>
</option>    	
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
    	</select></td>
    <td><font color="red">*</font><span class=gray>报纸杂志分类</span></td></tr>
  <tr>
  	<td>标题：</td>
    <td><select size=1 name=bedeck>
	<option value="0">无修饰</option>
	<option value="1" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 1): ?>selected<?php endif; ?>>1[加粗]</option>
	<option value="2" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 2): ?>selected<?php endif; ?>>2[标红]</option>
	<option value="3" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 3): ?>selected<?php endif; ?>>3[标绿]</option>
	<option value="4" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 4): ?>selected<?php endif; ?>>4[标蓝]</option>
	<option value="5" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 5): ?>selected<?php endif; ?>>5[标橙]</option>
	<option value="6" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 6): ?>selected<?php endif; ?>>6[红粗]</option>
	<option value="7" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 7): ?>selected<?php endif; ?>>7[绿粗]</option>
	<option value="8" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 8): ?>selected<?php endif; ?>>8[蓝粗]</option>
	<option value="9" <?php if ($this->_tpl_vars['arrData']['bedeck'] == 9): ?>selected<?php endif; ?>>9[橙粗]</option>
	</select>
	<input maxLength=210 size=55 id=title name=title value="<?php echo $this->_tpl_vars['arrData']['title']; ?>
" onblur="dodivde();"></td>
    <td><font color="red">*</font><span class=gray>标题，最大70个中文</span></td></tr>
<tr>
    <td>公司名称：</td>
    <td><input maxLength=210 size=55 name=gongsimingceng value="<?php echo $this->_tpl_vars['arrData']['gongsimingceng']; ?>
"></td>
    <td><span class=gray></span></td></tr> 
 <tr>
    <td>页面标题：</td>
    <td><input maxLength=210 size=55 name=meta_Title value="<?php echo $this->_tpl_vars['arrData']['meta_Title']; ?>
"></td>
    <td><span class=gray>用于搜索引擎优化，不填系统会自动生成</span></td></tr>
	 <tr>
    <td>媒体类型：</td>
    <td><input maxLength=210 size=55 name=meitileixing value="<?php echo $this->_tpl_vars['arrData']['meitileixing']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>所在地区：</td>
    <td><input maxLength=210 size=55 name=city_area value="<?php echo $this->_tpl_vars['arrData']['city_area']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>执行价格：</td>
    <td><input maxLength=210 size=55 name=zhixingjiage value="<?php echo $this->_tpl_vars['arrData']['zhixingjiage']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>媒体状态：</td>
    <td><input maxLength=210 size=55 name=toufangzhuangtai value="<?php echo $this->_tpl_vars['arrData']['toufangzhuangtai']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>最少投放量：</td>
    <td><input maxLength=210 size=55 name=zuishaotoufangliang value="<?php echo $this->_tpl_vars['arrData']['zuishaotoufangliang']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>最短投放周期：</td>
    <td><input maxLength=210 size=55 name=zuiduantoufangzhouqi value="<?php echo $this->_tpl_vars['arrData']['zuiduantoufangzhouqi']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	 <tr>
    <td>联系方式：</td>
    <td><input maxLength=210 size=55 name=lianxifangshi value="<?php echo $this->_tpl_vars['arrData']['lianxifangshi']; ?>
"></td>
    <td><span class=gray></span></td></tr> <tr>
    <td>估计人（车）日流量：</td>
    <td><input maxLength=210 size=55 name=gujiren_cheliuliang value="<?php echo $this->_tpl_vars['arrData']['gujiren_cheliuliang']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	<tr>
    <td>媒体规格：</td>
    <td><input maxLength=210 size=55 name=meitiguige value="<?php echo $this->_tpl_vars['arrData']['meitiguige']; ?>
"></td>
    <td><span class=gray></span></td></tr><tr>
    <td>照明方式：</td>
    <td><input maxLength=210 size=55 name=zhaomingfangshi value="<?php echo $this->_tpl_vars['arrData']['zhaomingfangshi']; ?>
"></td>
    <td><span class=gray></span></td></tr>
   <tr>
    <td>页面摘要：</td>
    <td><textarea name=meta_Description rows=3 cols=50><?php echo $this->_tpl_vars['arrData']['meta_Description']; ?>
</textarea></td>
    <td><span class=gray>用于搜索引擎优化，不填系统会自动生成</span></td></tr>
  <tr>
    <td>页面关键字：</td>
    <td><textarea name=meta_Keywords rows=3 cols=50><?php echo $this->_tpl_vars['arrData']['meta_Keywords']; ?>
</textarea></td>
    <td><span class=gray>用于搜索引擎优化，不填系统会自动生成</span></td>
  </tr> 
  <tr>
    <td>详细信息标签：</td>
    <td><input maxLength=50 size=50 id=tag name=tag value="<?php echo $this->_tpl_vars['arrData']['tag']; ?>
"></td>
    <td><span class=gray>文章关键字，可为多个，用空格间隔，用于相关信息关联</span></td>
  </tr>
<tr>
    <td>地理位置信息描述：</td>
    <td><textarea name=diliweizhimiaoshu rows=3 cols=50><?php echo $this->_tpl_vars['arrData']['diliweizhimiaoshu']; ?>
</textarea></td>
    <td><span class=gray></span></td></tr>
	<tr>
    <td>公司简介：</td>
    <td><textarea name=gongsijianjie rows=3 cols=50><?php echo $this->_tpl_vars['arrData']['gongsijianjie']; ?>
</textarea></td>
    <td><span class=gray></span></td></tr>
	
	
  <tr id=ArticleContent <?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?>style='display:none'<?php endif; ?>>
    <td>信息描述：</td>
    <td colspan="2"><?php if ($_SESSION['browser']['0'] == 'ie'): ?>
	<input type=hidden name=intro value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData']['intro'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"> <iframe id=eWebEditor1 
      src="../../plug-in/eWebEditor/ewebeditor.htm?id=intro&style=light" frameBorder=0 width=600 scrolling=no 
      height=350></iframe>
	<?php else: ?>
	<input id=content style="DISPLAY: none" type=hidden name="intro" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData']['intro'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"> 
	<input id=content___Config style="DISPLAY: none" type=hidden> 
	<iframe id=content___Frame src="../../plug-in/fckeditor/editor/fckeditor.html?InstanceName=intro&Toolbar=ArthurXF" frameBorder=0 width=600 scrolling=no height=350> 
	</iframe>
	<?php endif; ?><font color="red">*</font><span class=gray>必填项</span></td>  
  </tr> 
  
   
  <tr>
    <td>上传图片：</td>
    <td colSpan=2>
	<table id="tb1" border=0 cellspacing=0 cellpadding=3 >
	<?php $_from = $this->_tpl_vars['arrData']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['photo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['photo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['photo']):
        $this->_foreach['photo']['iteration']++;
?>
	<tr>
	<td>
	<span>图片<?php echo ($this->_foreach['photo']['iteration']-1)+1; ?>
：</span><input id="Filedata<?php echo ($this->_foreach['photo']['iteration']-1); ?>
" size=70 type=file value="上 传" name="Filedata<?php echo ($this->_foreach['photo']['iteration']-1); ?>
" />  <input type=button onclick='return deloldFj(this,<?php echo ($this->_foreach['photo']['iteration']-1); ?>
)' value='删除'><br />
	说明<?php echo ($this->_foreach['photo']['iteration']-1)+1; ?>
：<input maxLength=50 size=70 name=photo_narrate<?php echo ($this->_foreach['photo']['iteration']-1); ?>
 value="<?php echo $this->_tpl_vars['photo']['photo_narrate']; ?>
" />
	<div id="tip<?php echo ($this->_foreach['photo']['iteration']-1); ?>
" class=red></div>
	<div id="preview<?php echo ($this->_foreach['photo']['iteration']-1); ?>
"><?php if (! empty ( $this->_tpl_vars['photo']['photo'] )): ?><img src="<?php echo $this->_tpl_vars['FileCallPath']; ?>
b/<?php echo $this->_tpl_vars['photo']['photo']; ?>
" boder="1" width=150 onload="resizepic(this,150)"><?php endif; ?></div>
	</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
	<td>
	<span>图片<?php echo $this->_foreach['photo']['total']+1; ?>
：</span><input id="Filedata<?php echo $this->_foreach['photo']['total']; ?>
" size=70 type=file value="上 传"  name="Filedata<?php echo $this->_foreach['photo']['total']; ?>
" /> <input type=button onclick='return delFj(this,<?php echo $this->_foreach['photo']['total']+1; ?>
)' value='删除'><br/>
	说明<?php echo $this->_foreach['photo']['total']+1; ?>
：<input maxLength=50 size=70 name=photo_narrate<?php echo $this->_foreach['photo']['total']; ?>
 value="" />
    <div id="tip<?php echo $this->_foreach['photo']['total']+1; ?>
" class=red></div>
    <div id="preview<?php echo $this->_foreach['photo']['total']+1; ?>
"></div>
	</td>
	</tr>
	</table>
    <a href="#" onclick="return addFj()">添加一张图片</a><input type="hidden" name="fjCnt" value="<?php echo $this->_foreach['photo']['total']+1; ?>
" />
	</td>
  </tr> 
  <tr>
    <td>生成缩略：</td>
    <td><input maxLength=50 size=35 name=FileListPicSize value='<?php echo $this->_tpl_vars['arrData']['FileListPicSize']; ?>
'></td>
    <td><span class=gray>设定缩略图宽像素,等比缩放,0为不生成缩略图</span></td>
  </tr>
  <tr>
    <td>发布时间：</td>
    <td><input type="text" name="submit_date" value="<?php echo $this->_tpl_vars['arrData']['submit_date']; ?>
">
		<input TYPE="button" value="" onclick='popUpCalendar(this, form1.submit_date, dateformat,-1,-1,true)' style="background-image:url(../../plug-in/PopCalender/img/Button.gif);width:25px;height:17px;border:0px;padding:0px;"></td>
    <td><span class=gray>修改文章发布时间</span></td>
  </tr> 
  <tr>
    <td>文章属性：</td>
    <td><label><input id=topflag type=checkbox value=1 name=topflag <?php if ($this->_tpl_vars['arrData']['topflag'] == 1): ?>checked<?php endif; ?>>固顶(列表) </label>
    	<label><input id=recommendflag type=checkbox value=1 name=recommendflag <?php if ($this->_tpl_vars['arrData']['recommendflag'] == 1): ?>checked<?php endif; ?>>推荐(首页) </label>
		<label><input id=hotflag onclick="javascript:document.form1.clicktimes.value=Math.round(Math.random()*1000)" 
      type=checkbox >随机点击 </label>
      会员访问等级：<select size=1 name=stars>
      <option value=5 <?php if ($this->_tpl_vars['arrData']['stars'] == 5): ?>selected<?php endif; ?>>★★★★★</option>
      <option value=4 <?php if ($this->_tpl_vars['arrData']['stars'] == 4): ?>selected<?php endif; ?>>★★★★</option>
      <option value=3 <?php if ($this->_tpl_vars['arrData']['stars'] == 3): ?>selected<?php endif; ?>>★★★</option>
      <option value=2 <?php if ($this->_tpl_vars['arrData']['stars'] == 2): ?>selected<?php endif; ?>>★★</option>
      <option value=1 <?php if ($this->_tpl_vars['arrData']['stars'] == 1): ?>selected<?php endif; ?>>★</option>
      <option value=0 <?php if ($this->_tpl_vars['arrData']['stars'] == 0): ?>selected<?php endif; ?>>无</option></select></td>
    <td><span class=gray>选择文章的一些属性</span></td>
  </tr>   
  <tr>
    <td>点击初始值：</td>
    <td><input maxLength=50 size=10 value="<?php echo $this->_tpl_vars['arrData']['clicktimes']; ?>
" name=clicktimes></td>
    <td><span class=gray>这功能是提供给管理员作弊用的</span></td>
  </tr>  
	<tr>
      <td>&nbsp;</td>
      <td align=middle colspan=3><input type=submit id="okgo" name="okgo" value=确　定> <input type=reset value="重 置"></td>
  </tr>
	<?php $_from = $this->_tpl_vars['arrData']['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['photo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['photo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['photo']):
        $this->_foreach['photo']['iteration']++;
?>
	<input type=hidden name=savephoto[] value="<?php echo $this->_tpl_vars['photo']['photo']; ?>
">
	<?php endforeach; endif; unset($_from); ?>
	<table id="delphoto" border=0 cellspacing=0 cellpadding=0 >
	</table>
	<?php $_from = $this->_tpl_vars['arrData']['video']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['video'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['video']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['video']):
        $this->_foreach['video']['iteration']++;
?>
	<input type=hidden name=savevideo[] value="<?php echo $this->_tpl_vars['video']['video']; ?>
">
	<input type=hidden name=savevideopic[] value="<?php echo $this->_tpl_vars['video']['videopic']; ?>
">
	<?php endforeach; endif; unset($_from); ?>
	<table id="delvideo" border=0 cellspacing=0 cellpadding=0 >
	</table>
	<input type=hidden name=savefilename1 value="<?php echo $this->_tpl_vars['arrData']['software']; ?>
">
	<input type=hidden name=savefilename2 value="<?php echo $this->_tpl_vars['arrData']['package']; ?>
">
	<input type=hidden name=user_id value="<?php echo $this->_tpl_vars['arrData']['user_id']; ?>
">
  <input type=hidden name=id value="<?php echo $this->_tpl_vars['arrData']['id']; ?>
">
</table>
</div>
</form>
<script language="javascript">
	function addFj(){
	  var oTb = document.getElementById("tb1");
	  var oTr = oTb.insertRow(-1);
	  var num = parseInt(document.form1.fjCnt.value)+1;
	  var no = parseInt(document.form1.fjCnt.value);
	  document.form1.fjCnt.value=num;
	  oTr.insertCell(0).innerHTML = "<span>图片"+num+"：</span><input id='file' name='Filedata"+no+"' type=file  size='70' /> <input type=button onclick='return delFj(this,"+num+")' value='删除'><br /><span>说明"+num+"：</span><input maxLength=50 size=70 name=photo_narrate"+no+"  /><br /><div id=tip"+num+" class=red></div><div id=preview"+num+"></div>";
	  return false;
	}

	function deloldFj(obj,No){
		var oTb = document.getElementById("delphoto");
		var oTr = oTb.insertRow(-1);
		var new_tr = obj.parentNode.parentNode.parentNode;
		oTr.insertCell(0).innerHTML = "<input type=hidden name=delphoto[] value="+No+">";
		new_tr.removeChild(obj.parentNode.parentNode);
		return false;
	}
	function delFj(obj,No){
		var num = parseInt(document.form1.fjCnt.value);
		var new_tr = obj.parentNode.parentNode.parentNode;
		new_tr.removeChild(obj.parentNode.parentNode);
		if (num == No){
			document.form1.fjCnt.value=num-1;
		}
		return false;
	}
</script>
<script language="javascript">
	function addFj1(){
	  var oTb = document.getElementById("tb2");
	  var oTr = oTb.insertRow(-1);
	  var num = parseInt(document.form1.fjCnt1.value)+1;
	  var no = parseInt(document.form1.fjCnt1.value);
	  document.form1.fjCnt1.value=num;
	  oTr.insertCell(0).innerHTML = "<span>视频"+num+"：</span><INPUT size=70 type=file value='上 传' name='vFiledata"+no+"' > <input type=button onclick='return delFj1(this,"+num+")' value='删除'><br/><span>截图"+num+"：</span><INPUT size=70 type=file value='上 传' name='pFiledata"+no+"' /><br/>标题"+num+"：<INPUT maxLength=50 size=70 name=video_title"+no+" /><br />简介"+num+"：<INPUT maxLength=200 size=70 name=video_narrate"+no+" /><br />时长"+num+"：<input type='text' name='video_time"+no+"'> 例如：几分几秒<br /><div id=tip99"+num+" class=red></div><div id=preview99"+num+"></div>";
	  return false;
	}

	function deloldFj1(obj,No){
		var oTb = document.getElementById("delvideo");
		var oTr = oTb.insertRow(-1);
		var new_tr = obj.parentNode.parentNode.parentNode;
		oTr.insertCell(0).innerHTML = "<INPUT type=hidden name=delvideo[] value="+No+">";
		new_tr.removeChild(obj.parentNode.parentNode);
		return false;
	}
	function delFj1(obj,No){
		var num = parseInt(document.form1.fjCnt1.value);
		var new_tr = obj.parentNode.parentNode.parentNode;
		new_tr.removeChild(obj.parentNode.parentNode);
		if (num == No){
			document.form1.fjCnt1.value=num-1;
		}
		return false;
	}
</script>