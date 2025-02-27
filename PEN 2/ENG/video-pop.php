<?
include ('config.php');
error_reporting(0);
 $a=mysql_query('select * from kultura_cxrili where id='.$_GET['id']);
$b=mysql_fetch_array($a);
$aa=mysql_query("select * from avtorebi where `id`=".$b['avtori']);
	$avtori=mysql_fetch_array($aa);

?>

  
<meta name="title" content="<? echo $b['satauri']; ?> " />
 <link rel="image_src" href="<? echo $b['upload']; ?>" />
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="Shortcut Icon" type="image/logo" href="images/50.gif" /> 
<link rel='stylesheet' type='text/css' charset='UTF-8' href='logo.css'> 
 <meta name="title" content="<? echo $avtori['avtori']; ?> | <? echo $b['satauri']; ?> " />

</head> 
<title> <? echo $b['satauri']; ?></title>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #0066CC}
-->
</style>

<?
$a=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$b=mysql_fetch_array($a); ?>			
<table width="100%" style="background-color:#FFFFFF;">
<tr>
<td valign="top"> 
        
     
    
        <style> 
@font-face { font-family: bpg_nino_mtavruli_book; src:url(FONTS/bpg_nino_mtavruli_book.ttf); } @font-face { font-family: bpg_nino_mtavruli_book; font-weight: 100; src: url('FONTS/bpg_nino_mtavruli_book.ttf'); }  a { font-family:bpg_nino_mtavruli_book, sans-serif; }  </style> 
 
 <h4 align="left" style="margin-left:0px;">  <font size="+2" color="#000000"> <a>   <? echo $b['satauri'];?> </a> </font></h3>    
 
 
 <? echo $b['full']; ?>   </font> 
 <div id="linkebi"> <a href="index.php"> დაბრუნება საწყის გვერდზე </a> <div class="a2a_kit a2a_default_style" style="position:relative; top:15px;">
  
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div>
<script type="text/javascript">
var a2a_config = a2a_config || {};
a2a_config.linkname = "tbilisilitfest.ge";
a2a_config.linkurl = "http://tbilisilitfest.ge/index.php?do=full&id=<? echo $b['id'];?>";
</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
</div>
 
 
</td> </tr> </table> 