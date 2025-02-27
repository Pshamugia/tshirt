<link href="logo.css" rel="stylesheet" type="text/css">
 	   <table width="100%" style="background-color:#F4F7FB; padding-top:20px;" align="center">
<tr>
<td>
<table width="908px" align="center" style=" z-index:0; left:-26px; position:relative; min-height:400px;  background-color:#F4F7FB;">
<tr>
<td width="300px" align="left" id="linkebi"  valign="top" style=" "> 
           
 <div align="left" style="margin-left:9px; margin-top:-10px;"> 
 
 
    
        <style> 
@font-face { font-family: bpg_nino_mtavruli_book; src:url(FONTS/bpg_nino_mtavruli_book.ttf); } @font-face { font-family: bpg_nino_mtavruli_book; font-weight: 100; src: url('FONTS/bpg_nino_mtavruli_book.ttf'); }  b { font-family:bpg_nino_mtavruli_book, sans-serif; }  </style> 
   
    
 
   

<div id="printDiv">
 <div style="width:600px; margin-top:45px; margin-left:15px;">
<?
$aaaaa=mysqli_query($conn, "select * from kultura_cxrili where eng_geo='Geo' AND avtori='$_REQUEST[id]'");
while($data=mysqli_fetch_array($aaaaa))
{
	$avt=mysqli_query($conn, "select * from avtorebi where id='$data[avtori]' ");
$f=mysqli_fetch_array($avt); ?>

<div id="linkebi"> <? "<a href='index.php?do=full&id=".$data['id']."'>".$data['satauri'].'</a><br>';	
}

?>  </div>  
<div align="left" style="font-size:24px; margin-bottom:20px;">   <b> <? echo $f['avtori']; ?>   </a>

 
</div>
 
<?
$aaaaa=mysqli_query($conn, "select * from kultura_cxrili where eng_geo='Geo' AND avtori='$_REQUEST[id]'");
while($data=mysqli_fetch_array($aaaaa))
{
	$avt=mysqli_query($conn, "select * from avtorebi where id='$data[avtori]' ");
$f=mysqli_fetch_array($avt); ?>

<div id="linkebi" style="margin-top:5px; font-size:14px;"> <img src="images/next-page-arrow.png" height="12" style="margin-right:4px" width="12" /><? echo "<a href='index.php?do=full&id=".$data['id']."'>".$data['satauri'].'</a><br>';	
}

?>  </div>  </font>

 

<br /> <br /> </div>
</div> 
  
</td> </tr> </table>
 </div></div></div> </td> </tr> </table> 
 