<div class="col-md-4 col-xs-12 pull-right">
		<div class="col-md-12 well deux">
			<div class="">
				<?php
					if (isset($_SESSION['role'])) {
						$role = $_SESSION['role'];
					}
					else {
						$role = 'guest';
					}
					if (!isset($_SESSION['name'])) {
						echo "<h4>".$translation["Login"]."</h4>";
						echo '<div class="input-group">
						<form action="login.php" method="POST">
							<div class="form-group">
								<label for="u_name">'.$translation["Username"].'</label>
								<input type="text" class="form-control" name="u_name" placeholder="'.$translation["Username"].'">
							</div>
							<div class="form-group">
								<label for="u_pass">'.$translation["Password"].'</label>
								<input type="password" class="form-control" name="u_pass" placeholder="'.$translation["Password"].'">
							</div>
							<hr>
							<p></p><button type="submit" class="btn btn-default">'.$translation["Submit"].'</button></p>
						</form>
					</div>';
					}
					else {
						echo "<p><h4>".$translation["Hello"].", <i>".$_SESSION['name']."</i>.</h4><br>";
						echo "<a href='create_post.php'>".$translation["Add a new post"]."</a>";
						echo "<hr>";
						if ($role == 'admin') {
							echo "<a href='admin.php'>".$translation["Go to admin panel"]."</a>";
							echo "<hr>";
						}
						if ($role == ('admin'||'mod')) {
							echo "<a href='manage_posts.php'>".$translation["Manage posts"]."</a>";
							echo "<hr>";
						}
						echo "<a href='logout.php'>".$translation["Logout"]."</a></p>";
					}
				?>
			</div>
		</div>		
	<div class="col-md-12 well deux">
		<div class="">
			<?php
				echo "<h4>".$translation["Latest posts"]."</h4>";
				$x = 0;
				if (count($posts)>=$config["posts_qty"]) {
					foreach ($posts as $a) {
						if ($x<$config["posts_qty"]) {
							$title2 = preg_replace("/\s/", "+", $a["title"]);
							echo "<a href=\"index.php?title=".$title2."&id=".$a["hash"]."\">".$a["title"]."</a>";
							echo "<br>";
							$x++;
						}
					}
				}
				else {
					foreach ($posts as $a) {
						$title2 = preg_replace("/\s/", "+", $a["title"]);
						echo "<a href=\"index.php?title=".$title2."&id=".$a["hash"]."\">".$a["title"]."</a>";
						echo "<br>";
						$x++;
					}
				}
			?>
		</div>
	</div>
</div>