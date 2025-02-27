<link href="logo.css" rel="stylesheet" type="text/css">
 


<table width="1000px" id="banner-slide" style="position:relative; background-color:#FFFFFF; margin-top:px; margin-left:19px; margin-bottom:-5px; z-index:1;">
<tr>  
  
  <td valign="top"><div align="center" style="position:relative; width:200px; margin-top:35px; left:385px;"> <a style="position:relative;">  <d style="position:relative;font-size:20px; color:#2E6078;">  ამბები </a>  <hr class="style-eight"> </div>
  
  
   <style> hr.style-eight {
    padding: 0;
    border: none;
    border-top: medium double #2E6078;
    color: #2E6078;
    text-align: center;
}
hr.style-eight:after {
    content: "❖";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
} 

 </style> 

 </td>
  <tr></tr></tr></table>
  
  <table bgcolor="#FFFFFF" width="1000px" style="position:relative; left:19px; margin-top:-47px; margin-bottom:47px; bottom:-47px; ">
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ამბები'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=news"; 	//your file name  (the name of this file)
	$limit = 9; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ამბები' order by id desc LIMIT $start, $limit";

	
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
			$pagination.= "<a href=\"$targetpage&page=$prev\">« previous</a>";
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
			$pagination.= "<a href=\"$targetpage&page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>




  
<?

$a=mysql_query($sql);
while ($b=mysql_fetch_array($a))
{
 ?> 

 
 
<td width="500px" height="0px" align="left" valign="top" style="position:relative; min-height:400px; margin-top:-20px;" > 

 
 <div style="position:relative; padding-right:10px; font-size:14px; color:#1D531A; margin-top:-20px; margin-left:15px; ">
 <a href="index.php?do=full&id=<? echo $b['id'];?>">   <d style="position:relative; top:10px;">
 
<style>
		#im {
  height: 150px;
}

.cover {
  width: 300px;
  object-fit: cover;
}
	</style>
    
 
 
 
<img src="<? echo $b['upload'];?>" class="cover" id="im" style="position:relative; margin-top:15px; margin-left:1px;">  </d> </a></div>  
 
 
 <div id="dama" style=" width:300px; position:relative;  margin-top:17px; margin-left:15px; font-size:18px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:1; "> <a href="index.php?do=full&id=<? echo $b['id'];?>" style="position:relative; font-size:16px;  font-weight:bolder;" id="gverditi">  <b>  <? echo $b['satauri']; ?>  </b></a>  </div>
 <div id="dama" style="position:relative; margin-left:15px;"> <a href="index.php?do=full&id=<? echo $b['id'];?>" style="position:relative; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
<? echo $b['agwera'];?> <br>   </a> 
  </div> </div></td>
<? 
$x++;
if ($x==3) 
{
echo '<tr>';
$x=0;
}
 }
 
 
 ?>  
 <tr>
 
  </tr> 
  </tr></tr></table>
<div id="thh" style="width:1000px; background-color:#FFFFFF; position:relative; margin-top:-40px; z-index:100; top:15px;"> <? 
echo 
$pagination ?> </div> </table> 