<section class="block-<?= $layout ?> bg-cover bg-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-6">
                <?php if (_get($block, 'title', false)): ?>
                    <h2><?= _get($block, 'title') ?></h2>
                <?php endif; ?>
                <?php if (_get($block, 'content', false)): ?>
                    <?= _get($block, 'content') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
