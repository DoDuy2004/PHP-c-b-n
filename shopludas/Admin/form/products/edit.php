<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';

    function editProd($db,$ID, $TENSP, $LOAI, $SL, $GIA, $KMAI, $MOTA, $NSX, $TRTHAI)
    {
        $edit = $db -> prepare("UPDATE sanpham set TENSP = :TENSP, LOAISP = :LOAI,
        TONKHO = :SL, GIA = :GIA, GIAMGIA = :KMAI, MOTA = :MOTA, 
        NHASX = :NSX, TRANGTHAI = :TRTHAI WHERE sanpham.ID = :ID ");

        $edit -> bindValue(':ID', $ID, PDO::PARAM_STR);
        $edit -> bindValue(':LOAI', $LOAI, PDO::PARAM_STR);
        $edit -> bindValue(':TENSP', $TENSP, PDO::PARAM_STR);
        $edit -> bindValue(':SL', $SL, PDO::PARAM_STR);
        $edit -> bindValue(':GIA', $GIA, PDO::PARAM_STR);
        $edit -> bindValue(':KMAI', $KMAI, PDO::PARAM_STR);
        $edit -> bindValue(':NSX', $NSX, PDO::PARAM_STR);
        $edit -> bindValue(':TRTHAI',$TRTHAI, PDO::PARAM_STR);
        $edit -> bindValue(':MOTA', $MOTA, PDO::PARAM_STR);

        $edit -> execute();
    }
    
    $ID= $_GET['id'];
    $TENSP = $_POST['productname'];
    $LOAI = $_POST['slt'];
    $SL = $_POST['stock'];
    $GIA = $_POST['price'];
    $KMAI = $_POST['promotion'];
    $MOTA = $_POST['productdesc'];
    $NSX = $_POST['manufacturername'];
    $TRTHAI = $_POST['status'];

    editProd($db,$ID, $TENSP, $LOAI, $SL, $GIA, $KMAI, $MOTA, $NSX, $TRTHAI);


    function editPhotos($db, $ANH , $ID_SP, $TENANH)
    {
        if(!empty($ANH))
        {
            $edit = $db -> prepare('UPDATE danhsachanh SET ANH = :ANH 
                            WHERE ID_SANPHAM = :ID_SP AND TENANH = :TENANH');
            $edit -> bindValue(':ID_SP', $ID_SP,PDO::PARAM_STR);
            $edit -> bindValue(':ANH', $ANH,PDO::PARAM_STR);
            $edit -> bindValue(':TENANH', $TENANH,PDO::PARAM_STR);
    
            $edit->execute();
        }
    }

    $ANH1= $_POST['photo1'];
    $ANH2= $_POST['photo2'];
    $ANH3= $_POST['photo3'];
    $ANH4= $_POST['photo4'];


    editPhotos($db,$ANH1, $ID, 'ANH1');
    editPhotos($db,$ANH2, $ID, 'ANH2');
    editPhotos($db,$ANH3, $ID, 'ANH3');
    editPhotos($db,$ANH4, $ID, 'ANH4');
    
    header("location: {$level}pages/product-list.php");
?>