INSERT INTO category (name, code)
    VALUES ('Доски и лыжи', 'boards'),
    VALUES ('Крепления', 'attachment'),
    VALUES ('Ботинки', 'boots'),
    VALUES ('Одежда', 'attachment'),
    VALUES ('Инструменты', 'tools'),
    VALUES ('Разное', 'other');

INSERT INTO user (register_date, email, name, password, contact)
    VALUES ('2019-11-10 12:11:10', 'asd@gmail.com', 'Иван', '12345', '89548565474'),
    VALUES ('2018-05-13 18:40:17', 'billibob@gmail.com', 'Билл', '54321', '89254758569'),
    VALUES ('2019-03-25 01:15:36', 'robinzon@gmail.com', 'William', 'qwerty', '89658742365'),
    VALUES ('2019-01-29 23:00:00', 'asicomo@mail.ru', 'Александр', '657714', '89875248595'),
    VALUES ('2018-12-05 18:55:13', 'vromfjl@gmail.com', 'Силиван', 'sdiufeeff', '89246887158'),
    VALUES ('2019-05-26 05:38:45', 'linialius@gmail.com', 'Анастасия', 'sadfdfs', '89532587459');

INSERT INTO lot (date_create, title, description, img, price, date_end, step, id_user, winner, id_category)
    VALUES ('2019-11-14 11:20:14', '2014 Rossignol District Snowboard', 'Сноуборд DISTRICT AMPTEK от известного французского производителя ROSSIGNOL, разработанный специально для начинающих фрирайдеров. Эта доска отлично подойдёт как для обычного склона, так и для парка, а также для обучения. В доступном по цене сноуборде DISTRICT AMPTEK применены современные технологии, которые удачно сочетаются, обеспечивая при этом отличные рабочие характеристики и комфорт. Он оптимален для тех, кто хочет быстро повысить свой уровень техники и мастерства. Классическая твин-тип форма позволяет кататься в разных стойках. За устойчивость и стабильность отвечает стандартный прогиб, он гарантирует жесткую хватку кантов. Высокие рокеры Amptek Auto-Turn обеспечивают легкость управления доской и четкое вхождение в повороты.','img/lot-1.jpg', '10999', '2019-11-14', '200', '1', ,'1'),
    VALUES ('2019-10-21 18:12:36', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'img/lot-2.jpg', '15999', '2020-03-10', '300', '2', ,'1'),
    VALUES ('2019-05-11 17:29:01', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Невероятно легкие универсальные крепления весом всего 720 грамм готовы порадовать прогрессирующих райдеров, практикующих как трассовое катание, так и взрывные спуски в паудере. Легкая нейлоновая база в сочетании с очень прочным хилкапом, выполненным из экструдированного алюминия, выдержит серьезные нагрузки, а бакли, выполненные из магния не только заметно снижают вес, но и имеют плавный механизм. Система стрепов 3D Connect обеспечивает равномерное давление на верхнюю часть ноги, что несомненно добавляет комфорта как во время выполнения трюков, так и во время катания в глубоком снегу.', 'img/lot-3.jpg', '8000', '2020-01-21', '150', '1', ,'2'),
    VALUES ('2019-08-02 01:17:47', 'Ботинки для сноуборда DC Mutiny Charcoal', 'Эти ботинки созданы для фристайла и для того, чтобы на любом споте Вы чувствовали себя как дома в уютных тапочках, в которых Вы будете также прекрасно чувствовать свою доску, как ворсинки на любимом коврике около дивана. Каучуковая стелька Impact S погасит нежелательные вибрации и смягчит приземления, внутренник White Liner с запоминающим форму ноги наполением и фиксирующим верхним стрепом добавит эргономики в посадке, а традиционная шнуровка с блокирующими верхними крючками поможет идеально подогнать ботинок по ноге, тонко фиксируя натяжение шнурков.', 'img/lot-4.jpg', '10999', '2019-12-27', '250', '4', ,'3'),
    VALUES ('2019-09-29 12:36:11', 'Куртка для сноуборда DC Mutiny Charcoal', 'Прочный материал, мембранная влагостойкая дышащая ткань высокой производительности Weather Defense 10K и небольшой утеплитель определяют высокий уровень комфорта и позволят кататься или работать в различных погодных условиях. Куртка снабжена карманом с выводом для шнура, который можно использовать не только для смартфона, а множество функциональных карманов и стандартный крой добавят удобства во время долгого пребывания на склоне.', 'img/lot-5.jpg', '10999', '2019-12-31', '300', '6', ,'4'),
    VALUES ('2019-11-17 22:11:45', 'Маска Oakley Canopy', 'Увеличенный объем линзы и низкий профиль оправы маски Canopy способствуют широкому углу обзора, а специальное противотуманное покрытие поможет ориентироваться в условиях плохой видимости. Технология вентиляции O-Flow Arch и прослойка из микрофлиса сделают покорение горных склонов более комфортным. ', 'img/lot-6.jpg', '5500', '2019-12-30', '200', '4', ,'6');

INSERT INTO rate (date, amount, id_user, id_lot)
    VALUES ('2019-10-15 21:17:10', '12000', '5','1'),
    VALUES ('2019-11-18 11:10:25', '6000', '3','6'),
    VALUES ('2019-11-10 13:22:46', '8500', '2','3');

/*Получить все категории*/
SELECT * FROM category ORDER BY id ASC;

/*Получить новые, открытые лоты с текущей ценой и названием категории*/
SELECT title, price, img, rate.amount, cat.name FROM lot
JOIN rate
ON rate.id_lot = lot.id
JOIN category cat
ON cat.id = lot.id_category
WHERE date_end > GETDATE()
LIMIT = 10
ORDER  BY date_create  DESC;

/*Показать лот по id с названием категории*/
SELECT lot.*, cat.name FROM  lot
JOIN category cat
ON lot.id_category = cat.id
WHERE lot.id = 1;

/*Обновить название лота по его id*/
UPDATE lot SET title = '2014 Rossignol District Snowboard'
WHERE id = 1;

/*Получить список ставок для лота по его id с сортировкой по дате.*/
SELECT * FROM lot
WHERE id = 1
ORDER BY date_create DESC;
