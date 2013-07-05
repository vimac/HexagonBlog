<div class="navbar">
    <a href="/admin/post/publish<?php echo $_active != 'post' ? '?type=' . $_active : '';?>" class="btn btn-primary btn-large"><i class="icon-plus-sign"></i> New <?php echo ucfirst($_active);?></a>
    <button id="btnRemove" class="btn btn-inverse btn-large"><i class="icon-minus-sign"></i> Remove</button>
    <form class="navbar-form pull-right controls">
        <div class="input-prepend input-append">
            <span class="add-on"><i class="icon-search"></i></span>
            <input type="text" placeholder="search" />
            <button type="submit" class="btn" />Go</button>
        </div>
    </form>
</div>

<?php $_helper->formOpen('/admin/post/delete', 'POST', ['id' => 'postRemove']);?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="10px"><input type="checkbox" /></th>
            <th>Title</th>
            <th width="75px">Author</th>
            <th width="150px">Time</th>
        </tr>
    </thead>
<?php foreach($posts as $post):;?>
<tr>
    <td><input type="checkbox" name="pid[]" value="<?php echo $post['pid'];?>" /></td>
    <td><a href="/admin/post/edit?id=<?php echo $post['pid'];?>"><?php echo $post['title'];?></a></td>
    <td><?php echo $post['name'];?></td>
    <td><?php echo date('Y-m-d H:i:s', $post['ctime']);?></td>
</tr>
<?php endforeach;?>
</table>
<?php $_helper->formClose();?>

<?php if ($pagination->needPage()):?>
<div class="row">
    <?php $_helper->loadPanel('pager');?>
</div>
<?php endif;?>