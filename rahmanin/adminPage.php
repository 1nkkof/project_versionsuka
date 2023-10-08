<?php

require_once './vendor/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Админка</title>
</head>
<body> 

<form id="addBook" method="post">
   <label for="name">Название Книги</label>
   <input type="text" name= "name" id="name">
   <label> Добавить обложку </label>
    <input type=file name="book_image" id="book_image"> 
   <label for="author" >Автор </label> 
   <select name = "author" id="author">
   </select>
   <label for="genre"  >Жанр</label> 
  <select name = "genre" id="genre">
  </select>
   <label for="description"> Описание</label>
  <input type="text"  name = "description" id="description">
  <input type="submit" class="addBook_btn" placeholder="addBook">
</form>   
<form id="genres" method="post">
<label class="labeladd">Добавить Жанр</label>
     <input type="text" name="addGenre" id="addGenre">
     <input type="submit"  class="submit-genre" placeholder="добавить">
</form>
<form id="authors" method="post">
<label class="labeladd">Добавить aвтора</label>
     <input type="text" name="addauthor" id="addauthor">
     <input type="submit"  class="submit-author" placeholder="добавить">
</form>
 <script src="./scripts/fetching.js"></script>
<style>
  th, td {
    padding: 10px;
  }

  th {
    background: #606060;
    color: #fff;
  }

  td {
    background: #b5b5b5;
  }
</style>
    <table>
        <tr>
            <th>айди</th>
            <th>почта</th>
            <th>имя</th>
            <th>пароль</th>
            <th>статус</th>
            <th>управление</th>
        </tr>

        <?php
            $sql = "SELECT * FROM `users`";

            $users = mysqli_query($connect, "SELECT * FROM `users`");
            $users = mysqli_fetch_all($users);
            
            foreach ($users as $users) {
            ?>
            <tr>
                <td><?= $users[0] ?></td>
                <td><?= $users[1] ?></td>
                <td><?= $users[3] ?></td>
                <td><?= $users[2] ?></td>
                <td><?= $users[4] ?></td>
                <td><a href="update.php?id=<?= $users[0] ?>">Обновить</a></td>
            </tr>




                
            <?php
        }
        ?>
    </table>

    <!-- <P>Вы в админке, здравствуйте моя госпожа</P> -->
</body>
</html>
