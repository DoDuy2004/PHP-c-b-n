<?php 
    $level = '../';
    $page = 'login';
    $title = 'Login - Vetra';
    $title_header = 'Login';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    include $level.'form/login.php';
    include $level.COMPONENT_PATH.LAYOUT_PATH.'layout.php';
?>