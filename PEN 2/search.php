<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #0066CC}
-->
</style>
<style> @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
    }
	
	@media only screen and (max-device-width: 480px) {
       .ziritadi{
            max-width:330px;
			align:left;
        }

        div#header {
            background-image: url(media-queries-phone.jpg);
            height: 93px;
            position: relative;
        }

        div#header h1 {
            font-size: 140%;
        }

        #content {
            float: none;
            width: 100%;
        }

        #navigation {
            float:none;
            width: auto;
        }
    }
	
 
		#im007 {
   transition: all .2s ease-in-out;
}

.cover007 {
  width: 100%;
  object-fit: cover;

}
.cover007:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


 
	 </style>
     
     
     
    <!-- Banner area end -->
<!-- Main container start -->
<section id="main-container">
	<div class="container">
		<div class="row">
			<!-- Blog start -->
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<!-- Blog post start -->
				<div class="post-content">
					<!-- post image start -->
					<div class="post-image-wrapper">
	
	
	<table width="100%" align="center" style="min-height:500px;  position:relative;">
<tr>
<td valign="top" align="left"> 
<h2 style="position:relative; margin-top:60px;"> 
	
	 <div style="position:relative; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <li style="position:relative; padding-left:15px; list-style: none"> <? echo $LANG['result']; ?> </li>  </b> </div> </h2>
<br /> <br /> 
<?
		if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }
$tmp_where = '';
if (isset($_GET['tag']))
$tmp_where = "tags_geo LIKE '%,$_GET[tag]%' OR tags_eng LIKE '%,$_GET[tag]%' AND kategory!='მორბენალი სტრიქონი'";
if (isset($_POST['text']) && !empty($_POST['text']))   
{
	$searchText = mysqli_real_escape_string($conn, $_REQUEST['text']);
	$tmp_where .= '(';
	$res=mysqli_query($conn, "select * from  avtorebi where avtori  LIKE  '%$searchText%'");
			while($data=mysqli_fetch_assoc($res))
			{
				$tmp_where .= " avtori='$data[id]' OR";
			}
	$tmp_where .= " agwera_$_SESSION[LANG] LIKE '%$searchText%' OR satauri_$_SESSION[LANG] LIKE '%$searchText%' OR tags_geo LIKE '%$searchText%' OR tags_eng LIKE '%$searchText%' OR full_$_SESSION[LANG]  LIKE '%$searchText%') AND hidden='0' AND satauri_$_SESSION[LANG]!=''";					
}


if(isset($_POST['search_category']) && !empty($_POST['search_category'])){
	$searchCategory =  mysqli_real_escape_string ($conn, $_POST['search_category']);
	if(!empty($tmp_where)){
		$tmp_where .= ' and ';	
	}
	$tmp_where .= " `kategory` like '%$searchCategory%'";
}

$where=" where ".$tmp_where; 
$a=mysqli_query($conn, "SELECT * from kultura_cxrili ".$where."");
while ($b=mysqli_fetch_array($a))
{
$avt=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$f=mysqli_fetch_array($avt);
?>     </div>
</div></td>
<tr>
		<style>
 .hov 
 { 
height:auto; 
width:100%; 
 
position:relative;  
}


 .hov:hover
 { 
height:auto;
width:100%; ; 
 background-color:#F0F0F0;
position:relative;  
}


 
 </style>
<td valign="top" class="hov cl12" onclick="javascript:location.href='index.php?do=full&id=<?=$b['id']?>';"  style="position:relative; cursor: pointer; display: inline-block; border:1px solid #E0E0E0;   width: 100%; margin-bottom: 15px;">

	

	
	
<style>
	
	
		#im123 {
  height: 100px;
  transition: all .2s ease-in-out;
}

.cover123 {
  width: 150px;
  object-fit: cover;
   
}
.cover123:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
}
 </style>
 
<img src="<?=HTTP_HOST?><? echo $b['upload']; ?>" onclick="javascript:location.href='index.php?do=full&id=<?=$b['id']?>';" id="im123" class="cover123" style="position:relative; margin-bottom:15px; margin-top:15px; margin-left: 15px;  cursor: pointer">    

 <div class="cl8" style="position:relative; display: inline-block; font-size:12px;   margin-left:10px; margin-top:15px; padding-right: 15px "> 
<a href="index.php?do=full&id=<?=$b['id']?>" class="cl8">   
 <k style="position: relative; "><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
	 <? echo $b["satauri_$_SESSION[LANG]"]; ?> </k>  </a></div>
 
	<? }?>  </td></tr></table> </div>
					<!-- Author info end -->

					 

				  
				</div><!-- Blog post end -->
			</div>
			<!--/ Content col end -->

			<!-- sidebar start -->
			 
		</div>
		<!--/ row end -->
	</div>
	<!--/ container end -->
</section><!-- Blog details page end -->


<div class="gap-40"></div>
 
 

</div><!-- Body inner end -->

</div>
  </div>  
</div> </div> </div>