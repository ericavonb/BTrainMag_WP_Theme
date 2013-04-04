<!-- Source: searchform.php -->
<form action="<?php echo home_url( '/' ); ?>" method="get" class="clearfix" id="searchform">
	<input type="text" name="s" id="s" size="15" value="<?php echo get_search_query(); ?>">
	<input type="submit" title="Search the site" id="searchsubmit" value="<?php _e("GO","btm"); ?>">
</form>