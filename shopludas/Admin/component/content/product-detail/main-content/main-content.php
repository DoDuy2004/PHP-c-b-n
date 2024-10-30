<?php
    include $level.DATABASE_PATH.'db.php';
    include $level.'function/function.php';

    $id = $_GET['id'];
    //chi tiet san pham
    $detail = $db -> prepare('SELECT * FROM sanpham inner join trangthai on sanpham.TRANGTHAI = trangthai.ID
                            inner join loaisp on sanpham.LOAISP = loaisp.ID 
                            inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.ID
                            WHERE sanpham.ID = :ID');
    $detail -> bindValue(':ID', $id, PDO::PARAM_STR);
    $detail->execute();
    $result = $detail->fetchAll();

    //danh sach binh luan cua san pham
    $allCmt = $db->prepare('SELECT * FROM binhluan INNER JOIN nguoidung on binhluan.ID_KH = nguoidung.ID
    inner join trangthai on trangthai.ID = binhluan.TRTHAI_CMT
    WHERE binhluan.ID_SP = :ID ');
    $allCmt -> bindValue(':ID', $id, PDO::PARAM_STR);
    $allCmt -> execute();
    $results = $allCmt -> fetchAll();

    //dem so danh gia
    $cnt = $db->prepare("SELECT count(*) as 'cnt' FROM binhluan 
    WHERE binhluan.ID_SP = :ID ");
    $cnt -> bindValue(':ID', $id, PDO::PARAM_STR);
    $cnt -> execute();
    $rateCnt = $cnt -> fetch();

    //tong so sao 
    $sum = $db->prepare("SELECT SUM(RATE) as 'avgrate' FROM binhluan 
    WHERE binhluan.ID_SP = :ID ");
    $sum -> bindValue(':ID', $id, PDO::PARAM_STR);
    $sum -> execute();
    $rate = $sum -> fetch();

    //bien de luu danh sach anh
    $listAnh = [];
    foreach($result as $value)
    {
        $listAnh[] = $value['ANH'];
    }

    
    $DISCOUNT = $result[0]['GIA'] - ($result[0]['GIA'] *($result[0]['GIAMGIA']/100));
    $DISCOUNT = number_format($DISCOUNT,2);
    $GIA = number_format($result[0]['GIA'],2);
?>
<div class="row">
    <div class="col-md-12">

        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="slick-wrapper">
                            <div class="slider-for mb-3">
                                <?php foreach($listAnh as $value) : ?>
                                    <div class="slick-slide-item">
                                        <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/'.$value.'"'?> class="w-100 rounded"
                                            alt="image">
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <div class="slick-nav-wrapper">
                                <div class="slider-nav">
                                    <?php foreach($listAnh as $value) : ?>
                                        <div class="slick-slide-item m-2">
                                            <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/'.$value.'"'?> class="w-100 rounded"
                                                alt="image">
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between align-items-start mt-4 mt-md-0">
                            <div>
                                <div class="small text-muted mb-2">Technology Products</div>
                                <h2><?php echo $result[0]['TENSP']?></h2>
                                <p>
                                    <span class="badge bg-success"><?php echo 'In stock '.$result[0]['TONKHO']?></span>
                                </p>
                                <p><?php echo $result[0]['TENLOAI'];?>
                                </p>
                                <div class="d-flex gap-3 mb-3 align-items-center">
                                    <h4 class="text-muted mb-0">
                                        <del><?php echo '$'.$GIA ?></del>
                                    </h4>
                                    <h4 class="mb-0"><?php echo '$'.$DISCOUNT ?></h4>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <?php
                                        $starCnt = !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 1;
                                        for($i = 1 ; $i <= 5; $i++ )
                                        { 
                                            if($i <= (int) ($rate['avgrate'] / $starCnt))
                                                echo '<i class="bi bi-star-fill text-warning"></i>';
                                            elseif (($i - (int) ($rate['avgrate'] / $starCnt) > 0) && ((int) ($rate['avgrate'] / $starCnt)) != 0) {
                                                // Nếu có phần thập phân, thêm ngôi sao rỗng (outline)
                                                echo '<i class="bi bi-star-half text-warning"></i>';
                                            } else {
                                                // Ngôi sao rỗng (outline)
                                                echo '<i class="bi bi-star-fill text-muted"></i>';
                                            }
                                        }
                                    ?>
                                    <span>(<?php echo !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 0 ?>)</span>
                                </div>
                                <p>Features:</p>
                                <p><?php echo $result[0]['MOTA'];?></p>
                                <!-- <form class="mt-4">
                                    <div class="row row-cols-lg-auto">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1">
                                                <button class="btn btn-primary" type="button">Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
                            <!-- <a href="#" class="btn btn-icon flex-shrink-0">
                                <i class="bi bi-heart-fill text-danger"></i> 50
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            href="#description" role="tab" aria-controls="description"
                            aria-selected="true">Descriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                            aria-controls="reviews" aria-selected="false">Reviews (<?php echo sizeof($results)?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sss-tab" data-bs-toggle="tab" href="#sss" role="tab"
                            aria-controls="sss" aria-selected="false">SSS</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <?php echo $result[0]['MOTA'];?>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-5">
                                       <div class="display-6"><?php echo number_format($rate['avgrate'] / $starCnt,1)?></div>
                                        <div class="d-flex gap-2 my-3">
                                            <?php
                                                for($i = 1 ; $i <= 5; $i++ )
                                                { 
                                                    if($i <= (int) ($rate['avgrate'] / $starCnt))
                                                        echo '<i class="bi bi-star-fill text-warning"></i>';
                                                    elseif (($i - (int) ($rate['avgrate'] / $starCnt) > 0) && ((int) ($rate['avgrate'] / $starCnt)) != 0) {
                                                        // Nếu có phần thập phân, thêm ngôi sao rỗng (outline)
                                                        echo '<i class="bi bi-star-half text-warning"></i>';
                                                    } else {
                                                        // Ngôi sao rỗng (outline)
                                                        echo '<i class="bi bi-star-fill text-muted"></i>';
                                                    }
                                                }
                                            ?>
                                            <span>(<?php echo !empty($rateCnt['cnt']) ? $rateCnt['cnt'] : 0 ?>)</span>
                                        </div>
                                </div>
                                <div class="list-group list-group-flush mb-4">
                                    <?php 
                                        foreach($results as $value):
                                    ?>
                                        <div class="list-group-item d-flex px-0">
                                            <div>
                                                <div  style="display: flex; align-items: center; column-gap:2rem">
                                                    <h5 class="mb-1"><?php echo $value['HOTEN']?></h5>
                                                    <p class="mb-1"><?php echo $value['THOIGIAN']?></p>
                                                    <div>
                                                    <?php   if($value['TENTT'] == 'Deactive') : ?>
                                                                <span class="badge <?php echo bg($value['TENTT'])?>">
                                                                   <?php echo 'Pending processing';?>
                                                                </span> 
                                                            <?php endif ?>
                                                    </div> 
                                                    <div class="d-flex">
                                                        <div class="dropdown ms-auto">
                                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <?php if($value['TRTHAI_CMT'] == 1) : ?>
                                                                    <a href="<?php echo $level.'form/cmt/status.php?id_sp='.$id.'&id='.$value[0].'&status=2'?>" class="dropdown-item">Delete</a>
                                                                <?php endif ?>
                                                                <?php if($value['TRTHAI_CMT'] == 2) : ?>
                                                                    <a href="<?php echo $level.'form/cmt/status.php?id_sp='.$id.'&id='.$value[0].'&status=2'?>" class="dropdown-item">Delete</a>
                                                                    <a href="<?php echo $level.'form/cmt/status.php?id_sp='.$id.'&id='.$value[0].'&status=1'?>" class="dropdown-item">Active</a>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 mb-3">
                                                    <?php
                                                        for($i = 0 ; $i < 5; $i++ )
                                                        { 
                                                            if($i < $value['RATE'])
                                                                echo '<i class="bi bi-star-fill text-warning"></i>';
                                                            else
                                                                echo '<i class="bi bi-star-fill text-muted"></i>';
                                                        }
                                                    ?>
                                                </div>
                                                <div><?php echo $value['NOIDUNG'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <!-- <form>
                                    <div class="mb-3">
                                        <label class="form-label">Comment:</label>
                                        <textarea rows="3" class="form-control"
                                            placeholder="Your opinion on the product"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rate:</label>
                                        <div class="d-flex align-items-center">
                                            <div class="rating-example"></div>
                                            <div class="live-rating ms-3"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3" type="button"
                                        id="button-addon2">Send Review</button>
                                </form> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sss" role="tabpanel" aria-labelledby="sss-tab">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        How are the delivery processes carried out?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">It has survived not only five centuries, but
                                        also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of
                                        Letraset sheets containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Is there a payment option at the door?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">It has survived not only five centuries, but
                                        also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of
                                        Letraset sheets containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        How many can I order at the same time?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">It has survived not only five centuries, but
                                        also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of
                                        Letraset sheets containing Lorem
                                        Ipsum passages, and more recently with desktop publishing software
                                        like Aldus PageMaker including versions of Lorem Ipsum.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>