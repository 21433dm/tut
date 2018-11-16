<?php /*home.php*/ require("templates/header.php"); ?>

	<div class="center">
		<input type="text" name="search" placeholder="Search..." onkeyup="search(this.value)" required />
		<input type="image" value="Search" src="images/find.png" name="searchButton" />
	</div>

<?php require("templates/footer.php") ?>