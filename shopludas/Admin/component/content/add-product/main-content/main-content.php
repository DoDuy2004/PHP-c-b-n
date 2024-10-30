<?php
    include $level.DATABASE_PATH.'db.php';
?>

<div class="popup" id="popup" style="display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f1f1f1;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
    <div class="popup-content" style="text-align: center;">
        <span class="close" 
            style="position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;" onclick="closePopup()">&times;</span>
        <p id="popup-message"></p>
    </div>
</div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Basic Information</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form method="post" action=<?php echo'"'.$level.'form/products/add.php"'?>>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="productname">Product Name</label>
                                            <input id="productname" name="productname" type="text" class="form-control"
                                                placeholder="Product Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label" for="manufacturername">Manufacturer Name</label>
                                            <select class="form-control select2" name="manufacturername">
                                            <?php 
                                                    $data = $db->query('select * from hangsanxuat');
                                                    $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($result as $value)
                                                    { ?>
                                                        <option value="<?php echo $value['ID']; ?>"><?php echo $value['TENNSX']?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input id="price" name="price" type="text" class="form-control"
                                                placeholder="Price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="promotion">Promotion (%)</label>
                                            <input class="form-control" name="promotion" type="text"
                                            placeholder="Promotion">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="stock">Stock</label>
                                            <input id="price" name="stock" type="text" class="form-control"
                                                placeholder="Stock">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Category</label>
                                            <select class="form-control select2" name="slt">
                                            <?php 
                                                $data = $db->query('select * from loaisp');
                                                $result = $data -> fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID']; ?>"><?php echo $value['TENLOAI']?></option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productdesc">Product Description</label>
                                            <textarea class="form-control" id="productdesc" name="productdesc" rows="5"
                                                placeholder="Product Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="product_pic">
                                            <h4 class="card-title mb-3">List Product Images</h4>

                                            <div class="top-list" style="display: flex; justify-content: space-around; column-gap: 2rem">
                                                <div class="dropzone card" id="file-select1" style="cursor: pointer; width: 50%">
                                                    <div class="fallback" style="margin: 0 auto">
                                                        <!-- Hidden file input with an associated label -->
                                                        <input id="photo-input1" name="photo1" type="file" style="display: none;" multiple />
                                                        <label class="photo-label" for="photo" style="text-align: center; cursor: pointer;">
                                                            Click here to select files
                                                        </label>
                                                        <img id="preview1" src="" alt="Preview Image" style="display: none; width: 10rem; height: 10rem;">
                                                    </div>
                                                </div>
                                                <div class="dropzone card" id="file-select2" style="cursor: pointer;  width: 50%">
                                                    <div class="fallback" style="margin: 0 auto">
                                                        <!-- Hidden file input with an associated label -->
                                                        <input id="photo-input2" name="photo2" type="file" style="display: none;" multiple />
                                                        <label class="photo-label" for="photo" style="text-align: center; cursor: pointer;">
                                                            Click here to select files
                                                        </label>
                                                        <img id="preview2" src="" alt="Preview Image" style="display: none; width: 10rem; height: 10rem;">
                                                    </div>
                                                </div>
                                                <div class="dropzone card" id="file-select3" style="cursor: pointer; width: 50%">
                                                    <div class="fallback" style="margin: 0 auto;">
                                                        <!-- Hidden file input with an associated label -->
                                                        <input id="photo-input3" name="photo3" type="file" style="display: none;" multiple />
                                                        <label class="photo-label" for="photo" style=" text-align: center; cursor: pointer;">
                                                            Click here to select files
                                                        </label>
                                                        <img id="preview3" src="" alt="Preview Image" style="display: none; width: 10rem; height: 10rem;">
                                                    </div>
                                                </div>  
                                                <div class="dropzone card" id="file-select4" style="cursor: pointer; width: 50%">
                                                    <div class="fallback" style="margin: 0 auto">
                                                        <!-- Hidden file input with an associated label -->
                                                        <input id="photo-input4" name="photo4" type="file" style="display: none;" multiple />
                                                        <label class="photo-label" for="photo" style="text-align: center; cursor: pointer;">
                                                            Click here to select files
                                                        </label>
                                                        <img id="preview4" src="" alt="Preview Image" style="display: none; width: 10rem; height: 10rem;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button id="btn-add" type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
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

