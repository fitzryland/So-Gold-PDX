<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sogoldpdxcom
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
  <div class="site_header_wrap">
  	<header id="masthead" class="site_header" role="banner">
  		<div class="site-branding">
  			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  		</div>
  		<a href="<?php echo esc_url( home_url( '/' ) ); ?>submit" class="submit_photos">Submit Photos</a>
  	</header><!-- #masthead -->
  </div>

	<div id="content" class="site-content">
