<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?=$value['url'] ?>" width="350" height="260" alt="<?=htmlspecialchars($value['title']); ?>">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?=htmlspecialchars($categories[$value['category']]['name']); ?></span>
        <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($value['title']); ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=cost($value['price']); ?></span>
            </div>
            <div
                class="lot__timer timer
                <?php if (end_of_time($value['ending'])[0] == 00) : ?>
                    timer--finishing
                <?php  endif; ?>">
                <?=print(end_of_time($value['ending'])[0] .":". end_of_time($value['ending'])[1]); ?>

            </div>
        </div>
    </div>
</li>
