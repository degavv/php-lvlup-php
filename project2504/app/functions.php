<?php
/**
 * Summary of view
 * @param string $page
 * @param array $params isAuth : bool,
 * @param string $layout
 * @return void
 */
function view(string $page, array $params = [], string $layout = "default"): void
{
    extract($params);
    include_once 'app/views/layouts/' . $layout . '.php';
}
function isAuth(): bool
{
    return false;
}

function redirect(string $url = '/index.php'): never
{
    header('Location: ' . $url);
    exit();
}

function getUserByLogin(string $login): array|null
{
    $handle = fopen(PATH_TO_CRED, 'r');
    $credentials = ['login', 'pass'];
    $findedUser = null;
    while (!feof($handle)) {
        $user = fgetcsv($handle);
        if ($user[0] === $login) {
            $findedUser = array_combine($credentials, $user);
            break;
        }
    }
    fclose($handle);
    return $findedUser;
}

// function login(): string
// {
//     $login = filter_input(INPUT_POST, 'login');
//     // $login = $login ? htmlspecialchars($login, ENT_QUOTES, 'UTF-8') : null;
//     $pass = filter_input(INPUT_POST, 'pass');
//     $user = getUserByLogin($login);
//     $errorMsg = null;
//     if (!$user) {
//         $errorMsg = 'Невірний логін чи пароль';
//     } else {
//         if (!password_verify($pass, $user['pass'])) {
//             $errorMsg = 'Невірний логін чи пароль';
//         }  
//     }
//     setcookie('error_msg', $errorMsg, time()+60*60*5);
//     // redirect();
//     header('Location: index.php');
//     exit();
// }

function login(): void
{
    session_start();
    $login = filter_input(INPUT_POST, 'login');
    $pass = filter_input(INPUT_POST, 'pass');
    $user = getUserByLogin($login);

    //Помилка автентифікації
    if (!$user || !password_verify($pass, $user['pass'])) {
        $_SESSION['error_msg'] = 'Невірний логін чи пароль';
        redirect();
    }

    // Успішний вхід — зберігаємо сесію
    $_SESSION['login'] = $login;
    unset($_SESSION['error_msg']);

    header('Location: index.php');
    redirect();
}

function logout(string $url = 'index.php'): void
{
    session_start();
    $_SESSION = [];
    $cookieParams = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600,
        $cookieParams["path"], $cookieParams["domain"],
        $cookieParams["secure"], $cookieParams["httponly"]
    );
    session_destroy();
    redirect();
}



//Registration

function getRegCredentials(): array
{
    $login = filter_input(INPUT_POST, 'login_reg');
    $pass = filter_input(INPUT_POST, 'pass_reg');
    $passRepeat = filter_input(INPUT_POST, 'repeat_pass_reg');
    return [
        'login' => $login,
        'pass' => $pass,
        'pass_repeat' => $passRepeat,
    ];
}

function validateRegCredentials($credentials): array
{
    //TODO errors
    session_start();
    $errors = [];

    foreach ($credentials as $value) {
        if (empty($value)) {
            $_SESSION['error_msg'] = 'Невірний логін чи пароль';
            redirect('registration.php');
        }
    }
    extract($credentials);

    // Перевірка відповідності повтору пароля
    if ($pass !== $pass_repeat){
        $errors[] = 'Введені паролі не співпадають';
    }
    // Перевірка логіна
    if (strlen($login) < 3 || strlen($login) > 50) {
        $errors[] = 'Логін має бути від 3 до 50 символів.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $login)) {
        $errors[] = 'Логін може містити тільки літери, цифри та підкреслення.';
    }

    // Перевірка пароля
    if (strlen($pass) < 6) {
        $errors[] = 'Пароль має бути не коротший за 6 символів.';
    }
    var_dump($errors);
    return $errors;
}

function saveCredentials($validatedCredentials): bool
{
    $login = $validatedCredentials['login'];
    $pass = $validatedCredentials['pass'];
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $credentials = [$login, $passHash];
    $handle = fopen(PATH_TO_CRED, 'a');
    if ($handle) {
        fputcsv($handle, $credentials);
        fclose($handle);
        return true;
    } else {
        return false;
    }
    // var_dump(password_hash($pass, PASSWORD_DEFAULT));
}

// function createSession(string $login)
// {
//     session_start();
//     $_SESSION['login'] = $login;
// }

function getSessionValue (string $value)
{
    session_start();
    $value = $_SESSION[$value];
    if (!empty($value)){
        return htmlspecialchars($value);
    } else {
        return null;
    }
}
