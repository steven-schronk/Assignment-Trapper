<?php

include 'include/std_functions.php';
session_start();
if(isset($_SESSION["un"])) {
	// AUTHENTICATED USER - YOU MAY PASS "GO" COLLECT $20.00
	echo "<div id=top_bar>Currently Logged In As:&nbsp;&nbsp;&nbsp;". $_SESSION['name'] ." <div id=login><a href=#>Logout</a></div></div>";

} elseif($auth = authorize_ad($_POST['username'], $_POST['password'], $_POST['domain'])) {
	$_SESSION['un']   = $auth['un'];
	$_SESSION['fqdn'] = $auth['fqdn'];
	$_SESSION['name'] = $auth['name'];

} else {
?>

<html>
<head>
<title>Portal Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<link rel="stylesheet" type="text/css" media="all" href="include/style.css" />
</head>
<SCRIPT LANGUAGE="JavaScript">
		// TODO: THIS DOES NOT SEEM TO WORK IN F.F.
                document.onmousedown=click;
                function click() 
                {
                        if (event.button==2) {alert('Right-clicking has been disabled by the administrator.');}
                }

</SCRIPT>

<form method="post" action="<?php echo $script; ?>">
     <div id="digitalsig"><center>

        <b>
		Continuing the logon process will signify your understanding that the use of ESA computers may be monitored/reviewed and that ESA computers/software and anything processed by utilizing ESA computers/software are property of ESA, and that classified, export controlled or ESA proprietary information will not be disclosed without proper authorization.
	</b>
	<br><br>

	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" size="20"><td>
			<td><div class="error"></div></td>
		</tr>
		<tr>
			<td>Password:</td>	
			<td><input name="password" type="password" id="password" size="20"></td>

			<td></td>
		</tr>
		<tr>
			<td>Domain:</td>
			<td>
				<select name="domain" width="20" style="width 200px;">
						<option value="efw.com">LANGROUP</option>
						<option value="ieionine.com">IEIONLINE</option>
						<option value="kollsman.com">KOLLSMAN</option>
				</select>
			</td>
		</tr>

	</table><br>
		<center>
			<input type="submit" value="   Login   ">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" value="   Reset   ">
		</center>
       </div>
</form>
</body>
</html>
<?php

	//die ("Could not Authenticate");
	die ();
}
?>