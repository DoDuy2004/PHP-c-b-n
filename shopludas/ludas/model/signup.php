<?php
    if(isset($_POST['btn-signup']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $date = $_POST['bdate'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $TRTHAI = 1;
        $role = 2;

    
        $signup = $db -> prepare('INSERT INTO nguoidung (`HOTEN`, `EMAIL`, `MATKHAU`,`NGAYSINH`, `TRTHAI`, `CHUCVU` ) 
                                values (:TENKH, :EMAIL, :MATKHAU,:NGSINH, :TRTHAI, :CHUCVU)');
        $signup -> bindValue(':TENKH', $lname.' '.$fname,PDO::PARAM_STR);
        $signup -> bindValue(':EMAIL', $email, PDO::PARAM_STR);
        $signup -> bindValue(':MATKHAU', $pass, PDO::PARAM_STR);
        $signup -> bindValue(':NGSINH', $date, PDO::PARAM_STR);
        $signup -> bindValue(':TRTHAI',$TRTHAI, PDO::PARAM_STR);
        $signup -> bindValue(':CHUCVU',$role, PDO::PARAM_STR);

    
        if($signup -> execute())
        {
            $lastorderId = $db->lastInsertId();
            setcookie('id', $lastorderId, time()+3600 , '/');
            setcookie('email', $email, time()+3600 , '/');
            setcookie('fullname', $lname.' '.$fname,time() + 3600, '/');
            header('location: ../index.php?signup=success');
        }
    }
?>