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

	<header id="masthead" class="site_header" role="banner">
		<h1 class="site_header--title"><?php bloginfo( 'name' ); ?></h1>
		<h2 class="site_header--description"><?php bloginfo( 'description' ); ?></h2>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
