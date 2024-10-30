<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';

    $id_sp = $_GET['id_sp'];
    $id = $_GET['id'];
    $status = $_GET['status'];

    if($status == 1)
    {
        $stmt = $db -> prepare('UPDATE binhluan set TRTHAI_CMT = :stt WHERE ID = :id');
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> bindValue(':stt', $status, PDO::PARAM_INT);

        $stmt -> execute();
    }
    else
    {
        $stmt = $db -> prepare('DELETE FROM binhluan WHERE ID = :id AND TRTHAI_CMT = :stt');
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> bindValue(':stt', $status, PDO::PARAM_INT);

        $stmt -> execute();
    }

    header("location: {$level}pages/product-detail.php?id={$id_sp}");
?>