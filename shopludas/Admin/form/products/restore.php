<?php
    try {
        $level = '../../';
        include $level.'config.php';
        include $level.DATABASE_PATH.'db.php';
        $ID = $_GET['id'];
        $TRTHAI = 1;
        $remove = $db -> prepare("UPDATE sanpham set TRANGTHAI = :TRTHAI where ID = :ID");
        $remove -> bindValue(':ID', $ID, PDO::PARAM_STR);
        $remove -> bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);

        $remove->execute();

    }
    catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    }

    header("location: {$level}pages/product-list.php");
?>