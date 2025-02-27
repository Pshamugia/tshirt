<table width="1000px" align="center" style="position:relative; margin-top:-20px; left:-65px; margin-bottom:-130px; z-index:0;">
<tr>
<td valign="top"> 
<h2 style="position:relative; top:12px; left:76px;"> <div style="position:relative; margin-left:25px; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <k style="position:relative; padding-left:15px;"> ვიდეო </k>  </b> </div> </h2>
<div class="contactFrm" style="position:relative; padding-top:25px; padding-left:25px;">
   
   <table style="position:relative; left:58px;">
   <tr>
   
    <?php
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 10;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo'";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=video"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo' order by id desc LIMIT $start, $limit";

	
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
			$pagination.= "<a href=\"$targetpage&page=$prev\">« წინა</a>";
		else
			$pagination.= "<span class=\"disabled\">« წინა</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">შემდეგი »</a>";
		else
			$pagination.= "<span class=\"disabled\">წინა »</span>";
		$pagination.= "</div>\n";		
	}
?>




  
<?

$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))
{
 ?> 
   <td valign="top" width="400px" style="padding-right:13px; line-height:16px;"> 
   
   <div style="position:relative; margin-left:18px;"> 
 
          <style>
		#im55 {
  height: 180px;
  transition: all .2s ease-in-out;
}

.cover55 {
  width: 346px;
  object-fit: cover;
   
}
.cover55:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>
<div align="left"> 
<a href="<?=url($b['satauri'],'b', $b['id'])?>"><img src="<?=HTTP_HOST?><? echo $b['upload'];?>" alt="" id="im55" class="cover55" style="position:relative; padding-right:10px; padding-top:13px; padding-bottom:8px;" align="left"  /> </a></div> 

<div align="left" id="linkebi"> <a href="<?=url($b['satauri'],'b', $b['id'])?>" style="position:relative; font-size:14px;"> <?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> <k>
<?	echo $avts_id['avtori']; ?>  -  <? echo $b['satauri']; ?>   </a> </k> </div>
        
        <hr>   
 <style> hr {
   height: 1px;
  border: 0;
  box-shadow: 0 5px 5px -5px #8c8c8c inset; position:relative; left:-5px; top:2px; margin-bottom:3px; width:338px; } </style>  
   
   </td>
   <? 
$x++;
 
if ($x==3) 
{
echo '</tr>';
$x=0;
}
 }   ?>
 
</tr> </table>
<div style="position:relative; left:66px; font-size:14px; padding-top:40px; padding-bottom:30px;">
<? 
echo 
$pagination  ?> </div>
   
   
 </td> </tr> </table>