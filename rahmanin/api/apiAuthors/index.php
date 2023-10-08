<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header('Content-type: json/application');

require_once $_SERVER['DOCUMENT_ROOT'] . "./vendor/connect.php";

include "author_function.php";

$method = $_SERVER["REQUEST_METHOD"];

$q = $_GET['q'];
$params = explode('/', $q);
$type = $params[0];

if (isset($params[1])) {
    $id = $params[1];

}

switch ($method) {
    case "GET":
        if ($type === 'posts') {
            if (isset($id)) {
                getAuthor($connect, $id);
            } else {
                getAuthors($connect);
            }
        }
        break;
    case "POST":
        if ($type === 'posts') {
            addAuthor($connect,$_POST);
        }
}
