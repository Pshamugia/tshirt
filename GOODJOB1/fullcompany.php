 <section class="ftco-section">
     <div style="width:100%; top:-140px; position:relative; background-color:#F3BA3F; border: 3px solid #F3BA3F; z-index: 4"> </div>
 <div class="container">
	 
		 <style> 
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th 
{
background-color: #EDF8ED;
} 
			 </style>    <style>
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
	 
	 <div style="min-height: 500px; z-index: 101;  ">
		<?
		 	$avtori = mysqli_fetch_assoc(mysqli_query($conn, "select * FROM  login WHERE id='$_GET[id]'"));
		 ?>
		 <div> <? echo $avtori['username']; ?></div>
		 
		 
		<div class="table-responsive" style="position: relative; overflow: hidden; padding-bottom: 20px;  ">
<table class="table table-hover"  >
	<thead>
    <tr>
       <th scope="col" class=""><ch style="position:relative; font-size:12px;  "> ვაკანსიის დასახელება </ch></th> 
		<th scope="col" ><ch style="position:relative; font-size:12px;  "> CV </ch> </th>	
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
   $a=mysqli_query($conn, "select * from gancxadeba WHERE avtoris_id='$_GET[id]' order by id desc limit 0,12");
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
  <span class="modal-content">
    <span class="close" id="close_<? echo $b['id'];?>">&times; <span style="font-size:14px; position:relative; top:-5px;"> Close </span></span>
    
    
    <p>თქვენ არ ხართ ავტორიზებული. წერილის მისაწერად საჭიროა ავტორიზაცია.<br><br> გთხოვთ, გაიაროთ ავტორიზაცია.<br><br>
    
 
    <span style="background-color:#4267b2; width:160px; margin:0 auto; padding-top:10px; padding-bottom:10px; color:#FFFFFF;" align="center">
    
 
 <FORM NAME ="form1" METHOD ="POST" ACTION ="#">

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
 

</span></span> 

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
		 
		 
		 
		 
 </div>
</div> 
</section>