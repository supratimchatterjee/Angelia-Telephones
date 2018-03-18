<?php
/**
 * Template Name: Telephone Systems
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
		<?php if(have_rows('_slider')) : ?>
		<ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
			<?php while(have_rows('_slider')) : the_row(); ?>
			<li class="uk-cover-background" style="background-image:url(<?php the_sub_field('_slider_bg'); ?>);">
				<div class="uk-overlay-panel uk-container uk-container-center uk-flex uk-flex-middle uk-position-relative">
					<div class="uk-grid">
						<div class="uk-width-large-3-10 ">
							<img src="<?php the_sub_field('_slider_image'); ?>">
						</div>

						<div class="uk-width-large-7-10 uk-flex uk-flex-middle">
							<div>
								<h1 class="uk-margin-bottom"><?php the_sub_field('_slider_heading'); ?></h1>
								<?php the_sub_field('_slider_content'); ?>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
		<section class="main">
			<div class="uk-container uk-container-center">
				<div class="main-content uk-margin-large-top uk-margin-large-bottom">
					<h2 class="uk-text-center"><?php the_field('_page_title'); ?></h2>
					<h3 class="uk-text-center"><?php the_field('_page_subtitle'); ?></h3>
					<div class="uk-grid uk-margin-large-top">
						<div class="uk-width-large-7-10">
							<?php the_post_thumbnail( ); ?>
							<?php the_content(); ?>
							<?php if(have_rows('_downloads')) : ?>
							<h4>INFORMATION FILES</h4>
							<div class="content-downloads">
								<?php while(have_rows('_downloads')) : the_row(); ?>
									<a target="_blank" href="<?php the_sub_field('upload_file'); ?>" class="uk-button uk-button-danger uk-button-large"><i class="uk-icon-download"></i> <?php the_sub_field('_button_text'); ?></a>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>
                            <div class="before_footer_images">
                            	<?php if( have_rows('_over_footer') ): ?>
                            	<ul class="uk-subnav uk-subnav-line">
                                		<?php while( have_rows('_over_footer') ): the_row(); ?>
                                        	<?php 
												$images_link = get_sub_field('_images_link');
												$over_footer_images = get_sub_field('_over_footer_images');
											?>
                                           	 <?php if($images_link): ?>
    								<li> 
                                    	<a href="<?php echo $images_link; ?>">
                                    	<img src="<?php echo $over_footer_images;  ?>">
                                        </a>
                                     </li>
                                     		<?php endif;?>
                                    	 <?php endwhile; ?>
								</ul>
                                <?php endif; ?>	
                            </div>
                        </div>
						<div class="uk-width-large-3-10">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();