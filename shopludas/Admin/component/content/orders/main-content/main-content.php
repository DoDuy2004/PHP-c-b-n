<?php
    include $level.DATABASE_PATH.'db.php';
    include $level.'function/function.php';

    $sql = "SELECT * from hoadon inner join trangthaidonhang on TRTHAI = trangthaidonhang.ID
            inner join nguoidung on nguoidung.ID = hoadon.ID_KH";
    $listOrder = $db -> query($sql);

    $result = $listOrder -> fetchAll();
    $sodong = sizeof($result);

    $sosanpham = isset($_GET['sosanpham']) ? $_GET['sosanpham'] : 8;
    $tranghientai = isset($_GET['tranghientai']) ? $_GET['tranghientai'] : 1;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

    if($sodong % $sosanpham == 0)
    {
        $sotrang = $sodong / $sosanpham;
    }
    else
        $sotrang = (int) ($sodong / $sosanpham) + 1;

        if (isset($_POST['smOrder'])) {
            $dateCr = $_POST['dateCr'];
            $orderId = $_POST['orderId'];
            $cusId = $_POST['cusId'];
            $fname = $_POST['fname'];
            $status = $_POST['trangthai'];
        
            $sql .= " WHERE 1=1";  // Bắt đầu điều kiện và luôn là true
            
            if(!empty($status))
            {
                $sql .= " AND hoadon.TRTHAI = :stt";
            }

            if (!empty($dateCr)) {
                $sql .= " AND hoadon.NGAYLAP LIKE :datecr";
            }
        
            if (!empty($cusId)) {
                $sql .= " AND hoadon.ID_KH = :cusid";
            }
        
            if (!empty($fname)) {
                $sql .= " AND hoadon.TEN_NN LIKE :fname";
            }
        
            if (!empty($orderId)) {
                $sql .= " AND hoadon.ID = :orderid";
            }
        }

    $offset = ($tranghientai - 1) * $sosanpham ;
    $sql .= " ORDER BY hoadon.ID $sort";
    $sql .= " LIMIT :lim OFFSET :offset";

    $listOrder_ptrang = $db -> prepare($sql);
    if(isset($_POST['smOrder']))
    {
        if (!empty($status)) {
            $listOrder_ptrang -> bindValue(':stt', $status, PDO::PARAM_INT);
        }
        if (!empty($dateCr)) {
            $listOrder_ptrang -> bindValue(':datecr', $dateCr.'%', PDO::PARAM_STR);
        }
    
        if (!empty($cusId)) {
            $listOrder_ptrang -> bindValue(':cusid', $cusId, PDO::PARAM_STR);
        }
    
        if (!empty($fname)) {
            $listOrder_ptrang -> bindValue(':fname', '%'.$fname.'%', PDO::PARAM_STR);
        }
    
        if (!empty($orderId)) {
            $listOrder_ptrang -> bindValue(':orderid', $orderId, PDO::PARAM_STR);
        }
    }
    $listOrder_ptrang -> bindValue(':lim', $sosanpham, PDO::PARAM_INT);
    $listOrder_ptrang -> bindValue(':offset', $offset, PDO::PARAM_INT);
    $listOrder_ptrang -> execute();

    $result_ptrang = $listOrder_ptrang -> fetchAll();
?>
<div class="card">
    <div class="card-body">
        <div class="d-flex gap-3">
            <form class="d-flex gap-3 align-items-center" action="<?php echo $_SERVER['PHP_SELF']?>">
                <div class="d-none d-md-flex">All Orders</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <select class="form-select" name="sort" onchange="this.form.submit()">
                            <option value="asc" <?php if($sort == 'asc') echo 'selected' ?>>Asc</option>
                            <option value="desc" <?php if($sort == 'desc') echo 'selected' ?>>Desc</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="sosanpham" onchange="this.form.submit();">
                            <?php for($i = 8 ; $i <= 24 ; $i+=4) :?>
                                <option value="<?php echo $i ?>" <?php if($sosanpham == $i) echo 'selected' ?>><?php echo 'Show: '.$i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>  
            </form>
            <form class="d-flex gap-3 align-items-center" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="date" name="dateCr" class="form-control" placeholder="Date created" >
                                <input type="text" name="orderId" class="form-control" placeholder="Invoice code" >
                                <select class="form-select" name="trangthai">
                                    <option value="">Choose status</option>
                                    <?php  
                                        $stmt = $db -> prepare('SELECT * from trangthaidonhang');
                                        $stmt -> execute();
                                        $listStatus = $stmt -> fetchAll();

                                        foreach($listStatus as $value) :
                                    ?>
                                        <option value="<?php echo $value[0] ?>"><?php echo $value['TENTT_DH']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-md-flex align-items-center">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" name="cusId" class="form-control" placeholder="Customer Id" >
                            <input type="text" name="fname" class="form-control" placeholder="Customer name" >
                            <button class="btn btn-outline-light" name="smOrder" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-custom table-lg mb-5" id="orders">
        <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#orders" id="defaultCheck1">
                </th>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result_ptrang as $value) : ?>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="#"><?php echo '#'.$value[0]?></a>
                </td>
                <td><?php echo $value['HOTEN']?></td>
                <td><?php echo $value['NGAYLAP'] ?></td>
                <td><?php echo $value['TONGTTIEN']?></td>
                <td>
                    <span class="badge <?php echo bgStatus($value['TENTT_DH']) ?>"><?php echo $value['TENTT_DH']?></span>
                </td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                 <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?php echo $level.'pages/order-detail.php?id='.$value[0];?>" class="dropdown-item">Show</a>
                                <?php if($value['4'] == 1 || $value['4'] == 3) : ?>
                                    <?php 
                                        $stt = remove_or_restore_order($value['4']);
                                        foreach($stt as $val) :
                                    ?>        
                                        <a href="<?php echo $level."form/order/edit-status.php?id=".$value[0].'&stt='.$val ?>" class="dropdown-item"><?php echo $val ?></a>

                                    <?php endforeach ?>
                                <?php endif ?>
                                <?php if($value['4'] != 3 && $value['4'] != 1) : ?>
                                    <?php 
                                    $del = 2;
                                    $process = 1;
                                    $stmt = $db -> prepare('SELECT * from trangthaidonhang
                                                            where ID > :sts AND ID <> 3');
                                    $stmt -> bindValue(':sts', $value['4'], PDO::PARAM_INT);
                                    $stmt -> execute();

                                    $result = $stmt -> fetchAll();
                                    foreach($result as $status):
                                    ?>
                                        <a href="<?php echo $level.'form/order/edit-status.php?id='.$value[0];?>" class="dropdown-item"><?php echo $status['TENTT_DH']?></a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<nav class="" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if($tranghientai > 1) : ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$tranghientai - 1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php endif ?>
        <?php for($i = 1 ; $i <= $sotrang ; $i++) :?>
            <li class="page-item <?php if($tranghientai == $i) echo 'active' ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$i?>"><?php echo $i ?></a></li>
        <?php endfor ?>
        <?php if($tranghientai < $sotrang) :?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$tranghientai + 1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php endif ?>
    </ul>
</nav>
