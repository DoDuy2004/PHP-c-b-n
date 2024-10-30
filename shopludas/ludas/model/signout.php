<?php
    session_start();
    setcookie('email','',time()-3600,'/');
    setcookie('id','',time()-3600,'/'); 
    setcookie('fullname','',time()-3600,'/');
    unset($_SESSION['cart']);
    header('location: ../pages/signin.php');
?>