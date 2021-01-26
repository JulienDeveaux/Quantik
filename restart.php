<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
	<title>TestQuantik</title>
</head>
<body>
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	session_destroy();
	?>
	<meta http-equiv="refresh" content="0;URL=quantik.php" />
</body>
</html>