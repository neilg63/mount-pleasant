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
 * catchresponsive_before_promotion_headline_content hook
 */
do_action( 'catchresponsive_before_promotion_headline_content' );
	
$catchresponsive_options 	= catchresponsive_get_theme_options();

echo '
	<div id="promotion-message">
		<div class="wrapper">';

    	//Promotion Headline Left
		 if ( is_active_sidebar( 'promotion-headline-left' ) ) {
    		dynamic_sidebar( 'promotion-headline-left' ); 
    	}
    	else {
			$catchresponsive_promotion_headline 		= $catchresponsive_options['promotion_headline'];
			$catchresponsive_promotion_subheadline 		= $catchresponsive_options['promotion_subheadline'];
			
			echo '
			<div class="section left">';
	
			if ( "" != $catchresponsive_promotion_headline ) {
				echo '<h2>' . $catchresponsive_promotion_headline . '</h2>';
			}

			if ( "" != $catchresponsive_promotion_subheadline ) {
				echo '<p>' . $catchresponsive_promotion_subheadline . '</p>';
			}			
			
			echo '
			</div><!-- .section.left -->';  			
		}	

    	//Promotion Headline Right
    	if ( is_active_sidebar( 'promotion-headline-right' ) ) {
    		dynamic_sidebar( 'promotion-headline-right' ); 
    	}
    	else {
    		$catchresponsive_promotion_headline_button 	= $catchresponsive_options['promotion_headline_button'];
			$catchresponsive_promotion_headline_target 	= $catchresponsive_options['promotion_headline_target'];

    		//support qTranslate plugin
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$catchresponsive_promotion_headline_url = qtrans_convertURL($catchresponsive_options[ 'promotion_headline_url' ]);
			}
			else {
				$catchresponsive_promotion_headline_url = $catchresponsive_options[ 'promotion_headline_url' ];
			}

			if ( "" != $catchresponsive_promotion_headline_url ) {
				if ( "1" == $catchresponsive_promotion_headline_target ) {
					$catchresponsive_headlinetarget = '_blank';
				}
				else {
					$catchresponsive_headlinetarget = '_self';
				}
				
				echo '
				<div class="section right">
					<a class="promotion-button" href="' . esc_url( $catchresponsive_promotion_headline_url ) . '" target="' . $catchresponsive_headlinetarget . '">' . esc_attr( $catchresponsive_promotion_headline_button ) . '
					</a>
				</div><!-- .section.right -->';
			}		
    	}	
		
	echo '
		</div><!-- .wrapper -->
	</div><!-- #promotion-message -->';


/** 
 * catchresponsive_after_promotion_headline_content hook
 *
 */
do_action( 'catchresponsive_after_promotion_headline_content' );