<?php
    include $level.DATABASE_PATH.'db.php';

    $ID = $_GET['id'];
    $sql = "SELECT * 
            FROM sanpham inner join danhsachanh on danhsachanh.ID_SANPHAM = sanpham.ID
            inner join trangthai on trangthai.ID = sanpham.TRANGTHAI
            inner join loaisp on loaisp.ID = sanpham.LOAISP
            WHERE sanpham.ID = :ID";
    $data = $db -> prepare($sql);
    $data->bindValue(':ID', $ID, PDO::PARAM_STR);
    $data->execute();
    $rowsdata = $data -> fetchAll();
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

                            <form method="post" action=<?php echo"'".$level."form/products/edit.php?id=".$ID."'"?>>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="productname">Product Name</label>
                                            <input id="productname" name="productname" type="text" class="form-control"
                                            value="<?php echo $rowsdata[0]['TENSP']?>" placeholder="Product Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label" for="manufacturername">Manufacturer Name</label>
                                            <select class="form-control select2" name="manufacturername" >
                                                <?php 
                                                    $data = $db->query('select * from hangsanxuat');
                                                    $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($result as $value)
                                                    { ?>
                                                        <option value="<?php echo $value['ID']; ?>" <?php if($rowsdata[0]['NHASX'] == $value['ID']) echo 'selected' ?>><?php echo $value['TENNSX']?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input id="price" name="price" type="text" class="form-control"
                                            value="<?php echo $rowsdata[0]['GIA']?>" placeholder="Price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="promotion">Promotion (%)</label>
                                            <input class="form-control" name="promotion" type="text"
                                            value="<?php echo $rowsdata[0]['GIAMGIA']?>"  placeholder="Promotion">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Status</label>
                                            <select class="form-control select2" name="status">
                                            <?php 
                                                $data = $db->query('select * from trangthai');
                                                $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID']; ?>" <?php if($rowsdata[0]['TRANGTHAI']== $value['ID']) echo 'selected' ?>><?php echo $value['TENTT']?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="stock">Stock</label>
                                            <input id="price" name="stock" type="text" class="form-control"
                                            value="<?php echo $rowsdata[0]['TONKHO']?>" placeholder="Stock">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Category</label>
                                            <select class="form-control select2" name="slt">
                                            <?php 
                                                $data = $db->query('select * from loaisp');
                                                $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID']; ?>" <?php if($rowsdata[0]['LOAISP']== $value['ID']) echo 'selected' ?>><?php echo $value['TENLOAI']?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productdesc">Product Description</label>
                                            <textarea class="form-control" id="productdesc" name="productdesc" rows="5"
                                            placeholder="Product Description"><?php echo $rowsdata[0]['MOTA']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="product_pic">
                                            <h4 class="card-title mb-3">List Product Images</h4>

                                            <div class="top-list" style="display: flex; justify-content: space-around; column-gap: 2rem">
                                                <?php
                                                    $i = 1;
                                                    foreach($rowsdata as $value)
                                                    { ?>
                                                        <div class="dropzone card" id="<?php echo 'file-select'.$i?>" style="cursor: pointer; width: 50%">
                                                            <div class="fallback" style="text-align: center">
                                                                <!-- Hidden file input with an associated label -->
                                                                <input id="<?php echo 'photo-input'.$i ?>" name="<?php echo 'photo'.$i?>" type="file" style="display: none;" multiple />
                                                                <label class="photo-label" for="photo" style="text-align: center; cursor: pointer;">
                                                                    Click here to select files
                                                                </label>
                                                                <img id="<?php echo 'preview'.$i?>" src="<?php echo $level.ASSETS_PATH.IMG_PATH.'products/'.$value['ANH']?>" alt="Preview Image" style=" width: 10rem; height: 10rem;">
                                                            </div>
                                                        </div>
                                                    <?php
                                                    $i++;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" id="edit-btn" class="btn btn-primary waves-effect waves-light">Save
                                        Changes</button>
                                    <a href="../pages/product-list.php"><button type="button"
                                        class="btn btn-secondary waves-effect waves-light">Cancel</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        
    <!-- <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <p id="popup-message"></p>
        </div>
    </div> -->


    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
<!-- end main content-->
<script>

    function clickFileInput(inputId) {
        document.getElementById(inputId).click();
    }
    function previewImage(inputId, previewId) {
        var fileInput = document.getElementById(inputId);
        var selectedFiles = fileInput.files;

        //Check if any files are selected
        if (selectedFiles.length > 0) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById(previewId);
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(selectedFiles[0]);
        }
    }

    //photo1
    document.getElementById('photo-input1').addEventListener('change', function() {
        previewImage('photo-input1', 'preview1');
    });

    document.getElementById('file-select1').addEventListener('click', function() {
        clickFileInput('photo-input1');
    })
    //photo2
    document.getElementById('photo-input2').addEventListener('change', function() {
        previewImage('photo-input2', 'preview2');
    });

    document.getElementById('file-select2').addEventListener('click', function() {
        clickFileInput('photo-input2');
    })
    //photo3
    document.getElementById('photo-input3').addEventListener('change', function() {
        previewImage('photo-input3', 'preview3');
    });

    document.getElementById('file-select3').addEventListener('click', function() {
        clickFileInput('photo-input3');
    })
    //photo4
    document.getElementById('photo-input4').addEventListener('change', function() {
        previewImage('photo-input4', 'preview4');
    });

    document.getElementById('file-select4').addEventListener('click', function() {
        clickFileInput('photo-input4');
    })
</script>
