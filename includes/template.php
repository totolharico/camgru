<!DOCTYPE HTML>
<html>
<head>
	<title>Camagru</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $style ?>">
	<?php echo (isset($js) ? "<script type='text/javascript' src='$js'></script>" : '') ?>
</head>
<body>
	<div id='header'>
		<?php if (isset($_SESSION['user_logged'])){
				echo "
				<div class='menu'>
					<p>" . htmlspecialchars($_SESSION['user_logged']) . "</p>
					<div class='sousmenu'>
						<div class='links'><a href='' id='logout'>modify account</a></div>
						<div class='links'><a href='' id='logout'>modify account</a></div>
						<div class='links'><a href='' id='logout'>modify account</a></div>
					</div>
				</div>";
				}
			?>
		<h1>CAMAGRU</h1>
		<?php if (isset($_SESSION['user_logged'])){
				echo '<a href="http://localhost:8080/camagru/logout.php" id="logout">logout</a>';
				}
			?>
	</div>
	<?php require($page) ?>
</body>
</html>