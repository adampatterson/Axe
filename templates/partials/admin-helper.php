<?php if (is_user_logged_in()):
    if (isset($data)): ?>
        <script>
            console.log(<?= json_encode($data) ?>)
        </script>
    <?php endif;

    if (isset($products)): ?>
        <script>
            console.log(<?= json_encode($products) ?>)
        </script>
    <?php endif;
endif; ?>
