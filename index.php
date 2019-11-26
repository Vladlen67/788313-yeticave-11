<?php

require_once ('data.php');
require_once ('function.php');

$page_content = include_template('main.php', [
    'lot' => $lot,
    'categories' => $categories
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'category' => $categories,
    'title' => 'YetiCave - Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);
