
<?php
session_start();
include "dbh.php";

$username = $_POST['Username'];
$password = sha1($_POST['password']);

$login = mysqli_query($conn, "INSERT INTO users (username,password,role) VALUES ('$username','$password','user') ");
if(!$login){
    die();
}
$_SESSION['username'] = $username;
header('location:../home.php?q=home&registeration=success');
?>