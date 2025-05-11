<a href="<?= \app\core\Route::url('task', 'create') ?>">New task</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Task</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $id => $task): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $task ?></td>
                <td><a href="<?= \app\core\Route::url('task', 'edit') . '&id=' . $id ?>"><img src="app/img/icons8-edit.svg"
                            alt="pencil"></a></td>
                <td><a href="<?= \app\core\Route::url('task', 'delete') . '&id=' . $id ?>"><img src="app/img/icons8-trash.svg" alt="trash"></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>