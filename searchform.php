<form role="search" method="get" class="navbar-form navbar-left" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
        <input type="text" " placeholder="Search">
        <input type="text" class="form-control" name="s" id="s" value="<?php echo (isset($_GET['s']) ? $_GET['s'] : ''); ?>" placeholder="Search" />
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
