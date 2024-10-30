<?php include $level.'function/function.php' ?>
<header class="header--style-1 header--box-shadow">
    <?php 
        if(isset($_COOKIE['email'])) 
            $welcome = '<h4 style="color: #333;text-align: center">Welcome: '.$_COOKIE['fullname'].'</h4>';
        else
            $welcome = '';
    ?>
    <?php echo $welcome ?>
    <!--====== Nav 1 ======-->
    <nav class="primary-nav primary-nav-wrapper--border">
        <div class="container">
            <!--====== Primary Nav ======-->
            <div class="primary-nav">

                <!--====== Main Logo ======-->

                <a class="main-logo" href=<?php echo'"'.$level.'index.php"'?>>
                    <img src=<?php echo'"'.$level.IMG_PATH.'logo/logo-1.png"'?> alt="">
                </a>
                <!--====== End - Main Logo ======-->


                <!--====== Search Form ======-->
                <form class="main-form" method="post" action=<?php echo'"'.$level.PAGES_PATH.'empty-search.php"'?>>

                    <label for="main-search"></label>

                    <input class="input-text input-text--border-radius input-text--style-1" name="noidung" type="text" id="main-search" placeholder="Search">

                    <button class="btn btn--icon fas fa-search main-search-button" name="btn" type="submit"></button></form>
                <!--====== End - Search Form ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation">

                    <button class="btn btn--icon toggle-button fas fa-cogs" type="button"></button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-secondary" style="">
                            <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                <a><i class="far fa-user-circle"></i></a>

                                <!--====== Dropdown ======-->

                                <div style="position: relative;">
                                    <span class="js-menu-toggle" style=" width: 40rem;"></span>
                                    <a href="#" style="font-size: .8rem; text-align: center; width: 10rem; color: #333;position: absolute;bottom: .6rem;right: 50%;transform: translate(+50%,0); "><?php if(isset($_COOKIE['email'])) echo $_COOKIE['fullname']?></a>
                                </div>
                                <ul style="width:120px">
                                    <?php
                                        if(isset($_COOKIE['email']))
                                        {?>
                                            <li>

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'dashboard.php"'?>><i class="fas fa-user-circle u-s-m-r-6"></i>

                                                <span>Account</span></a></li>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if(!isset($_COOKIE['email']))
                                        {?>
                                            <li>

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'signup.php"'?>><i class="fas fa-user-plus u-s-m-r-6"></i>

                                                <span>Signup</span></a></li>
                                            <li>

                                            <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?>><i class="fas fa-lock u-s-m-r-6"></i>

                                                <span>Signin</span></a></li>
                                        <?php
                                        }
                                    ?>
                                    <?php
                                        if(isset($_COOKIE['email']))
                                        {?>
                                            <li>

                                            <a href=<?php echo'"'.$level.'model/signout.php"'?>><i class="fas fa-lock-open u-s-m-r-6"></i>

                                                <span>Signout</span></a></li>
                                        <?php
                                        }
                                    ?>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">

                                <a><i class="fas fa-user-cog"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:120px">
                                    <li class="has-dropdown has-dropdown--ul-right-100">

                                        <a>Language<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <li>

                                                <a class="u-c-brand">ENGLISH</a></li>
                                            <li>

                                                <a>VIETNAM</a></li>
                                            <li>

                                                <a>FRANCAIS</a></li>
                                            <li>

                                                <a>ESPANOL</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-right-100">

                                        <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:225px">
                                            <li>

                                                <a class="u-c-brand">$ - US DOLLAR</a></li>
                                            <li>

                                                <a>£ - BRITISH POUND STERLING</a></li>
                                            <li>

                                                <a>€ - EURO</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li data-tooltip="tooltip" data-placement="left" title="Contact">

                                <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a></li>
                            <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a></li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Primary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 1 ======-->


    <!--====== Nav 2 ======-->
    <nav class="secondary-nav-wrapper">
        <div class="container">

            <!--====== Secondary Nav ======-->
            <div class="secondary-nav">

                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation1">

                    <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list">
                            <li class="has-dropdown">

                                <span class="mega-text">M</span>

                                <!--====== Mega Menu ======-->

                                <span class="js-menu-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="mega-menu-list">
                                            <ul>
                                                <li class="js-active">

                                                    <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><i class="fas fa-tv u-s-m-r-6"></i>

                                                        <span>Electronics</span></a>

                                                    <span class="js-menu-toggle js-toggle-mark"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><i class="fas fa-female u-s-m-r-6"></i>

                                                        <span>Women's Clothing</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><i class="fas fa-male u-s-m-r-6"></i>

                                                        <span>Men's Clothing</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.'index.php"'?>><i class="fas fa-utensils u-s-m-r-6"></i>

                                                        <span>Food & Supplies</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.'index.php"'?>><i class="fas fa-couch u-s-m-r-6"></i>

                                                        <span>Furniture & Decor</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.'index.php"'?>><i class="fas fa-football-ball u-s-m-r-6"></i>

                                                        <span>Sports & Game</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                                <li>

                                                    <a href=<?php echo'"'.$level.'index.php"'?>><i class="fas fa-heartbeat u-s-m-r-6"></i>

                                                        <span>Beauty & Health</span></a>

                                                    <span class="js-menu-toggle"></span></li>
                                            </ul>
                                        </div>

                                        <!--====== Electronics ======-->
                                        <div class="mega-menu-content js-active">

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>3D PRINTER & SUPPLIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>3d Printer</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>3d Printing Pen</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>3d Printing Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>3d Printer Module Board</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>HOME AUDIO & VIDEO</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>TV Boxes</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>TC Receiver & Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Display Dongle</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Home Theater System</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>MEDIA PLAYERS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Earphones</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Mp3 Players</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Speakers & Radios</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Microphones</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>VIDEO GAME ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Nintendo Video Games Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Sony Video Games Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Xbox Video Games Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>SECURITY & PROTECTION</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Security Cameras</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Alarm System</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Security Gadgets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>CCTV Security & Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>PHOTOGRAPHY & CAMERA</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Digital Cameras</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Sport Camera & Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Camera Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Lenses & Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>ARDUINO COMPATIBLE</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Raspberry Pi & Orange Pi</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Module Board</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Smart Robot</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Board Kits</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>DSLR Camera</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Nikon Cameras</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Canon Camera</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Sony Camera</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>DSLR Lenses</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>NECESSARY ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Flash Cards</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Memory Cards</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Flash Pins</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Compact Discs</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-9 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-0.jpg"'?> alt=""></a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Electronics ======-->


                                        <!--====== Women ======-->
                                        <div class="mega-menu-content">

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-1.jpg"'?> alt=""></a></div>
                                                </div>
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-2.jpg"'?> alt=""></a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>HOT CATEGORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Dresses</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Blouses & Shirts</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>T-shirts</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Rompers</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>INTIMATES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Bras</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Brief Sets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Bustiers & Corsets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Panties</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>WEDDING & EVENTS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Wedding Dresses</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Evening Dresses</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Prom Dresses</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Flower Dresses</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>BOTTOMS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Skirts</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shorts</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Leggings</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Jeans</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>OUTWEAR</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Blazers</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Basics Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Trench</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Leather & Suede</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>JACKETS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Denim Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Trucker Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Windbreaker Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Leather Jackets</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Tech Accessories</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Headwear</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Baseball Caps</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Belts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>OTHER ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Bags</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Wallets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Watches</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Sunglasses</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-9 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-3.jpg"'?> alt=""></a></div>
                                                </div>
                                                <div class="col-lg-3 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-4.jpg"'?> alt=""></a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Women ======-->


                                        <!--====== Men ======-->
                                        <div class="mega-menu-content">

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-5.jpg"'?> alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-6.jpg"'?> alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-7.jpg"'?> alt=""></a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>HOT SALE</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>T-Shirts</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Tank Tops</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Polo</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shirts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>OUTWEAR</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Hoodies</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Trench</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Parkas</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Sweaters</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>BOTTOMS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Casual Pants</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Cargo Pants</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Jeans</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shorts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>UNDERWEAR</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Boxers</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Briefs</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Robes</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Socks</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>JACKETS</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Denim Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Trucker Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Windbreaker Jackets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Leather Jackets</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>SUNGLASSES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Pilot</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Wayfarer</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Square</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Round</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Eyewear Frames</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Scarves</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Hats</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Belts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>OTHER ACCESSORIES</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Bags</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Wallets</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Watches</a></li>
                                                        <li>

                                                            <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Tech Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>

                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-8.jpg"'?> alt=""></a></div>
                                                </div>
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">

                                                        <a class="u-d-block" href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>

                                                            <img class="u-img-fluid u-d-block" src=<?php echo'"'.$level.IMG_PATH.'banners/banner-mega-9.jpg"'?> alt=""></a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Men ======-->


                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->


                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->


                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->


                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->
                                    </div>
                                </div>
                                <!--====== End - Mega Menu ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation2">

                    <button class="btn btn--icon toggle-button fas fa-cog" type="button"></button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                            <li>

                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>NEW ARRIVALS</a></li>
                            <li class="has-dropdown">

                                <a>PAGES<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:170px">
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Home<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:118px">
                                            <li>

                                                <a href=<?php echo'"'.$level.'index.php"'?>>Home 1</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.'index.php"'?>>Home 2</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.'index.php"'?>>Home 3</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'signin.php"'?>>Signin / Already Registered</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'signup.php"'?>>Signup / Register</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'lost-password.php"'?>>Lost Password</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <?php
                                        if(isset($_COOKIE['email']))
                                        { ?>
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dashboard.php"'?>>Dashboard<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:200px">
                                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dashboard.php"'?>>Manage My Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                        <!--====== Dropdown ======-->

                                                        <span class="js-menu-toggle"></span>
                                                        <ul style="width:180px">
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-edit-profile.php"'?>>Edit Profile</a></li>
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-book.php"'?>>Edit Address Book</a></li>
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-manage-order.php"'?>>Manage Order</a></li>
                                                        </ul>
                                                        <!--====== End - Dropdown ======-->
                                                    </li>
                                                    <li>

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-my-profile.php"'?>>My Profile</a></li>
                                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-book.php"'?>>Address Book<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                        <!--====== Dropdown ======-->

                                                        <span class="js-menu-toggle"></span>
                                                        <ul style="width:180px">
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-make-default.php"'?>>Address Make Default</a></li>
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-add.php"'?>>Add New Address</a></li>
                                                            <li>

                                                                <a href=<?php echo'"'.$level.PAGES_PATH.'dash-address-edit.php"'?>>Edit Address Book</a></li>
                                                        </ul>
                                                        <!--====== End - Dropdown ======-->
                                                    </li>
                                                    <li>

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-track-order.php"'?>>Track Order</a></li>
                                                    <li>

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-my-order.php"'?>>My Orders</a></li>
                                                    <li>

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-payment-option.php"'?>>My Payment Options</a></li>
                                                    <li>

                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'dash-cancellation.php"'?>>My Returns & Cancellations</a></li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                        <?php
                                        }
                                    ?>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Empty<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'empty-search.php"'?>>Empty Search</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'cart.php"'?>>Empty Cart</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'wishlist.php"'?>>Empty Wishlist</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Product Details<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>Product Details</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>Product Details Variable</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>>Product Details Affiliate</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Shop Grid Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <!-- <li>

                                                <a href=<?php //echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shop Grid Left Sidebar</a></li>
                                            <li>

                                                <a href=<?php //echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shop Grid Right Sidebar</a></li> -->
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shop Grid Full Width</a></li>
                                            <li>

                                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>Shop Side Version 2</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <!-- <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Shop List Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <!-- <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href=<?php //echo'"'.$level.PAGES_PATH.'shop-list-full.php"'?>>Shop List Left Sidebar</a></li>
                                            <li>

                                                <a href=<?php //echo'"'.$level.PAGES_PATH.'shop-list-full.php"'?>>Shop List Right Sidebar</a></li>
                                            <li>

                                                <a href=<?php //echo'"'.$level.PAGES_PATH.'shop-list-full.php"'?>>Shop List Full Width</a></li>
                                        </ul> -->
                                        <!--====== End - Dropdown ======
                                    </li> -->
                                    <li>

                                        <a href=<?php echo'"'.$level.PAGES_PATH.'cart.php"'?>>Cart</a></li>
                                    <li>

                                        <a href=<?php echo'"'.$level.PAGES_PATH.'wishlist.php"'?>>Wishlist</a></li>
                                    <li>

                                        <a href=<?php echo'"'.$level.PAGES_PATH.'checkout.php"'?>>Checkout</a></li>
                                    <li>

                                        <a href="#">FAQ</a></li>
                                    <li>

                                        <a href="#">About us</a></li>
                                    <li>

                                        <a href=<?php echo'"'.$level.PAGES_PATH.'contact.php"'?>>Contact</a></li>
                                    <li>
                                        <a href="#">404</a></li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li class="has-dropdown">

                                <a>BLOG<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:200px">
                                    <li>

                                        <a href="#">Blog Left Sidebar</a></li>
                                    <li>

                                        <a href="#">Blog Right Sidebar</a></li>
                                    <li>

                                        <a href="#">Blog Sidebar None</a></li>
                                    <li>

                                        <a href="#">Blog Masonry</a></li>
                                    <li>

                                        <a href="#">Blog Details</a></li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li>

                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>VALUE OF THE DAY</a></li>
                            <li>

                                <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>>GIFT CARDS</a></li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation3">

                    <button class="btn btn--icon toggle-button fas fa-shopping-bag toggle-button-shop" type="button"></button>

                    <span class="total-item-round">2</span>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                            <li>

                                <a href=<?php echo'"'.$level.'index.php"'?>><i class="fas fa-home"></i></a></li>
                            <li>

                                <a href=<?php echo'"'.$level.PAGES_PATH.'wishlist.php"'?>><i class="far fa-heart"></i></a></li>
                            <li class="has-dropdown">

                                <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                    <span class="total-item-round"><?php if(isset($_SESSION['cart'])) echo countItems(); 
                                                                            else echo '0'?>
                                    </span>
                                </a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <div class="mini-cart">

                                    <!--====== Mini Product Container ======-->
                                    <div class="mini-product-container gl-scroll u-s-m-b-15">

                                        <!--====== Card for mini cart ======-->
                                        <?php
                                            if(isset($_SESSION['cart']))
                                            { ?>
                                                <?php
                                                    foreach($_SESSION['cart'] as $item)
                                                    {?>
                                                        <div class="card-mini-product">
                                                            <div class="mini-product">
                                                                <div class="mini-product__image-wrapper">

                                                                    <a class="mini-product__link" href=<?php echo'"'.$level.PAGES_PATH.'product-detail"'?>>

                                                                        <img class="u-img-fluid" src="<?php echo $level.IMG_PATH.'product/'.$item['photo']?>" alt=""></a></div>
                                                                <div class="mini-product__info-wrapper">

                                                                    <span class="mini-product__category">

                                                                        <a href=<?php echo'"'.$level.PAGES_PATH.'shop-grid-full.php"'?>><?php echo $item['type']?></a></span>

                                                                    <span class="mini-product__name">

                                                                        <a href=<?php echo"'".$level.PAGES_PATH."product-detail.php?id=".$item['id']."'"?>><?php echo $item['name']?></a></span>

                                                                    <span class="mini-product__quantity"><?php echo $item['quantity'].' x'?></span>

                                                                    <span class="mini-product__price"><?php echo '$'.number_format($item['price'],2)?></span></div>
                                                            </div>

                                                            <a href="<?php echo $level.'model/delcart.php?id='.$item['id']?>" class="mini-product__delete-link far fa-trash-alt"></a>
                                                        </div>
                                                    <?php
                                                    }
                                                ?>    
                                            <?php
                                            }
                                        ?>
                                        <?php
                                            if(!isset($_SESSION['cart']))
                                            { ?>
                                                <?php echo '<h4 style="text-align: center;">No items in the cart</h4>'; ?>
                                            <?php
                                            }
                                        ?>
                                        <!--====== End - Card for mini cart ======-->
                                    </div>
                                    <!--====== End - Mini Product Container ======-->


                                    <!--====== Mini Product Statistics ======-->
                                    <div class="mini-product-stat">
                                        <div class="mini-total">

                                            <span class="subtotal-text">SUBTOTAL</span>

                                            <span class="subtotal-value"><?php if(isset($_SESSION['cart']))  echo '$'.number_format($_SESSION['total'],2);
                                                                                    else echo '$0.00';?></span></div>
                                        <div class="mini-action">

                                            <a class="mini-link btn--e-brand-b-2" href=<?php echo'"'.$level.PAGES_PATH.'checkout.php"'?>>PROCEED TO CHECKOUT</a>
                                            <a class="mini-link btn--e-transparent-secondary-b-2" href=<?php echo'"'.$level.PAGES_PATH.'cart.php"'?>>VIEW CART</a></div>
                                    </div>
                                    <!--====== End - Mini Product Statistics ======-->
                                </div>
                                <!--====== End - Dropdown ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Secondary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 2 ======-->
</header>