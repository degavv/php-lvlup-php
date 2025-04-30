<div class="create-article">
    <h1>Створення статті</h1>
    <form action="create-article-proc.php" method="post">
        <label for="title">Назва</label>
        <input type="text" id="title" name="article_title" required placeholder="Введіть назву статті">
        <label for="content">Текст</label>
        <textarea id="content" name="article_content" rows="10" cols="50" required placeholder="Введіть текст статті"></textarea>
        <button type="submit">Зберегти статтю</button>
    </form>
</div>