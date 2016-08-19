<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		
		require_once("../Spyc.php");
		require_once("../salt.php");
		
		$database = Spyc::YAMLload("../hash.yaml");

		$u_New = $_POST['u_New'];
		$p_New = $_POST['p_New'];	
		$p_New2 = $_POST['p_New2'];
		
		$from_form = $_POST['from_form'];

		if (isset($_SESSION['name']) && ($u_New!=null) && (p_New!=null) && $from_form) {
			if ($p_New != $p_New2) {
				header('Location: ../admin.php?error=1');
			}
			else {	
				if ($database[$u_New]["salt"]) {
				}
				else {
					$database[$u_New]["salt"] = salt();	
					$database[$u_New]["hash"] = hash(sha512, $database[$u_New]["salt"].$p_New);	
				}
				
				$hfile = fopen("../hash.yaml", 'w');
				$yaml = Spyc::YAMLdump($database,4,PHP_INT_MAX);
				
				fwrite($hfile, $yaml);
				header('Location: ../index.php');
			}
		}
		else {
			header('Location: ../index.php');
		}
	?>
</body>
</html>