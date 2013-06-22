<?php
$_helper->addJS('/js/jquery.markitup.js');
$_helper->addJS('/js/markitup-md-set.js');
$_helper->addCSS('/css/markitup-markdown.css');
$_helper->addCSS('/css/markitup.css');
?>

<?php $_helper->formOpen('/admin/post/commit', 'POST', ['class' => 'form-horizontal']);?>
    <div class="control-group">
        <label class="control-label" for="title" name="title">Title</label>
        <div class="controls">
            <input type="text" id="title" placeholder="Title" class="input-block-level" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="markdown">Content</label>
        <div class="controls">
            <textarea id="markdown" name="content" placeholder="Content"></textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tag">Tag</label>
        <div class="controls">
            <input type="text" id="tag" placeholder="Tag, seprated by comma" name="tag" class="input-block-level" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-large btn-primary">Commit</button>
        </div>
    </div>
<?php $_helper->formClose();?>