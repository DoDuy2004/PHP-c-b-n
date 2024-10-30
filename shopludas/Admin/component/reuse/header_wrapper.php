<div class="header">
    <div class="menu-toggle-btn">
        <!-- Menu close button for mobile devices -->
        <a href="#">
            <i class="bi bi-list"></i>
        </a>
    </div>
    <!-- Logo -->
    <a href=<?php echo'"'.$level.'index.php"'?> class="logo">
        <img width="100" src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo.svg"'?> alt="logo">
    </a>
    <!-- ./ Logo -->
    <div class="page-title">
        <?php echo $title_header ?>
    </div>
    <form class="search-form" method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>>
        <div class="input-group">
            <button class="btn btn-outline-light" name="btn" type="submit" id="button-addon1">
                <i class="bi bi-search"></i>
            </button>
            <input type="text" class="form-control" name="noidung" placeholder="Search..." aria-label="Example text with button addon"
                aria-describedby="button-addon1">
            <a href="#" class="btn btn-outline-light close-header-search-bar">
                <i class="bi bi-x"></i>
            </a>
        </div>
    </form>
    <div class="header-bar ms-auto">
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
                <a href="#" class="nav-link nav-link-notify" data-count="2" data-sidebar-target="#notifications">
                    <i class="bi bi-bell icon-lg"></i>
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link nav-link-notify" data-count="3" data-bs-toggle="dropdown">
                    <i class="bi bi-cart2 icon-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <h6 class="m-0 px-4 py-3 border-bottom">Shopping Cart</h6>
                    <div class="dropdown-menu-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center">
                                <a href="#" class="text-danger me-3" title="Remove">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="#" class="me-3 flex-shrink-0 ">
                                    <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/3.jpg"'?> class="rounded" width="60" alt="...">
                                </a>
                                <div>
                                    <h6>Digital clock</h6>
                                    <div>1 x $1.190,90</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center">
                                <a href="#" class="text-danger me-3" title="Remove">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="#" class="me-3 flex-shrink-0 ">
                                    <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/4.jpg"'?> class="rounded" width="60" alt="...">
                                </a>
                                <div>
                                    <h6>Toy Car</h6>
                                    <div>1 x $139.58</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center">
                                <a href="#" class="text-danger me-3" title="Remove">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="#" class="me-3 flex-shrink-0 ">
                                    <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/5.jpg"'?> class="rounded" width="60" alt="...">
                                </a>
                                <div>
                                    <h6>Sunglasses</h6>
                                    <div>2 x $50,90</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center">
                                <a href="#" class="text-danger me-3" title="Remove">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="#" class="me-3 flex-shrink-0 ">
                                    <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'products/6.jpg"'?> class="rounded" width="60" alt="...">
                                </a>
                                <div>
                                    <h6>Cake</h6>
                                    <div>1 x $10,50</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="m-0 px-4 py-3 border-top small">Sub Total : <strong
                            class="text-primary">$1.442,78</strong></h6>
                </div>
            </li> -->
            <li class="nav-item ms-3">
                <?php if($page == 'customers')
                {?>
                    <a href=<?php echo'"'.$level.PAGES_PATH.'add-customer.php"'?>>
                        <button class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Add Customer</button>
                    </a>
                <?php
                }
                ?>
                <?php if($page == 'chats')
                {?>
                    <button class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> New Chat
                    </button>
                <?php
                }
                ?>
                <?php if($page == 'email' || $page == 'email-detail')
                {?>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#compose" title="Compose Email" class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> Compose Mail
                    </a>
                <?php
                }
                ?>
                <?php if($page == 'invoices' || $page == 'invoice-detail')
                {?>
                    <button class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> Create Invoice
                    </button>
                <?php
                }
                ?>
                <?php if($page == 'product-list' || $page == 'product-grid' || $page == 'home')
                {?>
                    <a href=<?php echo'"'.$level.PAGES_PATH.'add-product.php"'?>>
                        <button class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Add Product</button>
                    </a>
                <?php
                }
                ?>
                <?php if($page == 'todo-detail' || $page == 'todo-list')
                {?>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#newTaskModal" title="Add New Task" class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> Add Task
                    </a>
                <?php
                }
                ?>

                <?php if($page == 'user-grid' || $page == 'user-list')
                {?>
                    <a href=<?php echo'"'.$level.PAGES_PATH.'add-user.php"'?>>
                        <button class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Add User</button>
                    </a>
                <?php
                }
                ?>
                <?php if($page == 'product-type')
                {?>
                    <a href=<?php echo'"'.$level.PAGES_PATH.'add-product-type.php"'?>>
                        <button class="btn btn-primary btn-icon"><i class="bi bi-plus-circle"></i> Add Product Type</button>
                    </a>
                <?php
                }
                ?>
            </li>
        </ul>
    </div>
    <!-- Header mobile buttons -->
    <div class="header-mobile-buttons">
        <a href="#" class="search-bar-btn">
            <i class="bi bi-search"></i>
        </a>
        <a href="#" class="actions-btn">
            <i class="bi bi-three-dots"></i>
        </a>
    </div>
    <!-- ./ Header mobile buttons -->
</div>