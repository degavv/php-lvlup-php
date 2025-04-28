<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page-wrapper">
        <header>
            <div class="logo">
                <a href="index.php">UkrBlog</a>
            </div>
            <?php if ($params['hide_login_form'] === false): ?>
            <?php include_once 'app/views/common/login.php' ?>
            <?php endif ?>
        </header>
        <main>
            <?php include_once 'app/views/pages/' . $page . '_page.php' ?>
        </main>
        <footer>
            <span>Vadym Dehtiarenko &copy;</span>
        </footer>
    </div>

</body>

</html>