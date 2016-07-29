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
			$installed = false;
			$posts = Spyc::YAMLload("posts.yaml");
			$posts = array_reverse($posts);
		?>
		<div class="header"><h1 id="blogname"></h1></div>

		<div class="content">
<h2 id="motto"><i></i></h2>
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