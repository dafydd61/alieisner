<?php
/**
 * Template Name: Homepage
 *
 * @package ali
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="hero">

					<article id="post-<?php the_ID(); ?>" <?php post_class('media media--img-right'); ?>>
						<div class="media__content">
							<header class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php the_content(); ?>
								<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'ali' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->
							<?php edit_post_link( __( 'Edit', 'ali' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
						</div>
						<div class="media__media">
							<?php
							if ( has_post_thumbnail() ) {
                $img_href = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                <a class="image-popup-no-margins" href="<?php echo $img_href ?>"><?php the_post_thumbnail('homepage-square') ?></a>
							<?php } ?>
							<?php get_template_part('social'); ?>
						</div>
					</article><!-- #post-## -->

				</div>

			<?php endwhile; // end of the loop. ?>

			<?php

			$catsToExclude = "-" . get_cat_ID( 'video' );
			$catsToExclude .= " -" . get_cat_ID( 'tv' );
			$catsToExclude .= " -" . get_cat_ID( 'music' );

			$args = array( 'posts_per_page' => 1, 'cat' => $catsToExclude );
			// $args = array( 'posts_per_page' => 1 );
			$lastposts = get_posts( $args );
			foreach ( $lastposts as $post ) :
			  setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark">Latest Post: <?php the_title(); ?></a></h1>

						<?php if ( 'post' == get_post_type() ) : ?>
							<?php endif; ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_excerpt(); ?>
							<?php $blogID = get_page_by_path('blog'); ?>
							<p><a class="read-blog-link" href="<?php echo get_page_link($blogID) ?>">Read the blog</a></p>
						</div><!-- .entry-content -->

				</article><!-- #post-## -->
			<?php endforeach;
			wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
