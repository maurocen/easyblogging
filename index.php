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
		?>
		<div class="header"><h1 id="blogname"></h1></div>

		<div class="content">
<h2 id="motto"><i></i></h2>
		<h2 id="motto"><i></i></h2>
			<h2 id="motto"><i></i></h2>
			<div class="posts">
				<?php
					$posts = Spyc::YAMLload("posts.yaml");
					$posts = array_reverse($posts);
					
					foreach ($posts as $a) {
						echo "<h2 id=\"postdate\"><i>".$a["date"]."<br>".$a["time"]."</i></h2><p>".$a["content"]."</p>";
					}
					$hashes = Spyc::YAMLload("hash.yaml");
				?>
			</div>
		</div>

	</body>
</html>