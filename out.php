<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh" dir="ltr">
<head>
    <title>
<?php
$name = $_POST["something"];
echo $name;
?>	
	</title>
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
td
{
background-color:gray;
}
h1,button
{
text-align:center;
}
#xy
{
margin-left:300px;
}
#ss
{
text-align:center;
height:50px;
width:300px;
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
	 $sql="SELECT `英雄号` FROM `hero` WHERE `英雄名`=\"$name\";";
	 
	 $result = mysql_query($sql);
	 if(!$result)
	 {
		echo "<p><br/>查询出错<br/></p>";
		exit();
	 }
	 $num = mysql_result($result,0);
	 $sql="SELECT `个人暴率`,`暴率`,`物品名` FROM `suoyin`,`dongxi` WHERE suoyin.英雄号=$num AND suoyin.物品号=dongxi.物品号;";
	 $result = mysql_query($sql);
	 if(!$result)
	 {
		echo "<p><br/>查询出错<br/></p>";
		exit();
	 }
	 echo "<h1>金庸书中部分英雄榜</h1>";
	   echo "<table>";
	   echo "<tr  ><th  >英雄名</th><th  >个人暴率</th><th  >物品名</th><th  >物品暴率</th><th  >你的人品</th></tr>";
	 while($row = mysql_fetch_array($result))
	 {
		echo "<tr  >";
		echo "<td  >";
		echo	$name;
		echo	"</td>";
		//echo	"<a herf=\"http://baidu.com\">";
		echo	"<td>";
		echo	$row['个人暴率'];
		echo	"</td>";
		echo	"<td  >";
		echo	$row['物品名'];
		echo	"</td>";
		echo	"<td  >";
		echo	$row['暴率'];
		echo	"</td>";
		$person =rand(0,$row['个人暴率']);
		$thing  =rand(0,$row['暴率']);
		$thing =$person+$thing;
		if($thing>= 50)
		echo 	"<td>"."恭喜你获得了此装备^_^"."</td>";
		else
		echo 	"<td>"."遗憾该boss不给你面子，太吝啬了)_("."</td>";
		echo 	"</tr>";
	 }
		echo	"</table>";
	
	mysql_close($link);
?>
<a id ="xy" href="WOW.php"><button id="ss" >返回前面再碰碰人品～_^</button></a>
</body>
</html>