
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'dashboard_feature.php') ?>
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14">Add new Address</h1>

                                <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
                                <form class="dash-address-manipulation" action="<?php echo $level.'model/add-address.php'?>" method="post">
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-fname" >FIRST NAME *</label>

                                            <input class="input-text input-text--primary-style" name="fname" type="text" id="address-fname" placeholder="First Name"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-lname">LAST NAME *</label>

                                            <input class="input-text input-text--primary-style" name="lname" type="text" id="address-lname" placeholder="Last Name"></div>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-phone">PHONE *</label>

                                            <input class="input-text input-text--primary-style" name="phone" type="text" id="address-phone"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-street">ADDRESS *</label>

                                            <input class="input-text input-text--primary-style" name="address" type="text" id="address-street" placeholder="House Name and Street"></div>
                                    </div>

                                    <button class="btn btn--e-brand-b-2" type="submit" name="btn">SAVE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>