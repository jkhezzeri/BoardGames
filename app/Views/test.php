<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Test - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>


<form action="" method="post" class="w-50 mx-auto" id="form_search" enctype="multipart/form-data">
    <div class="input-group my-3">
        <input type="file" id="test_file" name="file" class="form-control" placeholder="Test">
        <button class="btn btn-outline-primary" type="submit" id="search_button">Enregistrer</button>
    </div>
</form>







<?= $this->endSection(); ?>

