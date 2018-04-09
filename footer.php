<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package baladesauxjardins
 */

?>

	
</div><!-- #page -->

	<footer id="colophon" class="site-footer">
            <section class="flex-container">
                <div class="flex-col-2">Suivez-moi sur:<br><a href=""><img src="<?php echo get_template_directory_uri();?>/img/facebook-baladesauxjardins.svg" class="reseau-social"></a></div>
                <div class="flex-col-7">
                  <nav id="footer-site-navigation" class="footer-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
                </div>              
            </section>
        </footer><!-- #colophon -->
</div>


<?php wp_footer(); ?>
</body>
</html>
