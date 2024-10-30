<?php
    include $level.DATABASE_PATH.'db.php';

    $customer = $db->prepare('SELECT * FROM diachigh WHERE diachigh.ID_KH = :ID');
    $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
    $customer->execute();
    $result = $customer->fetchAll();
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
                                <div class="dash__address-header">
                                    <h1 class="dash__h1">Address Book</h1>
                                    <div>

                                        <!-- <span class="dash__link dash__link--black u-s-m-r-8">

                                            <a href=<?php//  echo'"'.$level.PAGES_PATH.'dash-address-make-default.php"'?>>Make default shipping address</a></span> -->
                                </div>
                            </div>
                        </div>
                        <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                            <div class="dash__table-2-wrap gl-scroll">
                                <table class="dash__table-2">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($result as $value)
                                            { ?>
                                                <tr>
                                                    <td>

                                                        <a class="address-book-edit btn--e-transparent-platinum-b-2" href="<?php echo $level.PAGES_PATH.'dash-address-edit.php?id='.$value['ID'];?>">Edit</a></td>
                                                    <td><?php echo $value['HOTEN']?></td>
                                                    <td><?php echo $value['DIACHI']?></td>
                                                    <td><?php echo $value['SDT']?></td>
                                                    <td><?php echo $value['TRTHAI']?></td>
                                                </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>

                            <a class="dash__custom-link btn--e-brand-b-2" href=<?php echo'"'.$level.PAGES_PATH.'dash-address-add.php"'?>><i class="fas fa-plus u-s-m-r-8"></i>

                                <span>Add New Address</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>