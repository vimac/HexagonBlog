<?php foreach($posts as $post):?>
<div class="post">
    <div class="post-title">
        <h2>
            <a href="/post?id=<?php echo $post['pid'];?>"><?php echo $post['title'];?></a>
        </h2>
    </div>
    <div class="post-content">
        <?php echo $post['content'];?>
    </div>
    <div class="post-meta">
        <span class="badge badge-info">Time: <?php echo date('Y-m-d H:i:s', $post['ctime']);?></span>
        <span class="badge badge-success">Author: <?php echo $post['name'];?></span>
    </div>
</div>
<?php endforeach;?>

<?php if ($pagination->needPage()):?>
<div class="row">
    <?php $_helper->loadPanel('pager');?>
</div>
<?php endif;?>