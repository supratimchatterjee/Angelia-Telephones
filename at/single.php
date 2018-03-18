<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Angelia_Telephones
 */

get_header(); ?>

	<section class="main">
			<div class="uk-container uk-container-center">
				<div class="main-content uk-margin-large-top uk-margin-large-bottom">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.

		endwhile; // End of the loop.
		?>

	</div>
    </div>
    </section>

<?php
get_footer();
