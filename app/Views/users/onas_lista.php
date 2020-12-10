<h2><?= esc($title); ?></h2>

<?php if (! empty($users) && is_array($users)) : ?>
    <ol>
    <?php foreach ($users as $user_item): ?>
        
        <li><?= esc($user_item['login']); ?></li>
        <p><?= esc($user_item['email']); ?></p>
        <p><a href="/onas/<?= esc($user_item['login'], 'url'); ?>">Szczegóły</a></p>

    <?php endforeach; ?>
    </ol>
    

<?php else : ?>

    <h3>Brak użytkowników</h3>

<?php endif ?>