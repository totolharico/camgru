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
				echo '<a id="logout">logout</a>';
				echo '<a id="user">' . htmlspecialchars($_SESSION['user_logged']) . "</a>";
				}
			?>
		<h1>CAMAGRU</h1>
	</div>
	<?php require($page) ?>
</body>
</html>