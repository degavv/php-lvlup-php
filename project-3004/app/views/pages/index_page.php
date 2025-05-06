<main>
    <h1>Мої нотатки</h1>
    <!-- Виводимо всі помилки валідації з масиву $valid_errors -->
    <div class="valid-errors">
        <?php if (isset($valid_errors)): ?>

            <?php foreach ($valid_errors as $error): ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <form action="/" method="post" autocomplete="off">
        <!-- Повертаємо невалідне значення $unvalid_note в поле введення якщо $edit_id не задано -->
        <input type="text" name="note" placeholder="Введіть текст" maxlength="160" required <?php if (!is_int($edit_id))
            echo 'autofocus'; ?> <?php if (isset($unvalid_note) && (!is_int($edit_id)))
                   echo ' value="' . htmlspecialchars($unvalid_note) . '"'; ?>>
        <button type="submit">Додати нотатку</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Нотатка</th>
                <th>Видалити</th>
                <th>Редагувати</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notes as $i => $note): ?>
                <?php if ($edit_id !== $i): ?>
                    <tr>
                        <td class="table-center"><?= $i + 1 ?></td>
                        <td class="note"><?= htmlspecialchars($note) ?></td>
                        <td class="table-center"><a href="<?= 'index.php?action=delete&id=' . $i ?>"><img
                                    src="img/icons8-trash.svg" alt="trash"></a></td>
                        <td class="table-center"><a href="<?= 'index.php?action=edit&id=' . $i ?>"><img
                                    src="img/icons8-edit.svg" alt="pencil"></td>
                    </tr>
                <?php else: ?>
                    <?php include_once 'app/views/common/edit.php' ?>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
</main>