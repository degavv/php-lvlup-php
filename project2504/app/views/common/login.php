<div class="login-error">
    <?php if($error_msg !== null): ?>
    <?=$error_msg; ?>
    <?php unset($_SESSION['error_msg']); ?>
    <?php endif ?>
</div>
<div class="auth">
    <form action="login.php" method="post" class="form-login">
        <div>
            <input type="text" name="login" placeholder="Введіть логін" required>
            <input type="password" name="pass" placeholder="Введіть пароль" required>
        </div>
        <button type="submit" name="submit" value="signin"><img src="/img/login.png" alt="Вхід" class="login-img"></button>
    </form>
    <a href="registration.php">Реєстрація</a>
</div>