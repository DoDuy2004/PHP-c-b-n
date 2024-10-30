<?php
    include $level.DATABASE_PATH.'db.php';
    $ID = $_GET['id'];
    if(isset($_COOKIE['email']))
    {
        $orders = $db -> prepare("SELECT * FROM hoadon 
        INNER JOIN trangthaidonhang on trangthaidonhang.ID = hoadon.TRTHAI
        INNER JOIN phuongthucthanhtoan on phuongthucthanhtoan.ID = hoadon.PTTT
        WHERE hoadon.ID= :ID");
        $orders -> bindValue(':ID', $ID,PDO::PARAM_STR );
        $orders -> execute();

        $result = $orders -> fetch(); 

        $detailOrder = $db -> prepare('SELECT * FROM hoadon
        INNER JOIN chitiethoadon on hoadon.ID = chitiethoadon.ID_HD
        INNER JOIN sanpham on sanpham.ID = chitiethoadon.ID_SP
        WHERE chitiethoadon.ID_HD = :ID');
        $detailOrder -> bindValue(':ID', $ID,PDO::PARAM_STR );
        $detailOrder -> execute();

        $detail = $detailOrder -> fetchAll();   
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
                        <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="dash-l-r">
                                    <div>
                                        <div class="manage-o__text-2 u-c-secondary"><?php echo 'Order: #'.$result[0]?></div>
                                        <div class="manage-o__text u-c-silver"><?php echo 'Placed on: '.$result['NGAYLAP']?></div>
                                    </div>
                                    <div>
                                        <div class="manage-o__text-2 u-c-silver">Total:

                                            <span class="manage-o__text-2 u-c-secondary"><?php echo '$'.number_format($result['TONGTTIEN'],2)?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <div class="manage-o">
                                    <div class="manage-o__header u-s-m-b-30">
                                        <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                            <span class="manage-o__text">Package 1</span></div>
                                    </div>
                                    <div class="dash-l-r">
                                        <div class="manage-o__text u-c-secondary"><?php echo'Expected delivery on '.$result['NGAYLAP']//->modify('+3 days');?></div>
                                        <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                            <span class="manage-o__text">Standard</span></div>
                                    </div>
                                    <div class="manage-o__timeline">
                                        <div class="timeline-row">
                                            <?php
                                                $sql = "SELECT * FROM trangthaidonhang";

                                                if($result['TENTT_DH'] == 'Cancelled')
                                                {
                                                    $sql.= " WHERE trangthaidonhang.TENTT_DH <> 'Processing' and trangthaidonhang.TENTT_DH <> 'Confirmed'";
                                                }
                                                else if($result['TENTT_DH'] == 'Processing')
                                                {
                                                    $sql.= " WHERE trangthaidonhang.TENTT_DH <> 'Cancelled' and trangthaidonhang.TENTT_DH <> 'Confirmed'";
                                                }
                                                else
                                                    $sql.= " WHERE trangthaidonhang.TENTT_DH <> 'Cancelled' and trangthaidonhang.TENTT_DH <> 'Processing'";
                                                $status = $db -> prepare($sql);
                                                $status -> execute();
                                        
                                                $listStatus = $status -> fetchAll(); 
                                                
                                                foreach($listStatus as $value)
                                                { ?>
                                                    <div class="col-lg-3 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i <?php if($result[4] >= $value['ID']) echo 'timeline-l-i--finish'?>">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text" style="color:<?php if($result['TENTT_DH'] == 'Cancelled') echo 'red'; else echo 'green'; ?>"><?php echo $value['TENTT_DH'] ?></span>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                        $subTotal = 0;
                                        foreach($detail as $item)
                                        { ?>
                                            <?php 
                                                $subTotal += $item['SOLUONG'] * $item['DONGIA'];
                                            ?>
                                            <div class="manage-o__description">
                                                <div class="description__container">
                                                    <div class="" style="width: 5rem; height: 5rem;" >

                                                        <img class="u-img-fluid"src="<?php echo $level.IMG_PATH.'product/'.$item['ANH']?>" alt=""></div>
                                                    <div class="description-title"><?php echo $item['TENSP']?></div>
                                                </div>
                                                <div class="description__info-wrap">
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Quantity:

                                                            <span class="manage-o__text-2 u-c-secondary"><?php echo $item['SOLUONG']?></span></span></div>
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Total:

                                                            <span class="manage-o__text-2 u-c-secondary"><?php echo '$'.number_format($item['DONGIA']*$item['SOLUONG'],2)?></span></span></div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-3">
                                        <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                                        <h2 class="dash__h2 u-s-m-b-8"><?php echo $result['TEN_NN']?></h2>

                                        <span class="dash__text-2"><?php echo $result['DC_NHANHANG']?></span>

                                        <span class="dash__text-2"><?php echo $result['SDT']?></span>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                    <div class="dash__pad-3">
                                        <h2 class="dash__h2 u-s-m-b-8">Billing Address</h2>
                                        <h2 class="dash__h2 u-s-m-b-8"><?php echo $result['TEN_NN']?></h2>

                                        <span class="dash__text-2"><?php echo $result['DC_NHANHANG']?></span>

                                        <span class="dash__text-2"><?php echo $result['SDT']?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                    <div class="dash__pad-3">
                                        <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                            <div class="manage-o__text-2 u-c-secondary"><?php echo '$'.number_format($subTotal,2)?></div>
                                        </div>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">Shipping Fee</div>
                                            <div class="manage-o__text-2 u-c-secondary"><?php $ship = 4; echo '$'.number_format($ship,2)?></div>
                                        </div>
                                        <div class="dash-l-r u-s-m-b-8">
                                            <div class="manage-o__text-2 u-c-secondary">Total</div>
                                            <div class="manage-o__text-2 u-c-secondary"><?php echo '$'.number_format($subTotal+$ship,2)?></div>
                                        </div>

                                        <span class="dash__text-2"><?php echo 'Paid by '.$result['TENPT']?></span>
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