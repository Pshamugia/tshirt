<script>
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
border-right:1px solid #D3D3D3;
 
}
.form-border select,input
{
	width:100%;
 height:45px;
 
}
</style>

<script src='<?=HTTP_HOST?>chosen/chosen.jquery.min.js' type='text/javascript'></script>
 

<section class="hero-wrap"  data-section="home" data-stellar-background-ratio="0.5">
   
	<div style="background-color: #DEEFDE ; height: 60px; position: relative; top: 40px;" >   
	<div class="container align-left" style="position: relative; top: 13px;" > 
		<div class="col-md-12" style="display: inline-block" >  
<form action="<?=HTTP_HOST?>index.php" method="GET" name="rame" style="padding-left:15px;  padding-right:15px; height:45px;">
	 <input type="hidden" name="do" value="search"/>
   <input type="text" onkeypress="return makeGeo(this,event);" class="col-md-3" name="text"   placeholder="ჩაწერე საძიებო სიტყვა"
 oninvalid="this.setCustomValidity('ეს ველი ცარიელი არ უნდა იყოს')"
 oninput="setCustomValidity('')" style="position:relative; color:#2E6078; height: 40px; font-size:14px; margin-right: 15px; border: 1px solid #8DD791; border-radius: 0;" />


   <?php
  
			  
   $sCategory = isset($_POST['search_category'])?$_POST['search_category']:'';
   ?>
 
   <select name='search_category' class="col-md-3"  style="position:relative;height: 40px; margin-right: 15px; border: 1px solid #8DD791; "> 
   <option value='' <?=($sCategory=='')?'selected':''?> style="color:#0D0C0C;"> -კატეგორია- </option>
   <option value='საკანონმდებლო' <?=($sCategory=='საკანონმდებლო')?'selected':''?>>საკანონმდებლო</option>
      <option value='აღმასრულებელი' <?=($sCategory=='აღმასრულებელი ')?'selected':''?>>აღმასრულებელი</option>
         <option value='არასაპარლამენტო' <?=($sCategory=='არასაპარლამენტო')?'selected':''?>>არასაპარლამენტო</option>
         <option value='საჯარო' <?=($sCategory=='საჯარო')?'selected':''?>>საჯარო პირები</option>
         </select>
			
	<div style="display: inline-block" class="col-md-3">
     <input name="zebna" type="submit" class="search-size" style="position:relative;  height:40px; display: inline-block;   border:0; background-color: #3B7A14; color: #FFFFFF; left:-15px;"   value="ძებნა"/> 
		
		<a name="details" onclick="if($('#full').css('display')=='none') $('#full').show(); else $('#full').hide() ;" style="cursor: pointer"> <span id="spans"  style="position: relative;    color: #000000">    დეტალური ძებნა   <i class="fa fa-caret-down"></i></span></a>
		
      </div>   </div>  

		
	 
	
	 <div id="full" style="display: none;   " >  
	
		 
		
		<div style="clear:both ">  
		 
		 <div class="col-md-12" style="position: relative; left: -15px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);" >
 
           
    
    
     <div align="left" style="background-color: #DEEFDE;   margin-left: 30px; padding-bottom: 25px;" class="col-md-12">
     <div style="padding:10px; border-radius:3px;">    
     <div style="background-color:#FFFFFF; border:1px #3D4A59 solid" class="col-md-12" >
     
     <style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }   form { font-family:bpg_algeti_compact, sans-serif; font-size:14px; }    </style>

     
 	 <input type="hidden" name="do" value="search"/>
	 <div class="row">
	
	 <div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px;">
     
 


<select name="sagnebi" id="test"  style="background-color:#FFFFFF; height:45px;">
   <option value="0">საგნები</option>
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
     <script type="text/javascript">

$(document).ready(function(){

 $('#test').chosen({ width:'100%' });

});



</script>
     
     
  
    </div>
    
	<div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px;">
      <select name="klasi" id="test2"  style="background-color:#FFFFFF;">
  <option value="0">კლასები</option>
  <option value="I კლასი">I კლასი </option>
      <option value="II კლასი">II კლასი</option>
      <option value="III კლასი">III კლასი </option>
      <option value="IV კლასი">IV კლასი</option>
      <option value="V კლასი"> V კლასი </option>
      <option value="VI კლასი"> VI კლასი </option>
      <option value="VII კლასი"> VII კლასი </option>
	  <option value="VIII კლასი"> VIII კლასი </option>
	  <option value="IX კლასი"> IX კლასი </option>
	  <option value="X კლასი"> X კლასი </option>
	  <option value="XI კლასი"> XI კლასი </option>
	   <option value="XII კლასი"> XII კლასი </option>
		  <option value="აბიტურიენტი"> აბიტურიენტი </option>
		  <option value="სტუდენტი"> სტუდენტი </option>
		  <option value="სხვა"> სხვა </option>
    </select>
    
         <script type="text/javascript">

$(document).ready(function(){

 $('#test2').chosen({ width:'100%' });

});



</script>
    </div>
	
	<div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; ">
 <select id="test3" onchange="loadUbani(this.value)"  name="kalaki" style="background-color:#FFFFFF;"> 
<option value="0" > რეგიონი </option>

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
<div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; ">
<select name="ubani" id="ubani" class="_ubani" style="background-color:#FFFFFF;">
<option value="0"> რაიონი </option>
     <script type="text/javascript">

$(document).ready(function(){

 $('._ubani').chosen({ width:'100%' });

});
</script>
    </select> </div>
 
 <div class="col-md-2 form-border" style="padding-top:5px; padding-bottom:5px; z-index: 10001">
<select name="current" id="test5" style="background-color:#FFFFFF; ">
	  <option value="0">სტატუსი</option>
<option value="პრაქტიკოსი"> პრაქტიკოსი </option>
        <option value="უფროსი"> უფროსი </option>
      <option value="მენტორი"> მენტორი </option>
      <option value="წამყვანი"> წამყვანი </option> 
      
    </select> </div>
    
       <script type="text/javascript">

$(document).ready(function(){

 $('#test5').chosen({ width:'100%' });

});



</script>
	
	
 <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; ">
 	
    <!-- Trigger/Open The Modal -->
<style> /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  margin:0 auto;
  padding-top:150px;
  width: 320px; /* Full width */
  height: auto; /* Full height */
  overflow: auto;
  z-index:10100;
 /* Enable scroll if needed */ 
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 0 auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #4267b2; 
  float: right;
  font-size: 30px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  background-color:#E4E2E2;
  text-decoration: none;
  cursor: pointer;
} </style>
    
    
    
    <input id="rating" name="rating" type="text" readonly value="  რეიტინგი"  onblur="if(this.value=='') this.value='  რეიტინგი';" onfocus="if(this.value=='  რეიტინგი') this.value='';" style="border:0; border-bottom:1px solid #D3D3D3; cursor: pointer;"  >
    <input type="hidden" name="m_from" id="m_from"> 
	<input type="hidden" name="m_to" id="m_to"> 
    <!-- The Modal -->
<div id="myModal_<? echo $statement_id['id'];?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="close_<? echo $statement_id['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    <br> 
    
    <p> <input id="m_from_x" name="m_from_x"  type="text" value=" -დან"  onblur="if(this.value=='') this.value=' -დან';" onfocus="if(this.value==' -დან') this.value='';" style="width:100px; border:1px solid #C4C4C4; height:30px; border-radius:3px;" class="inline-block" >
    
    <input id="m_to_x" name="m_to_x"  type="text" value=" -მდე"  onblur="if(this.value=='') this.value=' -მდე';" onfocus="if(this.value==' -მდე') this.value='';" style="width:100px; border:1px solid #C4C4C4; height:30px; border-radius:3px;" class="inline-block" >
     
     
    <div style="margin-top:20px;">
    <div style="background-color:#3D65AF; width:160px; margin:0 auto; padding-top:10px; padding-bottom:10px; color:#FFFFFF;" align="center">
    <a href="javascript:$('#m_from').val($('#m_from_x').val()); $('#m_to').val($('#m_to_x').val());$('#rating').val($('#m_from_x').val() + ' - ' + $('#m_to_x').val()+'');console.log(document.getElementById('myModal_<? echo $statement_id['id'];?>').style.display = 'none');" style="color:#FFFFFF;"> შენახვა </a> </div></div>
</p>
  </div>

</div>
<script> // Get the modal
var modal_<? echo $statement_id['id'];?> = document.getElementById("myModal_<? echo $statement_id['id'];?>");
// Get the button that opens the modal
var btn_<? echo $statement_id['id'];?> = document.getElementById("rating");
// Get the <span> element that closes the modal
var span_<? echo $statement_id['id'];?> = document.getElementById("close_<? echo $statement_id['id'];?>");
// When the user clicks on the button, open the modal
btn_<? echo $statement_id['id'];?>.onclick = function() {
  modal_<? echo $statement_id['id'];?>.style.display = "block";
  modal1_<? echo $statement_id['id'];?>.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span_<? echo $statement_id['id'];?>.onclick = function() {
  modal_<? echo $statement_id['id'];?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_<? echo $statement_id['id'];?>) {
    modal_<? echo $statement_id['id'];?>.style.display = "none";
  }
}
 </script> 
    
    
    
    
  </div>
  
 
	
	 
  <div class="col-md-1 form-border" style="padding-top:5px; padding-bottom:5px; ">
 
    <!-- Trigger/Open The Modal -->
<style> /* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  margin:0 auto;
  padding-top:150px;
  width: 320px; /* Full width */
  height: auto; /* Full height */
  overflow: auto;
  z-index:10100;
 /* Enable scroll if needed */ 
}

/* Modal Content/Box */
.modal1-content {
  background-color: #fefefe;
  margin: 0 auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close1 {
  color: #4267b2; 
  float: right;
  font-size: 30px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: black;
  background-color:#E4E2E2;
  text-decoration: none;
  cursor: pointer;
} </style>
    
    
    
    <input id="fasi" name="fasi" readonly type="text" value="  ფასი"  onblur="if(this.value=='') this.value='  ფასი';" onfocus="if(this.value=='  ფასი') this.value='';" style="border:0; cursor: pointer;" >
    <input type="hidden" name="price_from" id="price_from"> 
	<input type="hidden" name="price_to" id="price_to"> 
	
	
    <!-- The Modal -->
<div id="myModal1_<? echo $statement_id['id'];?>" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="close1_<? echo $statement_id['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    <br> 
    
    <p> 
    
    <input id="price_from_x" name="price_from_x"  type="text" value="ფასი -დან"  onblur="if(this.value=='') this.value='ფასი -დან';" onfocus="if(this.value=='ფასი -დან') this.value='';" style="width:100px; border:1px solid #C4C4C4; height:30px; border-radius:3px;" class="inline-block" >
    
    <input id="price_to_x" name="price_to_x"  type="text" value="ფასი -მდე"  onblur="if(this.value=='') this.value='ფასი -მდე';" onfocus="if(this.value=='ფასი -მდე') this.value='';" style="width:100px; border:1px solid #C4C4C4; height:30px; border-radius:3px;" class="inline-block" >
    
     
     
     
    <div style="margin-top:20px;">
    <div style="background-color:#3D65AF; width:160px; margin:0 auto; padding-top:10px;   color:#FFFFFF;" align="center">
    <a href="javascript:$('#price_from').val($('#price_from_x').val()); $('#price_to').val($('#price_to_x').val());$('#fasi').val($('#price_from_x').val() + ' - ' + $('#price_to_x').val());console.log(document.getElementById('myModal1_<? echo $statement_id['id'];?>').style.display = 'none');" style="color:#FFFFFF;"> შენახვა </a> </div></div>
</p>
  </div>

</div>
<script> // Get the modal
var modal1_<? echo $statement_id['id'];?> = document.getElementById("myModal1_<? echo $statement_id['id'];?>");
// Get the button that opens the modal
var btn1_<? echo $statement_id['id'];?> = document.getElementById("fasi");
// Get the <span> element that closes the modal
var span1_<? echo $statement_id['id'];?> = document.getElementById("close1_<? echo $statement_id['id'];?>");
// When the user clicks on the button, open the modal
btn1_<? echo $statement_id['id'];?>.onclick = function() {
  modal1_<? echo $statement_id['id'];?>.style.display = "block";
  modal_<? echo $statement_id['id'];?>.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span1_<? echo $statement_id['id'];?>.onclick = function() {
  modal1_<? echo $statement_id['id'];?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1_<? echo $statement_id['id'];?>) {
    modal1_<? echo $statement_id['id'];?>.style.display = "none";
  }
}
 </script> 
 
 
 
 
 
 
  
 </div>
 </div>
 <style> 
@font-face { font-family: bpg_algeti_compact; src:url(FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('FONTS/bpg_algeti_compact.ttf');  }   input { font-family:bpg_algeti_compact, sans-serif; font-size:12px; }    </style>

 <div style="position:relative; padding-top:0px; margin-left:-15px;">
     <style> @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
		 

		 </style>
  <span class="one">
	  <style> ::-webkit-input-placeholder {
    color:white;
}

::-moz-placeholder {
    color:white;
}

::-ms-placeholder {
    color:white;
}

::placeholder {
    color:#3D4A59;
}</style>
    
 </span>
       
  <input type="checkbox" name="remote" value="1" style="position:relative;  cursor:pointer; transform: scale(1.5); top:-3px; width:15px; padding-right:15px; margin-right: 25px; left: 15px;"> 
  <span style="font-size:12px; position:relative; top:-22px; padding-right:25px; color:#3D4A59;">  მხოლოდ ქართულენოვანი </span>  
  <span>
	  <input type="checkbox" name="home" value="1" style="position:relative; cursor:pointer; transform: scale(1.5); top:-3px; width:15px; margin-right: 15px;"> 
  <span style="font-size:12px; position:relative; top:-22px; color:#3D4A59;">  მხოლოდ ხელფასიანი </span> </span>
  
     
  
   </div>
   </form> 
   
   
   </div>
		 

 
 	          </span>
	            <!--ვრცლად-ის ლინკი<p><a href="#" class="btn btn-primary py-3 px-4">Make an appointment</a></p>-->
            </div>
          </div>
		 
		 
		 
		 </div>
		 
</div>
		
		 </div></div>
	
      <div class="container" style="position:relative; margin-top: 50px;">
   <style>
.tooltip1 {
  position: relative;
  display: inline-block; 
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: 130px;
  background-color: #8DD791;
  color: #194913;
  text-align: center;
 
  padding: 15px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -110px;
  opacity: 0;
  font-size:12px;
  transition: opacity 0.3s;
}

.tooltip1 .tooltiptext1::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: 36px;
  border-width: 5px;
  border-style: solid;
  border-color: #8DD791 transparent transparent transparent;
 
}

.tooltip1:hover .tooltiptext1 {
  visibility: visible;
  opacity: 1;
}
</style>
            <style>
		#im66 {
  height: 30px; 
 max-width: 50px;
 }

.cover66 { 
	max-width: 50px;
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

 <div class="col-md-12">
 
	 <!--სარეკლამო ბანერი-->
	 <div>
	 <? $res=mysqli_query($conn, "SELECT * FROM banner where kategory='banner1'"); 
	 	$ban=mysqli_fetch_array($res);
	if(!empty($ban['upload']))
	{
	 ?>
	 <img src="<? echo $ban['upload']; ?>" width="100%" height="120px;"> <? } ?>
	 </div>
	  <!--სარეკლამო ბანერი-->
	
 
 
 
   
   
  
   
   
  
         
         <div class="row d-flex" style="clear:both;  font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">

			 <style> 
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th 
{
background-color: #EDF8ED;
} 
			 </style> 
			 <div class="table-responsive">
<table class="table table-hover" style="width: 98%" >
	<thead>
    <tr>
       <th scope="col" class=""><ch style="position:relative; font-size:12px;  "> ვაკანსიის დასახელება </ch></th> 
		<th scope="col" ><ch style="position:relative; font-size:12px;  "> CV </ch> </th>	
      <th scope="col" ><ch style="position:relative; font-size:12px;  "> მომწოდებელი </ch> </th>
      <th scope="col"><ch style="position:relative; font-size:12px;  "> გამოქვეყნდა </ch></th>
		  <th scope="col"><ch style="position:relative; font-size:12px;  "> ბოლო ვადა </ch></th>
		  <th scope="col"><ch style="position:relative; font-size:12px;  "> 
			  
			  
			    <?php if($_SESSION['USER_ID']==0) 
{ ?> 
			  <a  style="background:none; position:relative;  top:10px;  cursor:pointer; " 
              onclick="javascript:location.href='index.php?do=fav';"> <? } else { ?> 
                 <a  style="background:none; position:relative;  top:10px;  cursor:pointer; " 
              onclick="javascript:location.href='<?=url('rcheulebi','l4')?>';"> <? } ?>
 <span style="position: relative; float: right; left: 25px;"> 
<img src="<?=HTTP_HOST?>IMG/heart2.png" width="20px" height="auto" style="position:relative; margin-left: 20px; margin-top:-27px;"> 
<span style="position:relative; top:-18px; left:-14px; padding:3px;"> 
<span id="fav_count" style="background-color:#8DD791;  font-size:11px; color:#000000; display: inline-block;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    text-align: center; font-weight: bold"> <span style="position:relative; top:1px;">
<?
	if($_SESSION['USER_ID'] > 0)
	{
		$cnt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM favorites WHERE user_id='$_SESSION[USER_ID]'"));
		echo intval($cnt['cnt']);
	}
	else echo count(unserialize($_COOKIE['fav']));
?> </span> </span> </span></span></a>  </ch></th>
    </tr>
  </thead>
  <tbody>			 
			 
<?
	
	 
	
	$x==0;
//  $a=mysqli_query($conn, "select * from login WHERE s_vip>'".time()."' order by id desc limit 0,4");
   $a=mysqli_query($conn, "select * from gancxadeba order by id desc limit 0,12");
   while ($b=mysqli_fetch_assoc($a))
{
	  $avtori = mysqli_fetch_assoc(mysqli_query($conn, "select * FROM  login WHERE id='$b[avtoris_id]'"));
	  
 ?> 
  
			 
			 <tr>
      <th scope="row" >
		  <style> 
			  a {
    color: #18A023;
    text-decoration: none;
			  font-weight: 100;
} 
			  a:hover
			  {
				  text-decoration: none;
				  color: #000000;
			  }
		  
		  </style> 
	<a href="index.php?do=full&id=<?=$b['id']?>" style="position: relative; margin-left: -5px;">  <? echo $b['title']; ?> </a>  
		  
 <?php $res=mysqli_query ($conn, "SELECT * FROM kalaki WHERE  id='$b[kalaki]'");
 $city = mysqli_fetch_assoc($res);	 
 if(!empty($city['name'])) 
 { ?> 
<span style="background-color: #D0EBD0; padding: 2px; margin-left: 10px; font-weight: 100"> 
  <? echo $city['name']; 
 } ?></span> </td>
	 
	  <td>
<span> 
		<style> 
			  a {
    color: #000000;
    text-decoration: none;
			  font-weight: 100;
} 
			  a:hover
			  {
				  text-decoration: none;
				  color: #18A023;
			  }
		  
		  </style>   <a href="#" id="myBtn_<? echo $b['id'];?>">  გაგზავნე</a></span>
	  
	  <span id="myModal_<? echo $b['id'];?>" class="modal">

  <!-- Modal content -->
		   <?php if($_SESSION['USER_ID']==0) 
   {
   ?>
		  
  <span class="modal-content">
    <span class="close" id="close_<? echo $b['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    
  
    <p>თქვენ არ ხართ ავტორიზებული. წერილის მისაწერად საჭიროა ავტორიზაცია.<br><br> გთხოვთ, გაიაროთ ავტორიზაცია.<br><br>
    
 
    <span style="background-color:#4267b2; width:160px; margin:0 auto; padding-top:10px; padding-bottom:10px; color:#FFFFFF;" align="center">
    
 
 <FORM NAME ="form1" METHOD ="POST" ACTION ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Username: <INPUT TYPE = 'TEXT' required Name ='username'  value="<?PHP print $uname;?>" maxlength="20" style="width:250px; border:1px solid #8B8B8B;"> <br><br>
Password: <INPUT TYPE = 'password' required Name ='password' id="myInput" value="<?PHP print $pword;?>" maxlength="16" style="width:250px; border:1px solid #8B8B8B; position:relative; left:3px;">
<span style="position:relative; padding-left:15px;"> <input type="checkbox" onclick="myFunction()">   </span>
<script type="text/javascript"> function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} </script>
 <br> <br>
 <span style="position:relative; left:10px;">
<INPUT TYPE = "Submit" Name="Submit1"  VALUE="ავტორიზაცია" style="width:250px; border:1px solid #8B8B8B; position:relative; left:61px; top:">
 

</FORM> </span>
<br><br>
 

</span> <? } ?>
	 

	 		   <?php if($_SESSION['USER_ID']!=0) 
   {
   ?>
		  
  <span class="modal-content">
    <span class="close" id="close_<? echo $b['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    
  
    <p>მიაბი CV<br><br>
    
 
    <span style="background-color:#4267b2; width:160px; margin:0 auto; padding-top:10px; padding-bottom:10px; color:#FFFFFF;" align="center">
    
 
 <FORM NAME ="cv" METHOD ="POST" ACTION ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

მიაბი CV (დასაშვებია მხოლოდ PDF ან Word office) 
	 
	 <input type="file" id="img" name="img" accept="application/msword, application/pdf/*">
	 
	 
	 <INPUT TYPE = 'TEXT' required Name ='username'  value="<?PHP print $uname;?>" maxlength="20" style="width:250px; border:1px solid #8B8B8B;"> <br><br>
Password: <INPUT TYPE = 'password' required Name ='password' id="myInput" value="<?PHP print $pword;?>" maxlength="16" style="width:250px; border:1px solid #8B8B8B; position:relative; left:3px;">
<span style="position:relative; padding-left:15px;"> <input type="checkbox" onclick="myFunction()">   </span>
<script type="text/javascript"> function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} </script>
 <br> <br>
 <span style="position:relative; left:10px;">
<INPUT TYPE = "Submit" Name="Submit1"  VALUE="ავტორიზაცია" style="width:250px; border:1px solid #8B8B8B; position:relative; left:61px; top:">
 

</FORM> </span>
<br><br>
 

</span> <? } ?>
	 
	 
	 
	 
	 
	 </span> 

 <script> // Get the modal
var modal_<? echo $b['id'];?> = document.getElementById("myModal_<? echo $b['id'];?>");
// Get the button that opens the modal
var btn_<? echo $b['id'];?> = document.getElementById("myBtn_<? echo $b['id'];?>");
// Get the <span> element that closes the modal
var span_<? echo $b['id'];?> = document.getElementById("close_<? echo $b['id'];?>");
// When the user clicks on the button, open the modal
btn_<? echo $b['id'];?>.onclick = function() {
  modal_<? echo $b['id'];?>.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span_<? echo $b['id'];?>.onclick = function() {
  modal_<? echo $b['id'];?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_<? echo $b['id'];?>) {
    modal_<? echo $b['id'];?>.style.display = "none";
  }
}
 </script> 


<!-- POP UP -->



<aside id="contactForm" style="display:none">
    
      	<Form Method = "Post" action="">
<textarea  name="message" id="message"  rows="5" style="width:99%;" >&nbsp;</textarea>
<input type="submit" name="send-message" value="გაუგზავნე"><input type="button"  onclick="$('#contactForm').hide();" value="დახურვა">
</Form>
   
</aside>
	  
	  
	  
	  </td> 
	  
	  <td onclick="javascript:location.href='index.php?do=fullcompany';" style="cursor: pointer">
		 <div style="display: inline-block; min-width: 70px; " >  <? if(empty($avtori['upload'])) { ?>
		   <img src="IMG/No_Image_Available.jpg" id="im66" class="cover66" style="float: left">
		  <? } else { ?>
		  
		  <img src="<? echo $avtori['upload']; ?>" id="im66" class="cover66"> <? } ?> </div>
		  
		  <div style="display: inline-block; "> 
			  
			<?  
echo "<a href='index.php?do=fullcompany&id=".$avtori['id']."'>". $avtori['username'].'</a>';   ?>  
	  </div></td>
				    <td>
						
						
		<?php echo dateToString($b['period_from']); ?></td>
      <td><?php echo dateToString($b['period_to']); ?>
		  <br>
		 </td>
				 
				 <td>  
		  
		  
		  
		  <span class="tooltip1" style="position: relative; left: 3px; float: right">
 
	 
	 
	 <img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back.png'; else echo 'heart2.png'; ?>" onclick="addtofav(this, <?=$b['id']?>)" style="position:relative; cursor: pointer; z-index:0; width:20px; " class=""><span id="tt_<?=$b['id']?>" class="tooltiptext1"><? if(favorited($b['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?></span> </span>
 <div id="carousel<?=$b['id']?>" class="carousel slide" data-ride="carousel" data-interval="false" style=""></td>
    </tr> 
			 
			 
			 
			 
			 
        	
			
			
<? }   ?>
</tbody>
				 </table> </div>
        	 <style>
.white-color {
color:white;
}
.green-color {
color:#7B8836;
	font-size: 22px;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
	font-size: 22px;
}
</style> 
			 
			 
			 <? 
			 $result = mysqli_query($conn, "select count(1) FROM login WHERE s_vip>'".time()."'");
$row = mysqli_fetch_array($result);
$total = $row[0];
 
	if ($total>4) { ?>
			 <a name="dada" onclick="if(this.name == 'dada') $('#more').show() && $('#spans').hide(); else $('#more').hide() ;" style="cursor: pointer"> <span id="spans"  style="position: relative; left: 15px; top: 7px; color: #000">  <ch>  მეტის ნახვა</ch> <i class="fa fa-arrow-right white-color"></i></span></a>
       
	 <? } ?>
	 <div id="more"  style="display: none" >  
	<? include('second_block.php'); ?> 
</div>
       
    </section>

		 


		 

   
       
       
       
      <section class="ftco-facts img ftco-counter" style="background-image:url(images/44.jpg); position:relative; top:0px;">
			<div class="overlay"></div>
			<div class="container" style="font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
				<div class="row d-flex align-items-center" style="position: relative; top: -50px;">
					<div class="col-md-5 heading-section heading-section-white">
						 
						
						<span class="subheading"><ch><? echo $b['satauri'];  ?> </ch></span>
						<h2 class="mb-4"> <ch> 
	
	კარგი სამსახური </h2>
						<p class="mb-0">
							<a href="#" class="btn btn-secondary px-4 py-3" style="background-color: #F3BA3F">
								<!-- --> goodjob.ge
							</a>
							</p>
					</div>
					<div class="col-md-7">
						<div class="row pt-4">
							
					 
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">   
		                <strong class="number" data-number="1500">0</strong>
		                <span>დასაქმება</span>
		              </div>
		            </div>
		          </div>
							
	 		
							
							
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="5">0</strong>
		                <span>ვაკანსიები</span>
		              </div>
		            </div>
		          </div>
							
							
							
 			
							
							
							
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="56">0</strong> 
		                <span>რამე ტექსტი</span>
		              </div>
		            </div>
		          </div>
							
							
							
							
		 				
		          <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="45">0</strong>
		                <span>აქაც რამე იქნება</span>
		              </div>
		            </div>
		          </div>
	          </div>
					</div>
				</div>
			</div>
		</section>


    <section class="" id="blog-section" style="position:relative; margin-top:-96px; background-color: #F3BA3F">
      <div class="container" style="position:relative; margin-top:-80px;">
  
          		 

 <div class="col-md-12">
 
	 <!--სარეკლამო ბანერი-->
	  
	  <!--სარეკლამო ბანერი-->
	
<div  style="position:relative; align-content:center; float: left;  display:inline-block; width:auto; left:-15px; margin-top:-15px; padding-bottom:22px; color:#41403F;" align="left"> 
 <img src="<?=HTTP_HOST?>IMG/vip-logo.gif" width="25" style="position:relative; top: 35px; border-radius:2px;" > </div>
 
 <div class="col-md-12" style="float: right; display: inline-block; color: #FFFFFF; font-size: 16px;" align="center">  <ch style="position:relative; font-size:16px; top:-10px;"> <b>  VIP </b>   </div>
   
   
   </div>
   
   
  
         
         <div class="row d-flex" style="clear:both; padding-bottom: 100px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
  <?
	
 
		if (isset($_POST['pid'])) {
      if (!$_STARS->save($_POST['pid'], getUserIp(), $_POST['stars'])) {
        echo "<div>$_STARS->error</div>";
      }
    }
	
	$x==0;
// $a=mysqli_query($conn, "select * from login WHERE hidden='1' AND vip>'".time()."'  order by id desc limit 0,8");
   $a=mysqli_query($conn, "select * from login WHERE vip>'".time()."' order by id desc limit 0,4");
   while ($b=mysqli_fetch_assoc($a))
{
 ?> 
  
        	<div class="col-md-3 ftco-animate fadeInUp ftco-animated" style="position:relative; margin-top:20px;  height: 317px; ">
            <div class="blog-entry" style="position:relative; margin-bottom:25px; background-image: url('IMG/back.png'); height: 180px; border-top-left-radius: 10px; border-top-right-radius: 10px; z-index: 101 ">
 

<span class="tooltip1" style="position:relative; float:right; top:15px; ">
 
	 
	 
	 <img src="<?=HTTP_HOST?>IMG/<? if(favorited($b['id'])) echo 'heart-back.png'; else echo 'heart2.png'; ?>" onclick="addtofav(this, <?=$b['id']?>)" style="position:relative; float:right; opacity:1; top:22px; right:25px; z-index:14; width:20px; " class=""><span id="tt_<?=$b['id']?>" class="tooltiptext1"><? if(favorited($b['id'])) echo 'რჩეულებიდან წაშლა'; else echo 'რჩეულებში დამატება'; ?></span> </span>
 <div id="carousel<?=$b['id']?>" class="carousel slide" data-ride="carousel" data-interval="false" style="">
    <!-- Indicators -->
    
 
    <!-- Wrapper for slides -->
	 
	 
<span style="color: #FFFFFF; position: relative; top: 15px; left: 20px;"> 
	
	<i class="fa fa-user-circle"></i> <?=$b['username']?> </span><div class="carousel-inner" role="listbox" style="z-index: 10; top: 20px;">
 <a href="index.php?do=full&id=<? echo $b['id'];?>"> <img src="<? echo $b['upload'];?>" id="im66" class="cover66" style="border-radius: 50%; border:#fceac5 5px solid;  display: block;
  margin-left: auto;
  margin-right: auto; "> </a>
	 
	   
    </div>

    <!-- Controls -->
     
  </div>
        

     				   <script>
var stars = {
  // (A) INIT - ATTACH CLICK & HOVER EVENTS FOR STARS
  init : function () {
    for (let docket of document.getElementsByClassName("pstar")) {
      for (let star of docket.getElementsByTagName("img")) {
        star.addEventListener("mouseover", stars.hover);
        star.addEventListener("click", stars.click);
      }
    }
  },

  // (B) HOVER - UPDATE NUMBER OF YELLOW STARS
  hover : function () {
    let all = this.parentElement.getElementsByTagName("img"),
        set = this.dataset.set,
        i = 1;
    for (let star of all) {
      star.src = i<=set ? "<?=HTTP_HOST?>rating/star.png" : "<?=HTTP_HOST?>rating/star-blank.png";
      i++;
    }
  },
  
  // (C) CLICK - SUBMIT FORM
  click : function () {
    document.getElementById("ninPdt").value = this.parentElement.dataset.pid;
    document.getElementById("ninStar").value = this.dataset.set;
    document.getElementById("ninForm").submit();
  }
};
window.addEventListener("DOMContentLoaded", stars.init);
</script>

 
              
              
             
              <div class="tooltip1" style="background-color: #fceac5; position: relative; width: 100%; top: -20px;  z-index: 0;">
               <div class="row" style="padding-left:15px; padding-top:35px;">
             
              
             
             
       
             
              <div style="position:relative; padding-left:5px;">
 			   </div> 
				   <div style="padding-left:25px;"> <div style="min-height: 55px;"> 
 					  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
<? echo str_replace("|", ",  ", trim($b['mimdinare'], "|")); ?>  
					   
					   
					
   <?
		  $res_ubani=mysqli_query ($conn, "SELECT * FROM ubani where id='$b[ubani]'");
 $ubani = mysqli_fetch_assoc($res_ubani); 
 
 if(!empty($ubani))
echo "<br><i class='fa fa-globe' aria-hidden='true'></i>&nbsp&nbsp".$ubani['name']; ?>
					    </div>
				   
				   
				    

<?
	

	
	

	$average = $_STARS->avg(); // AVERAGE RATINGS
    $ratings = $_STARS->get(getUserIp()); // RATINGS BY CURRENT USER
	if (isset($_POST['pid']) && $_POST['pid']== $b[id]) {
		mysqli_query($conn, "UPDATE login SET rating='".$average[$b['id']]."' WHERE id='$b[id]'");
	}

?>


<div class="pdt" style="border: none; position: relative; top: -10px; padding:0"  >
      <div class="pstar" data-pid="<?=$b['id']?>">
	  
         <?php 
        $rate = isset($ratings[$b['id']]) ? $ratings[$b['id']] : 0 ;
		 
        for ($i=1; $i<=5; $i++) {
			
          $img = $i<=$rate ? "star" : "star-blank" ;
          echo "<img src='".HTTP_HOST."rating/$img.png' data-set='$i'>";
        }
		 
      ?></div>
    </div>


<form id="ninForm" method="post" target="_self">
      <input id="ninPdt" type="hidden" name="pid"/>
      <input id="ninStar" type="hidden" name="stars"/>
    </form>
				   
				   
				       
				   </div> </div>
	
	
 

 

 
         
         
           
		   
   



        </div>
            </div>
        	</div>	
			
			
<? }   ?>
        	 <style>
.white-color {
color:white;
}
.green-color {
color:#7B8836;
	font-size: 22px;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
	font-size: 22px;
}
</style> 
			 
			 
			 <? 
			 $result = mysqli_query($conn, "select count(1) FROM login WHERE vip>'".time()."'");
$row = mysqli_fetch_array($result);
$total = $row[0];
 
	if ($total>4) { ?>
			 <a name="vips" onclick="if(this.name == 'vips') $('#more_vip').show() && $('#spans').hide(); else $('#more_vip').hide() ;" style="cursor: pointer"> <span id="spans"  style="position: relative; left: 15px; top: 7px; color: #FFFFFF">  <ch>  მეტის ნახვა</ch> <i class="fa fa-arrow-right white-color"></i></span></a>
       
	 <? } ?>
	 <div id="more_vip"  style="display: none" >  
	<? include('second_vip.php'); ?> 
</div>
			 
     
    </section>
 
       
        