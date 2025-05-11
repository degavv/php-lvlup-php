<h2>All articles</h2>
<?php foreach ($articles as $i => $article): ?>
    <a href="<?=$i?>"><?=$article['title']?></a>
<?php endforeach; ?>