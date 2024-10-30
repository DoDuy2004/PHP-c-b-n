<?php
    $level = '../';
    include $level.'config.php';
    include $level.DATABASE_PATH.'db.php';
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if (empty($_SESSION['cart'])) {
        echo "
        <script>
            var confirmation = confirm('Không thể thanh toán. Giỏ hàng đang trống. Bạn muốn trở về trang giỏ hàng không?');
            if (confirmation) {
                window.location.href = '../pages/cart.php'; // Đường dẫn đến trang giỏ hàng
            } else {

            }
        </script>
        ";
    }
    else
    {
        if(isset($_COOKIE['email']))
        {
            $ID = $_COOKIE['id'];
            $name = $_POST['lname'].' '.$_POST['fname'];
            $dateCreate = date("Y-m-d H:i:s");
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $payment = $_POST['payment'];
            $total = $_SESSION['total'];
            $address = $_POST['address'];
            $status  = 1;

            $addorder = $db->prepare('INSERT INTO hoadon (ID_KH,NGAYLAP,TONGTTIEN, TRTHAI, TEN_NN, SDT, EMAIL, PTTT, DC_NHANHANG)
                                    VALUES(:ID,:DATECREATE,:TOTAL,:TRTHAI, :NAMENN, :PHONE,:EMAIL,:PAYMENT,:ADDRES)');
            $addorder -> bindValue(':ID', $ID, PDO::PARAM_STR);
            $addorder -> bindValue(':NAMENN', $name, PDO::PARAM_STR);
            $addorder -> bindValue(':DATECREATE', $dateCreate, PDO::PARAM_STR);
            $addorder -> bindValue(':EMAIL', $email, PDO::PARAM_STR);
            $addorder -> bindValue(':PHONE', $phone, PDO::PARAM_STR);
            $addorder -> bindValue(':PAYMENT', $payment, PDO::PARAM_STR);
            $addorder -> bindValue(':TOTAL', $total, PDO::PARAM_STR);
            $addorder -> bindValue(':TRTHAI', $status, PDO::PARAM_STR);
            $addorder -> bindValue(':ADDRES', $address, PDO::PARAM_STR);

            $addorder->execute();

            $lastorderId = $db->lastInsertId();

            $detailOrder = $db -> prepare('INSERT INTO chitiethoadon (ID_HD,ID_SP,SOLUONG,ANH, DONGIA,THTIEN) 
                                            VALUES (:ID_HD,:ID_SP,:SOLUONG,:ANH,:DONGIA,:THTIEN)');

            foreach($_SESSION['cart'] as $value)
            {
                $sum = $value['quantity'] * $value['price'];
                $detailOrder -> bindValue(':ID_HD',$lastorderId ,PDO::PARAM_STR );
                $detailOrder -> bindValue(':ID_SP', $value['id'],PDO::PARAM_STR);
                $detailOrder -> bindValue(':SOLUONG',$value['quantity'], PDO::PARAM_STR);
                $detailOrder -> bindValue(':ANH', $value['photo'], PDO::PARAM_STR);
                $detailOrder -> bindValue(':DONGIA', $value['price'], PDO::PARAM_STR);
                $detailOrder -> bindValue(':THTIEN', $sum, PDO::PARAM_STR);

                $detailOrder->execute();


                //Trù tồn kho trên db
                $stmt = $db -> prepare('update sanpham set TONKHO = sanpham.TONKHO - :soluong where ID = :id');
                $stmt -> bindValue(':soluong',$value['quantity'], PDO::PARAM_INT );
                $stmt -> bindValue(':id',$value['id'], PDO::PARAM_INT );
                $stmt -> execute();
            }
            unset($_SESSION['cart']);
            $level  = '../';
            header("location: {$level}pages/dash-manage-order.php?id=".$lastorderId); 
            exit;
        }
        else {
                echo "
                <script>
                    var confirmation = confirm('Không thể thanh toán. Bạn chưa đăng nhập. Nhấn để đăng nhập?');
                    if (confirmation) {
                        window.location.href = '../pages/signin.php'; // Đường dẫn đến trang giỏ hàng
                    } else {
        
                    }
                </script>
                ";
        }
    
    }
?>
