<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		
		require_once('../Spyc.php');
		if (isset($_POST["from_form"])) {
			$asd = $_POST["delete"];
			$posts = Spyc::YAMLload("../posts.yaml");
			$x = 0;
			while ($posts[$x]["title"] != $asd) {
				$x++;
			}
			array_splice($posts, $x, 1);
			$yaml = Spyc::YAMLDump($posts,2,PHP_INT_MAX);
			$hfile = fopen("../posts.yaml", 'w');
			fwrite($hfile, $yaml);
			header('Location: ../index.php');
		}
		else {
			header('Location: ../index.php');
		}
	?>
</body>
</html>