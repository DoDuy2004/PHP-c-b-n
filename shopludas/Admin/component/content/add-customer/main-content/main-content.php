<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Basic Information</h4>
                            <p class="card-title-desc">Fill all information below</p>

                            <form method="post" action=<?php echo'"'.$level.'form/customers/add.php"'?>>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="fullname">Full Name</label>
                                            <input id="fullname" name="fullname" type="text" class="form-control"
                                                placeholder="Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Email</label>
                                            <input id="email" name="email" type="text" class="form-control"
                                                placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" name="phone" type="text"
                                            placeholder="Phone number">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="pass">Password</label>
                                            <input id="pass" name="pass" type="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cfpass">Confirm Password</label>
                                            <input id="cfpass" name="cfpass" type="password" class="form-control"
                                                placeholder="Confirm">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Country</label>   
                                            <input type="text" name="country" class="form-control"
                                            placeholder="Country">
                                        </div>
                                        <div class="mb-3">
                                            <label class="control-label">Birth Day</label>   
                                            <input type="date" name="birthday" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                                    <a href="../pages/customers.php"><button type="button"
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