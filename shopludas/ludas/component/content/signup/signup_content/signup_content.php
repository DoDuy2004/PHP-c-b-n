<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                            <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                            <form class="l-f-o__form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                            <span>Signup with Facebook</span></button></div>
                                    <div class="u-s-m-b-30">

                                        <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                            <span>Signup with Google</span></button></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                    <input class="input-text input-text--primary-style" name="fname" type="text" id="reg-fname" placeholder="First Name"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                    <input class="input-text input-text--primary-style" name="lname" type="text" id="reg-lname" placeholder="Last Name"></div>
                                <div class="gl-inline" style="display: flex;">
                                    <div class="u-s-m-b-30">
                                        <span class="gl-label">BIRTHDAY</span>
                                        <input class="input-text input-text--primary-style" name="bdate" type="date" placeholder="Last Name">
                                        <!--====== End - Date of Birth Select-Box ======-->
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="gender">GENDER</label>
                                        <select class="select-box select-box--primary-style u-w-100" id="gender">
                                            <option selected>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" name="email" type="text" id="reg-email" placeholder="Enter E-mail"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-password">PASSWORD *</label>

                                    <input class="input-text input-text--primary-style" name="pass" type="password" id="reg-password" placeholder="Enter Password"></div>
                                <div class="u-s-m-b-15">

                                    <button class="btn btn--e-transparent-brand-b-2" name="btn-signup" type="submit">CREATE</button></div>

                                <a class="gl-link" href="<?php echo $level.PAGES_PATH.'signin.php' ?>">Return to signin</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>