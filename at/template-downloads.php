<?php
/*
 * Template Name: Downloads
 */
 
if ( !is_user_logged_in() ) {
	wp_redirect( '/login' );
	exit;
}

get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<section class="main">
			<div class="uk-container uk-container-center">
				<div class="main-content uk-margin-large-top uk-margin-large-bottom">
					<h2 class="uk-text-center"><?php the_title(); ?></h2>
					<div class="uk-grid uk-margin-large-top">
						<div class="uk-width-medium-2-3 uk-container-center">
							<?php the_content(); ?>
							<?php if( have_rows('_downloads_section') ): ?>	
							<div class="uk-accordion" data-uk-accordion="">
								<?php while( have_rows('_downloads_section') ): the_row(); 
										 $download_count = get_sub_field('_download_count'); 
								?>
								<h4 class="uk-accordion-title">
									<?php the_sub_field('_section_title');?>									
									 <?php if($download_count) :?><em><?php echo $download_count; ?> Downloads</em><?php endif; ?>
								</h4>
								<div class="uk-accordion-content">
								<?php if( get_sub_field('_section_intro') ): ?>
									<p><?php the_sub_field('_section_intro'); ?></p>
									<?php if( have_rows('_section_rows') ): ?>
										<?php while( have_rows('_section_rows') ) : the_row(); ?>
											<?php if(get_row_layout() == '_row_title') : ?>
												<div class="data-title"><h5><?php the_sub_field('_title');?></h5><div class="arrow-drop"></div></div>
											<?php elseif(get_row_layout() == 'file_block') : ?>
												<?php if( have_rows('_files') ): ?>	
												<div class="uk-grid" data-uk-margin="{cls: 'uk-margin'}">
													<?php while( have_rows('_files') ) : the_row(); ?>
												    <div class="uk-width-medium-1-3">
														<?php $file = get_sub_field('_file_link'); ?>
														<a class="media" href="<?php echo $file['url'];?>">
															<div class="uk-clearfix">
																<?php $file_image = ($file['mime_type'] == "application/rtf") ? get_template_directory_uri() . '/images/file-doc.svg' : get_template_directory_uri() . '/images/file-pdf.svg' ;?>
																<img class="uk-comment-avatar" src="<?php echo $file_image; ?>" alt="" height="50" width="50">
																<h4 class="uk-comment-title"><?php echo str_replace('_', ' ', $file['title']); ?></h4>
																<div class="uk-comment-meta"><?php echo human_filesize($file['url']); ?></div>															
															</div>
														</a>		
												    </div>
												    <?php endwhile; ?>
												</div>
												<?php endif; ?>
											<?php endif; ?>
										<?php endwhile; ?>
									<?php endif; ?>
								<?php endif; ?>
									
								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();