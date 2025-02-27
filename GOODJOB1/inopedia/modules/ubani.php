<?php
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
if (isset($_POST['addavtor']))
{
	 	
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
if (isset($_POST['edit_id']) && intval($_POST['edit_id']) > 0)
{
$sql="update ubani set `name`='$_REQUEST[name]' WHERE id='$_POST[edit_id]'";

}

else
	
	{
	$sql="insert into ubani (name, kalakis_id)values('$_REQUEST[name]', ".intval($_REQUEST['city']).")";	
		
	}
//$sql1="insert into ubani (kalakis_id, name)values('$_REQUEST[kalakis_id]', '$_REQUEST[name]')";

mysqli_query($conn, $sql);
 
//exit(mysqli_error($conn));
 
}
 if (isset($_GET['delete']))
 {
	 
	 mysqli_query($conn, "DELETE from ubani where id='$_GET[delete]'");
	 
	 
	 
 }
 
 
  if (isset($_GET['edit']))
 {

	 $edit_data=mysqli_fetch_array (mysqli_query($conn, "SELECT * from ubani where id='$_GET[edit]'"));
	 $edit_name=$edit_data['name'];
	 $edit_id=$edit_data['id'];
	 
	 
 }
 
 
 
?>
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:-2px; padding:10px;"> 
<form action="index.php?do=ubani&city=<? echo $_GET['city']; ?>" method="post" enctype="multipart/form-data" >
  <p>
 
   
   
   
    
    <br />დაამატე უბანი <? $read=mysqli_fetch_array(mysqli_query($conn, "select * from kalaki where id='$_GET[city]'")); 
echo $read['name'];
	?>
  <input type="text" name="name" value="<? echo $edit_name; ?>"/>
  <input type="submit" name="addavtor" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;">
<input type="hidden" name="edit_id" value="<? echo $edit_id; ?>">
  </p>
  <p>&nbsp;</p>
  <br><br>
  <p><br />
   
  </p> 
</form><br>  </td>


<br>
<tr>
	
	
	
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">უბნის სახელი</th>
      <th scope="col">რედაქტირება</th>
      <th scope="col">წაშლა</th> 
    </tr>
  </thead>
  <tbody>
    <tr>
		<? 
$cities=mysqli_query($conn, "SELECT * FROM ubani WHERE kalakis_id='$_GET[city]' order by name asc");


    while ($city=mysqli_fetch_assoc($cities))
	{
 ?>
      <th scope="row"> <? echo $city['name']; ?> </th>
          <td><a href="index.php?do=ubani&city=<? echo $_GET['city']; ?>&edit=<? echo $city['id'];?>"> EDIT </a></td>
      <td><a href="index.php?do=ubani&city=<? echo $_GET['city']; ?>&delete=<? echo $city['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?');"> DELETE </a> </td>
    </tr>
     <? } ?>
  </tbody>
</table>
	
	
	
	
	
	
	
	