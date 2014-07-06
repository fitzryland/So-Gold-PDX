<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sogoldpdxcom
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <div class="loading_overlay" id="loading_overlay_id">loading...</div>
    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->


        <div class="gallery_wrap" id="gallery_wrap_id">
          <button class="gallery--close" id="gallery_close_id">done</button>
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
            foreach ( $photos as $key => $photo ) :
              $imageClass = 'gallery_nav--image';
              $imageClass .= ( ($key + 1) % 4 == 0 ? ' nth-4': '' );
              $imageClass .= ( ($key + 1) % 3 == 0 ? ' nth-3': '' );
              $imageClass .= ( ($key + 1) % 2 == 0 ? ' nth-2': '' );
              ?>
              <a class="<?php echo $imageClass; ?>" data-slide-index="<?php echo $key; ?>" href="" style="background-image: url(<?php echo $photo['image']['sizes']['large']; ?>)"></a>
            <?php endforeach; ?>
          </div>
        </div>

      </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>