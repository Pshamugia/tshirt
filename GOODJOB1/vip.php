 <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px;">
      <div class="container" style="padding-top:100px">
      
      <div class="col-md-12" style="height:50px;"> <b> VIP განცხადებები </b> </div>
      
      <?

$tbl_name="login";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 10;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE vip>".time().""; 
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=vip"; 	//your file name  (the name of this file)
	$limit = 6; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE vip>".time().""; 

	
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

 ?>    <div class="row" >
 
    <style>
		#im66 {
   height: 180px;
			width: 180px;
			 
 
 }

.cover66 {
  width: 180px;
  object-fit: cover;
   
}
.cover66:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 
	 transition: all .7s;

}
	

	</style>
  <div style="border:1px solid #E0E0E0; margin-bottom:10px; border-radius:3px; cursor:pointer; " onclick="javascript:location.href='index.php?do=full&id=<? echo $b['id'];?>';" class="col-md-12">
<div class="col-md-3" style="position: relative; left: -50px;" >

	<div style="position: relative; left: 115px; top: 85px;">
  <img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png"  class="ketchup tooltip" onclick="addtofav(this, <?=$b['id']?>)" style="width:20px;opacity:1 " title="<? if(favorited($ragaca['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">
</div>
  <img src="<?=HTTP_HOST?><? echo $b['upload']; ?>"  onclick="javascript:location.href='index.php?do=full&id=<? echo $b['id'];?>';" class="cover66" id="im66" style="border-radius: 50%; border:#FFFFFF 12px solid;  display: block;
  margin-left: auto;
  margin-right: auto;">   
  

 </div>
 
 <div class="col-md-4" style="position: relative; top: 15px;">
	 
	 
	 
	 
	 <div> <p><b>   
           </b> <span style=" color:#D51417;">  <?php echo $b['username']; ?></span> </p></div>
	 
	 	 <div> საგანი: <? echo str_replace("|", ",  ", trim($b['sagnebi'], "|")); ?> </div>

	 
	  <div>    პოზიცია: <? echo str_replace("|", ",  ", trim($b['current'], "|")); ?> <br>
		  
		 მდებარეობა:  <?
		  $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$b[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani);  
	 	echo $ubani['name']; ?>
		  
		  <div> ფასი: <? echo $b['fasi']; ?>  
<? if ($b['valuta']=='GEL')
		 {
		echo '&#8382;';	 
		 }
		 elseif ($b['valuta']=='USD')
		 {
			echo '&#36;';	
		 }
		 elseif ($b['valuta']=='EURO')
		 {
			 echo '&#8364;';
			 }
			 else
			 {
				echo ''; }
			 
			 ?>  </div> 
		   


 

   </div>
	 
    
  </span>
            
         
         
           
        
           
             
             
           
           
 </div>
 
 
 
 
 <div class="col-md-3">
 <?php /*?>დამატებითი სივრცე<?php */?>
  </div>  
  
  
  
  </div> </div>
  
  <? }  ?> 
  
  <br>
  
  <?=$pagination?>
  </div></section>