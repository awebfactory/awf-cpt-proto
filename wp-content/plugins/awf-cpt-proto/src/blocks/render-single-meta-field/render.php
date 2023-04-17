<?php
  $post = $GLOBALS['post'];
?>
<span <?php echo get_block_wrapper_attributes(); ?>>
  <?php 
	  global $post;
		$the_meta = get_post_meta($post->ID);
		$selected_field_key = $attributes['selectedPostField'];
		$field_value = $the_meta[$selected_field_key];
		echo  $field_value[0] ; 
		/*
		echo '<h3>' . 'Attributes: ' . '</h3>'; 
		echo '<pre>' . var_export($attributes, true) . '</pre>';
		echo '<h3>' . 'Attributes selected field: ' . '</h3>'; 
		echo '<h3>' . 'Post ID: ' . '</h3>'; 
		echo '<pre>' . $post->ID . '</pre>';
		echo '<h3>' . 'Post Object: ' . '</h3>'; 
		echo '<pre>' . var_export($post, true) . '</pre>';
		echo '<h3>' . 'Post Meta Object: ' . '</h3>'; 
		echo '<pre>' . var_export($the_meta, true) . '</pre>';
	  */
	?>
</span>
