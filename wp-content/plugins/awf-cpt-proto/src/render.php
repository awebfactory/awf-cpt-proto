<?php
global $post;
$awebfactory_project_description = get_post_meta( $post->ID, 'awebfactory_project_description', true );
?>
<div  <?php echo get_block_wrapper_attributes(); ?>>
  <p><?php echo $awebfactory_project_description; ?></p>
</div>
