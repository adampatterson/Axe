<?php if (is_user_logged_in() and isset($data)): ?>
    <script>
        console.log(<?= json_encode($data) ?>)
    </script>
<?php endif; ?>
