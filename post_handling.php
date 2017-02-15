<?php
	require_once("Spyc.php");
	$config = Spyc::YAMLload("config.yaml");
	$lang = $config['lang'];
	require_once("resources/".$lang.".php");
	$translation = translate();

	function print_post($post) {

		global $translation, $config;

		if ($config["title"]) {
			echo "<h2>".$post["title"]."</h2>";
		}
		if ($config["author"]) {
			echo $translation["by"]." <i><a href='index.php?author=".$post["author"]."'>".$post["author"]."</a>";
		}
		if ($config["date"] || $config["date"]) { 
			echo "<p><span class=\"glyphicon glyphicon-time\"></span> ".$translation["Posted"]." ";
			if ($config["date"]) {
				echo $translation["on"]." ".$post['date']." ";
			}
			if ($config["time"]) {
				echo $translation["at"]." ".$post['time']."</p>";
			}
			echo "<hr>";
			echo $post["content"];
			echo "<hr>";
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
?>