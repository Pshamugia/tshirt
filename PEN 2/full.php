<?
error_reporting(0);
if(empty(trim($b["satauri_$_SESSION[LANG]"])))
{
	echo "<script>document.location.replace('".HTTP_HOST."')</script>";
	exit;
}
$id = (int) $_GET['id'];

// view count IP ის მიხედვით
 
 
	 mysqli_query($conn, 'UPDATE `kultura_cxrili` t SET t.`view_count` = t.`view_count` + 1 WHERE t.`id`='.$id);


 $abga=mysqli_query($conn, "select * from kultura_cxrili where id='$_GET[id]'");
$tevza=mysqli_fetch_array($abga);

$aa=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
	$avtori=mysqli_fetch_array($aa);




?>
<style>
 
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
    }
	
	@media only screen and (max-device-width: 480px) {
       .ziritadi{
            max-width:330px;
			align:left;
        }

        div#header {
            background-image: url(media-queries-phone.jpg);
            height: 93px;
            position: relative;
        }

        div#header h1 {
            font-size: 140%;
        }

        #content {
            float: none;
            width: 100%;
        }

        #navigation {
            float:none;
            width: auto;
        }
    }
	
  

 
	 </style>
<meta name="title" content="<?php echo $tevza["satauri_$_SESSION[LANG]"];?>" />
<link rel="image_src" href="<?=HTTP_HOST?><? echo $tevza['upload']; ?>" />
  <meta name="description" content="<? echo strip_tags($tevza["agwera_$_SESSION[LANG]"]);?>"> 
 
 

<style> @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
    }
	
	@media only screen and (max-device-width: 480px) {
       .ziritadi{
            max-width:330px;
			align:left;
        }

        div#header {
            background-image: url(media-queries-phone.jpg);
            height: 93px;
            position: relative;
        }

        div#header h1 {
            font-size: 140%;
        }

        #content {
            float: none;
            width: 100%;
        }

        #navigation {
            float:none;
            width: auto;
        }
    }
	
 
		#im007 {
   transition: all .2s ease-in-out;
}

.cover007 {
	height: 400px;
  width: 100%;
  object-fit: cover;

}
.cover007:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;
	cursor: pointer;

}


 
	 </style>
     
     
     
     

 <div class="container">
 <div class="row">
 
 <div class="col-md-8" style="position:relative"> 
 
 

 <div style="position:relative; margin-top:45px;">
<span style="padding: 10px; border-radius: 5px; background-color: #000000; color: #FFFFFF"><? $res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
 $title = mysqli_fetch_assoc($res);	
								   echo $title["title_$_SESSION[LANG]"]; ?></span> 
 <h4 align="left" style="margin-left:0px; padding-bottom:10px; font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf);">   <div style="line-height:26px; position: relative; margin-top: 25px; "> <span style="font-size:28px;">  <font style="line-height: 38px;">  <?php echo $tevza["satauri_$_SESSION[LANG]"];?></font> </span> </div>   </h4>
   

          <img src="<?=HTTP_HOST?><? echo $tevza['upload'];  ?>" onclick="onClick(this)" class="cover007" id="im007" style="border-radius: 5px;">
 
      
        <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom" style="background-color: transparent">
    <img id="img01">
  </div>
			<? if(!empty($tevza['img_description'])) { ?>
			<div align="left" class="w3-modal-content w3-animate-zoom" style="width: 300px; position: relative; top: -25px;">
				<span style="position: relative; padding: 10px 10px 10px 10px;">  <? echo $tevza['img_description']; ?> </span></div> <? } ?>
</div>
<script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>
		
		
		
		
	
	 
     
        
       
  
 </div>

 

<div style="width:auto; font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf);" >
   

 <div style="font-size:14px; font-weight:100; position:relative;  margin-top:34px; right:0;" >
<i class="fa fa-user" aria-hidden="true" style="color: #434343"></i>
  <style>
 
	 </style>
<?php
$var = 0;

// Evaluates to true because $var is empty
if (empty($avtori)) {
    echo '';
}
?>

	  


<style>
.tooltip1 {
  position: relative;
  display: inline-block; 
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: 230px;
  background-color: #434343;
  color: #FFFFFF; 
  text-align: center;border-radius: 5px;
 
  padding: 15px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
 
  margin-left: -70px;
  opacity: 0;
  font-size:12px;
  transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -50px;
  border-width: 5px;
  border-style: solid;
  border-color: #434343 transparent transparent transparent;
 
}

.tooltip1:hover .tooltiptext1 {
  visibility: visible;
  opacity: 1;
}
</style>

<?	$avt=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?>
	 <span class="tooltip1"> <span class="tooltiptext1"> ავტორის გვერდი </span> <a href="index.php?do=fullavtor&id=<? echo $avts_id['id']; ?>" class="linku"> <?  $avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
 											$avts_id=mysqli_fetch_array($avt); ?> 
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
							?> </a>   </span>
	
	 
 



   

 
 
 


  <span style="position: relative; left: 15px;"> 
               <i class="fa fa-calendar" aria-hidden="true" style="color: #434343; font-size: 12px; "></i>

					
				  <a style="font-size:14px; position:relative; top: 1px; " >	
					  
					  <? echo date("Y-m-d", $tevza['news_date']); ?> 					
					   </a> 

                    <span style="position: relative; left: 15px; top: 1px;">    <a style="font-size:14px; position:relative;"> <i class="fas fa-eye" style="color: #434343"></i> <rame style="position:relative; top:-1px;">  <?php


echo $tevza['view_count']+'13';

?> </rame> </a> </span> </span> 
	  
	  
	  <div style="clear: both; position: relative; top: 25px; left: -15px; z-index: 0 " > <!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons"></div>
<!-- ShareThis END --></div>

  </div> 

 



<div style="position:relative;  width:127px; right:-9px;  top:8px; z-index:101;" align="right">
 
<!-- AddToAny END -->

<? // END FACEBOOK SHARE BUTTON      ?>   </div>

</div>





<div  style="position:relative; top:40px; padding-bottom: 50px;" >
  
 
<style> 
@font-face { font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('FONTS/bpg_algeti_compact.ttf'); }   j { font-family:bpg_algeti_compact, sans-serif; }    </style>
 

<span style="font-size:16px; line-height:25px; font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf); color:#000000">
 
 
 
 <style> 
 
  
 
 
blockquote { 
  width:auto;

    font-size:16px; 
	border-left:4px solid #555;
  text-align:left; 
  line-height: 25px;
  padding: 0.5em 25px; 
  margin: 1.5em 0px;
  
  
}

blockquote:before {  
font-family: 'Anton', sans-serif;
    content: open-quote;  
    font-size: 24pt;  
    text-align: center;  
    line-height: 42px;  
    color: #fff;  
    background: #ddd;  
    float: left;  
    position: relative;  
    border-radius: 25px;  
   margin-right: 0.5em;
   margin-left:-10px;
  vertical-align: -0.4em;
  
    /** define it as a block element **/  
    display: block;  
    height: 25px;  
    width: 25px;  
}  
blockquote:after {  
font-family: 'Anton', sans-serif;
    content: close-quote;  
    font-size: 24pt;  
    text-align: center;  
    line-height: 42px;  
    color: #fff;  
    background: #ddd;  
    float: right;  
    position: relative;  
    border-radius: 25px;
	top:-20px;  
	left:1em;
    margin-right: 0.5em;
    vertical-align: -0.5em;
  
    /** define it as a block element **/  
    display: block;  
    height: 25px;  
    width: 25px;  
}  

blockquote:hover

{
	
  background-color: #EBEBEB; 
border-left:4px solid #000000;	
 
}


blockquote:hover:after, blockquote:hover:before {  
font-family: 'Anton', sans-serif;
    background-color: #555; 
    transition: all 350ms;  
    -o-transition: all 350ms;  
    -moz-transition: all 350ms;  
    -webkit-transition: all 350ms; 
}  


form 

{
	
	background-color:#e9e9e9;
	border:1px solid #B9B9B9;
	border-radius:3px;
	padding:10px;
}

form:hover

{
	
	background-color:#FDFDFD;
	border:1px solid #000000;
	border-radius:3px;
	padding:10px; 
}
 



 </style>
 
 
 
 

	
	
<? echo $tevza["full_$_SESSION[LANG]"];
	
	$rame=$tevza["agwera_ka"];
 
 	
	?>
	
 	
<span style="color: white"> 
	
<figure data-oembed-url="<?php echo strstr($rame, '<figure'); ?>"> </figure>	 	
	</span>
	</span>
 	 </span>
 
	<style> #tags, #tags ul{
 list-style-type:none;
list-style-position:outside;
width:auto;
height:25px;
margin:0;
font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);
}

#tags a{
display:block;
color:#5F5F5F;
background-color:#DBDBDB;
text-decoration:none;
width:auto;
height:25px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#tags a:hover{
background:#e9ebee;
color:#000000;
width:auto;
height:25px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

 
}

#tags li{
float:left;
position:relative;

}

#tags ul {
position:absolute;
display:none;



}

#tags li ul a{
 
float:left;



}

#tags ul ul{
 


}	

#tags li ul ul {
left:12em;
 

}

#tags li:hover ul ul, #tags li:hover ul ul ul, #tags li:hover ul ul ul ul{
display:none; 

}
#tags li:hover ul, #tags li li:hover ul, #tags li li li:hover ul, #tags li li li li:hover ul{
display:block;

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
} </style>

           <? 
	if ($_SESSION['LANG']=='ka')
  $tags_geo = explode(',', $b['tags_geo']);
   foreach ($tags_geo as $tag)
  { 
	  if (!empty($tag))
	  {
	  ?>
      <div id="tags" style="float:right; padding-top: 0px; padding-right: 7px; ">
	 <a href="<?=HTTP_HOST?>index.php?do=search&tag=<? echo $tag; ?>" style="padding-left:5px; padding-right:5px; padding-top:3px; position:relative; font-size:14px; " >  <? echo $tag; ?> </a>
	 
      </div> 
     
      <? 
	 
  } }
  

  
  ?>
						
						
				 <? 
	if ($_SESSION['LANG']=='en')
  $tags_eng = explode(',', $b['tags_eng']);
   foreach ($tags_eng as $tag)
  { 
	  if (!empty($tag))
	  {
	  ?>
  <div id="tags" style="float:right; padding-top: 0px; padding-right: 7px;  ">
	 <a href="<?=HTTP_HOST?>index.php?do=search&tag=<? echo $tag; ?>" style="padding-left:5px; padding-right:5px; padding-top:3px; position:relative; font-size:14px; " >  <? echo $tag; ?> </a>
	 
      </div> 
     
      <? 
	 
  } }
  

  
  ?>		 </div> 
	
	 
	
	<!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons" style="position: relative; margin-top: 70px; margin-bottom: 22px; z-index: 0"></div>
<!-- ShareThis END -->

 </div>
  

            
  
						
	 
 

 




<!--მეორე ბლოკი-->


 
 
 <!--მეორე ბლოკი1111111111111111111111111111111111111111-->
 
<div class="col-md-4" style="position:relative; " align="left">  
<?
		
$relatedTopQuery = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE kategory='$tevza[kategory]' AND hidden='0' and id!='$tevza[id]' AND satauri_$_SESSION[LANG]!=''  order by id desc limit 0, 1");
if($relatedTopQuery){
		while ($row = mysqli_fetch_array($relatedTopQuery)) {
 ?>
 <div style="padding-top:44px; " align="left">
 <div style="position:relative; margin-left:-2px; height:50px; background-color:#e9ebee; color: #000000; border-radius: 3px; border-bottom:1px solid rgba(255, 255, 255, 0.3); margin-top:1px; width:100%;" align="left"> 
 <span style="position:relative; font-size:14px; left: 15px;  font-weight:100; top:15px;  ">  <i class="fas fa-share-square"></i> <?=$LANG['related']?></span> </a> </b> </div> </div>
   
 <? }} ?>
      <div style="color:#000000; position:relative;   padding-top:25px;">

       
  <style>
		#im5 {
  height: 50px;
  transition: all .2s ease-in-out;
}

.cover5 {
  width: 80px;
  object-fit: cover;

}
.cover5:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


	</style>
    
    <style>
		#im5 {
  height: 50px;
  transition: all .2s ease-in-out;
}

.cover5 {
  width: 80px;
  object-fit: cover;

}
.cover5:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


	</style>
    
     <style>
 
#indexs, #indexs ul{
 list-style-type:none; 
 	width: 100%;
height:55px;
 
	margin-bottom: 15px;

	border-bottom: #ECECEC 1px solid;
}

#indexs a{
display:block;
	width: 100%;
color:#000000;
text-decoration:none;
font-size:14px;
 

height:55px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#indexs a:hover{
background:#e9ebee;
color:#4F4D4D;
height:55px;
 
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

 
}

#indexs li{
float:left;
position:relative;
font-size:14px;

}

#indexs ul {
position:absolute;
display:none;
 
font-size:14px;


}

#indexs li ul a{
 
float:left;
font-size:14px;


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

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
}

</style>
  <?
		
$relatedTopQuery = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE kategory='$tevza[kategory]' and id!='$tevza[id]' AND hidden='0' AND satauri_$_SESSION[LANG]!=''  order by id desc limit 0, 5");
if($relatedTopQuery){
		while ($row = mysqli_fetch_array($relatedTopQuery)) {
 ?>
		      	<!--სტრინგის შემცირება სიესესში-->
		<style>
.flex-parent {
  display: flex;
}

.short-and-fixed {
   
}

.long-and-truncated {
 
  flex: 1;
  min-width: 0;/* Important for long words! */
}

.long-and-truncated span {
  display: inline;
  -webkit-line-clamp: 2;
  text-overflow: ellipsis;
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  word-wrap: break-word;/* Important for long words! */
}
	</style>
<ul id="indexs"> <div align="left" style="position:relative; ">  
 <li id="indexs" style="position:relative; width:100%;" class="ellipsis">
 
<a href="index.php?do=full&id=<? echo $row['id'];?>"><img src="<?=HTTP_HOST?><? echo $row['upload'];?>" alt="" id="im5" class="cover5" style="position:relative; padding-right:10px;  padding-bottom:0px; border-radius: 3px" align="left"  />  
<span style="position:relative; top:-2px; font-size:14px; "> 
 <!--სტრინგის შემცირება სიესესში-->
	<div class="flex-parent">
  <div class="flex-child short-and-fixed">
  </div>
  <div class="flex-child long-and-truncated">
    <span>   
<? if($_SESSION['LANG']=='ka')
 { 
$avt=mysqli_query($conn, "select * from  avtorebi where id='$row[avtori]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori']; 
 }
							else
							{
$avt=mysqli_query($conn, "select * from  avtori_new where id='$row[avtori2]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori2']; 	
							}
							?> - <?php echo $row["satauri_$_SESSION[LANG]"];?>   
  
     
	 </span>
  </div>
  <div class="flex-child short-and-fixed">
  </div>
</div>
 <? 
 			
			/*$string = $row["satauri"];    
  
    if (strlen($string) > 3)
       $new_string = mb_substr($string, 0, 50, 'UTF-8') . '';
    echo($new_string . "\n");*/
	
	  ?>  </span> </a>     </div>  </li></ul>
   
    
     


   <?  }}  ?>  </div>
	 
	 
	 
	 
	   
 


	  

   

<div style="position: relative;  ">
	
	<div style="position:relative; margin-left:-2px;   height:50px; background-color:#e9ebee; border-radius: 3px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3); margin-top:25px; width:100%;"> <span style="position: relative; font-size: 14px;  font-weight: 100; left: 15px; top: 15px;"> <i class="fa-solid fa-handshake"></i>  <?=$LANG['partners']?> </span> </a> </b> </div>
	<style>
	.banner
		{
			border: 1px solid #e9ebee; 
			padding: 5px;
			border-radius: 2px;
		}
		.banner:hover
		{
		 
opacity: 0.8;
			transition: all .7s ease;
-webkit-transition: all .7s ease;
		border: 1px solid #000000;
			padding: 5px;
			border-radius: 2px;
			
		}
	</style>
	<?
	$sql = mysqli_query($conn, "select * FROM banner WHERE kategory='banner1' OR kategory='banner2' OR kategory='banner3' OR kategory='banner4' OR kategory='banner5' ORDER BY kategory DESC");
	while($banner = mysqli_fetch_assoc($sql)) 
	{
	
	if(!empty($banner['upload'])) {  ?>
	
	<div style="padding-top: 25px;"> 
	<a href="https://<?=$banner['linki']?>" target="_blank"> <img src="<?=HTTP_HOST?><? echo $banner['upload'];  ?>"  class="banner" width="100%" ></a> 
	</div>
	
	
 <?	  }}
	 
	?>
	
	
	
	
	
	
</div>

   <!--banner place-->
   
   
 
 

 
 

        

</div>

</div>
 

  
  </div>  




</div> </div> </div> </div> 

