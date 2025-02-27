	
		
		
		
		<?
function makeMenu_x($root_id)
{
	global $conn;
	
	 
	
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id AND status='1' AND title_ka!='გალერეა' ORDER by position ASC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' AND status='1'");
		$cnt = mysqli_fetch_assoc($res2);
		if($cnt['cnt'])
		{
			echo '<li id="menu-top" class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">'.$menu['title_'.$_SESSION['LANG']].'</a><ul id="menu-top">';
			makeMenu_x($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
				
			echo '<li class="nav-item"><a class="nav-link" href="'.url($menu['title_'.$_SESSION['LANG']],'m', $menu['id'], true).'">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
		}		
	} 
	
	
	
	// ეს არის ფოტოგალერეა ცალკე
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id AND status='1' AND title_ka='გალერეა'  ORDER by position ASC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' AND status='1'");
		$cnt = mysqli_fetch_assoc($res2);
		
		if($menu['title_ka']=='გალერეა')
			
		{
			echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">'.$menu['title_'.$_SESSION['LANG']].'</a><ul>';
			makeMenu_x($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
			echo '<li class="nav-item"><a class="nav-link" href="index.php?do=photo">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
		}		
	} 	 
	
	 
}
			
?>

	
	
             
	
	
	<ul style="">
				  
					<li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['home']; ?> 
						</a> 
					</li>
				  
				  <? makeMenu_x(0);?> 
		
		 <li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>index.php?do=contact" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['contact']; ?> 
						</a> 
					</li>
		
		
		  
		 
	 
	 
		
				
					 
				  
              
            </ul> <div style="float: right; position: relative;  top: -30px; z-index: 101000"> <?
				$query_str='';
				$query_arr = explode('&',$_SERVER['QUERY_STRING']);
				foreach($query_arr as $q)
				{
					$arr = explode('=',$q);
					if($arr[0] != 'lang')
						$query_str.=$arr[0]."=".$arr[1]."&";
				}
				if(empty($query_str))
					$query_str."?";
				else
					$query_str = "?".$query_str;

				if ($_SESSION['LANG']=='ka')
				{ ?> 
					<a class="nav-link" href="?lang=en"> <img src="<?=HTTP_HOST?>img/uk-flag.png"  width="25px"  ></a>  
				<? }
				else
				{
				?>
				
						<a class="nav-link" href="?lang=ka"> <img src="<?=HTTP_HOST?>img/geoflag.png" width="25px" ></a>  
				<? } ?> 
   </div>
                </div>
		
		
		
		
		
		

<!--/ Header end -->