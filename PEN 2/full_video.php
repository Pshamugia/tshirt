<?
error_reporting(0);

$id = (int) $_GET['id'];

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
	mysqli_query($conn, 'UPDATE `kultura_cxrili` t SET t.`view_count` = t.`view_count` + 1, t.`week_view_count` = t.`week_view_count` + 1 WHERE t.`id`='.$id);
}
mysqli_query($conn, "UPDATE kultura_cxrili SET clear_week_view_count='".strtotime('+7 day')."', week_view_count=0 WHERE clear_week_view_count < ".time()."");

 $abga=mysqli_query($conn, 'select * from kultura_cxrili where id='.$_GET['id']);
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
<meta name="title" content="<? echo $tevza['satauri']; ?> " />
<link rel="image_src" href="<? echo $tevza['upload']; ?>" />
  <meta name="description" content="<? echo strip_tags($tevza['agwera']);?>"> 
 
 

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
 
 <div class="col-md-8" style="position:relative; left:15px;"> 
 
 

 <div style="position:relative; margin-top:28px;">
<span style="background-color:#EC383B;  position:relative; padding-left:5px; padding-top:2px; padding-bottom:3px; font-size:14px; color:#FFFFFF; padding-right:5px; border-radius: 3px;"> 
	 <? 
	
	echo $tevza["kategory"]; ?></span> 
 <h4 align="left" style="margin-left:0px; padding-bottom:10px; font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf);">   <div style="line-height:26px; position: relative; margin-top: 15px; margin-bottom: 12px"> <span style="font-size:28px;">  <font style="line-height: 38px;">  <?php echo $tevza["satauri"];?> </font> </span> </div>   </h4>
   

          
 
	
	<span style="color: white"> 
	<? if(!empty($b['full']))
		  { ?>
	 <figure data-oembed-url="<?php echo $b['full']?>"> </figure>	 
	 <? } ?>
	</span>
		
		
		
	
	 
     
        
       
  
 </div>

 

<div style="width:auto; font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf);" >
   


 
 


  <span style="position: relative; left: 15px;"> 
               

	
	  
	  <div style="clear: both; position: relative; left: -15px; " > <!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons"></div>
<!-- ShareThis END --></div>



 

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
 
 

 	 </span>
 
	 

 </div>
  

            
  
						
	 </div>
 

 




<!--მეორე ბლოკი-->


 
 
 <!--მეორე ბლოკი1111111111111111111111111111111111111111-->
 
<div class="col-md-4" style="position:relative; left:10px;" align="left">  
<?
		
$relatedTopQuery = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE kategory='$tevza[kategory]' AND hidden='0' and id!='$tevza[id]'  order by id desc limit 0, 1");
if($relatedTopQuery){
		while ($row = mysqli_fetch_array($relatedTopQuery)) {
 ?>
 <div style="padding-top:44px; " align="left">
 <div style="position:relative; margin-left:-2px; height:50px; background-color:#e9ebee; color: #000000; border-radius: 3px; border-bottom:1px solid rgba(255, 255, 255, 0.3); margin-top:1px; margin-left: 15px;  width:340px;" align="left"> 
 <span style="position:relative; font-size:14px; margin-left:15px; font-weight:100; top:15px; ">  <i class="fas fa-share-square"></i> ამავე რუბრიკაში </span> </a> </b> </div> </div>
   
 <? }} ?>
      <div style="color:#000000; position:relative; left:55px; padding-top:25px;">

       
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
list-style-position:outside;
width:300px;
height:55px;
 
	margin-bottom: 15px;

	border-bottom: #ECECEC 1px solid;
}

#indexs a{
display:block;
	
color:#000000;
text-decoration:none;
font-size:14px;
width:340px;

height:55px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#indexs a:hover{
background:#e9ebee;
color:#4F4D4D;
height:55px;
width:340px;
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
		
$relatedTopQuery = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE kategory='$tevza[kategory]' and id!='$tevza[id]' AND hidden='0'  order by id desc limit 0, 5");
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
<ul id="indexs"> <div align="left" style="position:relative; margin-left:-40px;">  
 <li id="indexs" style="position:relative; width: 340px;" class="ellipsis">
 
<a href="index.php?do=full&id=<? echo $row['id'];?>"><img src="<? echo $row['upload'];?>" alt="" id="im5" class="cover5" style="position:relative; padding-right:10px;  padding-bottom:0px; border-radius: 3px" align="left"  />  
<span style="position:relative; top:-2px; font-size:14px; "><?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$row[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
 <!--სტრინგის შემცირება სიესესში-->
	<div class="flex-parent">
  <div class="flex-child short-and-fixed">
  </div>
  <div class="flex-child long-and-truncated">
    <span> <? echo $avts_id['avtori']; ?> - <? 
echo  $row["satauri"];    
  
     
	  ?></span>
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
	 
	 
	 
	 
	  <div style="padding-top:44px; " align="left">
 <div style="position:relative; margin-left:-2px; height:50px; background-color:#e9ebee; color: #000000; border-radius: 3px; border-bottom:1px solid rgba(255, 255, 255, 0.3); margin-top:1px; margin-left: 15px;  width:340px;" align="left"> 
 <span style="position:relative; font-size:14px; margin-left:15px; font-weight:100; top:15px; "> <i class="fas fa-balance-scale-right"></i> &nbsp; კვირის პოპულარული </span> </a> </b> </div> </div>


 <style>
 
#indexs1, #indexs1 ul{
 list-style-type:none;
list-style-position:outside;
width:335px;
height:55px;
 
	margin-bottom: 15px;

	border-bottom: #e9ebee 1px solid;
}

#indexs1 a{
display:block;
	
color:#000000;
text-decoration:none;
font-size:14px;
width:340px;

height:55px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#indexs1 a:hover{ 
color:#FF1B1B;
height:55px;
width:340px;
transition: color 0.1s, background 0.1s;
	-webkit-transition: color 0.1s, background 0.1s; 

 
}

#indexs1 li{
float:left;
position:relative;
font-size:14px;

}

#indexs ul {
position:absolute;
display:none;
 
font-size:14px;


}

#indexs1 li ul a{
 
float:left;
font-size:14px;


}

#indexs1 ul ul{
 


}	

#indexs1 li ul ul {
left:12em;
 

}

#indexs1 li:hover ul ul, #indexs1 li:hover ul ul ul, #indexs1 li:hover ul ul ul ul{
display:none; 

}
#indexs1 li:hover ul, #indexs li li:hover ul, #indexs1 li li li:hover ul, #indexs1 li li li li:hover ul{
display:block;

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
}

</style>



	 <div style="margin-left: 15px; padding-top: 25px;"> 
		 
	<?
       
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE (kategory!='უწონადობა' AND kategory!='დემოსთენე' AND kategory!='images' AND kategory!='NEWS') AND hidden='0' AND news_date>='".strtotime("-7 days")."' order by week_view_count desc, view_count desc limit 0,5");
while ($b=mysqli_fetch_array($a))
{
	 
	$bra++;
 ?> 
<ul id="indexs1"> <div align="left" style="position:relative;  ">  
 <li id="indexs1" style="position:relative;">
  
<a href="index.php?do=full&id=<? echo $b['id'];?>"> <div style="font-size: 25px; background-color: #e9ebee;  margin-right: 15px; color: #939393; display: inline-block; width: 40px; border-radius: 3px; vertical-align: super; position: absolute" class=" "> <span style="padding-left: 12px; position: relative; top: 3px; left: 2px;"> <? echo $bra; ?> </span> </div>
	
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
<div style="font-size:14px; display: inline-block; width: 280px; margin-left: 50px; "><?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
 <div class="flex-parent">
  <div class="flex-child short-and-fixed">
  </div>
  <div class="flex-child long-and-truncated">
    <span> <? echo $avts_id['avtori']; ?> - <? 
echo  $b["satauri"];    
  
     
	  ?></span>
  </div>
  <div class="flex-child short-and-fixed">
  </div>
</div>
  </div> </a>   </div>  </li></ul>
		 
		 
		 
		 <? } ?>
		 </div>

   

<div style="position: relative; left: 14px;">
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
	$sql = mysqli_query($conn, "select * FROM banner WHERE kategory='banner1' OR kategory='banner2' OR kategory='banner3' ORDER BY kategory ASC");
	while($banner = mysqli_fetch_assoc($sql)) 
	{
	
	if(!empty($banner['upload'])) {  ?>
	
	<div style="padding-top: 25px;"> 
	<a href="https://<?=$banner['linki']?>" target="_blank"> <img src="<? echo $banner['upload'];  ?>"  class="banner" width="340" ></a> 
	</div>
	
	
 <?	  }}
	 
	?>
	
	
	
	
	
	
</div>

   <!--banner place-->
   
   
 
 

 
 

        

</div>

</div>
 

  
  </div>  




</div> </div> </div> </div> 

