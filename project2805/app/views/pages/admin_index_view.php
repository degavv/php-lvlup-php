<div class="wrapper-dashboard">
    <div class="create-article">
        <a href="<?= app\core\Route::url('index', 'create'); ?>" class="button edit">Create new user</a>
    </div>
    <table class="dashboard">
        <thead>
            <tr>
                <th>id</th>
                <th>user</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr style="table-row">
                    <td><?= $index+1 ?></td>
                    <td class="title"><?= $user['login'] ?></td>
                    <td>
                        <a href="<?= app\core\Route::url('index', 'delete', ['id' => $user['id']]); ?> "
                            class="button delete">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>