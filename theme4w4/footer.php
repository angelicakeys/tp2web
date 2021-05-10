<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme4w4
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'TIM' ) ); ?>">
			<?php if(is_active_sidebar('footer-1')): ?>
				<?php dynamic_sidebar('footer-1');?>
				<?php endif ?>
		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
