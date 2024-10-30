<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php' ;

    $TENLOAI = $_POST['typename'];
    $MOTA = $_POST['typedesc'];
    $TRTHAI = 1;

    $add = $db -> prepare('INSERT INTO loaisp (TENLOAI, MOTA, TRTHAI)
    values (:TENLOAI, :MOTA, :TRTHAI)');
    $add -> bindValue(':TENLOAI', $TENLOAI, PDO::PARAM_STR);
    $add -> bindValue(':MOTA', $MOTA, PDO::PARAM_STR);
    $add -> bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);

    $add->execute();
    
    header("location:{$level}pages/product-type.php");
?>