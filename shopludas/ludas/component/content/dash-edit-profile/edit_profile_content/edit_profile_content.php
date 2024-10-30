<?php
    include $level.DATABASE_PATH.'db.php';

    $customer = $db->prepare('SELECT * FROM nguoidung WHERE nguoidung.ID = :ID');
    $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
    $customer->execute();
    $result = $customer->fetch();

    $nameParts = explode(" ", $result['HOTEN']);

    $Ho = '';
    for($i = 0; $i<count($nameParts) - 1 ; $i++)
    {
        $Ho.=' '.$nameParts[$i];
    }
    $Ten = end($nameParts);
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
                                <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
                                <div class="dash__link dash__link--secondary u-s-m-b-30">

                                    <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="dash-edit-p" action="<?php echo $level.'model/edit-profile.php'?>" method="post">
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                                    <input class="input-text input-text--primary-style"  name="fname" type="text" id="reg-fname" value="<?php echo $Ho?>" placeholder="John"></div>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                                    <input class="input-text input-text--primary-style" name="lname" type="text" id="reg-lname" value="<?php echo $Ten ?>" placeholder="Doe"></div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <span class="gl-label">BIRTHDAY</span>
                                                    <input class="input-text input-text--primary-style" name="bdate" type="date" value="<?php echo $result['NGAYSINH']?>">
                                                    <!--====== End - Date of Birth Select-Box ======-->
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                    <input class="input-text input-text--primary-style" name="email" type="text" value="<?php echo $result['EMAIL']?>">
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                                    <input class="input-text input-text--primary-style" name="phone" type="text" value="<?php echo $result['SDT']?>" placeholder="Please enter your mobile">
                                                </div>
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
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>