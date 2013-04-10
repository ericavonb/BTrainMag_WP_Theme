<!-- source: the_header.php -->


<?php if (is_front_page()) { ?>
<header class="clearfix">
  <div class="menu_left menu_container">					
    <h1 id="logo">
      <a href="<?php echo home_url(); ?>" class="textlogo"><?php echo bloginfo('name'); ?></a>
    </h1>
  </div><!-- menu_left -->
  <div class="menu_right menu_container">					
    <?php wp_nav_menu( array( 'menu_class' => 'sf-menu', 'theme_location' => 'primary', 'fallback_cb' => 'btm_menu_fallback','container_class' => 'menu-main-menu-container clearfix' ) ); ?>
    <?php echo btm_social(); ?>
    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FBTrainMag&amp;send=false&amp;layout=standard&amp;width=200&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:35px;" allowTransparency="true"></iframe>
  </div><!-- menu_right -->	
</header><!--//header-->
<?php } else { ?>
<header class="clearfix">
  <div class="heading clearfix">
    <div class="menu_left menu_container">					
      <h1 id="logo">
	<a href="<?php echo home_url(); ?>" class="textlogo"><?php echo bloginfo('name'); ?></a>
      </h1>
    </div><!-- menu_left -->
    <div class="menu_right menu_container">					
      <?php wp_nav_menu( array( 'menu_class' => 'sf-menu', 'theme_location' => 'primary', 'fallback_cb' => 'btm_menu_fallback','container_class' => 'menu-main-menu-container clearfix' ) ); ?>
      <?php echo btm_social(); ?>
    </div><!-- menu_right -->
    </div><!-- heading -->
  <?php if (is_archive()): ?>
  <div class="category-name">
    <h1><?php echo single_term_title(); ?></h1>
  </div>
  <? endif; ?>
</header><!--//header-->
<?php }; ?> 
