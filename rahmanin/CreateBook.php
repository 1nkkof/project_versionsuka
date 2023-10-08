<?php
    
    require_once './vendor/connect.php';
    $name = $_POST['name'];
 $author = $_POST['author'];
 $genre = $_POST['genre'];
 $description = $_POST['description'];
 

 mysqli_query($connect, "INSERT INTO `book` (`name`, `author`, `genre`, `description`) VALUES ('$name', '$author', '$genre', '$description')");
 header('Location: ./adminPage.php');
 ?>