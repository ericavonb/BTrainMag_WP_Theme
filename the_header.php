<!-- source: the_header.php -->

<header class="clearfix">
		<div class="menu_left menu_container">					
			<h1 id="logo">
			  <a href="<?php echo home_url(); ?>" class="textlogo"><?php echo bloginfo('name'); ?></a>
			</h1>
		</div><!-- menu_left -->
		<div class="menu_right menu_container">					
			<?php wp_nav_menu( array( 'menu_class' => 'sf-menu clearfix', 'theme_location' => 'primary', 'fallback_cb' => 'btm_menu_fallback' ) ); ?>
			<?php echo btm_social(); ?>
		</div><!-- menu_right -->	
		<?php if (is_archive()): ?>
		  <div class="category-name">
		    <h1><?php echo single_term_title(); ?></h1>
		  </div>
		<? endif; ?>
</header><!--//header-->