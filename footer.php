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
<script src="<?php bloginfo('template_url'); ?>/flexSlider/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            jQuery(window).load(function() {
            jQuery('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 150,
            itemMargin: 5,
            minItems: 2,
            maxItems: 8,
            asNavFor: '#slider'
          });

          jQuery('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
          });
        });  </script>

        <script src="<?php bloginfo('template_url'); ?>/flexSlider/modernizr.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/flexSlider/jquery.easing.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/flexSlider/jquery.mousewheel.js"></script>
</body>
</html>
