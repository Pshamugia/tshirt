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
if(isset($_GET['del']))
{
	$n = $_GET['del'] == 1 ? "" : $_GET['del'];
	mysqli_query($conn, "UPDATE kultura_cxrili set upload$n='' WHERE id='$_REQUEST[id]'");
}

$hash=md5(time().$_SESSION['USER_ID']);
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));

$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);

$redirect = false;

if (isset($_POST['submit']))
{
	
	if(md5(strtoupper($_POST["captcha"]))==$_SESSION["captcha_text"])
	{
	$date=date('d.m.Y'); 
  	
$res=mysqli_query($conn, "SELECT * FROM tmp_uploads WHERE hash='$_POST[hash]'");
while ($image=mysqli_fetch_assoc($res))
{
	if (resizeImage($image['path'], 'images/'.str_replace("tmp_uploads/","", $image['path'])))	
	{
		$b='images/'.str_replace("tmp_uploads/","", $image['path']);
		
		if(empty($data['upload']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload='$b' WHERE id='$_REQUEST[id]'");
			$data['upload'] = $b;
		}
		elseif(empty($data['upload2']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload2='$b' WHERE id='$_REQUEST[id]'");
			$data['upload2'] = $b;
		}
		
		
		elseif(empty($data['upload3']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload3='$b' WHERE id='$_REQUEST[id]'");
			$data['upload3'] = $b;
		}
		
		elseif(empty($data['upload4']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload4='$b' WHERE id='$_REQUEST[id]'");
			$data['upload4'] = $b;
		}
		
		elseif(empty($data['upload5']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload5='$b' WHERE id='$_REQUEST[id]'");
			$data['upload5'] = $b;
		}
		
		elseif(empty($data['upload6']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload6='$b' WHERE id='$_REQUEST[id]'");
			$data['upload6'] = $b;
		}
	}
}	
	
	

	if ($_POST['status']=1)
		
		{
			
		}	
			
$partyId=0;
$personId=0;
	 
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
			mysqli_query($conn, "UPDATE kultura_cxrili SET vip=$end_date WHERE id='$_GET[enable_vip]'");
 
	$sql="UPDATE kultura_cxrili SET kidva='$_REQUEST[kidva]', status='$_REQUEST[status]', ubani='$_REQUEST[ubani]',  kalaki='$_REQUEST[kalaki]', fasi='$_POST[fasi]', valuta='$_REQUEST[valuta]', favorite='$_REQUEST[favorite]', price_from='$_REQUEST[price_from]', price_to='$_REQUEST[price_to]', farti='$_REQUEST[farti]', misamarti='$_REQUEST[misamarti]', otaxi='$_REQUEST[otaxi]', sartuli='$_REQUEST[sartuli]', project='$_REQUEST[project]', mobiluri='$_REQUEST[mobiluri]', piri='$_REQUEST[piri]',  sazinebeli='$_REQUEST[sazinebeli]', aivani='$_REQUEST[aivani]', loji='$_REQUEST[loji]', veranda='$_REQUEST[veranda]', sveli='$_REQUEST[sveli]', airi='$_REQUEST[airi]', kondicioneri='$_REQUEST[kondicioneri]', wyali='$_REQUEST[wyali]',  cxeli='$_REQUEST[cxeli]', gatboba='$_REQUEST[gatboba]', farexi='$_REQUEST[farexi]', satavso='$_REQUEST[satavso]', tags='$_REQUEST[tags]', 
agweraEng='$_REQUEST[agweraEng]', agweraRuss='$_REQUEST[agweraRuss]', kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]',  eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]',  agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', ena='$_REQUEST[ena]', news_date='$_REQUEST[news_date]', mesakutris='$_REQUEST[mesakutris]',  view_count=".intval($_REQUEST[view_count]).", m_from='$_REQUEST[m_from]', m_to='$_REQUEST[m_to]', gadamowmebuli='$_REQUEST[gadamowmebuli]', lat='$_REQUEST[lat]', lng='$_REQUEST[lng]', location='$_REQUEST[location], update_date=".time()."'  WHERE id='$_REQUEST[id]'";
	
	mysqli_query($conn, $sql);

 //exit(mysqli_error($conn)); 
 
 
 
 
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
	<div> თუ გსურთ დაამატოთ ახალი განცხადება, დააჭირეთ  <a href="<?=url('gancxadeba','l3')?>"> ამ ლინკს </a> </div>
	<div> თუ გსურთ იხილოთ თქვენი განცხადება, დააჭირეთ <a href="index.php?do=full&id=<? echo $data['id'];?>"> ამ ლინკს </a> </div>
	<? } else {?> </div>
	
  <form action="" method="post" enctype="multipart/form-data" name="rame">
 
 
 
 
 <div style="100%">
 
 <input type="radio" name="mesakutris" <?=($data['mesakutris']=='1')?'checked':''?> value="0"> მაკლერი &nbsp; 
<input type="radio" name="mesakutris"   <?=($data['mesakutris']=='2')?'checked':''?> value="1"> მესაკუთრე &nbsp;  
 
 
<?php /*?><input type="radio" name="status" <?=($data['status']=='0')?'checked':''?> value="0">  უფასო განცხადება &nbsp; 
 <input type="radio" name="status" <?=($data['status']=='1')?'checked':''?> value="1">  SUPER VIP (ფასი 2 ლარი) &nbsp; 
<input type="radio" name="status" <?=($data['status']=='2')?'checked':''?> value="2">  VIP ფასი 1 ლარი) <?php */?>     
  </ch> </div>
 
 
 
 <div style="100%">
 <p>
     <select name="kidva" style="width:680px; height:35px; background-color:#F0F0F0;">
      <option <?=($data['kidva']=='იყიდება')?'selected':''?> value="იყიდება"> იყიდება </option>
      <option <?=($data['kidva']=='ქირავდება')?'selected':''?> value="ქირავდება"> ქირავდება </option>
      <option <?=($data['kidva']=='გირავდება')?'selected':''?> value="გირავდება"> გირავდება </option>
      <option <?=($data['kidva']=='ვიყიდი')?'selected':''?> value="ვიყიდი"> ვიყიდი </option>
 	  <option <?=($data['kidva']=='ვიქირავებ')?'selected':''?> value="ვიქირავებ"> ვიქირავებ </option>
      <option <?=($data['kidva']=='ვიგირავებ')?'selected':''?> value="ვიგირავებ"> ვიგირავებ </option>
      </select> 
   <span style="position:relative; left:13px; font-size:14px;"> ქმედების ფორმა </span>  
</p> </div>
  
 
   <div style="100%">
 <p>
  <select  name="kategory" style="width:680px; height:35px; background-color:#F0F0F0;">
         <option <?=($data['kategory']=='ბინა')?'selected':''?> value="ბინა"> ბინა </option>
         <option <?=($data['kategory']=='კარკასი')?'selected':''?> value="კარკასი"> კარკასი </option> 
         <option <?=($data['kategory']=='ნაკვეთი')?'selected':''?> value="ნაკვეთი"> მიწის ნაკვეთი </option>   
         <option <?=($data['kategory']=='კერძო')?'selected':''?> value="კერძო"> კერძო სახლი </option>
         <option <?=($data['kategory']=='კომერციული')?'selected':''?> value="კომერციული"> კომერციული ფართი </option>
      <option <?=($data['kategory']=='საოფისე')?'selected':''?> value="საოფისე"> საოფისე ფართი </option>
     
        </select>
  <span style="left:13px; font-size:14px; position:relative;">  კატეგორია </span>  </p></div>
    
	<div style="100%">
 <p>
	<select onchange="loadUbani(this.value)" name="kalaki" style="width:310px; height:35px; background-color:#F0F0F0;">
<? $res=mysqli_query ($conn, "SELECT * FROM kalaki");

while ($city = mysqli_fetch_assoc($res))
	{?>
<option <?=($city['id']==$data['kalaki'])?'selected':''?> value="<? echo $city['id'];?>"> <? echo $city['name'];?>  </option>
 <? } ?>

</select>

<select  name="ubani" id="ubani" style="width:310px; height:35px; background-color:#F0F0F0;"> 
	 <? $res=mysqli_query ($conn, "SELECT * FROM ubani where id='$data[ubani]';");

while ($ubani = mysqli_fetch_assoc($res))
	{?>
	 
<option value="<? echo $ubani['id'];?>"> <? echo $ubani['name'];?>  </option>
 <? } ?>
    </select>
	 
  </p></div>
  
  
<div style="100%">
 <p>
   <span ><textarea name="misamarti" type="text" size="33" style="width:680px; height:35px; background-color:#F0F0F0;">
   <? echo $data['misamarti']; ?>
      </textarea><span style="position:relative; top:-15px; left:15px;">ზუსტი მისამართი (ქუჩა, უბანი) </span></span><? echo "&nbsp;" ?>
  
</p></div>
  
<div style="100%">
 <p>
    <span ><textarea name="fasi" type="text" size="33" style="width:310px; height:35px; background-color:#F0F0F0;">
      <? echo $data['fasi']; ?></textarea><span style="position:relative; top:-15px; left:15px;">ფასი </span></span><? echo "&nbsp;" ?>
      
    <select  name="valuta" style="width:294px; height:35px; background-color:#F0F0F0; left:25px; top:-15px; position:relative;"> 
         <option <?=($data['valuta']=='GEL')?'selected':''?> value="GEL"> GEL </option>
         <option <?=($data['valuta']=='USD')?'selected':''?> value="USD"> USD </option> 
         <option <?=($data['valuta']=='EUR')?'selected':''?> value="EUR"> EUR </option>   
            
        </select>
    <span class="style16" style="position:relative; left:38px; font-size:14px; top:-15px;">ვალუტა</span> </p></div>
    
    <div style="100%">
 <p>
	<textarea name="farti" type="text" size="50" style="width:310px; height:35px; background-color:#F0F0F0;"> <? echo $data['farti']; ?> </textarea>  
     <span class="style16" style="position:relative; top:-14px; left:10px;">კვ.მ</span> 

    
    
    <select  name="otaxi" style="width:294px; height:35px; background-color:#F0F0F0; position:relative; top:-14px; left:36px;">
         <option <?=($data['otaxi']=='1')?'selected':''?> value="1"> 1 </option>
         <option <?=($data['otaxi']=='1.5')?'selected':''?> value="1.5"> 1.5 </option> 
         <option <?=($data['otaxi']=='2')?'selected':''?> value="2"> 2 </option> 
         <option <?=($data['otaxi']=='2.5')?'selected':''?> value="2.5"> 2.5 </option>
         <option <?=($data['otaxi']=='3')?'selected':''?> value="3"> 3 </option> 
         <option <?=($data['otaxi']=='3.5')?'selected':''?> value="3.5"> 3.5 </option> 
         <option <?=($data['otaxi']=='4')?'selected':''?> value="4"> 4 </option>
         <option <?=($data['otaxi']=='4.5')?'selected':''?> value="4.5"> 4.5 </option> 
         <option <?=($data['otaxi']=='5')?'selected':''?> value="5"> 5 </option>          
         <option <?=($data['otaxi']=='5+')?'selected':''?> value="5+"> 5+ </option> 
           
            
        </select>
    
     
  <span style="position:relative; top:-15px; left:47px; font-size:14px;">  ოთახი </span>
	    </p></div>
	
    
  <div style="100%">
 <p>
    <textarea name="sartuli" type="text" placeholder="სართული" style="width:675px; position:relative; height:33px; background-color:#F0F0F0;">
     <? echo $data['sartuli']; ?> </textarea>
  <span style="position:relative; top:-30px; left:13px; font-size:14px;"> სართული </span> </p></div>
     
   
      <div style="100%">
 <p>
	<select name="project" style="width:680px; height:35px; background-color:#F0F0F0;">
      <option <?=($data['project']=='ინდივიდუალური')?'selected':''?> value="ინდივიდუალური"> ინდივიდუალური </option>
      <option <?=($data['project']=='ჩეხური')?'selected':''?> value="ჩეხური"> ჩეხური </option>
      <option <?=($data['project']=='იტალიური')?'selected':''?> value="იტალიური"> იტალიური</option>
      <option <?=($data['project']=='ხრუშოვის')?'selected':''?> value="ხრუშოვის"> ხრუშოვის </option>
      <option <?=($data['project']=='ლვოვის')?'selected':''?> value="ლვოვის"> ლვოვის</option>
      <option <?=($data['project']=='თუხარელის')?'selected':''?> value="თუხარელის"> თუხარელის </option>
      <option <?=($data['project']=='თუხარელის')?'selected':''?> value="მოსკოვის"> მოსკოვის</option>
      <option <?=($data['project']=='კიევის')?'selected':''?> value="კიევის"> კიევის </option>
      <option <?=($data['project']=='ლენინგრადის')?'selected':''?> value="ლენინგრადის"> ლენინგრადის</option>
      <option <?=($data['project']=='ქალაქური')?'selected':''?> value="ქალაქური"> ქალაქური </option>
	  <option <?=($data['project']=='სხვა')?'selected':''?> value="სხვა"> სხვა</option>
    </select> <span style="position:relative; left:13px; font-size:14px;"> ბინის პროექტი </span> </p></div>
	
	
  <div style="100%">
 <p>
    <textarea name="mobiluri" type="text"  style="width:675px; height:35px; background-color:#F0F0F0;"> <? echo $data['mobiluri']; ?> </textarea>
   <span style="position:relative; top:-15px; left:13px; font-size:14px;"> მობილური </span> </p></div>
 
  <div style="100%">
 <p>
    <textarea name="piri" type="text" style="width:675px; height:35px; background-color:#F0F0F0;"> <? echo $data['piri']; ?></textarea>
   <span style="position:relative; top:-15px; left:13px; font-size:14px;"> საკონტაქტო პირი </span>
   
  </p> </div> 
    <div style="100%">
 <p>
  <? 
  $max_files=6;
  if (!empty($data['upload'])) { $max_files--;?>
 1 სურათი <img src="<?=HTTP_HOST?><?=$data['upload']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=1"> წაშლა </a> <br><br> <? } ?>
  
    <? if (!empty($data['upload2'])) { $max_files--;?>
 2 სურათი	<img src="<?=HTTP_HOST?><?=$data['upload2']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=2"> წაშლა </a><br><br> <? } ?>

  <? if (!empty($data['upload3'])) { $max_files--;?>
  3 სურათი <img src="<?=HTTP_HOST?><?=$data['upload3']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=3"> წაშლა </a><br> <br><? } ?>


  <? if (!empty($data['upload4'])) { $max_files--;?>
  4 სურათი <img src="<?=HTTP_HOST?><?=$data['upload4']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=4"> წაშლა </a><br> <br><? } ?>

  <? if (!empty($data['upload5'])) { $max_files--;?>
  5 სურათი <img src="<?=HTTP_HOST?><?=$data['upload5']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=5"> წაშლა </a><br> <br><? } ?>
 
 
 
   <? if (!empty($data['upload6'])) { $max_files--;?>
  6 სურათი  <img src="<?=HTTP_HOST?><?=$data['upload6']?>" width="100"/> <a href="<?=HTTP_HOST?>statements/index.php?do=edit&id=<?=$_GET["id"]?>&del=6"> წაშლა </a><br><br> <? } ?>
  
  <!--Image Uploader Jquery-->

    <!-- Fine Uploader New/Modern CSS file
    ====================================================================== -->
    <link href="<?=HTTP_HOST?>fine-uploader/fine-uploader-new.css" rel="stylesheet">

    <!-- Fine Uploader JS file
    ====================================================================== -->
    <script src="<?=HTTP_HOST?>fine-uploader/fine-uploader.js"></script>

    <!-- Fine Uploader Thumbnails template w/ customization
    ====================================================================== -->
    <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>მონიშნე სურათები</div>
                </div>
                <?php /*?><button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> Upload
                </button><?php */?>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;
            font-size: 14px;
            padding: 7px 20px;
            background-image: none;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
    </style>
    
 
  <!-- Fine Uploader DOM Element
    ====================================================================== -->
    <div id="fine-uploader-manual-trigger"></div>

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '<?=HTTP_HOST?>uploader.php?hash=<?=$hash?>'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '<?=HTTP_HOST?>fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: '<?=HTTP_HOST?>fine-uploader/placeholders/not_available-generic.png'
                }
            },
            autoUpload: true,
			validation: {
                allowedExtensions: ['jpeg', 'JPEG', 'jpg', 'JPG', 'gif', 'GIF', 'PNG', 'png'],
				itemLimit: <? echo $max_files;?>
            },
            debug: true
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>
 
 
 <!--END of Image Uploader Jquery-->   
      
</p></div>
 
  
  <div style="100%">
 <p>
    <textarea name="sazinebeli" type="text" placeholder="საძინებელი" style="width:675px; margin-bottom:15px; position:relative; margin-top:-30px; height:33px; background-color:#F0F0F0;"> </textarea>
  <? echo $data['sazinebeli']; ?> <span style="position:relative; top:-30px; left:13px; font-size:14px;"> საძინებელი </span>
 </p></div>
   
  <div style="100%">
 <p>
<input type="radio" name="aivani" <?=($data['aivani']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="aivani"   <?=($data['aivani']=='1')?'checked':''?> value="1"> კი &nbsp;     აივანი  
   </p></div>
      
        <div style="100%">
 <p>
  <input type="radio" name="loji" <?=($data['loji']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="loji"   <?=($data['loji']=='1')?'checked':''?> value="1"> კი &nbsp;     
       ლოჯი  
    </p></div>
      
      
       <div style="100%">
 <p>
  <input type="radio" name="veranda" <?=($data['veranda']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="veranda"   <?=($data['veranda']=='1')?'checked':''?> value="1"> კი &nbsp;       
       ვერანდა  
  </p></div>
      
     
       <div style="100%">
 <p>
 <input type="radio" name="sveli" <?=($data['sveli']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="sveli"   <?=($data['sveli']=='1')?'checked':''?> value="1"> კი &nbsp;       
   სველი წერტილი
  </p></div> 
      
        <div style="100%">
 <p>
 <p>
 <input type="radio" name="airi" <?=($data['airi']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="airi"   <?=($data['airi']=='1')?'checked':''?> value="1"> კი &nbsp;    
       ბუნებრივი აირი  
    </p></div>
      
            <div style="100%">
 <p>
 
 <input type="radio" name="kondicioneri" <?=($data['kondicioneri']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="kondicioneri"   <?=($data['kondicioneri']=='1')?'checked':''?> value="1"> კი &nbsp;     
      <span>კონდიციონერი </span>
     </p></div>
      
           
         <div style="100%">
 <p>
  <input type="radio" name="cxeli" <?=($data['cxeli']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="cxeli"   <?=($data['cxeli']=='1')?'checked':''?> value="1"> კი &nbsp;   
      <span>ცხელი წყალი </span>
   </p></div>
      
        <div style="100%">
 <p> <input type="radio" name="gatboba" <?=($data['gatboba']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="gatboba"   <?=($data['gatboba']=='1')?'checked':''?> value="1"> კი &nbsp;      
      <span>გათბობა</span>
  </p></div>
      
         <div style="100%">
 <p> <input type="radio" name="farexi" <?=($data['farexi']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="farexi"   <?=($data['farexi']=='1')?'checked':''?> value="1"> კი &nbsp;       
      <span>ავტოფარეხი</span>
     </p. ></div>
      
      
        <div style="100%">
 <p><input type="radio" name="satavso" <?=($data['satavso']=='0')?'checked':''?> value="0"> არა &nbsp; 
<input type="radio" name="satavso"   <?=($data['satavso']=='1')?'checked':''?> value="1"> კი &nbsp;      
      <span>სათავსო</span>
   </p></div>
   
   
     <div style="100%">
 <p>
    <textarea name="agwera" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"><? echo $data['agwera']; ?></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;"> 
	 განცხადების ტექსტი [ქართულად] </span> 
</p></div>

  <div style="100%">
 <p>
    
    <textarea name="agweraEng" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"><? echo $data['agweraEng']; ?></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;">
	განცხადების ტექსტი [ინგლისურად] </span> 
  </p></div>
    
      <div style="100%">
 <p>
    <textarea name="agweraRuss" onkeypress="return makeGeo(this,event);"  class="style7" style="width:675px; height:100px; background-color:#F0F0F0;"><? echo $data['agweraRuss']; ?></textarea> <span style="position:relative; top:-45px; left:13px; font-size:14px;">
    განცხადების ტექსტი [რუსულად] </span> 
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

<?php /*?><? echo $b['id']; ?>   <?php */?>


 <img src="../captcha.php"> <input type="text" name="captcha" style="text-transform:uppercase;"/> 
 

            
            
	  <input type="hidden" name="hash" value="<?=$hash?>">
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
