<?php
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 
	$b2='images/'.$_FILES['upload2']['name']; 
	$b3='images/'.$_FILES['upload3']['name']; 
	$b4='images/'.$_FILES['upload4']['name']; 
    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
move_uploaded_file($_FILES['upload2']['tmp_name'], '../images/'.$_FILES['upload2']['name']);
move_uploaded_file($_FILES['upload3']['tmp_name'], '../images/'.$_FILES['upload3']['name']);
move_uploaded_file($_FILES['upload4']['tmp_name'], '../images/'.$_FILES['upload4']['name']);
	
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";

$sql="insert into kultura_cxrili (kategory, subkat, upload, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


mysql_query($sql);
 
 
 
}


if ($_POST['delete'])
{
$x=mysql_query("select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysql_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysql_query("DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>



  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>

  

 
<table width="744" bgcolor="#F0F0F0" border="1px" align="center">
<tr>
<td width="744" align="center" bgcolor="#F0F0F0" id="linkebi"> 
 
 
 
 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="index.php">მთავარი</a>  </li>
  <li><a href="index.php?do=Coment">Coment</a></li>
  <li><a class="MenuBarItemSubmenu" href=" ">managers</a>
      <ul>
        <li><a  href="index.php?do=password">Pass. manager</a>        </li>
        <li><a href="index.php?do=banner">Banner manager</a></li>
        <li><a href="index.php?do=images">Image manager</a></li>
        <li><a href="index.php?do=poll_vote">Poll manager</a></li>
      </ul>
  </li>
  <li><a href="index.php?logoff">Sign out</a></li>
</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>

<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style="height:35px"  size="18" />
   <input name="Submit" type="submit" value="Go"/>   
</form></td>   

<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>
<tr><td bgcolor="#F0F0F0" width="744">
 
<?php
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysql_query($sql);
while ($b=mysql_fetch_array($a))
{
 ?> 

 

<div style="background-color:#FFFFFF;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  
	  </div></td></form></tr>
 
	
 

 
<td style="background-color: #F0F0F0;" width="744">
<? 
if ($_REQUEST['addavtor'])
{	
if(move_uploaded_file($_FILES['mp3']['tmp_name'], '../mp3/'.$_FILES['mp3']['name']))
$m='mp3/'.$_FILES['mp3']['name'];
else $m='';
mysql_query("insert into avtorebi(avtori,mp3)values('$_POST[avtori]','$m')");
}
if ($_REQUEST['avtor_delete'])
mysql_query("delete from avtorebi where id='$_REQUEST[avtoris_id]'");

?> <form action="" method="post" enctype="multipart/form-data" >

  <br />
<input type="text" name="avtori" />
<input type="submit" name="addavtor">
<br />
<select name="avtoris_id">
    <?
	 $avt=mysql_query("select * from  avtorebi order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avtor_delete" value="delete" /> 
</form><br>  
 
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
 
 
 

 <select  name="subkat" style="width:320px">
	<option value="no">no</option> 
		   <option value="yes" style="color:#FF0000">yes</option>
      </select>  გავუშვათ TOP–თემებში <br /> <br />
		   
		   

      <select  name="kategory" style="width:320px">
    <option value="mtavari">მთავარი</option>
    <option value="procontra">პრო და კონტრა</option>
    <option value="news">news</option>
    <option value="პოეზია">ლექსები</option>
    <option value="პროზა">პროზა </option>
    <option value="რომანი">რომანი </option>
    <option value="mp3">MP3-POETRY</option>
    <option value="ფილოსოფია">ფილოსოფია </option>
    <option value="არტი & ტექნოლოგიები"> არტი & ტექნოლოგიები </option>
    <option value="visual-art"> VISUAL_ART</option>
    <option value="კრიტიკა/ესსე"> კრიტიკა </option>
    <option value="ინტერვიუ"> ინტერვიუ </option>
       <option value="მიმოხილვა"> მულტიმედია</option>
    <option value="დისკუსია"> მრგვალი მაგიდა (დისკუსია) </option>
    <option value="მუსიკა">მუსიკა</option>
    <option value="მედია"> მედია </option>
    <option value="პოლიტიკა"> პოლიტიკა </option>
    <option value="qveda_menu"> =================== </option>
    <option value="afisha"> აფიშა </option>
    <option value="wignebi"> წიგნები </option>
    <option value="ბლოგები"> ბლოგები</option>
    <option value="online"> ვებ–სერიალი</option>
  </select>		   
 MENU <br>
</p>


<input type="file"  name="upload" />

მთავარი სურათი <br>  
 
<input type="file"  name="upload2" /> სურათი ტექსტში <br>
<input type="file"  name="upload3" /> სურათი ტექსტში 1 <br>
<input type="file"  name="upload4" /> სურათი ტექსტში 2<br>



<input type="file" name="mp3"> MP3 ფაილი <br />

<br><select name="avtori">
     <?
	 $avt=mysql_query("select * from  avtorebi order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> ავტორი <br>

 
<textarea  name="satauri" cols="70" rows="2" >&nbsp;</textarea> <div style="position:relative; top:-90px; left: 590px"> სათაური </div> 
 


<textarea  name="agwera" id="agwera" cols="70" rows="5" >&nbsp;</textarea>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script>

 <div style="position:relative; top:-140px; left: 590px"> აღწერა </div>
 
 
<textarea name="full" id="full" cols="70" rows="12"></textarea>

<script type="text/javascript">
CKEDITOR.replace('full');
</script>



  <div style="position:relative; top:-250px; left: 590px"> სრულიად </div>
 
   <input type="submit"   name="submit" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   <br>
   
  </td> 
   </tr>

  </table>   
	 



  