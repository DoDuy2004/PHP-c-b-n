<?php
    $level = '../';
    session_start();
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    
    $text = '';

    if(isset($_POST['btn-log']))
    {
        $EMAIL = $_POST['email'];
        $PASS = $_POST['pass'];
        $user = $db -> prepare("SELECT * from nguoidung inner join chucvu on chucvu.ID = nguoidung.CHUCVU
        where EMAIL = :EMAIL and MATKHAU = :PASS and chucvu.TENCV = 'Admin'");
        $user -> bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $user -> bindValue(':PASS', $PASS, PDO::PARAM_STR);
        $user -> execute();
        
        $row = $user->fetch();

        if(isset($row['EMAIL']) && isset($row['MATKHAU']))
        {
            setcookie('id', $row[0], time() + 3600,'/');
            //chỉ lưu id cookie, check xem còn cookie thì là vẫn đăng nhập
            // setcookie('passw', $row['MATKHAU'], time() + 3600, '/');
            // setcookie('fname', $row['TENNV'],time() + 3600, '/');
            $_SESSION['customer']['email'] = $row['EMAIL'];
            $_SESSION['customer']['pass'] = $row['MATKHAU'];
            $_SESSION['customer']['photo'] = $row['ANH'];
            $_SESSION['customer']['fname'] = $row['HOTEN'];
            $_SESSION['customer']['role'] = $row['TENCV'];
            header('location:../index.php');
        }
        if(!isset($row['EMAIL']) && !isset($row['MATKHAU']))
        {
            $text = 'Incorrect username or password';
        }
    }
    header('location:../index.php');
?>