  <?php
  function getBooks(mysqli $db)
  {
    $query = "SELECT books.*,author.name AS author,genre.genre_title AS genre
     From books
     LEFT JOIN author_link AS book_author ON books.id=book_author.book_id
     LEFT JOIN author ON book_author.author_id=author.id
     LEFT JOIN genre_link AS genre_Book ON books.id=genre_Book.book_id
     LEFT JOIN genre on genre_Book.genre_id=genre.id
      ";

    $posts = mysqli_query($db, $query);

    $postsList = [];

    while ($post = mysqli_fetch_assoc($posts)) {
      $postsList[] = $post;
    }

    echo json_encode($postsList);
  }

  function getBook($db, $id)
  {
    $query = "SELECT books.*,author.name AS author,genre.genre_title AS genre
    From books
    LEFT JOIN author_link AS book_author ON books.id=book_author.book_id
    LEFT JOIN author ON book_author.author_id=author.id
    LEFT JOIN genre_link AS genre_Book ON books.id=genre_Book.book_id
    LEFT JOIN genre on genre_Book.genre_id=genre.id
      WHERE books.id=$id";
    $post = mysqli_query($db, $query);
    if (mysqli_num_rows($post) === 0) {
      http_response_code(404);
      $res = [
        "status" => false,
        "message" => "Post not found"
      ];
      echo json_encode($res);
    } else {
      http_response_code(200);

      $post = mysqli_fetch_assoc($post);
      echo json_encode($post);
    }
  }
  function addBook($db, $data, $file)
  {
    if (isset($data["name"], $data["genre"], $data["description"], $data["author"], $file["book_image"])) {
      $name = mysqli_real_escape_string($db, $data["name"]);
      $description = mysqli_real_escape_string($db, $data["description"]);

      $genre_titles = array_map(function ($title) use ($db) {
        return mysqli_real_escape_string($db, $title);
      }, [$data["genre"]]);

      mysqli_begin_transaction($db);
      mysqli_autocommit($db, false);

      $image = 'bookImage/' . time() . $file["book_image"]["name"];
      move_uploaded_file($file["book_image"]["tmp_name"],'../../'.$image);
      $sql = "INSERT INTO `books` ( `books_title`, `description`, `image`) VALUES ( '$name','$description', '$image')";
      $result = mysqli_query($db, $sql);

      if (!$result) {
        mysqli_rollback($db);
        $res = [
          "status" => false,
          "message" => "Error inserting book data: " . mysqli_error($db)
        ];
        echo json_encode($res);
        return;
      }
      $book_id = mysqli_insert_id($db);

      foreach ($genre_titles as $genre_title) {
        $genre_id = getGenreId($db, $genre_title);

        if ($genre_id !== null) {
          $sql2 = "INSERT INTO `genre_link` (`genre_id`, `book_id`) VALUES ('$genre_id', '$book_id')";
          $result = mysqli_query($db, $sql2);

          if (!$result) {
            mysqli_rollback($db);
            $res = [
              "status" => false,
              "message" => "Error inserting genre data: " . mysqli_error($db)
            ];
            echo json_encode($res);
            return;
          }
        }
      }

      $author_names=array_map(function($title)use ($db){
        return mysqli_real_escape_string($db, $title);
      },[$data["author"]]);

      foreach($author_names as $author_name){
        $author_id=getAuthorId($db, $author_name);
        if($author_id!==null){
          $sql3="INSERT INTO `author_link` (`book_id`, `author_id`) VALUES ('$book_id', '$author_id')";
          $result = mysqli_query($db, $sql3);

          if (!$result) {
            mysqli_rollback($db);
            $res = [
              "status" => false,
              "message" => "Error inserting author data: " . mysqli_error($db)
            ];
            echo json_encode($res);
            return;
          }
        }
      }
      mysqli_commit($db);

      $res = [
          "status" => true,
          "book_id" => $book_id
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
  function getGenreId($db, $genre_title)
  {
    $genre_title = mysqli_real_escape_string($db, $genre_title);
    $genre_query = "SELECT `id` FROM `genre` WHERE `genre_title` = '$genre_title'";
    $genre_result = mysqli_query($db, $genre_query);
    if ($genre_result && $genre_row = mysqli_fetch_assoc($genre_result)) {
      return $genre_row['id'];
    }
    return null;
  }

  function getAuthorId($db, $author_name)
  {
    $author_name = mysqli_real_escape_string($db, $author_name);
    $author_query = "SELECT `id` FROM `author` WHERE `name` = '$author_name'";
    $author_result = mysqli_query($db, $author_query);
    if ($author_result && $author_row = mysqli_fetch_assoc($author_result)) {
      return $author_row['id'];
    }
    return null;
  }

