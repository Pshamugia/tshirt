		  <script src="<?=HTTP_HOST?>js/geo.js" mce_src="geo.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?=HTTP_HOST?>src/calendar/calendar.css">
<script src="<?=HTTP_HOST?>src/calendar/calendar.js"></script>
<?PHP
error_reporting(0);

$hash=md5(time().$_SESSION['USER_ID']);
if(isset($_GET['enable_super_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 200)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-200 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET s_vip=$end_date WHERE id='$_GET[enable_super_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 200, '', ".time().",0,'სუპერ ვიპის შეძენა', $user[balance], ".($user['balance']-200).", $_GET[enable_super_vip] )");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}


if(isset($_GET['enable_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 100)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-100 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET vip=$end_date WHERE id='$_GET[enable_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 100, '', ".time().",0,'VIP-ის შეძენა', $user[balance], ".($user['balance']-100).", $_GET[enable_vip])");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}



if (isset($_GET['delete']))

{ 

 mysqli_query($conn, "DELETE from login where id='$_GET[delete]'");

}





if (!$_SESSION['USER_ID'])

	header ("Location: login.php");

	$res = mysqli_query($conn,"SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");

	$user = mysqli_fetch_assoc($res);

	if ($_SESSION['USER_ID']==0)

		

		{

			

		echo  "<script>document.location='index.php?do=login'</script>"; 

		}

?> 


 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<section class="ftco-section" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf);">

      <div class="container">

      

   			       

                        

                        <div class="tab" style="position:relative;  height:100%; z-index:1;">
<button class="tablinks" onclick="openCity(event, 'damateba')" <?php if ($_GET['id']==1) echo 'id="defaultOpen"'; ?>>

  <img src="<?=HTTP_HOST?>IMG/plus-512.png" width="15px" style="position:relative; top:0px; margin-right:5px;" <?php if (!isset($_GET['id'])) echo 'id="defaultOpen"'; ?>> განცხადების დამატება</button>
							
					
							
								
	<button class="tablinks" onclick="openCity(event, 'gancxadeba')" <?php if ($_GET['id']==2) echo 'id="defaultOpen"'; ?>>

  <img src="<?=HTTP_HOST?>IMG/list.png" width="15px" style="position:relative; top:0px; margin-right:10px;">ჩემი განცხადებები 

  <span style="position:relative; float:right; background-color:#D7D7D7; border:#666666; border-radius:50%; padding:3px 8px 3px 8px;"> 

  <? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM gancxadeba WHERE avtoris_id='$_SESSION[USER_ID]'"));

		echo intval($cnt['cnt']); ?>  </span> </button>
							
							
							
  <button class="tablinks" onclick="openCity(event, 'redaqtireba')" <?php if ($_GET['id']==3) echo 'id="defaultOpen"'; ?>>

 
  <img src="<?=HTTP_HOST?>IMG/plus-512.png" width="15px" style="position:relative; top:0px; margin-right:5px;" <?php if ($_GET['id']==3) echo 'id="defaultOpen"'; ?>> პროფილის რედაქტირება</button>

  

   

  

    <button class="tablinks" onclick="openCity(event, 'rcheulebi')" <?php if ($_GET['id']==4) echo 'id="defaultOpen"'; ?>>

  <img src="<?=HTTP_HOST?>IMG/heart3.png" width="15px" style="position:relative; top:0px; margin-right:10px;">ჩემი რჩეულები 

  <span style="position:relative; float:right; background-color:#D7D7D7; border:#666666; border-radius:50%; padding:3px 8px 3px 8px;"> 

  <? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM favorites WHERE user_id='$_SESSION[USER_ID]'"));

		echo intval($cnt['cnt']); ?> </span></button>

  

  <button class="tablinks" onclick="openCity(event, 'letters')" <?php if ($_GET['id']==5) echo 'id="defaultOpen"'; ?>>

  <img src="<?=HTTP_HOST?>IMG/email.png" width="15px" style="position:relative; top:0px; margin-right:10px;">ჩემი წერილები 

  <span style="position:relative; float:right; background-color:#D7D7D7; border:#666666;  display: inline-block;

    border-radius: 50%;

    width: 16px;

    height: 16px;

    text-align: center; "> 

  

 <? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM messages WHERE receiver='$_SESSION[USER_ID]' AND status=0"));

		echo intval($cnt['cnt']); ?> 

  </span></button>

  

 

	<? if ($USER['status'] == 1) { ?>
 
   <button class="tablinks" onclick="openCity(event, 'tranzaqcia')" <?php if ($_GET['id']==7) echo 'id="defaultOpen"'; ?>>  

  <img src="<?=HTTP_HOST?>IMG/transaction.png" width="15px" style="position:relative; top:0px; margin-right:10px;">ტრანზაქციები</button>
 
							<? } ?>
  

   

  

</div>

<div style="height:30%"> </div>


 






<div id="rcheulebi" class="tabcontent" style="position:relative; height:auto;">

  <p>რჩეულების სია </p> 

  

   

  

   <?php

 if($_SESSION['USER_ID']>0)

		{
			


 
?>









  

<?


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
$query = "";

		$is_first = true;

		$fav_ids = array();

		$res = mysqli_query($conn, "SELECT item_id FROM favorites WHERE user_id='$_SESSION[USER_ID]'");		

		while($value = mysqli_fetch_assoc($res) )

		{

			$fav_ids[] = $value['item_id'];

			if($is_first)

				$query.=" id = ".$value['item_id'];

			else

				$query.=" OR id = ".$value['item_id'];

			$is_first = false;

		}


$pagination = new Pagination($conn, HTTP_HOST."rcheulebi/l4?do=page1", "login", $query, 10);
$data = $pagination->getData();

foreach ($data as $rcheuli)
{



 ?> 

     

     

 <div class="row" style="font-size:12px;">

 

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

  <div style="border-top:1px solid #E0E0E0; border-bottom:1px solid #E0E0E0; border-right:1px solid #E0E0E0; margin-bottom:10px; margin-left:-20px; border-radius:3px;" class="col-md-12">

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

<div class="col-md-3" >

 

  <img src="<?=HTTP_HOST?>IMG/<? if(favorited($rcheuli['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png" class="ketchup tooltip" onclick="addtofav(this, <?=$rcheuli['id']?>)" style="width:20px;opacity:1; margin-left:10px; margin-top:10px; " title="<? if(favorited($rcheuli['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">



  <img src="<?=HTTP_HOST?><? echo $rcheuli['upload']; ?>" id="im66" onclick="javascript:location.href='index.php?do=full&id=<? echo $rcheuli['id'];?>';" class="cover66" id="im66" style="border-radius: 50%; border:#FFFFFF 12px solid;  display: block;
  margin-left: auto;
  margin-right: auto; cursor: pointer">   

  



 </div>

 

 <div class="col-md-5" style="position:relative; padding-left:50px; padding-top: 20px; ">

 
<div>   <? 
	$res=mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");
	$rame=mysqli_fetch_assoc($res); ?>
	
	<b style="color: red"> <? echo $rcheuli['username']; ?> </b>
			   
			 </div>
	 	 <div> საგანი: <? echo str_replace("|", ",  ", trim($rcheuli['sagnebi'], "|")); ?> </div>
	 <div> საგანი: <? echo str_replace("|", ",  ", trim($rcheuli['current'], "|")); ?> </div>
	 
	 <div>  მდებარეობა:  <?
		  $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$b[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani);  
	 	echo $ubani['name']; ?></div>
	 
	 
	 <div> 
  ფასი: <? echo $rcheuli['fasi']; ?>  
<? if ($rcheuli['valuta']=='GEL')
		 {
		echo '&#8382;';	 
		 }
		 elseif ($rcheuli['valuta']=='USD')
		 {
			echo '&#36;';	
		 }
		 elseif ($rcheuli['valuta']=='EURO')
		 {
			 echo '&#8364;';
			 }
			 else
			 {
				echo ''; }
			 
			 ?>    </span>

          </div>

 
         

       
  <? $average = $_STARS->avg(); // AVERAGE RATINGS
    $ratings = $_STARS->get(getUserIp()); // RATINGS BY CURRENT USER
	if (isset($_POST['pid']) && $_POST['pid']== $b[id]) {
		mysqli_query($conn, "UPDATE login SET rating='".$average[$rcheuli['id']]."' WHERE id='$rcheuli[id]'");
	}

?>


<div class="pdt" style="border: none; position: relative; top:0; padding:0; "  >
      <div class="pstar" data-pid="<?=$rcheuli['id']?>">
	  
         <?php 
        $rate = isset($ratings[$rcheuli['id']]) ? $ratings[$rcheuli['id']] : 0 ;
		 
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
           

           

           
           
 
 

            

           

           

 </div>

 
 

  

  

  

  </div>    

   <? } }    ?> 

   

    <? 

echo $pagination->printPages();  ?>

 </div>

 

  



 

  

  







 



  

 
 




<div id="letters" class="tabcontent" style="position:relative; height:auto;">



<div class="row" style="position:relative; margin-left:15px;"> 





<div class="col-md-5">

<fieldset>

<legend>წერილები</legend> </fieldset>
<link href='<?=HTTP_HOST?>chosen/chosen_expanded.min.css' rel='stylesheet' type='text/css'>

<script src='<?=HTTP_HOST?>chosen/chosen_expanded.jquery.min.js' type='text/javascript'></script>





 <div style="height:400px; overflow:auto; border:1px solid #aaa;"> 

 <select name="sender"  data-placeholder="აირჩიეთ მომხმარებელი" class="chosen-select" tabindex="5" style="width: 100%;" id="test" onchange="document.location.href='<?=HTTP_HOST?>gancxadeba/l5?sender='+this.value"> 

<option value=""></option>  



<?

 $res = mysqli_query($conn, "SELECT sender as user from messages WHERE receiver='$_SESSION[USER_ID]' AND sender!=0
union SELECT receiver as user from messages WHERE sender='$_SESSION[USER_ID]' AND receiver!=0 GROUP BY user");

while ($message = mysqli_fetch_assoc($res))

{ 

	$sent = mysqli_query($conn, "SELECT * from login WHERE id ='$message[user]'");

	$sender = mysqli_fetch_assoc($sent); 



?>



<option value="<?=$message['user']?>" <? if($message['user'] == $_GET['sender']) echo 'selected';?>> <?=$sender['username']?> </option>



<? } ?>

 

 </select>
 </div>
</div> 

<!-- Script -->

<script type="text/javascript">

$(document).ready(function(){

 $('#test').chosen({ width:'100%'});

});



</script>

 

 

<div class="col-md-7"> 

<div style="overflow:auto; padding-top:20px;" id="qvemot">

 

  <p><?php

  if(isset($_POST['send_message']))

  {

	$sql=mysqli_query($conn, "INSERT INTO messages (`sender`, `receiver`, `message`, `date`, `status`) VALUES (".intval($_SESSION['USER_ID']).", ".intval($_POST['receiver']).", '$_POST[message]', ".intval(time()).", 0)");


	  		exit('<script>document.location.href = document.location.href;</script>');


	  }

  mysqli_query($conn, "UPDATE messages SET status=1 WHERE sender='$_GET[sender]' AND receiver='$_SESSION[USER_ID]'");

 $res = mysqli_query($conn, "SELECT * from messages WHERE (sender='$_GET[sender]' AND receiver='$_SESSION[USER_ID]') OR (sender='$_SESSION[USER_ID]' AND receiver='$_GET[sender]')");

while ($message = mysqli_fetch_assoc($res))

{

	$sent = mysqli_query($conn, "SELECT * from login WHERE id ='$message[sender]'");

	$sender = mysqli_fetch_assoc($sent);

	

	if($message['sender']==$_SESSION['USER_ID'])

	{	

	 ?>

        

        

     <div style="margin-bottom:15px; margin-left:15px;">

	<div style="background-color:#EBEBEB; margin-bottom:10px; padding:5px; border-radius:3px;">

 	<img src="<?=HTTP_HOST?>IMG/user.png" width="13" style="position:relative; top:-2px; right:5px;"><?=$sender['username']?> 

	<div style="font-size:10px"><?=date("d-m-y, h:i", $message['date'])?></div>

 

  <div>

  <?=$message['message']?>

  </div>  </div></div>

  

  <?

	}

	

  else

  

  {

	  

   ?>

  

  <div style="margin-bottom:15px;">

	<div style="background-color:#C7CCDD;  color:#000000;  margin-bottom:10px; margin-bottom:10px; padding:5px; border-radius:3px;">

 	<img src="<?=HTTP_HOST?>IMG/user_login.png" width="13" style="position:relative; top:-2px; right:5px;"><?=$sender['username']?> 

	<div style="font-size:10px"><?=date("d-m-y, h:i", $message['date'])?></div>

 

  <div>

  <?=$message['message']?>

  </div>  </div></div>

    



<? 

  }

}



  ?> 

  

  

  

 

  </div>



</div> </div> <form action="" method="POST" style="position:inherit; margin-top: 15px; margin-bottom: 15px; margin-left: 30px;" >

  <textarea name="message"  style="width:100%; border-radius:3px; color:#000000;" value="წერილის დაწერა" placeholder="წერილის დაწერა"></textarea><br>

  <input type="hidden" name="receiver" value="<?=$_GET['sender']?>"/>

  <input type="submit" name="send_message" value="გაგზავნა" style="background-color:#2D419C; border:0; border-radius:3px; color:#FFFFFF;"/> 

  </form> </div>



 





 

 

 





 

  
 
<div id="tranzaqcia" class="tabcontent" style="position:relative; height:500px; font-size:12px;">

	
	
	
	
<div style="position:relative; margin-top:13px;">

 <div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">გადახდის ID</th>
      <th scope="col">ტრანზაქციის ID</th>
      <th scope="col">პროდუქტი</th>
      <th scope="col">ფასი</th>
		<th scope="col">სტატუსი</th>
      <th scope="col">თარიღი</th>
    </tr>
  </thead>
  <tbody>
	  <?
$pagination = new Pagination($conn, HTTP_HOST."tranzaqcia/l7?do=page1", "transactions", "uid='$_SESSION[USER_ID]' ORDER BY date DESC", 10);
$data = $pagination->getData();
foreach ($data as $transactionb)
{
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$trans[uid]' LIMIT 1"));
 ?> 
    <tr>
      <th scope="row"><? echo $transactionb['id']; ?></th>
      <td><? echo $transactionb['trans_id']; ?></td>
      <td><? echo $transactionb['type']; ?></td>
      <td><?=number_format($transactionb['price'], 2);?></td>
		<td><?
		switch($transactionb['status'])
		{
				case 0: echo 'დამუშავების პროცესში';break;
				case 1: echo 'ტრანზაქცია შეიქმნა';break;
				case 2: echo 'გადახდილი';break;
				case 3: echo 'წარუმატებელი';break;
				case 4: echo 'თანხის უკან დაბრუნება';break;
				case 5: echo 'ტრანზაქციის დროის ამოწურვა';break;
				
		}
		
	?></td>
      <td><?=date("Y-m-d H:i:s", $transactionb['date'])?></td>
    </tr>
<? } ?>     
  </tbody>
</table>
	</div>
	 <div style="width:100%; clear:both; padding-top:50px;"> <?	echo $pagination->printPages(); ?> </div>
	

</div>
 
	 
</div>  

	
	
	<div id="damateba" class="tabcontent" style="position:relative; height:100%;"> 
	
	<section class="ftco-section" style="position:relativel; top:-60px;">

      <div class="container">

       <p>მოგესალმებით, <?=$user['username']?></p>

       <div class="row">
	
		   აქ იქნება ახალი ვაკანსიის დამატება
		  
		   <br><br>
		   
		   <?
	if(isset($_POST['add']))
		$res=mysqli_query($conn, "insert INTO gancxadeba (title, avtoris_id,  period_from, period_to, full)VALUES('$_POST[title]', '$_SESSION[USER_ID]', '$_POST[period_from]', '$_POST[period_to]', '$_POST[full]')"); 
		   
		   ?>
		   
		   
		   <form action="" method="post">
			   
			  
			   <input type="text" name="title" placeholder="title"> <br>
			    <input type="text" placeholder="period_from" name="period_from"  class="calendar"> <br>
			      <input type="text"  placeholder="period_to" name="period_to"  class="calendar"><br>
			   <textarea name="full" placeholder="ტექსტი"></textarea>
			   <input type="submit" name="add" value="დაამატე"> 
			   
		   </form>
		  
		  
		  </div> </div> </section> </div>

	
	

<div id="gancxadeba" class="tabcontent" style="position:relative; height:auto;">

 

  <strong style="position:relative; margin-left:5px;">ჩემი განცხადებები</strong>

<?  

  $tbl_name="gancxadeba";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 10;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE avtoris_id=$_SESSION[USER_ID]";

	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));

	$total_pages = $total_pages['num'];

	

	/* Setup vars for query. */

	$targetpage = HTTP_HOST."rcheulebi/l2?do=page1"; 	//your file name  (the name of this file)

	$limit = 6; 								//how many items to show per page

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0



	/* Get data. */

	

	$sql = "SELECT * FROM $tbl_name WHERE avtoris_id=$_SESSION[USER_ID] order by id desc LIMIT $start, $limit";




	

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

  

  

  <div class="row" style="font-size:12px; position:relative; padding-left:10px;">

 

  

  <div style="border-top:1px solid #E0E0E0; border-bottom:1px solid #E0E0E0; border-right:1px solid #E0E0E0; margin-bottom:10px; margin-left:-20px; border-radius:3px;" class="col-md-12">

  

<div class="col-md-3" >

 

  <img src="<?=HTTP_HOST?>IMG/<? if(favorited($statement_id['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png"  class="ketchup tooltip" onclick="addtofav(this, <?=$statement_id['id']?>)" style="width:20px;opacity:1; margin-left:10px; margin-top:10px; " title="<? if(favorited($statement_id['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">



  <img src="<?=HTTP_HOST?><? echo $statement_id['upload']; ?>" width="200px" height="150"  onclick="javascript:location.href='index.php?do=full&id=<? echo $statement_id['id'];?>';" style="position:relative; padding-bottom:15px; cursor:pointer; ">   

  



 </div>

 

 <div class="col-md-5" style="position:relative; padding-left:50px;">

 

 <?php echo $statement_id['valuta']; ?> <?php echo $statement_id['fasi']; ?>   </span>

           <p><b><?php echo $statement_id['kidva']; ?> <?php echo $statement_id['otaxi']; ?> <?php echo "ოთახიანი" ?>  <?php echo $statement_id['kategory']; ?> 

           </b> <span style="float:right; color:#D51417;"> ID: <?php echo $statement_id['id']; ?></span> </p> </div>

         

           <div style="float:left; width:50%;" > 

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
				echo  date("d/m/y - h:i", strtotime("+5 days", $td));
		   ?>
		  </div>

            <div style="float:left; width:50%;"> 

        სტატუსი </div> <div style="float:right; "> 

    <? 
 
 

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





?> </div> </div> </div>

           
 </div>
           

 
	

<br><br>
 
 
 
	<?PHP print $errorMessage; ?>

	
	
	
	
	
  </div>	
	
	
	
	
	












<style>

* {box-sizing: border-box}

 



/* Style the tab */

.tab {

  float: left;

  border: 1px solid #ccc;

  background-color: #f1f1f1;

  width: 30%;

 



}



/* Style the buttons inside the tab */

.tab button {

  display: block;

  background-color: inherit;

  color: black;

  padding: 22px 16px;

  width: 100%;

  border: none;

  outline: none;

  text-align: left;

  cursor: pointer;

  transition: 0.3s;

  font-size: 14px;

    border-bottom:solid 1px #C7C5C5;

}



/* Change background color of buttons on hover */

.tab button:hover {

  background-color: #ddd;

}



/* Create an active/current "tab button" class */

.tab button.active {

  background-color: #ccc;

}



/* Style the tab content */

.tabcontent {

  float: left;

  padding: 0px 12px;

  border: 1px solid #ccc;

  width: 70%;

  border-left: none;

  height: 300px;

}

</style>







</div></div>


<div id="redaqtireba" class="tabcontent" style="position:relative; height:auto;">

 
<script>
function addNewBlock(selector)
{
	var newBlock = $('#'+selector).append('<div style="background:#ccc; border-bottom: 1px solid #FFF">'+$('#'+selector).find('div').last().html()+'</div>');
	newBlock.find('.hasDatepicker').each(function(i, element){
		$(element).attr('id', '');
		$(element).attr('class', 'calendar');
		console.log(element);
		addCalendarToElement(element);
	});
}
function loadUbani(city_id)

{

	$.getJSON('<?=HTTP_HOST?>ajax.php?id='+city_id, function(json)

	{

		$('#ubani').empty();

		$('#ubani').append('<option value="0">რაიონი</option>');

		for(var i=0; i<json.length; i++)

		{

			$('#ubani').append('<option value="'+json[i].id+'">'+json[i].name+'</option>');

		}

	});

	

}



</script>

<?php

	$res=mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");
	$rame=mysqli_fetch_assoc($res);
			  
	
$hash=md5(time().$_SESSION['USER_ID']);
if(isset($_GET['enable_super_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 200)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-200 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET s_vip=$end_date WHERE id='$_GET[enable_super_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 200, '', ".time().",0,'სუპერ ვიპის შეძენა', $user[balance], ".($user['balance']-200).", $_GET[enable_super_vip] )");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}


if(isset($_GET['enable_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 100)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-100 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET vip=$end_date WHERE id='$_GET[enable_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 100, '', ".time().",0,'VIP-ის შეძენა', $user[balance], ".($user['balance']-100).", $_GET[enable_vip])");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}



if (isset($_GET['delete']))

{ 

 mysqli_query($conn, "DELETE from login where id='$_GET[delete]'");

}





if (!$_SESSION['USER_ID'])

	 

	$res = mysqli_query($conn,"SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");

	$user = mysqli_fetch_assoc($res);

	if ($_SESSION['USER_ID']==0)

		

		{

			

		//echo  "<script>document.location='index.php?do=login'</script>"; 

		}


 





 

$redirect = false;

if (isset($_POST['Submit1']))

{ 
	

	
	//if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"] || $_POST['status']==0)
if(true)
	{ 
	$uname = $_POST['username'];
	$pword = $_POST['password'];
    $email = $_POST['email'];
	$res = mysqli_query($conn,"SELECT id FROM login WHERE email='$email' AND id!=$USER[id]");
	mysqli_fetch_assoc($res);
		{
			$surati=$rame['upload'];
			if(resizeImage($_FILES['upload']['tmp_name'], 'img_teacher/'.time().'_'.$_FILES['upload']['name']))
			{
				$surati = 'img_teacher/'.time().'_'.$_FILES['upload']['name'];
				//exit($surati);
			}
			$current = '|'.implode('|', $_REQUEST['current']).'|';
			$sagnebi = '|'.implode('|', $_REQUEST['sagnebi']).'|';
			$klasi = '|'.implode('|', $_REQUEST['klasi']).'|';
		
			if(empty($pword))
				$pword = $rame['password'];
			else
				$pword = md5($pword);
		
			if(mysqli_query($conn,"UPDATE login SET `username`='$uname', `password`='".$pword."', `email`='$email', `ubani`='$_POST[ubani]', `kalaki`='$_POST[kalaki]', `menu`='$_POST[menu]', `price_from`='$_POST[price_from]',  `price_to`='$_POST[price_to]', `upload`='$surati', `klasi`='$klasi', `home`='$_POST[home]', `remote`='$_POST[remote]', `phone`='$_POST[phone]', `current`='$current', `agwera`='$_POST[agwera]', `mimdinare`='$_POST[mimdinare]', `fasi`='$_POST[fasi]', `sagnebi`='$sagnebi', `valuta`='$_POST[valuta]', `sagnebi_other`='$_POST[sagnebi_other]' WHERE id=$USER[id]"))
					
			echo '<script>alert("მონაცემები წარმატებით შეიცვალა");</script>';
			
 	
			{  
				$user_id = $_SESSION['USER_ID'];
				for($i = 0; $i<count($_POST['organization']);$i++)
				{
					$organization = $_POST['organization'][$i];
					$position = $_POST['position'][$i];
					$period_from = $_POST['period_from'][$i];
					$period_to = $_POST['period_to'][$i];
					$surati='';
					if(!empty($organization) && !empty($position))
					{
						
if(move_uploaded_file($_FILES['upload2']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i])) 
				$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i];
						mysqli_query($conn, "INSERT INTO experience (user_id, organization, position, period_from, period_to, upload, type) VALUES('$user_id', '$organization', '$position', '$period_from', '$period_to', '$surati', '0')");
					}
					
				}
				for($i = 0; $i<count($_POST['organization_x']);$i++)
				{
					$id = $_POST['organization_id_x'][$i];
					$image = $_POST['organization_image_x'][$i];
					$organization = $_POST['organization_x'][$i];
					$position = $_POST['position_x'][$i];
					$period_from = $_POST['period_from_x'][$i];
					$period_to = $_POST['period_to_x'][$i];
					$surati='';
					if(!empty($organization) && !empty($position))
					{
						if(move_uploaded_file($_FILES['upload2']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i])) 
							$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i];
						else
							$surati = $image;
						mysqli_query($conn, "UPDATE experience SET organization = '$organization', position ='$position', period_from='$period_from', period_to='$period_to' WHERE id='$id'");
						//exit(mysqli_error($conn));
					}
					
				}
				
				
				
						for($i = 0; $i<count($_POST['organization_education']);$i++)
				{
					$organization = $_POST['organization_education'][$i];
					$position = $_POST['position_education'][$i];
					$period_from = $_POST['period_education_from'][$i];
					$period_to = $_POST['period_education_to'][$i];
					$surati='';
							if(!empty($organization) && !empty($position))
					{
					if(move_uploaded_file($_FILES['upload3']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i]))
						$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i];
					mysqli_query($conn, "INSERT INTO experience (user_id, organization, position, period_from, period_to, upload, type) VALUES('$user_id', '$organization', '$position', '$period_from', '$period_to', '$surati', '1')");
					}
							
				}
				
				for($i = 0; $i<count($_POST['organization_education_x']);$i++)
				{
					$id = $_POST['organization_education_id_x'][$i];
					$image = $_POST['organization_education_image_x'][$i];
					$organization = $_POST['organization_education_x'][$i];
					$position = $_POST['position_education_x'][$i];
					$period_from = $_POST['period_education_from_x'][$i];
					$period_to = $_POST['period_education_to_x'][$i];
					$surati='';
							if(!empty($organization) && !empty($position))
					{
					if(move_uploaded_file($_FILES['upload3']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i]))
						$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i];
					else
						$surati = $image;
					mysqli_query($conn, "UPDATE experience SET organization='$organization', position='$position', period_from='$period_from', period_to='$period_to', upload = '$surati' WHERE id=$id");
					}
							
				}
				
				
				
			
			 
		 
			$errorMessage = "თქვენ წარმატებით დარეგისტრირდით";
			echo  "<script>document.location='index.php?do=page1'</script>";
		}
		
	}


 

	}

	else

		echo '<script>alert("დამცავი კოდი არასწორია");</script>';

}


$res=mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");
	$rame=mysqli_fetch_assoc($res);



if(isset($_GET['delete']))
{
mysqli_query($conn, "DELETE FROM experience WHERE id=$_GET[delete]");
}


if ($_POST['delete'])

{

$x=mysqli_query($conn,"select * FROM login where id='$_REQUEST[del]'");

$z=mysqli_fetch_array($x);

if ($z['surati'])

unlink('../'.$z['surati']);

mysqli_query($conn,"DELETE FROM login where id='$_REQUEST[del]'");

 

}





?>
 

	 
<div class="container">
  <h2>რედაქტირება</h2>
 
 

  <div> 
	 
          <div style="margin-top:20px; margin-bottom:20px; width: 100%" > 
		
		<? if(time() > $rame['s_vip'] && time() > $rame['vip']) {?>
			<div style="color:#FFFFFF; border: 2px solid #1E0DAD; padding: 10px;clear: both" class="col-md-3"> <a href="<?=HTTP_HOST?>pay.php?t=s_vip" id="myBtn_<? echo $rame['id'];?>">Super Vip პროფილის შეძენა - 5 ლარი </a> </div>		 	  
			<div style="color:#FFFFFF; border: 2px solid #D57022; padding: 10px; clear: both " class="col-md-3"> <a href="<?=HTTP_HOST?>pay.php?t=vip" id="myBtn2_<? echo $rame['id'];?>">Vip პროფილის შეძენა - 3 ლარი </a> </div>
			  <br>
			 
			  <? 
										}
if($_SESSION['USER_ID']>0)
{	
 

if(time()  < $rame['s_vip'])
{
	?>
			   <br><br>
  <div style="color:#FFFFFF; background-color:#4267b2; font-weight:bold; clear: both " class="col-md-3"> 
	<span style="padding-left:3px; padding-right:3px;"> <? echo "თქვენ გააქტიურებული გაქვთ SUPER VIP"; ?> </span> </div>
<? }
else
{
	
	if(time()  < $rame['vip'])
	{
		?>
         <br><br>
        <div style="color:#9F3537; background-color:#D8C0C1; font-weight:bold; clear: both " class="col-md-3">
			<span style="padding-left:3px; padding-right:3px;"> <? echo 'თქვენ გააქტიურებული გაქვთ VIP';?> </span> </div>
				
	<? }
	else
	{
		?>
			 
	<? }  
}  
}





?>
			  
			  
			  
			  
			  
			<!-- The Modal -->
 
		</div>
 
		
		<br>
		<br>
      <p><FORM NAME ="form1" enctype="multipart/form-data" METHOD ="POST" style="position:relative; padding-top:50px;">

<span class="col-md-3" style="position: relative; left: -15px;"> სახელი გვარი: </span><INPUT TYPE = 'TEXT' onkeypress="return makeGeo(this,event);" Name ='username' required="" placeholder="username" oninvalid="this.setCustomValidity('ეს ველი სავალდებულოა')" oninput="setCustomValidity('')" value="<?=$rame['username']?>" style="border:1px solid #8B8B8B;" class="col-md-2"> <br><br>
		  
		  <span class="col-md-3" style="position: relative; left: -15px;"> ახალი პაროლი: </span> <INPUT TYPE = 'password' Name ='password' placeholder="password"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ ასოები და ციფრები, ბრჭყალები არ დაიშვება')" value="" 
 oninput="setCustomValidity('')"  value="" style="border:1px solid #8B8B8B; position:relative;" class="col-md-2"> <br><br>
		  
		  <span class="col-md-3" style="position: relative; left: -15px;"> ელფოსტა: </span> <INPUT TYPE = 'email' Name ='email' required="" placeholder="email"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ მოქმედი ელფოსტა')"
 oninput="setCustomValidity('')" value="<?=$rame['email']?>" style="border:1px solid #8B8B8B; position:relative;" class="col-md-2">

<br><br>

<? if ($USER['status'] == 1) { ?>	  
		  
 <div> 
     
 ატვირთე სურათი <input type="file" name="upload"> 
	 <img src="<?=HTTP_HOST?><?=$rame['upload']?>" width="100"> </div>
 <!--END of Image Uploader Jquery-->   
	 	<br><br>	 
	 <div>
		 <span class="col-md-3" style="position: relative; left: -15px;"> მიმდინარე სამსახური: </span> <input type="text" name="mimdinare" value="<?=$rame['mimdinare']?>" onkeypress="return makeGeo(this,event);"  style="height:25px;" class="col-md-2">   
	 
	 <br> <br>
	 
		 
		 
		 
		 
		 
			 <span class="col-md-3" style="position: relative; left: -15px;"> სტატუსი: </span> <select name="current[]"  class="js-example-basic-multiple col-md-2" multiple="multiple"  style="height: 25px;" > 

	
		<option value="პრაქტიკოსი" <?=(strpos($rame['current'],"|პრაქტიკოსი|") !== false ? 'selected' : '')?>> პრაქტიკოსი</option>
		<option value="უფროსი" <?=(strpos($rame['current'],"|უფროსი|") !== false ? 'selected' : '')?>> უფროსი</option>
		<option value="მენტორი" <?=(strpos($rame['current'],"|მენტორი|") !== false ? 'selected' : '')?>> მენტორი</option>
		<option value="წამყვანი" <?=(strpos($rame['current'],"|წამყვანი|") !== false ? 'selected' : '')?>> წამყვანი</option>

    </select>
	
	<script> $(document).ready(function() {
	
    $('.js-example-basic-multiple').select2({
  placeholder: 'მონიშნე სამსახურებრივი პოზიცია'
});
}); </script>
	 
	 
 
	 
	
	</div>
	<br> 
	
 

		 <span class="col-md-3" style="position: relative; left: -15px;"> რეგიონი </span>	<select onchange="loadUbani(this.value)"  name="kalaki" style="position:relative; height: 25px; " class="col-md-2">

<option value="0"> რაიონი </option>



<?php 
$res=mysqli_query ($conn, "SELECT * FROM kalaki");

while ($city = mysqli_fetch_assoc($res))

	

echo '<option value="'.$city['id'].'" '.($city['id']==$rame['kalaki'] ? 'selected' : '').'>'.$city['name'].'</option>';



 ?>



</select>


<br><br>
		 <span class="col-md-3" style="position: relative; left: -15px;"> რაიონი </span> <select  name="ubani" id="ubani" style="position:relative; height: 25px;" class="col-md-2">

<option value="0">რაიონი </option>
<?
	$res=mysqli_query($conn, "SELECT * from ubani WHERE kalakis_id=".$rame['kalaki']);
	$is_first = true;
	while ($ubani=mysqli_fetch_assoc($res))
	{
	?>
     <option value="<?=$ubani['id']?>" <?=($ubani['id']==$rame['ubani'] ? 'selected' : '')?>><?=$ubani['name']?></option>
<? } ?>
    </select>

	<br><br>
	
	<span class="col-md-3" style="position: relative; left: -15px;"> რომელ საგნებში ამზადებთ? </span>
	
	<select name="sagnebi[]" class="js-example-basic-multiple col-md-2" multiple="multiple"  style=""> 

	<option value="ბიოლოგია" <?=(strpos($rame['sagnebi'],"|ბიოლოგია|") !== false ? 'selected' : '')?>>ბიოლოგია </option>
	<option value="ბუნებისმეტყველება" <?=(strpos($rame['sagnebi'],"|ბუნებისმეტყველება|") !== false ? 'selected' : '')?>> ბუნებისმეტყველება </option>
	<option value="ქიმია" <?=(strpos($rame['sagnebi'],"|ქიმია|") !== false ? 'selected' : '')?>> ქიმია </option>
	<option value="ფიზიკა" <?=(strpos($rame['sagnebi'],"|ფიზიკა|") !== false ? 'selected' : '')?>> ფიზიკა </option>
		<option value="სამოქალაქო განათლება" <?=(strpos($rame['sagnebi'],"|სამოქალაქო განათლება|") !== false ? 'selected' : '')?>> სამოქალაქო განათლება </option>
		<option value="გეოგრაფია" <?=(strpos($rame['sagnebi'],"|გეოგრაფია|") !== false ? 'selected' : '')?>> გეოგრაფია</option>
		<option value="ისტორია" <?=(strpos($rame['sagnebi'],"|ისტორია|") !== false ? 'selected' : '')?>> ისტორია </option>
		<option value="გერმანული ენა" <?=(strpos($rame['sagnebi'],"|გერმანული ენა|") !== false ? 'selected' : '')?>> გერმანული ენა </option>
		<option value="ინგლისური ენა" <?=(strpos($rame['sagnebi'],"|ინგლისური ენა|") !== false ? 'selected' : '')?>> ინგლისური ენა </option>
		<option value="ფრანგული ენა" <?=(strpos($rame['sagnebi'],"|ფრანგული ენა|") !== false ? 'selected' : '')?>> ფრანგული ენა </option>
		<option value="რუსული ენა" <?=(strpos($rame['sagnebi'],"|რუსული ენა|") !== false ? 'selected' : '')?>> რუსული ენა </option>
		<option value="ინფორმაციულ საკომუნიკაციო ტექნოლოგიები" <?=(strpos($rame['sagnebi'],"|ინფორმაციულ საკომუნიკაციო ტექნოლოგიები|") !== false ? 'selected' : '')?>> ინფორმაციულ საკომუნიკაციო ტექნოლოგიები </option>
		<option value="მათემატიკა" <?=(strpos($rame['sagnebi'],"|მათემატიკა|") !== false ? 'selected' : '')?>> მათემატიკა</option>
		<option value="ქართული" <?=(strpos($rame['sagnebi'],"|ქართული|") !== false ? 'selected' : '')?>> ქართული </option>
		<option value="სახვითი და გამოყენებითი ხელოვნება" <?=(strpos($rame['sagnebi'],"|სახვითი და გამოყენებითი ხელოვნება|") !== false ? 'selected' : '')?>> სახვითი და გამოყენებითი ხელოვნება </option>
		<option value="მუსიკა" <?=(strpos($rame['sagnebi'],"|მუსიკა|") !== false ? 'selected' : '')?>> მუსიკა </option>
<option value="ფიზიკური აღზრდა და სპორტი" <?=(strpos($rame['sagnebi'],"|ფიზიკური აღზრდა და სპორტი|") !== false ? 'selected' : '')?>> ფიზიკური აღზრდა და სპორტი </option>
    </select> 
 
		  <input type="text" name="sagnebi_other" placeholder="სხვა" value="<?=$rame['sagnebi_other']?>" style="width: 100px;"  />  
	 
	<script> $(document).ready(function() {
	
    $('.js-example-basic-multiple').select2({
  placeholder: 'მონიშნე'
});
}); </script>
	
	
	
	<br><br>
	
		 <span class="col-md-3" style="position: relative; left: -15px;"> რომელი კლასის მოსწავლეებს ამზადებთ? </span>
	
	<select name="klasi[]" class="js-example-basic-multiple col-md-2" multiple="multiple"  style=""> 

	<option value="I კლასი" <?=(strpos($rame['klasi'],"|I კლასი|") !== false ? 'selected' : '')?>> I კლასი </option>
		<option value="II კლასი" <?=(strpos($rame['klasi'],"|II კლასი|") !== false ? 'selected' : '')?>> II კლასი </option>
		<option value="III კლასი" <?=(strpos($rame['klasi'],"|III კლასი|") !== false ? 'selected' : '')?>> III კლასი </option>
		<option value="IV კლასი" <?=(strpos($rame['klasi'],"|IV კლასი|") !== false ? 'selected' : '')?>> IV კლასი </option>
		<option value="V კლასი" <?=(strpos($rame['klasi'],"|V კლასი|") !== false ? 'selected' : '')?>> V კლასი </option>
		<option value="VI კლასი" <?=(strpos($rame['klasi'],"|VI კლასი|") !== false ? 'selected' : '')?>> VI კლასი </option>
		<option value="VII კლასი" <?=(strpos($rame['klasi'],"|VII კლასი|") !== false ? 'selected' : '')?>> VII კლასი </option>
		<option value="VIII კლასი" <?=(strpos($rame['klasi'],"|VIII კლასი|") !== false ? 'selected' : '')?>> VIII კლასი </option>
		<option value="IX კლასი" <?=(strpos($rame['klasi'],"|IX კლასი|") !== false ? 'selected' : '')?>> IX კლასი </option>
		<option value="X კლასი" <?=(strpos($rame['klasi'],"|X კლასი|") !== false ? 'selected' : '')?>> X კლასი </option>
		<option value="XI კლასი" <?=(strpos($rame['klasi'],"|XI კლასი|") !== false ? 'selected' : '')?>> XI კლასი </option>
		<option value="XII კლასი" <?=(strpos($rame['klasi'],"|XII კლასი|") !== false ? 'selected' : '')?>> XII კლასი </option>
		<option value="აბიტურიენტები" <?=(strpos($rame['klasi'],"|აბიტურიენტები|") !== false ? 'selected' : '')?>> აბიტურიენტები </option>
		<option value="სტუდენტები" <?=(strpos($rame['klasi'],"|სტუდენტები|") !== false ? 'selected' : '')?>> სტუდენტები </option>

    </select>
	<script> $(document).ready(function() {
	
    $('.js-example-basic-multiple').select2({
  placeholder: 'მონიშნე'
});
}); </script>
	
	<br><br>
	
		 <span class="col-md-3" style="position: relative; left: -15px;"> სახლში მისვლით ამზადებთ </span> <input type="checkbox" name="home" style="transform: scale(1.5); cursor: pointer" value="1" <?=($rame['home']==1 ? 'checked' : '')?>/>
	<br><br>
	
		 <span class="col-md-3" style="position: relative; left: -15px;"> დისტანციურად ამზადებთ </span> <input type="checkbox" style="transform: scale(1.5); cursor: pointer"  name="remote" value="1" <?=($rame['remote']==1 ? 'checked' : '')?>/>
	<br><br>
	
		 <span class="col-md-3" style="position: relative; left: -15px;"> გაკვეთილის ფასი </span> <input type="text" name="fasi" value="<?=$rame['fasi']?>" type="text" style="height:25px;"   class="col-md-2"/> 
	 
<select name="valuta" style="width:100px; height:25px; background-color:#F0F0F0;  position:relative;"> 

	    <option value="GEL" <?=($rame['valuta']=='GEL' ? 'selected' : '')?>> GEL </option>

        <option value="USD" <?=($rame['valuta']=='USD' ? 'selected' : '')?>> USD </option>

        <option value="EUR" <?=($rame['valuta']=='EUR' ? 'selected' : '')?>> EUR </option>

    </select>
	<br><br>
	
		 <span class="col-md-3" style="position: relative; left: -15px;"> ტელეფონი </span> <input type="text" name="phone" value="<?=$rame['phone']?>" type="text" style="height:25px;" class="col-md-2">  
	<br><br>
	
<div style="background-color:#D3D3D3" id="organization" class="col-md-8">
	სამუშაო გამოცდილება
	
	<?
		$res=mysqli_query($conn, "SELECT * FROM experience WHERE user_id='$rame[id]' AND type=0");
		while($experience = mysqli_fetch_assoc($res))
		{
	?>
	<div style="background-color:#FFFFFF; border-bottom: 1px solid #8C8C8C ">
	<br>
	<span style="width: 350px;" class="col-md-3"> * ორგანიზაცია <input type="text" name="organization_x[]" value="<?=$experience['organization']?>" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-3"> * პოზიცია <input type="text" name="position_x[]" value="<?=$experience['position']?>" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-4"> * მუშაობის პერიოდი  
		
		<br>
		 <input  type="text" name="period_from_x[]" value="<?=$experience['period_from']?>" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_to_x[]" value="<?=$experience['period_to']?>" readonly class="calendar" size="6"/>
        -მდე  
		
		<input type="hidden" name="position_id_x[]" value="<?=$experience['id']?>"/>
		<input type="hidden" name="organization_image_x[]" value="<?=$experience['upload']?>"/>
		</span>
		
		<br><br><br>
	<a target="_blank" href="<?=HTTP_HOST?><?=$experience['upload']?>"> გადმოწერა </a><br>
   <a href="index.php?do=page1&delete=<?=$experience['id']?>"> წაშლა </a>

	<br>
	</div>
		<? } ?>
		<div style="background-color:#FFFFFF ">
	<br>
	<span style="width: 350px;" class="col-md-3"> * ორგანიზაცია <input type="text" name="organization[]" type="text" style="width:250; height:25px;">   </span>
	<span style="width: 350px;" class="col-md-3"> * პოზიცია <input type="text" name="position[]" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-4"> * მუშაობის პერიოდი  
		
		<br>
		 <input  type="text" name="period_from[]" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_to[]" readonly class="calendar" size="6"/>
        -მდე  
		
		
		</span>
	
	<br><br><br> * ფაილის ატვირთვა <b> (PDF ან სურათი)</b> <input type="file" name="upload2[]">
	<br>
	</div>	
		

	 </div>
	<div style="clear: both">
		<span onClick="addNewBlock('organization')">დაამატე ველი (თუ გსურს) <i class="fa fa-plus" aria-hidden="true"></i></span>

	 </div>
	 
	 <br><br>
	<div style="background-color:#F3E6E7; margin-top: 25px;" id="organization_education" class="col-md-8">
	განათლება
		
		<?
		$res=mysqli_query($conn, "SELECT * FROM experience WHERE user_id='$rame[id]' AND type=1");
		while($experience = mysqli_fetch_assoc($res))
		{
	?>
	<div style="background-color:#FFFFFF; border-bottom: 1px solid #8C8C8C ">
	<br>
	<span style="width: 350px;" class="col-md-3"> * სასწავლებელი <input type="text" name="organization_education_x[]" value="<?=$experience['organization']?>" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-3"> * ფაკულტეტი <input type="text" name="position_education_x[]" value="<?=$experience['position']?>" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-4"> * სწავლის პერიოდი  
		
		<br>
		 <input  type="text" name="period_education_from_x[]" value="<?=$experience['period_from']?>" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_education_to_x[]" value="<?=$experience['period_to']?>" readonly class="calendar" size="6"/>
        -მდე  
		
		<input type="hidden" name="position_education_id_x[]" value="<?=$experience['id']?>"/>
		<input type="hidden" name="organization_education_image_x[]" value="<?=$experience['upload']?>"/>
		</span>
		
		<br><br><br>
	<a target="_blank" href="<?=HTTP_HOST?><?=$experience['upload']?>"> გადმოწერა </a><br>
   <a href="index.php?do=page1&delete=<?=$experience['id']?>"> წაშლა </a>

	<br>
	</div>
		<? } ?>
		<div style="background-color:#FFFFFF ">
	<br>
	<span style="width: 350px;" class="col-md-3"> * სასწავლებელი <input type="text" name="organization_education[]" type="text" style="width:250; height:25px;">   </span>
	<span style="width: 350px;" class="col-md-3"> * ფაკულტეტი <input type="text" name="position_education[]" type="text" style="width:250; height:25px;">  </span>
	<span style="width: 350px;" class="col-md-4"> * სწავლის პერიოდი  
		
		<br>
		 <input  type="text" name="period_education_from[]" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_education_to[]" readonly class="calendar" size="6"/>
        -მდე  
		
		
		</span>
	
	<br><br><br> * ფაილის ატვირთვა <b> (PDF ან სურათი)</b> <input type="file" name="upload3[]">
	<br>
	</div>	
		

	 </div>
	
	<div style="clear: both">
	 <span onClick="addNewBlock('organization_education')">დაამატე ველი (თუ გსურს) <i class="fa fa-plus" aria-hidden="true"></i></span> 
	</div>
	 
	 </div>
	
	<br><br>
	 
	 
	 <div> 
	 
	<textarea name="agwera" onkeypress="return makeGeo(this,event);" value="<?=$rame['agwera']?>" style="width: 100%; height: 150px;" class="col-md-8"><?=$rame['agwera']?> </textarea> </div> 

	 </div>
	
 
	
 </p>   
  
      
 
		  <div style="clear: left"> 
		  <br><br>
<?

$a=mysqli_query($conn,"select * from login where id='$_REQUEST[id]'");

$b=mysqli_fetch_array($a);



?>



<? echo $b['id']; ?>   





 <?php /*?><img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase;"/> <?php */?>

 



            
<?} ?>
            

	 	 <input name="checkbox" type="hidden" id="geoKeys" checked="checked" />

 <input type="hidden" name="hash" value="<?=$hash?>">
		  <input type="hidden" name="status" value="1">
 <INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "რედაქტირება" style="border:1px solid #8B8B8B; position:relative; top:" class="col-md-2">


</FORM></p>
    </div>
     
    
  </div>

                         

			        

		 

  </section> </div> 


<script>
	
	function addCalendarToElement(element)
	{
		$(element).datepicker({ 
			  changeMonth: true, 
			  changeYear: true,
			  altFormat: "yyyy/mm/dd",
			  dateFormat: "yy/mm/dd",
			  maxDate: "+0Y",
				onSelect: function(selected) {
				   $(element).datepicker("option","maxDate", selected)
				}
			});
	}
	function addCalendar()
	{
		$('.calendar').each(function(i, element){
			addCalendarToElement(element);
		})
	}
	 addCalendar();
  </script>


<script>

function openCity(evt, cityName) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(cityName).style.display = "block";

  evt.currentTarget.className += " active";

}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();





var objDiv = document.getElementById("qvemot");

objDiv.scrollTop = objDiv.scrollHeight;

</script>
    