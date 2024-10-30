<?php
    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $sql = "select* from nguoidung inner join chucvu on nguoidung.CHUCVU = chucvu.ID
    inner join trangthai on nguoidung.TRTHAI = trangthai.ID where nguoidung.ID = :ID ";
    $data = $db -> prepare($sql);
    $data->bindValue(':ID', $ID, PDO::PARAM_STR);
    $data -> execute();
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

                            <form method="post" action=<?php echo"'".$level."form/users/edit.php?id=".$row[0]."'"?>>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="fullname">Full Name</label>
                                            <input id="fullname" name="fullname" type="text" class="form-control"
                                            value="<?php echo $row['HOTEN']?>" placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Email</label>
                                            <input id="email" name="email" type="text" class="form-control"
                                            value="<?php echo $row['EMAIL']?>" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" name="phone" type="text"
                                            value="<?php echo $row['SDT']?>" placeholder="Phone number">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Status</label>
                                            <select class="form-control select2" name="status">
                                            <?php 
                                                $data = $db->query('select * from trangthai');
                                                $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID'];?>" <?php if($row['TRTHAI']== $value['ID']) echo 'selected' ?>><?php echo $value['TENTT']?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="pass">Password</label>
                                            <input id="pass" name="pass" type="password" class="form-control"
                                            value="<?php echo $row['MATKHAU']?>"  placeholder="Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cfpass">Confirm Password</label>
                                            <input id="cfpass" name="cfpass" type="password" class="form-control"
                                            value="<?php echo $row['MATKHAU']?>"    placeholder="Confirm">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Role</label>
                                            <select class="form-control select2" name="user">
                                                <?php
                                                    $chucvu = $db -> query('select * from chucvu');
                                                    $rowsdata = $chucvu -> fetchAll(PDO::FETCH_ASSOC);

                                                    foreach($rowsdata as $value)
                                                    { ?>
                                                        <option value="<?php echo $value['ID'];?>" <?php if($value['ID']==$row['CHUCVU']) echo 'selected' ?>><?php echo $value['TENCV']?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Country</label>   
                                            <input type="text" name="country" class="form-control"
                                            value="<?php echo $row['DIACHI']?>" placeholder="Country">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Birth Day</label>   
                                            <input type="date" name="birthday" class="form-control"
                                            value="<?php echo $row['NGAYSINH']?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="product_pic">
                                            <h4 class="card-title mb-3">User Images</h4>

                                            <div class="dropzone card" style="cursor: pointer;" onclick="clickFileInput()">
                                                <div class="fallback" style="margin: 0 auto">
                                                    <!-- Hidden file input with an associated label -->
                                                    <input id="file-input" name="photo" type="file" style="display: none;" onchange="previewImage(event)" multiple />
                                                    <label for="file-input" style="width: 100%; height: 100%; text-align: center; cursor: pointer;">
                                                        Click here to select files
                                                    </label>
                                                    <img id="preview" src="<?php echo $level.ASSETS_PATH.IMG_PATH.'user/'.$row['ANH'] ?>" alt="Preview Image" style="display: block; width: 10rem; height: 10rem;">
                                                </div>
                                            </div>
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
<script>

    function clickFileInput() {
            // Trigger click on the hidden file input when the dropzone is clicked
            document.getElementById('file-input').click();
    }
    function previewImage(event) {
    var fileInput = document.getElementById('file-input');
    var selectedFiles = fileInput.files;

    // Check if any files are selected
    var reader = new FileReader();
    reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>