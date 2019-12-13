<?php
date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Влад'; // укажите здесь ваше имя

//подключение к базе данных
$con = mysqli_connect("localhost", "root", "", "yeticave");
if (!$con) {
    print ("Ошибка подключения " . mysqli_connect_error());
};
mysqli_set_charset($con, "utf8");

//Запрос на получние списка категорий
$sql_cat = "SELECT * FROM categories ORDER BY id ASC";

//Получение списка категорий
$category_obj = mysqli_query($con, $sql_cat);
if (!$category_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: " . $error);
};
$categories = mysqli_fetch_all($category_obj, MYSQLI_ASSOC);

//Запрос на получение списка лотов
$sql_item = "SELECT lot.id AS id, title, price, img, rate.amount, date_end, cat.name AS name, id_category FROM lot "
    . "LEFT JOIN rate "
    . "ON rate.id_lot = lot.id "
    . "JOIN categories cat "
    . "ON cat.id = lot.id_category "
    . "WHERE date_end > NOW() "
    . "ORDER  BY date_create  DESC "
    . "LIMIT 10";

//Получение списка лотов
$item_obj = mysqli_query($con, $sql_item);
if (!$item_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: " . $error);
};
$item = mysqli_fetch_all($item_obj, MYSQLI_ASSOC);
