<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Login - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>

<?php
    $errorEmail = isset($validation)?$validation->getError('email'):'';
    $errorPassword = isset($validation)?$validation->getError('password'):'';
?>

<form action="login" method="post" class="col-4 mx-auto my-5 px-5 p-3 border rounded needs-validation <?= (isset($validation) || isset($error))?'was-validated':'' ?>" id="form_sign" novalidate>

    <div class="d-flex justify-content-center mb-3">
        <img src="<?= base_url('assets/img/bg_logo.png'); ?>" alt="Logo Accueil" width="64" height="64" id="form_icon" class="d-inline-block">
        <div class="text-uppercase text-body-emphasis lh-1 ms-2">
            <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Board</div>
            <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Games</div>
        </div>
    </div>

    <div class="text-center mb-3 px-3">Welcome back, sign in !</div>

    <input type="email" class="form-control mb-3" name="email" id="loginEmail" placeholder="Email" required pattern="[a-z0-9._-]+@[a-z0-9]+\.[a-z]{1,}$">
    <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Password" required>
    <div class="invalid-feedback"><?= isset($validation)?$validation->getError('email'):'' ?></div>
    <div class="invalid-feedback"><?= isset($validation)?$validation->getError('password'):'' ?></div>
    <div class="invalid-feedback"><?= isset($error)?$error:'' ?></div>

    <div class="my-3">Forgot <a href="/forgotpassword" class="link-underline link-underline-opacity-0 link-underline-opacity-100-hover">password</a> ?</div>

    <button type="submit" class="btn btn-primary w-100 me-auto">Sign in</button>

    <hr class="mx-3">

    <div class="text-center">Don't have an account ? <a href="/join" class="text-decoration-none">Sign Up</a></div>
    
</form>







<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <script src="<?= base_url('assets/js/form.js'); ?>"></script>
<?= $this->endSection(); ?>