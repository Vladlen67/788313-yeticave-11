<?php
//Подключаем сценарии
require_once('data.php');
require_once('function.php');
require_once('helpers.php');

//Получение данных из GET
$cat_id = filter_input(INPUT_GET, 'cat', FILTER_SANITIZE_NUMBER_INT);

//Запрос на получение лота по id
$sql_lots = "SELECT lot.*, cat.name AS name, cat.id AS catid FROM  lot "
    . "JOIN categories cat "
    . "ON lot.id_category = cat.id "
    . "WHERE cat.id = " . $cat_id;

//Получение записа по id
$lots_obj = mysqli_query($con, $sql_lots);
if (!$lots_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: " . $error);
};

$lots = mysqli_fetch_all($lots_obj, MYSQLI_ASSOC);

//Создаем массив для получения title и проверки на существование
$lots_arr = end($lots);

//Проверка на существование категории
if (isset ($_GET['cat']) && isset($lots_arr['catid'])) {
    $title = $lots_arr['name'];
    //Подключаем шаблон страницы лотов
    $page_content = include_template('all-lots.php', [
        'lots' => $lots,
        'categories' => $categories,
        'title' => $title
    ]);
} else {
    $title = '404 Not found';
    //Подключаем страницу ошибки
    $page_content = include_template('404.php', [
        'categories' => $categories
    ]);
};

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'container' => '',
    'title' => $title,
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);
