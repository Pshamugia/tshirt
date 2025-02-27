<?php
 
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  



if(isset($_POST))

 
?>



   

  
   <table align="center" style="min-height: 500px" class="col-md-12">

 <tr>
	   
	 <td valign="top" style="background-color: #e9ecef">  
      <div style="position: relative; padding: 15px;">
	<b> ჯავშნები</b> 
		  <br>
		   
 <br>
		  
		  
  
		  <table class="table table-hover">
		  	<tr>
				<th style="border-bottom: 1px solid #C5D8D8">სახელი</th>
				<th style="border-bottom: 1px solid #C5D8D8">ელფოსტა</th>
				<th style="border-bottom: 1px solid #C5D8D8">ტელეფონი</th>
				<th style="border-bottom: 1px solid #C5D8D8">სერვისი</th>
				<th style="border-bottom: 1px solid #C5D8D8">კალენდარი</th>
				<th style="border-bottom: 1px solid #C5D8D8">საათი</th>
				<th style="border-bottom: 1px solid #C5D8D8">X</th>
			  </tr>
			  <?
	
			if(isset($_GET['del']))
			{
				mysqli_query($conn, "DELETE FROM booking WHERE id='$_GET[del]'");
			}
	
		  $res=mysqli_query($conn, "SELECT * FROM booking ORDER BY id DESC");
			
		  while($data = mysqli_fetch_assoc($res))
		  {
		  ?>
		  	<tr>
				<td style="padding-right: 20px; border-right: 1px #dee2e6 solid; border-bottom: 1px #C5D8D8 solid; "><?=$data['name']?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;"><?=$data['email']?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;"><?=$data['phone']?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;"><?=$data['service']?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;">  <? $news_date=date('Y'); echo $news_date; ?>  / <?=dateToString($data['news_date'])?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;"><?=$data['hour']?></td>
				<td style="padding-left: 20px; padding-right: 20px; border-right: 1px #C5D8D8 solid; border-bottom: 1px #C5D8D8 solid;"><a href="index.php?do=room&del=<?=$data['id']?>" onClick="return confirm('ნამდვილად გსურთ წაშლა');"> წაშლა </a> </td>
			  </tr>
			 <?
			  }
			  ?>
			  
		  </table>
 
 </td>
	 
	 <tr>
		 
		 
		 
		 
		 
		 
		 
		 
	    
	   </tr>
	   </tr></table>