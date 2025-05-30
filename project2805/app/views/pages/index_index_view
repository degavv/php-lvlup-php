<h1>All articles</h1>
<?php foreach ($articles as $article): ?>
    <div class="article">
        <a href="<?= app\core\Route::url(action: 'read', params:['id' => $article['id']]);?>"><?=$article['title']?></a>
        <span class="publish">publication date: <?=date('d-m-Y H:i:s', $article['date']);?></span>
    </div>
<?php endforeach; ?>