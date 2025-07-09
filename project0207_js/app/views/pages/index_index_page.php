<section class="gallery flex">
    <div class="prev-button button"></div>
    <div class="next-button button"></div>
    <div class="img-container flex">
        <?php foreach ($photos as $photo): ?>
            <img class="gallery-image" src="<?= PHOTO_UPLOAD_DIR . $photo ?>" alt="<?= $photo ?>">
        <?php endforeach; ?>
    </div>
</section>
<form method="post" enctype="multipart/form-data" class="form-upload flex">
    <label for="images">Вибрати файл: </label>
    <input type="file" name="image" id="images">
    <input type="submit" value="Завантажити">
</form>