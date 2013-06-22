<?php 
use HexagonBlog\app\widget\Tag;
?>
<!DOCTYPE html>
<html>
<head>
    <?php $_helper->loadPanel('head');?>
    <title><?php echo $_blogTitle;?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php $_helper->loadPanel('nav');?>
            </div>
        </div>
        <div class="row">
            <div class="posts span9">
                <?php echo $_screenHolder;?>
            </div>
            <div class="sidebar span3">
                <?php Tag::load();?>
            </div>
        </div>
        <footer id="footer">
            <p class="pull-right"><a href="#top">Back to top</a></p>
            <div class="links">
                <a href="/admin/login">Admin</a>
            </div>
            Made by <a href="http://vifix.cn" target="_blank">Mac Chow</a>,
            Based on <a href="https://github.com/vimac/HexagonFramework" target="_blank">Hexagon Framework</a>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.smooth-scroll.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootswatch.js"></script>
</body>
</html>