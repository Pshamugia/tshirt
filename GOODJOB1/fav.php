 <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px;">
      <div class="container" style="padding-top:100px">
     
     
     
      <?php
	  
	    $fav_ids = unserialize($_COOKIE['fav']);
	 
 {
	  
if($_SESSION['USER_ID']==0)
		{
 

	$tbl_name="login";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 10;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE";
		$is_first = true;
		foreach($fav_ids as $value)
		{
			if($is_first)
				$query.=" id = $value";
			else
				$query.=" OR id = $value";
			$is_first = false;
		}
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=fav"; 	//your file name  (the name of this file)
	$limit = 6; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE";
		$is_first = true;
		foreach($fav_ids as $value)
		{
			if($is_first)
				$sql.=" id = $value";
			else
				$sql.=" OR id = $value";
			$is_first = false;
		}

	
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
$sql.=" LIMIT $start, $limit";
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))
{

 ?> 
     
     
     
     
	  <? 
	
  ?>
  <div class="row" >
 
  
  <div style="border:1px solid #E0E0E0; margin-bottom:10px; border-radius:3px;" class="col-md-12">
<div class="col-md-3" >
 
  <img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png"  class="ketchup tooltip" onclick="addtofav(this, <?=$b['id']?>)" style="width:20px;opacity:1; margin-left:10px; margin-top:10px;" title="<? if(favorited($ragaca['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">

  <img src="<?=HTTP_HOST?><? echo $b['upload']; ?>" width="200px" height="150"  onclick="javascript:location.href='index.php?do=full&id=<? echo $b['id'];?>';" style="position:relative; padding-bottom:15px; cursor:pointer; ">   
  

 </div>
 
 <div class="col-md-4">
 
 <?php echo $b['valuta']; ?> <?php echo $b['fasi']; ?> <?php //echo $b['farti']; ?> </span>
           <p><b><?php //echo $b['kidva']; ?> <?php //echo $b['otaxi']; ?> <?php //echo "ოთახიანი" ?>  <?php //echo $b['kategory']; ?> 
           </b> <span style="float:right; color:#D51417;"> ID: <?php echo $b['id']; ?></span> </p>
         
           <div style="float:left; width:50%;"> 
           განთავსებული  </div> <div style="float:right;"> 
           10 დეკემბერი 17:32 </div>
           
            <div style="float:left; width:50%;"> 
           განახლებული  </div> <div style="float:right;"> 
           16 დეკემბერი 10:21 </div>
           
            <div style="float:left; width:50%;"> 
           ბოლო ვადა  </div> <div style="float:right;"> 
           29 დეკემბერი 11:21 </div>
            <div style="float:left; width:50%;"> 
        სტატუსი </div> <div style="float:right;"> 
          Vip </div>
           
           
 </div>
 
 
 
 
 <div class="col-md-3">
 <? echo $b['date']; ?>
  </div>  
  
  
  
  </div> </div>
  <? } }} ?> 
  
  <? 
echo 
$pagination  ?>
  </div>
  </section>