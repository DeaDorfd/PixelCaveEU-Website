<?php

include '../config.php';

error_reporting(0);

session_start();

/**if (isset($_SESSION['username'])) {
    header("Location: index.html");
}**/

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = mySha256($_POST['password']);
	$cpassword = mySha256($_POST['cpassword']);
	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, money, Admin)
					VALUES ('$username', '$email', '$password', '0', '0')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Du hast dich erfolgreich Registiert')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Etwas ist schiefgelaufen')</script>";
			}
		} else {
			echo "<script>alert('Diese Email gibt es bereits')</script>";
		}

	} else {
		echo "<script>alert('Passwörter sind nicht gleich')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style1.css">

	<title>Registrieren PixelCaveEU</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Benutzername" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Passwort" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Passwort wiederholen" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Registrieren</button>
			</div>
			<p class="login-register-text">Hast du einen Account? <a href="login.php">Logge dich hier ein</a>.</p>
		</form>
	</div>
</body>
</html>
