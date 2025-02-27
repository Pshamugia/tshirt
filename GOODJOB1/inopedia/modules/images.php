<?php
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysqli_query($conn, 'select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysqli_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


$sql="insert into kultura_cxrili (kategory, subkat, upload, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, full, ena, menu, date, pos, news_date)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[eng_geo]', '$_POST[img_description]', '$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', '$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '0', '$_REQUEST[news_date]')";


mysqli_query($conn, $sql);
 
	echo mysqli_error();
}


if ($_POST['delete'])
{
$x=mysqli_query($conn,  "select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn,  "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>



  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>
  <link href="logo.css" rel="stylesheet" type="text/css" />
  

  

 
  
 

  

<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>
 
 
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='images'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=images"; 	//your file name  (the name of this file)
	$limit = 24; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='images' order by id desc LIMIT $start, $limit";
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
 <? $x=0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))


{
 ?> 
 
<td valign="top" style="width:170px; padding-right:15px;">
 <img src="../<? echo $b['upload']; ?>" width="170" height="107" align="left">  
<? echo "<B>".$b['satauri']."</B>"; ?>&nbsp;&nbsp;&nbsp;<? echo $b['upload']; ?> 
<a href="index.php?do=update&id=<? echo $b['id']; ?>">  </a> 
 
<input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"    value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:transparent;"></div>
<hr color="#E1E1E1">  </td>	  	<? 
$x++;
if ($x==3) 
{
echo '<tr>';
$x=0;
} }
 ?> </tr>

</form>
 </table> <td>
    <tr>
     
 <? $w++;  echo $pagination;?> 

 
<td style="background-color: #F0F0F0;" width="744">
  
<form action="" method="post" enctype="multipart/form-data" name="rame">
<select  name="kategory" style="width:320px">
   <option value="images">images</option>
</select>		   
 
</p>


<input type="file"  name="upload" />

ატვირთე სურათი <br>  
 
 



<input type="file" name="mp3"> MP3 ფაილი <br />

<br>
<br>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script><script type="text/javascript">
CKEDITOR.replace('full');
</script>
<input type="submit"   name="submit" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   <br>
   
  </td> 
   </tr>

  </table>   
	 



  