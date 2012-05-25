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

function line_comment(line_com)
{
	// unhide div at this line
	document.getElementById(line_com).style.display = "block";
}

function line_comment_cancel(line_com)
{
	document.getElementById(line_com).style.display = "none";
}

function line_comment_save(file_id, line_num, page_element, comment)
{
	// verify payload not empty
	if(document.getElementById(comment).value == "") { return; }
	getPage("line_comment.php?file_id="+file_id+"&line_num="+line_num+"&comment=\""+document.getElementById(comment).value+"\"", page_element, "Please Wait")
}

function line_comment_refresh(page_element)
{
	//alert("Changing block" + document.getElementById(page_element).value);
	//document.getElementById(page_element).innerHTML = "Boo";
}

