<!DOCTYPE html>
<?php
	require_once("Spyc.php"); 
	$config = Spyc::YAMLload("config.yaml");
	$lang = $config["lang"];
	require_once("resources/".$lang.".php");
	$translation = translate();
	echo "<html lang='".$lang."'>";
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

<title>
	<?php
		echo $translation["Add a new post"];
	?>
</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/blog-post.css" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<?php
						echo $translation["Add a new post"];
					?>
				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only"><?php echo $translation["Toggle navigation"];?></span>
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
					//---------- ADD POST ----------//
					echo "<form action=\"logout.php\" method=\"POST\" style=\"border:0px; padding:0px;\">
					<p align=\"center\"><input type=\"submit\" value=\"".$translation["Logout"]."\"></p>
					</form>";
					echo '<div class="panel-group">';
					echo '<div class="panel panel-default">';
					echo '<div class="panel-heading">';
					echo '<h4 class="panel-title">';
					echo '<h3>'.$translation["Add a new post"].'</h3>';
					echo '</h4>';
					echo '</div>';
					echo '<div class="panel">';
					echo "<div class=\"panel-body\">
					<form action=\"resources/add_post.php\" method=\"POST\">
						<p>".$translation["Title"].":<br><input type=\"text\" name=\"title\" autocomplete=\"false\" required=\"true\"/></p>
						<p>".$translation["Date"].":<br><input type=\"date\" name=\"date\" autocomplete=\"false\" required=\"true\"/></p>
						<p>".$translation["Time"].":<br><input type=\"time\" name=\"time\" autocomplete=\"false\" required=\"true\"/></p>
						<p>".$translation["Content"].":<br><textarea rows=\"8\" cols=\"70\" name=\"content\" autocomplete=\"false\" required=\"true\"></textarea></p>
						<input type=\"hidden\" name=\"from_form\" value=\"true\">
						<p><input type=\"submit\" value=\"".$translation["Add post"]."\"></p>
					</form></div>";
					echo '</div>';
					echo '</div>';
					echo '</div>';
					/*
						Nothing really important here, simple form with inputs for title, date, time and content. Also, a hidden input called from_form
						to ensure a little bit of security, so not anybody can post simply by getting the add_post.php address.
					*/
				}
			?>
</div>
</div>
<hr> <!-- Irrelevant <hr> tag, keeping it for fun. -->
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>