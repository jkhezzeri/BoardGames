<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    
    <title>
        <?= $this->renderSection('titre'); ?>
    </title>
</head>
<body class="container-lg p-0 d-flex flex-column min-vh-100">
    <header class="sticky-top">
        <!-- <a href="/" class="d-flex flex-row text-decoration-none">
            <img src="<?= base_url('assets/img/bg_logo.png'); ?>" alt="Logo Accueil" width="60" height="60">
            <div class="text-uppercase text-black lh-1 ms-2">
                <div class="font-monospace fw-bold fs-3 h-50 d-flex align-items-center">Board</div>
                <div class="font-monospace fw-bold fs-3 h-50 d-flex align-items-center">Games</div>
            </div>
        </a> -->
        <!-- <nav class="navbar bg-body-tertiary p-0">
            <div class="container-fluid bg-info">
                <a class="navbar-brand d-flex flex-row m-0 bg-warning" href="/">
                    <img src="<?= base_url('assets/img/bg_logo.png'); ?>" alt="Logo Accueil" width="50" height="50" class="d-inline-block align-text-top">
                    <div class="text-uppercase lh-1 ms-2">
                        <div class="font-monospace fw-bold fs-4 h-50 d-flex align-items-center">Board</div>
                        <div class="font-monospace fw-bold fs-4 h-50 d-flex align-items-center">Games</div>
                    </div>
                </a>
            </div>
        </nav> -->
        
        <nav class="navbar navbar-expand bg-body-tertiary">
            <div class="container-fluid px-2">
                <a class="navbar-brand d-flex flex-row p-0" href="/">
                    <img src="<?= base_url('assets/img/bg_logo.png'); ?>" alt="Logo Accueil" width="64" height="64" id="home_icon" class="d-inline-block">
                    <div class="text-uppercase lh-1 ms-2">
                        <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Board</div>
                        <div class="font-monospace fw-bold fs-2 h-50 d-flex align-items-center">Games</div>
                    </div>
                </a>
                <ul class="navbar-nav me-auto">
                    <!-- <li class="nav-item">
                    <a class="nav-link active" href="/add">Add</a>
                    </li> -->
                    <!-- <li class="nav-item">
                    <a class="nav-link active" href="/addjs">Add_JS</a>
                    </li> -->
                    <li class="nav-item">
                    <a class="nav-link active" href="/test">Test</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex input-group w-50 me-2" role="search">
                    <input class="form-control" type="search" placeholder="Search" list="list_pays">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <?php if (isset($films)): ?>
                    <datalist id="list_pays">
                    <?php foreach($films as $film): ?>
                        <option value="<?= $film['titre']; ?>"></option>
                    <?php endforeach; ?>
                    </datalist>
                    <?php endif; ?>
                </form>
                <ul class="navbar-nav">
                    


                    <?php if (session()->has('login')): ?>

                    <li class="nav-item dropdown">
                        <button class="btn border-0" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <img src="<?= session('avatar') ?>" width="32" height="32" class="object-fit-fill">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><div class="dropdown-header d-flex align-items-center">
                                <img src="<?= session('avatar') ?>" width="32" height="32" class="object-fit-fill">
                                <div class="ms-3"><?= session('login') ?></div>
                            </div></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg>
                                <div class="ms-3">Profile</div>
                            </a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/collection">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
                                    <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                                </svg>
                                <div class="ms-3">Collection</div>
                            </a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/rating">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
                                </svg>
                                <div class="ms-3">Rating</div>
                            </a></li>

                            <?php if (session('admin') == 1): ?>

                            <li><hr class="dropdown-divider"></li>
                            <li><strong class="dropdown-item-text text-center">Admin</strong></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="/add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
                                    <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
                                </svg>
                                <div class="ms-3">Add a Game</div>
                            </a></li>

                            <?php endif; ?>

                            <li><hr class="dropdown-divider"></li>
                            <li><a href="/logout" class="dropdown-item d-flex align-items-center" id="btnOff">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z"/>
                                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                </svg>
                                <div class="ms-3">Log Out</div>
                            </a></li>
                        </ul>
                    </li>

                    <?php else: ?>

                    <li class="nav-item">
                        <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#signModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </button>
                    </li>

                    <?php endif; ?>



                    <li class="nav-item">
                        <button type="button" class="btn border-0" id="btnSwitch">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-sun-fill" viewBox="0 0 16 16">
                                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                            </svg>
                        </button>
                    </li>

                </ul>

                <!-- <button type="button" class="btn fs-2 border-0" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>
                </button>
                <form class="dropdown-menu dropdown-menu-end p-4 mt-0" style="">
                    <div class="mb-3">
                        <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                            <label class="form-check-label" for="dropdownCheck2">Remember me</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="button" class="btn btn-primary">Sign up</button>
                    </div>
                </form> -->

                


                
                
            </div>
        </nav>

    </header>
    <div id="main_container">
        
        
        <?= $this->renderSection('contenu'); ?>
        <!-- test -->
        <?php
        

        ?>

        <?= $this->renderSection('autre_contenu'); ?>
        
        
    </div>


    <!-- Modal -->
    <div class="modal fade" id="signModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="login" method="post" id="fast_sign" class="modal-content needs-validation" novalidate>
                <div class="modal-header text-bg-primary">
                    <h1 class="modal-title fs-5" id="loginModal">Sign In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="email" class="form-control mb-3" name="email" id="modalEmail" placeholder="Email" required>
                    <input type="password" class="form-control" name="password" id="modalPassword" placeholder="Password" required>
                    <div class="invalid-feedback">Invalid username or password.</div>
                    <div class="mt-3">Forgot <a href="/forgotpassword" class="link-underline link-underline-opacity-0 link-underline-opacity-100-hover">password</a> ?</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-auto">Sign In</button>
                    <div>
                        <label class="form-label">Don't have an account ?</label>
                        <a href="/join" class="btn btn-primary ms-3" role="button">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty(session('delete'))) : ?>
    <div class="modal fade" id="deletedModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <h1 class="modal-title fs-5">Account deleted</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="deletedError"><?= session('delete') ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <footer class="text-bg-success mt-auto">footer</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/general.js'); ?>"></script>
    <?= $this->renderSection('js'); ?>
</body>
</html>