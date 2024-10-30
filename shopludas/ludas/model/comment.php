<?php
    $level = "../";
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDateTime = date("Y-m-d H:i:s");

    if(isset($_COOKIE['id']))
    {
        if($_POST['rate'] != 0 && !empty($_POST['fname']) && !empty($_POST['email']))
        {
            $addCmt = $db -> prepare('INSERT INTO binhluan (`ID_KH`, `ID_SP`, `NOIDUNG`, `RATE`, `TRTHAI_CMT`, `THOIGIAN`)
                                    VALUES(:ID_KH, :ID_SP, :NOIDUNG, :RATE, :TRTHAI, :THOIGIAN)');
            $addCmt -> bindValue(':ID_KH', $_COOKIE['id'] , PDO::PARAM_STR);
            $addCmt -> bindValue(':ID_SP', $_POST['id_sp'], PDO::PARAM_STR);
            $addCmt -> bindValue(':NOIDUNG', $_POST['content'], PDO::PARAM_STR);
            $addCmt -> bindValue(':RATE', $_POST['rate'], PDO::PARAM_STR);
            $addCmt -> bindValue(':TRTHAI',2, PDO::PARAM_STR);
            $addCmt -> bindValue(':THOIGIAN', $currentDateTime, PDO::PARAM_STR);
            if($addCmt -> execute())
            {
                echo json_encode($_POST);
            }
        }
    }
    else
        echo json_encode("Bạn cần đăng nhập!");
?>