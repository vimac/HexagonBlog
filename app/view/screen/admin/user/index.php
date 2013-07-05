<div class="navbar">
    <a href="/admin/post/publish<?php echo $_active != 'post' ? '?type=' . $_active : '';?>" class="btn btn-primary btn-large"><i class="icon-plus-sign"></i> New User</a>
    <button id="btnRemove" class="btn btn-inverse btn-large"><i class="icon-minus-sign"></i> Remove</button>
    <form class="navbar-form pull-right controls">
        <div class="input-prepend input-append">
            <span class="add-on"><i class="icon-search"></i></span>
            <input type="text" placeholder="search" />
            <button type="submit" class="btn" />Go</button>
        </div>
    </form>
</div>

<?php $_helper->formOpen('/admin/user/delete', 'POST', ['id' => 'userRemove']);?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="10px"><input type="checkbox" /></th>
            <th width="150px">Name</th>
            <th>Email</th>
            <th width="150px">Time</th>
        </tr>
    </thead>
<?php foreach($users as $user):;?>
<tr>
    <td><input type="checkbox" name="uid[]" value="<?php echo $user['uid'];?>" /></td>
    <td><a href="/admin/user/edit?id=<?php echo $user['uid'];?>"><?php echo $user['name'];?></a></td>
    <td><?php echo $user['email'];?></td>
    <td><?php echo date('Y-m-d H:i:s', $user['ctime']);?></td>
</tr>
<?php endforeach;?>
</table>
<?php $_helper->formClose();?>

<?php if ($pagination->needPage()):?>
<div class="row">
    <?php $_helper->loadPanel('pager');?>
</div>
<?php endif;?>