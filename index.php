<!DOCTYPE html>
<?php
	$installed = true;
	if (!$installed) {
		header('Location: install.php');
	}
	require_once("Spyc.php"); 
	$posts = Spyc::YAMLload("posts.yaml");
	$posts = array_reverse($posts);
	$config = Spyc::YAMLload("config.yaml");
	$lang = $config["lang"];
	$bname = $config["bname"];
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

	<title>
		<?php
			echo $bname;
		?>
	</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/blog-post.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<?php
						echo $bname;
					?>
				</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="hidden-lg white-text">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php
						session_start();
						if (!isset($_SESSION['name'])) {
							echo "<h4>Login</h4>";
							echo '<div class="input-group">
							<form action="login.php" method="POST">
								<div class="form-group">
									<label for="u_name">Username</label>
									<input type="text" class="form-control" name="u_name" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="u_pass">Password</label>
									<input type="password" class="form-control" name="u_pass" placeholder="Password">
								</div>
								<hr>
								<p></p><button type="submit" class="btn btn-default">Submit</button></p>
							</form>
						</div>';
					}
					else {
						echo "<p><h4>Hello, <i>".$_SESSION['name']."</i>.</h4><br>";
						echo "<a href='admin.php'>Go to admin panel</a><br>";
						echo "<a href='logout.php'>Logout</a></p>";
					}
				?>
			</div>
		</div><!-- /.navbar-collapse -->
	</div>
</div><!-- /.container-fluid -->
</nav>

<!-- Page Content -->
<div class="container well 2">

	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-8">
			<?php 
				if (!empty($posts)) {
					if (isset($_GET["author"])) {
						echo "<h1>".$translation["Showing posts by"]." <i>".$_GET["author"]."</i><br><a href='index.php'>Go back</a>.</h1>";
					}
					foreach ($posts as $a) {
						if (!isset($_GET["author"])) {
							if (isset($_GET["title"])) {
								if ($a["title"] == $_GET["title"]) {
									if($config["title"]) echo "<h2>".$a["title"]."</h2>"; 
									if($config["author"]) echo $translation["by"]." <i><a href='index.php?author=".$a["author"]."'>".$a["author"]."</a></i><hr>";
									if($config["date"] || $config["time"]) {
										echo "<p><span class=\"glyphicon glyphicon-time\"></span> ".$translation["Posted"]." ";
										if ($config["date"]) echo $translation["on"]." ".$a['date']." ";
										if ($config["time"]) echo $translation["at"]." ".$a['time']."</p>";
										echo "<hr>";
									}
									echo $a['content'];
									echo "<hr>"; 
								}
							}
							else {
								if ($config["title"] || $config["author"]) {
									if($config["title"]) echo "<h2>".$a["title"]."</h2>";
									if($config["author"]) echo $translation["by"]." <i><a href='index.php?author=".$a["author"]."'>".$a["author"]."</a></i>";
									echo "<hr>";
								}
								if($config["date"] || $config["time"]) {
									echo "<p><span class=\"glyphicon glyphicon-time\"></span> ".$translation["Posted"]." ";
									if ($config["date"]) echo $translation["on"]." ".$a['date']." ";
									if ($config["time"]) echo $translation["at"]." ".$a['time']."</p>";
									echo "<hr>";
								}
								echo $a['content'];
								echo "<hr>";
							}
						}
						else if ($a["author"] == $_GET["author"]) {
							if($config["title"]) echo "<h2>".$a["title"]."</h2>"; 
							if($config["author"]) echo $translation["by"]." <i><a href='index.php?author=".$a["author"]."'>".$a["author"]."</a></i><hr>";
							if($config["date"] || $config["time"]) {
								echo "<p><span class=\"glyphicon glyphicon-time\"></span> ".$translation["Posted"]." ";
								if ($config["date"]) echo $translation["on"]." ".$a['date']." ";
								if ($config["time"]) echo $translation["at"]." ".$a['time']."</p>";
								echo "<hr>";
							}
							echo $a['content'];
							echo "<hr>";
						}
					}
				}
				else {
					echo '<h1>'.$translation["Nothing posted yet!"].'</h1><p><a href="create_post.php">'.$translation["Start posting"].'</a></p>';
				}
			?>
		</div>

		<?php
			require_once("sidebar.php");
		?>
	</div>
</div>
	<!-- /.container -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>