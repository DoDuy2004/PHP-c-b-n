<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 u-s-m-b-30">
                <div class="">
                    <div class="empty__wrap">
                        <form class="empty__search-form" method="post">

                            <label for="search-label"></label>

                            <input class="input-text input-text--primary-style" name="noidung" type="text" id="search-label" placeholder="Search Keywords">

                            <button class="btn btn--icon fas fa-search" name="btn" type="submit"></button>
                        </form>

                        <?php
                            include $level.DATABASE_PATH.'db.php';
                            if(isset($_POST['btn']))
                            {?>
                                <?php
                                    $input = $_POST['noidung'];
                                    $sql = "SELECT * from sanpham inner join loaisp on LOAISP = loaisp.id 
                                    inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.id
                                    where TENSP like :input
                                    GROUP BY sanpham.ID";
                                    $result = $db -> prepare($sql);
                                    $result -> bindValue(':input', '%'.$input.'%',PDO::PARAM_STR );
                                    $result -> execute();
                                    $rowsdata = $result->fetchAll();
                                    $i = sizeof($rowsdata);
                                ?>
                                
                                <?php
                                    if($input == '' || $i == 0)
                                    {?>
                                        <div class="empty lead mb-5" style="margin-top: 2rem; font-size: 1.4rem">
                                            No results found for: &nbsp; <span class="fw-bold"><?php echo $input ?></span>
                                        </div>
                                        <h1 class="empty" style="color: red; text-transform: uppercase ;">Sorry</h1>
                                        <p class="empty" style="font-size: 1.4rem">
                                            There are no results for your search
                                        </p>
                                    <?php
                                    }
                                ?>

                                <?php
                                    if($input != '')
                                    {?>
                                        <div class="empty lead mb-5" style="margin-top: 2rem;" >
                                            <?php echo $i?> results found for: &nbsp; "<span class="fw-bold"><?php echo $input ?></span>"
                                        </div>

                                        <ul style="width: 100%; display: flex; column-gap: .8rem; margin-top: 1.5rem; font-size: .8rem">
                                            <li style="padding:0rem 1rem;list-style: none;  background-color:#f3f3f3; border-radius: 4px; border: solid 1px red"><a href="#" style="color: #333;">All</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;"><a href="#" style="color: #333">iPhone 15 Pro Max</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;"><a href="#" style="color: #333">Samsung S23 ultra</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;"><a href="#" style="color: #333">iPhone 14|14 Pro|14 Pro Max</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;"><a href="#" style="color: #333">Laptop giá rẻ</a></li>
                                        </ul>

                                        <h4 style="color: #333; margin: 1rem 0 0 2.5rem">Sắp xếp theo</h4>
                                        <ul style="width: 100%; display: flex; column-gap: .8rem; margin-top: 1.5rem; font-size: .8rem">
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;border: solid 1px red;color: #333"><a href="#">Liên quan</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;color: #333"><a href="#">Giá cao</a></li>
                                            <li style="padding:0rem 1rem;list-style: none; background-color:#f3f3f3; border-radius: 4px;color: #333"><a href="#">Giá thấp</a></li>
                                        </ul>

                                        <div class="filter__grid-wrapper u-s-m-t-30">
                                            <div class="row">
                                                <?php 
                                                foreach($rowsdata as $value)
                                                {
                                                    $DISCOUNT = $value['GIA'] - ($value['GIA'] *($value['GIAMGIA']/100));
                                                    $DISCOUNT = number_format($DISCOUNT);
                                                    $GIA = number_format($value['GIA']);

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

                                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>

                                                                    <img class="aspect__img" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH'] ?>" alt="">
                                                                </a>
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

                                                                <a href="<?php echo $level.PAGES_PATH.'product-detail.php?id='.$value[0]?>" style="overflow: auto;"><?php echo $value['TENSP']?></a></span>
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

                                                            <span class="product-o__price"><?php echo '$'.$GIA ?>

                                                                <span class="product-o__discount"><?php echo '$'.$DISCOUNT?></span></span>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                ?>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>