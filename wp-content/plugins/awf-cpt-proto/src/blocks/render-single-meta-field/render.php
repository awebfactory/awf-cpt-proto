<?php
  $post = $GLOBALS['post'];
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php esc_html_e( 'Render Single Meta Field – hola from a dynamic block on the front end!', 'render-single-meta-field' ); ?>
  <?php 
	  global $post;
		$the_meta = get_post_meta($post->ID);
		echo '<h3>' . 'Post ID: ' . '</h3>'; 
		echo '<pre>' . $post->ID . '</pre>';
		echo '<h3>' . 'Post Object: ' . '</h3>'; 
		echo '<pre>' . var_export($post, true) . '</pre>';
		echo '<h3>' . 'Post Meta Object: ' . '</h3>'; 
		echo '<pre>' . var_export($the_meta, true) . '</pre>';
	?>
</p>
