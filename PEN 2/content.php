<div class="container"> 

<div style="position:relative; margin-left:7px; height:20px; margin-bottom: 25px; margin-top:15px; font-weight:bold;"> 
 <div class="row">  
						
				<? 
						$a=mysqli_query($conn,"select * from menu WHERE id='$id'");
$b=mysqli_fetch_array($a);
	$res = mysqli_query($conn, "SELECT * FROM kultura_cxrili where kategory='$_GET[id]'");
	$data = mysqli_fetch_assoc($res);?>
					<div style="position: relative; margin-top: 20px; padding-bottom: 50px; "> 	<a style="position:relative; font-size:18px; margin-left:10px; color: #000 ">     
 <ch style="position: relative;"><i class="fas fa-align-center"></i> 
	<? echo $b["title_$_SESSION[LANG]"]; ?></ch> </a> </b></div>
					 </div> 
					 
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->
<!-- Main container start -->
 
	<div class="container">
		<!-- Map start here -->
	 
		<!--/ Map end here -->

	 

		<div class="row" style="padding-top: 30px;">
<? if($_GET['id']==17)
{
	$a=mysqli_query($conn,"select * from menu WHERE title_ka='ფოტო'");
	while($b=mysqli_fetch_array($a))
	{
$res=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory='$b[id]' order by id desc limit 0,6");
$data=mysqli_fetch_array($res);
	include('photo.php');  
	}
} ?>
			 
 <? if($_GET['id']==18)
{
	$a=mysqli_query($conn,"select * from menu WHERE title_ka='ვიდეო'");
	while($b=mysqli_fetch_array($a))
	{
$res=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory='$b[id]' order by id desc limit 0,6");
$data=mysqli_fetch_array($res);
	include('video.php');  
	}
} ?>
			<style> 
			  
			  #im {
 
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover {
  width: 100%;
  object-fit: cover;
  
  
}  
	  </style>
			<?
				$res = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE kategory LIKE '%$_GET[id]|%' AND hidden='0'");
	$b = mysqli_fetch_assoc($res);
			
			if($b['menu']=='1')
			{
			?>
			<div class="col-md-9 col-sm-4 wow fadeInDown" data-wow-delay=".5s" >
				<div class="service-content text-center" style="cursor: pointer;">
						<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" id="im" class="cover" alt="">
						<figcaption>
							<h3><span>  </span> </h3>
								 
						</figcaption>
					</figure>
				</div>
					<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; font-weight: 100; src: url('<?=HTTP_HOST?>bpg_algeti_compact.ttf'); }  span { font-family:bpg_algeti_compact, sans-serif; }  </style> 
					<p ><span style="font-size: 14px"> <?php echo $b["satauri_$_SESSION[LANG]"];?> </span></p>
					<div  align="left"> <span style="font-size: 14px"> <?php echo $b["full_$_SESSION[LANG]"];?></span></div>
				</div>
			</div>
			<?
			}
			else
			{ 
				
	 
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE kategory LIKE '%$_GET[id]|%' AND hidden='0' AND satauri_$_SESSION[LANG]!=''   ";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=content&id=$_GET[id]"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE kategory LIKE '%$_GET[id]|%' AND hidden='0' AND satauri_$_SESSION[LANG]!=''  order by news_date desc LIMIT $start, $limit";

	
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
		if ($page > 1 && $_SESSION['LANG']=='ka') 
			$pagination.= "<a href=\"$targetpage&page=$prev\">« წინა</a>";
		
		
		if ($page > 1 && $_SESSION['LANG']=='en') 
			$pagination.= "<a href=\"$targetpage&page=$prev\">« previews</a>";
		
		
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
		if ($page < $counter - 1 && $_SESSION['LANG']=='ka') 
			$pagination.= "<a href=\"$targetpage&page=$next\">შემდეგი »</a>";
			
		
		if ($page < $counter - 1 && $_SESSION['LANG']=='en') 
			$pagination.= "<a href=\"$targetpage&page=$next\">Next »</a>";
			
	}
?>




  
<?

$a=mysqli_query($conn,$sql);
while ($b=mysqli_fetch_array($a))
{
 ?> 	 
			
				<div class="col-md-4" style="position: relative; "> 
 
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
	   <div> 
<div align="left"> 
<a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>"><img src="<?=HTTP_HOST?><? echo $b['upload'];?>" alt="" id="im55" class="cover55" style="position:relative;  " align="left"  /> </a></div> 

<div align="left" id="linkebi" style="clear: both; width: 240px; background-color:#FFFFFF; position: relative; margin-bottom:-50px; top:-80px; z-index: 1; height: 100px; border-top-right-radius: 5px;"> <a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>" style="position:relative; font-size:14px;"> 
	
	<span>   
					
				 
 
<? if($_SESSION['LANG']=='ka')
 { 
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori']; 
 }
							else
							{
$avt=mysqli_query($conn, "select * from  avtori_new where id='$b[avtori2]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori2']; 	
							}
							?>  -  <?php echo $b["satauri_$_SESSION[LANG]"];?>   </a> </div>
        
       </div>
	   </div>
		
				
				<? } }  ?>
		
				 
				 
			</div>
		<div style="z-index: 101; position: relative; margin-top: 25px; margin-bottom: 50px;"> <? echo $pagination;?> </div>
		</div>
	</div>
	<!--/ container end -->
</section>
<!--/ Main container end -->

	 