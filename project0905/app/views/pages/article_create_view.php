<h1>Create an article</h1>
<form action="<?= app\core\Route::url('admin', 'save') ?>" method="post" class="form article-create-form">
    <input type="text" name="title" required autofocus placeholder="Type article title.">
    <textarea name="content" required autofocus
        placeholder="Type your article here."></textarea>
    <input type="submit">
</form>