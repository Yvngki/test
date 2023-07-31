<?php
session_start();
include "dbh.php";

$username = htmlspecialchars($_POST['Username']);
$password = sha1($_POST['password']);

$login = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if(!$login){
    die();
}
$q = mysqli_fetch_array($login);
// var_dump($q);
if($q['role'] == 'admin'){
$_SESSION['username'] = $username;
echo 'Admin';
header('location:../admin.php?q=home&login=success');
}else{
    $_SESSION['username'] = $username;
header('location:../home.php?q=home&login=success');
echo 'User';
}


?>