<div class="content ">

  <div class="row my-5">
      <div class="col-lg-6 m-auto">
          <form method="post">
              <div class="input-group input-group-lg">
                  <input type="text" name="noidung" class="form-control" placeholder="What do you want to find?" autofocus>
                  <button class="btn btn-outline-light" name="btn" type="submit">
                      <i class="bi bi-search"></i>
                  </button>
              </div>
          </form>
      </div>
  </div>
  <?php
      include $level.DATABASE_PATH.'db.php';
      if(isset($_POST['btn']))
      {?>
          <?php
            $input = $_POST['noidung'];
            //$sql = "select * from sanpham inner join loaisp on LOAISP = MALOAI where TENSP like '%$input%' or MASP like '%$input%'";
            $result = $db -> query("select * from sanpham inner join loaisp on LOAISP = loaisp.ID 
            inner join trangthai on sanpham.TRANGTHAI = trangthai.ID
            inner join danhsachanh on sanpham.ID = danhsachanh.ID_SANPHAM
            where TENSP like '%$input%' or sanpham.ID like '%$input%'
            group by sanpham.ID");
            //$result -> execute();
            $rowsdata = $result->fetchAll(PDO::FETCH_ASSOC);

            $result = $db -> query("select * from nguoidung
            inner join trangthai on TRTHAI = trangthai.ID
            where HOTEN like '%$input%' or nguoidung.ID like '%$input%' and nguoidung.chucvu = 2");
            $rowsdata1 = $result->fetchAll(PDO::FETCH_ASSOC);

            //print_r($rowsdata);
            $i = count($rowsdata);
            $j = count($rowsdata1)
          ?>
          
          <?php
              if($input == '')
              {?>
                  <div class="text-center lead mb-5">
                      No results found for: &nbsp; <span class="fw-bold"><?php echo $input ?></span>
                  </div>
                  <h1 class="text-center" style="color: red; text-transform: uppercase;">Sorry</h1>
                  <p class="text-center">
                      There are no results for your search
                  </p>
              <?php
              }
          ?>

          <?php
              if($input != '')
              {?>
                  <?php
                      if($i > 0)
                      {?>
                          <div class="text-center lead mb-5">
                              <?php echo $i?> results found for: &nbsp; "<span class="fw-bold"><?php echo $input ?></span>"
                          </div>

                          <table class="table table-custom table-lg mb-0" id="products">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th style="text-align: start;">Product Type</th>
                                      <th>Stock</th>
                                      <th style="text-align: center;">Price</th>
                                      <th style="text-align: center;">Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $i= 1;
                                  foreach($rowsdata as $value)
                                  {?>
                                      <tr>
                                              <td>
                                                  <a href="#"><?php echo '#'.$i ?></a>
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
                                              <td class="text-center"><?php echo $value['GIA']?></td>
                                              <td class="text-center">
                                                  <?php 
                                                      if($value['TENTT']=='Deactive')
                                                      {?>
                                                          <span class="badge bg-danger">
                                                              <?php echo $value['TENTT'] ?>
                                                          </span>
                                                      <?php
                                                      }
                                                  ?>
                                                  <?php 
                                                      if($value['TENTT']=='Active')
                                                      {?>
                                                          <span class="badge bg-success">
                                                              <?php echo $value['TENTT'] ?>
                                                          </span>
                                                      <?php
                                                      }
                                                  ?>    
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
                                                              <a href=<?php echo"'".$level.PAGES_PATH."edit-product.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                              <a href=<?php echo"'".$level."form/xuly_removesp/remove.php?id=".$value[0]."'"?> class="dropdown-item">Delete</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </td>
                                          </tr>
                                  <?php
                                  $i++;
                                  }
                                  ?>
                              </tbody>
                          </table>
                      <?php
                      }
                  ?>

                  <?php
                      $i= 1;
                      if($j > 0)
                      { ?>
                          <table class="table table-custom table-lg mb-0" id="customers">
                              <thead>
                                  <tr>
                                      <th>
                                          <input class="form-check-input select-all" type="checkbox"
                                              data-select-all-target="#customers" id="defaultCheck1">
                                      </th>
                                      <th>ID</th>
                                      <!-- <th>Photo</th> -->
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
                                      foreach($rowsdata1 as $value)
                                      {?>
                                          <tr>
                                              <td>
                                                  <input class="form-check-input" type="checkbox">
                                              </td>
                                              <td>
                                                  <a href="#"><?php echo '#'.$i ?></a>
                                              </td>
                                              <!-- <td>
                                                  <figure class="avatar me-3">
                                                      <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.'user/'.$value['ANH']?>" class="rounded-circle"
                                                          alt="avatar">
                                                  </figure>
                                              </td> -->
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
                                                              <a href="#" class="dropdown-item">View profile</a>
                                                              <a href=<?php echo"'".$level.PAGES_PATH."edit-customer.php?id=".$value[0]."'"?> class="dropdown-item">Edit</a>
                                                              <a href=<?php echo"'".$level."form/xuly_removecustomer/remove.php?id=".$value[0]."'"?> class="dropdown-item">Delete</a>
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
                      <?php
                      }
                  ?>
              <?php
              }
          ?>
      <?php
      }
  ?>

  <ul class="nav nav-pills my-5 justify-content-center" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#classic" role="tab" aria-controls="classic"
              aria-selected="true">Classic</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#articles" role="tab" aria-controls="articles"
              aria-selected="false">Articles</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#photos" role="tab" aria-controls="photos"
              aria-selected="false">Photos</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users"
              aria-selected="false">Users</a>
      </li>
  </ul>

  <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="classic" role="tabpanel">
          <div class="card">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item p-4">
                      <h5>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                      </h5>
                      <p class="text-muted">Velit laborum sint labore consectetur dolor minim deserunt sit
                          proident dolor id ea voluptate aliquip duis fugiat anim nisi sint nulla irure sunt
                          pariatur fugiat et mollit </p>
                      <div class="text-muted d-flex align-items-center">
                          <span class="badge bg-secondary">Trends</span>
                          <div class="ms-3">Jan 5 2021</div>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <h5>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at,
                              numquam.</a>
                      </h5>
                      <p class="text-muted">Deserunt sint sit dolor proident qui ipsum enim in veniam in sed
                          ut in voluptate </p>
                      <div class="text-muted d-flex align-items-center">
                          <span class="badge bg-success">Lifestyle</span>
                          <div class="ms-3">Jan 15 2021</div>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <h5>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
                      </h5>
                      <p class="text-muted">Commodo excepteur non ut exercitation qui sit proident aliqua ex
                          qui velit sed esse consequat in eiusmod nulla laboris tempor ad esse elit ut enim ea
                          veniam </p>
                      <div class="text-muted d-flex align-items-center">
                          <span class="badge bg-danger">Trends</span>
                          <div class="ms-3">Feb 25 2021</div>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <h5>
                          <a href="#">Lorem ipsum dolar set amet</a>
                      </h5>
                      <p class="text-muted">Ad ut exercitation ut esse aute ut aliqua dolore qui nulla ea ut
                          sed lorem tempor amet nostrud eu eiusmod ex consectetur in velit officia incididunt
                          ut </p>
                      <div class="text-muted d-flex align-items-center">
                          <span class="badge bg-warning">Trends</span>
                          <div class="ms-3">Mar 10 2021</div>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <h5>
                          <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora.</a>
                      </h5>
                      <p class="text-muted">Esse ipsum ex ut consectetur enim exercitation non irure lorem
                          dolore in non commodo ut officia officia est pariatur fugiat deserunt veniam in
                          aliqua velit veniam dolor </p>
                      <div class="text-muted d-flex align-items-center">
                          <span class="badge bg-info">Travel</span>
                          <div class="ms-3">Mar 12 2021</div>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
      <div class="tab-pane fade" id="articles" role="tabpanel">
          <div class="row g-4">
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo1.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo2.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo3.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo4.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo5.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card border">
                      <img class="card-img-top" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'photo6.jpg"'?> alt="image">
                      <div class="card-body">
                          <h6 class="card-title">Lorem ipsum dolar set amet</h6>
                          <p class="card-text">Some quick example text to build on the card title and make
                              up...</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="tab-pane fade" id="photos" role="tabpanel">
          <div class="row g-4">
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-one.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-one.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-two.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-two.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-three.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-two.jpg"'?>
                          alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-four.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-four.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-five.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-five.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-six.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-six.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-one.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-one.jpg"'?> alt="image">
                  </a>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                  <a href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-two.jpg"'?> class="image-popup-gallery-item">
                      <img class="img-fluid rounded" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'portfolio-two.jpg"'?> alt="image">
                  </a>
              </div>
          </div>
      </div>
      <div class="tab-pane fade" id="users" role="tabpanel">
          <div class="card">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar avatar-primary me-3">
                                      <span class="avatar-text rounded-circle">FS</span>
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Ferrel Skipsea</h6>
                                  </a>
                                  <p class="mb-0">Tax Accountant</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar me-3">
                                      <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'user/man_avatar1.jpg"'?>
                                          class="rounded-circle" alt="image">
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Lorry Lewsey</h6>
                                  </a>
                                  <p class="mb-0">Marketing Assistant</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar avatar-success me-3">
                                      <span class="avatar-text rounded-circle">W</span>
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Winny Lippiatt</h6>
                                  </a>
                                  <p class="mb-0">Cost Accountant</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar avatar-danger me-3">
                                      <span class="avatar-text rounded-circle">SW</span>
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Salim Walklate</h6>
                                  </a>
                                  <p class="mb-0">Chemical Engineer</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar avatar-warning me-3">
                                      <span class="avatar-text rounded-circle">S</span>
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Sena Erangey</h6>
                                  </a>
                                  <p class="mb-0">Financial Advisor</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
                  <li class="list-group-item p-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex">
                              <a href="#">
                                  <figure class="avatar avatar-info me-3">
                                      <span class="avatar-text rounded-circle">D</span>
                                  </figure>
                              </a>
                              <div>
                                  <a href="#">
                                      <h6>Decca Thorrington</h6>
                                  </a>
                                  <p class="mb-0">Systems Administrator</p>
                              </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">View</a>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>

  <?php include $level.COMPONENT_PATH.REUSE_PATH.'pagination.php'?>

</div>