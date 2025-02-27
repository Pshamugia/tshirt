<div class="container" style="position:relative; margin-top:-5px;">
  

 <div class="col-md-12">
 
	 <!--სარეკლამო ბანერი-->
	 
	  <!--სარეკლამო ბანერი-->
	
<div  style="position:relative; align-content:center; float: left;  display:inline-block; width:auto; left:-15px; margin-top:-15px; padding-bottom:22px; color:#41403F;" align="left"> 
 </div>
 
   
   
   </div>
   
   
  
         
         <div class="row d-flex" style="clear:both; padding-bottom: 25px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">
  <?
	
 
		if (isset($_POST['pid'])) {
      if (!$_STARS->save($_POST['pid'], getUserIp(), $_POST['stars'])) {
        echo "<div>$_STARS->error</div>";
      }
    }
	
	$x==0;
// $a=mysqli_query($conn, "select * from login WHERE hidden='1' AND s_vip>'".time()."'  order by id desc limit 0,8");
 $a=mysqli_query($conn, "select * from login WHERE vip>'".time()."' order by id desc LIMIT 4 OFFSET 4");;
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