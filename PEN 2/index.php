<?
include ('config.php');
include ('functions.php');
//$id = isset($_GET['id']) ? $_GET['id'] : 0;




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
        'ფ' => 'f',
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
                    return $m[1] . strtolower($m[2]);
                },
				
                $text)
				
        	);
    	}

function url($title, $category, $id=0, $return=false)
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
				case "m" : 
				{
					$_GET['do']="content";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
					case "coub" : 
				{
					$_GET['do']="coub";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "search" : 
				{
					$_GET['do']="search";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
						case "news" : 
				{
					$_GET['do']="news";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
					case "events" : 
				{
					$_GET['do']="events";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "past" : 
				{
					$_GET['do']="past";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "structure" : 
				{
					$_GET['do']="structure";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
					case "mission" : 
				{
					$_GET['do']="mission";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "membership" : 
				{
					$_GET['do']="membership";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "assembly" : 
				{
					$_GET['do']="assembly";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
						case "council" : 
				{
					$_GET['do']="council";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
						case "prize" : 
				{
					$_GET['do']="prize";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "blogs" : 
				{
					$_GET['do']="blogs";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				case "statements" : 
				{
					$_GET['do']="statements";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "writers_politics" : 
				{
					$_GET['do']="writers_politics";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
					
					
					
							case "penvironment" : 
				{
					$_GET['do']="penvironment";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
					case "hatespeech" : 
				{
					$_GET['do']="hatespeech";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				case "partners" : 
				{
					$_GET['do']="partners";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
					case "contact" : 
				{
					$_GET['do']="contact";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
						case "video" : 
				{
					$_GET['do']="video";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
			}
		}
	}

ParseURL();  
if(isset($_GET['id']))
	$id = intval($_GET['id']);
else
	$id = 0;

?> <!DOCTYPE html>
<html lang="en"><head>
	 
	<?php
$title = 'PEN Georgia';
$shareImage = '';


if (isset($_GET['do']) && $_GET['do']=='full' && isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
	if($b){
		$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
		$avtori=mysqli_fetch_array($aa);
		
		$title = '';
		$shareImage = 'https://pencenter.ge/'.$b['upload'];
	
		//if($avtori){
//			$title = $avtori['avtori'].' | ';
//		}
		
		$title .= $b["satauri_$_SESSION[LANG]"];
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

?> <!doctype html>
 
     
       <meta property="og:title" content="<?=$title?>" />
<meta property="og:description" content="<?=$shareagwera?>" />
 <meta property="og:image" content="<?=$shareImage ?>" />
 <meta property='og:url' content='<?=currentPageURL() ?>'/>
	       <link rel="Shortcut Icon" type="image/logo" href="<?=HTTP_HOST?>IMG/favicon.png" /> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta name="keywords" content="საქართველოს პენცენტრი">
<meta property="og:url" content="<?=HTTP_HOST?><? echo $b['id'];?>" />
<meta property="og:image" content="images/<? echo HTTP_HOST.$b['upload'];?>'" /><!DOCTYPE html>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title><?=$LANG['pengeo']?></title>

 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!-- CSS here -->
	
<link rel='stylesheet' type='text/css' charset='UTF-8' href='<?=HTTP_HOST?>logo.css'> 
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/ticker-style.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/flaticon.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/slicknav.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/animate.min.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/magnific-popup.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/themify-icons.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/slick.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/nice-select.css">
            <link rel="stylesheet" href="<?=HTTP_HOST?>assets/css/style.css">
 <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e165d36edf3400012a4c0b3&product=inline-share-buttons&cms=sop' async='async'></script>
 <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e165d36edf3400012a4c0b3&product=inline-share-buttons&cms=sop' async='async'></script>
</head>

   <body>
       
    

    <header><style>  
		
@font-face { font-family: SmallMemory; src: url('<?=HTTP_HOST?>FONTS/bpg_boxo-boxo.ttf');  }  a, span, li { font-family:SmallMemory, sans-serif;  }  
		
	
 
		
		</style>
		
		
		
        <!-- Header Start -->
		<style>
	 
.header {
  background: #fff;
  color: #000; 
	  
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;  box-shadow: 0px 0px 36px 0px rgb(0 0 0 / 10%);
   
    right: 0%;
  
    width: 100%;  
    z-index:99;
     
    max-width: 100%;
 
    min-width: 100%;  
 
}

.sticky + .content {
  padding-top: 102px;
}
</style>
       <div class="header-area" > 
            <div class="main-header ">
                <div class="header-top black-bg d-none d-md-block">
                   <div class="container">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li> <span> <?=$LANG['penfor']?> </span></li>
                                        
                                    </ul>
                                </div>
								
                                <div class="header-info-right">
                                    <ul class="header-social">  <style>
											.reverse
											{
												
											}
											.reverse:hover
											{
									opacity: 0.7;
											}
										</style>  
										<?
				$query_str='';
				$query_arr = explode('&',$_SERVER['QUERY_STRING']);
				foreach($query_arr as $q)
				{
					$arr = explode('=',$q);
					if($arr[0] != 'lang')
						$query_str.=$arr[0]."=".$arr[1]."&";
				}
				if(empty($query_str))
					$query_str."?";
				else
					$query_str = "?".$query_str;

				if ($_SESSION['LANG']=='ka')
				{ ?> 
										
					<li> <a href="?lang=en"> <img src="<?=HTTP_HOST?>img/uk-flag.png" width="20px" class="reverse"></a></li>  
				<? }
				else
				{
				?>
				
						<li><a href="?lang=ka"> <img src="<?=HTTP_HOST?>IMG/geoflag.png" width="20px" class="reverse"></a>  </li>
				<? } ?>           
                                        <li><a href="https://www.facebook.com/pencenter.ge/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCfTl8SzOxNxADB7JWEpR2ug" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                     </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
				
                <div class="header-mid d-none d-md-block">
					
					 
					
					 
						
                   <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo" style=" padding-top: 15px; padding-bottom: 12px">
									
								<? if ($_SESSION['LANG']=='ka')
				{ ?> 
									<div style="height: 70px;"> 
                <a href="<?=HTTP_HOST?>"><img src="<?=HTTP_HOST?>LOGO-pen.png" width="100px;" style="position: relative; top: 6px;" alt="logo" ></a>
										</div>
               
				<?} else { ?>
								<div style="height: 70px;"> 
				<a href="<?=HTTP_HOST?>"><img src="<?=HTTP_HOST?>img/LOGO-pen.png" width="140px;" style="position: relative; top: -6px; left: -15px;" alt="logo"></a>
									</div>
					<? } ?>									
                                    
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
									
									<?
	$sql = mysqli_query($conn, "select * FROM banner WHERE kategory='banner' ORDER BY kategory ASC LIMIT 1");
	while($banner = mysqli_fetch_assoc($sql)) 
	{
	
	if(!empty($banner['upload'])) {  ?>
	
	<a href="https://<?=$banner['linki']?>" target="_blank"> <img src="<? echo $banner['upload'];  ?>" width="100%" height="100px" style="padding: 10px; border-radius: 17px;"></a> 
	
	
	
 <?	  }}
	 
	?>
								 
									
									
									
                                </div>

                            </div>
                        </div>
                   </div>
                </div>
               <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex header" id="myHeader">
                                <!-- sticky -->
                                    <div class="sticky-logo" style="height: 62px;">
                                        <? if ($_SESSION['LANG']=='ka')
				{ ?> 
                <a href="<?=HTTP_HOST?>"><img src="<?=HTTP_HOST?>LOGO-pen.png" width="100px;" alt=""></a>
                </a>
				<?} else { ?>
				<a href="<?=HTTP_HOST?>"><img src="<?=HTTP_HOST?>img/LOGO-pen.png" width="100px;" alt=""></a>
					<? } ?>		
								
							
								<span style=" float: right; margin-right: 50px; margin-top: 25px;"> 
										<?				

				if ($_SESSION['LANG']=='ka')
				{ ?> 
					<a href="?lang=en"> <img src="<?=HTTP_HOST?>img/uk-flag.png" width="30px" ></a>
				<? }
				else
				{
				?>
				
					<a href="?lang=ka"> <img src="<?=HTTP_HOST?>IMG/geoflag.png" width="30px" ></a>  
				<? } ?>           </span>
                                        
                                    </div>
                                <!-- Main-menu --> 
							<div class="container" style="position: relative; left: -20px; ">  <? include ('header.php'); ?> </div>                
                                         
                                  
                                </div>
								
								
                            </div>   
                            <div class="col-xl-2 col-lg-2 col-md-4">
								<style>
									form 
		{
			background-color:none;
	border:0px solid #000000;   
			
		}
		
		
		form:hover

{
	background-color:none;
	border:0px solid #000000;
}
								</style>
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="<?=url('ძიება','search')?>" method="post" style="border:0px; background: transparent">
                                         <span>  <input type="text" name="text" class="search" style="width: 330px;" placeholder="<?=$LANG['search']?>"></span>  
                                         
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12" >
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <main>
    <!-- Trending Area Start -->
    
		
		
		<? 
if ($_REQUEST['do']) include ($_REQUEST['do'].'.php'); else include ('home.php');	
?>  

    
   <footer>
       <!-- Footer Start-->
       <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                 
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <span style="color: #F0F0F0"> <?=$LANG['description']?></span>
</p>
                                    </div>
                                </div>
                                <!-- social -->
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        
                    </div>
                     
                </div>
            </div>
        </div>
       <!-- footer-bottom aera -->
       <div class="footer-bottom-area">
           <div class="container">
               <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                             <span><p> &copy; <?php echo date('Y'); ?> pencenter.ge  </p></span> 
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                               <span><p> <i class="fa fa-envelope" aria-hidden="true"></i>
 info@pencenter.ge</p></span> 
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
       <!-- Footer End-->
   </footer>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="<?=HTTP_HOST?>./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="<?=HTTP_HOST?>./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/popper.min.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="<?=HTTP_HOST?>./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="<?=HTTP_HOST?>./assets/js/owl.carousel.min.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="<?=HTTP_HOST?>./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="<?=HTTP_HOST?>./assets/js/wow.min.js"></script>
		<script src="<?=HTTP_HOST?>./assets/js/animated.headline.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="<?=HTTP_HOST?>./assets/js/jquery.ticker.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="<?=HTTP_HOST?>./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="<?=HTTP_HOST?>./assets/js/contact.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/jquery.form.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/jquery.validate.min.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/mail-script.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="<?=HTTP_HOST?>./assets/js/plugins.js"></script>
        <script src="<?=HTTP_HOST?>./assets/js/main.js"></script>
        <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

    </body>
</html>