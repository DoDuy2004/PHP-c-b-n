<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    $ID = $_GET['id'];
    $TRANGTHAI = 1;
    $remove = $db -> prepare("update nguoidung set TRTHAI = :TRANGTHAI where ID = :ID");
    $remove->bindValue(':ID', $ID, PDO::PARAM_STR);
    $remove->bindValue(':TRANGTHAI', $TRANGTHAI, PDO::PARAM_STR);
    $remove->execute();
    header("location: {$level}pages/user-list.php");
?>