<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package baladesauxjardins
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    <span class="signal">archive-agenda</span>
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
                            <h1 class="page-title">Agenda pour les particuliers</h1>
			</header><!-- .page-header -->
                        <section class="section-1">
                            <h2>Prochaines visites pour les particuliers</h2>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                        ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class='grid-9'>
                                        <div class="flex-col-2"><?php the_post_thumbnail(); ?></div>
                                        <div class="flex-col-7"><?php the_content(); ?></div>
                                    </div>
                                </article><!-- #post-<?php the_ID(); ?> -->
                        <?php
			endwhile;
                        ?>
                        </section>
                        <?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
