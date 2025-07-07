<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? SITE_NAME ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="page flex">
        <main class="flex">
            <?php include_once $this->getViewPath($viewName);?>
        </main>
    </div>
    <script src="js/main.js"></script>
</body>

</html>