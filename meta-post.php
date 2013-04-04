<div class="entry-meta clearfix">
	<div class="left">
			<div class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
			<div class="post-categories"><?php the_category(', '); ?></div>
			<div class="byline"><?php _e('by', 'btm'); ?> <?php the_author_posts_link(); ?></div>
		 <?php edit_post_link( __('edit','btm'), ''); ?>
	</div><!--//left-->
	<div class="right">
			<?php if ( get_the_tags() && is_single() ) { ?>
				<div class="post-categories"><?php the_tags(' '); ?></div>
			<?php } ?>	
			<?php if( comments_open() && ! is_single() ) { ?>
			  <div class="post-comment-link">
			  <?php comments_popup_link( __( '0 Comments', 'btm' ), __( '1 Comment', 'btm' ), __( '% Comments', 'btm' ), null, '' ); ?>
			  </div><?php } ?>			
	</div><!--//right-->
</div><!--//entry-meta -->