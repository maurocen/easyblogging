<?php 
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	
	require_once('../Spyc.php');
	
	$c = $_POST['content'];					// 
	$title = $_POST['title'];				// Getting edited title, content and
	$from_form = $_POST['from_form'];		// postid from the form.
	$postid = $_POST['postid'];				//
	$config = Spyc::YAMLLoad("../config.yaml");

	if (isset($_SESSION['name']) && ($c != null) && $from_form){ // From form has to be true to be able to post.
		$posts = Spyc::YAMLload("../posts.yaml");
		
		$reverse = array_reverse($posts);	// This is the only way I got it to work,
		
		$gmt = gmdate("Y/m/d H:i:s");
		$gmt = strtotime($gmt);
		$edit_time = $gmt+($config["shift"]*60*60);

		$posts[$postid]["title"] = $title;
		$posts[$postid]["date"] = $d;
		$posts[$postid]["time"] = $t;
		$posts[$postid]["content"] = $c;
		$posts[$postid]["postid"] = $postid;
		$posts[$postid]["author"] = $posts[$postid]["author"];
		$posts[$postid]["edited"] = $edit_time;
		
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