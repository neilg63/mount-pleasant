<?php
/**
 * The Secondary Sidebar containing the secondary widget area
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0 
 */
?>

<?php 
/** 
 * catchresponsive_before_featured_widget_content hook
 */
do_action( 'catchresponsive_before_featured_widget_content' );

	$catchresponsive_options 	 = catchresponsive_get_theme_options();
	$catchresponsive_layouts 	 = $catchresponsive_options ['featured_content_layout'];
	$catchresponsive_headline 	 = $catchresponsive_options ['featured_content_headline'];
	$catchresponsive_subheadline = $catchresponsive_options ['featured_content_subheadline'];
	
	if ( !empty( $catchresponsive_layouts ) ) {
		$catchresponsive_classes = $catchresponsive_layouts ;
	}

	echo '
		<section id="featured-content" class="' . $catchresponsive_classes . '">
			<div class="wrapper">';
				if ( !empty( $catchresponsive_headline ) || !empty( $catchresponsive_subheadline ) ) {
					echo '<div class="featured-heading-wrap">';
						if ( !empty( $catchresponsive_headline ) ) {
							echo '<h1 id="featured-heading" class="entry-title">'. esc_attr( $catchresponsive_headline ) .'</h1>';
						}
						if ( !empty( $catchresponsive_subheadline ) ) {
							echo '<p>'. esc_attr( $catchresponsive_subheadline ) .'</p>';
						}
					echo '</div><!-- .featured-heading-wrap -->';
				}
				
				echo '
				<div class="featured-content-wrap">';

				//Featured Widget Content Area
				if ( is_active_sidebar( 'featured-widget-content' ) ) {
			    	dynamic_sidebar( 'featured--widget-content' ); 
				}
				echo '
				</div><!-- .featured-content-wrap -->
			</div><!-- .wrapper -->
		</section><!-- #featured-content -->';
/** 
 * catchresponsive_after_featured_widget_content hook
 *
 */
do_action( 'catchresponsive_after_featured_widget_content' );