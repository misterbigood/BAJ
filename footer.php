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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
                <nav id="footer-site-navigation" class="footer-navigation">
			<button class="menu-toggle" aria-controls="footer-menu" aria-expanded="false"><?php esc_html_e( 'Footer Menu', 'baladesauxjardins' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'baladesauxjardins' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'baladesauxjardins' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'baladesauxjardins' ), 'baladesauxjardins', '<a href="http://underscores.me/">Underscores.me</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
