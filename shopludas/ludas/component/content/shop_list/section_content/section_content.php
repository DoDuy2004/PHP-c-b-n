<?php 
   include $level.DATABASE_PATH.'db.php';
   $sql = "SELECT* 
       FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
       INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
       INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
       INNER JOIN trangthai on trangthai.id = sanpham.TRANGTHAI
       WHERE trangthai.TENTT = 'Active'
       GROUP BY sanpham.ID
       ORDER BY danhsachanh.ID";
   $result = $db ->prepare($sql);
   $result ->execute();
   $rowsdata = $result -> fetchAll();
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

                                <a class="gl-tag btn--e-brand-shadow" href="#">men's clothing</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                <a class="gl-tag btn--e-brand-shadow" href="#">books & audible</a></div>
                        </div>
                        <div class="shop-p__tool-style">
                            <div class="tool-style__group u-s-m-b-8">

                                <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

                                <span class="js-shop-grid-target">Grid</span>

                                <span class="js-shop-list-target is-active">List</span></div>
                            <form>
                                <div class="tool-style__form-wrap">
                                    <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option>Show: 8</option>
                                            <option selected>Show: 12</option>
                                            <option>Show: 16</option>
                                            <option>Show: 28</option>
                                        </select></div>
                                    <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option selected>Sort By: Newest Items</option>
                                            <option>Sort By: Latest Items</option>
                                            <option>Sort By: Best Selling</option>
                                            <option>Sort By: Best Rating</option>
                                            <option>Sort By: Lowest Price</option>
                                            <option>Sort By: Highest Price</option>
                                        </select></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="shop-p__collection">
                        <div class="row is-list-active">
                        <?php 
                            foreach($rowsdata as $value)
                            {
                                $DISCOUNT = $value['GIA'] - ($value['GIA'] *($value['GIAMGIA']/100));
                                $DISCOUNT = number_format($DISCOUNT,2);
                                $GIA = number_format($value['GIA'],2);
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-m">
                                    <div class="product-m__thumb">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo $level.'model/addcart.php?id='.$value[0]?>>

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

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>><?php echo $value['TENSP']?></a></div>
                                        <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                            <span class="product-m__review"><?php echo '('.$value['REVIEW'].')'?></span></div>
                                        <div class="product-m__price"><?php echo '$'.$DISCOUNT?>

                                            <span class="product-m__discount"><?php echo '$'.$GIA?></span></div>
                                        <div class="product-m__hover">
                                            <div class="product-m__preview-description">

                                                <span><?php echo $value['MOTA']?></span></div>
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
