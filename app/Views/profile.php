<?= $this->extend('layouts/default'); ?>

<?= $this->section('titre'); ?>
    Profile - Board Games
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>


<form action="updateprofile" method="post" class="mx-auto mt-3" id="form_profile" enctype="multipart/form-data">

    <div class="mb-3 row">
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text col-3 text-center d-block">Username</span>
                <label for="file-upload" class="custom-file-upload d-flex" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Click to change avatar">
                    <img src="<?= $user['avatar'] ?>" alt="Avatar" width="38">
                </label>
                <input id="file-upload" class="d-none" type="file" name="avatar"/>
                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text col-3 text-center d-block">Email</span>
                <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>" readonly>
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text col-3 text-center d-block">First / Last Name</span>
                <input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>">
                <input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>">
            </div>
        </div>
        <div class="col-6">
            <div class="input-group">
                <span class="input-group-text col-3 text-center d-block">Country / City</span>
                <input type="text" class="form-control" name="country" value="<?= $user['country'] ?>" list="list_pays">
                <datalist id="list_pays"></datalist>
                <input type="text" class="form-control" name="city" value="<?= $user['city'] ?>">
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-3">
            <div class="input-group">
                <span class="input-group-text col-6 text-center d-block">Registration Date</span>
                <input type="date" class="form-control col-6 text-center" value="<?= $user['registration_date'] ?>" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group">
                <span class="input-group-text col-6 text-center d-block">Last Login</span>
                <input type="date" class="form-control col-6 text-center" value="<?= $user['last_login'] ?>" readonly>
            </div>
        </div>

        <div class="col-6 d-flex justify-content-between">
            <button class="btn btn-outline-primary" type="submit" id="profile_update">Update Profile</button>
            <!-- <a href="/changepassword" class="btn btn-outline-secondary" role="button">Change Password</a> -->
            <button class="btn btn-outline-secondary" type="button" id="profile_password" data-bs-toggle="modal" data-bs-target="#passwordModal">Change Password</button>
            <button class="btn btn-outline-danger" type="button" id="profile_delete" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
        </div>

    </div>
    

    
    <!-- <div class="mb-3 row d-none" id="update_avatar">
        <div class="col-10">
            <div class="input-group">
                <input type="file" class="form-control" id="changeAvatar">
            </div>
        </div>
        <div class="col-2 btn-group">
            <button class="btn btn-outline-secondary" type="submit" id="buttonChangeImage">Change Avatar</button>
        </div>
    </div> -->


    <!-- <div class="mb-3 row d-none" id="update_password">
        <div class="col-5">
            <div class="input-group">
                <span class="input-group-text">Actual Password</span>
                <input type="text" class="form-control" name="actual_password">
            </div>
        </div>
        <div class="col-5">
            <div class="input-group">
                <span class="input-group-text">New Password</span>
                <input type="text" class="form-control" name="new_password">
            </div>
        </div>
        <div class="col-2 btn-group">
            <button class="btn btn-outline-secondary" type="submit" id="password_change" formaction="<?= base_url('changepassword') ?>">Change Password</button>
        </div>
    </div> -->


    

    
</form>


<?php
/* echo'<pre>';
print_r($user);
echo'</pre>'; */
?>


<!-- Modal -->



<div class="modal fade" id="passwordModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="changepassword" method="post" id="form_change_password" class="modal-content needs-validation" novalidate>
            <div class="modal-header text-bg-secondary">
                <h1 class="modal-title fs-5">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="password" class="form-control mb-3" name="currentPassword" placeholder="Current Password" required>
                <input type="password" class="form-control" name="newPassword" placeholder="New Password" required minlength="8" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{8,}">
                <div id="helpPassword" class="form-text">Must be a minimum of 8 characters, contain at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special characters (#?!@$%^&*-).</div>
                <?php if (!empty(session('message'))) : ?>
                <div id="changePasswordError" class="mt-3 text-danger"><?= session('message') ?></div>
                <?php endif; ?>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary me-auto">Change</button>
            </div>
        </form>
    </div>
</div>


<?php if (!empty(session('updated'))) : ?>
<div class="modal fade" id="profileUpdatedModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-success">
                <h1 class="modal-title fs-5">Profile Updated</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="UpdatedProfile"><?= session('updated') ?></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if (!empty(session('passwordChanged'))) : ?>
<div class="modal fade" id="passwordChangedModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-success">
                <h1 class="modal-title fs-5">Password Changed</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="changedPassword"><?= session('passwordChanged') ?></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="deleteaccount" method="post" id="" class="modal-content needs-validation" novalidate>
            <div class="modal-header text-bg-danger">
                <h1 class="modal-title fs-5">Delete Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <?php if (!empty(session('error'))) : ?>
                <div id="deleteError" class="mt-3 text-danger"><?= session('error') ?></div>
                <?php endif; ?>
                <div class="mt-3">Deleting your profile will remove all personal data.</div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger me-auto">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>



<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
    <script src="<?= base_url('assets/js/profile.js'); ?>"></script>
<?= $this->endSection(); ?>