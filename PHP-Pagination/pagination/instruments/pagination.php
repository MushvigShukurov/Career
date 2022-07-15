<div class="pagination">
    <?php
    [$startFor, $endFor] = paginationSettings($fullDataCount, $onePageCount, $page);
    for ($i = $startFor; $i <= $endFor; $i++) :
    ?>
        <a href="http://localhost/pagination/page/<?= $i ?>" class="<?php echo $page == $i ? 'pagActive' : ''; ?>"><?= $i ?></a>
    <?php
    endfor;
    ?>
</div>