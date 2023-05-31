<form class="d-flex" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo (isset($_GET['s']) ? $_GET['s'] : ''); ?>" >
    <button class="btn btn-outline-primary" type="submit">Search</button>
</form>
