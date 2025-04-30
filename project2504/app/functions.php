<?php
/**
 * Summary of view
 * @param string $page
 * @param array $params [is_auth : bool, user_name : string, error_msg : string]
 * @param string $layout
 * @return void
 */
function view(string $page, array $params = [], string $layout = "default"): void
{
    extract($params);
    include_once 'app/views/layouts/' . $layout . '.php';
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
    // header('Location: index.php');
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



function validateRegCredentials($credentials): bool
{
    //TODO Змінити на чисту валідацію
    session_start();
    foreach ($credentials as $value) {
        if (empty($value)) {
            $_SESSION['error_msg'] = 'Невірний логін чи пароль';
            redirect('registration.php');
        }
    }

    extract($credentials);
    // Перевірка відповідності повтору пароля
    if ($pass !== $pass_repeat){
        $_SESSION['error_msg'] = 'Введені паролі не співпадають';
        redirect('registration.php');
    }
    // Перевірка логіна
    if (strlen($login) < 3 || strlen($login) > 50) {
        $_SESSION['error_msg'] = 'Логін має бути від 3 до 50 символів.';
        redirect('registration.php');
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $login)) {
        $_SESSION['error_msg'] = 'Логін може містити тільки літери, цифри та підкреслення.';
        redirect('registration.php');
    }
    // Перевірка пароля
    if (strlen($pass) < 6) {
        $_SESSION['error_msg'] = 'Пароль має бути не коротший за 6 символів.';
        redirect('registration.php');
    }
    return true;
}

/**
 * Saves access attributes to a csv file. On success, returns the login.
 * On failure, returns null
 * @param mixed $validatedCredentials
 */
function saveCredentials($validatedCredentials): ?string
{
    $login = $validatedCredentials['login'];
    $pass = $validatedCredentials['pass'];
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $credentials = [$login, $passHash];
    $handle = fopen(PATH_TO_CRED, 'a');
    if ($handle) {
        fputcsv($handle, $credentials);
        fclose($handle);
        return $login;
    } else {
        return null;
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
//TODO
/**
 * Writes data received from the associative array to the session
 * $array['key' => 'value]
 * @param array $array
 * @return void
 */
function writeSession (array $array): void
{
}

function checkPost():bool
{
    if(($_SERVER['REQUEST_METHOD'] == 'POST') || (!empty($_POST))){
        return true;
    }
    return false;
}

function saveErrorsToSession(array $errors): void
{
    session_start();
    $_SESSION['errors_list'] = $errors;
}

//ARTICLE
function validateArticle($title, $content): array
{
    $errors = [];
    if (empty($title) || empty($content)) {
        $errors[] = 'Заголовок і текст не можуть бути порожніми';
        // $_SESSION['error_msg'] = 'Сталась помилка при реєстрації. Спробуйте ще раз';
        // redirect('create-article.php');
    } elseif (strlen($title) < 3 || strlen($title) > 50){
        $errors[] = 'Довжина назви статті має бути від 3 до 100 символів';
    }
    return $errors;
}

function sanitizeContent (string $rawData):string
{
    return htmlspecialchars($rawData, ENT_QUOTES, 'UTF-8');
}

function saveArticle ($title, $content)
{
    $title = trim($title);
    $content = trim($content);
    $filename = PATH_TO_ARTICLES . time() . '.txt';
    $articleData = $title . "\n" . $content;
    if (!is_dir(PATH_TO_ARTICLES)) {
        mkdir(PATH_TO_ARTICLES, 0777, true);
    }
    return file_put_contents($filename, $articleData);
}

function getArtirclesFromFiles (string $dirPath)
{
    if (!is_dir($dirPath)) {
        // echo "Немає збережених статей.";
        // exit;
    }
    $files = glob($dirPath . '/*.txt');
    if (!$files) {
        // echo "Немає збережених статей.";
        // exit;
    }
    foreach ($files as $file) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        if (count($lines) >= 2) {
            $title = $lines[0];
            $content = implode("\n", array_slice($lines, 1));
            echo "<hr>";
            echo "<h2>" . $title . "</h2>";
            echo "<p>" . nl2br($content) . "</p>";
        }
    }
}