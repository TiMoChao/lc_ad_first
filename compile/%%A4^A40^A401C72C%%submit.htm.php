<?php /* Smarty version 2.6.20, created on 2015-06-05 01:06:09
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Ctender_ad%5Cconfig/../../templates/1/tender_ad/adminu/submit.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\tender_ad\\config/../../templates/1/tender_ad/adminu/submit.htm', 83, false),array('modifier', 'htmlspecialchars', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\tender_ad\\config/../../templates/1/tender_ad/adminu/submit.htm', 88, false),array('modifier', 'stripslashes', 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\lc_ad\\tender_ad\\config/../../templates/1/tender_ad/adminu/submit.htm', 88, false),)), $this); ?>
 <div class="area">
	<!-- 块 开始 -->
	<div class="mainright">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "useradmin/_cloumnright.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<!-- 介绍 开始 -->
	<div class="mainleft">
		<div class="help-right">
		<div id="companies-list-box">
			<div class="tit"><h2><?php echo $this->_tpl_vars['arrGWeb']['module_name']; ?>
</h2></div>
			<script language="javascript" src="../../plug-in/ImgPreview/imgP.js"></script>
			<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data"><table class="showes-list">
			
				<tr class="showes-listes">
					<th width="15%">设置名称</th>
					<th width="55%">基本参数设置</th>
					<th width="30%">设置说明</th>
				</tr>
				<tr>
					<td>所属分类：<span class='font-red'>(必填)</span></td>
					<td>
					<select size="1" name="type_id">
						<option value="0">请选择分类</option>
						<?php $_from = $this->_tpl_vars['arrType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
					</select>
					</td>
					<td>信息分类</td>
				</tr>
				<tr>
					<td>广告招标标题：<span class='font-red'>(必填)</span></td>
					<td><input maxLength="210" size="55" name="title" value="<?php echo $this->_tpl_vars['arrData']['title']; ?>
"></td>
					<td>标题，最大70个中文</td>
				</tr>
			
			
				 <tr>
                      <td>联系人：</td>
                      <td><input maxLength=210 size=55 name=meitileixing value="<?php echo $this->_tpl_vars['arrData']['meitileixing']; ?>
"></td>
                      <td><span class=gray></span></td>
				</tr>
				 <tr>
                      <td>联系电话：</td>
                      <td><input maxLength=210 size=55 name=city_area value="<?php echo $this->_tpl_vars['arrData']['city_area']; ?>
"></td>
                      <td><span class=gray></span></td>
			    </tr>
				<tr>
    <td>手机：</td>
  
	<td><input maxLength=210 size=55 name=diliweizhimiaoshu value="<?php echo $this->_tpl_vars['arrData']['diliweizhimiaoshu']; ?>
"></td>

    <td><span class=gray></span></td></tr>
	
				<tr>
                      <td>单位名称：</td>
                      <td><input maxLength=210 size=55 name=zhixingjiage value="<?php echo $this->_tpl_vars['arrData']['zhixingjiage']; ?>
"></td>
                      <td><span class=gray></span></td>
			    </tr>
								
				<tr>
                       <td>单位地址：</td>
                       <td><input maxLength=210 size=55 name=toufangzhuangtai value="<?php echo $this->_tpl_vars['arrData']['toufangzhuangtai']; ?>
"></td>
                       <td><span class=gray></span></td>
			   </tr>
				<tr>
                       <td>传真：</td>
                       <td><input maxLength=210 size=55 name=zuishaotoufangliang value="<?php echo $this->_tpl_vars['arrData']['zuishaotoufangliang']; ?>
"></td>
                        <td><span class=gray></span></td>
				</tr>
				 <tr>
    <td>网址：</td>
    <td><input maxLength=210 size=55 name=zuiduantoufangzhouqi value="<?php echo $this->_tpl_vars['arrData']['zuiduantoufangzhouqi']; ?>
"></td>
    <td><span class=gray></span></td></tr>
	

				<tr>
					<td>关键字：</td>
					<td><input maxLength="210" size="55" name="tag" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['arrData']['tag'])) ? $this->_run_mod_handler('default', true, $_tmp, '无') : smarty_modifier_default($_tmp, '无')); ?>
"></td>
					<td>关键字，便于文章索引</td>
				</tr>
				<!--<tr>
					<td>广告详细内容：<span class='font-red'>(必填)</span></td>
					<td colspan="2"><textarea name="intro" rows="8" cols="70"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrData']['intro'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : htmlspecialchars($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
				</tr>-->
				<tr id=ArticleContent <?php if ($this->_tpl_vars['arrData']['linkurl'] != ''): ?>style='display:none'<?php endif; ?>>
    <td>广告详细内容：</td>
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
				<?php if ($this->_tpl_vars['arrData']['photo']['0'] == ''): ?>
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
				<?php endif; ?>
				</table>

				</td>
				  </tr>				
				<tr>
					<td colspan="3" align="center"><input type="submit" id="okgo" name="okgo" value="确　定"> <input type=reset value="重 置"></td>
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
  <input type="hidden" name="submitpass" value="<?php echo $_SESSION['submitpasskey']; ?>
">
				</table></form>
<script language="javascript">
	function addFj(){
	  var oTb = document.getElementById("tb1");
	  var oTr = oTb.insertRow(-1);
	  var num = parseInt(document.form1.fjCnt.value)+1;
	  var no  = parseInt(document.form1.fjCnt.value);
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
			
		</div>
	</div>
	</div>
	<!-- 介绍 结束 -->
</div>
<div class="block10"></div>