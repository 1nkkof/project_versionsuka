<?php
// require_once 'connect.php';

// $name = $_POST['full_name'];
// $password = $_POST['password'];

// $db = new PDO(
//     'mysql:host=localhost;dbname=BookTreeBD',
//     'root',
//     ''
// );

// $info = [];
// if ($query = $db->query("SELECT * FROM `Book`")) {
//     $info = $query->fetchAll(PDO::FETCH_ASSOC);
// } else {
//     print_r($db->errorInfo());
// }

$link = mysqli_connect('localhost', 'root', '', 'BookTreeBD');
$flag = mysqli_query($link, "SELECT * FROM `Recommendations`");
$drama = mysqli_query($link, "SELECT * FROM `Drama`");
$fantastic = mysqli_query($link, "SELECT * FROM `Fantastic`");
$detective = mysqli_query($link, "SELECT * FROM `Detective`");
// $flagTwo = mysqli_query($link, "SELECT * FROM `GenreTwo`");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/guestPage.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <!-- <link rel="stylesheet" href="/assets/css/registrationExit.css"> -->
    <title>BookTree</title>
</head>

<body>
    <div class="wrapper">
        <header class="container">
            <div class="big-container">
                <nav class="menu">
                    <div class="menu-logo">
                            <a href="mainPage.php" class="nav-menu__logo"><img src="images/logo.svg" alt="logo" class="logo-header"></a>
                        </div>
                    <div class="menu-search">
                       
                        <div class="row">
                             
                            <div class="col-lg-12 form-control-group">
                                <button><img src="/images/search.svg" alt="" class="menu-search__img"></button>
                                <input type="text" placeholder="Поиск" id="input-box" autocomplete="off" class="menu-search__nav">
                            </div>
                            
                            <div class="result-box">
                                <!-- <ul class="elastic">

                        <li>да пошло оно всё нахуй</li>
                        <li>text1</li>
                        <li>text2</li>
                        <li>text3</li>
                    </ul> -->
                            </div>
                        </div>
                        <div class="menu-link">
                        <a href="mainPage.php">Главная</a>
                        <a href="#">Каталог</a>
                        <a href="register.php">Регистрация</a>
                        <a href="index.php">Войти</a>
                    </div>
                    </div>
                    
                </nav>
                <div>
                    <div class="container-main">
                        <div class="container-content">
                            <div class="container-main__text">
                                <h1 class="main-tetx">Читайте и оценивайте.</h1>
                                <h1 class="main-tetx">сотни книг.</h1>
                                <h1 class="main-tetx">в одном месте.</h1>
                            </div>
                            <div class="container-main__button">
                                <input type="submit" name="" id="" class="main-button" value="Попробовать бесплатно">
                            </div>
                        </div>
                        <div class="container-main__images">
                            <img src="/images/main-img.png" alt="">
                        </div>

                    </div>


                </div>

            </div>
        </header>
        <div class="line"></div>
        <main>
            <div class="container">
                <div class="book-container">
                    <p class="book-text__paragraf">Высокий рейтинг</p>

                    <div class="colonka">

                        <div class="row-colonka">
                            <?php
                            while ($result = mysqli_fetch_assoc($flag)) {
                            ?>
                                <div class="row-book">
                                    <div class="row-book__info">
                                        <a href=""><img class="book-one__img" src="images/<?php echo $result['img'] ?>.png"></a>
                                        <div class="row-book__info">
                                            <p class="book-one__price">500 ₽</p>
                                            <a href="" class="book-one__main-text"><?php echo $result['nameBook1'] ?></a>
                                            <a href="" class="book-one__text"><?php echo $result['nameAutor1'] ?></a>
                                            <img src="/images/star.svg" alt="Оценка" class="book-one__star">

                                            <!-- <button id="open-modal-btn" class="buy btn" data-path="me-popup2">купить</button>
                                            <button id="open-modal-btn" class="buy btn" data-path="me-popup">купить</button>
                                            <button id="open-modal-btn" class="buy btn" data-path="me-popup">купить</button> -->
                                        </div>
                                    </div>
                                <?php
                            }
                                ?>

                                </div>

                        </div>

                        <div class="modals">


                            <div class="modal-overlay">
                                <button id="close-my-modal-btn"><img class="modal__close-btn" src="/images/close-svgrepo-com.svg" alt=""></button>
                                <div class="modal modal--1" data-target="me-popup">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/little-Women.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Маленькие женщины</p>
                                                <p class="modals-info__text">Луиза Мэй Олкотт</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Драма, Мелодрама</p>
                                                    <p class="article-two article-two-color">Маленькие женщины</p>
                                                    <p class="article-two">2022</p>
                                                    <p class="article-two">Луиза Мэй Олкотт</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                «Маленькие женщины» Луизы Мэй Олкотт – это роман, на котором воспитывалось не одно
                                                поколение читателей по всему миру. Впервые опубликованное в 1868 году в США, и положено в основу шести фильмов,
                                                четырех телесериалов, нескольких опер и спектаклей. История семейства Марч, в котором
                                                подрастают четыре дружные, но непохожие друг на друга сестры, заключает в себе узнаваемые
                                                перипетии юности, взросления, дружбы и любви.
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--2" data-target="me-popup2">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/1984.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">1984</p>
                                                <p class="modals-info__text">Джордж Оруэлл</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Фантастика</p>
                                                    <p class="article-two article-two-color">1984</p>
                                                    <p class="article-two">2021</p>
                                                    <p class="article-two">Джордж Оруэлл</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                «1984» – последняя книга Джорджа Оруэлла, он опубликовал ее в 1949 году, за год до смерти.Действие происходит
                                                в Лондоне, одном из главных городов тоталитарного супергосударства Океания. Пугающе детальное
                                                описание общества, основанного на страхе и угнетении, служит фоном для одной из самых ярких
                                                человеческих историй в мировой литературе. В центре сюжета судьба мелкого партийного функцио
                                                нера-диссидента Уинстона Смита и его опасный роман с коллегой.
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--3" data-target="me-popup3">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/DjecLondon.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Мартин Иден</p>
                                                <p class="modals-info__text">Джек Лондон</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Драма</p>
                                                    <p class="article-two article-two-color">Мартин Иден</p>
                                                    <p class="article-two">2022</p>
                                                    <p class="article-two">Джек Лондон</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                "Мартин Иден" — самый известный роман Джека Лондона, впервые напечатанный в 1908-1909 гг.
                                                Во многом автобиографическая книга о человеке, который "сделал себя сам", выбравшись из самых низов, добился признания. Любовь к девушке из высшего общества побуждает героя заняться самообразованием. Он становится писателем, но все издательства отказывают ему в публикации.
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup4">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/new-world-book.jpg" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">О дивный новый мир</p>
                                                <p class="modals-info__text">Олдос Леонард Хаксли</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Фантастика</p>
                                                    <p class="article-two article-two-color">О дивный новый мир</p>
                                                    <p class="article-two">2023</p>
                                                    <p class="article-two">Олдос Леонард Хаксли</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                Переиздание культовой антиутопии Олдоса Хаксли в новом оформлении.
                                                «О дивный новый мир» — один из самых продаваемых и актуальных романов последнего десятилетия.
                                                Для поклонников антиутопий «Город за рекой» Германа Казака, «Мы» Евгения Замятина и «1984» Джорджа Оруэлла.
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup5">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/DorianGrey.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Портрет Дориана Грея</p>
                                                <p class="modals-info__text">Оскар Уайльд</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Драма</p>
                                                    <p class="article-two article-two-color">Портрет Дориана Грея</p>
                                                    <p class="article-two">2022</p>
                                                    <p class="article-two">Оскар Уайльд</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                "Портрет Дориана Грея" — самое знаменитое произведение Оскара Уайльда. Тонкий эстет и романтик становится безжалостным преступником. Попытка сохранить свою необычайную красоту и молодость оборачивается провалом. Вместо героя стареет его портрет — но это не может продолжаться вечно, и смерть Дориана расставляет все по своим местам.
                                                Погоня за вечной молодостью порой не оборачивается потерей своего истинного лица?
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup6">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/80days.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Вокруг светв за 80 дней</p>
                                                <p class="modals-info__text">Жюль Габриель Верн</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Фантастика</p>
                                                    <p class="article-two article-two-color">Вокруг светв за 80 дней</p>
                                                    <p class="article-two">2023</p>
                                                    <p class="article-two">Жюль Габриель Верн</p>
                                                </div>
                                            </div>
                                            <p class="description-book">

                                                Вместе с неутомимым Филеасом Фоггом и его верным дворецким Паспарту вы совершите кругосветное путешествие за 80 дней! 115 200 минут — именно столько времени есть у них, чтобы покинуть Европу, пересечь океаны, пройти через Азию и Соединённые Штаты и снова вернуться в Англию. Сможет ли этот целеустремлённый джентльмен преодолеть множество неожиданных трудностей и препятствий в своём кругосветном путешествии и выиграть пари?
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup7">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/Agata.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Вечеринка в хеллоуин</p>
                                                <p class="modals-info__text">Агата Кристи</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Детектив</p>
                                                    <p class="article-two article-two-color">Вечеринка в хеллоуин</p>
                                                    <p class="article-two">2022</p>
                                                    <p class="article-two">Агата Кристи</p>
                                                </div>
                                            </div>
                                            <p class="description-book">
                                                Писательница Ариадна Оливер приглашена в дом подруги, где в самом разгаре приготовления к
                                                празднованию Хэллоуина. Одна из гостей —
                                                девочка-подросток, известная тем, что обожает рассказывать завиральные истории о всяких тайнах.
                                                Вот и теперь она поразила общество рассказом о том, что когда-то видела самое настоящее убийство!
                                                Никто не поверил ей. И вдруг в тот же вечер ее нашли... утопленной в ведре с водой и яблоками!. Кому понадобилась смерть девочки?
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup8">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/yilki.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Отель с привидениями</p>
                                                <p class="modals-info__text">Уильям Уилки Коллинз</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Фантастика</p>
                                                    <p class="article-two article-two-color">Отель с привидениями</p>
                                                    <p class="article-two">2022</p>
                                                    <p class="article-two">Уильям Уилки Коллинз</p>
                                                </div>
                                            </div>
                                            <p class="description-book">

                                                Роман «Отель с привидениями» – это мастерское сочетание детектива и истории о привидениях. Действие разворачивается в Венеции – городе темных каналов, пустынных мостов и таинственных смертей. Старинное палаццо превратили в фешенебельный отель, но он продолжает хранить свои мрачные секреты, сводя с ума постояльцев, заставляя их задаваться вопросом, кто они – орудия рока или просто сумасшедшие?
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal--4" data-target="me-popup9">
                                    <div class="modals-box">
                                        <div class="modals-page">
                                            <img src="/images/braun.png" alt="" class="modals-box__img">
                                            <div class="modals-info">
                                                <div class="modals-info__estimation">
                                                    <p class="estimation">(0 оценок)</p>
                                                </div>
                                                <p class="modals-info__main-text">Инферно</p>
                                                <p class="modals-info__text">Дэн Браун</p>
                                                <div class="modals-info__price">
                                                    <p class="money">500 ₽</p>
                                                    <button id="open-modal-btn" class="buy btn">купить</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p class="description__text">Описание:</p>
                                            <div class="description-block">
                                                <div class="description-block__text">
                                                    <p class="article-one">Жанр</p>
                                                    <p class="article-one">Название</p>
                                                    <p class="article-one">Год издания</p>
                                                    <p class="article-one">Автор</p>
                                                </div>
                                                <div class="description-block__text">
                                                    <p class="article-two">Фантастика</p>
                                                    <p class="article-two article-two-color">Инферно</p>
                                                    <p class="article-two">2021</p>
                                                    <p class="article-two">Дэн Браун</p>
                                                </div>
                                            </div>
                                            <p class="description-book">

                                                …Оказавшись в самом загадочном городе Италии – Флоренции, профессор Лэнгдон, специалист по кодам, символам и истории искусства, неожиданно попадает в водоворот событий, которые способны привести к гибели все человечество … И помешать этому может только разгадка тайны, некогда зашифрованной Данте в строках бессмертной эпической поэмы… </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- <p class="book-text__paragraf">Жанры:</p> -->
                </div>

            </div>
            <div class="modal-button">
                <button id="open-modal-btn" class="buy btn" data-path="me-popup">купить</button>
                <button id="open-modal-btn" class="buy btn" data-path="me-popup2">купить</button>
                <button id="open-modal-btn" class="buy btn" data-path="me-popup3">купить</button>
                <button id="open-modal-btn" class="buy btn" data-path="me-popup4">купить</button>
                <style>
                    .modal-button {
                        display: flex;
                        gap: 55px;
                    }
                </style>
            </div>
            <div class="tabs-block">
                <p class="book-text__paragraf">Жанры:</p>
                <div class="tabs">
                    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                    <label for="tab-btn-1" class="tabs-text">Драма</label>
                    <input type="radio" name="tab-btn" id="tab-btn-2" value="">
                    <label for="tab-btn-2" class="tabs-text">Фантастика</label>
                    <input type="radio" name="tab-btn" id="tab-btn-3" value="">
                    <label for="tab-btn-3" class="tabs-text">Детектив</label>
                    <div id="content-1">
                        <div class="tabs-book__info">
                            <?php
                            while ($resultDrama = mysqli_fetch_assoc($drama)) {
                            ?>
                                <div class="tabs-book__info-block">
                                    <a href=""><img class="book-tabs__img" src="images/<?php echo $resultDrama['imgDrama'] ?>.png"></a>
                                    <a href="" class="book-one__main-text main-text"><?php echo $resultDrama['nameBookDrama'] ?></a>
                                    <a href="" class="book-one__text main-text-autor"><?php echo $resultDrama['nameAuthorDrama'] ?></a>
                                    <div class="tabs-book__info-price">
                                        <p class="book-one__price">500 ₽</p>
                                        <img src="/images/star.svg" alt="Оценка" class="book-one__star">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="tabs-button">
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup5">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup3">купить</button>
                            <style>
                                .tabs-button {
                                    justify-content: space-between;

                                    display: flex;

                                }
                            </style>
                        </div>
                    </div>
                    <div id="content-2">
                        <div class="tabs-book__info">
                            <?php
                            while ($resultFantastic = mysqli_fetch_assoc($fantastic)) {
                            ?>
                                <div class="tabs-book__info-block">
                                    <a href=""><img class="book-tabs__img" src="images/<?php echo $resultFantastic['imgFantastic'] ?>.png"></a>
                                    <a href="" class="book-one__main-text main-text"><?php echo $resultFantastic['nameBookFantastic'] ?></a>
                                    <a href="" class="book-one__text main-text-autor"><?php echo $resultFantastic['nameAuthorFantastic'] ?></a>
                                    <div class="tabs-book__info-price">
                                        <p class="book-one__price">500 ₽</p>
                                        <img src="/images/star.svg" alt="Оценка" class="book-one__star">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tabs-button-fantastic">
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup4">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup2">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup6">купить</button>
                            <style>
                                .tabs-button-fantastic {
                                    display: flex;
                                    /* justify-content: space-between; */
                                }
                            </style>
                        </div>

                    </div>
                    <div id="content-3">
                        <div class="tabs-book__info">
                            <?php
                            while ($resultDetective = mysqli_fetch_assoc($detective)) {
                            ?>
                                <div class="tabs-book__info-block">
                                    <a href=""><img class="book-tabs__img" src="images/<?php echo $resultDetective['imgDetective'] ?>.png"></a>
                                    <a href="" class="book-one__main-text main-text"><?php echo $resultDetective['nameBookDetective'] ?></a>
                                    <a href="" class="book-one__text main-text-autor"><?php echo $resultDetective['nameAuthorDetective'] ?></a>
                                    <div class="tabs-book__info-price">
                                        <p class="book-one__price">500 ₽</p>
                                        <img src="/images/star.svg" alt="Оценка" class="book-one__star">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tabs-button-fantastic">
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup7">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup8">купить</button>
                            <button id="open-modal-btn" class="buy btn" data-path="me-popup9">купить</button>
                            <style>
                                .tabs-button-fantastic {
                                    display: flex;
                                    justify-content: space-between;
                                    /* gap: 200px; */
                                }
                            </style>
                        </div>
                    </div>
                </div>
        </main>
        <?php
        require __DIR__ . '/footer.php';
        ?>
    </div>

</body>

</html>