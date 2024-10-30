<?php
if(isset($_SESSION['email']) && isset($_SESSION['pass']))
{
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
}
?>
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row row--center">
                <div class="col-lg-6 col-md-8 u-s-m-b-30">
                    <div class="l-f-o">
                        <div class="l-f-o__pad-box">
                            <h1 class="gl-h1">I'M NEW CUSTOMER</h1>

                            <span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</span>
                            <div class="u-s-m-b-15">

                                <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="<?php echo $level.PAGES_PATH.'signup.php' ?>">CREATE AN ACCOUNT</a></div>
                            <h1 class="gl-h1">SIGNIN</h1>

                            <span class="gl-text u-s-m-b-30">If you have an account with us, please log in.</span>
                            <form class="l-f-o__form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                            <span>Signin with Facebook</span></button></div>
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                            <span>Signin with Google</span></button></div>
                                </div>
                                <p style="padding: 1rem 0;color: red; font-size:1rem"><?php if(!isset($_COOKIE['email']) ) echo $text ?></p>

                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="login-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" type="text" name="email" id="login-email" value="<?php  if(isset($email)) echo $email ?>" placeholder="Enter E-mail"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="login-password">PASSWORD *</label>

                                    <input class="input-text input-text--primary-style" name="pass" type="password" id="login-password" value="<?php if(isset($email)) echo $pass ?>" placeholder="Enter Password"></div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <button class="btn btn--e-transparent-brand-b-2" name="btn-log" type="submit">LOGIN</button></div>
                                    <div class="u-s-m-b-30">

                                        <a class="gl-link" href=<?php echo'"'.$level.PAGES_PATH.'lost-password.php"'?>>Lost Your Password?</a></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <!--====== Check Box ======-->
                                    <div class="check-box">

                                        <input type="checkbox" id="remember-me" name="rmb" value="1">
                                        <div class="check-box__state check-box__state--primary">

                                            <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>