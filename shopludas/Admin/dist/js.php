<?php 
    if($page == 'home')
    { ?>
        <!-- Bundle scripts -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'bundle.js"'?>></script>

        <!-- Apex chart -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'charts/apex/apexcharts.min.js"'?>></script>

        <!-- Slick -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'slick/slick.min.js"'?>></script>

        <!-- Examples -->
        <script src=<?php echo'"'.$level.JS_PATH.'examples/dashboard.js"'?>></script>

        <!-- Main Javascript file -->
        <script src=<?php echo'"'.$level.JS_PATH.'app.min.js"'?>></script>
    <?php
    }
?>

<?php 
    if($page == '404' || $page == 'chats' || $page == 'faq' || $page == 'invoice-detail' || $page == 'invoices'
    || $page == 'lock-screen' || $page == 'register' || $page == 'reset-password' || $page == 'orders'
    || $page == 'order-detail' || $page == 'pricing-table' || $page == 'product-detail' || $page == 'product-grid'
    || $page == 'product-list' || $page == 'profile-connections' || $page == 'profile-posts' || $page == 'search-page'
    || $page == 'settings' || $page == 'shopping-cart' || $page == 'checkout' || $page == 'todo-detail'
    || $page == 'todo-list' || $page == 'user-list' || $page == 'user-grid' || $page == 'add-product' || $page == 'edit-product'
    || $page == 'product-type' || $page == 'add-product-type' || $page == 'add-user' || $page =='edit-type'
    || $page == 'add-customer' || $page == 'edit-user' || $page == 'edit-customer')
    { ?>
        <!-- Bundle scripts -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'bundle.js"'?>></script>

        <!-- Main Javascript file -->
        <script src=<?php echo'"'.$level.JS_PATH.'app.min.js"'?>></script>

        <?php if($page == 'product-grid' || $page == 'product-list')
        {?>
           <!-- Range slider -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'range-slider/js/ion.rangeSlider.min.js"'?>></script>

            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/products.js"'?>></script>
        <?php
        }
        ?>

        <?php if($page == 'user-list')
        {?>
            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/users.js"'?>></script>
        <?php
        }
        ?>

        <?php if($page == 'todo-detail' || $page == 'todo-list')
        {?>
            <!-- Quill -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'quill/quill.js"'?>></script>

            <!-- Clockpicker -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'clockpicker/bootstrap-clockpicker.min.js"'?>></script>

            <!-- Select2 -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'select2/js/select2.min.js"'?>></script>

            <!-- Datepicker -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'datepicker/daterangepicker.js"'?>></script>

            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/todo-list.js"'?>></script>
        <?php
        }
        ?>


        <?php 
            if($page == 'search-page')
            { ?>
               <!-- lightbox -->
                <script src=<?php echo'"'.$level.LIBS_PATH.'lightbox/jquery.magnific-popup.min.js"'?>></script>
                <script src=<?php echo'"'.$level.JS_PATH.'examples/lightbox.js"'?>></script>
            <?php
            }
        ?>  

        <?php if($page == 'product-detail')
        {?>
            <!-- Slick -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'slick/slick.min.js"'?>></script>

            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/product-detail.js"'?>></script>

            <!-- Rating -->
            <script src=<?php echo'"'.$level.LIBS_PATH.'rating/jquery.rating.min.js"'?>></script>
        <?php
        }
        ?>

        <?php if($page == 'order-detail' || $page == 'orders')
        {?>
            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/orders.js"'?>></script>
        <?php
        }
        ?>

        <?php if($page == 'pricing-table')
        {?>
            <!-- Examples -->
            <script src=<?php echo'"'.$level.JS_PATH.'examples/pricing-table.js"'?>></script>
        <?php
        }
        ?>

        <?php 
            if($page == 'chats')
            {?>
                <script src=<?php echo'"'.$level.JS_PATH.'examples/chat.js"'?>></script>
            <?php
            }
        ?>

        <?php 
            if($page == 'invoices')
            {?>
                <!-- Examples -->
                <script src=<?php echo'"'.$level.DIST_PATH.JS_PATH.'examples/invoices.js"'?>></script>
            <?php
            }
        ?>

        <?php 
            if($page == 'chekout')
            {?>
                <!-- Form wizard -->
                <script src=<?php echo'"'.$level.JS_PATH.'form-wizard/jquery.steps.min.js"'?>></script>

                <!-- Examples -->
                <script src=<?php echo'"'.$level.JS_PATH.'examples/checkout.js"'?>></script>
            <?php
            }
        ?>
    <?php
    }
?>

<?php 
    if($page == 'buyer-addresses' || $page == 'buyer-dashboard' || $page == 'buyer-orders'
       || $page == 'buyer-wishlist' || $page == 'customers')
    { ?>
        <script src=<?php echo'"'.$level.LIBS_PATH.'bundle.js"'?>></script>

        <!-- Apex chart -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'charts/apex/apexcharts.min.js"'?>></script>

        <?php 
            if($page != 'customers')
            {?>
                <!-- Examples -->
                <script src=<?php echo'"'.$level.JS_PATH.'examples/buyer-dashboard.js"'?>></script>
            <?php
            }
        ?>  

        <?php 
            if($page == 'customers')
            {?>
                <!-- Examples -->
                <script src=<?php echo'"'.$level.JS_PATH.'examples/customers.js"'?>></script>
            <?php
            }
        ?>  

        <!-- Main Javascript file -->
        <script src=<?php echo'"'.$level.JS_PATH.'app.min.js"'?>></script>
    <?php
    }
?>

<?php 
    if($page == 'email-detail' || $page == 'email')
    { ?>
        <!-- Bundle scripts -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'bundle.js"'?>></script>


        <!-- Tagsinput -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'tagsinput/bootstrap-tagsinput.js"'?>></script>
        <script src=<?php echo'"'.$level.JS_PATH.'examples/tagsinput.js"'?>></script>

        <!-- quill -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'quill/quill.js"'?>></script>

        <!-- Mail example -->
        <script src=<?php echo'"'.$level.JS_PATH.'examples/mail.js"'?>></script>


        <!-- Main Javascript file -->
        <script src=<?php echo'"'.$level.JS_PATH.'app.min.js"'?>></script>
    <?php
    }
?>

<?php 
    if($page == 'add-product' || $page == 'edit-product')
    {?>
         <!-- JAVASCRIPT -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/jquery/jquery.min.js"'?>></script>
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/bootstrap/js/bootstrap.bundle.min.js"'?>></script>
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/metismenu/metisMenu.min.js"'?>></script>
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/simplebar/simplebar.min.js"'?>></script>
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/node-waves/waves.min.js"'?>></script>

        <!-- select 2 plugin -->
        <script src=<?php echo'"'.$level.LIBS_PATH.'add_product/select2/js/select2.min.js"'?>></script>

        <!-- init js -->
        <script src=<?php echo'"'.$level.JS_PATH.'pages/ecommerce-select2.init.js"'?>></script>

        <!-- App js -->
    <?php
    }
?>