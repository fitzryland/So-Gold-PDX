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

/**
 * Remove the slug from published post permalinks. Only affect our CPT though.
 */
function vipx_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( ! in_array( $post->post_type, array( 'event-galleries' ) ) || 'publish' != $post->post_status )
        return $post_link;

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'vipx_remove_cpt_slug', 10, 3 );

function vipx_parse_request_tricksy( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query )
        || ! isset( $query->query['page'] ) )
        return;

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) )
        $query->set( 'post_type', array( 'post', 'event-galleries', 'page' ) );
}
add_action( 'pre_get_posts', 'vipx_parse_request_tricksy' );

?>