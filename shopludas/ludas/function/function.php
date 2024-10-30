<?php
    function subTotal() {
        $sum = 0;

        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
        {
            foreach($_SESSION['cart'] as $item) 
            {
                $sum += $item['price'] * $item['quantity'] ;
            }
        }
        return $sum;
    }

    function grandTotal() {
        $sum = 0;
        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
            $sum = $_SESSION['ship'] + $_SESSION['tax'] + subTotal();
        return $sum;
    }

    function countItems() {
        $cnt = 0;
        foreach($_SESSION['cart'] as $item)
        {
            $cnt++;
        }
        return $cnt;
    }

    function colorStatus($status)
    {
        if($status == 'Processing')
            return 'processing';

        if($status == 'Out for delivery')
            return 'shipped';
        if($status == 'Delivered')
        return 'delivered';
    }

?>