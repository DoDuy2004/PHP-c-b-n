<?php
    include $level.DATABASE_PATH.'db.php';
    include $level.'function/function.php';

    $sql = "SELECT * from nguoidung inner join trangthai on nguoidung.TRTHAI = trangthai.ID";
    $result = $db -> prepare($sql);
    $result -> execute();
    $rowsdata = $result->fetchAll();
    
    $sodong = sizeof($rowsdata);
    $sosanpham = isset($_GET['sosanpham']) ? $_GET['sosanpham'] : 8 ;
    $tranghientai = isset($_GET['tranghientai']) ? $_GET['tranghientai'] : 1 ;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

    if($sodong % $sosanpham == 0)
    {
        $sotrang = $sodong / $sosanpham;
    }
    else
        $sotrang = (int) ($sodong / $sosanpham) + 1;

    if(isset($_POST['btn-filter']))
    {
        $id = $_POST['id'];
        $name = $_POST['fname'];
        $status = $_POST['status'];
        $sql .= " WHERE 1=1 AND nguoidung.TRTHAI = :tt";

        if(!empty($id))
        {
            $sql .= " AND nguoidung.ID = :id";
        }
        if(!empty($name))
        {
            $sql .= " AND nguoidung.HOTEN like :fname";
        }
    }

    $offset = ($tranghientai - 1) * $sosanpham;
    $sql .= " ORDER BY nguoidung.ID $sort";
    $sql .= " LIMIT :lim OFFSET :offset";

    $result_ptrang = $db -> prepare($sql);
    if(isset($_POST['btn-filter']))
    {
        if(!empty($id))
        {
            $result_ptrang -> bindValue(':id', $id, PDO::PARAM_INT);
        }
        if(!empty($name))
        {
            $result_ptrang -> bindValue(':fname', '%'.$name.'%', PDO::PARAM_STR);
        }
        $result_ptrang -> bindValue(':tt', $status, PDO::PARAM_INT);
    }
    $result_ptrang -> bindValue(':lim', $sosanpham, PDO::PARAM_INT);
    $result_ptrang -> bindValue(':offset', $offset, PDO::PARAM_INT);
    $result_ptrang -> execute();
    
    $customer_ptrang = $result_ptrang -> fetchAll();
?>
<div class="row g-4 mb-4">
    <div class="col-md-12">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="card-title">New Customers</h6>
                <div id="new-customers"></div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex mb-4">
                    <h6 class="card-title mb-0">Customer Rating</h6>
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-sm" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">View Detail</a>
                            <a href="#" class="dropdown-item">Download</a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="display-6">3.0</div>
                    <div class="d-flex justify-content-center gap-3 my-3">
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-warning"></i>
                        <i class="bi bi-star-fill icon-lg text-muted"></i>
                        <i class="bi bi-star-fill icon-lg text-muted"></i>
                        <span>(318)</span>
                    </div>
                </div>
                <div class="text-muted d-flex align-items-center justify-content-center">
                    <span class="text-success me-3 d-block">
                        <i class="bi bi-arrow-up me-1 small"></i>+35
                    </span> Point from last month
                </div>
                <div class="row my-4">
                    <div class="col-md-6 m-auto">
                        <div id="customer-rating"></div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-icon">
                        <i class="bi bi-download"></i> Download Report
                    </button>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="card">
    <div class="card-body">
        <div class="d-md-flex gap-3">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Customers</div>
                <form class="mb-3 mb-md-0" action="<?php echo $_SERVER['PHP_SELF']?>" >
                    <div class="row g-3">
                        <div class="col-md-6">
                            <select class="form-select" name="sort" onchange="this.form.submit()">
                                <option value="asc" <?php if($sort == 'asc') echo 'selected' ?>>Asc</option>
                                <option value="desc" <?php if($sort == 'desc') echo 'selected' ?>>Desc</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="sosanpham" onchange="this.form.submit();">
                                <?php for($i = 8; $i <= 24; $i += 4) : ?>
                                    <option value="<?php echo $i ?>" <?php if($sosanpham == $i) echo 'selected' ?>><?php echo $i ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-md-flex gap-4 align-items-center">
                <form class="mb-3 mb-md-0" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="id" class="form-control" placeholder="Id">
                                <input style="width: 60%" type="text" name="fname" class="form-control" placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-select" name="status" id="">
                                    <?php 
                                        $stmt = $db -> query('select * from trangthai');
                                        $result = $stmt -> fetchAll();
                                        foreach($result as $value) :
                                    ?>
                                        <option value="<?php echo $value['ID']?>"><?php echo $value['TENTT']?></option>
                                    <?php endforeach ?>
                                </select>
                                <button class="btn btn-outline-light" name="btn-filter" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-custom table-lg mb-0" id="customers">
        <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox"
                        data-select-all-target="#customers" id="defaultCheck1">
                </th>
                <th>ID</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Country</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(!isset($_POST['btn']) || $_POST['noidung'] == '')
            {   ?>
                <?php 
                    foreach($customer_ptrang as $value)
                    {?>
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox">
                            </td>
                            <td><a href=""><?php echo '#'.$value[0] ?></a></td>
                            <td><?php echo $value['HOTEN']?></td>
                            <td><?php echo $value['EMAIL']?></td>
                            <td><?php echo $value['DIACHI']?></td>
                            <td><?php echo $value['NGAYSINH']?></td>
                            <td>
                                <span class="badge <?php echo bg($value['TENTT'])?>">
                                    <?php echo $value['TENTT'] ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex">
                                    <div class="dropdown ms-auto">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- <a href="#" class="dropdown-item">View profile</a> -->
                                            <a href=<?php echo"'".$level.PAGES_PATH."edit-customer.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                            <a href=<?php echo"'".$level."form/customers/".remove_or_restore_link($value['TRTHAI'])."?id=".$value[0]."'"?> class="dropdown-item"><?php echo remove_or_restore($value['TRTHAI']) ?></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                ?> 
            <?php
            }
        ?>
         <?php
            include $level.DATABASE_PATH.'db.php';
            if(isset($_POST['btn']))
            {?>
                <?php
                    $input = $_POST['noidung'];
                    $result = $db -> prepare("select * from nguoidung
                    inner join trangthai on TRTHAI = trangthai.ID
                    where nguoidung.HOTEN like :input");
                    $result -> bindValue(':input', '%'.$input.'%',PDO::PARAM_STR);
                    $result -> execute();
                    $rowsdata = $result->fetchAll();

                    //print_r($rowsdata);
                ?>

                <?php
                    if($input != '')
                    {?>
                        <?php 
                            foreach($rowsdata as $value)
                            {?>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td><a href=""><?php echo '#'.$value[0] ?></a></td>
                                    <td><?php echo $value['HOTEN']?></td>
                                    <td><?php echo $value['EMAIL']?></td>
                                    <td><?php echo $value['DIACHI']?></td>
                                    <td><?php echo $value['NGAYSINH']?></td>
                                    <td>
                                    <?php
                                        if($value['TENTT'] == 'Active')
                                        {?>
                                            <span class="badge bg-success">
                                                <?php echo $value['TENTT'] ?>
                                            </span>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if($value['TENTT'] == 'Deactive')
                                        {?>
                                            <span class="badge bg-danger">
                                                <?php echo $value['TENTT'] ?>
                                            </span>
                                        <?php
                                        }
                                    ?>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex">
                                            <div class="dropdown ms-auto">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- <a href="#" class="dropdown-item">View profile</a> -->
                                                    <a href=<?php echo"'".$level.PAGES_PATH."edit-customer.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                    <a href=<?php echo"'".$level."form/customers/remove.php?id=".$value[0]."'"?> class="dropdown-item">Del</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?> 
                    <?php
                    }
                ?>
            <?php
            }
        ?>
        </tbody>
    </table>
</div>


