<?php   
 if($_SESSION['LANG']=='ka')
 {
function dateToStrings($date, $delimiter = '-', $type = 1) {
            if (!empty($date)) {
                $month = array(
                    '01' => 'იანვარი',
                    '02' => 'თებერვალი',
                    '03' => 'მარტი',
                    '04' => 'აპრილი',
                    '05' => 'მაისი',
                    '06' => 'ივნისი',
                    '07' => 'ივლისი',
                    '08' => 'აგვისტო',
                    '09' => 'სექტემბერი',
                    '10' => 'ოქტომბერი',
                    '11' => 'ნოემბერი',
                    '12' => 'დეკემბერი',
                );
                $arr = explode($delimiter, $date);
                if ($type == 1) {
                    return                     
                     '<kl>'. $arr[2] . '&nbsp;'. $month[$arr[1]].'</kl>';
                     
                  
                }
            }
            return '';
        } }
 
?>

<?
if($_SESSION['LANG']=='en')
 {
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
                    '11' => 'November ',
                    '12' => 'December',
                );
                $arr = explode($delimiter, $date);
                if ($type == 1) {
                    return                     
                     '<kl>'. $arr[2] . '&nbsp;'. $month[$arr[1]].'</kl>';
                     
                  
                }
            }
            return '';
        } }
 
?> <div class="trending-area fix">
<div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12" style="position: relative; top: -4px;">
                        <div class="trending-tittle">
                            <strong style="padding-left: 10px; padding-right: 10px; "><span> <?=$LANG['announcement']?></span></strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated" >
                                <ul id="js-news" class="js-hidden">
									<? 
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE title_ka='განცხადებები' OR title_ka='ღონისძიებები' order by id desc");
	$menu=mysqli_fetch_assoc($res); 
									
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory LIKE '%$menu[id]|%' AND satauri_$_SESSION[LANG]!='' order by news_date desc limit 0,3"); 	 
while ($b=mysqli_fetch_array($a)) { ?>
                                    <li class="news-item"><a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>" style="color: #000000"> <? echo $b["satauri_$_SESSION[LANG]"]; ?></a></li>
									
									<? } ?>
									
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row" style="position: relative; top: -15px;">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                       <?     
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE (subkat='yes' AND hidden='0' AND satauri_$_SESSION[LANG]!='') order by news_date desc limit 0,1");
while ($b=mysqli_fetch_array($a))
{ ?>  
		<style>
		#immain{
  height: 450px;
  transition: all .2s ease-in-out;
			border-radius: 6px;
}
			.trending-area .trending-main .trending-top .trend-top-img::before
			{
				border-radius: 6px;
			}

.covermain{ 
  object-fit: cover;
   
}main1:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>				
						
						<div class="trending-top mb-30">
                            <div class="trend-top-img" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';"  style="cursor: pointer">
                                <img src="<? echo $b['upload'];?>" id="immain" class="covermain" alt="">  
                                
								
								
								<div class="trend-top-cap">
									
									
                                    <span class="<? if($b['kategory']=='პოეზია')
$span= "poezia";
 elseif($b['kategory']=='პროზა')
	 $span= "proza";
  elseif($b['kategory']=='რეცენზია')
	 $span= "recenzia";
  elseif($b['kategory']=='პოლიტიკა')
	 $span= "politika";
  elseif($b['kategory']=='ფილოსოფია')
	 $span= "filosofia";
 elseif($b['kategory']=='კრიტიკა/ესსე')
	 $span= "kritika";
 elseif($b['kategory']=='ინტერვიუ')
	 $span= "interviu";
elseif($b['kategory']=='visual-art')
	 $span= "visualuri";
elseif($b['kategory']=='citatium')
	 $span= "citatiumi";
elseif($b['kategory']=='utsonadoba')
	 $span= "utsonadoba";
else $span=''; echo $span ?>"><? $res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
 $title = mysqli_fetch_assoc($res);	
								   echo $title["title_$_SESSION[LANG]"]; ?></span>
                                    <h2><a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>">
										 
<?php echo $b["satauri_$_SESSION[LANG]"];?></a></h2>
                                </div>
								
                            </div>
                        </div><? } ?>
                        <!-- Trending Bottom -->
                         
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
					 
						
						<?     
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE (subkat='yes' AND hidden='0' AND satauri_$_SESSION[LANG]!='') order by news_date desc limit 2,2");
while ($b=mysqli_fetch_array($a))
{?> 
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';"  style="cursor: pointer" align="center">
                                <style>
							 
	.centered {
  position: absolute;
  top: 39%;
		 vertical-align: middle;
 margin: 0px 15px 0px 15px;
		 
}
.container3 {
  position: relative;
  text-align: center;
	border-radius: 5px;
  color: white;background-color: rgba(0,0,0,0.79) !important;
}
.trending-area .trending-main .trand-right-single
	{
	border-bottom:0px;
	padding-bottom:10px;
	}
							
		#im1{
  height: 210px;
  transition: all .2s ease-in-out;
 		
}

.cover1{
 
 width: 100%;
  object-fit: cover; 
		opacity: 0.3;
    filter: alpha(opacity=30); 
   
}
.cover1:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
 }
.cover44
{
 width: 100%;
  object-fit: cover; 											
}
#im44
									{
									height: 210px;	
									}
									
									
									.imgbox {
    height: 100px;
    width: 100%;
    overflow: hidden;
  
    background-size: contain;
}
									
	
	.trending-area .trending-main .trand-right-single .trand-right-img .img
	{ }									
									
  </style>
								<div class="container3 cover44 imgbox" align="center" id="im44">
 <img src="<? echo $b['upload'];?>" class="cover1"  alt="">  
     <div class="centered" style="vertical-align: middle">  <h4 align="center"> <a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>" style="color: rgba(255,255,255,1.00)">  <?php echo $b["satauri_$_SESSION[LANG]"];?></a></h4></div>
</div>
						 
                     
                                
                            </div>
                        </div>
						
						<? } ?>
						
						
						
                         
                         
                         
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
           
     
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                 <!-- section Tittle -->
                <div class="row" style="margin-top: 25px;">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3><span style="color: #000"> <i class="fa fa-book" aria-hidden="true"></i>
  <?=$LANG['blogs']?> </span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                      
                           
						<style>
		#im33{
  height: 300px;
  transition: all .2s ease-in-out;
}

.cover33{ 
	width: 103% !important;
  object-fit: cover;
	
   
} .cover33:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>	
							<?
$res=mysqli_query($conn, "SELECT * FROM menu WHERE title_ka='ბლოგები'");
	$menu=mysqli_fetch_assoc($res);
 $a=mysqli_query($conn, "select * from kultura_cxrili where kategory LIKE '%$menu[id]|%' AND satauri_$_SESSION[LANG]!='' AND hidden='0' order by news_date desc limit 0,3");
	
while ($b=mysqli_fetch_array($a))
{
 ?> 
							<div class="col-md-4" style=" ">
						<div style="padding-right: 0px;"> 
							<div class="single-recent mb-100" style="margin-left: -2px;   display: inline-block">
                                <div class="what-img" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';" style="cursor: pointer">
                                    <img src="<? echo $b['upload'];?>" id="im33" class="cover33" alt="">
                                </div>
                                <div class="what-cap">
                                    <span style="font-weight: 100" class="color4">
<? $res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
 $title = mysqli_fetch_assoc($res);	
								   echo $title["title_$_SESSION[LANG]"];  ?></span>
                                    <h4><a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>" style="font-weight: 100"><? if($_SESSION['LANG']=='ka')
 { 
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori']; 
 }
							else
							{
$avt=mysqli_query($conn, "select * from  avtori_new where id='$b[avtori2]'");
$avts_id=mysqli_fetch_array($avt); echo $avts_id['avtori2']; 	
							}
							?> - <?php echo $b["satauri_$_SESSION[LANG]"];?></a></h4>
                                </div>
                            </div>
								
                    </div>     </div>
							<? } ?>
							
							
                             
                             
                              
							 
							
						
                    
                </div>
           </div>
        </div>
    </div> 
          
    <!-- End Weekly-News -->
    <!-- Start Youtube -->
     
    <!-- End Start youtube -->
	
	
	<div class="row" style="background-color: #242628">
	 
                    <div class="col-md-12">
                        <div class="recent-active dot-style d-flex dot-style">
                    <div class="container">
						
						<div class="section-tittle mb-30" style="position: relative; top: 25px;">
                            <h3><span style="color: #fff; "> <i class="fas fa-video"></i>  <?=$LANG['multimedia']?> </span></h3>
                        </div>
						
                        <div class="row">
                             
                           <?

	 $aa=mysqli_query($conn,"select * from menu WHERE title_ka='ვიდეო' order by id desc");
$menu=mysqli_fetch_array($aa);
	 
$a=mysqli_query($conn, "select * from kultura_cxrili where kategory LIKE '%$menu[id]%' OR kategory='ვიდეო|' order by id desc limit 0,3");
while ($b=mysqli_fetch_array($a))
{
	
 ?> 
							
							<div class="col-md-4" style="position: relative; ">
						 
							<div class="single-recent mb-100" style="margin-left: -2px; padding-right: 10px; padding-top: 15px; margin-bottom:30px; display: inline-block">
                                   <style>
								.itemsContainer {
    background-color: aliceblue;
    float:left;
    position:relative;
		border-radius: 10px;
									
									
									
}
.itemsContainer:hover .play2
		{
 display:none;
		 
		}
									   
.play
  {
  position : absolute;
    display: block;
    top:35%; 
    width:40px;
    margin:0 auto; left:0px;
    right:0px;
    z-index:100transition-delay: 1s; /* delays for 1 second */
-webkit-transition-delay: 1s; /* for Safari & Chrome */
} 
	
.play2
  {
  position : absolute;
    
    top:35%; 
    width:40px;
    margin:0 auto; left:0px;
    right:0px;
    z-index:100transition-delay: 1s; /* delays for 1 second */
-webkit-transition-delay: 1s; /* for Safari & Chrome */
} 
									   
									   
									   
 #im77{
  height: 300px ;
  transition: all .2s ease-in-out;
			 
	 border-radius: 5px;
			
}

.cover77{
 
 width: 100% !important;
  object-fit: cover; 
		 border-radius: 5px;
   
}
.cover77:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
 
	}
	.trending-area .trending-main .trand-right-single .trand-right-img .img
	{border-radius: 0px !important}
									    
							
								
								</style>
								
							<div class="itemsContainer" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';" style="cursor: pointer; ">
								<div class="image">	<img src="<?=HTTP_HOST?><? echo $b['upload'];?>"   id="im77" class="cover77" alt="">  </div>
								
								
								
								<div class="play"><img src="<?=HTTP_HOST?>img/play.png" width="70px"  style="padding-top: 5px; "/> </div> 
								
								<div class="play2"><img src="<?=HTTP_HOST?>img/play2.png" width="70px"  style="padding-top: 5px; "/> </div> 
								
								</div>
								 </div>
								 
                            </div>
							
							<? } ?>
                              
							 
							
							
                        </div>
                    </div>
                </div>                </div>                </div>
	
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row" style="position: relative; margin-top: 25px;">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3><span style="color: #000"> <i class="fas fa-rss"></i> <?=$LANG['news']?> </span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                     
                           
						<style>
		#im4{
  height: 315px;
  transition: all .2s ease-in-out;
}

.cover4{ 
	width: 103% !important;
  object-fit: cover;
   
} .cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>	
							<?
$res = mysqli_query($conn, "SELECT * FROM menu where title_ka!='ვიდეო'");
 $title = mysqli_fetch_assoc($res);
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE hidden='0' AND satauri_$_SESSION[LANG]!=''  order by news_date desc limit 0,3");
while ($b=mysqli_fetch_array($a))
{
 ?>  
							
							<div class="col-md-4" style=" ">
						
							<div class="single-recent mb-100" style="margin-left: -1px;   display: inline-block">
                                <div class="what-img" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';" style="cursor: pointer">
                                    <img src="<? echo $b['upload'];?>" id="im4" class="cover4" alt="">
                                </div>
                                <div class="what-cap">
                                    <span style="font-weight: 100" class="color4">
<? $res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
 $title = mysqli_fetch_assoc($res);	
								   echo $title["title_$_SESSION[LANG]"];  ?></span>
                                    <h4><a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>" style="font-weight: 100"> <?php echo $b["satauri_$_SESSION[LANG]"];?></a></h4>
                                </div>
                            </div>
							</div>
							<? } ?>
							
							
                             
                             
                              
							 
							
					 
                </div>
			   
			   
			   <div class="row">
              
                             
                           <?
						$res = mysqli_query($conn, "SELECT * FROM menu WHERE title_ka='ვიდეო'");
							 $menu = mysqli_fetch_assoc($res);
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE hidden='0' AND satauri_$_SESSION[LANG]!='' AND kategory!=23 order by news_date desc limit 3,3");
while ($b=mysqli_fetch_array($a))
{
	
 ?> 
							
							
						<div class="col-md-4" style=" ">
						
							<div class="single-recent mb-100" style="margin-left: -1px;   display: inline-block">
                                <div class="what-img" onclick="javascript:location.href='<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>';" style="cursor: pointer">
                                    <img src="<? echo $b['upload'];?>" id="im4" class="cover4" alt="">
                                </div>
                                <div class="what-cap">
                                    <span style="font-weight: 100" class="color4"><? $res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
 $title = mysqli_fetch_assoc($res);	
								   echo $title["title_$_SESSION[LANG]"];  ?></span>
                                    <h4><a href="<?=url($b["satauri_$_SESSION[LANG]"],'b', $b['id'])?>?lang=<? echo $_SESSION['LANG']; ?>" style="font-weight: 100"> <?php echo $b["satauri_$_SESSION[LANG]"];?></a></h4>
                                </div>
                            </div>
							
							 </div><? } ?>
                              
							 
							
							
                      
                </div>
			   
			   
           </div>
        </div>
    </div>           
    <!--Recent Articles End -->
	
	
	
	
	
    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    </main>