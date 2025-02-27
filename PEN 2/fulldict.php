<table style="position:relative; top:50px; min-height:400px;">
<tr>
<td valign="top">

<div> ჰეით ლექსიკონი </div>



 </td> 
 
 <tr>
 <td valign="top"> 
 <? if ($anbani='ა'$_REQUEST['ა'])
{  
 
 $x=mysql_query("select * FROM kultura_cxrili   ");
$z=mysql_fetch_array($x);

{

   ?> 
  
 
  <div id="#index.php?do=fulldict&id=<? echo $z['id'];?>">

 
 <? echo $z['satauri']; ?> - <? echo $z['agwera']; ?> 
 
   </div>
 
 <? 
 
 } }
 ?> 

    </td> 
</tr></table>