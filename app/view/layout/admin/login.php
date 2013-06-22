<!DOCTYPE html>
<html>
<head>
    <?php $_helper->loadPanel('head');?>
    <title><?php echo $_blogTitle;?></title>
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