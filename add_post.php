<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		
		require_once('Spyc.php');
		
		$d = $_POST['date'];
		$t = $_POST['time'];
		$c = $_POST['content'];

		if (isset($_SESSION['name'])){
			$posts = Spyc::YAMLload("posts.yaml");
			$postid = count($posts)+1;
			echo "<p>$d $t ---> $c</p><p>$user ---> $pass</p>";
			$posts[$postid]["date"] = $d;
			$posts[$postid]["time"] = $t;
			$posts[$postid]["content"] = $c;
			
			$yaml = Spyc::YAMLDump($posts,2,PHP_INT_MAX);
			$hfile = fopen("posts.yaml", 'w');
			fwrite($hfile, $yaml);
			
			echo 'SUCCESS!';
			sleep(5);
			header('Location: index.php');
			exit;
		}
		else {
			sleep(5);
			header('Location: index.php');
			exit;
		}
	?>
</body>
</html>