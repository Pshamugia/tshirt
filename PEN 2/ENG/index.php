<?
include ('config.php');
include ('functions.php');
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
                    return $m[1] . strtolower($m[2]);
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
		$url=str_replace(",","",$url);
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
				
				
						case "prize" : 
				{
					$_GET['do']="prize";	
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
				
				
					case "blogs" : 
				{
					$_GET['do']="blogs";	
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




?><!DOCTYPE html PUBLIC "vipbina.ge">

<html><head>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e165d36edf3400012a4c0b3&product=inline-share-buttons&cms=sop' async='async'></script>

<?php
$title = 'pencenter.ge';
$shareImage = '';


if (isset($_GET['do']) && $_GET['do']=='full' && isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
	if($b){
		$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
		$avtori=mysqli_fetch_array($aa);
		
		$title = '';
		$shareImage = '../'.$b['upload'];
		
		if($avtori){
			$title = $avtori['avtori'].' | ';
		}
		
		$title .= $b['satauri'];
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

?> 


<meta property="og:title" content="<?=$title?>" />
<meta property="og:description" content="<?=$shareagwera?>" />
 <meta property="og:image" content="<?=$shareImage ?>" />
 <meta property='og:url' content='<?=currentPageURL() ?>'/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta name="keywords" content="PEN Georgia">
<meta property="og:url" content="<?=HTTP_HOST?><? echo $b['id'];?>" />
<meta property="og:image" content="'https://www.pencenter.ge/<? echo $b['upload'];?>'" /><!DOCTYPE html>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>PEN Georgia</title>

    <!-- BOOTSTRAP CORE STYLE  -->
       <link rel="Shortcut Icon" type="image/logo" href="<?=HTTP_HOST?>IMG/favicon.png" /> 
    <link href="<?=HTTP_HOST?>logo.css" rel="stylesheet" type="text/css">

    <link href="<?=HTTP_HOST?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="<?=HTTP_HOST?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- ANIMATE STYLE  -->
    <link href="<?=HTTP_HOST?>assets/css/animate.css" rel="stylesheet" />
    <!-- FLEXSLIDER STYLE  -->
    <link href="<?=HTTP_HOST?>assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?=HTTP_HOST?>assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    <link href="<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf" rel='stylesheet' type='text/css' />
    
</head>
<body>

 <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=HTTP_HOST?>" style="width:100%;">
 <img src="<?=HTTP_HOST?>LOGO-pen.png" width="150" style="position:relative; top:9px; left:14px;" />  
                </a>

            </div>
            <div class="right-div" align="right">  
 
 
  <k style="font-size:12px; color:rgba(170,165,165,1.00); font-weight:100;"> <form action="<?=url('Result','search')?>" method="post" name="zebna" class="search" style="position:relative; background:none; border:none; top:5px;">

      <div class="form__field">
       <style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(<?=HTTP_HOST?>FONTS/bpg_mrgvlovani_caps_2010.ttf); } @font-face { font-family: bpg_mrgvlovani_caps_2010; font-weight: 100; src: url('<?=HTTP_HOST?>FONTS/bpg_mrgvlovani_caps_2010.ttf'); }  k { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style> 
        <style>
		#im1 {
  height: 20px;
  transition: all .2s ease-in-out;
}

.cover1 {
  width: 40px;
  object-fit: cover;
  
  
}
.cover1:hover  { transform: scale(1.3) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
	  }
	

	</style>
    <? if (!empty($b['fullEng']))
 {
 ?>
      <img src="<?=HTTP_HOST?>images/geoflag.png" id="im1" class="cover1" alt="" style="padding-right:10px; cursor:pointer;" onclick="javascript:location.href='../index.php?do=full&id=<?php echo $b['id'];?>';" onMouseOver="arrow" />
      
      <? } 
	  else
	  
	  { ?>
        <img src="<?=HTTP_HOST?>images/geoflag.png" id="im1" class="cover1" alt="" style="padding-right:10px; cursor:pointer;" onclick="javascript:location.href='../';" onMouseOver="arrow" />
      
      <? } ?>
       
       
       
           <input type="search" name="text" required="" placeholder="SEARCH"
 oninvalid="this.setCustomValidity('Enter key word')"
 oninput="setCustomValidity('')" class="form__input" style="position:relative; border:1px solid #C7C7C7; height:22px; top:1px; right:-5px;">
        <input type="submit" value="&#9740;" class="button" style="position:relative; height:22px; top:1px;"> </div></form>
      </div> </k>  </div>
          
        </div>
    </div>
    <!-- LOGO HEADER END-->
    
  


<style>
 
#nav, #nav ul{
 
list-style-type:none;
}

#nav a{
	color:#514B4B;
display:block; 
 height:72px;
font-size:12px;
padding-top:30px;

}

#nav a:hover{ 
  color:#0F0D0D;
font-size:12px;
background-color:#eeeeee;
height:72px;
 
 


 
}

#nav li{
float:left;
 font-size:12px; 
}

#nav ul {
position:absolute;
display:none;
width:242px;

font-size:12px;


}

#nav li ul a{
	
width:242px;
 float:left;
font-size:12px;


}

#nav ul ul{
top:auto;


}	

#nav li ul ul {
left:12em;
 

}

#nav li:hover ul ul, #nav li:hover ul ul ul, #nav li:hover ul ul ul ul{
display:none; 

 
}
#nav li:hover ul, #nav li li:hover ul, #nav li li li:hover ul, #nav li li li li:hover ul{
display:block;
background-color:#f7f7f7;
 -moz-box-shadow: 5px 5px 8px #CECECE;
-webkit-box-shadow: 5px 5px 8px #CECECE;
box-shadow: 5px 5px 8px #CECECE;
 
 


"

}
</style>

    
    
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <ul id="nav"><div>
                            <li>
                  
                            
                            
<k style="font-size:11px;"> 
                            
                            
                        <a href="<?=HTTP_HOST?>" style="font-size:11px; position:relative; "> <span style="position:relative; top:3px;"> Home  </span> </a> </k> </li>
                           
                            
                            
                         
                           
                           
                            <li><a href="#"> <k style="font-size:11px;"> about us</k> </a> 
                            
                            <ul style="z-index:101;">
 	<li> <k>  <a href="<?php echo url('ge','past'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px; ">&nbsp; Past</a> </k></li>
<li> <k>  <a href="<?php echo url('ge','structure'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; Structure</a> </k></li> 

<li> <k>  <a href="<?php echo url('ge','mission'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; Mission</a> </k> </li>

<li> <k>  <a href="<?php echo url('ge','membership'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; Membership</a> </k></li>

<li> <k>  <a href="<?php echo url('ge','assembly'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; Assembly</a> </k></li>

<li> <k>  <a href="<?php echo url('ge','council'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; council</a> </k></li>


 </ul>
 
 </li>
                             <li><a href="<?=url('ge','news')?>" ><k style="font-size:11px;"> News </K> </a></li>
                             <li><a href="<?php echo url('ge','blogs'); ?>"><k style="font-size:11px;"> Blogs </k> </a></li>
                             <li><a href="#"><k style="font-size:10px;"> Projects </k></a>
                                <ul style="z-index:101;">
                                
  <li> <k>  <a href="<?php echo url('ge','writers_politics'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px; ">&nbsp; Writers about <br> &nbsp; politics</a> </k></li>  
                                  
                                <li> <k>  <a href="<?php echo url('ge','hatespeech'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px; ">&nbsp; Writers Against <br> &nbsp; Hate Speech</a> </k></li>
                                
      <li> <k>  <a href="<?php echo url('eng','prize'); ?>" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px; "> <span style="position:relative; top:0px;">&nbsp; Pen prize </span></a> </k></li>
                       
                                
                                
                                
<?php /*?>
<li> <k>  <a href="#" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; სოციალური პოეზიის <br> &nbsp; ფესტივალი "ხმა ქვემოდან"</a> </k></li>
                                
 	<li> <k>  <a href="#" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px;">&nbsp; ციხის მწერლობა</a> </k></li>
<li> <k>  <a href="#" style="border-bottom:1px solid #CECECE; position:relative; left:-40px; font-size:11px; ">&nbsp; მწერლები სკოლაში</a> </k></li><?php */?>

 
 </ul>
                             </li>
                            <li><a href="<?php echo url('ge','events'); ?>"><k style="font-size:11px;"> Events </k> </a></li>
                            <li><a href="<?php echo url('ge','partners'); ?>"><k style="font-size:11px;"> Partners </k> </a></li>
                            <li><a href="<?php echo url('ge','contact'); ?>"><k style="font-size:11px;"> Contact </k></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
     
    
     <? 
if ($_REQUEST['do']) include ($_REQUEST['do'].'.php'); else include ('home.php');	
?> 
    
   
   <div class="footer-sec" style="width:100%; position:relative; bottom:-80px;" >
         <div class="container">
       
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

              
									<h3> <strong> <k style="font-size:18px;">About PEN </k></strong> </h3>
									<p style="padding-right:50px; font-size:14px;" > <j>
									Pen International  was created in 1921 and is one of the first NGO's in the world to defend freedom of expression. PEN Georgia has been operating since 1991.

 
</j>
 									</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 social-div">
               

              
									<h3> <strong> <k style="font-size:18px;">Follow </k></strong> </h3>
                 <a href="https://www.facebook.com/%E1%83%A1%E1%83%90%E1%83%A5%E1%83%90%E1%83%A0%E1%83%97%E1%83%95%E1%83%94%E1%83%9A%E1%83%9D%E1%83%A1-%E1%83%9E%E1%83%94%E1%83%9C-%E1%83%AA%E1%83%94%E1%83%9C%E1%83%A2%E1%83%A0%E1%83%98-145091645521205/" target="_blank"><h4>FACEBOOK </h4></a>
                    
                 <a href="https://www.youtube.com/channel/UCfTl8SzOxNxADB7JWEpR2ug" target="_blank"><h4>YOUTUBE </h4></a>
									
                    
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<h3> <strong> <k style="font-size:18px;">Contact </k></strong> </h3>
                <j>
                
                <h4 style="font-size:14px;">E-mail: info@pencenter.ge</h4>
          
            </div>
       
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <hr />
                <div style="text-align:right;padding:5px; font-size:14px;">
                    &copy; <?php echo date('Y'); ?> pencenter.ge 
                    
                    <link rel="stylesheet" href="<?=HTTP_HOST?>src/calendar/calendar.css">
<script src="<?=HTTP_HOST?>src/calendar/calendar.js"></script>
                </div>
            </div>
    </div>
    </div>
     <!--FOOTER SECTION END-->
      <!-- WE PUT SCRIPTS AT THE END TO LOAD PAGE FASTER-->
     <!--CORE SCRIPTS PLUGIN-->
      <!--BOOTSTRAP SCRIPTS PLUGIN-->
<script src="<?=HTTP_HOST?>assets/js/bootstrap.js"></script>
     <!--WOW SCRIPTS PLUGIN-->
    <script src="<?=HTTP_HOST?>assets/js/wow.js"></script>
     <!--FLEXSLIDER SCRIPTS PLUGIN-->
    <script src="<?=HTTP_HOST?>assets/js/jquery.flexslider.js"></script>
     <!--CUSTOM SCRIPTS -->
    <script src="<?=HTTP_HOST?>assets/js/custom.js"></script>
</body>

</html>
