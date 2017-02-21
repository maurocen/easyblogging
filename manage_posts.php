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
	if ($role != ('admin'||'mod')) {
		header('Location: ./index.php');
	}
?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<script>

		function confirm_delete_all() {
			$var = confirm("This process is irreversible and will delete ALL your posts. Proceed at your own risk.");
			if (!$var) {
				$("#confirm").prop("checked", false);
			}
			else {
				$("#confirm").prop("checked", true);
			}
		};

		function confirm_delete() {
			$ALL_is_checked = $('input[name="ALL[]"]:checked').length > 0;
			$selected_option = ($("#title").serialize() != "");

			if (!($ALL_is_checked || $selected_option)) {
				$alert_text = "<?php echo $translation['Please select an option.']; ?>";
				alert($alert_text);
			}
			else {
				$text = "<?php echo $translation['Are you sure you want to delete the selected post? This process is irreversible.']; ?>";
				$confirmation = confirm($text);
				if ($confirmation) {
					$.post( "./resources/remove_post.php", $( "#delete" ).serialize() );
					window.location.replace("./index.php");
				};
			};
		};
	</script>
<title>
<?php
	echo $translation["Manage posts"];
?>
</title>

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
						echo $translation["Manage posts"];
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

						$posts = Spyc::YAMLload("posts.yaml");
						if (count($posts) > 0) {	

						//---------- DELETE POST ----------//

							echo '<div class="panel-group">';
							echo '<div class="panel panel-default">';
							echo '<div class="panel-heading">';
							echo '<h4 class="panel-title">';
							echo '<a data-toggle="collapse" href="#deletepost"><h3>'.$translation["Delete post"].'</h3></a>';
							echo '</h4>';
							echo '</div>';
							echo '<div id="deletepost" class="panel collapse">';
							require_once("Spyc.php");
							echo "<div class=\"panel-body\">
							<form action=\"javascript:confirm_delete()\" method=\"POST\" id=\"delete\">
							<p>".$translation["Choose post"].":</p>";
							$posts = array_reverse($posts);

							if ($posts != null) {
							echo "<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"ALL\" name=\"ALL\" onclick=\"confirm_delete_all()\" id=\"confirm\"> <b>ALL POSTS</b></label>
								</div>";
							}

							for($a = 0; $a <= count($posts)-1; $a++) {
								$as = $posts[$a]["title"];
								$at = $posts[$a]["postid"]; // Index to delete
								echo "<div class=\"checkbox\">
								<label><input type=\"radio\" value=\"$at\" name=\"delete\" id=\"title\"> ".$as."</label>
								</div>";
							}
							echo "<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"".$translation["Delete post"]."\"></p>
							</form></div>";
							echo '</div>';
							echo '</div>';
							echo '</div>';

					//---------- EDIT POST ----------//		

							echo '<div class="panel-group">';
							echo '<div class="panel panel-default">';
							echo '<div class="panel-heading">';
							echo '<h4 class="panel-title">';
							echo '<a data-toggle="collapse" href="#editpost"><h3>'.$translation["Edit post"].'</h3></a>';
							echo '</h4>';
							echo '</div>';
							echo '<div id="editpost" class="panel collapse">';
							require_once("Spyc.php");
							echo "<div class=\"panel-body\">
							<form action=\"./edit_post.php\" method=\"POST\">
							<p>".$translation["Choose post"].":</p>";
							for($a = 0; $a <= count($posts)-1; $a++) {
								$as = $posts[$a]["title"];
								$at = $posts[$a]["postid"]; // Index to edit
								echo "<div class=\"checkbox\">
								<label><input type=\"radio\" value=\"$at\" name=\"edit\"> ".$as."</label>
								</div>";
							}
							echo "<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"".$translation["Edit post"]."\"></p>
							</form></div>";
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
						else {
							header('Location: ./index.php');
						}
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