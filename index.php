<?php

//Подключаем сценарии
require_once('data.php');
require_once('function.php');

//Подключаем шаблон главной страницы
$page_content = include_template('main.php', [
    'item' => $item,
    'categories' => $categories
]);
//Подключаем шаблон лейаута
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'container' => 'container',
    'title' => 'YetiCave - Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);
