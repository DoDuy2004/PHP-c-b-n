<?php 
    $lst_products = array(
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        ),
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        ),
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        ),
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        ),
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        ),
        array(
            'photo'=>'products/1.jpg',
            'name'=>'Headphone 15 promax',
            'stock'=>'In Stock',
            'price'=>'$800',
            'sale price'=>'$499,90',
            'quantity'=>'25'
        )
    );
?>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
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
        <div class="row g-4">
            <?php
                foreach($lst_products as $value)
                { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card card-hover">
                            <a href="#">
                                <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.$value['photo']?>" class="card-img-top"
                                alt="...">
                            </a>
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title mb-3"><?php echo $value['name']?></h5>
                                </a>
                                <div class="d-flex gap-3 mb-3 align-items-center">
                                    <del class="text-muted"><?php echo $value['price']?></del>
                                    <h4 class="mb-0"><?php echo $value['sale price']?></h4>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-muted"></i>
                                    <span>(<?php echo $value['quantity']?>)</span>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                    <a href="#" class="btn ms-auto">
                                        <i class="bi bi-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
        <nav class="mt-5" aria-label="Page navigation example">
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
    <div class="col-md-4">
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
                        <input type="text" class="form-control" placeholder="Phone, Headphone, Shoe ...">
                        <button class="btn btn-outline-light" type="button">
                            <i class="bi bi-search"></i>
                        </button>
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
                <div class="collapse show mt-4" id="categoriesCollapseExample">
                    <div class="d-flex flex-column gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryCheck1">
                            <label class="form-check-label" for="categoryCheck1">
                                All
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryCheck2">
                            <label class="form-check-label" for="categoryCheck2">
                                Accessories
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryCheck3">
                            <label class="form-check-label" for="categoryCheck3">
                                Phone
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryCheck4">
                            <label class="form-check-label" for="categoryCheck4">
                                Headphone
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoryCheck5">
                            <label class="form-check-label" for="categoryCheck5">
                                Camera
                            </label>
                        </div>
                    </div>
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
                    <input id="price-filter" />
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
    </div>
</div>