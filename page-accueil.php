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
                    <h1 class="">Accueil</h1>
                    <section class="section-1 grid-2 has-gutter-xl"> <!-- Première section, fond blanc, deux colonnes -->
                        <div><!-- Première colonne - Affichage de la page Accueil ; page modifiable dans l'admin de wordpress -->
                            <?php
                            while ( have_posts() ) : the_post();
                             ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="entry-content">
                                            <?php
                                                    the_content();

                                                    wp_link_pages( array(
                                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'baladesauxjardins' ),
                                                            'after'  => '</div>',
                                                    ) );
                                            ?>
                                    </div><!-- .entry-content -->

                                </article><!-- #post-<?php the_ID(); ?> -->
                            <?php 
                            endwhile; // End of the loop.
                            ?>
                        </div><!-- Fin d'affichage de la page Accueil -->
                        <div> <!-- Deuxième colonne - Partie fixe -->
                            Vous souhaitez organiser une visite pour un groupe ?
                            <button>Découvrez toutes les visites</button>
                            Choisissez une balade dans le catalogue et contactez moi pour me communiquer la date et l'horaire souhaités.
                        </div> <!-- Fin d'affichage de la partie fixe -->
                    </section><!-- Fin de première section -->
                    
                    <section class="section-2 grid-2 has-gutter"> <!-- Deuxième section, fond bleu pâle, deux colonnes -->
                        <div> <!-- Première colonne - Affichage des cinq derniers RDV à l'agenda -->
                            <h2>Prochaines visites pour les particuliers</h2>
                            Loop ur l'agenda custom_post_type a priori
                        </div> <!-- Fin d'affichage des derniers RDV à l'agenda -->
                        <div> <!-- Deuxième colonne - Affichage de la page Les conférences; page modifiable dans l'admin de wordpress -->
                            <?php
                            $the_slug = 'les-conferences';
                            $args = array(
                              'name'        => $the_slug,
                              'post_type'   => 'page',
                              'post_status' => 'publish',
                              'numberposts' => 1
                            );
                            $my_posts = get_posts($args);
                            foreach( $my_posts as $post ) :
                                setup_postdata($post);
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h2 class='h2-blue'><?php the_title();?></h2>
                                </header><!-- .entry-header -->
                                <div class="entry-content">
                                        <?php the_content(); ?>
                                </div><!-- .entry-content -->
                            </article>
                            <?php endforeach; ?>
                            
                        </div> <!-- Fin d'affichage de la page Les conférences -->
                    </section> <!-- Fin de deuxième section -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
