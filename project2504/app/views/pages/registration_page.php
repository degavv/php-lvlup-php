<div class="registration">
    <h1>Реєстрація</h1>
    <form action="<?php if($is) ?>" method="post" class="reg-form">
        <label for="login">Логін</label>
        <input type="text" id="login" name="login_reg" placeholder="Введіть логін">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="pass_reg" placeholder="Введіть пароль">
        <label for="repeat-password">Підтвердження пароля</label>
        <input type="password" id="repeat-password" name="repeat_pass_reg" placeholder="Повторіть пароль">
        <button type="submit">Зареєструватися</button>
    </form>
</div>
<!-- <div class="errors">
</div> -->