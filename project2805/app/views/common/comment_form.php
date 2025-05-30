<form action="<?=app\core\Route::url('index', 'comment') ?>" method="post" class="form comment-form">
    <label for="name">Your name</label>
    <input type="text" name="name" id="name" required placeholder="Type your name here.">

    <label for="comment">Your comment</label>
    <textarea name="comment" id="comment" required placeholder="Type your comment here."></textarea>
    <input type="hidden" name="id" value="<?=$id?>">
    <button type="submit" class="button">Send</button>
</form>