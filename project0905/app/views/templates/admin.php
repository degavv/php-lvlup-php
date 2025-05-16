<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Panel</title>
    <link rel="stylesheet" href="app/css/admin.css">
</head>

<body>
    <div class="page-wrapper flex">
        <header>
            <nav class="flex">
                <h1>Welcome to Admin-Panel</h1>
                <a href="<?= app\core\Route::url('auth', 'logout') ?>">LOGOUT</a>
            </nav>
        </header>
        <main class="flex">
            <?php include_once $viewPath ?>
        </main>
    </div>
</body>

</html>