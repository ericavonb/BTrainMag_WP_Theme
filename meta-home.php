<div class="entry-meta clearfix">
	<div class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
	<div class="byline">
	  <?php _e('by', 'btm'); ?>
    <?php the_author_posts_link(); ?>
  </div>
	<div class="comments">	
			<?php if( comments_open() && ! is_single() ) { ?>
			  <span class="post-comment-link">
			  <?php comments_popup_link( __( '0 Comments', 'btm' ), __( '1 Comment', 'btm' ), __( '% Comments', 'btm' ), null, '' ); ?>
			  </span><?php } ?>			
	</div>
</div><!--//entry-meta -->