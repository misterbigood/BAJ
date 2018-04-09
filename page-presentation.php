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
                    <h1>Présentation</h1>
                    <div class="section-1">
                    <section class="grid-7 has-gutter-xl">
                        <div class="flex-col-3">
                        <?php
                            $the_slug = 'votre-conferencier';
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
                        </div>
                        <div class="flex-col-4">
                            <h2>On en parle</h2>
                            <?php $loop = new WP_Query( array( 'post_type' => 'reference', 'posts_per_page' => 4, 'category' => 'current' ) ); ?>
                            <section class="grid-1 has-gutter-l">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="reference mbl">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <?php   $content=get_the_content();
                                            $content = apply_filters( 'the_content', $content );
                                            $content = str_replace( ']]>', ']]&gt;', $content );
                                            echo $content;
                                    ?>
                                </div>
                                <?php endwhile; wp_reset_query(); ?>
                            </section>
                        </div>
                    </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
