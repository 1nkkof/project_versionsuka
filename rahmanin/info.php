<?php

include_once("./vendor/connect.php"); 

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE `users` SET `status` = '$status' WHERE `users`.`id` = '$id'";
$data = mysqli_query($connect, $query);

header('Location: ./adminPage.php');
?>