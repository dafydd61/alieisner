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
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/img/ali_Logo_tower.png" alt="<?php bloginfo( 'name' ); ?>"></a></h1>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">

			<h1 class="menu-toggle">Ali Eisner <span class="icon-reorder"></span></h1>

			<div class="screen-reader-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'ali' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
