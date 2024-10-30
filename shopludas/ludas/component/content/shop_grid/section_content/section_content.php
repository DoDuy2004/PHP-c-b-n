<?php 
    include $level.DATABASE_PATH.'db.php';
    $sql = "SELECT *  FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
        INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
        INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
        INNER JOIN trangthai on trangthai.id = sanpham.TRANGTHAI
        WHERE trangthai.TENTT = 'Active'
        GROUP BY sanpham.ID";
    $result = $db ->prepare($sql);
    $result ->execute();
    $rowsdata = $result -> fetchAll();
    $sodong = sizeof($rowsdata);

    $sanpham_moi_trang = isset($_GET['sosanpham']) ? $_GET['sosanpham'] : 8;

    if($sodong % $sanpham_moi_trang == 0)
    {
        $sotrang = $sodong / $sanpham_moi_trang;
    }
    else
        $sotrang = (int) ($sodong / $sanpham_moi_trang) + 1;

    if(isset($_GET['tranghientai']))
    {
        $tranghientai = $_GET['tranghientai'];
    }
    else
        $tranghientai = 1;

    $offset = ($tranghientai - 1) * $sanpham_moi_trang;

    $result_ptrang = $db ->prepare("SELECT *  FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
    INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
    INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
    INNER JOIN trangthai on trangthai.id = sanpham.TRANGTHAI
    WHERE trangthai.TENTT = 'Active'
    GROUP BY sanpham.ID
    LIMIT :lim OFFSET :offset");
    $result_ptrang->bindValue(':lim', $sanpham_moi_trang, PDO::PARAM_INT);
    $result_ptrang->bindValue(':offset', $offset, PDO::PARAM_INT);
    $result_ptrang ->execute();
    $rowsdata_ptrang = $result_ptrang -> fetchAll();

?>
<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-p">
                    <div class="shop-p__toolbar u-s-m-b-30">
                        <div class="shop-p__meta-wrap u-s-m-b-60">

                            <span class="shop-p__meta-text-1">FOUND 18 RESULTS</span>
                            <div class="shop-p__meta-text-2">

                                <span>Related Searches:</span>

                                <a class="gl-tag btn--e-brand-shadow" href="#">Smartphone</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">Laptop & audible</a></div>
                        </div>
                        <div class="shop-p__tool-style">
                            <div class="tool-style__group u-s-m-b-8">

                                <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

                                <span class="js-shop-grid-target is-active">Grid</span>

                                <span class="js-shop-list-target">List</span></div>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
                                <div class="tool-style__form-wrap">
                                    <div class="u-s-m-b-8">
                                        <select name="sosanpham" class="select-box select-box--transparent-b-2" onchange="this.form.submit()">
                                            <?php
                                                for($i = 8 ; $i<=24 ; $i+=4)
                                                {?>
                                                    <?php echo "<option value='$i' " . ($sanpham_moi_trang == $i ? 'selected' : '') . ">Show: $i</option>"?>
                                                <?php
                                                }
                                            ?>
                                        </select></div>
                                    <!-- <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option selected>Sort By: Newest Items</option>
                                            <option>Sort By: Latest Items</option>
                                            <option>Sort By: Best Selling</option>
                                            <option>Sort By: Best Rating</option>
                                            <option>Sort By: Lowest Price</option>
                                            <option>Sort By: Highest Price</option>
                                        </select></div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="shop-p__collection">
                        <div class="row is-grid-active">
                            
                            <?php 
                            foreach($rowsdata_ptrang as $value)
                            {
                                $DISCOUNT = $value['GIA'] - ($value['GIA'] *($value['GIAMGIA']/100));
                                $DISCOUNT = number_format($DISCOUNT,2);
                                $GIA = number_format($value['GIA'],2);

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
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-m">
                                    <div class="product-m__thumb">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo"'".$level.PAGES_PATH."product-detail.php?id=".$value[0]."'"?>>

                                            <img class="aspect__img" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt=""></a>
                                        <div class="product-m__quick-look">

                                            <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                        <div class="product-m__add-cart">

                                            <a class="btn--e-brand" href="<?php echo $level.'model/addcart.php?id='.$value[0]?>" data-modal="modal" data-modal-id="#add-to-cart">Add to Cart</a></div>
                                    </div>
                                    <div class="product-m__content">
                                        <div class="product-m__category">

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><?php echo $value['TENLOAI']?></a></div>
                                        <div class="product-m__name">

                                            <a href=<?php echo"'".$level.PAGES_PATH."product-detail.php?id=".$value[0]."'"?>><?php echo $value['TENSP']?></a></div>
                                        <div class="product-m__rating gl-rating-style">
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
                                            <span class="product-m__review">(<?php echo $rateCnt['cnt']?>)</span></div>
                                        <div class="product-m__price"><?php echo '$'.$DISCOUNT?>

                                            <span class="product-m__discount"><?php echo '$'.$GIA?></span></div>
                                        <div class="product-m__hover">
                                            <div class="product-m__preview-description">

                                                <span><?php echo $value['9']?></span></div>
                                            <div class="product-m__wishlist">

                                                <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="u-s-p-y-60">

                        <!--====== Pagination ======-->
                        <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'pagination.php')?>
                        <!--====== End - Pagination ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>