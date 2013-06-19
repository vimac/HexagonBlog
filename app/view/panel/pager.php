<div class="pagination pagination-centered">
    <ul>
        <li <?php echo isset($pagination->prevPage) ? '' : ' class="disabled"';?>><a href="<?php echo $pagination->prevPage === NULL ? '#' : $pagination->prevPage;?>">←</a></li>
        <?php foreach($pagination->pagination as $k => $url):?>
            <li<?php echo $k === $pagination->currentPage ? ' class="active"' : '' ;?>>
                <a href="<?php echo $url;?>"><?php echo $k;?></a>
            </li>
        <?php endforeach;?>
        <li <?php echo isset($pagination->nextPage) ? '' : ' class="disabled"';?>><a href="<?php echo $pagination->nextPage === NULL ? '#' : $pagination->nextPage;?>">→</a></li>
    </ul>
</div>