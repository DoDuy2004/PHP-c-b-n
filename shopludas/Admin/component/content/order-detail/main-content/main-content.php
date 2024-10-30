<?php
    $ID = $_GET['id'];

    include $level.DATABASE_PATH.'db.php';

    
    //Update dia chi giao hang
    if(isset($_POST['btn-change']))
    {
        $fname = $_POST['fname'];
        $numPhone = $_POST['phone'];
        $address = $_POST['address'];
        $id = $_GET['id'];

        $stmt = $db -> prepare("UPDATE hoadon set TEN_NN = :fname, SDT = :phone, DC_NHANHANG = :addr WHERE hoadon.ID = :id");
        $stmt -> bindValue(':fname', $fname, PDO::PARAM_STR);
        $stmt -> bindValue(':phone', $numPhone, PDO::PARAM_STR);
        $stmt -> bindValue(':addr', $address, PDO::PARAM_STR);
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
    }

    $Order = $db -> prepare("SELECT * from hoadon 
                                inner join trangthaidonhang on trangthaidonhang.ID = hoadon.TRTHAI
                                where hoadon.ID = :ID   ");
    $Order -> bindValue(':ID', $ID, PDO::PARAM_STR);     
    $Order -> execute();
    $data = $Order -> fetch();    
    
    function bgStatus ($status)
    {
        $bgColor = '';
        if($status == 'Processing')
            $bgColor = 'bg-primary';
        else if ($status == 'Shipped')
            $bgColor = 'bg-dark';
        else if ($status == 'Delivered')
            $bgColor = 'bg-warning';
        else if ($status == 'Cancelled')
            $bgColor = 'bg-danger';
        else 
            $bgColor = 'bg-success';
        
        return $bgColor;
    }

    //chi tiet hoa don
    $detailOrder = $db -> prepare('SELECT * from chitiethoadon
                                    inner join sanpham on chitiethoadon.ID_SP = sanpham.ID
                                    where ID_HD = :ID ');
    $detailOrder -> bindValue(':ID', $ID, PDO::PARAM_STR);     
    $detailOrder -> execute();
    $rowsdata = $detailOrder -> fetchAll();

    $check = isset($_GET['edit']) ? $_GET['edit'] : 0;
?>
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-5 d-flex align-items-center justify-content-between">
                    <span>Order No : <a href="#"><?php echo '#'.$data[0];?></a></span>
                    <span class="badge <?php echo bgStatus($data['TENTT_DH'])?>"><?php echo $data['TENTT_DH'];?></span>
                </div>
                <div class="row mb-5 g-4">
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Order Created at</p>
                        <?php echo $data['NGAYLAP'];?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Name</p>
                        <?php echo $data['TEN_NN'];?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Email</p>
                        <?php echo $data['EMAIL'];?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Contact No</p>
                        <?php echo $data['SDT'];?>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <?php if($check == 0) : ?>
                                <div class="card-body d-flex flex-column gap-3">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">Delivery Address</h5>
                                        <?php if($data['TENTT_DH'] == 'Processing') :?>
                                            <a href="<?php echo $_SERVER['PHP_SELF'].'?id='.$data[0].'&edit=1'?>">Edit</a>
                                        <?php endif ?>
                                    </div>
                                    <div>Name: Home</div>
                                    <div><?php echo $data['TEN_NN'];?></div>
                                    <div><?php echo $data['DC_NHANHANG'];?></div>
                                    <div>
                                        <i class="bi bi-telephone me-2"></i><?php echo $data['SDT'];?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if($check == 1) : ?>
                                <form class="card-body d-flex flex-column gap-3"  action="<?php echo $_SERVER['PHP_SELF'].'?id='.$data[0]?>" method="post">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">Delivery Address</h5>
                                    </div>
                                    <div>Name: Home</div>
                                    <div class="input-group"><input class="form-control" name="fname" type="text" value="<?php echo $data['TEN_NN'];?>"></div>
                                    <div class="input-group"><input class="form-control" name="address" type="text" value="<?php echo $data['DC_NHANHANG'];?>"></div>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="phone" value="<?php echo $data['SDT'];?>">
                                    </div>
                                    <button class="btn btn-outline-primary" name="btn-change" type="submit">Save</button>
                                </form>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card widget">
            <h5 class="card-header">Order Items</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rowsdata as $value) :?>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/'.$value['ANH'].'"'?> class="rounded"
                                            width="60" alt="...">
                                    </a>
                                </td>
                                <td><?php echo $value['TENSP'];?></td>
                                <td><span class="quantity-value"><?php echo $value['SOLUONG'];?></span>
                                </td>
                                <td><?php echo '$'.$value['DONGIA'];?></td>
                                <td><?php echo '$'.$value['THTIEN'];?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
        <div class="card mb-4">
            <div class="card-body">
                <h6 class="card-title mb-4">Price</h6>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Sub Total :</div>
                    <div class="col-4"><?php echo '$'.$data['TONGTTIEN'];?></div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Shipping :</div>
                    <div class="col-4">Free</div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Tax(0%) :</div>
                    <div class="col-4">$0</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 text-end">
                        <strong>Total :</strong>
                    </div>
                    <div class="col-4">
                        <strong><?php echo '$'.$data['TONGTTIEN'];?></strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-4">Invoice</h6>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 text-end">Invoice No :</div>
                    <div class="col-6">
                        <a href="#"><?php echo '#'.$data[0];?></a>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 text-end">Seller GST :</div>
                    <div class="col-6">12HY87072641Z0</div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-6 text-end">Purchase GST :</div>
                    <div class="col-6">22HG9838964Z1</div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary">Download PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>
