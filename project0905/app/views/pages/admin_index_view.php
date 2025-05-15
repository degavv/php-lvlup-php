<div>
    <h1>Welcome to Admin-Panel</h1>
    <a href="<?=app\core\Route::url('auth', 'logout')?>">LOGOUT</a>
</div>
<a href="<?=app\core\Route::url('admin', 'create');?>" class="button">Create new</a>
<table class="dashboard">
    <thead>
        <tr>
            <th>id</th>
            <th>article</th>
            <th colspan="4">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['id'] ?></td>
                <td><?= $article['title'] ?></td>
                <td><a href="<?= app\core\Route::url('admin', 'edit', ['id' => $article['id']]);?>">edit</a></td>
                <td><a href="<?= app\core\Route::url('admin', 'delete', ['id' => $article['id']]);?>">delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>