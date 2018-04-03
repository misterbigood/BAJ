<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baladesauxjardins
 */

?>
<span class="signal">template part visite</span>
<div class="section-1">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
?>
		
	</header><!-- .entry-header -->
        
        <!-- Début essai flexslider ------------------>
        <div class="grid-3">
            <div class="flex-col-1">
            <?php $fichiers = get_children("post_parent=$id&post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC");
            if ($fichiers):?>
	<div id="slider" class="flexslider">
	<ul class="slides">
	<?php 
        
        foreach($fichiers as $fichier): ?>
                <li>
            	<?php
               if($fichier){
					
                   $thumb=wp_get_attachment_thumb_url($fichier->ID);
		   $liste[]=$thumb;
		   $image=wp_get_attachment_url($fichier->ID, $size='medium', $icon = false);

					?>
                    <img src="<?php echo $image ?>" style="max-width: 100%; height: 300px;" />
			<p class="flex-caption"><?php echo $fichier->post_title; ?></p>
                    <?php				
				}
				?>
            	</li>
        <?php endforeach; ?>
	</ul>
	</div>
        <div id="carousel" class="flexslider">
                <ul class="slides">
                <?php foreach($liste as $key=>$value):?>
                <li>
                        <img src="<?php echo $value;?>" />
                </li>
                <?php endforeach; ?>
                </ul>
        </div>
                <?php endif; ?>
        </div>
            <div class="flex-col-2">
                <div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'baladesauxjardins' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'baladesauxjardins' ),
				'after'  => '</div>',
			) );
                        
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //baladesauxjardins_entry_footer(); ?>
                <?php the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
                ?>
	</footer><!-- .entry-footer -->
            </div>
        </div>

        




	<!-- Fin essai flexslider -------------------------------->

	
</article><!-- #post-<?php the_ID(); ?> -->
</div>
