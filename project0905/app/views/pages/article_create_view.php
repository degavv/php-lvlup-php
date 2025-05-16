<div class="wrapper-dashboard">
    <div class="create-article">
        <a href="<?= app\core\Route::url('admin'); ?>" class="button edit">Back</a>
    </div>
    <div class="create-article">
        <h2>Create new article</h2>
    </div>
    <form action="<?= app\core\Route::url('admin', 'save') ?>" method="post" class="form article-create-form">
        <label for="article-title">Title</label>
        <input type="text" name="title" required autofocus placeholder="Type article title." id="article-title">
        <label for="article-text">Text</label>
        <textarea name="content" required autofocus placeholder="Type your article here." id="article-text"></textarea>
        <input type="submit">
    </form>
</div>