<?php   

function dateToStrings($date, $delimiter = '-', $type = 1) {
            if (!empty($date)) {
                $month = array(
                    '01' => 'January',
                    '02' => 'February',
                    '03' => 'March',
                    '04' => 'April',
                    '05' => 'May',
                    '06' => 'June',
                    '07' => 'July',
                    '08' => 'August',
                    '09' => 'September',
                    '10' => 'October',
                    '11' => 'November',
                    '12' => 'December',
                );
                $arr = explode($delimiter, $date);
                if ($type == 1) {
                    return                     
                     '<kl>'. $arr[2] . '&nbsp;'. $month[$arr[1]].'</kl>';
                     
                  
                }
            }
            return '';
        }
 
?>
<link href="logo.css" rel="stylesheet" type="text/css">
<div id="slideshow-sec" style="position:relative; margin-top:
-28px; padding:0;">
        <div id="carousel-div" class="carousel slide" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active" >
    <style>
		#im {
  height: 600px;
  transition: all .2s ease-in-out;
}

.cover {
  width: 100%;
  object-fit: cover;
  
  
}
 
	

	</style>
    <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE eng_geo='Eng' and subkat='yes' order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 
	  <div onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';" style="cursor:pointer;">
    
                        <img src="../<? echo $b['upload'];?>" id="im" class="cover" alt="" />
                            <div class="carousel-caption">
                        <h1 class="wow slideInLeft" data-wow-duration="2s" style="font-size:16px; font-weight:100; top:120px; position:relative; width:340px;"> <k> <?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
<?	echo $avts_id['avtori']; ?></k> </h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" style="font-size:16px; font-weight:100; top:120px; position:relative;"> <k style="line-height:25px;"> <? echo $b['satauri'];?> </k> </h2>  
                                 </div>
                                 
                                 <? }} ?>
                            </div>    
                           
                        </div>
                        <div class="item">    <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE subkat='yes' and eng_geo='Eng' order by news_date desc limit 1,1");
while ($b=mysqli_fetch_array($a))

{
 ?> 
	  <div onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';" style="cursor:pointer;">
    
                        <img src="../<? echo $b['upload'];?>" id="im" class="cover" alt="" />
                            <div class="carousel-caption">
                            <style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(FONTS/bpg_mrgvlovani_caps_2010.ttf); } @font-face { font-family: bpg_mrgvlovani_caps_2010; font-weight: 100; src: url('FONTS/bpg_mrgvlovani_caps_2010.ttf'); }  k { font-family:bpg_mrgvlovani_caps_2010, sans-serif; }  </style> 
                          <h1 class="wow slideInLeft" data-wow-duration="2s" style="font-size:16px; top:120px; position:relative; font-weight:100; width:340px;"> <k> <?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
<?	echo $avts_id['avtori']; ?></k> </h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" style="font-size:16px; font-weight:100; top:120px; position:relative;"> <k style="line-height:25px;"> <? echo $b['satauri'];?> </k> </h2>  
                                 </div>
                                 
                                 <? }} ?>
                            </div>
                            
                        </div>
                        <div class="item">
                            <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE subkat='yes' and eng_geo='Eng' order by news_date desc limit 2,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 
	  	 <div onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';" style="cursor:pointer;">
    
                        <img src="../<? echo $b['upload'];?>" id="im" class="cover" alt="" />
                            <div class="carousel-caption">
              <h1 class="wow slideInLeft" data-wow-duration="2s" style="font-size:16px; top:120px; position:relative; font-weight:100; width:340px;"> <k> <?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
<?	echo $avts_id['avtori']; ?></k> </h1>      
                                 <h2 class="wow slideInRight" data-wow-duration="2s" style="font-size:16px; font-weight:100; top:120px; position:relative;"> <k style="line-height:25px;"> <? echo $b['satauri'];?> </k> </h2>  
                                 
                                 </div>
                                 <? }} ?>
                            </div>
                           
                        </div>
                    </div>
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-div" data-slide-to="1"></li>
                        <li data-target="#carousel-div" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-div" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-div" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
    </div>
    <!-- SLIDESHOW SECTION END-->
    <div class="below-slideshow">
         <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="width:380px;">
            
            
            <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
width:300px;
height:45px;
left:-40px;
top:-15px;

}

#indexs a{
display:block;
color:#000000;
text-decoration:none;
font-size:14px;
width:300px;

height:45px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#indexs a:hover{
background:#e9ebee;
color:#313131;
height:45px;
width:300px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

 
}

#indexs li{
float:left;
position:relative;
 

}

#indexs ul {
position:absolute;
display:none;
 
 


}

#indexs li ul a{
 
float:left;
 


}

#indexs ul ul{
 


}	

#indexs li ul ul {
left:12em;
 

}

#indexs li:hover ul ul, #indexs li:hover ul ul ul, #indexs li:hover ul ul ul ul{
display:none; 

}
#indexs li:hover ul, #indexs li li:hover ul, #indexs li li li:hover ul, #indexs li li li li:hover ul{
display:block;

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
}

</style> 
                <div class="txt-block" id="gverditi" style="width:380px; position:relative;">

              
 <k style="left:0px; position:relative; top:5px;"><a href="<?=url('ge','events')?>" id="gverditi">  EVENTS </a> </k>  
 <hr width="340" style="border: 0;
    border-bottom: 1px dashed #ccc;
    background: #232323;" align="left">
 

 <ul id="indexs">  
 <li id="indexs" style="position:relative; border-bottom:0px solid #FFFFFF;">

  <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='ღონისძიებები' and eng_geo='Eng' order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 								<p style="font-size:16px; margin-top:20px;" id="gverditi">
   <style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf'); }   j { font-family:bpg_algeti_compact, sans-serif; }    </style>


<j style="position:relative; width:50px;" align="left">
		  <?php 
  function dateToString($date, $delimiter = '-', $type = 1) {
            if (!empty($date)) {
                $month = array(
                    '01' => 'Jan',
                    '02' => 'Feb',
                    '03' => 'Mar',
                    '04' => 'Apr',
                    '05' => 'May',
                    '06' => 'Jun',
                    '07' => 'Jul',
                    '08' => 'Aug',
                    '09' => 'Sep',
                    '10' => 'Oct',
                    '11' => 'Nov',
                    '12' => 'Dec',				
					
					
                );
                $arr = explode($delimiter, $date);
                if ($type == 1) {
                    return                     
             '<div style="font-size:25px; line-height:23px; align:left; width:20px; color:#FFFFFF;"><j>'. $arr[2] . '</j></div>  <div style="font-size:16px; top:-4px; color:#FFFFFF; position:relative;"><j>' . $month[$arr[1]].'</j></div>';
                     
                  
                }
            }
            return '';
        }
 
?>

<?php echo dateToString($b['news_date']); ?> 

 </j>
										<div style="position:relative; width:350px; line-height:21px; padding-left:45px; margin-top:-48px;"> <a href="<?=url($b['satauri'],'b', $b['id'])?>" id="gverditi"> <j> <? echo $b['satauri'];?> </j></a>
</div>
									</p> <? }} ?>
                      </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                <div class="txt-block" style="width:380px;" id="gverditi">

               <k style=" position:relative; top:5px;"><a href="<?php echo url('ge','blogs'); ?>" id="gverditi"> BLOGS </a> </k>  
            
               <hr width="340" style="border: 0;
    border-bottom: 1px dashed #ccc;
    background: #232323;" align="left">
               
               
 <ul id="indexs">  
 <li id="indexs" style="position:relative; border-bottom:0px solid #FFFFFF; padding-top:17px;">
               <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='ბლოგები' and eng_geo='Eng' order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 		
	
<?php echo dateToString($b['news_date']); ?> 

 </j> <? $avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?>
										<div style="position:relative; width:350px; line-height:21px; padding-left:45px; margin-top:-48px;"> <a href="<?=url($b['satauri'],'b', $b['id'])?>" id="gverditi"> <j><? echo $avts_id['avtori']; ?>  -  <? echo $b['satauri'];?> </j></a>
</div>
								</p> <? }} ?>
									</p> </li></ul>
                      </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="position:relative;" id="gverditi">
                <div class="txt-block" id="gverditi" style="width:380px;">
                <k style="position:relative; top:5px;"><a href="<?php echo url('ge','hatespeech'); ?>" id="gverditi">   WRITERS AGAINST HATE </a> </k>  
            
               <hr width="340" style="border: 0;
    border-bottom: 1px dashed #ccc;
    background: #232323;" align="left">
               <ul id="indexs">  
 <li id="indexs" style="position:relative; border-bottom:0px solid #FFFFFF; padding-top:17px;">
               <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 

$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='სიძულვილის ენა' and eng_geo='Eng' order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
	
{
 ?> 		
	
<?php echo dateToString($b['news_date']); ?> 

 </j><? $avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?>

										<div style="position:relative; width:350px; line-height:21px; padding-left:45px; margin-top:-48px;"> <a href="<?=url($b['satauri'],'b', $b['id'])?>" id="gverditi"> <j> <? echo $avts_id['avtori']; ?>  -  <? echo $b['satauri'];?> </j></a>
</div>
									</p> <? }} ?> </li></ul>

                      </div>
            </div>
        </div>

    </div>
    </div>
    <!-- BELOW SLIDESHOW SECTION END-->
      
     <!-- TAG HOME SECTION END-->
   
            <div class="container" style="position:relative; margin-bottom:-60px;">
             
        <div class="row pad-set">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="just-txt-div" style="position:relative; margin-top:-60px; width:100%;">
                
                     <?
      if ($_REQUEST['kategory'])
$h=$_REQUEST['kategory'];
else 
$h='';
if (!$_REQUEST['do'])
{ 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory='ვიდეო' and eng_geo='Eng' order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{
 ?> 
                
                    <h2 id="linkebi" style="line-height:18px;"> <k> <a href="<?=url($b['satauri'],'b', $b['id'])?>" style="font-size:16px;"> 
					<j> <b> <? echo $b['satauri']; ?> </b> </j></h2>
 <style> 
@font-face { font-family: bpg_algeti_compact; src:url(../FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('../FONTS/bpg_algeti_compact.ttf'); }   j { font-family:bpg_algeti_compact, sans-serif; }    </style>
                
                <j style="font-size:14px; color:#000000; position:relative; left:px; top:3px; font-size:14px;"> <img src="../images/date-and-time.png" width="15px" style="position:relative; top:-2px;"> <l style="font-size:14px; padding-left:5px;">  
				
		 
		
 
				<j>
				
			  
	<? echo dateToStrings($b['news_date']); ?> </j>
                
                
                
                
                
                </l>  &nbsp; <img src="../IMG/youtube.png" width="16" style="position:relative; top:0px; font-size:14px;"> <j style="position:relative; padding-left:5px; top:2px;"> video </j> <br>  
                
                  
                
                
              <j style="position:relative; top:15px; line-height:24px; bottom:20px; color:#000000;"> <? echo $b['agwera'];?> </j>

<div style="padding-bottom:20px;"> </div>
 <div align="left" id="dama" style="position:relative; border-radius:5px; width:185px; border:1px solid #ADB1CD; padding:5px; padding-bottom:6px; top:20px;"> <a href="<?php echo url('ge','video'); ?>" style="position:relative; padding-top:3px; font-size:12px; margin-left:3px;"> <k> ALL VIDEOS</a> </k> </div>  
       </just>
               
                </div>
                
                </div>
                
                
                
                
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="just-txt-div" style="position:relative; top:-30px; margin-bottom:-100px;">
 
 
 <style>
		#im3 {
  height: 315px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover3 {
  width: 100%px;
  object-fit: cover;
  
  
}
.cover3:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
	 width:100%; 
	  }
	 
	 

.zoom {
  position: relative;
  overflow: hidden;
  width: 100%;
  line-height: 0;
  border-radius:15px;
}
.zoom img {
  max-width: 100%;
  min-width:100%;
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
  border-radius:15px;
 
}
.zoom:hover img {
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
  
  border-radius:15px;
  max-width: 100%;
  min-width:100%;
}

	</style> 
     
	 <div class="zoom" onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';" style="width:100%; cursor:pointer; margin-top:-9px;" > <img src="<?=HTTP_HOST?>../<? echo $b['upload'];?> " id="im3" class="cover3" style="position:relative; border-radius:15px;"> <span style="position:relative; top:-280px; left:438px; z-index:140; color:#FFFFFF; font-size:14px;"> 
	 
	 
	 
	  
		 
     
     
     
     
     
      </span>
</div>
    
      
      <img src="<?=HTTP_HOST?>images/play.png" width="70" style="position:relative; top:-80px; left:25px;">
</div> </a>

          </div>
     
   
  <? }} ?>
     
 
                      </div>
                </div>
            </div>
          </div>      
  
   <!--VEDIO SECTION END-->
    <div class="parallax-like">
        <div class="overlay">

       <style> @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
		
		
		
		.two 
		
		{
		width:100%;	
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
	
	
	 </style>
     <div class="one">
       <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="just-txt-div" style="position:relative; width:1000px; top:15px; margin-left:380px;">
 <k style="font-size:24px; position:relative; top:10px;"> PEN GEorgia - for writers' rights </k>  
                     
                      
                </div>
                </div>
            
            
            
            </div>
           </div>
             </div>
    </div> </div>
     <!-- PARALLAX LIKE SECTION END-->
   <div class="just-sec">
        

        <div class="container" style="position:relative; margin-bottom:-99px;">
       
             
           
           
            <hr data-content="&amp;" />  

   <h1 class="head-line"><k style=" background-color:#FFFFFF; position:relative; top:-37px; font-size:24;"> &nbsp; NEWS &nbsp; </k> </h1>
             
             
            
  								 
										 <style>
		#im4 {
  height: 200px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover4 {
  width: 350px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
 
	  }
	 
	 

.zoom4 {
  position: relative;
  overflow: hidden;
  width: 350;
  line-height: 0;
  border-radius:15px;
}
.zoom4 img {
  max-width: 350px;
  min-width:350px;
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
  border-radius:15px;
 
}
.zoom4:hover img {
  -moz-transform: scale(1.4);
  -webkit-transform: scale(1.4);
  transform: scale(1.4);
  
  border-radius:15px;
  max-width: 350px;
  min-width:350px;
}

	</style> 
  
       
        
        <div class="row" style="position:relative; top:-28px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf"> 
           <?   
 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory in('სიახლეები', 'ინტერვიუ', 'განცხადებები', 'ღონისძიებები') AND eng_geo='Eng' order by news_date desc limit 0,9");
while ($b=mysqli_fetch_array($a))

{
 ?> 
         
<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12" id="linkebi" style="position:relative; margin-bottom:-50px;">
<div class="just-txt-div" style="cursor:pointer;" onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';">
<img src="<?=HTTP_HOST?>../<? echo $b['upload'];?>" id="im4" class="cover4" style="position:relative; border-radius:15px;" > 
</div>
<span style="position:relative; top:-15px;">
<h4 style="width:350px; position:relative; margin-top:-10px; line-height: 22px;"> <a href="<?=url($b['satauri'],'b', $b['id'])?>" style="font-size:14px;"> <j> <? echo $b['satauri'];?> </j> </a></h4> 

<span style="position:relative; top:-15px; "> 
<span style="position:relative; font-size:12px; padding-bottom:15px;">  <img src="<?=HTTP_HOST?>../IMG/hour.png" width="9" style="position:relative; top:-1px;"> </span>
<span style="position:relative; padding-left:3px; font-size:12px;"><?php echo dateToStrings($b['news_date']);?>  <?php echo $b['hour']; ?> </span>  
<span style="font-size:12px; position:relative; padding-left:12px;" class="one"> 
<img src="<?=HTTP_HOST?>../IMG/view.png" width="15" style="position:relative; top:-1px;"> </span> 
<span style="position:relative; top:0px; font-size:12px; color:#2A2A2A;">  <?php


echo $b['view_count'];

?> </span> </span> </span>  </div>                                             
                                                                        
                                                                        
                                                                         
 <? 
$x++;
 
if ($x==3) 
{
echo '<div style="clear:both;"></div>';
$x=0;
}
 }   ?>		   </div> 
         </div>    
         
        
             
          
             
 
      
        <!--SET-DIV SECTION END--> 
    
      
       <!--FOOTER SECTION END-->
      <!-- WE PUT SCRIPTS AT THE END TO LOAD PAGE FASTER-->
     <!--CORE SCRIPTS PLUGIN-->
    <script src="<?=HTTP_HOST?>assets/js/jquery-1.11.1.min.js"></script>
     <!--BOOTSTRAP SCRIPTS PLUGIN-->
<script src="<?=HTTP_HOST?>assets/js/bootstrap.js"></script>
     <!--WOW SCRIPTS PLUGIN-->
    <script src="<?=HTTP_HOST?>assets/js/wow.js"></script>
     <!--FLEXSLIDER SCRIPTS PLUGIN-->
    <script src="<?=HTTP_HOST?>assets/js/jquery.flexslider.js"></script>
     <!--CUSTOM SCRIPTS -->
    <script src="<?=HTTP_HOST?>assets/js/custom.js"></script>
 