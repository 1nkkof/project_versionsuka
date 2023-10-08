<?php
session_start();

if(empty($_POST["name"])){
    die("name is required");
}

if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
}
if( strlen($_POST["password"])<8){
    die("password need to be 8 char long");
}

if(!preg_match("/[a-z]/i",$_POST["password"])){
    die("password must contain at least one letter");
}
if(!preg_match("/[0-9]/",$_POST["password"])){
    die("password must contain at least one number");
}
if($_POST["password"]!==$_POST["password_confirmation"]){
    $_SESSION["message"]="password must match";
    header("Location:signUp.php");
}

if($_POST["status"]===""){
    $defaultStatus="unban";
}
$password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);

$connect= require __DIR__."/connect.php";

$sql="INSERT INTO users ( name, email, password,  status) VALUES (?,?,?,?)";

$stmt=$connect->stmt_init();


if(!$stmt->prepare($sql)){
    die("SQL error :" .$connect->error);
}

$stmt->bind_param("ssss",$_POST["name"],$_POST["email"],$password_hash, $defaultStatus);


if($stmt->execute()){
    header("Location:../index.php");
    exit;
} else{
    if($connect->errno==1062){
        die("email already taken");
    }else {
        die($connect->error . " " . $connect->errno);

    }
    
}