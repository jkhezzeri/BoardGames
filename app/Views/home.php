<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>
    <h1>Hello World!</h1>
    <?= $this->section('autre_contenu'); ?>
        <h2>Ici un autre contenu</h2>
    <?= $this->endSection(); ?>
<?= $this->endSection(); ?>