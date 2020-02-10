<?php

//Подключаем сценарии
require_once('data.php');
require_once('function.php');
require_once('helpers.php');

//Ошибки
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Обязательные поля
    $required = ['email', 'name', 'password', 'contact'];

    //Правила
    $rules = [
        'email' => function ($value) {
            return validateEmail($value);
        },
        'name' => function ($value) {
            return isCorrectLength($value, 1, 200);
        },
        'password' => function ($value) {
            return isCorrectLength($value, 6, 100);
        },
        'contact' => function ($value) {
            return isCorrectLength($value, 5, 200);
        }
    ];
    //Получаем и сразу фильтруем массив
    $post_lot = filter_input_array(INPUT_POST, [
        'email' => FILTER_DEFAULT,
        'name' => FILTER_DEFAULT,
        'password' => FILTER_DEFAULT,
        'contact' => FILTER_DEFAULT,
    ], true);

    foreach ($post_lot as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }
        if (in_array($key, $required) && empty($value)) {
            $errors[$key] = "Поле $key должно быть заполнено";
        }
    }
    $errors = array_filter($errors);

    if (count($errors)) {
        $page_content = include_template('adduser.php', [
            'post_lot' => $post_lot,
            'errors' => $errors
        ]);
    } else {
        $sql_add = 'INSERT INTO user (register_date, email, name, password, contact)
            VALUES (?, ?, ?, ?, ?)';

        $register_date = date('Y-m-d H:i:s');
        $email = $post_lot['email'];
        $name = $post_lot['name'];
        $password = password_hash($post_lot['password'], PASSWORD_DEFAULT);
        $contact = $post_lot['contact'];

        $stmt = db_get_prepare_stmt($con, $sql_add, [
            $register_date,
            $email,
            $name,
            $password,
            $contact
        ]);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: /adduser.php');
            exit();
        }

    }

} else {
    $page_content = include_template('adduser.php', [
        'categories' => $categories
    ]);
}
$page_content = include_template('sign-up.php', [
    'categories' => $categories,
    'errors' => $errors
]);

//Подключаем шаблон лейаута
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'container' => '',
    'title' => 'Регистрация',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);
