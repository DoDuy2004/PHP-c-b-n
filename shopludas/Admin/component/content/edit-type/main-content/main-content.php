<?php
    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $sql = "select* 
            from loaisp where ID = :ID";
    $data = $db -> prepare($sql);
    $data->bindValue(':ID',$ID,PDO::PARAM_STR);
    $data->execute();
    $row = $data ->fetch();
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Basic Information</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form method="post" action=<?php echo"'".$level."form/typeproduct/edit.php?id=".$row['ID']."'"?>>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="productname">Type Name</label>
                                            <input id="productname" name="typename" type="text" class="form-control"
                                            value="<?php echo $row['TENLOAI']?>" placeholder="Product Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Status</label>
                                            <select class="form-control select2" name="status">
                                            <?php 
                                                $data = $db->query('select * from trangthai');
                                                $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID']; ?>" <?php if($row['TRTHAI']== $value['ID']) echo 'selected' ?>><?php echo $value['TENTT']?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="productdesc">Type Description</label>
                                            <textarea class="form-control" id="typedesc" name="typedesc" rows="5"
                                            placeholder="Product Description"><?php echo $row['MOTA']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <button type="button"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- end main content-->
