<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $cat): ?>
            <li class="nav__item">
                <a href="lots.php?cat=<?= htmlspecialchars($cat['id']); ?>"><?= htmlspecialchars($cat['name']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
