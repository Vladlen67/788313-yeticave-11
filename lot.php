<?php
//Подключаем сценарии
require_once('data.php');
require_once('function.php');


//unset ($_GET['id']);
//Получение данных из GET
$lot_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Запрос на получение лота по id
$sql_lot = "SELECT lot.*, cat.name AS name FROM  lot "
    . "JOIN categories cat "
    . "ON lot.id_category = cat.id "
    . "WHERE lot.id = " . $lot_id;

//Получение записа по id
$lot_obj = mysqli_query($con, $sql_lot);
if (!$lot_obj) {
    $error = mysqli_error($con);
    print ("Ошибка MySql: " . $error);
};
$lot = mysqli_fetch_assoc($lot_obj);

//Проверка на существование лота
if (isset ($lot_id) && isset($lot['id'])) {
    $title = $lot['title'];
    //Подключаем шаблон страницы лот
    $page_content = include_template('lot-item.php', [
        'lot' => $lot,
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

//Подключаем шаблон лейаута
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => $title,
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);

