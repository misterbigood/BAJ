<?php
/**
 * The template for displaying category les visites
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baladesauxjardins
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    <span class="signal">category photos</span>
                    
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header mtm">
                            <h1 class="page-title">Les photos du jour</h1>                          
			</header><!-- .page-header -->
                        <div class="section-1 les-photos mbl">
                        <section class="grid-2 has-gutter-xl">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                        ?>
                            <div>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                        <a data-caption-title='<?php the_title(); ?>' data-caption-desc='<?php the_content();?>' href="<?php echo $image[0];?>" class="foobox" rel="gallery"><?php the_post_thumbnail(); ?></a>
                                    <?php endif; ?>
                                    
                                    <header class="entry-header">
                                      <?php the_title( '<h3 class="entry-title mtm">', '</h3>' );?>
                                    </header><!-- .entry-header -->
                                    <?php /* Affichage du contenu de l'article*/ 
                                    the_content();
                                    ?>
                                </article><!-- #post-<?php the_ID(); ?> -->
                            
                                
                               
 

                                <?php
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 
				get_template_part( 'template-parts/content', get_post_type() );*/?>
                            </div>
                        <?php
			endwhile;
                        ?>
                        </section>
                        </div>
                        <?php
			the_posts_navigation( array(
                            'in_same_term'               => true,
                        ));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
                    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
