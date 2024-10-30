<!-- Phân trang theo loai sản phẩm -->
<?php
    include $level.DATABASE_PATH.'db.php';

    $filterValue = isset($_GET['filter']) ? $_GET['filter'] : '*';

    $sql = "SELECT *
        FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
        INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
        INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM
        INNER JOIN trangthai on trangthai.ID = sanpham.TRANGTHAI";

    $whereClause = " WHERE trangthai.TENTT = 'Active'";

    if ($filterValue != '*') {
        $whereClause .= " and loaisp.TENLOAI = :category";
    }
    
    $sql .= $whereClause . " GROUP BY sanpham.ID";

    $result = $db ->prepare($sql);
    if ($filterValue != '*') {
        $result -> bindValue(':category', $filterValue, PDO::PARAM_STR);
    }
    $result ->execute();
    $rowsdata = $result -> fetchAll();
    $sodong = sizeof($rowsdata);

    //Tinh toan phan trang
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
    //end

    //DSSP sau khi phan trang
    $sql1 = $sql . " LIMIT :lim OFFSET :offset";

    //echo $sql1;
    
    $result_ptrang = $db ->prepare($sql1);
    if ($filterValue != '*') {
        $result_ptrang -> bindValue(':category', $filterValue, PDO::PARAM_STR);
    }
    $result_ptrang->bindValue(':lim', $sanpham_moi_trang, PDO::PARAM_INT);
    $result_ptrang->bindValue(':offset', $offset, PDO::PARAM_INT);
    $result_ptrang ->execute();
    $rowsdata_ptrang = $result_ptrang -> fetchAll();

?>
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-16">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">ALL PRODUCT</h1>

                        <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
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
                <div class="col-lg-12">
                    <div class="filter-category-container">
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1" style="text-transform: uppercase;" type="button" data-filter="*">ALL</button>
                        </div>
                        <?php
                            $lstType=$db->query('SELECT * from loaisp');
                            $result = $lstType -> fetchAll();
                            $sodong = sizeof($result);
                            foreach($result as $value)
                            { ?>
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1 active <?php if($filterValue == $value['TENLOAI']) echo " js-checked" ?>" style="text-transform: uppercase" type="button" data-filter="<?php echo $value['TENLOAI']?>"><?php echo $value['TENLOAI']?></button>
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                    <div class="filter__grid-wrapper u-s-m-t-30">
                        <div class="row">
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
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                    <div class="product-o product-o--hover-on product-o--radius">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo"'".$level.PAGES_PATH."product-detail.php?id=".$value[0]."'"?>>

                                                <img class="aspect__img" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH'] ?>" alt=""></a>
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

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?> style="text-transform: uppercase"><?php echo $value['TENLOAI']?></a></span>

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
                                            <span class="product-o__review"><?php echo '('.$rateCnt['cnt'].')' ?></span></div>

                                        <span class="product-o__price"><?php echo '$'.$DISCOUNT ?>

                                            <span class="product-o__discount"><?php echo '$'.$GIA?></span></span>
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
                <div class="col-lg-12">
                    <div class="load-more">

                        <button class="btn btn--e-brand" type="button">Load More</button></div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var filterButtons = document.querySelectorAll('.filter__btn');
        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Lấy giá trị data-filter của nút hiện tại
                var filterValue = button.getAttribute('data-filter');

                // Thực hiện thao tác lọc hoặc hiển thị dữ liệu dựa trên filterValue
                window.location.href = 'index.php?filter=' + filterValue;
            });
        });
    });
</script>