<?  

$r=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);

if (isset($_REQUEST['submit']))
{
$date=date('d.m.Y'); 
	

	
	if (move_uploaded_file($_FILES['mp3']['tmp_name'], '../mp3/'.$_FILES['mp3']['name']))
	{$c='mp3/'.$_FILES['mp3']['name']; }
	else $c=$data['mp3'];
	
	if (move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']))
	{$b='images/'.$_FILES['upload']['name']; }
	else
	$b=$data['upload'];
		
	
	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysql_query('select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysql_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
	
	$sql="update kultura_cxrili set kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]',  upload='$b', eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]', agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', ena='$_REQUEST[ena]', menu='$_REQUEST[menu]', person_id=".$personId.", party_id= ".$partyId.", news_date='$_REQUEST[news_date]'  where id='$_REQUEST[id]'";
	mysql_query($sql);
	if(mysql_error()){
		echo mysql_error();	
	}




}

$r=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);




?>
 <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0; border-bottom:3px solid #E8BA33; margin-top:-30px; padding:0; z-index:1000000; position:fixed; background:#FFFFFF;"> 
 <tr> 
 <td valign="top">
 <table align="center" width="1000">
 <tr>
 <td valign="top" width="1000px" height="50px" style="background:#FFFFFF;">  
 
  
 <style>
 
#indexs2, #indexs2 ul{
 list-style-type:none;
list-style-position:outside;

  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs2 a{
display:block;
 color:#000000;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#FFFFFF;
	  


}

#indexs2 a:hover{
background-color:#E8BA33;
  padding:4px; 
  color:#FFFFFF;
 
}

#indexs2 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs2 ul {
position:absolute;
display:none;
 }

#indexs2 li ul a{
 
float:left;
 
 }

#indexs2 ul ul{
 

}	

#indexs2 li ul ul {
left:12em;
 
 }

#indexs2 li:hover ul ul, #indexs2 li:hover ul ul ul, #indexs2 li:hover ul ul ul ul{
display:none; 
 }
#indexs2 li:hover ul, #indexs2 li li:hover ul, #indexs2 li li li:hover ul, #indexs2 li li li li:hover ul{
display:block; 
 }
</style>
<div id="indexs2" style="color:#000000; position:relative; left:35px;"><li style="position:relative; margin-left:-39px;  z-index:100000; top:15px;"><a href="index.php"> &nbsp; Webster CMS</a></li>  </div>
 
<div style="position:relative; left:-122px; top:11px;" align="right">
<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style="border: 1px solid #999; height:22px; color:#585455; position:relative; top:5px;"  size="18" />
   <input name="Submit" type="submit" style="position:relative; top:5px; height:22px; left:-5px;
border: 1px solid #999;" value=">"/>   
</form> </div>

</td><td>  <div id="indexs1" style="color:#000000; position:relative; left:-64px;"><li style="position:relative; margin-left:-39px; width:70px; margin-top:6px;"><a href="index.php?logoff"> &nbsp; Log out</a></li>  </div>

 <style>
 
#indexs1, #indexs1 ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs1 a{
display:block;
 color:#666262;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#E8BA33;
	  


}

#indexs1 a:hover{
background-color:#B38D1C;
  padding:4px; 
  color:#000000;
 
}

#indexs1 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs1 ul {
position:absolute;
display:none;
 }

#indexs1 li ul a{
 
float:left;
 
 }

#indexs1 ul ul{
 

}	

#indexs1 li ul ul {
left:12em;
 
 }

#indexs1 li:hover ul ul, #indexs1 li:hover ul ul ul, #indexs1 li:hover ul ul ul ul{
display:none; 
 }
#indexs1 li:hover ul, #indexs1 li li:hover ul, #indexs1 li li li:hover ul, #indexs1 li li li li:hover ul{
display:block; 
 }
</style>

 </td> 
 </tr>
  </table>
 
  </td> 
 </tr>
 </table>
  
 <table width="744" style="position:relative;  z-index:0; top:40px;"  align="center">
<tr>
<td width="744" align="center" bgcolor="#FFFFFF" style="" id="linkebi"> 
<div id="menu" style="position:fixed; margin-left:-114px; top:65px;" align="left">
  <ul class="niveau1">
  <li style="background-color:#E8BA33; width:102px; height:25px; position:relative; margin-top:-6px; color:#FFFFFF;"> <span style="position:relative; font-size:26px; font-weight:bold; left:5px; top:-1px;"> &equiv; </span> <span style="position:relative; top:-6px; left:5px;"> Content </span>  </li>
    <li><a href="index.php?do=enghome">Home</a></li>
    <li class="sousmenu"><a href="#">Gallery</a>
      <ul class="niveau2">
        <li><a href="index.php?do=enggallery">Photos</a></li>
        <li><a href="index.php?do=engvideo">Videos</a></li>
      </ul>
    </li>
    
    <li class="sousmenu"><a href="#">Managers</a>
      <ul class="niveau2">
        <li><a href="index.php?do=password">Password</a></li>
        <li><a href="index.php?do=banner">Banner manager</a> </li>
        <li><a href="images.php">Image manager</a> </li>
      </ul>
    </li>
    <li><a href="index.php?do=authors">Authors</a> </li>
      <li class="sousmenu"><a href="#">Language</a>
      <ul class="niveau2">
              <li><a href="index.php?do=home">ქართული</a></li> 

        <li><a href="index.php?do=enghome">English</a></li> 
        </ul>
    </li>
             <li><a href="http://www.tbilisilitfest.ge/roundcube/" target="_blank">Email</a></li>
<li style="height:2px; width:102px; background-color:#E8BA33;"> </li>
     
  </ul>
</div>
<style> 
#menu {
	z-index:50000;
	width: 100px;
	font-size:14px;
	border-top:3px solid #E8BA33;
	
	
}
#menu a {
	color: #000000;
}
#menu ul {
	padding: 0;
	width: 100px;
 	margin: 0px;
	background: white;
}
#menu li:hover {
	background: #F0F0F0;
}
#menu li.sousmenu:hover {
	background: #F0F0F0;
}
/* Rajout d'une petite fleche pour les sous menu */ 
#menu li.sousmenu {
 	background-repeat: no-repeat;
	background-position: 95% 50%;
	
	
}
#menu ul li {
	position: relative;
	list-style: none;
	
	
}
#menu ul ul {
	position: absolute;
	top: -1px;
	left: 100px;
	display: none;
	background-color:#F0F0F0;
	width:200px;
	
	
}
#menu li a {
	text-decoration: none;
	padding: 4px 0 4px 5px;
	display: block;
	border-left: 3px solid #E8BA33;
	border-right: 3px solid #E8BA33;
	border-bottom: 1px #CCC solid;

	width: 91px;
 }
 
 #menu ul ul li a
 {
	 	padding: 4px 0 4px 5px;
 background-color:#E8BA33;
color:#FFFFFF;
	 width:200px;
	 border-top:1px solid #FFFFFF;
	 }
	 
	 
 #menu ul ul li a:hover
 {
	 	padding: 4px 0 4px 5px;
border-right:0;
background-color:#F0F0F0;
color:#000000;
	 width:200px;
	 }
 
#menu ul.niveau1 li.sousmenu:hover ul.niveau2, #menu ul.niveau2 li.sousmenu:hover ul.niveau3 {
	display: block;
	width:200px;
	
}
#menu li a:hover {
	border-left-color: red;
}
#menu ul ul li a:hover {
	border-left-color: #00FF00;
}
#menu ul ul ul li a:hover {
	border-left-color: #0000FF;
} </style>
  
</td>   

<tr> 

<form action="" method="post" enctype="multipart/form-data" name="rame">  
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:-2px; padding:10px;">
 <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:230px;
 

}

#indexs a{
display:block;
 color:#FFFFFF;
 text-decoration:none;
 padding:10px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;

}

#indexs a:hover{
background-color:#B38D1C;
  padding:10px; 
  color:#FFFFFF;
 
}

#indexs li{
float:left;
position:relative;
 
 padding:0px;
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
 }
</style>
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:15px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php?do=enghome"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:3px;"> > </span> <span style="position:relative; top:-3px;"> Back to Homepage </span> </a> </div> </div>
       
   <?php
   if ($_REQUEST['submit'])
   {

	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where id='$_request[id]'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 1; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where id='$_REQUEST[id]' order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
	

 

?>
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysql_query($sql);
while ($b=mysql_fetch_array($a))

{
 ?> 
 
 <br>
 <div style="background-color:#FFFFFF;  padding-top:5px; padding-bottom:15px;">

<div style="position:relative; margin-right:20px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri'];?> </span> </div> 
 
<div style="padding-top:3px;" id="gverditi">  
   <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;">  
 <script type="text/javascript">
    function openNewTab() {
        window.open("../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script> 
  

<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">

 
<?
$avt=mysql_query("select * from  avtorebi where id='$b[avtori]'");
	 $avts_id=mysql_fetch_array($avt);
echo $avts_id['avtori']; 

 ?>  </span>
 
 <span style="position:relative; padding-left:30px; font-size:14px;"><? echo $b['kategory'] ?>  </span>
 
 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo $b['news_date']; ?> </span>
 
	<? } } ?>  </td></form></tr>
 
	
  

   <td valign="top">

      
            <form action="" method="post" enctype="multipart/form-data" name="rame" style="position:relative; margin-top:10px;">

      
 <select  name="eng_geo" style="width:320px; height:35px;">
 <option value="0">აირჩიე ენა</option> 
<option <?=($data['eng_geo']=='Geo')?'selected':''?> value="Geo">Geo</option>
<option <?=($data['eng_geo']=='Eng')?'selected':''?> value="Eng">Eng</option>
      </select> </p>
      
      <br>
      
        <select  name="subkat" style="width:320px; height:35px;">
          <option value="top">გავუშვათ მთავარ გვერდზე</option>
          <option <?=($data['subkat']=='no')?'selected':''?> value="no">no</option>
          <option <?=($data['subkat']=='yes')?'selected':''?> value="yes" style="color:#FF0000">yes</option>
        </select>
        <br />
        <br />
        <select  name="kategory" style="width:320px; height:35px;">
        <option <?=($data['kategory']=='კატეგორიები')?'selected':''?> value="კატეგორიები">კატეგორიები</option>
          <option <?=($data['kategory']=='ფესტივალი')?'selected':''?> value="ფესტივალი">ფესტივალი</option>
         <option <?=($data['kategory']=='ფესტივალის შესახებ')?'selected':''?> value="ფესტივალის შესახებ">ფესტივალის შესახებ</option>
         <option <?=($data['kategory']=='გამოხმაურებები')?'selected':''?> value="გამოხმაურებები">გამოხმაურებები</option>
          <option <?=($data['kategory']=='გუნდი')?'selected':''?> value="გუნდი">გუნდი</option>
          <option <?=($data['kategory']=='ფესტივალი 2017')?'selected':''?> value="ფესტივალი 2017">====ფესტივალი 2017====</option>          <option <?=($data['kategory']=='მონაწილეები 2017')?'selected':''?> value="მონაწილეები 2017">მონაწილეები 2017</option>
          <option <?=($data['kategory']=='პროგრამა 2017')?'selected':''?> value="პროგრამა 2017">პროგრამა 2017</option>
          <option <?=($data['kategory']=='სპონსორები 2017')?'selected':''?> value="სპონსორები 2017">სპონსორები 2017</option>
         <option <?=($data['kategory']=='ფესტივალი 2016')?'selected':''?> value="ფესტივალი 2016">====ფესტივალი 2016====</option>
          <option <?=($data['kategory']=='მონაწილეები 2016')?'selected':''?> value="მონაწილეები 2016">მონაწილეები 2016</option>
          <option <?=($data['kategory']=='პროგრამა 2016')?'selected':''?> value="პროგრამა 2016">პროგრამა 2016</option>
          <option <?=($data['kategory']=='სპონსორები 2016')?'selected':''?> value="სპონსორები 2016">სპონსორები 2016</option>    
         <option <?=($data['kategory']=='ფესტივალი 2015')?'selected':''?> value="ფესტივალი 2015">====ფესტივალი 2015====</option>
          <option <?=($data['kategory']=='მონაწილეები 2015')?'selected':''?> value="მონაწილეები 2015">მონაწილეები 2015</option>
          <option <?=($data['kategory']=='პროგრამა 2015')?'selected':''?> value="პროგრამა 2015">პროგრამა 2015</option>
          <option <?=($data['kategory']=='სპონსორები 2015')?'selected':''?> value="სპონსორები 2015">სპონსორები 2015</option>    
          <option <?=($data['kategory']=='პროგრამა')?'selected':''?> value="პროგრამა">პროგრამა</option>
          <option <?=($data['kategory']=='სიახლეები')?'selected':''?> value="სიახლეები">სიახლეები</option>
          <option <?=($data['kategory']=='აფიშა')?'selected':''?> value="აფიშა">აფიშა</option>
          <option <?=($data['kategory']=='ჩვენ შესახებ')?'selected':''?> value="ჩვენ შესახებ">ჩვენ შესახებ</option>
           </select>
       <br> <br>
        <span style="font-size:12px;"> მივაბათ FACEBOOK კომენტარი? </span>
        <input type="checkbox" name="ena" value="1">
        კი
        </input>
        <br />
        <br />
          
        <input type="file" name="upload">
          <img src="../<? echo $data['upload'];?>" width="70" height="50" style="position:relative; right:-7px;"><br>
        <textarea  name="img_description" placeholder="სურათის აღწერა" style="width:320px; height:35px;" > <? echo $data['img_description']; ?> </textarea>
        <br />
        <br />
        
         <select name="avtori" style="width:320px; height:35px;">  ავტორი <br>
 <option value="0"> ავტორის გარეშე?</option>
     <?
	 $avt=mysql_query("select * from  avtorebi");
	 while($avts_id=mysql_fetch_array($avt))
	 {
		 if($data['avtori']==$avts_id['id']) $selected='selected';
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select>


        <br />
<br>
      
        <div style="font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:101;">  
          <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy-mm-dd",
      dateFormat: "yy-mm-dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
          <p>
            <input type="text" value="<?=$data['news_date']?>" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px;" size="12" / >
        </div>



        <!--START TAGS - თეგების დასაწყისი -->
 <div style="position:relative; "> 
 
 <script type="text/javascript"> function existingTag(text)
{
	var existing = false,
		text = text.toLowerCase();

	$(".tags").each(function(){
		if ($(this).text().toLowerCase() == text) 
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $(".tags-new input").focus();
  
  $(".tags-new input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTag(tag))
			{
				$('<li class="tags"><span>' + tag + '</span><i class="fa fa-times"></i></i></li>').insertBefore($(".tags-new"));
				$(this).val("");	
			}
			else
			{
				$(this).val(tag);
			}
		}
	});
  
  $(document).on("click", ".tags i", function(){
    $(this).parent("li").remove();
  });

});
                                 </script>
                                 <style> @charset "utf-8";
/* CSS Document */



#wrapper
{
    position:absolute;
 
    width:720px;
    height:50px;
	color:#FFFFFF;
  }

p 
{
  margin:0 0 5px 0;
}

.tags-input 
{
  	list-style : none;   
  	border:1px solid #ccc;
  	display:inline-block;
  	padding:5px;
  	height: 26px;
    font-size:14px;
    background:#f3f3f3;
    width:720px;
    border-radius:2px;
    overflow:hidden;
}

.tags-input li
{
  	float:left;
}

.tags
{
  	background:#28343d;
  	padding:5px 20px 5px 8px;
  	border-radius:2px;
  	margin-right: 5px;
  	position: relative;
}

.tags i
{
	position: absolute; 
	right:6px;
	top:3px;
	width: 8px;
	height: 8px;
	content:'';
	cursor:pointer;
	opacity: .7;
  font-size:12px;
}

.tags i:hover
{
	opacity: 1;
}

.tags-new input[type="text"]
{
  border:0;
	margin: 0;
	padding: 0 0 0 3px;
	font-size: 14px;
	margin-top: 5px;
  background:transparent;
}

.tags-new input[type="text"]:focus
{
  	outline:none; 
} </style>
 
 <div id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input">
    <li class="tags">TAGS / ტეგები<i class="fa fa-times"></i></li>
    <li class="tags-new">
      <input type="text"> 
    </li>
  </ul>  
</div>  
 <!--END OF TAGS - თეგების დასასრული -->
 
 <br><br><br><br>
                <textarea  name="satauri" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:#FFFFFF; width:100%;" > <? echo $data['satauri']; ?></textarea>
<br>
        <textarea name="agwera" id="agwera" cols="85"><? echo $data['agwera']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera');
</script> 
        <br>
        <br>
        <div> <SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=650,height=600,scrollbars=yes');
return false;
}
//-->
</SCRIPT> <A HREF="index.php?do=images" 
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </div>
     
        <textarea name="full" cols="85" rows="5" id="full"> <? echo $data['full']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full');
</script> 
        <br>
        <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
        <input type="submit" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:#C7191C; color:#FFFFFF; height:35px; z-index:101;" name="submit" value="გამოქვეყნება">
      </form></td>
  </tr>
  
    <td height="20"></td>
  </tr>
</table>
