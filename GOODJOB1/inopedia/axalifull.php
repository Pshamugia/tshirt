<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.kultura.ge</title>
<link href="logo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div align="left" id="qve" style="width:415px">
 
<a href="<? echo $_SERVER['HTTP REFERER'];?>" > მთავარ გვერდზე გადასვლა </a> </div> <br />
<?
$a=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$b=mysql_fetch_array($a); ?>
<div align="left"><img src="<? echo $b['surati'];?>" width="170" align="left">
<div align="left" style="background-color:#000000"><b><? echo $b['saxeli'];?>  </b> <br />
<div align="left" style="font-style:italic">
<? echo $b['abc']; ?></div>  </div>
<div align="justify"> <? echo $b['gvari'];?>  </div>
<div align="justify"><? echo $b['agwera'] ?> </div> </div>

 





</body>
</html>