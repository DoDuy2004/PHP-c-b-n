<ul class="shop-p__pagination">

    <?php if ($tranghientai > 1): ?>
        <li><a class="fas fa-angle-left" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai - 1).'&sosanpham='.$sanpham_moi_trang ?>"></a></li>
    <?php endif; ?>
    <?php
        for($i=1; $i<=(int)$sotrang; $i++)
        { ?>
           <li class="<?php echo (($tranghientai == $i) ? 'is-active' : '')?>"><a href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$i.'&sosanpham='.$sanpham_moi_trang?>"><?php echo $i ?></a></li>
        <?php
        }
    ?>
    <?php if ($tranghientai < $sotrang): ?>
        <li><a class="fas fa-angle-right" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai + 1).'&sosanpham='.$sanpham_moi_trang ?>"></a></li>
    <?php endif; ?>
</ul>
