<article>
    <header>
        <h2><?= $article_title ?></h2>
    </header>
    <p>
        <?= $article_content ?>
    </p>
</article>
<div class="comments-block">
    <?php if(empty($comments)): echo "No comments yet";?>
    <?php else: ?>
        <?php foreach ($comments as $item): ?>
            <div class="comment">
                <p class="comment-name"><?= $item['name'] ?></p>
                <p><?= $item['comment'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif;?>
</div>
<?php include_once 'app/views/common/comment_form.php'; ?>