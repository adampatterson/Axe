<section class="block-<?= $layout ?> bg-cover bg-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-6">
                <?php if (_get($block, 'image', false)): ?>
                    <img src="<?= _get($block, 'image.sizes.medium_large') ?>"
                         alt="<?= _get($block, 'image.alt') ?>"
                        class="img-fluid"
                    >
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
