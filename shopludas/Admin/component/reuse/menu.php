<?php
 $dashboard = 'active';
 
 
 if ($page == 'product-list' || $page == 'product-grid' || $page == 'product-type' || $page == 'checkout'
 || $page == 'product-detail' || $page =='shopping-cart')
{
    $product = 'active';
    $dashboard = '';
}
 
 if ($page == 'home')
 $dashboard = 'active';

 if($page == 'customers')
{
    $customers = 'active';
    $dashboard = '';
}
 if($page == 'buyer-wishlist' || $page == 'buyer-addresses' || $page == 'buyer-dashboard' || $page =='buyer-orders')
{
    $buyer = 'active';
    $dashboard = '';
}

if($page == 'order-detail' || $page == 'orders')
{
    $orders = 'active';
    $dashboard = '';
}
if($page == 'invoice-detail' || $page == 'invoices')
{
    $invoices = 'active';
    $dashboard = '';
}
if($page == 'chats')
{
    $chats = 'active';
    $dashboard = '';
}
if($page == 'email' || $page == 'email-detail')
{
    $email = 'active';
    $dashboard = '';
}

if($page == 'todo-list' || $page == 'todo-detail')
{
    $todo = 'active';
    $dashboard = '';
}
if($page == 'profile-connections' || $page == 'profile-posts')
{
    $profile = 'active';
    $dashboard = '';
}

if($page == 'login' || $page == 'register' || $page == 'reset-password' || $page == 'lock-screen' )
{
    $authen = 'active';
    $dashboard = '';
}

if($page == 'user-list' || $page == 'user-grid')
{
    $user = 'active';
    $dashboard = '';
}

?>
<div class="menu">
    <div class="menu-header">
        <a href=<?php echo'"'.$level.'index.php"'?>  class="menu-header-logo">
        <img src=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'logo-1.png"'?> alt="logo">
    </a>
        <a href=<?php echo'"'.$level.'index.php"'?>  class="btn btn-sm menu-close-btn">
        <i class="bi bi-x"></i>
    </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                    <img src="<?php echo $level.ASSETS_PATH.IMG_PATH.'user/'.$_SESSION['customer']['photo']?>" class="rounded-circle" alt="image">
                </div>
                <div>
                    <div class="fw-bold"><?php echo $_SESSION['customer']['fname'] ?></div>
                    <small class="text-muted"><?php echo $_SESSION['customer']['role']?></small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="<?php echo $level.PAGES_PATH.'profile-posts.php'?>" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-person dropdown-item-icon"></i> Profile
            </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
            </a>
                <a href="#" class="dropdown-item d-flex align-items-center" data-sidebar-target="#settings">
                <i class="bi bi-gear dropdown-item-icon"></i> Settings
            </a>
                <a href="<?php echo $level.'form/logout.php'?>" class="dropdown-item d-flex align-items-center text-danger" >
                <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
            </a>
            </div>
        </div>
        <ul>
            <li class="menu-divider">E-Commerce</li>
            <li>
                <a class="<?php echo $dashboard; ?>" href=<?php echo'"'.$level.'index.php"'?> >
                <span class="nav-link-icon">
                    <i class="bi bi-bar-chart"></i>
                </span>
                <span>Dashboard</span>
            </a>
            </li>
            <li>
                <a class="<?php echo $orders ?>" href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-receipt"></i>
                </span>
                <span>Orders</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'orders.php"'?>>List</a>
                    </li>
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'order-detail.php"'?>>Detail</a>
                    </li> -->
                </ul>
            </li>
            <li>
                <a href="#" class="<?php echo $product; ?>">
                <span class="nav-link-icon">
                    <i class="bi bi-truck"></i>
                </span>
                <span>Products</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'product-list.php"'?>>List
                        View</a>
                    </li>
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'product-grid.php"'?>>Grid
                        View</a>
                    </li> -->
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'product-type.php"'?>>List Type</a>
                    </li>
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>Product Detail</a>
                    </li> -->
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'shopping-cart.php"'?>>Shopping
                        Cart</a>
                    </li> -->
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'checkout.php"'?>>Checkout</a>
                    </li> -->
                </ul>
            </li>
            <!-- <li>
                <a href="#" class="<?php //echo $buyer; ?>">
                <span class="nav-link-icon">
                    <i class="bi bi-wallet2"></i>
                </span>
                <span>Buyer</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'buyer-dashboard.php"'?>>Dashboard</a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'buyer-orders.php"'?>>Orders</a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'buyer-addresses.php"'?>>Addresses</a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'buyer-wishlist.php"'?>>Wishlist</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a class="<?php echo $customers ?>" href=<?php echo'"'.$level.PAGES_PATH.'customers.php"'?>>
                    <span class="nav-link-icon">
                        <i class="bi bi-person-badge"></i>
                    </span>
                    <span>Customers</span>
                </a>
            </li>
            <!-- <li>
                <a class="<?php //echo $invoices ?>" href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-receipt"></i>
                </span>
                <span>Invoices</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'invoices.php"'?>>List</a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'invoice-detail.php"'?>>Detail</a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="menu-divider">Apps</li>
            <li>
                <a class="<?php //echo $chats?>" href=<?php// echo'"'.$level.PAGES_PATH.'chats.php"'?>>
                    <span class="nav-link-icon">
                        <i class="bi bi-chat-square"></i>
                    </span>
                    <span>Chats</span>
                    <span class="badge bg-success rounded-circle ms-auto">2</span>
                </a>
            </li>
            <li>
                <a class="<?php //echo $email ?>" href=<?php //echo'"'.$level.PAGES_PATH.'email.php"'?>>
                    <span class="nav-link-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span>Email</span>
                </a>
                <ul>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'email.php"'?>>
                        <span>Inbox</span>
                    </a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'email-detail.php"'?>>
                        <span>Detail</span>
                    </a>
                    </li>
                    <li>
                        <a  href="#">
                        <span>Email Template</span>
                    </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li>
                <a class="<?php //echo $todo ?>" href=<?php //echo'"'.$level.PAGES_PATH.'todo-list.php"'?>>
                    <span class="nav-link-icon">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <span>Todo App</span>
                </a>
                <ul>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'todo-list.php"'?>>
                        <span>List</span>
                    </a>
                    </li>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'todo-detail.php"'?>>
                        <span>Details</span>
                    </a>
                    </li>
                </ul>
            </li> -->
            <li class="menu-divider">Pages</li>
            <!-- <li>
                <a class="<?php //echo $profile ?>" href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-person"></i>
                </span>
                <span>Profile</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'profile-posts.php"'?>>Post</a>
                    </li>
                    <li>
                        <a href=<?php // echo'"'.$level.PAGES_PATH.'profile-connections.php"'?>>Connections</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a class="<?php echo $user ?>" href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-person-circle"></i>
                </span>
                <span>Users</span>
            </a>
                <ul>
                    <li><a href=<?php echo'"'.$level.PAGES_PATH.'user-list.php"'?>>List View</a></li>
                    <!-- <li><a href=<?php //echo'"'.$level.PAGES_PATH.'user-grid.php"'?>>Grid View</a></li> -->
                </ul>
            </li>
            <li>
                <a class="<?php echo $authen ?>" href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-lock"></i>
                </span>
                <span>Authentication</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'login.php"'?> target="_blank" >Login</a>
                    </li>
                    <!-- <li>
                        <a href=<?php //echo'"'.$level.PAGES_PATH.'register.php"'?> target="_blank">Register</a>
                    </li> -->
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'reset-password.php"'?> target="_blank">Reset Password</a>
                    </li>
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'lock-screen.php"'?> target="_blank">Lock Screen</a>
                    </li>
                    <li>
                        <a href="#" >Account Verified</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-exclamation-octagon"></i>
                </span>
                <span>Error Pages</span>
            </a>
                <ul>
                    <li>
                        <a href=<?php echo'"'.$level.PAGES_PATH.'404.php"'?> >404</a>
                    </li>
                    <li>
                        <a href="#">Access Denied</a>
                    </li>
                    <li>
                        <a href="#" >Under Construction</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"<?php //echo'"'.$level.PAGES_PATH.'settings.php"'?>>
                <span class="nav-link-icon">
                    <i class="bi bi-gear"></i>
                </span>
                <span>Settings</span>
            </a>
            </li>
            <!-- <li>
                <a href=<?php //echo'"'.$level.PAGES_PATH.'pricing-table.php"'?>>
                    <span class="nav-link-icon">
                        <i class="bi bi-wallet2"></i>
                    </span>
                    <span>Pricing Table</span>
                    <span class="badge bg-success ms-auto">New</span>
                </a>    
            </li> -->
            <!-- <li>
                <a href=<?php //echo'"'.$level.PAGES_PATH.'search-page.php"'?>>
                <span class="nav-link-icon">
                    <i class="bi bi-search"></i>
                </span>
                <span>Search Page</span>
            </a>
            </li> -->
            <li>
                <a href=<?php echo'"'.$level.PAGES_PATH.'faq.php"'?>>
                <span class="nav-link-icon">
                    <i class="bi bi-question-circle"></i>
                </span>
                <span>FAQ</span>
            </a>
            </li>
            <li class="menu-divider">User Interface</li>
            <li>
                <a href="#" >
                <span class="nav-link-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </span>
                <span>Components</span>
            </a>
                <ul>
                    <li>
                        <a href="#">Accordion</a>
                    </li>
                    <li>
                        <a href="#">Alerts</a>
                    </li>
                    <li>
                        <a href="#">Badge</a>
                    </li>
                    <li>
                        <a href="#">Breadcrumb</a>
                    </li>
                    <li>
                        <a href="#">Buttons</a>
                    </li>
                    <li>
                        <a href="#">Button Group</a>
                    </li>
                    <li>
                        <a href="#">Card</a>
                    </li>
                    <li>
                        <a href="#">Card Masonry</a>
                    </li>
                    <li>
                        <a href="#">Carousel</a>
                    </li>
                    <li>
                        <a href="#">Collapse</a>
                    </li>
                    <li>
                        <a href="#">Dropdowns</a>
                    </li>
                    <li>
                        <a href="#">List Group</a>
                    </li>
                    <li>
                        <a href="#">Modal</a>
                    </li>
                    <li>
                        <a href="#">Navs and Tabs</a>
                    </li>
                    <li>
                        <a href="#">Pagination</a>
                    </li>
                    <li>
                        <a href="#">Popovers</a>
                    </li>
                    <li>
                        <a href="#">Progress</a>
                    </li>
                    <li>
                        <a href="#">Spinners</a>
                    </li>
                    <li>
                        <a href="#">Toasts</a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Tables</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">Tooltip</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" >
                <span class="nav-link-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </span>
                <span>Forms</span>
            </a>
                <ul>
                    <li>
                        <a href="#">
                        <span>Form Elements</span>
                    </a>
                        <ul>
                            <li>
                                <a href="#">Overview</a>
                            </li>
                            <li>
                                <a href="#">Form Controls</a>
                            </li>
                            <li>
                                <a href="#">Select</a>
                            </li>
                            <li>
                                <a href="#">Checks and Radios</a>
                            </li>
                            <li>
                                <a href="#">Range</a>
                            </li>
                            <li>
                                <a href="#">Input Group</a>
                            </li>
                            <li>
                                <a href="#">Floating Label</a>
                            </li>
                            <li>
                                <a href="#">Form Layout</a>
                            </li>
                            <li>
                                <a href="#">Validation</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        <span>Wizard</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Repeater</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>File Upload</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>CKEditor</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Range Slider</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Select2</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Tags Input</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Input Mask</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Datepicker</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Clock Picker</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-heart"></i>
                </span>
                <span>Content</span>
            </a>
                <ul>
                    <li>
                        <a href="#">
                        <span>Typography</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Images</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Figures</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Avatar</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Icons</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Colors</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-bar-chart"></i>
                </span>
                <span>Charts</span>
            </a>
                <ul>
                    <li>
                        <a href="#">Apex Chart</a>
                    </li>
                    <li>
                        <a href="#">Chartjs</a>
                    </li>
                    <li>
                        <a href="#">Justgage</a>
                    </li>
                    <li>
                        <a href="#">Morsis</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-paperclip"></i>
                </span>
                <span>Extensions</span>
            </a>
                <ul>
                    <li>
                        <a href="#">
                        <span>Vector Map</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span>Datatable</span>
                    </a>
                    </li>
                    <li>
                        <a href="#">Sweet Alert</a>
                    </li>
                    <li>
                        <a href="#">Lightbox</a>
                    </li>
                    <li>
                        <a href="#">Introjs</a>
                    </li>
                    <li>
                        <a href="#">Nestable</a>
                    </li>
                    <li>
                        <a href="#">Rating</a>
                    </li>
                    <li>
                        <a href="#">Code Highlighter</a>
                    </li>
                </ul>
            </li>
            <li class="menu-divider">Other</li>
            <li>
                <a href="#">
                <span class="nav-link-icon">
                    <i class="bi bi-list"></i>
                </span>
                <span>Menu Item</span>
            </a>
                <ul>
                    <li><a href="#">Menu Item 1</a></li>
                    <li>
                        <a href="#">Menu Item 2</a>
                        <ul>
                            <li>
                                <a href="#">Menu Item 2.1</a>
                            </li>
                            <li>
                                <a href="#">Menu Item 2.2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="disabled">
                <span class="nav-link-icon">
                    <i class="bi bi-hand-index-thumb"></i>
                </span>
                <span>Disabled</span>
            </a>
            </li>
        </ul>
    </div>
</div>