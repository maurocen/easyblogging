<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	require_once('../Spyc.php');

	$c = $_POST['content'];					// Getting title and content from the form.
	$title = $_POST['title'];				// Security enhacements is important for future
	$from_form = $_POST['from_form'];		// versions.

	if (isset($_SESSION['name']) && ($c != null) && $from_form){ // From form has to be true to be able to post.
		$posts = Spyc::YAMLload("../posts.yaml");
		$config = Spyc::YAMLload("../config.yaml");

		$gmt = gmdate("Y/m/d H:i:s");
		$gmt = strtotime($gmt);
		$local = $gmt+($config["shift"]*60*60);

		$date = date("d/m/y", $local);
		$time = date("H:i", $local);

		$reverse = array_reverse($posts);																			// This is the only way I got it to work,
		$postid = isset($reverse[0]["postid"])? $reverse[0]["postid"]+1 : 1;	// have to find a more efficient way.

		$posts[$postid]["title"] = $title;
		$posts[$postid]["date"] = $date;
		$posts[$postid]["time"] = $time;
		$posts[$postid]["content"] = $c;
		$posts[$postid]["postid"] = $postid; // Setting the postid as an array value and a part of the structure is key to have consistency in the post id's.
		$posts[$postid]["author"] = $_SESSION['name']; // This is non editable, the author is whoever is logged in.
		$posts[$postid]["hash"] = hash('crc32', $title.$date.$time.$gmt);

		$yaml = Spyc::YAMLDump($posts,2,PHP_INT_MAX);	// Dumping the posts info in the "database" may take considerably
		$hfile = fopen("../posts.yaml", 'w');			// more time in the future, have to find a better way to store them,
		fwrite($hfile, $yaml);							// maybe individual files, or an actual database.

		header('Location: ../index.php'); // Redirect home once the posts are stored.
		exit;
	}
	else {
		header('Location: ../index.php'); // If blog post fails for whatever reason, redirect to home.
		exit;
	}
?>
