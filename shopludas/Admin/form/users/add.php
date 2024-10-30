<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    
    $TENNV = $_POST['fullname'];
    $CHUCVU = $_POST['user'];
    $ANH = $_POST['photo'];
    $EMAIL = $_POST['email'];
    $SDT = $_POST['phone'];
    $NGSINH = $_POST['birthday'];
    $MATKHAU = $_POST['pass'];
    $DIACHI = $_POST['country'];
    $TRTHAI = 1;
    $add = $db -> prepare('INSERT INTO nguoidung (HOTEN, ANH, EMAIL, SDT, MATKHAU, DIACHI, CHUCVU, NGAYSINH, TRTHAI) 
    values (:TENNV, :ANH, :EMAIL, :SDT, :MATKHAU, :DIACHI, :CHUCVU,:NGSINH,:TRANGTHAI)');
    $add->bindValue(':TENNV',$TENNV, PDO::PARAM_STR);
    $add->bindValue(':ANH',$ANH, PDO::PARAM_STR);
    $add->bindValue(':EMAIL',$EMAIL, PDO::PARAM_STR);
    $add->bindValue(':SDT',$SDT, PDO::PARAM_STR);
    $add->bindValue(':MATKHAU',$MATKHAU, PDO::PARAM_STR);
    $add->bindValue(':DIACHI',$DIACHI, PDO::PARAM_STR);
    $add->bindValue(':CHUCVU',$CHUCVU, PDO::PARAM_STR);
    $add->bindValue(':NGSINH',$NGSINH, PDO::PARAM_STR);
    $add->bindValue(':TRANGTHAI',$TRTHAI, PDO::PARAM_STR);

    $add->execute();
    
    header("location:{$level}pages/user-list.php");
?>