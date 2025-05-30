<div class="wrapper-dashboard">
    <div class="create-article">
        <a href="<?= app\core\Route::url('admin'); ?>" class="button edit">Back</a>
    </div>
    <div class="create-article">
        <h2>Edit article</h2>
    </div>
    <form action="<?= app\core\Route::url('admin', 'update') ?>" method="post" class="form article-create-form">
        <label for="article-title">Title</label>
        <input type="text" name="title" required autofocus placeholder="Type article title."
            value="<?= htmlspecialchars($title ?? '') ?>" id="article-title">
    <label for="article-text">Text</label>    
        
            <textarea name="content" required autofocus
            placeholder="Type your article here." id="article-text"><?= htmlspecialchars($content ?? '') ?></textarea>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit">
    </form>
</div>