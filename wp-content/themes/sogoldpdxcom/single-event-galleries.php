<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sogoldpdxcom
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->


        <div class="gallery_wrap" id="gallery_wrap_id">
          <div class="gallery" id="gallery_id">
            <?php
            $photos = get_field('images');
            foreach ( $photos as $key => $photo ) : ?>
              <div class="gallery--image_wrap">
                <?php echo acf_image( array($photo['image'], 'gallery--image', 'large') ); ?>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="gallery_nav" id="gallery_nav_id">
            <?php
            foreach ( $photos as $key => $photo ) : ?>
              <a class="gallery_nav--image" data-slide-index="<?php echo $key; ?>" href="" style="background-image: url(<?php echo $photo['image']['sizes']['large']; ?>)"></a>
            <?php endforeach; ?>
          </div>
        </div>


        <div class="entry-content">
          <?php the_content(); ?>
          <?php
            wp_link_pages( array(
              'before' => '<div class="page-links">' . __( 'Pages:', 'sogoldpdxcom' ),
              'after'  => '</div>',
            ) );
          ?>
        </div><!-- .entry-content -->


      </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>