<?php

include "dbh.php";
$name = $_POST['name'];

$newGroup = mysqli_query($conn, "INSERT INTO groups (Name) VALUES ('$name') ");
if(!$newGroup){
    die();
}
header('location:../home.php?q=groups&create=success');