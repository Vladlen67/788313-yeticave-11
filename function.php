<?php
function cost($input) {
    $input = ceil($input);
    $format_cost = number_format($input, 0, '.',' ');
    return $format_cost .' ₽';
};

function include_template($name, $data) {
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
};

function show_date ($timestamp) {
    $dt = date_create();
    $dt = date_timestamp_set($dt, $timestamp);

    $format = date_format($dt, "d.m.Y H:i");
    return $format;
};
