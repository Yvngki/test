<?php
include "inc/dbh.php";

$id = $_GET['id'];
$userid = $_GET['userid'];

$q = mysqli_query($conn,"INSERT INTO group_members (group_id,user_id) VALUES ('$id','$userid')");
if(!$q){
header('location:home.php?q=groupChat&id='.$id.'&join=danger');
}

    header('location:home.php?q=groupChat&id='.$id.'&join=success');
// echo $id;
?>
