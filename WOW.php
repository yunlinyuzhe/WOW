<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh" dir="ltr">

	<head>
	<title>简陋而“冰山一角”的人物介绍</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
<style type="text/css">

table
{
	width :100%;
	height: 60px;
	boder:4px solid black;
	padding:40px 70px 30px 70px;
}
th ,td{
border: 1px solid black;
height:40px;
text-align:center;
}
th
{
	background-color:olive;
}
td ,input
{
background-color:gray;
}
h1
{
text-align:center;
}
</style>

	</head>
	<body>
	<?php 
	 $link = mysql_connect('localhost', 'root', '');
	 if(!$link)
	 {    
		echo "<p><br/>无法连接到数据库<br/></p>";
		exit();
	 }
	 if(!mysql_select_db("wxl",$link))
	 {
	   echo "<p><br/>选择数据库失败<br/></p>";
	 }
	 mysql_query("set names utf8;");
	 $sql = "SELECT `区域名`,`英雄名`,`技能`,`物品名` FROM `zone`,`hero`,`dongxi`,`suoyin`
			WHERE zone.区域号= hero.区域号 
			AND hero.英雄号=suoyin.英雄号 
			AND suoyin.物品号 = dongxi.物品号;";
	 $result = mysql_query($sql);
	 if(!$result)
	 {
		echo "<p><br/>查询出错<br/></p>";
		exit();
	 }
		echo "<h1>金庸书中部分英雄榜</h1>";
	   echo "<table>";
	   echo "<tr  ><th  >区域名</th><th  >英雄名</th><th  >技能</th><th  >物品秘籍</th></tr>";
	 while($row = mysql_fetch_array($result))
	 {
		echo "<tr  >";
		echo "<td  >";
		echo	$row['区域名'];
		echo	"</td>";
		//echo	"<a herf=\"http://baidu.com\">";

		echo	"<form action=\"out.php\" method=\"POST\">";
		echo	"<td  >";
		echo	"<input type=\"submit\" name=\"something\" value="; 
		
		echo	$row['英雄名'];
		
		echo	">";
		echo	"</td>";
		echo	"</form>";
		
		echo	"</a>";
		echo	"<td  >";
		echo	$row['技能'];
		echo	"</td>";
		echo	"<td  >";
		echo	$row['物品名'];
		echo	"</td>";
		echo "</tr>";
	 }
		echo	"</table>";
		
	mysql_close($link);
	?>
	</body>
</html>