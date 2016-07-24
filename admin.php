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
	<div class="contenido">
		<form action="replacer.php" method="post" style="width:50%;margin:0 auto;">
			<p>Fecha: <input type="text" name="fecha" autocomplete="false" required="true" /></p>
			<p>Hora: <input type="text" name="hora" autocomplete="false" required="true"/></p>
			<p>Texto: <textarea rows="8" cols="70" name="texto"></textarea></p>
			<p>Contrase&ntilde;a: <input type="password" name="passwrd" autocomplete="false" required="true"/></p>
			<p><input type="submit" value="Publicar"></p>
		</form>
	</div>
</body>
</html>