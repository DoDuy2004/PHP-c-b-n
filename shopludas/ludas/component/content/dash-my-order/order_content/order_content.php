<?php
    include $level.DATABASE_PATH.'db.php';
    if(isset($_COOKIE['email']))
    {
        $orders = $db -> prepare('SELECT * FROM hoadon 
        INNER JOIN trangthaidonhang on trangthaidonhang.ID = hoadon.TRTHAI
        WHERE hoadon.ID_KH = :ID
        ORDER BY hoadon.ID desc');
        $orders -> bindValue(':ID', $_COOKIE['id'],PDO::PARAM_STR );
        $orders -> execute();

        $result = $orders -> fetchAll(); 
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
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                            <div class="dash__pad-2">
                                <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                                <form class="m-order u-s-m-b-30">
                                    <div class="m-order__select-wrapper">

                                        <label class="u-s-m-r-8" for="my-order-sort">Show:</label><select class="select-box select-box--primary-style" id="my-order-sort">
                                            <option selected>Last 5 orders</option>
                                            <option>Last 15 days</option>
                                            <option>Last 30 days</option>
                                            <option>Last 6 months</option>
                                            <option>Orders placed in 2018</option>
                                            <option>All Orders</option>
                                        </select></div>
                                </form>
                                <div class="m-order__list">
                                    <?php
                                        foreach($result as $value)
                                        {?>
                                            <?php
                                                $detailOrder = $db -> prepare('SELECT * FROM hoadon
                                                INNER JOIN chitiethoadon on hoadon.ID = chitiethoadon.ID_HD
                                                INNER JOIN sanpham on sanpham.ID = chitiethoadon.ID_SP
                                                WHERE chitiethoadon.ID_HD = :ID');
                                                $detailOrder -> bindValue(':ID', $value[0],PDO::PARAM_STR );
                                                $detailOrder -> execute();
                                        
                                                $detail = $detailOrder -> fetchAll();   
                                            ?>
                                            <div class="m-order__get">
                                                <div class="manage-o__header u-s-m-b-30">
                                                    <div class="dash-l-r">
                                                        <div>
                                                            <div class="manage-o__text-2 u-c-secondary"><?php echo 'Order: '.'#'.$value[0]?></div>
                                                            <div class="manage-o__text u-c-silver"><?php echo 'Placed on: '.$value['NGAYLAP']?></div>
                                                        </div>
                                                        <div>
                                                            <div class="dash__link dash__link--brand">

                                                                <a href="<?php echo $level.PAGES_PATH.'dash-manage-order.php?id='.$value[0]?>">MANAGE</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="manage-o__description">
                                                    <div class="">
                                                        <!-- <div class="description__img-wrap">

                                                            <img class="u-img-fluid" src="<?php// echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt=""></div> -->
                                                        <?php
                                                            foreach($detail as $item)
                                                            {?>
                                                                <div class="description-title"><?php echo  $item['TENSP'].' x '.$item['SOLUONG'].'<br>'?></div>
                                                            <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="description__info-wrap">
                                                        <div>

                                                            <span class="manage-o__badge badge--<?php echo colorStatus($value['TENTT_DH'])?>"><?php echo $value['TENTT_DH']?></span></div>
                                                        
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo '$'.number_format($value['TONGTTIEN'],2)?></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    ?>
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