<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  	<script>tinymce.init({
		selector: 'textarea',
		theme: 'modern',
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | code',
		image_advtab: true,
		templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		],
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		]
		});
	</script>

    <title>Admin panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
	<nav class="navbar navbar-fixed-top navbar-inverse">
	    <div class="container-fluid">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <a class="navbar-brand" href="index.php">ADMIN</a>
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	        </div>
		            
	            <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="hidden-lg">
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                    <?php
	                        session_start();
	                        if (!isset($_SESSION['name'])) {
	                            echo "<h4>Login</h4>";
	                            echo '<div class="input-group">
	                                <form action="login.php" method="POST">
	                                <div class="form-group">
	                                <label for="u_name">Username</label>
	                                <input type="text" class="form-control" name="u_name" placeholder="Username">
	                                </div>
	                                <div class="form-group">
	                                <label for="u_pass">Password</label>
	                                <input type="password" class="form-control" name="u_pass" placeholder="Password">
	                                </div>
	                                <p></p><button type="submit" class="btn btn-default">Submit</button></p>
	                                </form>
	                                </div>';
	                        }
	                        else {
	                            echo "<p><h4>Hello, <i>".$_SESSION['name']."</i>.</h4><br>";
	                            echo "<a href='admin.php'>Go to admin panel</a><br>";
	                            echo "<a href='logout.php'>Logout</a></p>";
	                        }
	                    ?>
	                </div>
	            </div><!-- /.navbar-collapse -->
	        </div>
	    </div><!-- /.container-fluid -->
	</nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
				<?php
					if (isset($_SESSION['name'])) {
						
						echo "<form action=\"logout.php\" method=\"POST\" style=\"border:0px; padding:0px;\">
							<p align=\"center\"><input type=\"submit\" value=\"Logout\"></p>
						</form>";
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#addpost"><h3>Add a new post</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="addpost" class="panel-collapse collapse">';
						echo "<div class=\"panel-body\">
						<form action=\"resources/add_post.php\" method=\"POST\">
							<p>Title: <input type=\"text\" name=\"title\" autocomplete=\"false\" required=\"true\"/></p>
							<p>Date: <input type=\"date\" name=\"date\" autocomplete=\"false\" required=\"true\"/></p>
							<p>Time: <input type=\"time\" name=\"time\" autocomplete=\"false\" required=\"true\"/></p>
							<p>Content: <textarea rows=\"8\" cols=\"70\" name=\"content\" autocomplete=\"false\"></textarea></p>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"Add post\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#adduser"><h3>Add a new user</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="adduser" class="panel-collapse';
						if (isset($_GET["error"]) && $_GET["error"]==1) echo ' collapse in">';
						else echo ' collapse">';
						echo "<div class=\"panel-body\">";
						if (isset($_GET["error"]) && $_GET["error"]==1) echo "<p style=\"color:#f00\"><b>Passwords don't match.</b></p>";
						echo "
						<form action=\"resources/add_user.php\" method=\"POST\">
							<p>New user: <input type=\"text\" name=\"u_New\" autocomplete=\"false\" required=\"true\" /></p>
							<p>New pass: <input type=\"password\" name=\"p_New\" autocomplete=\"false\" required=\"true\"/></p>
							<p>Repeat pass: <input type=\"password\" name=\"p_New2\" autocomplete=\"false\" required=\"true\"/></p>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"Add user\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#editconfig"><h3>Edit blog configuration</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="editconfig" class="panel-collapse collapse">';
						echo "<div class=\"panel-body\">
						<form action=\"resources/edit_config.php\" method=\"POST\">
							<p>Show post:</p>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Title\" checked>Title</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Date\" checked>Date</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Time\" checked>Time</label>
							</div>
							<div class=\"checkbox\">
								<label><input type=\"checkbox\" value=\"\" name=\"p_Author\" checked>Author</label>
							</div>
							<div class=\"radio\">
								<label><select name=\"p_Qty\">
									<option value=\"3\">3</option>
									<option value=\"5\">5</option>
									<option value=\"10\">10</option>
								</select> Last post to be shown in sidebar</label>
							</div>
							<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"Change configuration\"></p>
						</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						// Delete post
						/*echo '<div class="panel-group">';
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">';
						echo '<h4 class="panel-title">';
						echo '<a data-toggle="collapse" href="#deletepost"><h3>Delete post</h3></a>';
						echo '</h4>';
						echo '</div>';
						echo '<div id="deletepost" class="panel-collapse collapse">';
						require_once("Spyc.php");
						echo "<div class=\"panel-body\">
							<form action=\"resources/remove_post.php\" method=\"POST\">
							<p>Choose post:</p>";
						$posts = Spyc::YAMLload("posts.yaml");
						$posts = array_reverse($posts);
						foreach($posts as $a) {
							$as = $a["title"];
							echo "<div class=\"checkbox\">
								<label><input type=\"radio\" value=\"$as\" name=\"delete\"> ".$as."</label>
							</div>";
						}
						echo "<input type=\"hidden\" name=\"from_form\" value=\"true\">
							<p><input type=\"submit\" value=\"Change configuration\"></p>
							</form></div>";
						echo '</div>';
						echo '</div>';
						echo '</div>';
						*/
					}
					else {
						echo "<div class=\"container well\"><form action=\"login.php\" method=\"post\">\n<p>User: <input type=\"text\" name=\"u_name\"> Password: <input type=\"password\" name=\"u_pass\"> <input type=\"submit\" value=\"Login\"></p>	</form></div>";
					}
				?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
