<?php
    include $level.DATABASE_PATH.'db.php';
    
    $type = $db -> prepare('select * from loaisp inner join trangthai on loaisp.TRTHAI = trangthai.ID');
    $type -> execute();
    $rowsdata = $type -> fetchAll();

    include $level.'function/function.php';

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex gap-4 align-items-center">
                    <div class="d-none d-md-flex">All Products</div>
                    <div class="d-md-flex gap-4 align-items-center">
                        <form class="mb-3 mb-md-0">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option>Sort by</option>
                                        <option value="desc">Desc</option>
                                        <option value="asc">Asc</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
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
            <table class="table table-custom table-lg mb-1" id="products">
                <thead>
                    <tr>
                        <th>
                            <input class="form-check-input select-all" type="checkbox"
                                data-select-all-target="#products" id="defaultCheck1">
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($rowsdata as $value)
                        { ?>
                            <tr>
                                <td>
                                    <input class="form-check-input" type="checkbox">
                                </td>
                                <td>
                                    <a href="#"><?php echo '#'.$value[0] ?></a>
                                </td>
                                <td style="text-transform: capitalize"><?php echo $value['TENLOAI']?></td>
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
                                                <a href="#" class="dropdown-item">Show</a>
                                                <a href=<?php echo"'".$level.PAGES_PATH."edit-type.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                <a href=<?php echo"'".$level."form/typeproduct/".remove_or_restore_link($value['TRTHAI'])."?id=".$value[0]."'"?> class="dropdown-item"><?php echo remove_or_restore($value['TRTHAI']) ?></a>
                                            </div>
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
        <nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>