<?php
    include $level.DATABASE_PATH.'db.php';
    $sql = "SELECT* 
        FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
        INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
        INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
        WHERE LOAISP = :ID
        GROUP BY sanpham.ID
        ORDER BY danhsachanh.ID";
    $result = $db ->prepare($sql);
    $result -> bindValue(':ID', $rowsdata[0]['LOAISP']);
    $result ->execute();
    $rows = $result -> fetchAll();

    $DISCOUNT = $rowsdata[0]['GIA'] - ($rowsdata[0]['GIA'] *($rowsdata[0]['GIAMGIA']/100));
    $DISCOUNT = number_format($DISCOUNT);
    $GIA = number_format($rowsdata[0]['GIA']);
?>
<div class="section__content">
    <div class="container">
        <div class="slider-fouc">
            <div class="owl-carousel product-slider" data-item="4">
                <?php
                    foreach($rows as $value)
                    {   
                        //dem so danh gia
                        $cnt = $db->prepare("SELECT count(*) as 'cnt' FROM binhluan 
                        WHERE binhluan.ID_SP = :ID ");
                        $cnt -> bindValue(':ID', $value[0], PDO::PARAM_STR);
                        $cnt -> execute();
                        $rateCnt = $cnt -> fetch();

                        //tong so sao 
                        $sum = $db->prepare("SELECT SUM(RATE) as 'avgrate' FROM binhluan 
                        WHERE binhluan.ID_SP = :ID ");
                        $sum -> bindValue(':ID', $value[0], PDO::PARAM_STR);
                        $sum -> execute();
                        $rate = $sum -> fetch();
                        
                        ?>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>

                                        <img class="aspect__img" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                            <a href="<?php echo $level.'model/addcart.php?id='.$value[0]?>" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?> data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?> data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href=<?php echo'"'.$level.'index.php"'?>><?php echo $value['TENLOAI']?></a></span>

                                <span class="product-o__name">

                                <a href="<?php echo $level.PAGES_PATH.'product-detail.php?id='.$value[0]?>"><?php echo $value['TENSP']?></a></span>
                                <div class="product-o__rating gl-rating-style">
                                <?php
                                    $starCnt = !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 1;
                                    for($i = 1 ; $i <= 5; $i++ )
                                    { 
                                        if($i <= (int) ($rate['avgrate'] / $starCnt))
                                        echo '<i class="fas fa-star"></i>';
                                        elseif (($i - (int) ($rate['avgrate'] / $starCnt) > 0) && ((int) ($rate['avgrate'] / $starCnt)) != 0) {
                                            // Nếu có phần thập phân, thêm ngôi sao rỗng (outline)
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        } else {
                                            // Ngôi sao rỗng (outline)
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                ?>

                                <span class="product-o__review"><?php echo '('.$rateCnt['cnt'].')' ?></span>
                                </div>

                                <span class="product-o__price"><?php echo '$'.$DISCOUNT ?>

                                    <span class="product-o__discount"> <?php echo '$'.$GIA ?></span></span>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>