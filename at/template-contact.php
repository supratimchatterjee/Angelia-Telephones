<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Angelia_Telephones
 */

get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<section class="main">
			<div class="uk-container uk-container-center">
				<div class="main-content uk-margin-large-top uk-margin-large-bottom">
					<h2 class="uk-text-center"><?php the_title(); ?></h2>
					<div class="uk-grid uk-margin-large-top">
                    	<div class="uk-width-medium-4-10 contact_form"><?php the_content(); ?></div>
						<div class="uk-width-medium-6-10">
                        	<div class="map">
                            	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2425.761757168025!2d1.710736315351863!3d52.555834241325975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47da04f3998cbd9b%3A0xb09753fb9db4d72c!2sAnglia+Telephones+LTD!5e0!3m2!1sen!2sin!4v1467635432121" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
					</div>

				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();