<?php 
    //Lấy ra danh sách ảnh
    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $sql = "SELECT * 
            FROM sanpham inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.ID
            inner join loaisp on loaisp.ID = sanpham.LOAISP
            WHERE sanpham.ID = :ID";
    $data = $db -> prepare($sql);
    $data->bindValue(':ID', $ID, PDO::PARAM_STR);
    $data->execute();
    $rowsdata = $data -> fetchAll();
?>
<div class="pd u-s-m-b-3">
    <div class="slider-fouc pd-wrap">
        <div id="pd-o-initiate">
            <?php
                foreach($rowsdata as $value)
                {?>
                    <div class="pd-o-img-wrap" data-src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>">
                        <img class="u-img-fluid" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" data-zoom-image="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt="">
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
    <div class="u-s-m-t-15">
        <div class="slider-fouc">
            <div id="pd-o-thumbnail">
                <?php
                    foreach($rowsdata as $value)
                    {?>
                        <div>
                            <img class="u-img-fluid" src="<?php echo $level.IMG_PATH.'product/'.$value['ANH']?>" alt="">
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>