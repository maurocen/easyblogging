<?php
	require_once("Spyc.php");
	$config = Spyc::YAMLload("config.yaml");
	$lang = $config['lang'];
	require_once("resources/".$lang.".php");
	$translation = translate();

	function print_manage_links($post) {

		global $translation;

		if (isset($_SESSION["role"])) { 
			$role = $_SESSION["role"];
			$can_manage = (($role == "admin") || ($role == "mod"));
			if ($can_manage) {
				$at = $post["postid"];
				echo "\t<form action=\"./edit_post.php\" method=\"POST\" class=\"form-float\">
					<input type=\"hidden\" value=\"$at\" name=\"edit\" />
					<input type=\"submit\" value=\"".$translation["Edit post"]."\" class=\"button-link\">
					</form>	<form class=\"form-float\">-</form>
					<form action=\"./resources/remove_post.php\" method=\"POST\" class=\"form-float\">
					<input type=\"hidden\" value=\"$at\" name=\"delete\" />
					<input type=\"hidden\" value=\"true\" name=\"from_form\" />
					<input type=\"submit\" value=\"".$translation["Delete post"]."\" class=\"button-link\">
					</form>
					";
			}
		}
	}

	function print_post($post) {

		global $translation, $config;

		if ($config["title"]) {
			echo "<div class=\"title-hover\"><h2 class=\"post-title\">".$post["title"]."</h2>";
			print_manage_links($post);
			echo "</div><br />";
		}
		if ($config["author"]) {
			if ($config["title"]) {
				echo $translation["by"];
			}
			else {
				echo ucfirst($translation["by"]);
			}
			echo " <i><a href='index.php?author=".$post["author"]."'>".$post["author"]."</a></i>";
		}
		if ($config["date"] || $config["date"]) { 
			$post_time = $post["posted"];
			
			echo "<br/><span class=\"glyphicon glyphicon-time\"></span> ".$translation["Posted"]." ";
			if ($config["date"]) {
				$date_format = $config["date_format"];
				$post_date = date($date_format, $post_time);
				
				echo $translation["on"]." ".$post_date." ";
			}
			if ($config["time"]) {
				$post_time = date("H:i", $post_time);
				echo $translation["at"]." ".$post_time;
				if (isset($post["edited"])) {
					$edit_date = date($config["date_format"], $post["edited"]);
					$edit_time = date("H:i", $post["edited"]);
					$edited = $edit_date." ".$edit_time;
					echo "\t<div class=\"edit-hover\"><i class>*</i><div class=\"hover-text\"> ".$translation["Last edited"].": ".$edited."</div></div>";
				}
			}
			echo "<br/>";
		}
		
		echo "<hr>";
		echo $post["content"];
		echo "<hr>";
		
		if(!$config["title"]) {
			echo "<div class=\"title-hover\"><h5 class=\"post-title\">".$translation["Manage post"]."</h5>";
			print_manage_links($post);
			echo "</div><br />";
		}
	}

	function print_posts($posts) {

		global $translation, $config;

		if (isset($_GET["author"])) {
			echo "<h1>".$translation["Showing posts by"]." <i>".$_GET["author"]."</i><br><a href='index.php'>Go back</a>.</h1>";
		}

		foreach ($posts as $post) {
			if (isset($_GET["author"])) {
				if ($post["author"] == $_GET["author"]) {
					print_post($post);
				}
			}
			else {
				if (isset($_GET["title"])) {
					if ($post["title"] == $_GET["title"]) {
						print_post($post);
					}
				}
				else {
					print_post($post);
				}
			}
		}
	}
	// Comment line for testing purposes.
?>