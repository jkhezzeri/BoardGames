<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Ajouter un jeu - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>

<!-- <ul class="nav nav-underline nav-justified" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab">Jeu</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab">Auteur</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab">Éditeur</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" disabled>Disabled</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" tabindex="0">
    <form action="" method="post" class="w-50 mx-auto">
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Chercher">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Ajouter</button>
        </div>
    </form>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" tabindex="0">
        ...
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" tabindex="0">
        ...
    </div>
    <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" tabindex="0">
        ...
    </div>
</div> -->


<form action="" method="post" class="w-50 mx-auto" id="form_search">
    <div class="input-group my-3">
        <input type="text" id="add_input" class="form-control" placeholder="Nom d'un jeu">
        <button class="btn btn-outline-primary" type="submit" id="search_button">Chercher</button>
    </div>
</form>


<form action="" method="post" id="form_insert" class="d-none">
    <div class="row bg-body-secondary py-2">
        <div class="col-10 px-2">
            <div class="mb-3 row">
                <label for="add_name" class="col-2 col-form-label">Name</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="add_name">
                </div>
                <label for="add_year" class="col-2 col-form-label">Year</label>
                <div class="col-1">
                    <input type="text" class="form-control" id="add_year">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="add_min_play" class="col-2 col-form-label">Min. players</label>
                <div class="col-1">
                    <input type="text" class="form-control" id="add_min_play">
                </div>
                <label for="add_max_play" class="col-2 col-form-label">Max. players</label>
                <div class="col-1">
                    <input type="text" class="form-control" id="add_max_play">
                </div>
                <label for="add_age" class="col-2 col-form-label">Min. age</label>
                <div class="col-1">
                    <input type="text" class="form-control" id="add_age">
                </div>
                <label for="add_time" class="col-2 col-form-label">Playing time</label>
                <div class="col-1">
                    <input type="text" class="form-control" id="add_time">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="add_designer" class="col-2 col-form-label">Designer(s)</label>
                <div class="col-4">
                    <input type="text" class="form-control" id="add_designer">
                </div>
                <label for="add_category" class="col-2 col-form-label">Categories</label>
                <div class="col-4">
                    <input type="text" class="form-control" id="add_category">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="add_artist" class="col-2 col-form-label">Artist(s)</label>
                <div class="col-4">
                    <input type="text" class="form-control" id="add_artist">
                </div>
                <label for="add_mechanic" class="col-2 col-form-label">Mechanics</label>
                <div class="col-4">
                    <input type="text" class="form-control" id="add_mechanic">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="add_publisher" class="col-2 col-form-label">Publisher(s)</label>
                <div class="col-4">
                    <input type="text" class="form-control" id="add_publisher">
                </div>
            </div>
            <div class="row">
                <label for="add_description" class="col-2 col-form-label">Description</label>
                <div class="col-10">
                    <textarea class="form-control" id="add_description" rows="4" style="resize: none;"></textarea>
                </div>
            </div>

        </div>
        <div class="col-2 px-2 position-relative d-flex flex-column">
            <div class="row">
                <label for="bgg_id" class="col-6 col-form-label">BGG ID</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="bgg_id">
                </div>
            </div>
            <label class="mb-3 col-form-label">Image</label>
            <img src="" alt="" id="add_image" class="object-fit-contain mx-auto d-block"width="200" height="200">
            <div class="d-flex justify-content-between mt-auto ms-auto">
                <button type="submit" class="btn btn-primary">Insérer</button>
            </div>
        </div>
    </div>
</form>




<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <script src="<?= base_url('assets/js/add.js'); ?>"></script>
<?= $this->endSection(); ?>