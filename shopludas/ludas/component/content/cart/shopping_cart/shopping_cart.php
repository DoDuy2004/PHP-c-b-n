<?php
    include $level.DATABASE_PATH.'db.php';

    if(isset($_COOKIE['email']))
    {
        $customer = $db->prepare('SELECT * FROM diachigh WHERE diachigh.ID_KH = :ID');
        $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
        $customer->execute();
        $result = $customer->fetchAll();
    }
    if(isset($_POST['submit']))
    {
        foreach($_POST as $idbook=>$soluong)
        {
            if( ($soluong == 0) and (is_numeric($soluong)))
            {
                unset ($_SESSION['cart'][$idbook]);
            }
            elseif(($soluong > 0) and (is_numeric($soluong)))
            {
                $_SESSION['cart'][$idbook]['quantity']=$soluong;
            }
        }
    }

?>
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->
    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <?php
                $checkCart = false;

                if(isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $k)
                    {
                        if(isset($k))
                        $checkCart = true;
                    }
                }
                if($checkCart == false )
                echo '<h4 style="text-align: center; margin-bottom: 2rem;">No items in the cart!</h4>';
                else
                {
                    $items = $_SESSION['cart'];
                    echo '<h4 style="text-align: center; margin-bottom: 2rem; text-transform: uppercase">You have '.count($items).' item in your shopping cart:</h4>';
                }
            ?>
            <div class="row">
                <form class="f-cart" action="<?php echo'cart.php'?>" method="post">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="table-responsive" style="margin-bottom: 2rem;">
                            <table class="table-p">
                                <tbody>
                                    <?php 
                                        if(isset($_SESSION['cart']))
                                        {?>

                                        <?php
                                            foreach($_SESSION['cart'] as $item)
                                            {?>
                                                <tr>
                                                    <td>
                                                        <div class="table-p__box">
                                                            <div class="table-p__img-wrap">

                                                                <img class="u-img-fluid" src="<?php echo $level.IMG_PATH.'product/'.$item['photo']?>" alt=""></div>
                                                            <div class="table-p__info">

                                                                <span class="table-p__name">

                                                                    <label href="product-detail.html"><?php echo $item['name']?></label></span>
                                                                <span class="table-p__category">

                                                                    <a href="shop-side-version-2.html"><?php echo $item['type']?></a></span>
                                                                <ul class="table-p__variant-list">
                                                                    <li>

                                                                        <span>Storage : 128GB</span></li>
                                                                    <li>

                                                                        <span>Color: Black</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <span class="table-p__price"><?php echo '$'.number_format($item['price'],2)?></span>
                                                    </td>
                                                    <td>
                                                        <div class="table-p__input-counter-wrap">

                                                            <!--====== Input Counter ======-->
                                                            <div class="input-counter">
                                                            <?php                                                 
                                                                $quantityProd = $db->prepare('SELECT TONKHO FROM sanpham WHERE ID=:ID');
                                                                $quantityProd -> bindValue(':ID', $item['id'], PDO::PARAM_STR);
                                                                $quantityProd -> execute();
                                                                $quantity = $quantityProd -> fetch();
                                                            ?>
                                                                <span class="input-counter__minus fas fa-minus"></span>

                                                                <input class="input-counter__text input-counter--text-primary-style" name="<?php echo $item['id']?>" type="text" value="<?php if($item['quantity'] > $quantity['TONKHO']) echo $quantity['TONKHO'];
                                                                                                                                                                                        else echo $item['quantity'];?>" data-min="1" 
                                                                data-max="<?php echo $quantity['TONKHO']?>">

                                                                <span class="input-counter__plus fas fa-plus"></span>
                                                            </div>
                                                            <!--====== End - Input Counter ======-->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-p__del-wrap">

                                                            <a class="far fa-trash-alt table-p__delete-link" href="<?php echo $level.'model/delcart.php?id='.$item['id']?>"></a></div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            ?>
                                        <?php
                                        }
                                    ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    <div class="col-lg-12" style="margin-bottom: 2rem;">
                        <div class="route-box">
                            <div class="route-box__g1">

                                <a class="route-box__link" href="<?php echo $level.PAGES_PATH.'shop-grid-full.php'?>"><i class="fas fa-long-arrow-alt-left"></i>

                                    <span>CONTINUE SHOPPING</span></a></div>
                            <div class="route-box__g2">

                                <a class="route-box__link" href="<?php echo $level.'model/delcart.php?id=0'?>"><i class="fas fa-trash"></i>

                                    <span>CLEAR CART</span></a>
                                <input class="route-box__link" type="submit" name="submit" value="UPDATE CART" style="border: none;" >

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="f-cart__pad-box">
                                    <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>

                                    <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>
                                    <div class="u-s-m-b-30">

                                        <!--====== Select Box ======-->

                                        <label class="gl-label" for="shipping-state">ADDRESS *</label><select class="select-box select-box--primary-style" id="shipping-state">
                                            <?php 
                                                foreach($result as $value)
                                                { ?>
                                                    <option value="<?php echo $value['ID']?>"><?php echo $value['DIACHI']?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                        <!--====== End - Select Box ======-->
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <a class="f-cart__ship-link btn--e-transparent-brand-b-2" href=<?php echo'"'.$level.PAGES_PATH.'cart.php"'?>>CALCULATE SHIPPING</a></div>

                                    <span class="gl-text">Note: There are some countries where free shipping is available otherwise our flat rate charges or country delivery charges will be apply.</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="f-cart__pad-box">
                                    <h1 class="gl-h1">NOTE</h1>

                                    <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>
                                    <div>
                                        <label for="f-cart-note"></label><textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="f-cart__pad-box">
                                    <div class="u-s-m-b-30">
                                        <table class="f-cart__table">
                                            <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td><?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) echo '$'.$_SESSION['ship'] = number_format(0,2);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TAX</td>
                                                    <td><?php  echo '$'.$_SESSION['tax'] = number_format(0,2);?>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td><?php $_SESSION['subtotal'] = subTotal();
                                                            echo '$'.$subtotal = number_format($_SESSION['subtotal'],2);?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td> <?php  $_SESSION['total'] = grandTotal();
                                                         echo '$'.$total = number_format($_SESSION['total'],2) ?>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>

                                        <a href="<?php echo $level.PAGES_PATH.'checkout.php'?>" class="btn btn--e-brand-b-2" style="display: block; text-align: center;"> PROCEED TO CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
