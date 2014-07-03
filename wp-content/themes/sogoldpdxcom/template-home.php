<?php
/**
 * Template Name: Home
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<?php $bgImage = get_field('background_image', 'option'); ?>
<body <?php body_class(); ?> style="background-image: url(<?php echo $bgImage['url']; ?>);">
<div id="page" class="hfeed site">

	<header id="home_header_id" class="home_header" role="banner">
		<div class="home_header--title_block_wrap">
			<div class="home_header--title_block" id="title_block_id">
				<h1 class="home_header--title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="home_header--description"><?php bloginfo( 'description' ); ?></h2>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>submit" class="submit_photos">submit photos</a>
				<a href="" class="event_photos_button" id="event_photos_button_id">view photos</a>
				<!-- <div class="home_header--speckel"></div> -->
				<div class="home_header--logo"></div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">


	<div class="gallery_loop_wrap">
		<div class="gallery_loop">
			<?php
			$gallery_query_args = array( 'post_type' => 'event-galleries' );
			$gallery_query = new WP_Query($gallery_query_args);
			while( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
				<a class="gallery_loop--thumbnail" href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php echo acf_image( array(get_field('cover_image'), 'gallery_loop--thumbnail_image', 'thumbnail') ); ?>
				</a>
			<?php endwhile; ?>
		</div>
	</div>

<?php get_footer(); ?>
