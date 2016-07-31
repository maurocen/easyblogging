<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">	
	<link rel="stylesheet" type="text/css" href="blog.css">
	<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
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
</head>
<body>
	<div class="content">
		<?php
			session_start();
			echo $_SESSION['name'];
			if (isset($_SESSION['name'])) {
				echo "
				<form action=\"logout.php\" method=\"POST\" class='logbox'>
					<p align=\"center\"><input type=\"submit\" value=\"Logout\"></p>
				</form>
				<form action=\"add_post.php\" method=\"POST\">
					<h1>Add post</h1>
					<hr>
					<p>Date: <input type=\"date\" name=\"date\" autocomplete=\"false\" required=\"true\"/></p>
					<p>Time: <input type=\"time\" name=\"time\" autocomplete=\"false\" required=\"true\"/></p>
					<p>Content: <textarea rows=\"8\" cols=\"70\" name=\"content\" autocomplete=\"false\"></textarea></p>
					
					<p><input type=\"submit\" value=\"Add post\"></p>
				</form>
				<form action=\"add_user.php\" method=\"POST\">
					<h1>Add a new user</h1>
					<hr>
					<p>New user: <input type=\"text\" name=\"u_New\" autocomplete=\"false\" required=\"true\" /></p>
					<p>New pass: <input type=\"password\" name=\"p_New\" autocomplete=\"false\" required=\"true\"/></p>
					<p><input type=\"submit\" value=\"Add user\"></p>
				</form>";
			} 
			else {
				echo "<form action=\"login.php\" method=\"post\">\n<p>User: <input type=\"text\" name=\"u_name\"> Password: <input type=\"password\" name=\"u_pass\"> <input type=\"submit\" value=\"Login\"></p>	</form>";
			}
		?>
	</div>
</body>
</html>