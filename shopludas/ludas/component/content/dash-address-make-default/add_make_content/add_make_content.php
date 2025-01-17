<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'dashboard_feature.php') ?>
                    <div class="col-lg-9 col-md-12">
                        <form class="dash__address-make">
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                <h2 class="dash__h2 u-s-p-xy-20">Make default Shipping Address</h2>
                                <div class="dash__table-2-wrap gl-scroll">
                                    <table class="dash__table-2">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Region</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="address-1" name="default-address" checked="">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="address-1"></label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->
                                                </td>
                                                <td>John Doe</td>
                                                <td>4247 Ashford Drive Virginia VA-20006 USA</td>
                                                <td>Virginia VA-20006 USA</td>
                                                <td>(+0) 900901904</td>
                                                <td>
                                                    <div class="gl-text">Default Shipping Address</div>
                                                    <div class="gl-text">Default Billing Address</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="address-2" name="default-address">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="address-2"></label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->
                                                </td>
                                                <td>Doe John</td>
                                                <td>1484 Abner Road</td>
                                                <td>Eau Claire WI - Wisconsin</td>
                                                <td>(+0) 7154419563</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>

                                <button class="btn btn--e-brand-b-2" type="submit">SAVE</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
