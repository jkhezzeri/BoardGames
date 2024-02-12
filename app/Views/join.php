<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Join - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>

<?php
    /* $errorUsername = isset($validation)?$validation->getError('username'):'';
    $errorEmail = isset($validation)?$validation->getError('email'):'';
    $errorPassword = isset($validation)?$validation->getError('password'):'';
    $errorCheck = isset($validation)?$validation->getError('check'):''; */
?>


<form action="" method="post" class="col-4 mx-auto my-5 px-5 p-3 border rounded needs-validation <?= isset($validation)?'was-validated':'' ?>" id="form_sign" novalidate>

    <div class="d-flex justify-content-center mb-3">
        <img src="<?= base_url('assets/img/bg_logo.png'); ?>" alt="Logo Accueil" width="64" height="64" id="form_icon" class="d-inline-block">
        <div class="text-uppercase text-body-emphasis lh-1 ms-2">
            <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Board</div>
            <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Games</div>
        </div>
    </div>

    <div class="text-center mb-3 px-3">Sign up to manage your game collection, rate and comment games, and more.</div>
    
    <div class="mb-3">
        <label for="joinUsername" class="form-label fw-bold">Username</label>
        <input type="text" class="form-control" name="username" id="joinUsername" value="<?= (isset($validation) && !($validation->getError('username')))?$username:'' ?>" required minlength="4" maxlength="20">
        <div class="invalid-feedback"><?= isset($validation)?$validation->getError('username'):'' ?></div>
        <div id="helpUsername" class="form-text">Must be 4-20 characters long.</div>
    </div>
    <div class="mb-3">
        <label for="joinEmail" class="form-label fw-bold">Email</label>
        <input type="email" class="form-control" name="email" id="joinEmail" value="<?= (isset($validation) && !($validation->getError('email')))?$email:'' ?>" required pattern="[a-z0-9._-]+@[a-z0-9]+\.[a-z]{1,}$">
        <div class="invalid-feedback"><?= isset($validation)?$validation->getError('email'):'' ?></div>
    </div>
    <div class="mb-3">
        <div class="d-flex justify-content-between">
            <label for="joinPassword" class="form-label fw-bold">Password</label>
            <div><i class="bi bi-eye" id="eyePassword" role="button"></i></div>
        </div>
        <input type="password" class="form-control" name="password" id="joinPassword" value="<?= (isset($validation) && !($validation->getError('password')))?$password:'' ?>" required minlength="8" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{8,}">
        <div class="invalid-feedback"><?= isset($validation)?$validation->getError('password'):'' ?></div>
        <div id="helpPassword" class="form-text">Must be a minimum of 8 characters and contain at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special characters (#?!@$%^&*-).</div>
    </div>

    <div class="mb-3 form-check">
        <input class="form-check-input" type="checkbox" name="check" id="joinCheck" required <?= (isset($validation) && !($validation->getError('check')))?'checked':'' ?>>
        <label class="form-check-label" for="joinCheck">Agree to terms and conditions</label>
        <div class="invalid-feedback"><?= isset($validation)?$validation->getError('check'):'' ?></div>
    </div>
                    
    <button type="submit" class="btn btn-primary w-100 me-auto">Create an Account</button>

    <hr class="mx-3">

    <div class="text-center">Already have an account ? <a href="/login" class="text-decoration-none">Sign In</a></div>

</form>







<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <script src="<?= base_url('assets/js/form.js'); ?>"></script>
<?= $this->endSection(); ?>