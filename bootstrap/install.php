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
			<input type="submit" value="INSTALL"></form>
		</form>
	</div>
</body>
</html>