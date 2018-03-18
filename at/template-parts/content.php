<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Angelia_Telephones
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="uk-grid">
	<div class="uk-width-medium-1-3"><?php the_post_thumbnail(array(252,153))?></div>
    <div class="uk-width-medium-2-3">
    	<?php if ( is_single() ) {
				the_title( '<h3 class="entry-title">', '</h3>' );
			} else {
				the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			}?>
           
            <p class="uk-article-meta">
            	Written by <?php the_author();?> on <?php the_time('F j, Y'); ?>.
			</p>
         
            <?php if ( is_single() ) :?>
            	<?php the_content();?>
            <?php else:?>
            	<?php the_excerpt();?>
                <a class="uk-button uk-button-danger" href="<?php the_permalink();?>">Read More</a>
            <?php endif;?>
    </div>
	
    </div>
</article><!-- #post-## -->
<?php if ( is_single() ) :?>
<?php else :?>
<hr class="uk-grid-divider">
<?php endif;?>