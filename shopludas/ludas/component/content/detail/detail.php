
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!--====== Product Breadcrumb ======-->
                    <?php require_once($level.COMPONENT_PATH.REUSE_PATH.'product_breadcrumb.php')?>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <?php require_once($level.COMPONENT_PATH.CONTENT_PATH.'detail/product_detail_zoom/product_detail_zoom.php')?>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <?php require_once($level.COMPONENT_PATH.CONTENT_PATH.'detail/product_side/product_side.php')?>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <?php require_once($level.COMPONENT_PATH.CONTENT_PATH.'detail/product_detail_tab/product_detail_tab.php')?>
    <!--====== End - Product Detail Tab ======-->
    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <?php require_once($level.COMPONENT_PATH.CONTENT_PATH.'detail/intro/intro.php')?>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <?php require_once($level.COMPONENT_PATH.CONTENT_PATH.'detail/content/content.php')?>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->
</div>