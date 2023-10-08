<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header('Content-type: json/application');

require_once $_SERVER['DOCUMENT_ROOT'] . "./vendor/connect.php";

include "genre_function.php";

$method = $_SERVER["REQUEST_METHOD"];

$q = $_GET['q'];
$params = explode('/', $q);
$type = $params[0];

if (isset($params[1])) {
    $title = $params[1];
}

switch ($method) {
    case "GET":
        if ($type === 'posts') {
            if (isset($title)) {
                getGenre($connect, $title);
            } else {
                getGenres($connect);
            }
        }
        break;
    case "POST":
        if ($type === 'posts') {
            addGenres($connect,$_POST);
        }
}
