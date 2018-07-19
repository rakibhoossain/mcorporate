<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mcorporate
 */

$container = get_theme_mod( 'mcorporate_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'mcorporate' ); ?></a>

<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) : ?>
	<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
<?php else: ?>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->







				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Mcorporate_WP_Bootstrap_Navwalker(),
					)
				); ?>


			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->
<?php endif; ?>
	</div><!-- #wrapper-navbar end -->


		<?php 
$stick = '';
$navID = 'main-nav';

		?>
			<nav id="<?php echo $navID; ?>"<?php echo $stick; ?>>
				<div class="container">

				Logo

					<?php wp_nav_menu( 
							array(
									'container_class' => 'main-menu',
									'theme_location' => 'primary',
									'walker' => new tie_mega_menu_walker(),
									'fallback_cb'=> false
								)
							);
						?>


					<?php if( function_exists( 'is_woocommerce' ) ):
						global $woocommerce; ?>
						<a class="tie-cart ttip" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _eti( 'View your shopping cart' ); ?>"><span class="shooping-count-outer"><?php if( isset( $woocommerce->cart->cart_contents_count ) && ( $woocommerce->cart->cart_contents_count != 0 ) ){ ?><span class="shooping-count"><?php echo $woocommerce->cart->cart_contents_count ?></span><?php } ?><i class="fa fa-shopping-cart"></i></span></a>
					<?php endif ?>

				</div>
			</nav><!-- .main-nav /-->
