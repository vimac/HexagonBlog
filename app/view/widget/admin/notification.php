<?php if (!empty($_notification)):?>
<div id="notification" class="alert alert-<?php echo $_notificationType;?> span10">
    <a class="close">×</a>
    <strong><?php echo ucfirst($_notificationType);?></strong> <?php echo $_notification;?>
</div>
<?php endif;?>