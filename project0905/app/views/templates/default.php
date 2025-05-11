<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= (isset($title) ? $title . ' | ' : '') . SITE_NAME ?></title>
        <link rel="stylesheet" href="app/css/style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="<?= \app\core\Route::url()?>">Home</a></li>
                <li><a href="<?= \app\core\Route::url('index', 'about')?>">About</a></li>
                <li><a href="<?= \app\core\Route::url('task')?>">Tasks</a></li>
            </ul>
        </nav>
        <h1><?= $title?></h1>
        <?php include_once $viewPath?>
        
    </body>
</html>