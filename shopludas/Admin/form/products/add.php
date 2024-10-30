<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    $TENSP = $_POST['productname'];
    $LOAI = $_POST['slt'];
    $SL = $_POST['stock'];
    $GIA = $_POST['price'];
    $KMAI = $_POST['promotion'];
    $MOTA = $_POST['productdesc'];
    $NSX = $_POST['manufacturername'];
    $TRTHAI = 1;


    $add = $db -> prepare('insert into sanpham (TENSP, LOAISP, TONKHO, GIA, GIAMGIA, NHASX, TRANGTHAI, MOTA)
    values (:TENSP, :LOAI,:SL, :GIA, :KMAI, :NSX, :TRTHAI, :MOTA)');
    $add -> bindValue(':LOAI', $LOAI, PDO::PARAM_STR);
    $add -> bindValue(':TENSP', $TENSP, PDO::PARAM_STR);
    $add -> bindValue(':SL', $SL, PDO::PARAM_STR);
    $add -> bindValue(':GIA', $GIA, PDO::PARAM_STR);
    $add -> bindValue(':KMAI', $KMAI, PDO::PARAM_STR);
    $add -> bindValue(':NSX', $NSX, PDO::PARAM_STR);
    $add -> bindValue(':TRTHAI',$TRTHAI, PDO::PARAM_STR);
    $add -> bindValue(':MOTA', $MOTA, PDO::PARAM_STR);

    $add -> execute();
    $lastProductId = $db->lastInsertId();

    $ANH1= $_POST['photo1'];
    $ANH2= $_POST['photo2'];
    $ANH3= $_POST['photo3'];
    $ANH4= $_POST['photo4'];
    $lastProductId = $db->lastInsertId();

    $addphoto = $db -> prepare("insert into danhsachanh (ANH, ID_SANPHAM, TENANH)
    values (:ANH1,:ID_SP,'ANH1'),
        (:ANH2,:ID_SP,'ANH2'),
        (:ANH3,:ID_SP,'ANH3'),
        (:ANH4,:ID_SP,'ANH4')");

    $addphoto -> bindValue(':ANH1', $ANH1,PDO::PARAM_STR);
    $addphoto -> bindValue(':ANH2', $ANH2,PDO::PARAM_STR);
    $addphoto -> bindValue(':ANH3', $ANH3,PDO::PARAM_STR);
    $addphoto -> bindValue(':ANH4', $ANH4,PDO::PARAM_STR);
    $addphoto -> bindValue(':ID_SP', $lastProductId,PDO::PARAM_STR);

    $addphoto->execute();
    
    header("location:{$level}pages/product-list.php");
?>