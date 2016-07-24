<?php
	function salt() {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_=+/?.,!#$%^&*()';
		$charlength = strlen($characters);
		$rstring = '';
		for ($i=0; $i<32 ; $i++) { 
			$randomString .= $characters[rand(0, $charlength - 1)];
		}
		return $randomString;
	}

	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$bname = $_POST["blogname"];
	$bmotto = $_POST["bmotto"];
	$salt = salt();

	$hash = hash(sha512, $salt.$pass);
	$hfile = fopen("hash.txt", 'w');
	chmod("hash.txt", 0640);
	fwrite($hfile, $hash);
	$hfile = fopen("salt.txt", 'w');
	fwrite($hfile, $salt);
	chmod("salt.txt", 0640);
	$hfile = fopen("index.php", 'r');
	$data = fread($hfile,filesize("index.php"));
	$data = preg_replace("/<title><\/title>/", "<title>".$bname."</title>", $data);
	$data = preg_replace("/<div class=\"header\"><\/div>/", "<div class=\"header\"><h1 id=\"blogname\">".$bname."</h1></div>", $data);
	$data = preg_replace("/<div class=\"content\">/", "<div class=\"content\">\n<h2 id=\"motto\"><i>".$bmotto."</i></h2>", $data);
	$hfile = fopen("index.php", 'w');
	fwrite($hfile, $data);
	unlink('install.php');
	echo 'Done.';
	sleep('5');
	header('Location: index.php');
?>