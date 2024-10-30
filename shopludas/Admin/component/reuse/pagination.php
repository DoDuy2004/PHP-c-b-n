<nav class="mt-4" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if($tranghientai > 1) :?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai - 1).'&sosanpham='.$sosanpham?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif ?>
                <?php for($i = 1; $i <= $sotrang ; $i++) :?>
                    <li class="page-item <?php if($tranghientai == $i) echo 'active' ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.$i.'&sosanpham='.$sosanpham?>"><?php echo $i ?></a></li>
                <?php endfor ?>
                <?php if($tranghientai < $sotrang) :?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'].'?tranghientai='.($tranghientai + 1).'&sosanpham='.$sosanpham?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>