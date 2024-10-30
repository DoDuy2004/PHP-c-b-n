<?php 

    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $sql = "SELECT * 
            FROM sanpham inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.ID
            inner join loaisp on loaisp.ID = sanpham.LOAISP
            WHERE sanpham.ID = :ID";
    $data = $db -> prepare($sql);
    $data->bindValue(':ID', $ID, PDO::PARAM_STR);
    $data->execute();
    $product = $data -> fetch();

    $DISCOUNT = $product['GIA'] - ($product['GIA'] *($product['GIAMGIA']/100));
    $DISCOUNT = number_format($DISCOUNT,2);
    $GIA = number_format($product['GIA'],2);

    //Binh luan
    include $level.DATABASE_PATH.'db.php';
    $allCmt = $db->prepare('SELECT * FROM binhluan INNER JOIN nguoidung on binhluan.ID_KH = nguoidung.ID
    WHERE binhluan.ID_SP = :ID AND binhluan.TRTHAI_CMT = :active');
    $allCmt -> bindValue(':ID', $ID, PDO::PARAM_STR);
    $allCmt -> bindValue(':active', 1 , PDO::PARAM_INT);
    $allCmt -> execute();
    $results = $allCmt -> fetchAll();

    //dem so danh gia
    $cnt = $db->prepare("SELECT count(*) as 'cnt' FROM binhluan 
    WHERE binhluan.ID_SP = :ID ");
    $cnt -> bindValue(':ID', $ID, PDO::PARAM_STR);
    $cnt -> execute();
    $rateCnt = $cnt -> fetch();

    //tong so sao 
    $sum = $db->prepare("SELECT SUM(RATE) as 'avgrate' FROM binhluan 
    WHERE binhluan.ID_SP = :ID ");
    $sum -> bindValue(':ID', $ID, PDO::PARAM_STR);
    $sum -> execute();
    $rate = $sum -> fetch();

    $starCnt = !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 1;

    $starRate = $rate['avgrate'] / $starCnt;

?>
<div class="pd-detail">
    <div>

        <span class="pd-detail__name"><?php echo $product['TENSP']?></span></div>
    <div>
        <div class="pd-detail__inline">

            <span class="pd-detail__price"><?php echo '$'.$DISCOUNT?></span>

            <span class="pd-detail__discount"><?php echo '('.$product['GIAMGIA'].'%  OFF)' ?></span><del class="pd-detail__del"><?php echo '$'.$GIA?></del></div>
    </div>
    <div class="u-s-m-b-15">
        <div class="pd-detail__rating gl-rating-style">
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

            <span class="pd-detail__review u-s-m-l-4">

                <a data-click-scroll="#view-review"><?php echo '('.sizeof($results).')'?></a></span></div>
    </div>
    <div class="u-s-m-b-15">
        <div class="pd-detail__inline">

            <span class="pd-detail__stock"><?php echo $product['TONKHO'].' in stock'?></span>

            <span class="pd-detail__left">Only 2 left</span></div>
    </div>
    <div class="u-s-m-b-15">

        <span class="pd-detail__preview-desc"><?php echo $product['9']?></span></div>
    <div class="u-s-m-b-15">
        <div class="pd-detail__inline">

            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?>>Add to Wishlist</a>

                <span class="pd-detail__click-count">(222)</span></span></div>
    </div>
    <div class="u-s-m-b-15">
        <div class="pd-detail__inline">

            <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?>>Email me When the price drops</a>

                <span class="pd-detail__click-count">(20)</span></span></div>
    </div>
    <div class="u-s-m-b-15">
        <ul class="pd-social-list">
            <li>

                <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li>

                <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
            <li>

                <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
            <li>

                <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
            <li>

                <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
        </ul>
    </div>
    <div class="u-s-m-b-15">
        <form class="pd-detail__form" method="post" action="<?php echo $level.'model/addcart.php?id='.$product[0]?>">
            <div class="u-s-m-b-15">

                <span class="pd-detail__label u-s-m-b-8">Color:</span>
                <div class="pd-detail__color">
                    <div class="color__radio">

                        <input type="radio" id="jet" name="color" checked>

                        <label class="color__radio-label" for="jet" style="background-color: #333333"></label></div>
                    <div class="color__radio">

                        <input type="radio" id="folly" name="color">

                        <label class="color__radio-label" for="folly" style="background-color: #FF0055"></label></div>
                    <div class="color__radio">

                        <input type="radio" id="yellow" name="color">

                        <label class="color__radio-label" for="yellow" style="background-color: #FFFF00"></label></div>
                    <div class="color__radio">

                        <input type="radio" id="granite-gray" name="color">

                        <label class="color__radio-label" for="granite-gray" style="background-color: #605F5E"></label></div>
                    <div class="color__radio">

                        <input type="radio" id="space-cadet" name="color">

                        <label class="color__radio-label" for="space-cadet" style="background-color: #1D3461"></label></div>
                </div>
            </div>
            <div class="u-s-m-b-15">

                <span class="pd-detail__label u-s-m-b-8">Size:</span>
                <div class="pd-detail__size">
                    <div class="size__radio">

                        <input type="radio" id="xs" name="size" checked>

                        <label class="size__radio-label" for="xs">64GB</label></div>
                    <div class="size__radio">

                        <input type="radio" id="small" name="size">

                        <label class="size__radio-label" for="xxl">128GB</label></div>
                    <div class="size__radio">

                        <input type="radio" id="medium" name="size">

                        <label class="size__radio-label" for="medium">256GB</label></div>
                    <div class="size__radio">

                        <input type="radio" id="large" name="size">

                        <label class="size__radio-label" for="xxl">512GB</label></div>
                    <div class="size__radio">

                        <input type="radio" id="xl" name="size">

                        <label class="size__radio-label" for="xl">1TB</label></div>
                </div>
            </div>
            <div class="pd-detail-inline-2">
                <div class="u-s-m-b-15">

                    <!--====== Input Counter ======-->
                    <div class="input-counter">

                        <span class="input-counter__minus fas fa-minus"></span>

                        <input class="input-counter__text input-counter--text-primary-style" name="quantity" type="text" value="1" data-min="1" data-max="<?php echo $product['TONKHO']?>">

                        <span class="input-counter__plus fas fa-plus"></span></div>
                    <!--====== End - Input Counter ======-->
                </div>
                <div class="u-s-m-b-15">

                    <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button></div>
            </div>
        </form>
    </div>
    <div class="u-s-m-b-15">

        <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
        <ul class="pd-detail__policy-list">
            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                <span>Buyer Protection.</span></li>
            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                <span>Full Refund if you don't receive your order.</span></li>
            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                <span>Returns accepted if product not as described.</span></li>
        </ul>
    </div>
</div>