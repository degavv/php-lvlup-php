<section class="gallery flex">
    <div class="prev-button button"></div>
    <div class="next-button button"></div>
    <?php foreach ($photos as $photo):?>
        <img class="gallery-image" src="<?= PHOTO_UPLOAD_DIR . $photo?>" alt="<?= $photo?>">
    <?php endforeach;?>
</section>