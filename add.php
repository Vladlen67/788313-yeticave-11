<?php
//Подключаем сценарии
require_once('data.php');
require_once('function.php');
require_once('helpers.php');

//Ошибки
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Обязательные поля
    $required = ['title', 'catid', 'description', 'price', 'step', 'date_end'];
    $cats_id = array_column($categories, 'id');

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

    if (isset($_FILES['f_img'])) {
        $tmp_name = $_FILES['f_img']['tmp_name'];
        $path = $_FILES['f_img']['name'];
        $file_type = ['image/jpg', 'image/jpeg', 'image/png'];
        $f_info = mime_content_type($tmp_name);
        if (!in_array($f_info, $file_type)) {
            $errors['file'] = 'Загрузите файл с изображением в формате .jpeg или .png';
        } else {
            switch ($f_info) {
                case $file_type[0]:
                    $file_name = uniqid() . '.jpg';
                    break;
                case $file_type[1]:
                    $file_name = uniqid() . '.jpeg';
                    break;
                case $file_type[2]:
                    $file_name = uniqid() . '.png';
                    break;
            }
            if ($_FILES['f_img']['size'] > 10485760) {
                $errors['file'] = 'Файл не должен привышать размер 10 Мб';
                goto a;
            }
            move_uploaded_file($tmp_name, 'uploads/' . $file_name);
            $post_lot['path'] = $file_name;
        }
    } else {
        $errors['file'] = 'Необходимо загрузить файл';
    }
    a:
    if (count($errors)) {
        $page_content = include_template('add.php', [
            'post_lot' => $post_lot,
            'errors' => $errors,
            'categories' => $categories
        ]);
    } else {
        $sql_add = 'INSERT INTO lot (date_create, title, description, img, price, date_end, step, id_user, id_category)
            VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?)';

        $date_create = date('Y-m-d H:i:s');
        $title = $post_lot['title'];
        $description = $post_lot['description'];
        $img = 'uploads/' . $file_name;
        $price = $post_lot['price'];
        $date_end = $post_lot['date_end'];
        $step = $post_lot['step'];
        //id_user
        $id_category = $post_lot['catid'];

        $stmt = db_get_prepare_stmt($con, $sql_add, [
            $date_create,
            $title,
            $description,
            $img,
            $price,
            $date_end,
            $step,
            $id_category
        ]);

        if (mysqli_stmt_execute($stmt)) {
            $last_id = mysqli_insert_id($con);
            header("Location: /lot.php?id=$last_id");
            exit();
        }
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
