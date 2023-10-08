<?php
// require_once 'connect.php';

// $name = $_POST['full_name'];
// $password = $_POST['password'];

$db = new PDO(
    'mysql:host=localhost;dbname=registerUser',
    'root',
    ''
);

$info = [];
if ($query = $db->query("SELECT * FROM `Genre`")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/guestPage.css">
    <title>Жанры</title>
</head>

<body>
    <div class="wrapper">
    <div class="container">
        <div class="title">
            <p class="title-text">Жанры:</p>
        </div>
        <div class="content">
            <div class="tabs">
                <nav class="tabs__items">
                    <a href="#tab_01" class="tabs__item"><span>Драма</span></a>
                    <a href="#tab_02" class="tabs__item"><span>Фантастика</span></a>
                    <a href="#tab_03" class="tabs__item"><span>Детектив</span></a>
                </nav>
                <div class="tabs__body">
                    <div class="tabs__block" id="tab_01">
                    <div class="book">
                        
                            <div class="book-one">
                                <a href=""><img class="book-one__img" src="/images/little-women.jpg"></a>
                                <p class="book-one__price">500 ₽</p>
                                <?php foreach ($info as $data) : ?>
                                <a class="book-one__main-text"><?= $data['nameBook']; ?></a>
                                <a class="book-one__text"><?= $data['nameAuthor']; ?></a>
                                <?php endforeach; ?>
                                <img src="/images/star.svg" alt="">
                                <button type="submit">купить</button>
                            </div>
                    
                    </div>
                    </div>
                    <div class="tabs__block" id="tab_02">
                    Вторая вкладка. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Eaque quod fugiat quaerat omnis ducimus eum placeat suscipit voluptate, 
                        necessitatibus, voluptates iste dignissimos, id minus tempore distinctio
                         sequi! Itaque, maxime reiciendis?
                        Eaque quod fugiat quaerat omnis ducimus eum placeat suscipit voluptate, 
                        necessitatibus, voluptates iste dignissimos, id minus tempore distinctio
                         sequi! Itaque, maxime reiciendis?
                    </div>
                    <div class="tabs__block" id="tab_03">
                    Третья вкладка. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Eaque quod fugiat quaerat omnis ducimus eum placeat suscipit voluptate, 
                        necessitatibus, voluptates iste dignissimos, id minus tempore distinctio
                         sequi! Itaque, maxime reiciendis?
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
        require __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>