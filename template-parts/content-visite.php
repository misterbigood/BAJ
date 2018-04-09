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
<div class="section-1 visite">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>

        </header><!-- .entry-header -->
        <div class="grid-10 entry-content">
            <div class="flex-col-6"><!-- Début essai flexslider ------------------>
                <?php $fichiers = get_children("post_parent=$id&post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC");
                if ($fichiers):
                    ?>
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <?php foreach ($fichiers as $fichier): ?>
                                <li>
                                <?php
                                if ($fichier) {

                                    $thumb = wp_get_attachment_thumb_url($fichier->ID);
                                    $liste[] = $thumb;
                                    $image = wp_get_attachment_url($fichier->ID, $size = 'medium', $icon = false);
                                    ?>
                                        <img src="<?php echo $image ?>" style="max-width: 100%; height: 390px;" />
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
                            <?php foreach ($liste as $key => $value): ?>
                                <li>
                                    <img src="<?php echo $value; ?>" />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div id="colonne-1" class="entry-content">
                    <?php
                    the_content(sprintf(
                                    wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'baladesauxjardins'), array(
                        'span' => array(
                            'class' => array(),
                        ),
                                            )
                                    ), get_the_title()
                    ));
                    ?>
                </div>
            </div>
            <div class="flex-col-4">
                <div id="colonne-2" class="entry-content">
                    <?php   $sub_colonne_2 = get_post_meta($post->ID,'sub_colonne_2', true);
                            $sub_colonne_2 = apply_filters( 'the_content', $sub_colonne_2 );
                            $sub_colonne_2 = str_replace( ']]>', ']]&gt;', $sub_colonne_2 );
                            echo $sub_colonne_2; ?>
                </div><!-- .entry-content -->
            </div>
        </div>

        <footer class="entry-footer mam">
            <div class="contact-visite">
                <p><img src="<?php echo get_template_directory_uri();?>/img/contact-enveloppe.png" class="contact-enveloppe"></p>
                <p>Écrivez-moi pour organiser cette visite</p>
                <p>ou appelez-moi au :</p>
                <p>Téléphone fixe: 09 81 26 74 77<br>
                    Téléphone mobile: 07 61 09 74 03</p>
            </div>
            <div class="nav-visites mtl u-small">
            <?php
            the_post_navigation();
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?></div>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
