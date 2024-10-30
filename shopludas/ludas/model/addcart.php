<?php
    session_start();
    $level = '../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    $id = $_GET['id'];
    $quantity = $_POST['quantity'];

    function getQuantity($quantity) {
        if(isset($quantity)) // && $quantity != 0
            return $quantity;
        // else if( $quantity == 0)
        //     return 0;
        else 
            return 1;
    }

   // if(isset($_COOKIE['email'])) {
    //lay thong tin san pham
        $result = $db->prepare('SELECT * from sanpham inner join loaisp on sanpham.LOAISP = loaisp.ID
        inner join danhsachanh on ID_SANPHAM = sanpham.ID
        WHERE sanpham.ID = :id');
        $result ->bindValue(':id',$id,PDO::PARAM_STR);
        $result->execute();
        $row=$result->fetch();
        $name = $row['TENSP'];
        $price = $row['GIA'];
        $type = $row['TENLOAI'];
        $photo = $row['ANH'];

        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']+=getQuantity($quantity);
        }    
        else {
            $_SESSION['cart'][$id] = array("id"=>$id, "name"=>$name, "photo"=>$photo, "quantity"=>getQuantity($quantity), "price"=>$price,"type"=>$type );
        } 

        header('location: ../pages/cart.php');
    //}
   
?>  