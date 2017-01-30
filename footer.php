<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ali
 */
?>

  <?php // get_sidebar('home-above-footer') ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'ali_credits' ); ?>
			<span>Ali J. Eisner</span>
      <span>Design and code by <a target="_blank" href="http://fancydavid.com">Dafydd Hughes</a>, built on <a target="_blank" href="http://underscores.me/" rel="designer">Underscores.me</a></span>
      <span>Ali map photo by <a target="_blank" href="http://jenniferrowsom.com//">Jennifer Rowsom</a></span>
		</div><!-- .site-info -->
    <?php get_template_part('social'); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>