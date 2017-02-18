<?php
	require_once("Spyc.php");
	require_once("salt.php");

	$user = $_POST["user"];			//
	$pass = $_POST["pass"];			// Getting all the information of the
	$bname = $_POST["blogname"];	// user, and also blog name and motto
	$bmotto = $_POST["bmotto"];		// (motto currently unused)
	$salt = salt();					// Getting random salt for hashing.

	$hash = hash(sha512, $salt.$pass); // Hashing the password.

	$users[$user]["salt"] = $salt;	// Creating an association for user/salt
	$users[$user]["hash"] = $hash;	// and user/hash, so it can be stored.
	$users[$user]["role"] = admin;
	
	$hfile = fopen("users.yaml", 'w');				
	$yaml = Spyc::YAMLdump($users,4,PHP_INT_MAX);	
	fwrite($hfile, $yaml);							
	$hfile = fopen("posts.yaml", 'w');
	fwrite($hfile, "---\n");
	$hfile = fopen("config.yaml", 'w');
	$lang = $_POST["lang"];
	$shift = $_POST["shift"];
	fwrite($hfile, "---\ntitle: true\ndate: true\ntime: true\nauthor: true\nposts_qty: \"3\"\nlang: $lang\nbname: $bname\nbmotto: $bmotto\nshift: $shift");
	
	chmod("users.yaml", 0640);					//
	chmod("posts.yaml", 0640);					// Changing permission of the files
	chmod("resources/add_post.php", 0640);		// so not anybody can access them.
	chmod("resources/add_user.php", 0640);		// 
	chmod("login.php", 0640);					// Security not ensurable.
	chmod("logout.php", 0640);					//

	$hfile = fopen("index.php", 'r');												//
	$data = fread($hfile,filesize("index.php"));									//
	$data = preg_replace("/installed\s*=\s*false;/", "installed = true;", $data);	// Changing the blog status to "installed".
	$hfile = fopen("index.php", 'w');												//
	fwrite($hfile, $data);															//
	
	//unlink('install.php');		// Have to uncomment this two lines for the public version, this two files serve 
	//unlink('create_blog.php');	// no other purpose after installation and are an insight in my code.
	
	echo 'Done.';					// If the connection is fast enough, the user won't see this.
	header('Location: index.php');	// Redirect home to a "nothing posted yet", luckily.
?>