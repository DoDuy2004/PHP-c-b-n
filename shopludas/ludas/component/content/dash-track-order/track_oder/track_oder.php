<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <?php include($level.COMPONENT_PATH.REUSE_PATH.'dashboard_feature.php') ?>
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14">Track your Order</h1>

                                <span class="dash__text u-s-m-b-30">To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</span>
                                <form class="dash-track-order">
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="order-id">Order ID *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="order-id" placeholder="Found in your confirmation email"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="track-email">Email *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="track-email" placeholder="Email you used during checkout"></div>
                                    </div>

                                    <button class="btn btn--e-brand-b-2" type="submit">TRACK</button>
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