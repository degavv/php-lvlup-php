<div class="registration">
    <h1>Реєстрація</h1>
    <form action="registration_proc.php" method="post" class="reg-form">
        <label for="login">Логін</label>
        <input type="text" id="login" name="login_reg" placeholder="Введіть логін" required>
        <label for="password">Пароль</label>
        <input type="password" id="password" name="pass_reg" placeholder="Введіть пароль" required>
        <label for="repeat-password">Підтвердження пароля</label>
        <input type="password" id="repeat-password" name="repeat_pass_reg" placeholder="Повторіть пароль" required>
        <button type="submit">Зареєструватися</button>
    </form>
</div>
<div class="errors">
    <?= $error_msg?>
</div>