<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baladesauxjardins
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    <span class="signal">page-presentation</span>
                    
                       
                            <?php
                            while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                            endwhile; // End of the loop.
                            ?>
                    <section class="section-1 grid-3 has-gutter-l">
                        <div>Contenu 1, faut-il le sortir du loop ou est-ce juste une page ?</div>
                        <div class="col-2">Contenu 2, une page ?</div>
                    </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
