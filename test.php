<?php

include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$admin = $row['Admin'];

if(!$admin) {
    header("Location: interface.php");
}

$servers['ip'] = "";
$servers['sshport'] = "22";
$servers['user'] = "root";
$servers['pw'] = "";

$command = "uname -a";

$connection = ssh2_connect($servers['ip'], $servers['sshport']);
ssh2_auth_password($connection, $servers['user'], $servers['pw']);

// Run a command that will probably write to stderr (unless you have a folder named /hom)
// $stream = ssh2_exec($connection, "screen -S CloudNet -X quit");
$shell = ssh2_shell($connection, 'xterm');
fwrite($shell, 'cd /home/PixelCave');
fwrite($shell, 'ls -la');
$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

// Enable blocking for both streams
stream_set_blocking($errorStream, true);
stream_set_blocking($stream, true);

// Whichever of the two below commands is listed first will receive its appropriate output.  The second command receives nothing
echo "Output: " . stream_get_contents($stream);
echo "Error: " . stream_get_contents($errorStream);

// Close the streams       
fclose($errorStream);
fclose($stream);

?>