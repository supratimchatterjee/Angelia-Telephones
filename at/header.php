<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Angelia_Telephones
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="my-id" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'uk-nav uk-nav-offcanvas' ) ); ?>
			</div>
		</div>	
		<header id="header" class="site-header uk-contrast">
			<div class="utility-bar uk-visible-xlarge">
				<div class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-width-medium-1-2">
						<div>
							<ul class="uk-subnav">
								<li><?php if ( is_user_logged_in() ) :?>
									<a href="<?php echo get_permalink( 262 ); ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-download.svg"> Downloads</span></a>
								<?php  else :?>
									<a href="/login/"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-download.svg"> Downloads</span></a>
								<?php  endif;?></li>
								<li><a href="<?php the_field('_support_link','option'); ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-support.svg"> Remote Support</a></span></li>
							</ul>
						</div>
						<div>
							<ul class="uk-subnav uk-navbar-flip">
								<li><a href="<?php the_field('_contact_link','option'); ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-pin.svg"> Contact</a></span></li>
								<li><a href="tel:<?php the_field('_phone_number','option'); ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-tel.svg"> <?php the_field('_phone_number','option'); ?></a></span></li>
								<li><a href="mailto:<?php the_field('_email','option'); ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-icon-email.svg"> <?php the_field('_email','option'); ?></a></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<nav class="uk-navbar">
				<div class="uk-container uk-container-center">
					<a href="<?php bloginfo( 'url' ); ?>" class="uk-navbar-brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-logo.png"></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'uk-navbar-nav uk-navbar-flip uk-visible-xlarge' ) ); ?>
					<a data-uk-offcanvas="" class="uk-navbar-toggle uk-float-right uk-hidden-xlarge" href="#my-id"></a>
				</div>
			</nav>
		</header><!-- /header -->