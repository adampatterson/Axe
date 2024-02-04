<?php if ( ! empty(get_the_content())): ?>
    <section class="block-gutenberg bg-main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 py-5">
                    <?= the_content() ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
