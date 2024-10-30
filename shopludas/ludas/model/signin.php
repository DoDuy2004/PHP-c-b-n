<?php
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    session_start();
    if(isset($_POST['btn-log']))
    {
        $EMAIL = $_POST['email'];
        $PASS = $_POST['pass'];

        $user = $db -> prepare('select * from nguoidung
        inner join chucvu on chucvu.ID = nguoidung.CHUCVU
        where EMAIL = :EMAIL and MATKHAU = :PASS');
        $user -> bindValue(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $user -> bindValue(':PASS', $PASS, PDO::PARAM_STR);
        $user -> execute();
        
        $row = $user->fetch();

        if(isset($row['EMAIL']) && isset($row['MATKHAU']))
        {
            if($row['CHUCVU'] == 2)
            {
                setcookie('id', $row[0], time() + 3600,'/');
                setcookie('email', $row['EMAIL'], time() + 3600,'/');
                //chỉ lưu id cookie, check xem còn cookie thì là vẫn đăng nhập
                setcookie('fullname', $row['HOTEN'],time() + 3600, '/');
                // $_SESSION['customer']['email'] = $row['EMAIL'];
            }

            else 
            {
                setcookie('id', $row[0], time() + 3600,'/');
                //chỉ lưu id cookie, check xem còn cookie thì là vẫn đăng nhập - setCustomerSession($row);
                $_SESSION['customer']['email'] = $row['EMAIL'];
                $_SESSION['customer']['photo'] = $row['ANH'];
                $_SESSION['customer']['fname'] = $row['HOTEN'];
                $_SESSION['customer']['role'] = $row['TENCV'];
            }

            //Xử lý khi tich remember me
            if(isset($_POST['rmb']))
            {
                $_SESSION['email'] = $row['EMAIL'];
                $_SESSION['pass'] = $row['MATKHAU'];
            }
            else
            {
                session_destroy();
            }
            
            $row['CHUCVU'] == 2 ? header('location:../index.php') : header('location:../../Admin/index.php');
        }

        if(!isset($row['EMAIL']) && !isset($row['MATKHAU']))
        {
            $text = 'Tài khoản không tồn tại';
        }
        else
            $text = '';
    }
    else
    {
        $text = '';
    }
?>