 <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px;">
      <div class="container" style="padding-top:100px">
      
      <div class="col-md-12" style="height:50px;">   </div>
      
       <script>
var stars = {
  // (A) INIT - ATTACH CLICK & HOVER EVENTS FOR STARS
  init : function () {
    for (let docket of document.getElementsByClassName("pstar")) {
      for (let star of docket.getElementsByTagName("img")) {
        star.addEventListener("mouseover", stars.hover);
        star.addEventListener("click", stars.click);
      }
    }
  },

  // (B) HOVER - UPDATE NUMBER OF YELLOW STARS
  hover : function () {
    let all = this.parentElement.getElementsByTagName("img"),
        set = this.dataset.set,
        i = 1;
    for (let star of all) {
      star.src = i<=set ? "<?=HTTP_HOST?>rating/star.png" : "<?=HTTP_HOST?>rating/star-blank.png";
      i++;
    }
  },
  
  // (C) CLICK - SUBMIT FORM
  click : function () {
    document.getElementById("ninPdt").value = this.parentElement.dataset.pid;
    document.getElementById("ninStar").value = this.dataset.set;
    document.getElementById("ninForm").submit();
  }
};
window.addEventListener("DOMContentLoaded", stars.init);
</script>

<?
$tmp_where = '';
if (isset($_GET['tag']))
$tmp_where = "tags LIKE '%,$_GET[tag]%'";
		  
if (isset($_GET['text']) && !empty($_GET['text']))   
{
	$searchText = mysqli_real_escape_string($_REQUEST['text']);
	$tmp_where .= '(';
	$res=mysqli_query($conn,"SELECT * FROM login where text  LIKE  '%$searchText%'");
			while($data=mysqli_fetch_assoc($res))
			{
				$tmp_where .= " id='$data[id]' OR";
			}
	$tmp_where .= "agwera LIKE '%$searchText%')";			 
}


if(isset($_GET['search_category']) && !empty($_GET['search_category'])){
	$searchCategory =  mysqli_real_escape_string ($_GET['search_category']);
	if(!empty($tmp_where)){
		$tmp_where .= ' and ';	
	}
	$tmp_where .= " `text` like '%$searchText%'";
	
}

//

if(isset($_GET['m_from_x']) && intval($_GET['m_from_x']) > 0)
{
	$tmp_where." AND rating >= ".intval($_GET['m_from_x']);
}
if(isset($_GET['m_to_x']) && intval($_GET['m_to_x']) > 0)
{
	$tmp_where." AND rating <= ".intval($_GET['m_to_x']);
}

$where=" where ".$tmp_where;

if(isset($_GET['zebna']))
{
	
	$where = '';
	
 
	
		if($_GET['sagnebi'] != "0")
		$where.="sagnebi LIKE '|%$_GET[sagnebi]%|' AND ";
	
	if(!empty($_GET['text']))
		$where.="agwera LIKE '%$_GET[text]%' OR username LIKE '%$_GET[text]%' AND";
		 
		if($_GET['klasi'] != "0")
		$where.="klasi LIKE '|%$_GET[klasi]%|' AND ";
	
	
	if($_GET['current'] != "0")
		$where.="current LIKE '|%$_GET[current]%|' AND ";
	
	    if($_GET['kalaki'] != "0")
		$where.="kalaki='$_GET[kalaki]' AND ";
 
	
		if($_GET['ubani'] != "0")
		$where.="ubani='$_GET[ubani]' AND ";
	
		if(!empty($_GET['position_education']))
		$where.="position_education='$_GET[position_education]' AND ";
	
		if(intval($_GET['m_from']) != 0)
		$where.="rating >= ".intval($_GET["m_from"])." AND ";
	
		if(intval($_GET['m_to']) != 0)
		$where.="rating <= ".intval($_GET["m_to"])." AND ";
	
		if(intval($_GET['price_from']) != 0)
		$where.="fasi >= ".intval($_GET["price_from"])." AND ";
	
		if(intval($_GET['price_to']) != 0)
		$where.="fasi <= ".intval($_GET["price_to"])." AND ";
	
		if(intval($_GET['remote']) != 0)
		$where.="remote='$_GET[remote]' AND ";
		
		if(intval($_GET['home']) != 0)
		$where.="home='$_GET[home]' AND ";
		
 
 
		
 
	
	   $where=rtrim($where, " AND ");
	   $where = "WHERE $where";
	
	   

	
}
 		  
		  ?>
		  <style>
.blue-color {
color:blue;
}
.green-color {
color:#F3BA3F;
	font-size: 22px;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
	font-size: 22px;
}
</style>
		  	<? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as cnt from login $where"));
 
 if($cnt['cnt']==0)
 {
			  echo "<i class='fa fa-warning red-color'></i>"."&nbsp&nbspმონაცემი არ მოიძებნა";
 }
		  else
		  {
echo "<i class='fa fa-warning green-color'></i>".'&nbsp&nbspმოიძებნა&nbsp&nbsp'.(intval($cnt['cnt'])).' მასალა';  
		  }
		  
		  
		  
		  ?>
		  <br><br>
		  
		  <?

$adjacents = 150;
	$total_pages = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as num FROM login $where"));
	$total_pages = $total_pages['num'];
	$targetpage = HTTP_HOST."index.php?";
	foreach($_REQUEST as $key=>$value)
	{
		$targetpage.="$key=$value&";
	}
	$limit = 15; 
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit;
	else
		$start = 0;
	if ($page == 0) $page = 1;
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=$prev\">« წინა</a>";
		else
			$pagination.= "<span class=\"disabled\">« წინა</span>";	
		if ($lastpage < 7 + ($adjacents * 2))
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
			}

		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
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
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">შემდეგი »</a>";
		else
			$pagination.= "<span class=\"disabled\">წინა »</span>";
		$pagination.= "</div>\n";
	}

//======================================





	function getUserIp()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
} 
		if (isset($_POST['pid'])) {
      if (!$_STARS->save($_POST['pid'], getUserIp(), $_POST['stars'])) {
        echo "<div>$_STARS->error</div>";
      }
    }
$a=mysqli_query($conn,"SELECT login.*, IF(".time()."<s_vip, 100, IF(".time()."<vip, 90, 80)) AS order_x  from login $where ORDER BY order_x DESC LIMIT $start, $limit");
 while ($b=mysqli_fetch_array($a))
{
$avt=mysqli_query($conn,"select * from avtorebi where id='$b[avtori]'");
$f=mysqli_fetch_array($avt);
?>   <div class="row" >
 
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

	 
	  <div>    სტატუსი: <? echo str_replace("|", ",  ", trim($b['current'], "|")); ?> <br>
		  
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
		  <? $average = $_STARS->avg(); // AVERAGE RATINGS
    $ratings = $_STARS->get(getUserIp()); // RATINGS BY CURRENT USER
	if (isset($_POST['pid']) && $_POST['pid']== $b[id]) {
		mysqli_query($conn, "UPDATE login SET rating='".$average[$b['id']]."' WHERE id='$b[id]'");
	}

?>


<div  style="border: none; position: relative; top:0; padding:0; "  >
      <div class="pstar" data-pid="<?=$b['id']?>">
	  
         <?php 
        $rate = isset($ratings[$b['id']]) ? $ratings[$b['id']] : 0 ;
		 
        for ($i=1; $i<=5; $i++) {
			
          $img = $i<=$rate ? "star" : "star-blank" ;
          echo "<img src='".HTTP_HOST."rating/$img.png' data-set='$i'>";
        }
		 
      ?></div>
    </div>


<form id="ninForm" method="post" target="_self">
      <input id="ninPdt" type="hidden" name="pid"/>
      <input id="ninStar" type="hidden" name="stars"/>
    </form>   </div>
	 
    
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