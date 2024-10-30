<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    
    $HOTEN = $_POST['fullname'];
    $EMAIL = $_POST['email'];
    $SDT = $_POST['phone'];
    $NGSINH = $_POST['birthday'];
    $MATKHAU = $_POST['pass'];
    $DIACHI = $_POST['country'];
    $TRTHAI = '1';
    $chucvu = '2';

    $add = $db -> prepare('INSERT INTO nguoidung (HOTEN, SDT, EMAIL, MATKHAU, NGAYSINH, DIACHI, TRTHAI, CHUCVU)
    values (:HOTEN, :SDT, :EMAIL, :MATKHAU, :NGSINH, :DIACHI, :TRTHAI, :CHUCVU )');
    $add->bindValue(':HOTEN', $HOTEN, PDO::PARAM_STR);
    $add->bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
    $add->bindValue(':SDT', $SDT, PDO::PARAM_STR);
    $add->bindValue(':NGSINH', $NGSINH, PDO::PARAM_STR);
    $add->bindValue(':MATKHAU', $MATKHAU, PDO::PARAM_STR);
    $add->bindValue(':DIACHI', $DIACHI, PDO::PARAM_STR);
    $add->bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);
    $add->bindValue(':CHUCVU', $chucvu, PDO::PARAM_STR);

    $add->execute();
    
    header("location: {$level}pages/customers.php");
?>
