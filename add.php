<?php
//Подключаем сценарии
require_once('data.php');
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    //Обязательные поля
    $required = ['title', 'catid', 'description', 'price', 'step', 'date_end'];
    $cats_id = array_column($categories, 'id');
    //Ошибки
    $errors = [];
    //Правила
    $rules = [
        'catid' => function ($value) use ($cats_id) {
            return validateCategory($value, $cats_id);
        },
        'title' => function ($value) {
            return isCorrectLength($value, 4, 150);
        },
        'description' => function ($value) {
            return isCorrectLength($value, 15, 5000);
        },
        'step' => function ($value) {
            return isCorrectNumber($value, 1, 10000);
        },
        'price' => function ($value) {
            return isCorrectNumber($value, 1, 100000);
        },
        'date_end' => function ($value) {
            return isCorrectDate($value);
        }
    ];
    //Получаем и сразу фильтруем массив
    $post_lot = filter_input_array(INPUT_POST, [
        'title' => FILTER_DEFAULT,
        'catid' => FILTER_DEFAULT,
        'description' => FILTER_DEFAULT,
        'price' => FILTER_DEFAULT,
        'step' => FILTER_DEFAULT,
        'date_end' => FILTER_DEFAULT,
    ], true);

    foreach ($_POST as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }
        if (in_array($key, $required) && empty($value)) {
            $errors[$key] = "Поле $key должно быть заполнено";
        }
    }
    $errors = array_filter($errors);

    if (!empty($_FILES['f_img']['name'])) {
        $tmp_name = $_FILES['f_img']['tmp_name'];
        $path = $_FILES['f_img']['name'];
        $file_type = ['image/jpg', 'image/jpeg', 'image/png'];
        $f_info = mime_content_type($tmp_name);
        if (!in_array($tmp_name, $file_type)) {
            $errors['file'] = 'Загрузите файл с изображением в формате .jpeg или .png';
        } else {
            switch ($tmp_name) {
                case 'image/jpg':
                    $file_name = uniqid() . '.jpg';
                    break;
                case 'image/jpeg':
                    $file_name = uniqid() . '.jpeg';
                    break;
                case 'image/png':
                    $file_name = uniqid() . '.png';
                    break;
            }
            move_uploaded_file($tmp_name, 'uploads/' . $file_name);
            $post_lot['path'] = $file_name;
        }
    } else {
        $errors['file'] = 'Необходимо загрузить файл';
    }

    if (count($errors)) {
        $page_content = include_template('add.php', [
            'post_lot' => $post_lot,
            'errors' => $errors,
            'categories' => $categories
        ]);
    } else {
        echo('Добавление данных');
}
} else {
    $page_content = include_template('add.php', [
        'categories' => $categories
    ]);
}
$page_content = include_template('add-lot.php', [
    'categories' => $categories,
    'errors' => $errors
]);
//Подключаем шаблон лейаута
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'container' => '',
    'title' => 'Добавление лота',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print ($layout_content);

print_r($errors);
