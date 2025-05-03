<main>
    <h1>Мої нотатки</h1>
    <form action="/" method="post">
        <input type="text" name="note" placeholder="Введіть текст" required maxlength="160">
        <button type="submit">Додати нотатку</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Нотатка</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $i => $note): ?>
                <tr>
                    <td class="table-number"><?= $i + 1 ?></td>
                    <td><?= $note ?></td>
                    <td><a href="<?='index.php?action=delete&id='.$i?>"><img src="img/icons8-trash.svg" alt="trash"></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>