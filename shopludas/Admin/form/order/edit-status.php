<?php 
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';

    $id = $_GET['id'];
    $stt = $_GET['stt'];

    if($stt == 'Restore')
    {
        $stmt = $db -> prepare("UPDATE hoadon set TRTHAI = 1 WHERE hoadon.ID = :id");
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }
    else if ($stt =='Delete')
    {
        $stmt = $db -> prepare("UPDATE hoadon set TRTHAI = 3 WHERE hoadon.ID = :id");
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }
    else
    {
        $stmt = $db -> prepare("UPDATE hoadon set TRTHAI = 2 WHERE hoadon.ID = :id");
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }
    header("location: {$level}pages/orders.php");
?>