
<?php if (  $wp_query->max_num_pages > 1 ) : ?>        
	<div class="post-pagination clearfix">
	  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
	  
	  <?php
	  if (get_query_var('cat')){
	    get_query_var('cat');
	  } else {
	    preg_match('@/([^/]+)/@i',$_SERVER["REQUEST_URI"], $matches);
        $cat = get_cat_ID($matches[1]);
        }; ?>
	  
	  <div class="page_nav_left">
	  <!-- <?php echo $_SERVER["REQUEST_URI"]; ?> -->
	  <?php if ($paged > 1): ?>
	      <a href="<?php echo site_url().'?cat='.$cat.'&paged='.($paged - 1); ?>">Newer Posts</a>
    <?php endif; ?>
    </div>
	  <div class="page_nav_right">
	  <?php if ($paged < $wp_query->max_num_pages): ?>
	      <a href="<?php echo site_url().'?cat='.$cat.'&paged='.($paged + 1); ?>">Older Posts</a>
    <?php endif; ?>
    </div>
	</div><!--//post-navigaiton-->
<?php endif; ?>

<script type='text/javascript'>
function newUrl(cat, page){
     window.history.pushState({"pageTitle":document.pageTitle},"Page " + page, "/" + cat + "/page/" + page);
 }
 
//newUrl('<?php echo get_category($cat)->slug; ?>', <?php echo $paged; ?>);
</script>
