<div class="container"> 

<div style="position:relative; margin-left:7px; height:20px; margin-bottom: 25px; margin-top:15px; font-weight:bold;"> <a style="position:relative; font-size:18px; margin-left:10px; top:-3px; color: #fc3f00 ">  <ch><i class="fas fa-align-center"></i> პოეზია </ch> </a> </b> </div>  
 
 <div class="row">  
    

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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='პოეზია'";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=poezia"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='პოეზია' order by id desc LIMIT $start, $limit";

	
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
 
   
   <div class="col-md-4" style="position: relative; left: 15px;"> 
 
          <style>
		#im55 {
  height: 250px;
  transition: all .2s ease-in-out;
			border-radius: 5px;
}

.cover55 {
  width: 350px;
  object-fit: cover;
   
}
.cover55:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>
	   <div style="padding-right: 25px; "> 
<div align="left"> 
<a href="index.php?do=full&id=<? echo $b['id'];?>"><img src="<? echo $b['upload'];?>" alt="" id="im55" class="cover55" style="position:relative;  " align="left"  /> </a></div> 

<div align="left" id="linkebi" style="clear: both; width: 240px; background-color:#FFFFFF; position: relative; margin-bottom:-50px; top:-80px; z-index: 1; height: 100px; border-top-right-radius: 5px;"> <a href="index.php?do=full&id=<? echo $b['id'];?>" style="position:relative; font-size:14px;"> 
	
	<span style="background-color: #ffe7e6; padding: 5px; position: relative; top: 12px; font-size: 12px;">  <? echo dateToString($b['news_date']); ?>, 
					
					<? 
					$num=$b['news_date'];
					$rest = substr("$num", 0, -6);   
					echo $rest; ?></span><br><br>
	
	<?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
<?	echo $avts_id['avtori']; ?>  -  <? echo $b['satauri']; ?>   </a> </div>
        
       </div>
	   </div>
   <? 
 
 }   ?>
 
 
<div style="position:relative; left:7px; top:35px; padding-bottom: 55px;">
<? 
echo 
$pagination  ?> </div>
   
   
   
   
    <br><br>
</div>  </div>  