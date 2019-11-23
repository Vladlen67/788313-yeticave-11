<?php
date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Влад'; // укажите здесь ваше имя

$con = mysqli_connect("localhost", "root", "", "yeticave");
if (!$con) {
    print ("Ошибка подключения " . mysqli_connect_error());
};
mysqli_set_charset($con, "utf8");


$sql_cat = "SELECT * FROM categories ORDER BY id ASC";

$category_obj = mysqli_query($con, $sql_cat);
if (!$category_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: ". $error);
};
$categories = mysqli_fetch_all($category_obj, MYSQLI_ASSOC);

$sql_lot = "SELECT title, price, img, rate.amount, date_end, cat.name, id_category FROM lot "
    . "LEFT JOIN rate "
    . "ON rate.id_lot = lot.id "
    . "JOIN categories cat "
    . "ON cat.id = lot.id_category "
    . "WHERE date_end > NOW() "
    . "ORDER  BY date_create  DESC "
    . "LIMIT 10";


$lot_obj = mysqli_query($con, $sql_lot);
if (!$lot_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: ". $error);
};
$lot = mysqli_fetch_all($lot_obj, MYSQLI_ASSOC);

?>
