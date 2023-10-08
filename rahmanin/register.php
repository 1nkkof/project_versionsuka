<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/registrationExit.css">
</head>

<body>
    <!-- форма Авторизациии -->
    <div class="container">
        <div class="container-content">
            <header class="header">
                <div class="big-container">
                    <nav class="nav">
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="index.php" class="menu-link enter">Вход</a>
                            </li>
                            <li class="menu-item">
                                <a href="register.php" class="menu-link registration">Регистрация</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main class="main">
                <section class="main-form">
                    <div class="big-container">
                        <p class="main-form__text">Зарегистрируйтесь, чтобы продолжить</p>
                        <div class="main-form__container">
                            <form action="/vendor/signup.php" method="post" novalidate class="signup" autocomplete="off">
                                <div>
                                    <label for="name"></label>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div>
                                    <label for="email">email</label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <label for="password">password</label>
                                <input type="password" name="password" id="password">
                                <div>
                                    <label for="password_confirmation">password</label>
                                    <input type="password" name="password_confirmation" id="password_confiramtion">
                                </div>
                                    <!-- ДАША НЕ ТРОГАЙ 55 строчку  -->
                                 <input type="hidden" name="status" id="status">
                                <button>register</button>
                            </form>
                        </div>
                        <a href="index.php" class="fogrein_password">Вы уже зарегистрированы?</a>
                    </div>
                </section>
            </main>
        </div>
    </div>


</body>

</html>
<!-- <form action="/vendor/signup.php" method="post" class="form">
                                <input type="text" name="name" placeholder="Имя:"class="name">
                                <input type="email" name="email" placeholder="Почта email:" class="input-email">
                                <input type="password" name="password" placeholder="Пароль:" class="input-password" >
                                <input type="password" name="password_confirm" placeholder="Повторите пароль" class="input-password-again" >
                                <input type="submit" class="big-container__button" value="Зарегистрироваться"> -->