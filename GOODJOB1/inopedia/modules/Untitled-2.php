<?
if (isset($_REQUEST['save']))
{

$j='mp3 files/'.$_FILES['mp3']['name'];
move_uploaded_file($_FILES['mp3']['tmp_name'],'../mp3 files/'.$_FILES['mp3']['name']);
mysql_query("insert into mp3 (mp3, title)values('$j', '$_REQUEST[title]')");	
 
$header='<?xml version="1.0" encoding="UTF-8"?>
<player showDisplay="yes" showPlaylist="yes" autoStart="yes">';
$foter='</player>';
$d=mysql_query("select * from mp3 order by id desc");
while($data=mysql_fetch_array($d))
{
$content.='<song path="'.$data['mp3'].'" title="'.$data['title'].'" />';	
}
$con=$header.$content.$foter;
$fop=fopen('../mp3player.xml','w');
fwrite($fop,$con);
}

?>

<table width="" bgcolor="#CCCCCC" align="center">
<tr>
<td bgcolor="#CCCCCC" colspan="50" id="linkebi" align="center"> 
 <script>
function showdiv(name){
	var obj = (document.getElementById)? document.getElementById(name) : eval("document.all[name]");
	obj.style.display="";
}
function hidediv(name){
	var obj = (document.getElementById)? document.getElementById(name) : eval("document.all[name]");
	obj.style.display="none";
}
 </script>  
<table id="linkebi" align="center" bgcolor="#CCCCCC">
<tr><td>|<a href="index.php">მთავარი</a></td><td>|<a href="Coment.php">კომენტარები</a></td>
<td>|<a onClick="showdiv('poss')">MP3</a></td>
<td>|<a href="banner.php">baner manager</a></td><td> |<a href="index.php?logoff">Sign out </a></td></tr></table>
  </td></tr>
  
<tr>
<td width="541" bgcolor="#000000">
<style>
.pos
{
position:absolute;
left:250px;
top:150px;
}
</style>
<table width="400" height="400" bgcolor="#999999" class="pos" id="poss" style="display:none;">
<tr>
<td onClick="hidediv('poss')" height="10"> <font size="+2" color="#FFFFFF">
Close </font></td>
</tr>
<tr>
<td>
<? 
if ($_REQUEST['deletemp3'])
{
mysql_query("delete from mp3 where id='$_REQUEST[mp3id]'");
$header='<?xml version="1.0" encoding="UTF-8"?>
<player showDisplay="yes" showPlaylist="yes" autoStart="yes">';
$foter='</player>';
$d=mysql_query("select * from mp3 order by id desc");
while($data=mysql_fetch_array($d))
{
$content.='<song path="'.$data['mp3'].'" title="'.$data['title'].'" />';	
}
$con=$header.$content.$foter;
$fop=fopen('../mp3player.xml','w');
fwrite($fop,$con);
}

$s=mysql_query("select * from mp3 order by id desc");
while ($d=mysql_fetch_array($s))
{
echo $d['mp3'];
?>

<form action="" method="post">
<input type="submit" name="deletemp3">
<input type="hidden" name="mp3id" value="<? echo $d['id']; ?> ">
</form>
<?
}
?> 
<form action="" method="get" enctype="multipart/form-data">
<input type="text" name="title">
<input type="file" name="mp3">
<input type="submit" name="save">

</form>
</td>
</tr>
</table>
</td></tr>
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
<tr>
<td>
<hr>
<?php
 $r=0;
$a=mysql_query("select * from cxrili order by id desc");
while ($b=mysql_fetch_array($a))

{
$r++; //echo $r;
}
$div=$r/10;

for($i=1;$i<=$div;$i++)
{
echo '<a href="index.php?limit='.$i.'0">'.$i.'</a>';	

}

?> 



<?
$sublim=$_REQUEST['limit']-10;
if($_REQUEST['limit'])
$lim='limit '.$sublim.','.$_REQUEST['limit'];
else
$lim='';
$a=mysql_query("select * from kultura_cxrili order by id desc $lim");
while($b=mysql_fetch_array($a))

{
	
?>


 <table cellpadding="0" cellspacing="0">
<tr>
<td width="700" bgcolor="#FFFFFF" align="left"> 
<a href="index.php?do=update&id=<? echo $b['id']; ?>">edit</a>
<div style="background-color:#FCF8C2"><? echo $b['saxeli'];?></div>
<? echo $b['date'] ?> 
<? echo $b['gvari'];?><br>
<? echo $_REQUEST['date']; ?> 
<input type="checkbox"  name="del"  checked style="display:none;" value="<? echo $b['id'];?>" >
<input name="delete" type="submit"  value="delete">
<hr> </td></tr>
    </table>	
	
	<? }?>
</td></tr>
<tr>
 
 <td width="318" bgcolor="#CCCCCC"> 

<table>
<tr>
<td bgcolor="#FFFFFF"> 
<p>MENU <br>
         <select  name="kategory"  >
           <option value="mtavari">მთავარი</option> 
           <option value="leqsebi">ლექსები</option>
           <option value="proza">პროზა </option>
		   <option value="romani">რომანი </option>
		   <option value="filosofia">ფილოსოფია </option>
		   <option value="mp3">MP3-POETRY</option>
           <option value="kritika"> კრიტიკა </option>
           <option value="interviu"> ინტერვიუ </option>
           <option value="porno-art"> porno-art </option>
           <option value="media"> მედია </option>
           <option value="glamuri">გლამური</option>
		   <option value="qveda_menu"> =================== </option>
		    <option value="bestselerebi"> ბესტსელერები </option>
			 <option value="premiebi"> პრემიები </option>
			 <option value="magaziebi"> მაღაზიები </option>
			 <option value="jurnalebi"> ჟურნალები</option>
			 <option value="linkebi"> ლინკები </option>
			 <option value="blogebi">ბლოგები </option>
			 <option value="bibliotekebi"> ბიბლიოთეკები </option>
			 <option value="konkursebi"> კონკურსები </option>
        </select>
    </p>


<input type="file" name="upload">
image
<br>
<input type="file" name="mp3">
 MP3 <br />
<input name="saxeli" type="text" size="50"> სათაური  
<br>
<input name="abc" type="text"  size="50"> ავტორი <br> 

<div style="width:300"> <textarea name="gvari" cols="21" rows="4" class="style12" > </textarea> 
აღწერა
 </div> <br> <br>

 <textarea name="agwera" cols="50" rows="12" class="style7"></textarea>
 <br>
 
   <input type="submit" name="submit" value="გამოქვეყნება"></td></tr>

  </table>
	
	</td></tr></form></table>


	