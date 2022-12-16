<?php

include '../config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../interface.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = mySha256($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../interface.php");
	} else {
		echo "<script>alert('Email oder Passwort ist Falsch.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="icon" href="../img/pixel.png">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">

	<title>Login PixelCaveEU</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Passwort" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Hast du kein Account? <a href="register.php">Registriere dich hier</a>.</p>
		</form>
	</div>
</body>
</html>
