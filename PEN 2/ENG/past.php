<table style="position:relative; left:-45px; top:30px;" width="1000px" align="center">
   <tr>
   <td valign="top"> 
   <h2 style="position:relative; top:-50px; left:-15px; padding-bottom:15px;"> <div style="position:relative; margin-left:15px; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <k style="position:relative; padding-left:15px;"> History </k>  </b> </div> </h2> </td> <td valign="top"> </td>
   <tr> 
    <?
      
if ($_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='ისტორია' AND eng_geo='Eng' order by id desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 
	<td valign="top" width="300px" style="position:relative; top:-50px;"> 
    
                        <img src="<?=HTTP_HOST?>../<? echo $b['upload'];?>" width="300px"/></td>
                         
                         
                         <td valign="top" width="650px" style="position:relative; padding-left:40px; top:-55px;">  
                
                              
                                 <div style="position:relative; font-size:14px;"> <? echo $b['full'];?> </div> </td>
                                 
                                 <? }} ?> 
   
   
</tr></table>