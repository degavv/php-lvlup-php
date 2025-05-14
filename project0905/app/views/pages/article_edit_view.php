<h1>Edit an article</h1>
<form action="<?= app\core\Route::url('admin', 'update') ?>" method="post" class="form article-create-form">
    <input type="text" name="title" required autofocus placeholder="Type article title."
        value="<?= htmlspecialchars($title ?? '') ?>">
    <textarea name="content" required autofocus
        placeholder="Type your article here."><?= htmlspecialchars($content ?? '') ?></textarea>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit">
</form>