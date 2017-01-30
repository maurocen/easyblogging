<?php 
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	
	require_once("../Spyc.php");
	require_once("../salt.php");
	
	$config = Spyc::YAMLload("../config.yaml");

	$from_form = $_POST['from_form'];

	if (isset($_SESSION['name']) && $from_form) {
		if (isset($_POST['p_Title'])) {
			$config["title"] = true;
		}
		else {
			$config["title"] = false;
		}
		if (isset($_POST["p_Date"])) {
			$config["date"] = true;
		}
		else {
			$config["date"] = false;
		}
		if (isset($_POST['p_Time'])) {
			$config["time"] = true;
		}
		else {
			$config["time"] = false;
		}
		if (isset($_POST['p_Author'])) {
			$config["author"] = true;
		}
		else {
			$config["author"] = false;
		}
		if (isset($_POST['p_Qty'])) {
			$config["posts_qty"] = $_POST['p_Qty'];
		}
		else {
			$config["posts_qty"] = 5;
		}
		if (isset($_POST['language'])) {
			$config["lang"] = $_POST['language'];
		}
		else {
			$config["lang"] = "en";
		}
		
		$hfile = fopen("../config.yaml", 'w');
		$yaml = Spyc::YAMLdump($config,4,PHP_INT_MAX);
		
		fwrite($hfile, $yaml);
		header('Location: ../index.php');
	}
	else {
		header('Location: ../index.php');
	}
	
	/*
		Basically read the info received from the form and
		write it in the config file, might document more
		in the future, but right now it's pretty self explanatory.
	*/ 
?>