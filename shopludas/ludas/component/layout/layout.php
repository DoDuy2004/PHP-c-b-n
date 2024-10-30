<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!--=== metadata ===-->
    <?php include ($level.LIB_PATH.'meta.php') ?>
    <!--=== css ===-->
    <?php include ($level.LIB_PATH.'css.php') ?>
</head>
<body class="config">
    <?php //include ($level.COMPONENT_PATH.REUSE_PATH.'loading.php')?>
    
    <!--====== Main App ======-->
    <div id="app">
        <!--====== Main Header ======-->
        <?php include ($level.COMPONENT_PATH.HEADER_PATH.'header.php') ?>
        <!--====== End - Main Header ======-->

        <!--====== App Content ======-->
        <?php include ($level.COMPONENT_PATH.CONTENT_PATH.'content.php') ?>
        <!--====== End - App Content ======-->

        <!--====== Modal Section ======-->
        <?php include($level.COMPONENT_PATH.REUSE_PATH.'modal_section/modal_section.php') ?>
        <!--====== End - Modal Section ======-->


        <!--====== Main Footer ======-->
        <?php include ($level.COMPONENT_PATH.FOOTER_PATH.'footer.php') ?>
    </div>
    <!--====== End - Main App ======-->

    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <!--====== script ======-->
    <?php include($level.LIB_PATH.'script.php') ?>
    <!--====== Noscript ======-->
    <?php include($level.COMPONENT_PATH.REUSE_PATH.'nonscript.php') ?>
</body>
</html>