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

