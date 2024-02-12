<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Ajouter un jeu - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>


<form action="" method="post" class="w-50 mx-auto" id="form_search">
    <div class="input-group my-3">
        <input type="text" id="add_input" name="name" class="form-control" placeholder="Nom d'un jeu">
        <button class="btn btn-outline-primary" type="submit" id="search_button">Chercher</button>
    </div>

    <?php if(isset($message)): ?>
        <span class="mx-3"><?= $message; ?></span>
    <?php endif; ?>
</form>







<?= $this->endSection(); ?>

