<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		
		require_once("Spyc.php");
		require_once("salt.php");
		
		$database = Spyc::YAMLload("hash.yaml");

		$u_Admin = $_POST['u_Admin'];
		$p_Admin = $_POST['p_Admin'];
		
		if (hash(sha512, $database[$u_Admin]["salt"].$p_Admin) == $database[$u_Admin]["hash"]) {
			$u_New = $_POST['u_New'];
			$p_New = $_POST['p_New'];	
			
			if ($database[$u_New]["salt"]) {
			}
			else {
				$database[$u_New]["salt"] = salt();	
				$database[$u_New]["hash"] = hash(sha512, $database[$u_New]["salt"].$p_New);	
			}
			
			$hfile = fopen("hash.yaml", 'w');
			$yaml = Spyc::YAMLdump($database,4,PHP_INT_MAX);
			
			fwrite($hfile, $yaml);
		}
		else {
			header('Location: error.php');
		}
	?>
</body>
</html>