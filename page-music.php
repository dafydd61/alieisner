<?php
/**
 *
 * @package ali
 *
 * Template Name: Music
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

		  $catObject = get_category_by_slug('music');
		  $catId = $catObject->term_id;

			global $post;
			$args = array( 'posts_per_page' => -1, 'category' => $catId );
			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) :
			  setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cat-video'); ?>>
					<header class="entry-header entry-header--video">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					</header><!-- .entry-header -->
					<div class="entry-content entry-content--video">
						<?php echo do_shortcode(types_render_field("shortcode", array("raw"=>"true"))); ?>
						<div class="short-description">
							<?php echo do_shortcode(types_render_field("short-description", array())); ?>
						</div>
						<?php // the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ali' ) ); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'ali' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			<?php endforeach;
			wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
