<?
error_reporting(0);

 
	if (isset($_POST['edit']) && intval($_POST['edit']) > 0)
{
$sql="update counters set `number_ka`='$_REQUEST[number_ka]', `texts_ka`='$_REQUEST[texts_ka]', `number_en`='$_REQUEST[number_en]', `texts_en`='$_REQUEST[texts_en]', `number_ru`='$_REQUEST[number_ru]', `texts_ru`='$_REQUEST[texts_ru]'  WHERE id='$_GET[edit]'";

}

 

if(isset($_POST['add_counter']) && !empty($_POST['add_counter'])) 
{
	$edit = $_GET['edit'];
	if(intval($edit))
	{
		$data=mysqli_query($conn, "UPDATE counters SET number_ka='$_POST[number_ka]', texts_ka='$_REQUEST[texts_ka]', number_en='$_POST[number_en]', texts_en='$_REQUEST[texts_en]', number_ru='$_POST[number_ru]', texts_ru='$_REQUEST[texts_ru]' WHERE id='$edit'");
		exit("<script>document.location.href='index.php?do=counters';</script>");
	}
	else
	{  
	$sql=mysqli_query($conn, "INSERT INTO counters (number_ka, texts_ka, number_en, texts_en, number_ru, texts_ru)VALUES('$_REQUEST[number_ka]', '$_REQUEST[texts_ka]', '$_REQUEST[number_en]', '$_REQUEST[texts_en]', '$_REQUEST[number_ru]', '$_REQUEST[texts_ru]')");
	$rame=mysqli_query($conn, $sql);
	// exit(mysqli_error($conn));
	}
	 
}

 

if ($_REQUEST['delete'])
mysqli_query($conn, "delete from counters where id='$_REQUEST[delete]'");

?>

 
	 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"><i class="fas breadcrumb-item"></i> შეავსე ველები ქაუნთერებისთვის</th>
      
    </tr>
  </thead>
  <tbody>
	  
	 <?
 
$x;

		$res=mysqli_query($conn, "SELECT * FROM counters ORDER BY ID ASC");
	while($data=mysqli_fetch_array($res))
	{
		
  	  
	$x++;
	?> 
 



    <tr>
      <th scope="row">
		
			
		  
		  
<? echo $x.') '; echo $data['number_ka']; ?>
	
	<? echo $data['texts_ka'];   ?> 
		  <br>
		  <span style="font-size: 12px;"> 
		<a href="index.php?do=counters&delete=<? echo $data['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> 
		  წაშლა </a>  
		  <br>
		  <a href="index.php?do=counters&edit=<? echo $data['id']?>" name="edit"> დარედაქტირება </a></span>
		</th>
     
    </tr> <? }     ?>
    <tr>
       
    </tr>
  </tbody>
</table>




 

<table>
<tr>
	<td> 
	 
		<br>
		<?
		if (isset($_GET['edit']))
		{
			$res=mysqli_query($conn, "SELECT * FROM counters WHERE id='$_GET[edit]'  ORDER BY ID ASC");
$data=mysqli_fetch_array($res); 
		}
		?>
		
		<ol class="breadcrumb mb-4" style="width: 500px;">
                            <li class="breadcrumb-item active">შექმენი ახალი ქაუნთერი 
								<hr>
		<form action="" method="POST">
		<input type="number" required name="number_ka" value="<? echo $data['number_ka']; ?>" style="width: 350px;"> რიცხვი<br><br><input type="text" required name="texts_ka" value="<? echo $data['texts_ka']; ?>" style="width: 350px;"> ტექსტი <br> 
			<hr>
			
		<input type="number" required name="number_en" value="<? echo $data['number_en']; ?>" style="width: 350px;"> NUMBER<br><br>
		<input type="text" required name="texts_en" value="<? echo $data['texts_en']; ?>" style="width: 350px;"> TEXT <br> 
			
			
			<hr>
			
		<input type="number" required name="number_ru" value="<? echo $data['number_ru']; ?>" style="width: 350px;"> Число<br><br>
		<input type="text" required name="texts_ru" value="<? echo $data['texts_ru']; ?>" style="width: 350px;"> Текст <br> 
			
		<input type="submit" name="add_counter"> 
		</form>  </li>
						</ol> 
	</td>
	</tr>
</table>