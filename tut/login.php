<?php /*login.php*/ require("templates/header.php"); ?>

	<?php
		if (isset($_POST['submit'])) {
			$user = htmlentities($_POST['username']);
			$pass = htmlentities($_POST['password']);
			$con = mysqli_connect("localhost","root","","hecc");
			$q = "SELECT * FROM logins WHERE username = '$user'";
			$query = mysqli_query($con,$q);
			$result = mysqli_fetch_assoc($query);
			if ($result == NULL) {
				echo "Incorrect username or password";
			} else {
				// Check password
				if ($result['password'] == $pass) {
					// Log in user
					$_SESSION['logged_in'] = true;
					$_SESSION['username'] = $user;
					header("Location:home.php");
				} else {
					echo "Incorrect username or password";
				}
			}
		}
	?>


	<?php
		if (isset($_POST['createAcc'])) {
			$user = htmlentities($_POST['username']);
			$email = htmlentities($_POST['email']);
			$conEmail = htmlentities($_POST['conEmail']);
			$pass = htmlentities($_POST['password']);
			$conPass = htmlentities($_POST['conPassword']);
			if ($email == $conEmail) {
				if ($pass == $conPass) {
					$con = mysqli_connect("localhost","root","","hecc");
					$results = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM logins WHERE username = '$user'"));
					if ($results == NULL) {
						$emailCheck = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM logins WHERE email = '$email'"));
						if ($emailCheck == NULL) {
							// Create user
							$q = mysqli_query($con,"INSERT INTO logins (username,password,email) VALUES ('$user','$pass','$email')");
							echo "Account created, you may now log in";
						} else {
							echo "Email is already in use";
						}
					} else {
						echo "Username already taken, please choose another";
					}
				} else {
					echo "Please make sure passwords match";
				}
			} else {
				echo "Please make sure emails match";
			}
		}
	?>
	<section id="mainContent">
		<h3>Login</h3>
		<form action="" method="post">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input type="submit" name="submit" value="Login" />
		</form>

		<h3>Register</h3>
		<form action="" method="post">
			<input type="text" name="username" placeholder="Username" required />
			<input type="email" name="email" placeholder="Email" required />	
			<input type="email" name="conEmail" placeholder="Confirm Email" required />	
			<input type="password" name="password" placeholder="Password" required />
			<input type="password" name="conPassword" placeholder="Confirm Password" required />
			<input type="submit" name="createAcc" value="Create Account" />
		</form>
	</section>

<?php require("templates/footer.php") ?>