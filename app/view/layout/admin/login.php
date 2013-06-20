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
        <?php echo $_screenHolder;?>
        <?php $_helper->loadPanel('admin/footer');?>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.smooth-scroll.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootswatch.js"></script>
</body>
</html>