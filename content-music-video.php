<?php
/**
 * @package ali
 */
?>

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