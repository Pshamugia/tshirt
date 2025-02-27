 
	
<link rel="stylesheet" href="<?=HTTP_HOST?>css/top_menu.css">
 
	<!-- Style switcher end -->

                                <div class="main-menu d-none d-md-block" style="z-index: 102">

		
		<nav> <ul id="navigation">    
            <li>
		
		
		<?
function makeMenu($root_id)
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
			makeMenu($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
				$url = url($menu['title_'.$_SESSION['LANG']],'m', $menu['id'], true).'?lang='.$_SESSION['LANG'];
			if(!empty($menu['url'])) $url = $menu['url'];
			echo '<li class="nav-item" s><a class="nav-link" href="'.$url.'">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
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
			makeMenu($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
			echo '<li class="nav-item"><a class="nav-link" href="index.php?do=photo">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
		}		
	} 	 
	
	 
}
			
?>
				

				
<div id="cssmenu">
	
	 
	
	
             
	
	
	<ul style="position: relative; top: -15px;background: white;">
				  
					<li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['home']; ?> 
						</a> 
					</li>
				  
				  <? makeMenu(0);?> 
		
		 <li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>index.php?do=contact" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['contact']; ?> 
						</a> 
					</li>
		
		 
				
					 
				  
              
            </ul>
              
		
		
		
		
		
		
	</div>  
             

         
 

<!--/ Header end -->