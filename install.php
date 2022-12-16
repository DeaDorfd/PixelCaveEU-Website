<?php

include 'config.php';

    $sql = "CREATE TABLE IF NOT EXISTS users(ID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, username VARCHAR(255), email VARCHAR(255), password VARCHAR(255), money INT(255), UUID VARCHAR(255), Name VARCHAR(255), Admin BOOLEAN)";
	$result = mysqli_query($conn, $sql);
    if($result) {
        echo "<h1>Table wurde erfolgreich erstellt</h1>";
    } else {
        echo "<h1> Etwas ist schief gelaufen</h1>";
    }


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="icon" href="img/pixel.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
    <title>Installer</title>
</head>
<body>
    
</body>
</html>