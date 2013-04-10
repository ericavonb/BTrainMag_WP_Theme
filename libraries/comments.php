<?php
  if ( ! function_exists( 'btm_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     */
    function btm_comment( $comment, $args, $depth ) {
      $GLOBALS['comment'] = $comment;
      $dateFormat = 'F j, Y \a\t g:ia';
      switch ( $comment->comment_type ) :
      case '' :
?>
<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>" class="clearfix">
    <div class='comment-meta-header'>
      <h5 class="commment-author"><?php echo get_comment_author_link() ?></h5>
      <div class="comment-date"><?php comment_date($dateFormat); ?></div>
    </div><!--//end comment-meta-header-->  
    <div class="comment-text">						
      <?php if ($comment->comment_approved == '0') : ?>
      <p class="moderated"><?php _e('Your comment is awaiting moderation.','btm'); ?></p><?php endif; ?>
      
      <?php comment_text() ?>
    </div><!--//end comment-text-->
    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    
    <?php
	break;
      case 'pingback'  :
      case 'trackback' :
    ?>
    <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
      <div id="comment-<?php comment_ID(); ?>" class="clearfix">
	<?php echo "<div class='author'><em>" . __('Trackback:','btm') . "</em> ".get_comment_author_link()."</div>"; ?>
        <?php echo strip_tags(substr(get_comment_text(),0, 110)) . "..."; ?>
        <?php comment_author_url_link('', '<small>', '</small>'); ?>
      </div>
      <?php
					      break;
      	endswitch;
    	}
	endif;
	
      ?>
