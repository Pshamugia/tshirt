		<link rel="stylesheet" href="<?=HTTP_HOST?>src/calendar/calendar.css">
<script src="<?=HTTP_HOST?>src/calendar/calendar.js"></script>

<script src="<?=HTTP_HOST?>js/geo.js" mce_src="geo.js" type="text/javascript"></script>

<script>
function addNewBlock(selector)
{
	var newBlock = $('#'+selector).append('<div style="background:#ccc; border-bottom: 1px solid #FFF">'+$('#'+selector).find('div').last().html()+'</div>');
	newBlock.find('.hasDatepicker').each(function(i, element){
		$(element).attr('id', '');
		$(element).attr('class', 'calendar');
		console.log(element);
		addCalendarToElement(element);
	});
}
function loadUbani(city_id)

{

	$.getJSON('<?=HTTP_HOST?>ajax.php?id='+city_id, function(json)

	{

		$('#ubani').empty();

		$('#ubani').append('<option value="0">რაიონი</option>');

		for(var i=0; i<json.length; i++)

		{

			$('#ubani').append('<option value="'+json[i].id+'">'+json[i].name+'</option>');

		}

	});

	

}



</script>

<?php
 
$hash=md5(time().$_SESSION['USER_ID']);
if(isset($_GET['enable_super_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 200)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-200 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET s_vip=$end_date WHERE id='$_GET[enable_super_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 200, '', ".time().",0,'სუპერ ვიპის შეძენა', $user[balance], ".($user['balance']-200).", $_GET[enable_super_vip] )");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}


if(isset($_GET['enable_vip']))
{
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));
	if($user['balance'] >= 100)
	{
		if(mysqli_query($conn, "UPDATE login SET balance=balance-100 WHERE id='$_SESSION[USER_ID]'"))
		{
			$end_date = strtotime("+2 days");
			mysqli_query($conn, "UPDATE login SET vip=$end_date WHERE id='$_GET[enable_vip]'");
			mysqli_query($conn, "INSERT INTO transactions (user_id, amount, trans_id, date, status, operacia, start_amount, end_amount, gancxadebis_id) VALUES ($user[id], 100, '', ".time().",0,'VIP-ის შეძენა', $user[balance], ".($user['balance']-100).", $_GET[enable_vip])");
		}
	}
	else
	{
		echo "<script> alert('თქვენ არ გაქვთ საკმარისი თანხა ბალანსზე. გთხოვთ, შეავსოთ ბალანსი'); </script>";
	}
}



if (isset($_GET['delete']))

{ 

 mysqli_query($conn, "DELETE from login where id='$_GET[delete]'");

}





if (!$_SESSION['USER_ID'])

	 

	$res = mysqli_query($conn,"SELECT * FROM login WHERE id='$_SESSION[USER_ID]'");

	$user = mysqli_fetch_assoc($res);

	if ($_SESSION['USER_ID']==0)

		

		{

			

		//echo  "<script>document.location='index.php?do=login'</script>"; 

		}


 





 

$redirect = false;

if (isset($_POST['Submit1']))

{ 
	
//exit(mysqli_error($conn));
	
	//if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"] || $_POST['status']==0)
if(true)
	{ 
	$uname = $_POST['username'];
	$pword = $_POST['password'];
    $email = $_POST['email'];
	$res = mysqli_query($conn,"SELECT id FROM login WHERE email='$email'");
	if(mysqli_fetch_assoc($res))
	{
		$errorMessage = "ეს ელფოსტა უკვე რეგისტრირებულია ბაზაში";
	}
	else
	{
		if($_POST['status'] == 0)
		{
			mysqli_query($conn,"INSERT INTO login (`username`, `password`, `email`,`status`) VALUES ('$uname', '".md5($pword)."', '$email', '$_POST[status]')");
		 
			$errorMessage = "თქვენ წარმატებით დარეგისტრირდით";
			echo  "<script>document.location='index.php?do=page1'</script>";
		}
		else if($_POST['status'] == 1)
		{
			$surati='';
			
			if(resizeImage($_FILES['upload']['tmp_name'], 'img_teacher/'.time().'_'.$_FILES['upload']['name'], 800, 800))
				
				$surati = 'img_teacher/'.time().'_'.$_FILES['upload']['name'];		
			
		   
			
			$current = '|'.implode('|', $_REQUEST['current']).'|';
			$klasi = '|'.implode('|', $_REQUEST['klasi']).'|';
			$sagnebi = '|'.implode('|', $_REQUEST['sagnebi']).'|';
			if(mysqli_query($conn,"INSERT INTO login (`username`, `password`, `email`,`status`, `ubani`, `kalaki`, `satauri`, `menu`, `price_from`, `price_to`, `upload`, `klasi`, `home`, `remote`, `phone`, `current`, `avtori`, `fasi`, `sagnebi`, `valuta`, `agwera`, `mimdinare`, `sagnebi_other`) VALUES ('$uname', '".md5($pword)."', '$email', '$_POST[status]', '$_POST[ubani]', '$_POST[kalaki]', '$_POST[satauri]', '$_POST[menu]', '$_POST[price_from]', '$_POST[price_to]', '$surati', '$klasi', '$_POST[home]', '$_POST[remote]', '$_POST[phone]', '$current', '$_POST[avtori]', '$_POST[fasi]', '$sagnebi', '$_POST[valuta]', '$_POST[agwera]', '$_POST[mimdinare]', '$_POST[sagnebi_other]')"))
					
			{
			 
				
				
				$user_id = mysqli_insert_id($conn);
	

				for($i = 0; $i<count($_POST['organization']);$i++)
				{
					$organization = $_POST['organization'][$i];
					$position = $_POST['position'][$i];
					$period_from = $_POST['period_from'][$i];
					$period_to = $_POST['period_to'][$i];
					$surati='';
					if(move_uploaded_file($_FILES['upload2']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i]))
						$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload2']['name'][$i];
					mysqli_query($conn, "INSERT INTO experience (user_id,  organization, position, period_from, period_to, upload, type) VALUES('$user_id',  '$organization', '$position', '$period_from', '$period_to', '$surati', '0')");
				 
				}
				
				
				
						for($i = 0; $i<count($_POST['organization_education']);$i++)
				{
					$organization = $_POST['organization_education'][$i];
					$position = $_POST['position_education'][$i];
					$period_from = $_POST['period_education_from'][$i];
					$period_to = $_POST['period_education_to'][$i];
					$surati='';
					if(move_uploaded_file($_FILES['upload3']['tmp_name'][$i], 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i]))
						$surati = 'img_teacher/'.$user_id.'_'.time().'_'.$_FILES['upload3']['name'][$i];
					mysqli_query($conn, "INSERT INTO experience (user_id, organization, position, period_from, period_to, upload, type) VALUES('$user_id', '$organization', '$position', '$period_from', '$period_to', '$surati', '1')");
							
				}
				
				
				
			}
			?>
<script> alert("თქვენ წარმატებით დარეგისტრირდით. გაიარეთ ავტორიზაცია და შედით სისტემაში");</script>
<? 			// $errorMessage = "თქვენ წარმატებით დარეგისტრირდით";
			
			
			//echo  "<script>document.location='index.php?do=page1'</script>";
		}
	}



 

	}

	else

		echo '<script>alert("დამცავი კოდი არასწორია");</script>';

}









if ($_POST['delete'])

{

$x=mysqli_query($conn,"select * FROM login where id='$_REQUEST[del]'");

$z=mysqli_fetch_array($x);

if ($z['surati'])

unlink('../'.$z['surati']);

mysqli_query($conn,"DELETE FROM login where id='$_REQUEST[del]'");

 

}





?>

<section class="ftco-section">
           <div style="width:100%; top:-40px; position:relative; background-color:#F3BA3F; border: 1px solid #F3BA3F; z-index: 4"> </div>
<div class="container"> 

	 
<div class="container">
  <h2>რეგისტრაცია</h2>
  <p style="color: red; font-weight: bold">თუ ხართ მასწავლებელი, მონიშნეთ "მასწავლებლად დარეგისტრირება". </p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">მასწავლებლად  დარეგისტრირება</a></li>
    <li><a data-toggle="tab" href="#menu1">მომხმარებლად დარეგისტრირება</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
		
	
		      <h3>მასწავლებელი</h3>
		შეავსეთ ველები ყურადღებით
      <p><FORM NAME ="form1" enctype="multipart/form-data" METHOD ="POST" ACTION ="index.php?do=signup" style="position:relative; padding-top:50px;">

		  <span class="col-md-3"> * სახელი გვარი: </span> <INPUT TYPE = 'TEXT' Name ='username' onkeypress="return makeGeo(this,event);"  required="" placeholder="სახელი გვარი"
 oninvalid="this.setCustomValidity('ეს ველი სავალდებულოა')"
 oninput="setCustomValidity('')" value="<?PHP print $uname;?>" style="width:250px; border:1px solid #8B8B8B;"> <br><br>    
		  <span class="col-md-3"> *პაროლი: </span> <INPUT TYPE = 'TEXT' Name ='password' required="" placeholder="პაროლი"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ ასოები და ციფრები, ბრჭყალები არ დაიშვება')"
 oninput="setCustomValidity('')"  value="<?PHP print $pword;?>" style="width:250px; border:1px solid #8B8B8B; position:relative;"> <br><br>
		  <span class="col-md-3"> *ელფოსტა: </span> <INPUT TYPE = 'email' Name ='email' required="" placeholder="ელფოსტა"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ მოქმედი ელფოსტა')"
 oninput="setCustomValidity('')" value="<?PHP print $email;?>" style="width:250px; border:1px solid #8B8B8B; position:relative; l">

<br><br>
		   
 <div> 
     
	 <span class="col-md-3"> * ატვირთე სურათი <input type="file" name="upload" required> </span> <br><br>
  
 <!--END of Image Uploader Jquery-->   
	 
	 <br><br>
	 <span class="col-md-3"> * კომპანიის სახელწოდება (მიმდინარე შევცვალეთ ამით): </span>  <input type="text" required name="avtori" type="text" style="width:250px; height:25px;">   
	 
	 <br> <br>
	 
	  <span class="col-md-3"> სტატუსი: </span> 
	 <select name="current[]" class="js-example-basic-multiple" multiple="multiple"  style="width:250px; height: 25px;"> 

	
	<option value="პრაქტიკოსი"> პრაქტიკოსი </option>
		<option value="უფროსი"> უფროსი </option>	
<option value="მენტორი"> მენტორი </option>
  <option value="წამყვანი"> წამყვანი</option>  
	 
	 </select>
	
	<script> $(document).ready(function() {
	
    $('.js-example-basic-multiple').select2({
  placeholder: 'მონიშნე'
});
}); </script>
	 
	 
	  
	 
	
	
	<br><br>
	
 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<span class="col-md-3">
	 <select onchange="loadUbani(this.value)"  name="kalaki" style="position:relative; width: 250px; height: 25px; ">

<option value="0"> რეგიონი</option>



<?php 
$res=mysqli_query ($conn, "SELECT * FROM kalaki");

while ($city = mysqli_fetch_assoc($res))

	

echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';



 ?>



	</select> </span>

 
<select  name="ubani" id="ubani" style="position:relative; width: 255px; height: 25px;">

<option value="0">რაიონი</option>

     

    </select>

	<br><br>
	
	 <span class="col-md-3"> რომელ საგნებში ამზადებთ? </span> <select name="sagnebi[]" class="js-example-basic-multiple" multiple="multiple"  style="width:250px; height: 25px;" >

      <option value="ბიოლოგია"> ბიოლოგია </option>
      <option value="ბუნებისმეტყველება"> ბუნებისმეტყველება </option>
      <option value="ქიმია"> ქიმია </option>
      <option value="ფიზიკა"> ფიზიკა </option>	 
	 <option value="სამოქალაქო განათლება"> სამოქალაქო განათლება </option>
	 <option value="გეოგრაფია"> გეოგრაფია </option>
	 <option value="ისტორია"> ისტორია </option>
	 <option value="გერმანული ენა"> გერმანული ენა </option>
	 <option value="ინგლისური ენა"> ინგლისური ენა </option>
	 <option value="ფრანგული ენა"> ფრანგული ენა</option>
	 <option value="რუსული ენა"> რუსული ენა </option>
	 <option value="ინფორმაციულ საკომუნიკაციო ტექნოლოგიები"> ინფორმაციულ საკომუნიკაციო ტექნოლოგიები </option>
	 <option value="მათემატიკა დაწყებითი საფეხური (I – VI)"> მათემატიკა დაწყებითი საფეხური (I – VI) </option>
	 <option value="მათემატიკა (VII – XII)"> მათემატიკა (VII – XII) </option>
	  <option value="ქართული დაწყებითი საფეხური (I – VI)"> ქართული დაწყებითი საფეხური (I – VI) </option>
	 <option value="ქართული  (VII – XII)"> ქართული  (VII – XII) </option>
	  <option value="სახვითი და გამოყენებითი ხელოვნება"> სახვითი და გამოყენებითი ხელოვნება </option>
	 <option value="მუსიკა"> მუსიკა </option>
	  <option value="ფიზიკური აღზრდა და სპორტი"> ფიზიკური აღზრდა და სპორტი </option>
	  
	
	</select>     
	<input type="text" name="sagnebi_other" placeholder="სხვა"> 
	
	<br><br>
	
	 <span class="col-md-3"> რომელი კლასის მოსწავლეებს ამზადებთ? </span> 
	
	<select name="klasi[]" class="js-example-basic-multiple" multiple="multiple"  style="width:250px; height: 25px;"> 

	
	<option value="I კლასი"> I კლასი </option>
		<option value="II კლასი"> II კლასი </option>
		<option value="III კლასი"> III კლასი </option>
		<option value="IV კლასი"> IV კლასი </option>
		<option value="V კლასი"> V კლასი </option>
		<option value="VI კლასი"> VI კლასი </option>
		<option value="VII კლასი"> VII კლასი </option>
		<option value="VIII კლასი"> VIII კლასი </option>
		<option value="IX კლასი"> IX კლასი </option>
		<option value="X კლასი"> X კლასი </option>
		<option value="XI კლასი"> XI კლასი </option>
		<option value="XII კლასი"> XII კლასი </option>
		<option value="აბიტურიენტები"> აბიტურიენტები </option>
		<option value="სტუდენტები"> სტუდენტები </option>

    </select>
	
	<script> $(document).ready(function() {
	
    $('.js-example-basic-multiple').select2({
  placeholder: 'მონიშნე'
});
}); </script>
	<br><br>
	
	 <span class="col-md-3"> სახლში მისვლით ამზადებთ </span> <input type="checkbox" name="home" value="1" style="transform: scale(1.5); cursor: pointer"/>
	<br><br>
	
	 <span class="col-md-3">  დისტანციურად ამზადებთ </span> <input type="checkbox" name="remote" value="1" style="transform: scale(1.5); cursor: pointer"/>
	<br><br>
	
<span class="col-md-3">  გაკვეთილის ფასი </span><input type="text" name="fasi" type="text" style="width:145; height:25px;">   
<select name="valuta" style="width:65px; height:25px; background-color:#F0F0F0; position:relative;"> 

	    <option value="GEL"> GEL </option>

        <option value="USD"> USD </option>

        <option value="EUR"> EUR </option>

    </select>
	<br><br>
 
	 <span class="col-md-3"> ტელეფონი </span> <input type="text" id="error" name="phone" maxlength = "9" type="text" style="width:250px; height:25px;">  
	<br><br>
	     <span id="errMsg" style="color: #FF0004; position: relative; margin-left: 100px; top: -20px;"></span>
<script>
 $(document).ready( function() {        
    var maxLen = 9;

    $('#error').keypress(function(event){
        var Length = $("#error").val().length;
        var AmountLeft = maxLen - Length;
        $('#txt-length-left').html(AmountLeft);
        if(Length >= maxLen){
            if (event.which != 8) {
                    $('#errMsg').text('ტელეფონის ველში მხოლოდ 9 ციფრის გამოყენება შეგიძლიათ');
                return false;
            }
        }
    });

 });

 </script>
	
<div style="background-color:#F3E6E7 " id="organization">
	სამუშაო გამოცდილება
	<div style="background-color:#D1D1D1 ">
	<br>
	 * ორგანიზაცია <input type="text" name="organization[]" type="text" style="width:250; height:25px;">  
	* პოზიცია <input type="text" name="position[]" type="text" style="width:250; height:25px;">  
	* მუშაობის პერიოდი 
		
		  <input  type="text" name="period_from[]" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_to[]" readonly class="calendar" size="6"/>
        -მდე  
		
		
 	
	<br> * დიპლომის ატვირთვა <b> (PDF ან სურათი)</b> <input type="file" name="upload2[]">
	<br>
	</div>
	 </div>
	<span onClick="addNewBlock('organization')">დაამატე ველი (თუ გსურს) <i class="fa fa-plus" aria-hidden="true"></i></span>
	 
	 <br><br>
	<div style="background-color:#F3E6E7 " id="organization_education">
	განათლება 
	<div style="background-color:#D3D3D3 ">
	<br>
	 * ორგანიზაცია <input type="text" name="organization_education[]" type="text" style="width:250; height:25px;">  
	* პოზიცია <input type="text" name="position_education[]" type="text" style="width:250; height:25px;"> 
	* მუშაობის პერიოდი<input  type="text" name="period_education_from[]" class="calendar" readonly size="6" />
        -დან  &nbsp;
        <input type="text" name="period_education_to[]" readonly class="calendar" size="6"/>
        -მდე   
	
	<br> * დიპლომის ატვირთვა <b> (PDF ან სურათი)</b> <input type="file" name="upload3[]">
	<br>
	</div>
	 </div>
	<span onClick="addNewBlock('organization_education')">დაამატე ველი (თუ გსურს) <i class="fa fa-plus" aria-hidden="true"></i></span> 
	 
	 
	 
	 </div>
	
	<br><br>
	
 
	
 </p>   
		  
		  
		  <br><br>
			 <div> 
				 <p style="font-size:16px; "> დამატებითი ინფორმაცია </p>
				 <textarea name="agwera" onkeypress="return makeGeo(this,event);" value="აღწერა" style="width: 100%; height: 150px;"> </textarea> </div> 
			  
  
      
 
		  
		  <br><br>
<?

$a=mysqli_query($conn,"select * from login where id='$_REQUEST[id]'");

$b=mysqli_fetch_array($a);



?>



<? echo $b['id']; ?>   





 <?php /*?><img src="<?=HTTP_HOST?>captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase;"/><?php */?> 

 
            

            

	 <input name="checkbox" type="hidden" id="geoKeys" checked="checked" />
 <input type="hidden" name="hash" value="<?=$hash?>">
		  <input type="hidden" name="status" value="1">
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "დარეგისტრირდი" style="width:250px; border:1px solid #8B8B8B; position:relative; left:95px; top:">


</FORM></p>	  
			  
			  
    </div>
    <div id="menu1" class="tab-pane fade">
		
		
		<h3>მომხმარებელი</h3>
      <p> 
		  <FORM NAME ="form1" METHOD ="POST" ACTION ="index.php?do=signup" style="position:relative; padding-top:50px;">

<span class="col-md-2"> სახელი და გვარი:</span> <INPUT TYPE = 'TEXT' Name ='username' required="" placeholder="სახელი გვარი"
 oninvalid="this.setCustomValidity('ეს ველი სავალდებულოა')"
 oninput="setCustomValidity('')" value="<?PHP print $uname;?>" style="width:250px; border:1px solid #8B8B8B;"> <br><br>
			  <span class="col-md-2"> პაროლი: </span> <INPUT TYPE = 'TEXT' Name ='password' required="" placeholder="პაროლი"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ ასოები და ციფრები, ბრჭყალები არ დაიშვება')"
 oninput="setCustomValidity('')"  value="<?PHP print $pword;?>" style="width:250px; border:1px solid #8B8B8B; position:relative;"> <br><br>
			  <span class="col-md-2"> ელფოსტა: </span> <INPUT TYPE = 'email' Name ='email' required="" placeholder="ელფოსტა"
 oninvalid="this.setCustomValidity('გთხოვთ შეიყვანოთ მოქმედი ელფოსტა')"
 oninput="setCustomValidity('')" value="<?PHP print $email;?>" style="width:250px; border:1px solid #8B8B8B; position:relative;">

<br><br>
			  
			  
			<span class="col-md-2">  <input type="hidden" name="status" value="0">
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "დარეგისტრირდი" style="width:420px; border:1px solid #8B8B8B; position:relative; top:">
	</span>

</FORM>
		  
		</p>
    </div>
     
     
  </div>
</div>




<span style="color: #FF0004"> <b> <?PHP print $errorMessage; ?> </b></span>
<br><br>
 
 


 
	</section>
	
<script>
	
	function addCalendarToElement(element)
	{
		$(element).datepicker({ 
			  changeMonth: true, 
			  changeYear: true,
			  altFormat: "yyyy/mm/dd",
			  dateFormat: "yy/mm/dd",
			  maxDate: "+0Y",
				onSelect: function(selected) {
				   $(element).datepicker("option","maxDate", selected)
				}
			});
	}
	function addCalendar()
	{
		$('.calendar').each(function(i, element){
			addCalendarToElement(element);
		})
	}
	 addCalendar();
  </script>