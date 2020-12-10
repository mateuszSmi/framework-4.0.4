<?= $this->extend('news/szablon') ?>

<?= $this->section('content') ?>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/delete" method="post">
    <?= csrf_field() ?>

    <input type='hidden' name='id' value="<?= esc($news['id']) ?>" />

    <p><?= esc($news['body']); ?></p>

    <input type="submit" name="submit" value="Usuń" />

</form>

<?= $this->endSection() ?>