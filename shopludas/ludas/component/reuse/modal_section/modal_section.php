<?php if($page == 'home')
{ ?>
    <?php //include ($level.COMPONENT_PATH.REUSE_PATH.'modal_section/newsletter_modal/newsletter_modal.php') ?>
    <?php
} ?>

<!--====== Add to Cart Modal ======-->
<?php if($page == 'home' || $page =='wishlist' || $page =='shop_list' || $page == 'shop_grid'
        || $page =='detail' || $page == 'search')
{ ?>
    <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'modal_section/addcart/addcart.php') ?>
    <?php
} ?>
<!--====== End - Add to Cart Modal ======-->


<!--====== Quick Look Modal ======-->
<?php if($page == 'home' || $page =='shop_list' || $page == 'shop_grid'
        || $page =='detail' || $page == 'search')
{ ?>
    <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'modal_section/quicklook/quicklook.php') ?>
    <?php
} ?>
<!--====== End - Quick Look Modal ======-->


<!--====== Unsubscribe or Subscribe Newsletter ======-->
<?php if($page == 'dashboard' || $page =='dash_edit_profile' || $page =='dash_my_profile')
{ ?>
    <?php require($level.COMPONENT_PATH.REUSE_PATH.'modal_section/newsletter_subscription/newsletter_subscription.php') ?>
    <?php
} ?>
<!--====== Unsubscribe or Subscribe Newsletter ======-->

<!--====== Shipping Address Add Modal ======-->
<?php if($page == 'checkout')
{ ?>
    <?php require($level.COMPONENT_PATH.REUSE_PATH.'modal_section/shipping_add1/shipping_add1.php') ?>
    <?php require($level.COMPONENT_PATH.REUSE_PATH.'modal_section/shipping_add2/shipping_add2.php') ?>
    <?php
} ?>
<!--====== End - Shipping Address Add Modal ======-->
