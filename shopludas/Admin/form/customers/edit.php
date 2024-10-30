<?php
    $level = '../../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';

    function editCustomer($db, $ID, $HOTEN, $EMAIL, $SDT, $NGSINH, $MATKHAU, $DIACHI, $TRTHAI) {
        
        $edit = $db->prepare("UPDATE nguoidung SET HOTEN = :HOTEN, EMAIL = :EMAIL,
        SDT = :SDT, MATKHAU = :MATKHAU, DIACHI = :DIACHI, NGAYSINH = :NGSINH,
        TRTHAI = :TRTHAI WHERE ID = :ID ");

        $edit->bindValue(':ID', $ID, PDO::PARAM_STR);
        $edit->bindValue(':HOTEN', $HOTEN, PDO::PARAM_STR);
        $edit->bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $edit->bindValue(':SDT', $SDT, PDO::PARAM_STR);
        $edit->bindValue(':NGSINH', $NGSINH, PDO::PARAM_STR);
        $edit->bindValue(':MATKHAU', $MATKHAU, PDO::PARAM_STR);
        $edit->bindValue(':DIACHI', $DIACHI, PDO::PARAM_STR);
        $edit->bindValue(':TRTHAI', $TRTHAI, PDO::PARAM_STR);
    
        // Chỉ thiết lập giá trị ANH nếu nó được truyền vào
        if (!empty($ANH)) {
            $edit->bindValue(':ANH', $ANH, PDO::PARAM_STR);
        }
    
        $edit->execute();
    }

    $ID= $_GET['id'];
    $HOTEN = $_POST['fullname'];
    $EMAIL = $_POST['email'];
    $SDT = $_POST['phone'];
    $NGSINH = $_POST['birthday'];
    $MATKHAU = $_POST['pass'];
    $DIACHI = $_POST['country'];
    $TRTHAI = $_POST['status'];
    
    
    editCustomer($db, $ID, $HOTEN, $EMAIL, $SDT, $NGSINH, $MATKHAU, $DIACHI, $TRTHAI);
    
    
    header("location: {$level}pages/customers.php");

?>