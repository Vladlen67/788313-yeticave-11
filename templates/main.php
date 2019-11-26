<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php
        foreach ($categories as $cat): ?>
            <li class="promo__item promo__item--<?=$cat['code'];?>">
                <a class="promo__link" href="pages/all-lots.html"><?=htmlspecialchars($cat['name']);?></a>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($lot as $value): ?>
            <?=include_template('item.php', ['value' => $value,
                'categories' => $categories
            ]); ?>
        <?php endforeach; ?>
    </ul>
</section>
