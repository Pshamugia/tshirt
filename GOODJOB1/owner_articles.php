 <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px;">
      <div class="container" style="padding-top:100px">
     
        
       <div class="col-md-3" style="border:1px solid #C7C7C7; padding:20px; border-radius:5px; background-color:#D8DEEB;">  
      <style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf); } 
@font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf'); }   
kl { font-family:bpg_algeti_compact, sans-serif; } </style>  
       <? 
	   $avt=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$tevza=mysqli_fetch_array($avt);

$avt=mysqli_query($conn, "select * from login where id='$_REQUEST[id]'");
$avts_id=mysqli_fetch_array($avt);
?>

<div style="border:1px solid #C7C7C7; border-radius:5px; width:200px; height:30px; margin-top:15px;">

<span style="position:relative; top:3px; margin-left:15px; ">  

<img src="<?=HTTP_HOST?>IMG/user_login.png" width="15" style="position:relative; margin-right:10px;">
<kl style="position:relative; top:1px;">
  <? echo $avts_id['username']; ?> </kl> </span></div> 

<div style="border:1px solid #C7C7C7; border-radius:5px; width:200px; height:30px; margin-top:15px;">

<span style="position:relative; top:3px;"> 
<img src="<?=HTTP_HOST?>IMG/list2.png" width="15" style="margin-left:15px;  margin-right:10px;"> 

<kl> განცხადებები <? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM kultura_cxrili WHERE user_id='$_REQUEST[id]'"));
?>

<div style="color:#000000; border-radius:3px; border:1px solid #D3D3D3; width:auto; height:auto; display:inline-block; padding-left:5px; padding-right:5px; font-size:12px;"> 
<?
		echo intval($cnt['cnt']);  
 
  ?> </div>  </kl>
</span>
 </div>
</div>



<div class="col-md-9" style="border-top:1px solid #E0E0E0; border-bottom:1px solid #E0E0E0; border-right:1px solid #E0E0E0; border-radius:5px;">
 
     
    <?  
	
	$avt=mysqli_query($conn, "select * from kultura_cxrili where user_id='$_REQUEST[id]'");
$avts_id=mysqli_fetch_array($avt);
	

  $tbl_name="kultura_cxrili";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 10;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE user_id='$_REQUEST[id]'";

	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));

	$total_pages = $total_pages['num'];

	

	/* Setup vars for query. */

	$targetpage = "index.php?do=owner_articles&id=$_REQUEST[id]"; 	//your file name  (the name of this file)

	$limit = 6; 								//how many items to show per page

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0



	/* Get data. */

	

	$sql = "SELECT * FROM kultura_cxrili WHERE user_id='$_REQUEST[id]' order by id desc LIMIT $start, $limit";



	

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

 

$statement=mysqli_query($conn, $sql);

while ($statement_id=mysqli_fetch_array($statement))

{

 ?> 

     
     
     
     
	 
 
  <div class="row" style="font-size:12px; position:relative; margin-left:10px; top:15px;">

 

  

  <div style=" margin-bottom:10px; margin-left:-20px; border-radius:3px;" class="col-md-12">

  

<div class="col-md-3"  >

 

  <img src="<?=HTTP_HOST?>IMG/<? if(favorited($statement_id['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png"  class="ketchup tooltip" onclick="addtofav(this, <?=$statement_id['id']?>)" style="width:20px;opacity:1; margin-left:10px; margin-top:10px; " title="<? if(favorited($statement_id['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">



  <img src="<?=HTTP_HOST?><? echo $statement_id['upload']; ?>" width="200px" height="150"  onclick="javascript:location.href='index.php?do=full&id=<? echo $statement_id['id'];?>';" style="position:relative; padding-bottom:15px; cursor:pointer; ">   

  



 </div>

 

 <div class="col-md-5" style="position:relative; padding-left:50px;">

 

 <?php echo $statement_id['valuta']; ?> <?php echo $statement_id['fasi']; ?>   </span>

           <p><b> <?php echo $statement_id['kategory']; ?> 

           </b> <span style="float:right; color:#D51417;"> ID: <?php echo $statement_id['id']; ?></span> </p>

         

           <div style="float:left; width:50%;"> 

           განთავსებული  </div> 

           <div style="float:right; position:relative;"> 	 

           <?php
		   
		    echo date("d/m/y - h:i", $statement_id['created_date']); ?> </div>

           

            <div style="float:left; width:50%;"> 

           განახლებული  </div> 

           <div style="float:right; position:relative;"> 

            <?php
		   
		    echo date("d/m/y - h:i", $statement_id['update_date']); ?>  </div>

           

            <div style="float:left; width:50%;"> 

           ბოლო ვადა  </div> 

           <div style="float:right; position:relative;"> 

           <?
           		$td = date("d/m/y - h:i", $statement_id['created_date']);
				echo  date("d/m/y - h:i", strtotime("+2 days", $td));
		   ?>
		  </div>

            <div style="float:left; width:50%;"> 

        სტატუსი </div> <div style="float:right; "> 

    <? 
if($_SESSION['USER_ID']>0)
{	
 

if(time()  < $statement_id['s_vip'])
{
	?>
  <div style="float:right; color:#FFFFFF; background-color:#4267b2; font-weight:bold;"> 
	<span style="padding-left:3px; padding-right:3px;"> <? echo "SUPER VIP"; ?> </span> </div>
<? }
else
{
	
	if(time()  < $statement_id['vip'])
	{
		?>
        
        <div style="float:right; color:#9F3537; background-color:#D8C0C1; font-weight:bold;">
			<span style="padding-left:3px; padding-right:3px;"> <? echo 'VIP';?> </span> </div>
				
	<? }
	else
	{
		?>
        
        <div style="float:right; color:#222020; background-color:#E1E1E1; font-weight:bold;">
		<span style="padding-left:3px; padding-right:3px;"> <?	echo 'უფასო განცხადება'; ?> </span> </div>
	<? }  
}  
}





?> </div>

           

          

 </div>

 

 

 

 

  

  

  

  </div>   </div>
  
  
  
  <hr style="
 border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3); position:relative; left:15px;
"> 
  
  
  
  <? }

echo 

$pagination;   ?>



  

 

</div></div>
 
  </section>