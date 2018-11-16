<?php /*search.php*/
	$search = htmlentities($_GET['search']);

	$con = mysqli_connect("localhost","root","","hecc");
	$userGet = mysqli_query($con,"SELECT username FROM logins WHERE username LIKE '$search%'");

	$searchResult = "";
	while($result = mysqli_fetch_assoc($userGet)) {
		$searchResult .= $result['username']."\\";
	}

	echo $searchResult;

?>