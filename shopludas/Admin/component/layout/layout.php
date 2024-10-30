<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php include $level.DIST_PATH.'metadata.php'?>
    <title> <?php echo $title ?> | E-Commerce HTML Admin Dashboard Template </title>
    <?php include $level.DIST_PATH.'css.php' ?>
</head>



<?php
    if(isset($_SESSION['customer']))
    {?>
        <?php 
            if($page != '404' && $page != 'lock-screen' && $page != 'login' && $page != 'register' 
            && $page != 'reset-password')
            { ?>
                <body>
                    <!-- preloader -->
                    <?php include $level.COMPONENT_PATH.REUSE_PATH.'preloader.php' ?>
                    <!-- ./ preloader -->

                    <?php include $level.COMPONENT_PATH.HEADER_PATH.'header.php' ?>

                    <!-- layout-wrapper -->
                    <div class="layout-wrapper">

                        <!-- header -->
                        <?php include $level.COMPONENT_PATH.REUSE_PATH.'header_wrapper.php' ?>
                        <!-- ./ header -->

                        <!-- content -->
                        <?php include $level.COMPONENT_PATH.CONTENT_PATH.'content.php' ?>
                        <!-- ./ content -->

                        <!-- content-footer -->
                        <?php include $level.COMPONENT_PATH.FOOTER_PATH.'footer.php' ?>
                        <!-- ./ content-footer -->

                    </div>
                    <!-- ./ layout-wrapper -->

                    <?php include $level.DIST_PATH.'js.php' ?>
                </body>
            <?php
            }
        ?>

        <?php 
            if($page == '404')
            { ?>
                <body class="d-md-flex align-items-center justify-content-center">
                    <?php include $level.COMPONENT_PATH.CONTENT_PATH.'content.php' ?>
                </body>
            <?php
            }
        ?>
    <?php
    }
?>

<?php
    if(!isset($_SESSION['customer']))
    {?>
        <?php 
        if($page == 'lock-screen' || $page == 'login' || $page == 'register' || $page == 'reset-password')
            { ?>
                <body class="auth">
                    <?php include $level.COMPONENT_PATH.CONTENT_PATH.'content.php' ?>
                </body>
            <?php
            }
        ?>
        <?php 
        if($page == 'home' || $page == 'login')
            { ?>
                <body class="auth">
                    <?php include $level.COMPONENT_PATH.CONTENT_PATH.'login/login.php' ?>
                </body>
            <?php
            }
        ?>
    <?php
    }
?>
</html>