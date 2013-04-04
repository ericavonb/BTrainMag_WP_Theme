<!-- Source: dynamic-slideshow.php -->

<div class='slideshow'>

  <div id='left'>
      <button type='button' id='prev-slide' class="slideshow-button">
      </button>
  </div>
  
  <?php
    global $post;
    $tmp_post = $post;
    $args = array(
      'posts_per_page' => 5,
      'offset' => 0,
      'category' => $category,
      'suppress_filters' => false 
      );
    $args2 = array(
      'posts_per_page' => 5,
      'offset' => 0,
      'category' => $category,
      'meta_key' => 'featured',
      'suppress_filters' => false 
      );

      $featured_posts = get_posts($args);
      $i = 0; ?>  
      
  <div id='center'>
    <ul class='slides'>
  <?php foreach( $featured_posts as $post ) : setup_postdata($post); ?>
    <li class="slide slide-img" id="slide_<?php echo ++$i; ?>">
    	<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
        <a href="<?php the_permalink(); ?>" class="slideshow-image-container" style="background-image: url('<?php echo $src[0]; ?>');">
        </a>
      </li>
  
  <?php endforeach; ?>
  </ul>
  

  </div>
  <div id="right">
    <button type='button' id='next-slide' class="slideshow-button">
     </button>
  </div>
  
</div>
  <div id="below">
    <ul class='slide-nav'>
      <?php 
        $j = $i;
        while ($i > 0) : ?>
          <li class='slide-nav-item <?php if ($i == $j) echo 'selected' ?>' id="place_<?php echo $i-- ;?>">
            <button type='button' class='slide-nav-button'></button>
          </li>
      <?php endwhile; ?>
    </ul>
    <ul class="slideshow-about">
      <?php foreach( $featured_posts as $post ) : setup_postdata($post); ?>
        <li class="slide-info slide" id="slide_info_<?php echo ++$i; ?>">
              <h2><a id="slide_link_<?php echo $i;?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="entry-excerpt">
        				<?php the_excerpt( __( 'Read More...', 'btm' ) ); ?>
        			</div>
    			
          		<?php //get_template_part( 'meta', 'home' ); ?>
          </li>
      <?php endforeach; ?>
    </ul>
    

</div>


  
  
  <?php $post = $tmp_post; ?>