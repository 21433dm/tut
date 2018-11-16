<?php /*header.php*/ session_start(); ?>

<!-- If user hasn't visited index.php take them there -->
<?php if (!isset($_SESSION['index_visited'])) {header("Location: index.php");} ?>
<html>
	<head>
	<!-- JQuery link -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<!-- Import main font -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Exo+2:400,700,900' rel='stylesheet' type='text/css'>
	<!-- Link CSS file -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Limk JS files -->
	<script src="js/searchResize.js"></script>
	<script src="js/search.js"></script>
	</head>
	<body>
		<header>
		<h1>Higher Computing @ Chesterfield College</h1>
		</header>
		<nav>
			<ul>
				<?php if ($_SESSION['logged_in'] == true) { ?>
				<a href="home.php"><li>Home</li></a>
				<a href="logout.php"><li>Logout</li></a>
				<a href="#"><li>Friends</li></a>
				<a href="#"><li>Settings</li></a>
				<?php } else { ?>
				<a href="home.php"><li>Home</li></a>
				<a href="login.php"><li>Login</li></a>
				<?php } ?>
			</ul>
		</nav>