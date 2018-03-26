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
                    <span class="signal">page-accueil</span>
                    
                       
                            <?php
                            while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                            endwhile; // End of the loop.
                            ?>
                    <section class="section-2 grid-2 has-gutter">
                        <div>
                            <h2>Prochaînes visites pour les particuliers</h2>
                            Loop ur l'agenda custom_post_type a priori
                        </div>
                        <div>
                            <?php
                            $the_slug = 'les-conferences';
                            $args = array(
                              'name'        => $the_slug,
                              'post_type'   => 'page',
                              'post_status' => 'publish',
                              'numberposts' => 1
                            );
                            $my_posts = get_posts($args);
                            if( $my_posts ) :
                              echo 'ID on the first post found ' . $my_posts[0]->ID;
                            endif;
                            ?>
                            
                            <h2><?php echo $my_posts[0]->name?></h2>
                            Plutôt la page "Les conférences" à intégrer ici
                        </div>
                    </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
