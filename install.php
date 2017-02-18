<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/blog-post.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>INSTALLATION</title>
</head>
<body>
	<div class="container well">
		<h1>Installation</h1>
		<form action="create_blog.php" method="POST" class="form">
			<p><label>Choose a username: <input type="text" name="user" required="TRUE" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a password: <input type="password" name="pass" required="true" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a name for your blog: <input type="text" name="blogname" required="true" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a language for your blog: <select name="lang"><option value="en">English</option><option value="es">Español</option></select></label></p>
			<p><label>Choose your local timezone: 
				<select name="shift">
					<option value="-12">-12:00</option>
					<option value="-11">-11:00</option>
					<option value="-10">-10:00</option>
					<option value="-9.5">-09:30</option>
					<option value="-9">-09:00</option>
					<option value="-8">-08:00</option>
					<option value="-7">-07:00</option>
					<option value="-6">-06:00</option>
					<option value="-5">-05:00</option>
					<option value="-4">-04:00</option>
					<option value="-3.5">-03:30</option>
					<option value="-3">-03:00</option>
					<option value="-2">-02:00</option>
					<option value="-1">-01:00</option>
					<option value="0" selected>±00:00</option>
					<option value="+1">+01:00</option>
					<option value="+2">+02:00</option>
					<option value="+3">+03:00</option>
					<option value="+3.5">+03:30</option>
					<option value="+4">+04:00</option>
					<option value="+4.5">+04:30</option>
					<option value="+5">+05:00</option>
					<option value="+5.5">+05:30</option>
					<option value="+5.75">+05:45</option>
					<option value="+6">+06:00</option>
					<option value="+6.5">+06:30</option>
					<option value="+7">+07:00</option>
					<option value="+8">+08:00</option>
					<option value="+8.5">+08:30</option>
					<option value="+8.75">+08:45</option>
					<option value="+9">+09:00</option>
					<option value="+9.5">+09:30</option>
					<option value="+10">+10:00</option>
					<option value="+10.5">+10:30</option>
					<option value="+11">+11:00</option>
					<option value="+12">+12:00</option>
					<option value="+12.75">+12:45</option>
					<option value="+13">+13:00</option>
					<option value="+13.75">+13:45</option>
					<option value="+14">+14:00</option>
				</select>

			</label></p>
			<input type="submit" value="INSTALL"></form>
		</form>
	</div>
</body>
</html>