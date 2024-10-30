<?php
    include $level.DATABASE_PATH.'db.php';

    $customer = $db->prepare('SELECT * FROM nguoidung WHERE nguoidung.ID = :ID');
    $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
    $customer->execute();
    $result = $customer->fetch();

?>
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="dash">
            <div class="container">
                <div class="row">
                    <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'dashboard_feature.php') ?>
                    <div class="col-lg-9 col-md-12">
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>

                                <span class="dash__text u-s-m-b-30">Look all your info, you could customize your profile.</span>
                                <div class="row">
                                    <div class="col-lg-4 u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>

                                        <span class="dash__text"><?php echo $result['HOTEN']?></span>
                                    </div>
                                    <div class="col-lg-4 u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                        <span class="dash__text"><?php echo $_COOKIE['email']?></span>
                                        <div class="dash__link dash__link--secondary">

                                            <a href="<?php echo $level.PAGES_PATH.'dash-edit-profile.php?id='.$_COOKIE['id']?>">Change</a></div>
                                    </div>
                                    <div class="col-lg-4 u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                        <span class="dash__text"><?php echo $result['SDT']?></span>
                                        <div class="dash__link dash__link--secondary">

                                            <?php
                                                if(!isset($result['SDT']))
                                                { ?>
                                                    <a href="<?php echo $level.PAGES_PATH.'dash-edit-profile.php'?>">Add</a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($result['SDT']))
                                                {?>
                                                    <a href="<?php echo $level.PAGES_PATH.'dash-edit-profile.php'?>">Edit</a>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 u-s-m-b-30">
                                        <h2 class="dash__h2 u-s-m-b-8">Birthday</h2>

                                        <span class="dash__text"><?php echo $result['NGAYSINH']?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dash__link dash__link--secondary u-s-m-b-30">

                                            <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                        <div class="u-s-m-b-16">

                                            <a class="dash__custom-link btn--e-transparent-brand-b-2" href="<?php echo $level.PAGES_PATH.'dash-edit-profile.php'?>">Edit Profile</a></div>
                                        <div>

                                            <a class="dash__custom-link btn--e-brand-b-2" href="<?php echo $level.PAGES_PATH.'change-password.php'?>">Change Password</a></div>
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