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
                category
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
                            <h1 class="page-title">Les visites</h1>
                            <nav id="visites-navigation" class="category-navigation">
                                    <?php
                                            wp_nav_menu( array(
                                                    'theme_location' => 'menu-3',
                                                    'menu_id'        => 'category-menu',
                                            ) );
                                    ?>
                            </nav><!-- #site-navigation -->
                            
			</header><!-- .page-header -->
                        <section class="section-1 grid-3 has-gutter-xl">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                        ?>
                            <div>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header class="entry-header">
                                    <?php the_title( '<h2 class="entry-title">', '</h2>' );?>
                                    <span class="etiquette-visite"><?php the_category();?></span>
                                    
                                    </header><!-- .entry-header -->

                                     <?php baladesauxjardins_post_thumbnail(); ?>

	
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
                        <?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
