<?= $this->extend('news/szablon') ?>

<?= $this->section('content') ?>

<h2><?= esc($news['title']); ?></h2>
<?= esc($news['body']); ?>

<?= $this->endSection() ?>