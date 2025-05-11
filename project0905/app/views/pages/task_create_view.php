<form action="<?= \app\core\Route::url('task', 'store')?>" method="post">
    <label>Task
        <input type="text" name="task" autofocus required/>
    </label>
    <input type="submit" value="Create">
</form>