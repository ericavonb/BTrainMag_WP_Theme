<?php
   /**
   * The template for displaying Comments.
   */
   ?>
<div id="comments">
  <?php if ( post_password_required() ) : ?>
  <p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'btm' ); ?></p>
  <?php
     /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
     return;
     endif;
     ?>

  <?php
     // You can start editing here -- including this comment!
     ?>

  <?php if ( have_comments() ) : ?>


  <div id="comments-title">
    <h1 id="comments-label">Comments</h1>
    <h2 id="comments-number">
      <?php
	 printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'btm' ),
	 number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
	 ?>
    </h2>
  </div>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation clearfix">
      <div class="nav-previous left"><?php previous_comments_link( __( '&lt;&nbsp;&nbsp;Older Comments', 'btm' ) ); ?>
      </div>
      <div class="nav-next right"><?php next_comments_link( __( 'Newer Comments&nbsp;&nbsp;&gt;', 'btm' ) ); ?>
      </div>
    </div>
    <?php endif; // check for comment navigation ?>

    <ul id="commentlist">
      <?php
	 /* Loop through and list the comments, see btm_comment() for formatting options. */
       wp_list_comments( array( 'callback' => 'btm_comment', 'avatar_size' => 0, 'reply_text' => '<img src="'. get_template_directory_uri() . '/images/icons/leftturnarrow32.png" class="icon left-turn-arrow" width="15px" height="15px"><h6>Reply</h6>') );
      ?>
    </ul>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation clearfix">
      <div class="nav-previous left"><?php previous_comments_link( __( '&lt;&nbsp;&nbsp;Older Comments', 'btm' ) ); ?></div>
      <div class="nav-next right"><?php next_comments_link( __( 'Newer Comments&nbsp;&nbsp;&gt;', 'btm' ) ); ?></div>
    </div>
    <?php endif; // check for comment navigation ?>

    <?php else : // or, if we don't have comments:
	  if ( ! comments_open() ) :
	  ?>
    <p class="hidden"><?php _e( 'Comments are closed.', 'btm' ); ?></p>
    <?php endif; // end ! comments_open() ?>

    <?php endif; // end have_comments() ?>

    <?php comment_form(); ?>

  </div><!-- //comments -->
