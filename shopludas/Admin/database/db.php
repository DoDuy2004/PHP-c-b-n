<?php 
    $conn = ("mysql:host=localhost;dbname=shopludas");
    $user = 'root';
    $pass = '';
    $opt = '';
    try{
        $db = new PDO($conn,$user,$pass);
    }    

    catch (PDOexception $e)
    {
        echo $e->getMessage();
        exit;
    }
?>