<?php
	require_once("Spyc.php");
	require_once("salt.php");

	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$bname = $_POST["blogname"];
	$bmotto = $_POST["bmotto"];
	$salt = salt();

	$hash = hash(sha512, $salt.$pass);

	$users[$user]["salt"] = $salt;
	$users[$user]["hash"] = $hash;

	$hfile = fopen("hash.yaml", 'w');
	$yaml = Spyc::YAMLdump($users,4,PHP_INT_MAX);
	fwrite($hfile, $yaml);
	$hfile = fopen("posts.yaml", 'w');
	fwrite($hfile, "---");
	$hfile = fopen("config.yaml", 'w');
	$lang = $_POST["lang"];
	fwrite($hfile, "---\ntitle: true\ndate: true\ntime: true\nauthor: true\nposts_qty: \"3\"\nlang: $lang");
	chmod("hash.yaml", 0640);
	chmod("posts.yaml", 0640);
	chmod("resources/add_post.php", 0640);
	chmod("resources/add_user.php", 0640);
	chmod("login.php", 0640);
	chmod("logout.php", 0640);

	$hfile = fopen("index.php", 'r');
	$data = fread($hfile,filesize("index.php"));
	$data = preg_replace("/<title>/", "<title>".$bname, $data);
	$data = preg_replace('/<a class="navbar-brand" href="index.php">/', '<a class="navbar-brand" href="index.php">'.$bname, $data);
	$data = preg_replace("/installed = false;/", "installed = true;", $data);
	$hfile = fopen("index.php", 'w');
	fwrite($hfile, $data);
	//unlink('install.php');
	//unlink('create_blog.php');
	echo 'Done.';
	header('Location: index.php');
?>