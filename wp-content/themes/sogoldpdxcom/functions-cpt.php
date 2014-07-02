<?php
add_action('init', 'event_gallery_init');
function event_gallery_init() {
  $labels = array(
   'name' => 'Event Galleries',
   'singular_name' => 'Event Gallery',
   'add_new' => 'Add New',
   'add_new_item' => __('Add New Event Gallery'),
   'edit_item' => __('Edit Event Gallery'),
   'new_item' => __('New Event Gallery'),
   'view_item' => __('View Event Gallery'),
   'search_items' => __('Search Event Galleries'),
   'not_found' =>  __('No event galleries found'),
   'not_found_in_trash' => __('No event galleries found in Trash'),
  );

  $args = array(
   'label' => 'Event Galleries',
   'labels' => $labels,
   'description' => 'One of our event galleries',
   'public' => true, //most admin display flows from this by default
   'publicly_queryable' => true,
   'exclude_from_search' => false,
   'show_ui' => true,
   'menu_position' => 20,
   'hierarchical' => true,
   'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields','revisions','page-attributes'),
   'has_archive' => true
  );

  /**
  * Register the post type
  * Documentation http://codex.wordpress.org/Function_Reference/register_post_type
  */
  register_post_type('event-galleries', $args);

}
?>