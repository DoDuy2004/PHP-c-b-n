<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    include $level.COMPONENT_PATH.'them_sp_loaddata.php';

    $ID = $_GET['id'];
    $TENLOAI = $_POST['typename'];
    $MOTA = $_POST['typedesc'];
    $TRTHAI = $_POST['status'];

    $edit = $db -> prepare("UPDATE loaisp set TENLOAI = :TENLOAI, MOTA = :MOTA, TRTHAI = :TRTHAI where ID= :ID ");
    $edit->bindValue(':TENLOAI', $TENLOAI, PDO::PARAM_STR);
    $edit->bindValue(':MOTA', $MOTA, PDO::PARAM_STR);
    $edit->bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);
    $edit->bindValue(':ID', $ID, PDO::PARAM_STR);
    $edit->execute();

    
    header("location:{$level}pages/product-type.php");

?>