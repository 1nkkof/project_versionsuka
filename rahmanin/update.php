<?php
  require_once './vendor/connect.php';

  $user_id = $_GET['id'];

  $users = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$user_id'");
  $users = mysqli_fetch_assoc($users);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>обновление</title>
</head>
<body>


 <h3>Обновление пользователя</h3>
  <form action = './info.php' method='post'>
  <p>
    бан
  </p>
    <input type="hidden" name="id" value="<?= $users['id'] ?>">
    <input type='text' name='status' required />
    <button type="submit">Сохранить</button>
</form> 

</body>
</html>