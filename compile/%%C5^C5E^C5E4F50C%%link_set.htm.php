<?php /* Smarty version 2.6.20, created on 2015-06-14 07:35:40
         compiled from C:%5CProgram+Files+%28x86%29%5CZend%5CApache2%5Chtdocs%5Clc_ad%5Cadmin%5Cconfig/../../admin/templats/seo/link_set.htm */ ?>
<div class="ccc2">
	<ul>
		<li>本网站系统采用了伪静态页面技术和真实静态页面技术，伪静态页面技术应用于首页、列表页等更新变化较快的页面，真实静态页面技术应用于信息详细内容页及网站说明页等更新较慢的页面；
	这些技术的应用使的整个动态网站从链接看起来完全像一个静态页面网站，从而大大提高了对搜索引擎的友好度，使得网站内容能够最大化的被搜索引擎收录；<br>
	<font color="#ff6600s">如果您的系统不允许您修改apache配置,那么您就需要关闭静态化处理,以保证网站正常运行！</font>
		</li>
	</ul>
</div>
<form name="form1" id="form1" onsubmit="return checkForm()" action="" method="post" enctype="multipart/form-data">
<div id="biweb">
<table border="0" cellspacing="0" cellpadding="0" class="biweb">
    <tr class="firstr">
    <td colspan="2">链接优化</td>
    </tr>
	<tr>
	  <td width='15%'>无后缀程序支持：</td>
      <td>
	  <select name="FileExt_state">	
			<option value="1" <?php if ($this->_tpl_vars['arrGWeb']['FileExt_state'] == 1): ?>selected="selected"<?php endif; ?>>支持</option>
			<option value="0" <?php if ($this->_tpl_vars['arrGWeb']['FileExt_state'] == 0): ?>selected="selected"<?php endif; ?>>屏蔽</option>
	   </select>在apache中配置静态优化代码才能支持无后缀名的PHP程序运行
	   </td>
    </tr>
	<tr>
	  <td>静态链接优化：</td>
      <td>
	  <select name="URL_static">	
			<option value="1" <?php if ($this->_tpl_vars['arrGWeb']['URL_static'] == 1): ?>selected="selected"<?php endif; ?>>开启</option>
			<option value="0" <?php if ($this->_tpl_vars['arrGWeb']['URL_static'] == 0): ?>selected="selected"<?php endif; ?>>关闭</option>
	  </select>开启会更将动态链接转化为静态链接
	   </td>
    </tr>
	<tr>
	  <td>模拟文件后缀名：</td>
      <td><input value="<?php echo $this->_tpl_vars['arrGWeb']['file_suffix']; ?>
" name="file_suffix">可模拟成任何后缀文件名,"."必须存在</td>  
    </tr>
	<tr>
	  <td>生成静态文件：</td>
      <td>
	  <select name="file_static">	
			<option value="1" <?php if ($this->_tpl_vars['arrGWeb']['file_static'] == 1): ?>selected="selected"<?php endif; ?>>开启</option>
			<option value="0" <?php if ($this->_tpl_vars['arrGWeb']['file_static'] == 0): ?>selected="selected"<?php endif; ?>>关闭</option>
	  </select>开启会生成静态文件，可以提升服务器性能
	   </td>
    </tr>	
	<tr>
		<td align="middle" colSpan="2"><input type="submit" id="okgo" name="okgo" value="确　定"> <input type="reset" value="重 置"></td>
	</tr>
</table>
</div>
</form>