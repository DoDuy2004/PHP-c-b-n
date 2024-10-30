<?php
    $level = '../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';


    $name = $_POST['lname'].' '.$_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $bdate = $_POST['bdate'];
    
    $addAddress = $db->prepare('UPDATE nguoidung set `HOTEN` = :TENKH, `SDT` = :SDT, `EMAIL` = :EMAIL, `NGAYSINH` = :NGAYSINH
                                WHERE ID = :ID');
    $addAddress ->bindValue(':EMAIL', $email, PDO::PARAM_STR);
    $addAddress ->bindValue(':TENKH', $name, PDO::PARAM_STR);
    $addAddress ->bindValue(':NGAYSINH', $bdate, PDO::PARAM_STR);
    $addAddress ->bindValue(':SDT', $phone, PDO::PARAM_STR);
    $addAddress ->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);

    $addAddress -> execute();

    header("location:{$level}pages/dash-my-profile.php");
?>