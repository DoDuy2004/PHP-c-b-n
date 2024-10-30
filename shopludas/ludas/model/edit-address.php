<?php
    $level = '../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';


    $name = $_POST['lname'].' '.$_POST['fname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $id = $_GET['id'];
    
    $addAddress = $db->prepare('UPDATE diachigh set `DIACHI` = :DIACHI, `HOTEN` = :HOTEN, `SDT` = :SDT
                                WHERE ID_KH = :ID_KH AND diachigh.ID = :ID');
    $addAddress ->bindValue(':DIACHI', $address, PDO::PARAM_STR);
    $addAddress ->bindValue(':HOTEN', $name, PDO::PARAM_STR);
    $addAddress ->bindValue(':SDT', $phone, PDO::PARAM_STR);
    $addAddress ->bindValue(':ID_KH', $_COOKIE['id'], PDO::PARAM_STR);
    $addAddress ->bindValue(':ID', $id, PDO::PARAM_STR);

    $addAddress -> execute();

    header("location:{$level}pages/dash-address-book.php");
?>