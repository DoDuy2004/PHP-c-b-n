<?php
    include $level.DATABASE_PATH.'db.php';
    $ID = $_GET['id'];
    $customer = $db->prepare('SELECT * FROM diachigh WHERE diachigh.ID = :ID');
    $customer->bindValue(':ID', $ID, PDO::PARAM_STR);
    $customer->execute();
    $result = $customer->fetch();
    
    if(!empty($result))
    {
        $nameParts = explode(" ", $result['HOTEN']);
        $Ho = '';
        for($i = 0; $i<count($nameParts) - 1 ; $i++)
        {
            $Ho.=' '.$nameParts[$i];
        }
        $Ten = end($nameParts);
    }
?>
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
                                <h1 class="dash__h1 u-s-m-b-14">Edit Address</h1>

                                <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
                                <form class="dash-address-manipulation" action="<?php echo $level.'model/edit-address.php?id='.$result['ID']?>" method="post">
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-fname">FIRST NAME *</label>

                                            <input class="input-text input-text--primary-style" name="fname" type="text" value="<?php echo $Ho ?>" id="address-fname" placeholder="First Name"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-lname">LAST NAME *</label>

                                            <input class="input-text input-text--primary-style" name="lname" type="text" value="<?php echo $Ten ?>" id="address-lname" placeholder="Last Name"></div>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-phone">PHONE *</label>

                                            <input class="input-text input-text--primary-style" name="phone" type="text" value="<?php echo $result['SDT']?>" id="address-phone"></div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-street">ADDRESS *</label>

                                            <input class="input-text input-text--primary-style" name="address" value="<?php echo $result['DIACHI']?>" type="text" id="address-street" placeholder="House Name and Street"></div>
                                    </div>

                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
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