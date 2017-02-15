<?php 
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	
	require_once('../Spyc.php');
	
	$d = $_POST['date'];					// Getting the info from the form:
	$t = $_POST['time'];					// date, time, content and title from the posts,
	$c = $_POST['content'];					// and from_form to avoid an amateur injection
	$title = $_POST['title'];				// process, reinforcement of this aspect is important
	$from_form = $_POST['from_form'];		// for future versions.

	if (isset($_SESSION['name']) && ($d != null) && ($t != null) && ($c != null) && $from_form){ // From form has to be true to be able to post.
		$posts = Spyc::YAMLload("../posts.yaml");
		
		$reverse = array_reverse($posts);	// This is the only way I got it to work,
		$postid = $reverse[0]["postid"]+1;	// have to find a more efficient way.

		$posts[$postid]["title"] = $title;
		$posts[$postid]["date"] = $d;
		$posts[$postid]["time"] = $t;
		$posts[$postid]["content"] = $c;
		$posts[$postid]["postid"] = $postid; // Setting the postid as an array value and a part of the structure is key to have consistency in the post id's.
		$posts[$postid]["author"] = $_SESSION['name']; // This is non editable, the author is whoever is logged in.
		$posts[$postid]["edited"] = false;
		
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