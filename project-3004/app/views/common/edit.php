<tr>
    <td class="table-center"><?= $i + 1 ?></td>
    <td class="note">
        <form action="/" method="post" autocomplete="off">
            <!-- Повертаємо значення $note для редагування або невалідне значення $unvalid_note в поле введення -->
            <?php $value = $unvalid_note ? $unvalid_note : $note; ?>
            <input type="text" name="edit_note" value="<?= htmlspecialchars($value) ?>" class="edit-note" autofocus>
            <input type="hidden" name="id" value="<?= $i ?>">
        </form>
    </td>
    <td class="table-center"><a href="<?= 'index.php?action=delete&id=' . $i ?>"><img src="img/icons8-trash.svg"
                alt="trash"></a></td>
    <td class="table-center"><a href="index.php"><img src="img/icons8-cancel.svg" alt="cancel"></td>
</tr>