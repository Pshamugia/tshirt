<script>
function loadUbani(city_id)
{
	$.getJSON('<?=HTTP_HOST?>ajax.php?id='+city_id, function(json)
	{
		$('#ubani').empty();
		$('#ubani').append('<option value="0">უბანი</option>');
		for(var i=0; i<json.length; i++)
		{
			$('#ubani').append('<option value="'+json[i].id+'">'+json[i].name+'</option>');
		}
	});
	
}

</script>
<?php
$redirect = false;
if (isset($_POST['submit']))
{
	
	if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"])
	{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 
	$b2='images/'.$_FILES['upload2']['name']; 
	$b3='images/'.$_FILES['upload3']['name']; 
	$b4='images/'.$_FILES['upload4']['name']; 
  	
	if (move_uploaded_file($_FILES['upload']['tmp_name'], 'images/'.$_FILES['upload']['name']))
	{$b='images/'.$_FILES['upload']['name']; }
	else
	$b='images/'.$_FILES['upload']['name']; 
		
		
		if (move_uploaded_file($_FILES['upload2']['tmp_name'], 'images/'.$_FILES['upload2']['name']))
	{$b2='images/'.$_FILES['upload2']['name']; }
	else
$b2='images/'.$_FILES['upload2']['name']; 

	
	if (move_uploaded_file($_FILES['upload3']['tmp_name'], 'images/'.$_FILES['upload3']['name']))
	{$b3='images/'.$_FILES['upload3']['name']; }
	else
$b3='images/'.$_FILES['upload3']['name']; 
	
	if (move_uploaded_file($_FILES['upload4']['tmp_name'], 'images/'.$_FILES['upload4']['name']))
	{$b4='images/'.$_FILES['upload4']['name']; }
	else
	$b4='images/'.$_FILES['upload4']['name']; 
	
	
		if (move_uploaded_file($_FILES['upload5']['tmp_name'], 'images/'.$_FILES['upload5']['name']))
	{$b4='images/'.$_FILES['upload5']['name']; }
	else
	$b5='images/'.$_FILES['upload5']['name']; 
	
	
		if (move_uploaded_file($_FILES['upload6']['tmp_name'], 'images/'.$_FILES['upload6']['name']))
	{$b6='images/'.$_FILES['upload6']['name']; }
	else
	$b6='images/'.$_FILES['upload6']['name']; 
	

	if ($_POST['status']=1)
		
		{
			
		}	
			
$partyId=0;
$personId=0;
	
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
$sql="insert into kultura_cxrili 
(kidva, status, ubani, kalaki, fasi, valuta, farti, otaxi, sartuli, project, mobiluri, piri, upload, upload2, 
upload3, upload4, upload5, upload6, sazinebeli, aivani, loji, 
veranda, sveli, airi, kondicioneri, cxeli, gatboba, farexi, 
satavso, tags, agweraEng, agweraRuss, kategory, subkat, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, 
full, ena, menu, date, news_date, lat, lng, location, user_id, suratit, mesakutris) values('$_REQUEST[kidva]', '$_REQUEST[status]', '$_REQUEST[ubani]', '$_REQUEST[kalaki]', 
'$_REQUEST[fasi]', '$_REQUEST[valuta]', '$_REQUEST[farti]', '$_REQUEST[otaxi]', '$_REQUEST[sartuli]', '$_REQUEST[project]',
'$_REQUEST[mobiluri]', '$_REQUEST[piri]', '$b', '$b2', '$b3', '$b4', '$b5', '$b6', '$_REQUEST[sazinebeli]', '$_REQUEST[aivani]',
'$_REQUEST[loji]', '$_REQUEST[veranda]', '$_REQUEST[sveli]', '$_REQUEST[airi]', '$_REQUEST[kondicioneri]', '$_REQUEST[cxeli]',
'$_REQUEST[gatboba]', '$_REQUEST[farexi]', '$_REQUEST[satavso]', '$_REQUEST[tags]', '$_REQUEST[agweraEng]', '$_REQUEST[agweraRuss]', 
'$_REQUEST[kategory]', '$_REQUEST[subkat]', '$_POST[eng_geo]', '$_POST[img_description]', 
'$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', 
'$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '$_REQUEST[news_date]', '$_REQUEST[lat]', '$_REQUEST[lng]', '".mysqli_real_escape_string($conn, $_REQUEST["location"])."', $_SESSION[USER_ID], '$_REQUEST[suratit]', '$_REQUEST[mesakutris]')";

mysqli_query($conn, $sql);
 
$redirect = true;

 
	}
	else
		echo '<script>alert("დამცავი კოდი არასწორია");</script>';
}




if ($_POST['delete'])
{
$x=mysqli_query($conn,"select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn,"DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>


<section class="ftco-section">
      <div class="container">
      
       
      
		  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>
 
	<div>
	<? if ($redirect) { ?>
	<div> თქვენი განცხადება წარმატებით დაემატა. გმადლობთ </div>
	<div> თუ გსურთ იხილოთ თქვენი განცხადება, დააჭირეთ <a href="<?=url('gancxadeba','l3')?>"> ამ ლინკს </a> </div>
	<div> თუ გსურთ დაამატოთ ახალი განცხადება, დააჭირეთ <a href="index.php?do=damateba"> ამ ლინკს </a> </div>
	<? } else {?> </div>
	
  <form action="" method="post" enctype="multipart/form-data" name="rame">
 
 
 
 
 <div style="100%">
 <input type="radio" name="status" value="0" checked> უფასო განცხადება &nbsp; 
 <input type="radio" name="status" value="1"> SUPER VIP (ფასი 2 ლარი) &nbsp; 
 <input type="radio" name="status" value="2"> VIP ფასი 1 ლარი)      
  </ch> </div>
 
 
 
 <div style="100%">
 <p>
     <select name="kidva" style="width:680px; height:35px; background-color:#F0F0F0;">
      <option value="იყიდება"> იყიდება </option>
      <option value="ქირავდება"> ქირავდება </option>
      <option value="გირავდება"> გირავდება </option>
	  <option value="ვიყიდი"> ვიყიდი </option>
	  <option value="ვიქირავებ"> ვიქირავებ </option>
	  <option value="ვიგირავებ"> ვიგირავებ </option>
    </select>
   <span style="position:relative; left:13px; font-size:14px;"> ქმედების ფორმა </span>  
</p> </div>
  
 
   <div style="100%">
 <p>
  <select  name="kategory" style="width:680px; height:35px; background-color:#F0F0F0;">
      <option value="ბინა">ბინა</option>
      <option value="კარკასი">კარკასი</option>
      <option value="ნაკვეთი">მიწის ნაკვეთი </option>
      <option value="კერძო">კერძო სახლი</option>
      <option value="კომერციული"> კომერციული ფართი </option>
      <option value="საოფისე"> საოფისე ფართი </option>
	    </select>
  <span style="left:13px; font-size:14px; position:relative;">  კატეგორია </span>  </p></div>
    
	<div style="100%">
 <p>
	<select onchange="loadUbani(this.value)"  name="kalaki" style="position:relative; border:1px solid #3c4446; border-radius:3px; margin-right:5px; color:#3c4446;">
<option value="0">მდებარეობა </option>

<?php 

$res=mysqli_query ($conn, "SELECT * FROM kalaki");
while ($city = mysqli_fetch_assoc($res))
	
echo '<option value="'.$city['name'].'">'.$city['name'].'</option>';

 ?>

</select>

<select  name="ubani" id="ubani" style="position:relative; border:1px solid #3c4446; border-radius:3px; margin-right:5px; color:#3c4446;">
<option value="0">უბანი </option>
     
    </select>
	 
  </p></div>
  
  
<div style="100%">
 <p>
   <span ><textarea name="misamarti" type="text" size="33" style="width:680px; height:35px; background-color:#F0F0F0;">
      </textarea><span style="position:relative; top:-15px; left:15px;">მისამართის დაზუსტება </span></span><? echo "&nbsp;" ?>
  
</p></div>
  
<div style="100%">
 <p>
    <span ><textarea name="fasi" type="text" size="33" style="width:310px; height:35px; background-color:#F0F0F0;">
      </textarea><span style="position:relative; top:-15px; left:15px;">ფასი </span></span><? echo "&nbsp;" ?>
      
    <select name="valuta" style="width:294px; height:35px; background-color:#F0F0F0; left:25px; top:-15px; position:relative;"> 
	    <option value="GEL"> GEL </option>
        <option value="USD"> USD </option>
        <option value="EUR"> EUR </option>
    </select>
    <span class="style16" style="position:relative; left:38px; font-size:14px; top:-15px;">ვალუტა</span> </p></div>
    
    <div style="100%">
 <p>
	<textarea name="farti" type="text" size="50" style="width:310px; height:35px; background-color:#F0F0F0;"> </textarea>  
     <span class="style16" style="position:relative; top:-14px; left:10px;">კვ.მ</span> 

    
    <select name="otaxi" style="width:294px; height:35px; background-color:#F0F0F0; position:relative; top:-14px; left:36px;">
      <option value="1"> 1 </option>
      <option value="1.5"> 1.5 </option>
      <option value="2"> 2 </option>
      <option value="2.5"> 2.5 </option>
      <option value="3"> 3 </option>
      <option value="3.5"> 3.5 </option>
      <option value="4"> 4 </option>
      <option value="4.5"> 4.5 </option>
      <option value="5"> 5 </option>
      <option value="5+"> 5+ </option>
    </select>
  <span style="position:relative; top:-15px; left:47px; font-size:14px;">  ოთახი </span>
	    </p></div>
	
    
  <div style="100%">
 <p>
    <textarea name="sartuli" type="text" placeholder="სართული" style="width:675px; position:relative; height:33px; background-color:#F0F0F0;"> </textarea>
   <span style="position:relative; top:-30px; left:13px; font-size:14px;"> სართული </span> </p></div>
     
   
      <div style="100%">
 <p>
	<select name="project" style="width:680px; height:35px; background-color:#F0F0F0;">
      <option value="ინდივიდუალური"> ინდივიდუალური </option>
      <option value="ჩეხური"> ჩეხური </option>
      <option value="იტალიური"> იტალიური</option>
      <option value="ხრუშოვის"> ხრუშოვის </option>
      <option value="ლვოვის"> ლვოვის</option>
      <option value="თუხარელის"> თუხარელის </option>
      <option value="მოსკოვის"> მოსკოვის</option>
      <option value="კიევის"> კიევის </option>
      <option value="ლენინგრადის"> ლენინგრადის</option>
      <option value="ქალაქური"> ქალაქური </option>
	  <option value="სხვა"> სხვა</option>
    </select> <span style="position:relative; left:13px; font-size:14px;"> ბინის პროექტი </span> </p></div>
	
	
  <div style="100%">
 <p>
    <textarea name="mobiluri" type="text"  style="width:675px; height:35px; background-color:#F0F0F0;"> </textarea>
   <span style="position:relative; top:-15px; left:13px; font-size:14px;"> მობილური </span> </p></div>
 
  <div style="100%">
 <p>
    <textarea name="piri" type="text" style="width:675px; height:35px; background-color:#F0F0F0;"> </textarea>
   <span style="position:relative; top:-15px; left:13px; font-size:14px;"> საკონტაქტო პირი </span>
   
  </p> </div> 
    <div style="100%">
 <p>
  <?
// print_r($_FILES);
if($_FILES['upload']['type']=='image/jpeg' or $_FILES['upload']['type']=='image/gif' or $_FILES['upload']=='image/jpg' or $_FILES['upload']=='image/jpeg' or $_FILES['upload']=='image/JPEG' or $_FILES['upload']=='image/png') 
echo $_FILES['upload']['type'];

if($_FILES['upload2']['type']=='image/jpeg' or $_FILES['upload2']['type']=='image/gif' or $_FILES['upload2']=='image/jpg' or $_FILES['upload2']=='image/jpeg' or $_FILES['upload2']=='image/JPEG' or $_FILES['upload2']=='image/png') 
echo $_FILES['upload2']['type'];



if($_FILES['upload3']['type']=='image/jpeg' or $_FILES['upload3']['type']=='image/gif' or $_FILES['upload3']=='image/jpg' or $_FILES['upload3']=='image/jpeg' or $_FILES['upload3']=='image/JPEG' or $_FILES['upload3']=='image/png') 
echo $_FILES['upload3']['type'];


if($_FILES['upload4']['type']=='image/jpeg' or $_FILES['upload4']['type']=='image/gif' or $_FILES['upload4']=='image/jpg' or $_FILES['upload4']=='image/jpeg' or $_FILES['upload4']=='image/JPEG' or $_FILES['upload4']=='image/png') 
echo $_FILES['upload4']['type'];


if($_FILES['upload5']['type']=='image/jpeg' or $_FILES['upload5']['type']=='image/gif' or $_FILES['upload5']=='image/jpg' or $_FILES['upload5']=='image/jpeg' or $_FILES['upload5']=='image/JPEG' or $_FILES['upload5']=='image/png') 
echo $_FILES['upload5']['type'];

if($_FILES['upload6']['type']=='image/jpeg' or $_FILES['upload6']['type']=='image/gif' or $_FILES['upload6']=='image/jpg' or $_FILES['upload6']=='image/jpeg' or $_FILES['upload6']=='image/JPEG' or $_FILES['upload6']=='image/png') 
echo $_FILES['upload6']['type'];

else echo '';
?>
      <input type="file" size="51"  value="ატვირთვა" name="upload" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span style="position:relative; left:13px; font-size:14px; top:6px;">ფოტო 1 </span><br> <p>
      <input type="file" size="51"  value="ატვირთვა" name="upload2" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span  style="position:relative; left:13px; top:6px; font-size:14px;">ფოტო 2 </span><br><p>
      <input type="file" size="51"  value="ატვირთვა" name="upload3" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span style="position:relative; left:13px; font-size:14px; top:6px;">ფოტო 3 </span><br><p>
    
      <input type="file" size="51"  value="ატვირთვა" name="upload4" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span style="position:relative; left:13px; font-size:14px; top:6px;">ფოტო 4 </span><br><p>
   
      <input type="file" size="51"  value="ატვირთვა" name="upload5" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span style="position:relative; left:13px; font-size:14px; top:6px;">ფოტო 5 </span><br><p>
      <span>
      <input type="file" size="51"  value="ატვირთვა" name="upload6" style="width:680px; height:35px; background-color:#F0F0F0;">
      <span style="position:relative; left:13px; font-size:14px; top:6px;">ფოტო 6 </span></span><br>
      
    
      
</p></div>
 
  
  <div style="100%">
 <p>
    <textarea name="sazinebeli" type="text" placeholder="საძინებელი" style="width:675px; margin-bottom:15px; position:relative; margin-top:-30px; height:33px; background-color:#F0F0F0;"> </textarea>
   <span style="position:relative; top:-30px; left:13px; font-size:14px;"> საძინებელი </span>
 </p></div>
   
  <div style="100%">
 <p>
  <input type="radio" name="aivani" value="0" checked> არა &nbsp; <input type="radio" name="aivani" value="1"> კი &nbsp;    აივანი  
   </p></div>
      
        <div style="100%">
 <p>
  <input type="radio" name="loji" value="0" checked> არა &nbsp; <input type="radio" name="loji" value="1"> კი &nbsp;    
       ლოჯი  
    </p></div>
      
      
       <div style="100%">
 <p>
  <input type="radio" name="veranda" value="0" checked> არა &nbsp; <input type="radio" name="veranda" value="1"> კი &nbsp;    
       ვერანდა  
  </p></div>
      
     
       <div style="100%">
 <p>
  <input type="radio" name="sveli" value="0" checked> 1 &nbsp; <input type="radio" name="sveli" value="1"> 2 &nbsp; 
  <input type="radio" name="sveli" value="2">  3 &nbsp;    
       სველი წერტილი  
  </p></div>
      
        <div style="100%">
 <p>
  <input type="radio" name="airi" value="0" checked> არა &nbsp; <input type="radio" name="airi" value="1"> კი &nbsp;    
       ბუნებრივი აირი  
    </p></div>
      
            <div style="100%">
 <p>
 
 <input type="radio" name="kondicioneri" value="0" checked> არა &nbsp; <input type="radio" name="kondicioneri" value="1"> კი &nbsp;    
      <span>კონდიციონერი </span>
     </p></div>
      
           
         <div style="100%">
 <p>
 <input type="radio" name="cxeli" value="0" checked> არა &nbsp; <input type="radio" name="cxeli" value="1"> კი &nbsp;     
      <span>ცხელი წყალი </span>
   </p></div>
      
        <div style="100%">
 <p> <input type="radio" name="gatboba" value="0" checked> არა &nbsp; <input type="radio" name="gatboba" value="1"> კი &nbsp;    
      <span>გათბობა</span>
  </p></div>
      
         <div style="100%">
 <p> <input type="radio" name="farexi" value="0" checked> არა &nbsp; <input type="radio" name="farexi" value="1"> კი &nbsp;     
      <span>ავტოფარეხი</span>
     </p. ></div>
      
      
        <div style="100%">
 <p><input type="radio" name="satavso" value="0" checked> არა &nbsp; <input type="radio" name="satavso" value="1"> კი &nbsp;     
      <span>სათავსო</span>
   </p></div>
   
   
     <div style="100%">
 <p>
    <textarea name="agwera" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;">განცხადების ტექსტი [ქართულად] </span> 
</p></div>

  <div style="100%">
 <p>
    
    <textarea name="agweraEng" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;">განცხადების ტექსტი [ინგლისურად] </span> 
  </p></div>
    
      <div style="100%">
 <p>
    <textarea name="agweraRuss" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;">განცხადების ტექსტი [რუსულად] </span> 
 </p></div>
    
    <input type="hidden" name="login">
    <input type="hidden" name="user" value="<? echo $_REQUEST['user']?>">
    <input type="hidden" name="password"  value="<? echo $_REQUEST['password']?>">
    <input name="checkbox" type="checkbox" id="geoKeys" checked="checked" />
  <span class="style9" style="font-size:12px;">ქართული კლავიატურა </span>
  <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>" />
  <p class="style13"></p>

            </p>
		 
			 
		<?
$a=mysqli_query($conn,"select * from kultura_cxrili where id='$_REQUEST[id]'");
$b=mysqli_fetch_array($a);

?>

<? echo $b['id']; ?>   


 <img src="captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase;"/> 
 

            
            
	 
			<input type="submit" name="submit" value="გამოქვეყნება">
		</form>
			 
	<? } ?>
   

<? 
if (!($_POST['submit'] && $redirect))
{
echo "ყურადღებით შეავსეთ ველები";
} 
?>


  </form>
 
</div></div> 
 
 
 
 
   
 
 
</div> 
