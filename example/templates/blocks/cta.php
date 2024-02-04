<section class="block-<?= $layout ?> bg-dark">
    <div class="d-flex justify-content-center align-items-center py-5">
        <div class="d-block text-white text-center">
            <h2><?= _get($block, 'title') ?></h2>

            <?php if (_get($block, 'content')): ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <?= _get($block, 'content') ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (_get($block, 'button')): ?>
                <a href="<?= _get($block, 'button.url') ?>" class="btn btn-primary"
                   target="<?= _get($block, 'button.target', '') ?>"><?= _get($block, 'button.title'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>
