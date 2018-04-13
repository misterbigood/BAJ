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
                    <div class="section-1">
                    <section class="grid-9 has-gutter-xl"> <!-- Première section, fond blanc, deux colonnes -->
                        <div class="flex-col-5"><!-- Première colonne - Affichage de la page Accueil ; page modifiable dans l'admin de wordpress -->
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
                        <div class="flex-col-4 txtcenter mal"> <!-- Deuxième colonne - Partie fixe -->
                            <h3>Vous souhaitez organiser une visite pour un groupe ?</h3>
                            <a href="<?php echo get_home_url().'/category/les-visites' ?>"><button class="mas">Découvrez toutes les visites</button></a>
                            <p class="u-small u-italic">Choisissez une balade dans le catalogue et contactez moi pour me communiquer la date et l'horaire souhaités.</p>
                        </div> <!-- Fin d'affichage de la partie fixe -->
                    </section><!-- Fin de première section -->
                    </div>
                    <div class="section-2-container pbl">
                    <section class="section-2 grid-9"> <!-- Deuxième section, fond bleu pâle, deux colonnes -->
                        <div class="flex-col-5"> <!-- Première colonne - Affichage des cinq derniers RDV à l'agenda -->
                            <h2>Prochaines visites pour les particuliers</h2>
                            <?php $loop = new WP_Query( array( 'post_type' => 'agenda', 'posts_per_page' => 6, 'category' => 'current' ) ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php  $content=get_the_content();
                                            $content = apply_filters( 'the_content', $content );
                                            $content = str_replace( ']]>', ']]&gt;', $content );
                                            echo $content; ?>
                            </article>
                            <?php endwhile; wp_reset_query(); ?>
                            <footer class="mtl"><a href="<?php echo get_home_url()."/rendez-vous";?>">Consultez l'agenda des visites pour les particuliers</a></footer>
                        </div> <!-- Fin d'affichage des derniers RDV à l'agenda -->
                        <div class="flex-col-4"> <!-- Deuxième colonne - Affichage de la page Les conférences; page modifiable dans l'admin de wordpress -->
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
                    </div>
                    

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
