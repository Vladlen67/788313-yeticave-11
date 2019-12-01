<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?= $value['img']; ?>" width="350" height="260" alt="<?=htmlspecialchars($value['title']); ?>">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?= htmlspecialchars($value['name']); ?></span>
        <h3 class="lot__title"><a class="text-link" href="/lot.php?id=<?=$value['id'];?>"><?=htmlspecialchars($value['title']); ?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=cost($value['price']); ?></span>
            </div>
            <?php $endOfTime = end_of_time($value['date_end']); ?>
            <div class="lot__timer timer <?php if ($endOfTime[0] == 00) : ?> timer--finishing <?php  endif; ?>">
                <?=$endOfTime[0] . ":" . $endOfTime[1]; ?>
            </div>
        </div>
    </div>
</li>
