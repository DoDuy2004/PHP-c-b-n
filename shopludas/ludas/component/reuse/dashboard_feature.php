<?php
    include $level.DATABASE_PATH.'db.php';

    if(isset($_COOKIE['email']))
    {
        $order = $db -> prepare('SELECT *  FROM hoadon 
        WHERE hoadon.ID_KH = :ID');
        $order -> bindValue(':ID', $_COOKIE['id'],PDO::PARAM_STR );
        $order -> execute();

        $cnt = $order -> fetchAll(); 
    }
?>
<div class="col-lg-3 col-md-12">

    <!--====== Dashboard Features ======-->
    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
        <div class="dash__pad-1">

            <span class="dash__text u-s-m-b-16"><?php echo 'Hello, '.$_COOKIE['fullname']?></span>
            <ul class="dash__f-list">
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dashboard.php"'?>>Manage My Account</a></li>
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dash-my-profile.php"'?>>My Profile</a></li>
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-book.php"'?>>Address Book</a></li>
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dash-track-order.php"'?>>Track Order</a></li>
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dash-my-order.php"'?>>My Orders</a></li>
                <li>

                    <a href=<?php echo'"'.$level.PAGES_PATH.'dash-payment-option.php"'?>>My Payment Options</a></li>
                <li>

                    <a class="dash-active" href=<?php echo'"'.$level.PAGES_PATH.'dash-cancellation.php"'?>>My Returns & Cancellations</a></li>
            </ul>
        </div>
    </div>
    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
        <div class="dash__pad-1">
            <ul class="dash__w-list">
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                        <span class="dash__w-text"><?php echo count($cnt)?></span>

                        <span class="dash__w-name">Orders Placed</span></div>
                </li>
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                        <span class="dash__w-text">0</span>

                        <span class="dash__w-name">Cancel Orders</span></div>
                </li>
                <li>
                    <div class="dash__w-wrap">

                        <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                        <span class="dash__w-text">0</span>

                        <span class="dash__w-name">Wishlist</span></div>
                </li>
            </ul>
        </div>
    </div>
    <!--====== End - Dashboard Features ======-->
</div>