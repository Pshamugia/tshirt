<table width="1000px" align="center" style="min-height:500px; left:-50px; position:relative;">
<tr>
<td valign="top" width="400px"> 
<h2 style="position:relative; top:12px;"> <div style="position:relative; height:20px; margin-top:1px; border-left:5px solid #2E3333; font-weight:100; font-size:20px;">  <k style="position:relative; padding-left:15px;"> Search result </k>  </b> </div> </h2>
<br /> <br /> 
<?
$tmp_where = '';
if (isset($_GET['tag']))
$tmp_where = "tags LIKE '%,$_GET[tag]%'";
if (isset($_POST['text']) && !empty($_POST['text']))   
{
	$searchText = mysqli_real_escape_string($conn, $_REQUEST['text']);
	$tmp_where .= '(';
	$res=mysqli_query($conn, "select * from  avtorebi where avtori  LIKE  '%$searchText%'");
			while($data=mysqli_fetch_assoc($res))
			{
				$tmp_where .= " avtori='$data[id]' OR";
			}
	$tmp_where .= " agwera LIKE '%$searchText%' OR satauri  LIKE  '%$searchText%' OR full  LIKE '%$searchText%' )";					
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
?> </div></div></td>
<tr>
<td valign="top" width="400px" style="position:relative; ">

<style>
		#im123 {
  height: 80px;
  transition: all .2s ease-in-out;
}

.cover123 {
  width: 100px;
  object-fit: cover;
   
}
.cover123:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
}
 </style>
 
<img src="<?=HTTP_HOST?>../<? echo $b['upload']; ?>" onclick="javascript:location.href='<?=url($b['satauri'],'b', $b['id'])?>';" id="im123" class="cover123" style="position:relative; padding-bottom:15px; cursor:pointer;">   </td>
<td width="400px" style="position:relative; left:-380px;" valign="top"> 

 <div id="linkebi" style="position:relative; width:400px; margin-left:35px;"> 
<a href="<?=url($b['satauri'],'b', $b['id'])?>">   
 
 <? echo $b['satauri']; ?>  </a></div>
 <div>   </div>   
<? }?>  </div></td></tr></table>

