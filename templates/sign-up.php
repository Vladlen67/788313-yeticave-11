<?= include_template('nav-list.php', [
    'categories' => $categories
]); ?>
        <form class="form container <?= count($errors) ? ' form--invalid' : ''; ?>" action="/adduser.php" method="post" autocomplete="off"> <!-- form
    --invalid -->
            <h2>Регистрация нового аккаунта</h2>
            <div class="form__item <?= isset($errors['email']) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
                <label for="email">E-mail <sup>*</sup></label>
                <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= getPostVal('email'); ?>">
                <span class="form__error"><?= $errors['email'] ?? ''; ?></span>
            </div>
            <div class="form__item <?= isset($errors['password']) ? 'form__item--invalid' : ''; ?>">
                <label for="password">Пароль <sup>*</sup></label>
                <input id="password" type="password" name="password" placeholder="Введите пароль" value="<?= getPostVal('password'); ?>">
                <span class="form__error"><?= $errors['password'] ?? ''; ?></span>
            </div>
            <div class="form__item <?= isset($errors['name']) ? 'form__item--invalid' : ''; ?>">
                <label for="name">Имя <sup>*</sup></label>
                <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= getPostVal('name'); ?>">
                <span class="form__error"><?= $errors['name'] ?? ''; ?></span>
            </div>
            <div class="form__item <?= isset($errors['contact']) ? 'form__item--invalid' : ''; ?>">
                <label for="contact">Контактные данные <sup>*</sup></label>
                <textarea id="contact" name="contact" placeholder="Напишите как с вами связаться"><?= getPostVal('contact'); ?></textarea>
                <span class="form__error"><?= $errors['contact'] ?? ''; ?></span>
            </div>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
            <ul>
                <?php foreach ($errors as $value): ?>
                    <li><strong><?= $value; ?></strong></li>
                <?php endforeach; ?>
            </ul>
            <button type="submit" class="button">Зарегистрироваться</button>
            <a class="text-link" href="/adduser.php">Уже есть аккаунт</a>
        </form>

