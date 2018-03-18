<?php
/**
 * Template Name: Home
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
		<?php $slider_image = get_sub_field('_slider_image');?>
		<?php if(have_rows('_slider')) : ?>
				<ul class="uk-slideshow site-banner" data-uk-slideshow="{autoplay:true}">
			<?php while(have_rows('_slider')) : the_row(); ?>
			<li class="uk-cover-background" style="background-image:url(<?php the_sub_field('_slider_bg'); ?>);">
				<div class="uk-overlay-panel uk-container uk-container-center uk-flex uk-flex-middle uk-position-relative">
					<div class="uk-grid">
						<div class="uk-width-large-1-2 uk-flex uk-flex-middle">
							<div>
								<h1 class="uk-margin-large-bottom"><?php the_sub_field('_slider_heading'); ?></h1>
								<a href="<?php the_sub_field('_slider_button_link'); ?>" class="uk-button uk-button-danger"><?php the_sub_field('_slider_button_text'); ?></a>
							</div>
						</div>

						<div class="uk-width-large-1-2">
							<?php if (!empty($slider_image) ){ ?><img src="<?php echo $slider_image; ?>"><?php } ?>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
		<section class="main">
			<div class="uk-block uk-text-center site-features">
				<div class="uk-container uk-container-center">
					<h2><?php the_field('_offer_title'); ?></h2>
					<?php if(have_rows('_offer')) : ?>
					<div class="uk-grid uk-grid-width-large-1-5" data-uk-margin="{cls:'uk-margin-top'}">
						<?php while(have_rows('_offer')) : the_row(); ?>
						<div class="uk-panel uk-panel-header">
							<img src="<?php the_sub_field('_offer_image'); ?>" alt="">
							<h4 class="uk-panel-title uk-h4" style="border-bottom-color: <?php the_sub_field('_border_color'); ?>"><?php the_sub_field('_offer_heading'); ?></h4>
							<?php the_sub_field('_offer_description'); ?>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="uk-block uk-block-primary uk-contrast uk-text-center site-welcome">
				<div class="uk-container uk-container-center">
					<div class="uk-grid">
						<div class="uk-width-medium-8-10 uk-container-center">
							<h2 class="uk-margin-large-bottom"><?php the_field ('_welcome_title'); ?></h2>
							<p class="uk-text-large"><?php the_field ('_welcome_description'); ?></p>
							<p class="uk-text-large"><a href="<?php the_field ('_product_view_link'); ?>"><?php the_field ('_product_view_text'); ?></a></p>
						</div>
					</div>
				</div>
			</div>

			<div class="uk-block uk-block-muted uk-text-center site-middle">
				<div class="uk-container uk-container-center">
					<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-large" data-uk-margin="{cls: 'uk-margin-large-top'}">
						<div>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/help-symbol.png">
							<h2><?php the_field('_help_desk_title');?></h2>
							<p><?php the_field('_help_desk_description');?></p>
							<p class="uk-contrast"><a href="<?php the_field('_help_desk_link');?>"><?php the_field('_help_desk_link_text');?> >></a></p>
						</div>
						<div>
							<div class="uk-panel uk-panel-box uk-contrast site-testimonial">
                            <?php if(have_rows('_testimonial')) : ?>	
                            <?php while(have_rows('_testimonial')) : the_row(); ?>							
                                       <p>
                                        <big>“<?php the_sub_field('_testimonial_quote'); ?>”</big>
                                        <span><?php the_sub_field('_testimonial_author'); ?></span>									
                                      </p>
                           <?php endwhile; ?> 
                           <?php endif; ?>
							</div>
							<span class="arrow"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="uk-block uk-text-center site-news">
				<div class="uk-container uk-container-center">
					<h2>LATEST NEWS</h2>
					<?php $query = new WP_Query( array( 'posts_per_page' => 4, 'post_type' => 'post' ) ); ?>
					<?php if ($query->have_posts()) : ?>
					<div class="uk-grid uk-grid-width-medium-1-4">
						<?php while ($query->have_posts()) : $query->the_post(); ?>
						<?php $id = $query->ID; ?>
						<article class="uk-article">
							<?php the_post_thumbnail(array(300, 250));?>
							<h4 class="uk-article-title uk-h4 uk-margin-bottom-remove"><?php the_title();?></h4>
							<p class="uk-article-meta uk-margin-small-top"><?php the_time('l jS F Y') ?></p>
							<a href="<?php the_permalink();?>" class="uk-button">LEARN MORE</a>
						</article>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();