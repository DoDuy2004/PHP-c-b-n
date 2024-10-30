<?php 
    if($page == 'home' )
    { ?>
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href=<?php echo'"'.$level.'icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css"'?> type="text/css">
        <!-- Bootstrap Docs -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'bootstrap-docs.css"'?> type="text/css">
     
        <!-- Slick -->
        <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'slick/slick.css"'?> type="text/css">
     
        <!-- Main style file -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'app.min.css"'?> type="text/css">
    <?php
    }
?>

<?php 
    if($page == '404')
    {?>
        <!-- Favicon -->
        <link rel="shortcut icon" href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'favicon.png"'?> />

        <!-- Main style file -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'app.min.css"'?> type="text/css">
    <?php
    }
?>

<?php 
    if($page == 'buyer-addresses' || $page == 'buyer-dashboard' || $page == 'buyer-orders'
      || $page == 'buyer-wishlist' || $page == 'chats' || $page == 'checkout' || $page == 'customers'
      || $page == 'email-detail' || $page == 'email' || $page == 'faq' || $page == 'invoice-detail'
      || $page == 'invoices' || $page == 'order-detail' || $page == 'orders' || $page == 'pricing-table'
      || $page == 'product-detail' || $page == 'product-grid' || $page == 'product-list'
      || $page == 'profile-connections' || $page == 'profile-posts' || $page == 'search-page'
      || $page == 'settings' || $page == 'shopping-cart' ||  $page == 'todo-detail' || $page == 'todo-list'
      || $page == 'user-grid' || $page == 'user-list' || $page == 'product-type' || $page == 'add-product-type'
      || $page == 'add-user'|| $page =='edit-type' || $page == 'add-customer' || $page == 'edit-user'
      || $page == 'edit-customer')
    {?>
        <!-- Favicon -->
        <link rel="shortcut icon" href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'favicon.png"'?> />

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Bootstrap icons -->
        <link rel="stylesheet" href=<?php echo'"'.$level.'icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css"'?> type="text/css">
        <!-- Bootstrap Docs -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'bootstrap-docs.css"'?> type="text/css">

        <?php 
            if($page == 'checkout')
            { ?>
                <!-- Form wizard -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'form-wizard/jquery.steps.css"'?> type="text/css">
            <?php
            }
        ?>  

        <?php 
            if($page == 'todo-detail' || $page == 'todo-list')
            { ?>
                <!-- quill -->
                 <link href=<?php echo'"'.$level.LIBS_PATH.'quill/quill.snow.css"'?> rel="stylesheet" type="text/css">

                <!-- Clockpicker -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'clockpicker/bootstrap-clockpicker.min.css"'?> type="text/css">

                <!-- Datepicker -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'datepicker/daterangepicker.css"'?> type="text/css">

                <!-- Select2 -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'select2/css/select2.min.css"'?> type="text/css">
            <?php
            }
        ?> 

        <?php 
            if($page == 'search-page')
            { ?>
                <!-- Lightbox -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'lightbox/magnific-popup.css"'?> type="text/css">
            <?php
            }
        ?>  

        <?php 
            if($page == 'email-detail' || $page == 'email')
            { ?>
                <!-- Quill editor -->
                <link href=<?php echo'"'.$level.LIBS_PATH.'quill/quill.snow.css"'?> rel="stylesheet" type="text/css">

                <!-- Tagsinput -->
                <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'tagsinput/bootstrap-tagsinput.css"'?> type="text/css">
            <?php
            }
        ?> 

        <?php if($page == 'product-detail')
        {?>
            <!-- Slick -->
            <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'slick/slick.css"'?>>
            <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'slick/slick-theme.css"'?> type="text/css">

            <!-- Rating -->
            <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'rating/rating.min.css"'?> type="text/css">
        <?php
        }
        ?>

        <?php if($page == 'product-grid' || $page == 'product-list' )
        {?>
            <!-- Range slider -->
            <link rel="stylesheet" href=<?php echo'"'.$level.LIBS_PATH.'range-slider/css/ion.rangeSlider.min.css"'?> type="text/css">
        <?php
        }
        ?>

        <!-- Main style file -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'app.min.css"'?> type="text/css">
    <?php
    }
?>

<?php 
    if($page == 'lock-screen' || $page == 'login' || $page == 'register' || $page == 'reset-password' || $page == 'home')
    {?>
        <!-- Favicon -->
        <link rel="shortcut icon" href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'favicon.png"'?>>

        <!-- Themify icons -->
        <link rel="stylesheet" href=<?php echo'"'.$level.'icons/themify-icons/themify-icons.css"'?> type="text/css">

        <!-- Main style file -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'app.min.css"'?> type="text/css">
    <?php
    }
?>

<?php 
    if($page == 'add-product' || $page == 'edit-product' || $page == 'add-product-type'
    || $page == 'add-user' || $page =='edit-type' || $page == 'add-customer' || $page == 'edit-user'
    || $page == 'edit-customer')
    {?>
        <!-- Favicon -->
        <link rel="shortcut icon" href=<?php echo'"'.$level.ASSETS_PATH.IMG_PATH.'favicon.png"'?> />

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Bootstrap icons -->
        <link rel="stylesheet" href=<?php echo'"'.$level.'icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css"'?> type="text/css">
        <!-- Bootstrap Docs -->
        <link rel="stylesheet" href=<?php echo'"'.$level.CSS_PATH.'bootstrap-docs.css"'?> type="text/css">
        <!-- select2 css -->
        <link href=<?php echo'"'.$level.LIBS_PATH.'add_product/select2/css/select2.min.css"'?> rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href=<?php echo'"'.$level.LIBS_PATH.'add_product/dropzone/min/dropzone.min.css"'?> rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href=<?php echo'"'.$level.CSS_PATH.'bootstrap.min.css"'?> id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=<?php echo'"'.$level.CSS_PATH.'icons.min.css"'?> rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=<?php echo'"'.$level.CSS_PATH.'app.min.css"'?> id="app-style" rel="stylesheet" type="text/css" />
    <?php
    }
?>
