<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connect = require __DIR__ . "/vendor/connect.php";
    $sql = sprintf(
        "SELECT * FROM `users` WHERE email= '%s'",
        $connect->real_escape_string($_POST["email"])
    );

    $result = $connect->query($sql);

    if (!$result) {
        die("ОШИБКА В SQL : " . $connect->error);
    }
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password"])) {
            session_start();
            session_regenerate_id();
            $_SERVER["user_id"] = $user["id"];
            header("Location:../profile.php");

            if ($user["name"] === 'admin') {
                header("Location:../adminPage.php");

            }
            if ($user["status"] === "ban") {
                session_destroy();
                header("Location:banned.php");
              }
             
            }
            exit;
        }
    }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/registrationExit.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="container-content">
                <header class="header">
                    <div class="big-container">
                        <nav class="nav">
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="index.php" class="menu-link enter_index">Вход</a>
                                </li>
                                <li class="menu-item">
                                    <a href="register.php" class="menu-link register">Регистрация</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>
                <main class="main">
                    <section class="main-form">
                        <div class="big-container">
                            <div class="text-form">
                                <p class="we-miss">Мы скучали !</p>
                                <p class="log-in">Войдите, чтобы продолжить</p>
                            </div>
                            <div class="main-form__container">
                                <?php if ($is_invalid): ?>
                                    <em>Invalid login or password </em>
                                <?php endif; ?>
                                <form method="post">
                                    <input type="text" name="email" placeholder="Введите email:"
                                        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" id="email">
                                    <input type="password" name="password" placeholder="Введите пароль:" id="password">
                                    <button class="big-container__button enter-button">Войти</button>
                                </form>
                            </div>
                            <a href="index.php" class="fogrein_password">Забыли пароль?</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</body>

</html>