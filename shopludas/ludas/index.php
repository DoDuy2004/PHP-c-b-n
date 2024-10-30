<?php 
    $level = './';
    $page = 'home';
    require_once ($level.'config.php');
    session_start();
    if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo '<script>alert("Đăng ký thành công!");</script>';
    }
    require_once ($level.COMPONENT_PATH.LAYOUT_PATH.'layout.php');
?>