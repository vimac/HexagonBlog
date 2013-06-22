<?php use Hexagon\Context;?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="/css/font-awesome.min.css" rel="stylesheet" />
<link href="/css/bootswatch.css" rel="stylesheet" />
<link href="/css/blog.css" rel="stylesheet" />
<?php foreach ($_helper->metacss as $css):?>
<link href="<?php echo $css;?>" rel="stylesheet" />
<?php endforeach;?>
<script type="text/javascript">
window._hexagonBlog = {};
_hexagonBlog['csrfTokenName'] = '<?php echo Context::$appConfig->csrfTokenName?>';
</script>