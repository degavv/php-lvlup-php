<div class="wrapper-dashboard">
    <div class="create-article">
        <a href="<?= app\core\Route::url('index'); ?>" class="button edit">Back</a>
    </div>
    <div class="create-article">
        <h2>Create new user</h2>
    </div>
    <form action="<?= app\core\Route::url('index', 'save') ?>" method="post" class="form article-create-form">
        <label for="login">Login</label>
        <input type="text" name="login" required autofocus placeholder="Enter the user's login" id="login" value="<?php ?>">
        <label for="password">Password</label>
        <input type="password" name="password" required placeholder="Enter the user's password" id="password" value="">
        <label for="email">Email</label>
        <input type="text" name="email" required placeholder="Enter the user's email" id="email" value="">
        <input type="submit">
    </form>
    <h2><?php $error ?></h2>
</div>