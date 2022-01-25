<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "onlinebanking";
// Create database connection
$con = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
else{
    echo "connection successful!!!";
}
?>
