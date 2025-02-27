<?
include ('config.php');
 $a=mysqli_query($conn,'select * from kultura_cxrili where id='.$_GET['id']);
$b=mysqli_fetch_array($a);
$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
	$avtori=mysqli_fetch_array($aa);

?><!DOCTYPE html PUBLIC "vipbina.ge">

<html>
<head>
<?php
$title = 'vipbina.ge';
$shareImage = '';


if (isset($_GET['do']) && $_GET['do']=='full' && isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
	if($b){
		$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
		$avtori=mysqli_fetch_array($aa);
		
		$title = '';
		$shareImage = 'http://vipbina.ge/'.$b['upload'];
		
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
<meta name="keywords" content="ბინები, ოთახები, ქირავდება, იყიდება">
<meta property="og:url" content="index.php?do=full&id=<? echo $b['id'];?>" />
<meta property="og:image" content="../images/<img src='<? echo $b['upload'];?>'" />
<link rel="Shortcut Icon" type="image/logo" href="IMG/3d-building.png" /> 
<link rel='stylesheet' type='text/css' charset='UTF-8' href='logo.css'> 
 
 <title><?=$title?></title>  		
<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="../logo.css" type="text/css" charset="utf-8" />
        <link rel="shortcut icon" href="../fav.gif" type="image/x-icon">	
	<script type="../text/javascript" src="script.js"></script>
	 

 <link rel="stylesheet" href="../style.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="../logo.css" type="text/css" charset="utf-8" />
        <link rel="shortcut icon" href="../fav.gif" type="image/x-icon">	
  </head>
 
  
 

 
<style type="text/css">
<!--
.style12 {color: #006633; }
.style14 {font-size: 12px}
.style15 {font-size: 9px}
.style17 {
	font-size: 12px;
	font-weight: bold;
	color: #FF0000;
}
-->
</style>


<body bgcolor="#FFFFFF">
 <div style="width:100%; height:30px; background-color:#3c4446; z-index:101;"> </div>
 <div align="center" >     
 <table width="1000px" align="center" cellpadding="0" cellspacing="0" style="position:relative; margin-top:-15px;">
 <tr>
 <td valign="top" width="1000px" height="20px"> 
 
 <div style="position:relative; top:-26px; z-index:1;"> <ul id="social"  class="isocial" style="position:relative; left:-40px;">
				<li><a href="#" target="_blank"  class="facebook"></a></li>
               
				<li><a href="index.php?do=contact"  class="rss"></a></li>
                
			 
				 

			</ul> <div style="color:#9ea1a2; position:relative; top:15px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 1); margin-left:-1px; font-size:12px;">   <a style="position:relative; left:-30px; top:-12px;"> <ch> მიენდე პროფესიონალებს </ch></a> </div> </div> </td> <td valign="top"> 
            <a style="position:relative; top:-11px; left:-27px; z-index:100000;">
<iframe src="http://free.timeanddate.com/clock/i63yx18f/n371/tlge59/fc9ea1a2/tct/pct/tt0/tw0/ts1/tb1" frameborder="0" width="176" height="20" allowTransparency="true" style="position:relative; left:-20px;"></iframe> </a>

 </td></tr></table> 
			
			
			
			
			<style> #social li {
list-style:none;
z-index:1;

}

#social ul li{
margin-right:10px;
z-index:1;

}

ul.isocial li a{
	float:left;
	background-image:url(social_letter.png);
	background-position:0 0;
	background:repeat:no-repeat;
	display:inline-block;
	text-indent:-9999px;
	overflow:hidden;
	width:24px;
	height:20px;
	position:relative;
  margin:0 3px;
  
}

ul.isocial li a.rss{background-position:0 0 5}
ul.isocial li a.rss:hover{
	background-position:0 -24px;  
	transition:background-position 0.2s ease; -moz-transition: 0.2s ease; -webkit-transition: 0.2s ease; -o-transition: 0.2s ease;}
ul.isocial li a.facebook{background-position:-25px 0}
ul.isocial li a.facebook:hover{
	background-position:-25px -24.5px; 
 	transition:background-position 0.2s ease; -moz-transition: 0.2s ease; -webkit-transition: 0.2s ease; -o-transition: 0.2s ease;}
ul.isocial li a.twitter{
	background-position:-50px 0}
ul.isocial li a.twitter:hover{
	background-position:-50px -24.5px; 
 	transition:background-position 0.2s ease; -moz-transition: 0.2s ease; -webkit-transition: 0.2s ease; -o-transition: 0.2s ease;}
ul.isocial li a.google{background-position:-75px 0}
ul.isocial li a.google:hover{
	background-position:-75px -24.5px; 
 	transition:background-position 0.2s ease; -moz-transition: 0.2s ease; -webkit-transition: 0.2s ease; -o-transition: 0.2s ease;}
ul.isocial li a.youtube{background-position:-100px 0}
ul.isocial li a.youtube:hover{
	background-position:-100px -24.5px; 
 	transition:background-position 0.2s ease; -moz-transition: 0.2s ease; -webkit-transition: 0.2s ease; -o-transition: 0.2s ease;}
 </style>
<table align="center" width="100%" cellpadding="0" cellspacing="0" style="position:relative; margin-top:4px;">
<tr>
<td valign="top" width="100%" style="background-color:#FFFFFF; position:relative; top:-25px;" align="center" height="120px">
<div style="width:px; display:table; margin-left:83px;">
    <div style="display: table-row;">

<div style="padding-top:3px; width:100px; display:table-cell;">  
<img src="images/logo.png" onclick="javascript:location.href='index.php';" width="250px" style="position:relative; cursor:pointer; margin-bottom:0px; top:-20px; margin-left:-360px; z-index:101;" />    </div> 



<div style="width:100px; display:table-cell; border-radius:3px;">


 <?
 
if (!$_REQUEST['rame'])
{ $x==0;
$a=mysqli_query($conn,"select * from banner where kategory='banner' order by id desc limit 0,5");
while ($b=mysqli_fetch_array($a))
{
 ?> 
  

<div>
 
 
 <a href="<? echo 'http://'.$b['linki']; ?>" target="_blank"> <img src="<? echo $b['upload'];?>" width="600px" height="90px" style="position:relative; margin-top:8px; margin-right:-110px; border-radius:3px;"> </a> </div>	  <? 


echo '</tr><tr>';
$x=0;
}
 }
	

else
{
include ($_REQUEST['ra']);	
	
}
	

 
	
	
	?> 

  </div>
</td>  
 </tr> <tr>
<td valign="top" align="center" width="100%" style="z-index:2; ">
<style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(FONTS/bpg_mrgvlovani_caps_2010.ttf); } @font-face { font-family: bpg_mrgvlovani_caps_2010; font-weight: 100; src: url('FONTS/bpg_mrgvlovani_caps_2010.ttf'); }  ch { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style> 
<? // ეს არის ნავიგაციის ფლოატ ფუნქცია ?>
<script type='text/javascript' src='js/jquery.1.7.2.min.js'></script>
<link rel="stylesheet" href="src/calendar/calendar.css">
<script src="src/calendar/calendar.js"></script>


 
<style> .menu {
  
    color:#FFF;
     
    position:absolute;
	top:86px;
    
    width:1000;
	z-index:2;
 
 }
.fixed {
    position:fixed;
    top:0;
} </style>
<script type="text/javascript">

var num = 200; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.menu').addClass('fixed');
    } else {
        $('.menu').removeClass('fixed');
    }
});

</script>

<? // აქ რჩება ფლოატინგის ფუნქცია ?>  



 <div class="menu" style="width:100%; z-index:17;"> <div style="height:50px;  width:100%;  margin-top:20px;" align="left">
<nav class="nav" style="position:relative; margin-top:-25px; width:100%; background-color:#e18c1f;">
	<ul style="width:1000px; margin:0 auto; padding-left:px;">  
    	<li><a href="index.php"><i class=" fa fa-home fa-2x"></i><Br/><nom style="position:relative; top:-3px;"> &nbsp;&nbsp;მთავარი </nom></a></li>
                    </li>
    	<li><a href="#"><i class="fa fa-code fa-2x"></i><Br/> <nom style="position:relative; top:-3px;">&nbsp; &nbsp; კატეგორიები </nom></a>
         <ul>
         <li><a href="index.php?do=binebi" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>ბინები &nbsp; &nbsp; </j></a></li> 
             <li><a href="index.php?do=karkasebi" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>კარკასები &nbsp; &nbsp; </j></a></li> 
                 <li><a href="index.php?do=nakveti" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>მიწის ნაკვეთი &nbsp; &nbsp; </j></a></li> 
                 <li><a href="index.php?do=kerzo" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>კერძო სახლი &nbsp; &nbsp; </j></a></li> 
                             <li><a href="index.php?do=saofise" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>საოფისე &nbsp; &nbsp; </j></a></li> 
                                 <li><a href="index.php?do=komerciuli" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>კომერციული &nbsp; &nbsp; </j></a></li> 
                                 <li><a href="index.php?do=remonti" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fa fa-desktop fa-1x"></i>მშენებლობა-რემონტი &nbsp; &nbsp; </j></a></li> 
                                    
                                              
                                               
          
         </ul>
              </li>
    	 
      
        <li><a href="index.php?do=sesxebi"><i class="fa fa-eye fa-3x"></i><Br/><nom style="position:relative; top:-3px;">&nbsp; &nbsp;სესხები </nom> </a> </li>

                 <li><a href="index.php?do=advert"><i class="fa fa-eye fa-x"><Br/></i><nom style="position:relative; top:-3px;">&nbsp; &nbsp; რეკლამა </nom> </a>  
                  </li>
                 
        
        <li><a href="index.php?do=contact"><i class="fa fa-eye fa-2x"></i><Br/><nom style="position:relative; top:-3px;">&nbsp; &nbsp; კონტაქტი </nom> </a></li>
   
        
      </li> 
          
          <li> <form class="search" action="index.php?do=search&" method="post" style="position:relative; left:291px; top:6px;">
  <input type="search" name="text" value="ძიება ID-ით..."  onblur="if(this.value=='') this.value='ძიება ID-ით...';"  onfocus="if(this.value=='ძიება ID-ით...') this.value='';" style="position:relative; top:4px; left:4px;" required>
  <button type="submit" style="background-image:url(images/Loupe-icon.png); background-size:17px; background-repeat:no-repeat; background-position:center;">  </button>
</form>    </li>
          
     </ul>
     
     
</nav> 
<style>  

.search {width: 220px; height:26px; margin:0px auto; background:#e9ebee;border-radius:  3px;border: 0px solid #4D759B;}

.search input {width: 175px; float: left;color: #8E8989;border: 0;background: transparent;border-radius: 0px 0 0 0px;}

.search input:focus {outline: 0;background:transparent;}

.search button {position: relative;float: right;border: 0;padding: 0;cursor: pointer;height: 26px;width:45px;color: #4295ED;background: transparent;border-left: 0px solid #6E6F6B;border-radius: 0 0px 0px 0;}   

.search button:hover {background: #E2E3E1;color:#444;  -webkit-transition: all 0.6s ease;
   -moz-transition: all 0.6s ease;
   transition: all 0.6s ease;
}
.search button:active {box-shadow: 0px 0px 12px 0px rgba(225, 225, 225, 1);}

.search button:focus {outline: 0;} </style>

<style> 
/*
General Stuff
*/

body {
	background-color:#FFFFFF;
	margin:0; padding:0;
	font-family:sylfaen;
	}
	
h1,h3 {
	 
	margin:0;
	padding:20px;
	text-align:center;
	}	
	
#warp {
 	
	}

/*
Navigation Bar
*/

.nav {
	background-color:#FFFFFF;
	width:1001px;
	 font-family:Georgia, "Times New Roman", Times, serif;
 	 
 margin-left:-1px;
   
 
	}

.nav ul {
	margin:0;
	margin-left:15px;
	padding:0;
	 font-family:sylfaen;
	 
	 
	
	}

.nav ul li {
	list-style:none;
	display:inline-block;
	margin-top:-5px;
	z-index:2;
	padding-top:5px;
	}

.nav ul li a {
	display:block;
	text-decoration:none;
	text-align:center;
	padding:0px 10px 14px 0px;
 
	color:#373636;
	font-size:14px;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s;  /* Safari */ 
	}	
	
	
.nav ul li:hover a {	
	color:#1F211D;
	padding-bottom:14px;
	background-color:#e9ebee;
	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s;  /* Safari */
	
	}
	
	
	.nav.fixed {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2;
    width: 100%;
    border-bottom: 5px solid #ffffff; 
	
}

	
/*
Drop Down
*/	
	
.nav ul li ul {
	display:none; 
	margin-left:0px;
	
	}	
	
.nav ul li:hover ul {
	z-index:2;
	position:absolute;
	display:block; 
	
}	

.nav ul li ul
{
  	position:relative;       
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset; 
			
			
}
.nav ul li ul:before, .nav ul li ul:after
{
	content:"";
    position:absolute; 
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:50%;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px; 
	
}

.nav ul li ul li {
	list-style:none;
	display:block;
	float:none; 
	
	}

.nav ul li ul li:hover a {	
	color:#000000;
	padding-bottom:18px;
	background-color:#BDC6CB;
	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s;  /* Safari */
	
	}
   
.nav ul li ul li { }

.nav ul li ul li a {
	padding:5px 15px 5px 15px;
	text-align:left; 
	
	}

.nav ul li ul li a i {
	min-width:20px;
	padding-right:10px; 
	
	}

/*
Drop Down Arrow
*/

.nav li > a:after { content: '';  }

  
.nav > li > a:after {content: '';  }

 
.nav li > a:only-child:after {content: '';  }
	
/*
Active Class
*/	
	
.nav ul .active {
	
	color:#FFF; 
}	


 body::-webkit-scrollbar-track
{
    border-left:1px solid #e08b1e;
}

body::-webkit-scrollbar
{
    width: 8px;
}

body::-webkit-scrollbar-thumb
{
    background-color:#e08b1e;
}
</style> </td></tr>  </table>
 
<table align="center">
<tr>
<td width="800" height="300" colspan="3"  bgcolor="#FFFFFF" background="images/header.gif" style="background-repeat:repeat" valign="bottom">
 
 
<table width="800">
<tr>
<td>
 
  </td></tr></table>

<tr>
<td width="172"  height="0" bgcolor="#FFFFFF" valign="top"> 
 
 
	 
 

	
 
	 
	<table>
 <tr>
 <td valign="top">
 
  <?
if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ $x==0;
$a=mysqli_query($conn,"select * from banner where kategory='456' order by id desc limit 0,5");
while ($b=mysqli_fetch_array($a))
{
 ?> 
  


 
 <tr>
 <td valign="top">
 <a href="<? echo 'http://'.$b['linki']; ?>" target="_blank"> <img src="<? echo $b['surati'];?>" width="175" align="left"> </a> </div>	  <? 


echo '</tr><tr>';
$x=0;
}
 }
	

else
{
include ($_REQUEST['do']);	
	
}
	

 
	
	
	?> 
 </td> 
 <tr>
 
 
 <? 
if ($_REQUEST['do']) include ($_REQUEST['do'].'.php'); else include ('home.php');	
?>  
 
	<tr>
	<td width="900" colspan="4">   

 
   
 
 
 
 </div></td>
<td width="170" bgcolor="#FFFFFF"  valign="top"> 
 
  
<? // reklama // ?>   </td>
<tr></tr></table>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="100" height="50"  colspan="4" bgcolor="#3c4446" align="center"> <!-- TOP.GE COUNTER CODE -->
<script language="JavaScript" src="http://counter.top.ge/cgi-bin/cod?100+37907"></script>
<noscript>
<a target="_top" href="http://counter.top.ge/cgi-bin/showtop?37907">
<img src="http://counter.top.ge/cgi-bin/count?ID:37907+JS:false" border="0" alt="TOP.GE" /></a>
</noscript>
<!-- / END OF COUNTER CODE --></td>
</tr>
</table>
</body>
</html>
