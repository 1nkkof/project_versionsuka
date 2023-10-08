<?php
  function getGenres(mysqli $db){
    $query="SELECT * FROM `genre`";
    $posts = mysqli_query($db, $query);

    $postsList = [];

    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }

    echo json_encode($postsList);

  }
  function getGenre($db,$title)
  {
      $query = "SELECT * FROM `genre` WHERE genre.genre_title='$title'  ";
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
  function addGenres($db,$data){
      if(isset($data["addGenre"])){
          $addGenre=mysqli_real_escape_string($db, $data["addGenre"]);
          $query="INSERT INTO `genre` (`genre_title`) VALUES ('$addGenre')";
          mysqli_query($db,$query);
          $res = [
              "status" => true,
              "addGenre"=>$addGenre
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