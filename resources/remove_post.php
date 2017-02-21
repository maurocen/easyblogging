<?php 
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	
	require_once('../Spyc.php');
	if (isset($_POST["from_form"]) && (isset($_POST['delete']) || $_POST['ALL'] == "ALL")) { // To delete a post you have to reach this code from the form in admin.php
		if (!isset($_POST['ALL'])) {
			$delete = $_POST["delete"];
			$posts = Spyc::YAMLload("../posts.yaml");
			for ($i = 1; $i <= count($posts)+1; $i++) {	// This is ugly, but it's the only way I
				if ($posts[$i]["postid"] == $delete) {	// got it to work properly, have to look
					unset($posts[$i]);					// at it later.
				}
			}
			$yaml = Spyc::YAMLDump($posts,2,PHP_INT_MAX);
			$hfile = fopen("../posts.yaml", 'w');
			fwrite($hfile, $yaml);
		}
		else {
			unlink("../posts.yaml");
			$hfile = fopen("../posts.yaml", 'w');
			fwrite($hfile, "---\n");
			chmod("posts.yaml", 0640);
		}
		
		header('Location: ../index.php');
	}
	else {
		header('Location: ../index.php');
	}
?>