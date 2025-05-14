<h1>Welcome to Admin-Panel</h1>
<div class="auth">
    <form action="<?= app\core\Route::url('auth', 'signin')?>" method="post" class="form form-login">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Enter your login" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="pass" placeholder="Enter your password" required>
        <button type="submit" name="submit" value="signin">Signin</button>
    </form>
</div>