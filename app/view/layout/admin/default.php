<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $_blogTitle;?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/bootswatch.css" rel="stylesheet" />
    <link href="/css/blog.css" rel="stylesheet" />
    <link href="/css/admin/admin.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row-fluid">
            <div class="well span2">
                <ul class="nav nav-list">
                    <li class="<?php echo $_active === 'dashboard' ? 'active' : '';?>"><a href="/admin/dashboard/index">Dashboard</a></li>
                    <li class="<?php echo $_active === 'post' ? 'active' : '';?>"><a href="/admin/post/index">Post</a></li>
                    <li class="<?php echo $_active === 'page' ? 'active' : '';?>"><a href="/admin/page/index">Page</a></li>
                    <li class="<?php echo $_active === 'tag' ? 'active' : '';?>"><a href="/admin/tag/index">Tag</a></li>
                    <li class="<?php echo $_active === 'option' ? 'active' : '';?>"><a href="/admin/option/index">Option</a></li>
                    <li class="divider"></li>
                    <li class=""><a href="/admin/logout">Logout</a></li>
                </ul>
            </div>
            <div class="span10">
                <?php echo $_screenHolder;?>
            </div>
        </div>
        <?php $_helper->loadPanel('admin/footer');?>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.smooth-scroll.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootswatch.js"></script>
</body>
</html>