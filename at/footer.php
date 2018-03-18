<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Angelia_Telephones
 */

?>
		<footer class="uk-block uk-block-secondary uk-contrast site-footer">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-small-1-2" data-uk-grid-match="" data-uk-margin="{cls : 'uk-margin-top'}">
					<?php dynamic_sidebar('footer'); ?>
				</div>
				<div class="site-socket uk-margin-large-top">
					<div class="uk-grid" data-uk-margin="{cls:'uk-margin-top'}">
						<div class="uk-width-large-3-4">
							<p class="copyright-text"><?php the_field('_copyright','option');?></p>
						</div>
						<div class="uk-width-large-1-4">
							<div class="footer-social uk-margin-bottom">
                            <?php 
								$linked_in=get_field('_linked_in','option');
								$facebook_link=get_field('_facebook_link','option');
								$twiter=get_field('_twiter','option');
							?>
								<?php if(!empty($linked_in)):?>
                                <a href="<?php echo $linked_in;?>"><span class="uk-icon-button uk-icon-medium uk-icon-linkedin"></span></a>
								<?php endif;?>
								
								<?php if(!empty($facebook_link)):?>
                                <a href="<?php echo $facebook_link;?>"><span class="uk-icon-button uk-icon-medium uk-icon-facebook"></span></a>
								<?php endif;?>
								
								<?php if(!empty($twiter)):?>
                                <a href="<?php echo $twiter;?>"><span class="uk-icon-button uk-icon-medium uk-icon-twitter"></span></a>
								<?php endif;?>
							</div>
                             <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'uk-subnav uk-subnav-line', 'container' => false ) ); 							  ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
	<?php wp_footer(); ?>
	</body>
</html>
