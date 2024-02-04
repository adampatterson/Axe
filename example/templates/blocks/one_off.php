<section class="block-<?= $layout ?> bg-cover bg-center">
    <div class="<?= _get($block, 'is_transparent', true) ? "bg-trans" : " bg-main" ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center py-6">
                    <?php if (_get($block, 'title', false)): ?>
                        <h2><?= _get($block, 'title') ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
