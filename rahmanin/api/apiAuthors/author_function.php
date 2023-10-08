<?php
  function getAuthors(mysqli $db){
    $query="SELECT * FROM `author`";
    $posts = mysqli_query($db, $query);

    $postsList = [];

    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }

    echo json_encode($postsList);

  }
  function getAuthor($db,$id)
  {
      $query = "SELECT * FROM `author` WHERE author.id=$id  ";
      $posts = mysqli_query($db, $query);

      if (mysqli_num_rows($posts) === '') {
          http_response_code(404);
          $res = [
              "status" => false,
              "message" => "Post not found"
          ];
          echo json_encode($res);

      } else {
          $postsList = [];

          while ($post = mysqli_fetch_assoc($posts)) {
              $postsList[] = $post;
          }

          echo json_encode($postsList);
      }
  }
  function addAuthor($db,$data){
      if(isset($data["addauthor"])){
          $addauthor=mysqli_real_escape_string($db, $data["addauthor"]);
          $query="INSERT INTO `author` (`name`) VALUES ('$addauthor')";
          mysqli_query($db,$query);
          $res = [
              "status" => true,
              "addauthor" => $addauthor
          ];
          echo json_encode($res);
      } else {
          $res = [
              "status" => false,
              "message" => "Invalid data"
          ];
          echo json_encode($res);
      }

  }