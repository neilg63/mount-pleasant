<?php
/**
 * The Header Right Sidebar containing the header right widget area
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */
?>

<?php
/**
 * catchresponsive_before_header_right hook
 */
do_action( 'catchresponsive_before_header_right' ); ?>

<aside class="sidebar sidebar-header-right widget-area">
	<?php
	if ( has_nav_menu( 'header-right' ) ) {
	?>
		<section class="widget widget_nav_menu" id="header-right-menu-widget">
			<div class="widget-wrap">
		    	<nav class="nav-header-right" role="navigation">
		            <div class="wrapper">
		                <h1 class="assistive-text"><?php _e( 'Header Right Menu', 'catch-responsive-pro' ); ?></h1>
		                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-responsive-pro' ); ?>"><?php _e( 'Skip to content', 'catch-responsive-pro' ); ?></a></div>
		                <?php
		                    $catchresponsive_header_right_menu_args = array(
		                        'theme_location'    => 'header-right',
		                        'menu_class' => 'menu catchresponsive-nav-menu'
		                    );
		                    wp_nav_menu( $catchresponsive_header_right_menu_args );
		                ?>
		        	</div><!-- .wrapper -->
		        </nav><!-- .nav-header-right -->
		   	</div>
		</section>
	<?php
	}

	//Header Right Widgets Sidebar
	if ( is_active_sidebar( 'header-right' ) ) {
	   	dynamic_sidebar( 'header-right' );
	}
	elseif ( !has_nav_menu( 'header-right' ) ) { ?>
		<section class="widget widget_search" id="header-right-search">
			<div class="widget-wrap">
				<?php echo get_search_form(); ?>
			</div>
		</section>
		<?php if ( '' != ( $catchresponsive_social_icons = catchresponsive_get_social_icons() ) ) { ?>
			<section class="widget widget_catchresponsive_social_icons" id="header-right-social-icons">
				<div class="widget-wrap">
					<?php echo $catchresponsive_social_icons; ?>
				</div>
			</section>
		<?php
		}
   	}
	?>
</aside><!-- .sidebar .header-sidebar .widget-area -->

<?php
/**
 * catchresponsive_after_header_right hook
 */
do_action( 'catchresponsive_after_header_right' );