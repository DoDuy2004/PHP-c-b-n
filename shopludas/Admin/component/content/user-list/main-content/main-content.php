<?php
    include $level.DATABASE_PATH.'db.php';
    include $level.'function/function.php';

    $sql1 = "SELECT * from nguoidung inner join chucvu on nguoidung.CHUCVU = chucvu.ID
        inner join trangthai on nguoidung.TRTHAI = trangthai.ID
        where chucvu.TENCV = 'Admin' or chucvu.TENCV = 'Staff'";
    
    $sql = "SELECT * from nguoidung inner join chucvu on nguoidung.CHUCVU = chucvu.ID
    inner join trangthai on nguoidung.TRTHAI = trangthai.ID
    where 1=1";
    $result = $db -> prepare($sql1);
    $result -> execute();
    $rowsdata = $result->fetchAll();

    $sodong = sizeof($rowsdata);
    $sosanpham = isset($_GET['sosanpham']) ? $_GET['sosanpham'] : 8;
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
        $role = $_POST['role'];
        $sql .= " AND nguoidung.TRTHAI = :tt AND nguoidung.CHUCVU = :role";

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
    $sql .= " AND chucvu.TENCV = 'Admin' or chucvu.TENCV = 'Staff'";
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
        $result_ptrang -> bindValue(':role', $role, PDO::PARAM_INT);
    }
    $result_ptrang -> bindValue(':lim', $sosanpham, PDO::PARAM_INT);
    $result_ptrang -> bindValue(':offset', $offset, PDO::PARAM_INT);
    $result_ptrang -> execute();
    
    $user_ptrang = $result_ptrang -> fetchAll();

?>
<div class="card">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Users</div>
                <form class="mb-3 mb-md-0">
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
                                <input style="width: 60%" type="text" name="fname" class="form-control" placeholder="Name">
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
                                <select class="form-select" name="role" id="">
                                    <?php 
                                        $stmt = $db -> query('select * from chucvu');
                                        $result = $stmt -> fetchAll();
                                        foreach($result as $value) :
                                    ?>
                                        <option value="<?php echo $value['ID']?>"><?php echo $value['TENCV']?></option>
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
    <table id="users" class="table table-custom table-lg">
        <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#users"
                        id="defaultCheck1">
                </th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Country</th>
                <th>Role</th>
                <th>Status</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($user_ptrang as $value)
                { 
                    $username = explode('@', $value['EMAIL']);
                ?>
                <tr>
                    <td>
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td>
                        <a href="#">
                            <figure class="avatar me-3">
                                <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.'user/'.$value['ANH']?>" class="rounded-circle"
                                    alt="avatar">
                            </figure>
                            <?php echo $value['HOTEN'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $username[0] ?>
                    </td>
                    <td>
                        <?php echo $value['EMAIL'] ?>
                    </td>
                    <td>
                        <?php echo $value['DIACHI'] ?>
                    </td>
                    <td>
                        <?php echo $value['TENCV'] ?>
                    </td>
                    <td>
                        <span class="badge <?php echo bg($value['TENTT'])?>">
                            <?php echo $value['TENTT'] ?>
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a href="#" class="dropdown-item">
                                    View Profile
                                </a> -->
                                <a href=<?php echo"'".$level.PAGES_PATH."edit-user.php?id=".$value[0]."'"?> class="dropdown-item">
                                    Edit
                                </a>
                                <a href=<?php echo"'".$level."form/users/".remove_or_restore_link($value['TRTHAI'])."?id=".$value[0]."'"?> class="dropdown-item text-danger">
                                    <?php echo remove_or_restore($value['TRTHAI']) ?>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>