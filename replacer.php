<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		
		require_once('Spyc.php');

		// Leo los datos del formulario
		$date = $_POST['date'];
		$time = $_POST['time'];
		$content = $_POST['content'];

		// Abro el archivo HTML que voy a modificar
		$my_file = 'index.php';
		$handle = fopen($my_file, 'r');
		$data = fread($handle,filesize("index.php"));

		// Agrego el post nuevo al código HTML de la página		
		$data = preg_replace("/<replace><\/replace>/","<replace></replace>\n<h3 id=\"postdate\"><i>".$date."<br>".$time."</i></h3>\n<p>".$content."</p><br>", $data);
		
		// Reemplazo todos los tildes, signos de interrogación, exclamación y eñes por su código HTML para evitar que se pierdan.
		$data = preg_replace("/¡/","&iexcl;", $data);
		$data = preg_replace("/¿/","&iquest;", $data);
		$data = preg_replace("/á/","&aacute;", $data);
		$data = preg_replace("/é/","&eacute;", $data);
		$data = preg_replace("/í/","&iacute;", $data);
		$data = preg_replace("/ó/","&oacute;", $data);
		$data = preg_replace("/ú/","&uacute;", $data);
		$data = preg_replace("/Á/","&Aacute;", $data);
		$data = preg_replace("/É/","&Eacute;", $data);
		$data = preg_replace("/Í/","&Iacute;", $data);
		$data = preg_replace("/Ó/","&Oacute;", $data);
		$data = preg_replace("/Ú/","&Uacute;", $data);
		$data = preg_replace("/ñ/","&ntilde;", $data);
		$data = preg_replace("/Ñ/","&Ntilde;", $data);

		// Hasheo la contraseña que me pasan y leo la que está guardada
		$database = Spyc::YAMLload("hash.yaml");
		$user = $_POST['username'];
		$pass = $_POST['passwrd'];
		$salt = $database[$user]["salt"];
		$pass = hash('sha512', $salt.$pass);
		
		$filepass = $database[$user]["hash"];
		//$filepass = file_get_contents('hash.txt');
		
		// Verifico que la contraseña sea la que está almacenada
		if ($pass == $filepass){
			// Abro el archivo para modificarlo
			$handler = fopen($my_file, 'w');
			fwrite($handler, $data);
			echo 'SUCCESS!'; // Mensaje de éxito
			sleep(5);
			header('Location: index.php');
			exit;
		}
		else {
			echo 'ERROR: Contrase&ntilde;a incorrecta.'; // Mensaje de error
			sleep(5);
			header('Location: admin.php');
			exit;
		}
	?>
</body>
</html>