<h1>All articles</h1>
<?php foreach ($articles as $i => $article): ?>
    <div><a href="<?= app\core\Route::url(action: 'read', params:['id' => $i]);?>"><?=$article['title']?></a></div>
<?php endforeach; ?>