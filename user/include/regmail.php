<?
$title="中国社区注册确认信";
$text="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=gb2312'>
<title></title>
</head>
<body>
<pre>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>尊敬的用户：<br>
      　　欢迎您使用中国社区给您提供的各种服务。<br> <br>
      现在需要您点击下面的超级链接进行邮件认证<br>
      <a href='http://www.waggens.com/web1/user/vir.php?a=".$_SESSION['user_id']."&b=".$_SESSION['nikename']."' target='_blank'><font color='#ff9900'><b>点击此处激活账号</b></font></a><br>
      如果此链接无法点击，请将此 http://www.waggens.com/web1/user/vir.php?a=".$_SESSION['user_id']."&b=".$_SESSION['nikename']." 链接复制到浏览器地址栏上运行,进行帐号激活。<br>
      <br>
      谢谢您对中国社区的支持。<br>
      <br>
   </td>
  </tr>
</table>
</pre>
</body>
</html>
";
?>