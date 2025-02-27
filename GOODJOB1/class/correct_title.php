<? class Correct
{

function correctTitle($title)
    {
	if (strpos($title, 'კერძო') !== false)
  	{
	 	return $title.' სახლი';
	}
	else
	{
		return $title;
	}   
    }
}

?>