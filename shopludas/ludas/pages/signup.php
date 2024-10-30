<?php 
    $level = '../';
    $page = 'signup';
    $name = 'Signup';
    require_once ($level.'config.php');
    include $level.DATABASE_PATH.'db.php';
    include $level.'model/signup.php';
    require_once ($level.COMPONENT_PATH.LAYOUT_PATH.'layout.php');
?>