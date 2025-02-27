<?php 

if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
 



if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

 
 
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";





mysqli_query($sql);
 //exit(mysqli_error($conn));
	echo mysqli_error();
}


if (isset($_GET['delete']))
{
$x=mysqli_query($conn, "select * FROM login where id='$_REQUEST[delete]'");
$z=mysqli_fetch_array($x);
	
	
if (isset($_GET['delete']))
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM login where id='$_REQUEST[delete]'");





}


if (isset($_GET['hide']))
{
	mysqli_query($conn, "update login SET hidden=1 where id='$_GET[hide]'");
}


if (isset($_GET['show']))
{
	mysqli_query($conn, "update login SET hidden=0 where id='$_GET[show]'"); 
}


?>

 
  
 
 <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#343a40;
  width:260px;
 

}

#indexs a{
display:block;
 color:#FFFFFF;
 text-decoration:none;
 padding:10px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;

}

#indexs a:hover{
background-color:#676767;
  padding:10px; 
  color:#FFFFFF;
 
}

#indexs li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs ul {
position:absolute;
display:none;
 }

#indexs li ul a{
 
float:left;
 
 }

#indexs ul ul{
 

}	

#indexs li ul ul {
left:12em;
 
 }

#indexs li:hover ul ul, #indexs li:hover ul ul ul, #indexs li:hover ul ul ul ul{
display:none; 
 }
#indexs li:hover ul, #indexs li li:hover ul, #indexs li li li:hover ul, #indexs li li li li:hover ul{
display:block; 
 }
</style>

  <div style="background-color:#F0F0F0; border:1px solid #DCDCDC; padding-left:13px; padding-top:11px; padding-bottom:5px;  margin-bottom:15px;"> 
  <div id="indexs" style="color:#FFFFFF; display:inline-block; margin-top:2px;">
   <a href="index.php?do=bannercreate"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> +</span> <span style="position:relative; top:-3px;"> ახალი მასალის დამატება </span> </a>  </div> 
   
   
   
   <div style="position:relative; display:inline-block; margin-left:50px;"> <form action="index.php?do=search" method="post">
    <input type="hidden" name="calendar" value="zieba" />
    
     
      <p>
        <input value="<?=$fromDate?>" type="text" name="from_date" id="from_date" readonly size="6" />
        -დან  &nbsp;
        <input value="<?=$toDate?>" type="text" name="to_date" readonly id="to_date" size="6"/>
        -მდე  
        &nbsp; &nbsp;
		   
        <input type="submit" id="rame" name="type" value="თარიღით ძიება" style="width: 165px; text-align: left"><i class="fa fa-arrow-right" style="position: relative; left: -22px;"></i>
    </div>
    <script>
 $( function() {
	$("#from_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#from_date").datepicker("option","maxDate", selected)
        }
    });
	$("#to_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#to_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
  </form> <? 
	
	if(!empty($fromDate) or !empty($toDate)){
		if(!empty($fromDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`]).">=STR_TO_DATE(\''.$fromDate.'\', \'%Y-%m-%d\') ';
		}
		if(!empty($toDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`])."<=STR_TO_DATE(\''.$toDate.'\', \'%Y-%m-%d\') ';
		}
	} ?> </div> 




<form action="" method="post" enctype="multipart/form-data" name="rame">  
<table class="table table-hover" style="">
  <thead style="background-color: #F0F0F0; border-left:1px solid #DCDCDC; border-right:1px solid #DCDCDC">
    <tr>
      <th scope="col">ფოტო</th>
      <th scope="col">თარიღი</th>
      <th scope="col">ID</th>
      <th scope="col">სათაური</th>
		  <th scope="col">დაგზავნა</th>
      <th scope="col">კატეგორია</th>
		<th scope="col">სტატუსი</th>
      <th scope="col">გადახედვა</th>
		 <th scope="col">ედიტ</th>
      
		<th scope="col"><? 
	 
	 if ($_SESSION['delete_status']!=='1') 
 {
		 
	 echo "";
 }
		 else { ?>წაშლა<?} ?></th> 
		
    </tr>
  </thead>
  <tbody style="border:1px solid #DCDCDC">
<?php
	/*
		Place code to connect to your DB here.
	*/
	$W='';
	
	if(isset($_GET['user_id'])) $W="AND user_id=$_GET[user_id]";
 
	$tbl_name="login";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE kategory='პირველი ტექსტი' $W";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=bannertext"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE kategory='პირველი ტექსტი'  $W order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);
	
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
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
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
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))

{
 ?> 

 <style>
		#im4 {
  height: 60px;
  transition: all .2s ease-in-out;
}

.cover4 {
  width: 80px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	
 .tabl 
 {
background-color:#FFFFFF; 

cursor:pointer; 
padding-left:3px;
padding-right:3px;
}


 .tabl:hover
 {
background-color:#F0F0F0; 
  width:100%;
cursor:default;  
 
}
	</style>	
	
	

    <tr>
      <td scope="row"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left"></td>
      <td><? echo date("Y/m/d", $b['news_date']); ?>
<br> <? echo $b['hour']; ?>
      <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script></td>
      <td><? echo $b['id'];?> </td>
      <td><? echo $b['satauri'];?> 
		</td>
		 <td> 
			 
			 
			 <a href="index.php&page=<?=$_GET['page']?>&send_email=<? echo $b['id'];?>"><i class="fa fa-envelope-open-text"></i> </a>
			 
		 </td>
		
      <td><? 
	$category = explode('|', $b[kategory]);
	$where = "";
	foreach($category as $c)
	{
		if(intval($c))
		{
			if(empty($where))
				$where .= "id = ".intval($c);
			else 
				$where .= " OR id = ".intval($c);
		}
	}
	if(empty($where))
		$where = "1=0";
	$res = mysqli_query($conn, "SELECT * FROM menu WHERE $where ");
	while($data = mysqli_fetch_assoc($res))
		echo $data['title_ka'].", "; 
		  ?> </td>
      <td><?
	if($b['hidden'])
	{
?>
 <a href="index.php&page=<?=$_GET['page']?>&show=<? echo $b['id'];?>"> <img src="../IMG/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php&page=<?=$_GET['page']?>&hide=<? echo $b['id'];?>"> <img src="../IMG/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?></td>
		<td><a   onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')"  style="cursor:pointer;" > <img src="../IMG/view1.png" width="18" style="position:relative; vertical-align: top;">  </a></td>
		 <td>
  <div style="color:#FF1D21"> 		  
		  <? $res=mysqli_query($conn, "SELECT * FROM kultura_password WHERE id='$b[editor]'");
			 if ($user=mysqli_fetch_array($res))
			 { ?>
			<a  onclick="window.location.href='#';" style="cursor:pointer;" > <img src="../IMG/edit.png" width="18" style="position:relative; vertical-align: top;"> </a> <i class="fas fa-spinner fa-pulse"></i> 
			<?
				 echo "არედაქტირებს"."<br>".$user['user']; 
			 }else
			 { 
	
			?> <a  onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';" style="cursor:pointer;" > <img src="../IMG/edit.png" width="18" style="position:relative; vertical-align: top;"> </a>
		  </div> <? } ?></td>
      <td>
		  <? 
	$r=mysqli_query($conn, "SELECT * FROM kultura_password");
$data=mysqli_fetch_array($r); 
	 if ($_SESSION['delete_status']!='1') 
 {
		 
	 echo "";
 }
		 else
			 
		 { ?>
		  
		  <a href="index.php&page=<?=$_GET['page']?>&delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../IMG/delete.png" width="18" style="position:relative; vertical-align: top;"> </a> <? } ?></td>
 
    </tr>
     
       
	  
	  
 




 
	<? $x++;   } ?> </tbody>
</table></form>
   
    <?
	echo $pagination;?>  
 
<br> 
