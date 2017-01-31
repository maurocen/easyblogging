<?php 
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	
	require_once('../Spyc.php');
	if (isset($_POST["from_form"])) { // To delete a user you have to reach this code from the form in admin.php
		if (isset($_POST['delete'])) {
			if ($_POST['delete'] != $_SESSION['name']) {		// Can't delete current account.
				$delete = $_POST["delete"];
				$users = Spyc::YAMLload("../users.yaml");
				
				foreach ($users as $a) {
					if  ($a['name'] == $delete) {				// If gets a match on the account name
						$key = array_search($a, $users);		// it searches the array key of the user
						unset($users[$key]);					// and deletes it.
					}
				}
				
				$yaml = Spyc::YAMLDump($users,2,PHP_INT_MAX);
				$hfile = fopen("../users.yaml", 'w');
				fwrite($hfile, $yaml);
			}
		}
		
		header('Location: ../index.php');
	}
	else {
		header('Location: ../index.php?');
	}
?>