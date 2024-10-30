<?php
    include $level.DATABASE_PATH.'db.php';

    $stmt = $db ->prepare("SELECT* 
    FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
    INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
    INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
    INNER JOIN trangthai on trangthai.id = sanpham.TRANGTHAI
    INNER JOIN uudai on uudai.ID_SP = sanpham.ID
    WHERE trangthai.TENTT = 'Active'
    GROUP BY sanpham.ID
    ORDER BY danhsachanh.ID");
    $stmt ->execute();
    $dealofDay = $stmt -> fetchAll();
?>
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">DEAL OF THE DAY</h1>

                        <span class="section__span u-c-silver">BUY DEAL OF THE DAY, HURRY UP! THESE NEW PRODUCTS WILL EXPIRE SOON.</span>

                        <span class="section__span u-c-silver">ADD THESE ON YOUR CART.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <?php foreach ($dealofDay as $value) :
                    $DISCOUNT = $value['GIA'] - ($value['GIA'] *($value['GIAMGIA']/100));
                    $DISCOUNT = number_format($DISCOUNT,2);
                    $GIA = number_format($value['GIA'],2);
                 ?>
                    <div class="col-lg-6 col-md-6 u-s-m-b-30">
                        <div class="product-o product-o--radius product-o--hover-off u-h-100">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>

                                    <img class="aspect__img" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt=""></a>
                                <div class="product-o__special-count-wrap">
                                    <div class="countdown countdown--style-special" data-countdown="2023/12/27"></div>
                                </div>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                        <li>

                                            <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li>

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?> data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li>

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?> data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><?php echo $value['TENLOAI']?></a></span>

                            <span class="product-o__name">

                                <a href="<?php echo $level.PAGES_PATH.'product-detail.php?id='.$value[0]?>"><?php echo $value['TENSP']?></a></span>
                            <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                <span class="product-o__review">(2)</span></div>

                            <span class="product-o__price"><?php echo '$'.$DISCOUNT ?>

                                <span class="product-o__discount"><?php echo '$'.$GIA ?></span></span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>