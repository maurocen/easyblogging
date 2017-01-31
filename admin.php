<!DOCTYPE html>
<?php
	session_start();
	require_once("Spyc.php"); 
	$config = Spyc::YAMLload("config.yaml");
	$lang = $config["lang"];
	require_once("resources/".$lang.".php");
	$users = Spyc::YAMLload("users.yaml");
	$role = $_SESSION['role'];
	$translation = translate();
	echo "<html lang='".$lang."'>";
	if ($role != 'admin') {
		header('Location: /index.php');
	}
?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<script>tinymce.init({
		selector: 'textarea',
		theme: 'modern',
		plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | code',
		image_advtab: true,
		templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
		]
	});
</script>

<title>Admin panel</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/blog-post.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<?php 
						echo $translation["ADMIN"];
					?>
				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">
						<?php 
							echo $translation["Toggle navigation"];
						?>
					</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="hidden-lg">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php
						session_start();
						if (!isset($_SESSION['name'])) {
							echo "<h4>".$translation["Login"]."</h4>";
							echo '<div class="input-group">
							<form action="login.php" method="POST">
								<div class="form-group">
									<label for="u_name">'.$translation["Username"].'</label>
									<input type="text" class="form-control" name="u_name" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="u_pass">'.$translation["Password"].'</label>
									<input type="password" class="form-control" name="u_pass" placeholder="'.$translation["Password"].'">
								</div>
								<p></p><button type="submit" class="btn btn-default">'.$translation["Submit"].'</button></p>
							</form>
						</div>';
						}
						else {
							echo "<p><h4>".$translation["Hello"].", <i>".$_SESSION['name']."</i>.</h4><br>";
							echo "<a href='admin.php'>".$translation["Go to admin panel"]."</a><br>";
							echo "<a href='logout.php'>".$translation["Logout"]."</a></p>";
						}
					?>
				</div>
			</div>
		</div>
	</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if (isset($_SESSION['name'])) {
						//---------- LOGOUT BUTTON ----------//
						echo "<form action=\"logout.php\" method=\"POST\" style=\"border:0px; padding:0px;\">
						<p align=\"center\"><input type=\"submit\" value=\"".$translation["Logout"]."\"></p>
						</form>";
						//---------- ADD POST ----------// Deprecated, now in create_post.php, keeping it for a while, deleting it in future versions.
						
						/*
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#addpost"><h3>'.$translation["Add a new post"].'</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="addpost" class="panel-collapse collapse">';
						echo "<div class=\"panel-body\">
						<form action=\"resources/add_post.php\" method=\"POST\">
							<p>".$translation["Title"].": <input type=\"text\" name=\"title\" autocomplete=\"false\" required=\"true\"/></p>
							<p>".$translation["Date"].": <input type=\"date\" name=\"date\" autocomplete=\"false\" required=\"true\"/></p>
							<p>".$translation["Time"].": <input type=\"time\" name=\"time\" autocomplete=\"false\" required=\"true\"/></p>
							<p>".$translation["Content"].": <textarea rows=\"8\" cols=\"70\" name=\"content\" autocomplete=\"false\"></textarea></p>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"".$translation["Add post"]."\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						*/
						
						//---------- ADD USER ----------//
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#adduser"><h3>'.$translation["Add a new user"].'</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="adduser" class="panel-collapse';
						if (isset($_GET["error"])) echo ' collapse in">';
						else echo ' collapse">';
						echo "<div class=\"panel-body\">";
						if (isset($_GET["error"]) && $_GET["error"]==2) {
							echo "<p style=\"color:#f00\"><b>".$translation["User already exists."]."</b></p>";
						}
						else {
							if (isset($_GET["error"]) && $_GET["error"]==1) echo "<p style=\"color:#f00\"><b>".$translation["Passwords don't match."]."</b></p>";
						}
						echo "
						<form action=\"resources/add_user.php\" method=\"POST\">
							<p>".$translation["New user"].": <input type=\"text\" name=\"u_New\" autocomplete=\"false\" required=\"true\" /></p>
							<p>".$translation["New pass"].": <input type=\"password\" name=\"p_New\" autocomplete=\"false\" required=\"true\"/></p>
							<p>".$translation["Repeat pass"].": <input type=\"password\" name=\"p_New2\" autocomplete=\"false\" required=\"true\"/></p>
							".$translation["User role"].":<br>
							<div class=\"radio\">
								<label><select name=\"r_New\">
									<option value=\"writer\"";
									echo ">".$translation["Writer"]."</option>
									<option value=\"mod\"";
									echo ">".$translation["Moderator"]."</option>
									<option value=\"admin\"";
									echo ">".$translation["Administrator"]."</option>
								</select></label>
							</div>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"".$translation["Add user"]."\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						//---------- REMOVE USER ----------//
						$users = Spyc::YAMLload("users.yaml");
						if (count($users) > 1) {	
							echo '<div class="panel-group">';
							echo '<div class="panel panel-default">';
							echo '<div class="panel-heading">';
							echo '<h4 class="panel-title">';
							echo '<a data-toggle="collapse" href="#removeuser"><h3>'.$translation["Remove user"].'</h3></a>';
							echo '</h4>';
							echo '</div>';
							echo '<div class="panel-collapse collapse" id="removeuser">';
							echo "<div class=\"panel-body\">
								<form action=\"resources/remove_user.php\" method=\"POST\">
								<p>".$translation["Choose user"].":</p>";
								foreach ($users as $a)
									if (current($a) != $_SESSION['name']) {
									echo "<div class=\"checkbox\">
									<label><input type=\"radio\" value=\"".$a['name']."\" name=\"delete\"> ".$a['name']."</label>
									</div>";
									}
							echo "<input type=\"hidden\" name=\"from_form\" value=\"true\"></input>
								<input type=\"submit\" value=\"".$translation["Remove user"]."\"></input>
								</form></div>";
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
						//---------- POST INFO ----------//
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						$post = Spyc::YAMLload("config.yaml");
						echo '<a data-toggle="collapse" href="#editconfig"><h3>'.$translation["Edit blog configuration"].'</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="editconfig" class="panel-collapse collapse">';
						echo "<div class=\"panel-body\">
						<form action=\"resources/edit_config.php\" method=\"POST\">
							<p>".$translation["Show post"].":</p>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Title\"";
							if ($post["title"]) echo " checked";
							echo ">".$translation["Title"]."</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Date\"";
							if ($post["date"]) echo " checked";
								echo ">".$translation["Date"]."</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Time\"";
							if ($post["time"]) echo " checked";
								echo ">".$translation["Time"]."</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Author\"";
							if ($post["author"]) echo " checked";
								echo ">".$translation["Author"]."</label>
							</div>
							<div class=\"radio\">
								<label><select name=\"p_Qty\">
									<option value=\"3\"";
									if ($post["posts_qty"] == 3 ) echo " selected";
									echo ">3</option>
									<option value=\"5\"";
									if ($post["posts_qty"] == 5 ) echo " selected";
									echo ">5</option>
									<option value=\"10\"";
									if ($post["posts_qty"] == 10 ) echo " selected";
									echo ">10</option>
								</select> ".$translation["Last post to be shown in sidebar"]."</label>
							</div>
							<div class=\"radio\">
								<label><select name=\"language\">
									<option value=\"en\"";
									if ($post["lang"] == "en") echo " selected";
									echo ">English</option>
									<option value=\"es\"";
									if ($post["lang"] == "es") echo " selected";
									echo ">Español</option>
								</select> ".$translation["Language"]."</label>
							</div>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"".$translation["Change configuration"]."\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					else {
						echo "<div class=\"container well\"><form action=\"login.php\" method=\"post\">\n<p>".$translation["Username"].": <input type=\"text\" name=\"u_name\"> ".$translation["Password"].": <input type=\"password\" name=\"u_pass\"> <input type=\"submit\" value=\"".$translation["Login"]."\"></p>	</form></div>";
					}
					
					/*
						All of these blocks are simple forms with the hidden from_form input for a little bit of security, the html consist of simple bootstrap
						classes. I didn't write the html code, except for the forms.
					*/
				?>
	</div>
		</div>
	
	<hr>
	
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>