<?php
    session_start();
    setcookie('id','',time()-3600,'/');
    unset($_SESSION['customer']);
    header('location: ../../ludas/pages/signin.php');
?>