<?php
    function remove_or_restore ($check) 
    {
        if($check == '2')
        {
            return 'Restore';
        }
        else 
            return 'Delete';
    }
    function remove_or_restore_link ($check) 
    {
        if($check == '2')
        {
            return 'restore.php';
        }
        else 
            return 'remove.php';
    }
    function bg ($check)
    {
       return $check == 'Active' ? 'bg-success' : 'bg-danger';
    }
    function bgStatus ($status)
    {
        $bgColor = '';
        if($status == 'Processing')
            $bgColor = 'bg-primary';
        else if ($status == 'Shipped')
            $bgColor = 'bg-dark';
        else if ($status == 'Delivered')
            $bgColor = 'bg-warning';
        else if ($status == 'Cancelled')
            $bgColor = 'bg-danger';
        else 
            $bgColor = 'bg-success';
        
        return $bgColor;
    }

    function remove_or_restore_order ($check) 
    {
        $stt = [];
        if($check == '3')
        {
            $stt[]= 'Restore';
        }
        else 
        {
            $stt[] = 'Delete';
            $stt[] = 'Confirm';
        }  
        return $stt;          
    }
?>