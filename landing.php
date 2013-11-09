<?php
/**
 * Template Name: Landing
 *
 * @package ali
 */

get_header('landing'); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        
        <div class="hero">

          <article id="post-<?php the_ID(); ?>" <?php post_class('media'); ?>>
            <div class="media__content">

              <div class="entry-content">
                <?php the_content(); ?>
              </div><!-- .entry-content -->
            </div>
            <!-- <div class="media__media"> -->
              <?php
              // if ( has_post_thumbnail() ) {
              //   the_post_thumbnail('full');
              // }
              ?>
            <!-- </div> -->
          </article><!-- #post-## -->

        </div>

      <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer('landing'); ?>
