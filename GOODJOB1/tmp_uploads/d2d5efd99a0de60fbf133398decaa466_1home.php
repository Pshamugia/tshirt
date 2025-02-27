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
		$('._ubani').trigger('chosen:updated');
	});
	
}
function changeCurrency(id)
{
	if($('#price_GEL_'+id).css('display') != 'none')
	{
		$('#price_GEL_'+id).hide();
		$('#price_USD_'+id).show();
	}
	else
	{
		$('#price_GEL_'+id).show();
		$('#price_USD_'+id).hide();
	}
}
</script>
<style>
.tooltip{
	opacity:1
}
</style>

<style>
.carousel .carousel-control { visibility: hidden; }
.carousel:hover .carousel-control { visibility: visible; }
.carousel .carousel-indicators { visibility: hidden; }
.carousel:hover .carousel-indicators { visibility: visible; }

.form-border
{
	  margin: 0!important;
    padding: 0!important;
	border-right:1px solid #C0C0C0;
}
.form-border select,input
{
	width:100%;
	height:45px;
	border: 1px #FFF solid;
}
</style>
<section class="hero-wrap" style="background-image:url(IMG/header4.jpg); height:390px;" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
 
           
          		  <div style="width:auto; display:table;" align="center">
    <div style="display: table-row;" align="center">
    
     <div align="left" style="" class="saziebo">
     <div style="padding:15px; border-radius:3px;">    
     <div style="background-color:#FFFFFF; border-radius:3px;">
     
     <style> 
@font-face { font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('FONTS/bpg_algeti_compact.ttf');  }   form { font-family:bpg_algeti_compact, sans-serif; font-size:14px; }    </style>

     
     <form action="<?=HTTP_HOST?>index.php?do=search&" method="post" name="rame" style="padding-left:15px; padding-right:15px; height:45px;">
	 <div class="row">
	
	 <div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
     
 
<script src='<?=HTTP_HOST?>chosen/chosen.jquery.min.js' type='text/javascript'></script>
<style>
.chosen-container
{
	position:relative;display:inline-block;vertical-align:middle;  
font-size:13px;-webkit-user-select:none;-moz-user-select:none;user-select:none;  
}

.chosen-container *{
	-webkit-box-sizing:border-box; 
	}
.chosen-container .chosen-drop
{
	position:absolute;top:100%;left:-9999px;z-index:1010;
width:auto;border:1px solid #aaa;border-top:0;background:#fff;box-shadow:0 4px 5px rgba(0,0,0,.15)
}
.chosen-container.chosen-with-drop .chosen-drop{left:0}
.chosen-container a{cursor:pointer}.chosen-container .search-choice .group-name,.chosen-container .chosen-single .group-name{
margin-right:4px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;font-weight:400;color:#999}

.chosen-container .search-choice .group-name:after,.chosen-container .chosen-single .group-name:after{
content:":";padding-left:2px;vertical-align:top}.chosen-container-single .chosen-single{
position:relative;display:block;overflow:hidden;padding:12px 15px 0 8px;  
  background-color:#fff;
 
color:#444;text-decoration:none;white-space:nowrap;line-height:24px}
.chosen-container-single .chosen-default{color:#999}
.chosen-container-single .chosen-single span{display:block;overflow:hidden;margin-right:26px;text-overflow:ellipsis;
white-space:nowrap}
.chosen-container-single .chosen-single-with-deselect span{
	margin-right:38px}
	.chosen-container-single .chosen-single abbr
	{position:absolute;top:6px;right:26px;display:block;width:12px;height:12px;
	background:url(chosen-sprite.png) -42px 1px no-repeat;
	font-size:1px}
	
.chosen-container-single 
.chosen-single abbr:hover{background-position:-42px -10px}
.chosen-container-single.chosen-disabled .chosen-single abbr:hover
{background-position:-42px -10px}.chosen-container-single 
.chosen-single div{position:absolute;top:0;right:0;
display:block;width:18px;height:100%}
.chosen-container-single .chosen-single div b{display:block;width:100%;height:100%;
background:url(chosen-sprite.png) no-repeat 0 2px}.chosen-container-single .chosen-search{
position:relative;z-index:1010;margin:0;padding:3px 4px;white-space:nowrap}
.chosen-container-single .chosen-search input[type=text]{
margin:1px 0;padding:4px 20px 4px 5px;
width:100%;height:auto;outline:0;border:1px solid #aaa;
background:#fff url(chosen-sprite.png) no-repeat 100% -20px;
background:url(chosen-sprite.png) no-repeat 100% -20px;font-size:1em;font-family:sans-serif;line-height:normal;border-radius:0}
.chosen-container-single .chosen-drop{margin-top:-1px;border-radius:0 0 4px 4px;
background-clip:padding-box}.chosen-container-single.chosen-container-single-nosearch .chosen-search{position:absolute;left:-9999px}.chosen-container .chosen-results{color:#444;position:relative;overflow-x:hidden;overflow-y:auto;margin:0 4px 4px 0;padding:0 0 0 4px;max-height:240px;-webkit-overflow-scrolling:touch}.chosen-container .chosen-results li{display:none;margin:0;padding:5px 6px;list-style:none;line-height:15px;word-wrap:break-word;-webkit-touch-callout:none}
.chosen-container .chosen-results li.active-result{display:list-item;cursor:pointer}
.chosen-container .chosen-results li.disabled-result{display:list-item;
color:#ccc;cursor:default}.chosen-container .chosen-results li.highlighted{
background-color:#3875d7;background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(20%,#3875d7),color-stop(90%,#2a62bc));
background-image:-webkit-linear-gradient(#3875d7 20%,#2a62bc 90%);
background-image:-moz-linear-gradient(#3875d7 20%,#2a62bc 90%);
background-image:-o-linear-gradient(#3875d7 20%,#2a62bc 90%);background-image:linear-gradient(#3875d7 20%,#2a62bc 90%);
color:#fff}.chosen-container .chosen-results li.no-results{color:#777;display:list-item;background:#f4f4f4}
.chosen-container .chosen-results li.group-result{display:list-item;font-weight:700;cursor:default}
.chosen-container .chosen-results li.group-option{padding-left:15px}.chosen-container .chosen-results li em{
font-style:normal;text-decoration:underline}
.chosen-container-multi .chosen-choices{position:relative;overflow:hidden;margin:0;padding:0 5px;width:100%;
	height:auto;border:1px solid #aaa;background-color:#fff;
	background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(1%,#eee),color-stop(15%,#fff));
	background-image:-webkit-linear-gradient(#eee 1%,#fff 15%);
	background-image:-moz-linear-gradient(#eee 1%,#fff 15%);
	background-image:-o-linear-gradient(#eee 1%,#fff 15%);
	background-image:linear-gradient(#eee 1%,#fff 15%);
	cursor:text}
	
.chosen-container-multi .chosen-choices li{float:left;list-style:none}
.chosen-container-multi .chosen-choices li.search-field{
margin:0;padding:0;white-space:nowrap}
.chosen-container-multi .chosen-choices li.search-field input[type=text]
{margin:1px 0;padding:0;height:25px;outline:0;border:0!important;
background:transparent!important;box-shadow:none;color:#999;
font-size:100%;font-family:sans-serif;line-height:normal;border-radius:0}
.chosen-container-multi .chosen-choices li.search-choice{
position:relative;margin:3px 5px 3px 0;padding:3px 20px 3px 5px;border:1px solid #aaa;
max-width:100%;border-radius:3px;background-color:#eee;
background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(20%,#f4f4f4),color-stop(50%,#f0f0f0),color-stop(52%,#e8e8e8),color-stop(100%,#eee));
background-image:-webkit-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:-moz-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:-o-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-size:100% 19px;background-repeat:repeat-x;background-clip:padding-box;
box-shadow:0 0 2px #fff inset,0 1px 0 rgba(0,0,0,.05);
color:#333;line-height:13px;cursor:default}
.chosen-container-multi .chosen-choices li.search-choice span{
word-wrap:break-word}.chosen-container-multi .chosen-choices li.search-choice .search-choice-close{
position:absolute;
top:4px;right:3px;
display:block;width:12px;
height:12px;
background:url(chosen-sprite.png) -42px 1px no-repeat;font-size:1px}
.chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover{
background-position:-42px -10px}.chosen-container-multi .chosen-choices li.search-choice-disabled{
padding-right:5px;border:1px solid #ccc;background-color:#e4e4e4;
background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(20%,#f4f4f4),color-stop(50%,#f0f0f0),color-stop(52%,#e8e8e8),color-stop(100%,#eee));
background-image:-webkit-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:-moz-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:-o-linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);
background-image:linear-gradient(#f4f4f4 20%,#f0f0f0 50%,#e8e8e8 52%,#eee 100%);color:#666}
					
.chosen-container-multi .chosen-choices li.search-choice-focus{
background:#d4d4d4}
.chosen-container-multi .chosen-choices li.search-choice-focus .search-choice-close{
background-position:-42px -10px}
.chosen-container-multi .chosen-results{margin:0;padding:0}.chosen-container-multi .chosen-drop .result-selected{
display:list-item;color:#ccc;cursor:default}.chosen-container-active .chosen-single{
border:1px solid #5897fb;box-shadow:0 0 5px rgba(0,0,0,.3)}
.chosen-container-active.chosen-with-drop .chosen-single{border:1px solid #aaa;
-moz-border-radius-bottomright:0;border-bottom-right-radius:0;
-moz-border-radius-bottomleft:0;border-bottom-left-radius:0;
background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(20%,#eee),color-stop(80%,#fff));
background-image:-webkit-linear-gradient(#eee 20%,#fff 80%);
background-image:-moz-linear-gradient(#eee 20%,#fff 80%);
background-image:-o-linear-gradient(#eee 20%,#fff 80%);
background-image:linear-gradient(#eee 20%,#fff 80%);
box-shadow:0 1px 0 #fff inset}.chosen-container-active.chosen-with-drop .chosen-single div{
border-left:0;background:transparent}
.chosen-container-active.chosen-with-drop .chosen-single div b{
background-position:-18px 2px}
.chosen-container-active .chosen-choices{
border:1px solid #5897fb;box-shadow:0 0 5px rgba(0,0,0,.3)}
.chosen-container-active .chosen-choices li.search-field input[type=text]{
	color:#222!important}.chosen-disabled{opacity:.5!important;cursor:default}
	.chosen-disabled .chosen-single{cursor:default}.chosen-disabled .chosen-choices .search-choice .search-choice-close{
cursor:default}.chosen-rtl{text-align:right}
.chosen-rtl .chosen-single{overflow:visible;padding:0 8px 0 0}
.chosen-rtl .chosen-single span{margin-right:0;margin-left:26px;direction:rtl}
.chosen-rtl .chosen-single-with-deselect span{margin-left:38px}.chosen-rtl .chosen-single div{
	right:auto;left:3px}.chosen-rtl .chosen-single abbr{right:auto;left:26px}.chosen-rtl .chosen-choices li{
		float:right}
		.chosen-rtl .chosen-choices li.search-field input[type=text]{direction:rtl}
		.chosen-rtl .chosen-choices li.search-choice{margin:3px 5px 3px 0;padding:3px 5px 3px 19px}.chosen-rtl .chosen-choices li.search-choice .search-choice-close{right:auto;left:4px}
		.chosen-rtl.chosen-container-single-nosearch .chosen-search,.chosen-rtl .chosen-drop{
			left:9999px}.chosen-rtl.chosen-container-single .chosen-results{
				margin:0 0 4px 4px;padding:0 4px 0 0}.chosen-rtl .chosen-results li.group-option{
					padding-right:15px;padding-left:0}.chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div{
						border-right:0}.chosen-rtl .chosen-search input[type=text]{
							padding:4px 5px 4px 20px;background:#fff url(chosen-sprite.png) no-repeat -30px -20px;
							background:url(chosen-sprite.png) no-repeat -30px -20px;direction:rtl}
							.chosen-rtl.chosen-container-single .chosen-single div b{background-position:6px 2px}
							.chosen-rtl.chosen-container-single.chosen-with-drop .chosen-single div b{
								background-position:-12px 2px}@media only screen and (-webkit-min-device-pixel-ratio:1.5),only screen and (min-resolution:144dpi),only screen and (min-resolution:1.5dppx){
									.chosen-rtl .chosen-search input[type=text],.chosen-container-single .chosen-single abbr,.chosen-container-single .chosen-single div b,.chosen-container-single .chosen-search input[type=text],.chosen-container-multi .chosen-choices .search-choice .search-choice-close,.chosen-container .chosen-results-scroll-down span,.chosen-container .chosen-results-scroll-up span{background-image:url(chosen-sprite@2x.png)!important;background-size:52px 37px!important;background-repeat:no-repeat!important}}
 </style>

<select name="kidva" id="test"  style="background-color:#FFFFFF; height:100%;">
   <option value="0">გარიგების ტიპი</option>
      <option value="იყიდება"> იყიდება </option>
      <option value="ქირავდება"> ქირავდება </option>
      <option value="გირავდება"> გირავდება </option>
	  <option value="ვიყიდი"> ვიყიდი </option>
	  <option value="ვიქირავებ"> ვიქირავებ </option>
	  <option value="ვიგირავებ"> ვიგირავებ </option>
    </select>
     <script type="text/javascript">

$(document).ready(function(){

 $('#test').chosen({ width:'100%' });

});



</script>
     
     
  
    </div>
    
	<div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
      <select name="kategory" id="test2"  style="background-color:#FFFFFF;">
  <option value="0">ქონების ტიპი</option>
      <option value="კარკასი">კარკასი</option>
      <option value="ნაკვეთი">მიწის ნაკვეთი </option>
      <option value="კერძო">კერძო სახლი</option>
      <option value="კომერციული"> კომერციული </option>
      <option value="საოფისე"> საოფისე ფართი </option>
      <option value="სასტუმრო"> სასტუმრო </option>
    </select>
    
         <script type="text/javascript">

$(document).ready(function(){

 $('#test2').chosen({ width:'100%' });

});



</script>
    </div>
	
	<div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
 <select id="test3" onchange="loadUbani(this.value)"  name="kalaki" style="background-color:#FFFFFF;"> 
<option value="0">მდებარეობა </option>

<?php 

$res=mysqli_query ($conn, "SELECT * FROM kalaki");
while ($city = mysqli_fetch_assoc($res))
	
echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';

 ?>

</select> </div>

  <script type="text/javascript">

$(document).ready(function(){

 $('#test3').chosen({ width:'100%' });

});
</script>
<div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
<select name="ubani" id="ubani" class="_ubani" style="background-color:#FFFFFF;">
<option value="0">უბანი </option>
     <script type="text/javascript">

$(document).ready(function(){

 $('._ubani').chosen({ width:'100%' });

});
</script>
    </select> </div>
 
 <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
<select name="otaxi" id="test5" style="background-color:#FFFFFF;">
<option value="0"> ოთახი </option>
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
    </select> </div>
    
       <script type="text/javascript">

$(document).ready(function(){

 $('#test5').chosen({ width:'100%' });

});



</script>
	
	
 <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
 	<input id="m_from" name="m_from" type="text" value="m² -დან"  onblur="if(this.value=='') this.value='m² -დან';" onfocus="if(this.value=='m² -დან') this.value='';"  >
  </div>
  
  <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
 <input id="m_to" name="m_to"  type="text" value="m² -მდე"  onblur="if(this.value=='') this.value='m² -მდე';" onfocus="if(this.value=='m² -მდე') this.value='';" >
	</div>
	
	<div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
	<input id="price_from" name="price_from" type="text" value="ფასი -დან"  onblur="if(this.value=='') this.value='ფასი -დან';" onfocus="if(this.value=='ფასი -დან') this.value='';"  >
  </div>
  <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; border-bottom:1px solid #BCBCBC;">
 <input id="price_to" name="price_to"  type="text" value="ფასი -მდე"  onblur="if(this.value=='') this.value='ფასი -მდე';" onfocus="if(this.value=='ფასი -მდე') this.value='';" >
 </div>
 </div>
 <style> 
@font-face { font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('FONTS/bpg_algeti_compact.ttf');  }   input { font-family:bpg_algeti_compact, sans-serif; font-size:12px; }    </style>

 <div style="position:relative; padding-top:0px; margin-left:-15px;">
   
 
   <input type="search" name="text" value="&nbsp;&nbsp;ძიება ID-ით..."  onblur="if(this.value=='') this.value='&nbsp;&nbsp;ძიება ID-ით...';"  onfocus="if(this.value=='&nbsp;&nbsp;ძიება ID-ით...') this.value='';" style="position:relative; top:-14px; left:0px; width:200px; background:transparent; height:30px; font-size:14px; border:1px solid #FFFFFF; border-radius:3px; color:#FFFFFF;" >
   
  <input type="checkbox" name="gadamowmebuli" value="1" style="position:relative; cursor:pointer; transform: scale(1.5); margin-left:40px; top:8px; width:15px;"> 
  <span style="font-size:14px; position:relative; top:-12px; padding-left:5px; color:#FFFFFF;">  გადამოწმებული </span>
 
	  <input type="checkbox" name="suratit" value="1" style="position:relative; cursor:pointer; transform: scale(1.5); margin-left:40px; top:8px; width:15px;"> 
  <span style="font-size:14px; position:relative; top:-12px; padding-left:5px; color:#FFFFFF;">  სურათით </span>
  
    <input type="checkbox" name="mesakutris" value="1" style="position:relative; cursor:pointer; transform: scale(1.5); margin-left:40px; top:8px; width:15px;"> 
  <span style="font-size:14px; position:relative; top:-12px; padding-left:5px; color:#FFFFFF;">  მხოლოდ მესაკუთრის </span>
  
  <span style="float:right;">
  <input type="submit" name="zebna" style="width:140px; height:32px; margin-top:14px; margin-right:-15px; border-radius:3px; position:relative; background-color:#4267b2; border:0; color:#FFFFFF; font-size:14px;"  value="ძებნა"> 
   </span> </div>
   </form> 
   
   
   </div>
		 

 
 	          </span>
	            <!--ვრცლად-ის ლინკი<p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a></p>-->
            </div>
          </div>
       
    </section>

		 


		 

   

		 
		
       <section class="ftco-section bg-light" id="blog-section">
	     <div class="container"> <a href="https://www.facebook.com/Lotus-Fun-jewelry-Georgia-101428667941560/" target="_blank">
<img src="advert/Lotus_fun.gif" width="100%" onclick='window.open("https://www.facebook.com/Lotus-Fun-jewelry-Georgia-101428667941560/");return false;' style="vertical-align:middle; position:relative; padding-bottom:12px; margin-top:-75px; border:0;"></a>
			   </div></section>
       
       <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px;">
      <div class="container">
  
            <style>
		#im66 {
  height: 180px;
 
 }

.cover66 {
  width: 100%;
  object-fit: cover;
   
}
.cover66:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 
	 transition: all .7s;

}
	

	</style>
          			 <style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf); } 
@font-face { font-family: bpg_mrgvlovani_caps_2010; 
font-weight: 100; src: url('<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf'); }  
ch { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style>

 
      <div style="position:relative; width:auto; margin-top:-95px; padding-bottom:22px; color:#41403F;" align="left"> 
 <img src="IMG/vip-logo.gif" width="25" style="position:relative; 
   border-radius:2px;" ><ch style="position:relative; font-size:16px; top:3px;"> <b> SUPER VIP განცხადებები </b> </div>  
         
         <div class="row d-flex" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
  <?
if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ $x==0;
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE s_vip>".time()." order by id desc limit 0,6");
while ($b=mysqli_fetch_array($a))
{
 ?> 
  
        	<div class="col-md-4 ftco-animate fadeInUp ftco-animated" style="position:relative; margin-top:-20px;">
            <div class="blog-entry" style="position:relative; margin-bottom:25px;">
         <img src="<?=HTTP_HOST?>IMG/vip.gif" width="30px" style="position:relative; top:30px; left:15px; z-index:14; border-radius:3px;">





<img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png" onclick="addtofav(this, <?=$b['id']?>)" style="position:relative; float:right; opacity:1; top:33px; right:15px; z-index:14; width:20px; " class="" title="<? if(favorited($b['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">
 <div id="carousel<?=$b['id']?>" class="carousel slide" data-ride="carousel" data-interval="false" style="">
    <!-- Indicators -->
    
<ol class="carousel-indicators">
      <? if(!empty($b['upload'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="0" class="active"></li><? }?>
      <? if(!empty($b['upload2'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="1"></li><? }?>
      <? if(!empty($b['upload3'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="2"></li><? }?>	  
      <? if(!empty($b['upload4'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="3"></li><? }?>
      <? if(!empty($b['upload5'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="4"></li><? }?>
      <? if(!empty($b['upload6'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="5"></li><? }?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <? if(!empty($b['upload'])) {?>
	  <div class="item active">
    <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload'];?>" id="im66" class="cover66" style="border-radius:3px;"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload2'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload2'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload3'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload3'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload4'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload4'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload5'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload5'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload6'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload6'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        

     


<script type="text/javascript"> function checkWindowSize() {
    if ( jQuery(window).width() >= 480 ) {
        $('.truncate').succinct({
            size: 100
        }); 
    }
    else if ( jQuery(window).width() >= 320 ) {
        $('.truncate').succinct({
            size: 55
        }); 
    } 
    else {
        $('.truncate').succinct({
            size: 150
        }); 
    }   
}

jQuery(document).ready(function(){
    jQuery(window).resize(checkWindowSize);
    checkWindowSize();
}); </script>
              <div class="text d-block">
              <span style="position:relative; top:5px; padding-bottom:5px;">  
			  
        <style> 
              
              .flipswitch_<?=$b['id']?> {
  position: relative;
  width: 47px;
  -webkit-user-select:none;
  -moz-user-select:none;
  -ms-user-select: none;
}
.flipswitch_<?=$b['id']?> input[type=checkbox] {
  display: none;
}
.flipswitch-label_<?=$b['id']?> {
  display: block;
  overflow: hidden;
  cursor: pointer;
  border: 1px solid #A6A6A6;
  border-radius: 3px;
}
.flipswitch-inner_<?=$b['id']?> {
  width: 200%;
  margin-left: -100%;
  -webkit-transition: margin 0.3s ease-in 0s;
  -moz-transition: margin 0.3s ease-in 0s;
  -ms-transition: margin 0.3s ease-in 0s;
  -o-transition: margin 0.3s ease-in 0s;
  transition: margin 0.3s ease-in 0s;
}
.flipswitch-inner_<?=$b['id']?>:before, .flipswitch-inner_<?=$b['id']?>:after {
  float: left;
  width: 50%;
  height: 19px;
  padding: 0;
  line-height: 19px;
  font-size: 11px;
  color: white;
  font-family: Trebuchet, Arial, sans-serif;
  font-weight: bold;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.flipswitch-inner_<?=$b['id']?>:before {
  content: "USD";
  padding-left: 6px;
  background-color: #3365B0;
  color: #FFFFFF;
}
.flipswitch-inner_<?=$b['id']?>:after {
  content: "GEL";
  padding-right: 6px;
  background-color: #EBEBEB;
  color: #888888;
  text-align: right;
}
.flipswitch-switch_<?=$b['id']?> {
  width: 12px;
  margin: 3.5px;
  background: #FFFFFF;
  border: 1px solid #A6A6A6;
  border-radius: 3px;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 27px;
  -webkit-transition: all 0.3s ease-in 0s;
  -moz-transition: all 0.3s ease-in 0s;
  -ms-transition: all 0.3s ease-in 0s;
  -o-transition: all 0.3s ease-in 0s;
  transition: all 0.3s ease-in 0s;
}
.flipswitch-cb_<?=$b['id']?>:checked + .flipswitch-label_<?=$b['id']?> .flipswitch-inner_<?=$b['id']?> {
  margin-left: 0;
}
.flipswitch-cb_<?=$b['id']?>:checked + .flipswitch-label_<?=$b['id']?> .flipswitch-switch_<?=$b['id']?> {
  right: 0;
}
              </style>
              
			  <div class="flipswitch_<?=$b['id']?>">
    <input type="checkbox" name="flipswitch" class="flipswitch-cb_<?=$b['id']?>" id="fs_<?=$b['id']?>" checked onclick="changeCurrency(<?=$b['id']?>);">
    <label class="flipswitch-label_<?=$b['id']?>" for="fs_<?=$b['id']?>">
        <div class="flipswitch-inner_<?=$b['id']?>"></div>
        <div class="flipswitch-switch_<?=$b['id']?>"></div>
    </label> 
	
	
	
	
</div> 
<div id="price_GEL_<?=$b['id']?>"> <? echo $b['fasi']; ?> </div>
	<div style="display:none;" id="price_USD_<?=$b['id']?>"> <? 
	$rate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rate FROM valuta WHERE valuta='USD'"));
	echo $b['fasi'] * $rate['rate']; 
	?> </div>




			    <? if ($b['valuta']=='GEL')
		 {
		echo '&#8382;';	 
		 }
		 elseif ($b['valuta']=='USD')
		 {
			echo '&#36;';	
		 }
		 elseif ($b['valuta']=='EURO')
		 {
			 echo '&#8364;';
			 }
			 else
			 {
				echo ''; }
			 
			 ?></span>
         
         
          <div style="padding-top:5px;"> <?php echo $b['kidva']; ?> <?php echo $b['otaxi']; ?> <?php echo "ოთახიანი" ?>  
		   
		
         <span style="margin-top:20px; position:relative;">
           <? 
		    $str = $b['kategory'];
		   
		     if (strpos($str, 'კერძო') !== false) 
  
  {
	 echo mb_substr($str, 0).'&nbsp;სახლი';
	  }
		   
		   else
		 {
			 echo $b['kategory'];
			 }   
		    
		    ?> </span>
           
           
        <span style="margin-top:20px; position:relative;">   <?php

			
$res=mysqli_query ($conn, "SELECT * FROM kalaki WHERE  id='$b[kalaki]'");
 $city = mysqli_fetch_assoc($res); 
 
	 
 // substr function - თუ სიტყვა არის "გარდაბანი" და ბოლო ასო არის "ი", ვაჭრით ბოლოდან ერთს და ვუმატებს "ში"-ს, მაგ: გარდაბანში
 
    $str = $city['name'];
   { 
  if (strpos($str, 'თბილისი') !== false) 
  
  {
	 echo mb_substr($str, 0, -1).'ში';
	  }
	  
	  
	   if (strpos($str, 'გურჯაანი') !== false) 
  
  {
	 echo mb_substr($str, 0, -1).'ში';
	  }
	  

  if (strpos($str, 'ვაკე') !== false) 
  
  {
	 echo mb_substr($str, 0).'ში';
	  }
	  


  if (strpos($str, 'საფიჩხია') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
	  
	  
  
  }
		    ?> 
			 
			 </span>
			 </div>
		   
 <?php
 // substr function - თუ სიტყვა არის "გარდაბანი" და ბოლო ასო არის "ი", ვაჭრით ბოლოდან ერთს და ვუმატებს "ში"-ს, მაგ: გარდაბანში
 $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$b[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani); 
$str = $ubani['name'];
   { 
  if (strpos($str, 'მთაწმინდა') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
   }
		    ?>   
<?php /*?>                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
<?php */?>      



        </div>
            </div>
        	</div>	 
			
			
<? }}  ?>
        	
        </div> 
     
    </section>
       
       
       
        

		<section class="ftco-facts img ftco-counter" style="background-image: url(images/bg_3.jpg); position:relative; margin-top:-100px;">
			<div class="overlay"></div>
			<div class="container" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
				<div class="row d-flex align-items-center">
					<div class="col-md-5 heading-section heading-section-white">
						<span class="subheading"><ch> მოცემულობა </ch></span>
						<h2 class="mb-4"> <ch>თვეში მილიონამდე ვიზიტორი</h2>
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">დანიშნე შეხვედრა ბროკერთან</a></p>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="10">0</strong>
		                <span>წლის გამოცდილება</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>კმაყოფილი კლიენტი</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="24">0</strong> 
		                <span>საათი თქვენს სამსახურში</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="500">0</strong>
		                <span>ობიექტი</span>
		              </div>
		            </div>
		          </div>
	          </div>
					</div>
				</div>
			</div>
		</section>


    <section class="ftco-section bg-light" id="blog-section">
      <div class="container">
       <div style="position:relative; width:auto; margin-top:-75px; padding-bottom:22px; color:#41403F;" align="left"> 
 <img src="IMG/vip-logo.gif" width="25" style="position:relative; 
   border-radius:2px;" ><ch style="position:relative; font-size:16px; top:3px;"> <b> VIP განცხადებები </b> </div>  
         <div class="row d-flex" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
<?
if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ $x==0;
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE vip>".time()." order by id desc limit 0,6");
while ($b=mysqli_fetch_array($a))
{
 ?> 
  
          	<div class="col-md-4 ftco-animate fadeInUp ftco-animated" style="position:relative; margin-top:-20px;">
            <div class="blog-entry" style="position:relative; margin-bottom:25px;">
         <img src="<?=HTTP_HOST?>IMG/vip.gif" width="30px" style="position:relative; top:30px; left:15px; z-index:14; border-radius:3px;">





<img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png" onclick="addtofav(this, <?=$b['id']?>)" style="position:relative; float:right; opacity:1; top:33px; right:15px; z-index:14; width:20px; " class="" title="<? if(favorited($b['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">
 <div id="carousel<?=$b['id']?>" class="carousel slide" data-ride="carousel" data-interval="false" style="">
    <!-- Indicators -->
    
<ol class="carousel-indicators">
      <? if(!empty($b['upload'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="0" class="active"></li><? }?>
      <? if(!empty($b['upload2'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="1"></li><? }?>
      <? if(!empty($b['upload3'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="2"></li><? }?>	  
      <? if(!empty($b['upload4'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="3"></li><? }?>
      <? if(!empty($b['upload5'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="4"></li><? }?>
      <? if(!empty($b['upload6'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="5"></li><? }?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <? if(!empty($b['upload'])) {?>
	  <div class="item active">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload'];?>" id="im66" class="cover66" style="border-radius:3px;"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload2'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>" style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload2'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload3'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload3'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload4'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>" style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload4'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload5'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>" style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload5'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload6'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>" style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload6'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        

     


<script type="text/javascript"> function checkWindowSize() {
    if ( jQuery(window).width() >= 480 ) {
        $('.truncate').succinct({
            size: 100
        }); 
    }
    else if ( jQuery(window).width() >= 320 ) {
        $('.truncate').succinct({
            size: 55
        }); 
    } 
    else {
        $('.truncate').succinct({

            size: 150
        }); 
    }   
}

jQuery(document).ready(function(){
    jQuery(window).resize(checkWindowSize);
    checkWindowSize();
}); </script>
              <div class="text d-block">
              <span style="position:relative; top:5px; padding-bottom:5px;"> 
			
               <?php echo $b['fasi']; ?>   <? if ($b['valuta']=='GEL')
		 {
		echo '&#8382;';	 
		 }
		 elseif ($b['valuta']=='USD')
		 {
			echo '&#36;';	
		 }
		 elseif ($b['valuta']=='EURO')
		 {
			 echo '&#8364;';
			 }
			 else
			 {
				echo ''; }
			 
			 ?> </span>
           <p><?php echo $b['kidva']; ?> <?php echo $b['otaxi']; ?> <?php echo "ოთახიანი" ?>  
		   <?  $str = $b['kategory'];
		   
		     if (strpos($str, 'კერძო') !== false) 
  
  {
	 echo mb_substr($str, 0).'&nbsp;სახლი';
	  }
		 else
		 {
			 echo $b['kategory'];
			 }  
		   
		   ?>
		   
		   
		   <?php 
		   
		   
	$res=mysqli_query ($conn, "SELECT * FROM kalaki");
 $city = mysqli_fetch_assoc($res);  ?> 
		   
 <?php
 // substr function - თუ სიტყვა არის "გარდაბანი" და ბოლო ასო არის "ი", ვაჭრით ბოლოდან ერთს და ვუმატებს "ში"-ს, მაგ: გარდაბანში
 
    $str = $b['ubani'];
   { 
  if (strpos($str, 'ვერა') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
	  

  if (strpos($str, 'ვაკე') !== false) 
  
  {
	 echo mb_substr($str, 0).'ში';
	  }
	  


  if (strpos($str, 'საფიჩხია') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
	  
	  
  
if (strpos($str, 'გურჯაანი') !== false) 

	{
  echo mb_substr($str, 0, -1).'ში';
	}
  else
  {
 
 	} }
		    ?>   </p>
<?php /*?>                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
<?php */?>              </div>
            </div>
        	</div>	 
			
			
<? }}  ?>
        	
        </div> 
     
    </section>

      <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-110px; background:transparent;">
	     <div class="container" >
			 <img src="IMG/banner-4.jpg" width="100%" style="vertical-align:middle; position:relative; padding-bottom:0px; margin-top:-95px;">
			      </div></section>
       
       <section class="ftco-section bg-light" id="blog-section" style="position:relative; margin-top:-96px; padding-bottom:0;">
      <div class="container">
  
            <style>
		#im66 {
  height: 180px;
 
 }

.cover66 {
  width: 100%;
  object-fit: cover;
   
}
.cover66:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 
	 transition: all .7s;

}
	

	</style>
          			 <style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf); } 
@font-face { font-family: bpg_mrgvlovani_caps_2010; 
font-weight: 100; src: url('<?=HTTP_HOST?>fonts/bpg_mrgvlovani_caps_2010.ttf'); }  
ch { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style>

 
      <div style="position:relative; width:auto; margin-top:-80px; padding-bottom:22px; color:#41403F;" align="left"> 
 <img src="IMG/vip-logo.gif" width="25" style="position:relative;  
   border-radius:2px;" ><ch style="position:relative; font-size:16px; top:3px;"> <b> გადამოწმებული განცხადებები </b> </div>  
         
         <div class="row d-flex" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
  <?
if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ $x==0;
$a=mysqli_query($conn,"select * from kultura_cxrili order by id desc limit 8,8");
while ($b=mysqli_fetch_array($a))
{
 ?> 
  
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated" style="position:relative; margin-top:-20px;">
            <div class="blog-entry" style="position:relative; margin-bottom:35px;">
         <img src="<?=HTTP_HOST?>IMG/vip.gif" width="30px" style="position:relative; top:30px; left:15px; z-index:14; border-radius:3px;">





<img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back'; else echo 'heart2'; ?>.png" onclick="addtofav(this, <?=$b['id']?>)" style="position:relative; float:right; opacity:1; top:33px; right:15px; z-index:14; width:20px; " class="" title="<? if(favorited($b['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?>">
 <div id="carousel<?=$b['id']?>" class="carousel slide" data-ride="carousel" data-interval="false" style="">
    <!-- Indicators -->
    
<ol class="carousel-indicators">
      <? if(!empty($b['upload'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="0" class="active"></li><? }?>
      <? if(!empty($b['upload2'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="1"></li><? }?>
      <? if(!empty($b['upload3'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="2"></li><? }?>	  
      <? if(!empty($b['upload4'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="3"></li><? }?>
      <? if(!empty($b['upload5'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="4"></li><? }?>
      <? if(!empty($b['upload6'])) {?><li data-target="#carousel<?=$b['id']?>" data-slide-to="5"></li><? }?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <? if(!empty($b['upload'])) {?>
	  <div class="item active">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload'];?>" id="im66" class="cover66" style="border-radius:3px;"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload2'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload2'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload3'])) {?>
	  <div class="item">
     <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload3'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload4'])) {?>
	  <div class="item">

      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>" style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload4'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload5'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload5'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
	  <? if(!empty($b['upload6'])) {?>
	  <div class="item">
      <a href="<?=url($b['kidva'].'-'.$b['otaxi'].'-'.'ოთახიანი'.'-'.$b['kategory'].'-'.$b['kalaki'].'-'.$b['ubani'],'b', $b['id'])?>"  style="margin-left:0px;">  <img src="<?=HTTP_HOST?><? echo $b['upload6'];?>" id="im66" class="cover66"> </a>
      </div>
	  <? } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel<?=$b['id']?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        

     


<script type="text/javascript"> function checkWindowSize() {
    if ( jQuery(window).width() >= 480 ) {
        $('.truncate').succinct({
            size: 100
        }); 
    }
    else if ( jQuery(window).width() >= 320 ) {
        $('.truncate').succinct({
            size: 55
        }); 
    } 
    else {
        $('.truncate').succinct({
            size: 150
        }); 
    }   
}

jQuery(document).ready(function(){
    jQuery(window).resize(checkWindowSize);
    checkWindowSize();
}); </script>
              <div class="text d-block">
              <span style="position:relative; top:5px; padding-bottom:5px;">  <?php echo $b['fasi']; ?>    <? if ($b['valuta']=='GEL')
		 {
		echo '&#8382;';	 
		 }
		 elseif ($b['valuta']=='USD')
		 {
			echo '&#36;';	
		 }
		 elseif ($b['valuta']=='EURO')
		 {
			 echo '&#8364;';
			 }
			 else
			 {
				echo ''; }
			 
			 ?></span>
           <p><?php echo $b['kidva']; ?> <?php echo $b['otaxi']; ?> <?php echo "ოთახიანი" ?>  <?php echo $b['kategory']; ?> 
		   
  <?php
 // substr function - თუ სიტყვა არის "გარდაბანი" და ბოლო ასო არის "ი", ვაჭრით ბოლოდან ერთს და ვუმატებს "ში"-ს, მაგ: გარდაბანში
 
    $str = $b['ubani'];
   { 
  if (strpos($str, 'ვერა') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
	  

  if (strpos($str, 'ვაკე') !== false) 
  
  {
	 echo mb_substr($str, 0).'ში';
	  }
	  


  if (strpos($str, 'საფიჩხია') !== false) 
  
  {
	 echo mb_substr($str, 0).'ზე';
	  }
	  
	  
  
if (strpos($str, 'გურჯაანი') !== false) 

	{
  echo mb_substr($str, 0, -1).'ში';
	}
  else
  {
 
 	} }
		    ?>  </p>
<?php /*?>                <p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
<?php */?>              </div>
            </div>
        	</div>	 
			
			
<? }}  ?>
        	
        </div> 
     
    </section>
       
       
       