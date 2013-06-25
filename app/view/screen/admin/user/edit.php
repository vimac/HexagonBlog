<?php
$_helper->addJS('/js/jquery.markitup.js');
$_helper->addJS('/js/markitup-md-set.js');
$_helper->addCSS('/css/markitup-markdown.css');
$_helper->addCSS('/css/markitup.css');
?>

<?php $_helper->formOpen('/admin/post/commit', 'POST', ['class' => 'form-horizontal']);?>
    <input type="hidden" name="pid" value="<?php echo $post['pid'];?>" />
    <input type="hidden" name="type" value="<?php echo $type;?>" />
    <div class="control-group">
        <label class="control-label" for="title" name="title">Title</label>
        <div class="controls controls-row">
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $post['title'];?>" class="span9"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="markdown">Content</label>
        <div class="controls">
            <textarea id="markdown" name="content" placeholder="Content"><?php echo $post['content'];?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tag">Tag</label>
        <div class="controls">
            <input type="text" id="tag" placeholder="Tag, seprated by comma" name="tag" class="span9" value="<?php echo $tag;?>" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="status">Status</label>
        <div class="controls">
            <select id="status" name="status">
                <option value="0" <?php echo $post['status'] == 0 ? 'selected' : '';?>>Publish</option>
                <option value="1" <?php echo $post['status'] == 1 ? 'selected' : '';?>>Private</option>
                <option value="99" <?php echo $post['status'] == 99 ? 'selected' : '';?>>Draft</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="order">Order</label>
        <div class="controls">
            <input type="text" id="order" name="order" placeholder="Order, leave empty for auto" value="<?php echo $post['order'];?>" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-large btn-primary">Commit</button>
        </div>
    </div>
<?php $_helper->formClose();?>