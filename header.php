<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ali
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<script type="text/javascript" src="//use.typekit.net/xxa7wrv.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	types_render_field("slider-image");
	?>
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php
		if ( is_home() && !(is_front_page()) ) {
			$blogObj = get_page_by_path('blog');
			$blogId = $blogObj->ID;
			$useCarousel = types_render_field("no-carousel", array("id"=>$blogId));
			$slides = types_render_field("slider-image", array("separator"=>"</div><div>", "id"=>$blogId));
		} else {
			$useCarousel = types_render_field("no-carousel");
			$slides = types_render_field("slider-image", array("separator"=>"</div><div>"));
		}
		?>
		<?php
		if (!empty($slides) && $useCarousel != 1) {
		?>
		<div class="banner-pics banner-slick">
			<div class="slick-slide">
				<?php
				echo $slides;
				?>
			</div>
		</div>
		<?php
		}
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<h1 class="menu-toggle">Ali Eisner <span class="fa fa-bars"></span></h1>

			<div class="screen-reader-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'ali' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
