<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div>
        <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
        <input type="submit" form='searchform' class="submit" name="submit" id="searchsubmit" value="Search" />
        <label for='searchsubmit' class='submit-button' tabindex='0' role='button'><i class="fas fa-arrow-right"></i></label>
    </div>
</form>