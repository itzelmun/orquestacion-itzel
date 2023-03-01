<?php
$servername = "148.213.1.131:3306";
$database = "mydb";
$username = "root";
$password = "mi-contraseña-segura";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>
