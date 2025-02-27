






<script>
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
		$('._ubani').trigger('chosen:updated');
	}); 
	
}


function changeCurrency(id)
{
	if($('#price_GEL_'+id).css('display') != 'none')
	{
		$('#price_GEL_'+id).hide();
		$('#price_USD_'+id).show();
	}
	else
	{
		$('#price_GEL_'+id).show();
		$('#price_USD_'+id).hide();
	}
}
</script><?
$id = (int) $_GET['id'];
 
$abga=mysqli_query($conn,'select * from login where id='.$_GET['id']);
$tevza=mysqli_fetch_array($abga);

$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
	$avtori=mysqli_fetch_array($aa);

$kalaki=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kalaki"));

$ubani=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM ubani"));
 

if (isset($_POST['send-message']))
{
	$sql=mysqli_query($conn, "INSERT INTO messages (`sender`, `receiver`, `message`, `date`, `status`) VALUES (".intval($_SESSION['USER_ID']).", ".intval($tevza['id']).", '$_POST[message]', ".intval(time()).", 0)");
 }

			  // view count IP ის მიხედვით

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
$next_date = strtotime("+1 day");
$res = mysqli_query($conn, "SELECT * FROM view_counts WHERE ip='".getUserIp()."' AND id_article=$id");
$view_data = mysqli_fetch_assoc($res);
if($view_data)
{
	if(time()>$view_data['view_date'])
	{
		$update_view_count = true;
		mysqli_query($conn, "UPDATE view_counts SET view_date='".$next_date."' WHERE ip='".getUserIp()."' AND id_article=$id");
	}
	else
		$update_view_count = false;
}
else
{
	$update_view_count = true;
	mysqli_query($conn, "INSERT INTO view_counts (id_article,ip,view_date) VALUES($id, '".getUserIp()."', '".$next_date."')");
}
if($update_view_count)
{
	mysqli_query($conn, 'UPDATE `login` t SET t.`view_count` = t.`view_count` + 1, t.`week_view_count` = t.`week_view_count` + 1 WHERE t.`id`='.$id);
}
mysqli_query($conn, "UPDATE login SET clear_week_view_count='".strtotime('+7 day')."', week_view_count=0 WHERE clear_week_view_count < ".time()."");

?>
 
<link href="style.css" rel="stylesheet" type="text/css">
<link href="logo.css" rel="stylesheet" type="text/css">

<div style="width:100%; top:65px; position:relative; background-color:#F3BA3F; border: 1px solid #F3BA3F; z-index: 1"> 
<div class="container">
<div class="row" style="position:revative;">
	<div class="col-md-12" align="center">
    
    <style> 
	/* Slider code. Javascript bellow */ 
	
     .w3-btn,.w3-button{ background-color:#525C66; width: 70px; height: 70px; color:#FFFFFF; padding:8px 16px;vertical-align:middle;overflow:hidden; border:none;}
.w3-btn:hover{}
.w3-btn,.w3-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}   
.w3-disabled,.w3-btn:disabled,.w3-button:disabled{cursor:not-allowed;opacity:0.3}.w3-disabled *,:disabled *{pointer-events:none}
.w3-btn.w3-disabled:hover,.w3-btn:disabled:hover{box-shadow:none, border:0;} 
 .w3-button:hover{color:#FFFFFF;background-color:#1B1B1B; }
 .w3-display-left{position:absolute;top:50%;left:0%;transform:translate(0%,-50%);-ms-transform:translate(-0%,-50%);  }
.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,-50%);-ms-transform:translate(0%,-50%);  }
  
   
    
    </style>
    
       <style>
		#im66 {
  height: 450px;
		 
 
 }

.cover66 {
 
   width: 730px;
  object-fit: cover;
   
}
.cover66:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 
	 transition: all .7s;

}
	

	</style>
    
    
    
    
    
   
 
    
 
 </div>
    </div> </div> </div>
    
    
   
    
     <div class="container" >
<div class="row" style="margin:0 auto; margin-left:-15px; padding-top:140px; ">




<div class="col-md-8"> 

  <br> <style>
		#im67 {
  height: 180px;
			width: 180px;
		 
 
 }

.cover67 {
 
idth: 180px;
  object-fit: cover;
   
}
.cover66:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 
	 transition: all .7s;

}
	

	</style>
      <div style="position:relative; top:-60px;   "> 
		 
		<? if (!empty($tevza['upload']))
		   { ?>   
		  
<a data-fancybox="gallery" href="<?=HTTP_HOST?>watermark2.php?img=<? echo $tevza['upload'];?>" style="position: relative;"> 
<img class="mySlides cover67" id="im67"   src="<?=HTTP_HOST?>watermark2.php?img=<? echo $tevza['upload'];?>" style="cursor:zoom-in; float: left; border-radius: 50%; border:3px solid #F3BA3F"> 
</a>
		  <? } else { ?>
		     <a data-fancybox="gallery" href="<?=HTTP_HOST?>IMG/No_Image_Available.jpg" style="position: relative;"> 
<img class="mySlides cover67" id="im67"   src="<?=HTTP_HOST?>IMG/No_Image_Available.jpg" style="cursor:zoom-in; float: left; border-radius: 50%; border:3px solid #F3BA3F"> 
</a>
		  <? } ?>
		  
		  
     		<div style="font-size: 20px; position: relative; left: 20px; font-weight: bold"> <a>  <? echo $tevza['username']; ?></a></div>
 
		  
		  <div class="col-md-8"> 
		  <span style="font-size: 18px; line-height: 16px; position: relative; top: 15px;"> <kl style="padding-left:4px;"> <? echo strip_tags($tevza['agwera']);?> </kl>  
			  </div>
			  
			  
			
    
 




 






  <style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf); } 
@font-face { font-family: bpg_mrgvlovani_caps_2010; 
font-weight: 100; src: url('<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf'); }  
ch { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style>
       <kl style="position:relative; font-size:14px;">   
     
		   
         <table class="table table-hover" style="position: relative; top: 50px;">
   
  <tbody>
    <tr>
  
    </tr>
    <tr>
      <td>ელფოსტა</td>
      <td></td>
      <td><? echo $tevza['email']; ?></td>
    </tr>
	   <tr>
      <td colspan="2">მიმდინარე სამსახური</td>
      <td><? echo $tevza['mimdinare']; ?></td>
    </tr>
    <tr>
      <td colspan="2">სტატუსი</td>
      <td><? echo str_replace("|", ",  ", trim($tevza['current'], "|")); ?></td>
    </tr>
	  
	   <tr>
      <td colspan="2">რეგიონი</td>
      <td><?php			
$res=mysqli_query ($conn, "SELECT * FROM kalaki WHERE  id='$tevza[kalaki]'");
 $city = mysqli_fetch_assoc($res); 
 
	 
 
   echo $city['name'];?> </td>
    </tr>
	  
	  <tr>
      <td colspan="2">რაიონი</td>
      <td><?
		  $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$tevza[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani); 
 
 
echo $ubani['name']; ?> </td>
    </tr>
	  
	  
	  <tr>
      <td colspan="2">საგანი</td>
      <td><? echo str_replace("|", " ,  ", trim($tevza['sagnebi'], "|")); ?>
		  
		  <? if(!empty(str_replace("|", ",  ", trim($tevza['sagnebi'], "|"))))
				{
	echo ',&nbsp'.$tevza['sagnebi_other']; 
				 } else
{
	echo $tevza['sagnebi_other']; 
}
		  ?> </td>
    </tr>
	  
	  <tr>
      <td colspan="2">კლასები</td>
      <td><? echo str_replace("|", ",  ", trim($tevza['klasi'], "|")); ?> </td>
    </tr>
	  
	  <tr>
      <td colspan="2">სახლში მისვლით</td>
      <td><? if($tevza['home']==1) echo "<i class='fa fa-check' aria-hidden='true'></i>"; else echo "<i class='fa fa-times' aria-hidden='true'></i>"; ?> </td>
    </tr>
	  
	  <tr>
      <td colspan="2">დისტანციურად</td>
      <td><? if($tevza['remote']==1) echo "<i class='fa fa-check' aria-hidden='true'></i>"; else echo "<i class='fa fa-times' aria-hidden='true'></i>"; ?> </td>
    </tr>
	  
	   <tr>
      <td colspan="2"> </td>
      <td> </td>
    </tr>
	  
	  
  </tbody>
</table>
<br><br>
<p> <ch> <strong> <i class="fa fa-recycle" aria-hidden="true"></i>
სამუშაო გამოცდილება </strong> </ch></p>
<?
		   $res=mysqli_query($conn, "SELECT * FROM experience WHERE user_id='$tevza[id]' AND type=0");
		while($experience = mysqli_fetch_assoc($res))
		{
		   ?>
		    
<table class="table table-hover">
   
  <tbody>
    <tr>
      <td>ორგანიზაცია</td>
      <td></td>
      <td><? 
		  echo $experience['organization']; ?></td>
    </tr> 
	  
	  
	  <tr>
      <td>პოზიცია</td>
      <td></td>
      <td><?  
		  echo $experience['position']; ?></td>
    </tr> 
	  
	  
	  <tr>
      <td>მუშაობის პერიოდი</td>
      <td></td>
      <td><? echo $experience['period_from']; ?> - <? echo $experience['period_to']; ?></td>
    </tr> 
	   <tr>
      <td>დიპლომი / სერტიფიკატი</td>
      <td></td>
      <td><? if(!empty($experience['upload'])) { ?>  <a target="_blank" href="<?=HTTP_HOST?><? echo $experience['upload']?>">    <? echo "გადმოწერა"; ?>  </a>  
    <? } else { ?>  <i class='fa fa-times' aria-hidden='true'></i> <? } ?> 
		   </td>
    </tr> 
  </tbody>
</table>
		   <div style="height: 5px; background-color: antiquewhite; margin-bottom: 25px;"> </div>
<? } ?>
 
		   

<p> <ch> <strong> <i class="fa fa-id-card-o" aria-hidden="true"></i>
განათლება </strong> </ch></p> 
		   <?
		   $res=mysqli_query($conn, "SELECT * FROM experience WHERE user_id='$tevza[id]' AND type=1");
		while($experience = mysqli_fetch_assoc($res))
		{
		   ?>
		
<table class="table table-hover">
   
  <tbody>
    <tr>
      <td>ორგანიზაცია</td>
      <td></td>
      <td><? 
		  echo $experience['organization']; ?></td>
    </tr> 
	  
	  
	  <tr>
      <td>პოზიცია</td>
      <td></td>
      <td><?  
		  echo $experience['position']; ?></td>
    </tr> 
	  
	  
	  <tr>
      <td>სწავლის პერიოდი</td>
      <td></td>
      <td><? echo $experience['period_from']; ?> - <? echo $experience['period_to']; ?> </td>
    </tr> 
	   <tr>
      <td>დიპლომი / სერტიფიკატი</</td>
      <td></td>
      <td>
	<? if(!empty($experience['upload'])) { ?>  <a target="_blank" href="<?=HTTP_HOST?><? echo $experience['upload']?>">    <? echo "გადმოწერა"; ?>  </a>  
    <? } else { ?>  <i class='fa fa-times' aria-hidden='true'></i> <? } ?> 
		   </td>
    </tr> 
  </tbody>
</table>
 <div style="height: 5px; background-color: antiquewhite; margin-bottom: 25px;"> </div>

		   
		   <? } ?>
 
   </div>
      
      
      
   
      
 

   

<div style="padding-bottom: 50px;"> 
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
	if (isset($_POST['pid'])) {
      if (!$_STARS->save($_POST['pid'], getUserIp(), $_POST['stars'])) {
        echo "<div>$_STARS->error</div>";
      }
    }
	$average = $_STARS->avg(); // AVERAGE RATINGS
    $ratings = $_STARS->get(getUserIp()); // RATINGS BY CURRENT USER
	if (isset($_POST['pid'])) {
		mysqli_query($conn, "UPDATE login SET rating='".$average[$_GET['id']]."' WHERE id='$_GET[id]'");
		exit('<script>document.location.href = document.location.href;</script>');
	}
?>


<div class="pdt">
      <div class="pstar" data-pid="<?=$_GET['id']?>">
	  
      <div class="prate">
		  <?
	
	
	$cnt = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(user_id) as cnt from `star_rating` WHERE product_id='".$_GET['id']."'"));

echo intval($cnt['cnt']).' შემფასებელი';
		    
		  ?> <br>
		  საშუალო მაჩვენებელი: <?=$average[$_GET['id']]?></div>
        შეაფასე მასწავლებელი: <?php 
        $rate = isset($ratings[$_GET['id']]) ? $ratings[$_GET['id']] : 0 ;
		 
        for ($i=1; $i<=5; $i++) {
			
          $img = $i<=$rate ? "star" : "star-blank" ;
          echo "<img src='".HTTP_HOST."rating/$img.png' data-set='$i'>";
			
        }
		 
      ?></div>
    </div>


<form id="ninForm" method="post" target="_self">
      <input id="ninPdt" type="hidden" name="pid"/>
      <input id="ninStar" type="hidden" name="stars"/>
    </form>
	
	
   <!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons" style="margin-top: 35px;"></div>
<!-- ShareThis END -->



 </div>

 </div>


<div style="display:inline-block;   position: relative; top: -40px;  border-radius:3px;" class="col-md-4"> 
<div style="border:1px solid #3D65AF; padding: 15px;">
	
	<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf); } 
@font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf'); }   
kl { font-family:bpg_algeti_compact, sans-serif; } </style>


<div style="background-color:#3D65AF;">
<div  class="tooltip1" style="position:relative; padding-left:25px;"> 
 <style>
.tooltip1 {
  position: relative;
  display: inline-block; 
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: 180px;
  background-color: #3D65AF;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  font-size:12px;
  transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #3D65AF transparent transparent transparent;
}

.tooltip1:hover .tooltiptext1 {
  visibility: visible;
  opacity: 1;
}
</style>
 


        <style> 
              
              .flipswitch_<?=$tevza['id']?> {
  position: relative;
  width: 32px;
  padding-top:10px;
 
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select: none;
  
}
.flipswitch_<?=$tevza['id']?> input[type=checkbox] {
  display: none;
}
.flipswitch-label_<?=$tevza['id']?> {
  display: block;
  overflow: hidden;
  cursor: pointer;
  border: 1px solid #FFFFFF;
 
}
.flipswitch-inner_<?=$tevza['id']?> {
  width: 200%;
  margin-left: -100%;
  -webkit-transition: margin 0.3s ease-in 0s;
  -moz-transition: margin 0.3s ease-in 0s;
  -ms-transition: margin 0.3s ease-in 0s;
  -o-transition: margin 0.3s ease-in 0s;
  transition: margin 0.3s ease-in 0s;
}
.flipswitch-inner_<?=$tevza['id']?>:before, .flipswitch-inner_<?=$tevza['id']?>:after {
  float: left;
  width: 50%;
  height: 15px;
  padding: 0; 
  font-size: 11px;
  color: white;
 
 
}
.flipswitch-inner_<?=$tevza['id']?>:before {
  content: "GEL";
  padding-left: 3px;
 
  padding-right: 3px;
 background-color: #FFFFFF;
 color: #3D65AF;
}
.flipswitch-inner_<?=$tevza['id']?>:after {
  content: "USD";
    padding-left: 3px;
  padding-right: 3px;
  background-color: #FFFFFF;
  color: #3D65AF;
  text-align: right;
}
.flipswitch-switch_<?=$tevza['id']?> {
 
 
}
.flipswitch-cb_<?=$tevza['id']?>:checked + .flipswitch-label_<?=$tevza['id']?> .flipswitch-inner_<?=$tevza['id']?> {
  margin-left: 0;
}
.flipswitch-cb_<?=$tevza['id']?>:checked + .flipswitch-label_<?=$b['id']?> .flipswitch-switch_<?=$tevza['id']?> {
  right: 0;
}
              </style>
              
              
           
            
              
              
               <div class="row" style="padding-left:15px;">
             
             <div id="price_GEL_<?=$tevza['id']?>" style="font-size:30px; color:#fff; position:relative;  margin-top:0; left:-3px;"> 
             <b>
          
              <? 				 
			 $rate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rate FROM valuta WHERE valuta='USD'"));
			 if ($tevza['valuta']=='USD')
			 {
				 $result=$tevza['fasi'] *  $rate['rate'];
			 		echo (round($result));	 
			 }
			 else 
			 {
			 echo (round($tevza['fasi'])); 
			 }
			 ?> </b> <span class="tooltiptext1">ვალუტის კონვერტაცია</span>
             
             <br>
            <span style="font-size:14px; position:relative; top:-15px;">  
              </span> </div>
             

 

	<div class="tooltip1" style="display:none; font-size:30px; color:#fff; position:relative; margin-top:0;  left:-3px;" id="price_USD_<?=$tevza['id']?>">
    <b>
    <? 
	if ($tevza['valuta']=='USD')
			 
			 echo (round($tevza['fasi']));
		 
		else 
			 {
			 echo round($tevza['fasi']/  $rate['rate']);	 
			 }
			 
	?>  </b>   <span class="tooltiptext1">ვალუტის კონვერტაცია</span>
    
    <br>
     <span style="font-size:14px; position:relative; top:-15px;"> 
       </span>
    </div> 
             
              <div style="position:relative; padding-left:5px;">
 			  <div class="flipswitch_<?=$tevza['id']?>">
    <input type="checkbox" name="flipswitch" class="flipswitch-cb_<?=$tevza['id']?>" id="fs_<?=$tevza['id']?>" checked onclick="changeCurrency(<?=$tevza['id']?>);">
    <label class="flipswitch-label_<?=$tevza['id']?>" for="fs_<?=$tevza['id']?>">
        <div class="flipswitch-inner_<?=$tevza['id']?>"></div>
        <div class="flipswitch-switch_<?=$tevza['id']?>"></div>
    </label> 
    <br>
    
	
	</div> </div> 
	 </div>
 </div> </div>


<div style="background-color:#3D65AF; padding:20px; margin-top:15px;"> 		  
       
       <? 
$avt=mysqli_query($conn, "select * from login where id='$tevza[user_id]'");
$avts_id=mysqli_fetch_array($avt);
?>

 
 
<div style="position:relative; margin-top:-10px; height: 30px;">
<span style="clear:both;  position:relative; background-color:#3D65AF; border-radius:5px; color:#FFFFFF; top: 10px;">   <img src="<?=HTTP_HOST?>IMG/phone.png" width="13" style="position:relative; top:-2px; margin-left:3px;"> 
<span style="padding-right:4px; padding-left: 10px;"> <a href="tel:<? echo $tevza['phone'];?>" style="color: #FFFFFF"><? echo $tevza['phone'];?></a>    </span> </span> </div>
 
  
       
       
        </div>
<div style="width:100%; margin-top:15px; padding:20px; display:inline-block; font-size:14px; background-color:#3D65AF; color:#FFFFFF;"> 
<div style="display:inline-block; "> <img src="<?=HTTP_HOST?>IMG/<? if(favorited($tevza['id'])) echo 'heart-back'; else echo 'heart'; ?>.png"  class="ketchup tooltip" onclick="addtofav(this, <?=$tevza['id']?>)" style="width:15px;opacity:1; position:relative; top:3px;" title="<? if(favorited($tevza['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>"> 
</div> <kl style="display:inline-block; padding-left:10px;"> პროფილის შენახვა </kl> </div> 


<div style="position:relative; margin-top:15px; background-color:#3D65AF;  padding:20px;">
	  <style>
.white-color {
color:white;
}
.green-color {
color:#7B8836;
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
<?php if ($_SESSION['USER_ID']!=0) {?>
<a  onclick="$('#contactForm').show();"> <i class="fa fa-comment white-color"></i><span style="padding-left:10px; color:#FFFFFF; "> წერილის მიწერა </span> </a>
<? } else {?>



 <div> 

<!-- Trigger/Open The Modal -->

<style> /* The Modal (background) */


.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  margin:0 auto;
  padding-top:150px;
  width: 500px; /* Full width */
  height: auto; /* Full height */
  overflow: auto;
  z-index:10100;
 /* Enable scroll if needed */ 
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 0 auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #4267b2; 
  float: right;
  font-size: 30px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  background-color:#E4E2E2;
  text-decoration: none;
  cursor: pointer;
} </style>
 
<a href="#" id="myBtn_<? echo $statement_id['id'];?>" style="color:white;"><i class="fa fa-comment white-color"></i> &nbsp;&nbsp; წერილის მიწერა</a>  </div> 

<!-- The Modal -->
<span id="myModal_<? echo $statement_id['id'];?>" class="modal">

  <!-- Modal content -->
  <span class="modal-content">
    <span class="close" id="close_<? echo $statement_id['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    
    <p>თქვენ არ ხართ ავტორიზებული. წერილის მისაწერად საჭიროა ავტორიზაცია.<br><br> გთხოვთ, გაიაროთ ავტორიზაცია.<br><br>
    
 
    <span style="background-color:#4267b2; width:160px; margin:0 auto; padding-top:10px; padding-bottom:10px; color:#FFFFFF;" align="center">
   <?PHP

$uname = "";
$pword = "";
$errorMessage = "";	
 function is_favorited($id)
	{
		$fav_array = unserialize($_COOKIE['fav']);
		foreach($fav_array as $f=>$v)
		{
			if ($f==$id)
				return true;
		}
		return false;
	}
 if($_SESSION['USER_ID'])
	 echo  "<script>document.location='index.php?do=page1'</script>"; 
 if (isset($_POST['Submit1']))
 {
	$sql = "SELECT * FROM login where username='$_POST[username]' AND `password`='".md5($_POST['password'])."'";
	$res = mysqli_query($conn,$sql);
	$user = mysqli_fetch_assoc($res);
	if($user['id'])
	{
		$_SESSION['USER_ID'] = $user['id'];	
		$fav_array = unserialize($_COOKIE['fav']);
		$favorite="select * from favorites WHERE user_id='$_SESSION[id]'";
		$res=mysqli_query($conn, $favorite);
		while ($fav=mysqli_fetch_assoc($res))
			
			{
				if (!is_favorited($fav['item_id']))
				{
					$fav_array[$fav['item_id']]=$fav['item_id'];
					setcookie('fav', serialize($fav_array), time()+99999999);
				}					
				
			}
		
		echo  "<script>document.location='index.php?do=page1'</script>"; 
	}
	else
	{
		$errorMessage = "username FAILED";
	}
 }
 
 
 ?>
 
 
 <FORM NAME ="form1" METHOD ="POST" ACTION ="#">

Username: <INPUT TYPE = 'TEXT' required Name ='username'  value="<?PHP print $uname;?>" maxlength="20" style="width:250px; border:1px solid #8B8B8B;"> <br><br>
Password: <INPUT TYPE = 'password' required Name ='password' id="myInput" value="<?PHP print $pword;?>" maxlength="16" style="width:250px; border:1px solid #8B8B8B; position:relative; left:3px;">
<span style="position:relative; padding-left:15px;"> <input type="checkbox" onclick="myFunction()">   </span>
<script type="text/javascript"> function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} </script>
 <br> <br>
 <span style="position:relative; left:10px;">
<INPUT TYPE = "Submit" Name="Submit1"  VALUE="ავტორიზაცია" style="width:250px; border:1px solid #8B8B8B; position:relative; left:61px; top:">
 

</FORM> </span>
<br><br>
 

</span></span> 
 
<? } ?>






<script> // Get the modal
var modal_<? echo $statement_id['id'];?> = document.getElementById("myModal_<? echo $statement_id['id'];?>");
// Get the button that opens the modal
var btn_<? echo $statement_id['id'];?> = document.getElementById("myBtn_<? echo $statement_id['id'];?>");
// Get the <span> element that closes the modal
var span_<? echo $statement_id['id'];?> = document.getElementById("close_<? echo $statement_id['id'];?>");
// When the user clicks on the button, open the modal
btn_<? echo $statement_id['id'];?>.onclick = function() {
  modal_<? echo $statement_id['id'];?>.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span_<? echo $statement_id['id'];?>.onclick = function() {
  modal_<? echo $statement_id['id'];?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_<? echo $statement_id['id'];?>) {
    modal_<? echo $statement_id['id'];?>.style.display = "none";
  }
}
 </script> 


<!-- POP UP -->



<aside id="contactForm" style="display:none">
    
      	<Form Method = "Post" action="">
<textarea  name="message" id="message"  rows="5" style="width:99%;" >&nbsp;</textarea>
<input type="submit" name="send-message" value="გაუგზავნე"><input type="button"  onclick="$('#contactForm').hide();" value="დახურვა">
</Form>
   
</aside>



 
 






</div>

<div style="position:relative; width:100%;">
<link rel="stylesheet" type="text/css" href="<?=HTTP_HOST?>calcstyle.css" />

 
 
      </div>

 



<?php /*?>     <script src="<?=HTTP_HOST?>FANCY-GALLERY/min.js"></script><?php */?>

<link rel="stylesheet" href="<?=HTTP_HOST?>FANCY-GALLERY/fancybox.min.css" />
<script src="<?=HTTP_HOST?>FANCY-GALLERY/fancybox.min.js"></script>

 
</div> 
 

</div></div>
</div>


<script> var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
} </script>
	
	
	
	