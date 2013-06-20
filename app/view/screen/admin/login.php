<?php $_helper->openForm('/admin/doLogin', 'POST', ['class' => 'form-signin']);?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <input name="email" type="text" class="input-block-level" placeholder="Email address" />
    <input name="password" type="password" class="input-block-level" placeholder="Password" />
    <label class="checkbox">
        <input type="checkbox" value="remember" />
        Remember me
    </label>
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
<?php $_helper->closeForm();?>