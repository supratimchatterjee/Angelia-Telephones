<?php
/*
 * Template Name: Custom Login
 */
if ( is_user_logged_in() ) {
   wp_redirect( '/downloads' );
   exit;
}
get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<section class="main">
			<div class="uk-container uk-container-center">
				<div class="main-content uk-margin-large-top uk-margin-large-bottom">
					<div class="uk-grid uk-margin-large-top">
						<div class="uk-width-medium-1-2 uk-container-center">
							<?php dynamic_sidebar( 'login-form' ); ?>
						</div>
					</div>

				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();