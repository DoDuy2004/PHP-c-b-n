<?php
    include $level.DATABASE_PATH.'db.php';

    $customer = $db->prepare('SELECT * FROM nguoidung WHERE nguoidung.ID = :ID');
    $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
    $customer->execute();
    $result = $customer->fetch();

    include $level.DATABASE_PATH.'db.php';

    $addr = $db->prepare('SELECT * FROM diachigh WHERE TRTHAI = "Default Shipping Address" and ID_KH = :ID');
    $addr -> bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
    $addr->execute();
    $data = $addr->fetch();

    $orders = $db -> prepare('SELECT * FROM hoadon 
    INNER JOIN trangthaidonhang on trangthaidonhang.ID = hoadon.TRTHAI
    WHERE hoadon.ID_KH = :ID');
    $orders -> bindValue(':ID', $_COOKIE['id'],PDO::PARAM_STR );
    $orders -> execute();

    $rowsdata = $orders -> fetchAll(); 
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
                                <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>

                                <span class="dash__text u-s-m-b-30">From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</span>
                                <div class="row">
                                    <div class="col-lg-6 u-s-m-b-30">
                                        <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                    <a href="<?php echo $level.PAGES_PATH.'dash-edit-profile.php'?>">Edit</a></div>

                                                <span class="dash__text"><?php echo $result['HOTEN']?></span>

                                                <span class="dash__text"><?php echo $result['EMAIL']?></span>
                                                <div class="dash__link dash__link--secondary u-s-m-t-8">

                                                    <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 u-s-m-b-30">
                                        <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                            <div class="dash__pad-3">
                                                <h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>

                                                <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                                                <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                <?php
                                                    if(!isset($data['DIACHI']))
                                                    { ?>
                                                        <a href="<?php echo $level.PAGES_PATH.'dash-address-add.php'?>">Add</a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if(isset($data['DIACHI']))
                                                    {?>
                                                        <a href="<?php echo $level.PAGES_PATH.'dash-address-edit.php?id='.$data['ID']?>">Edit</a>
                                                    <?php
                                                    }
                                                ?>
                                                </div>
                                                <span class="dash__text"><?php if(isset($data['DIACHI'])) echo $data['DIACHI']?></span>

                                                <span class="dash__text"><?php if(isset($data['SDT'])) echo $data['SDT']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                            <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
                            <div class="dash__table-wrap gl-scroll">
                                <table class="dash__table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Placed On</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($rowsdata as $value)
                                            { ?>
                                                <tr>
                                                    <td><?php echo $value[0]?></td>
                                                    <td><?php echo $value['NGAYLAP']?></td>
                                                    <td>
                                                        <div class="dash__table-total">

                                                            <span><?php echo '$'.number_format($value['TONGTTIEN'],2)?></span>
                                                            <div class="dash__link dash__link--brand">

                                                                <a href="<?php echo $level.PAGES_PATH.'dash-manage-order.php?id='.$value[0]?>">MANAGE</a></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>