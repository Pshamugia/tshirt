<?
error_reporting(0);

 
	if (isset($_POST['edit']) && intval($_POST['edit']) > 0)
{
$sql="update faq set `question_ka`='$_REQUEST[question_ka]', `answer_ka`='$_REQUEST[answer_ka]', `question_en`='$_REQUEST[question_en]', `answer_en`='$_REQUEST[answer_en]', `question_ru`='$_REQUEST[question_ru]', `answer_ru`='$_REQUEST[answer_ru]'  WHERE id='$_GET[edit]'";

}

 

if(isset($_POST['add_question']) && !empty($_POST['add_question'])) 
{
	$edit = $_GET['edit'];
	if(intval($edit))
	{
		$data=mysqli_query($conn, "UPDATE faq set `question_ka`='$_REQUEST[question_ka]', `answer_ka`='$_REQUEST[answer_ka]', `question_en`='$_REQUEST[question_en]', `answer_en`='$_REQUEST[answer_en]', `question_ru`='$_REQUEST[question_ru]', `answer_ru`='$_REQUEST[answer_ru]' WHERE id='$edit'");
		exit("<script>document.location.href='index.php?do=faq';</script>");
	}
	else
	{  
	$sql=mysqli_query($conn, "INSERT INTO faq (question_ka, answer_ka, question_en, answer_en, question_ru, answer_ru)VALUES('$_REQUEST[question_ka]', '$_REQUEST[answer_ka]', '$_REQUEST[question_en]', '$_REQUEST[answer_en]', '$_REQUEST[question_ru]', '$_REQUEST[answer_ru]')");
	$rame=mysqli_query($conn, $sql);
	 //exit(mysqli_error($conn));
	}
	 
}

 

if ($_REQUEST['delete'])
mysqli_query($conn, "delete from faq where id='$_REQUEST[delete]'");

?>

 
	 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"><i class="fas breadcrumb-item"></i> შეავსე ველები </th>
      
    </tr>
  </thead>
  <tbody>
	  
	 <?
 
$x;

		$res=mysqli_query($conn, "SELECT * FROM faq ORDER BY ID ASC");
	while($data=mysqli_fetch_array($res))
	{
		
  	  
	$x++;
	?> 
 



    <tr>
      <th scope="row">
		
			
		  
		  
<? echo $x.')'; ?> <br>

 <span style="color: red"> კითხვა:</span> <? echo $data['question_ka']; ?> <br>
	
		 <span style="color: red"> პასუხი </span> <? echo $data['answer_ka'];   ?> 
		  <br>
		  <span style="font-size: 12px;"> 
		<a href="index.php?do=faq&delete=<? echo $data['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> 
		  წაშლა </a>  
		  <br>
		  <a href="index.php?do=faq&edit=<? echo $data['id']?>" name="edit"> დარედაქტირება </a></span>
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
			$res=mysqli_query($conn, "SELECT * FROM faq WHERE id='$_GET[edit]'  ORDER BY ID ASC");
$data=mysqli_fetch_array($res); 
		}
		?>
		
		<ol class="breadcrumb mb-4" style="width: 500px;">
                            <li class="breadcrumb-item active">შექმენი ახალი კითხვა 
								<hr>
		<form action="" method="POST">
		<input type="text" required name="question_ka" value="<? echo $data['question_ka']; ?>" style="width: 350px;"> კითხვა<br><br>
			<input type="text" required name="answer_ka" value="<? echo $data['answer_ka']; ?>" style="width: 350px;"> პასუხი <br> 
			<hr>
			
		<input type="text" required name="question_en" value="<? echo $data['question_en']; ?>" style="width: 350px;"> QUESTION<br><br>
		<input type="text" required name="answer_en" value="<? echo $data['answer_en']; ?>" style="width: 350px;"> ANSWER <br> 
			
			
			<hr>
			
		<input type="text" required name="question_ru" value="<? echo $data['question_ru']; ?>" style="width: 350px;"> Вопрос<br><br>
		<input type="text" required name="answer_ru" value="<? echo $data['answer_ru']; ?>" style="width: 350px;"> Ответ <br> 
			
		<input type="submit" name="add_question"> 
		</form>  </li>
						</ol> 
	</td>
	</tr>
</table>