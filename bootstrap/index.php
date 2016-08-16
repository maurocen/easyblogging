<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>mauro</title>

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
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left title" href="index.php"><h2>mauro</h2></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse sr-only" id="bs-example-navbar-collapse-1">
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php 
                	require_once("Spyc.php"); 
                	$installed = true;
                	$posts = Spyc::YAMLload("posts.yaml");
                	$posts = array_reverse($posts);
                	$config = Spyc::YAMLload("config.yaml");
					//if ($installed) {
					    if (isset($_GET["author"])) {
					        echo "<h1>Showing posts by <i>".$_GET["author"]."</i><br><a href='index.php'>Go back</a>.</h1>";
					    }
						foreach ($posts as $a) {
						    if (!isset($_GET["author"])) {
						        if ($config["title"] || $config["author"]) {
    						        if($config["title"]) echo "<h2>".$a["title"]."</h2>";
                                    if($config["author"]) echo "by <i><a href='index.php?author=".$a["author"]."'>".$a["author"]."</a></i>";
                                    echo "<hr>";
						        }
                                if($config["date"] || $config["time"]) {
                                    echo "<p><span class=\"glyphicon glyphicon-time\"></span> Posted ";
                                    if ($config["date"]) echo "on ".$a['date']." ";
                                    if ($config["time"]) echo "at ".$a['time']."</p>";
                                    echo "<hr>";
                                }
                                echo $a['content'];
                                echo "<hr>";
						    }
						    else {
						        if ($a["author"] == $_GET["author"]) {
						            if($config["title"]) echo "<h2>".$a["title"]."</h2>"; 
                                    if($config["author"]) echo "by <i><a href='index.php?author=".$a["author"]."'>".$a["author"]."</a></i><hr>";
                                    if($config["date"] || $config["time"]) {
                                        echo "<p><span class=\"glyphicon glyphicon-time\"></span> Posted ";
                                        if ($config["date"]) echo "on ".$a['date']." ";
                                        if ($config["time"]) echo "at ".$a['time']."</p>";
                                        echo "<hr>";
                                    }
                                    echo $a['content'];
                                    echo "<hr>";
						        }
						    }
						}
				//	}
				?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                
                <div class="well">
                    <?php
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
                                  <hr>
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
                    <!-- /.input-group -->
                </div>

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
