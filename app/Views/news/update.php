<?= $this->extend('news/szablon') ?>

<?= $this->section('content') ?>

<h2><?= esc($title); ?></h2>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/update" method="post">
    <?= csrf_field() ?>
    <input type='hidden' name='id' value="<?= esc($news['id']) ?>" />

    <label for="title">Title</label>
    <input type="input" name="title" value="<?= esc($news['title']); ?>" /><br />

    <label for="body">Text</label>
    <textarea name="body"><?= esc($news['body']); ?></textarea><br />

    <input type="submit" name="submit" value="Aktualizuj" />

</form>

<?= $this->endSection() ?>