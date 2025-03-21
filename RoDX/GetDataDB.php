<?php

$user = 'root';
$password = '';
$database = 'test';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if (!$mysqli){
	echo "Connection Unsuccessful!!!";
}

?>

