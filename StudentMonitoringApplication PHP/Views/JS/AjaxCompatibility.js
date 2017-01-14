function proveAjaxCompatible()
{
	var httpxml;
	try
	{
		// Firefox, Opera 8.0+, Safari
		httpxml=new XMLHttpRequest();
		return httpxml;
		
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			httpxml=new ActiveXObject("Msxml2.XMLHTTP");
			return httpxml;
		}
		catch (e)
		{
			try
			{
				httpxml=new ActiveXObject("Microsoft.XMLHTTP");
				return httpxml;
			}
			catch (e)
			{
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
}

