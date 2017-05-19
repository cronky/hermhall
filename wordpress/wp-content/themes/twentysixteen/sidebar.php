<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<div class="fb-page" data-href="https://www.facebook.com/Hermitage-Village-Hall-685011831567900/" data-tabs="timeline,events" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
