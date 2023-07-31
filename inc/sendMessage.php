<?php
include "dbh.php";
$userid = $_GET['userId'];
$groupid = $_GET['groupId'];

$msg = htmlspecialchars($_POST['message']) ;
echo $msg;

$login = mysqli_query($conn, "INSERT INTO messages (sender_id,group_id,message) VALUES ('$userid','$groupid','$msg') ");
if(!$login){
    die();
}

header('location:../home.php?q=groupChat&msg=success&id='.$groupid.'');

?>