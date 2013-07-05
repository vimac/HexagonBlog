<?php 
use HexagonBlog\app\widget\admin\Notification;
?>
<!DOCTYPE html>
<html>
<head>
    <?php $_helper->loadPanel('head');?>
    <link href="/css/admin/admin.css" rel="stylesheet" />
    <title><?php echo $_blogTitle;?></title>
</head>

<body>
    <div class="container">
        <div class="row-fluid">
            <div class="well span2">
                <ul class="nav nav-list">
                    <li class="<?php echo $_active === 'dashboard' ? 'active' : '';?>"><a href="/admin/dashboard/index"><i class="icon-home"></i>Dashboard</a></li>
                    <li class="<?php echo $_active === 'post' ? 'active' : '';?>"><a href="/admin/post/index"><i class="icon-th-list"></i>Post</a></li>
                    <li class="<?php echo $_active === 'page' ? 'active' : '';?>"><a href="/admin/post/index?type=page"><i class="icon-file"></i>Page</a></li>
                    <li class="<?php echo $_active === 'tag' ? 'active' : '';?>"><a href="/admin/tag/index"><i class="icon-tags"></i>Tag</a></li>
                    <li class="<?php echo $_active === 'user' ? 'active' : '';?>"><a href="/admin/user/index"><i class="icon-user"></i>User</a></li>
                    <li class="<?php echo $_active === 'option' ? 'active' : '';?>"><a href="/admin/option/index"><i class="icon-check"></i>Option</a></li>
                    <li class="divider"></li>
                    <li><a href="/admin/logout"><i class="icon-off"></i>Logout</a></li>
                </ul>
            </div>
            <?php Notification::load();?>
            <div class="well span10">
                <?php echo $_screenHolder;?>
            </div>
        </div>
        <?php $_helper->loadPanel('admin/footer');?>
    </div>
    <?php $_helper->loadPanel('admin/adminjs');?>
</body>
</html>