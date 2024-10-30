<?php
    if(isset($_SESSION['email']) && isset($_SESSION['pass']))
    {
        $email = $_SESSION['email'];
        $pass = $_SESSION['pass'];
    }
?>
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="checkout-msg-group">
                    <?php
                                if(!isset($_COOKIE['email']))
                                { ?>
                                    <div class="msg u-s-m-b-30">

                                        <span class="msg__text">Returning customer?

                                            <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                        <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                            <div class="l-f u-s-m-b-16">

                                                <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                                <form class="l-f__form" action="<?php echo $level.'model/signin.php'?>" method="post">
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-email">E-MAIL *</label>

                                                            <input class="input-text input-text--primary-style" name="email" value="<?php  if(isset($email)) echo $email ?>"  type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-password">PASSWORD *</label>

                                                            <input class="input-text input-text--primary-style" name="pass" value="<?php if(isset($email)) echo $pass ?>" type="text" id="login-password" placeholder="Enter Password"></div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <button class="btn btn--e-transparent-brand-b-2" name="btn-log" type="submit">LOGIN</button></div>
                                                        <div class="u-s-m-b-15">

                                                            <a class="gl-link" href=<?php echo'"'.$level.PAGES_PATH.'lost-password.php"'?>>Lost Your Password?</a></div>
                                                    </div>

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" name="rmb" id="remember-me">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }   
                            ?>
                        <div class="msg">

                            <span class="msg__text">Have a coupon?

                                <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                            <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                <div class="c-f u-s-m-b-16">

                                    <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                    <form class="c-f__form">
                                        <div class="u-s-m-b-16">
                                            <div class="u-s-m-b-15">

                                                <label for="coupon"></label>

                                                <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>