<! DOCTYPE html>
<html>
	<head >
		<meta charset = "utf-8" />
		<title> <?php echo $content; ?> - CodeIgniter 3 Tutorial</title >

	</head>
	<body>
		<div id ="global">
			<div id="entete">
				<h1> CodeIgniter 3 Tutorial </h1>
			</div> <!-- #entete -->
			<div id ="contenu">
				<?php $this->load->view($content);?>
			</div> <!-- #contenu -->
			<div id="pied">
				<strong>&copy; 2016</strong>
			</div> <!-- #pied -->
		</div> <!-- #global -->
	</body>
</html>

