<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!--====== Vendor Js ======-->
<script src=<?php echo'"'.$level.JS_PATH.'vendor.js"'?>></script>

<?php if($page == 'contact')
{ ?>
    <!--====== Google Map ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-MO9uPLS-ApTqYs0FpYdVG8cFwdq6apw"></script>

    <!--====== Google Map Init ======-->
    <script src=<?php echo'"'.$level.JS_PATH.'map-init.js"'?>></script>
    <?php
} ?>
<!--====== jQuery Shopnav plugin ======-->
<script src=<?php echo'"'.$level.JS_PATH.'jquery.shopnav.js"'?>></script>

<!--====== App ======-->
<script src=<?php echo'"'.$level.JS_PATH.'app.js"'?>></script>