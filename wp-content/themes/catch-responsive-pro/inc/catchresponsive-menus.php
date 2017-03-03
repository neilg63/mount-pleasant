<?php
/**
 * The template for displaying custom menus
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( ! function_exists( 'catchresponsive_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header-right.php
 */
function catchresponsive_primary_menu() {
    $options  = catchresponsive_get_theme_options();
    if ( !$options['primary_menu_disable'] ) :
    	?>
    	<nav class="nav-primary <?php echo ( !$options['primary_search_disable']  ) ? 'search-enabled' : '';?>" role="navigation">
            <div class="wrapper">
                <h1 class="assistive-text"><?php _e( 'Primary Menu', 'catch-responsive-pro' ); ?></h1>
                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-responsive-pro' ); ?>"><?php _e( 'Skip to content', 'catch-responsive-pro' ); ?></a></div>
                <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        $catchresponsive_primary_menu_args = array(
                            'theme_location'    => 'primary',
                            'menu_class'        => 'menu catchresponsive-nav-menu',
                            'container'         => false
                        );
                        wp_nav_menu( $catchresponsive_primary_menu_args );
                    }
                    else {
                        wp_page_menu( array( 'menu_class'  => 'menu catchresponsive-nav-menu' ) );
                    }
                    if ( !$options['primary_search_disable'] ) :
                        ?>
                        <div id="search-toggle" class="genericon">
                            <a class="screen-reader-text" href="#search-container"><?php _e( 'Search', 'catch-responsive-pro' ); ?></a>
                        </div>

                        <div id="search-container" class="displaynone">
                            <?php get_Search_form(); ?>
                        </div>
                        <?php
                    endif;
                    ?>
        	</div><!-- .wrapper -->
        </nav><!-- .nav-primary -->
        <?php
    endif;
}
endif; //catchresponsive_primary_menu
add_action( 'catchresponsive_after_header', 'catchresponsive_primary_menu', 20 );


if ( ! function_exists( 'catchresponsive_add_page_menu_class' ) ) :
/**
 * Filters wp_page_menu to add menu class  for default page menu
 *
 */
function catchresponsive_add_page_menu_class( $ulclass ) {
  return preg_replace( '/<ul>/', '<ul class="menu page-menu-wrap">', $ulclass, 1 );
}
endif; //catchresponsive_add_page_menu_class
add_filter( 'wp_page_menu', 'catchresponsive_add_page_menu_class' );


if ( ! function_exists( 'catchresponsive_secondary_menu' ) ) :
/**
 * Shows the Secondary Menu
 *
 * default load in sidebar-header-right.php
 */
function catchresponsive_secondary_menu() {
    if ( has_nav_menu( 'secondary' ) ) {
	?>
    	<nav class="nav-secondary" role="navigation">
            <div class="wrapper">
                <h1 class="assistive-text"><?php _e( 'Secondary Menu', 'catch-responsive-pro' ); ?></h1>
                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-responsive-pro' ); ?>"><?php _e( 'Skip to content', 'catch-responsive-pro' ); ?></a></div>
                <?php
                    $catchresponsive_secondary_menu_args = array(
                        'theme_location'    => 'secondary',
                        'menu_class' => 'menu catchresponsive-nav-menu'
                    );
                    wp_nav_menu( $catchresponsive_secondary_menu_args );
                ?>
        	</div><!-- .wrapper -->
        </nav><!-- .nav-secondary -->

<?php
    }
}
endif; //catchresponsive_secondary_menu
add_action( 'catchresponsive_after_header', 'catchresponsive_secondary_menu', 30 );


if ( ! function_exists( 'catchresponsive_footer_menu' ) ) :
/**
 * Shows the Footer Menu
 *
 * default load in sidebar-header-right.php
 */
function catchresponsive_footer_menu() {
	if ( has_nav_menu( 'footer' ) ) {
    ?>
	<nav class="nav-footer" role="navigation">
        <div class="wrapper">
            <h1 class="assistive-text"><?php _e( 'Footer Menu', 'catch-responsive-pro' ); ?></h1>
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-responsive-pro' ); ?>"><?php _e( 'Skip to content', 'catch-responsive-pro' ); ?></a></div>
            <?php
                $catchresponsive_footer_menu_args = array(
                    'theme_location'    => 'footer',
                    'menu_class' => 'menu catchresponsive-nav-menu'
                );
                wp_nav_menu( $catchresponsive_footer_menu_args );
            ?>
    	</div><!-- .wrapper -->
    </nav><!-- .nav-footer -->
<?php
    }
}
endif; //catchresponsive_footer_menu
add_action( 'catchresponsive_footer', 'catchresponsive_footer_menu', 10 );


if ( ! function_exists( 'catchresponsive_mobile_menus' ) ) :
/**
 * This function loads Mobile Menus
 *
 * @get the data value from theme options
 * @uses catchresponsive_after action to add the code in the footer
 */
function catchresponsive_mobile_menus() {
    //Getting Ready to load options data
    $options                    = catchresponsive_get_theme_options();

    // Check Header Left Mobile Menu
   if ( '1' != $options['primary_menu_disable'] ) :
       $count = '1';
       $location = 'primary';
   elseif ( has_nav_menu( 'secondary' ) ) :
       $count = '1';
       $location = 'secondary';
   elseif ( has_nav_menu( 'header-right' ) ) :
       $count = '1';
       $location = 'header-right';
   elseif ( '1' != $options['primary_menu_disable'] ) :
       $count = '0';
       $location = 'none';
   else :
       $count = '2';
       $location = 'none';
   endif;

   if ( '0' == $count ) {
        return;
   }

    echo '<nav id="mobile-header-left-nav" class="mobile-menu" role="navigation">';
        if ( '1' == $count ) :
            $args = array(
                'theme_location'    => $location,
                'container'         => false,
                'items_wrap'        => '<ul id="header-left-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        else :
            wp_page_menu( array( 'menu_class'  => 'menu' ) );
        endif;
    echo '</nav><!-- #mobile-header-left-nav -->';


    // Check Header Right Mobile Menu ( only for Header right and Secondary )
    if ( ( '1' != $options['primary_menu_disable'] &&  has_nav_menu( 'header-right' ) ) || ( has_nav_menu( 'secondary' ) &&  has_nav_menu( 'header-right' ) ) ) :
        $count2 = '1';
        $location2 = 'header-right';
    elseif ( has_nav_menu( 'primary' ) && has_nav_menu( 'secondary' ) ) :
        $count2 = '1';
        $location2 = 'secondary';
    else :
        $count2 = '0';
        $location2 = 'none';
    endif;

    if ( '1' == $count2 ) :
        echo '<nav id="mobile-header-right-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => $location2,
                'container'         => false,
                'items_wrap'        => '<ul id="header-right-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-right-nav -->';
    endif;

    // Check Secondary Menu
    if ( has_nav_menu( 'primary' ) &&  has_nav_menu( 'secondary' ) &&  has_nav_menu( 'header-right' ) ) :
        echo '<nav id="mobile-secondary-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'secondary',
                'container'         => false,
                'items_wrap'        => '<ul id="secondary-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-secondary-nav -->';
    endif;

    // Check Footer Menu
    if ( has_nav_menu( 'footer' ) && '1' != $options['footer_mobile_menu_disable'] ) :
        echo '<nav id="mobile-footer-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'footer',
                'container'         => false,
                'items_wrap'        => '<ul id="footer-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-footer-nav -->';
    endif;

}
endif; //catchresponsive_mobile_menus

add_action( 'catchresponsive_after', 'catchresponsive_mobile_menus', 20 );


if ( ! function_exists( 'catchresponsive_mobile_header_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Left Anchor
 *
 * @get the data value from theme options
 * @uses catchresponsive_header action to add in the Header
 */
function catchresponsive_mobile_header_nav_anchor() {
    //Getting Ready to load options data
    $options                    = catchresponsive_get_theme_options();

    if ( '1' == $options['primary_menu_disable'] && !has_nav_menu( 'secondary' ) && !has_nav_menu( 'header-right' ) ) {
        return;
    }

    // Header Left Mobile Menu Anchor
    if ( '1' != $options['primary_menu_disable'] ) {
        if ( has_nav_menu( 'primary' ) ) {
            $classes = "mobile-menu-anchor primary-menu";
        }
        else {
            $classes = "mobile-menu-anchor page-menu";
        }
    }
    elseif ( has_nav_menu( 'secondary' ) ) {
        $classes = "mobile-menu-anchor secondary-menu";
    }
    elseif ( has_nav_menu( 'header-right' ) ) {
        $classes = "mobile-menu-anchor header-right-menu";
    }

    ?>

    <div id="mobile-header-left-menu" class="<?php echo $classes; ?>">
        <a href="#mobile-header-left-nav" id="header-left-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Menu', 'catch-responsive-pro' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->

    <?php
    // Header Right Mobile Menu Anchor
    if ( ( '1' != $options['primary_menu_disable'] &&  has_nav_menu( 'header-right' ) ) || ( has_nav_menu( 'secondary' ) &&  has_nav_menu( 'header-right' ) ) ) {
        $classes = "mobile-menu-anchor header-right-menu";
    }
    elseif ( '1' != $options['primary_menu_disable'] && has_nav_menu( 'secondary' ) ) {
        $classes = "mobile-menu-anchor secondary-menu";
    }
    else {
        return;
    }
    ?>
    <div id="mobile-header-right-menu" class="<?php echo $classes; ?>">
        <a href="#mobile-header-right-nav" id="header-right-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Menu', 'catch-responsive-pro' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->

    <?php
}
endif; //catchresponsive_mobile_menus
add_action( 'catchresponsive_header', 'catchresponsive_mobile_header_nav_anchor', 40 );


if ( ! function_exists( 'catchresponsive_mobile_secondary_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Footer Anchor
 *
 * @get the data value from theme options
 * @uses catchresponsive_header action to add in the Header
 */
function catchresponsive_mobile_secondary_nav_anchor() {
    //Getting Ready to load options data
    $options = catchresponsive_get_theme_options();

    if ( '1' != $options['primary_menu_disable'] && has_nav_menu( 'secondary' ) && has_nav_menu( 'header-right' ) ) {
        ?>
        <div id="mobile-secondary-menu" class="mobile-menu-anchor secondary-menu">
            <a href="#mobile-secondary-nav" id="secondary-menu" class="genericon genericon-menu">
                <span class="mobile-menu-text"><?php _e( 'Menu', 'catch-responsive-pro' );?></span>
            </a>
        </div><!-- #mobile-header-menu -->
    <?php
    }
}
endif; //catchresponsive_mobile_secondary_nav_anchor
add_action( 'catchresponsive_header', 'catchresponsive_mobile_secondary_nav_anchor', 60 );


if ( ! function_exists( 'catchresponsive_mobile_footer_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Footer Anchor
 *
 * @get the data value from theme options
 * @uses catchresponsive_header action to add in the Header
 */
function catchresponsive_mobile_footer_nav_anchor() {
    //Getting Ready to load options data
    $options = catchresponsive_get_theme_options();

    if ( '1' == $options['footer_mobile_menu_disable'] )
        return;

    ?>

    <div id="mobile-footer-menu" class="mobile-menu-anchor footer-menu">
        <a href="#mobile-footer-nav" id="footer-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Menu', 'catch-responsive-pro' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->

    <?php
}
endif; //catchresponsive_mobile_footer_nav_anchor
add_action( 'catchresponsive_footer', 'catchresponsive_mobile_footer_nav_anchor', 20 );