function addtofav(obj, id)
{
	$.getJSON(HTTP_HOST+'ajax.php?fav&id='+id, function(json)
	{
		if(json.added)
		{
			$(obj).attr('src', HTTP_HOST+'IMG/heart-back.png');
			 
				$('#fav_count').html(json.total);
			$('#tt_'+id).html("რჩეულებიდან წაშლა");
		}
		else
		{
			$(obj).attr('src', HTTP_HOST+'IMG/heart2.png');
			
 
			$('#fav_count').html(json.total);
			$('#tt_'+id).html("რჩეულებში დამატება");
		}
	});
}
function fb_login()
{
	FB.login(function(response) 
		{
			if (response.authResponse) 
			{
				FB.api('/me?fields=id,first_name,last_name,email', function(response) 
				{
					$.getJSON(HTTP_HOST+'ajax.php?fb_auth&id='+response.id+'&first_name='+response.first_name+'&last_name='+response.last_name+'&email='+response.email, function(json)
					{
						if(json.success)
						{
							document.location.href=HTTP_HOST+'index.php?do=page1';
						}
						else
						{
							alert('დაფიქსირდა შეცდომა');
						}
					});
				});
			} 
			else 
			{
				// cancelled
			}
    }, { scope: 'email' });
}