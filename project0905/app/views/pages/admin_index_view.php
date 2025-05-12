<h1>Welcome to Admin-Panel</h1>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>article</th>
            <th colspan="4">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $i => $article): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $article['title'] ?></td>
                <td><a href="">update</a></td>
                <td><a href="">delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>