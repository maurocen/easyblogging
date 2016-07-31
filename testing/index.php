<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="blog.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			require_once("Spyc.php"); 
			$installed = true;
			$posts = Spyc::YAMLload("posts.yaml");
			$posts = array_reverse($posts);
		?>
		<div class="header"><h1 id="blogname"></h1><br>
		</div>
		<div class="logbox"><?php
		session_start();
		if (!isset($_SESSION['name'])) {
			echo "<form action=\"login.php\" method=\"post\">\n<p>User: <input type=\"text\" name=\"u_name\"> Password: <input type=\"password\" name=\"u_pass\"> <input type=\"submit\" value=\"Login\"></p>	</form>";
			if (isset($_SESSION['login']) && $_SESSION['login']==false) {
				echo "<p style=\"color:#F00;text-align:center;\">Error, try again</p>";
			}
		}
		else {
			echo "<form><p align=\"center\">Welcome, ".$_SESSION['name']." <a href=\"admin.php\">Go to admin panel</a> <a href=\"logout.php\">Log out</a></p></form>";
		}
		?></div>

		<div class="content">
			<div class="posts">
				<?php
					if ($installed) {
						
						foreach ($posts as $a) {
							echo "<h2 id=\"postdate\"><i>".$a["date"]."<br>".$a["time"]."</i></h2><p>".$a["content"]."</p>";
						}
					}
				?>
			</div>
		</div>

	</body>
</html>