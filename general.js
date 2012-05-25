function delete_cookie ( cookie_name )
{
  var cookie_date = new Date ( );
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

function set_cookie()
{
	delete_cookie(document.cookie);
	document.cookie="";
	document.cookie="username="+ document.getElementById('username').value;
	document.cookie="password=" +  document.getElementById('password').value;
	window.location = 'index.php';
	//alert(document.cookie);
}

function logout()
{
	delete_cookie(document.cookie);
	window.location = 'index.php';
}
