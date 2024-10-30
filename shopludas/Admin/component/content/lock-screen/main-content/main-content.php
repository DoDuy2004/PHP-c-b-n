<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class="col">
                    <div class="row h-100 align-items-center">
                        <div class="col-md-10 offset-md-1">
                            <div class="d-block d-lg-none text-center text-lg-start">
                                <img width="120" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo.svg"'?> alt="logo">
                            </div>
                            <div class="text-center text-lg-start mt-5 mt-lg-0">
                                <figure class="avatar avatar-lg">
                                    <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'user/man_avatar3.jpg"'?> class="rounded-circle" alt="avatar">
                                </figure>
                            </div>
                            <div class="my-5 text-center text-lg-start">
                                <h1 class="display-8 mb-3">Login to Continue</h1>
                                <p class="text-muted">Please write down your password and submit</p>
                            </div>
                            <form>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Enter password" autofocus required>
                                </div>
                                <div class="text-center text-lg-start">
                                    <button class="btn btn-primary mb-4">Continue</button>
                                </div>
                            </form>
                            <p class="text-center d-block d-lg-none mt-4 mt-lg-0">
                                You can now <a href=<?php echo'"'.$level.PAGES_PATH.'login.php"'?>>sign in</a> or <a href=<?php echo'"'.$level.PAGES_PATH.'register.php"'?>>create an account</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                    <div class="logo">
                        <img width="120" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo.svg"'?> alt="logo">
                    </div>
                    <div>
                        <h3 class="fw-bold my-5">Do a different action</h3>
                        <div class="text-center">
                            You can now <a class="btn btn-primary btn-sm" href=<?php echo'"'.$level.PAGES_PATH.'login.php"'?>>sign in</a> or
                            <a class="btn btn-primary btn-sm" href=<?php echo'"'.$level.PAGES_PATH.'register.php"'?>>create an account</a>.
                        </div>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>