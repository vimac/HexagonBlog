<div class="btn-toolbar">
    <div class="btn-group">
        <button class="btn btn-primary btn-large">New Post</button>
        <button class="btn btn-success btn-large">Edit</button>
        <button class="btn btn-inverse btn-large">Remove</button>
    </div>
</div>

<table class="table table-condensed table-bordered table-hover">
    <thead>
        <tr>
            <th><input type="checkbox" /></th>
            <th width="70%">Title</th>
            <th>Author</th>
            <th>Time</th>
        </tr>
    </thead>
<?php foreach($posts as $post):;?>
<tr>
    <td><input type="checkbox" /></td>
    <td><?php echo $post['title'];?></td>
    <td><?php echo $post['name'];?></td>
    <td><?php echo date('Y-m-d H:i:s', $post['ctime']);?></td>
</tr>
<?php endforeach;?>
</table>

<?php if ($pagination->needPage()):?>
<div class="row">
    <?php $_helper->loadPanel('pager');?>
</div>
<?php endif;?>