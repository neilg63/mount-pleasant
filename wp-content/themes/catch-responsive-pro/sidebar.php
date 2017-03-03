<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package catchresponsive
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

/**
 * catchresponsive_before_secondary hook
 */
do_action( 'catchresponsive_before_secondary' );

$catchresponsive_layout = catchresponsive_get_theme_layout();

//Bail early if no sidebar layout is selected
if ( 'no-sidebar' == $catchresponsive_layout || 'no-sidebar-one-column' == $catchresponsive_layout || 'no-sidebar-full-width' == $catchresponsive_layout ) {
	return;
}

// WooCommerce Shop Page excluding Cart and checkout
if ( class_exists( 'woocommerce' ) && is_woocommerce() ) {
	$shop_id = get_option( 'woocommerce_shop_page_id' );
    $sidebaroptions = get_post_meta( $shop_id, 'catchresponsive-sidebar-options', true );
}
else {
	global $post, $wp_query;

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Blog Page or Front Page setting in Reading Settings
	if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
        $sidebaroptions = get_post_meta( $page_id, 'catchresponsive-sidebar-options', true );
    }
	elseif ( is_singular() ) {
		if ( is_attachment() ) {
			$parent 		= $post->post_parent;
			$sidebaroptions = get_post_meta( $parent, 'catchresponsive-sidebar-options', true );

		}
		else {
			$sidebaroptions = get_post_meta( $post->ID, 'catchresponsive-sidebar-options', true );
		}
	}
	else {
		$sidebaroptions = '';
	}
}

do_action( 'catchresponsive_before_primary_sidebar' );
?>
	<aside class="sidebar sidebar-primary widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'sidebar-optional-woocommmerce' ) && class_exists( 'woocommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
        	dynamic_sidebar( 'sidebar-optional-woocommmerce' );
   		}
		elseif ( is_active_sidebar( 'sidebar-optional-one' ) && 'optional-sidebar-one' == $sidebaroptions ) {
        	dynamic_sidebar( 'sidebar-optional-one' );
   		}
		elseif ( is_active_sidebar( 'sidebar-optional-two' ) && 'optional-sidebar-two' == $sidebaroptions ) {
        	dynamic_sidebar( 'sidebar-optional-two' );
   		}
		elseif ( is_active_sidebar( 'sidebar-optional-three' ) && 'optional-sidebar-three' == $sidebaroptions ) {
        	dynamic_sidebar( 'sidebar-optional-three' );
   		}
		elseif ( is_active_sidebar( 'sidebar-optional-homepage' ) && ( is_front_page() || ( is_home() && $page_id != $page_for_posts ) ) ) {
        	dynamic_sidebar( 'sidebar-optional-homepage' );
   		}
		elseif ( is_active_sidebar( 'sidebar-optional-archive' ) && ( is_archive() || ( is_home() && $page_id != $page_for_posts ) ) ) {
        	dynamic_sidebar( 'sidebar-optional-archive' );
    	}
		elseif ( is_page() && is_active_sidebar( 'sidebar-optional-page' ) ) {
			dynamic_sidebar( 'sidebar-optional-page' );
		}
		elseif ( is_single() && is_active_sidebar( 'sidebar-optional-post' ) ) {
			dynamic_sidebar( 'sidebar-optional-post' );
		}
		elseif ( is_active_sidebar( 'primary-sidebar' ) ) {
        	dynamic_sidebar( 'primary-sidebar' );
   		}
		else {
			//Helper Text
			if ( current_user_can( 'edit_theme_options' ) ) { ?>
				<section id="widget-default-text" class="widget widget_text">
					<div class="widget-wrap">
	                	<h4 class="widget-title"><?php _e( 'Primary Sidebar Widget Area', 'catch-responsive-pro' ); ?></h4>

	           			<div class="textwidget">
	                   		<p><?php _e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'catch-responsive-pro' ); ?></p>
	                   		<p><?php printf( __( 'By default it will load Search and Archives widgets as shown below. You can add widget to this area by visiting your <a href="%s">Widgets Panel</a> which will replace default widgets.', 'catch-responsive-pro' ), admin_url( 'widgets.php' ) ); ?></p>
	                 	</div>
	           		</div><!-- .widget-wrap -->
	       		</section><!-- #widget-default-text -->
			<?php
			} ?>
			<section class="widget widget_search" id="default-search">
				<div class="widget-wrap">
					<?php get_search_form(); ?>
				</div><!-- .widget-wrap -->
			</section><!-- #default-search -->
			<section class="widget widget_archive" id="default-archives">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php _e( 'Archives', 'catch-responsive-pro' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</div><!-- .widget-wrap -->
			</section><!-- #default-archives -->
			<?php
		} ?>
	</aside><!-- .sidebar sidebar-primary widget-area -->
<?php
/**
 * catchresponsive_after_primary_sidebar hook
 */
do_action( 'catchresponsive_after_primary_sidebar' );


/**
 * catchresponsive_after_secondary hook
 *
 */
do_action( 'catchresponsive_after_secondary' );