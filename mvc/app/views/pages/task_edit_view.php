<form action="<?= \app\core\Route::url('task', 'update')?>" method="post">
    <label>Task
        <input type="text" name="task" value="<?=$task?>" autofocus required/>
        <input type="hidden" name="id" value="<?=$id?>">
    </label>
    <input type="submit" value="Edit">
</form>
<a href="<?= \app\core\Route::url('task') ?>" class="button">&lArr; Back</a>