<?= include_template('nav-list.php', [
    'categories' => $categories
]); ?>
<form class="form form--add-lot container <?= count($errors) ? ' form--invalid' : ''; ?>" action="/add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= isset($errors['title']) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-title">Наименование <sup>*</sup></label>
            <input id="lot-title" type="text" name="title" placeholder="Введите наименование лота" value="<?= getPostVal('title') ?>">
            <span class="form__error"><?= $errors['title'] ?? ''; ?></span>
        </div>
        <div class="form__item <?= isset($errors['catid']) ? 'form__item--invalid' : ''; ?>">
            <label for="category" >Категория <sup>*</sup></label>
            <select id="category" name="catid">
                <option>Выберите категорию</option>
                <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"<?php if ($cat['id'] == getPostVal('catid')): ?>selected<?php endif; ?> ><?=$cat['name']; ?> </option>
                <?php endforeach; ?>
            </select>
            <span class="form__error"><?= $errors['catid'] ?? ''; ?></span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= isset($errors['description']) ? 'form__item--invalid' : ''; ?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="description" placeholder="Напишите описание лота">
            <?= getPostVal('description'); ?>
        </textarea>
        <span class="form__error"><?= $errors['description'] ?? ''; ?></span>
    </div>
    <div class="form__item form__item--file">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="f_img" value="" name="f_img">
            <label for="lot-img">
                Добавить
            </label>
            <span class="form__error"><?= $errors['img'] ?? ''; ?></span>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="lot-rate" type="text" name="price" placeholder="0">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="lot-step" type="text" name="step" placeholder="0">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="lot-date" type="text" name="date_end"
                   placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <?php if (isset($errors)): ?>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <ul>
        <?php foreach ($errors as $value): ?>
        <li><strong><?= $value; ?><strong/></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
</form>

