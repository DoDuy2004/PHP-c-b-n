<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $HOTEN = $_POST['fullname'];
    $CHUCVU = $_POST['user'];
    $ANH = $_POST['photo'];
    $EMAIL = $_POST['email'];
    $SDT = $_POST['phone'];
    $NGSINH = $_POST['birthday'];
    $MATKHAU = $_POST['pass'];
    $DIACHI = $_POST['country'];
    $TRTHAI = $_POST['status'];

    
    if($ANH == '')
    {
        $edit = $db -> prepare("update nguoidung set HOTEN = :HOTEN,
        EMAIL = :EMAIL, SDT = :SDT, MATKHAU = :MATKHAU, DIACHI = :DIACHI, CHUCVU = :CHUCVU, 
        NGAYSINH = :NGSINH, TRTHAI = :TRTHAI WHERE ID = :ID ");
        $edit->bindValue(':ID', $ID, PDO::PARAM_STR);
        $edit->bindValue(':HOTEN', $HOTEN, PDO::PARAM_STR);
        $edit->bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $edit->bindValue(':DIACHI', $DIACHI, PDO::PARAM_STR);
        $edit->bindValue(':MATKHAU', $MATKHAU, PDO::PARAM_STR);
        $edit->bindValue(':CHUCVU', $CHUCVU, PDO::PARAM_STR);
        $edit->bindValue(':NGSINH', $NGSINH, PDO::PARAM_STR);
        $edit->bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);
        $edit->bindValue(':SDT', $SDT, PDO::PARAM_STR);
        $edit -> execute();
    }
    if($ANH != '')
    {
        $edit = $db -> prepare("update nguoidung set HOTEN = :HOTEN,
        EMAIL = :EMAIL, SDT = :SDT, MATKHAU = :MATKHAU, DIACHI = :DIACHI, CHUCVU = :CHUCVU, 
        NGAYSINH = :NGSINH, TRTHAI = :TRTHAI, ANH = :ANH WHERE ID = :ID ");

        $edit->bindValue(':ID', $ID, PDO::PARAM_STR);
        $edit->bindValue(':HOTEN', $HOTEN, PDO::PARAM_STR);
        $edit->bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $edit->bindValue(':DIACHI', $DIACHI, PDO::PARAM_STR);
        $edit->bindValue(':MATKHAU', $MATKHAU, PDO::PARAM_STR);
        $edit->bindValue(':CHUCVU', $CHUCVU, PDO::PARAM_STR);
        $edit->bindValue(':NGSINH', $NGSINH, PDO::PARAM_STR);
        $edit->bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);
        $edit->bindValue(':SDT', $SDT, PDO::PARAM_STR);
        $edit->bindValue(':ANH', $ANH, PDO::PARAM_STR);

        $edit->execute();
    }

       header("location: {$level}pages/user-list.php");
?>