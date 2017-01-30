<?php
/**
 *
 * @package ali
 *
 * Template Name: TV
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="page-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div class="taxonomy-description">
						<?php
							the_content();
						?>
					</div>
				</header><!-- .page-header -->


			<?php endwhile; ?>

			<?php

		  $catObject = get_category_by_slug('tv');
		  $catId = $catObject->term_id;

			global $post;
			$args = array( 'posts_per_page' => -1, 'category' => $catId );
			$posts = get_posts( $args );
			foreach ( $posts as $post ) :
				setup_postdata( $post ); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('cat-tv'); ?>>
					<a class="reveal-trigger reveal-trigger-append" data-target="#content-<?php the_ID(); ?>" href="#content-<?php the_ID(); ?>">
						<header class="entry-header--tv">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content entry-content--tv">
							<?php the_post_thumbnail(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'ali' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
					</a>
				</article><!-- #post-## -->
				<div class="entry-content--tv__description mfp-hide" id="content-<?php the_ID(); ?>">
					<h1 class="popup-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>

			<?php endforeach;
			wp_reset_postdata();?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
