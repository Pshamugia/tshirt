<div id="English" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>English</h3>
  <p><style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:310px;
 

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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id DESC";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
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
	
	$sql = "SELECT * FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);

	
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
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))

{
 ?> 
 
<div>
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri_en'];?> </span> </div> 
 <form action="" method="post" enctype="multipart/form-data" name="rame">  

  <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;"> </a> 
 <script type="text/javascript">
    function openNewTab() {
        window.open("../../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script> 
  <input name="ra" type="button" value="ჩასწორება"   onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';"  style="font-size:12px;"> 

    <span style="padding-left:30px;"> <? echo $b['id'];?> </span>

<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">

 
<?
$avt=mysqli_query($conn, "select * from  avtori_new where id='$b[avtori]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori2']; 

 ?>  </span>
 
 <span style="position:relative; padding-left:30px; font-size:14px;"><? 
	$res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
	$data = mysqli_fetch_assoc($res);
	echo $data['title_ka']; ?>  </span>
 
 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>
 
<hr color="#E1E1E1" style="width:744; position:relative; margin-top:18px; padding-top:1px;"> <span id="linkebi">
  </form>
	<? } } ?> </span> 
 
	
  

 
 
   
   <?
   
$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r); ?>


 
  

  <br />
  
  
      
    
		   
</p>

  
     

          <p>
            <input type="text" name="news_dateEng" value="კალენდარი" id="news_dateEng" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px; padding-bottom:15px; background-color:#F0F0F0; top:12px; z-index:101;"  / >  
        </span>
        <br/> 
         <br/>           <script>
  $( function() {
	$("#news_dateEng").datepicker({ 
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
                
 საათი და წუთი <br>
        <input type="text" name="hourEng" id="hourEng" value="<?php date_default_timezone_set('UTC+04:00/Tbilisi');
		echo date( "H:i"); ?>" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
       
       
       
       
       <br> 
      
        <!--START TAGS - თეგების დასაწყისი -->
 <span style="position:relative; ">

 <script type="text/javascript"> function existingTagEng(text)
{
	var existing = false,
		text = text.toLowerCase();

	$("#tags_eng").each(function(){
		if ($(this).text().toLowerCase() == text)
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $("#tags-new_eng input").focus();

  $("#tags-new_eng input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTagEng(tag))
			{
				$('<li class="tags" id="tags_eng"><span>' + tag + '</span><i class="fa fa-times"></i> </li>').insertBefore($("#tags-new_eng"));
				$('#save_tags_eng').val($('#save_tags_eng').val() + "," + tag)
				$(this).val("");
			}
			else
			{
				$(this).val(tag);
			}
		}
	});

  $(document).on("click", "#tags_eng svg", function(){
	  var text = $(this).parent().text();
	  var tags_str = $('#save_tags_eng').val();
	  tags_str = tags_str.replace(','+text, '');
	  $('#save_tags_eng').val(tags_str);
    $(this).parent("li").remove();
 
  });

});
                                 </script>
                           

 <span id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input" id="tags-input_eng"  style="height:auto; width:750px;">
    <li class="tags" id="tags_eng" style="background-color:#B9B8B8; color:#000000;">TAGS <i class="fa fa-times"></i></li>
	<?
		$tags = explode(',', $data['tags_eng']);
		foreach($tags as $tag)
		{
			if(!empty($tag))
			{
	?>
	<li class="tags" id="tags_eng"><?=$tag?><i class="fa fa-times"></i></li>
	<?
			}
		}
	?>
    <li class="tags-new" id="tags-new_eng" style="color:#D70003;">
      <input type="text" id="tags_eng">
	  <input type="hidden" name="tags_eng" id="save_tags_eng" value="<?=$data['tags_eng']?>"/>
    </li>
  </ul>
</span> </soan>
 <!--END OF TAGS - თეგების დასასრული -->
       
       
        
        <br>
        
        <select name="avtori2" style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden> Select the author </option>

     <?
	 $avt=mysqli_query($conn, "select * from  avtori_new order by id desc");
	 while($res=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$res['id']."'>".$res['avtori2']."</option>";			 
	 }
     ?>
</select>  


 

<br>
 <br>  
<textarea  name="satauri_en" style=" background-color:#FFFFFF; width:100%; "  placeholder="სათაური"></textarea> 
 
<span> <SCRIPT TYPE="text/javascript">
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
</SCRIPT>    <A HREF="index.php?do=images" 
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A>  </span>

<textarea  name="agwera_en" id="agweraEng" cols="70" rows="5" >&nbsp;</textarea>
 <script type="text/javascript">
CKEDITOR.replace('agwera_en');
</script> 

<textarea name="full_en" id="full_en" cols="70" rows="12">  </textarea>

<script type="text/javascript">
CKEDITOR.replace('full_en');
</script> 

 
 
 
 

 


<span> <br>
    
   

 </span>
   
 </p> 
</div>