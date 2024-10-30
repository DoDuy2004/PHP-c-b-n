<?php 
    include $level.DATABASE_PATH.'db.php';

    if(isset($_COOKIE['id']))
    {
        $customer = $db->prepare('SELECT * FROM diachigh WHERE diachigh.ID_KH = :ID');
        $customer->bindValue(':ID', $_COOKIE['id'], PDO::PARAM_STR);
        $customer->execute();
        $result = $customer->fetchAll();
    }
    if(isset($_COOKIE['id']))
    {
        if(isset($_POST['getAddress']) && isset($_POST['address']))
        {
            $ID = $_POST['address'];
            $address = $db->prepare('SELECT * FROM diachigh WHERE diachigh.ID = :ID');
            $address->bindValue(':ID', $ID, PDO::PARAM_STR);
            $address->execute();
            $dataAddr = $address->fetch();

            $nameParts = explode(" ", $dataAddr['HOTEN']);

            $Ho = '';
            for($i = 0; $i<count($nameParts) - 1 ; $i++)
            {
                $Ho.=' '.$nameParts[$i];
            }
            $Ten = end($nameParts);
        }
    }
?>
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="checkout-f">
                <div class="col-lg-12">
                    <div class="u-s-m-b-15">
                        <h4 style="color: #333; margin: 0 0 1rem 0; margin-left: -1rem;">Make default shipping and billing address:</h4>

                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" style="display: flex; column-gap: 1rem; margin-left: -1rem;">
                            <select class="select-box select-box--primary-style u-w-100" name="address" id="">
                                <?php
                                    foreach($result as $value)
                                    {?>
                                        <option value="<?php echo $value['ID']?>" <?php if(isset($_POST['getAddress']))
                                                                                            if($ID == $value['ID'])
                                                                                             echo "selected";
                                        ?>>
                                            <div class="ship-b">
                                                <span class="ship-b__text">Ship to:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p"><?php echo $value['DIACHI'].' - '.$value['SDT'].' - '.$value['HOTEN']?></p>
                                                </div>
                                            </div>
                                        </option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <button name="getAddress" style="padding:.3rem .6rem; width: 4rem; border: solid 2px #e5e5e5;background:none; font-size: .8rem; border-radius: 6px;" type="submit">Use</button>
                        </form>
                    </div>
                </div>
                <form action="<?php echo $level.'model/addorder.php'?>" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                            <div class="u-s-m-b-30">
                                <!--====== First Name, Last Name ======-->
                                <div class="gl-inline">
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-fname">FIRST NAME *</label>

                                        <input class="input-text input-text--primary-style" name="fname" value="<?php if(isset($Ten)) echo $Ten?>" type="text" id="billing-fname" data-bill="" placeholder="First name" required></div>
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-lname">LAST NAME *</label>

                                        <input class="input-text input-text--primary-style" name="lname" value="<?php if(isset($Ho) ) echo $Ho?>" type="text" id="billing-lname" data-bill="" placeholder="Last name" required></div>
                                </div>
                                <!--====== End - First Name, Last Name ======-->


                                <!--====== E-MAIL ======-->
                                <div class="u-s-m-b-15">

                                    <label class="gl-label" for="billing-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" name="email" value="<?php if(isset($_POST['getAddress'])) echo $_COOKIE['email']?>" type="text" id="billing-email" data-bill="" placeholder="Email" required></div>
                                <!--====== End - E-MAIL ======-->


                                <!--====== PHONE ======-->
                                <div class="u-s-m-b-15">

                                    <label class="gl-label" for="billing-phone">PHONE *</label>

                                    <input class="input-text input-text--primary-style" name="phone" value="<?php if(isset($dataAddr['SDT'])) echo $dataAddr['SDT']?>" type="text" id="billing-phone" data-bill="" placeholder="Phone" required></div>
                                <!--====== End - PHONE ======-->


                                <!--====== Street Address ======-->
                                <div class="u-s-m-b-15">

                                    <label class="gl-label" for="billing-street">ADDRESS *</label>

                                    <input class="input-text input-text--primary-style" name="address" value="<?php if(isset($dataAddr['DIACHI'])) echo $dataAddr['DIACHI']?>" type="text" id="billing-street" placeholder="House name and street name" data-bill="" required>
                                </div>
                                <!--====== End - Street Address ======-->
                                <div class="u-s-m-b-10">

                                    <!--====== Check Box ======-->
                                    <div class="check-box">

                                        <input type="checkbox" id="make-default-address" data-bill="">
                                        <div class="check-box__state check-box__state--primary">

                                            <label class="check-box__label" for="make-default-address">Make default shipping and billing address</label></div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </div>
                                <div class="u-s-m-b-10">

                                    <label class="gl-label" for="order-note">ORDER NOTE</label><textarea name="note" class="text-area text-area--primary-style" id="order-note"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        <?php
                                            if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
                                            { ?>
                                            <?php echo '<h4 style="text-align: center; margin-bottom: 2rem;">No items in the cart! <a style="text-decoration: underline; color: #333" href="../pages/shop-grid-full.php">Shop now </a></h4>';?>
                                            <?php
                                            }
                                        ?>
                                        <?php
                                            if(isset($_SESSION['cart']))
                                            { ?>
                                                <?php
                                                    foreach($_SESSION['cart'] as $value)
                                                    {
                                                    $price = number_format($value['price'],2);
                                                    ?>    
                                                    <div class="o-card">
                                                        <div class="o-card__flex">
                                                            <div class="o-card__img-wrap">

                                                                <img class="u-img-fluid" src="<?php echo $level.IMG_PATH.'product/'.$value['photo']?>" alt=""></div>
                                                            <div class="o-card__info-wrap">

                                                                <span class="o-card__name">

                                                                    <a href=<?php echo'"'.$level.PAGES_PATH.'product-detail.php"'?>><?php echo $value['name']?></a></span>

                                                                <span class="o-card__quantity"><?php echo 'x'.$value['quantity']?></span>

                                                                <span class="o-card__price"><?php echo '$'.$price?></span></div>
                                                        </div>

                                                        <a class="far fa-trash-alt table-p__delete-link" href="<?php echo $level.'model/delcart.php?id='.$item['id']?>"></a>
                                                    </div>
                                                    <?php
                                                    }
                                                ?>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td><?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])) echo '$'.$_SESSION['ship'];
                                                                else echo '$'.number_format(0,2);?></td>
                                                </tr>
                                                <tr>
                                                    <td>TAX</td>
                                                    <td><?php if(isset($_SESSION['cart'])) echo '$'.$_SESSION['tax'];
                                                                else echo '$'.number_format(0,2);?></td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td><?php if(isset($_SESSION['cart'])) echo '$'.number_format($_SESSION['subtotal'],2);
                                                                else echo '$'.number_format(0,2);?></td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td><?php if(isset($_SESSION['cart'])) echo '$'.number_format($_SESSION['total'],2);
                                                                else echo '$'.number_format(0,2);?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="cash-on-delivery" name="payment" value="1" required>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <!-- <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span> -->
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="direct-bank-transfer" name="payment" value="2" required>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <!-- <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span> -->
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-with-check" name="payment" value="3" required>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <!-- <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span> -->
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-with-card" name="payment" value="4" required>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <!-- <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span> -->
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-pal" name="payment" value="5" required>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <!-- <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span> -->
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <!--====== Check Box ======-->
                                                <div class="check-box">

                                                    <input type="checkbox" id="term-and-condition" required>
                                                    <div class="check-box__state check-box__state--primary">

                                                        <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                </div>
                                                <!--====== End - Check Box ======-->

                                                <a class="gl-link">Terms of Service.</a>
                                            </div>
                                            <div>

                                                <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button></div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>