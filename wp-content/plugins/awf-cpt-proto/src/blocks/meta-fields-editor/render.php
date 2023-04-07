<?php
global $post;
$awebfactory_project_short_name = get_post_meta( $post->ID, 'awebfactory_project_short_name', true );
$awebfactory_project_description = get_post_meta( $post->ID, 'awebfactory_project_description', true );
$awebfactory_project_start_date = get_post_meta( $post->ID, 'awebfactory_project_start_date', true );
$awebfactory_project_completion_date = get_post_meta( $post->ID, 'awebfactory_project_completion_date', true );
?>
<div  <?php echo get_block_wrapper_attributes(); ?>>
  <p><?php echo "short_name: ", $awebfactory_project_short_name; ?></p>
  <p><?php echo "description: ", $awebfactory_project_description; ?></p>
  <p><?php echo "start_date: ", $awebfactory_project_start_date; ?></p>
  <p><?php echo "completion_date: ", $awebfactory_project_completion_date; ?></p>
</div>
