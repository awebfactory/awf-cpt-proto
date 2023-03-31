<?php
global $post;
$description = get_post_meta( $post->ID, 'description', true );
?>
<div  <?php echo get_block_wrapper_attributes(); ?>>
  <p><?php echo $description; ?></p>
</div>
