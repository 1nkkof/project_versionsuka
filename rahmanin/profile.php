<?php 
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/vendor/connect.php";
    $sql = "SELECT * FROM users
               WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    if (!$result) {
        die("Query failed: " . $mysqli->error);
    }
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookTree</title>
</head>
<body>
<div class="nav-searchbar">
                <input type="search" id="searchbar" placeholder="Search your favourite book">
            </div>
            <?php if (isset($user)) : ?>
                <div class="nav-authorized">
                    <p class="nav-profile-name"><?= htmlspecialchars($user["name"]) ?></p>
                    <?php else : ?>
                <div class="nav-unauthorized">
                    <a href="/vendor/signup.php" class="nav-login">Sign up</a> or <a href="/vendor/sigin.php" class="nav-login">Log in</a>
                </div>
            <?php endif; ?>
<div class="searchbar-list">
<div class="booklist-wrapper">
</div>
</div>
<script src="./scripts/main.js"></script>
<style>
.searchbar-list{

display: none;
}
.searchbar-list.active{
display: flex;
position: relative;
left: 23%;
}
.booklist-wrapper{
position: absolute;

}
.books-list{
display: flex;
flex-direction: row;
background: white;
box-shadow: 3px 3px 3px 3px rgba(0,0,0,.1);
width: 400px;
gap: 0.5em;
}
</style>
   
</body>
</html>
