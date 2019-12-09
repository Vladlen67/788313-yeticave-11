<?php
//Вывод цены в нужном формате
function cost($input)
{
    $input = ceil($input);
    $format_cost = number_format($input, 0, '.', ' ');
    return $format_cost . ' ₽';
}

//Шаблонизатор
function include_template($name, $data)
{
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
//Валидация email
function validateEmail($email) {
    if (!filter_var(INPUT_POST, $email, FILTER_VALIDATE_EMAIL)) {
        return "Введите корректный email";
    }
}
//Валидация категорий
function validateCategory($id, $allowed_List) {
    if (!in_array($id, $allowed_List)) {
        return "Указана несуществующая категория";
    }
}

//Проверка длинны заполения полей
function isCorrectLength($value, $min, $max) {
    if ($value) {
        $len = strlen($value);
        if ($len < $min OR $len > $max) {
            return "Значение должно быть от $min до $max символов";
        }
    }
}
//Проверка входа в диапазон значений
function isCorrectNumber($num, $min, $max) {
    $num = filter_var($num, FILTER_VALIDATE_INT);
    if ($num < $min OR $num > $max) {
        return "Значение должно быть от $min до $max";
    }
}
//Проверяет переданную дату на соответствие формату 'ГГГГ-ММ-ДД'
function is_date_valid(string $date) : bool {
    $format_to_check = 'Y-m-d';
    $dateTimeObj = date_create_from_format($format_to_check, $date);

    return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
}
//Проверка даты
function isCorrectDate($date) {
    $min = date('Y-m-d', strtotime("+1 day"));
    $max = date('Y-m-d', strtotime("+2 month"));
    if (is_date_valid($date)) {
        return 'Введите дату в формате ГГГГ-ММ-ДД';
    } elseif ($date < $min|| $date > $max) {
        return 'Введите значение от $min до $max';
    }
}
// Функция восстанавливающая заполненные поля формы при ошибке
function getPostVal($name) {
    return $_POST['$name'] ?? "";
}

function show_date($timestamp)
{
    $dt = date_create();
    $dt = date_timestamp_set($dt, $timestamp);

    $format = date_format($dt, "d.m.Y H:i");
    return $format;
}

//Получение даты окончания ставки в нужном формате
function end_of_time($end)
{
    $eot = strtotime($end) - time();
    if ($eot <= 0) {
        $total = ["00", "00"];
    } else {
        $total = [
            str_pad(floor($eot / 3600), 2, "0", STR_PAD_LEFT),
            str_pad(floor(($eot % 3600) / 60), 2, "0", STR_PAD_LEFT)
        ];
    };
    return $total;
}

