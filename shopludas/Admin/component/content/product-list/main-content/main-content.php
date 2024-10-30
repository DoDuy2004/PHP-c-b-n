<?php
    include $level.DATABASE_PATH.'db.php';
    include $level.'function/function.php';

    $sql = "SELECT * 
    FROM sanpham INNER JOIN loaisp ON sanpham.LOAISP = loaisp.ID
    INNER JOIN hangsanxuat ON sanpham.NHASX = hangsanxuat.ID
    INNER JOIN trangthai ON sanpham.TRANGTHAI = trangthai.ID
    INNER JOIN danhsachanh ON sanpham.ID = danhsachanh.ID_SANPHAM";

    $sosanpham = isset($_GET['sosanpham']) ? $_GET['sosanpham'] : 8;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

    //Bộ lọc tìm kiếm
    if(isset($_POST['filter']))
    {
        //tách min và max theo ;
        $price = explode(';', $_POST['price']);
        //chuyen giá trị thanh so nguyen
        $min = intval($price[0]);
        $max = intval($price[1]);

        $keyword = $_POST['nameProd'];
        $id = $_POST['idProd'];
        $type = $_POST['typeProd'];
        $manuf = $_POST['manufacturer'];
        $inventory = $_POST['tonkho'];

        $sql .= " WHERE sanpham.GIA BETWEEN :min AND :max";

        if(!empty($keyword))
        {
            $sql .= " AND sanpham.TENSP like :keyword";
        }
        if(!empty($manuf))
        {
            $sql .= " AND sanpham.NHASX = :manuf";
        }
        if(!empty($type))
        {
            $sql .= " AND sanpham.LOAISP = :typePr";
        }
        if(!empty($id))
        {
            $sql .= " AND sanpham.ID = :id";
        }
        if(!empty($inventory))
        {
            $sql .= " AND sanpham.TONKHO <= :tonkho";
        }
    }
    $sql .= " GROUP BY sanpham.ID";
    
    $dsSanpham = $db ->prepare($sql);

    if(isset($_POST['filter']))
    {
        $dsSanpham -> bindValue(':min', $min, PDO::PARAM_INT);
        $dsSanpham -> bindValue(':max', $max, PDO::PARAM_INT);
        if(!empty($keyword))
        {
            $dsSanpham -> bindValue(':keyword', '%'.$keyword.'%', PDO::PARAM_STR);
        }
        if(!empty($id))
        {
            $dsSanpham -> bindValue(':id', $id , PDO::PARAM_STR);
        }
        if(!empty($inventory))
        {
            $dsSanpham -> bindValue(':tonkho', $inventory , PDO::PARAM_INT);
        }
        if(!empty($manuf))
        {
            $dsSanpham -> bindValue(':manuf', $manuf, PDO::PARAM_INT);
        }
        if(!empty($type))
        {
            $dsSanpham -> bindValue(':typePr', $type, PDO::PARAM_STR);
        }
    }

    $dsSanpham ->execute();
    $rowsdata = $dsSanpham -> fetchAll();
    
    $sodong = sizeof($rowsdata);

    
    //Tinh so trang
    if($sodong % $sosanpham == 0)
    {
        $sotrang = $sodong / $sosanpham ;
    }
    else
    {
        $sotrang = (int) ($sodong / $sosanpham) + 1;
    }

    $tranghientai = isset($_GET['tranghientai']) ? $_GET['tranghientai'] : 1;

    $offset = ($tranghientai - 1) * $sosanpham;

    $sql .= " ORDER BY sanpham.ID $sort";
    $sql .= " LIMIT :lim OFFSET :offset";

    //echo $sql;
    $dsSanpham_ptrang = $db -> prepare($sql);
    if(isset($_POST['filter']))
    {
        $dsSanpham_ptrang -> bindValue(':min', $min, PDO::PARAM_INT);
        $dsSanpham_ptrang -> bindValue(':max', $max, PDO::PARAM_INT);
        if(!empty($keyword))
        {
            $dsSanpham_ptrang -> bindValue(':keyword', '%'.$keyword.'%', PDO::PARAM_STR);
        }
        if(!empty($id))
        {
            $dsSanpham_ptrang -> bindValue(':id', $id , PDO::PARAM_STR);
        }
        if(!empty($inventory))
        {
            $dsSanpham_ptrang -> bindValue(':tonkho', $inventory , PDO::PARAM_INT);
        }
        if(!empty($manuf))
        {
            $dsSanpham_ptrang -> bindValue(':manuf', $manuf, PDO::PARAM_INT);
        }
        if(!empty($type))
        {
            $dsSanpham_ptrang -> bindValue(':typePr', $type, PDO::PARAM_STR);
        }
    }
    $dsSanpham_ptrang -> bindValue(':lim', $sosanpham, PDO::PARAM_INT);
    $dsSanpham_ptrang -> bindValue(':offset', $offset, PDO::PARAM_INT);
    $dsSanpham_ptrang -> execute();
    $result = $dsSanpham_ptrang -> fetchAll();

?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Products</div>
                    <div class="d-md-flex gap-2 align-items-center">
                        <form class="mb-3 mb-md-0">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <select class="form-select" name="sort" onchange="this.form.submit()">
                                        <option value="asc" <?php if($sort == 'asc') echo 'selected' ?>>Asc</option>
                                        <option value="desc" <?php if($sort == 'desc') echo 'selected' ?>>Desc</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="sosanpham" class="form-select" onchange="this.form.submit()">
                                        <?php
                                            for($i = 8 ; $i<=24 ; $i+=4)
                                            {?>
                                                <?php echo "<option value='$i' " . ($sosanpham == $i ? 'selected' : '') . ">Show: $i</option>"?>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"
                            aria-haspopup="true" aria-expanded="false">Actions</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-custom table-lg mb-0" id="products">
                <thead>
                    <tr>
                        <th>
                            <input class="form-check-input select-all" type="checkbox"
                                data-select-all-target="#products" id="defaultCheck1">
                        </th>
                        <th>ID</th>
                        <th>Photo</th> 
                        <th>Name</th>
                        <th style="text-align: start;">Product Type</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!isset($_POST['btn']) || $_POST['noidung'] == '')
                        {?>
                            <?php 
                                foreach($result as $value)
                                { ?>
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox">
                                        </td>
                                        <td>
                                            <a href="#"><?php echo '#'.$value[0] ?></a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.'products/'.$value['ANH']?>" class="rounded"
                                                width="40"
                                                alt="...">
                                            </a>
                                        </td>
                                        <td><?php echo $value['TENSP']?></td>
                                        <td><?php echo $value['TENLOAI']?></td>
                                        <td>
                                            <span class="text-success"><?php echo $value['TONKHO']?></span>
                                        </td>
                                        <td><?php echo '$'.$value['GIA']?></td>
                                        <td>
                                            <span class="badge <?php echo bg($value['TENTT'])?>">
                                                <?php echo $value['TENTT'] ?>
                                            </span> 
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex">
                                                <div class="dropdown ms-auto">
                                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href=<?php echo"'".$level.PAGES_PATH."product-detail.php?id=".$value[0]."'"?> class="dropdown-item">Show</a>
                                                        <a href=<?php echo"'".$level.PAGES_PATH."edit-product.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                        <a href=<?php echo"'".$level."form/products/".remove_or_restore_link($value['TRANGTHAI'])."?id=".$value[0]."'"?> class="dropdown-item"><?php echo remove_or_restore($value['TRANGTHAI']) ?></a>
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
                                //$sql = "select * from sanpham inner join loaisp on LOAISP = MALOAI where TENSP like '%$input%' or MASP like '%$input%'";
                                $dsSanpham_tkiem = $db -> prepare("SELECT * from sanpham inner join loaisp on LOAISP = loaisp.ID 
                                inner join trangthai on sanpham.TRANGTHAI = trangthai.ID
                                inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.id
                                where TENSP like :input
                                GROUP BY sanpham.ID
                                ORDER BY danhsachanh.ID desc");
                                $dsSanpham_tkiem -> bindValue(':input', '%'.$input.'%', PDO::PARAM_STR);
                                
                                $dsSanpham_tkiem -> execute();
                                $rowsdata = $dsSanpham_tkiem->fetchAll(PDO::FETCH_ASSOC);

                                //print_r($rowsdata);
                                $i = count($rowsdata);
                            ?>

                            <?php
                                if($input != '')
                                {?>
                                    <?php 
                                        foreach($rowsdata as $value)
                                        { ?>
                                            <tr>
                                                <td>
                                                    <input class="form-check-input" type="checkbox">
                                                </td>
                                                <td>
                                                    <a href="#"><?php echo '#'.$value['ID'] ?></a>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.'products/'.$value['ANH']?>" class="rounded"
                                                        width="40"
                                                        alt="...">
                                                    </a>
                                                </td>
                                                <td><?php echo $value['TENSP']?></td>
                                                <td><?php echo $value['TENLOAI']?></td>
                                                <td>
                                                    <span class="text-success"><?php echo $value['TONKHO']?></span>
                                                </td>
                                                <td><?php echo '$'.$value['GIA']?></td>
                                                <td>
                                                    <span class="badge <?php echo bg($value['TENTT'])?>">
                                                        <?php echo $value['TENTT'] ?>
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex">
                                                        <div class="dropdown ms-auto">
                                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?> class="dropdown-item">Show</a>
                                                                <a href=<?php echo"'".$level.PAGES_PATH."edit-product.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                                <a href=<?php echo"'".$level."form/products/".remove_or_restore_link($value['TRANGTHAI'])."?id=".$value[0]."'"?> class="dropdown-item"><?php echo remove_or_restore($value['TRANGTHAI']) ?></a>
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
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if($tranghientai > 1) :?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai - 1).'&sosanpham='.$sosanpham?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif ?>
                <?php for($i = 1; $i <= $sotrang ; $i++) :?>
                    <li class="page-item <?php if($tranghientai == $i) echo 'active' ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$i.'&sosanpham='.$sosanpham?>"><?php echo $i ?></a></li>
                <?php endfor ?>
                <?php if($tranghientai < $sotrang) :?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai + 1).'&sosanpham='.$sosanpham?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <div class="col-md-4">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h5 class="mb-4">Filter Products</h5>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#keywordsCollapseExample" role="button">
                        <div>Keywords</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="keywordsCollapseExample">
                        <div class="input-group">
                            <input type="text" class="form-control" name="idProd" placeholder="Id">
                            <input type="text" class="form-control" name="tonkho" placeholder="Inventory">
                            <input style="width: 45%" type="text" class="form-control" name="nameProd" placeholder="Phone, Headphone, Shoe ...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button">
                        <div>Categories</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="mt-3 col-md-8">
                        <select name="typeProd" class="form-select">
                            <option value="">Choose categories</option>
                            <?php
                                $type = $db -> query('SELECT * from loaisp');
                                $resultType = $type -> fetchAll(); 
                                foreach($resultType as $value) : 
                            ?>
                                    <?php echo "<option value='{$value['ID']}' " . ($value['ID'] == '0' ? 'selected' : '') . ">Show: {$value['TENLOAI']}</option>"?>

                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#categoriesCollapseExample" role="button">
                        <div>Manufacturer</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="mt-3 col-md-8">
                        <select name="manufacturer" class="form-select">
                            <option value="">Choose manufacturer</option>
                            <?php
                                $type = $db -> query('SELECT * from hangsanxuat');
                                $resultType = $type -> fetchAll(); 
                                foreach($resultType as $value) : 
                            ?>
                                    <?php echo "<option value='{$value['ID']}' " . ($value['ID'] == '0' ? 'selected' : '') . ">Show: {$value['TENNSX']}</option>"?>

                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#priceCollapseExample" role="button">
                        <div>Price</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="priceCollapseExample">
                        <input id="price-filter" name="price"/>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        aria-expanded="true" data-bs-target="#colorsCollapseExample" role="button">
                        <div>Colors</div>
                        <div class="bi bi-chevron-down"></div>
                    </div>
                    <div class="collapse show mt-4" id="colorsCollapseExample">
                        <div class="color-filter-group d-flex gap-3">
                            <input class="form-check-input" type="checkbox" value="#1fa0c6" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="green" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c61faa" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#1fc662" aria-label="...">
                            <input class="form-check-input" type="checkbox" value="#9dc61f" aria-label="...">
                            <input class="form-check-input" type="checkbox" checked value="#c67b1f" aria-label="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4"> 
                <button class="btn btn-outline-primary" name="filter" type="submit" style="font-size: 1.2rem">
                    SEARCH
                </button>
            </div>
        </form>
    </div>
</div>