<?php 
    $sql = "select* 
            from sanpham inner join loaisp on sanpham.LOAISP = loaisp.ID
            inner join hangsanxuat on sanpham.NHASX = hangsanxuat.ID";
    $result = $db ->prepare($sql);
    $result ->execute();
    $rowsdata = $result -> fetchAll();
    // var_dump($rowsdata);
?>