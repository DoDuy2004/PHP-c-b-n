<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="d-block d-lg-none text-center text-lg-start">
                                <img width="120" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo.svg"'?> alt="logo">
                            </div>
                            <div class="my-5 text-center text-lg-start">
                                <h1 class="display-8">Sign In</h1>
                                <p class="text-muted">Sign in to Vetra to continue</p>
                            </div>
                            <form class="mb-5" method="post" action="<?php echo $level.'form/login.php' ?>">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="pass" class="form-control" placeholder="Enter password" required>
                                </div>
                                <p><?php if(isset($text)) echo $text ?></p>
                                <div class="text-center text-lg-start">
                                    <p class="small">Can't access your account? <a href=<?php echo'"'.$level.PAGES_PATH.'reset-password.php"'?>>Reset your password now</a>.</p>
                                    <button class="btn btn-primary" name="btn-log">Sign In</button>
                                </div>
                            </form>
                            <div class="social-links justify-content-center">
                                <a href="#">
                                    <i class="ti-google bg-google"></i> Sign in with Google
                                </a>
                                <a href="#">
                                    <i class="ti-facebook bg-facebook"></i> Sign in with Facebook
                                </a>
                            </div>
                            <p class="text-center d-block d-lg-none mt-5 mt-lg-0">
                                Don't have an account? <a href="#">Sign up</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                    <div class="logo">
                        <img width="120" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo.svg"'?> alt="logo">
                    </div>
                    <div>
                        <h3 class="fw-bold">Welcome to Vetra!</h3>
                        <!-- <p class="lead my-5">If you don't have an account, would you like to register right now?</p> -->
                        <!-- <a href=<?php //echo'"'.$level.PAGES_PATH.'register.php"'?> class="btn btn-primary">Sign Up</a> -->
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