<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ali
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php

$idObj = get_category_by_slug('tv');
$id = $idObj->term_id;
$args = array( 'posts_per_page' => -1, 'category' => $id );
$tv = get_posts( $args );
?>

<header class="page-header">
	<h1 class="page-title"><?php single_cat_title(); ?></h1>
	<?php
		// Show an optional term description.
		$term_description = term_description();
		if ( ! empty( $term_description ) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
		endif;
	?>
</header><!-- .page-header -->

<?php foreach ( $tv as $post ) : setup_postdata( $post ); ?>
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

		</main><!-- #main -->
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>