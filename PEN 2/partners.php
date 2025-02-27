<table style="position:relative; left:-45px; top:30px; margin-bottom:-130px;" width="1000px" align="center">
   <tr>
   <td valign="top"> 
   <h2 style="position:relative; top:-50px; left:55px; padding-bottom:15px;"> <div style="position:relative; margin-left:15px; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <k style="position:relative; padding-left:15px;"> პარტნიორები </k>  </b> </div> </h2> </td> <td valign="top"> </td>
   <tr> 
    <?
      
if ($_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='პარტნიორები' order by news_date desc limit 0,10");
while ($b=mysqli_fetch_array($a))
{
 ?> 
	<td valign="top" style="position:relative; top:-30px; left:72px;" width="1000px"> 
     <style>
		#imsa {
  height: 200px;
  transition: all .2s ease-in-out;
}

.coversa {
  width: 570px;
  object-fit: cover;
  
  
}
 
	

	</style>
                        <img src="<?=HTTP_HOST?><? echo $b['upload'];?>" id="imsa" class="coversa" style="padding-bottom:50px; padding-right:50px;"/></td>
                         
                       
                                 
                                 <? 
								 
								$x++;
 
if ($x==2) 
{
echo '</tr>';
$x=0;
}
 }  } ?> 
   
   
</tr></table>