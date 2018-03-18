<?php
/**
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
                    	<?php if ( is_active_sidebar('sidebar') ): ?>
                        	<div class="uk-width-large-7-10">
								<?php the_post_thumbnail( ); ?>
								<?php the_content(); ?>
                            </div>
                            <div class="uk-width-large-3-10">
                                <?php get_sidebar(); ?>
                            </div>
                        <?php else:?>
							<div class="uk-width-1-1">
							<?php the_post_thumbnail( ); ?>
							<?php the_content(); ?>
						</div>
						<?php endif; ?>
						
					</div>

				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();