<?php
date_default_timezone_set('Europe/Moscow');

$is_auth = rand(0, 1);

$user_name = 'Влад'; // укажите здесь ваше имя

$categories = [
    [
        'id' => 0,
        'name' => 'Доски и лыжи',
        'style' => 'boards'
    ],
    [
        'id' => 1,
        'name' => 'Крепления',
        'style' => 'attachment'
    ],
    [
        'id' => 2,
        'name' => 'Ботинки',
        'style' => 'boots'
    ],
    [
        'id' => 3,
        'name' => 'Одежда',
        'style' => 'clothing'
    ],
    [
        'id' => 4,
        'name' => 'Инструменты',
        'style' => 'tools'
    ],
    [
        'id' => 5,
        'name' => 'Разное',
        'style' => 'other'
    ],
    ];

$item = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => '0',
        'price' => '10999',
        'url' => 'img/lot-1.jpg',
        'ending' => "2019-11-14"
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => '0',
        'price' => '159999',
        'url' => 'img/lot-2.jpg',
        'ending' => "2020-03-10"
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => '1',
        'price' => '8000',
        'url' => 'img/lot-3.jpg',
        'ending' => "2020-01-21"
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => '2',
        'price' => '10999',
        'url' => 'img/lot-4.jpg',
        'ending' => "2019-12-27"
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => '3',
        'price' => '7500',
        'url' => 'img/lot-5.jpg',
        'ending' => "2019-12-31"
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => '5',
        'price' => '5400',
        'url' => 'img/lot-6.jpg',
        'ending' => "2019-12-30"
    ],
    ];

?>
