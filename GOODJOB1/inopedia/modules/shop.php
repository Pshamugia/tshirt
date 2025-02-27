<? if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); } ?> <table width="1000px" align="center" style="position:relative; margin-top:50px; ">
 <tr>
<td valign="top">
 <strong style="position:relative; margin-left:5px;">
 <? 
$res=mysqli_query($conn, "SELECT * FROM login where id='$_GET[uid]'");
$login=mysqli_fetch_assoc($res);

echo $login['username'];


?>-ს ნავაჭრი</strong>
</td>
<tr>
<?   


  $tbl_name="payments";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 10;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE uid=$login[id]";

	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));

	$total_pages = $total_pages['num'];

	

	/* Setup vars for query. */

	$targetpage = "index.php?do=shop&uid=$login[id]"; 	//your file name  (the name of this file)

	$limit = 6; 								//how many items to show per page

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0



	/* Get data. */

	

	$sql = "SELECT kultura_cxrili.*,payments.`count`,payments.price AS pay_fasi, payments.date FROM $tbl_name,kultura_cxrili WHERE payments.uid=$login[id] AND kultura_cxrili.id=payments.pid order by payments.date desc LIMIT $start, $limit";



	

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




 <td valign="top">



<table width="100%" style="margin-bottom:40px; position:relative; font-size:12px;">
	<tr>
    <td style="background-color:#DFDFDF; width:200px;"></td>
    	<td style="background-color:#DFDFDF; width:100px; border-right:1px solid #C9C9C9;"> &nbsp;&nbsp; პროდუქტი</td>
        <td style="background-color:#DFDFDF; width:100px; border-right:1px solid #C9C9C9;"">&nbsp;&nbsp;ფასი</td>
        <td style="background-color:#DFDFDF; width:100px; border-right:1px solid #C9C9C9;"">&nbsp;&nbsp;რაოდენობა</td>
        <td style="background-color:#DFDFDF; width:120px; border-right:1px solid #C9C9C9;"">&nbsp;&nbsp;საერთო ფასი</td>
        <td style="background-color:#DFDFDF; border-right:1px solid #C9C9C9;">&nbsp;&nbsp;თარიღი</td>
    </tr>
  

<?



$statement=mysqli_query($conn, $sql);
while ($statement_id=mysqli_fetch_assoc($statement))

{ 
 ?> 

  
 <style>	
			  
			  #imo {
  height: 150px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.covero {
  width: 100%;
  object-fit: cover;
  
  
}  
	  </style>
<tr style="border-bottom:1px solid #DFDFDF;">
    	<td valign="top"><img src="<?=HTTP_HOST?><? echo $statement_id['upload']; ?>"  class="covero" id="imo" onclick="javascript:location.href='<?=HTTP_HOST?>index.php?do=full&id=<? echo $statement_id['id'];?>';" style="position:relative; padding-top:10px; padding-bottom:10px; cursor:pointer; "> </td>
        
        <td style="border-right:1px solid #DFDFDF;" valign="top"> <div style="padding-left:10px; padding-top:7px; padding-right:5px;"> <?=$statement_id['satauri']?> </div> </td>
          <td style="border-right:1px solid #DFDFDF;" valign="top"> <div style="padding-top:7px; position:relative; padding-left:5px;"> ₾ <?=$statement_id['pay_fasi']?> </div></td>
          <td style="border-right:1px solid #DFDFDF;" valign="top"><div style="padding-top:7px; position:relative; padding-left:5px;"><?=$statement_id['count']?></td>
         <td style="border-right:1px solid #DFDFDF;" valign="top"><div style="padding-top:7px; position:relative; padding-left:5px;">₾ <?=number_format($statement_id['pay_fasi'] * $statement_id['count'], 2)?></td>
          <td style="border-right:1px solid #DFDFDF;" valign="top"><div style="padding-top:7px; position:relative; padding-left:5px;"><?=date("Y-m-d / H:i:s", $statement_id['date'])?></td>
    </tr>
 

  <? } ?>
</table>
<?php


echo 

$pagination;   ?>
