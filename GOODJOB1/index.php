<?
include ('config.php');
include ('functions.php');

// include ('class/correct_title.php');
//$id = isset($_GET['id']) ? $_GET['id'] : 0;
if(isset($_GET['id']))
	$id = intval($_GET['id']);
else
	$id = 0;
 $a=mysqli_query($conn,"select * from kultura_cxrili where id='$id'");
$b=mysqli_fetch_array($a);
$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
if($aa !== false)
	$avtori=mysqli_fetch_array($aa);



function Geo2Eng($text)
    	{
			$alphabet = array (
        'ა' => 'a',
        'ბ' => 'b',
        'გ' => 'g',
        'დ' => 'd',
        'ე' => 'e',
        'ვ' => 'v',
        'ზ' => 'z',
        'თ' => 't',
        'ი' => 'i',
        'კ' => 'k',
        'ლ' => 'l',
        'მ' => 'm',
        'ნ' => 'n',
        'ო' => 'o',
        'პ' => 'p',
        'ჟ' => 'zh',
        'რ' => 'r',
        'ს' => 's',
        'ტ' => 't',
        'უ' => 'u',
        'ფ' => 'p',
        'ქ' => 'q',
        'ღ' => 'gh',
        'ყ' => 'y',
        'შ' => 'sh',
        'ჩ' => 'ch',
        'ც' => 'ts',
        'ძ' => 'dz',
        'წ' => 'w',
        'ჭ' => 'cw',
        'ხ' => 'kh',
        'ჯ' => 'j',
        'ჰ' => 'h',
    );
        	return str_replace(
            array_keys($alphabet),
            array_values($alphabet),
            preg_replace_callback(
                // make capital from first chars of sentences
                '/(^|[\.\?\!]\s*)([a-z])/s',
                function ($m) {
                    return $m[1] . $m[2];
                },
                $text)
        	);
    	}

function url($title, $category, $id=0)
{
	$title=Geo2Eng($title);
	$url=str_replace(" ","_",strip_tags(trim($title.'/'.$category)));
		$url=str_replace("\"","",$url);
		$url=str_replace("'","",$url);
		$url=str_replace(":","x",$url);
		$url=str_replace("?","",$url);
		$url=str_replace("&quot;","",$url);
		$url=HTTP_HOST.str_replace(" ","_",$url);
		if($id) $url.=$id;
		if($return) return $url;
		else echo $url;
}





function ParseURL()
	{
		global $conn;
		$DO_ID = 0;
		$list=explode("/",$_SERVER['REQUEST_URI']);
		if(strlen($list[count($list)-1])) $urlData=$list[count($list)-1];
		else if(strlen($list[count($list)-2])) $urlData=$list[count($list)-2];
		if(!strlen($urlData))
		{
			$_GET['do']="";
			$DO_ID=0;
		}
		else
		{
			preg_match("/([^\d]+)(\d+)?/",mysqli_real_escape_string($conn, $urlData),$matches);
			$DO_ID=$matches[2];
			switch($matches[1])
			{
				case "b" : 
				{
					$_GET['do']="full";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "l" : 
				{
					$_GET['do']="page1";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "edit" : 
				{
					$_GET['do']="edit";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "terms" : 
				{
					$_GET['do']="terms";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "f" : 
				{
					$_GET['do']="favorites";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
			}
		}
	}

ParseURL();  


?><!DOCTYPE html>
<html lang="en"><head>
  
  <?php
$title = "GOODJOB";
$shareImage = '';

if (isset($_GET['do']) && $_GET['do']=='full' && isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
	if($b){
		$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
		$avtori=mysqli_fetch_array($aa);
		
		$title = '';
		$shareImage = 'https://goodjob.ge/'.$b['upload'];
		
		if($avtori){
			$title = $avtori['avtori'].' | ';
		}
		$res=mysqli_query ($conn, "SELECT * FROM kalaki  WHERE  id='$b[kalaki]'");
 $city = mysqli_fetch_assoc($res); 
 
  $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$b[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani); 


 
		$title .= $b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$city['name'].'-'.$ubani['name']; 
}
	
}

function currentPageURL() {
    $curpageURL = 'http';
    if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') {
        $curpageURL .= 's';
    }
    $curpageURL .= '://';
    $requestUrl = htmlspecialchars(urldecode($_SERVER['REQUEST_URI']));
    if ($_SERVER['SERVER_PORT'] != '80') {
        $curpageURL .= $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $requestUrl;
    } else {
        $curpageURL .= $_SERVER['SERVER_NAME'] . $requestUrl;
    }
    return $curpageURL;
}

 

class Correct
{
	static function correctTitle($title)
    {
		if (strpos($title, 'კერძო') !== false)
  		{
			return $title.' სახლი';
		}
		else
		{
			return $title;
		}  
    }
}

?> 
  
  
	
	<? if ($_REQUEST['do'])  
  {?>
<meta property="og:title" content="<? echo $b['kidva'].' '.$b['otaxi'].' '.'ოთახიანი'; ?> 
<? echo Correct::correctTitle($b['kategory']); ?>

<? echo $city['name'].' '.$ubani['name']; ?>" />  
  
  <? 
  }
  else
  {
  ?>
  
<meta property="og:title" content="უძრავი ქონების საიტი">
								   <? } ?>
	
	
	

	

	
	<? if ($_REQUEST['do'])  
  {?>
  <meta content="<? echo strip_tags($b['agwera']); ?>" name="description">
  
  
  <? 
  }
  else
  {
  ?>
  
    <meta content="უძრავი ქონების ყიდვა-გაყიდვა-ქირაობა" name="description">
  <? } ?>
	
		<? if (!$_REQUEST['do'])  
  {?>
 <meta property="og:image" content="<?=HTTP_HOST?>images/231362089.jpg" />  
	
	<? } else
	
{?>

 <meta property="og:image" content="<?=$shareImage ?>"> 
	
	<? } ?>
	
 <meta property='og:url' content='<?=currentPageURL() ?>'/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta name="keywords" content="ბინები, ოთახები, ქირავდება, იყიდება">
<meta property="og:url" content="<?=url($b['kidva'].' '.$b['otaxi'].' '.'ოთახიანი'.' '.$b['kategory'].' '.$city['name'].' '.$ubani['name'],'b', $b['id'])?>" />

<link rel="Shortcut Icon" type="image/logo" href="<?=HTTP_HOST?>IMG/vip-logo.gif" /> 
<link rel='stylesheet' type='text/css' charset='UTF-8' href='<?=HTTP_HOST?>logo.css'> 
 <link rel="stylesheet" href="<?=HTTP_HOST?>css/slider.css">

 <title><?=$title?></title>  		
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">


<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="<?=HTTP_HOST?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/animate.css">
    
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?=HTTP_HOST?>css/aos.css">

    <link rel="stylesheet" href="<?=HTTP_HOST?>css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/flaticon.css">
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/icomoon.css">
    <link rel="stylesheet" href="<?=HTTP_HOST?>css/style.css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=HTTP_HOST?>style.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="<?=HTTP_HOST?>logo.css" type="text/css" charset="utf-8" />
        <link rel="shortcut icon" href="<?=HTTP_HOST?>fav.gif" type="image/x-icon">	
	<script type="text/javascript" src="<?=HTTP_HOST?>script.js"></script>
	 

 <link rel="stylesheet" href="<?=HTTP_HOST?>style.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="<?=HTTP_HOST?>logo.css" type="text/css" charset="utf-8" />
        <link rel="shortcut icon" href="<?=HTTP_HOST?>fav.gif" type="image/x-icon">	
		   <link rel="stylesheet" href="<?=HTTP_HOST?>POPUP-EMAIL-FORM-FOR-REPORT/bootstrap-theme.min.css" >
        <script src="<?=HTTP_HOST?>POPUP-EMAIL-FORM-FOR-REPORT/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script src="<?=HTTP_HOST?>src/slider.js"></script>  
 	 <script>
 var HTTP_HOST = '<?=HTTP_HOST?>';
 </script>
<script src="<?=HTTP_HOST?>js/functions.js"> </script>


<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eee61c1048927001269a5d3&product=inline-share-buttons&cms=sop' async='async'></script>


  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '548693929020398',
      cookie     : true,
      xfbml      : true,
      version    : 'v5.0'
    });
      
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  
  
<? 
include ('class/pagination.php'); ?>
<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf); } 
@font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>fonts/bpg_algeti_compact.ttf'); }   
span { font-family:bpg_algeti_compact, sans-serif; } 


.ftco-navbar-light { position:absolute; }
   </style>

  	
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar" style="background-color: #8DD791; top: 0px;">
	    <div class="container">
	      <a class="navbar-brand" href="<?=HTTP_HOST?>"><img src="<?=HTTP_HOST?>IMG/logo1.png" width="130px" style="position:relative; top:-4px;"></a> 
			
			<!--FLAGS-->
			
			<div class="dropdown" style="margin-top: -9px;"> <style> .btn-primary.disabled, .btn-primary[disabled], fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover, .btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, 
.btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active, .btn-primary[disabled]:active, 
fieldset[disabled] .btn-primary:active, .btn-primary.disabled.active, 
.btn-primary[disabled].active, fieldset[disabled] .btn-primary.active {
    background-color: #428bca; 
    border: 0;            /* these are light blue colours */
}</style>
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="  border:0">
  <img src="<?=HTTP_HOST?>IMG/flag_geo.png" width="25">
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border-radius: 0; margin-top: -5px; margin-left: 10px;" >  
	<a class="dropdown-item" href="#"><img src="<?=HTTP_HOST?>IMG/flag_geo.png" width="25px"> ქართული </a>
    <a class="dropdown-item" href="#"><img src="<?=HTTP_HOST?>IMG/flag_eng.png" width="25px"> English </a>
    <a class="dropdown-item" href="#"><img src="<?=HTTP_HOST?>IMG/flag_russ.png" width="25px"> Русский </a> 
  </div>
</div>
			
			<!--END FLAGS-->
			
			
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> <a style="color:#000000;">მენიუ </a>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">

<ul class="navbar-nav nav ml-auto" style="background:none; float:right; position:relative; top:-2px;">

<li class="nav-item" style="position:relative; margin-left:8px;"><a href="<?=HTTP_HOST?>" class="nav-link"><span style=" position:relative; left:-10px;"> <ch><i class="fa fa-home" aria-hidden="true"></i>
 მთავარი</ch></span></a></li>

 
              
 <?php
 if($_SESSION['USER_ID'])
	{
 $res = mysqli_query($conn, "SELECT COUNT(*) AS res from messages WHERE sender='$_SESSION[USER_ID]'");
while ($message = mysqli_fetch_assoc($res))
{
	$sent = mysqli_query($conn, "SELECT * from login WHERE id ='$message[sender]'");
	$sender = mysqli_fetch_assoc($sent); 
	
	$rec = mysqli_query($conn, "SELECT * from login WHERE id ='$message[receiver]'");
	$receiver = mysqli_fetch_assoc($rec); 
	
	?> 
<li class="nav-item" style="position:relative; padding-bottom:15px; padding-right:15px; cursor:pointer;" onclick="javascript:location.href='<?=url('letter','l5')?>';">  
<img src="<?=HTTP_HOST?>IMG/comments.png" width="20" style="position:relative; top:7px;" > 

<span style="position:relative; top:2px; left:-16px; padding:3px;"> 
<span id="coment_count" style="background-color:#fe5f55;  font-size:11px; color:#FFFFFF; display: inline-block;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    text-align: center; "> 
<? $cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM messages WHERE receiver='$_SESSION[USER_ID]' AND status=0"));

		echo intval($cnt['cnt']);  
}
	}
  ?> </span></span> </li>

            
              
              
              
           
 


   <?php if($_SESSION['USER_ID']==0) 
   {
   ?>
   
   
  
<li class="nav-item" style="position:relative; margin-left:-4px;"><a href="<?=url('შესვლა','l')?>" class="nav-link"><span style=" "><ch> <i class="fa fa-sign-in" aria-hidden="true"></i>
 შესვლა </ch> </span></a></li> 
   
        
        <?php } ?>
                        
                        
           <?php if($_SESSION['USER_ID']==0) 
   {
   ?>
   
   <li class="nav-item" style="position:relative; margin-left:-4px;"><a href="index.php?do=signup" class="nav-link"><span> <ch><i class="fa fa-user"></i> რეგისტრაცია</ch> </span></a></li> 
 
          <?php } ?>
 
 
 
 
 <?php if($_SESSION['USER_ID']) 
   {
   ?>
   <div class="nav" style="background:none;padding-right:15px; margin-left:-20px;">
   <ul>
            <li class="nav-item" ><a href="#" class="nav-link"> 
           
           
           <?PHP
if (!$_SESSION['USER_ID'])
	header ("Location: login.php");
	$res = mysqli_query($conn,"SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");
	$user = mysqli_fetch_assoc($res);
	if ($_SESSION['USER_ID']==0)
		
		{
			
		echo  "<script>document.location='index.php?do=login'</script>"; 
		}
?>
<span style="position:relative; top:7px; color:#000000;"><img src="<?=HTTP_HOST?>IMG/user_1.png" style="width:13px; left:2px; top:-1px; position:relative; margin-right:5px;"> 
<span style="position:relative; top:2px;"> <ch>  <?php echo $user['username']; ?> </ch></span>
           
          </a>
<ul>
<li><a href="<?=url('statements','l2')?>" style="">ჩემი განცხადებები &nbsp; &nbsp; </j></a></li> 
<li><a href="<?=url('balance','l6')?>" style="">ბალანსის შევსება &nbsp; &nbsp; </j></a></li> 
<li><a href="<?=url('edit','l3')?>" style="">ანგარიშის რედაქტირება &nbsp; &nbsp; </j></a></li>
<li> <a href="<?=HTTP_HOST?>logout.php">Log out </a></li> 
                                    
                                             
                                               
          
         </ul>
           
           </li>
		   </ul>
            </div>
         
            <?php } ?>
            
      
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
      
      
       <? 
if ($_REQUEST['do']) include ($_REQUEST['do'].'.php'); else include ('home.php');	
?>  

 <footer class="ftco-footer ftco-section img" style="background-color:#232F3E;">
    
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2" style="color:#FFFFFF;"><a> Tbili.ge - უძრავი ქონების სააგენტო </a></h2>
              <p style="color:#4267b2;"><a> მიენდე პროფესიონალებს </a></p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/Tbilige-110363204051996/" target="_blank"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
       <?php /*?>   <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2"><a style="color:#FFFFFF;"> სხვა პროექტები </a></h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>carsingeorgia.ge</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>partsingeorgia.ge</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>allmarkets.ge</a></li>
               
              </ul>
            </div>
          </div><?php */?>
       
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a style="color:#FFFFFF;"> საჭირო ინფორმაცია </a></h2>
              <ul class="list-unstyled">
                <li><a href="<?=url('terms','terms')?>"><span class="icon-long-arrow-right mr-2"></span>განცხადების განთავსების წესი</a></li>
                <li><a href="<?=url('terms','terms2')?>"><span class="icon-long-arrow-right mr-2"></span>როგორ დავრეგისტრირდე</a></li>
                 <li><a href="<?=url('terms','terms3')?>"><span class="icon-long-arrow-right mr-2"></span>ფასიანი განცხადების დადება</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
             <h2 class="ftco-heading-2"><a style="color:#FFFFFF;"> კონტაქტი </a></h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><a><span class="icon icon-map-marker"></span><span class="text"> თბილისი, ყაზბეგის ქუჩა #45 </span></a></li>
	                <li style="position:relativee; margin-top:-18px;"><a href="#"><span class="icon icon-phone"></span><span class="text">+995 571 000 557
</span></a></li>
	                <li style="position:relativee; margin-top:-18px;"><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text"> info@tbili.ge  </span></a></li>
              
	              </ul>
                  
                                  <!-- TOP.GE ASYNC COUNTER CODE -->
            <div id="top-ge-counter-container" data-site-id="114235"></div>
            <script async src="//counter.top.ge/counter.js"></script>
            <!-- / END OF TOP.GE COUNTER CODE --> 
	            </div>  
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
           
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    

  <script src="<?=HTTP_HOST?>js/popper.min.js"></script>
  
  <script src="<?=HTTP_HOST?>js/bootstrap.min.js"></script>
	
  <script src="<?=HTTP_HOST?>js/jquery.easing.1.3.js"></script> 
  <script src="<?=HTTP_HOST?>js/jquery.waypoints.min.js"></script>
  <script src="<?=HTTP_HOST?>js/jquery.stellar.min.js"></script>
    <script src="<?=HTTP_HOST?>js/owl.carousel.min.js"></script>
  <script src="<?=HTTP_HOST?>js/jquery.magnific-popup.min.js"></script>

  <script src="<?=HTTP_HOST?>js/aos.js"></script>
  <script src="<?=HTTP_HOST?>js/jquery.animateNumber.min.js"></script>
   <script src="<?=HTTP_HOST?>js/scrollax.min.js"></script>
  <script src="<?=HTTP_HOST?>https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=HTTP_HOST?>js/google-map.js"></script>
      <script src="<?=HTTP_HOST?>js/main.js"></script>
  <script src="<?=HTTP_HOST?>rating/3c-products.js"></script>
 

</body>
</html>