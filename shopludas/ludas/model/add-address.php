<?php
    $level = '../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    if(isset($_POST['btn']))
    {
        $name = $_POST['lname'].' '.$_POST['fname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = 'Default Shipping Address';
       
        $addAddress = $db->prepare('INSERT INTO diachigh (`DIACHI`, `HOTEN`, `SDT`, `ID_KH`, `TRTHAI`)
        values (:DIACHI, :HOTEN, :SDT, :ID_KH, :TRTHAI)');
        $addAddress ->bindValue(':DIACHI', $address, PDO::PARAM_STR);
        $addAddress ->bindValue(':HOTEN', $name, PDO::PARAM_STR);
        $addAddress ->bindValue(':SDT', $phone, PDO::PARAM_STR);
        $addAddress ->bindValue(':ID_KH', $_COOKIE['id'], PDO::PARAM_STR);
        $addAddress ->bindValue(':TRTHAI', $status, PDO::PARAM_STR);
        $addAddress -> execute();

        header("location:{$level}pages/dash-address-book.php");
    }
?>